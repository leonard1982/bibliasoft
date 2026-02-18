<?php

namespace App\Services;

class GenerationService
{
    private $config;
    private $userDataRepository;
    private $bibleRepository;

    public function __construct(array $config, UserDataRepository $userDataRepository, BibleRepository $bibleRepository)
    {
        $this->config = $config;
        $this->userDataRepository = $userDataRepository;
        $this->bibleRepository = $bibleRepository;
    }

    public function generate(array $input)
    {
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : 0;
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : 0;
        $mode = isset($input['mode']) ? trim((string) $input['mode']) : 'explicacion';

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            throw new \InvalidArgumentException('Parámetros inválidos');
        }

        if ($verseStart > $verseEnd) {
            $tmp = $verseStart;
            $verseStart = $verseEnd;
            $verseEnd = $tmp;
        }

        $allowedModes = ['explicacion', 'palabras_clave', 'bosquejo', 'aplicacion_practica', 'resumen', 'contexto'];
        if (!in_array($mode, $allowedModes, true)) {
            $mode = 'explicacion';
        }

        $verses = isset($input['verses']) && is_array($input['verses']) ? $input['verses'] : [];
        if (empty($verses)) {
            $verses = $this->bibleRepository->getVersesInRange($book, $chapter, $verseStart, $verseEnd);
        }

        $prompt = $this->buildPrompt($book, $chapter, $verseStart, $verseEnd, $mode, $verses);
        $promptHash = hash('sha256', $prompt);

        $cached = $this->userDataRepository->getGenerationCache(
            $book,
            $chapter,
            $verseStart,
            $verseEnd,
            $mode,
            $promptHash
        );
        if ($cached) {
            return [
                'cached' => true,
                'mode' => $mode,
                'content' => $cached['response'],
            ];
        }

        $content = $this->fallbackText($mode, $verseStart, $verseEnd);
        $source = 'stub';

        $enabled = !empty($this->config['enabled']);
        $apiKey = isset($this->config['api_key']) ? trim((string) $this->config['api_key']) : '';
        $model = isset($this->config['model']) ? (string) $this->config['model'] : 'gpt-4.1-mini';

        if ($enabled && $apiKey !== '' && function_exists('curl_init')) {
            $real = $this->callOpenAI($apiKey, $model, $prompt);
            if ($real !== null && trim($real) !== '') {
                $content = trim($real);
                $source = 'online';
            }
        }

        $this->userDataRepository->saveGenerationCache(
            $book,
            $chapter,
            $verseStart,
            $verseEnd,
            $mode,
            $promptHash,
            $content
        );

        return [
            'cached' => false,
            'mode' => $mode,
            'source' => $source,
            'content' => $content,
        ];
    }

    private function buildPrompt($book, $chapter, $verseStart, $verseEnd, $mode, array $verses)
    {
        $lines = [];
        foreach ($verses as $row) {
            $lines[] = $row['verse'] . '. ' . trim((string) $row['scripture_text']);
        }
        $reference = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);

        return "Eres un asistente de estudio bíblico pastoral en español.\n" .
            "Modo solicitado: {$mode}\n" .
            "Referencia: {$reference}\n" .
            "Texto:\n" . implode("\n", $lines) . "\n\n" .
            "Responde en español claro, directo y breve (máx. 220 palabras).";
    }

    private function callOpenAI($apiKey, $model, $prompt)
    {
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

        return null;
    }

    private function fallbackText($mode, $verseStart, $verseEnd)
    {
        $range = $verseStart === $verseEnd ? (string) $verseStart : $verseStart . '-' . $verseEnd;
        $map = [
            'explicacion' => 'Explicación base del pasaje ' . $range . ': identifica la idea principal, el sujeto, y la acción central.',
            'palabras_clave' => 'Palabras clave base del pasaje ' . $range . ': gracia, fe, obediencia, esperanza (ajustar al texto).',
            'bosquejo' => 'Bosquejo base: 1) Observación del texto. 2) Interpretación del contexto. 3) Aplicación práctica.',
            'aplicacion_practica' => 'Aplicación base: define una acción concreta para hoy, una oración breve y un compromiso semanal.',
            'resumen' => 'Resumen base del pasaje: sintetiza el mensaje central del texto seleccionado.',
            'contexto' => 'Contexto base: ubica el pasaje en su capítulo y en la intención general del libro.',
        ];
        return $map[$mode];
    }
}
