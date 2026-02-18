<?php

$envPath = dirname(__DIR__) . '/.env';
if (is_file($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || strpos($trimmed, '#') === 0 || strpos($trimmed, '=') === false) {
            continue;
        }
        list($key, $value) = explode('=', $trimmed, 2);
        $key = trim($key);
        $value = trim($value);
        if ($value !== '' && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
            $value = substr($value, 1, -1);
        }
        if ($key !== '' && getenv($key) === false) {
            putenv($key . '=' . $value);
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

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
        echo json_encode($payload, JSON_UNESCAPED_UNICODE);
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
