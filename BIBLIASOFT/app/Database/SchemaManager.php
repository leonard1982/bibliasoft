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
