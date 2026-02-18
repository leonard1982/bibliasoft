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

        $context = [
            'title' => $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd),
            'summary' => $summary,
            'historical' => 'Resumen breve del contexto histórico del pasaje seleccionado (base inicial).',
            'literary' => 'Ubicación literaria del pasaje dentro del capítulo y flujo argumental.',
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
