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
        if ($cached && !$this->isBadPlaceholder((string) $cached['response'])) {
            return [
                'cached' => true,
                'mode' => $mode,
                'content' => $cached['response'],
            ];
        }

        $content = $this->fallbackText($mode, $book, $chapter, $verseStart, $verseEnd, $verses);
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

    private function fallbackText($mode, $book, $chapter, $verseStart, $verseEnd, array $verses)
    {
        $range = $verseStart === $verseEnd ? (string) $verseStart : $verseStart . '-' . $verseEnd;
        $reference = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $text = $this->collectText($verses);
        $keywords = $this->extractKeywords($text, 5);
        $keywordText = empty($keywords) ? 'gracia, fe, obediencia, esperanza' : implode(', ', $keywords);

        $map = [
            'explicacion' => $this->buildExplanation($reference, $text),
            'palabras_clave' => 'Palabras clave en ' . $reference . ': ' . $keywordText . '. Observa cómo estas ideas sostienen el mensaje del pasaje.',
            'bosquejo' => 'Bosquejo sugerido para ' . $reference . ': 1) Qué dice el texto. 2) Qué significa en su contexto. 3) Qué decisión práctica pide hoy.',
            'aplicacion_practica' => 'Aplicación práctica para ' . $reference . ': identifica una acción concreta para hoy, exprésala en oración breve y compártela con alguien de confianza.',
            'resumen' => $this->buildSummary($text, $reference),
            'contexto' => $this->buildStudyContext($book, $chapter, $verseStart, $verseEnd, $reference, $text),
        ];
        return isset($map[$mode]) ? $map[$mode] : $map['explicacion'];
    }

    private function isBadPlaceholder($text)
    {
        $text = trim((string) $text);
        if ($text === '') {
            return true;
        }
        $badPhrases = [
            'preparado para generar',
            'stub:',
            'modo seguro',
            'explicación base del pasaje',
            'palabras clave base',
            'bosquejo base',
            'aplicación base',
            'resumen base',
            'contexto base',
        ];
        $lower = function_exists('mb_strtolower') ? mb_strtolower($text, 'UTF-8') : strtolower($text);
        foreach ($badPhrases as $phrase) {
            if (strpos($lower, $phrase) !== false) {
                return true;
            }
        }
        return false;
    }

    private function collectText(array $verses)
    {
        $parts = [];
        foreach ($verses as $row) {
            $parts[] = trim((string) ($row['scripture_text'] ?? ''));
        }
        return trim(preg_replace('/\s+/', ' ', implode(' ', $parts)));
    }

    private function buildExplanation($reference, $text)
    {
        $summary = $this->buildSummary($text, $reference);
        return $summary . ' La invitación principal es leerlo como mensaje integral: verdad, carácter de Dios y respuesta práctica del creyente.';
    }

    private function buildSummary($text, $reference)
    {
        if ($text === '') {
            return 'Resumen de ' . $reference . ': este pasaje llama a observar el mensaje central y aplicarlo con fidelidad en lo cotidiano.';
        }

        $len = function_exists('mb_strlen') ? mb_strlen($text, 'UTF-8') : strlen($text);
        if ($len > 220) {
            $text = (function_exists('mb_substr') ? mb_substr($text, 0, 220, 'UTF-8') : substr($text, 0, 220)) . '...';
        }

        return 'Resumen de ' . $reference . ': ' . $text;
    }

    private function buildStudyContext($book, $chapter, $verseStart, $verseEnd, $reference, $text)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $bookName = $this->bibleRepository->getBookName((int) $book);
        $chapterFocus = $verseStart === $verseEnd
            ? ('el v. ' . (int) $verseStart)
            : ('los vv. ' . (int) $verseStart . '-' . (int) $verseEnd);

        $sample = trim((string) $text);
        if ($sample !== '' && (function_exists('mb_strlen') ? mb_strlen($sample, 'UTF-8') : strlen($sample)) > 150) {
            $sample = function_exists('mb_substr') ? mb_substr($sample, 0, 150, 'UTF-8') . '...' : substr($sample, 0, 150) . '...';
        }

        $line = 'Contexto histórico-literario de ' . $reference . ': '
            . $bookName . ' pertenece al bloque ' . $meta['corpus']
            . ', enmarcado aproximadamente en ' . $meta['periodo'] . '. '
            . 'Tema macro del libro: ' . $meta['tema'] . '. '
            . 'Para estudiar el capítulo ' . (int) $chapter . ', lee primero la unidad completa y luego observa cómo ' . $chapterFocus
            . ' desarrolla la progresión del argumento: ' . $meta['enfoque'] . '.';

        if ($sample !== '') {
            $line .= ' Pista textual inmediata: "' . $sample . '"';
        }

        $line .= ' Recomendación exegética: identifica repetición de términos clave, estructura del párrafo y relación con el contexto canónico del libro.';
        return $line;
    }

    private function bookStudyMeta($book)
    {
        $book = (int) $book;
        if ($book >= 1 && $book <= 5) {
            return [
                'corpus' => 'Pentateuco',
                'periodo' => 'la etapa fundacional de Israel',
                'tema' => 'origen, pacto y formación del pueblo de Dios',
                'enfoque' => 'identidad del pueblo, santidad y fidelidad al pacto',
            ];
        }
        if ($book >= 6 && $book <= 17) {
            return [
                'corpus' => 'Históricos del Antiguo Testamento',
                'periodo' => 'conquista, monarquía, división del reino y exilio',
                'tema' => 'respuesta de Israel a la alianza en su historia nacional',
                'enfoque' => 'obediencia o rebeldía y sus consecuencias históricas',
            ];
        }
        if ($book >= 18 && $book <= 22) {
            return [
                'corpus' => 'Sapienciales y poéticos',
                'periodo' => 'diversas etapas de la historia de Israel',
                'tema' => 'sabiduría, adoración, sufrimiento y temor de Dios',
                'enfoque' => 'formación del carácter y discernimiento práctico',
            ];
        }
        if ($book >= 23 && $book <= 39) {
            return [
                'corpus' => 'Profetas',
                'periodo' => 'antes, durante y después del exilio',
                'tema' => 'llamado al arrepentimiento, juicio y restauración',
                'enfoque' => 'oráculos en su marco histórico y esperanza mesiánica',
            ];
        }
        if ($book >= 40 && $book <= 44) {
            return [
                'corpus' => 'Evangelios y Hechos',
                'periodo' => 'siglo I, ministerio de Jesús y expansión inicial de la iglesia',
                'tema' => 'reino de Dios, obra de Cristo y misión apostólica',
                'enfoque' => 'narrativa redentiva y testimonio cristocéntrico',
            ];
        }
        return [
            'corpus' => 'Epístolas y Apocalipsis',
            'periodo' => 'primera generación de la iglesia',
            'tema' => 'doctrina, vida comunitaria y esperanza escatológica',
            'enfoque' => 'argumentación teológica, exhortación pastoral y perseverancia final',
        ];
    }

    private function extractKeywords($text, $limit)
    {
        $text = function_exists('mb_strtolower') ? mb_strtolower((string) $text, 'UTF-8') : strtolower((string) $text);
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text);
        $tokens = preg_split('/\s+/u', $text);
        $stop = [
            'de', 'la', 'el', 'los', 'las', 'y', 'a', 'en', 'que', 'por', 'con',
            'para', 'del', 'se', 'su', 'un', 'una', 'al', 'como', 'no', 'es', 'le',
            'lo', 'tu', 'mi', 'si', 'más', 'mas', 'o', 'ya', 'ha', 'sus', 'pero',
            'porque', 'cuando', 'sobre', 'entre', 'todo', 'toda', 'este', 'esta',
        ];
        $freq = [];
        foreach ($tokens as $token) {
            $token = trim((string) $token);
            $tokenLen = function_exists('mb_strlen') ? mb_strlen($token, 'UTF-8') : strlen($token);
            if ($token === '' || $tokenLen < 4 || in_array($token, $stop, true)) {
                continue;
            }
            if (!isset($freq[$token])) {
                $freq[$token] = 0;
            }
            $freq[$token]++;
        }
        arsort($freq);
        return array_slice(array_keys($freq), 0, max(1, (int) $limit));
    }
}
