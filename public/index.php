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
use App\Controllers\StudyCenterController;
use App\Services\AIService;
use App\Services\AnecdoteService;
use App\Services\BibleRepository;
use App\Services\DailyVerseService;
use App\Services\DevotionalService;
use App\Services\DocumentExportService;
use App\Services\GenerationService;
use App\Services\HtmlSanitizer;
use App\Services\ImageCardService;
use App\Services\MailService;
use App\Services\ModuleCatalogService;
use App\Services\ReadingPlanService;
use App\Services\SearchService;
use App\Services\StrongLexiconService;
use App\Services\UserDataRepository;
use App\Support\UserDataScope;

$defaultBiblePath = (string) config('paths.bible');
$defaultComparePath = (string) config('paths.bible_compare');
$bibleBaseDir = dirname($defaultBiblePath);

$resolveBiblePath = static function ($requestedFile, $fallbackPath) use ($bibleBaseDir) {
    $requestedFile = basename(trim((string) $requestedFile));
    $fallbackPath = trim((string) $fallbackPath);

    if ($requestedFile !== '' && preg_match('/\.bbli$/i', $requestedFile)) {
        $candidate = $bibleBaseDir . DIRECTORY_SEPARATOR . $requestedFile;
        if (is_file($candidate)) {
            return $candidate;
        }
    }

    if ($fallbackPath !== '' && is_file($fallbackPath)) {
        return $fallbackPath;
    }

    $fallbackFile = basename($fallbackPath);
    if ($fallbackFile !== '' && preg_match('/\.bbli$/i', $fallbackFile)) {
        $candidate = $bibleBaseDir . DIRECTORY_SEPARATOR . $fallbackFile;
        if (is_file($candidate)) {
            return $candidate;
        }
    }

    $catalog = glob($bibleBaseDir . DIRECTORY_SEPARATOR . '*.bbli');
    if (!empty($catalog)) {
        sort($catalog, SORT_NATURAL | SORT_FLAG_CASE);
        return $catalog[0];
    }

    return $fallbackPath;
};

$selectedPrimaryFile = isset($_SESSION['bible_primary_file']) ? (string) $_SESSION['bible_primary_file'] : '';
$selectedCompareFile = isset($_SESSION['bible_compare_file']) ? (string) $_SESSION['bible_compare_file'] : '';

$resolvedBiblePath = $resolveBiblePath($selectedPrimaryFile, $defaultBiblePath);
$resolvedComparePath = $resolveBiblePath($selectedCompareFile, $defaultComparePath);

$_SESSION['bible_primary_file'] = basename((string) $resolvedBiblePath);
$_SESSION['bible_compare_file'] = basename((string) $resolvedComparePath);

$sanitizer = new HtmlSanitizer();
$bibleRepository = new BibleRepository(
    $resolvedBiblePath,
    config('paths.commentary'),
    $sanitizer,
    $resolvedComparePath
);
$dataScope = UserDataScope::resolve(config());
if ($dataScope['personal_db'] !== $dataScope['global_db']) {
    UserDataScope::ensurePersonalSchema(config(), $dataScope['personal_db']);
}
$userDataRepository = new UserDataRepository($dataScope['personal_db'], $dataScope['global_db']);
$searchService = new SearchService($bibleRepository, $userDataRepository, $sanitizer);
$aiService = new AIService(config('ai', []), $userDataRepository);
$readingPlanService = new ReadingPlanService($bibleRepository, $userDataRepository);
$moduleCatalogService = new ModuleCatalogService($userDataRepository, $sanitizer);
$mailService = new MailService(config('mail', []));
$strongLexiconService = new StrongLexiconService(
    config('paths.lexicon'),
    config('app.base_path') . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'strong.sqlite'
);
$documentExportService = new DocumentExportService();
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
$homeDailyController = new HomeDailyController($dailyVerseService, $imageCardService, $userDataRepository, $readingPlanService);
$devotionalController = new DevotionalController($devotionalService, $imageCardService);
$authController = new AuthController($userDataRepository, $mailService);
$shareController = new ShareController();
$studyCenterController = new StudyCenterController($bibleRepository, $userDataRepository);
$anecdoteController = new AnecdoteController($anecdoteService);
$apiController = new ApiController(
    $bibleRepository,
    $userDataRepository,
    $aiService,
    $searchService,
    $devotionalService,
    $dailyVerseService,
    $anecdoteService,
    $readingPlanService,
    $strongLexiconService,
    $documentExportService,
    $moduleCatalogService
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
            $_SESSION['open_reader_search'] = 1;
            app_redirect('?route=reader');
            break;

        case 'share_app':
            $shareController->app();
            break;

        case 'study_center':
            $studyCenterController->index();
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

        case 'api.chapter.parallel':
            $apiController->chapterParallel();
            break;

        case 'api.versions.list':
            $apiController->versionsList();
            break;

        case 'api.versions.set':
            $apiController->versionsSet();
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

        case 'api.search.theme':
            $apiController->searchTheme();
            break;

        case 'api.strong.lookup':
            $apiController->strongLookup();
            break;

        case 'api.interlinear':
            $apiController->interlinear();
            break;

        case 'api.devotional.generate':
            $apiController->devotionalGenerate();
            break;

        case 'api.devotional.history':
            $apiController->devotionalHistory();
            break;

        case 'api.plan.status':
            $apiController->readingPlanStatus();
            break;

        case 'api.plan.start':
            $apiController->readingPlanStart();
            break;

        case 'api.plan.today':
            $apiController->readingPlanToday();
            break;

        case 'api.plan.chapter':
            $apiController->readingPlanChapter();
            break;

        case 'api.prefs.save':
            $apiController->prefsSave();
            break;

        case 'api.modules.list':
            $apiController->modulesList();
            break;

        case 'api.modules.install':
            $apiController->modulesInstall();
            break;

        case 'api.modules.toggle':
            $apiController->modulesToggle();
            break;

        case 'api.dictionary.lookup':
            $apiController->dictionaryLookup();
            break;

        case 'api.maps.lookup':
            $apiController->mapsLookup();
            break;

        case 'api.stats.panel':
            $apiController->statsPanel();
            break;

        case 'api.stats.track':
            $apiController->statsTrack();
            break;

        case 'api.reminder.insight':
            $apiController->reminderInsight();
            break;

        case 'api.export.download':
            $apiController->exportDownload();
            break;

        case 'api.sync.status':
            $apiController->syncStatus();
            break;

        case 'api.sync.push':
            $apiController->syncPush();
            break;

        case 'api.sync.pull':
            $apiController->syncPull();
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

        case 'api.favorite.snapshot':
            $apiController->favoriteSnapshot();
            break;

        case 'api.favorite.save':
            $apiController->favoriteSave();
            break;

        case 'api.favorite.remove':
            $apiController->favoriteRemove();
            break;

        case 'api.favorite.folder.create':
            $apiController->favoriteFolderCreate();
            break;

        case 'api.study.projects.list':
            $apiController->studyProjectsList();
            break;

        case 'api.study.projects.create':
            $apiController->studyProjectCreate();
            break;

        case 'api.study.projects.update':
            $apiController->studyProjectUpdate();
            break;

        case 'api.study.projects.delete':
            $apiController->studyProjectDelete();
            break;

        case 'api.study.entries.list':
            $apiController->studyEntriesList();
            break;

        case 'api.study.entries.create':
            $apiController->studyEntryCreate();
            break;

        case 'api.study.entries.update':
            $apiController->studyEntryUpdate();
            break;

        case 'api.study.entries.delete':
            $apiController->studyEntryDelete();
            break;

        case 'api.highlight.set':
            $apiController->highlightSet();
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
