<?php

namespace App\Services;

class CompanionChatService
{
    private $config;
    private $users;
    private $bibleRepository;
    private $mail;

    public function __construct(array $config, UserDataRepository $users, BibleRepository $bibleRepository, MailService $mail)
    {
        $this->config = $config;
        $this->users = $users;
        $this->bibleRepository = $bibleRepository;
        $this->mail = $mail;
    }

    public function startThread($userId, array $user)
    {
        $name = trim((string) ($user['full_name'] ?? $user['username'] ?? ''));
        $email = trim((string) ($user['email'] ?? ''));
        $threadId = $this->users->createCompanionThread($userId, $email, $name, 'Nueva conversación');
        return $this->users->getCompanionThreadByIdForUser($threadId, $userId);
    }

    public function respond($userId, $threadId, $message)
    {
        $message = trim((string) $message);
        if ($userId < 1 || $message === '') {
            throw new \InvalidArgumentException('Mensaje inválido.');
        }

        $user = $this->users->getUserById($userId);
        if (!$user) {
            throw new \RuntimeException('Usuario no encontrado.');
        }

        $thread = $threadId > 0
            ? $this->users->getCompanionThreadByIdForUser($threadId, $userId)
            : null;
        if (!$thread) {
            $thread = $this->startThread($userId, $user);
        }
        if (!$thread) {
            throw new \RuntimeException('No se pudo abrir la conversación.');
        }

        $intent = $this->detectIntent($message);
        $this->users->addCompanionMessage((int) $thread['id'], 'user', $message, $intent['intent'], [
            'flags' => $intent['flags'],
        ]);

        $history = $this->users->getCompanionMessages((int) $thread['id'], 16);
        $assistant = $this->buildAssistantReply($user, $message, $history, $intent);
        $this->users->addCompanionMessage((int) $thread['id'], 'assistant', $assistant['content'], $assistant['intent'], [
            'source' => $assistant['source'],
        ]);

        $updates = [
            'title' => $this->buildThreadTitle($history, $message, $intent['intent']),
            'summary' => $this->buildThreadSummary($message),
            'status' => $intent['intent'] === 'prayer' ? 'flagged' : 'open',
            'prayer_flag' => $intent['intent'] === 'prayer' ? 1 : (!empty($thread['prayer_flag']) ? 1 : 0),
            'last_message_at' => date('Y-m-d H:i:s'),
        ];
        $this->users->updateCompanionThread((int) $thread['id'], $updates);

        $prayerRequest = null;
        if ($intent['intent'] === 'prayer') {
            $notifyTo = trim((string) config('pastoral.prayer_email', 'pastorgeneral@laiglesiaenlacalle.co'));
            $notificationSent = false;
            if ($notifyTo !== '') {
                try {
                    $notificationSent = $this->mail->sendPrayerRequestNotification($notifyTo, [
                        'thread_id' => (int) $thread['id'],
                        'full_name' => (string) ($user['full_name'] ?? ''),
                        'email' => (string) ($user['email'] ?? ''),
                        'ministry' => (string) ($user['ministry'] ?? ''),
                        'request_text' => $message,
                    ]);
                } catch (\Throwable $e) {
                    $notificationSent = false;
                }
            }

            $requestId = $this->users->createPrayerRequest(
                (int) $thread['id'],
                $userId,
                (string) ($user['email'] ?? ''),
                (string) ($user['full_name'] ?? ''),
                (string) ($user['ministry'] ?? ''),
                $message,
                $notificationSent ? $notifyTo : ''
            );
            $prayerRequest = [
                'id' => $requestId,
                'notified' => $notificationSent,
                'email' => $notifyTo,
            ];
        }

        return [
            'thread' => $this->users->getCompanionThreadByIdForUser((int) $thread['id'], $userId),
            'messages' => $this->users->getCompanionMessages((int) $thread['id'], 80),
            'reply' => [
                'intent' => $assistant['intent'],
                'source' => $assistant['source'],
            ],
            'prayer_request' => $prayerRequest,
        ];
    }

    private function buildAssistantReply(array $user, $message, array $history, array $intent)
    {
        $enabled = !empty($this->config['enabled']);
        $apiKey = trim((string) ($this->config['api_key'] ?? ''));
        $model = (string) ($this->config['model'] ?? 'gpt-4.1-mini');

        if ($enabled && $apiKey !== '' && function_exists('curl_init')) {
            $content = $this->callOpenAi($apiKey, $model, $user, $message, $history, $intent);
            if ($content !== '') {
                return [
                    'content' => trim($content),
                    'intent' => $intent['intent'],
                    'source' => 'online',
                ];
            }
        }

        return [
            'content' => $this->fallbackReply($user, $message, $intent),
            'intent' => $intent['intent'],
            'source' => 'stub',
        ];
    }

    private function callOpenAi($apiKey, $model, array $user, $message, array $history, array $intent)
    {
        $companionName = trim((string) config('pastoral.companion_name', 'Alfonso'));
        $userName = trim((string) ($user['full_name'] ?? $user['username'] ?? ''));
        $ministry = trim((string) ($user['ministry'] ?? ''));
        $historyText = [];
        foreach ($history as $row) {
            $sender = strtolower(trim((string) ($row['sender'] ?? 'user'))) === 'assistant' ? $companionName : 'Usuario';
            $historyText[] = $sender . ': ' . trim((string) ($row['message_text'] ?? ''));
        }

        $prompt = "Actúa como {$companionName}, un creyente maduro con tono pastoral, bíblico, claro y compasivo.\n"
            . "Tienes criterio amplio en Biblia, teología, historia, arqueología, cultura, acompañamiento humano y formación ministerial, pero no afirmas sustituir profesionales clínicos, médicos o legales.\n"
            . "Responde en español sencillo, útil para personas muy simples de leer. Máximo 320 palabras.\n"
            . "Usa formato visual amigable: títulos cortos, listas breves, negritas con **texto** cuando ayude, y 1 a 3 emojis relevantes si aportan calidez.\n"
            . "Evita bloques largos. Prefiere párrafos cortos y pasos concretos.\n"
            . "Si el usuario expresa una petición de oración, responde con empatía, una breve oración y menciona que el equipo pastoral puede dar seguimiento.\n"
            . "Si percibes ansiedad, duelo o crisis, habla con prudencia, anima a buscar apoyo humano cercano y no hagas diagnósticos.\n"
            . "Nombre del usuario: " . ($userName !== '' ? $userName : 'hermano(a)') . ".\n"
            . "Ministerio: " . ($ministry !== '' ? $ministry : 'No especificado') . ".\n"
            . "Intento detectado: " . $intent['intent'] . ".\n"
            . "Historial reciente:\n" . implode("\n", $historyText) . "\n\n"
            . "Mensaje actual del usuario:\n" . $message . "\n\n"
            . "Responde como Alfonso, en tono cercano y con criterio responsable.";

        $payload = [
            'model' => $model,
            'input' => $prompt,
        ];

        $ch = curl_init('https://api.openai.com/v1/responses');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $raw = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status < 200 || $status >= 300 || !$raw) {
            return '';
        }

        $json = json_decode($raw, true);
        if (!is_array($json)) {
            return '';
        }
        if (isset($json['output_text']) && is_string($json['output_text'])) {
            return $json['output_text'];
        }
        if (isset($json['output']) && is_array($json['output'])) {
            foreach ($json['output'] as $block) {
                if (!isset($block['content']) || !is_array($block['content'])) {
                    continue;
                }
                foreach ($block['content'] as $part) {
                    if (isset($part['text']) && is_string($part['text'])) {
                        return $part['text'];
                    }
                }
            }
        }

        return '';
    }

    private function fallbackReply(array $user, $message, array $intent)
    {
        $name = trim((string) ($user['full_name'] ?? $user['username'] ?? ''));
        $name = $name !== '' ? $name : 'hermano(a)';

        if ($intent['intent'] === 'prayer') {
            return "🙏 **Estoy contigo, {$name}.**\n\n"
                . "Tu petición ya quedó registrada para seguimiento pastoral.\n\n"
                . "**Oremos:**\n"
                . "\"Señor Jesús, mira con gracia la necesidad de {$name}, fortalece su fe, trae paz a su corazón, dirección para este momento y sostén a su familia. Danos tu consuelo y tu ayuda concreta. Amén.\"\n\n"
                . "🕊️ Si quieres, cuéntame un poco más para orar de manera más específica.";
        }

        if (!empty($intent['flags']['crisis'])) {
            return "⚠️ **Gracias por decirlo con sinceridad, {$name}.**\n\n"
                . "Lo que expresas merece cuidado real y cercano.\n\n"
                . "**Te recomiendo hoy mismo:**\n"
                . "- Buscar a un pastor de confianza.\n"
                . "- Hablar con un familiar o amigo cercano.\n"
                . "- Buscar ayuda profesional presencial en tu ciudad.\n\n"
                . "🙏 Yo puedo acompañarte con orientación bíblica y oración. Si quieres, cuéntame qué está pasando y te ayudo a ordenarlo con calma.";
        }

        return "📖 **Con gusto te ayudo, {$name}.**\n\n"
            . "Vamos a verlo de forma bíblica, clara y práctica.\n\n"
            . "**Miremos tres cosas:**\n"
            . "1. Qué enseña realmente la Escritura sobre este tema.\n"
            . "2. Cómo aplicarlo hoy sin complicarlo.\n"
            . "3. Qué siguiente paso concreto puedes dar.\n\n"
            . "✨ Si quieres una respuesta más exacta, escríbeme tu duda completa o menciona el pasaje bíblico que estás considerando.";
    }

    private function detectIntent($message)
    {
        $text = function_exists('mb_strtolower') ? mb_strtolower((string) $message, 'UTF-8') : strtolower((string) $message);
        $prayerWords = ['oracion', 'oración', 'oren', 'orar', 'orar por', 'pidan por mi', 'oren por mi', 'oren por mí', 'peticion de oracion', 'petición de oración'];
        $crisisWords = ['suicid', 'matarme', 'quitarme la vida', 'ya no quiero vivir', 'autoles', 'me quiero morir'];

        $intent = 'general';
        foreach ($prayerWords as $word) {
            if (strpos($text, $word) !== false) {
                $intent = 'prayer';
                break;
            }
        }

        $flags = [
            'crisis' => false,
        ];
        foreach ($crisisWords as $word) {
            if (strpos($text, $word) !== false) {
                $flags['crisis'] = true;
                break;
            }
        }

        return [
            'intent' => $intent,
            'flags' => $flags,
        ];
    }

    private function buildThreadTitle(array $history, $message, $intent)
    {
        if ($intent === 'prayer') {
            return 'Petición de oración';
        }

        $firstUser = trim((string) $message);
        if ($firstUser === '') {
            foreach ($history as $row) {
                if (trim((string) ($row['sender'] ?? '')) === 'user') {
                    $firstUser = trim((string) ($row['message_text'] ?? ''));
                    break;
                }
            }
        }

        if ($firstUser === '') {
            return 'Nueva conversación';
        }

        if (function_exists('mb_substr')) {
            return mb_substr($firstUser, 0, 46, 'UTF-8') . (mb_strlen($firstUser, 'UTF-8') > 46 ? '...' : '');
        }
        return substr($firstUser, 0, 46) . (strlen($firstUser) > 46 ? '...' : '');
    }

    private function buildThreadSummary($message)
    {
        $message = trim((string) $message);
        if ($message === '') {
            return '';
        }
        if (function_exists('mb_substr')) {
            return mb_substr($message, 0, 120, 'UTF-8') . (mb_strlen($message, 'UTF-8') > 120 ? '...' : '');
        }
        return substr($message, 0, 120) . (strlen($message) > 120 ? '...' : '');
    }
}
