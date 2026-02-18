<?php

namespace App\Services;

class DevotionalService
{
    private $bibleRepository;
    private $userDataRepository;
    private $dailyVerseService;
    private $generationService;
    private $imageCardService;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        DailyVerseService $dailyVerseService,
        GenerationService $generationService,
        ImageCardService $imageCardService
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->dailyVerseService = $dailyVerseService;
        $this->generationService = $generationService;
        $this->imageCardService = $imageCardService;
    }

    public function getToday($date = null)
    {
        $date = $date ?: date('Y-m-d');
        $existing = $this->userDataRepository->getDevotionalByDate($date);
        if ($existing) {
            return $this->hydrate($existing);
        }
        return $this->generateNew([
            'date' => $date,
        ]);
    }

    public function generateNew(array $options = [])
    {
        $date = isset($options['date']) && $options['date'] ? $options['date'] : date('Y-m-d');
        $book = isset($options['book']) ? (int) $options['book'] : 0;
        $chapter = isset($options['chapter']) ? (int) $options['chapter'] : 0;
        $verse = isset($options['verse']) ? (int) $options['verse'] : 0;

        if ($book < 1 || $chapter < 1 || $verse < 1) {
            $daily = $this->dailyVerseService->getDailyVerse($date);
            $book = $daily['book'];
            $chapter = $daily['chapter'];
            $verse = $daily['verse'];
        }

        $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
        if (!$verseRow) {
            throw new \RuntimeException('No se encontró el versículo base del devocional.');
        }

        $context = $this->generationService->generate([
            'book' => $book,
            'chapter' => $chapter,
            'verse_start' => $verse,
            'verse_end' => $verse,
            'mode' => 'contexto',
            'verses' => [$verseRow],
        ]);
        $explain = $this->generationService->generate([
            'book' => $book,
            'chapter' => $chapter,
            'verse_start' => $verse,
            'verse_end' => $verse,
            'mode' => 'explicacion',
            'verses' => [$verseRow],
        ]);
        $tip = $this->generationService->generate([
            'book' => $book,
            'chapter' => $chapter,
            'verse_start' => $verse,
            'verse_end' => $verse,
            'mode' => 'aplicacion_practica',
            'verses' => [$verseRow],
        ]);
        $outline = $this->generationService->generate([
            'book' => $book,
            'chapter' => $chapter,
            'verse_start' => $verse,
            'verse_end' => $verse,
            'mode' => 'bosquejo',
            'verses' => [$verseRow],
        ]);

        $seed = $date . ':' . $book . ':' . $chapter . ':' . $verse . ':' . microtime(true);
        $story = $this->pickAnecdote($seed);
        $word = $this->pickWord($seed);
        $reference = $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse);
        $pericope = $this->bibleRepository->getPericopeHint($book, $chapter, $verse);

        $payload = [
            'date' => $date,
            'reference' => $reference,
            'book' => $book,
            'chapter' => $chapter,
            'verse' => $verse,
            'sections' => [
                'versiculo_base' => $verseRow['scripture_text'],
                'contexto_textual' => $this->clip($explain['content'], 360),
                'contexto_historico' => $this->clip($context['content'], 360),
                'contexto_literario' => $this->buildLiteraryContext($book, $chapter, $verse, $pericope, $outline['content']),
                'anecdota' => $story['text'],
                'anecdota_titulo' => $story['title'],
                'palabra_clave' => $word,
                'tip_1_por_ciento' => $this->clip($tip['content'], 280),
                'oracion_sugerida' => $this->buildPrayer($reference, $word),
                'desafio_semana' => $this->buildWeeklyChallenge($word, $story['title']),
            ],
            'share_text' => $this->imageCardService->shareText($verseRow['scripture_text'], $reference),
            'background' => $this->imageCardService->pickBackground($seed),
        ];

        $id = $this->userDataRepository->saveDevotional(
            $date,
            $book,
            $chapter,
            $verse,
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );
        $payload['id'] = $id;
        return $payload;
    }

    public function history($limit = 30)
    {
        $rows = $this->userDataRepository->getDevotionals($limit);
        $result = [];
        foreach ($rows as $row) {
            $result[] = $this->hydrate($row);
        }
        return $result;
    }

    private function hydrate(array $row)
    {
        $decoded = json_decode((string) $row['content_json'], true);
        if (!is_array($decoded)) {
            $decoded = [
                'date' => $row['date'],
                'book' => (int) $row['book'],
                'chapter' => (int) $row['chapter'],
                'verse' => (int) $row['verse'],
                'reference' => $this->bibleRepository->buildReferenceLabel($row['book'], $row['chapter'], $row['verse']),
                'sections' => [
                    'versiculo_base' => '',
                    'contexto_textual' => '',
                    'contexto_historico' => '',
                    'contexto_literario' => '',
                    'anecdota' => '',
                    'anecdota_titulo' => '',
                    'palabra_clave' => [
                        'palabra' => '',
                        'transliteracion' => '',
                        'significado' => '',
                        'aplicacion' => '',
                    ],
                    'tip_1_por_ciento' => '',
                    'oracion_sugerida' => '',
                    'desafio_semana' => '',
                ],
                'share_text' => '',
                'background' => $this->imageCardService->pickBackground($row['date']),
            ];
        }
        $decoded['id'] = (int) $row['id'];
        return $decoded;
    }

    private function pickAnecdote($seed)
    {
        $stories = [
            [
                'title' => 'Gratitud en medio de la escasez',
                'text' => 'En plena temporada de dificultad, una familia decidió cerrar cada día agradeciendo tres cosas concretas antes de dormir. Nada cambió de inmediato afuera, pero cambió la atmósfera dentro de casa: menos queja, más unidad y decisiones más sabias.',
            ],
            [
                'title' => 'Persistir cuando no se ve fruto',
                'text' => 'Un líder sirvió durante años sin resultados visibles, pero mantuvo disciplina en oración, estudio y servicio. Cuando llegó la oportunidad, su carácter ya estaba formado. Lo que parecía estancamiento era entrenamiento silencioso.',
            ],
            [
                'title' => 'Oración que vence la ansiedad',
                'text' => 'Ante una noticia difícil, una mujer cambió la reacción impulsiva por una oración breve y concreta: “Señor, guía mi respuesta en esta hora”. Ese minuto de dependencia evitó decisiones apresuradas y abrió un camino de paz.',
            ],
            [
                'title' => 'Fidelidad en lo pequeño',
                'text' => 'Un joven decidió honrar a Dios en tareas que nadie veía: puntualidad, integridad y buen trato. Meses después recibió nuevas responsabilidades porque su testimonio ya hablaba antes que sus palabras.',
            ],
            [
                'title' => 'Disciplina diaria, fruto profundo',
                'text' => 'Una madre con agenda saturada reservó diez minutos diarios para Palabra y oración. Ese hábito corto pero constante transformó su tono al corregir, su paciencia en casa y su manera de acompañar a otros.',
            ],
        ];

        $index = hexdec(substr(md5((string) $seed), 0, 6)) % count($stories);
        return $stories[$index];
    }

    private function pickWord($seed)
    {
        $words = [
            [
                'palabra' => 'hesed',
                'transliteracion' => 'jésed',
                'significado' => 'amor fiel y leal de Dios',
                'aplicacion' => 'Practica hoy una fidelidad concreta con una persona cercana.',
            ],
            [
                'palabra' => 'shalom',
                'transliteracion' => 'shalóm',
                'significado' => 'paz integral y bienestar',
                'aplicacion' => 'Busca reconciliación en una conversación pendiente.',
            ],
            [
                'palabra' => 'agape',
                'transliteracion' => 'agápe',
                'significado' => 'amor sacrificial',
                'aplicacion' => 'Sirve sin esperar reconocimiento en una tarea sencilla.',
            ],
            [
                'palabra' => 'pistis',
                'transliteracion' => 'pístis',
                'significado' => 'fe y confianza perseverante',
                'aplicacion' => 'Da hoy un paso práctico que refleje confianza en Dios.',
            ],
            [
                'palabra' => 'metanoia',
                'transliteracion' => 'metánoia',
                'significado' => 'cambio de mente y dirección',
                'aplicacion' => 'Corrige una decisión pequeña y vuelve al camino correcto.',
            ],
        ];

        $index = hexdec(substr(md5((string) $seed), 2, 6)) % count($words);
        return $words[$index];
    }

    private function clip($text, $max)
    {
        $text = trim((string) $text);
        if (strlen($text) <= $max) {
            return $text;
        }
        return substr($text, 0, $max) . '...';
    }

    private function buildLiteraryContext($book, $chapter, $verse, $pericope, $outlineText)
    {
        $genre = 'narrativo';
        $book = (int) $book;
        if ($book >= 18 && $book <= 22) {
            $genre = 'poético/sapiencial';
        } elseif ($book >= 23 && $book <= 39) {
            $genre = 'profético';
        } elseif ($book >= 40 && $book <= 44) {
            $genre = 'evangelio/histórico';
        } elseif ($book >= 45 && $book <= 65) {
            $genre = 'epistolar';
        } elseif ($book === 66) {
            $genre = 'apocalíptico';
        }

        $piece = trim((string) $pericope) !== '' ? ('Perícopa cercana: "' . trim((string) $pericope) . '". ') : '';
        $outline = trim((string) $outlineText);
        if ($outline !== '') {
            $outline = ' Enfoque sugerido: ' . $this->clip($outline, 200);
        }

        return 'Este pasaje pertenece al género ' . $genre . ' y se lee mejor dentro del flujo del capítulo ' . (int) $chapter . '. ' . $piece . 'Observa el movimiento del texto: qué revela de Dios, qué confronta del corazón humano y qué respuesta práctica invita hoy.' . $outline;
    }

    private function buildPrayer($reference, array $word)
    {
        $term = trim((string) ($word['palabra'] ?? ''));
        if ($term !== '') {
            return 'Señor, gracias por hablarme en ' . $reference . '. Forma en mí una vida marcada por ' . $term . '. Dame obediencia hoy en lo pequeño, claridad para decidir y amor para servir con humildad.';
        }
        return 'Señor, gracias por hablarme en ' . $reference . '. Ayúdame a vivir este mensaje con integridad, paciencia y acciones concretas que bendigan a quienes me rodean.';
    }

    private function buildWeeklyChallenge(array $word, $storyTitle)
    {
        $action = trim((string) ($word['aplicacion'] ?? ''));
        $storyTitle = trim((string) $storyTitle);
        if ($storyTitle !== '') {
            return 'Reto de 7 días: toma como inspiración "' . $storyTitle . '". Registra cada noche una decisión concreta de obediencia. ' . ($action !== '' ? $action : 'Al final de la semana, comparte un aprendizaje con alguien de confianza.');
        }
        return 'Reto de 7 días: registra cada noche una decisión concreta de obediencia y comparte al final de la semana un aprendizaje con alguien de confianza.';
    }
}
