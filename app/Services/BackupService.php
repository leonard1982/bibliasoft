<?php

namespace App\Services;

use App\Database\ConnectionFactory;

class BackupService
{
    private $repository;
    private $appDbPath;
    private $backupsDir;

    public function __construct(UserDataRepository $repository, $appDbPath, $backupsDir = '')
    {
        $this->repository = $repository;
        $this->appDbPath = trim((string) $appDbPath);
        $basePath = (string) config('app.base_path', dirname(__DIR__, 2));
        $this->backupsDir = trim((string) $backupsDir) !== ''
            ? trim((string) $backupsDir)
            : $basePath . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'backups';
    }

    public function ensureDailyBackup($triggerType = 'login', $userId = 0, $email = '')
    {
        $today = date('Y-m-d');
        $existing = $this->repository->getLatestSystemBackupForDate($today);
        if (is_array($existing) && !empty($existing['file_path']) && is_file((string) $existing['file_path'])) {
            return $existing;
        }

        return $this->createBackup($triggerType, $userId, $email);
    }

    public function createBackup($triggerType = 'manual', $userId = 0, $email = '')
    {
        if ($this->appDbPath === '' || !is_file($this->appDbPath)) {
            throw new \RuntimeException('No se encontró la base de datos de la aplicación para respaldar.');
        }

        $dayDir = $this->backupsDir . DIRECTORY_SEPARATOR . date('Y-m');
        if (!is_dir($dayDir)) {
            mkdir($dayDir, 0777, true);
        }

        $fileName = 'bibliasoft-app-' . date('Y-m-d-His') . '.sqlite';
        $targetPath = $dayDir . DIRECTORY_SEPARATOR . $fileName;

        $created = $this->backupSqliteDatabase($targetPath);
        if (!$created || !is_file($targetPath)) {
            throw new \RuntimeException('No se pudo generar el backup de la base de datos.');
        }

        $checksum = function_exists('hash_file') ? (string) hash_file('sha256', $targetPath) : '';
        $id = $this->repository->createSystemBackupRecord([
            'backup_date' => date('Y-m-d'),
            'file_name' => $fileName,
            'file_path' => $targetPath,
            'size_bytes' => (int) filesize($targetPath),
            'checksum' => $checksum,
            'trigger_type' => trim((string) $triggerType) !== '' ? trim((string) $triggerType) : 'manual',
            'triggered_by_user_id' => (int) $userId,
            'triggered_by_email' => trim((string) $email),
        ]);

        return $this->repository->getSystemBackupById($id);
    }

    private function backupSqliteDatabase($targetPath)
    {
        $quotedTarget = str_replace("'", "''", (string) $targetPath);

        try {
            $pdo = ConnectionFactory::sqlite($this->appDbPath);
            $pdo->exec("VACUUM INTO '" . $quotedTarget . "'");
            return true;
        } catch (\Throwable $e) {
            return @copy($this->appDbPath, $targetPath);
        }
    }
}
