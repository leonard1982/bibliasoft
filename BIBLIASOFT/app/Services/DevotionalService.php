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

        $seed = $date . ':' . $book . ':' . $chapter . ':' . $verse . ':' . microtime(true);
        $story = $this->pickAnecdote($seed);
        $word = $this->pickWord($seed);
        $reference = $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse);

        $payload = [
            'date' => $date,
            'reference' => $reference,
            'book' => $book,
            'chapter' => $chapter,
            'verse' => $verse,
            'sections' => [
                'versiculo_base' => $verseRow['scripture_text'],
                'contexto_textual' => $explain['content'],
                'contexto_historico' => $context['content'],
                'anecdota' => $story,
                'palabra_clave' => $word,
                'tip_1_por_ciento' => $this->clip($tip['content'], 220),
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
                    'anecdota' => '',
                    'palabra_clave' => [
                        'palabra' => '',
                        'transliteracion' => '',
                        'significado' => '',
                        'aplicacion' => '',
                    ],
                    'tip_1_por_ciento' => '',
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
            'En 1944, Corrie ten Boom relató cómo, aun en condiciones extremas, la gratitud diaria sostuvo su fe y su servicio.',
            'William Carey persistió por años antes de ver frutos visibles; su constancia muestra que la obediencia suele madurar en silencio.',
            'George Muller registró cientos de respuestas a la oración, recordando que la dependencia diaria transforma la ansiedad en confianza.',
            'Dietrich Bonhoeffer escribió que la fidelidad en lo pequeño prepara el corazón para sostenerse en tiempos difíciles.',
            'Susanna Wesley apartaba minutos diarios de oración aun con múltiples tareas, mostrando que la disciplina breve cambia el rumbo del día.',
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
}
