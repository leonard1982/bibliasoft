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

try {
    $app->exec("CREATE VIRTUAL TABLE IF NOT EXISTS fts_index USING fts5(
        book UNINDEXED,
        chapter UNINDEXED,
        verse UNINDEXED,
        scripture,
        tokenize = 'unicode61 remove_diacritics 2'
    )");
} catch (Throwable $e) {
    $mode = 'fallback';
    $app->exec('CREATE TABLE IF NOT EXISTS fts_index (
        book INTEGER NOT NULL,
        chapter INTEGER NOT NULL,
        verse INTEGER NOT NULL,
        scripture TEXT NOT NULL
    )');
    $app->exec('CREATE INDEX IF NOT EXISTS idx_fts_index_ref ON fts_index (book, chapter, verse)');
}

$app->exec('DELETE FROM fts_index');

$select = $source->query('SELECT Book, Chapter, Verse, Scripture FROM Bible ORDER BY Book, Chapter, Verse');
$insert = $app->prepare('INSERT INTO fts_index (book, chapter, verse, scripture) VALUES (:book, :chapter, :verse, :scripture)');

$count = 0;
$app->beginTransaction();
foreach ($select as $row) {
    $plain = trim(html_entity_decode(strip_tags((string) $row['Scripture']), ENT_QUOTES, 'UTF-8'));
    $insert->execute([
        ':book' => (int) $row['Book'],
        ':chapter' => (int) $row['Chapter'],
        ':verse' => (int) $row['Verse'],
        ':scripture' => $plain,
    ]);
    $count++;
}
$app->commit();

echo "Indexado completado. Registros: {$count}. Modo: {$mode}" . PHP_EOL;
