<?php

if (!function_exists('app_load_env_file')) {
    function app_load_env_file($path, $override = false)
    {
        $path = trim((string) $path);
        if ($path === '' || !is_file($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $trimmed = trim((string) $line);
            if ($trimmed === '' || strpos($trimmed, '#') === 0 || strpos($trimmed, '=') === false) {
                continue;
            }

            list($key, $value) = explode('=', $trimmed, 2);
            $key = trim((string) $key);
            $value = trim((string) $value);
            if ($value !== '' && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
                $value = substr($value, 1, -1);
            }

            if ($key === '') {
                continue;
            }

            if ($override || getenv($key) === false) {
                putenv($key . '=' . $value);
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }
}

$envPath = dirname(__DIR__) . '/.env';
$envLocalPath = dirname(__DIR__) . '/.env.local';
app_load_env_file($envPath, false);
app_load_env_file($envLocalPath, true);

$config = require __DIR__ . '/../config/app.php';
$config['branding'] = require __DIR__ . '/../config/branding.php';
$sourcesConfigPath = __DIR__ . '/../config/sources.php';
if (is_file($sourcesConfigPath)) {
    $config['sources'] = require $sourcesConfigPath;
}
$GLOBALS['app_config'] = $config;

date_default_timezone_set($config['app']['timezone']);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    if (strpos($class, $prefix) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = __DIR__ . '/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($file)) {
        require_once $file;
    }
});

\App\Database\SchemaManager::ensure($config);

if (!function_exists('config')) {
    function config($key = null, $default = null)
    {
        $all = isset($GLOBALS['app_config']) ? $GLOBALS['app_config'] : [];
        if ($key === null) {
            return $all;
        }

        $segments = explode('.', $key);
        $value = $all;
        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }
        return $value;
    }
}

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('app_render')) {
    function app_render($template, array $data = [])
    {
        \App\Support\View::render($template, $data);
    }
}

if (!function_exists('app_json')) {
    function app_json(array $payload, $status = 200)
    {
        http_response_code((int) $status);
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
        if ($json === false) {
            http_response_code(500);
            $json = '{"error":"No se pudo serializar la respuesta JSON."}';
        }
        echo $json;
        exit;
    }
}

if (!function_exists('app_redirect')) {
    function app_redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}

if (!function_exists('auth_user_id')) {
    function auth_user_id()
    {
        return isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 0;
    }
}

if (!function_exists('auth_username')) {
    function auth_username()
    {
        return isset($_SESSION['username']) ? (string) $_SESSION['username'] : '';
    }
}

if (!function_exists('app_asset')) {
    function app_asset($path)
    {
        $raw = trim((string) $path);
        if ($raw === '') {
            return '';
        }

        $queryPos = strpos($raw, '?');
        $assetPath = $queryPos === false ? $raw : substr($raw, 0, $queryPos);
        $assetPath = ltrim($assetPath, '/\\');
        if ($assetPath === '') {
            return $raw;
        }

        $publicDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public';
        $filePath = $publicDir . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $assetPath);
        if (!is_file($filePath)) {
            return $raw;
        }

        $separator = $queryPos === false ? '?' : '&';
        return $raw . $separator . 'v=' . (string) filemtime($filePath);
    }
}

if (!function_exists('app_json_safe')) {
    function app_json_safe($value)
    {
        $flags = JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE;
        $json = json_encode($value, $flags);
        if ($json !== false) {
            return $json;
        }

        if (is_array($value)) {
            if (function_exists('array_is_list') ? array_is_list($value) : array_keys($value) === range(0, count($value) - 1)) {
                return '[]';
            }
            return '{}';
        }
        if (is_object($value)) {
            return '{}';
        }
        if (is_string($value)) {
            return '""';
        }
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if (is_int($value) || is_float($value)) {
            return (string) $value;
        }
        return 'null';
    }
}
