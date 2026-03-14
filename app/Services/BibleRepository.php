<?php

namespace App\Services;

use App\Database\ConnectionFactory;
use PDO;

class BibleRepository
{
    private $bibleDbPath;
    private $commentaryDbPath;
    private $compareDbPath;
    private $strongDbPath;
    private $baseBibleDir;
    private $primaryLabel;
    private $compareLabel;
    private $sanitizer;
    private $biblePdo;
    private $commentaryPdo;
    private $comparePdo;
    private $strongPdo;
    private $strongChapterCache;
    private $strongOccurrenceCache;

    public function __construct(
        $bibleDbPath,
        $commentaryDbPath,
        HtmlSanitizer $sanitizer,
        $compareDbPath = null,
        $primaryLabel = null,
        $compareLabel = null
    )
    {
        $this->bibleDbPath = $bibleDbPath;
        $this->commentaryDbPath = $commentaryDbPath;
        if ($compareDbPath === null || trim((string) $compareDbPath) === '') {
            $compareDbPath = (string) config('paths.bible_compare', '');
        }
        $this->compareDbPath = trim((string) $compareDbPath);
        $this->baseBibleDir = dirname((string) $this->bibleDbPath);
        $this->strongDbPath = $this->resolveAuxBiblePath((string) config('paths.bible_strong', ''));
        $this->sanitizer = $sanitizer;
        $this->strongChapterCache = [];
        $this->strongOccurrenceCache = [];
        $this->primaryLabel = $this->resolveVersionLabel(
            $this->bibleDbPath,
            $primaryLabel,
            (string) config('versions.primary_label', 'RVR60')
        );
        $this->compareLabel = $this->resolveVersionLabel(
            $this->compareDbPath,
            $compareLabel,
            (string) config('versions.compare_label', 'Versión 2')
        );
    }

    public function getVersionSelectionPayload()
    {
        $compareFiles = [];
        if (isset($_SESSION['bible_compare_files']) && is_array($_SESSION['bible_compare_files'])) {
            foreach ($_SESSION['bible_compare_files'] as $rawFile) {
                $file = basename(trim((string) $rawFile));
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
        if (empty($compareFiles)) {
            $fallbackCompare = basename((string) $this->compareDbPath);
            if ($fallbackCompare !== '' && preg_match('/\.bbli$/i', $fallbackCompare)) {
                $compareFiles[] = $fallbackCompare;
            }
        }

        return [
            'current' => [
                'primary_file' => basename((string) $this->bibleDbPath),
                'compare_file' => basename((string) $this->compareDbPath),
                'compare_files' => $compareFiles,
                'primary_label' => $this->primaryLabel,
                'compare_label' => $this->compareLabel,
            ],
            'versions' => $this->listAvailableBibleVersions(),
        ];
    }

    public function listAvailableBibleVersions()
    {
        $dir = (string) $this->baseBibleDir;
        if ($dir === '' || !is_dir($dir)) {
            return [];
        }

        $files = glob($dir . DIRECTORY_SEPARATOR . '*.bbli');
        if (empty($files)) {
            return [];
        }
        sort($files, SORT_NATURAL | SORT_FLAG_CASE);

        $rows = [];
        foreach ($files as $path) {
            if (!is_file($path)) {
                continue;
            }
            $meta = $this->readDetailsMeta($path);
            $file = basename($path);
            $fallbackLabel = pathinfo($file, PATHINFO_FILENAME);
            $title = trim((string) ($meta['title'] ?? ''));
            $abbr = trim((string) ($meta['abbr'] ?? ''));

            $label = $title !== '' ? $title : $fallbackLabel;
            $rows[] = [
                'file' => $file,
                'label' => $label,
                'title' => $title !== '' ? $title : $label,
                'abbreviation' => $abbr,
            ];
        }

        usort($rows, static function (array $a, array $b): int {
            return strcasecmp((string) $a['label'], (string) $b['label']);
        });
        return $rows;
    }

    public function getBooks()
    {
        $books = [];
        foreach ($this->bookNames() as $id => $name) {
            $books[] = [
                'id' => $id,
                'name' => $name,
            ];
        }
        return $books;
    }

    public function getBookName($book)
    {
        $book = (int) $book;
        $names = $this->bookNames();
        return isset($names[$book]) ? $names[$book] : ('Libro ' . $book);
    }

    public function getChapters($book)
    {
        $stmt = $this->bible()->prepare('SELECT MAX(Chapter) AS max_chapter FROM Bible WHERE Book = :book');
        $stmt->execute([':book' => (int) $book]);
        $max = (int) $stmt->fetchColumn();
        if ($max <= 0) {
            return [];
        }
        return range(1, $max);
    }

    public function getAllChaptersOrdered()
    {
        $stmt = $this->bible()->query(
            'SELECT Book, Chapter
             FROM Bible
             GROUP BY Book, Chapter
             ORDER BY Book ASC, Chapter ASC'
        );
        $rows = [];
        foreach ($stmt->fetchAll() as $row) {
            $rows[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
            ];
        }
        return $rows;
    }

    public function getChapterVerses($book, $chapter)
    {
        return $this->chapterVersesFromPdo($this->bible(), $book, $chapter);
    }

    public function getParallelChapter($book, $chapter)
    {
        $set = $this->getParallelChapterSet($book, $chapter, [basename((string) $this->compareDbPath)], 1);
        $first = isset($set['comparisons'][0]) && is_array($set['comparisons'][0])
            ? $set['comparisons'][0]
            : [];

        return [
            'book' => (int) $book,
            'chapter' => (int) $chapter,
            'available' => !empty($first) ? !empty($first['available']) : false,
            'same_source' => !empty($first) ? !empty($first['same_source']) : false,
            'primary_label' => (string) ($set['primary_label'] ?? $this->primaryLabel),
            'compare_label' => !empty($first) ? (string) ($first['label'] ?? $this->compareLabel) : $this->compareLabel,
            'message' => !empty($first) ? (string) ($first['message'] ?? '') : (string) ($set['message'] ?? ''),
            'compare_verses' => !empty($first) && isset($first['verses']) && is_array($first['verses']) ? $first['verses'] : [],
        ];
    }

    public function getParallelChapterSet($book, $chapter, array $compareFiles = [], $maxColumns = 3)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $limit = max(1, min(3, (int) $maxColumns));
        $primaryRows = $this->getChapterVerses($book, $chapter);
        $primaryFile = basename((string) $this->bibleDbPath);
        $versions = $this->listAvailableBibleVersions();
        $versionLabels = [];
        foreach ($versions as $row) {
            $file = basename((string) ($row['file'] ?? ''));
            if ($file === '') {
                continue;
            }
            $label = trim((string) ($row['label'] ?? ''));
            if ($label === '') {
                $label = pathinfo($file, PATHINFO_FILENAME);
            }
            $versionLabels[$file] = $label;
        }

        $requested = [];
        foreach ($compareFiles as $rawFile) {
            $file = basename(trim((string) $rawFile));
            if ($file === '' || !preg_match('/\.bbli$/i', $file)) {
                continue;
            }
            if (!in_array($file, $requested, true)) {
                $requested[] = $file;
            }
            if (count($requested) >= $limit) {
                break;
            }
        }

        if (empty($requested)) {
            $fallbackCompare = basename((string) $this->compareDbPath);
            if ($fallbackCompare !== '' && preg_match('/\.bbli$/i', $fallbackCompare)) {
                $requested[] = $fallbackCompare;
            }
        }

        if (empty($requested)) {
            foreach ($versions as $row) {
                $file = basename((string) ($row['file'] ?? ''));
                if ($file === '' || $file === $primaryFile) {
                    continue;
                }
                $requested[] = $file;
                if (count($requested) >= $limit) {
                    break;
                }
            }
        }

        $comparisons = [];
        $availableCount = 0;
        $warnings = [];
        foreach ($requested as $file) {
            if (count($comparisons) >= $limit) {
                break;
            }
            $path = $this->resolveVersionFilePath($file);
            $sameSource = $path !== '' && realpath($path) === realpath($this->bibleDbPath);
            $label = isset($versionLabels[$file])
                ? (string) $versionLabels[$file]
                : ($path !== ''
                    ? $this->resolveVersionLabel($path, '', pathinfo($file, PATHINFO_FILENAME))
                    : pathinfo($file, PATHINFO_FILENAME));

            $available = false;
            $message = '';
            $rows = [];
            if ($path === '') {
                $message = 'No se encontró la versión solicitada.';
            } else {
                try {
                    $pdo = ConnectionFactory::sqlite($path);
                    $rows = $this->chapterVersesFromPdo($pdo, $book, $chapter);
                    $available = !empty($rows);
                    if (!$available) {
                        $message = 'Esta versión no tiene este capítulo.';
                    } elseif ($sameSource) {
                        $message = 'Esta comparación usa la misma versión principal.';
                    }
                } catch (\Throwable $e) {
                    $available = false;
                    $rows = [];
                    $message = 'No se pudo abrir esta versión.';
                }
            }

            if ($available) {
                $availableCount += 1;
            }
            if ($message !== '') {
                $warnings[] = $label . ': ' . $message;
            }

            $comparisons[] = [
                'file' => $file,
                'label' => $label,
                'available' => $available,
                'same_source' => $sameSource,
                'message' => $message,
                'verses' => $rows,
            ];
        }

        $summary = '';
        if (empty($comparisons)) {
            $summary = 'No hay versiones paralelas configuradas.';
        } elseif ($availableCount < 1) {
            $summary = 'No hay versiones paralelas disponibles para este capítulo.';
        } elseif (!empty($warnings)) {
            $summary = implode(' | ', array_slice($warnings, 0, 2));
        }

        return [
            'book' => $book,
            'chapter' => $chapter,
            'primary_label' => $this->primaryLabel,
            'primary_file' => $primaryFile,
            'primary_verses' => $primaryRows,
            'available_count' => $availableCount,
            'message' => $summary,
            'comparisons' => $comparisons,
        ];
    }

    public function getVersesInRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $book = (int) $book;
        $chapter = (int) $chapter;
        $stmt = $this->bible()->prepare(
            'SELECT Book, Chapter, Verse, Scripture
             FROM Bible
             WHERE Book = :book AND Chapter = :chapter AND Verse BETWEEN :verse_start AND :verse_end
             ORDER BY Verse ASC'
        );
        $stmt->execute([
            ':book' => $book,
            ':chapter' => $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
        ]);

        $strongFallbackMap = $this->getStrongFallbackChapterMap($book, $chapter);
        $rows = [];
        foreach ($stmt->fetchAll() as $row) {
            $scriptureHtml = $this->sanitizer->sanitize($row['Scripture']);
            $scriptureText = $this->sanitizer->text($scriptureHtml);
            $verseNumber = (int) $row['Verse'];
            $strongMeta = $this->buildStrongAlignmentMeta(
                $scriptureHtml,
                $scriptureText,
                isset($strongFallbackMap[$verseNumber]) ? (string) $strongFallbackMap[$verseNumber] : ''
            );
            $rows[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
                'verse' => $verseNumber,
                'scripture_html' => $scriptureHtml,
                'scripture_text' => $scriptureText,
                'has_embedded_strong' => $strongMeta['embedded'],
                'strong_alignment' => $strongMeta['alignment'],
            ];
        }
        return $rows;
    }

    public function getVerse($book, $chapter, $verse)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verse = (int) $verse;
        $stmt = $this->bible()->prepare(
            'SELECT Book, Chapter, Verse, Scripture FROM Bible WHERE Book = :book AND Chapter = :chapter AND Verse = :verse LIMIT 1'
        );
        $stmt->execute([
            ':book' => $book,
            ':chapter' => $chapter,
            ':verse' => $verse,
        ]);
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        $scriptureHtml = $this->sanitizer->sanitize($row['Scripture']);
        $scriptureText = $this->sanitizer->text($scriptureHtml);
        $strongFallbackMap = $this->getStrongFallbackChapterMap($book, $chapter);
        $strongMeta = $this->buildStrongAlignmentMeta(
            $scriptureHtml,
            $scriptureText,
            isset($strongFallbackMap[$verse]) ? (string) $strongFallbackMap[$verse] : ''
        );
        return [
            'book' => (int) $row['Book'],
            'chapter' => (int) $row['Chapter'],
            'verse' => (int) $row['Verse'],
            'scripture_html' => $scriptureHtml,
            'scripture_text' => $scriptureText,
            'has_embedded_strong' => $strongMeta['embedded'],
            'strong_alignment' => $strongMeta['alignment'],
            'raw_scripture' => (string) $row['Scripture'],
        ];
    }

    public function getAdjacentChapter($book, $chapter, $direction)
    {
        if ($direction === 'prev') {
            $sql = 'SELECT Book, Chapter
                    FROM Bible
                    WHERE (Book < :book) OR (Book = :book AND Chapter < :chapter)
                    GROUP BY Book, Chapter
                    ORDER BY Book DESC, Chapter DESC
                    LIMIT 1';
        } else {
            $sql = 'SELECT Book, Chapter
                    FROM Bible
                    WHERE (Book > :book) OR (Book = :book AND Chapter > :chapter)
                    GROUP BY Book, Chapter
                    ORDER BY Book ASC, Chapter ASC
                    LIMIT 1';
        }

        $stmt = $this->bible()->prepare($sql);
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
        ]);
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }
        return [
            'book' => (int) $row['Book'],
            'chapter' => (int) $row['Chapter'],
            'label' => $this->getBookName((int) $row['Book']) . ' ' . (int) $row['Chapter'],
        ];
    }

    public function getCommentariesForVerse($book, $chapter, $verse)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verse = (int) $verse;

        $bookRows = [];
        $chapterRows = [];
        $verseRows = [];
        $cmtiEnabled = (bool) config('sources.comments.cmti.enabled', false);
        if ($cmtiEnabled) {
            $stmtBook = $this->commentary()->prepare('SELECT Comments FROM BookCommentary WHERE Book = :book');
            $stmtBook->execute([':book' => $book]);
            foreach ($stmtBook->fetchAll() as $row) {
                $bookRows[] = [
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }

            $stmtChapter = $this->commentary()->prepare(
                'SELECT Comments FROM ChapterCommentary WHERE Book = :book AND Chapter = :chapter'
            );
            $stmtChapter->execute([
                ':book' => $book,
                ':chapter' => $chapter,
            ]);
            foreach ($stmtChapter->fetchAll() as $row) {
                $chapterRows[] = [
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }

            $stmtVerse = $this->commentary()->prepare(
                'SELECT ChapterBegin, VerseBegin, ChapterEnd, VerseEnd, Comments
                 FROM VerseCommentary
                 WHERE Book = :book
                   AND (
                       (ChapterBegin < :chapter OR (ChapterBegin = :chapter AND VerseBegin <= :verse))
                       AND
                       (ChapterEnd > :chapter OR (ChapterEnd = :chapter AND VerseEnd >= :verse))
                   )
                 ORDER BY ChapterBegin, VerseBegin'
            );
            $stmtVerse->execute([
                ':book' => $book,
                ':chapter' => $chapter,
                ':verse' => $verse,
            ]);
            foreach ($stmtVerse->fetchAll() as $row) {
                $verseRows[] = [
                    'chapter_begin' => (int) $row['ChapterBegin'],
                    'verse_begin' => (int) $row['VerseBegin'],
                    'chapter_end' => (int) $row['ChapterEnd'],
                    'verse_end' => (int) $row['VerseEnd'],
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }
        }

        if ((bool) config('sources.comments.generated.enabled', true)) {
            $generatedHtml = $this->generatedCommentaryHtml($book, $chapter, $verse, $verse);
            if ($generatedHtml !== '') {
                $verseRows[] = [
                    'chapter_begin' => $chapter,
                    'verse_begin' => $verse,
                    'chapter_end' => $chapter,
                    'verse_end' => $verse,
                    'html' => $generatedHtml,
                    'source' => 'generated',
                    'source_label' => $this->sourceLabel('generated'),
                    'title' => $this->buildRangeLabel($book, $chapter, $verse, $verse),
                ];
            }
        }

        return [
            'book' => $bookRows,
            'chapter' => $chapterRows,
            'verse' => $verseRows,
        ];
    }

    public function getCommentariesForRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);

        $book = (int) $book;
        $chapter = (int) $chapter;

        $bookRows = [];
        $chapterRows = [];
        $verseRows = [];
        $cmtiEnabled = (bool) config('sources.comments.cmti.enabled', false);
        if ($cmtiEnabled) {
            $stmtBook = $this->commentary()->prepare('SELECT Comments FROM BookCommentary WHERE Book = :book');
            $stmtBook->execute([':book' => $book]);
            foreach ($stmtBook->fetchAll() as $row) {
                $bookRows[] = [
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }

            $stmtChapter = $this->commentary()->prepare(
                'SELECT Comments FROM ChapterCommentary WHERE Book = :book AND Chapter = :chapter'
            );
            $stmtChapter->execute([
                ':book' => $book,
                ':chapter' => $chapter,
            ]);
            foreach ($stmtChapter->fetchAll() as $row) {
                $chapterRows[] = [
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }

            $stmtVerse = $this->commentary()->prepare(
                'SELECT ChapterBegin, VerseBegin, ChapterEnd, VerseEnd, Comments
                 FROM VerseCommentary
                 WHERE Book = :book
                   AND (
                       (ChapterBegin < :chapter OR (ChapterBegin = :chapter AND VerseBegin <= :verse_end))
                       AND
                       (ChapterEnd > :chapter OR (ChapterEnd = :chapter AND VerseEnd >= :verse_start))
                   )
                 ORDER BY ChapterBegin, VerseBegin'
            );
            $stmtVerse->execute([
                ':book' => $book,
                ':chapter' => $chapter,
                ':verse_start' => $range['start'],
                ':verse_end' => $range['end'],
            ]);
            foreach ($stmtVerse->fetchAll() as $row) {
                $verseRows[] = [
                    'chapter_begin' => (int) $row['ChapterBegin'],
                    'verse_begin' => (int) $row['VerseBegin'],
                    'chapter_end' => (int) $row['ChapterEnd'],
                    'verse_end' => (int) $row['VerseEnd'],
                    'html' => $this->sanitizer->sanitize($row['Comments']),
                    'source' => 'cmti',
                    'source_label' => $this->sourceLabel('cmti'),
                ];
            }
        }

        if ((bool) config('sources.comments.generated.enabled', true)) {
            $generatedHtml = $this->generatedCommentaryHtml($book, $chapter, $range['start'], $range['end']);
            if ($generatedHtml !== '') {
                $verseRows[] = [
                    'chapter_begin' => $chapter,
                    'verse_begin' => $range['start'],
                    'chapter_end' => $chapter,
                    'verse_end' => $range['end'],
                    'html' => $generatedHtml,
                    'source' => 'generated',
                    'source_label' => $this->sourceLabel('generated'),
                    'title' => $this->buildRangeLabel($book, $chapter, $range['start'], $range['end']),
                ];
            }
        }

        return [
            'book' => $bookRows,
            'chapter' => $chapterRows,
            'verse' => $verseRows,
        ];
    }

    public function getPericopeHint($book, $chapter, $verse)
    {
        $stmt = $this->bible()->prepare(
            'SELECT Verse, Scripture
             FROM Bible
             WHERE Book = :book AND Chapter = :chapter AND Verse <= :verse
             ORDER BY Verse ASC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
        ]);

        $lastTitle = '';
        foreach ($stmt->fetchAll() as $row) {
            if (preg_match('/<p[^>]*align=["\']center["\'][^>]*>(.*?)<\/p>/is', $row['Scripture'], $matches)) {
                $candidate = trim($this->sanitizer->text($matches[1]));
                if ($candidate !== '') {
                    $lastTitle = $candidate;
                }
            }
        }
        return $lastTitle;
    }

    public function searchSource(array $filters, $limit = 60)
    {
        $limit = max(1, min(500, (int) $limit));
        $query = isset($filters['query']) ? trim($filters['query']) : '';
        $mode = isset($filters['mode']) ? $filters['mode'] : 'any';
        $wholeWordTerms = [];

        $where = [];
        $params = [];

        $testament = isset($filters['testament']) ? strtolower(trim((string) $filters['testament'])) : 'all';
        if ($testament === 'ot') {
            $where[] = 'Book BETWEEN 1 AND 39';
        } elseif ($testament === 'nt') {
            $where[] = 'Book BETWEEN 40 AND 66';
        }

        if (!empty($filters['book'])) {
            $where[] = 'Book = :book';
            $params[':book'] = (int) $filters['book'];
        }

        if (!empty($filters['chapter_from'])) {
            $where[] = 'Chapter >= :chapter_from';
            $params[':chapter_from'] = (int) $filters['chapter_from'];
        }

        if (!empty($filters['chapter_to'])) {
            $where[] = 'Chapter <= :chapter_to';
            $params[':chapter_to'] = (int) $filters['chapter_to'];
        }

        if ($query !== '') {
            if ($mode === 'exact') {
                $where[] = 'Scripture LIKE :exact';
                $params[':exact'] = '%' . $query . '%';
            } elseif ($mode === 'word') {
                $words = $this->tokenizeSearchTerms($query);
                if (empty($words)) {
                    return [];
                }
                // Para palabra completa no usamos pre-filtro LIKE:
                // primero acotamos por libro/testamento/capítulo y luego
                // validamos límites de palabra en PHP.
                $wholeWordTerms = $words;
            } else {
                $words = $this->tokenizeSearchTerms($query);
                if (empty($words)) {
                    return [];
                }

                $pieces = [];
                foreach ($words as $idx => $word) {
                    $key = ':w' . $idx;
                    $pieces[] = 'Scripture LIKE ' . $key;
                    $params[$key] = '%' . $word . '%';
                }
                if ($mode === 'all' || $mode === 'word') {
                    $where[] = '(' . implode(' AND ', $pieces) . ')';
                } else {
                    $where[] = '(' . implode(' OR ', $pieces) . ')';
                }
                if ($mode === 'word') {
                    $wholeWordTerms = $words;
                }
            }
        }

        $sqlLimit = $limit;
        if ($mode === 'word' && !empty($wholeWordTerms)) {
            // Escaneo amplio para no perder coincidencias válidas por orden canónico.
            $sqlLimit = 50000;
        }

        $sql = 'SELECT Book, Chapter, Verse, Scripture FROM Bible';
        if (!empty($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' ORDER BY Book, Chapter, Verse LIMIT ' . $sqlLimit;

        $stmt = $this->bible()->prepare($sql);
        $stmt->execute($params);

        $results = [];
        foreach ($stmt->fetchAll() as $row) {
            $clean = $this->sanitizer->sanitize($row['Scripture']);
            $scriptureText = $this->sanitizer->text($clean);
            if (!empty($wholeWordTerms) && !$this->containsWholeWords($scriptureText, $wholeWordTerms, true)) {
                continue;
            }
            $title = '';
            if (preg_match('/<p[^>]*align=["\']center["\'][^>]*>(.*?)<\/p>/is', (string) $row['Scripture'], $matches)) {
                $title = trim($this->sanitizer->text($matches[1]));
            }
            $results[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
                'verse' => (int) $row['Verse'],
                'title' => $title,
                'scripture_html' => $clean,
                'scripture_text' => $scriptureText,
            ];
            if (count($results) >= $limit) {
                break;
            }
        }
        return $results;
    }

    public function buildReferenceLabel($book, $chapter, $verse)
    {
        return $this->getBookName($book) . ' ' . (int) $chapter . ':' . (int) $verse;
    }

    public function buildRangeLabel($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        if ($range['start'] === $range['end']) {
            return $this->buildReferenceLabel($book, $chapter, $range['start']);
        }
        return $this->getBookName($book) . ' ' . (int) $chapter . ':' . $range['start'] . '-' . $range['end'];
    }

    public function getInterlinearRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $rows = $this->getVersesInRange($book, $chapter, $range['start'], $range['end']);
        $output = [];

        foreach ($rows as $row) {
            $alignment = isset($row['strong_alignment']) && is_array($row['strong_alignment'])
                ? $row['strong_alignment']
                : [];
            $tokens = $this->buildInterlinearTokens((string) ($row['scripture_text'] ?? ''), $alignment);
            $tokens = array_values(array_filter($tokens, static function (array $token): bool {
                return trim((string) ($token['code'] ?? '')) !== '';
            }));

            $output[] = [
                'book' => (int) ($row['book'] ?? 0),
                'chapter' => (int) ($row['chapter'] ?? 0),
                'verse' => (int) ($row['verse'] ?? 0),
                'reference' => $this->buildReferenceLabel(
                    (int) ($row['book'] ?? 0),
                    (int) ($row['chapter'] ?? 0),
                    (int) ($row['verse'] ?? 0)
                ),
                'tokens' => $tokens,
            ];
        }

        return $output;
    }

    public function getFirstStrongContext($code)
    {
        $normalized = strtoupper(trim((string) $code));
        if (!preg_match('/^([GH])([1-9][0-9]{0,4})$/', $normalized, $m)) {
            return null;
        }
        if (array_key_exists($normalized, $this->strongOccurrenceCache)) {
            return $this->strongOccurrenceCache[$normalized];
        }

        $pdo = $this->strongBible();
        if (!$pdo instanceof PDO) {
            $this->strongOccurrenceCache[$normalized] = null;
            return null;
        }

        $bookMin = $m[1] === 'G' ? 40 : 1;
        $bookMax = $m[1] === 'G' ? 66 : 39;
        $stmt = $pdo->prepare(
            'SELECT Book, Chapter, Verse, Scripture
             FROM Bible
             WHERE Book BETWEEN :book_min AND :book_max
             ORDER BY Book ASC, Chapter ASC, Verse ASC'
        );
        $stmt->execute([
            ':book_min' => $bookMin,
            ':book_max' => $bookMax,
        ]);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $scriptureHtml = $this->sanitizer->sanitize((string) ($row['Scripture'] ?? ''));
            if ($scriptureHtml === '') {
                continue;
            }
            $pairs = $this->extractStrongPairsFromHtml($scriptureHtml);
            if (empty($pairs)) {
                continue;
            }

            $matchedWords = [];
            foreach ($pairs as $pair) {
                $codes = isset($pair['codes']) && is_array($pair['codes']) ? $pair['codes'] : [];
                if (!in_array($normalized, $codes, true)) {
                    continue;
                }
                $word = trim((string) ($pair['word'] ?? ''));
                if ($word !== '') {
                    $matchedWords[$word] = true;
                }
            }

            if (empty($matchedWords)) {
                continue;
            }

            $book = (int) ($row['Book'] ?? 0);
            $chapter = (int) ($row['Chapter'] ?? 0);
            $verse = (int) ($row['Verse'] ?? 0);
            $display = $this->getVerse($book, $chapter, $verse);
            $verseText = $display ? (string) ($display['scripture_text'] ?? '') : $this->sanitizer->text($scriptureHtml);

            $context = [
                'code' => $normalized,
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'reference' => $this->buildReferenceLabel($book, $chapter, $verse),
                'verse_text' => $verseText,
                'matched_words' => array_keys($matchedWords),
            ];

            $this->strongOccurrenceCache[$normalized] = $context;
            return $context;
        }

        $this->strongOccurrenceCache[$normalized] = null;
        return null;
    }

    private function normalizeRange($a, $b)
    {
        $a = max(1, (int) $a);
        $b = max(1, (int) $b);
        return [
            'start' => min($a, $b),
            'end' => max($a, $b),
        ];
    }

    private function sourceLabel($source)
    {
        $source = trim((string) $source);
        $label = config('sources.comments.' . $source . '.ui_label', '');
        if ($label !== '') {
            return (string) $label;
        }
        if ($source === 'generated') {
            return 'Generado (análisis contextual)';
        }
        return 'Dominio público';
    }

    private function generatedCommentaryHtml($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $verses = $this->getVersesInRange($book, $chapter, $range['start'], $range['end']);
        if (empty($verses)) {
            return '';
        }

        $textParts = [];
        foreach ($verses as $row) {
            $textParts[] = trim((string) $row['scripture_text']);
        }
        $joined = $this->commentaryCompactText(implode(' ', $textParts));
        if ($joined === '') {
            return '';
        }

        $chapterRows = $this->getChapterVerses($book, $chapter);
        $chapterTotal = count($chapterRows);
        $placement = $this->commentaryPlacementLabel($chapterTotal, $range['start'], $range['end']);
        $contextLine = $this->buildImmediateContextLine($chapterRows, $range['start'], $range['end']);
        $motif = $this->detectCommentaryMotif($joined);
        $corpusMeta = $this->commentaryCorpusMeta($book);
        $keywords = $this->extractCommentaryKeywords($joined, 4);
        $keywordLine = !empty($keywords) ? implode(', ', $keywords) : '';
        $pericope = trim((string) $this->getPericopeHint($book, $chapter, $range['start']));
        $outlineHtml = $this->buildGeneratedCommentaryOutlineHtml($verses, $motif);

        $reference = $this->buildRangeLabel($book, $chapter, $range['start'], $range['end']);
        $excerpt = $this->commentaryClip($joined, 210);
        $opening = 'El pasaje está ubicado en ' . $placement . ' del capítulo ' . (int) $chapter . '.';
        if ($pericope !== '') {
            $opening .= ' Se mueve dentro de la unidad "' . $pericope . '".';
        }

        $html = '<p><strong>' . e($reference) . '.</strong> ' . e($opening) . '</p>';
        if ($pericope !== '') {
            $html .= '<p><strong>Introducción:</strong> La unidad "' . e($pericope) . '" concentra la atención del lector en un movimiento claro del texto y prepara la interpretación del bloque completo.</p>';
        }

        $html .= '<p><strong>Lectura inicial del pasaje:</strong> ' . e($motif['focus']) . ' Texto base: "' . e($excerpt) . '".</p>';

        if ($contextLine !== '') {
            $html .= '<p><strong>Contexto inmediato:</strong> ' . e($contextLine) . '</p>';
        }

        $html .= '<p><strong>Comentario del pasaje:</strong> ' . e($motif['insight']) . '</p>';
        if ($outlineHtml !== '') {
            $html .= '<p><strong>Desarrollo del argumento:</strong></p>' . $outlineHtml;
        }

        $html .= '<p><strong>Puente canónico:</strong> ' . e($corpusMeta['bridge']) . '</p>';

        if ($keywordLine !== '') {
            $html .= '<p><strong>Palabras eje:</strong> ' . e($keywordLine) . '.</p>';
        }

        $html .= '<p><strong>Aplicación pastoral:</strong> ' . e($motif['application']) . '</p>';
        if (!empty($motif['misread'])) {
            $html .= '<p><strong>Error común de interpretación:</strong> ' . e($motif['misread']) . '</p>';
        }

        return $html;
    }

    private function buildGeneratedCommentaryOutlineHtml(array $verses, array $motif)
    {
        if (empty($verses)) {
            return '';
        }

        $total = count($verses);
        $blocks = min(5, max(1, $total));
        $chunkSize = (int) ceil($total / $blocks);
        $items = [];

        for ($offset = 0; $offset < $total; $offset += $chunkSize) {
            $slice = array_slice($verses, $offset, $chunkSize);
            if (empty($slice)) {
                continue;
            }

            $first = $slice[0];
            $last = $slice[count($slice) - 1];
            $startVerse = (int) ($first['verse'] ?? 0);
            $endVerse = (int) ($last['verse'] ?? $startVerse);
            $texts = [];
            foreach ($slice as $row) {
                $texts[] = trim((string) ($row['scripture_text'] ?? ''));
            }

            $joined = $this->commentaryCompactText(implode(' ', $texts));
            if ($joined === '') {
                continue;
            }

            $summary = $this->commentaryClip($joined, 180);
            $keywords = $this->extractCommentaryKeywords($joined, 3);
            $keywordLine = !empty($keywords)
                ? (' Sobresalen ' . implode(', ', $keywords) . '.')
                : '';

            $prefix = 'En este tramo';
            if ($offset === 0) {
                $prefix = 'El inicio del pasaje';
            } elseif (($offset + $chunkSize) >= $total) {
                $prefix = 'El cierre del pasaje';
            }

            $label = $startVerse === $endVerse
                ? ('v. ' . $startVerse)
                : ('vv. ' . $startVerse . '-' . $endVerse);

            $items[] = '<li><strong>' . e($label) . ':</strong> '
                . e($prefix . ' retoma "' . $summary . '". ' . $motif['insight'] . $keywordLine)
                . '</li>';
        }

        if (empty($items)) {
            return '';
        }

        return '<ol>' . implode('', $items) . '</ol>';
    }

    private function commentaryPlacementLabel($chapterTotal, $verseStart, $verseEnd)
    {
        $chapterTotal = max(1, (int) $chapterTotal);
        $verseStart = max(1, (int) $verseStart);
        $verseEnd = max(1, (int) $verseEnd);

        $firstBand = max(1, (int) ceil($chapterTotal / 3));
        $lastBandStart = max(1, $chapterTotal - $firstBand + 1);

        if ($verseEnd <= $firstBand) {
            return 'la apertura literaria';
        }
        if ($verseStart >= $lastBandStart) {
            return 'el cierre literario';
        }
        return 'el desarrollo argumental';
    }

    private function buildImmediateContextLine(array $chapterRows, $verseStart, $verseEnd)
    {
        if (empty($chapterRows)) {
            return '';
        }

        $index = [];
        foreach ($chapterRows as $row) {
            $verse = (int) ($row['verse'] ?? 0);
            if ($verse < 1) {
                continue;
            }
            $index[$verse] = $this->commentaryCompactText((string) ($row['scripture_text'] ?? ''));
        }

        $parts = [];
        $prev = (int) $verseStart - 1;
        $next = (int) $verseEnd + 1;
        if (isset($index[$prev]) && $index[$prev] !== '') {
            $parts[] = 'El v.' . $prev . ' prepara la escena con "' . $this->commentaryClip($index[$prev], 110) . '".';
        }
        if (isset($index[$next]) && $index[$next] !== '') {
            $parts[] = 'El v.' . $next . ' proyecta el argumento hacia "' . $this->commentaryClip($index[$next], 110) . '".';
        }

        return implode(' ', $parts);
    }

    private function detectCommentaryMotif($text)
    {
        $lower = function_exists('mb_strtolower')
            ? mb_strtolower((string) $text, 'UTF-8')
            : strtolower((string) $text);

        $focus = 'el texto concentra su fuerza en el movimiento interno del pasaje y en su llamado a una respuesta concreta.';
        $insight = 'La lógica del texto no se queda en información religiosa: presenta el carácter de Dios y orienta la obediencia del creyente en su contexto real.';
        $application = 'Convierte esta verdad en una decisión puntual hoy: qué debes creer, qué debes confesar y qué acción concreta debes ajustar.';
        $misread = 'Reducir el pasaje a una frase motivacional aislada sin seguir su argumento inmediato. Léelo dentro del párrafo y verifica cómo cada oración desarrolla la idea central.';

        if ((preg_match('/(lav|pies|toalla|siervo|servir|servicio)/u', $lower) && preg_match('/(amor|am[eé]is|mandamiento|discipul)/u', $lower))
            || preg_match('/(mandamiento nuevo|amaos unos a otros)/u', $lower)) {
            $focus = 'el pasaje presenta la grandeza de Jesús en forma de servicio humilde: el Maestro enseña amando, lavando, corrigiendo y dando ejemplo.';
            $insight = 'La autoridad de Cristo no se expresa como dominio sino como entrega. El texto une amor, servicio y obediencia para mostrar que el discipulado verdadero se reconoce en una vida que sirve como Jesús sirvió.';
            $application = 'Revisa hoy dónde esperas ser servido en vez de servir. Identifica una acción concreta de humildad, reconciliación o cuidado que refleje el amor de Cristo en tu casa, iglesia o ministerio.';
            $misread = 'Reducir la escena a un gesto ceremonial aislado. El pasaje no solo describe una costumbre de hospitalidad; revela el carácter de Cristo y establece una forma concreta de vida para sus discípulos.';
        } elseif (preg_match('/(traicion|entregar|judas|calcañar|negar|pedro)/u', $lower)) {
            $focus = 'el texto expone la tensión entre la fidelidad de Jesús y la fragilidad del discípulo: en la misma mesa aparecen amor, traición y advertencia.';
            $insight = 'La escena muestra que Cristo conoce el corazón humano sin retroceder en su misión. El pasaje desenmascara la falsa seguridad religiosa y lleva al lector a depender de la gracia y de la palabra de Jesús.';
            $application = 'Examina hoy si hay doblez, autosuficiencia o lealtad superficial en tu caminar. Pide al Señor un corazón íntegro y responde con obediencia antes que con promesas impulsivas.';
            $misread = 'Leer la traición o la negación solo como fallas ajenas. El texto invita a discernir la vulnerabilidad del propio corazón y a buscar permanencia real en Cristo.';
        } elseif (preg_match('/(ira|enoj|indignaci|furor)/u', $lower) && preg_match('/(consuel|misericord|gracia|salvaci|piedad)/u', $lower)) {
            $focus = 'el pasaje describe el tránsito del juicio al consuelo: Dios confronta el pecado, pero no abandona al pueblo restaurado.';
            $insight = 'La secuencia teológica es clara: la disciplina divina tiene propósito redentor; la última palabra no es condena para siempre, sino restauración del vínculo con Dios.';
            $application = 'Examina hoy dónde necesitas arrepentimiento real y agradece explícitamente la misericordia que te reubica en obediencia.';
            $misread = 'Pensar que la ira de Dios es un arrebato sin propósito o que su consuelo minimiza el pecado. El texto une santidad, juicio justo y restauración para quien vuelve a Dios.';
        } elseif (preg_match('/(cantar|alabar|exaltar|dar gracias|accion de gracias|c[aá]ntico)/u', $lower)) {
            $focus = 'la respuesta central del pasaje es adoración: el texto empuja del recuerdo de la gracia a la proclamación pública de esa gracia.';
            $insight = 'No presenta una fe silenciosa: la experiencia de Dios se convierte en testimonio, doxología y memoria comunitaria.';
            $application = 'Formula hoy una oración de gratitud concreta y compártela con alguien para transformar la experiencia en testimonio.';
            $misread = 'Tratar el canto solo como emoción del momento. Aquí la alabanza nace de una memoria teológica: recordar lo que Dios hizo y responder con obediencia y testimonio.';
        } elseif (preg_match('/(temor|miedo|no temas|confiar|confianza|salvaci[oó]n|fortaleza)/u', $lower)) {
            $focus = 'el pasaje enfrenta la ansiedad con una teología de confianza: el sujeto deja de mirarse y vuelve a la fidelidad de Dios.';
            $insight = 'La seguridad bíblica no nace del control humano, sino de la presencia y acción de Dios dentro de la historia del creyente.';
            $application = 'Identifica una preocupación dominante y sométela hoy en oración, reemplazando reacción impulsiva por obediencia confiada.';
            $misread = 'Leer “no temas” como negación de la realidad del dolor. El pasaje no niega la crisis; redefine la respuesta desde la presencia de Dios.';
        } elseif (preg_match('/(terrenal|terrenales|celestial|celestiales|cielo|tierra)/u', $lower) && preg_match('/(cre[eé]|fe|confi)/u', $lower)) {
            $focus = 'el pasaje contrasta la percepción terrenal con la revelación celestial: no basta información religiosa, se requiere fe obediente.';
            $insight = 'La progresión del texto es epistemológica y espiritual: quien resiste la verdad ya explicada en lo cercano, difícilmente abrazará lo trascendente sin rendición del corazón.';
            $application = 'Pregunta hoy en qué área escuchas la verdad pero aún no obedeces; da un paso verificable de fe para pasar de comprensión a respuesta.';
            $misread = 'Separar “terrenal” y “celestial” como si fueran temas sin relación. Jesús usa lo conocido para llevar al oyente a la verdad mayor y exigir fe real, no curiosidad religiosa.';
        } elseif (preg_match('/(justicia|justo|rectitud|recto|iniquidad|pecado)/u', $lower)) {
            $focus = 'el texto vincula la obra de Dios con una ética visible: la gracia no cancela la justicia, la produce.';
            $insight = 'El pasaje exige coherencia entre confesión y conducta: la rectitud no es adorno moral, es fruto verificable de la acción divina.';
            $application = 'Revisa una práctica cotidiana donde haya incoherencia y establece una corrección específica para reflejar justicia bíblica.';
            $misread = 'Confundir justicia bíblica con autojustificación moral. El texto llama a una rectitud que nace de la obra de Dios y se verifica en el trato al prójimo.';
        }

        return [
            'focus' => $focus,
            'insight' => $insight,
            'application' => $application,
            'misread' => $misread,
        ];
    }

    private function commentaryCorpusMeta($book)
    {
        $book = (int) $book;
        if ($book >= 1 && $book <= 5) {
            return ['bridge' => 'Dentro del Pentateuco, este pasaje se entiende desde la lógica del pacto: Dios forma un pueblo santo y prepara la necesidad de un mediador pleno en Cristo.'];
        }
        if ($book >= 6 && $book <= 17) {
            return ['bridge' => 'En los libros históricos, el texto conecta fidelidad y consecuencias nacionales; su lectura apunta a la necesidad de un Rey verdaderamente justo, cumplido en Cristo.'];
        }
        if ($book >= 18 && $book <= 22) {
            return ['bridge' => 'En la literatura sapiencial, este pasaje trabaja el corazón, no solo la conducta externa; converge en la sabiduría encarnada de Cristo y en la formación del discípulo.'];
        }
        if ($book >= 23 && $book <= 39) {
            return ['bridge' => 'En los profetas, el juicio y la restauración sostienen la esperanza mesiánica: Dios corrige para redimir y abrir futuro de pacto renovado.'];
        }
        if ($book >= 40 && $book <= 44) {
            return ['bridge' => 'En Evangelios y Hechos, el eje es cristológico y misional: la revelación de Dios en Jesús impulsa fe obediente y testimonio público.'];
        }
        return ['bridge' => 'En las epístolas y Apocalipsis, el pasaje se integra en una teología de perseverancia: doctrina sólida, vida santa y esperanza final en Cristo.'];
    }

    private function extractCommentaryKeywords($text, $limit = 4)
    {
        $limit = max(1, (int) $limit);
        $lower = function_exists('mb_strtolower')
            ? mb_strtolower((string) $text, 'UTF-8')
            : strtolower((string) $text);
        $clean = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $lower);
        if (!is_string($clean)) {
            $clean = '';
        }
        $tokens = preg_split('/\s+/u', trim($clean));
        if (!is_array($tokens)) {
            return [];
        }

        $stop = [
            'de', 'la', 'el', 'los', 'las', 'y', 'a', 'en', 'que', 'por', 'con', 'para', 'del', 'se',
            'su', 'un', 'una', 'al', 'como', 'no', 'es', 'le', 'lo', 'tu', 'mi', 'si', 'mas', 'más',
            'o', 'ya', 'ha', 'sus', 'pero', 'porque', 'cuando', 'sobre', 'entre', 'todo', 'toda', 'este',
            'esta', 'estos', 'estas', 'aquel', 'aquella', 'dios', 'jehova',
        ];

        $freq = [];
        foreach ($tokens as $token) {
            $token = trim((string) $token);
            if ($token === '' || in_array($token, $stop, true)) {
                continue;
            }
            $len = function_exists('mb_strlen') ? mb_strlen($token, 'UTF-8') : strlen($token);
            if ($len < 4) {
                continue;
            }
            if (!isset($freq[$token])) {
                $freq[$token] = 0;
            }
            $freq[$token]++;
        }

        if (empty($freq)) {
            return [];
        }
        arsort($freq);
        return array_slice(array_keys($freq), 0, $limit);
    }

    private function commentaryCompactText($text)
    {
        $text = preg_replace('/\s+/u', ' ', trim((string) $text));
        if ($text === null) {
            $text = preg_replace('/\s+/', ' ', trim((string) $text));
        }
        return trim((string) $text);
    }

    private function commentaryClip($text, $max)
    {
        $text = $this->commentaryCompactText($text);
        $max = max(40, (int) $max);
        if ($text === '') {
            return '';
        }

        if (function_exists('mb_strlen') && function_exists('mb_substr')) {
            if (mb_strlen($text, 'UTF-8') <= $max) {
                return $text;
            }
            return rtrim(mb_substr($text, 0, $max, 'UTF-8')) . '...';
        }

        if (strlen($text) <= $max) {
            return $text;
        }
        return rtrim(substr($text, 0, $max)) . '...';
    }

    private function bible()
    {
        if (!$this->biblePdo instanceof PDO) {
            $this->biblePdo = ConnectionFactory::sqlite($this->bibleDbPath);
        }
        return $this->biblePdo;
    }

    private function compareBible()
    {
        if (!$this->comparePdo instanceof PDO) {
            $this->comparePdo = ConnectionFactory::sqlite($this->compareDbPath);
        }
        return $this->comparePdo;
    }

    private function commentary()
    {
        if (!$this->commentaryPdo instanceof PDO) {
            $this->commentaryPdo = ConnectionFactory::sqlite($this->commentaryDbPath);
        }
        return $this->commentaryPdo;
    }

    private function strongBible()
    {
        if ($this->strongPdo instanceof PDO) {
            return $this->strongPdo;
        }

        if ($this->strongDbPath === '' || !is_file($this->strongDbPath)) {
            return null;
        }

        try {
            $this->strongPdo = ConnectionFactory::sqlite($this->strongDbPath);
        } catch (\Throwable $e) {
            return null;
        }

        return $this->strongPdo;
    }

    private function bookNames()
    {
        return [
            1 => 'Génesis', 2 => 'Éxodo', 3 => 'Levítico', 4 => 'Números', 5 => 'Deuteronomio',
            6 => 'Josué', 7 => 'Jueces', 8 => 'Rut', 9 => '1 Samuel', 10 => '2 Samuel',
            11 => '1 Reyes', 12 => '2 Reyes', 13 => '1 Crónicas', 14 => '2 Crónicas', 15 => 'Esdras',
            16 => 'Nehemías', 17 => 'Ester', 18 => 'Job', 19 => 'Salmos', 20 => 'Proverbios',
            21 => 'Eclesiastés', 22 => 'Cantares', 23 => 'Isaías', 24 => 'Jeremías', 25 => 'Lamentaciones',
            26 => 'Ezequiel', 27 => 'Daniel', 28 => 'Oseas', 29 => 'Joel', 30 => 'Amós',
            31 => 'Abdías', 32 => 'Jonás', 33 => 'Miqueas', 34 => 'Nahúm', 35 => 'Habacuc',
            36 => 'Sofonías', 37 => 'Hageo', 38 => 'Zacarías', 39 => 'Malaquías', 40 => 'Mateo',
            41 => 'Marcos', 42 => 'Lucas', 43 => 'Juan', 44 => 'Hechos', 45 => 'Romanos',
            46 => '1 Corintios', 47 => '2 Corintios', 48 => 'Gálatas', 49 => 'Efesios', 50 => 'Filipenses',
            51 => 'Colosenses', 52 => '1 Tesalonicenses', 53 => '2 Tesalonicenses', 54 => '1 Timoteo', 55 => '2 Timoteo',
            56 => 'Tito', 57 => 'Filemón', 58 => 'Hebreos', 59 => 'Santiago', 60 => '1 Pedro',
            61 => '2 Pedro', 62 => '1 Juan', 63 => '2 Juan', 64 => '3 Juan', 65 => 'Judas', 66 => 'Apocalipsis',
        ];
    }

    private function chapterVersesFromPdo(PDO $pdo, $book, $chapter)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $stmt = $pdo->prepare(
            'SELECT Book, Chapter, Verse, Scripture FROM Bible WHERE Book = :book AND Chapter = :chapter ORDER BY Verse ASC'
        );
        $stmt->execute([
            ':book' => $book,
            ':chapter' => $chapter,
        ]);

        $strongFallbackMap = $this->getStrongFallbackChapterMap($book, $chapter);
        $rows = [];
        foreach ($stmt->fetchAll() as $row) {
            $scriptureHtml = $this->sanitizer->sanitize($row['Scripture']);
            $scriptureText = $this->sanitizer->text($scriptureHtml);
            $verseNumber = (int) $row['Verse'];
            $strongMeta = $this->buildStrongAlignmentMeta(
                $scriptureHtml,
                $scriptureText,
                isset($strongFallbackMap[$verseNumber]) ? (string) $strongFallbackMap[$verseNumber] : ''
            );
            $rows[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
                'verse' => $verseNumber,
                'scripture_html' => $scriptureHtml,
                'scripture_text' => $scriptureText,
                'has_embedded_strong' => $strongMeta['embedded'],
                'strong_alignment' => $strongMeta['alignment'],
            ];
        }
        return $rows;
    }

    private function getStrongFallbackChapterMap($book, $chapter)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        if ($book < 1 || $chapter < 1) {
            return [];
        }

        $pdo = $this->strongBible();
        if (!$pdo instanceof PDO) {
            return [];
        }

        $cacheKey = $book . ':' . $chapter;
        if (isset($this->strongChapterCache[$cacheKey])) {
            return $this->strongChapterCache[$cacheKey];
        }

        $stmt = $pdo->prepare(
            'SELECT Verse, Scripture FROM Bible WHERE Book = :book AND Chapter = :chapter ORDER BY Verse ASC'
        );
        $stmt->execute([
            ':book' => $book,
            ':chapter' => $chapter,
        ]);

        $map = [];
        foreach ($stmt->fetchAll() as $row) {
            $verse = (int) ($row['Verse'] ?? 0);
            if ($verse < 1) {
                continue;
            }
            $map[$verse] = $this->sanitizer->sanitize((string) ($row['Scripture'] ?? ''));
        }

        $this->strongChapterCache[$cacheKey] = $map;
        return $map;
    }

    private function buildStrongAlignmentMeta($scriptureHtml, $scriptureText, $fallbackHtml = '')
    {
        $pairs = $this->extractStrongPairsFromHtml((string) $scriptureHtml);
        $embedded = !empty($pairs);

        if (empty($pairs) && trim((string) $fallbackHtml) !== '') {
            $pairs = $this->extractStrongPairsFromHtml((string) $fallbackHtml);
        }

        if (empty($pairs)) {
            return [
                'embedded' => false,
                'alignment' => [],
            ];
        }

        return [
            'embedded' => $embedded,
            'alignment' => $this->alignDisplayWordsToPairs((string) $scriptureText, $pairs),
        ];
    }

    private function buildInterlinearTokens($scriptureText, array $alignment)
    {
        $words = $this->tokenizeWords((string) $scriptureText);
        $tokens = [];
        foreach ($words as $idx => $word) {
            $tokens[] = [
                'word' => (string) $word,
                'code' => isset($alignment[$idx]) ? trim((string) $alignment[$idx]) : '',
            ];
        }
        return $tokens;
    }

    private function alignDisplayWordsToPairs($displayText, array $pairs)
    {
        $displayWords = $this->tokenizeWords((string) $displayText);
        if (empty($displayWords)) {
            return [];
        }

        $codesSequence = [];
        foreach ($pairs as $pair) {
            $codes = isset($pair['codes']) && is_array($pair['codes']) ? $pair['codes'] : [];
            if (empty($codes)) {
                continue;
            }
            $word = isset($pair['word']) ? (string) $pair['word'] : '';
            $wordCount = count($this->tokenizeWords($word));
            if ($wordCount < 1) {
                $wordCount = 1;
            }
            $codeValue = implode(',', $codes);
            for ($i = 0; $i < $wordCount; $i++) {
                $codesSequence[] = $codeValue;
            }
        }

        if (empty($codesSequence)) {
            return [];
        }

        $alignment = array_fill(0, count($displayWords), '');
        $displayCount = count($displayWords);
        $codesCount = count($codesSequence);
        $offset = 0;
        if ($displayCount > $codesCount) {
            // Heurística: algunos versos incluyen títulos introductorios sin Strong.
            // Alineamos desde el final para no desplazar los códigos principales.
            $offset = $displayCount - $codesCount;
        }
        $limit = min($codesCount, $displayCount - $offset);
        for ($i = 0; $i < $limit; $i++) {
            $alignment[$offset + $i] = $codesSequence[$i];
        }

        return $alignment;
    }

    private function extractStrongPairsFromHtml($html)
    {
        $html = trim((string) $html);
        if ($html === '' || strpos($html, 'data-strong=') === false) {
            return [];
        }

        $doc = new \DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $doc->loadHTML(
            '<?xml encoding="UTF-8"><div id="root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();

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
            $codes = $this->normalizeStrongCodes((string) $node->getAttribute('data-strong'));
            if (empty($codes)) {
                continue;
            }
            $word = $this->sanitizer->text($node->textContent);
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

    private function normalizeStrongCodes($raw)
    {
        $raw = strtoupper(trim((string) $raw));
        if ($raw === '') {
            return [];
        }

        $tokens = preg_split('/[\s,;]+/', $raw);
        $codes = [];
        foreach ($tokens as $token) {
            if (!preg_match('/^([GH])0*([0-9]{1,5})$/', (string) $token, $m)) {
                continue;
            }
            $number = (int) $m[2];
            if ($number < 1) {
                continue;
            }
            $codes[$m[1] . $number] = true;
        }

        return array_keys($codes);
    }

    private function tokenizeWords($text)
    {
        $text = trim((string) $text);
        if ($text === '') {
            return [];
        }

        if (preg_match_all('/[\p{L}\p{N}]+(?:[\'’][\p{L}\p{N}]+)*/u', $text, $m)) {
            return isset($m[0]) ? $m[0] : [];
        }
        return [];
    }

    private function tokenizeSearchTerms($query)
    {
        return $this->tokenizeWords((string) $query);
    }

    private function containsWholeWords($text, array $terms, $requireAll = true)
    {
        $text = (string) $text;
        if ($text === '' || empty($terms)) {
            return false;
        }

        $checked = 0;
        $matchedAny = false;
        foreach ($terms as $term) {
            $term = trim((string) $term);
            if ($term === '') {
                continue;
            }
            $checked++;
            $pattern = '/(?<![\p{L}\p{N}_])' . preg_quote($term, '/') . '(?![\p{L}\p{N}_])/iu';
            $found = preg_match($pattern, $text) === 1;
            if ($requireAll && !$found) {
                return false;
            }
            if (!$requireAll && $found) {
                return true;
            }
            if ($found) {
                $matchedAny = true;
            }
        }

        if ($checked === 0) {
            return false;
        }

        return $requireAll ? true : $matchedAny;
    }

    private function resolveAuxBiblePath($requestedPath)
    {
        $requestedPath = trim((string) $requestedPath);
        if ($requestedPath === '') {
            return '';
        }

        if (is_file($requestedPath)) {
            return $requestedPath;
        }

        $candidate = $this->baseBibleDir . DIRECTORY_SEPARATOR . basename($requestedPath);
        if (is_file($candidate)) {
            return $candidate;
        }

        return '';
    }

    private function resolveVersionFilePath($fileName)
    {
        $file = basename(trim((string) $fileName));
        if ($file === '' || !preg_match('/\.bbli$/i', $file)) {
            return '';
        }
        $candidate = $this->baseBibleDir . DIRECTORY_SEPARATOR . $file;
        if (!is_file($candidate)) {
            return '';
        }
        return $candidate;
    }

    private function resolveVersionLabel($dbPath, $preferredLabel, $fallbackLabel)
    {
        $preferredLabel = trim((string) $preferredLabel);
        if ($preferredLabel !== '') {
            return $preferredLabel;
        }

        $meta = $this->readDetailsMeta((string) $dbPath);
        $title = trim((string) ($meta['title'] ?? ''));
        $abbr = trim((string) ($meta['abbr'] ?? ''));
        if ($title !== '') {
            return $title;
        }
        if ($abbr !== '') {
            return $abbr;
        }

        $fallbackLabel = trim((string) $fallbackLabel);
        if ($fallbackLabel !== '') {
            return $fallbackLabel;
        }

        $name = basename((string) $dbPath);
        if ($name !== '') {
            return pathinfo($name, PATHINFO_FILENAME);
        }
        return 'Biblia';
    }

    private function readDetailsMeta($dbPath)
    {
        $dbPath = trim((string) $dbPath);
        if ($dbPath === '' || !is_file($dbPath)) {
            return [];
        }

        try {
            $pdo = ConnectionFactory::sqlite($dbPath);
            $stmt = $pdo->query('SELECT Title, Abbreviation FROM Details LIMIT 1');
            $row = $stmt ? $stmt->fetch() : false;
            if (!$row) {
                return [];
            }

            return [
                'title' => isset($row['Title']) ? (string) $row['Title'] : '',
                'abbr' => isset($row['Abbreviation']) ? (string) $row['Abbreviation'] : '',
            ];
        } catch (\Throwable $e) {
            return [];
        }
    }
}
