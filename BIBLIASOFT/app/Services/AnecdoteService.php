<?php

namespace App\Services;

class AnecdoteService
{
    private $repo;
    private $seedPath;
    private $aiConfig;

    public function __construct(UserDataRepository $repo, $seedPath, array $aiConfig = [])
    {
        $this->repo = $repo;
        $this->seedPath = $seedPath;
        $this->aiConfig = $aiConfig;
    }

    public function bootstrapSeed()
    {
        if ($this->repo->hasAnecdotes()) {
            return;
        }
        if (!is_file($this->seedPath)) {
            return;
        }

        $json = json_decode((string) file_get_contents($this->seedPath), true);
        if (!is_array($json)) {
            return;
        }

        foreach ($json as $row) {
            if (!is_array($row)) {
                continue;
            }
            $title = trim((string) ($row['title'] ?? ''));
            $topic = trim((string) ($row['topic'] ?? 'General'));
            $content = trim((string) ($row['content'] ?? ''));
            $idea = trim((string) ($row['idea_central'] ?? ''));
            $application = trim((string) ($row['application'] ?? ''));
            if ($title === '' || $content === '') {
                continue;
            }
            $this->repo->createAnecdote($topic, $title, $content, $idea, $application, 'seed');
        }
    }

    public function list(array $filters = [], $limit = 60, $userId = 0)
    {
        $rows = $this->repo->getAnecdotes($filters, $limit);
        $favMap = [];
        foreach ($this->repo->getFavoriteAnecdoteIds($userId) as $id) {
            $favMap[$id] = true;
        }

        foreach ($rows as &$row) {
            $row['favorite'] = isset($favMap[(int) $row['id']]);
        }

        return [
            'rows' => $rows,
            'topics' => $this->repo->getAnecdoteTopics(),
        ];
    }

    public function generate($topic)
    {
        $topic = trim((string) $topic);
        if ($topic === '') {
            $topic = 'Fe';
        }

        $generated = $this->generateWithApi($topic);
        if (!$generated) {
            $generated = $this->generateTemplate($topic);
        }

        $id = $this->repo->createAnecdote(
            $topic,
            $generated['title'],
            $generated['content'],
            $generated['idea_central'],
            $generated['application'],
            'generated'
        );
        $generated['id'] = $id;
        $generated['topic'] = $topic;
        $generated['source'] = 'generated';
        return $generated;
    }

    public function toggleFavorite($userId, $anecdoteId)
    {
        return $this->repo->toggleAnecdoteFavorite($userId, $anecdoteId);
    }

    private function generateTemplate($topic)
    {
        $seeds = [
            'Fe' => ['La cuerda y el puente', 'Una madre cosiendo de madrugada', 'El faro encendido en tormenta'],
            'Oración' => ['La lista doblada en el bolsillo', 'Cinco minutos antes de abrir la tienda', 'La silla vacía en el comedor'],
            'Perdón' => ['El vecino y la puerta abierta', 'La llamada que rompió diez años de silencio', 'La taza reparada'],
            'Sabiduría' => ['El carpintero y la escuadra', 'Una decisión tomada en calma', 'El silencio del anciano'],
            'Familia' => ['La mesa de los miércoles', 'Una carta de reconciliación', 'La oración antes de dormir'],
            'Perseverancia' => ['La segunda cosecha', 'El corredor del kilómetro final', 'Una viuda y su cuaderno'],
            'Santidad' => ['Una lámpara limpia cada noche', 'El filtro del corazón', 'La ventana que se cerró a tiempo'],
            'Evangelismo' => ['Una conversación en la fila', 'La Biblia prestada en el bus', 'La visita inesperada'],
        ];

        $titles = isset($seeds[$topic]) ? $seeds[$topic] : ['Historia breve para ' . $topic];
        $title = $titles[array_rand($titles)];

        $topicLower = function_exists('mb_strtolower') ? mb_strtolower($topic, 'UTF-8') : strtolower($topic);
        $p1 = 'En una comunidad común, una persona enfrentó una decisión difícil relacionada con ' . $topicLower . '.';
        $p2 = 'En lugar de reaccionar por impulso, eligió obedecer lo correcto paso a paso, aun sin ver resultados inmediatos.';
        $p3 = 'Con el tiempo, esa fidelidad silenciosa impactó a su familia y a quienes observaban de cerca su forma de vivir.';

        return [
            'title' => $title,
            'content' => $p1 . "\n\n" . $p2 . "\n\n" . $p3,
            'idea_central' => 'La obediencia constante en lo pequeño produce fruto visible en el momento adecuado.',
            'application' => 'Identifica hoy una decisión concreta relacionada con ' . $topicLower . ' y ejecútala antes de terminar el día.',
        ];
    }

    private function generateWithApi($topic)
    {
        $enabled = !empty($this->aiConfig['enabled']);
        $apiKey = isset($this->aiConfig['api_key']) ? trim((string) $this->aiConfig['api_key']) : '';
        $model = isset($this->aiConfig['model']) ? (string) $this->aiConfig['model'] : 'gpt-4.1-mini';

        if (!$enabled || $apiKey === '' || !function_exists('curl_init')) {
            return null;
        }

        $prompt = "Escribe una anécdota ORIGINAL en español para predicación sobre el tema {$topic}. "
            . "Devuelve JSON con llaves: title, content, idea_central, application. "
            . "content debe tener 2 a 5 párrafos cortos. No cites libros con copyright.";

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
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        $raw = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status < 200 || $status >= 300 || !$raw) {
            return null;
        }

        $json = json_decode($raw, true);
        if (!is_array($json)) {
            return null;
        }

        $text = '';
        if (isset($json['output_text']) && is_string($json['output_text'])) {
            $text = trim($json['output_text']);
        } elseif (isset($json['output']) && is_array($json['output'])) {
            foreach ($json['output'] as $block) {
                if (!isset($block['content']) || !is_array($block['content'])) {
                    continue;
                }
                foreach ($block['content'] as $part) {
                    if (isset($part['text']) && is_string($part['text'])) {
                        $text = trim($part['text']);
                        break 2;
                    }
                }
            }
        }

        if ($text === '') {
            return null;
        }

        $decoded = json_decode($text, true);
        if (!is_array($decoded)) {
            return null;
        }

        if (empty($decoded['title']) || empty($decoded['content'])) {
            return null;
        }

        return [
            'title' => trim((string) $decoded['title']),
            'content' => trim((string) $decoded['content']),
            'idea_central' => trim((string) ($decoded['idea_central'] ?? '')),
            'application' => trim((string) ($decoded['application'] ?? '')),
        ];
    }
}
