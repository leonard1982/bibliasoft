<?php

require_once __DIR__ . '/../../app/bootstrap.php';

use App\Services\BibleRepository;
use App\Services\GenerationService;
use App\Services\HtmlSanitizer;
use App\Services\UserDataRepository;

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$raw = file_get_contents('php://input');
$payload = json_decode($raw, true);
if (!is_array($payload)) {
    $payload = $_POST;
}
if (!is_array($payload)) {
    http_response_code(422);
    echo json_encode(['error' => 'Entrada inválida']);
    exit;
}

try {
    $repo = new BibleRepository(config('paths.bible'), config('paths.commentary'), new HtmlSanitizer());
    $userRepo = new UserDataRepository(config('paths.app_db'));
    $service = new GenerationService(config('ai', []), $userRepo, $repo);
    $result = $service->generate($payload);
    echo json_encode(['ok' => true, 'result' => $result], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(500);
    $message = config('app.env') === 'local' ? $e->getMessage() : 'Error interno';
    echo json_encode(['error' => $message], JSON_UNESCAPED_UNICODE);
}
