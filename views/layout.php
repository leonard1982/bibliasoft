<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#12313f">
    <title><?php echo e(isset($pageTitle) ? $pageTitle . ' | ' : ''); ?><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></title>
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>
    <header class="topbar">
        <div class="wrap topbar-inner">
            <a href="?route=reader" class="brand-wrap">
                <strong class="brand-main"><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></strong>
                <small class="brand-sub"><?php echo e(config('branding.app_short', 'BibliaSoft')); ?> · <?php echo e(config('branding.slogan', 'Biblia para todos')); ?></small>
            </a>
            <nav class="nav">
                <a href="?route=reader">Lector</a>
                <a href="?route=search">Búsqueda</a>
                <button class="btn-light" id="openSettings" type="button">
                    <img src="assets/icons/settings.svg" alt="" class="ico"> Configuración
                </button>
            </nav>
        </div>
    </header>

    <main class="wrap main-content">
        <?php echo $content; ?>
    </main>

    <script src="assets/app.js"></script>
</body>
</html>
