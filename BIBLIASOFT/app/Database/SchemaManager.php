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
        self::migrateAnecdotes($pdo);
        self::migrateAnecdoteFavorites($pdo);
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
        if (!isset($columns['theme'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN theme TEXT NOT NULL DEFAULT 'light'");
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP");
        }

        $pdo->exec("INSERT OR IGNORE INTO user_prefs (id, font_scale, show_daily, auto_devotional, theme, updated_at) VALUES (1, 100, 1, 0, 'light', CURRENT_TIMESTAMP)");
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
