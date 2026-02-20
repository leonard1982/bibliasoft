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
        return [
            'current' => [
                'primary_file' => basename((string) $this->bibleDbPath),
                'compare_file' => basename((string) $this->compareDbPath),
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
        $primaryRows = $this->getChapterVerses($book, $chapter);
        $compareRows = [];
        $available = false;
        $sameSource = false;
        $message = '';
        $primaryLabel = $this->primaryLabel;
        $compareLabel = $this->compareLabel;

        $comparePath = trim((string) $this->compareDbPath);
        if ($comparePath === '') {
            $message = 'No se configuró base de datos para comparación.';
            return [
                'book' => (int) $book,
                'chapter' => (int) $chapter,
                'available' => false,
                'same_source' => false,
                'primary_label' => $primaryLabel,
                'compare_label' => $compareLabel,
                'message' => $message,
                'compare_verses' => [],
            ];
        }

        $sameSource = realpath($comparePath) === realpath($this->bibleDbPath);
        if (!is_file($comparePath)) {
            $message = 'No se encontró la base de comparación.';
            return [
                'book' => (int) $book,
                'chapter' => (int) $chapter,
                'available' => false,
                'same_source' => $sameSource,
                'primary_label' => $primaryLabel,
                'compare_label' => $compareLabel,
                'message' => $message,
                'compare_verses' => [],
            ];
        }

        try {
            $compareRows = $this->chapterVersesFromPdo($this->compareBible(), $book, $chapter);
            $available = !empty($compareRows);
            if (!$available) {
                $message = 'La versión de comparación no tiene este capítulo.';
            } elseif ($sameSource) {
                $message = 'Comparando contra la misma versión. Selecciona otra en el botón "Versiones".';
            }
        } catch (\Throwable $e) {
            $available = false;
            $message = 'No se pudo abrir la versión de comparación.';
            $compareRows = [];
        }

        return [
            'book' => (int) $book,
            'chapter' => (int) $chapter,
            'available' => $available,
            'same_source' => $sameSource,
            'primary_label' => $primaryLabel,
            'compare_label' => $compareLabel,
            'message' => $message,
            'compare_verses' => $compareRows,
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

        if (empty($bookRows) && empty($chapterRows) && empty($verseRows) && (bool) config('sources.comments.generated.enabled', true)) {
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

        if (empty($bookRows) && empty($chapterRows) && empty($verseRows) && (bool) config('sources.comments.generated.enabled', true)) {
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

        $where = [];
        $params = [];

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
            } else {
                $words = preg_split('/\s+/', $query);
                $words = array_values(array_filter($words));
                if (!empty($words)) {
                    $pieces = [];
                    foreach ($words as $idx => $word) {
                        $key = ':w' . $idx;
                        $pieces[] = 'Scripture LIKE ' . $key;
                        $params[$key] = '%' . $word . '%';
                    }
                    if ($mode === 'all') {
                        $where[] = '(' . implode(' AND ', $pieces) . ')';
                    } else {
                        $where[] = '(' . implode(' OR ', $pieces) . ')';
                    }
                }
            }
        }

        $sql = 'SELECT Book, Chapter, Verse, Scripture FROM Bible';
        if (!empty($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' ORDER BY Book, Chapter, Verse LIMIT ' . $limit;

        $stmt = $this->bible()->prepare($sql);
        $stmt->execute($params);

        $results = [];
        foreach ($stmt->fetchAll() as $row) {
            $clean = $this->sanitizer->sanitize($row['Scripture']);
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
                'scripture_text' => $this->sanitizer->text($clean),
            ];
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
            return 'Generado';
        }
        return 'Dominio público';
    }

    private function generatedCommentaryHtml($book, $chapter, $verseStart, $verseEnd)
    {
        $verses = $this->getVersesInRange($book, $chapter, $verseStart, $verseEnd);
        if (empty($verses)) {
            return '';
        }

        $textParts = [];
        foreach ($verses as $row) {
            $textParts[] = trim((string) $row['scripture_text']);
        }
        $joined = trim(preg_replace('/\s+/', ' ', implode(' ', $textParts)));
        if ($joined === '') {
            return '';
        }
        if (function_exists('mb_strlen') && function_exists('mb_substr')) {
            if (mb_strlen($joined, 'UTF-8') > 260) {
                $joined = mb_substr($joined, 0, 260, 'UTF-8') . '...';
            }
        } elseif (strlen($joined) > 260) {
            $joined = substr($joined, 0, 260) . '...';
        }

        $reference = $this->buildRangeLabel($book, $chapter, $verseStart, $verseEnd);
        $html = '<p><strong>' . e($reference) . '.</strong> Este comentario contextual resume el enfoque del pasaje: '
            . e($joined)
            . ' Se recomienda comparar con el capítulo completo para una interpretación equilibrada.</p>';

        return $html;
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
