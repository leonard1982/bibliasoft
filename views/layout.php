<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#12313f">
    <title><?php echo e(isset($pageTitle) ? $pageTitle . ' | ' : ''); ?><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></title>
    <link rel="manifest" href="<?php echo e(app_asset('manifest.json')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_asset('assets/app.css')); ?>">
</head>
<body>
    <?php $activeRoute = isset($_GET['route']) ? $_GET['route'] : 'home_daily'; ?>
    <header class="topbar">
        <div class="wrap topbar-inner">
            <button class="btn-light mobile-nav-toggle" id="mobileNavToggle" type="button" aria-controls="mainNav" aria-expanded="false" aria-label="Abrir menú principal">
                <img src="assets/icons/menu.svg" alt="" class="ico"> Menú
            </button>
            <a href="?route=home_daily" class="brand-wrap">
                <strong class="brand-main"><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></strong>
                <small class="brand-sub"><?php echo e(config('branding.app_short', 'BibliaSoft')); ?> · <?php echo e(config('branding.slogan', 'Biblia para todos')); ?></small>
            </a>
            <nav class="nav" id="mainNav">
                <a class="nav-link <?php echo $activeRoute === 'home_daily' ? 'is-active' : ''; ?>" href="?route=home_daily"><img src="assets/icons/book.svg" alt="" class="ico"> Inicio</a>
                <a class="nav-link <?php echo $activeRoute === 'reader' ? 'is-active' : ''; ?>" href="?route=reader&amp;skip_daily=1"><img src="assets/icons/eye.svg" alt="" class="ico"> Lector</a>
                <a class="nav-link <?php echo $activeRoute === 'devotional' ? 'is-active' : ''; ?>" href="?route=devotional"><img src="assets/icons/text.svg" alt="" class="ico"> Devocionales</a>
                <a class="nav-link <?php echo $activeRoute === 'share_app' ? 'is-active' : ''; ?>" href="?route=share_app"><img src="assets/icons/share.svg" alt="" class="ico"> Compartir App</a>
                <a class="nav-link <?php echo $activeRoute === 'anecdotes' ? 'is-active' : ''; ?>" href="?route=anecdotes"><img src="assets/icons/bookmark.svg" alt="" class="ico"> Anécdotas</a>
                <?php if (auth_user_id() > 0): ?>
                    <a class="nav-link <?php echo $activeRoute === 'admin' ? 'is-active' : ''; ?>" href="?route=admin"><img src="assets/icons/user.svg" alt="" class="ico"> <?php echo e(auth_username()); ?></a>
                    <a class="nav-link" href="?route=logout"><img src="assets/icons/lock.svg" alt="" class="ico"> Salir</a>
                <?php else: ?>
                    <a class="nav-link <?php echo $activeRoute === 'login' ? 'is-active' : ''; ?>" href="?route=login"><img src="assets/icons/login.svg" alt="" class="ico"> Ingresar</a>
                    <a class="nav-link <?php echo $activeRoute === 'register' ? 'is-active' : ''; ?>" href="?route=register"><img src="assets/icons/register.svg" alt="" class="ico"> Registro</a>
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

    <footer class="site-footer">
        <div class="wrap site-footer-inner">
            <div class="site-footer-brand">
                <span class="site-brand-tag">BIBLIASOFT</span>
                <p class="site-copy">Copyright © <?php echo date('Y'); ?> Leonardo Navarro · Fundación La Iglesia en la Calle</p>
                <small class="site-legal">Plataforma de lectura, estudio y formación bíblica para iglesia, familia y discipulado personal.</small>
            </div>
            <nav class="site-footer-nav" aria-label="Navegación de pie de página">
                <a href="?route=home_daily">Inicio</a>
                <a href="?route=reader&amp;skip_daily=1">Lector</a>
                <a href="?route=devotional">Devocionales</a>
                <a href="?route=anecdotes">Anécdotas</a>
            </nav>
            <div class="site-links">
                <a class="site-link-main" href="https://www.laiglesiaenlacalle.co" target="_blank" rel="noopener noreferrer">www.laiglesiaenlacalle.co</a>
                <a class="site-social-link" href="https://www.facebook.com/fundacionlaiglesiaenlacalle" target="_blank" rel="noopener noreferrer" title="Facebook Fundación La Iglesia en la Calle" aria-label="Facebook Fundación La Iglesia en la Calle">
                    <img src="assets/icons/facebook.svg" alt="" class="ico">
                </a>
            </div>
        </div>
    </footer>

    <script>
        window.__BIBLIASOFT_SW_URL = <?php echo json_encode(app_asset('sw.js')); ?>;
    </script>
    <script src="<?php echo e(app_asset('assets/app.js')); ?>"></script>
    <script src="<?php echo e(app_asset('assets/reminders.js')); ?>"></script>
    <script>
        (function () {
            if (!('serviceWorker' in navigator)) {
                return;
            }
            var swUrl = window.__BIBLIASOFT_SW_URL || 'sw.js';
            navigator.serviceWorker.register(swUrl).catch(function () {
                // ignore
            });
        })();
    </script>
    <script>
        (function () {
            var toggle = document.getElementById('mobileNavToggle');
            var nav = document.getElementById('mainNav');
            if (!toggle || !nav) {
                return;
            }

            function setOpen(open) {
                nav.classList.toggle('is-open', !!open);
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            }

            toggle.addEventListener('click', function () {
                setOpen(!nav.classList.contains('is-open'));
            });

            nav.querySelectorAll('a, button').forEach(function (item) {
                item.addEventListener('click', function () {
                    if (window.matchMedia('(max-width: 980px)').matches) {
                        setOpen(false);
                    }
                });
            });

            document.addEventListener('click', function (event) {
                if (!window.matchMedia('(max-width: 980px)').matches) {
                    return;
                }
                if (!nav.classList.contains('is-open')) {
                    return;
                }
                if (nav.contains(event.target) || toggle.contains(event.target)) {
                    return;
                }
                setOpen(false);
            });

            window.addEventListener('resize', function () {
                if (!window.matchMedia('(max-width: 980px)').matches) {
                    setOpen(false);
                }
            });
        })();
    </script>
</body>
</html>
