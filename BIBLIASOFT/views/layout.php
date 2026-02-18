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
    <?php $activeRoute = isset($_GET['route']) ? $_GET['route'] : 'home_daily'; ?>
    <header class="topbar">
        <div class="wrap topbar-inner">
            <a href="?route=home_daily" class="brand-wrap">
                <strong class="brand-main"><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></strong>
                <small class="brand-sub"><?php echo e(config('branding.app_short', 'BibliaSoft')); ?> · <?php echo e(config('branding.slogan', 'Biblia para todos')); ?></small>
            </a>
            <nav class="nav">
                <a class="nav-link <?php echo $activeRoute === 'home_daily' ? 'is-active' : ''; ?>" href="?route=home_daily">Inicio</a>
                <a class="nav-link <?php echo $activeRoute === 'reader' ? 'is-active' : ''; ?>" href="?route=reader">Lector</a>
                <a class="nav-link <?php echo $activeRoute === 'devotional' ? 'is-active' : ''; ?>" href="?route=devotional">Devocionales</a>
                <a class="nav-link <?php echo $activeRoute === 'share_app' ? 'is-active' : ''; ?>" href="?route=share_app">Compartir App</a>
                <a class="nav-link <?php echo $activeRoute === 'anecdotes' ? 'is-active' : ''; ?>" href="?route=anecdotes">Anécdotas</a>
                <a class="nav-link <?php echo $activeRoute === 'search' ? 'is-active' : ''; ?>" href="?route=search">Búsqueda</a>
                <?php if (auth_user_id() > 0): ?>
                    <a class="nav-link <?php echo $activeRoute === 'admin' ? 'is-active' : ''; ?>" href="?route=admin"><?php echo e(auth_username()); ?></a>
                    <a class="nav-link" href="?route=logout">Salir</a>
                <?php else: ?>
                    <a class="nav-link <?php echo $activeRoute === 'login' ? 'is-active' : ''; ?>" href="?route=login">Ingresar</a>
                    <a class="nav-link <?php echo $activeRoute === 'register' ? 'is-active' : ''; ?>" href="?route=register">Registro</a>
                <?php endif; ?>
                <?php if ($activeRoute === 'reader'): ?>
                    <button class="btn-light nav-settings" id="openSettings" type="button">
                        <img src="assets/icons/settings.svg" alt="" class="ico"> Configuración
                    </button>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="wrap main-content">
        <?php echo $content; ?>
    </main>

    <script src="assets/app.js"></script>
</body>
</html>
