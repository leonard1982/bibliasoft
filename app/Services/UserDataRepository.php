<?php

namespace App\Services;

use App\Database\ConnectionFactory;
use PDO;

class UserDataRepository
{
    private $appDbPath;
    private $globalDbPath;
    private $pdo;
    private $globalPdo;
    private $columnCache = [];

    public function __construct($appDbPath, $globalDbPath = null)
    {
        $this->appDbPath = trim((string) $appDbPath);
        $this->globalDbPath = trim((string) ($globalDbPath !== null ? $globalDbPath : $appDbPath));
    }

    public function getNotes($book, $chapter, $verse)
    {
        return $this->getNotesForRange($book, $chapter, $verse, $verse);
    }

    public function getNotesForRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $stmt = $this->db()->prepare(
            'SELECT id, book, chapter, verse_start, verse_end, content, tags, created_at, updated_at
             FROM notes
             WHERE book = :book AND chapter = :chapter
               AND verse_start <= :verse_end
               AND verse_end >= :verse_start
             ORDER BY updated_at DESC, id DESC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
        ]);
        return $stmt->fetchAll();
    }

    public function createNote($book, $chapter, $verse, $content)
    {
        return $this->createNoteForRange($book, $chapter, $verse, $verse, $content, '');
    }

    public function createNoteForRange($book, $chapter, $verseStart, $verseEnd, $content, $tags = '')
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        if ($this->hasColumn('notes', 'verse')) {
            $stmt = $this->db()->prepare(
                'INSERT INTO notes (book, chapter, verse, verse_start, verse_end, content, tags, created_at, updated_at)
                 VALUES (:book, :chapter, :verse, :verse_start, :verse_end, :content, :tags, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':book' => (int) $book,
                ':chapter' => (int) $chapter,
                ':verse' => $range['start'],
                ':verse_start' => $range['start'],
                ':verse_end' => $range['end'],
                ':content' => trim((string) $content),
                ':tags' => trim((string) $tags),
            ]);
        } else {
            $stmt = $this->db()->prepare(
                'INSERT INTO notes (book, chapter, verse_start, verse_end, content, tags, created_at, updated_at)
                 VALUES (:book, :chapter, :verse_start, :verse_end, :content, :tags, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':book' => (int) $book,
                ':chapter' => (int) $chapter,
                ':verse_start' => $range['start'],
                ':verse_end' => $range['end'],
                ':content' => trim((string) $content),
                ':tags' => trim((string) $tags),
            ]);
        }
        return (int) $this->db()->lastInsertId();
    }

    public function updateNote($id, $content, $tags = null)
    {
        if ($tags === null) {
            $stmt = $this->db()->prepare(
                'UPDATE notes SET content = :content, updated_at = CURRENT_TIMESTAMP WHERE id = :id'
            );
            $stmt->execute([
                ':id' => (int) $id,
                ':content' => trim((string) $content),
            ]);
            return $stmt->rowCount() > 0;
        }

        $stmt = $this->db()->prepare(
            'UPDATE notes
             SET content = :content, tags = :tags, updated_at = CURRENT_TIMESTAMP
             WHERE id = :id'
        );
        $stmt->execute([
            ':id' => (int) $id,
            ':content' => trim((string) $content),
            ':tags' => trim((string) $tags),
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
        return $this->getLinksForRange($book, $chapter, $verse, $verse);
    }

    public function getLinksForRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $stmt = $this->db()->prepare(
            'SELECT id, from_book, from_chapter, from_verse_start, from_verse_end,
                    to_book, to_chapter, to_verse_start, to_verse_end, note, created_at
             FROM links
             WHERE from_book = :book
               AND from_chapter = :chapter
               AND from_verse_start <= :verse_end
               AND from_verse_end >= :verse_start
             ORDER BY id DESC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
        ]);
        return $stmt->fetchAll();
    }

    public function createLink($fromBook, $fromChapter, $fromVerse, $toBook, $toChapter, $toVerse, $note = '')
    {
        return $this->createLinkForRange(
            $fromBook,
            $fromChapter,
            $fromVerse,
            $fromVerse,
            $toBook,
            $toChapter,
            $toVerse,
            $toVerse,
            $note
        );
    }

    public function createLinkForRange(
        $fromBook,
        $fromChapter,
        $fromVerseStart,
        $fromVerseEnd,
        $toBook,
        $toChapter,
        $toVerseStart,
        $toVerseEnd,
        $note = ''
    ) {
        $from = $this->normalizeRange($fromVerseStart, $fromVerseEnd);
        $to = $this->normalizeRange($toVerseStart, $toVerseEnd);
        if ($this->hasColumn('links', 'from_verse')) {
            $stmt = $this->db()->prepare(
                'INSERT INTO links
                 (from_book, from_chapter, from_verse, from_verse_start, from_verse_end,
                  to_book, to_chapter, to_verse, to_verse_start, to_verse_end, note, created_at)
                 VALUES
                 (:from_book, :from_chapter, :from_verse, :from_verse_start, :from_verse_end,
                  :to_book, :to_chapter, :to_verse, :to_verse_start, :to_verse_end, :note, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':from_book' => (int) $fromBook,
                ':from_chapter' => (int) $fromChapter,
                ':from_verse' => $from['start'],
                ':from_verse_start' => $from['start'],
                ':from_verse_end' => $from['end'],
                ':to_book' => (int) $toBook,
                ':to_chapter' => (int) $toChapter,
                ':to_verse' => $to['start'],
                ':to_verse_start' => $to['start'],
                ':to_verse_end' => $to['end'],
                ':note' => trim((string) $note),
            ]);
        } else {
            $stmt = $this->db()->prepare(
                'INSERT INTO links
                 (from_book, from_chapter, from_verse_start, from_verse_end,
                  to_book, to_chapter, to_verse_start, to_verse_end, note, created_at)
                 VALUES
                 (:from_book, :from_chapter, :from_verse_start, :from_verse_end,
                  :to_book, :to_chapter, :to_verse_start, :to_verse_end, :note, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':from_book' => (int) $fromBook,
                ':from_chapter' => (int) $fromChapter,
                ':from_verse_start' => $from['start'],
                ':from_verse_end' => $from['end'],
                ':to_book' => (int) $toBook,
                ':to_chapter' => (int) $toChapter,
                ':to_verse_start' => $to['start'],
                ':to_verse_end' => $to['end'],
                ':note' => trim((string) $note),
            ]);
        }
        return (int) $this->db()->lastInsertId();
    }

    public function deleteLink($id)
    {
        $stmt = $this->db()->prepare('DELETE FROM links WHERE id = :id');
        $stmt->execute([':id' => (int) $id]);
        return $stmt->rowCount() > 0;
    }

    public function toggleFavorite($book, $chapter, $verse)
    {
        $current = $this->findFavorite($book, $chapter, $verse);
        if ($current) {
            $this->removeFavorite($book, $chapter, $verse);
            return false;
        }

        $this->saveFavorite($book, $chapter, $verse, $this->ensureDefaultFavoriteFolderId());
        return true;
    }

    public function getFavoriteFoldersWithCounts()
    {
        if (!$this->hasTable('favorite_folders')) {
            return [];
        }

        $stmt = $this->db()->query(
            'SELECT ff.id, ff.name, COUNT(f.id) AS total
             FROM favorite_folders ff
             LEFT JOIN favorites f ON f.folder_id = ff.id
             GROUP BY ff.id, ff.name
             ORDER BY CASE WHEN ff.id = 1 THEN 0 ELSE 1 END, ff.name COLLATE NOCASE ASC'
        );
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['id'] = (int) ($row['id'] ?? 0);
            $row['total'] = (int) ($row['total'] ?? 0);
            $row['name'] = trim((string) ($row['name'] ?? ''));
        }
        return $rows;
    }

    public function createFavoriteFolder($name)
    {
        $name = trim((string) $name);
        if ($name === '') {
            throw new \InvalidArgumentException('El nombre de la carpeta es obligatorio');
        }
        if (function_exists('mb_strlen')) {
            if (mb_strlen($name, 'UTF-8') > 50) {
                throw new \InvalidArgumentException('La carpeta no puede tener más de 50 caracteres');
            }
        } elseif (strlen($name) > 50) {
            throw new \InvalidArgumentException('La carpeta no puede tener más de 50 caracteres');
        }

        $lookup = $this->db()->prepare(
            'SELECT id, name
             FROM favorite_folders
             WHERE LOWER(name) = LOWER(:name)
             LIMIT 1'
        );
        $lookup->execute([':name' => $name]);
        $existing = $lookup->fetch();
        if ($existing) {
            return [
                'id' => (int) ($existing['id'] ?? 0),
                'name' => (string) ($existing['name'] ?? ''),
                'created' => false,
            ];
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO favorite_folders (name, created_at, updated_at)
             VALUES (:name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':name' => $name,
        ]);
        return [
            'id' => (int) $this->db()->lastInsertId(),
            'name' => $name,
            'created' => true,
        ];
    }

    public function getFavorites($folderId = 0, $limit = 300)
    {
        $folderId = (int) $folderId;
        $limit = max(1, min(1000, (int) $limit));
        $params = [];

        $sql = 'SELECT id, book, chapter, verse, folder_id, created_at
                FROM favorites';
        if ($folderId > 0) {
            $sql .= ' WHERE folder_id = :folder_id';
            $params[':folder_id'] = $folderId;
        }
        $sql .= ' ORDER BY id DESC LIMIT ' . $limit;

        $stmt = $this->db()->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['id'] = (int) ($row['id'] ?? 0);
            $row['book'] = (int) ($row['book'] ?? 0);
            $row['chapter'] = (int) ($row['chapter'] ?? 0);
            $row['verse'] = (int) ($row['verse'] ?? 0);
            $row['folder_id'] = (int) ($row['folder_id'] ?? 0);
            $row['created_at'] = (string) ($row['created_at'] ?? '');
        }
        return $rows;
    }

    public function findFavorite($book, $chapter, $verse)
    {
        $stmt = $this->db()->prepare(
            'SELECT id, book, chapter, verse, folder_id, created_at
             FROM favorites
             WHERE book = :book AND chapter = :chapter AND verse = :verse
             LIMIT 1'
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

        $row['id'] = (int) ($row['id'] ?? 0);
        $row['book'] = (int) ($row['book'] ?? 0);
        $row['chapter'] = (int) ($row['chapter'] ?? 0);
        $row['verse'] = (int) ($row['verse'] ?? 0);
        $row['folder_id'] = (int) ($row['folder_id'] ?? 0);
        $row['created_at'] = (string) ($row['created_at'] ?? '');
        return $row;
    }

    public function saveFavorite($book, $chapter, $verse, $folderId)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verse = (int) $verse;
        $folderId = $this->resolveFavoriteFolderId($folderId);

        if ($book < 1 || $chapter < 1 || $verse < 1) {
            throw new \InvalidArgumentException('Referencia inválida');
        }

        $current = $this->findFavorite($book, $chapter, $verse);
        if ($current) {
            if ((int) $current['folder_id'] !== $folderId && $this->hasColumn('favorites', 'folder_id')) {
                $update = $this->db()->prepare(
                    'UPDATE favorites
                     SET folder_id = :folder_id
                     WHERE id = :id'
                );
                $update->execute([
                    ':folder_id' => $folderId,
                    ':id' => (int) $current['id'],
                ]);
            }

            return [
                'id' => (int) $current['id'],
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'folder_id' => $folderId,
                'created' => false,
            ];
        }

        if ($this->hasColumn('favorites', 'folder_id')) {
            $insert = $this->db()->prepare(
                'INSERT INTO favorites (book, chapter, verse, folder_id, created_at)
                 VALUES (:book, :chapter, :verse, :folder_id, CURRENT_TIMESTAMP)'
            );
            $insert->execute([
                ':book' => $book,
                ':chapter' => $chapter,
                ':verse' => $verse,
                ':folder_id' => $folderId,
            ]);
        } else {
            $insert = $this->db()->prepare(
                'INSERT INTO favorites (book, chapter, verse, created_at)
                 VALUES (:book, :chapter, :verse, CURRENT_TIMESTAMP)'
            );
            $insert->execute([
                ':book' => $book,
                ':chapter' => $chapter,
                ':verse' => $verse,
            ]);
        }

        return [
            'id' => (int) $this->db()->lastInsertId(),
            'book' => $book,
            'chapter' => $chapter,
            'verse' => $verse,
            'folder_id' => $folderId,
            'created' => true,
        ];
    }

    public function removeFavorite($book, $chapter, $verse)
    {
        $stmt = $this->db()->prepare(
            'DELETE FROM favorites
             WHERE book = :book AND chapter = :chapter AND verse = :verse'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
        ]);
        return $stmt->rowCount() > 0;
    }

    public function getHighlightsForChapter($book, $chapter)
    {
        $stmt = $this->db()->prepare(
            'SELECT verse, color
             FROM highlights
             WHERE book = :book AND chapter = :chapter
             ORDER BY verse ASC'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
        ]);

        $rows = $stmt->fetchAll();
        $result = [];
        foreach ($rows as $row) {
            $verse = (int) ($row['verse'] ?? 0);
            $color = trim((string) ($row['color'] ?? ''));
            if ($verse < 1 || $color === '') {
                continue;
            }
            $result[$verse] = $color;
        }
        return $result;
    }

    public function setHighlightForRange($book, $chapter, $verseStart, $verseEnd, $color)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $stmt = $this->db()->prepare(
            'INSERT INTO highlights (book, chapter, verse, color, created_at, updated_at)
             VALUES (:book, :chapter, :verse, :color, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
             ON CONFLICT(book, chapter, verse)
             DO UPDATE SET color = excluded.color, updated_at = CURRENT_TIMESTAMP'
        );

        for ($verse = $range['start']; $verse <= $range['end']; $verse++) {
            $stmt->execute([
                ':book' => (int) $book,
                ':chapter' => (int) $chapter,
                ':verse' => (int) $verse,
                ':color' => trim((string) $color),
            ]);
        }
    }

    public function clearHighlightForRange($book, $chapter, $verseStart, $verseEnd)
    {
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $stmt = $this->db()->prepare(
            'DELETE FROM highlights
             WHERE book = :book
               AND chapter = :chapter
               AND verse >= :verse_start
               AND verse <= :verse_end'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
        ]);
        return $stmt->rowCount();
    }

    public function saveHistory($book, $chapter)
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO history (book, chapter, visited_at) VALUES (:book, :chapter, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
        ]);
    }

    public function getHistory($limit = 20)
    {
        $limit = max(1, min(100, (int) $limit));
        $stmt = $this->db()->query(
            'SELECT id, book, chapter, visited_at FROM history ORDER BY id DESC LIMIT ' . $limit
        );
        return $stmt->fetchAll();
    }

    public function savePassageHistory($book, $chapter, $verseStart, $verseEnd)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $range = $this->normalizeRange($verseStart, $verseEnd);
        if ($book < 1 || $chapter < 1) {
            return;
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO passage_history (book, chapter, verse_start, verse_end, hits, last_viewed)
             VALUES (:book, :chapter, :verse_start, :verse_end, 1, CURRENT_TIMESTAMP)
             ON CONFLICT(book, chapter, verse_start, verse_end)
             DO UPDATE SET
                 hits = passage_history.hits + 1,
                 last_viewed = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':book' => $book,
            ':chapter' => $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
        ]);
    }

    public function getSmartHistory($recentLimit = 8, $topChapterLimit = 8, $topPassageLimit = 8)
    {
        $recentLimit = max(1, min(40, (int) $recentLimit));
        $topChapterLimit = max(1, min(40, (int) $topChapterLimit));
        $topPassageLimit = max(1, min(40, (int) $topPassageLimit));

        $recentStmt = $this->db()->query(
            'SELECT book, chapter, COUNT(*) AS visits, MAX(visited_at) AS last_visited
             FROM history
             GROUP BY book, chapter
             ORDER BY MAX(id) DESC
             LIMIT ' . $recentLimit
        );
        $recentChapters = $recentStmt->fetchAll();

        $topChapterStmt = $this->db()->query(
            'SELECT book, chapter, COUNT(*) AS visits, MAX(visited_at) AS last_visited
             FROM history
             GROUP BY book, chapter
             ORDER BY visits DESC, last_visited DESC
             LIMIT ' . $topChapterLimit
        );
        $topChapters = $topChapterStmt->fetchAll();

        $topPassageStmt = $this->db()->query(
            'SELECT book, chapter, verse_start, verse_end, hits, last_viewed
             FROM passage_history
             ORDER BY hits DESC, last_viewed DESC
             LIMIT ' . $topPassageLimit
        );
        $topPassages = $topPassageStmt->fetchAll();

        foreach ($recentChapters as &$row) {
            $row['book'] = (int) ($row['book'] ?? 0);
            $row['chapter'] = (int) ($row['chapter'] ?? 0);
            $row['visits'] = (int) ($row['visits'] ?? 0);
            $row['last_visited'] = (string) ($row['last_visited'] ?? '');
        }

        foreach ($topChapters as &$row) {
            $row['book'] = (int) ($row['book'] ?? 0);
            $row['chapter'] = (int) ($row['chapter'] ?? 0);
            $row['visits'] = (int) ($row['visits'] ?? 0);
            $row['last_visited'] = (string) ($row['last_visited'] ?? '');
        }

        foreach ($topPassages as &$row) {
            $row['book'] = (int) ($row['book'] ?? 0);
            $row['chapter'] = (int) ($row['chapter'] ?? 0);
            $row['verse_start'] = (int) ($row['verse_start'] ?? 0);
            $row['verse_end'] = (int) ($row['verse_end'] ?? 0);
            $row['hits'] = (int) ($row['hits'] ?? 0);
            $row['last_viewed'] = (string) ($row['last_viewed'] ?? '');
        }

        return [
            'recent_chapters' => $recentChapters,
            'top_chapters' => $topChapters,
            'top_passages' => $topPassages,
        ];
    }

    public function getDailyCache($date)
    {
        $stmt = $this->db()->prepare(
            'SELECT date, book, chapter, verse, image_path, created_at
             FROM daily_cache
             WHERE date = :date
             LIMIT 1'
        );
        $stmt->execute([':date' => (string) $date]);
        return $stmt->fetch();
    }

    public function saveDailyCache($date, $book, $chapter, $verse, $imagePath = '')
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO daily_cache (date, book, chapter, verse, image_path, created_at)
             VALUES (:date, :book, :chapter, :verse, :image_path, CURRENT_TIMESTAMP)
             ON CONFLICT(date)
             DO UPDATE SET
                 book = excluded.book,
                 chapter = excluded.chapter,
                 verse = excluded.verse,
                 image_path = excluded.image_path'
        );
        $stmt->execute([
            ':date' => (string) $date,
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
            ':image_path' => (string) $imagePath,
        ]);
    }

    public function getDevotionalByDate($date)
    {
        $stmt = $this->db()->prepare(
            'SELECT id, date, book, chapter, verse, content_json, created_at
             FROM devotionals
             WHERE date = :date
             ORDER BY id DESC
             LIMIT 1'
        );
        $stmt->execute([':date' => (string) $date]);
        return $stmt->fetch();
    }

    public function saveDevotional($date, $book, $chapter, $verse, $contentJson)
    {
        $stmt = $this->db()->prepare(
            'INSERT INTO devotionals (date, book, chapter, verse, content_json, created_at)
             VALUES (:date, :book, :chapter, :verse, :content_json, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':date' => (string) $date,
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse' => (int) $verse,
            ':content_json' => (string) $contentJson,
        ]);
        return (int) $this->db()->lastInsertId();
    }

    public function getDevotionals($limit = 20)
    {
        $limit = max(1, min(200, (int) $limit));
        $stmt = $this->db()->query(
            'SELECT id, date, book, chapter, verse, content_json, created_at
             FROM devotionals
             ORDER BY id DESC
             LIMIT ' . $limit
        );
        return $stmt->fetchAll();
    }

    public function getUserPrefs()
    {
        $stmt = $this->db()->query(
            'SELECT id, font_scale, show_daily, auto_devotional, weekly_goal_days, reminder_enabled, reminder_time, theme, updated_at
             FROM user_prefs
             WHERE id = 1
             LIMIT 1'
        );
        $row = $stmt->fetch();
        if (!$row) {
            $this->db()->exec("INSERT INTO user_prefs (id, font_scale, show_daily, auto_devotional, weekly_goal_days, reminder_enabled, reminder_time, theme, updated_at) VALUES (1, 100, 1, 0, 5, 0, '07:00', 'light', CURRENT_TIMESTAMP)");
            return [
                'id' => 1,
                'font_scale' => 100,
                'show_daily' => 1,
                'auto_devotional' => 0,
                'weekly_goal_days' => 5,
                'reminder_enabled' => 0,
                'reminder_time' => '07:00',
                'theme' => 'light',
            ];
        }
        return $row;
    }

    public function saveUserPrefs(array $prefs)
    {
        $current = $this->getUserPrefs();
        $fontScale = isset($prefs['font_scale']) ? (int) $prefs['font_scale'] : (int) $current['font_scale'];
        $showDaily = isset($prefs['show_daily']) ? (int) $prefs['show_daily'] : (int) $current['show_daily'];
        $autoDevotional = isset($prefs['auto_devotional']) ? (int) $prefs['auto_devotional'] : (int) $current['auto_devotional'];
        $weeklyGoalDays = isset($prefs['weekly_goal_days']) ? (int) $prefs['weekly_goal_days'] : (int) ($current['weekly_goal_days'] ?? 5);
        $reminderEnabled = isset($prefs['reminder_enabled']) ? (int) $prefs['reminder_enabled'] : (int) ($current['reminder_enabled'] ?? 0);
        $reminderTime = isset($prefs['reminder_time']) ? trim((string) $prefs['reminder_time']) : (string) ($current['reminder_time'] ?? '07:00');
        $theme = isset($prefs['theme']) ? trim((string) $prefs['theme']) : (string) $current['theme'];

        if ($fontScale < 85) {
            $fontScale = 85;
        } elseif ($fontScale > 150) {
            $fontScale = 150;
        }
        if ($theme !== 'dark') {
            $theme = 'light';
        }
        if ($weeklyGoalDays < 1) {
            $weeklyGoalDays = 1;
        } elseif ($weeklyGoalDays > 7) {
            $weeklyGoalDays = 7;
        }
        if (!preg_match('/^\d{2}:\d{2}$/', $reminderTime)) {
            $reminderTime = '07:00';
        }
        $hour = (int) substr($reminderTime, 0, 2);
        $minute = (int) substr($reminderTime, 3, 2);
        if ($hour < 0 || $hour > 23 || $minute < 0 || $minute > 59) {
            $reminderTime = '07:00';
        }

        $stmt = $this->db()->prepare(
            'UPDATE user_prefs
             SET font_scale = :font_scale,
                 show_daily = :show_daily,
                 auto_devotional = :auto_devotional,
                 weekly_goal_days = :weekly_goal_days,
                 reminder_enabled = :reminder_enabled,
                 reminder_time = :reminder_time,
                 theme = :theme,
                 updated_at = CURRENT_TIMESTAMP
             WHERE id = 1'
        );
        $stmt->execute([
            ':font_scale' => $fontScale,
            ':show_daily' => $showDaily ? 1 : 0,
            ':auto_devotional' => $autoDevotional ? 1 : 0,
            ':weekly_goal_days' => $weeklyGoalDays,
            ':reminder_enabled' => $reminderEnabled ? 1 : 0,
            ':reminder_time' => $reminderTime,
            ':theme' => $theme,
        ]);
    }

    public function getActiveReadingPlan()
    {
        $stmt = $this->db()->query(
            'SELECT id, name, total_days, start_date, active, created_at, updated_at
             FROM reading_plans
             WHERE active = 1
             ORDER BY id DESC
             LIMIT 1'
        );
        return $stmt->fetch();
    }

    public function startReadingPlan($name, $totalDays, $startDate)
    {
        $this->db()->beginTransaction();
        try {
            $this->db()->exec('UPDATE reading_plans SET active = 0, updated_at = CURRENT_TIMESTAMP WHERE active = 1');
            $stmt = $this->db()->prepare(
                'INSERT INTO reading_plans (name, total_days, start_date, active, created_at, updated_at)
                 VALUES (:name, :total_days, :start_date, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':name' => trim((string) $name),
                ':total_days' => (int) $totalDays,
                ':start_date' => trim((string) $startDate),
            ]);
            $id = (int) $this->db()->lastInsertId();
            $this->db()->commit();
            return $id;
        } catch (\Throwable $e) {
            if ($this->db()->inTransaction()) {
                $this->db()->rollBack();
            }
            throw $e;
        }
    }

    public function getReadingPlanProgressMap($planId)
    {
        $stmt = $this->db()->prepare(
            'SELECT day_index, date, book, chapter, completed_at
             FROM reading_plan_progress
             WHERE plan_id = :plan_id
             ORDER BY day_index ASC'
        );
        $stmt->execute([':plan_id' => (int) $planId]);

        $rows = $stmt->fetchAll();
        $map = [];
        foreach ($rows as $row) {
            $day = (int) ($row['day_index'] ?? 0);
            if ($day < 1) {
                continue;
            }
            $map[$day] = [
                'date' => (string) ($row['date'] ?? ''),
                'book' => (int) ($row['book'] ?? 0),
                'chapter' => (int) ($row['chapter'] ?? 0),
                'completed_at' => (string) ($row['completed_at'] ?? ''),
            ];
        }
        return $map;
    }

    public function getReadingPlanChapterProgressByDay($planId)
    {
        $stmt = $this->db()->prepare(
            'SELECT day_index, book, chapter
             FROM reading_plan_chapter_progress
             WHERE plan_id = :plan_id
             ORDER BY day_index ASC, book ASC, chapter ASC'
        );
        $stmt->execute([':plan_id' => (int) $planId]);

        $rows = $stmt->fetchAll();
        $map = [];
        foreach ($rows as $row) {
            $dayIndex = (int) ($row['day_index'] ?? 0);
            $book = (int) ($row['book'] ?? 0);
            $chapter = (int) ($row['chapter'] ?? 0);
            if ($dayIndex < 1 || $book < 1 || $chapter < 1) {
                continue;
            }
            if (!isset($map[$dayIndex])) {
                $map[$dayIndex] = [];
            }
            $key = $book . ':' . $chapter;
            $map[$dayIndex][$key] = true;
        }
        return $map;
    }

    public function countReadingPlanCompletedDays($planId)
    {
        $stmt = $this->db()->prepare(
            'SELECT COUNT(*) FROM reading_plan_progress WHERE plan_id = :plan_id'
        );
        $stmt->execute([':plan_id' => (int) $planId]);
        return (int) $stmt->fetchColumn();
    }

    public function setReadingPlanDayCompletion($planId, $dayIndex, $date, $book, $chapter, $completed)
    {
        if (!$completed) {
            $stmtDelete = $this->db()->prepare(
                'DELETE FROM reading_plan_progress
                 WHERE plan_id = :plan_id AND day_index = :day_index'
            );
            $stmtDelete->execute([
                ':plan_id' => (int) $planId,
                ':day_index' => (int) $dayIndex,
            ]);
            return;
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO reading_plan_progress (plan_id, day_index, date, book, chapter, completed_at)
             VALUES (:plan_id, :day_index, :date, :book, :chapter, CURRENT_TIMESTAMP)
             ON CONFLICT(plan_id, day_index)
             DO UPDATE SET
                 date = excluded.date,
                 book = excluded.book,
                 chapter = excluded.chapter,
                 completed_at = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':plan_id' => (int) $planId,
            ':day_index' => (int) $dayIndex,
            ':date' => trim((string) $date),
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
        ]);
    }

    public function setReadingPlanChapterCompletion($planId, $dayIndex, $date, $book, $chapter, $completed)
    {
        $planId = (int) $planId;
        $dayIndex = (int) $dayIndex;
        $book = (int) $book;
        $chapter = (int) $chapter;
        $date = trim((string) $date);

        if ($planId < 1 || $dayIndex < 1 || $book < 1 || $chapter < 1) {
            return;
        }

        if (!$completed) {
            $stmtDelete = $this->db()->prepare(
                'DELETE FROM reading_plan_chapter_progress
                 WHERE plan_id = :plan_id
                   AND day_index = :day_index
                   AND book = :book
                   AND chapter = :chapter'
            );
            $stmtDelete->execute([
                ':plan_id' => $planId,
                ':day_index' => $dayIndex,
                ':book' => $book,
                ':chapter' => $chapter,
            ]);
            return;
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO reading_plan_chapter_progress (plan_id, day_index, date, book, chapter, completed_at)
             VALUES (:plan_id, :day_index, :date, :book, :chapter, CURRENT_TIMESTAMP)
             ON CONFLICT(plan_id, day_index, book, chapter)
             DO UPDATE SET
                 date = excluded.date,
                 completed_at = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':plan_id' => $planId,
            ':day_index' => $dayIndex,
            ':date' => $date,
            ':book' => $book,
            ':chapter' => $chapter,
        ]);
    }

    public function clearReadingPlanDayChapters($planId, $dayIndex)
    {
        $stmt = $this->db()->prepare(
            'DELETE FROM reading_plan_chapter_progress
             WHERE plan_id = :plan_id
               AND day_index = :day_index'
        );
        $stmt->execute([
            ':plan_id' => (int) $planId,
            ':day_index' => (int) $dayIndex,
        ]);
    }

    public function addReadingSessionSeconds($date, $seconds)
    {
        $date = $this->normalizeDateOnly($date);
        $seconds = max(1, min(6 * 3600, (int) $seconds));

        $stmt = $this->db()->prepare(
            'INSERT INTO reading_sessions (date, seconds, updated_at)
             VALUES (:date, :seconds, CURRENT_TIMESTAMP)
             ON CONFLICT(date)
             DO UPDATE SET
                 seconds = reading_sessions.seconds + excluded.seconds,
                 updated_at = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':date' => $date,
            ':seconds' => $seconds,
        ]);
    }

    public function logThemeStudy($themeKey, $date = null, $hits = 1)
    {
        $themeKey = $this->normalizeThemeKey($themeKey);
        if ($themeKey === '') {
            return;
        }
        $date = $this->normalizeDateOnly($date ?: date('Y-m-d'));
        $hits = max(1, min(200, (int) $hits));

        $stmt = $this->db()->prepare(
            'INSERT INTO theme_study_log (theme_key, date, hits, last_studied)
             VALUES (:theme_key, :date, :hits, CURRENT_TIMESTAMP)
             ON CONFLICT(theme_key, date)
             DO UPDATE SET
                 hits = theme_study_log.hits + excluded.hits,
                 last_studied = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':theme_key' => $themeKey,
            ':date' => $date,
            ':hits' => $hits,
        ]);
    }

    public function getReadingStatsPanel($days = 7, $topThemeLimit = 6)
    {
        $days = max(3, min(30, (int) $days));
        $topThemeLimit = max(3, min(20, (int) $topThemeLimit));

        $today = $this->normalizeDateOnly(date('Y-m-d'));
        $startDate = $this->normalizeDateOnly(date('Y-m-d', strtotime('-' . ($days - 1) . ' day')));

        $sessionStmt = $this->db()->prepare(
            'SELECT date, seconds
             FROM reading_sessions
             WHERE date >= :start_date AND date <= :today
             ORDER BY date ASC'
        );
        $sessionStmt->execute([
            ':start_date' => $startDate,
            ':today' => $today,
        ]);
        $sessionRows = $sessionStmt->fetchAll();
        $secondsByDate = [];
        $weekSeconds = 0;
        foreach ($sessionRows as $row) {
            $date = isset($row['date']) ? trim((string) $row['date']) : '';
            if ($date === '') {
                continue;
            }
            $seconds = max(0, (int) ($row['seconds'] ?? 0));
            $secondsByDate[$date] = $seconds;
            $weekSeconds += $seconds;
        }
        $todaySeconds = isset($secondsByDate[$today]) ? (int) $secondsByDate[$today] : 0;

        $daily = [];
        $cursorTs = strtotime($startDate);
        for ($i = 0; $i < $days; $i++) {
            $date = date('Y-m-d', $cursorTs + ($i * 86400));
            $seconds = isset($secondsByDate[$date]) ? (int) $secondsByDate[$date] : 0;
            $daily[] = [
                'date' => $date,
                'label' => date('d/m', strtotime($date)),
                'seconds' => $seconds,
                'minutes' => (int) floor($seconds / 60),
            ];
        }

        $chapterStmt = $this->db()->prepare(
            'SELECT COUNT(*) AS visits, COUNT(DISTINCT (CAST(book AS TEXT) || \':\' || CAST(chapter AS TEXT))) AS chapters
             FROM history
             WHERE date(visited_at) >= :start_date AND date(visited_at) <= :today'
        );
        $chapterStmt->execute([
            ':start_date' => $startDate,
            ':today' => $today,
        ]);
        $chapterRow = $chapterStmt->fetch();
        $chapterVisits = (int) ($chapterRow['visits'] ?? 0);
        $chapterDistinct = (int) ($chapterRow['chapters'] ?? 0);

        $themeStart = $this->normalizeDateOnly(date('Y-m-d', strtotime('-90 day')));
        $themeStmt = $this->db()->prepare(
            'SELECT theme_key, SUM(hits) AS total_hits, MAX(last_studied) AS last_studied
             FROM theme_study_log
             WHERE date >= :start_date
             GROUP BY theme_key
             ORDER BY total_hits DESC, last_studied DESC
             LIMIT ' . $topThemeLimit
        );
        $themeStmt->execute([':start_date' => $themeStart]);
        $themeRows = $themeStmt->fetchAll();
        $themesTop = [];
        foreach ($themeRows as $row) {
            $themesTop[] = [
                'theme_key' => (string) ($row['theme_key'] ?? ''),
                'hits' => (int) ($row['total_hits'] ?? 0),
                'last_studied' => (string) ($row['last_studied'] ?? ''),
            ];
        }

        $streak = $this->computeReadingStreak(600);
        $longest = $this->computeLongestReadingStreak(600);

        return [
            'range_days' => $days,
            'today' => $today,
            'reading' => [
                'today_seconds' => $todaySeconds,
                'today_minutes' => (int) floor($todaySeconds / 60),
                'week_seconds' => $weekSeconds,
                'week_minutes' => (int) floor($weekSeconds / 60),
                'streak_days' => $streak,
                'longest_streak_days' => $longest,
            ],
            'chapters' => [
                'week_distinct' => $chapterDistinct,
                'week_visits' => $chapterVisits,
            ],
            'themes_top' => $themesTop,
            'week_daily' => $daily,
        ];
    }

    public function listContentModules()
    {
        if (!$this->hasTable('content_modules')) {
            return [];
        }

        $stmt = $this->db()->query(
            'SELECT module_key, type, name, version, file_path, enabled, installed_at, updated_at
             FROM content_modules
             ORDER BY type ASC, name COLLATE NOCASE ASC'
        );
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['module_key'] = trim((string) ($row['module_key'] ?? ''));
            $row['type'] = trim((string) ($row['type'] ?? 'commentary'));
            $row['name'] = trim((string) ($row['name'] ?? ''));
            $row['version'] = trim((string) ($row['version'] ?? ''));
            $row['file_path'] = trim((string) ($row['file_path'] ?? ''));
            $row['enabled'] = (int) ($row['enabled'] ?? 0) === 1 ? 1 : 0;
            $row['installed_at'] = (string) ($row['installed_at'] ?? '');
            $row['updated_at'] = (string) ($row['updated_at'] ?? '');
        }
        return $rows;
    }

    public function getContentModuleByKey($moduleKey)
    {
        $moduleKey = trim((string) $moduleKey);
        if ($moduleKey === '' || !$this->hasTable('content_modules')) {
            return null;
        }

        $stmt = $this->db()->prepare(
            'SELECT module_key, type, name, version, file_path, enabled, installed_at, updated_at
             FROM content_modules
             WHERE module_key = :module_key
             LIMIT 1'
        );
        $stmt->execute([':module_key' => $moduleKey]);
        $row = $stmt->fetch();
        if (!$row) {
            return null;
        }

        $row['module_key'] = trim((string) ($row['module_key'] ?? ''));
        $row['type'] = trim((string) ($row['type'] ?? 'commentary'));
        $row['name'] = trim((string) ($row['name'] ?? ''));
        $row['version'] = trim((string) ($row['version'] ?? ''));
        $row['file_path'] = trim((string) ($row['file_path'] ?? ''));
        $row['enabled'] = (int) ($row['enabled'] ?? 0) === 1 ? 1 : 0;
        $row['installed_at'] = (string) ($row['installed_at'] ?? '');
        $row['updated_at'] = (string) ($row['updated_at'] ?? '');
        return $row;
    }

    public function saveContentModule($moduleKey, $type, $name, $version, $filePath, $enabled = 1)
    {
        $moduleKey = trim((string) $moduleKey);
        $type = trim((string) $type);
        $name = trim((string) $name);
        $version = trim((string) $version);
        $filePath = trim((string) $filePath);
        $enabled = (int) $enabled === 1 ? 1 : 0;

        if ($moduleKey === '') {
            throw new \InvalidArgumentException('Clave de módulo inválida.');
        }
        if ($type !== 'commentary' && $type !== 'dictionary') {
            throw new \InvalidArgumentException('Tipo de módulo inválido.');
        }
        if ($name === '' || $filePath === '') {
            throw new \InvalidArgumentException('Datos de módulo incompletos.');
        }

        // Resistente a concurrencia: primero intenta UPDATE, luego INSERT y si hay carrera vuelve a UPDATE.
        $update = $this->db()->prepare(
            'UPDATE content_modules
             SET type = :type,
                 name = :name,
                 version = :version,
                 file_path = :file_path,
                 enabled = :enabled,
                 updated_at = CURRENT_TIMESTAMP
             WHERE module_key = :module_key'
        );
        $params = [
            ':module_key' => $moduleKey,
            ':type' => $type,
            ':name' => $name,
            ':version' => $version,
            ':file_path' => $filePath,
            ':enabled' => $enabled,
        ];
        $update->execute($params);
        if ($update->rowCount() < 1) {
            $insert = $this->db()->prepare(
                'INSERT INTO content_modules
                 (module_key, type, name, version, file_path, enabled, installed_at, updated_at)
                 VALUES
                 (:module_key, :type, :name, :version, :file_path, :enabled, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            try {
                $insert->execute($params);
            } catch (\PDOException $e) {
                $isUniqueConflict = stripos((string) $e->getMessage(), 'UNIQUE constraint failed') !== false;
                if (!$isUniqueConflict) {
                    throw $e;
                }
                $update->execute($params);
            }
        }

        return $this->getContentModuleByKey($moduleKey);
    }

    public function setContentModuleEnabled($moduleKey, $enabled)
    {
        $moduleKey = trim((string) $moduleKey);
        if ($moduleKey === '') {
            return false;
        }

        $stmt = $this->db()->prepare(
            'UPDATE content_modules
             SET enabled = :enabled, updated_at = CURRENT_TIMESTAMP
             WHERE module_key = :module_key'
        );
        $stmt->execute([
            ':enabled' => (int) $enabled === 1 ? 1 : 0,
            ':module_key' => $moduleKey,
        ]);
        return $stmt->rowCount() > 0;
    }

    public function getEnabledContentModulesByType($type)
    {
        $type = trim((string) $type);
        if (($type !== 'commentary' && $type !== 'dictionary' && $type !== 'map') || !$this->hasTable('content_modules')) {
            return [];
        }

        $stmt = $this->db()->prepare(
            'SELECT module_key, type, name, version, file_path, enabled, installed_at, updated_at
             FROM content_modules
             WHERE type = :type AND enabled = 1
             ORDER BY name COLLATE NOCASE ASC'
        );
        $stmt->execute([':type' => $type]);
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['module_key'] = trim((string) ($row['module_key'] ?? ''));
            $row['type'] = trim((string) ($row['type'] ?? $type));
            $row['name'] = trim((string) ($row['name'] ?? ''));
            $row['version'] = trim((string) ($row['version'] ?? ''));
            $row['file_path'] = trim((string) ($row['file_path'] ?? ''));
            $row['enabled'] = 1;
            $row['installed_at'] = (string) ($row['installed_at'] ?? '');
            $row['updated_at'] = (string) ($row['updated_at'] ?? '');
        }
        return $rows;
    }

    public function getCloudSyncStatus($userId)
    {
        $userId = (int) $userId;
        if ($userId < 1) {
            return [
                'enabled' => false,
                'has_backup' => false,
                'updated_at' => '',
                'counts' => [],
            ];
        }

        $this->ensureCloudSyncTable();
        $stmt = $this->globalDb()->prepare(
            'SELECT payload_json, updated_at
             FROM cloud_sync_backups
             WHERE user_id = :user_id
             LIMIT 1'
        );
        $stmt->execute([':user_id' => $userId]);
        $row = $stmt->fetch();
        if (!$row) {
            return [
                'enabled' => true,
                'has_backup' => false,
                'updated_at' => '',
                'counts' => [],
            ];
        }

        $payload = json_decode((string) ($row['payload_json'] ?? ''), true);
        $counts = [];
        if (is_array($payload) && isset($payload['counts']) && is_array($payload['counts'])) {
            $counts = $payload['counts'];
        }

        return [
            'enabled' => true,
            'has_backup' => true,
            'updated_at' => (string) ($row['updated_at'] ?? ''),
            'counts' => $counts,
        ];
    }

    public function pushCloudBackup($userId)
    {
        $userId = (int) $userId;
        if ($userId < 1) {
            throw new \InvalidArgumentException('Usuario inválido para sincronización.');
        }

        $this->ensureCloudSyncTable();
        $snapshot = $this->buildCloudSnapshot();
        $json = json_encode($snapshot, JSON_UNESCAPED_UNICODE);
        if (!is_string($json) || $json === '') {
            throw new \RuntimeException('No se pudo serializar el respaldo.');
        }

        $stmt = $this->globalDb()->prepare(
            'INSERT INTO cloud_sync_backups (user_id, payload_json, updated_at)
             VALUES (:user_id, :payload_json, CURRENT_TIMESTAMP)
             ON CONFLICT(user_id)
             DO UPDATE SET
                 payload_json = excluded.payload_json,
                 updated_at = CURRENT_TIMESTAMP'
        );
        $stmt->execute([
            ':user_id' => $userId,
            ':payload_json' => $json,
        ]);

        $updatedAt = (string) $this->globalDb()->query(
            'SELECT updated_at FROM cloud_sync_backups WHERE user_id = ' . (int) $userId . ' LIMIT 1'
        )->fetchColumn();

        return [
            'enabled' => true,
            'has_backup' => true,
            'updated_at' => $updatedAt,
            'counts' => isset($snapshot['counts']) && is_array($snapshot['counts']) ? $snapshot['counts'] : [],
        ];
    }

    public function pullCloudBackup($userId)
    {
        $userId = (int) $userId;
        if ($userId < 1) {
            throw new \InvalidArgumentException('Usuario inválido para sincronización.');
        }

        $this->ensureCloudSyncTable();
        $stmt = $this->globalDb()->prepare(
            'SELECT payload_json, updated_at
             FROM cloud_sync_backups
             WHERE user_id = :user_id
             LIMIT 1'
        );
        $stmt->execute([':user_id' => $userId]);
        $row = $stmt->fetch();
        if (!$row) {
            throw new \RuntimeException('No hay respaldo en nube para esta cuenta.');
        }

        $payload = json_decode((string) ($row['payload_json'] ?? ''), true);
        if (!is_array($payload)) {
            throw new \RuntimeException('El respaldo en nube está dañado.');
        }

        $tables = isset($payload['tables']) && is_array($payload['tables']) ? $payload['tables'] : [];
        if (empty($tables)) {
            throw new \RuntimeException('El respaldo en nube no contiene datos restaurables.');
        }

        $this->db()->beginTransaction();
        try {
            foreach ($tables as $table => $rows) {
                if (!is_array($rows)) {
                    continue;
                }
                $this->replaceTableRows((string) $table, $rows);
            }
            $this->ensureDefaultFavoriteFolderId();
            $this->getUserPrefs();
            $this->db()->commit();
        } catch (\Throwable $e) {
            if ($this->db()->inTransaction()) {
                $this->db()->rollBack();
            }
            throw $e;
        }

        $counts = isset($payload['counts']) && is_array($payload['counts']) ? $payload['counts'] : [];
        return [
            'enabled' => true,
            'has_backup' => true,
            'updated_at' => (string) ($row['updated_at'] ?? ''),
            'counts' => $counts,
        ];
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

    public function getGenerationCache($book, $chapter, $verseStart, $verseEnd, $mode, $promptHash)
    {
        $stmt = $this->db()->prepare(
            'SELECT response, created_at
             FROM ai_cache
             WHERE book = :book
               AND chapter = :chapter
               AND verse_start = :verse_start
               AND verse_end = :verse_end
               AND mode = :mode
               AND prompt_hash = :prompt_hash
             ORDER BY id DESC
             LIMIT 1'
        );
        $stmt->execute([
            ':book' => (int) $book,
            ':chapter' => (int) $chapter,
            ':verse_start' => (int) $verseStart,
            ':verse_end' => (int) $verseEnd,
            ':mode' => $mode,
            ':prompt_hash' => $promptHash,
        ]);
        return $stmt->fetch();
    }

    public function saveGenerationCache($book, $chapter, $verseStart, $verseEnd, $mode, $promptHash, $response)
    {
        if ($this->hasColumn('ai_cache', 'verse')) {
            $stmt = $this->db()->prepare(
                'INSERT OR REPLACE INTO ai_cache
                 (book, chapter, verse, verse_start, verse_end, mode, prompt_hash, response, context_hash, cards_json, model, created_at, updated_at)
                 VALUES
                 (:book, :chapter, :verse, :verse_start, :verse_end, :mode, :prompt_hash, :response, :context_hash, :cards_json, :model, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':book' => (int) $book,
                ':chapter' => (int) $chapter,
                ':verse' => (int) $verseStart,
                ':verse_start' => (int) $verseStart,
                ':verse_end' => (int) $verseEnd,
                ':mode' => $mode,
                ':prompt_hash' => $promptHash,
                ':response' => $response,
                ':context_hash' => 'gen:' . $promptHash,
                ':cards_json' => '',
                ':model' => 'generation',
            ]);
        } else {
            $stmt = $this->db()->prepare(
                'INSERT INTO ai_cache
                 (book, chapter, verse_start, verse_end, mode, prompt_hash, response, created_at, updated_at)
                 VALUES
                 (:book, :chapter, :verse_start, :verse_end, :mode, :prompt_hash, :response, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
            );
            $stmt->execute([
                ':book' => (int) $book,
                ':chapter' => (int) $chapter,
                ':verse_start' => (int) $verseStart,
                ':verse_end' => (int) $verseEnd,
                ':mode' => $mode,
                ':prompt_hash' => $promptHash,
                ':response' => $response,
            ]);
        }
    }

    public function hasFtsIndex()
    {
        $stmt = $this->globalDb()->query("SELECT name FROM sqlite_master WHERE type = 'table' AND name = 'fts_index' LIMIT 1");
        return (bool) $stmt->fetchColumn();
    }

    public function searchFts(array $filters, $limit = 60)
    {
        $limit = max(1, min(500, (int) $limit));
        $query = isset($filters['query']) ? trim($filters['query']) : '';
        $mode = isset($filters['mode']) ? $filters['mode'] : 'any';
        $wholeWordTokens = [];

        if ($query === '') {
            return [];
        }

        $tokens = $this->tokenizeSearchTerms($query);
        if ($mode !== 'exact' && empty($tokens)) {
            return [];
        }

        $where = [];
        $params = [];
        $isVirtual = $this->isVirtualFtsIndex();

        if ($isVirtual) {
            if ($mode === 'exact') {
                $ftsQuery = '"' . str_replace('"', ' ', $query) . '"';
            } elseif ($mode === 'word') {
                $wholeWordTokens = $tokens;
                $ftsQuery = implode(' AND ', $tokens);
            } elseif ($mode === 'all') {
                $ftsQuery = implode(' AND ', $tokens);
            } else {
                $ftsQuery = implode(' OR ', $tokens);
            }

            $where[] = 'fts_index MATCH :fts_query';
            $params[':fts_query'] = $ftsQuery;
        } else {
            if ($mode === 'exact') {
                $where[] = '(scripture LIKE :exact OR COALESCE(title, \'\') LIKE :exact)';
                $params[':exact'] = '%' . $query . '%';
            } elseif ($mode === 'word') {
                // Para "palabra completa" evitamos un pre-filtro con LIKE,
                // porque elimina resultados válidos en libros posteriores.
                $wholeWordTokens = $tokens;
            } else {
                $likeParts = [];
                foreach ($tokens as $idx => $word) {
                    $key = ':w' . $idx;
                    $likeParts[] = '(scripture LIKE ' . $key . ' OR COALESCE(title, \'\') LIKE ' . $key . ')';
                    $params[$key] = '%' . $word . '%';
                }
                if ($mode === 'all' || $mode === 'word') {
                    $where[] = '(' . implode(' AND ', $likeParts) . ')';
                } else {
                    $where[] = '(' . implode(' OR ', $likeParts) . ')';
                }
                if ($mode === 'word') {
                    $wholeWordTokens = $tokens;
                }
            }
        }

        if (!empty($filters['book'])) {
            $where[] = 'CAST(book AS INTEGER) = :book';
            $params[':book'] = (int) $filters['book'];
        }
        $testament = isset($filters['testament']) ? strtolower(trim((string) $filters['testament'])) : 'all';
        if ($testament === 'ot') {
            $where[] = 'CAST(book AS INTEGER) BETWEEN 1 AND 39';
        } elseif ($testament === 'nt') {
            $where[] = 'CAST(book AS INTEGER) BETWEEN 40 AND 66';
        }
        if (!empty($filters['chapter_from'])) {
            $where[] = 'CAST(chapter AS INTEGER) >= :chapter_from';
            $params[':chapter_from'] = (int) $filters['chapter_from'];
        }
        if (!empty($filters['chapter_to'])) {
            $where[] = 'CAST(chapter AS INTEGER) <= :chapter_to';
            $params[':chapter_to'] = (int) $filters['chapter_to'];
        }

        $sqlLimit = $limit;
        if ($mode === 'word' && !empty($wholeWordTokens)) {
            // Escaneo amplio para luego filtrar con límites de palabra reales.
            $sqlLimit = 50000;
        }

        $sql = 'SELECT book, chapter, verse, scripture, COALESCE(title, \'\') AS title
                FROM fts_index';
        if (!empty($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' LIMIT ' . $sqlLimit;

        $stmt = $this->globalDb()->prepare($sql);
        $stmt->execute($params);

        $rows = $stmt->fetchAll();
        if (empty($wholeWordTokens)) {
            return $rows;
        }

        $filtered = [];
        foreach ($rows as $row) {
            $haystack = trim((string) ($row['scripture'] ?? '') . ' ' . (string) ($row['title'] ?? ''));
            if (!$this->containsWholeWords($haystack, $wholeWordTokens, true)) {
                continue;
            }
            $filtered[] = $row;
            if (count($filtered) >= $limit) {
                break;
            }
        }

        return $filtered;
    }

    public function createUser($email, $password, $fullName, $ministry = '', $dataConsent = false)
    {
        $email = trim((string) $email);
        $fullName = trim((string) $fullName);
        $ministry = trim((string) $ministry);
        $dataConsent = $dataConsent ? 1 : 0;

        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Correo electrónico inválido');
        }
        if ($fullName === '') {
            throw new \InvalidArgumentException('El nombre es obligatorio');
        }
        if (strlen((string) $password) < 6) {
            throw new \InvalidArgumentException('La contraseña debe tener al menos 6 caracteres');
        }
        if (!$dataConsent) {
            throw new \InvalidArgumentException('Debes autorizar el tratamiento de datos para crear la cuenta');
        }

        $existing = $this->getUserByIdentity($email);
        if ($existing) {
            throw new \InvalidArgumentException('Ese correo ya está registrado');
        }

        $stmt = $this->globalDb()->prepare(
            'INSERT INTO users (username, email, full_name, ministry, data_consent, data_consent_at, password_hash, created_at)
             VALUES (:username, :email, :full_name, :ministry, :data_consent, :data_consent_at, :password_hash, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':username' => $email,
            ':email' => $email,
            ':full_name' => $fullName,
            ':ministry' => $ministry,
            ':data_consent' => $dataConsent,
            ':data_consent_at' => date('Y-m-d H:i:s'),
            ':password_hash' => password_hash((string) $password, PASSWORD_DEFAULT),
        ]);

        return (int) $this->globalDb()->lastInsertId();
    }

    public function getUserByIdentity($identity)
    {
        $identity = trim((string) $identity);
        $stmt = $this->globalDb()->prepare(
            'SELECT id, username, email, full_name, ministry, data_consent, data_consent_at, password_hash, created_at
             FROM users
             WHERE username = :identity COLLATE NOCASE
                OR email = :identity COLLATE NOCASE
             LIMIT 1'
        );
        $stmt->execute([':identity' => $identity]);
        return $stmt->fetch();
    }

    public function getUserByUsername($username)
    {
        return $this->getUserByIdentity($username);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->globalDb()->prepare(
            'SELECT id, username, email, full_name, ministry, data_consent, data_consent_at, password_hash, created_at
             FROM users
             WHERE email = :email COLLATE NOCASE
             LIMIT 1'
        );
        $stmt->execute([':email' => trim((string) $email)]);
        return $stmt->fetch();
    }

    public function getUserById($id)
    {
        $stmt = $this->globalDb()->prepare(
            'SELECT id, username, email, full_name, ministry, data_consent, data_consent_at, created_at
             FROM users
             WHERE id = :id
             LIMIT 1'
        );
        $stmt->execute([':id' => (int) $id]);
        return $stmt->fetch();
    }

    public function verifyUser($username, $password)
    {
        $row = $this->getUserByIdentity($username);
        if (!$row) {
            return null;
        }
        if (!password_verify((string) $password, (string) $row['password_hash'])) {
            return null;
        }

        return [
            'id' => (int) $row['id'],
            'username' => (string) $row['username'],
            'email' => (string) ($row['email'] ?? ''),
            'full_name' => (string) ($row['full_name'] ?? ''),
            'display_name' => trim((string) ($row['full_name'] ?? '')) !== '' ? (string) $row['full_name'] : (string) $row['username'],
            'created_at' => (string) $row['created_at'],
        ];
    }

    public function countUsers()
    {
        return (int) $this->globalDb()->query('SELECT COUNT(*) FROM users')->fetchColumn();
    }

    public function getAnecdotes(array $filters = [], $limit = 60)
    {
        $limit = max(1, min(200, (int) $limit));
        $where = [];
        $params = [];

        $topic = isset($filters['topic']) ? trim((string) $filters['topic']) : '';
        if ($topic !== '' && $topic !== 'Todos') {
            $where[] = 'topic = :topic';
            $params[':topic'] = $topic;
        }

        $query = isset($filters['q']) ? trim((string) $filters['q']) : '';
        if ($query !== '') {
            $where[] = '(title LIKE :q OR content LIKE :q OR idea_central LIKE :q OR application LIKE :q)';
            $params[':q'] = '%' . $query . '%';
        }

        $sql = 'SELECT id, topic, title, content, idea_central, application, source, created_at
                FROM anecdotes';
        if (!empty($where)) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= ' ORDER BY id DESC LIMIT ' . $limit;

        $stmt = $this->globalDb()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getAnecdoteTopics()
    {
        $stmt = $this->globalDb()->query(
            'SELECT topic, COUNT(*) AS total
             FROM anecdotes
             GROUP BY topic
             ORDER BY topic ASC'
        );
        return $stmt->fetchAll();
    }

    public function countAnecdotes()
    {
        return (int) $this->globalDb()->query('SELECT COUNT(*) FROM anecdotes')->fetchColumn();
    }

    public function createAnecdote($topic, $title, $content, $ideaCentral, $application, $source = 'seed')
    {
        $stmt = $this->globalDb()->prepare(
            'INSERT INTO anecdotes (topic, title, content, idea_central, application, source, created_at)
             VALUES (:topic, :title, :content, :idea_central, :application, :source, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':topic' => trim((string) $topic),
            ':title' => trim((string) $title),
            ':content' => trim((string) $content),
            ':idea_central' => trim((string) $ideaCentral),
            ':application' => trim((string) $application),
            ':source' => trim((string) $source),
        ]);
        return (int) $this->globalDb()->lastInsertId();
    }

    public function hasAnecdotes()
    {
        return $this->countAnecdotes() > 0;
    }

    public function toggleAnecdoteFavorite($userId, $anecdoteId)
    {
        $userId = (int) $userId;
        $anecdoteId = (int) $anecdoteId;
        if ($userId < 1 || $anecdoteId < 1) {
            return false;
        }

        $stmt = $this->globalDb()->prepare(
            'SELECT id FROM anecdote_favorites WHERE user_id = :user_id AND anecdote_id = :anecdote_id LIMIT 1'
        );
        $stmt->execute([
            ':user_id' => $userId,
            ':anecdote_id' => $anecdoteId,
        ]);
        $id = (int) $stmt->fetchColumn();

        if ($id > 0) {
            $del = $this->globalDb()->prepare('DELETE FROM anecdote_favorites WHERE id = :id');
            $del->execute([':id' => $id]);
            return false;
        }

        $ins = $this->globalDb()->prepare(
            'INSERT INTO anecdote_favorites (user_id, anecdote_id, created_at)
             VALUES (:user_id, :anecdote_id, CURRENT_TIMESTAMP)'
        );
        $ins->execute([
            ':user_id' => $userId,
            ':anecdote_id' => $anecdoteId,
        ]);
        return true;
    }

    public function getFavoriteAnecdoteIds($userId)
    {
        $userId = (int) $userId;
        if ($userId < 1) {
            return [];
        }

        $stmt = $this->globalDb()->prepare(
            'SELECT anecdote_id FROM anecdote_favorites WHERE user_id = :user_id'
        );
        $stmt->execute([':user_id' => $userId]);
        $rows = $stmt->fetchAll();
        $ids = [];
        foreach ($rows as $row) {
            $ids[] = (int) $row['anecdote_id'];
        }
        return $ids;
    }

    public function getStudyProjects()
    {
        if (!$this->hasTable('study_projects')) {
            return [];
        }

        $stmt = $this->db()->query(
            'SELECT p.id, p.name, p.description, p.color, p.created_at, p.updated_at,
                    COUNT(e.id) AS entries_count,
                    MAX(COALESCE(e.updated_at, e.created_at)) AS last_entry_at
             FROM study_projects p
             LEFT JOIN study_project_entries e ON e.project_id = p.id
             GROUP BY p.id, p.name, p.description, p.color, p.created_at, p.updated_at
             ORDER BY p.updated_at DESC, p.id DESC'
        );
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['id'] = (int) ($row['id'] ?? 0);
            $row['name'] = trim((string) ($row['name'] ?? ''));
            $row['description'] = trim((string) ($row['description'] ?? ''));
            $row['color'] = $this->normalizeStudyProjectColor($row['color'] ?? '');
            $row['entries_count'] = (int) ($row['entries_count'] ?? 0);
            $row['last_entry_at'] = (string) ($row['last_entry_at'] ?? '');
            $row['created_at'] = (string) ($row['created_at'] ?? '');
            $row['updated_at'] = (string) ($row['updated_at'] ?? '');
        }
        return $rows;
    }

    public function createStudyProject($name, $description = '', $color = '#1d6a8f')
    {
        $name = $this->normalizeStudyProjectName($name);
        $description = $this->normalizeStudyProjectDescription($description);
        $color = $this->normalizeStudyProjectColor($color);

        $lookup = $this->db()->prepare(
            'SELECT id, name, description, color
             FROM study_projects
             WHERE LOWER(name) = LOWER(:name)
             LIMIT 1'
        );
        $lookup->execute([':name' => $name]);
        $existing = $lookup->fetch();
        if ($existing) {
            return [
                'id' => (int) ($existing['id'] ?? 0),
                'name' => (string) ($existing['name'] ?? ''),
                'description' => trim((string) ($existing['description'] ?? '')),
                'color' => $this->normalizeStudyProjectColor($existing['color'] ?? ''),
                'created' => false,
            ];
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO study_projects (name, description, color, created_at, updated_at)
             VALUES (:name, :description, :color, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':color' => $color,
        ]);

        return [
            'id' => (int) $this->db()->lastInsertId(),
            'name' => $name,
            'description' => $description,
            'color' => $color,
            'created' => true,
        ];
    }

    public function updateStudyProject($id, $name, $description = '', $color = '#1d6a8f')
    {
        $id = (int) $id;
        if ($id < 1) {
            throw new \InvalidArgumentException('Proyecto inválido.');
        }

        $name = $this->normalizeStudyProjectName($name);
        $description = $this->normalizeStudyProjectDescription($description);
        $color = $this->normalizeStudyProjectColor($color);

        $exists = $this->db()->prepare('SELECT id FROM study_projects WHERE id = :id LIMIT 1');
        $exists->execute([':id' => $id]);
        if (!(int) $exists->fetchColumn()) {
            throw new \InvalidArgumentException('Proyecto no encontrado.');
        }

        $nameTaken = $this->db()->prepare(
            'SELECT id FROM study_projects WHERE LOWER(name) = LOWER(:name) AND id <> :id LIMIT 1'
        );
        $nameTaken->execute([
            ':name' => $name,
            ':id' => $id,
        ]);
        if ((int) $nameTaken->fetchColumn() > 0) {
            throw new \InvalidArgumentException('Ya existe otro proyecto con ese nombre.');
        }

        $stmt = $this->db()->prepare(
            'UPDATE study_projects
             SET name = :name,
                 description = :description,
                 color = :color,
                 updated_at = CURRENT_TIMESTAMP
             WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':color' => $color,
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteStudyProject($id)
    {
        $id = (int) $id;
        if ($id < 1) {
            return false;
        }

        if ($this->hasTable('study_project_entries')) {
            $deleteEntries = $this->db()->prepare('DELETE FROM study_project_entries WHERE project_id = :project_id');
            $deleteEntries->execute([':project_id' => $id]);
        }

        $deleteProject = $this->db()->prepare('DELETE FROM study_projects WHERE id = :id');
        $deleteProject->execute([':id' => $id]);
        return $deleteProject->rowCount() > 0;
    }

    public function getStudyProjectEntries($projectId, $limit = 300)
    {
        $projectId = (int) $projectId;
        $limit = max(1, min(1000, (int) $limit));
        if ($projectId < 1 || !$this->hasTable('study_project_entries')) {
            return [];
        }

        $stmt = $this->db()->prepare(
            'SELECT id, project_id, book, chapter, verse_start, verse_end,
                    note, strong_code, strong_term, commentary_excerpt, created_at, updated_at
             FROM study_project_entries
             WHERE project_id = :project_id
             ORDER BY updated_at DESC, id DESC
             LIMIT ' . $limit
        );
        $stmt->execute([':project_id' => $projectId]);
        $rows = $stmt->fetchAll();
        foreach ($rows as &$row) {
            $row['id'] = (int) ($row['id'] ?? 0);
            $row['project_id'] = (int) ($row['project_id'] ?? 0);
            $row['book'] = (int) ($row['book'] ?? 0);
            $row['chapter'] = (int) ($row['chapter'] ?? 0);
            $row['verse_start'] = (int) ($row['verse_start'] ?? 0);
            $row['verse_end'] = (int) ($row['verse_end'] ?? 0);
            $row['note'] = trim((string) ($row['note'] ?? ''));
            $row['strong_code'] = trim((string) ($row['strong_code'] ?? ''));
            $row['strong_term'] = trim((string) ($row['strong_term'] ?? ''));
            $row['commentary_excerpt'] = trim((string) ($row['commentary_excerpt'] ?? ''));
            $row['created_at'] = (string) ($row['created_at'] ?? '');
            $row['updated_at'] = (string) ($row['updated_at'] ?? '');
        }
        return $rows;
    }

    public function createStudyProjectEntry(
        $projectId,
        $book,
        $chapter,
        $verseStart,
        $verseEnd,
        $note = '',
        $strongCode = '',
        $strongTerm = '',
        $commentaryExcerpt = ''
    ) {
        $projectId = (int) $projectId;
        $book = (int) $book;
        $chapter = (int) $chapter;
        $range = $this->normalizeRange($verseStart, $verseEnd);
        $note = trim((string) $note);
        $strongCode = strtoupper(trim((string) $strongCode));
        $strongTerm = trim((string) $strongTerm);
        $commentaryExcerpt = trim((string) $commentaryExcerpt);

        if ($projectId < 1 || $book < 1 || $chapter < 1 || $range['start'] < 1 || $range['end'] < 1) {
            throw new \InvalidArgumentException('Referencia inválida para el proyecto.');
        }
        if (!$this->studyProjectExists($projectId)) {
            throw new \InvalidArgumentException('El proyecto de estudio no existe.');
        }
        if (function_exists('mb_strlen') ? mb_strlen($note, 'UTF-8') > 5000 : strlen($note) > 5000) {
            throw new \InvalidArgumentException('La nota no puede superar 5000 caracteres.');
        }
        if (function_exists('mb_strlen') ? mb_strlen($commentaryExcerpt, 'UTF-8') > 5000 : strlen($commentaryExcerpt) > 5000) {
            throw new \InvalidArgumentException('El comentario no puede superar 5000 caracteres.');
        }
        if ($strongCode !== '' && !preg_match('/^[GH][0-9]{1,5}$/', $strongCode)) {
            $strongCode = '';
        }

        $stmt = $this->db()->prepare(
            'INSERT INTO study_project_entries
             (project_id, book, chapter, verse_start, verse_end, note, strong_code, strong_term, commentary_excerpt, created_at, updated_at)
             VALUES
             (:project_id, :book, :chapter, :verse_start, :verse_end, :note, :strong_code, :strong_term, :commentary_excerpt, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':project_id' => $projectId,
            ':book' => $book,
            ':chapter' => $chapter,
            ':verse_start' => $range['start'],
            ':verse_end' => $range['end'],
            ':note' => $note,
            ':strong_code' => $strongCode,
            ':strong_term' => $strongTerm,
            ':commentary_excerpt' => $commentaryExcerpt,
        ]);

        $touch = $this->db()->prepare('UPDATE study_projects SET updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $touch->execute([':id' => $projectId]);

        return (int) $this->db()->lastInsertId();
    }

    public function updateStudyProjectEntry($entryId, $note = '', $strongCode = '', $strongTerm = '', $commentaryExcerpt = '')
    {
        $entryId = (int) $entryId;
        if ($entryId < 1) {
            throw new \InvalidArgumentException('Entrada inválida.');
        }

        $note = trim((string) $note);
        $strongCode = strtoupper(trim((string) $strongCode));
        $strongTerm = trim((string) $strongTerm);
        $commentaryExcerpt = trim((string) $commentaryExcerpt);
        if (function_exists('mb_strlen') ? mb_strlen($note, 'UTF-8') > 5000 : strlen($note) > 5000) {
            throw new \InvalidArgumentException('La nota no puede superar 5000 caracteres.');
        }
        if (function_exists('mb_strlen') ? mb_strlen($commentaryExcerpt, 'UTF-8') > 5000 : strlen($commentaryExcerpt) > 5000) {
            throw new \InvalidArgumentException('El comentario no puede superar 5000 caracteres.');
        }
        if ($strongCode !== '' && !preg_match('/^[GH][0-9]{1,5}$/', $strongCode)) {
            $strongCode = '';
        }

        $projectStmt = $this->db()->prepare('SELECT project_id FROM study_project_entries WHERE id = :id LIMIT 1');
        $projectStmt->execute([':id' => $entryId]);
        $projectId = (int) $projectStmt->fetchColumn();
        if ($projectId < 1) {
            throw new \InvalidArgumentException('Entrada no encontrada.');
        }

        $stmt = $this->db()->prepare(
            'UPDATE study_project_entries
             SET note = :note,
                 strong_code = :strong_code,
                 strong_term = :strong_term,
                 commentary_excerpt = :commentary_excerpt,
                 updated_at = CURRENT_TIMESTAMP
             WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $entryId,
            ':note' => $note,
            ':strong_code' => $strongCode,
            ':strong_term' => $strongTerm,
            ':commentary_excerpt' => $commentaryExcerpt,
        ]);

        $touch = $this->db()->prepare('UPDATE study_projects SET updated_at = CURRENT_TIMESTAMP WHERE id = :id');
        $touch->execute([':id' => $projectId]);
        return $stmt->rowCount() > 0;
    }

    public function deleteStudyProjectEntry($entryId)
    {
        $entryId = (int) $entryId;
        if ($entryId < 1 || !$this->hasTable('study_project_entries')) {
            return false;
        }

        $projectStmt = $this->db()->prepare('SELECT project_id FROM study_project_entries WHERE id = :id LIMIT 1');
        $projectStmt->execute([':id' => $entryId]);
        $projectId = (int) $projectStmt->fetchColumn();

        $stmt = $this->db()->prepare('DELETE FROM study_project_entries WHERE id = :id');
        $stmt->execute([':id' => $entryId]);
        $ok = $stmt->rowCount() > 0;
        if ($ok && $projectId > 0) {
            $touch = $this->db()->prepare('UPDATE study_projects SET updated_at = CURRENT_TIMESTAMP WHERE id = :id');
            $touch->execute([':id' => $projectId]);
        }
        return $ok;
    }

    private function studyProjectExists($projectId)
    {
        $projectId = (int) $projectId;
        if ($projectId < 1 || !$this->hasTable('study_projects')) {
            return false;
        }
        $stmt = $this->db()->prepare('SELECT id FROM study_projects WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $projectId]);
        return (int) $stmt->fetchColumn() > 0;
    }

    private function normalizeStudyProjectName($name)
    {
        $name = trim((string) $name);
        if ($name === '') {
            throw new \InvalidArgumentException('El nombre del proyecto es obligatorio.');
        }
        $max = 80;
        if (function_exists('mb_strlen')) {
            if (mb_strlen($name, 'UTF-8') > $max) {
                throw new \InvalidArgumentException('El nombre no puede superar 80 caracteres.');
            }
        } elseif (strlen($name) > $max) {
            throw new \InvalidArgumentException('El nombre no puede superar 80 caracteres.');
        }
        return $name;
    }

    private function normalizeStudyProjectDescription($description)
    {
        $description = trim((string) $description);
        $max = 500;
        if (function_exists('mb_strlen')) {
            if (mb_strlen($description, 'UTF-8') > $max) {
                throw new \InvalidArgumentException('La descripción no puede superar 500 caracteres.');
            }
        } elseif (strlen($description) > $max) {
            throw new \InvalidArgumentException('La descripción no puede superar 500 caracteres.');
        }
        return $description;
    }

    private function normalizeStudyProjectColor($color)
    {
        $color = trim((string) $color);
        if (preg_match('/^#[0-9a-fA-F]{6}$/', $color)) {
            return strtolower($color);
        }
        return '#1d6a8f';
    }

    private function resolveFavoriteFolderId($folderId)
    {
        $folderId = max(1, (int) $folderId);
        if ($this->favoriteFolderExists($folderId)) {
            return $folderId;
        }
        return $this->ensureDefaultFavoriteFolderId();
    }

    private function favoriteFolderExists($folderId)
    {
        if (!$this->hasTable('favorite_folders')) {
            return false;
        }

        $stmt = $this->db()->prepare(
            'SELECT id
             FROM favorite_folders
             WHERE id = :id
             LIMIT 1'
        );
        $stmt->execute([':id' => (int) $folderId]);
        return (int) $stmt->fetchColumn() > 0;
    }

    private function ensureDefaultFavoriteFolderId()
    {
        if (!$this->hasTable('favorite_folders')) {
            return 1;
        }

        $id = (int) $this->db()->query(
            'SELECT id
             FROM favorite_folders
             ORDER BY CASE WHEN id = 1 THEN 0 ELSE 1 END, id ASC
             LIMIT 1'
        )->fetchColumn();

        if ($id > 0) {
            return $id;
        }

        $insert = $this->db()->prepare(
            'INSERT OR IGNORE INTO favorite_folders (id, name, created_at, updated_at)
             VALUES (1, :name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $insert->execute([':name' => 'General']);
        return 1;
    }

    private function ensureCloudSyncTable()
    {
        $this->globalDb()->exec('CREATE TABLE IF NOT EXISTS cloud_sync_backups (
            user_id INTEGER PRIMARY KEY,
            payload_json TEXT NOT NULL,
            updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
        )');
    }

    private function buildCloudSnapshot()
    {
        $tableOrder = [
            'content_modules' => 'id ASC',
            'study_projects' => 'id ASC',
            'study_project_entries' => 'id ASC',
            'favorite_folders' => 'id ASC',
            'notes' => 'id ASC',
            'links' => 'id ASC',
            'favorites' => 'id ASC',
            'highlights' => 'id ASC',
            'history' => 'id ASC',
            'passage_history' => 'id ASC',
            'devotionals' => 'id ASC',
            'user_prefs' => 'id ASC',
            'reading_plans' => 'id ASC',
            'reading_plan_progress' => 'id ASC',
            'reading_plan_chapter_progress' => 'id ASC',
            'reading_sessions' => 'id ASC',
            'theme_study_log' => 'id ASC',
        ];

        $tables = [];
        foreach ($tableOrder as $table => $orderBy) {
            $tables[$table] = $this->exportTableRows($table, $orderBy);
        }

        return [
            'version' => 1,
            'generated_at' => date('Y-m-d H:i:s'),
            'tables' => $tables,
            'counts' => $this->buildCloudCounts($tables),
        ];
    }

    private function buildCloudCounts(array $tables)
    {
        $counts = [];
        foreach ($tables as $table => $rows) {
            $counts[(string) $table] = is_array($rows) ? count($rows) : 0;
        }
        return $counts;
    }

    private function exportTableRows($table, $orderBy = 'id ASC')
    {
        $table = trim((string) $table);
        if ($table === '' || !$this->hasTable($table)) {
            return [];
        }

        $sql = 'SELECT * FROM ' . $table;
        $orderBy = trim((string) $orderBy);
        if ($orderBy !== '') {
            $sql .= ' ORDER BY ' . $orderBy;
        }

        $stmt = $this->db()->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return is_array($rows) ? $rows : [];
    }

    private function replaceTableRows($table, array $rows)
    {
        $table = trim((string) $table);
        if ($table === '' || !$this->hasTable($table)) {
            return;
        }

        $allowed = [
            'content_modules' => true,
            'study_projects' => true,
            'study_project_entries' => true,
            'favorite_folders' => true,
            'notes' => true,
            'links' => true,
            'favorites' => true,
            'highlights' => true,
            'history' => true,
            'passage_history' => true,
            'devotionals' => true,
            'user_prefs' => true,
            'reading_plans' => true,
            'reading_plan_progress' => true,
            'reading_plan_chapter_progress' => true,
            'reading_sessions' => true,
            'theme_study_log' => true,
        ];
        if (!isset($allowed[$table])) {
            return;
        }

        $this->db()->exec('DELETE FROM ' . $table);
        if (empty($rows)) {
            return;
        }

        $columns = $this->tableColumns($table);
        if (empty($columns)) {
            return;
        }

        $statementCache = [];
        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }
            $insertColumns = [];
            foreach ($columns as $column) {
                if (array_key_exists($column, $row)) {
                    $insertColumns[] = $column;
                }
            }
            if (empty($insertColumns)) {
                continue;
            }

            $signature = implode('|', $insertColumns);
            if (!isset($statementCache[$signature])) {
                $columnSql = implode(', ', $insertColumns);
                $placeholderSql = implode(', ', array_map(function ($column) {
                    return ':' . $column;
                }, $insertColumns));
                $statementCache[$signature] = $this->db()->prepare(
                    'INSERT INTO ' . $table . ' (' . $columnSql . ') VALUES (' . $placeholderSql . ')'
                );
            }

            $params = [];
            foreach ($insertColumns as $column) {
                $params[':' . $column] = $row[$column];
            }
            $statementCache[$signature]->execute($params);
        }
    }

    private function tableColumns($table)
    {
        $table = trim((string) $table);
        if ($table === '') {
            return [];
        }
        $rows = $this->db()->query("PRAGMA table_info('" . str_replace("'", "''", $table) . "')")->fetchAll(PDO::FETCH_ASSOC);
        if (!is_array($rows)) {
            return [];
        }
        $columns = [];
        foreach ($rows as $row) {
            $name = isset($row['name']) ? trim((string) $row['name']) : '';
            if ($name !== '') {
                $columns[] = $name;
            }
        }
        return $columns;
    }

    private function normalizeDateOnly($date)
    {
        $raw = trim((string) $date);
        if ($raw === '') {
            return date('Y-m-d');
        }
        $ts = strtotime($raw);
        if ($ts === false) {
            return date('Y-m-d');
        }
        return date('Y-m-d', $ts);
    }

    private function normalizeThemeKey($themeKey)
    {
        $value = trim((string) $themeKey);
        if ($value === '') {
            return '';
        }
        if (function_exists('mb_strtolower')) {
            $value = mb_strtolower($value, 'UTF-8');
        } else {
            $value = strtolower($value);
        }
        $value = strtr($value, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ñ' => 'n',
        ]);
        $value = preg_replace('/[^a-z0-9\s_\-]/u', ' ', $value);
        $value = preg_replace('/\s+/u', ' ', (string) $value);
        return trim((string) $value);
    }

    private function computeReadingStreak($minimumSeconds = 600)
    {
        $minimumSeconds = max(60, (int) $minimumSeconds);
        $stmt = $this->db()->prepare(
            'SELECT date
             FROM reading_sessions
             WHERE seconds >= :minimum
             ORDER BY date DESC
             LIMIT 600'
        );
        $stmt->execute([':minimum' => $minimumSeconds]);
        $rows = $stmt->fetchAll();
        if (empty($rows)) {
            return 0;
        }

        $set = [];
        foreach ($rows as $row) {
            $date = isset($row['date']) ? trim((string) $row['date']) : '';
            if ($date !== '') {
                $set[$date] = true;
            }
        }
        if (empty($set)) {
            return 0;
        }

        $today = $this->normalizeDateOnly(date('Y-m-d'));
        $cursor = isset($set[$today]) ? $today : $this->normalizeDateOnly(date('Y-m-d', strtotime('-1 day')));

        $streak = 0;
        while (isset($set[$cursor])) {
            $streak++;
            $cursor = $this->normalizeDateOnly(date('Y-m-d', strtotime($cursor . ' -1 day')));
        }
        return $streak;
    }

    private function computeLongestReadingStreak($minimumSeconds = 600)
    {
        $minimumSeconds = max(60, (int) $minimumSeconds);
        $stmt = $this->db()->prepare(
            'SELECT date
             FROM reading_sessions
             WHERE seconds >= :minimum
             ORDER BY date ASC'
        );
        $stmt->execute([':minimum' => $minimumSeconds]);
        $rows = $stmt->fetchAll();
        if (empty($rows)) {
            return 0;
        }

        $run = 0;
        $best = 0;
        $last = null;
        foreach ($rows as $row) {
            $date = isset($row['date']) ? trim((string) $row['date']) : '';
            if ($date === '') {
                continue;
            }
            if ($last !== null) {
                $expected = $this->normalizeDateOnly(date('Y-m-d', strtotime($last . ' +1 day')));
                if ($date === $expected) {
                    $run++;
                } else {
                    $run = 1;
                }
            } else {
                $run = 1;
            }
            if ($run > $best) {
                $best = $run;
            }
            $last = $date;
        }

        return $best;
    }

    private function hasTable($table)
    {
        $stmt = $this->db()->prepare(
            "SELECT name FROM sqlite_master WHERE type = 'table' AND name = :table LIMIT 1"
        );
        $stmt->execute([':table' => trim((string) $table)]);
        return (bool) $stmt->fetchColumn();
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

    private function isVirtualFtsIndex()
    {
        $stmt = $this->globalDb()->query("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = 'fts_index' LIMIT 1");
        $sql = (string) $stmt->fetchColumn();
        $normalized = strtoupper($sql);
        return strpos($normalized, 'VIRTUAL TABLE') !== false && strpos($normalized, 'FTS5') !== false;
    }

    private function tokenizeSearchTerms($query)
    {
        $query = trim((string) $query);
        if ($query === '') {
            return [];
        }
        if (!preg_match_all('/[\p{L}\p{N}]+(?:[\'’][\p{L}\p{N}]+)*/u', $query, $m)) {
            return [];
        }
        return isset($m[0]) && is_array($m[0]) ? $m[0] : [];
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

    private function hasColumn($table, $column)
    {
        if (!isset($this->columnCache[$table])) {
            $rows = $this->db()->query("PRAGMA table_info('" . str_replace("'", "''", $table) . "')")->fetchAll(PDO::FETCH_ASSOC);
            $set = [];
            foreach ($rows as $row) {
                $set[$row['name']] = true;
            }
            $this->columnCache[$table] = $set;
        }
        return isset($this->columnCache[$table][$column]);
    }

    private function db()
    {
        if (!$this->pdo instanceof PDO) {
            $this->pdo = ConnectionFactory::sqlite($this->appDbPath);
        }
        return $this->pdo;
    }

    private function globalDb()
    {
        if (!$this->globalPdo instanceof PDO) {
            $this->globalPdo = ConnectionFactory::sqlite($this->globalDbPath);
        }
        return $this->globalPdo;
    }
}
