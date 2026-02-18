<?php

require_once __DIR__ . '/../app/bootstrap.php';

use App\Controllers\ApiController;
use App\Controllers\AnecdoteController;
use App\Controllers\AuthController;
use App\Controllers\BibleController;
use App\Controllers\DevotionalController;
use App\Controllers\HomeController;
use App\Controllers\HomeDailyController;
use App\Controllers\ReaderController;
use App\Controllers\ShareController;
use App\Services\AIService;
use App\Services\AnecdoteService;
use App\Services\BibleRepository;
use App\Services\DailyVerseService;
use App\Services\DevotionalService;
use App\Services\GenerationService;
use App\Services\HtmlSanitizer;
use App\Services\ImageCardService;
use App\Services\SearchService;
use App\Services\UserDataRepository;

$sanitizer = new HtmlSanitizer();
$bibleRepository = new BibleRepository(config('paths.bible'), config('paths.commentary'), $sanitizer);
$userDataRepository = new UserDataRepository(config('paths.app_db'));
$searchService = new SearchService($bibleRepository, $userDataRepository, $sanitizer);
$aiService = new AIService(config('ai', []), $userDataRepository);
$imageCardService = new ImageCardService();
$dailyVerseService = new DailyVerseService(
    config('paths.bible'),
    $bibleRepository,
    $userDataRepository,
    $sanitizer,
    $imageCardService
);
$generationService = new GenerationService(config('ai', []), $userDataRepository, $bibleRepository);
$anecdoteService = new AnecdoteService(
    $userDataRepository,
    config('app.base_path') . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'anecdotas_seed.json',
    config('ai', [])
);
$devotionalService = new DevotionalService(
    $bibleRepository,
    $userDataRepository,
    $dailyVerseService,
    $generationService,
    $imageCardService
);

$homeController = new HomeController($bibleRepository);
$bibleController = new BibleController($bibleRepository, $searchService);
$readerController = new ReaderController($bibleRepository, $imageCardService, $userDataRepository);
$homeDailyController = new HomeDailyController($dailyVerseService, $imageCardService, $userDataRepository);
$devotionalController = new DevotionalController($devotionalService, $imageCardService);
$authController = new AuthController($userDataRepository);
$shareController = new ShareController();
$anecdoteController = new AnecdoteController($anecdoteService);
$apiController = new ApiController(
    $bibleRepository,
    $userDataRepository,
    $aiService,
    $searchService,
    $devotionalService,
    $dailyVerseService,
    $anecdoteService
);

$route = isset($_GET['route']) ? $_GET['route'] : 'home_daily';

try {
    switch ($route) {
        case 'home':
            $homeController->index();
            break;

        case 'reader':
            $readerController->index();
            break;

        case 'home_daily':
            $homeDailyController->index();
            break;

        case 'devotional':
            $devotionalController->index();
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

        case 'share_app':
            $shareController->app();
            break;

        case 'anecdotes':
            $anecdoteController->index();
            break;

        case 'login':
            $authController->loginForm();
            break;

        case 'register':
            $authController->registerForm();
            break;

        case 'login.submit':
            $authController->login();
            break;

        case 'register.submit':
            $authController->register();
            break;

        case 'logout':
            $authController->logout();
            break;

        case 'admin':
            $authController->admin();
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

        case 'api.search':
            $apiController->search();
            break;

        case 'api.devotional.generate':
            $apiController->devotionalGenerate();
            break;

        case 'api.devotional.history':
            $apiController->devotionalHistory();
            break;

        case 'api.prefs.save':
            $apiController->prefsSave();
            break;

        case 'api.anecdotes.list':
            $apiController->anecdotesList();
            break;

        case 'api.anecdotes.generate':
            $apiController->anecdotesGenerate();
            break;

        case 'api.anecdotes.favorite':
            $apiController->anecdotesFavoriteToggle();
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
