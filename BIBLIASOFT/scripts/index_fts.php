<?php

require_once __DIR__ . '/../app/bootstrap.php';

use App\Database\ConnectionFactory;

$appDbPath = config('paths.app_db');
$sourceDbPath = config('paths.bible');

if (!is_file($sourceDbPath)) {
    fwrite(STDERR, "No existe la BD fuente: {$sourceDbPath}" . PHP_EOL);
    exit(1);
}

$app = ConnectionFactory::sqlite($appDbPath);
$source = ConnectionFactory::sqlite($sourceDbPath);

$mode = 'fts5';
$app->exec('DROP TABLE IF EXISTS fts_index');

try {
    $app->exec("CREATE VIRTUAL TABLE IF NOT EXISTS fts_index USING fts5(
        book UNINDEXED,
        chapter UNINDEXED,
        verse UNINDEXED,
        title,
        scripture,
        tokenize = 'unicode61 remove_diacritics 2'
    )");
} catch (Throwable $e) {
    $mode = 'fallback';
    $app->exec('CREATE TABLE IF NOT EXISTS fts_index (
        book INTEGER NOT NULL,
        chapter INTEGER NOT NULL,
        verse INTEGER NOT NULL,
        title TEXT,
        scripture TEXT NOT NULL
    )');
    $app->exec('CREATE INDEX IF NOT EXISTS idx_fts_index_ref ON fts_index (book, chapter, verse)');
}

$select = $source->query('SELECT Book, Chapter, Verse, Scripture FROM Bible ORDER BY Book, Chapter, Verse');
$insert = $app->prepare('INSERT INTO fts_index (book, chapter, verse, title, scripture) VALUES (:book, :chapter, :verse, :title, :scripture)');

$count = 0;
$app->beginTransaction();
foreach ($select as $row) {
    $title = '';
    if (preg_match('/<p[^>]*align=["\']center["\'][^>]*>(.*?)<\/p>/is', (string) $row['Scripture'], $m)) {
        $title = trim(html_entity_decode(strip_tags($m[1]), ENT_QUOTES, 'UTF-8'));
    }
    $plain = trim(html_entity_decode(strip_tags((string) $row['Scripture']), ENT_QUOTES, 'UTF-8'));
    $insert->execute([
        ':book' => (int) $row['Book'],
        ':chapter' => (int) $row['Chapter'],
        ':verse' => (int) $row['Verse'],
        ':title' => $title,
        ':scripture' => $plain,
    ]);
    $count++;
}
$app->commit();

echo "Indexado completado. Registros: {$count}. Modo: {$mode}" . PHP_EOL;
