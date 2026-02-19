<?php

namespace App\Database;

class SchemaManager
{
    public static function ensure(array $config)
    {
        $appDbPath = $config['paths']['app_db'];
        $storageDir = dirname($appDbPath);

        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }

        if (!is_file($appDbPath)) {
            touch($appDbPath);
        }

        $schemaSqlPath = __DIR__ . '/schema.sql';
        if (!is_file($schemaSqlPath)) {
            throw new \RuntimeException('No se encontró schema.sql de la app.');
        }

        $sql = file_get_contents($schemaSqlPath);
        $pdo = ConnectionFactory::sqlite($appDbPath);
        $pdo->exec($sql);
        self::migrate($pdo);
    }

    private static function migrate(\PDO $pdo)
    {
        self::migrateNotes($pdo);
        self::migrateLinks($pdo);
        self::migrateAiCache($pdo);
        self::migrateDailyCache($pdo);
        self::migrateDevotionals($pdo);
        self::migrateUserPrefs($pdo);
        self::migrateFavorites($pdo);
        self::migrateHistory($pdo);
        self::migrateHighlights($pdo);
        self::migrateReadingPlans($pdo);
        self::migrateAnecdotes($pdo);
        self::migrateAnecdoteFavorites($pdo);
    }

    private static function migrateFavorites(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'favorite_folders')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS favorite_folders (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL UNIQUE,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $folderColumns = self::columns($pdo, 'favorite_folders');
            if (!isset($folderColumns['created_at'])) {
                $pdo->exec("ALTER TABLE favorite_folders ADD COLUMN created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
            if (!isset($folderColumns['updated_at'])) {
                $pdo->exec("ALTER TABLE favorite_folders ADD COLUMN updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
        }

        $seedDefaultFolder = $pdo->prepare(
            'INSERT OR IGNORE INTO favorite_folders (id, name, created_at, updated_at)
             VALUES (:id, :name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $seedDefaultFolder->execute([
            ':id' => 1,
            ':name' => 'General',
        ]);

        $seedFolderByName = $pdo->prepare(
            'INSERT OR IGNORE INTO favorite_folders (name, created_at, updated_at)
             VALUES (:name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        foreach (['Fe', 'Familia', 'Predicacion', 'Oracion', 'Promesas'] as $folderName) {
            $seedFolderByName->execute([':name' => $folderName]);
        }

        if (!self::tableExists($pdo, 'favorites')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS favorites (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                folder_id INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse)
            )');
        } else {
            $favoriteColumns = self::columns($pdo, 'favorites');
            if (!isset($favoriteColumns['folder_id'])) {
                $pdo->exec('ALTER TABLE favorites ADD COLUMN folder_id INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($favoriteColumns['created_at'])) {
                $pdo->exec("ALTER TABLE favorites ADD COLUMN created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
        }

        $pdo->exec('UPDATE favorites SET folder_id = COALESCE(NULLIF(folder_id, 0), 1)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_favorites_folder ON favorites (folder_id, book, chapter, verse)');
    }

    private static function migrateNotes(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'notes')) {
            return;
        }

        $columns = self::columns($pdo, 'notes');
        if (!isset($columns['verse_start'])) {
            $pdo->exec('ALTER TABLE notes ADD COLUMN verse_start INTEGER');
        }
        if (!isset($columns['verse_end'])) {
            $pdo->exec('ALTER TABLE notes ADD COLUMN verse_end INTEGER');
        }
        if (!isset($columns['tags'])) {
            $pdo->exec("ALTER TABLE notes ADD COLUMN tags TEXT DEFAULT ''");
        }
        if (isset($columns['verse'])) {
            $pdo->exec('UPDATE notes SET verse_start = COALESCE(verse_start, verse), verse_end = COALESCE(verse_end, verse)');
        }
        $pdo->exec('UPDATE notes SET verse_start = COALESCE(verse_start, 1), verse_end = COALESCE(verse_end, verse_start), tags = COALESCE(tags, \'\')');
    }

    private static function migrateLinks(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'links')) {
            return;
        }

        $columns = self::columns($pdo, 'links');
        if (!isset($columns['from_verse_start'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN from_verse_start INTEGER');
        }
        if (!isset($columns['from_verse_end'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN from_verse_end INTEGER');
        }
        if (!isset($columns['to_verse_start'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN to_verse_start INTEGER');
        }
        if (!isset($columns['to_verse_end'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN to_verse_end INTEGER');
        }

        if (isset($columns['from_verse'])) {
            $pdo->exec('UPDATE links SET from_verse_start = COALESCE(from_verse_start, from_verse), from_verse_end = COALESCE(from_verse_end, from_verse)');
        }
        if (isset($columns['to_verse'])) {
            $pdo->exec('UPDATE links SET to_verse_start = COALESCE(to_verse_start, to_verse), to_verse_end = COALESCE(to_verse_end, to_verse)');
        }

        $pdo->exec('UPDATE links SET from_verse_start = COALESCE(from_verse_start, 1), from_verse_end = COALESCE(from_verse_end, from_verse_start), to_verse_start = COALESCE(to_verse_start, 1), to_verse_end = COALESCE(to_verse_end, to_verse_start)');
    }

    private static function migrateAiCache(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'ai_cache')) {
            return;
        }

        $columns = self::columns($pdo, 'ai_cache');
        if (!isset($columns['verse_start']) && isset($columns['verse'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN verse_start INTEGER');
            $pdo->exec('UPDATE ai_cache SET verse_start = verse WHERE verse_start IS NULL');
        }
        if (!isset($columns['verse_end']) && isset($columns['verse'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN verse_end INTEGER');
            $pdo->exec('UPDATE ai_cache SET verse_end = verse WHERE verse_end IS NULL');
        }
        if (!isset($columns['mode'])) {
            $pdo->exec("ALTER TABLE ai_cache ADD COLUMN mode TEXT DEFAULT 'resumen'");
        }
        if (!isset($columns['prompt_hash'])) {
            $pdo->exec("ALTER TABLE ai_cache ADD COLUMN prompt_hash TEXT DEFAULT ''");
        }
        if (!isset($columns['response'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN response TEXT');
        }

        $pdo->exec('UPDATE ai_cache SET verse_start = COALESCE(verse_start, verse, 1), verse_end = COALESCE(verse_end, verse_start, 1)');
        $pdo->exec("UPDATE ai_cache SET mode = COALESCE(mode, 'resumen'), prompt_hash = COALESCE(prompt_hash, '')");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_ai_cache_legacy_unique ON ai_cache(book, chapter, verse, context_hash)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_ai_cache_generation ON ai_cache(book, chapter, verse_start, verse_end, mode)');
    }

    private static function migrateDailyCache(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'daily_cache')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS daily_cache (
                date TEXT PRIMARY KEY,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                image_path TEXT DEFAULT \'\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            return;
        }

        $columns = self::columns($pdo, 'daily_cache');
        if (!isset($columns['image_path'])) {
            $pdo->exec("ALTER TABLE daily_cache ADD COLUMN image_path TEXT DEFAULT ''");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE daily_cache ADD COLUMN created_at TEXT DEFAULT CURRENT_TIMESTAMP");
        }
    }

    private static function migrateDevotionals(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'devotionals')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS devotionals (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                content_json TEXT NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_devotionals_date ON devotionals(date)');
            return;
        }

        $columns = self::columns($pdo, 'devotionals');
        if (!isset($columns['content_json']) && isset($columns['content'])) {
            $pdo->exec('ALTER TABLE devotionals ADD COLUMN content_json TEXT');
            $pdo->exec('UPDATE devotionals SET content_json = content WHERE content_json IS NULL');
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE devotionals ADD COLUMN created_at TEXT DEFAULT CURRENT_TIMESTAMP");
        }
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_devotionals_date ON devotionals(date)');
    }

    private static function migrateUserPrefs(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'user_prefs')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS user_prefs (
                id INTEGER PRIMARY KEY CHECK (id = 1),
                font_scale INTEGER NOT NULL DEFAULT 100,
                show_daily INTEGER NOT NULL DEFAULT 1,
                auto_devotional INTEGER NOT NULL DEFAULT 0,
                weekly_goal_days INTEGER NOT NULL DEFAULT 5,
                theme TEXT NOT NULL DEFAULT \'light\',
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        }

        $columns = self::columns($pdo, 'user_prefs');
        if (!isset($columns['font_scale'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN font_scale INTEGER NOT NULL DEFAULT 100');
        }
        if (!isset($columns['show_daily'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN show_daily INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($columns['auto_devotional'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN auto_devotional INTEGER NOT NULL DEFAULT 0');
        }
        if (!isset($columns['weekly_goal_days'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN weekly_goal_days INTEGER NOT NULL DEFAULT 5');
        }
        if (!isset($columns['reminder_enabled'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN reminder_enabled INTEGER NOT NULL DEFAULT 0');
        }
        if (!isset($columns['reminder_time'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN reminder_time TEXT NOT NULL DEFAULT '07:00'");
        }
        if (!isset($columns['theme'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN theme TEXT NOT NULL DEFAULT 'light'");
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }

        $pdo->exec("INSERT OR IGNORE INTO user_prefs (id, font_scale, show_daily, auto_devotional, weekly_goal_days, reminder_enabled, reminder_time, theme, updated_at) VALUES (1, 100, 1, 0, 5, 0, '07:00', 'light', CURRENT_TIMESTAMP)");
    }

    private static function migrateHighlights(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'highlights')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS highlights (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                color TEXT NOT NULL DEFAULT \'yellow\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse)
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_highlights_ref ON highlights(book, chapter, verse)');
            return;
        }

        $columns = self::columns($pdo, 'highlights');
        if (!isset($columns['color'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN color TEXT NOT NULL DEFAULT 'yellow'");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }
        $pdo->exec("UPDATE highlights SET color = COALESCE(NULLIF(color, ''), 'yellow')");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_highlights_ref ON highlights(book, chapter, verse)');
    }

    private static function migrateHistory(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'history')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS history (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                visited_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $historyColumns = self::columns($pdo, 'history');
            if (!isset($historyColumns['visited_at'])) {
                $pdo->exec("ALTER TABLE history ADD COLUMN visited_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
        }
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_history_recent ON history (id DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_history_ref ON history (book, chapter, visited_at)');

        if (!self::tableExists($pdo, 'passage_history')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS passage_history (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse_start INTEGER NOT NULL,
                verse_end INTEGER NOT NULL,
                hits INTEGER NOT NULL DEFAULT 1,
                last_viewed TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse_start, verse_end)
            )');
        } else {
            $passageColumns = self::columns($pdo, 'passage_history');
            if (!isset($passageColumns['hits'])) {
                $pdo->exec('ALTER TABLE passage_history ADD COLUMN hits INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($passageColumns['last_viewed'])) {
                $pdo->exec("ALTER TABLE passage_history ADD COLUMN last_viewed TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
            }
        }
        $pdo->exec('UPDATE passage_history SET hits = CASE WHEN hits < 1 THEN 1 ELSE hits END');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_passage_history_hits ON passage_history (hits DESC, last_viewed DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_passage_history_recent ON passage_history (last_viewed DESC)');
    }

    private static function migrateReadingPlans(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'reading_plans')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plans (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                total_days INTEGER NOT NULL,
                start_date TEXT NOT NULL,
                active INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        }

        $planColumns = self::columns($pdo, 'reading_plans');
        if (!isset($planColumns['name'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN name TEXT NOT NULL DEFAULT 'Plan de lectura'");
        }
        if (!isset($planColumns['total_days'])) {
            $pdo->exec('ALTER TABLE reading_plans ADD COLUMN total_days INTEGER NOT NULL DEFAULT 90');
        }
        if (!isset($planColumns['start_date'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN start_date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($planColumns['active'])) {
            $pdo->exec('ALTER TABLE reading_plans ADD COLUMN active INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($planColumns['created_at'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }
        if (!isset($planColumns['updated_at'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }

        if (!self::tableExists($pdo, 'reading_plan_progress')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plan_progress (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                plan_id INTEGER NOT NULL,
                day_index INTEGER NOT NULL,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(plan_id, day_index)
            )');
        }

        $progressColumns = self::columns($pdo, 'reading_plan_progress');
        if (!isset($progressColumns['date'])) {
            $pdo->exec("ALTER TABLE reading_plan_progress ADD COLUMN date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($progressColumns['book'])) {
            $pdo->exec('ALTER TABLE reading_plan_progress ADD COLUMN book INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($progressColumns['chapter'])) {
            $pdo->exec('ALTER TABLE reading_plan_progress ADD COLUMN chapter INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($progressColumns['completed_at'])) {
            $pdo->exec("ALTER TABLE reading_plan_progress ADD COLUMN completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }

        if (!self::tableExists($pdo, 'reading_plan_chapter_progress')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plan_chapter_progress (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                plan_id INTEGER NOT NULL,
                day_index INTEGER NOT NULL,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(plan_id, day_index, book, chapter)
            )');
        }

        $chapterProgressColumns = self::columns($pdo, 'reading_plan_chapter_progress');
        if (!isset($chapterProgressColumns['date'])) {
            $pdo->exec("ALTER TABLE reading_plan_chapter_progress ADD COLUMN date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($chapterProgressColumns['book'])) {
            $pdo->exec('ALTER TABLE reading_plan_chapter_progress ADD COLUMN book INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($chapterProgressColumns['chapter'])) {
            $pdo->exec('ALTER TABLE reading_plan_chapter_progress ADD COLUMN chapter INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($chapterProgressColumns['completed_at'])) {
            $pdo->exec("ALTER TABLE reading_plan_chapter_progress ADD COLUMN completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }

        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_plans_active ON reading_plans(active, updated_at)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_progress_plan ON reading_plan_progress(plan_id, day_index)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_chapter_progress_plan_day ON reading_plan_chapter_progress(plan_id, day_index)');
    }

    private static function migrateAnecdotes(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'anecdotes')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS anecdotes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                topic TEXT NOT NULL,
                title TEXT NOT NULL,
                content TEXT NOT NULL,
                idea_central TEXT NOT NULL DEFAULT \'\',
                application TEXT NOT NULL DEFAULT \'\',
                source TEXT NOT NULL DEFAULT \'seed\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_anecdotes_topic ON anecdotes(topic)');
            return;
        }

        $columns = self::columns($pdo, 'anecdotes');
        if (!isset($columns['idea_central'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN idea_central TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['application'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN application TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['source'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN source TEXT NOT NULL DEFAULT 'seed'");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_anecdotes_topic ON anecdotes(topic)');
    }

    private static function migrateAnecdoteFavorites(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'anecdote_favorites')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS anecdote_favorites (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                anecdote_id INTEGER NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(user_id, anecdote_id)
            )');
        }
    }

    private static function tableExists(\PDO $pdo, $table)
    {
        $stmt = $pdo->prepare("SELECT name FROM sqlite_master WHERE type='table' AND name=:table LIMIT 1");
        $stmt->execute([':table' => $table]);
        return (bool) $stmt->fetchColumn();
    }

    private static function columns(\PDO $pdo, $table)
    {
        $rows = $pdo->query("PRAGMA table_info('" . str_replace("'", "''", $table) . "')")->fetchAll(\PDO::FETCH_ASSOC);
        $map = [];
        foreach ($rows as $row) {
            $map[$row['name']] = true;
        }
        return $map;
    }
}
