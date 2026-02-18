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
    }
}
