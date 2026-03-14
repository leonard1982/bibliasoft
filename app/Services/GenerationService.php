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

    public function generateSermonMessage(array $input)
    {
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : 0;
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : 0;
        $messageType = trim((string) ($input['message_type'] ?? 'sermon'));
        $promptText = trim((string) ($input['prompt'] ?? ''));
        $audience = trim((string) ($input['audience'] ?? ''));
        $tone = trim((string) ($input['tone'] ?? ''));

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            throw new \InvalidArgumentException('Parametros invalidos');
        }

        if ($verseStart > $verseEnd) {
            $tmp = $verseStart;
            $verseStart = $verseEnd;
            $verseEnd = $tmp;
        }

        $verses = $this->bibleRepository->getVersesInRange($book, $chapter, $verseStart, $verseEnd);
        if (empty($verses)) {
            throw new \InvalidArgumentException('No se encontro el pasaje solicitado.');
        }

        $messageType = in_array($messageType, ['sermon', 'mensaje', 'evangelistico', 'ensenanza', 'bosquejo'], true)
            ? $messageType
            : 'sermon';
        $prompt = $this->buildSermonPrompt($book, $chapter, $verseStart, $verseEnd, $messageType, $promptText, $audience, $tone, $verses);
        $promptHash = hash('sha256', $prompt);
        $cached = $this->userDataRepository->getGenerationCache($book, $chapter, $verseStart, $verseEnd, 'sermon_message', $promptHash);
        if ($cached && !$this->isBadPlaceholder((string) $cached['response'])) {
            $decoded = $this->extractJsonObject((string) $cached['response']);
            if (is_array($decoded)) {
                return [
                    'cached' => true,
                    'source' => 'cache',
                    'reference' => $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd),
                    'title' => trim((string) ($decoded['title'] ?? '')),
                    'content' => trim((string) ($decoded['content'] ?? '')),
                ];
            }
        }

        $draft = $this->fallbackSermonMessage($book, $chapter, $verseStart, $verseEnd, $messageType, $promptText, $audience, $tone, $verses);
        $source = 'stub';
        $enabled = !empty($this->config['enabled']);
        $apiKey = isset($this->config['api_key']) ? trim((string) $this->config['api_key']) : '';
        $model = isset($this->config['model']) ? (string) $this->config['model'] : 'gpt-4.1-mini';

        if ($enabled && $apiKey !== '' && function_exists('curl_init')) {
            $real = $this->callOpenAI($apiKey, $model, $prompt);
            $decoded = $this->extractJsonObject((string) $real);
            if (is_array($decoded) && trim((string) ($decoded['content'] ?? '')) !== '') {
                $draft['title'] = trim((string) ($decoded['title'] ?? $draft['title']));
                $draft['content'] = trim((string) ($decoded['content'] ?? $draft['content']));
                $source = 'online';
            }
        }

        $this->userDataRepository->saveGenerationCache(
            $book,
            $chapter,
            $verseStart,
            $verseEnd,
            'sermon_message',
            $promptHash,
            json_encode([
                'title' => $draft['title'],
                'content' => $draft['content'],
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );

        return [
            'cached' => false,
            'source' => $source,
            'reference' => $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd),
            'title' => $draft['title'],
            'content' => $draft['content'],
        ];
    }

    public function explainStudySelection(array $input)
    {
        $selectedText = trim((string) ($input['selected_text'] ?? ''));
        $reference = trim((string) ($input['reference'] ?? ''));
        $noteContext = trim((string) ($input['note_context'] ?? ''));

        if ($selectedText === '') {
            throw new \InvalidArgumentException('Selecciona primero una palabra o frase.');
        }

        if ((function_exists('mb_strlen') ? mb_strlen($selectedText, 'UTF-8') : strlen($selectedText)) > 240) {
            throw new \InvalidArgumentException('La selección es demasiado extensa para analizarla.');
        }

        if ((function_exists('mb_strlen') ? mb_strlen($noteContext, 'UTF-8') : strlen($noteContext)) > 1800) {
            $noteContext = function_exists('mb_substr') ? mb_substr($noteContext, 0, 1800, 'UTF-8') : substr($noteContext, 0, 1800);
        }

        $prompt = $this->buildStudySelectionPrompt($selectedText, $reference, $noteContext);
        $result = $this->fallbackStudySelection($selectedText, $reference);
        $source = 'stub';

        $enabled = !empty($this->config['enabled']);
        $apiKey = isset($this->config['api_key']) ? trim((string) $this->config['api_key']) : '';
        $model = isset($this->config['model']) ? (string) $this->config['model'] : 'gpt-4.1-mini';

        if ($enabled && $apiKey !== '' && function_exists('curl_init')) {
            $real = $this->callOpenAI($apiKey, $model, $prompt);
            $decoded = $this->extractJsonObject((string) $real);
            if (is_array($decoded) && trim((string) ($decoded['definition'] ?? '')) !== '') {
                $result['term'] = trim((string) ($decoded['term'] ?? $selectedText));
                $result['category'] = trim((string) ($decoded['category'] ?? $result['category']));
                $result['definition'] = trim((string) ($decoded['definition'] ?? $result['definition']));
                $result['use'] = trim((string) ($decoded['use'] ?? $result['use']));
                $result['pastoral_note'] = trim((string) ($decoded['pastoral_note'] ?? $result['pastoral_note']));
                $result['original_language'] = trim((string) ($decoded['original_language'] ?? $result['original_language']));
                $result['transliteration'] = trim((string) ($decoded['transliteration'] ?? $result['transliteration']));
                $result['historical_meaning'] = trim((string) ($decoded['historical_meaning'] ?? $result['historical_meaning']));
                $source = 'online';
            }
        }

        $result['source'] = $source;
        return $result;
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

    private function buildSermonPrompt($book, $chapter, $verseStart, $verseEnd, $messageType, $promptText, $audience, $tone, array $verses)
    {
        $lines = [];
        foreach ($verses as $row) {
            $lines[] = $row['verse'] . '. ' . trim((string) ($row['scripture_text'] ?? ''));
        }
        $reference = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $bookName = $this->bibleRepository->getBookName($book);
        $audience = $audience !== '' ? $audience : 'iglesia local, grupos de hogar y personas nuevas en la fe';
        $tone = $tone !== '' ? $tone : 'pastoral, biblico, claro y aplicable';
        $focus = $promptText !== '' ? $promptText : 'resaltar la idea central del pasaje y aplicarla con fidelidad';

        return "Eres un pastor y redactor biblico senior en espanol.\n"
            . "Genera SOLO un JSON valido con las claves title y content.\n"
            . "Tipo de pieza: {$messageType}.\n"
            . "Referencia base: {$reference}.\n"
            . "Libro: {$bookName}. Capitulo: {$chapter}. Rango: {$verseStart}-{$verseEnd}.\n"
            . "Audiencia: {$audience}.\n"
            . "Tono: {$tone}.\n"
            . "Encargo pastoral del usuario: {$focus}.\n"
            . "Texto biblico:\n" . implode("\n", $lines) . "\n\n"
            . "El campo title debe ser breve, memorable y conectado al pasaje.\n"
            . "El campo content debe ser texto plano, sin HTML, con estructura larga y util para predicar o ensenar.\n"
            . "Incluye estas secciones dentro de content: Idea central, Introduccion, Desarrollo en 3 movimientos o puntos, Aplicaciones concretas, Llamado final y Oracion sugerida.\n"
            . "No inventes detalles ajenos al pasaje. No uses markdown complicado. No agregues explicaciones fuera del JSON.";
    }

    private function buildStudySelectionPrompt($selectedText, $reference, $noteContext)
    {
        $reference = $reference !== '' ? $reference : 'nota de estudio sin referencia precisa';
        $contextLine = $noteContext !== '' ? $noteContext : 'Sin contexto adicional.';

        return "Actua como un asistente biblico en espanol claro y sencillo.\n"
            . "Analiza SOLO el termino o frase seleccionada y responde SOLO con un JSON valido.\n"
            . "Claves obligatorias: term, category, definition, use, pastoral_note, original_language, transliteration, historical_meaning.\n"
            . "Seleccion: {$selectedText}\n"
            . "Referencia de la nota: {$reference}\n"
            . "Contexto de la nota: {$contextLine}\n\n"
            . "Reglas:\n"
            . "- category debe decir algo como Sustantivo, Verbo, Imperativo, Expresion, Imagen biblica, Titulo o Idea clave.\n"
            . "- definition debe ser breve, simple y sin tecnicismos pesados.\n"
            . "- use debe explicar como se entiende dentro del contexto biblico o de la nota.\n"
            . "- pastoral_note debe dar una aplicacion corta y comprensible.\n"
            . "- original_language debe ser Hebreo, Arameo, Griego o vacio si no es claro.\n"
            . "- transliteration debe traer una forma sencilla del termino original si se puede inferir con suficiente claridad; si no, dejala vacia.\n"
            . "- historical_meaning debe explicar que queria comunicar esa palabra o frase en ese entonces, dentro del mundo biblico, con lenguaje simple.\n"
            . "- No hables de probabilidades tecnicas ni de linguistica avanzada.\n"
            . "- No pongas markdown ni texto fuera del JSON.";
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

    private function fallbackSermonMessage($book, $chapter, $verseStart, $verseEnd, $messageType, $promptText, $audience, $tone, array $verses)
    {
        $reference = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $summary = $this->buildSummary($this->collectText($verses), $reference);
        $audienceLine = $audience !== '' ? $audience : 'la iglesia y quienes estan creciendo en la Palabra';
        $toneLine = $tone !== '' ? $tone : 'pastoral y claro';
        $promptLine = $promptText !== '' ? $promptText : 'mostrar con fidelidad el mensaje del pasaje y llevarlo a la practica';
        $titlePrefixMap = [
            'sermon' => 'Sermon',
            'mensaje' => 'Mensaje',
            'evangelistico' => 'Mensaje evangelistico',
            'ensenanza' => 'Ensenanza',
            'bosquejo' => 'Bosquejo',
        ];
        $titlePrefix = isset($titlePrefixMap[$messageType]) ? $titlePrefixMap[$messageType] : 'Mensaje';
        $title = $titlePrefix . ': ' . $reference;
        $content = "Idea central\n"
            . "El pasaje {$reference} llama a mirar con atencion el obrar de Dios y responder con obediencia concreta.\n\n"
            . "Introduccion\n"
            . "{$summary} Este {$titlePrefix} esta pensado para {$audienceLine}, con un tono {$toneLine}.\n\n"
            . "Desarrollo\n"
            . "1. Observa lo que el texto revela de Dios y de su caracter.\n"
            . "2. Identifica como el pasaje confronta el corazon humano y corrige prioridades.\n"
            . "3. Lleva la verdad biblica a una respuesta visible en la vida diaria y en la comunidad.\n\n"
            . "Aplicaciones concretas\n"
            . "- Ora el pasaje y conviertelo en una decision practica para esta semana.\n"
            . "- Comparte el mensaje con claridad y sin perder la fidelidad al texto.\n"
            . "- Usa esta orientacion pastoral: {$promptLine}.\n\n"
            . "Llamado final\n"
            . "Invita a la congregacion a volver al texto, creerlo, obedecerlo y permitir que transforme la manera de vivir.\n\n"
            . "Oracion sugerida\n"
            . "Senor, afirmanos en tu Palabra y danos gracia para vivir lo que hoy hemos entendido en {$reference}. Amen.";

        return [
            'title' => $title,
            'content' => $content,
        ];
    }

    private function fallbackStudySelection($selectedText, $reference)
    {
        $term = trim((string) $selectedText);
        $clean = function_exists('mb_strtolower') ? mb_strtolower($term, 'UTF-8') : strtolower($term);
        $words = preg_split('/\s+/u', $clean);
        $singleWord = is_array($words) ? count(array_filter($words, 'strlen')) === 1 : false;
        $category = 'Expresión bíblica';

        if ($singleWord) {
            if (preg_match('/(ad|ed|id)$/u', $clean)) {
                $category = 'Posible imperativo';
            } elseif (preg_match('/(ar|er|ir)$/u', $clean)) {
                $category = 'Verbo';
            } else {
                $category = 'Término clave';
            }
        }

        return [
            'term' => $term,
            'category' => $category,
            'definition' => 'Se refiere a una idea importante dentro del lenguaje bíblico y conviene leerla con atención dentro de su contexto.',
            'use' => $reference !== ''
                ? 'En la nota vinculada a ' . $reference . ', esta expresión ayuda a enfocar la idea principal del pasaje.'
                : 'Dentro de tu nota, esta expresión parece resumir o destacar una idea importante.',
            'pastoral_note' => 'Llévala a una aplicación sencilla: pregunta qué revela de Dios, qué pide al creyente y cómo se vive hoy.',
            'original_language' => '',
            'transliteration' => '',
            'historical_meaning' => $reference !== ''
                ? 'En el contexto bíblico de ' . $reference . ', esta expresión debe leerse pensando en lo que comunicaba a los primeros oyentes.'
                : 'Conviene leerla pensando en lo que comunicaba dentro del mundo bíblico original y no solo en su uso actual.',
        ];
    }

    private function extractJsonObject($raw)
    {
        $raw = trim((string) $raw);
        if ($raw === '') {
            return null;
        }
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            return $decoded;
        }
        $start = strpos($raw, '{');
        $end = strrpos($raw, '}');
        if ($start === false || $end === false || $end <= $start) {
            return null;
        }
        $candidate = substr($raw, $start, $end - $start + 1);
        $decoded = json_decode($candidate, true);
        return is_array($decoded) ? $decoded : null;
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
