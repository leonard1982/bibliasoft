<?php

namespace App\Services;

use App\Database\ConnectionFactory;
use PDO;

class UserDataRepository
{
    private $appDbPath;
    private $pdo;

    public function __construct($appDbPath)
    {
        $this->appDbPath = $appDbPath;
    }

    public function getNotes($book, $chapter, $verse)
    {
        $stmt = $this->db()->prepare(
            'SELECT id, content, created_at, updated_at
             FROM notes
             WHERE book = :book AND chapter = :chapter AND verse = :verse
             ORDER BY updated_at DESC, id DESC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
        ]);
        return $stmt->fetchAll();
    }

    public function createNote($book, $chapter, $verse, $content)
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO notes (book, chapter, verse, content, created_at, updated_at)
             VALUES (:book, :chapter, :verse, :content, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
            ':content' => trim((string) $content),
        ]);
        return (int) $this->db()->lastInsertId();
    }

    public function updateNote($id, $content)
    {
        $stmt = $this->db()->prepare(
            'UPDATE notes SET content = :content, updated_at = CURRENT_TIMESTAMP WHERE id = :id'
        );
        $stmt->execute([
            ':id' => (int) $id,
            ':content' => trim((string) $content),
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteNote($id)
    {
        $stmt = $this->db()->prepare('DELETE FROM notes WHERE id = :id');
        $stmt->execute([':id' => (int) $id]);
        return $stmt->rowCount() > 0;
    }

    public function getLinks($book, $chapter, $verse)
    {
        $stmt = $this->db()->prepare(
            'SELECT id, from_book, from_chapter, from_verse, to_book, to_chapter, to_verse, note, created_at
             FROM links
             WHERE from_book = :book AND from_chapter = :chapter AND from_verse = :verse
             ORDER BY id DESC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
        ]);
        return $stmt->fetchAll();
    }

    public function createLink($fromBook, $fromChapter, $fromVerse, $toBook, $toChapter, $toVerse, $note = '')
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO links
             (from_book, from_chapter, from_verse, to_book, to_chapter, to_verse, note, created_at)
             VALUES
             (:from_book, :from_chapter, :from_verse, :to_book, :to_chapter, :to_verse, :note, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':from_book' => (int) $fromBook,
            ':from_chapter' => (int) $fromChapter,
            ':from_verse' => (int) $fromVerse,
            ':to_book' => (int) $toBook,
            ':to_chapter' => (int) $toChapter,
            ':to_verse' => (int) $toVerse,
            ':note' => trim((string) $note),
        ]);
        return (int) $this->db()->lastInsertId();
    }

    public function deleteLink($id)
    {
        $stmt = $this->db()->prepare('DELETE FROM links WHERE id = :id');
        $stmt->execute([':id' => (int) $id]);
        return $stmt->rowCount() > 0;
    }

    public function getAiCache($book, $chapter, $verse, $contextHash)
    {
        $stmt = $this->db()->prepare(
            'SELECT cards_json, model, updated_at
             FROM ai_cache
             WHERE book = :book AND chapter = :chapter AND verse = :verse AND context_hash = :context_hash
             LIMIT 1'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
            ':context_hash' => $contextHash,
        ]);
        return $stmt->fetch();
    }

    public function saveAiCache($book, $chapter, $verse, $contextHash, $cardsJson, $model)
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO ai_cache (book, chapter, verse, context_hash, cards_json, model, created_at, updated_at)
             VALUES (:book, :chapter, :verse, :context_hash, :cards_json, :model, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
             ON CONFLICT(book, chapter, verse, context_hash)
             DO UPDATE SET cards_json = excluded.cards_json, model = excluded.model, updated_at = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
            ':context_hash' => $contextHash,
            ':cards_json' => $cardsJson,
            ':model' => $model,
        ]);
    }

    public function hasFtsIndex()
    {
        $stmt = $this->db()->query("SELECT name FROM sqlite_master WHERE type = 'table' AND name = 'fts_index' LIMIT 1");
        return (bool) $stmt->fetchColumn();
    }

    public function searchFts(array $filters, $limit = 60)
    {
        $limit = max(1, min(500, (int) $limit));
        $query = isset($filters['query']) ? trim($filters['query']) : '';
        $mode = isset($filters['mode']) ? $filters['mode'] : 'any';

        if ($query === '') {
            return [];
        }

        $tokens = array_values(array_filter(preg_split('/\s+/', $query)));
        if (empty($tokens)) {
            return [];
        }

        $where = [];
        $params = [];
        $isVirtual = $this->isVirtualFtsIndex();

        if ($isVirtual) {
            if ($mode === 'exact') {
                $ftsQuery = '"' . str_replace('"', ' ', $query) . '"';
            } elseif ($mode === 'all') {
                $ftsQuery = implode(' AND ', $tokens);
            } else {
                $ftsQuery = implode(' OR ', $tokens);
            }

            $where[] = 'fts_index MATCH :fts_query';
            $params[':fts_query'] = $ftsQuery;
        } else {
            if ($mode === 'exact') {
                $where[] = 'scripture LIKE :exact';
                $params[':exact'] = '%' . $query . '%';
            } else {
                $likeParts = [];
                foreach ($tokens as $idx => $word) {
                    $key = ':w' . $idx;
                    $likeParts[] = 'scripture LIKE ' . $key;
                    $params[$key] = '%' . $word . '%';
                }
                if ($mode === 'all') {
                    $where[] = '(' . implode(' AND ', $likeParts) . ')';
                } else {
                    $where[] = '(' . implode(' OR ', $likeParts) . ')';
                }
            }
        }

        if (!empty($filters['book'])) {
            $where[] = 'CAST(book AS INTEGER) = :book';
            $params[':book'] = (int) $filters['book'];
        }
        if (!empty($filters['chapter_from'])) {
            $where[] = 'CAST(chapter AS INTEGER) >= :chapter_from';
            $params[':chapter_from'] = (int) $filters['chapter_from'];
        }
        if (!empty($filters['chapter_to'])) {
            $where[] = 'CAST(chapter AS INTEGER) <= :chapter_to';
            $params[':chapter_to'] = (int) $filters['chapter_to'];
        }

        $sql = 'SELECT book, chapter, verse, scripture
                FROM fts_index
                WHERE ' . implode(' AND ', $where) . '
                LIMIT ' . $limit;

        $stmt = $this->db()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    private function isVirtualFtsIndex()
    {
        $stmt = $this->db()->query("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = 'fts_index' LIMIT 1");
        $sql = (string) $stmt->fetchColumn();
        $normalized = strtoupper($sql);
        return strpos($normalized, 'VIRTUAL TABLE') !== false && strpos($normalized, 'FTS5') !== false;
    }

    private function db()
    {
        if (!$this->pdo instanceof PDO) {
            $this->pdo = ConnectionFactory::sqlite($this->appDbPath);
        }
        return $this->pdo;
    }
}
