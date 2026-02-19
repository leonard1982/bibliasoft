<?php

namespace App\Controllers;

use App\Services\AIService;
use App\Services\AnecdoteService;
use App\Services\BibleRepository;
use App\Services\DailyVerseService;
use App\Services\DevotionalService;
use App\Services\ReadingPlanService;
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
    private $readingPlanService;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        AIService $aiService,
        SearchService $searchService,
        DevotionalService $devotionalService,
        DailyVerseService $dailyVerseService,
        AnecdoteService $anecdoteService,
        ReadingPlanService $readingPlanService
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->aiService = $aiService;
        $this->searchService = $searchService;
        $this->devotionalService = $devotionalService;
        $this->dailyVerseService = $dailyVerseService;
        $this->anecdoteService = $anecdoteService;
        $this->readingPlanService = $readingPlanService;
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
            'highlights' => $this->userDataRepository->getHighlightsForChapter($book, $chapter),
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

        $contextRef = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $pericope = $this->bibleRepository->getPericopeHint($book, $chapter, $verseStart);
        $keywords = $this->extractKeywordsForStudy($text, 8);
        $keywordInsights = $this->buildKeywordInsights($keywords);

        $context = [
            'title' => $contextRef,
            'simple_version' => $this->plainVersionText($text, $contextRef),
            'historical' => $this->historicalContextText($book, $chapter, $contextRef, $pericope, $text),
            'literary' => $this->literaryContextText($book, $chapter, $contextRef, $pericope, $verses, $keywordInsights),
            'canonical' => $this->canonicalContextText($book, $contextRef),
            'keywords' => $keywords,
            'keyword_insights' => $keywordInsights,
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

    public function highlightSet()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : 0;
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : $verseStart;
        $color = isset($input['color']) ? trim((string) $input['color']) : '';

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        if ($color === '' || $color === 'none') {
            $this->userDataRepository->clearHighlightForRange($book, $chapter, $verseStart, $verseEnd);
            app_json([
                'ok' => true,
                'highlights' => $this->userDataRepository->getHighlightsForChapter($book, $chapter),
            ]);
        }

        if (!$this->isValidHighlightColor($color)) {
            app_json(['error' => 'Color de subrayado no permitido'], 422);
        }

        $this->userDataRepository->setHighlightForRange($book, $chapter, $verseStart, $verseEnd, $color);
        app_json([
            'ok' => true,
            'highlights' => $this->userDataRepository->getHighlightsForChapter($book, $chapter),
        ]);
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

    public function readingPlanStatus()
    {
        $date = isset($_GET['date']) ? trim((string) $_GET['date']) : date('Y-m-d');
        app_json([
            'ok' => true,
            'plan' => $this->readingPlanService->status($date),
        ]);
    }

    public function readingPlanStart()
    {
        $input = $this->requestData();
        $days = isset($input['days']) ? (int) $input['days'] : 0;
        $date = isset($input['date']) ? trim((string) $input['date']) : date('Y-m-d');
        try {
            $plan = $this->readingPlanService->start($days, $date);
            app_json(['ok' => true, 'plan' => $plan]);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function readingPlanToday()
    {
        $input = $this->requestData();
        $completed = isset($input['completed']) ? (int) $input['completed'] : 1;
        $date = isset($input['date']) ? trim((string) $input['date']) : date('Y-m-d');
        try {
            $plan = $this->readingPlanService->markToday($completed === 1, $date);
            app_json(['ok' => true, 'plan' => $plan]);
        } catch (\RuntimeException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
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
        if (isset($input['reminder_enabled'])) {
            $prefs['reminder_enabled'] = (int) $input['reminder_enabled'];
        }
        if (isset($input['reminder_time'])) {
            $prefs['reminder_time'] = trim((string) $input['reminder_time']);
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

    private function historicalContextText($book, $chapter, $reference, $pericope, $text)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $pericopeText = trim((string) $pericope);
        $pericopeLine = $pericopeText !== '' ? (' Perícopa cercana: "' . $pericopeText . '".') : '';
        $focus = $this->historicalFocusHint($text);
        $focusLine = $focus !== '' ? (' Pista interna del pasaje: ' . $focus . '.') : '';

        return 'Para ' . $reference . ', el marco histórico se ubica en ' . $meta['periodo']
            . ', dentro del bloque ' . $meta['corpus'] . '. '
            . 'Vida cotidiana de la época: ' . $meta['daily_life'] . '. '
            . 'Usos y costumbres relevantes: ' . $meta['customs'] . '. '
            . 'Estructura social/religiosa: ' . $meta['social_frame'] . '. '
            . 'Audiencia/escenario principal: ' . $meta['audiencia'] . '. '
            . 'Al estudiar el capítulo ' . (int) $chapter . ', observa cómo el pasaje responde a ' . $meta['problematica'] . '.'
            . $pericopeLine
            . $focusLine;
    }

    private function literaryContextText($book, $chapter, $reference, $pericope, array $verses, array $keywordInsights)
    {
        $meta = $this->bookStudyMeta((int) $book);
        $first = '';
        if (!empty($verses[0]['scripture_text'])) {
            $first = trim((string) $verses[0]['scripture_text']);
        }
        $first = $this->truncateText($first, 160);

        $pericopeText = trim((string) $pericope);
        $header = $pericopeText !== '' ? (' Encabezado del pasaje: "' . $pericopeText . '".') : '';
        $sample = $first !== '' ? (' Muestra textual inicial: "' . $first . '".') : '';
        $terms = [];
        foreach (array_slice($keywordInsights, 0, 3) as $item) {
            $terms[] = $item['term'] . ' (' . $item['meaning'] . ')';
        }
        $termsLine = empty($terms)
            ? ''
            : (' Términos clave para leer el texto: ' . implode('; ', $terms) . '.');

        return 'Género literario predominante: ' . $meta['genre'] . '. '
            . 'Función del capítulo ' . (int) $chapter . ': ' . $meta['chapter_function'] . '. '
            . 'Para ' . $reference . ', sigue el movimiento argumental: observación, interpretación, implicación teológica y aplicación pastoral.'
            . $header . $sample . $termsLine;
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

    private function buildKeywordInsights(array $keywords)
    {
        $glossary = [
            'gracia' => ['favor inmerecido de Dios que salva y sostiene', 'ubica el texto en clave de iniciativa divina, no de mérito humano'],
            'justicia' => ['rectitud y fidelidad al estándar de Dios', 'evalúa si el pasaje habla de conducta, juicio o justicia imputada'],
            'misericordia' => ['compasión activa que socorre al necesitado', 'observa cómo el texto une verdad y compasión'],
            'pacto' => ['compromiso vinculante establecido por Dios', 'interpreta promesas y demandas dentro de la relación de pacto'],
            'santidad' => ['separación para Dios y pureza de vida', 'distingue entre lo común y lo consagrado'],
            'fe' => ['confianza obediente y perseverante en Dios', 'mira si la fe se expresa en obediencia concreta'],
            'esperanza' => ['expectativa firme basada en las promesas de Dios', 'conecta el pasaje con futuro redentor, no solo presente'],
            'redencion' => ['liberación mediante precio o rescate', 'relaciona el texto con éxodo, cruz o restauración'],
            'salvacion' => ['rescate integral del pecado y sus efectos', 'observa dimensión personal y comunitaria de la salvación'],
            'perdon' => ['cancelación de culpa y restauración relacional', 'pregunta qué cambia después del perdón'],
            'reino' => ['gobierno efectivo de Dios sobre su pueblo', 'diferencia reino como autoridad presente y consumación futura'],
            'verdad' => ['realidad revelada por Dios, confiable y normativa', 'identifica contraste con engaño o idolatría'],
            'amor' => ['entrega sacrificial orientada al bien del otro', 'evalúa si el amor se define por actos y no solo emoción'],
            'sabiduria' => ['habilidad para vivir conforme al temor de Dios', 'extrae principio práctico para decisiones reales'],
            'palabra' => ['mensaje revelado y autoritativo de Dios', 'revisa repetición de mandato, promesa o advertencia'],
            'espiritu' => ['presencia y acción de Dios que guía y transforma', 'observa fruto ético y dirección misional'],
            'pecado' => ['ruptura de la voluntad de Dios', 'mira causa, consecuencia y llamado al arrepentimiento'],
            'gloria' => ['manifestación del peso y majestad de Dios', 'ubica el centro del pasaje en Dios y no en el ser humano'],
            'temor' => ['reverencia obediente ante Dios', 'diferencia temor santo de miedo servil'],
            'discipulo' => ['aprendiz que sigue y obedece a Jesús', 'lee el pasaje en clave de formación integral'],
            'evangelio' => ['buena noticia de la obra de Cristo', 'identifica anuncio, respuesta y misión'],
            'oracion' => ['diálogo dependiente con Dios', 'evalúa motivo, contenido y actitud de la oración'],
            'justificado' => ['declarado justo por Dios', 'distingue justificación de santificación'],
            'arrepentimiento' => ['cambio de mente y dirección hacia Dios', 'busca evidencias concretas del cambio'],
            'obediencia' => ['respuesta práctica a la voluntad de Dios', 'conecta doctrina con conducta diaria'],
            'vida' => ['vida plena bajo el señorío de Dios', 'observa contraste entre vida nueva y vida antigua'],
            'muerte' => ['realidad de juicio o fin de la antigua condición', 'lee el término en su dimensión física y espiritual'],
            'luz' => ['revelación, verdad y pureza de Dios', 'contrasta luz con tinieblas en el argumento del texto'],
            'tinieblas' => ['ignorancia, maldad o oposición a Dios', 'analiza el llamado de salida hacia la luz'],
        ];

        $results = [];
        foreach ($keywords as $word) {
            $key = $this->normalizeKeywordKey($word);
            if (isset($glossary[$key])) {
                $results[] = [
                    'term' => (string) $word,
                    'meaning' => $glossary[$key][0],
                    'study_use' => $glossary[$key][1],
                    'source' => 'glosario-biblico',
                ];
            } else {
                $results[] = [
                    'term' => (string) $word,
                    'meaning' => 'término clave del pasaje que debe leerse dentro de su argumento inmediato y del libro completo',
                    'study_use' => 'revisa repetición, contraste y relación con el propósito del autor en el capítulo',
                    'source' => 'analisis-contextual',
                ];
            }
        }
        return $results;
    }

    private function normalizeKeywordKey($value)
    {
        $text = function_exists('mb_strtolower') ? mb_strtolower((string) $value, 'UTF-8') : strtolower((string) $value);
        $text = strtr($text, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ñ' => 'n',
        ]);
        return preg_replace('/[^a-z0-9]/', '', $text);
    }

    private function plainVersionText($text, $reference)
    {
        $plain = trim((string) $text);
        if ($plain === '') {
            return 'No fue posible construir una versión sencilla para ' . $reference . '.';
        }

        $replace = [
            'he aquí' => 'mira',
            'mas ' => 'pero ',
            'vosotros' => 'ustedes',
            'vosotras' => 'ustedes',
            'varón' => 'hombre',
            'siervo' => 'servidor',
            'siervos' => 'servidores',
            'iniquidad' => 'maldad',
            'redención' => 'rescate',
            'perecer' => 'perderse',
            'santificado' => 'apartado para Dios',
            'santificados' => 'apartados para Dios',
            'justificados' => 'declarados justos',
            'justificado' => 'declarado justo',
        ];
        $simple = $plain;
        foreach ($replace as $from => $to) {
            $simple = preg_replace('/\b' . preg_quote($from, '/') . '\b/ui', $to, $simple);
        }
        $simple = preg_replace('/\s+/', ' ', $simple);
        $simple = $this->truncateText($simple, 520);
        return 'Versión sencilla de ' . $reference . ': ' . $simple;
    }

    private function truncateText($text, $limit)
    {
        $text = (string) $text;
        $limit = (int) $limit;
        if ($text === '' || $limit < 1) {
            return $text;
        }

        if (function_exists('mb_strlen') && function_exists('mb_substr')) {
            if (mb_strlen($text, 'UTF-8') > $limit) {
                return mb_substr($text, 0, $limit, 'UTF-8') . '...';
            }
            return $text;
        }

        if (strlen($text) > $limit) {
            return substr($text, 0, $limit) . '...';
        }
        return $text;
    }

    private function historicalFocusHint($text)
    {
        $sample = function_exists('mb_strtolower') ? mb_strtolower((string) $text, 'UTF-8') : strtolower((string) $text);
        if ($sample === '') {
            return '';
        }

        $map = [
            'siembra' => 'la economía agrícola y los ciclos de cosecha explican varias metáforas del texto',
            'cosecha' => 'el calendario agrícola era central para trabajo, fiestas y provisión familiar',
            'rey' => 'la figura real implicaba administración, justicia y defensa del pueblo',
            'sacerdote' => 'el sacerdocio regulaba culto, pureza y mediación en la vida comunitaria',
            'templo' => 'el templo funcionaba como centro espiritual, social y simbólico de identidad',
            'sinagoga' => 'la sinagoga era espacio local de lectura, enseñanza y oración comunitaria',
            'impuesto' => 'el sistema tributario afectaba la vida diaria y el discurso social del pasaje',
            'camino' => 'los viajes por rutas antiguas marcaban comercio, misión y riesgos cotidianos',
            'banquete' => 'las comidas públicas expresaban honor, pertenencia y jerarquía social',
            'pacto' => 'los pactos incluían señales y obligaciones visibles en la vida diaria del pueblo',
        ];
        foreach ($map as $needle => $hint) {
            if (function_exists('mb_strpos')) {
                if (mb_strpos($sample, $needle) !== false) {
                    return $hint;
                }
                continue;
            }
            if (strpos($sample, $needle) !== false) {
                return $hint;
            }
        }
        return '';
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
                'daily_life' => 'vida de clan, pastoreo, agricultura inicial, viajes largos y organización tribal',
                'customs' => 'genealogías, pactos familiares, circuncisión, sacrificios y festividades del calendario sagrado',
                'social_frame' => 'familias extensas, ancianos de clan y mediación sacerdotal en el culto',
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
                'daily_life' => 'agricultura de subsistencia, ciudades amuralladas, oficios artesanales y servicio militar',
                'customs' => 'puertas de la ciudad como tribunal, alianzas políticas, juramentos y ceremonias reales',
                'social_frame' => 'reyes, profetas, sacerdotes y ancianos con tensión entre poder y fidelidad',
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
                'daily_life' => 'hogar, trabajo, mercado, tribunales y relaciones familiares como escenario moral',
                'customs' => 'poesía cantada, enseñanza proverbial, lamento público y oración congregacional',
                'social_frame' => 'sabios, familias, maestros y comunidad de adoración',
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
                'daily_life' => 'presión imperial, crisis económica, desplazamientos y ruptura social',
                'customs' => 'ayunos, lamentos, señales proféticas y llamados públicos al arrepentimiento',
                'social_frame' => 'profetas frente a reyes, élites urbanas y pueblo vulnerable',
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
                'daily_life' => 'aldeas agrícolas, pesca, comercio local y caminos controlados por Roma',
                'customs' => 'sinagoga, comidas de honor, pureza ritual, pago de tributos y peregrinaciones',
                'social_frame' => 'autoridad romana, liderazgo religioso judío y grupos populares',
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
            'daily_life' => 'casas-iglesia, trabajo manual, redes comerciales y presión cultural pagana',
            'customs' => 'lectura pública de cartas, mesas compartidas, patronazgo y disciplina comunitaria',
            'social_frame' => 'líderes locales, comunidades mixtas y tensión con el entorno imperial',
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

    private function isValidHighlightColor($color)
    {
        return in_array((string) $color, ['yellow', 'green', 'blue', 'pink', 'orange'], true);
    }
}
