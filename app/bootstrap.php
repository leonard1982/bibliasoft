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

if (!function_exists('app_route_url')) {
    function app_route_url($route, array $params = [])
    {
        $query = array_merge(['route' => trim((string) $route)], $params);
        foreach ($query as $key => $value) {
            if ($value === null) {
                unset($query[$key]);
                continue;
            }
            if (is_string($value) && trim($value) === '') {
                unset($query[$key]);
            }
        }

        return '?' . http_build_query($query);
    }
}

if (!function_exists('app_current_relative_url')) {
    function app_current_relative_url()
    {
        $query = $_GET;
        if (!isset($query['route']) || trim((string) $query['route']) === '') {
            $query['route'] = 'home_daily';
        }

        return '?' . http_build_query($query);
    }
}

if (!function_exists('feature_access_catalog')) {
    function feature_access_catalog()
    {
        static $catalog = null;
        if ($catalog !== null) {
            return $catalog;
        }

        $sharedBenefits = [
            'Desbloquea gratis todas las funciones avanzadas de estudio, seguimiento y organización.',
            'Recibe avisos de nuevos recursos bíblicos y de eventos online o presenciales en tu ciudad.',
            'Tu registro ayuda a seguir impulsando el estudio de la Biblia y a llegar a más lugares con el evangelio.',
        ];

        $catalog = [
            'advanced_tools' => [
                'badge' => 'Acceso gratuito con registro',
                'title' => 'Activa tus herramientas avanzadas de lectura',
                'lead' => 'La lectura bíblica sigue abierta para todos. Para usar notas, vínculos, proyectos, subrayados, respaldo y demás ayudas personales, crea tu cuenta gratis o inicia sesión.',
                'error' => 'Inicia sesión o regístrate gratis para usar esta herramienta.',
                'feature_items' => [
                    'Centro de estudio con proyectos y materiales guardados.',
                    'Notas, vínculos, subrayados y respaldo por cuenta.',
                    'Devocionales, anécdotas y recursos personalizados.',
                    'Notificaciones de nuevos recursos y eventos.',
                ],
                'benefits' => $sharedBenefits,
                'primary_cta' => 'Crear cuenta gratis',
                'secondary_cta' => 'Ya tengo cuenta',
            ],
            'study_center' => [
                'badge' => 'Centro de estudio',
                'title' => 'Entra a tu centro de estudio personal',
                'lead' => 'Aquí podrás organizar proyectos, guardar comentarios, términos Strong, notas de pasaje y materiales listos para enseñar. El acceso es gratuito con registro.',
                'error' => 'Regístrate o inicia sesión para usar el Centro de estudio.',
                'feature_items' => [
                    'Proyectos de estudio por tema, serie o predicación.',
                    'Guardado de notas, comentarios y términos clave.',
                    'Organización del trabajo bíblico por pasaje y referencia.',
                ],
                'benefits' => $sharedBenefits,
                'primary_cta' => 'Crear mi cuenta gratis',
                'secondary_cta' => 'Ingresar',
            ],
            'devotional' => [
                'badge' => 'Devocionales y recursos',
                'title' => 'Recibe devocionales y recursos personalizados',
                'lead' => 'Al iniciar sesión podrás guardar tu historial devocional, recibir nuevos recursos y mantener una experiencia personal de lectura y aplicación sin costo.',
                'error' => 'Regístrate o inicia sesión para abrir Devocionales.',
                'feature_items' => [
                    'Historial devocional por cuenta.',
                    'Aplicaciones prácticas y recursos nuevos.',
                    'Avisos de eventos online y presenciales.',
                ],
                'benefits' => $sharedBenefits,
                'primary_cta' => 'Quiero registrarme gratis',
                'secondary_cta' => 'Ya tengo acceso',
            ],
            'anecdotes' => [
                'badge' => 'Anécdotas y apoyo a enseñanza',
                'title' => 'Abre las anécdotas y ayudas de predicación',
                'lead' => 'Las anécdotas, apoyos para enseñanza y recursos complementarios requieren una cuenta gratuita para mantener tu historial y seguir fortaleciendo la expansión del estudio bíblico.',
                'error' => 'Regístrate o inicia sesión para abrir Anécdotas.',
                'feature_items' => [
                    'Anécdotas listas para predicar y enseñar.',
                    'Favoritos y seguimiento por cuenta.',
                    'Nuevos recursos y avisos ministeriales.',
                ],
                'benefits' => $sharedBenefits,
                'primary_cta' => 'Crear cuenta gratis',
                'secondary_cta' => 'Ingresar ahora',
            ],
        ];

        return $catalog;
    }
}

if (!function_exists('feature_access_payload')) {
    function feature_access_payload($featureKey = 'advanced_tools', $nextUrl = '')
    {
        $catalog = feature_access_catalog();
        $featureKey = trim((string) $featureKey);
        if ($featureKey === '' || !isset($catalog[$featureKey])) {
            $featureKey = 'advanced_tools';
        }

        $payload = $catalog[$featureKey];
        $nextUrl = trim((string) $nextUrl);

        $payload['key'] = $featureKey;
        $payload['next'] = $nextUrl;
        $payload['login_url'] = app_route_url('login', $nextUrl !== '' ? ['next' => $nextUrl] : []);
        $payload['register_url'] = app_route_url('register', $nextUrl !== '' ? ['next' => $nextUrl] : []);
        $payload['reader_url'] = app_route_url('reader', ['skip_daily' => 1]);
        $payload['website_url'] = (string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co');
        $payload['church_name'] = (string) config('branding.church_name', 'Fundación La Iglesia en la Calle');
        $payload['app_name'] = (string) config('branding.app_name', 'Biblia para todos');
        $payload['app_short'] = (string) config('branding.app_short', 'BIBLIASOFT');

        return $payload;
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

if (!function_exists('auth_user_email')) {
    function auth_user_email()
    {
        return isset($_SESSION['user_email']) ? (string) $_SESSION['user_email'] : '';
    }
}

if (!function_exists('superadmin_route')) {
    function superadmin_route()
    {
        $route = trim((string) config('admin.route', 'superadmin'));
        return $route !== '' ? $route : 'superadmin';
    }
}

if (!function_exists('auth_is_superadmin')) {
    function auth_is_superadmin()
    {
        $userId = auth_user_id();
        if ($userId < 1) {
            return false;
        }

        $configEmail = trim((string) config('admin.email', ''));
        $sessionEmail = trim((string) auth_user_email());
        if ($configEmail !== '' && $sessionEmail !== '' && strcasecmp($configEmail, $sessionEmail) === 0) {
            return true;
        }

        $configUserId = (int) config('admin.user_id', 1);
        return $configUserId > 0 && $userId === $configUserId;
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        if (!isset($_SESSION['_csrf_token']) || !is_string($_SESSION['_csrf_token']) || strlen($_SESSION['_csrf_token']) < 32) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf_token'];
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        return '<input type="hidden" name="_csrf" value="' . e(csrf_token()) . '">';
    }
}

if (!function_exists('csrf_verify_request')) {
    function csrf_verify_request($token)
    {
        $sessionToken = isset($_SESSION['_csrf_token']) ? (string) $_SESSION['_csrf_token'] : '';
        $token = trim((string) $token);
        return $sessionToken !== '' && $token !== '' && hash_equals($sessionToken, $token);
    }
}

if (!function_exists('request_client_ip')) {
    function request_client_ip()
    {
        $candidates = [
            isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : '',
            isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? explode(',', (string) $_SERVER['HTTP_X_FORWARDED_FOR'])[0] : '',
            isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
        ];
        foreach ($candidates as $candidate) {
            $ip = trim((string) $candidate);
            if ($ip !== '') {
                return $ip;
            }
        }
        return '';
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
