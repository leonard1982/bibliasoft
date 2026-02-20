<?php

namespace App\Support;

use App\Database\SchemaManager;

class UserDataScope
{
    private const GUEST_COOKIE = 'bsoft_guest_id';

    public static function resolve(array $config)
    {
        $globalDbPath = trim((string) ($config['paths']['app_db'] ?? ''));
        if ($globalDbPath === '') {
            throw new \RuntimeException('No se pudo resolver la base de datos principal.');
        }

        $profilesDir = dirname($globalDbPath) . DIRECTORY_SEPARATOR . 'profiles';
        if (!is_dir($profilesDir)) {
            mkdir($profilesDir, 0777, true);
        }

        $userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
        if ($userId > 0) {
            $scopeKey = 'user_' . $userId;
            $_SESSION['data_scope'] = $scopeKey;
            return [
                'is_guest' => false,
                'scope_key' => $scopeKey,
                'user_id' => $userId,
                'guest_id' => '',
                'global_db' => $globalDbPath,
                'personal_db' => $profilesDir . DIRECTORY_SEPARATOR . $scopeKey . '.sqlite',
            ];
        }

        $guestId = self::resolveGuestId();
        $scopeKey = 'guest_' . $guestId;
        $_SESSION['data_scope'] = $scopeKey;
        $_SESSION['guest_id'] = $guestId;

        return [
            'is_guest' => true,
            'scope_key' => $scopeKey,
            'user_id' => 0,
            'guest_id' => $guestId,
            'global_db' => $globalDbPath,
            'personal_db' => $profilesDir . DIRECTORY_SEPARATOR . $scopeKey . '.sqlite',
        ];
    }

    public static function ensurePersonalSchema(array $config, $personalDbPath)
    {
        $personalDbPath = trim((string) $personalDbPath);
        if ($personalDbPath === '') {
            return;
        }

        $scopedConfig = $config;
        if (!isset($scopedConfig['paths']) || !is_array($scopedConfig['paths'])) {
            $scopedConfig['paths'] = [];
        }
        $scopedConfig['paths']['app_db'] = $personalDbPath;

        SchemaManager::ensure($scopedConfig);
    }

    private static function resolveGuestId()
    {
        $guestId = isset($_COOKIE[self::GUEST_COOKIE]) ? strtolower(trim((string) $_COOKIE[self::GUEST_COOKIE])) : '';
        if (!preg_match('/^[a-f0-9]{32}$/', $guestId)) {
            try {
                $guestId = bin2hex(random_bytes(16));
            } catch (\Throwable $e) {
                $guestId = substr(sha1(uniqid('guest', true)), 0, 32);
            }
        }

        if (PHP_SAPI !== 'cli') {
            $currentCookie = isset($_COOKIE[self::GUEST_COOKIE]) ? (string) $_COOKIE[self::GUEST_COOKIE] : '';
            if ($currentCookie !== $guestId) {
                $isHttps = (
                    (!empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off')
                    || ((string) ($_SERVER['SERVER_PORT'] ?? '') === '443')
                );
                setcookie(self::GUEST_COOKIE, $guestId, [
                    'expires' => time() + (86400 * 365 * 5),
                    'path' => '/',
                    'secure' => $isHttps,
                    'httponly' => true,
                    'samesite' => 'Lax',
                ]);
                $_COOKIE[self::GUEST_COOKIE] = $guestId;
            }
        }

        return $guestId;
    }
}
