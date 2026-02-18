<?php

namespace App\Controllers;

use App\Services\AIService;
use App\Services\AnecdoteService;
use App\Services\BibleRepository;
use App\Services\DailyVerseService;
use App\Services\DevotionalService;
use App\Services\SearchService;
use App\Services\UserDataRepository;

class ApiController
{
    private $bibleRepository;
    private $userDataRepository;
    private $aiService;
    private $searchService;
    private $devotionalService;
    private $dailyVerseService;
    private $anecdoteService;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        AIService $aiService,
        SearchService $searchService,
        DevotionalService $devotionalService,
        DailyVerseService $dailyVerseService,
        AnecdoteService $anecdoteService
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->aiService = $aiService;
        $this->searchService = $searchService;
        $this->devotionalService = $devotionalService;
        $this->dailyVerseService = $dailyVerseService;
        $this->anecdoteService = $anecdoteService;
    }

    public function verse()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verse = isset($_GET['verse']) ? (int) $_GET['verse'] : 0;

        $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
        if (!$verseRow) {
            app_json(['error' => 'Versículo no encontrado'], 404);
        }

        $context = [
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'verse' => $verse,
            'verse_text' => $verseRow['scripture_text'],
            'pericope' => $this->bibleRepository->getPericopeHint($book, $chapter, $verse),
        ];

        app_json([
            'reference' => [
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'label' => $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse),
            ],
            'verse' => [
                'html' => $verseRow['scripture_html'],
                'text' => $verseRow['scripture_text'],
            ],
            'context' => $context,
            'commentary' => $this->bibleRepository->getCommentariesForVerse($book, $chapter, $verse),
            'notes' => $this->userDataRepository->getNotes($book, $chapter, $verse),
            'links' => $this->userDataRepository->getLinks($book, $chapter, $verse),
            'ai' => $this->aiService->cardsForVerse($book, $chapter, $verse, $context, false),
        ]);
    }

    public function chapter()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        if ($book < 1 || $chapter < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        $verses = $this->bibleRepository->getChapterVerses($book, $chapter);
        if (empty($verses)) {
            app_json(['error' => 'Capítulo no encontrado'], 404);
        }

        $this->userDataRepository->saveHistory($book, $chapter);

        app_json([
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'chapters' => $this->bibleRepository->getChapters($book),
            'verses' => $verses,
        ]);
    }

    public function selection()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verseStart = isset($_GET['verse_start']) ? (int) $_GET['verse_start'] : 0;
        $verseEnd = isset($_GET['verse_end']) ? (int) $_GET['verse_end'] : 0;

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        if ($verseStart > $verseEnd) {
            $tmp = $verseStart;
            $verseStart = $verseEnd;
            $verseEnd = $tmp;
        }

        $verses = $this->bibleRepository->getVersesInRange($book, $chapter, $verseStart, $verseEnd);
        if (empty($verses)) {
            app_json(['error' => 'No se encontró el pasaje'], 404);
        }

        $plain = [];
        foreach ($verses as $row) {
            $plain[] = $row['scripture_text'];
        }
        $text = trim(implode(' ', $plain));

        $summary = substr($text, 0, 420);
        if (strlen($text) > 420) {
            $summary .= '...';
        }

        $contextRef = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $pericope = $this->bibleRepository->getPericopeHint($book, $chapter, $verseStart);

        $context = [
            'title' => $contextRef,
            'summary' => $summary,
            'historical' => $this->historicalContextText($book, $chapter, $contextRef, $pericope),
            'literary' => $this->literaryContextText($book, $chapter, $contextRef, $pericope, $verses),
            'canonical' => $this->canonicalContextText($book, $contextRef),
            'keywords' => $this->extractKeywordsForStudy($text, 8),
            'questions' => $this->buildStudyQuestions($book, $chapter, $contextRef),
            'study_tips' => $this->buildStudyTips($book, $chapter, $verseStart, $verseEnd, $verses),
        ];

        app_json([
            'reference' => [
                'book' => $book,
                'chapter' => $chapter,
                'verse_start' => $verseStart,
                'verse_end' => $verseEnd,
                'label' => $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd),
            ],
            'verses' => $verses,
            'context' => $context,
            'commentary' => $this->bibleRepository->getCommentariesForRange($book, $chapter, $verseStart, $verseEnd),
            'notes' => $this->userDataRepository->getNotesForRange($book, $chapter, $verseStart, $verseEnd),
            'links' => $this->userDataRepository->getLinksForRange($book, $chapter, $verseStart, $verseEnd),
            'history' => $this->userDataRepository->getHistory(8),
        ]);
    }

    public function chapters()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        if ($book < 1) {
            app_json(['error' => 'Parámetro inválido'], 422);
        }

        app_json([
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapters' => $this->bibleRepository->getChapters($book),
        ]);
    }

    public function noteCreate()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : (isset($input['verse']) ? (int) $input['verse'] : 0);
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : $verseStart;
        $content = isset($input['content']) ? trim($input['content']) : '';
        $tags = isset($input['tags']) ? trim($input['tags']) : '';
        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1 || $content === '') {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $id = $this->userDataRepository->createNoteForRange($book, $chapter, $verseStart, $verseEnd, $content, $tags);
        app_json(['ok' => true, 'id' => $id], 201);
    }

    public function noteUpdate()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        $content = isset($input['content']) ? trim($input['content']) : '';
        $tags = isset($input['tags']) ? trim($input['tags']) : '';
        if ($id < 1 || $content === '') {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->updateNote($id, $content, $tags);
        app_json(['ok' => $ok]);
    }

    public function noteDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->deleteNote($id);
        app_json(['ok' => $ok]);
    }

    public function linkCreate()
    {
        $input = $this->requestData();
        $required = ['from_book', 'from_chapter', 'to_book', 'to_chapter'];
        foreach ($required as $field) {
            if (empty($input[$field])) {
                app_json(['error' => 'Parámetros inválidos'], 422);
            }
        }

        $fromVerseStart = isset($input['from_verse_start']) ? (int) $input['from_verse_start'] : (int) ($input['from_verse'] ?? 0);
        $fromVerseEnd = isset($input['from_verse_end']) ? (int) $input['from_verse_end'] : $fromVerseStart;
        $toVerseStart = isset($input['to_verse_start']) ? (int) $input['to_verse_start'] : (int) ($input['to_verse'] ?? 0);
        $toVerseEnd = isset($input['to_verse_end']) ? (int) $input['to_verse_end'] : $toVerseStart;
        if ($fromVerseStart < 1 || $toVerseStart < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        $id = $this->userDataRepository->createLinkForRange(
            (int) $input['from_book'],
            (int) $input['from_chapter'],
            $fromVerseStart,
            $fromVerseEnd,
            (int) $input['to_book'],
            (int) $input['to_chapter'],
            $toVerseStart,
            $toVerseEnd,
            isset($input['note']) ? $input['note'] : ''
        );
        app_json(['ok' => true, 'id' => $id], 201);
    }

    public function favoriteToggle()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;
        if ($book < 1 || $chapter < 1 || $verse < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $active = $this->userDataRepository->toggleFavorite($book, $chapter, $verse);
        app_json(['ok' => true, 'active' => $active]);
    }

    public function search()
    {
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        $mode = isset($_GET['mode']) ? trim($_GET['mode']) : 'any';
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapterFrom = isset($_GET['chapter_from']) ? (int) $_GET['chapter_from'] : 0;
        $chapterTo = isset($_GET['chapter_to']) ? (int) $_GET['chapter_to'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : (int) config('search.default_limit', 60);

        if (!in_array($mode, ['any', 'all', 'exact'], true)) {
            $mode = 'any';
        }
        if ($query === '') {
            app_json([
                'engine' => null,
                'rows' => [],
            ]);
        }

        $result = $this->searchService->search([
            'query' => $query,
            'mode' => $mode,
            'book' => $book,
            'chapter_from' => $chapterFrom,
            'chapter_to' => $chapterTo,
        ], $limit);

        foreach ($result['rows'] as &$row) {
            $row['reference'] = $this->bibleRepository->buildReferenceLabel($row['book'], $row['chapter'], $row['verse']);
        }

        app_json($result);
    }

    public function devotionalGenerate()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;

        $payload = $this->devotionalService->generateNew([
            'book' => $book,
            'chapter' => $chapter,
            'verse' => $verse,
            'date' => isset($input['date']) ? $input['date'] : date('Y-m-d'),
        ]);

        app_json([
            'ok' => true,
            'devotional' => $payload,
        ]);
    }

    public function devotionalHistory()
    {
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 30;
        app_json([
            'ok' => true,
            'rows' => $this->devotionalService->history($limit),
        ]);
    }

    public function prefsSave()
    {
        $input = $this->requestData();
        $prefs = [];
        if (isset($input['font_scale'])) {
            $prefs['font_scale'] = (int) $input['font_scale'];
        }
        if (isset($input['show_daily'])) {
            $prefs['show_daily'] = (int) $input['show_daily'];
        }
        if (isset($input['auto_devotional'])) {
            $prefs['auto_devotional'] = (int) $input['auto_devotional'];
        }
        if (isset($input['theme'])) {
            $prefs['theme'] = trim((string) $input['theme']);
        }

        if (empty($prefs)) {
            app_json(['error' => 'Sin datos de preferencia'], 422);
        }

        $this->userDataRepository->saveUserPrefs($prefs);
        app_json(['ok' => true, 'prefs' => $this->userDataRepository->getUserPrefs()]);
    }

    public function anecdotesList()
    {
        $this->anecdoteService->bootstrapSeed();
        $topic = isset($_GET['topic']) ? trim((string) $_GET['topic']) : '';
        $q = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 80;

        $payload = $this->anecdoteService->list([
            'topic' => $topic,
            'q' => $q,
        ], $limit, auth_user_id());

        app_json([
            'ok' => true,
            'rows' => $payload['rows'],
            'topics' => $payload['topics'],
        ]);
    }

    public function anecdotesGenerate()
    {
        $input = $this->requestData();
        $topic = isset($input['topic']) ? trim((string) $input['topic']) : 'Fe';
        $row = $this->anecdoteService->generate($topic);
        app_json([
            'ok' => true,
            'row' => $row,
        ]);
    }

    public function anecdotesFavoriteToggle()
    {
        if (auth_user_id() < 1) {
            app_json(['error' => 'Inicia sesión para guardar anécdotas.'], 401);
        }

        $input = $this->requestData();
        $anecdoteId = isset($input['anecdote_id']) ? (int) $input['anecdote_id'] : 0;
        if ($anecdoteId < 1) {
            app_json(['error' => 'Parámetro inválido.'], 422);
        }

        $active = $this->anecdoteService->toggleFavorite(auth_user_id(), $anecdoteId);
        app_json(['ok' => true, 'active' => $active]);
    }

    public function linkDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->deleteLink($id);
        app_json(['ok' => $ok]);
    }

    public function aiRefresh()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;

        $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
        if (!$verseRow) {
            app_json(['error' => 'Versículo no encontrado'], 404);
        }

        $context = [
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'verse' => $verse,
            'verse_text' => $verseRow['scripture_text'],
            'pericope' => $this->bibleRepository->getPericopeHint($book, $chapter, $verse),
        ];

        $ai = $this->aiService->cardsForVerse($book, $chapter, $verse, $context, true);
        app_json(['ok' => true, 'ai' => $ai]);
    }

    private function historicalContextText($book, $chapter, $reference, $pericope)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $pericopeText = trim((string) $pericope);
        $pericopeLine = $pericopeText !== '' ? (' Perícopa cercana: "' . $pericopeText . '".') : '';

        return 'Para ' . $reference . ', el marco histórico se ubica en ' . $meta['periodo']
            . ', dentro del bloque ' . $meta['corpus'] . '. '
            . 'Audiencia/escenario principal: ' . $meta['audiencia'] . '. '
            . 'Al estudiar el capítulo ' . (int) $chapter . ', observa cómo el pasaje responde a ' . $meta['problematica'] . '.'
            . $pericopeLine;
    }

    private function literaryContextText($book, $chapter, $reference, $pericope, array $verses)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $first = '';
        if (!empty($verses[0]['scripture_text'])) {
            $first = trim((string) $verses[0]['scripture_text']);
        }
        if ($first !== '' && strlen($first) > 160) {
            $first = substr($first, 0, 160) . '...';
        }

        $pericopeText = trim((string) $pericope);
        $header = $pericopeText !== '' ? (' Encabezado del pasaje: "' . $pericopeText . '".') : '';
        $sample = $first !== '' ? (' Muestra textual inicial: "' . $first . '".') : '';

        return 'Género literario predominante: ' . $meta['genre'] . '. '
            . 'Función del capítulo ' . (int) $chapter . ': ' . $meta['chapter_function'] . '. '
            . 'Para ' . $reference . ', sigue el movimiento argumental: observación, interpretación, implicación teológica y aplicación pastoral.'
            . $header . $sample;
    }

    private function canonicalContextText($book, $reference)
    {
        $meta = $this->bookStudyMeta((int) $book);
        return 'En el marco canónico, ' . $reference . ' dialoga con el eje bíblico de ' . $meta['canonical_axis']
            . '. Relación recomendada para estudio: ' . $meta['canonical_bridge'] . '.';
    }

    private function buildStudyQuestions($book, $chapter, $reference)
    {
        $meta = $this->bookStudyMeta((int) $book);
        return [
            '¿Qué revela este pasaje del carácter de Dios en ' . $reference . '?',
            '¿Qué problema humano o comunitario aborda el texto dentro del capítulo ' . (int) $chapter . '?',
            '¿Qué términos repetidos sostienen el argumento del autor?',
            '¿Cómo conecta este pasaje con el tema mayor de ' . $meta['book_theme'] . '?',
            '¿Qué implicaciones doctrinales y pastorales se desprenden para la iglesia hoy?',
        ];
    }

    private function buildStudyTips($book, $chapter, $verseStart, $verseEnd, array $verses)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $range = (int) $verseStart === (int) $verseEnd
            ? ('v. ' . (int) $verseStart)
            : ('vv. ' . (int) $verseStart . '-' . (int) $verseEnd);

        $wordCount = 0;
        foreach ($verses as $row) {
            $wordCount += str_word_count((string) ($row['scripture_text'] ?? ''));
        }
        if ($wordCount < 1) {
            $wordCount = count($verses) * 10;
        }

        return [
            'Lee primero todo el capítulo ' . (int) $chapter . ' antes de fijarte solo en ' . $range . '.',
            'Delimita unidades: contexto inmediato (párrafo), contexto del libro y contexto canónico.',
            'Marca conectores lógicos y verbos principales; ahí suele estar el argumento del autor.',
            'Contrasta observación textual con ' . $meta['method_hint'] . ' para evitar interpretaciones aisladas.',
            'Carga textual estimada del pasaje seleccionado: ' . (int) $wordCount . ' palabras (aprox.).',
        ];
    }

    private function extractKeywordsForStudy($text, $limit)
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
            $len = function_exists('mb_strlen') ? mb_strlen($token, 'UTF-8') : strlen($token);
            if ($token === '' || $len < 4 || in_array($token, $stop, true)) {
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

    private function bookStudyMeta($book)
    {
        $book = (int) $book;
        if ($book >= 1 && $book <= 5) {
            return [
                'corpus' => 'Pentateuco',
                'periodo' => 'la etapa fundacional de Israel (patriarcas, éxodo y desierto)',
                'audiencia' => 'comunidad del pacto en formación',
                'problematica' => 'identidad del pueblo, obediencia al pacto y santidad',
                'genre' => 'narrativo-legal-teológico',
                'chapter_function' => 'establecer fundamentos de fe, culto y vida comunitaria',
                'canonical_axis' => 'creación, caída, promesa y pacto',
                'canonical_bridge' => 'éxodo-redención y cumplimiento en Cristo',
                'book_theme' => 'origen y formación del pueblo de Dios',
                'method_hint' => 'estructura narrativa y secciones legales',
            ];
        }
        if ($book >= 6 && $book <= 17) {
            return [
                'corpus' => 'Históricos del Antiguo Testamento',
                'periodo' => 'conquista, monarquía, división del reino y exilio',
                'audiencia' => 'Israel/Judá en procesos de fidelidad o crisis',
                'problematica' => 'lealtad al pacto frente a idolatría y poder político',
                'genre' => 'narrativo-histórico teológico',
                'chapter_function' => 'mostrar consecuencias de obediencia y desobediencia',
                'canonical_axis' => 'reino, juicio y esperanza de restauración',
                'canonical_bridge' => 'línea davídica y expectativa mesiánica',
                'book_theme' => 'historia redentiva en la vida nacional de Israel',
                'method_hint' => 'cronología, personajes y evaluación profética',
            ];
        }
        if ($book >= 18 && $book <= 22) {
            return [
                'corpus' => 'Sapienciales y poéticos',
                'periodo' => 'distintas etapas de la vida de Israel',
                'audiencia' => 'creyentes en búsqueda de sabiduría y adoración',
                'problematica' => 'sufrimiento, temor de Dios, justicia y sentido de vida',
                'genre' => 'poético-sapiencial',
                'chapter_function' => 'formar discernimiento espiritual y ético',
                'canonical_axis' => 'temor del Señor, adoración y sabiduría práctica',
                'canonical_bridge' => 'sabiduría bíblica y ética del Reino',
                'book_theme' => 'vida piadosa en medio de complejidades humanas',
                'method_hint' => 'paralelismos, metáforas y progresión poética',
            ];
        }
        if ($book >= 23 && $book <= 39) {
            return [
                'corpus' => 'Profetas',
                'periodo' => 'antes, durante y después del exilio',
                'audiencia' => 'pueblo del pacto en crisis espiritual y social',
                'problematica' => 'arrepentimiento, injusticia, juicio y restauración',
                'genre' => 'profético-oracular',
                'chapter_function' => 'denunciar pecado y anunciar esperanza',
                'canonical_axis' => 'santidad de Dios, juicio y promesa mesiánica',
                'canonical_bridge' => 'cumplimiento cristológico de promesas proféticas',
                'book_theme' => 'llamado al retorno del pueblo a Dios',
                'method_hint' => 'oráculos, metáforas proféticas y contexto histórico',
            ];
        }
        if ($book >= 40 && $book <= 44) {
            return [
                'corpus' => 'Evangelios y Hechos',
                'periodo' => 'siglo I (ministerio de Jesús e iglesia primitiva)',
                'audiencia' => 'comunidades cristianas en expansión misionera',
                'problematica' => 'identidad de Jesús, discipulado y misión',
                'genre' => 'narrativo-evangélico',
                'chapter_function' => 'presentar obra de Cristo y avance del evangelio',
                'canonical_axis' => 'reino de Dios, cruz, resurrección y misión',
                'canonical_bridge' => 'continuidad promesa-cumplimiento',
                'book_theme' => 'evangelio del Reino y testimonio apostólico',
                'method_hint' => 'escenas narrativas, discursos y patrón misión',
            ];
        }

        return [
            'corpus' => 'Epístolas y Apocalipsis',
            'periodo' => 'primera generación apostólica',
            'audiencia' => 'iglesias locales y líderes pastorales',
            'problematica' => 'doctrina, santidad comunitaria, perseverancia y esperanza final',
            'genre' => 'epistolar y apocalíptico',
            'chapter_function' => 'instruir, corregir y fortalecer la fe',
            'canonical_axis' => 'vida en Cristo, iglesia y consumación',
            'canonical_bridge' => 'ética apostólica y esperanza escatológica',
            'book_theme' => 'madurez doctrinal y perseverancia de la iglesia',
            'method_hint' => 'argumentación teológica, secciones paranéticas y simbolismo',
        ];
    }

    private function requestData()
    {
        if (!empty($_POST)) {
            return $_POST;
        }

        $raw = file_get_contents('php://input');
        if ($raw === '') {
            return [];
        }

        $json = json_decode($raw, true);
        if (is_array($json)) {
            return $json;
        }

        parse_str($raw, $form);
        return is_array($form) ? $form : [];
    }
}
