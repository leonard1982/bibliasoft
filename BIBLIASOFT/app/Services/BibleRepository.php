<?php

namespace App\Services;

use App\Database\ConnectionFactory;
use PDO;

class BibleRepository
{
    private $bibleDbPath;
    private $commentaryDbPath;
    private $sanitizer;
    private $biblePdo;
    private $commentaryPdo;

    public function __construct($bibleDbPath, $commentaryDbPath, HtmlSanitizer $sanitizer)
    {
        $this->bibleDbPath = $bibleDbPath;
        $this->commentaryDbPath = $commentaryDbPath;
        $this->sanitizer = $sanitizer;
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

    public function getChapterVerses($book, $chapter)
    {
        $stmt = $this->bible()->prepare(
            'SELECT Book, Chapter, Verse, Scripture FROM Bible WHERE Book = :book AND Chapter = :chapter ORDER BY Verse ASC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
        ]);

        $rows = [];
        foreach ($stmt->fetchAll() as $row) {
            $scriptureHtml = $this->sanitizer->sanitize($row['Scripture']);
            $rows[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
                'verse' => (int) $row['Verse'],
                'scripture_html' => $scriptureHtml,
                'scripture_text' => $this->sanitizer->text($scriptureHtml),
            ];
        }
        return $rows;
    }

    public function getVerse($book, $chapter, $verse)
    {
        $stmt = $this->bible()->prepare(
            'SELECT Book, Chapter, Verse, Scripture FROM Bible WHERE Book = :book AND Chapter = :chapter AND Verse = :verse LIMIT 1'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
        ]);
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        $scriptureHtml = $this->sanitizer->sanitize($row['Scripture']);
        return [
            'book' => (int) $row['Book'],
            'chapter' => (int) $row['Chapter'],
            'verse' => (int) $row['Verse'],
            'scripture_html' => $scriptureHtml,
            'scripture_text' => $this->sanitizer->text($scriptureHtml),
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

        $stmtBook = $this->commentary()->prepare('SELECT Comments FROM BookCommentary WHERE Book = :book');
        $stmtBook->execute([':book' => $book]);
        foreach ($stmtBook->fetchAll() as $row) {
            $bookRows[] = [
                'html' => $this->sanitizer->sanitize($row['Comments']),
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
            ];
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
            $results[] = [
                'book' => (int) $row['Book'],
                'chapter' => (int) $row['Chapter'],
                'verse' => (int) $row['Verse'],
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

    private function bible()
    {
        if (!$this->biblePdo instanceof PDO) {
            $this->biblePdo = ConnectionFactory::sqlite($this->bibleDbPath);
        }
        return $this->biblePdo;
    }

    private function commentary()
    {
        if (!$this->commentaryPdo instanceof PDO) {
            $this->commentaryPdo = ConnectionFactory::sqlite($this->commentaryDbPath);
        }
        return $this->commentaryPdo;
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
}
