<?php

$config = require __DIR__ . '/../config/app.php';
$config['branding'] = require __DIR__ . '/../config/branding.php';
$GLOBALS['app_config'] = $config;

date_default_timezone_set($config['app']['timezone']);

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
