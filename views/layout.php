<!doctype html>
<?php
$isEmbed = isset($_GET['embed']) && (string) $_GET['embed'] === '1';
$activeRoute = isset($_GET['route']) ? (string) $_GET['route'] : 'home_daily';
$sideMenuItems = [
    ['route' => 'home_daily', 'label' => 'Inicio', 'icon' => 'book.svg', 'href' => '?route=home_daily', 'open_tab' => true],
    ['route' => 'reader', 'label' => 'Lector', 'icon' => 'eye.svg', 'href' => '?route=reader&skip_daily=1', 'open_tab' => true],
    ['route' => 'devotional', 'label' => 'Devocionales', 'icon' => 'text.svg', 'href' => '?route=devotional', 'open_tab' => true],
    ['route' => 'study_center', 'label' => 'Centro de estudio', 'icon' => 'layers.svg', 'href' => '?route=study_center', 'open_tab' => true],
    ['route' => 'share_app', 'label' => 'Compartir App', 'icon' => 'share.svg', 'href' => '?route=share_app', 'open_tab' => true],
    ['route' => 'anecdotes', 'label' => 'Anécdotas', 'icon' => 'bookmark.svg', 'href' => '?route=anecdotes', 'open_tab' => true],
];
if (auth_user_id() > 0) {
    $sideMenuItems[] = ['route' => 'sermons', 'label' => 'Sermones', 'icon' => 'list.svg', 'href' => '?route=sermons', 'open_tab' => true];
    $sideMenuItems[] = ['route' => 'companion', 'label' => 'Alfonso IA', 'icon' => 'help.svg', 'href' => '?route=companion', 'open_tab' => true];
    $sideMenuItems[] = ['route' => 'logout', 'label' => 'Salir', 'icon' => 'lock.svg', 'href' => '?route=logout', 'open_tab' => false];
} else {
    $sideMenuItems[] = ['route' => 'login', 'label' => 'Ingresar', 'icon' => 'login.svg', 'href' => '?route=login', 'open_tab' => true];
    $sideMenuItems[] = ['route' => 'register', 'label' => 'Registro', 'icon' => 'register.svg', 'href' => '?route=register', 'open_tab' => true];
}
$bodyClasses = [];
if ($isEmbed) {
    $bodyClasses[] = 'layout-embed';
}
$bodyClasses[] = 'route-' . preg_replace('/[^a-z0-9\-_]/i', '-', $activeRoute);
$bodyClassAttr = trim(implode(' ', $bodyClasses));
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#12313f">
    <title><?php echo e(isset($pageTitle) ? $pageTitle . ' | ' : ''); ?><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></title>
    <link rel="manifest" href="<?php echo e(app_asset('manifest.json')); ?>">
    <link rel="stylesheet" href="<?php echo e(app_asset('assets/app.css')); ?>">
</head>
<body class="<?php echo e($bodyClassAttr); ?>">
    <div id="globalLoadingOverlay" class="app-loading-overlay hidden" aria-hidden="true">
        <div class="app-loading-card" role="status" aria-live="polite" aria-busy="true">
            <div class="app-loading-spinner" aria-hidden="true"></div>
            <strong id="globalLoadingTitle">Cargando...</strong>
            <p id="globalLoadingText">Espera por favor mientras preparamos la siguiente vista.</p>
        </div>
    </div>
    <?php if (!$isEmbed): ?>
        <div id="appShell" class="app-shell" data-active-route="<?php echo e($activeRoute); ?>">
            <aside id="sideMenu" class="side-menu">
                <div class="side-menu-head">
                    <a href="?route=home_daily" class="side-brand">
                        <img src="assets/icons/book.svg" alt="" class="ico">
                        <span class="side-brand-text">
                            <strong><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></strong>
                            <small><?php echo e(config('branding.app_short', 'BibliaSoft')); ?></small>
                        </span>
                    </a>
                    <button id="desktopSidebarToggle" class="btn-light side-desktop-toggle" type="button" aria-label="Colapsar menú">
                        <img src="assets/icons/menu.svg" alt="" class="ico">
                    </button>
                </div>
                <nav class="side-menu-nav" aria-label="Navegación principal">
                    <?php foreach ($sideMenuItems as $item): ?>
                        <?php
                        $routeName = (string) ($item['route'] ?? '');
                        $isActive = $routeName !== '' && $routeName === $activeRoute;
                        $href = (string) ($item['href'] ?? '?route=home_daily');
                        $label = (string) ($item['label'] ?? 'Elemento');
                        $icon = (string) ($item['icon'] ?? 'list.svg');
                        $openTab = !empty($item['open_tab']);
                        ?>
                        <a class="side-menu-item <?php echo $isActive ? 'is-active' : ''; ?>"
                           href="<?php echo e($href); ?>"
                           data-route="<?php echo e($routeName); ?>"
                           data-label="<?php echo e($label); ?>"
                           data-icon="<?php echo e('assets/icons/' . $icon); ?>"
                           <?php echo $openTab ? 'data-open-tab="1"' : 'data-direct="1"'; ?>>
                            <img src="<?php echo e('assets/icons/' . $icon); ?>" alt="" class="ico">
                            <span class="side-menu-label"><?php echo e($label); ?></span>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </aside>
            <button id="sideMenuOverlay" class="side-menu-overlay hidden" type="button" aria-label="Cerrar menú"></button>

            <div class="app-main">
                <header class="topbar">
                    <div class="wrap topbar-inner topbar-workspace">
                        <div class="topbar-start">
                            <button id="mobileSidebarToggle" class="btn-light mobile-nav-toggle" type="button" aria-label="Abrir menú lateral">
                                <img src="assets/icons/menu.svg" alt="" class="ico"> Menú
                            </button>
                            <a href="?route=home_daily" class="brand-wrap">
                                <strong class="brand-main"><?php echo e(config('branding.app_name', 'Biblia para todos')); ?></strong>
                                <small class="brand-sub"><?php echo e(config('branding.app_short', 'BibliaSoft')); ?> · <?php echo e(config('branding.slogan', 'Biblia para todos')); ?></small>
                            </a>
                        </div>
                        <div class="toolbar topbar-tools">
                            <button class="btn-light topbar-icon-btn" id="topbarThemeToggle" type="button" data-tip="Cambiar tema" aria-label="Cambiar tema">
                                <img src="assets/icons/theme.svg" alt="" class="ico">
                            </button>
                            <?php if (auth_user_id() > 0): ?>
                                <details class="user-menu" id="userMenu">
                                    <summary class="btn-light user-menu-trigger" title="Menú de usuario">
                                        <img src="assets/icons/user.svg" alt="" class="ico">
                                        <span><?php echo e(auth_username() !== '' ? auth_username() : 'Usuario'); ?></span>
                                    </summary>
                                    <div class="user-menu-panel">
                                        <div class="user-menu-head">
                                            <strong><?php echo e(auth_username() !== '' ? auth_username() : 'Usuario'); ?></strong>
                                            <small class="muted">Sesión activa</small>
                                        </div>
                                        <a class="user-menu-item" href="?route=study_center">
                                            <img src="assets/icons/layers.svg" alt="" class="ico"> Centro de estudio
                                        </a>
                                        <a class="user-menu-item" href="?route=sermons">
                                            <img src="assets/icons/list.svg" alt="" class="ico"> Sermones y mensajes
                                        </a>
                                        <a class="user-menu-item" href="?route=companion">
                                            <img src="assets/icons/help.svg" alt="" class="ico"> Alfonso IA
                                        </a>
                                        <a class="user-menu-item" href="?route=reader&skip_daily=1">
                                            <img src="assets/icons/eye.svg" alt="" class="ico"> Ir al lector
                                        </a>
                                        <?php if (auth_is_superadmin()): ?>
                                            <a class="user-menu-item" href="?route=<?php echo e(urlencode(superadmin_route())); ?>">
                                                <img src="assets/icons/settings.svg" alt="" class="ico"> Administración
                                            </a>
                                        <?php endif; ?>
                                        <a class="user-menu-item user-menu-item-danger" href="?route=logout">
                                            <img src="assets/icons/lock.svg" alt="" class="ico"> Cerrar sesión
                                        </a>
                                    </div>
                                </details>
                            <?php endif; ?>
                            <?php if ($activeRoute === 'reader'): ?>
                                <button class="btn-light nav-settings topbar-icon-btn" id="openSettings" type="button" data-tip="Configuración" aria-label="Configuración">
                                    <img src="assets/icons/settings.svg" alt="" class="ico">
                                </button>
                            <?php endif; ?>
                            <button class="btn-light topbar-icon-btn" id="workspaceReloadActive" type="button" data-tip="Recargar página" aria-label="Recargar página">
                                <img src="assets/icons/reload.svg" alt="" class="ico">
                            </button>
                        </div>
                    </div>
                </header>

                <section id="workspaceShell" class="workspace-shell" data-active-route="<?php echo e($activeRoute); ?>">
                    <div class="workspace-tabs-wrap wrap">
                        <div id="workspaceTabs" class="workspace-tabs" aria-label="Pestañas de trabajo"></div>
                    </div>
                    <div id="workspaceBodies" class="workspace-bodies">
                        <section class="workspace-pane is-active" data-tab-id="main" data-route="<?php echo e($activeRoute); ?>">
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
                                        <a href="?route=study_center">Centro de estudio</a>
                                        <?php if (auth_user_id() > 0): ?><a href="?route=sermons">Sermones</a><?php endif; ?>
                                        <?php if (auth_user_id() > 0): ?><a href="?route=companion">Alfonso IA</a><?php endif; ?>
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
                        </section>
                    </div>
                </section>
            </div>
        </div>

        <section id="cookieConsentBanner" class="cookie-consent hidden" role="dialog" aria-live="polite" aria-label="Consentimiento de cookies">
            <div class="cookie-consent-inner">
                <div class="cookie-copy">
                    <strong>Cookies y privacidad</strong>
                    <p>Usamos cookies esenciales para sesión y seguridad, y opcionales para recordar preferencias de uso. Puedes aceptar todo o mantener solo las esenciales.</p>
                    <div id="cookieConsentDetails" class="cookie-details hidden">
                        <small><strong>Esenciales:</strong> autenticación, seguridad y funcionamiento básico del lector.</small>
                        <small><strong>Opcionales:</strong> preferencias de interfaz para mejorar tu experiencia entre visitas.</small>
                    </div>
                </div>
                <div class="toolbar cookie-actions">
                    <button id="cookieAcceptAll" type="button" class="btn-primary">Aceptar todo</button>
                    <button id="cookieAcceptEssential" type="button" class="btn-light">Solo esenciales</button>
                    <button id="cookieToggleDetails" type="button" class="btn-light">Ver detalle</button>
                </div>
            </div>
        </section>
    <?php else: ?>
        <main class="embed-main">
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
                    <a href="?route=study_center">Centro de estudio</a>
                    <?php if (auth_user_id() > 0): ?><a href="?route=sermons">Sermones</a><?php endif; ?>
                    <?php if (auth_user_id() > 0): ?><a href="?route=companion">Alfonso IA</a><?php endif; ?>
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
    <?php endif; ?>

    <?php if (!$isEmbed): ?>
        <script>
            window.__BIBLIASOFT_SW_URL = <?php echo json_encode(app_asset('sw.js')); ?>;
        </script>
    <?php endif; ?>

    <script src="<?php echo e(app_asset('assets/app.js')); ?>"></script>
    <script src="<?php echo e(app_asset('assets/ui_feedback.js')); ?>"></script>
    <script src="<?php echo e(app_asset('assets/reminders.js')); ?>"></script>
    <?php if (!$isEmbed): ?>
        <script src="<?php echo e(app_asset('assets/workspace.js')); ?>"></script>
        <script>
            (function () {
                if (!('serviceWorker' in navigator)) {
                    return;
                }
                var swUrl = window.__BIBLIASOFT_SW_URL || 'sw.js';
                var reloading = false;

                navigator.serviceWorker.addEventListener('controllerchange', function () {
                    if (reloading) {
                        return;
                    }
                    reloading = true;
                    window.location.reload();
                });

                navigator.serviceWorker.register(swUrl).then(function (registration) {
                    registration.update().catch(function () {
                        // ignore
                    });

                    function promptSkipWaiting(worker) {
                        if (!worker) {
                            return;
                        }
                        worker.postMessage({ type: 'SKIP_WAITING' });
                    }

                    if (registration.waiting) {
                        promptSkipWaiting(registration.waiting);
                    }

                    registration.addEventListener('updatefound', function () {
                        var installing = registration.installing;
                        if (!installing) {
                            return;
                        }
                        installing.addEventListener('statechange', function () {
                            if (installing.state === 'installed' && navigator.serviceWorker.controller) {
                                promptSkipWaiting(installing);
                            }
                        });
                    });
                }).catch(function () {
                    // ignore
                });
            })();
        </script>
        <script>
            (function () {
                var key = 'bs_cookie_consent_v1';
                var banner = document.getElementById('cookieConsentBanner');
                var acceptAll = document.getElementById('cookieAcceptAll');
                var acceptEssential = document.getElementById('cookieAcceptEssential');
                var toggleDetails = document.getElementById('cookieToggleDetails');
                var details = document.getElementById('cookieConsentDetails');

                if (!banner || !acceptAll || !acceptEssential || !toggleDetails || !details) {
                    return;
                }

                function safeRead() {
                    try {
                        return localStorage.getItem(key);
                    } catch (err) {
                        return '';
                    }
                }

                function safeWrite(value) {
                    try {
                        localStorage.setItem(key, value);
                    } catch (err) {
                        // ignore
                    }
                }

                function applyConsent(value) {
                    var consent = value === 'all' ? 'all' : 'essential';
                    document.documentElement.setAttribute('data-cookie-consent', consent);
                }

                function saveAndClose(value) {
                    safeWrite(value);
                    applyConsent(value);
                    banner.classList.add('hidden');
                }

                var saved = safeRead();
                if (saved === 'all' || saved === 'essential') {
                    applyConsent(saved);
                    banner.classList.add('hidden');
                } else {
                    banner.classList.remove('hidden');
                }

                acceptAll.addEventListener('click', function () {
                    saveAndClose('all');
                });

                acceptEssential.addEventListener('click', function () {
                    saveAndClose('essential');
                });

                toggleDetails.addEventListener('click', function () {
                    details.classList.toggle('hidden');
                    toggleDetails.textContent = details.classList.contains('hidden') ? 'Ver detalle' : 'Ocultar detalle';
                });
            })();
        </script>
    <?php endif; ?>
</body>
</html>
