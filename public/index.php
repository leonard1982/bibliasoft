<?php

require_once __DIR__ . '/../app/bootstrap.php';

use App\Controllers\ApiController;
use App\Controllers\BibleController;
use App\Controllers\HomeController;
use App\Controllers\ReaderController;
use App\Services\AIService;
use App\Services\BibleRepository;
use App\Services\HtmlSanitizer;
use App\Services\SearchService;
use App\Services\UserDataRepository;

$sanitizer = new HtmlSanitizer();
$bibleRepository = new BibleRepository(config('paths.bible'), config('paths.commentary'), $sanitizer);
$userDataRepository = new UserDataRepository(config('paths.app_db'));
$searchService = new SearchService($bibleRepository, $userDataRepository, $sanitizer);
$aiService = new AIService(config('ai', []), $userDataRepository);

$homeController = new HomeController($bibleRepository);
$bibleController = new BibleController($bibleRepository, $searchService);
$readerController = new ReaderController($bibleRepository);
$apiController = new ApiController($bibleRepository, $userDataRepository, $aiService);

$route = isset($_GET['route']) ? $_GET['route'] : 'reader';

try {
    switch ($route) {
        case 'home':
            $homeController->index();
            break;

        case 'reader':
            $readerController->index();
            break;

        case 'book':
            app_redirect('?route=reader&book=' . (int) ($_GET['book'] ?? 1) . '&chapter=1');
            break;

        case 'chapter':
            app_redirect('?route=reader&book=' . (int) ($_GET['book'] ?? 1) . '&chapter=' . (int) ($_GET['chapter'] ?? 1));
            break;

        case 'search':
            $bibleController->search();
            break;

        case 'api.chapter':
            $apiController->chapter();
            break;

        case 'api.chapters':
            $apiController->chapters();
            break;

        case 'api.verse':
            $apiController->verse();
            break;

        case 'api.selection':
            $apiController->selection();
            break;

        case 'api.note.create':
            $apiController->noteCreate();
            break;

        case 'api.note.update':
            $apiController->noteUpdate();
            break;

        case 'api.note.delete':
            $apiController->noteDelete();
            break;

        case 'api.link.create':
            $apiController->linkCreate();
            break;

        case 'api.link.delete':
            $apiController->linkDelete();
            break;

        case 'api.favorite.toggle':
            $apiController->favoriteToggle();
            break;

        case 'api.ai.refresh':
            $apiController->aiRefresh();
            break;

        default:
            http_response_code(404);
            echo 'Ruta no encontrada';
            break;
    }
} catch (Throwable $e) {
    if (strpos($route, 'api.') === 0) {
        app_json([
            'error' => 'Error interno',
            'message' => config('app.env') === 'local' ? $e->getMessage() : 'Internal Server Error',
        ], 500);
    }

    http_response_code(500);
    echo '<h1>Error interno</h1>';
    if (config('app.env') === 'local') {
        echo '<pre>' . e($e->getMessage()) . '</pre>';
    }
}
