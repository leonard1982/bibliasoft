<?php

namespace App\Controllers;

use App\Services\AIService;
use App\Services\AnecdoteService;
use App\Services\BibleRepository;
use App\Services\CompanionChatService;
use App\Services\DailyVerseService;
use App\Services\DevotionalService;
use App\Services\DocumentExportService;
use App\Services\GenerationService;
use App\Services\ModuleCatalogService;
use App\Services\ReadingPlanService;
use App\Services\SearchService;
use App\Services\StrongLexiconService;
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
    private $strongLexiconService;
    private $documentExportService;
    private $moduleCatalogService;
    private $generationService;
    private $companionChatService;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        AIService $aiService,
        SearchService $searchService,
        DevotionalService $devotionalService,
        DailyVerseService $dailyVerseService,
        AnecdoteService $anecdoteService,
        ReadingPlanService $readingPlanService,
        StrongLexiconService $strongLexiconService,
        DocumentExportService $documentExportService,
        ModuleCatalogService $moduleCatalogService,
        GenerationService $generationService,
        CompanionChatService $companionChatService
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->aiService = $aiService;
        $this->searchService = $searchService;
        $this->devotionalService = $devotionalService;
        $this->dailyVerseService = $dailyVerseService;
        $this->anecdoteService = $anecdoteService;
        $this->readingPlanService = $readingPlanService;
        $this->strongLexiconService = $strongLexiconService;
        $this->documentExportService = $documentExportService;
        $this->moduleCatalogService = $moduleCatalogService;
        $this->generationService = $generationService;
        $this->companionChatService = $companionChatService;
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
            'commentary' => $this->mergeCommentaryPayload(
                $this->bibleRepository->getCommentariesForVerse($book, $chapter, $verse),
                $book,
                $chapter,
                $verse,
                $verse
            ),
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

    public function chapterParallel()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        if ($book < 1 || $chapter < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        $compareFiles = [];
        $rawCompareFiles = isset($_GET['compare_files']) ? $_GET['compare_files'] : '';
        if (is_array($rawCompareFiles)) {
            $tokens = $rawCompareFiles;
        } else {
            $tokens = preg_split('/[,;\r\n]+/', trim((string) $rawCompareFiles));
        }
        if (is_array($tokens)) {
            foreach ($tokens as $token) {
                $file = basename(trim((string) $token));
                if ($file === '' || !preg_match('/\.bbli$/i', $file)) {
                    continue;
                }
                if (!in_array($file, $compareFiles, true)) {
                    $compareFiles[] = $file;
                }
                if (count($compareFiles) >= 3) {
                    break;
                }
            }
        }

        $parallel = $this->bibleRepository->getParallelChapterSet($book, $chapter, $compareFiles, 3);
        app_json([
            'ok' => true,
            'parallel' => $parallel,
        ]);
    }

    public function versionsList()
    {
        app_json([
            'ok' => true,
            'versions' => $this->bibleRepository->getVersionSelectionPayload(),
        ]);
    }

    public function versionsSet()
    {
        $input = $this->requestData();
        $payload = $this->bibleRepository->getVersionSelectionPayload();
        $catalog = isset($payload['versions']) && is_array($payload['versions']) ? $payload['versions'] : [];
        $current = isset($payload['current']) && is_array($payload['current']) ? $payload['current'] : [];

        $allowedFiles = [];
        foreach ($catalog as $row) {
            $file = isset($row['file']) ? basename((string) $row['file']) : '';
            if ($file !== '') {
                $allowedFiles[$file] = true;
            }
        }
        if (empty($allowedFiles)) {
            app_json(['error' => 'No hay versiones disponibles para seleccionar.'], 422);
        }

        $primary = isset($input['primary_file']) ? basename(trim((string) $input['primary_file'])) : '';
        $compare = isset($input['compare_file']) ? basename(trim((string) $input['compare_file'])) : '';
        $compareFiles = [];
        if (isset($input['compare_files'])) {
            if (is_array($input['compare_files'])) {
                $tokens = $input['compare_files'];
            } else {
                $tokens = preg_split('/[,;\r\n]+/', trim((string) $input['compare_files']));
            }
            if (is_array($tokens)) {
                foreach ($tokens as $token) {
                    $file = basename(trim((string) $token));
                    if ($file === '' || !isset($allowedFiles[$file])) {
                        continue;
                    }
                    if (!in_array($file, $compareFiles, true)) {
                        $compareFiles[] = $file;
                    }
                    if (count($compareFiles) >= 3) {
                        break;
                    }
                }
            }
        }

        if ($primary === '') {
            $primary = basename((string) ($current['primary_file'] ?? ''));
        }
        if ($compare === '') {
            $compare = basename((string) ($current['compare_file'] ?? ''));
        }

        if ($primary === '' || !isset($allowedFiles[$primary])) {
            app_json(['error' => 'Versión principal inválida.'], 422);
        }
        if ($compare === '' || !isset($allowedFiles[$compare])) {
            $compare = $primary;
        }
        if (empty($compareFiles)) {
            $compareFiles[] = $compare;
        }

        $filteredCompareFiles = [];
        foreach ($compareFiles as $file) {
            if ($file === $primary || !isset($allowedFiles[$file])) {
                continue;
            }
            if (!in_array($file, $filteredCompareFiles, true)) {
                $filteredCompareFiles[] = $file;
            }
            if (count($filteredCompareFiles) >= 3) {
                break;
            }
        }
        if (empty($filteredCompareFiles)) {
            if ($compare !== $primary && isset($allowedFiles[$compare])) {
                $filteredCompareFiles[] = $compare;
            } else {
                foreach (array_keys($allowedFiles) as $candidate) {
                    if ($candidate === $primary) {
                        continue;
                    }
                    $filteredCompareFiles[] = $candidate;
                    break;
                }
            }
        }
        if (!empty($filteredCompareFiles)) {
            $compare = $filteredCompareFiles[0];
        } else {
            $compare = $primary;
        }

        $_SESSION['bible_primary_file'] = $primary;
        $_SESSION['bible_compare_file'] = $compare;
        $_SESSION['bible_compare_files'] = $filteredCompareFiles;

        app_json([
            'ok' => true,
            'selected' => [
                'primary_file' => $primary,
                'compare_file' => $compare,
                'compare_files' => $filteredCompareFiles,
            ],
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
        $this->userDataRepository->savePassageHistory($book, $chapter, $verseStart, $verseEnd);

        $plain = [];
        foreach ($verses as $row) {
            $plain[] = $row['scripture_text'];
        }
        $text = trim(implode(' ', $plain));

        $contextRef = $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $pericope = $this->bibleRepository->getPericopeHint($book, $chapter, $verseStart);
        $cachedSelection = $this->loadSelectionPassageCache($book, $chapter, $verseStart, $verseEnd, $text, $pericope);
        $cacheNeedsRefresh = false;
        $crossReferences = null;
        if ($cachedSelection) {
            $context = isset($cachedSelection['context']) && is_array($cachedSelection['context'])
                ? $cachedSelection['context']
                : [];
            $commentary = isset($cachedSelection['commentary']) && is_array($cachedSelection['commentary'])
                ? $cachedSelection['commentary']
                : ['book' => [], 'chapter' => [], 'verse' => []];
            if (isset($cachedSelection['cross_references']) && is_array($cachedSelection['cross_references'])) {
                $crossReferences = $cachedSelection['cross_references'];
            } else {
                $cacheNeedsRefresh = true;
            }
        } else {
            $cacheNeedsRefresh = true;
            $meta = $this->bookStudyMeta((int) $book);
            $keywords = $this->extractKeywordsForStudy($text, 8);
            $keywordInsights = $this->buildKeywordInsights($keywords, $verses);
            $wordCount = $this->estimatePassageWordCount($verses);
            $rangeLabel = (int) $verseStart === (int) $verseEnd
                ? ('v. ' . (int) $verseStart)
                : ('vv. ' . (int) $verseStart . '-' . (int) $verseEnd);
            $signals = $this->buildPassageContextSignals(
                $book,
                $chapter,
                $contextRef,
                $pericope,
                $text,
                $keywords,
                $verses
            );

            $context = [
                'title' => $contextRef,
                'simple_version' => $this->plainVersionText($text, $contextRef),
                'historical' => $this->historicalContextText($book, $chapter, $contextRef, $pericope, $text, $signals),
                'literary' => $this->literaryContextText($book, $chapter, $contextRef, $pericope, $verses, $keywordInsights, $signals),
                'canonical' => $this->canonicalContextText($book, $contextRef, $signals),
                'keywords' => $keywords,
                'keyword_insights' => $keywordInsights,
                'original_language' => $this->buildOriginalLanguageInsights($book, $chapter, $contextRef, $pericope, $text, $keywords, $verses),
                'main_idea' => $this->buildContextMainIdea($contextRef, $pericope, $meta, $keywords, $verseStart, $verseEnd, $verses),
                'study_meta' => [
                    'corpus' => (string) ($meta['corpus'] ?? ''),
                    'genre' => (string) ($meta['genre'] ?? ''),
                    'book_theme' => (string) ($meta['book_theme'] ?? ''),
                    'chapter_function' => (string) ($meta['chapter_function'] ?? ''),
                    'method_hint' => (string) ($meta['method_hint'] ?? ''),
                    'canonical_axis' => (string) ($meta['canonical_axis'] ?? ''),
                    'word_count' => (int) $wordCount,
                    'range_label' => $rangeLabel,
                ],
                'biblical_sciences' => isset($signals['sciences']) && is_array($signals['sciences']) ? $signals['sciences'] : [],
                'customs_notes' => isset($signals['customs']) && is_array($signals['customs']) ? $signals['customs'] : [],
                'literary_clues' => isset($signals['literary_clues']) && is_array($signals['literary_clues']) ? $signals['literary_clues'] : [],
                'canonical_links' => isset($signals['canonical_links']) && is_array($signals['canonical_links']) ? $signals['canonical_links'] : [],
                'application' => $this->buildContextApplication($contextRef, $meta, $keywords, $chapter),
                'observation_guide' => $this->buildObservationGuide($meta, $chapter, $keywordInsights, $wordCount),
                'questions' => $this->buildStudyQuestions($book, $chapter, $contextRef),
                'study_tips' => $this->buildStudyTips($book, $chapter, $verseStart, $verseEnd, $verses),
            ];
            $commentary = $this->mergeCommentaryPayload(
                $this->bibleRepository->getCommentariesForRange($book, $chapter, $verseStart, $verseEnd),
                $book,
                $chapter,
                $verseStart,
                $verseEnd
            );
        }

        $crossKeywords = isset($context['keywords']) && is_array($context['keywords'])
            ? $context['keywords']
            : $this->extractKeywordsForStudy($text, 8);
        if (!is_array($crossReferences)) {
            $crossReferences = $this->buildAutoCrossReferences($book, $chapter, $verseStart, $verseEnd, $text, $crossKeywords, 8);
            $cacheNeedsRefresh = true;
        }
        if ($cacheNeedsRefresh) {
            $this->saveSelectionPassageCache(
                $book,
                $chapter,
                $verseStart,
                $verseEnd,
                $text,
                $pericope,
                $context,
                $commentary,
                $crossReferences
            );
        }

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
            'commentary' => $commentary,
            'cache' => [
                'passage' => $cachedSelection ? 'hit' : 'miss',
            ],
            'notes' => $this->userDataRepository->getNotesForRange($book, $chapter, $verseStart, $verseEnd),
            'links' => $this->userDataRepository->getLinksForRange($book, $chapter, $verseStart, $verseEnd),
            'cross_references' => $crossReferences,
            'history' => $this->userDataRepository->getHistory(8),
            'smart_history' => $this->userDataRepository->getSmartHistory(8, 8, 8),
        ]);
    }

    private function loadSelectionPassageCache($book, $chapter, $verseStart, $verseEnd, $text, $pericope = '')
    {
        $promptHash = $this->buildSelectionPassagePromptHash($book, $chapter, $verseStart, $verseEnd, $text, $pericope);
        $cacheFile = $this->selectionPassageCacheFilePath($promptHash);
        $filePayload = $this->readSelectionPassageCacheFile($cacheFile, 43200);
        if (is_array($filePayload)) {
            return $filePayload;
        }

        $row = $this->userDataRepository->getGenerationCache(
            (int) $book,
            (int) $chapter,
            (int) $verseStart,
            (int) $verseEnd,
            'selection_payload_v2',
            $promptHash
        );
        if (!is_array($row) || !$this->isFreshCacheRow($row, 43200)) {
            return null;
        }
        $payload = json_decode((string) ($row['response'] ?? ''), true);
        if (!is_array($payload)) {
            return null;
        }
        $context = isset($payload['context']) && is_array($payload['context']) ? $payload['context'] : null;
        $commentary = isset($payload['commentary']) && is_array($payload['commentary']) ? $payload['commentary'] : null;
        $crossReferences = null;
        if (array_key_exists('cross_references', $payload) && is_array($payload['cross_references'])) {
            $crossReferences = $payload['cross_references'];
        }
        if (!$context || !$commentary) {
            return null;
        }
        return [
            'context' => $context,
            'commentary' => $commentary,
            'cross_references' => $crossReferences,
        ];
    }

    private function saveSelectionPassageCache($book, $chapter, $verseStart, $verseEnd, $text, $pericope, array $context, array $commentary, array $crossReferences = [])
    {
        $promptHash = $this->buildSelectionPassagePromptHash($book, $chapter, $verseStart, $verseEnd, $text, $pericope);
        $payload = [
            'context' => $context,
            'commentary' => $commentary,
            'cross_references' => $crossReferences,
        ];
        $this->writeSelectionPassageCacheFile($this->selectionPassageCacheFilePath($promptHash), $payload);
        $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
        if (!is_string($encoded) || $encoded === '') {
            return;
        }
        try {
            $this->userDataRepository->saveGenerationCache(
                (int) $book,
                (int) $chapter,
                (int) $verseStart,
                (int) $verseEnd,
                'selection_payload_v2',
                $promptHash,
                $encoded
            );
        } catch (\Throwable $e) {
            // El cache de archivo ya se guardó; no interrumpimos la respuesta.
        }
    }

    private function buildSelectionPassagePromptHash($book, $chapter, $verseStart, $verseEnd, $text, $pericope = '')
    {
        $parts = [
            'selection-v3',
            (int) $book,
            (int) $chapter,
            (int) $verseStart,
            (int) $verseEnd,
            hash('sha256', (string) $text),
            hash('sha256', (string) $pericope),
        ];
        return hash('sha256', implode('|', $parts));
    }

    private function isFreshCacheRow(array $row, $ttlSeconds)
    {
        $ttl = max(60, (int) $ttlSeconds);
        $createdAt = trim((string) ($row['created_at'] ?? ''));
        if ($createdAt === '') {
            return false;
        }
        $createdTs = strtotime($createdAt);
        if ($createdTs === false) {
            return false;
        }
        return (time() - $createdTs) <= $ttl;
    }

    private function selectionPassageCacheFilePath($promptHash)
    {
        $basePath = (string) config('app.base_path', dirname(__DIR__, 2));
        return rtrim($basePath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR . 'storage'
            . DIRECTORY_SEPARATOR . 'cache'
            . DIRECTORY_SEPARATOR . 'selection'
            . DIRECTORY_SEPARATOR . $promptHash . '.json';
    }

    private function readSelectionPassageCacheFile($path, $ttlSeconds)
    {
        $file = trim((string) $path);
        if ($file === '' || !is_file($file)) {
            return null;
        }
        $ttl = max(60, (int) $ttlSeconds);
        $mtime = @filemtime($file);
        if (!is_int($mtime) || (time() - $mtime) > $ttl) {
            @unlink($file);
            return null;
        }
        $raw = @file_get_contents($file);
        if (!is_string($raw) || trim($raw) === '') {
            return null;
        }
        $payload = json_decode($raw, true);
        if (!is_array($payload)) {
            return null;
        }
        $context = isset($payload['context']) && is_array($payload['context']) ? $payload['context'] : null;
        $commentary = isset($payload['commentary']) && is_array($payload['commentary']) ? $payload['commentary'] : null;
        $crossReferences = null;
        if (array_key_exists('cross_references', $payload) && is_array($payload['cross_references'])) {
            $crossReferences = $payload['cross_references'];
        }
        if (!$context || !$commentary) {
            return null;
        }
        return [
            'context' => $context,
            'commentary' => $commentary,
            'cross_references' => $crossReferences,
        ];
    }

    private function writeSelectionPassageCacheFile($path, array $payload)
    {
        $file = trim((string) $path);
        if ($file === '') {
            return;
        }
        $dir = dirname($file);
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            return;
        }
        $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
        if (!is_string($encoded) || $encoded === '') {
            return;
        }
        @file_put_contents($file, $encoded, LOCK_EX);
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

    public function favoriteSnapshot()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verse = isset($_GET['verse']) ? (int) $_GET['verse'] : 0;
        $folderId = isset($_GET['folder_id']) ? (int) $_GET['folder_id'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 300;

        $folders = $this->userDataRepository->getFavoriteFoldersWithCounts();
        $folderIds = [];
        foreach ($folders as $folder) {
            $id = (int) ($folder['id'] ?? 0);
            if ($id > 0) {
                $folderIds[$id] = true;
            }
        }

        $selectedFolderId = 0;
        if ($folderId > 0 && isset($folderIds[$folderId])) {
            $selectedFolderId = $folderId;
        } elseif (isset($folderIds[1])) {
            $selectedFolderId = 1;
        } elseif (!empty($folders)) {
            $selectedFolderId = (int) ($folders[0]['id'] ?? 0);
        }

        $favorites = $this->userDataRepository->getFavorites($selectedFolderId, $limit);
        $current = null;
        if ($book > 0 && $chapter > 0 && $verse > 0) {
            $current = $this->userDataRepository->findFavorite($book, $chapter, $verse);
        }

        app_json([
            'ok' => true,
            'selected_folder_id' => $selectedFolderId,
            'folders' => $folders,
            'favorites' => $favorites,
            'current' => $current,
        ]);
    }

    public function favoriteSave()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;
        $folderId = isset($input['folder_id']) ? (int) $input['folder_id'] : 0;

        if ($book < 1 || $chapter < 1 || $verse < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        try {
            $favorite = $this->userDataRepository->saveFavorite($book, $chapter, $verse, $folderId);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json([
            'ok' => true,
            'favorite' => $favorite,
        ]);
    }

    public function favoriteRemove()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;
        if ($book < 1 || $chapter < 1 || $verse < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        $ok = $this->userDataRepository->removeFavorite($book, $chapter, $verse);
        app_json(['ok' => $ok]);
    }

    public function favoriteFolderCreate()
    {
        $input = $this->requestData();
        $name = isset($input['name']) ? trim((string) $input['name']) : '';
        if ($name === '') {
            app_json(['error' => 'Nombre de carpeta requerido'], 422);
        }

        try {
            $folder = $this->userDataRepository->createFavoriteFolder($name);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json([
            'ok' => true,
            'folder' => $folder,
        ], !empty($folder['created']) ? 201 : 200);
    }

    public function studyProjectsList()
    {
        $projects = $this->userDataRepository->getStudyProjects();
        app_json([
            'ok' => true,
            'projects' => $projects,
        ]);
    }

    public function studyProjectCreate()
    {
        $input = $this->requestData();
        $name = isset($input['name']) ? trim((string) $input['name']) : '';
        $description = isset($input['description']) ? trim((string) $input['description']) : '';
        $color = isset($input['color']) ? trim((string) $input['color']) : '#1d6a8f';
        if ($name === '') {
            app_json(['error' => 'El nombre del proyecto es obligatorio.'], 422);
        }

        try {
            $project = $this->userDataRepository->createStudyProject($name, $description, $color);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json([
            'ok' => true,
            'project' => $project,
        ], !empty($project['created']) ? 201 : 200);
    }

    public function studyProjectUpdate()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        $name = isset($input['name']) ? trim((string) $input['name']) : '';
        $description = isset($input['description']) ? trim((string) $input['description']) : '';
        $color = isset($input['color']) ? trim((string) $input['color']) : '#1d6a8f';
        if ($id < 1 || $name === '') {
            app_json(['error' => 'Parámetros inválidos.'], 422);
        }

        try {
            $ok = $this->userDataRepository->updateStudyProject($id, $name, $description, $color);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json(['ok' => $ok]);
    }

    public function studyProjectDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos.'], 422);
        }

        $ok = $this->userDataRepository->deleteStudyProject($id);
        app_json(['ok' => $ok]);
    }

    public function studyEntriesList()
    {
        $projectId = isset($_GET['project_id']) ? (int) $_GET['project_id'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 300;
        if ($projectId < 1) {
            app_json(['error' => 'Proyecto inválido.'], 422);
        }
        $entries = $this->userDataRepository->getStudyProjectEntries($projectId, $limit);
        app_json([
            'ok' => true,
            'entries' => $entries,
        ]);
    }

    public function studyEntryCreate()
    {
        $input = $this->requestData();
        $projectId = isset($input['project_id']) ? (int) $input['project_id'] : 0;
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : (isset($input['verse']) ? (int) $input['verse'] : 0);
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : $verseStart;
        $note = isset($input['note']) ? trim((string) $input['note']) : '';
        $strongCode = isset($input['strong_code']) ? trim((string) $input['strong_code']) : '';
        $strongTerm = isset($input['strong_term']) ? trim((string) $input['strong_term']) : '';
        $commentary = isset($input['commentary_excerpt']) ? trim((string) $input['commentary_excerpt']) : '';

        if ($projectId < 1 || $book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            app_json(['error' => 'Parámetros inválidos.'], 422);
        }

        try {
            $id = $this->userDataRepository->createStudyProjectEntry(
                $projectId,
                $book,
                $chapter,
                $verseStart,
                $verseEnd,
                $note,
                $strongCode,
                $strongTerm,
                $commentary
            );
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json(['ok' => true, 'id' => $id], 201);
    }

    public function studyEntryUpdate()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        $note = isset($input['note']) ? trim((string) $input['note']) : '';
        $strongCode = isset($input['strong_code']) ? trim((string) $input['strong_code']) : '';
        $strongTerm = isset($input['strong_term']) ? trim((string) $input['strong_term']) : '';
        $commentary = isset($input['commentary_excerpt']) ? trim((string) $input['commentary_excerpt']) : '';
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos.'], 422);
        }

        try {
            $ok = $this->userDataRepository->updateStudyProjectEntry($id, $note, $strongCode, $strongTerm, $commentary);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json(['ok' => $ok]);
    }

    public function studyEntryDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos.'], 422);
        }
        $ok = $this->userDataRepository->deleteStudyProjectEntry($id);
        app_json(['ok' => $ok]);
    }

    public function studyNoteExplain()
    {
        $this->requireAuthJson();
        $input = $this->requestData();
        $selectedText = isset($input['selected_text']) ? trim((string) $input['selected_text']) : '';
        $reference = isset($input['reference']) ? trim((string) $input['reference']) : '';
        $noteContext = isset($input['note_context']) ? trim((string) $input['note_context']) : '';

        if ($selectedText === '') {
            app_json(['error' => 'Selecciona primero una palabra o frase.'], 422);
        }

        try {
            $analysis = $this->generationService->explainStudySelection([
                'selected_text' => $selectedText,
                'reference' => $reference,
                'note_context' => $noteContext,
            ]);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json([
            'ok' => true,
            'analysis' => $analysis,
        ]);
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
        $testament = isset($_GET['testament']) ? trim((string) $_GET['testament']) : 'all';
        $chapterFrom = isset($_GET['chapter_from']) ? (int) $_GET['chapter_from'] : 0;
        $chapterTo = isset($_GET['chapter_to']) ? (int) $_GET['chapter_to'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : (int) config('search.default_limit', 60);

        if (!in_array($mode, ['any', 'all', 'word', 'exact'], true)) {
            $mode = 'any';
        }
        if (!in_array($testament, ['all', 'ot', 'nt'], true)) {
            $testament = 'all';
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
            'testament' => $testament,
            'chapter_from' => $chapterFrom,
            'chapter_to' => $chapterTo,
        ], $limit);

        foreach ($result['rows'] as &$row) {
            $row['reference'] = $this->bibleRepository->buildReferenceLabel($row['book'], $row['chapter'], $row['verse']);
        }

        app_json($result);
    }

    public function searchTheme()
    {
        $themeRaw = isset($_GET['theme']) ? trim((string) $_GET['theme']) : '';
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $testament = isset($_GET['testament']) ? trim((string) $_GET['testament']) : 'all';
        $chapterFrom = isset($_GET['chapter_from']) ? (int) $_GET['chapter_from'] : 0;
        $chapterTo = isset($_GET['chapter_to']) ? (int) $_GET['chapter_to'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : (int) config('search.default_limit', 60);
        $limit = max(5, min(120, $limit));
        if (!in_array($testament, ['all', 'ot', 'nt'], true)) {
            $testament = 'all';
        }

        $catalog = $this->themeConcordanceCatalog();
        $resolved = $this->resolveThemeEntry($themeRaw, $catalog);

        if (!$resolved) {
            app_json([
                'ok' => true,
                'engine' => 'theme_concordance',
                'rows' => [],
                'meta' => [
                    'theme_key' => '',
                    'theme_label' => '',
                    'theme_query' => '',
                ],
            ]);
        }

        $tokens = $this->buildThemeTokens($resolved);
        $queryTokens = [];
        foreach ($tokens as $token) {
            $normalizedToken = $this->normalizeThemeToken((string) $token);
            if ($this->mbStrlen($normalizedToken) < 3) {
                continue;
            }
            $queryTokens[] = (string) $token;
        }
        $query = implode(' ', array_slice($queryTokens, 0, 7));
        if ($query === '') {
            $query = (string) $resolved['label'];
        }

        $search = $this->searchService->search([
            'query' => $query,
            'mode' => 'any',
            'book' => $book,
            'testament' => $testament,
            'chapter_from' => $chapterFrom,
            'chapter_to' => $chapterTo,
        ], min(220, max($limit * 3, 120)));

        $rows = isset($search['rows']) && is_array($search['rows']) ? $search['rows'] : [];
        foreach ($rows as &$row) {
            $row['reference'] = $this->bibleRepository->buildReferenceLabel($row['book'], $row['chapter'], $row['verse']);
            $row['theme_score'] = $this->scoreThemeRow($row, $tokens, (string) $resolved['key']);
        }
        unset($row);

        usort($rows, function (array $a, array $b): int {
            $scoreA = (int) ($a['theme_score'] ?? 0);
            $scoreB = (int) ($b['theme_score'] ?? 0);
            if ($scoreA === $scoreB) {
                $keyA = sprintf('%03d-%03d-%03d', (int) ($a['book'] ?? 0), (int) ($a['chapter'] ?? 0), (int) ($a['verse'] ?? 0));
                $keyB = sprintf('%03d-%03d-%03d', (int) ($b['book'] ?? 0), (int) ($b['chapter'] ?? 0), (int) ($b['verse'] ?? 0));
                return strcmp($keyA, $keyB);
            }
            return $scoreB <=> $scoreA;
        });

        $seedRows = $this->buildThemeSeedRows($resolved);
        $finalRows = [];
        $seen = [];

        foreach ($seedRows as $seed) {
            $key = $this->themeRowKey($seed);
            if ($key === '' || isset($seen[$key])) {
                continue;
            }
            if ($book > 0 && (int) $seed['book'] !== $book) {
                continue;
            }
            if ($testament !== 'all') {
                $seedIsNt = $this->isNewTestamentBook((int) ($seed['book'] ?? 0));
                if (($testament === 'nt' && !$seedIsNt) || ($testament === 'ot' && $seedIsNt)) {
                    continue;
                }
            }
            if ($chapterFrom > 0 && (int) $seed['chapter'] < $chapterFrom) {
                continue;
            }
            if ($chapterTo > 0 && (int) $seed['chapter'] > $chapterTo) {
                continue;
            }
            $seen[$key] = true;
            $finalRows[] = $seed;
            if (count($finalRows) >= $limit) {
                break;
            }
        }

        foreach ($rows as $row) {
            if ((int) ($row['theme_score'] ?? 0) < 2) {
                continue;
            }
            $key = $this->themeRowKey($row);
            if ($key === '' || isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            unset($row['theme_score']);
            $finalRows[] = $row;
            if (count($finalRows) >= $limit) {
                break;
            }
        }

        $themeHits = max(1, min(60, count($finalRows)));
        $this->userDataRepository->logThemeStudy((string) $resolved['key'], date('Y-m-d'), $themeHits);

        app_json([
            'ok' => true,
            'engine' => 'theme_concordance',
            'rows' => $finalRows,
            'meta' => [
                'theme_key' => (string) $resolved['key'],
                'theme_label' => (string) $resolved['label'],
                'theme_query' => $query,
            ],
        ]);
    }

    public function strongLookup()
    {
        $codesRaw = isset($_GET['codes']) ? trim((string) $_GET['codes']) : '';
        if ($codesRaw === '') {
            $single = isset($_GET['code']) ? trim((string) $_GET['code']) : '';
            $codesRaw = $single;
        }

        $codes = $this->parseStrongCodes($codesRaw);
        if (empty($codes)) {
            app_json(['error' => 'Código Strong inválido'], 422);
        }

        if (!$this->strongLexiconService->available()) {
            app_json([
                'error' => 'Léxico Strong no disponible. Ejecute: php scripts/build_strongs_lexicon.php',
            ], 503);
        }

        $hintBook = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $hintChapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $hintVerse = isset($_GET['verse']) ? (int) $_GET['verse'] : 0;
        $hintWord = isset($_GET['word']) ? trim((string) $_GET['word']) : '';

        $entries = $this->strongLexiconService->lookupMany($codes);
        $enriched = [];
        foreach ($entries as $entry) {
            $enriched[] = $this->enrichStrongEntry(
                $entry,
                $hintBook,
                $hintChapter,
                $hintVerse,
                $hintWord
            );
        }
        $dictionaryRows = [];
        if ($hintWord !== '') {
            $dictionaryRows = $this->moduleCatalogService->lookupDictionary($hintWord, 6);
        }

        app_json([
            'ok' => true,
            'codes' => $codes,
            'entries' => $enriched,
            'dictionary_rows' => $dictionaryRows,
        ]);
    }

    public function interlinear()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verseStart = isset($_GET['verse_start']) ? (int) $_GET['verse_start'] : (isset($_GET['verse']) ? (int) $_GET['verse'] : 0);
        $verseEnd = isset($_GET['verse_end']) ? (int) $_GET['verse_end'] : $verseStart;

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        if ($verseStart > $verseEnd) {
            $tmp = $verseStart;
            $verseStart = $verseEnd;
            $verseEnd = $tmp;
        }
        if (($verseEnd - $verseStart) > 20) {
            app_json(['error' => 'Rango demasiado amplio para interlineal (máx. 20 versículos).'], 422);
        }

        $rows = $this->bibleRepository->getInterlinearRange($book, $chapter, $verseStart, $verseEnd);
        if (empty($rows)) {
            app_json(['error' => 'No se pudo construir el interlineal para este rango.'], 404);
        }

        $uniqueCodes = [];
        foreach ($rows as $row) {
            $tokens = isset($row['tokens']) && is_array($row['tokens']) ? $row['tokens'] : [];
            foreach ($tokens as $token) {
                $codeList = $this->parseStrongCodes((string) ($token['code'] ?? ''));
                foreach ($codeList as $code) {
                    $uniqueCodes[$code] = true;
                }
            }
        }
        $catalog = [];
        if (!empty($uniqueCodes) && $this->strongLexiconService->available()) {
            $entries = $this->strongLexiconService->lookupMany(array_keys($uniqueCodes));
            foreach ($entries as $entry) {
                $code = strtoupper(trim((string) ($entry['code'] ?? '')));
                if ($code !== '') {
                    $catalog[$code] = $entry;
                }
            }
        }

        $normalizedRows = [];
        foreach ($rows as $row) {
            $tokensOut = [];
            $tokens = isset($row['tokens']) && is_array($row['tokens']) ? $row['tokens'] : [];
            foreach ($tokens as $token) {
                $word = trim((string) ($token['word'] ?? ''));
                $codeRaw = trim((string) ($token['code'] ?? ''));
                if ($word === '' || $codeRaw === '') {
                    continue;
                }
                $codeList = $this->parseStrongCodes($codeRaw);
                if (empty($codeList)) {
                    continue;
                }

                $tokenEntries = [];
                foreach ($codeList as $code) {
                    if (isset($catalog[$code])) {
                        $tokenEntries[] = $catalog[$code];
                    }
                }
                $tokensOut[] = [
                    'word' => $word,
                    'code' => implode(',', $codeList),
                    'entries' => $tokenEntries,
                ];
            }

            $normalizedRows[] = [
                'book' => (int) ($row['book'] ?? 0),
                'chapter' => (int) ($row['chapter'] ?? 0),
                'verse' => (int) ($row['verse'] ?? 0),
                'reference' => (string) ($row['reference'] ?? ''),
                'tokens' => $tokensOut,
            ];
        }

        app_json([
            'ok' => true,
            'rows' => $normalizedRows,
        ]);
    }

    public function devotionalGenerate()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;
        $date = isset($input['date']) ? trim((string) $input['date']) : date('Y-m-d');

        try {
            $payload = $this->devotionalService->generateNew([
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'date' => $date,
            ]);
            app_json([
                'ok' => true,
                'devotional' => $payload,
            ]);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        } catch (\RuntimeException $e) {
            app_json(['error' => $e->getMessage()], 422);
        } catch (\Throwable $e) {
            error_log('[BIBLIASOFT][devotional.generate] ' . $e->getMessage());
            app_json([
                'error' => 'No se pudo generar el devocional en este momento. Intenta nuevamente en unos segundos.',
                'code' => 'devotional_generate_failed',
            ], 500);
        }
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

    public function readingPlanChapter()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $completed = isset($input['completed']) ? (int) $input['completed'] : 1;
        $date = isset($input['date']) ? trim((string) $input['date']) : date('Y-m-d');

        if ($book < 1 || $chapter < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        try {
            $plan = $this->readingPlanService->markChapter($book, $chapter, $completed === 1, $date);
            app_json(['ok' => true, 'plan' => $plan]);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
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
        if (isset($input['weekly_goal_days'])) {
            $prefs['weekly_goal_days'] = (int) $input['weekly_goal_days'];
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

    public function modulesList()
    {
        app_json([
            'ok' => true,
            'modules' => $this->moduleCatalogService->listModules(),
        ]);
    }

    public function modulesInstall()
    {
        $input = $this->requestData();
        $moduleKey = isset($input['key']) ? trim((string) $input['key']) : '';
        if ($moduleKey === '') {
            app_json(['error' => 'Clave de módulo requerida.'], 422);
        }

        try {
            $module = $this->moduleCatalogService->installModule($moduleKey);
            app_json([
                'ok' => true,
                'module' => $module,
                'modules' => $this->moduleCatalogService->listModules(),
            ]);
        } catch (\Throwable $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function modulesToggle()
    {
        $input = $this->requestData();
        $moduleKey = isset($input['key']) ? trim((string) $input['key']) : '';
        $enabled = isset($input['enabled']) ? (int) $input['enabled'] : 0;
        if ($moduleKey === '') {
            app_json(['error' => 'Clave de módulo requerida.'], 422);
        }

        try {
            $module = $this->moduleCatalogService->setModuleEnabled($moduleKey, $enabled === 1);
            app_json([
                'ok' => true,
                'module' => $module,
                'modules' => $this->moduleCatalogService->listModules(),
            ]);
        } catch (\Throwable $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function dictionaryLookup()
    {
        $query = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 12;

        app_json([
            'ok' => true,
            'query' => $query,
            'rows' => $this->moduleCatalogService->lookupDictionary($query, $limit),
        ]);
    }

    public function mapsLookup()
    {
        $query = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verseStart = isset($_GET['verse_start']) ? (int) $_GET['verse_start'] : 0;
        $verseEnd = isset($_GET['verse_end']) ? (int) $_GET['verse_end'] : 0;
        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 8;

        app_json([
            'ok' => true,
            'query' => $query,
            'rows' => $this->moduleCatalogService->lookupMaps($query, $book, $chapter, $verseStart, $verseEnd, $limit),
        ]);
    }

    public function statsPanel()
    {
        $days = isset($_GET['days']) ? (int) $_GET['days'] : 7;
        $topThemes = isset($_GET['top_themes']) ? (int) $_GET['top_themes'] : 6;
        app_json([
            'ok' => true,
            'stats' => $this->userDataRepository->getReadingStatsPanel($days, $topThemes),
        ]);
    }

    public function statsTrack()
    {
        $input = $this->requestData();
        $seconds = isset($input['seconds']) ? (int) $input['seconds'] : 0;
        $date = isset($input['date']) ? trim((string) $input['date']) : date('Y-m-d');

        if ($seconds < 1) {
            app_json(['error' => 'Tiempo de lectura inválido.'], 422);
        }

        $this->userDataRepository->addReadingSessionSeconds($date, $seconds);
        app_json([
            'ok' => true,
            'tracked_seconds' => max(1, min(6 * 3600, $seconds)),
            'date' => $date,
        ]);
    }

    public function reminderInsight()
    {
        $prefs = $this->userDataRepository->getUserPrefs();
        $scheduledTime = isset($_GET['time']) ? trim((string) $_GET['time']) : trim((string) ($prefs['reminder_time'] ?? '07:00'));
        if (!preg_match('/^\d{2}:\d{2}$/', $scheduledTime)) {
            $scheduledTime = '07:00';
        }

        $stats = $this->userDataRepository->getReadingStatsPanel(7, 5);
        $planStatus = $this->readingPlanService->status(date('Y-m-d'));

        $reading = isset($stats['reading']) && is_array($stats['reading']) ? $stats['reading'] : [];
        $todayMinutes = (int) ($reading['today_minutes'] ?? 0);
        $weekMinutes = (int) ($reading['week_minutes'] ?? 0);
        $streakDays = (int) ($reading['streak_days'] ?? 0);
        $longestStreak = (int) ($reading['longest_streak_days'] ?? 0);

        $weeklyGoal = (int) ($prefs['weekly_goal_days'] ?? 5);
        if ($weeklyGoal < 1) {
            $weeklyGoal = 1;
        } elseif ($weeklyGoal > 7) {
            $weeklyGoal = 7;
        }
        $weeklyDone = 0;
        if (!empty($planStatus['active']) && isset($planStatus['plan']['weekly']['completed_days'])) {
            $weeklyDone = (int) $planStatus['plan']['weekly']['completed_days'];
        } elseif (isset($planStatus['weekly']['completed_days'])) {
            $weeklyDone = (int) $planStatus['weekly']['completed_days'];
        }

        $title = 'Recordatorio de lectura';
        $body = 'Es la hora de tu lectura biblica (' . $scheduledTime . ').';

        if ($todayMinutes >= 10) {
            $title = 'Buen avance hoy';
            $body = 'Ya llevas ' . $todayMinutes . ' min hoy. ';
            if ($streakDays > 0) {
                $body .= 'Racha actual: ' . $streakDays . ' dia(s). ';
            }
            $body .= 'Meta semanal: ' . $weeklyDone . '/' . $weeklyGoal . ' dia(s).';
        } elseif ($streakDays >= 7) {
            $title = 'No rompas tu racha';
            $body = 'Llevas ' . $streakDays . ' dias seguidos. Lee hoy para seguir avanzando.';
        } elseif ($streakDays >= 1) {
            $title = 'Mantén tu racha';
            $body = 'Racha actual: ' . $streakDays . ' dia(s). Lee unos minutos ahora.';
        } else {
            $body = 'Empieza hoy y construye tu racha. Meta semanal: ' . $weeklyDone . '/' . $weeklyGoal . ' dia(s).';
        }

        if ($weekMinutes > 0 && $todayMinutes < 10) {
            $body .= ' Esta semana: ' . $weekMinutes . ' min.';
        }

        $openRoute = '?route=home_daily';
        if (!empty($planStatus['active']) && !empty($planStatus['plan']['today_assignment']['chapters'][0])) {
            $first = $planStatus['plan']['today_assignment']['chapters'][0];
            $book = (int) ($first['book'] ?? 0);
            $chapter = (int) ($first['chapter'] ?? 0);
            if ($book > 0 && $chapter > 0) {
                $openRoute = '?route=reader&book=' . $book . '&chapter=' . $chapter;
            }
        }

        app_json([
            'ok' => true,
            'title' => $title,
            'body' => $body,
            'route' => $openRoute,
            'meta' => [
                'scheduled_time' => $scheduledTime,
                'today_minutes' => $todayMinutes,
                'week_minutes' => $weekMinutes,
                'streak_days' => $streakDays,
                'longest_streak_days' => $longestStreak,
                'weekly_goal_days' => $weeklyGoal,
                'weekly_completed_days' => $weeklyDone,
            ],
        ]);
    }

    public function exportDownload()
    {
        $input = $this->requestData();
        $title = isset($input['title']) ? trim((string) $input['title']) : '';
        $reference = isset($input['reference']) ? trim((string) $input['reference']) : '';
        $content = isset($input['content']) ? trim((string) $input['content']) : '';
        $sourceType = isset($input['source_type']) ? trim((string) $input['source_type']) : 'documento';
        $churchName = isset($input['church_name']) ? trim((string) $input['church_name']) : (string) config('branding.church_name', '');

        if ($title === '' || $content === '') {
            app_json(['error' => 'Falta título o contenido para exportar.'], 422);
        }

        $pdf = $this->documentExportService->buildPdf([
            'app_name' => (string) config('branding.app_name', 'Biblia para todos'),
            'church_name' => $churchName,
            'title' => $title,
            'reference' => $reference,
            'source_type' => $sourceType,
            'content' => $content,
        ]);

        $slug = strtolower((string) preg_replace('/[^a-z0-9]+/i', '-', $sourceType));
        $slug = trim($slug, '-');
        if ($slug === '') {
            $slug = 'documento';
        }
        $filename = $slug . '-' . date('Ymd-His') . '.pdf';

        http_response_code(200);
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdf));
        echo $pdf;
        exit;
    }

    public function syncStatus()
    {
        $userId = auth_user_id();
        if ($userId < 1) {
            app_json(['error' => 'Inicia sesión para usar sincronización en nube.'], 401);
        }

        app_json([
            'ok' => true,
            'sync' => $this->userDataRepository->getCloudSyncStatus($userId),
        ]);
    }

    public function syncPush()
    {
        $userId = auth_user_id();
        if ($userId < 1) {
            app_json(['error' => 'Inicia sesión para usar sincronización en nube.'], 401);
        }

        try {
            $status = $this->userDataRepository->pushCloudBackup($userId);
            app_json([
                'ok' => true,
                'sync' => $status,
            ]);
        } catch (\Throwable $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function syncPull()
    {
        $userId = auth_user_id();
        if ($userId < 1) {
            app_json(['error' => 'Inicia sesión para usar sincronización en nube.'], 401);
        }

        try {
            $status = $this->userDataRepository->pullCloudBackup($userId);
            app_json([
                'ok' => true,
                'sync' => $status,
            ]);
        } catch (\Throwable $e) {
            app_json(['error' => $e->getMessage()], 422);
        }
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

    public function sermonGenerate()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verseStart = isset($input['verse_start']) ? (int) $input['verse_start'] : (isset($input['verse']) ? (int) $input['verse'] : 0);
        $verseEnd = isset($input['verse_end']) ? (int) $input['verse_end'] : $verseStart;
        $messageType = isset($input['message_type']) ? trim((string) $input['message_type']) : 'sermon';
        $prompt = isset($input['prompt']) ? trim((string) $input['prompt']) : '';
        $audience = isset($input['audience']) ? trim((string) $input['audience']) : '';
        $tone = isset($input['tone']) ? trim((string) $input['tone']) : '';

        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            app_json(['error' => 'Referencia bÃ­blica invÃ¡lida.'], 422);
        }

        try {
            $generated = $this->generationService->generateSermonMessage([
                'book' => $book,
                'chapter' => $chapter,
                'verse_start' => $verseStart,
                'verse_end' => $verseEnd,
                'message_type' => $messageType,
                'prompt' => $prompt,
                'audience' => $audience,
                'tone' => $tone,
            ]);
        } catch (\InvalidArgumentException $e) {
            app_json(['error' => $e->getMessage()], 422);
        }

        app_json([
            'ok' => true,
            'message' => $generated,
            'reference' => [
                'book' => $book,
                'book_name' => $this->bibleRepository->getBookName($book),
                'chapter' => $chapter,
                'verse_start' => $verseStart,
                'verse_end' => $verseEnd,
                'label' => $this->bibleRepository->buildRangeLabel($book, $chapter, $verseStart, $verseEnd),
            ],
        ]);
    }

    public function companionThreads()
    {
        $this->requireAuthJson();
        app_json([
            'ok' => true,
            'threads' => $this->userDataRepository->getCompanionThreadsForUser(auth_user_id(), 50),
        ]);
    }

    public function companionThreadCreate()
    {
        $this->requireAuthJson();
        $thread = $this->companionChatService->startThread(auth_user_id(), $this->requireCurrentUser());
        $this->userDataRepository->logSecurityEvent('companion.thread.create', [
            'route' => 'api.companion.thread.create',
            'request_method' => isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : 'POST',
            'outcome' => 'success',
            'ip_address' => request_client_ip(),
            'email' => auth_user_email(),
            'user_id' => auth_user_id(),
        ]);
        app_json([
            'ok' => true,
            'thread' => $thread,
            'messages' => [],
        ]);
    }

    public function companionMessages()
    {
        $this->requireAuthJson();
        $threadId = isset($_GET['thread_id']) ? (int) $_GET['thread_id'] : 0;
        if ($threadId < 1) {
            app_json(['error' => 'Conversación inválida.'], 422);
        }
        $thread = $this->userDataRepository->getCompanionThreadByIdForUser($threadId, auth_user_id());
        if (!$thread) {
            app_json(['error' => 'Conversación no encontrada.'], 404);
        }
        app_json([
            'ok' => true,
            'thread' => $thread,
            'messages' => $this->userDataRepository->getCompanionMessages($threadId, 120),
        ]);
    }

    public function companionSend()
    {
        $this->requireAuthJson();
        $input = $this->requestData();
        $threadId = isset($input['thread_id']) ? (int) $input['thread_id'] : 0;
        $message = isset($input['message']) ? trim((string) $input['message']) : '';
        if ($message === '') {
            app_json(['error' => 'Escribe tu mensaje antes de enviar.'], 422);
        }

        try {
            $response = $this->companionChatService->respond(auth_user_id(), $threadId, $message);
            $this->userDataRepository->logSecurityEvent('companion.message', [
                'route' => 'api.companion.send',
                'request_method' => isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : 'POST',
                'outcome' => 'success',
                'ip_address' => request_client_ip(),
                'email' => auth_user_email(),
                'user_id' => auth_user_id(),
                'meta' => [
                    'thread_id' => (int) (($response['thread']['id'] ?? 0)),
                    'intent' => (string) (($response['reply']['intent'] ?? 'general')),
                    'source' => (string) (($response['reply']['source'] ?? 'stub')),
                    'prayer_request' => !empty($response['prayer_request']) ? 1 : 0,
                ],
            ]);
            app_json([
                'ok' => true,
                'thread' => $response['thread'],
                'messages' => $response['messages'],
                'reply' => $response['reply'],
                'prayer_request' => $response['prayer_request'],
            ]);
        } catch (\Throwable $e) {
            $this->userDataRepository->logSecurityEvent('companion.message', [
                'route' => 'api.companion.send',
                'request_method' => isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : 'POST',
                'outcome' => 'failed',
                'ip_address' => request_client_ip(),
                'email' => auth_user_email(),
                'user_id' => auth_user_id(),
                'meta' => [
                    'message' => $e->getMessage(),
                ],
            ]);
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    private function historicalContextText($book, $chapter, $reference, $pericope, $text, array $signals = [])
    {
        $meta = $this->bookStudyMeta((int) $book);
        $pericopeText = trim((string) $pericope);
        $pericopeLine = $pericopeText !== '' ? (' Perícopa cercana: "' . $pericopeText . '".') : '';
        $focus = $this->historicalFocusHint($text);
        $focusLine = $focus !== '' ? (' Pista interna del pasaje: ' . $focus . '.') : '';
        $scienceNotes = isset($signals['sciences']) && is_array($signals['sciences']) ? $signals['sciences'] : [];
        $customNotes = isset($signals['customs']) && is_array($signals['customs']) ? $signals['customs'] : [];
        $scienceLine = '';
        if (!empty($scienceNotes)) {
            $parts = [];
            foreach (array_slice($scienceNotes, 0, 2) as $row) {
                if (!is_array($row)) {
                    continue;
                }
                $area = trim((string) ($row['area'] ?? ''));
                $note = trim((string) ($row['note'] ?? ''));
                if ($area === '' || $note === '') {
                    continue;
                }
                $parts[] = $area . ': ' . $note;
            }
            if (!empty($parts)) {
                $scienceLine = ' Ciencias bíblicas aplicadas: ' . implode(' | ', $parts) . '.';
            }
        }
        $customLine = '';
        if (!empty($customNotes)) {
            $customParts = [];
            foreach (array_slice($customNotes, 0, 2) as $row) {
                $value = trim((string) $row);
                if ($value !== '') {
                    $customParts[] = $value;
                }
            }
            if (!empty($customParts)) {
                $customLine = ' Costumbres directamente relacionadas: ' . implode(' | ', $customParts) . '.';
            }
        }

        return 'Para ' . $reference . ', el marco histórico se ubica en ' . $meta['periodo']
            . ', dentro del bloque ' . $meta['corpus'] . '. '
            . 'Vida cotidiana de la época: ' . $meta['daily_life'] . '. '
            . 'Usos y costumbres relevantes: ' . $meta['customs'] . '. '
            . 'Estructura social/religiosa: ' . $meta['social_frame'] . '. '
            . 'Audiencia/escenario principal: ' . $meta['audiencia'] . '. '
            . 'Al estudiar el capítulo ' . (int) $chapter . ', observa cómo el pasaje responde a ' . $meta['problematica'] . '.'
            . $pericopeLine
            . $focusLine
            . $scienceLine
            . $customLine;
    }

    private function literaryContextText($book, $chapter, $reference, $pericope, array $verses, array $keywordInsights, array $signals = [])
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
        $clues = isset($signals['literary_clues']) && is_array($signals['literary_clues']) ? $signals['literary_clues'] : [];
        $cluesLine = '';
        if (!empty($clues)) {
            $cluesLine = ' Claves literarias del pasaje: ' . implode(' | ', array_slice($clues, 0, 3)) . '.';
        }

        return 'Género literario predominante: ' . $meta['genre'] . '. '
            . 'Función del capítulo ' . (int) $chapter . ': ' . $meta['chapter_function'] . '. '
            . 'Para ' . $reference . ', sigue el movimiento argumental: observación, interpretación, implicación teológica y aplicación pastoral.'
            . $header . $sample . $termsLine . $cluesLine;
    }

    private function canonicalContextText($book, $reference, array $signals = [])
    {
        $meta = $this->bookStudyMeta((int) $book);
        $links = isset($signals['canonical_links']) && is_array($signals['canonical_links']) ? $signals['canonical_links'] : [];
        $linksLine = '';
        if (!empty($links)) {
            $linksLine = ' Puentes canónicos para este texto: ' . implode(' | ', array_slice($links, 0, 3)) . '.';
        }
        return 'En el marco canónico, ' . $reference . ' dialoga con el eje bíblico de ' . $meta['canonical_axis']
            . '. Relación recomendada para estudio: ' . $meta['canonical_bridge'] . '.'
            . $linksLine;
    }

    private function buildPassageContextSignals($book, $chapter, $reference, $pericope, $text, array $keywords, array $verses)
    {
        $source = trim(
            implode(' ', [
                (string) $reference,
                (string) $pericope,
                (string) $text,
                implode(' ', $keywords),
            ])
        );
        foreach (array_slice($verses, 0, 5) as $row) {
            $source .= ' ' . trim((string) ($row['scripture_text'] ?? ''));
        }
        $normalized = $this->normalizeThemeToken($source);

        $sciences = [];
        $customs = [];
        $literaryClues = [];
        $canonicalLinks = [];

        $addScience = function ($area, $note, $detail = '', array $examples = []) use (&$sciences): void {
            $area = trim((string) $area);
            $note = trim((string) $note);
            $detail = trim((string) $detail);
            if ($area === '' || $note === '') {
                return;
            }
            $normalizedExamples = [];
            foreach ($examples as $example) {
                $value = trim((string) $example);
                if ($value === '' || in_array($value, $normalizedExamples, true)) {
                    continue;
                }
                $normalizedExamples[] = $value;
            }
            $key = $area . '|' . $note . '|' . $detail;
            foreach ($sciences as $row) {
                $rowKey = (string) ($row['area'] ?? '') . '|' . (string) ($row['note'] ?? '') . '|' . (string) ($row['detail'] ?? '');
                if ($rowKey === $key) {
                    return;
                }
            }
            $sciences[] = [
                'area' => $area,
                'note' => $note,
                'detail' => $detail,
                'examples' => array_slice($normalizedExamples, 0, 4),
            ];
        };
        $addLine = function ($value, array &$target): void {
            $value = trim((string) $value);
            if ($value === '' || in_array($value, $target, true)) {
                return;
            }
            $target[] = $value;
        };
        $hasAny = function (array $terms) use ($normalized): bool {
            foreach ($terms as $term) {
                $needle = $this->normalizeThemeToken((string) $term);
                if ($needle !== '' && strpos($normalized, $needle) !== false) {
                    return true;
                }
            }
            return false;
        };

        if ($hasAny(['teofilo', 'tratado', 'comenzo a hacer', 'ascension', 'espiritu santo']) || ((int) $book === 44 && (int) $chapter <= 2)) {
            $addScience(
                'Historia del NT',
                'Lucas-Hechos funciona como obra en dos volumenes para mostrar continuidad entre Jesus resucitado y la mision apostolica.',
                'Este marco ayuda a leer Hechos 1 no como episodio aislado, sino como puente entre la resurreccion y el inicio de la iglesia misional.',
                ['Lucas 1:1-4 como prologo historico.', 'Hechos 1:1-2 retoma el primer tratado.', 'Hechos 2 muestra el primer cumplimiento publico.']
            );
            $addScience(
                'Contexto socio-politico',
                'La mision surge bajo dominio romano; caminos, puertos y red urbana explican la expansion del evangelio.',
                'El control imperial proveia infraestructura y tambien tension politica, lo que vuelve mas visible el contraste entre Reino de Dios y poder imperial.',
                ['Red de calzadas romanas para viajes misioneros.', 'Uso de ciudades clave: Jerusalen, Antioquia, Efeso, Roma.', 'Conflictos en sinagogas y tribunales civicos.']
            );
            $addLine('Las comunidades se reunian en casas, con lectura publica, oracion y mesa compartida como practica central.', $customs);
            $addLine('La expectativa de la promesa del Espiritu se conecta con espera comunitaria, ayuno y obediencia en Jerusalen.', $customs);
            $addLine('El prologo dirigido a Teofilo sigue convenciones historiograficas grecorromanas (dedicatoria + continuidad narrativa).', $literaryClues);
            $addLine('El paso de "Jesus comenzo a hacer y ensenar" a "la iglesia continua su obra" marca la tesis de Hechos.', $literaryClues);
            $addLine('Puente Lucas 24 -> Hechos 1: misma promesa, mismo mandato de testimonio, misma espera del Espiritu.', $canonicalLinks);
            $addLine('Cumplimiento de Joel 2 en Hechos 2 como continuacion natural de la promesa inicial.', $canonicalLinks);
        }

        if ($hasAny(['promesa', 'pacto', 'juramento'])) {
            $addScience(
                'Teologia biblica del pacto',
                'Una promesa biblica se interpreta por su emisor, destinatarios, condicion y horizonte de cumplimiento.',
                'Permite evitar aplicaciones aisladas: toda promesa debe leerse en su etapa redentiva y en relacion con Cristo.',
                ['Genesis 12:1-3 (promesa a Abraham).', 'Jeremias 31:31-34 (nuevo pacto).', '2 Corintios 1:20 (cumplimiento en Cristo).']
            );
            $addLine('Las promesas se proclamaban y memorizaban en comunidad para fortalecer fidelidad en tiempos de crisis.', $customs);
            $addLine('El termino promesa suele funcionar como hilo de continuidad entre AT y NT.', $literaryClues);
            $addLine('Conecta con Genesis 12, Jeremias 31 y su cumplimiento progresivo en Cristo.', $canonicalLinks);
        }

        if ($hasAny(['espiritu', 'espiritu santo', 'consolador'])) {
            $addScience(
                'Pneumatologia biblica',
                'La accion del Espiritu en Hechos no es abstracta: empodera testimonio, unidad y discernimiento comunitario.',
                'La doctrina del Espiritu debe observarse en eventos concretos: envio, conviccion, direccion y santificacion de la iglesia.',
                ['Hechos 1:8 (poder para testificar).', 'Hechos 2:1-4 (derramamiento).', 'Hechos 13:2 (direccion misionera).']
            );
            $addLine('La oracion congregacional precede decisiones clave cuando la iglesia busca direccion del Espiritu.', $customs);
            $addLine('La progresion narrativa suele ser promesa -> espera -> cumplimiento -> mision.', $literaryClues);
            $addLine('Conecta Juan 14-16 con Hechos 1-2 (promesa y envio del Espiritu).', $canonicalLinks);
        }

        if ($hasAny(['testigos', 'mision', 'naciones']) || ((int) $book === 44 && $hasAny(['reino']))) {
            $addScience(
                'Misiologia del NT',
                'El lenguaje de testigos indica mandato publico, verificable y orientado a todas las naciones.',
                'La mision en NT combina proclamacion, formacion de discipulos y establecimiento de comunidades fieles.',
                ['Mateo 28:19-20 (hacer discipulos).', 'Lucas 24:47-49 (arrepentimiento y perdon).', 'Hechos 1:8 (expansion geografica).']
            );
            $addLine('El testimonio apostolico se daba en sinagoga, plaza, casa y tribunal segun el auditorio.', $customs);
            $addLine('La geografia de Hechos (Jerusalen-Judea-Samaria-extremos) estructura el avance del relato.', $literaryClues);
            $addLine('Conecta Mateo 28:19, Lucas 24:47 y Hechos 1:8 como comision unificada.', $canonicalLinks);
        }

        if ((int) $book >= 40 && (int) $book <= 43 && $hasAny(['parabola', 'virgenes', 'lamparas', 'aceite', 'bodas', 'esposo', 'novio'])) {
            $addScience(
                'Contexto socio-cultural del siglo I',
                'Las bodas judias incluian espera nocturna, cortejo del esposo y acompanamiento con lamparas.',
                'Este trasfondo explica por que la preparacion previa (aceite) es el punto central de la parabola y no un detalle secundario.',
                ['Procesion nocturna con antorchas.', 'Retrasos del esposo eran socialmente posibles.', 'El aceite extra mostraba prevision real.']
            );
            $addScience(
                'Analisis de parabolas',
                'La parabola usa imagenes cotidianas para exigir vigilancia espiritual y fidelidad perseverante.',
                'La lectura responsable identifica el punto principal: misma invitacion, distinta preparacion, resultado final irreversible.',
                ['Mateo 25:1-13 culmina con el imperativo velad.', 'Mateo 24 aporta el marco de vigilancia escatologica.', 'Apocalipsis 19 amplia el simbolo nupcial.']
            );
            $addLine('En bodas antiguas el novio podia llegar tarde; el aceite extra distinguia preparacion real de apariencia religiosa.', $customs);
            $addLine('La procesion nupcial funcionaba como acto publico de honor familiar y pertenencia comunitaria.', $customs);
            $addLine('El contraste sabias-insensatas estructura todo el argumento: misma invitacion, distinta preparacion, desenlace opuesto.', $literaryClues);
            $addLine('El imperativo "velad" cierra la escena y traslada la parabola de narracion a exhortacion directa.', $literaryClues);
            $addLine('Conecta con Mateo 24 (vigilancia escatologica) y Apocalipsis 19 (bodas del Cordero).', $canonicalLinks);
        }

        if ($hasAny(['sinagoga', 'templo', 'sacerdote', 'fariseo', 'saduceo', 'fiesta', 'pascua', 'pentecostes'])) {
            $addScience(
                'Historia religiosa judaica',
                'Instituciones como templo y sinagoga explican escenarios de ensenanza, conflicto y anuncio del evangelio.',
                'Las practicas de fiesta, pureza y lectura publica forman el escenario donde Jesus y la iglesia dialogan con Israel.',
                ['Lectura publica de Torah y Profetas en sinagoga.', 'Peregrinaciones a Jerusalen en Pascua y Pentecostes.', 'Debates con fariseos y saduceos en torno a autoridad y pureza.']
            );
            $addLine('Las fiestas de peregrinacion concentraban multitudes de diversas regiones, facilitando difusion del mensaje.', $customs);
            $addLine('El relato alterna espacios de culto oficial y espacios domesticos para mostrar tension y expansion.', $literaryClues);
        }

        if (empty($sciences)) {
            $meta = $this->bookStudyMeta((int) $book);
            $addScience(
                'Marco historico-literario',
                'Lee el pasaje dentro del corpus ' . (string) ($meta['corpus'] ?? '') . ' y su problema central: ' . (string) ($meta['problematica'] ?? '') . '.',
                'Aplica observacion textual y luego conecta con contexto del libro para evitar interpretaciones fuera de argumento.',
                ['Paso 1: identifica repeticion de verbos y sujetos.', 'Paso 2: ubica la unidad dentro del capitulo.', 'Paso 3: conecta con tema central del libro.']
            );
        }
        if (empty($customs)) {
            $meta = $this->bookStudyMeta((int) $book);
            $addLine('Costumbres base para este pasaje: ' . (string) ($meta['customs'] ?? ''), $customs);
        }
        if (empty($literaryClues)) {
            $meta = $this->bookStudyMeta((int) $book);
            $addLine('Lee la unidad con enfoque ' . (string) ($meta['method_hint'] ?? 'contextual') . ' y rastrea conectores logicos.', $literaryClues);
        }
        if (empty($canonicalLinks)) {
            $meta = $this->bookStudyMeta((int) $book);
            $addLine('Relaciona este pasaje con el eje canónico de ' . (string) ($meta['canonical_axis'] ?? 'la historia redentiva') . '.', $canonicalLinks);
        }

        return [
            'sciences' => array_slice($sciences, 0, 4),
            'customs' => array_slice($customs, 0, 4),
            'literary_clues' => array_slice($literaryClues, 0, 4),
            'canonical_links' => array_slice($canonicalLinks, 0, 4),
        ];
    }

    private function buildOriginalLanguageInsights($book, $chapter, $reference, $pericope, $text, array $keywords, array $verses)
    {
        $insights = [];
        $seen = [];
        $add = function (array $row) use (&$insights, &$seen): void {
            $term = trim((string) ($row['term'] ?? ''));
            $trans = trim((string) ($row['transliteration'] ?? ''));
            $meaning = trim((string) ($row['meaning'] ?? ''));
            if ($term === '' || $meaning === '') {
                return;
            }
            $key = $this->normalizeThemeToken($term . '|' . $trans . '|' . $meaning);
            if ($key === '' || isset($seen[$key])) {
                return;
            }
            $seen[$key] = true;
            $insights[] = [
                'term' => $term,
                'language' => trim((string) ($row['language'] ?? '')),
                'transliteration' => $trans,
                'meaning' => $meaning,
                'nuance' => trim((string) ($row['nuance'] ?? '')),
                'source' => trim((string) ($row['source'] ?? '')),
                'strong_code' => trim((string) ($row['strong_code'] ?? '')),
            ];
        };

        $codes = $this->extractStrongCodesFromVerses($verses);
        if (!empty($codes) && $this->strongLexiconService->available()) {
            $entries = $this->strongLexiconService->lookupMany(array_slice($codes, 0, 14));
            foreach ($entries as $entry) {
                $code = strtoupper(trim((string) ($entry['code'] ?? '')));
                if ($code === '') {
                    continue;
                }
                $lang = strtoupper(trim((string) ($entry['lang'] ?? '')));
                $languageLabel = $lang === 'H' ? 'Hebreo' : 'Griego';
                $lemma = trim((string) ($entry['lemma'] ?? ''));
                $translit = trim((string) ($entry['translit'] ?? ''));
                $term = $lemma !== '' ? $lemma : ($translit !== '' ? $translit : $code);
                $meaning = trim((string) $this->buildStrongShortDefinition($entry));
                if ($meaning === '') {
                    $meaning = trim((string) ($entry['strongs_def'] ?? ''));
                }
                $meaning = $this->truncateText($meaning, 180);
                if ($meaning === '') {
                    continue;
                }
                $nuance = 'En ' . $reference . ', este termino ayuda a precisar el sentido del pasaje en su idioma original.';
                $add([
                    'term' => $term,
                    'language' => $languageLabel,
                    'transliteration' => $translit,
                    'meaning' => $meaning,
                    'nuance' => $nuance,
                    'source' => 'Léxico Strong',
                    'strong_code' => $code,
                ]);
                if (count($insights) >= 5) {
                    break;
                }
            }
        }

        $source = trim(
            implode(' ', [
                (string) $reference,
                (string) $pericope,
                (string) $text,
                implode(' ', $keywords),
            ])
        );
        $normalized = $this->normalizeThemeToken($source);
        foreach ($this->originalLanguageFallbackMap() as $token => $row) {
            $needle = $this->normalizeThemeToken((string) $token);
            if ($needle === '' || strpos($normalized, $needle) === false) {
                continue;
            }
            $add($row);
            if (count($insights) >= 7) {
                break;
            }
        }

        return array_slice($insights, 0, 7);
    }

    private function extractStrongCodesFromVerses(array $verses)
    {
        $codes = [];
        foreach ($verses as $row) {
            $html = trim((string) ($row['scripture_html'] ?? ''));
            if ($html === '') {
                continue;
            }
            if (!preg_match_all('/data-strong\s*=\s*"([^"]+)"/iu', $html, $matches)) {
                continue;
            }
            foreach ($matches[1] as $raw) {
                foreach ($this->parseStrongCodes((string) $raw) as $code) {
                    $codes[$code] = true;
                }
            }
        }
        return array_keys($codes);
    }

    private function originalLanguageFallbackMap()
    {
        return [
            'selah' => [
                'term' => 'Selah',
                'language' => 'Hebreo',
                'transliteration' => 'selah',
                'meaning' => 'Marca poetica que sugiere pausa, elevacion o interludio para contemplar a Dios.',
                'nuance' => 'En Salmos, invita a detener la lectura y dejar que la verdad cantada forme adoracion y reflexion.',
                'source' => 'Tradición poética hebrea',
            ],
            'promesa' => [
                'term' => 'Promesa',
                'language' => 'Griego',
                'transliteration' => 'epangelia',
                'meaning' => 'Compromiso declarado por Dios que asegura cumplimiento fiel en su tiempo.',
                'nuance' => 'No es deseo humano: en el NT una promesa divina suele impulsar espera activa y obediencia.',
                'source' => 'Glosario exegético',
            ],
            'espiritu' => [
                'term' => 'Espíritu',
                'language' => 'Griego',
                'transliteration' => 'pneuma',
                'meaning' => 'Aliento/espiritu; en contexto teologico puede referir al Espíritu Santo.',
                'nuance' => 'Define accion de Dios que vivifica, guia y capacita para testimonio y santidad.',
                'source' => 'Glosario exegético',
            ],
            'reino' => [
                'term' => 'Reino',
                'language' => 'Griego',
                'transliteration' => 'basileia',
                'meaning' => 'Reinado o gobierno efectivo, más que territorio geografico.',
                'nuance' => 'En evangelios, enfatiza soberania de Dios y llamado a vivir bajo su autoridad.',
                'source' => 'Glosario exegético',
            ],
            'parabola' => [
                'term' => 'Parábola',
                'language' => 'Griego',
                'transliteration' => 'parabole',
                'meaning' => 'Comparacion narrativa que ilumina una verdad del Reino.',
                'nuance' => 'Exige discernir el punto central del relato, no alegorizar cada detalle.',
                'source' => 'Glosario exegético',
            ],
            'virgenes' => [
                'term' => 'Vírgenes',
                'language' => 'Griego',
                'transliteration' => 'parthenoi',
                'meaning' => 'Jovenes participantes del cortejo nupcial.',
                'nuance' => 'En Mateo 25 destaca preparacion interior frente a mera pertenencia externa.',
                'source' => 'Trasfondo matrimonial judío',
            ],
            'lamparas' => [
                'term' => 'Lámparas',
                'language' => 'Griego',
                'transliteration' => 'lampades',
                'meaning' => 'Antorchas o lamparas de mano usadas en celebraciones nocturnas.',
                'nuance' => 'Simboliza testimonio visible que necesita combustible real para sostenerse.',
                'source' => 'Trasfondo matrimonial judío',
            ],
            'aceite' => [
                'term' => 'Aceite',
                'language' => 'Griego',
                'transliteration' => 'elaion',
                'meaning' => 'Aceite de oliva para luz, uncion y vida cotidiana.',
                'nuance' => 'En la parabola subraya previsión espiritual: no se improvisa comunion en el ultimo minuto.',
                'source' => 'Trasfondo matrimonial judío',
            ],
            'velad' => [
                'term' => 'Velad',
                'language' => 'Griego',
                'transliteration' => 'gregoreite',
                'meaning' => 'Mantenerse despiertos, atentos y vigilantes.',
                'nuance' => 'Imperativo continuo: vigilancia perseverante, no alerta ocasional.',
                'source' => 'Exégesis verbal NT',
            ],
            'novio' => [
                'term' => 'Novio/Esposo',
                'language' => 'Griego',
                'transliteration' => 'nymphios',
                'meaning' => 'Esposo del cortejo nupcial.',
                'nuance' => 'En lectura canónica, figura que apunta a Cristo y su venida.',
                'source' => 'Simbolismo nupcial bíblico',
            ],
            'gracia' => [
                'term' => 'Gracia',
                'language' => 'Griego',
                'transliteration' => 'charis',
                'meaning' => 'Favor gratuito que Dios concede y que transforma la vida.',
                'nuance' => 'Marca iniciativa divina y respuesta humilde de fe.',
                'source' => 'Glosario exegético',
            ],
            'fe' => [
                'term' => 'Fe',
                'language' => 'Griego',
                'transliteration' => 'pistis',
                'meaning' => 'Confianza leal que se apoya en Dios.',
                'nuance' => 'Incluye conviccion interna y obediencia concreta.',
                'source' => 'Glosario exegético',
            ],
            'amor' => [
                'term' => 'Amor',
                'language' => 'Griego',
                'transliteration' => 'agape',
                'meaning' => 'Amor de entrega y compromiso por el bien del otro.',
                'nuance' => 'No se reduce a sentimiento; se verifica en acciones.',
                'source' => 'Glosario exegético',
            ],
            'paz' => [
                'term' => 'Paz',
                'language' => 'Hebreo/Griego',
                'transliteration' => 'shalom / eirene',
                'meaning' => 'Plenitud, reconciliacion y bienestar integral bajo Dios.',
                'nuance' => 'No solo ausencia de conflicto, sino orden restaurado.',
                'source' => 'Teología bíblica',
            ],
        ];
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

        $wordCount = $this->estimatePassageWordCount($verses);

        return [
            'Lee primero todo el capítulo ' . (int) $chapter . ' antes de fijarte solo en ' . $range . '.',
            'Delimita unidades: contexto inmediato (párrafo), contexto del libro y contexto canónico.',
            'Marca conectores lógicos y verbos principales; ahí suele estar el argumento del autor.',
            'Contrasta observación textual con ' . $meta['method_hint'] . ' para evitar interpretaciones aisladas.',
            'Carga textual estimada del pasaje seleccionado: ' . (int) $wordCount . ' palabras (aprox.).',
        ];
    }

    private function estimatePassageWordCount(array $verses)
    {
        $wordCount = 0;
        foreach ($verses as $row) {
            $wordCount += str_word_count((string) ($row['scripture_text'] ?? ''));
        }
        if ($wordCount < 1) {
            $wordCount = count($verses) * 10;
        }
        return (int) $wordCount;
    }

    private function buildContextMainIdea($reference, $pericope, array $meta, array $keywords, $verseStart, $verseEnd, array $verses = [])
    {
        $scope = (int) $verseStart === (int) $verseEnd
            ? ('el versículo ' . (int) $verseStart)
            : ('los versículos ' . (int) $verseStart . '-' . (int) $verseEnd);
        $theme = trim((string) ($meta['book_theme'] ?? ''));
        $method = trim((string) ($meta['method_hint'] ?? 'lectura contextual'));
        $pericopeText = trim((string) $pericope);
        $firstText = '';
        $lastText = '';
        if (!empty($verses)) {
            $firstText = trim((string) ($verses[0]['scripture_text'] ?? ''));
            $lastRow = $verses[count($verses) - 1];
            $lastText = trim((string) ($lastRow['scripture_text'] ?? ''));
        }
        $firstLine = $firstText !== '' ? (' Inicia diciendo: "' . $this->truncateText($firstText, 120) . '".') : '';
        $lastLine = ($lastText !== '' && $lastText !== $firstText)
            ? (' Cierra enfatizando: "' . $this->truncateText($lastText, 120) . '".')
            : '';
        $keywordsLine = !empty($keywords)
            ? (' Terminos de apoyo: ' . implode(', ', array_slice($keywords, 0, 4)) . '.')
            : '';
        $pericopeLine = $pericopeText !== '' ? (' Unidad literaria: "' . $pericopeText . '".') : '';

        return 'En ' . $reference . ', ' . $scope . ' desarrollan el tema de ' . $theme . '.'
            . $pericopeLine
            . $firstLine
            . $lastLine
            . $keywordsLine
            . ' Lee el pasaje siguiendo ' . $method . ' para identificar argumento, enfasis y aplicacion.';
    }

    private function buildContextApplication($reference, array $meta, array $keywords, $chapter)
    {
        $focusTerm = '';
        if (!empty($keywords)) {
            $focusTerm = trim((string) $keywords[0]);
        }
        $bookTheme = trim((string) ($meta['book_theme'] ?? 'la enseñanza del libro'));
        $chapterFunction = trim((string) ($meta['chapter_function'] ?? 'la intención del capítulo'));
        $focusLine = $focusTerm !== ''
            ? ('Toma la palabra "' . $focusTerm . '" y escribe una decisión concreta para obedecerla esta semana.')
            : 'Escribe una decisión concreta de obediencia basada en el pasaje.';

        return [
            'Resume en una frase qué exige Dios hoy a partir de ' . $reference . '.',
            'Contrasta tu práctica diaria con ' . $chapterFunction . ' en el capítulo ' . (int) $chapter . '.',
            $focusLine,
            'Comparte esta aplicación con alguien de confianza y oren por perseverar en ' . $bookTheme . '.',
        ];
    }

    private function buildObservationGuide(array $meta, $chapter, array $keywordInsights, $wordCount)
    {
        $terms = [];
        foreach (array_slice($keywordInsights, 0, 3) as $item) {
            $term = trim((string) ($item['term'] ?? ''));
            if ($term !== '') {
                $terms[] = $term;
            }
        }
        $termsLine = empty($terms) ? 'Identifica 2-3 términos repetidos en el pasaje.' : ('Rastrea la repetición de: ' . implode(', ', $terms) . '.');
        $canonicalAxis = trim((string) ($meta['canonical_axis'] ?? 'el eje redentivo biblico'));

        return [
            'Paso 1: lee el capítulo ' . (int) $chapter . ' completo sin detenerte y anota la idea dominante.',
            'Paso 2: ' . $termsLine,
            'Paso 3: conecta el pasaje con el hilo redentivo de ' . $canonicalAxis . '.',
            'Paso 4: redacta una aplicación medible para las próximas 24 horas.',
            'Carga de lectura aproximada del pasaje seleccionado: ' . (int) $wordCount . ' palabras.',
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
            'porque', 'cuando', 'sobre', 'entre', 'todo', 'toda', 'todos', 'todas', 'este', 'esta',
            'tambien', 'también', 'asi', 'así', 'aqui', 'aquí', 'donde', 'dónde', 'desde', 'hasta',
            'cada', 'cual', 'ellos', 'ellas', 'nosotros', 'vosotros', 'usted', 'ustedes',
            'qué', 'que', 'cómo', 'como', 'quien', 'quién', 'quienes', 'quiénes', 'cosa', 'cosas',
            'primer', 'primera', 'primeros', 'primeras', 'habia', 'había', 'acerca',
        ];

        $freq = [];
        $labelByKey = [];
        $dictionary = $this->buildInlineKeywordDictionary();
        foreach ($tokens as $token) {
            $token = trim((string) $token);
            $len = function_exists('mb_strlen') ? mb_strlen($token, 'UTF-8') : strlen($token);
            $normalized = $this->normalizeKeywordKey($token);
            if ($token === '' || $normalized === '' || $len < 4 || in_array($token, $stop, true)) {
                continue;
            }

            $targetKey = $normalized;
            $targetLabel = $token;
            $dictionaryBoost = 0;
            foreach ($this->buildKeywordLookupCandidates($token, $normalized) as $candidate) {
                $candidateKey = $this->normalizeKeywordKey($candidate);
                if ($candidateKey === '') {
                    continue;
                }
                if (isset($dictionary[$candidateKey])) {
                    $targetKey = $candidateKey;
                    $targetLabel = $token;
                    $dictionaryBoost = 12;
                    break;
                }
            }

            if (!isset($freq[$targetKey])) {
                $freq[$targetKey] = 0;
                $labelByKey[$targetKey] = $targetLabel;
            }
            $freq[$targetKey] += (1 + $dictionaryBoost);
        }
        arsort($freq);
        $result = [];
        foreach (array_slice(array_keys($freq), 0, max(1, (int) $limit)) as $key) {
            $result[] = (string) ($labelByKey[$key] ?? $key);
        }
        return $result;
    }

    private function buildKeywordInsights(array $keywords, array $verses = [])
    {
        $dictionary = $this->buildInlineKeywordDictionary();
        $moduleCache = [];
        $preparedKeywords = [];
        $strongTargetSet = [];
        foreach ($keywords as $word) {
            $term = trim((string) $word);
            if ($term === '') {
                continue;
            }
            $key = $this->normalizeKeywordKey($term);
            $candidates = $this->buildKeywordLookupCandidates($term, $key);
            $preparedKeywords[] = [
                'term' => $term,
                'candidates' => $candidates,
            ];
            foreach ($candidates as $candidate) {
                $candidateKey = $this->normalizeKeywordKey((string) $candidate);
                if ($candidateKey === '' || $this->mbStrlen($candidateKey) < 2) {
                    continue;
                }
                $strongTargetSet[$candidateKey] = true;
            }
        }

        $strongInsightMap = $this->buildKeywordStrongInsightMap($verses, array_keys($strongTargetSet));
        $results = [];
        foreach ($preparedKeywords as $prepared) {
            $term = (string) ($prepared['term'] ?? '');
            $candidates = isset($prepared['candidates']) && is_array($prepared['candidates'])
                ? $prepared['candidates']
                : [];
            $insight = null;
            $deferredStrongInsight = null;
            foreach ($candidates as $candidate) {
                $candidateText = trim((string) $candidate);
                $candidateKey = $this->normalizeKeywordKey($candidateText);
                if ($candidateKey === '') {
                    continue;
                }

                if (isset($strongInsightMap[$candidateKey])) {
                    $strongInsight = $strongInsightMap[$candidateKey];
                    if (!$this->isWeakStrongKeywordInsight($strongInsight)) {
                        $insight = $strongInsight;
                        break;
                    }
                    if (!$deferredStrongInsight) {
                        $deferredStrongInsight = $strongInsight;
                    }
                }

                $insight = $this->resolveKeywordInsightFromModules($candidateText, $candidateKey, $moduleCache);
                if ($insight) {
                    break;
                }

                if (isset($dictionary[$candidateKey])) {
                    $insight = $dictionary[$candidateKey];
                    break;
                }
            }
            if (!$insight && $deferredStrongInsight) {
                $insight = $deferredStrongInsight;
            }
            if (!$insight) {
                $insight = $this->buildFallbackKeywordInsight($term);
            }
            $studyUse = (string) ($insight['study_use'] ?? '');
            $source = (string) ($insight['source'] ?? '');
            if (strpos($source, 'lexico-strong') === 0) {
                $studyUse = $this->buildContextualStrongStudyUse($term, $insight, $verses);
            } elseif ($studyUse === '') {
                $studyUse = 'Relaciona este termino con el argumento inmediato del pasaje y su aplicacion practica.';
            }
            $meaning = $this->formatKeywordMeaning((string) ($insight['meaning'] ?? ''));
            $meaning = $this->sanitizeKeywordMeaningText($term, $meaning, $source, $verses);
            $studyUse = $this->sanitizeKeywordStudyUseText($term, $studyUse, $source, $verses);
            $results[] = [
                'term' => $term,
                'meaning' => $meaning,
                'study_use' => $studyUse,
                'references' => isset($insight['references']) && is_array($insight['references']) ? array_values($insight['references']) : [],
                'source' => $source !== '' ? $source : 'glosario-contextual',
            ];
        }
        return $results;
    }

    private function buildKeywordStrongInsightMap(array $verses, array $targetWordKeys = [])
    {
        if (empty($verses) || !$this->strongLexiconService->available()) {
            return [];
        }

        $targetWordKeySet = [];
        foreach ($targetWordKeys as $candidate) {
            $key = $this->normalizeKeywordKey((string) $candidate);
            if ($key === '' || $this->mbStrlen($key) < 2) {
                continue;
            }
            $targetWordKeySet[$key] = true;
        }

        $wordCodeMap = [];
        foreach ($verses as $row) {
            $alignment = isset($row['strong_alignment']) && is_array($row['strong_alignment'])
                ? $row['strong_alignment']
                : [];
            $scriptureText = trim((string) ($row['scripture_text'] ?? ''));
            if (!empty($alignment) && $scriptureText !== '') {
                if (preg_match_all('/[\p{L}\p{N}]+(?:[\'’][\p{L}\p{N}]+)*/u', $scriptureText, $m)) {
                    $words = isset($m[0]) && is_array($m[0]) ? $m[0] : [];
                    $limit = min(count($words), count($alignment));
                    for ($i = 0; $i < $limit; $i++) {
                        $token = trim((string) $words[$i]);
                        if ($token === '') {
                            continue;
                        }
                        $tokenMapKeys = $this->buildStrongMapKeysFromToken($token);
                        $tokenMapKeys = $this->filterStrongMapKeysForTargets($tokenMapKeys, $targetWordKeySet);
                        if (empty($tokenMapKeys)) {
                            continue;
                        }
                        $primaryCodes = $this->parseStrongCodes((string) $alignment[$i]);
                        $window = [];
                        if (!empty($primaryCodes)) {
                            $window[] = ['idx' => $i, 'weight' => 4];
                        } else {
                            $window[] = ['idx' => $i - 1, 'weight' => 1];
                            $window[] = ['idx' => $i + 1, 'weight' => 1];
                        }
                        foreach ($window as $point) {
                            $idx = (int) ($point['idx'] ?? -1);
                            if ($idx < 0 || $idx >= count($alignment)) {
                                continue;
                            }
                            $codes = $this->parseStrongCodes((string) $alignment[$idx]);
                            if (empty($codes)) {
                                continue;
                            }
                            $windowWeight = (int) ($point['weight'] ?? 1);
                            foreach ($tokenMapKeys as $mapKey => $mapWeight) {
                                if (!isset($wordCodeMap[$mapKey])) {
                                    $wordCodeMap[$mapKey] = [];
                                }
                                foreach ($codes as $code) {
                                    $normalizedCode = strtoupper(trim((string) $code));
                                    if ($normalizedCode !== '') {
                                        $weight = max(1, (int) $mapWeight) * max(1, $windowWeight);
                                        $wordCodeMap[$mapKey][$normalizedCode] = (int) ($wordCodeMap[$mapKey][$normalizedCode] ?? 0) + $weight;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $html = trim((string) ($row['scripture_html'] ?? ''));
            if ($html === '' || strpos($html, 'data-strong=') === false) {
                continue;
            }
            foreach ($this->extractStrongWordPairsFromHtml($html) as $pair) {
                $word = isset($pair['word']) ? (string) $pair['word'] : '';
                $codes = isset($pair['codes']) && is_array($pair['codes']) ? $pair['codes'] : [];
                if ($word === '' || empty($codes)) {
                    continue;
                }
                $tokens = preg_split('/\s+/u', (string) preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $word));
                if (!is_array($tokens)) {
                    continue;
                }
                foreach ($tokens as $token) {
                    $tokenMapKeys = $this->buildStrongMapKeysFromToken((string) $token);
                    $tokenMapKeys = $this->filterStrongMapKeysForTargets($tokenMapKeys, $targetWordKeySet);
                    if (empty($tokenMapKeys)) {
                        continue;
                    }
                    foreach ($tokenMapKeys as $mapKey => $mapWeight) {
                        if (!isset($wordCodeMap[$mapKey])) {
                            $wordCodeMap[$mapKey] = [];
                        }
                        foreach ($codes as $code) {
                            $normalizedCode = strtoupper(trim((string) $code));
                            if ($normalizedCode !== '') {
                                $wordCodeMap[$mapKey][$normalizedCode] = (int) ($wordCodeMap[$mapKey][$normalizedCode] ?? 0) + max(1, (int) $mapWeight);
                            }
                        }
                    }
                }
            }
        }

        if (empty($wordCodeMap)) {
            return [];
        }

        $allCodes = [];
        foreach ($wordCodeMap as $codes) {
            foreach (array_keys($codes) as $code) {
                $allCodes[$code] = true;
            }
        }
        if (empty($allCodes)) {
            return [];
        }

        $entries = $this->strongLexiconService->lookupMany(array_keys($allCodes));
        if (!is_array($entries) || empty($entries)) {
            return [];
        }

        $entryByCode = [];
        foreach ($entries as $entry) {
            $code = strtoupper(trim((string) ($entry['code'] ?? '')));
            if ($code === '') {
                continue;
            }
            $entryByCode[$code] = $entry;
        }
        if (empty($entryByCode)) {
            return [];
        }

        $result = [];
        foreach ($wordCodeMap as $wordKey => $codesSet) {
            if (!is_array($codesSet) || empty($codesSet)) {
                continue;
            }
            $resolvedCode = $this->pickBestStrongCodeForKeyword($wordKey, $codesSet, $entryByCode);
            if ($resolvedCode === '' || !isset($entryByCode[$resolvedCode])) {
                continue;
            }
            $resolved = $entryByCode[$resolvedCode];
            if (!is_array($resolved)) {
                continue;
            }

            $shortDef = trim((string) $this->buildStrongShortDefinition($resolved));
            if ($shortDef === '') {
                $shortDef = trim((string) ($resolved['strongs_def'] ?? ''));
            }
            $shortDef = $this->truncateText($shortDef, 220);
            if ($shortDef === '') {
                continue;
            }

            $refs = [];

            $lemma = trim((string) ($resolved['lemma'] ?? ''));
            $translit = trim((string) ($resolved['translit'] ?? ''));
            $lemmaHint = '';
            if ($lemma !== '' || $translit !== '') {
                $lemmaHint = trim($lemma . ($translit !== '' ? (' (' . $translit . ')') : ''));
            }

            $result[$wordKey] = [
                'meaning' => $lemmaHint !== '' ? ($lemmaHint . ': ' . $shortDef) : $shortDef,
                'study_use' => 'Relaciona este termino del lexico Strong con el argumento inmediato del pasaje y su aplicacion.',
                'references' => $refs,
                'source' => 'lexico-strong' . ($resolvedCode !== '' ? (' (' . $resolvedCode . ')') : ''),
            ];
        }

        return $result;
    }

    private function buildStrongMapKeysFromToken($token)
    {
        $token = trim((string) $token);
        if ($token === '') {
            return [];
        }

        $base = $this->normalizeKeywordKey($token);
        if ($base === '' || $this->mbStrlen($base) < 2) {
            return [];
        }

        $keys = [];
        $keys[$base] = 4;
        foreach ($this->buildKeywordLookupCandidates($token, $base) as $candidate) {
            $candidateKey = $this->normalizeKeywordKey((string) $candidate);
            if ($candidateKey === '' || $this->mbStrlen($candidateKey) < 2) {
                continue;
            }
            $weight = $candidateKey === $base ? 4 : 1;
            if (!isset($keys[$candidateKey]) || $weight > $keys[$candidateKey]) {
                $keys[$candidateKey] = $weight;
            }
        }

        return $keys;
    }

    private function filterStrongMapKeysForTargets(array $tokenMapKeys, array $targetWordKeySet)
    {
        if (empty($tokenMapKeys) || empty($targetWordKeySet)) {
            return $tokenMapKeys;
        }

        $filtered = [];
        foreach ($tokenMapKeys as $key => $weight) {
            $candidateKey = $this->normalizeKeywordKey((string) $key);
            if ($candidateKey === '' || !isset($targetWordKeySet[$candidateKey])) {
                continue;
            }
            $filtered[$candidateKey] = max(1, (int) $weight);
        }
        return $filtered;
    }

    private function pickBestStrongCodeForKeyword($wordKey, array $codesSet, array $entryByCode)
    {
        $wordKey = trim((string) $wordKey);
        $bestCode = '';
        $bestScore = -1000000;

        foreach ($codesSet as $code => $weight) {
            $code = strtoupper(trim((string) $code));
            if ($code === '' || !isset($entryByCode[$code])) {
                continue;
            }
            $entry = $entryByCode[$code];
            if (!is_array($entry)) {
                continue;
            }

            $score = (int) $weight * 100;
            $shortDef = trim((string) $this->buildStrongShortDefinition($entry));
            if ($shortDef === '') {
                $shortDef = trim((string) ($entry['strongs_def'] ?? ''));
            }
            $score += min(80, $this->mbStrlen($shortDef));

            $lemmaKey = $this->normalizeKeywordKey((string) ($entry['lemma'] ?? ''));
            $translitKey = $this->normalizeKeywordKey((string) ($entry['translit'] ?? ''));
            if ($wordKey !== '' && ($lemmaKey === $wordKey || $translitKey === $wordKey)) {
                $score += 95;
            }

            if ($this->isLowSignalStrongText($shortDef)) {
                $score -= 180;
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $bestCode = $code;
            }
        }

        return $bestCode;
    }

    private function extractStrongWordPairsFromHtml($html)
    {
        $html = trim((string) $html);
        if ($html === '' || strpos($html, 'data-strong=') === false) {
            return [];
        }

        $doc = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $loaded = $doc->loadHTML(
            '<?xml encoding="UTF-8"><div id="root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        if (!$loaded) {
            return [];
        }

        $xpath = new \DOMXPath($doc);
        $nodes = $xpath->query('//*[@data-strong]');
        if (!$nodes) {
            return [];
        }

        $pairs = [];
        foreach ($nodes as $node) {
            if (!$node instanceof \DOMElement) {
                continue;
            }
            $codes = $this->parseStrongCodes((string) $node->getAttribute('data-strong'));
            if (empty($codes)) {
                continue;
            }
            $word = trim((string) html_entity_decode((string) $node->textContent, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            if ($word === '') {
                continue;
            }
            $pairs[] = [
                'word' => $word,
                'codes' => $codes,
            ];
        }

        return $pairs;
    }

    private function buildKeywordLookupCandidates($term, $normalizedKey)
    {
        $raw = trim((string) $term);
        $base = trim((string) $normalizedKey);
        $candidates = [];
        $push = function ($value) use (&$candidates): void {
            $value = trim((string) $value);
            if ($value === '' || in_array($value, $candidates, true)) {
                return;
            }
            $candidates[] = $value;
        };

        $push($raw);
        $push($base);

        $verbFormMap = [
            'dicho' => 'decir',
            'dicha' => 'decir',
            'dichos' => 'decir',
            'dichas' => 'decir',
            'creo' => 'creer',
            'crees' => 'creer',
            'cree' => 'creer',
            'creen' => 'creer',
            'creeis' => 'creer',
            'creemos' => 'creer',
            'creia' => 'creer',
            'creian' => 'creer',
            'creyo' => 'creer',
            'creyeron' => 'creer',
            'creyendo' => 'creer',
            'hare' => 'hacer',
            'haras' => 'hacer',
            'hara' => 'hacer',
            'haran' => 'hacer',
            'haremos' => 'hacer',
            'haria' => 'hacer',
            'harian' => 'hacer',
            'hizo' => 'hacer',
            'hacen' => 'hacer',
            'hacia' => 'hacer',
            'dijo' => 'decir',
            'dijeron' => 'decir',
            'dice' => 'decir',
            'dicen' => 'decir',
            'dijere' => 'decir',
            'hable' => 'hablar',
            'hablo' => 'hablar',
            'hablan' => 'hablar',
            'hablara' => 'hablar',
            'hablaron' => 'hablar',
            'hablad' => 'hablar',
            'bendecire' => 'bendecir',
            'bendeciras' => 'bendecir',
            'bendecira' => 'bendecir',
            'bendeciran' => 'bendecir',
            'bendecireis' => 'bendecir',
            'bendiciones' => 'bendicion',
            'engrandecere' => 'engrandecer',
            'engrandeceras' => 'engrandecer',
            'engrandecera' => 'engrandecer',
            'engrandeceran' => 'engrandecer',
            'engrandecereis' => 'engrandecer',
            'llama' => 'llamar',
            'llamo' => 'llamar',
            'llaman' => 'llamar',
            'llamado' => 'llamar',
            'llamados' => 'llamar',
            'mostrare' => 'mostrar',
            'mostrara' => 'mostrar',
            'mostraron' => 'mostrar',
            'comenzo' => 'comenzar',
            'comenzaron' => 'comenzar',
            'ensenar' => 'ensenar',
            'enseno' => 'ensenar',
            'ensenan' => 'ensenar',
            'abram' => 'abraham',
            'teofilo' => 'teofilo',
            'terrenales' => 'terrenal',
            'celestiales' => 'celestial',
            'sera' => 'ser',
            'seras' => 'ser',
            'seran' => 'ser',
            'fue' => 'ser',
            'fueron' => 'ser',
        ];
        if ($base !== '' && isset($verbFormMap[$base])) {
            $push($verbFormMap[$base]);
        }

        if ($base !== '') {
            if (preg_match('/eis$/', $base) && strlen($base) > 4) {
                $root = substr($base, 0, -3);
                $push($root . 'er');
                $push($root . 'ir');
            }
            if (preg_match('/ais$/', $base) && strlen($base) > 4) {
                $root = substr($base, 0, -3);
                $push($root . 'ar');
            }
            if (preg_match('/(amos|emos|imos)$/', $base) && strlen($base) > 5) {
                $root = substr($base, 0, -4);
                $push($root . 'ar');
                $push($root . 'er');
                $push($root . 'ir');
            }
            if (preg_match('/(an|en)$/', $base) && strlen($base) > 4) {
                $root = substr($base, 0, -2);
                $push($root . 'ar');
                $push($root . 'er');
                $push($root . 'ir');
            }
            if (preg_match('/(o|as|a|es|e)$/', $base) && strlen($base) > 4) {
                $root = preg_replace('/(o|as|a|es|e)$/', '', $base);
                if (is_string($root) && $root !== '') {
                    $push($root . 'ar');
                    $push($root . 'er');
                    $push($root . 'ir');
                }
            }
            if (preg_match('/ciones$/', $base)) {
                $push(preg_replace('/ciones$/', 'cion', $base));
            }
            if (preg_match('/siones$/', $base)) {
                $push(preg_replace('/siones$/', 'sion', $base));
            }
            if (preg_match('/idades$/', $base)) {
                $push(preg_replace('/idades$/', 'idad', $base));
            }
            if (preg_match('/ales$/', $base) && strlen($base) > 5) {
                $push(preg_replace('/ales$/', 'al', $base));
            }
            if (preg_match('/iles$/', $base) && strlen($base) > 5) {
                $push(preg_replace('/iles$/', 'il', $base));
            }
            if (preg_match('/mente$/', $base) && strlen($base) > 6) {
                $push(substr($base, 0, -5));
            }
            if (preg_match('/es$/', $base) && strlen($base) > 4) {
                $push(substr($base, 0, -2));
            }
            if (preg_match('/s$/', $base) && strlen($base) > 4) {
                $push(substr($base, 0, -1));
            }
            if (preg_match('/ados$/', $base) || preg_match('/adas$/', $base) || preg_match('/idos$/', $base) || preg_match('/idas$/', $base)) {
                $push(substr($base, 0, -2));
            }
            if (preg_match('/ando$/', $base) || preg_match('/iendo$/', $base)) {
                $push(substr($base, 0, -4));
            }
        }

        return $candidates;
    }

    private function resolveKeywordInsightFromModules($term, $normalizedKey, array &$cache)
    {
        $cacheKey = trim((string) $normalizedKey);
        if ($cacheKey === '') {
            return null;
        }
        if (array_key_exists($cacheKey, $cache)) {
            return $cache[$cacheKey];
        }

        $rows = [];
        try {
            $rows = $this->moduleCatalogService->lookupDictionary($term, 10);
        } catch (\Throwable $e) {
            $rows = [];
        }
        if (!is_array($rows) || empty($rows)) {
            $cache[$cacheKey] = null;
            return null;
        }

        $best = null;
        $bestScore = -1;
        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }
            $rowTermKey = $this->normalizeKeywordKey((string) ($row['term'] ?? ''));
            $score = 0;
            if ($rowTermKey !== '' && $rowTermKey === $cacheKey) {
                $score = 120;
            } elseif ($this->isKeywordLooseContainsMatch($rowTermKey, $cacheKey)) {
                $score = 80;
            }

            $aliases = isset($row['aliases']) && is_array($row['aliases']) ? $row['aliases'] : [];
            foreach ($aliases as $alias) {
                $aliasKey = $this->normalizeKeywordKey((string) $alias);
                if ($aliasKey === '') {
                    continue;
                }
                if ($aliasKey === $cacheKey) {
                    $score = max($score, 110);
                    continue;
                }
                if ($this->isKeywordLooseContainsMatch($aliasKey, $cacheKey)) {
                    $score = max($score, 70);
                }
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $best = $row;
            }
        }

        // Evita coincidencias vagas por texto de definicion (score bajo) para no
        // devolver entradas irrelevantes cuando el termino exacto no existe.
        if (!$best || $bestScore < 80) {
            $cache[$cacheKey] = null;
            return null;
        }

        $meaning = trim((string) ($best['definition'] ?? ''));
        $studyUse = trim((string) ($best['usage'] ?? ''));
        if ($meaning === '' && $studyUse === '') {
            $cache[$cacheKey] = null;
            return null;
        }
        if ($meaning === '') {
            $meaning = $studyUse;
        }
        if ($studyUse === '') {
            $studyUse = 'Relaciona este termino con el flujo del pasaje y su argumento principal.';
        }

        $refs = [];
        $references = isset($best['references']) && is_array($best['references']) ? $best['references'] : [];
        foreach ($references as $reference) {
            $value = trim((string) $reference);
            if ($value !== '') {
                $refs[] = $value;
            }
            if (count($refs) >= 4) {
                break;
            }
        }

        $sourceName = trim((string) ($best['module_name'] ?? 'Diccionario'));
        $resolved = [
            'meaning' => $meaning,
            'study_use' => $studyUse,
            'references' => $refs,
            'source' => 'diccionario-modular (' . $sourceName . ')',
        ];
        $cache[$cacheKey] = $resolved;
        return $resolved;
    }

    private function isKeywordLooseContainsMatch($left, $right)
    {
        $left = trim((string) $left);
        $right = trim((string) $right);
        if ($left === '' || $right === '') {
            return false;
        }
        $minLen = min($this->mbStrlen($left), $this->mbStrlen($right));
        if ($minLen < 5) {
            return false;
        }
        return strpos($left, $right) !== false || strpos($right, $left) !== false;
    }

    private function isWeakStrongKeywordInsight(array $insight)
    {
        $source = trim((string) ($insight['source'] ?? ''));
        if ($source === '' || strpos($source, 'lexico-strong') !== 0) {
            return false;
        }
        $meaning = trim((string) ($insight['meaning'] ?? ''));
        return $this->isLowSignalStrongText($meaning);
    }

    private function isLowSignalStrongText($text)
    {
        $text = trim((string) $text);
        if ($text === '') {
            return true;
        }
        if (strpos($text, '�') !== false) {
            return true;
        }
        $normalized = $this->normalizeThemeToken($text);
        if ($normalized === '') {
            return true;
        }
        $weakNeedles = [
            'incl el fem',
            'interj',
            'irreg dat',
            'contr superl',
            'forma prol',
            'obs prim',
            'de la base de g',
            'de la base de h',
            'o abr',
            'contr de',
        ];
        foreach ($weakNeedles as $needle) {
            if (strpos($normalized, $needle) !== false) {
                return true;
            }
        }
        if (preg_match('/\b(de g[0-9]{1,5}|de h[0-9]{1,5})\b/u', $normalized)) {
            return true;
        }
        return false;
    }

    private function buildContextualStrongStudyUse($term, array $insight, array $verses)
    {
        $cleanTerm = trim((string) $term);
        if ($cleanTerm === '') {
            $cleanTerm = 'este termino';
        }

        $source = trim((string) ($insight['source'] ?? ''));
        $strongCode = '';
        if (preg_match('/\(([GH]\d{1,5})\)/', $source, $m)) {
            $strongCode = strtoupper(trim((string) ($m[1] ?? '')));
        }

        $reference = $this->buildKeywordPassageReference($verses);
        $line = 'En ' . $reference . ', observa como "' . $cleanTerm . '" sostiene la idea central de su oracion inmediata.';
        if ($strongCode !== '') {
            return $line . ' Relaciona su matiz lexico (' . $strongCode . ') con el flujo del pasaje y resume su aporte en una frase aplicada.';
        }
        return $line . ' Relaciona su matiz lexico con el flujo del pasaje y resume su aporte en una frase aplicada.';
    }

    private function buildKeywordPassageReference(array $verses)
    {
        if (empty($verses)) {
            return 'este pasaje';
        }

        $first = isset($verses[0]) && is_array($verses[0]) ? $verses[0] : [];
        $last = isset($verses[count($verses) - 1]) && is_array($verses[count($verses) - 1]) ? $verses[count($verses) - 1] : $first;

        $book = (int) ($first['book'] ?? 0);
        $chapter = (int) ($first['chapter'] ?? 0);
        $verseStart = (int) ($first['verse'] ?? 0);
        $verseEnd = (int) ($last['verse'] ?? 0);
        $bookEnd = (int) ($last['book'] ?? $book);
        $chapterEnd = (int) ($last['chapter'] ?? $chapter);

        if ($book < 1 || $chapter < 1 || $verseStart < 1) {
            return 'este pasaje';
        }
        if ($book !== $bookEnd || $chapter !== $chapterEnd || $verseEnd < 1) {
            return 'este pasaje';
        }
        if ($verseStart === $verseEnd) {
            return (string) $this->bibleRepository->buildReferenceLabel($book, $chapter, $verseStart);
        }
        return (string) $this->bibleRepository->buildRangeLabel($book, $chapter, min($verseStart, $verseEnd), max($verseStart, $verseEnd));
    }

    private function formatKeywordMeaning($meaning)
    {
        $text = trim((string) $meaning);
        if ($text === '') {
            return '';
        }
        for ($i = 0; $i < 4; $i++) {
            $next = preg_replace('/^\s*(definicion|definición)\s*:\s*/iu', '', $text);
            $next = trim((string) $next);
            if ($next === $text) {
                break;
            }
            $text = $next;
        }
        return trim((string) $text);
    }

    private function sanitizeKeywordMeaningText($term, $meaning, $source, array $verses = [])
    {
        $text = trim((string) $meaning);
        $text = preg_replace('/^\s*(definicion|definición)\s*:\s*/iu', '', $text);
        $text = trim((string) $text);
        if ($text === '') {
            return $this->buildFallbackMeaningFromReference($term, $source, $verses);
        }
        if ($this->isGenericKeywordText($text)) {
            return $this->buildFallbackMeaningFromReference($term, $source, $verses);
        }
        return $text;
    }

    private function sanitizeKeywordStudyUseText($term, $studyUse, $source, array $verses = [])
    {
        $text = trim((string) $studyUse);
        $text = preg_replace('/^\s*uso\s+en\s+estudio\s*:\s*/iu', '', $text);
        $text = trim((string) $text);

        if (strpos((string) $source, 'lexico-strong') === 0) {
            return $this->buildContextualStrongStudyUse($term, ['source' => (string) $source], $verses);
        }

        if ($text === '' || $this->isGenericKeywordText($text)) {
            $reference = $this->buildKeywordPassageReference($verses);
            if (trim((string) $term) === '') {
                return 'Lee ' . $reference . ' en su unidad completa, identifica repeticion, contraste y una aplicacion concreta para hoy.';
            }
            return 'En ' . $reference . ', ubica "' . trim((string) $term) . '" en su oración inmediata, identifica qué enfatiza y escribe una aplicación concreta para hoy.';
        }

        return $text;
    }

    private function buildFallbackMeaningFromReference($term, $source, array $verses = [])
    {
        $cleanTerm = trim((string) $term);
        if ($cleanTerm === '') {
            return 'Término bíblico cuyo sentido se define por el contexto inmediato y el argumento del capítulo.';
        }
        $reference = $this->buildKeywordPassageReference($verses);
        if (strpos((string) $source, 'lexico-strong') === 0) {
            return 'Sentido de "' . $cleanTerm . '" en ' . $reference . ': se interpreta por su función en la oración y su relación con el tema del pasaje.';
        }
        return 'Sentido de "' . $cleanTerm . '" en ' . $reference . ': se determina por su uso inmediato dentro del flujo del capítulo.';
    }

    private function isGenericKeywordText($text)
    {
        $text = trim((string) $text);
        if ($text === '') {
            return true;
        }
        $normalized = $this->normalizeThemeToken($text);
        if ($normalized === '') {
            return true;
        }
        $needles = [
            'termino biblico del pasaje',
            'vocablo biblico relacionado',
            'debe definirse por su uso inmediato',
            'definicion tomada del lexico strong',
            'se recomienda comparar con el capitulo completo',
            'este comentario contextual resume',
        ];
        foreach ($needles as $needle) {
            if (strpos($normalized, $needle) !== false) {
                return true;
            }
        }
        return false;
    }

    private function buildInlineKeywordDictionary()
    {
        return [
            'dios' => ['meaning' => 'Ser supremo, creador y soberano, revelado en la Escritura como santo, justo y misericordioso.', 'study_use' => 'Observa qué atributo de Dios destaca el pasaje y cómo orienta la respuesta de fe y obediencia.', 'references' => ['Deuteronomio 6:4', 'Isaías 45:5', 'Juan 17:3'], 'source' => 'diccionario-biblico-interno'],
            'ser' => ['meaning' => 'Verbo de existencia o identidad; en el texto bíblico expresa estado, naturaleza y cumplimiento de la palabra divina.', 'study_use' => 'Observa si el pasaje usa "ser" para identidad, promesa o transformación de vida.', 'references' => ['Éxodo 3:14', '2 Corintios 5:17', '1 Pedro 1:16'], 'source' => 'diccionario-biblico-interno'],
            'hacer' => ['meaning' => 'Obrar o ejecutar una acción con propósito; en teología bíblica suele resaltar la iniciativa de Dios en la historia.', 'study_use' => 'Distingue quién actúa (Dios o el ser humano), qué acción realiza y qué resultado produce en el pasaje.', 'references' => ['Génesis 1:1', 'Salmo 115:3', 'Efesios 2:10'], 'source' => 'diccionario-biblico-interno'],
            'decir' => ['meaning' => 'Hablar o declarar; en la Biblia introduce palabra con autoridad divina, promesa, mandato o testimonio.', 'study_use' => 'Identifica quién habla, a quién se dirige y qué efecto tiene la palabra en la narrativa o enseñanza.', 'references' => ['Éxodo 3:14', 'Juan 6:63', 'Hebreos 1:1-2'], 'source' => 'diccionario-biblico-interno'],
            'creer' => ['meaning' => 'Confiar y adherirse a Dios y a su Palabra con fe obediente.', 'study_use' => 'Identifica en el pasaje el objeto de la fe, la respuesta esperada y sus frutos.', 'references' => ['Juan 3:16', 'Romanos 10:9', 'Hechos 16:31'], 'source' => 'diccionario-biblico-interno'],
            'promesa' => ['meaning' => 'Compromiso declarado por Dios que asegura el cumplimiento de su voluntad en su tiempo.', 'study_use' => 'Evalua condiciones, alcance y cumplimiento de la promesa dentro del pacto.', 'references' => ['2 Pedro 1:4', 'Hebreos 10:23'], 'source' => 'diccionario-biblico-interno'],
            'gracia' => ['meaning' => 'Favor inmerecido de Dios que salva, sostiene y transforma al creyente.', 'study_use' => 'Lee el pasaje destacando iniciativa divina por encima del merito humano.', 'references' => ['Efesios 2:8', 'Romanos 3:24'], 'source' => 'diccionario-biblico-interno'],
            'justicia' => ['meaning' => 'Rectitud conforme al caracter de Dios y a su norma moral.', 'study_use' => 'Distingue justicia imputada, justicia practica y justicia social en el texto.', 'references' => ['Romanos 1:17', 'Miqueas 6:8'], 'source' => 'diccionario-biblico-interno'],
            'misericordia' => ['meaning' => 'Compasion activa de Dios ante la necesidad y la culpa humana.', 'study_use' => 'Observa como el texto une misericordia con verdad y llamado al cambio.', 'references' => ['Lamentaciones 3:22', 'Lucas 6:36'], 'source' => 'diccionario-biblico-interno'],
            'pacto' => ['meaning' => 'Relacion formal iniciada por Dios con promesas, senales y demandas de fidelidad.', 'study_use' => 'Interpreta mandatos y promesas dentro de la logica del pacto.', 'references' => ['Genesis 17:7', 'Hebreos 8:6'], 'source' => 'diccionario-biblico-interno'],
            'santidad' => ['meaning' => 'Separacion para Dios y pureza etica en pensamiento, palabra y accion.', 'study_use' => 'Distingue lo comun de lo consagrado y aplica el llamado a la vida diaria.', 'references' => ['1 Pedro 1:16', 'Hebreos 12:14'], 'source' => 'diccionario-biblico-interno'],
            'santo' => ['meaning' => 'Aquello separado para Dios y consagrado a su servicio en pureza y verdad.', 'study_use' => 'Observa si el pasaje describe santidad como identidad, llamado moral o adoracion.', 'references' => ['1 Pedro 1:15-16', 'Isaías 6:3', 'Hebreos 12:14'], 'source' => 'diccionario-biblico-interno'],
            'fe' => ['meaning' => 'Confianza obediente en Dios y en su Palabra revelada.', 'study_use' => 'Busca evidencias concretas de fe: obediencia, perseverancia y esperanza.', 'references' => ['Hebreos 11:1', 'Romanos 10:17'], 'source' => 'diccionario-biblico-interno'],
            'esperanza' => ['meaning' => 'Expectativa firme del futuro de Dios basada en sus promesas.', 'study_use' => 'Conecta sufrimiento presente con cumplimiento futuro de Dios.', 'references' => ['Romanos 15:13', 'Hebreos 6:19'], 'source' => 'diccionario-biblico-interno'],
            'redencion' => ['meaning' => 'Rescate realizado por Cristo que libera de esclavitud y condenacion.', 'study_use' => 'Relaciona costo del rescate, libertad y nueva pertenencia al Senor.', 'references' => ['Efesios 1:7', 'Colosenses 1:14'], 'source' => 'diccionario-biblico-interno'],
            'salvacion' => ['meaning' => 'Obra integral de Dios que rescata del pecado y restaura para vida eterna.', 'study_use' => 'Ubica el texto en el movimiento pecado-gracia-fe-respuesta.', 'references' => ['Efesios 2:8', 'Hechos 4:12'], 'source' => 'diccionario-biblico-interno'],
            'perdon' => ['meaning' => 'Cancelacion de culpa y reconciliacion por la obra de Cristo.', 'study_use' => 'Evalua consecuencias del perdon: restauracion, obediencia y reconciliacion.', 'references' => ['1 Juan 1:9', 'Efesios 4:32'], 'source' => 'diccionario-biblico-interno'],
            'reino' => ['meaning' => 'Gobierno soberano de Dios presente y en consumacion futura.', 'study_use' => 'Diferencia lenguaje de autoridad del Reino y sus frutos eticos.', 'references' => ['Mateo 6:33', 'Marcos 1:15'], 'source' => 'diccionario-biblico-interno'],
            'verdad' => ['meaning' => 'Realidad revelada por Dios, confiable y normativa para la vida.', 'study_use' => 'Contrasta verdad biblica con engano, autojustificacion o idolatria.', 'references' => ['Juan 8:32', 'Juan 17:17'], 'source' => 'diccionario-biblico-interno'],
            'amor' => ['meaning' => 'Entrega sacrificial orientada al bien del otro segun el ejemplo de Cristo.', 'study_use' => 'Verifica si el texto define amor por acciones concretas y no solo emocion.', 'references' => ['1 Corintios 13:4', '1 Juan 4:10'], 'source' => 'diccionario-biblico-interno'],
            'sabiduria' => ['meaning' => 'Habilidad espiritual para vivir conforme al temor del Senor.', 'study_use' => 'Extrae decisiones practicas para familia, trabajo e iglesia.', 'references' => ['Proverbios 9:10', 'Santiago 1:5'], 'source' => 'diccionario-biblico-interno'],
            'palabra' => ['meaning' => 'Revelacion de Dios con autoridad para ensenar, corregir y guiar.', 'study_use' => 'Identifica promesas, mandatos y advertencias en la progresion del pasaje.', 'references' => ['2 Timoteo 3:16', 'Salmo 119:105'], 'source' => 'diccionario-biblico-interno'],
            'espiritu' => ['meaning' => 'Accion personal de Dios que convence, regenera, guia y santifica.', 'study_use' => 'Observa efectos del Espiritu en caracter, obediencia y mision.', 'references' => ['Juan 16:13', 'Galatas 5:22'], 'source' => 'diccionario-biblico-interno'],
            'pecado' => ['meaning' => 'Rebelion contra Dios que rompe comunion y produce muerte.', 'study_use' => 'Analiza causa, manifestacion, consecuencias y respuesta de arrepentimiento.', 'references' => ['Romanos 3:23', 'Romanos 6:23'], 'source' => 'diccionario-biblico-interno'],
            'gloria' => ['meaning' => 'Manifestacion del peso, grandeza y majestad de Dios.', 'study_use' => 'Mide el pasaje por su orientacion a la gloria de Dios y no al ego humano.', 'references' => ['Romanos 11:36', '2 Corintios 3:18'], 'source' => 'diccionario-biblico-interno'],
            'temor' => ['meaning' => 'Reverencia obediente ante Dios que produce humildad y santidad.', 'study_use' => 'Diferencia temor santo de miedo servil y aplica implicaciones eticas.', 'references' => ['Proverbios 1:7', 'Eclesiastes 12:13'], 'source' => 'diccionario-biblico-interno'],
            'discipulo' => ['meaning' => 'Seguidor de Jesus que aprende su verdad y vive su mision.', 'study_use' => 'Busca llamados al seguimiento, negacion propia y obediencia.', 'references' => ['Lucas 9:23', 'Mateo 28:19'], 'source' => 'diccionario-biblico-interno'],
            'evangelio' => ['meaning' => 'Buena noticia de la obra de Cristo para reconciliar al pecador con Dios.', 'study_use' => 'Identifica anuncio, respuesta de fe y fruto de nueva vida.', 'references' => ['Romanos 1:16', '1 Corintios 15:3'], 'source' => 'diccionario-biblico-interno'],
            'oracion' => ['meaning' => 'Relacion de dependencia y comunion con Dios expresada en peticion, accion de gracias y adoracion.', 'study_use' => 'Analiza motivo, contenido y actitud de la oracion en el pasaje.', 'references' => ['Filipenses 4:6', '1 Tesalonicenses 5:17'], 'source' => 'diccionario-biblico-interno'],
            'justificado' => ['meaning' => 'Declarado justo por Dios por la fe en Cristo, no por obras.', 'study_use' => 'Distingue justificacion de santificacion y su fruto practico.', 'references' => ['Romanos 5:1', 'Galatas 2:16'], 'source' => 'diccionario-biblico-interno'],
            'arrepentimiento' => ['meaning' => 'Cambio de mente y direccion que vuelve a Dios con obediencia.', 'study_use' => 'Busca evidencias visibles de cambio y restitucion.', 'references' => ['Hechos 3:19', '2 Corintios 7:10'], 'source' => 'diccionario-biblico-interno'],
            'obediencia' => ['meaning' => 'Respuesta concreta a la voluntad de Dios revelada en su Palabra.', 'study_use' => 'Conecta doctrina con practica diaria y decisiones verificables.', 'references' => ['Juan 14:15', 'Santiago 1:22'], 'source' => 'diccionario-biblico-interno'],
            'hablar' => ['meaning' => 'Comunicar palabra con intención y autoridad; en la Biblia suele introducir revelación, testimonio o enseñanza.', 'study_use' => 'Distingue quién habla, qué declara y qué respuesta produce en la audiencia del pasaje.', 'references' => ['Hebreos 1:1-2', 'Juan 6:63', 'Hechos 4:31'], 'source' => 'diccionario-biblico-interno'],
            'terrenal' => ['meaning' => 'Lo vinculado a la esfera humana y temporal, en contraste con lo celestial y eterno.', 'study_use' => 'Observa cómo el pasaje contrapone perspectiva terrenal con la revelación de Dios.', 'references' => ['Juan 3:12', 'Colosenses 3:2', 'Santiago 3:15'], 'source' => 'diccionario-biblico-interno'],
            'celestial' => ['meaning' => 'Lo perteneciente al ámbito de Dios, su voluntad y su realidad eterna.', 'study_use' => 'Analiza si el texto usa lo celestial para corregir, elevar o orientar la fe del oyente.', 'references' => ['Juan 3:12', 'Efesios 1:3', 'Hebreos 8:5'], 'source' => 'diccionario-biblico-interno'],
            'tierra' => ['meaning' => 'Espacio de vida y herencia en la historia bíblica; puede señalar creación, promesa y misión.', 'study_use' => 'Lee el término dentro del pacto: posesión, peregrinación o alcance universal de la bendición.', 'references' => ['Génesis 12:1', 'Salmo 24:1', 'Mateo 5:5'], 'source' => 'diccionario-biblico-interno'],
            'nacion' => ['meaning' => 'Pueblo o conjunto de pueblos en los que Dios despliega su propósito histórico y redentor.', 'study_use' => 'Ubica si la mención de nación apunta a juicio, bendición o expansión del pacto.', 'references' => ['Génesis 12:2', 'Isaías 49:6', 'Apocalipsis 7:9'], 'source' => 'diccionario-biblico-interno'],
            'bendicion' => ['meaning' => 'Favor eficaz de Dios que comunica vida, fruto y propósito según su pacto.', 'study_use' => 'Relaciona bendición con obediencia, misión y alcance a otros, no solo beneficio individual.', 'references' => ['Génesis 12:2-3', 'Efesios 1:3', '1 Pedro 3:9'], 'source' => 'diccionario-biblico-interno'],
            'nombre' => ['meaning' => 'En lenguaje bíblico, expresa identidad, autoridad y reputación ante Dios y las personas.', 'study_use' => 'Examina si el nombre se asocia con llamado, promesa, honra o testimonio.', 'references' => ['Génesis 12:2', 'Proverbios 22:1', 'Hechos 4:12'], 'source' => 'diccionario-biblico-interno'],
            'teofilo' => ['meaning' => 'Destinatario de Lucas-Hechos; su nombre significa amado por Dios o amigo de Dios.', 'study_use' => 'Ayuda a leer el prólogo como testimonio ordenado para afirmar certeza en la fe.', 'references' => ['Lucas 1:3', 'Hechos 1:1'], 'source' => 'diccionario-biblico-interno'],
            'abram' => ['meaning' => 'Nombre patriarcal de Abraham antes del cambio de nombre; llamado por Dios para iniciar una historia de pacto.', 'study_use' => 'Observa el llamado, la salida en fe y la promesa que bendice a las naciones.', 'references' => ['Génesis 12:1-3', 'Génesis 17:5', 'Romanos 4:16-18'], 'source' => 'diccionario-biblico-interno'],
            'tratado' => ['meaning' => 'Escrito o relato ordenado; en Hechos 1:1 alude al primer volumen (Evangelio de Lucas).', 'study_use' => 'Úsalo para conectar continuidad entre obra de Jesús y misión de la iglesia.', 'references' => ['Lucas 1:1-4', 'Hechos 1:1-2'], 'source' => 'diccionario-biblico-interno'],
            'vida' => ['meaning' => 'Existencia renovada por Dios en comunion presente y esperanza eterna.', 'study_use' => 'Contrasta vieja vida con vida nueva en Cristo.', 'references' => ['Juan 10:10', 'Colosenses 3:3'], 'source' => 'diccionario-biblico-interno'],
            'muerte' => ['meaning' => 'Consecuencia del pecado y, en Cristo, tambien figura de ruptura con la vieja naturaleza.', 'study_use' => 'Distingue uso fisico, espiritual y metaforico.', 'references' => ['Romanos 6:23', 'Romanos 6:11'], 'source' => 'diccionario-biblico-interno'],
            'luz' => ['meaning' => 'Revelacion y pureza de Dios que expone y guia al creyente.', 'study_use' => 'Analiza contraste luz-tinieblas y llamado a caminar en verdad.', 'references' => ['Juan 8:12', '1 Juan 1:7'], 'source' => 'diccionario-biblico-interno'],
            'tinieblas' => ['meaning' => 'Estado de confusion, pecado y oposicion a la verdad de Dios.', 'study_use' => 'Ubica el llamado del texto a salir de la oscuridad espiritual.', 'references' => ['Efesios 5:8', 'Colosenses 1:13'], 'source' => 'diccionario-biblico-interno'],
            'ley' => ['meaning' => 'Instruccion de Dios que revela su justicia y conduce a la necesidad de gracia.', 'study_use' => 'Distingue funcion pedagogica de la ley y cumplimiento en Cristo.', 'references' => ['Romanos 7:12', 'Galatas 3:24'], 'source' => 'diccionario-biblico-interno'],
            'paz' => ['meaning' => 'Estado de reconciliacion con Dios y plenitud integral bajo su gobierno.', 'study_use' => 'Observa si la paz es relacional, interior o comunitaria.', 'references' => ['Juan 14:27', 'Romanos 5:1'], 'source' => 'diccionario-biblico-interno'],
            'gozo' => ['meaning' => 'Alegria profunda fundada en Dios, no en circunstancias cambiantes.', 'study_use' => 'Relaciona el gozo con fe, gratitud y esperanza.', 'references' => ['Filipenses 4:4', 'Nehemias 8:10'], 'source' => 'diccionario-biblico-interno'],
            'justificacion' => ['meaning' => 'Acto legal de Dios que declara justo al pecador por la fe.', 'study_use' => 'Usa el pasaje para separar posicion en Cristo y crecimiento espiritual.', 'references' => ['Romanos 5:1', 'Tito 3:7'], 'source' => 'diccionario-biblico-interno'],
            'santificacion' => ['meaning' => 'Proceso continuo por el cual Dios conforma al creyente a Cristo.', 'study_use' => 'Busca practicas concretas de renuncia al pecado y obediencia.', 'references' => ['1 Tesalonicenses 4:3', 'Hebreos 10:14'], 'source' => 'diccionario-biblico-interno'],
        ];
    }

    private function buildFallbackKeywordInsight($term)
    {
        $cleanTerm = trim((string) $term);
        $normalized = $this->normalizeThemeToken($cleanTerm);
        $baseDictionary = $this->buildFallbackBiblicalDictionaryMap();
        if ($normalized !== '' && isset($baseDictionary[$normalized])) {
            $row = $baseDictionary[$normalized];
            return [
                'meaning' => (string) ($row['meaning'] ?? ''),
                'study_use' => (string) ($row['study_use'] ?? ''),
                'references' => isset($row['references']) && is_array($row['references']) ? array_values($row['references']) : [],
                'source' => 'diccionario-biblico-base',
            ];
        }

        $byFamily = [
            'gracia' => ['meaning' => 'Favor inmerecido de Dios que rescata y transforma.', 'study_use' => 'Observa como el pasaje contrasta gracia divina frente a merito humano.', 'references' => ['Efesios 2:8', 'Romanos 3:24']],
            'fe' => ['meaning' => 'Confianza obediente en Dios y en su Palabra.', 'study_use' => 'Busca evidencias concretas de fe: obediencia, perseverancia y esperanza.', 'references' => ['Hebreos 11:1', 'Romanos 10:17']],
            'perdon' => ['meaning' => 'Cancelacion de culpa y restauracion de la relacion con Dios.', 'study_use' => 'Relaciona el termino con arrepentimiento, reconciliacion y vida nueva.', 'references' => ['1 Juan 1:9', 'Efesios 4:32']],
            'amor' => ['meaning' => 'Entrega sacrificial orientada al bien del otro.', 'study_use' => 'Distingue amor biblico (accion) de amor solo emocional.', 'references' => ['1 Corintios 13:4', '1 Juan 4:10']],
            'esperanza' => ['meaning' => 'Seguridad futura basada en promesas divinas.', 'study_use' => 'Conecta sufrimiento presente con promesa y perseverancia.', 'references' => ['Romanos 15:13', 'Hebreos 6:19']],
            'santidad' => ['meaning' => 'Vida separada para Dios en pureza y obediencia.', 'study_use' => 'Examina llamados concretos de consagracion en el pasaje.', 'references' => ['1 Pedro 1:16', 'Hebreos 12:14']],
            'salvacion' => ['meaning' => 'Obra integral de Dios que rescata del pecado y da vida eterna.', 'study_use' => 'Ubica el termino en el movimiento pecado-gracia-fe-respuesta.', 'references' => ['Hechos 4:12', 'Efesios 2:8']],
            'justicia' => ['meaning' => 'Rectitud conforme al caracter y voluntad de Dios.', 'study_use' => 'Diferencia justicia declarada por Dios y justicia practicada.', 'references' => ['Romanos 1:17', 'Miqueas 6:8']],
            'reino' => ['meaning' => 'Gobierno soberano de Dios presente y futuro.', 'study_use' => 'Identifica señales del Reino en mandatos y frutos del texto.', 'references' => ['Mateo 6:33', 'Marcos 1:15']],
            'espiritu' => ['meaning' => 'Accion personal de Dios que guia, santifica y capacita.', 'study_use' => 'Observa efectos del Espiritu en caracter, discernimiento y mision.', 'references' => ['Juan 16:13', 'Galatas 5:22']],
            'desolacion' => ['meaning' => 'Ruina profunda o estado de abandono asociado en la Biblia con juicio, quebranto y llamado al arrepentimiento.', 'study_use' => 'Identifica causa de la desolacion, respuesta exigida por Dios y promesa de restauracion en el contexto.', 'references' => ['Isaías 64:10', 'Jeremías 25:11', 'Joel 2:12-13']],
            'devast' => ['meaning' => 'Destruccion severa que deja un lugar o pueblo en ruina; suele funcionar como advertencia espiritual.', 'study_use' => 'Relaciona la devastacion con la infidelidad denunciada y con el llamado del pasaje a volver a Dios.', 'references' => ['2 Reyes 19:25', 'Lamentaciones 1:1', 'Ezequiel 33:11']],
        ];
        foreach ($byFamily as $token => $row) {
            if ($normalized !== '' && (strpos($normalized, $token) !== false || $this->tokenExistsInNormalizedText($normalized, $token))) {
                return [
                    'meaning' => (string) $row['meaning'],
                    'study_use' => (string) $row['study_use'],
                    'references' => isset($row['references']) && is_array($row['references']) ? $row['references'] : [],
                    'source' => 'diccionario-biblico-contextual',
                ];
            }
        }

        return [
            'meaning' => $this->buildContextualUnknownKeywordMeaning($cleanTerm),
            'study_use' => $this->buildContextualUnknownKeywordStudyUse($cleanTerm),
            'references' => [],
            'source' => 'diccionario-biblico-contextual',
        ];
    }

    private function buildContextualUnknownKeywordMeaning($term)
    {
        $term = trim((string) $term);
        if ($term === '') {
            return 'Vocablo biblico cuyo sentido se determina por el contexto literario e historico del pasaje.';
        }
        return 'Vocablo biblico relacionado con "' . $term . '"; su sentido preciso se define por la oracion inmediata, el argumento del capitulo y el desarrollo del libro.';
    }

    private function buildContextualUnknownKeywordStudyUse($term)
    {
        $term = trim((string) $term);
        if ($term === '') {
            return 'Rastrea repeticiones, paralelos y contraste en el contexto inmediato para precisar su sentido.';
        }
        return 'Ubica "' . $term . '" en su frase inmediata, compara con dos pasajes paralelos y redacta una definicion breve aplicable al tema central.';
    }

    private function buildFallbackBiblicalDictionaryMap()
    {
        return [
            'abraham' => [
                'meaning' => 'Patriarca del pueblo de Israel, llamado por Dios para iniciar la linea del pacto y de la promesa.',
                'study_use' => 'Su figura se usa para estudiar fe, obediencia y justificacion por la fe en la historia redentiva.',
                'references' => ['Genesis 12:1-3', 'Genesis 15:6', 'Romanos 4:1-3'],
            ],
            'isaac' => [
                'meaning' => 'Hijo de Abraham y Sara, heredero de la promesa del pacto.',
                'study_use' => 'Su vida muestra continuidad de la promesa divina a traves de generaciones.',
                'references' => ['Genesis 21:1-3', 'Genesis 26:2-5', 'Galatas 4:28'],
            ],
            'jacob' => [
                'meaning' => 'Hijo de Isaac, luego llamado Israel; padre de las doce tribus.',
                'study_use' => 'Su historia ilustra transformacion, disciplina y fidelidad de Dios al pacto.',
                'references' => ['Genesis 28:13-15', 'Genesis 32:28', 'Genesis 35:10'],
            ],
            'moises' => [
                'meaning' => 'Siervo y profeta por medio del cual Dios liberto a Israel de Egipto y entrego la Ley.',
                'study_use' => 'Ayuda a estudiar exodo, pacto sinaítico y liderazgo espiritual.',
                'references' => ['Exodo 3:10', 'Exodo 14:30-31', 'Deuteronomio 34:10'],
            ],
            'david' => [
                'meaning' => 'Rey de Israel asociado al pacto davídico y a la esperanza mesiánica.',
                'study_use' => 'Permite estudiar reino, adoracion y promesa del Mesias descendiente suyo.',
                'references' => ['1 Samuel 16:13', '2 Samuel 7:12-16', 'Hechos 13:22-23'],
            ],
            'jesus' => [
                'meaning' => 'Nombre del Hijo de Dios encarnado; significa "YHWH salva".',
                'study_use' => 'Centro del evangelio: su vida, muerte y resurreccion cumplen las promesas biblicas.',
                'references' => ['Mateo 1:21', 'Juan 1:14', '1 Corintios 15:3-4'],
            ],
            'cristo' => [
                'meaning' => 'Titulo mesianico que significa "Ungido"; identifica a Jesus como Mesias prometido.',
                'study_use' => 'Se usa para relacionar profecias del AT con su cumplimiento en Jesus.',
                'references' => ['Mateo 16:16', 'Lucas 24:26-27', 'Hechos 2:36'],
            ],
            'pedro' => [
                'meaning' => 'Apostol de Jesus, lider en la iglesia primitiva.',
                'study_use' => 'Figura clave para estudiar discipulado, restauracion y predicacion apostolica.',
                'references' => ['Mateo 16:18', 'Juan 21:15-17', 'Hechos 2:14'],
            ],
            'pablo' => [
                'meaning' => 'Apostol a los gentiles y autor de varias epistolas del NT.',
                'study_use' => 'Su ministerio aporta doctrina sobre gracia, fe e iglesia.',
                'references' => ['Hechos 9:15', 'Romanos 1:1', 'Galatas 2:20'],
            ],
            'israel' => [
                'meaning' => 'Nombre del pueblo del pacto descendiente de Jacob; tambien nombre del propio Jacob.',
                'study_use' => 'Clave para estudiar historia redentiva, pacto y promesas biblicas.',
                'references' => ['Genesis 32:28', 'Exodo 19:5-6', 'Romanos 9:4-5'],
            ],
            'jerusalen' => [
                'meaning' => 'Ciudad central del culto en Israel y lugar clave en la historia de la redencion.',
                'study_use' => 'Importante para estudiar templo, profecia y eventos de la pasion-resurreccion.',
                'references' => ['2 Cronicas 6:6', 'Lucas 24:47', 'Hechos 1:8'],
            ],
            'egipto' => [
                'meaning' => 'Nacion vinculada al relato de opresion y liberacion de Israel en el exodo.',
                'study_use' => 'Simbolo historico de esclavitud y de la intervencion salvadora de Dios.',
                'references' => ['Exodo 1:11-14', 'Exodo 12:41', 'Oseas 11:1'],
            ],
            'babilonia' => [
                'meaning' => 'Imperio asociado al exilio de Juda y al juicio de Dios en la historia biblica.',
                'study_use' => 'Ayuda a estudiar exilio, fidelidad en crisis y esperanza de restauracion.',
                'references' => ['2 Reyes 25:8-11', 'Jeremias 29:10', 'Daniel 1:1-2'],
            ],
        ];
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

    private function themeConcordanceCatalog()
    {
        return [
            [
                'key' => 'gracia',
                'label' => 'Gracia',
                'aliases' => ['favor', 'misericordia', 'gracia de dios'],
                'keywords' => ['gracia', 'misericordia', 'favor', 'bondad', 'justificado'],
                'seed' => ['45:3:24', '49:2:8', '56:2:11', '58:4:16', '43:1:16'],
            ],
            [
                'key' => 'fe',
                'label' => 'Fe',
                'aliases' => ['confiar', 'confianza', 'creer'],
                'keywords' => ['fe', 'creer', 'confianza', 'esperar', 'fiel', 'creído'],
                'seed' => ['58:11:1', '45:10:17', '41:9:23', '49:2:8', '20:3:5'],
            ],
            [
                'key' => 'perdon',
                'label' => 'Perdón',
                'aliases' => ['perdón', 'perdonar', 'reconciliacion', 'reconciliación'],
                'keywords' => ['perdón', 'perdonar', 'perdonados', 'reconciliar', 'misericordia', 'culpa'],
                'seed' => ['62:1:9', '49:4:32', '40:6:14', '51:3:13', '19:103:12'],
            ],
            [
                'key' => 'esperanza',
                'label' => 'Esperanza',
                'aliases' => ['ánimo', 'animo', 'consuelo'],
                'keywords' => ['esperanza', 'esperar', 'consuelo', 'promesa', 'ancla', 'confianza'],
                'seed' => ['45:15:13', '24:29:11', '58:6:19', '60:1:3', '19:42:11'],
            ],
            [
                'key' => 'amor',
                'label' => 'Amor',
                'aliases' => ['caridad', 'amar'],
                'keywords' => ['amor', 'amar', 'amado', 'caridad', 'prójimo', 'projimo'],
                'seed' => ['46:13:4', '43:3:16', '62:4:8', '41:12:30', '45:12:10'],
            ],
            [
                'key' => 'oracion',
                'label' => 'Oración',
                'aliases' => ['oración', 'orar', 'súplica', 'suplica'],
                'keywords' => ['oración', 'orar', 'súplica', 'clamar', 'petición', 'interceder'],
                'seed' => ['52:5:17', '50:4:6', '42:18:1', '19:145:18', '40:6:9'],
            ],
            [
                'key' => 'salvacion',
                'label' => 'Salvación',
                'aliases' => ['salvación', 'salvo', 'redencion', 'redención'],
                'keywords' => ['salvación', 'salvar', 'salvo', 'redención', 'rescate', 'vida eterna'],
                'seed' => ['49:2:8', '45:1:16', '44:4:12', '43:3:17', '56:3:5'],
            ],
            [
                'key' => 'sabiduria',
                'label' => 'Sabiduría',
                'aliases' => ['sabiduría', 'prudencia', 'entendimiento'],
                'keywords' => ['sabiduría', 'prudencia', 'entendimiento', 'discernimiento', 'consejo'],
                'seed' => ['20:9:10', '59:1:5', '20:3:13', '21:7:12', '51:2:3'],
            ],
            [
                'key' => 'paz',
                'label' => 'Paz',
                'aliases' => ['tranquilidad', 'shalom'],
                'keywords' => ['paz', 'reposo', 'quietud', 'seguridad'],
                'seed' => ['43:14:27', '23:26:3', '50:4:7', '45:5:1', '19:29:11'],
            ],
            [
                'key' => 'gozo',
                'label' => 'Gozo',
                'aliases' => ['alegria', 'alegría', 'regocijo'],
                'keywords' => ['gozo', 'alegría', 'regocijo', 'gozarse', 'feliz'],
                'seed' => ['16:8:10', '43:15:11', '50:4:4', '19:16:11', '45:15:13'],
            ],
            [
                'key' => 'santidad',
                'label' => 'Santidad',
                'aliases' => ['santo', 'consagracion', 'consagración'],
                'keywords' => ['santidad', 'santo', 'consagrado', 'pureza', 'separado para dios'],
                'seed' => ['60:1:16', '58:12:14', '3:19:2', '52:4:3', '47:7:1'],
            ],
            [
                'key' => 'obediencia',
                'label' => 'Obediencia',
                'aliases' => ['obedecer', 'sumision', 'sumisión'],
                'keywords' => ['obediencia', 'obedecer', 'mandamientos', 'escuchar', 'someterse'],
                'seed' => ['43:14:15', '9:15:22', '45:6:16', '5:28:1', '59:1:22'],
            ],
            [
                'key' => 'justicia',
                'label' => 'Justicia',
                'aliases' => ['rectitud', 'justo'],
                'keywords' => ['justicia', 'justo', 'rectitud', 'derecho', 'equidad'],
                'seed' => ['40:6:33', '45:3:26', '20:21:3', '23:1:17', '33:6:8'],
            ],
            [
                'key' => 'misericordia',
                'label' => 'Misericordia',
                'aliases' => ['compasion', 'compasión', 'piedad'],
                'keywords' => ['misericordia', 'compasión', 'piedad', 'clemencia', 'bondad'],
                'seed' => ['25:3:22', '40:5:7', '42:6:36', '56:3:5', '58:4:16'],
            ],
            [
                'key' => 'humildad',
                'label' => 'Humildad',
                'aliases' => ['humilde', 'mansedumbre'],
                'keywords' => ['humildad', 'humilde', 'mansedumbre', 'servir', 'someterse'],
                'seed' => ['50:2:3', '60:5:6', '20:22:4', '33:6:8', '59:4:10'],
            ],
            [
                'key' => 'fortaleza',
                'label' => 'Fortaleza',
                'aliases' => ['fuerza', 'animo', 'ánimo'],
                'keywords' => ['fortaleza', 'fuerza', 'esfuerzo', 'valentía', 'ánimo'],
                'seed' => ['23:40:31', '6:1:9', '49:6:10', '19:46:1', '55:1:7'],
            ],
            [
                'key' => 'sanidad',
                'label' => 'Sanidad',
                'aliases' => ['salud', 'restauracion', 'restauración'],
                'keywords' => ['sanidad', 'sano', 'curar', 'restaurar', 'medicina'],
                'seed' => ['23:53:5', '59:5:14', '24:30:17', '2:15:26', '19:103:3'],
            ],
            [
                'key' => 'familia',
                'label' => 'Familia',
                'aliases' => ['hogar', 'padres e hijos'],
                'keywords' => ['familia', 'hogar', 'hijos', 'padres', 'casa'],
                'seed' => ['6:24:15', '49:6:1', '51:3:20', '20:22:6', '19:127:3'],
            ],
            [
                'key' => 'matrimonio',
                'label' => 'Matrimonio',
                'aliases' => ['esposos', 'esposo y esposa'],
                'keywords' => ['matrimonio', 'esposo', 'esposa', 'pacto', 'unidad'],
                'seed' => ['1:2:24', '49:5:25', '58:13:4', '40:19:6', '60:3:7'],
            ],
            [
                'key' => 'juventud',
                'label' => 'Juventud',
                'aliases' => ['jovenes', 'jóvenes'],
                'keywords' => ['juventud', 'joven', 'adolescente', 'temprano', 'ejemplo'],
                'seed' => ['54:4:12', '21:12:1', '19:119:9', '25:3:27', '20:20:29'],
            ],
            [
                'key' => 'disciplina',
                'label' => 'Disciplina',
                'aliases' => ['correccion', 'corrección', 'instruccion'],
                'keywords' => ['disciplina', 'corrección', 'instrucción', 'formación', 'reprensión'],
                'seed' => ['58:12:11', '20:3:11', '20:12:1', '55:3:16', '66:3:19'],
            ],
            [
                'key' => 'servicio',
                'label' => 'Servicio',
                'aliases' => ['servir', 'ministerio'],
                'keywords' => ['servicio', 'servir', 'ministerio', 'diaconía', 'entrega'],
                'seed' => ['41:10:45', '48:5:13', '6:24:14', '60:4:10', '51:3:23'],
            ],
            [
                'key' => 'gratitud',
                'label' => 'Gratitud',
                'aliases' => ['agradecimiento', 'dar gracias'],
                'keywords' => ['gratitud', 'agradecimiento', 'dar gracias', 'alabanza', 'acción de gracias'],
                'seed' => ['52:5:18', '51:3:17', '19:100:4', '49:5:20', '19:107:1'],
            ],
            [
                'key' => 'generosidad',
                'label' => 'Generosidad',
                'aliases' => ['dar', 'ofrenda'],
                'keywords' => ['generosidad', 'dar', 'ofrenda', 'compartir', 'liberalidad'],
                'seed' => ['47:9:7', '20:11:25', '42:6:38', '44:20:35', '54:6:18'],
            ],
            [
                'key' => 'verdad',
                'label' => 'Verdad',
                'aliases' => ['veracidad', 'sinceridad'],
                'keywords' => ['verdad', 'verdadero', 'sincero', 'luz', 'palabra'],
                'seed' => ['43:8:32', '43:14:6', '19:119:160', '49:4:25', '20:12:22'],
            ],
            [
                'key' => 'pureza',
                'label' => 'Pureza',
                'aliases' => ['limpieza', 'santo corazon', 'santo corazón'],
                'keywords' => ['pureza', 'limpio', 'corazón limpio', 'santidad', 'castidad'],
                'seed' => ['40:5:8', '55:2:22', '19:51:10', '62:3:3', '54:5:22'],
            ],
            [
                'key' => 'evangelismo',
                'label' => 'Evangelismo',
                'aliases' => ['predicar', 'buenas nuevas'],
                'keywords' => ['evangelio', 'evangelismo', 'predicar', 'testimonio', 'misión'],
                'seed' => ['40:28:19', '41:16:15', '45:10:14', '55:4:5', '60:3:15'],
            ],
            [
                'key' => 'discipulado',
                'label' => 'Discipulado',
                'aliases' => ['discipulos', 'discípulos'],
                'keywords' => ['discipulado', 'discípulo', 'seguir a jesus', 'formación', 'enseñar'],
                'seed' => ['42:9:23', '43:8:31', '40:4:19', '55:2:2', '44:2:42'],
            ],
            [
                'key' => 'liderazgo',
                'label' => 'Liderazgo',
                'aliases' => ['lider', 'líder', 'pastoreo'],
                'keywords' => ['liderazgo', 'líder', 'guiar', 'pastorear', 'ejemplo'],
                'seed' => ['54:3:2', '2:18:21', '60:5:2', '41:10:43', '20:11:14'],
            ],
            [
                'key' => 'consuelo',
                'label' => 'Consuelo',
                'aliases' => ['animo', 'ánimo', 'alivio'],
                'keywords' => ['consuelo', 'consolar', 'ánimo', 'fortalecer', 'acompañar'],
                'seed' => ['47:1:3', '40:5:4', '19:34:18', '23:41:10', '43:14:1'],
            ],
        ];
    }

    private function resolveThemeEntry($rawTheme, array $catalog)
    {
        $needle = $this->normalizeThemeToken((string) $rawTheme);
        if ($needle === '') {
            return null;
        }

        $best = null;
        $bestScore = -1;
        foreach ($catalog as $entry) {
            if (!is_array($entry)) {
                continue;
            }
            $key = trim((string) ($entry['key'] ?? ''));
            if ($key === '') {
                continue;
            }

            $candidates = [$key, (string) ($entry['label'] ?? '')];
            $aliases = isset($entry['aliases']) && is_array($entry['aliases']) ? $entry['aliases'] : [];
            foreach ($aliases as $alias) {
                $candidates[] = (string) $alias;
            }

            $score = 0;
            foreach ($candidates as $candidate) {
                $normalized = $this->normalizeThemeToken($candidate);
                if ($normalized === '') {
                    continue;
                }
                if ($normalized === $needle) {
                    $score = max($score, 4);
                    continue;
                }
                if (strpos($normalized, $needle) !== false || strpos($needle, $normalized) !== false) {
                    $score = max($score, 2);
                }
            }

            if ($score > $bestScore) {
                $best = $entry;
                $bestScore = $score;
            }
        }

        if ($bestScore < 1) {
            return null;
        }
        return $best;
    }

    private function buildThemeTokens(array $themeEntry)
    {
        $tokens = [];
        $push = function ($value) use (&$tokens): void {
            $raw = trim((string) $value);
            if ($raw === '') {
                return;
            }
            $normalized = $this->normalizeThemeToken($raw);
            if ($normalized === '') {
                return;
            }
            $tokens[$normalized] = $raw;
        };

        $push((string) ($themeEntry['key'] ?? ''));
        $push((string) ($themeEntry['label'] ?? ''));
        $aliases = isset($themeEntry['aliases']) && is_array($themeEntry['aliases']) ? $themeEntry['aliases'] : [];
        foreach ($aliases as $alias) {
            $push((string) $alias);
        }
        $keywords = isset($themeEntry['keywords']) && is_array($themeEntry['keywords']) ? $themeEntry['keywords'] : [];
        foreach ($keywords as $keyword) {
            $push((string) $keyword);
        }

        return array_values($tokens);
    }

    private function normalizeThemeToken($value)
    {
        $text = trim((string) $value);
        if ($text === '') {
            return '';
        }
        if (function_exists('mb_strtolower')) {
            $text = mb_strtolower($text, 'UTF-8');
        } else {
            $text = strtolower($text);
        }
        $text = strtr($text, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ñ' => 'n',
        ]);
        $text = preg_replace('/[^a-z0-9\s]/u', ' ', $text);
        $text = preg_replace('/\s+/u', ' ', (string) $text);
        return trim((string) $text);
    }

    private function scoreThemeRow(array $row, array $tokens, $themeKey)
    {
        $text = trim((string) (($row['title'] ?? '') . ' ' . ($row['scripture_text'] ?? '')));
        $normalized = $this->normalizeThemeToken($text);
        if ($normalized === '') {
            return 0;
        }

        $score = 0;
        $themeNeedle = $this->normalizeThemeToken($themeKey);
        if ($themeNeedle !== '') {
            if ($this->tokenExistsInNormalizedText($normalized, $themeNeedle)) {
                $score += 7;
            } elseif (strpos($normalized, $themeNeedle) !== false) {
                $score += 4;
            }
        }

        foreach ($tokens as $token) {
            $needle = $this->normalizeThemeToken((string) $token);
            if ($needle === '') {
                continue;
            }
            if ($this->tokenExistsInNormalizedText($normalized, $needle)) {
                $score += 2;
                continue;
            }
            if ($this->mbStrlen($needle) >= 4 && strpos($normalized, $needle) !== false) {
                $score += 1;
            }
        }

        if ((int) ($row['book'] ?? 0) >= 40) {
            $score += 1;
        }

        return $score;
    }

    private function tokenExistsInNormalizedText($normalizedText, $normalizedToken)
    {
        $text = trim((string) $normalizedText);
        $token = trim((string) $normalizedToken);
        if ($text === '' || $token === '') {
            return false;
        }
        $pattern = '/(?:^|\\s)' . preg_quote($token, '/') . '(?:$|\\s)/u';
        return (bool) preg_match($pattern, $text);
    }

    private function buildThemeSeedRows(array $themeEntry)
    {
        $seed = isset($themeEntry['seed']) && is_array($themeEntry['seed']) ? $themeEntry['seed'] : [];
        $rows = [];

        foreach ($seed as $ref) {
            $parts = explode(':', (string) $ref);
            if (count($parts) !== 3) {
                continue;
            }
            $book = (int) $parts[0];
            $chapter = (int) $parts[1];
            $verse = (int) $parts[2];
            if ($book < 1 || $chapter < 1 || $verse < 1) {
                continue;
            }
            $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
            if (!$verseRow) {
                continue;
            }

            $rows[] = [
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'reference' => $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse),
                'title' => 'Pasaje sugerido',
                'scripture_html' => (string) ($verseRow['scripture_html'] ?? ''),
                'scripture_text' => (string) ($verseRow['scripture_text'] ?? ''),
            ];
        }

        return $rows;
    }

    private function themeRowKey(array $row)
    {
        $book = (int) ($row['book'] ?? 0);
        $chapter = (int) ($row['chapter'] ?? 0);
        $verse = (int) ($row['verse'] ?? 0);
        if ($book < 1 || $chapter < 1 || $verse < 1) {
            return '';
        }
        return $book . ':' . $chapter . ':' . $verse;
    }

    private function mergeCommentaryPayload($base, $book, $chapter, $verseStart, $verseEnd)
    {
        $payload = is_array($base) ? $base : [];
        if (!isset($payload['book']) || !is_array($payload['book'])) {
            $payload['book'] = [];
        }
        if (!isset($payload['chapter']) || !is_array($payload['chapter'])) {
            $payload['chapter'] = [];
        }
        if (!isset($payload['verse']) || !is_array($payload['verse'])) {
            $payload['verse'] = [];
        }

        try {
            $extra = $this->moduleCatalogService->getCommentaryForRange($book, $chapter, $verseStart, $verseEnd);
            if (is_array($extra)) {
                foreach (['book', 'chapter', 'verse'] as $group) {
                    if (!empty($extra[$group]) && is_array($extra[$group])) {
                        $payload[$group] = array_merge($payload[$group], $extra[$group]);
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore module errors to avoid breaking reader
        }

        return $payload;
    }

    private function buildAutoCrossReferences($book, $chapter, $verseStart, $verseEnd, $passageText, array $keywords = [], $limit = 8)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verseStart = (int) $verseStart;
        $verseEnd = (int) $verseEnd;
        $limit = max(3, min(12, (int) $limit));

        $normalizedKeywords = [];
        foreach ($keywords as $rawKeyword) {
            $token = $this->normalizeThemeToken((string) $rawKeyword);
            if ($token === '' || $this->mbStrlen($token) < 3 || $this->isWeakCrossReferenceKeyword($token, (string) $rawKeyword)) {
                continue;
            }
            if (!isset($normalizedKeywords[$token])) {
                $normalizedKeywords[$token] = (string) $rawKeyword;
            }
            if (count($normalizedKeywords) >= 6) {
                break;
            }
        }
        if (empty($normalizedKeywords)) {
            foreach ($this->extractKeywordsForStudy((string) $passageText, 6) as $fallbackKeyword) {
                $token = $this->normalizeThemeToken((string) $fallbackKeyword);
                if ($token === '' || $this->mbStrlen($token) < 3 || $this->isWeakCrossReferenceKeyword($token, (string) $fallbackKeyword)) {
                    continue;
                }
                if (!isset($normalizedKeywords[$token])) {
                    $normalizedKeywords[$token] = (string) $fallbackKeyword;
                }
                if (count($normalizedKeywords) >= 6) {
                    break;
                }
            }
        }
        if (empty($normalizedKeywords)) {
            return [];
        }

        $tokenKeys = array_values(array_keys($normalizedKeywords));
        $tokenLabels = array_values($normalizedKeywords);
        $anyQuery = implode(' ', array_slice($tokenLabels, 0, 4));
        $allQuery = implode(' ', array_slice($tokenLabels, 0, 2));
        if (trim($anyQuery) === '') {
            return [];
        }

        $rows = [];
        if (trim($allQuery) !== '' && count($tokenKeys) >= 2) {
            $strictSearch = $this->searchService->search([
                'query' => $allQuery,
                'mode' => 'all',
                'book' => 0,
                'chapter_from' => 0,
                'chapter_to' => 0,
            ], 1200);
            $strictRows = isset($strictSearch['rows']) && is_array($strictSearch['rows']) ? $strictSearch['rows'] : [];
            if (!empty($strictRows)) {
                $rows = $strictRows;
            }
        }

        if (count($rows) < 80) {
            $broadSearch = $this->searchService->search([
                'query' => $anyQuery,
                'mode' => 'any',
                'book' => 0,
                'chapter_from' => 0,
                'chapter_to' => 0,
            ], 1600);
            $broadRows = isset($broadSearch['rows']) && is_array($broadSearch['rows']) ? $broadSearch['rows'] : [];
            if (!empty($broadRows)) {
                $seenRows = [];
                foreach ($rows as $row) {
                    $seenRows[$this->themeRowKey($row)] = true;
                }
                foreach ($broadRows as $row) {
                    $key = $this->themeRowKey($row);
                    if ($key === '' || isset($seenRows[$key])) {
                        continue;
                    }
                    $rows[] = $row;
                    $seenRows[$key] = true;
                }
            }
        }
        if (empty($rows)) {
            return [];
        }

        $strictMinTerms = count($tokenKeys) >= 2 ? 2 : 1;
        $anchorTokens = [];
        foreach ($normalizedKeywords as $token => $label) {
            if ($this->isWeakCrossReferenceAnchorToken((string) $token, (string) $label)) {
                continue;
            }
            $anchorTokens[(string) $token] = true;
            if (count($anchorTokens) >= 3) {
                break;
            }
        }
        $isCurrentNt = $this->isNewTestamentBook($book);
        $references = [];
        $seen = [];
        foreach ($rows as $row) {
            $rBook = (int) ($row['book'] ?? 0);
            $rChapter = (int) ($row['chapter'] ?? 0);
            $rVerse = (int) ($row['verse'] ?? 0);
            if ($rBook < 1 || $rChapter < 1 || $rVerse < 1) {
                continue;
            }
            if ($rBook === $book && $rChapter === $chapter && $rVerse >= $verseStart && $rVerse <= $verseEnd) {
                continue;
            }
            $rowKey = $rBook . ':' . $rChapter . ':' . $rVerse;
            if (isset($seen[$rowKey])) {
                continue;
            }

            $text = trim((string) ($row['scripture_text'] ?? ''));
            $scoreData = $this->scoreCrossReferenceRow($text, $normalizedKeywords, $book, $rBook);
            if ((int) ($scoreData['term_count'] ?? 0) < $strictMinTerms) {
                continue;
            }
            if (!empty($anchorTokens) && $strictMinTerms >= 2) {
                $anchorMatch = 0;
                $matchedTokens = isset($scoreData['matched_tokens']) && is_array($scoreData['matched_tokens'])
                    ? $scoreData['matched_tokens']
                    : [];
                foreach ($matchedTokens as $matchedToken) {
                    if (isset($anchorTokens[(string) $matchedToken])) {
                        $anchorMatch += 1;
                    }
                }
                if ($anchorMatch < 1) {
                    continue;
                }
            }
            if ((int) ($scoreData['score'] ?? 0) < 5) {
                continue;
            }
            if ($strictMinTerms > 1 && $this->isNewTestamentBook($rBook) !== $isCurrentNt && (int) ($scoreData['term_count'] ?? 0) < 3) {
                continue;
            }
            $seen[$rowKey] = true;
            $references[] = [
                'book' => $rBook,
                'chapter' => $rChapter,
                'verse' => $rVerse,
                'reference' => $this->bibleRepository->buildReferenceLabel($rBook, $rChapter, $rVerse),
                'text' => $this->truncateText($text, 200),
                'match_terms' => $scoreData['terms'],
                'score' => $scoreData['score'],
            ];
        }

        if (empty($references)) {
            return [];
        }

        usort($references, static function (array $a, array $b): int {
            $scoreA = (int) ($a['score'] ?? 0);
            $scoreB = (int) ($b['score'] ?? 0);
            if ($scoreA !== $scoreB) {
                return $scoreB <=> $scoreA;
            }
            $bookA = (int) ($a['book'] ?? 0);
            $bookB = (int) ($b['book'] ?? 0);
            if ($bookA !== $bookB) {
                return $bookA <=> $bookB;
            }
            $chapterA = (int) ($a['chapter'] ?? 0);
            $chapterB = (int) ($b['chapter'] ?? 0);
            if ($chapterA !== $chapterB) {
                return $chapterA <=> $chapterB;
            }
            return (int) ($a['verse'] ?? 0) <=> (int) ($b['verse'] ?? 0);
        });

        $references = array_slice($references, 0, $limit);
        foreach ($references as &$item) {
            unset($item['score']);
        }
        unset($item);

        return $references;
    }

    private function scoreCrossReferenceRow($verseText, array $normalizedKeywords, $currentBook, $rowBook)
    {
        $normalizedText = $this->normalizeThemeToken((string) $verseText);
        $score = 0;
        $terms = [];
        $matchedTokens = [];
        foreach ($normalizedKeywords as $token => $rawKeyword) {
            if ($token === '' || strpos($normalizedText, (string) $token) === false) {
                continue;
            }
            $score += 3;
            $terms[] = (string) $rawKeyword;
            $matchedTokens[] = (string) $token;
            if (count($terms) >= 4) {
                break;
            }
        }
        if ((int) $currentBook === (int) $rowBook) {
            $score += 2;
        }
        if ($this->isNewTestamentBook($currentBook) === $this->isNewTestamentBook($rowBook)) {
            $score += 2;
        }
        return [
            'score' => $score,
            'terms' => $terms,
            'term_count' => count($terms),
            'matched_tokens' => $matchedTokens,
        ];
    }

    private function isNewTestamentBook($book)
    {
        return (int) $book >= 40;
    }

    private function isWeakCrossReferenceKeyword($normalizedToken, $rawKeyword = '')
    {
        $token = trim((string) $normalizedToken);
        if ($token === '') {
            return true;
        }
        if ($this->mbStrlen($token) < 4) {
            return true;
        }

        $weak = [
            'dicho', 'dijo', 'dicen', 'decir', 'hizo', 'hacer', 'hace', 'sera', 'seras', 'eran', 'sido', 'sino',
            'cosa', 'cosas', 'esto', 'esta', 'este', 'aquel', 'aquella', 'primer', 'primero', 'nada', 'todo', 'toda',
            'todos', 'todas', 'vida', 'nombre', 'hable', 'hablo',
        ];
        if (in_array($token, $weak, true)) {
            return true;
        }

        $raw = $this->normalizeThemeToken((string) $rawKeyword);
        if ($raw !== '' && in_array($raw, $weak, true)) {
            return true;
        }
        return false;
    }

    private function isWeakCrossReferenceAnchorToken($normalizedToken, $rawKeyword = '')
    {
        $token = trim((string) $normalizedToken);
        if ($token === '') {
            return true;
        }

        $weak = [
            'dios', 'senor', 'tierra', 'hombre', 'mujer', 'pueblo', 'israel', 'jesus', 'cristo',
            'vida', 'nombre', 'palabra', 'verdad', 'camino', 'cielo',
        ];
        if (in_array($token, $weak, true)) {
            return true;
        }

        $raw = $this->normalizeThemeToken((string) $rawKeyword);
        if ($raw !== '' && in_array($raw, $weak, true)) {
            return true;
        }
        return false;
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

    private function requireAuthJson()
    {
        if (auth_user_id() > 0) {
            return;
        }
        app_json(['error' => 'Inicia sesión para continuar.'], 401);
    }

    private function requireCurrentUser()
    {
        $user = $this->userDataRepository->getUserById(auth_user_id());
        if (!$user) {
            app_json(['error' => 'Usuario no encontrado.'], 404);
        }
        return $user;
    }

    private function enrichStrongEntry(array $entry, $hintBook = 0, $hintChapter = 0, $hintVerse = 0, $hintWord = '')
    {
        $code = strtoupper(trim((string) ($entry['code'] ?? '')));
        $context = $code !== '' ? $this->bibleRepository->getFirstStrongContext($code) : null;
        $commentary = [];

        if (is_array($context) && !empty($context)) {
            $commentary = $this->buildStrongCommentarySamples(
                (int) ($context['book'] ?? 0),
                (int) ($context['chapter'] ?? 0),
                (int) ($context['verse'] ?? 0)
            );
        } elseif ((int) $hintBook > 0 && (int) $hintChapter > 0 && (int) $hintVerse > 0) {
            $commentary = $this->buildStrongCommentarySamples((int) $hintBook, (int) $hintChapter, (int) $hintVerse);
        }

        $entry['short_def'] = $this->buildStrongShortDefinition($entry);
        $entry['usage_terms'] = $this->extractStrongUsageTerms($entry);
        $entry['first_context'] = $context;
        $entry['commentary_samples'] = $commentary;
        $entry['theology_voices'] = $this->buildStrongTheologyVoices($entry, $context, $hintWord);

        return $entry;
    }

    private function buildStrongShortDefinition(array $entry)
    {
        $text = trim((string) ($entry['strongs_def'] ?? ''));
        if ($text === '') {
            $text = trim((string) ($entry['kjv_def'] ?? ''));
        }
        if ($text === '') {
            return '';
        }

        $text = preg_replace('/\s+/u', ' ', $text);
        if ($text === null) {
            $text = preg_replace('/\s+/', ' ', $text);
        }
        $text = trim((string) $text);

        $cutPos = $this->mbStripos($text, ':-');
        if ($cutPos !== false) {
            $text = trim($this->mbSubstr($text, 0, (int) $cutPos));
        }

        $parts = explode(';', $text);
        if (!empty($parts)) {
            $candidate = '';
            foreach ($parts as $idx => $part) {
                $part = trim((string) $part);
                if ($part === '') {
                    continue;
                }

                // El primer bloque suele ser lema/transliteracion, no definicion.
                if ($idx === 0) {
                    continue;
                }

                $normalized = $this->normalizeThemeToken($part);
                if ($normalized === '') {
                    continue;
                }
                if (preg_match('/^(de g[0-9]+|de h[0-9]+|de |raiz|raiz de|prob|comparar|comp)\b/u', $normalized)) {
                    continue;
                }
                $candidate = $part;
                break;
            }

            if ($candidate === '') {
                foreach ($parts as $idx => $part) {
                    $part = trim((string) $part);
                    if ($part === '' || $idx === 0) {
                        continue;
                    }
                    $candidate = $part;
                    break;
                }
            }

            if ($candidate !== '') {
                $text = $candidate;
            }
        }

        $tailMarkers = ['. Comp.', '. Véase', '. Vea'];
        foreach ($tailMarkers as $marker) {
            $pos = $this->mbStripos($text, $marker);
            if ($pos !== false) {
                $text = trim($this->mbSubstr($text, 0, (int) $pos));
            }
        }

        $text = trim((string) $text, " \t\n\r\0\x0B:;.");
        return $this->truncateText($text, 220);
    }

    private function extractStrongUsageTerms(array $entry)
    {
        $fromSpanish = $this->extractUsageTail((string) ($entry['strongs_def'] ?? ''));
        $fromKjv = trim((string) ($entry['kjv_def'] ?? ''));
        $pool = $fromSpanish !== '' ? $fromSpanish : $fromKjv;
        if ($pool === '') {
            return [];
        }

        $parts = preg_split('/[,;\/|]+/u', $pool);
        if (!is_array($parts)) {
            return [];
        }

        $unique = [];
        foreach ($parts as $rawPart) {
            $term = trim((string) $rawPart);
            if ($term === '') {
                continue;
            }
            $term = preg_replace('/^\-+/', '', $term);
            $term = preg_replace('/\([^)]*\)/u', '', (string) $term);
            $term = trim((string) $term, " \t\n\r\0\x0B.:");
            if ($term === '' || $this->mbStrlen($term) < 2) {
                continue;
            }
            $key = $this->mbStrtolower($term);
            if (isset($unique[$key])) {
                continue;
            }
            $unique[$key] = $term;
            if (count($unique) >= 8) {
                break;
            }
        }

        return array_values($unique);
    }

    private function extractUsageTail($definition)
    {
        $text = trim((string) $definition);
        if ($text === '') {
            return '';
        }
        $pos = $this->mbStripos($text, ':-');
        if ($pos === false) {
            return '';
        }
        $tail = trim($this->mbSubstr($text, (int) $pos + 2));
        if ($tail === '') {
            return '';
        }
        $dotPos = $this->mbStripos($tail, '. Comp.');
        if ($dotPos !== false) {
            $tail = trim($this->mbSubstr($tail, 0, (int) $dotPos));
        }
        return trim($tail, " \t\n\r\0\x0B.");
    }

    private function buildStrongCommentarySamples($book, $chapter, $verse)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verse = (int) $verse;
        if ($book < 1 || $chapter < 1 || $verse < 1) {
            return [];
        }

        $commentary = $this->bibleRepository->getCommentariesForVerse($book, $chapter, $verse);
        if (!is_array($commentary)) {
            return [];
        }

        $samples = [];
        foreach (['verse', 'chapter', 'book'] as $group) {
            $rows = isset($commentary[$group]) && is_array($commentary[$group]) ? $commentary[$group] : [];
            foreach ($rows as $row) {
                $html = isset($row['html']) ? (string) $row['html'] : '';
                $plain = trim(html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                $plain = preg_replace('/\s+/u', ' ', $plain);
                $plain = trim((string) $plain);
                if ($plain === '') {
                    continue;
                }

                $samples[] = [
                    'source' => trim((string) ($row['source_label'] ?? 'Comentario')),
                    'excerpt' => $this->truncateText($plain, 230),
                ];
                if (count($samples) >= 2) {
                    return $samples;
                }
            }
        }

        return $samples;
    }

    private function buildStrongTheologyVoices(array $entry, $context, $hintWord = '')
    {
        $term = trim((string) ($entry['lemma'] ?? ''));
        if ($term === '') {
            $term = trim((string) ($entry['translit'] ?? ''));
        }
        if ($term === '') {
            $term = trim((string) ($entry['code'] ?? ''));
        }
        if ($term === '') {
            $term = trim((string) $hintWord);
        }
        if ($term === '') {
            $term = 'este término';
        }

        $reference = '';
        if (is_array($context) && !empty($context['reference'])) {
            $reference = trim((string) $context['reference']);
        }
        if ($reference === '') {
            $reference = 'el pasaje';
        }

        return [
            [
                'author' => 'Juan Crisóstomo (s. IV)',
                'note' => 'Subraya el valor pastoral de "' . $term . '" leyendo el contexto inmediato y su efecto en la vida de la iglesia.',
            ],
            [
                'author' => 'Agustín de Hipona (s. IV-V)',
                'note' => 'Enfatiza interpretar "' . $term . '" en clave de gracia y amor, evitando una lectura aislada del conjunto bíblico.',
            ],
            [
                'author' => 'C. H. Spurgeon (s. XIX)',
                'note' => 'Invita a llevar "' . $term . '" de ' . $reference . ' a una aplicación práctica: consuelo, fe activa y obediencia diaria.',
            ],
        ];
    }

    private function mbStrlen($text)
    {
        if (function_exists('mb_strlen')) {
            return (int) mb_strlen((string) $text, 'UTF-8');
        }
        return strlen((string) $text);
    }

    private function mbSubstr($text, $start, $length = null)
    {
        $value = (string) $text;
        $start = (int) $start;
        if (function_exists('mb_substr')) {
            if ($length === null) {
                return (string) mb_substr($value, $start, null, 'UTF-8');
            }
            return (string) mb_substr($value, $start, (int) $length, 'UTF-8');
        }
        if ($length === null) {
            return (string) substr($value, $start);
        }
        return (string) substr($value, $start, (int) $length);
    }

    private function mbStripos($haystack, $needle)
    {
        $haystack = (string) $haystack;
        $needle = (string) $needle;
        if (function_exists('mb_stripos')) {
            return mb_stripos($haystack, $needle, 0, 'UTF-8');
        }
        return stripos($haystack, $needle);
    }

    private function mbStrtolower($text)
    {
        if (function_exists('mb_strtolower')) {
            return (string) mb_strtolower((string) $text, 'UTF-8');
        }
        return strtolower((string) $text);
    }

    private function isValidHighlightColor($color)
    {
        return in_array((string) $color, ['yellow', 'green', 'blue', 'pink', 'orange'], true);
    }

    private function parseStrongCodes($raw)
    {
        $raw = strtoupper(trim((string) $raw));
        if ($raw === '') {
            return [];
        }

        $tokens = preg_split('/[\s,;]+/', $raw);
        $codes = [];
        foreach ($tokens as $token) {
            $normalized = $this->strongLexiconService->normalizeCode((string) $token);
            if ($normalized === '') {
                continue;
            }
            $codes[$normalized] = true;
        }

        return array_keys($codes);
    }
}
