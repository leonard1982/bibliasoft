<?php
$usersRows = isset($usersPage['rows']) && is_array($usersPage['rows']) ? $usersPage['rows'] : [];
$usersCurrentPage = isset($usersPage['page']) ? (int) $usersPage['page'] : 1;
$usersPagesTotal = isset($usersPage['pages']) ? (int) $usersPage['pages'] : 1;
$eventsRows = isset($eventsPage['rows']) && is_array($eventsPage['rows']) ? $eventsPage['rows'] : [];
$eventsCurrentPage = isset($eventsPage['page']) ? (int) $eventsPage['page'] : 1;
$eventsPagesTotal = isset($eventsPage['pages']) ? (int) $eventsPage['pages'] : 1;
$backupsRows = isset($backupsPage['rows']) && is_array($backupsPage['rows']) ? $backupsPage['rows'] : [];
$backupsCurrentPage = isset($backupsPage['page']) ? (int) $backupsPage['page'] : 1;
$backupsPagesTotal = isset($backupsPage['pages']) ? (int) $backupsPage['pages'] : 1;
$templatesRows = isset($mailTemplates) && is_array($mailTemplates) ? $mailTemplates : [];
$mailingListsRows = isset($mailingLists) && is_array($mailingLists) ? $mailingLists : [];
$campaignRows = isset($mailCampaigns) && is_array($mailCampaigns) ? $mailCampaigns : [];
$campaignLogsRows = isset($campaignLogs) && is_array($campaignLogs) ? $campaignLogs : [];
$mailTemplateVariables = isset($mailTemplateVariables) && is_array($mailTemplateVariables) ? $mailTemplateVariables : [];
$dailyRows = isset($dashboard['daily']) && is_array($dashboard['daily']) ? $dashboard['daily'] : [];
$routeRows = isset($dashboard['routes']) && is_array($dashboard['routes']) ? $dashboard['routes'] : [];
$sourceRows = isset($dashboard['sources']) && is_array($dashboard['sources']) ? $dashboard['sources'] : [];
$dashboardTotals = isset($dashboard['totals']) && is_array($dashboard['totals']) ? $dashboard['totals'] : [];
$maxDaily = 1;
foreach ($dailyRows as $row) {
    $maxDaily = max($maxDaily, (int) ($row['total'] ?? 0));
}
$buildAdminUrl = static function (array $overrides = []) use ($adminRoute, $userFilters, $eventFilters, $selectedLog, $usersCurrentPage, $eventsCurrentPage, $backupsCurrentPage, $selectedCampaignId) {
    $params = [
        'route' => $adminRoute,
        'uq' => (string) ($userFilters['q'] ?? ''),
        'ustatus' => (string) ($userFilters['status'] ?? 'all'),
        'upage' => $usersCurrentPage,
        'eq' => (string) ($eventFilters['q'] ?? ''),
        'etype' => (string) ($eventFilters['event_type'] ?? 'all'),
        'eoutcome' => (string) ($eventFilters['outcome'] ?? 'all'),
        'epage' => $eventsCurrentPage,
        'bpage' => $backupsCurrentPage,
        'campaign_log' => $selectedCampaignId,
        'log' => (string) $selectedLog,
    ];
    foreach ($overrides as $key => $value) {
        if ($value === null) {
            unset($params[$key]);
            continue;
        }
        $params[$key] = $value;
    }
    return '?' . http_build_query($params);
};
?>
<section class="panel admin-console">
    <div class="admin-head">
        <div>
            <h1>Superadministración</h1>
            <p class="muted">Usuarios, seguridad, backups, correo, campañas y operación general de BIBLIASOFT.</p>
            <small class="muted">Ruta interna: <code>?route=<?php echo e($adminRoute); ?></code></small>
        </div>
        <div class="toolbar">
            <a class="btn-light" href="?route=reader&amp;skip_daily=1">Ir al lector</a>
            <a class="btn-light" href="?route=logout">Cerrar sesión</a>
        </div>
    </div>

    <?php if (!empty($error)): ?>
        <p class="error-note"><?php echo e($error); ?></p>
    <?php endif; ?>
    <?php if (!empty($notice)): ?>
        <p class="study-center-notice is-success"><?php echo e($notice); ?></p>
    <?php endif; ?>

    <div class="admin-metrics">
        <article class="card admin-metric-card">
            <strong>Superadmin</strong>
            <p><?php echo e($username); ?></p>
            <small class="muted"><?php echo e($userEmail); ?></small>
        </article>
        <article class="card admin-metric-card">
            <strong>Usuarios</strong>
            <p><?php echo (int) $usersCount; ?></p>
            <small class="muted"><?php echo (int) $activeUsersCount; ?> activos · <?php echo (int) $inactiveUsersCount; ?> inactivos</small>
        </article>
        <article class="card admin-metric-card">
            <strong>Backups</strong>
            <p><?php echo (int) ($backupsPage['total'] ?? 0); ?></p>
            <small class="muted">Respaldos diarios de la base interna.</small>
        </article>
        <article class="card admin-metric-card">
            <strong>Eventos 14 días</strong>
            <p><?php echo (int) ($dashboardTotals['total'] ?? 0); ?></p>
            <small class="muted">Login OK: <?php echo (int) ($dashboardTotals['login_success'] ?? 0); ?> · Registro OK: <?php echo (int) ($dashboardTotals['register_success'] ?? 0); ?></small>
        </article>
    </div>

    <div class="admin-insights-grid">
        <section class="card admin-chart-card">
            <div class="admin-section-head">
                <div>
                    <strong>Actividad diaria</strong>
                    <small class="muted">Eventos registrados en los últimos 14 días.</small>
                </div>
            </div>
            <div class="admin-daily-bars">
                <?php foreach ($dailyRows as $row): ?>
                    <?php $height = max(8, (int) round((((int) ($row['total'] ?? 0)) / $maxDaily) * 100)); ?>
                    <div class="admin-bar-col" title="<?php echo e((string) ($row['day'] ?? '')); ?> · <?php echo (int) ($row['total'] ?? 0); ?>">
                        <div class="admin-bar" style="height: <?php echo $height; ?>%;"></div>
                        <small><?php echo e(substr((string) ($row['day'] ?? ''), 5)); ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="card admin-chart-card">
            <div class="admin-section-head">
                <div>
                    <strong>Entradas al sistema</strong>
                    <small class="muted">Rutas cargadas con más frecuencia.</small>
                </div>
            </div>
            <div class="admin-stat-list">
                <?php foreach ($routeRows as $row): ?>
                    <?php $width = $routeRows ? max(8, (int) round((((int) ($row['total'] ?? 0)) / max(1, (int) ($routeRows[0]['total'] ?? 1))) * 100)) : 8; ?>
                    <div class="admin-stat-item">
                        <div class="admin-stat-copy">
                            <strong><?php echo e((string) ($row['route'] ?? 'sin-ruta')); ?></strong>
                            <small class="muted"><?php echo (int) ($row['total'] ?? 0); ?> vistas</small>
                        </div>
                        <div class="admin-stat-bar"><span style="width: <?php echo $width; ?>%;"></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="card admin-chart-card">
            <div class="admin-section-head">
                <div>
                    <strong>Origen de acceso</strong>
                    <small class="muted">Referrer capturado o acceso directo.</small>
                </div>
            </div>
            <div class="admin-stat-list">
                <?php foreach ($sourceRows as $row): ?>
                    <?php $width = $sourceRows ? max(8, (int) round((((int) ($row['total'] ?? 0)) / max(1, (int) ($sourceRows[0]['total'] ?? 1))) * 100)) : 8; ?>
                    <div class="admin-stat-item">
                        <div class="admin-stat-copy">
                            <strong><?php echo e((string) ($row['source_label'] ?? 'directo')); ?></strong>
                            <small class="muted"><?php echo (int) ($row['total'] ?? 0); ?> cargas</small>
                        </div>
                        <div class="admin-stat-bar"><span style="width: <?php echo $width; ?>%;"></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <div class="admin-grid">
        <section class="card admin-users-panel">
            <div class="admin-section-head">
                <div>
                    <strong>Usuarios registrados</strong>
                    <small class="muted">Lista paginada y filtrable.</small>
                </div>
            </div>
            <form method="get" class="settings-grid admin-filter-form">
                <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                <input type="hidden" name="eq" value="<?php echo e((string) ($eventFilters['q'] ?? '')); ?>">
                <input type="hidden" name="etype" value="<?php echo e((string) ($eventFilters['event_type'] ?? 'all')); ?>">
                <input type="hidden" name="eoutcome" value="<?php echo e((string) ($eventFilters['outcome'] ?? 'all')); ?>">
                <input type="hidden" name="epage" value="<?php echo $eventsCurrentPage; ?>">
                <input type="hidden" name="bpage" value="<?php echo $backupsCurrentPage; ?>">
                <input type="hidden" name="campaign_log" value="<?php echo (int) $selectedCampaignId; ?>">
                <input type="hidden" name="log" value="<?php echo e((string) $selectedLog); ?>">
                <label>
                    <span>Buscar</span>
                    <input type="text" name="uq" value="<?php echo e((string) ($userFilters['q'] ?? '')); ?>" placeholder="Correo, nombre o ministerio">
                </label>
                <label>
                    <span>Estado</span>
                    <select name="ustatus">
                        <option value="all" <?php echo ((string) ($userFilters['status'] ?? 'all') === 'all') ? 'selected' : ''; ?>>Todos</option>
                        <option value="active" <?php echo ((string) ($userFilters['status'] ?? '') === 'active') ? 'selected' : ''; ?>>Activos</option>
                        <option value="inactive" <?php echo ((string) ($userFilters['status'] ?? '') === 'inactive') ? 'selected' : ''; ?>>Inactivos</option>
                    </select>
                </label>
                <div class="toolbar">
                    <button type="submit" class="btn-primary">Filtrar</button>
                    <a class="btn-light" href="<?php echo e($buildAdminUrl(['uq' => '', 'ustatus' => 'all', 'upage' => 1])); ?>">Limpiar</a>
                </div>
            </form>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr><th>Usuario</th><th>Ministerio</th><th>Estado</th><th>Último acceso</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersRows as $user): ?>
                            <?php $userId = (int) ($user['id'] ?? 0); $isActive = (int) ($user['active'] ?? 1) === 1; $isSelf = $userId === auth_user_id(); ?>
                            <tr>
                                <td>
                                    <strong><?php echo e((string) ($user['full_name'] ?? $user['username'] ?? 'Usuario')); ?></strong>
                                    <small class="muted"><?php echo e((string) ($user['email'] ?? '')); ?></small>
                                    <small class="muted">ID <?php echo $userId; ?> · Registro <?php echo e((string) ($user['created_at'] ?? '')); ?></small>
                                </td>
                                <td><?php echo e((string) ($user['ministry'] ?? '')); ?></td>
                                <td><span class="admin-status <?php echo $isActive ? 'is-active' : 'is-inactive'; ?>"><?php echo $isActive ? 'Activo' : 'Inactivo'; ?></span></td>
                                <td><?php echo e((string) ($user['last_login_at'] ?? 'Nunca')); ?></td>
                                <td>
                                    <div class="admin-action-row">
                                        <button type="button" class="btn-light admin-icon-btn js-admin-edit" data-id="<?php echo $userId; ?>" data-email="<?php echo e((string) ($user['email'] ?? '')); ?>" data-full-name="<?php echo e((string) ($user['full_name'] ?? '')); ?>" data-ministry="<?php echo e((string) ($user['ministry'] ?? '')); ?>" title="Editar usuario"><img src="assets/icons/settings.svg" alt="" class="ico"></button>
                                        <button type="button" class="btn-light admin-icon-btn js-admin-toggle" data-id="<?php echo $userId; ?>" data-name="<?php echo e((string) ($user['full_name'] ?? $user['email'] ?? 'Usuario')); ?>" data-email="<?php echo e((string) ($user['email'] ?? '')); ?>" data-active="<?php echo $isActive ? '1' : '0'; ?>" <?php echo $isSelf ? 'disabled' : ''; ?> title="<?php echo $isActive ? 'Desactivar usuario' : 'Activar usuario'; ?>"><img src="assets/icons/lock.svg" alt="" class="ico"></button>
                                        <button type="button" class="btn-danger admin-icon-btn js-admin-delete" data-id="<?php echo $userId; ?>" data-name="<?php echo e((string) ($user['full_name'] ?? $user['email'] ?? 'Usuario')); ?>" data-email="<?php echo e((string) ($user['email'] ?? '')); ?>" <?php echo $isSelf ? 'disabled' : ''; ?> title="Eliminar usuario"><img src="assets/icons/trash.svg" alt="" class="ico"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin-pagination">
                <?php for ($page = 1; $page <= $usersPagesTotal; $page++): ?>
                    <?php if ($page === $usersCurrentPage): ?>
                        <span class="admin-page-pill is-active"><?php echo $page; ?></span>
                    <?php elseif ($page === 1 || $page === $usersPagesTotal || abs($page - $usersCurrentPage) <= 1): ?>
                        <a class="admin-page-pill" href="<?php echo e($buildAdminUrl(['upage' => $page])); ?>"><?php echo $page; ?></a>
                    <?php elseif ($page === 2 && $usersCurrentPage > 3): ?>
                        <span class="admin-page-gap">...</span>
                    <?php elseif ($page === $usersPagesTotal - 1 && $usersCurrentPage < $usersPagesTotal - 2): ?>
                        <span class="admin-page-gap">...</span>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </section>

        <aside class="admin-side-stack">
            <section class="card admin-events-panel">
                <div class="admin-section-head">
                    <div>
                        <strong>Auditoría y seguridad</strong>
                        <small class="muted">Entradas, intentos y acciones administrativas.</small>
                    </div>
                </div>
                <form method="get" class="settings-grid admin-filter-form">
                    <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                    <input type="hidden" name="uq" value="<?php echo e((string) ($userFilters['q'] ?? '')); ?>">
                    <input type="hidden" name="ustatus" value="<?php echo e((string) ($userFilters['status'] ?? 'all')); ?>">
                    <input type="hidden" name="upage" value="<?php echo $usersCurrentPage; ?>">
                    <input type="hidden" name="bpage" value="<?php echo $backupsCurrentPage; ?>">
                    <input type="hidden" name="campaign_log" value="<?php echo (int) $selectedCampaignId; ?>">
                    <input type="hidden" name="log" value="<?php echo e((string) $selectedLog); ?>">
                    <label><span>Buscar</span><input type="text" name="eq" value="<?php echo e((string) ($eventFilters['q'] ?? '')); ?>" placeholder="Evento, ruta, IP o correo"></label>
                    <label>
                        <span>Evento</span>
                        <select name="etype">
                            <option value="all">Todos</option>
                            <?php foreach (['page.view', 'auth.login', 'auth.register', 'admin.user.update', 'admin.user.toggle', 'admin.user.delete', 'admin.backup.create', 'admin.mail.template.save', 'admin.mail.template.generate', 'admin.mail.template.test', 'admin.mail.list.save', 'admin.mail.campaign.send'] as $type): ?>
                                <option value="<?php echo e($type); ?>" <?php echo ((string) ($eventFilters['event_type'] ?? '') === $type) ? 'selected' : ''; ?>><?php echo e($type); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        <span>Resultado</span>
                        <select name="eoutcome">
                            <option value="all">Todos</option>
                            <?php foreach (['view', 'success', 'failed', 'blocked', 'validation_error', 'captcha_failed', 'rate_limited', 'sent', 'sent_with_errors'] as $outcome): ?>
                                <option value="<?php echo e($outcome); ?>" <?php echo ((string) ($eventFilters['outcome'] ?? '') === $outcome) ? 'selected' : ''; ?>><?php echo e($outcome); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <div class="toolbar"><button type="submit" class="btn-primary">Filtrar</button></div>
                </form>
                <div class="admin-events-list">
                    <?php foreach ($eventsRows as $event): ?>
                        <article class="admin-event-card">
                            <div class="admin-event-head">
                                <strong><?php echo e((string) ($event['event_type'] ?? 'event')); ?></strong>
                                <span class="admin-outcome-pill"><?php echo e((string) ($event['outcome'] ?? '')); ?></span>
                            </div>
                            <small class="muted"><?php echo e((string) ($event['created_at'] ?? '')); ?> · <?php echo e((string) ($event['route'] ?? '')); ?></small>
                            <small class="muted"><?php echo e((string) ($event['email'] ?? '')); ?> · IP <?php echo e((string) ($event['ip_address'] ?? '')); ?></small>
                            <?php if (!empty($event['referrer'])): ?><small class="muted">Referrer: <?php echo e((string) $event['referrer']); ?></small><?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
                <div class="admin-pagination">
                    <?php for ($page = 1; $page <= $eventsPagesTotal; $page++): ?>
                        <?php if ($page === $eventsCurrentPage): ?>
                            <span class="admin-page-pill is-active"><?php echo $page; ?></span>
                        <?php elseif ($page === 1 || $page === $eventsPagesTotal || abs($page - $eventsCurrentPage) <= 1): ?>
                            <a class="admin-page-pill" href="<?php echo e($buildAdminUrl(['epage' => $page])); ?>"><?php echo $page; ?></a>
                        <?php elseif ($page === 2 && $eventsCurrentPage > 3): ?>
                            <span class="admin-page-gap">...</span>
                        <?php elseif ($page === $eventsPagesTotal - 1 && $eventsCurrentPage < $eventsPagesTotal - 2): ?>
                            <span class="admin-page-gap">...</span>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </section>
            <section class="card admin-logs-panel">
                <div class="admin-section-head">
                    <div>
                        <strong>Logs del sistema</strong>
                        <small class="muted">Visor de archivos dentro de <code>storage/logs</code>.</small>
                    </div>
                </div>
                <form method="get" class="settings-grid admin-log-form">
                    <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                    <input type="hidden" name="uq" value="<?php echo e((string) ($userFilters['q'] ?? '')); ?>">
                    <input type="hidden" name="ustatus" value="<?php echo e((string) ($userFilters['status'] ?? 'all')); ?>">
                    <input type="hidden" name="upage" value="<?php echo $usersCurrentPage; ?>">
                    <input type="hidden" name="eq" value="<?php echo e((string) ($eventFilters['q'] ?? '')); ?>">
                    <input type="hidden" name="etype" value="<?php echo e((string) ($eventFilters['event_type'] ?? 'all')); ?>">
                    <input type="hidden" name="eoutcome" value="<?php echo e((string) ($eventFilters['outcome'] ?? 'all')); ?>">
                    <input type="hidden" name="epage" value="<?php echo $eventsCurrentPage; ?>">
                    <input type="hidden" name="bpage" value="<?php echo $backupsCurrentPage; ?>">
                    <input type="hidden" name="campaign_log" value="<?php echo (int) $selectedCampaignId; ?>">
                    <label>
                        <span>Archivo</span>
                        <select name="log">
                            <?php foreach ($logs as $log): ?>
                                <option value="<?php echo e((string) ($log['name'] ?? '')); ?>" <?php echo ((string) ($log['name'] ?? '') === (string) $selectedLog) ? 'selected' : ''; ?>><?php echo e((string) ($log['name'] ?? '')); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <div class="toolbar"><button type="submit" class="btn-light">Cargar</button></div>
                </form>
                <pre class="admin-log-view"><?php echo e((string) $logContent); ?></pre>
            </section>
        </aside>
    </div>

    <div class="admin-grid admin-mail-grid">
        <section class="card admin-backups-panel">
            <div class="admin-section-head">
                <div><strong>Backups diarios</strong><small class="muted">Se genera uno por día al iniciar sesión y también puedes crear uno manual.</small></div>
                <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.backups.create"><?php echo csrf_field(); ?><button type="submit" class="btn-primary">Crear backup ahora</button></form>
            </div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Fecha</th><th>Archivo</th><th>Tamaño</th><th>Origen</th><th></th></tr></thead>
                    <tbody>
                        <?php foreach ($backupsRows as $backup): ?>
                            <tr>
                                <td><?php echo e((string) ($backup['backup_date'] ?? '')); ?><small class="muted"><?php echo e((string) ($backup['created_at'] ?? '')); ?></small></td>
                                <td><strong><?php echo e((string) ($backup['file_name'] ?? '')); ?></strong><small class="muted"><?php echo e((string) ($backup['checksum'] ?? '')); ?></small></td>
                                <td><?php echo number_format(((int) ($backup['size_bytes'] ?? 0)) / 1024, 1); ?> KB</td>
                                <td><?php echo e((string) ($backup['trigger_type'] ?? '')); ?><small class="muted"><?php echo e((string) ($backup['triggered_by_email'] ?? '')); ?></small></td>
                                <td><a class="btn-light" href="?route=<?php echo e($adminActionRouteBase); ?>.backups.download&amp;id=<?php echo (int) ($backup['id'] ?? 0); ?>">Descargar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin-pagination">
                <?php for ($page = 1; $page <= $backupsPagesTotal; $page++): ?>
                    <?php if ($page === $backupsCurrentPage): ?>
                        <span class="admin-page-pill is-active"><?php echo $page; ?></span>
                    <?php elseif ($page === 1 || $page === $backupsPagesTotal || abs($page - $backupsCurrentPage) <= 1): ?>
                        <a class="admin-page-pill" href="<?php echo e($buildAdminUrl(['bpage' => $page])); ?>"><?php echo $page; ?></a>
                    <?php elseif ($page === 2 && $backupsCurrentPage > 3): ?>
                        <span class="admin-page-gap">...</span>
                    <?php elseif ($page === $backupsPagesTotal - 1 && $backupsCurrentPage < $backupsPagesTotal - 2): ?>
                        <span class="admin-page-gap">...</span>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </section>

        <section class="card admin-template-panel">
            <div class="admin-section-head">
                <div><strong>Plantillas de correo</strong><small class="muted">Editor visual con HTML/CSS, imágenes, vista previa, IA y envío de prueba.</small></div>
            </div>
            <div class="admin-template-workbench">
                <aside class="admin-template-sidebar">
                    <section class="admin-template-sidebar-card">
                        <strong>Plantillas guardadas</strong>
                        <div class="admin-template-list">
                            <?php foreach ($templatesRows as $template): ?>
                                <button type="button" class="btn-light admin-template-load" data-template='<?php echo e(app_json_safe($template)); ?>'><?php echo e((string) ($template['name'] ?? 'Plantilla')); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <section class="admin-template-sidebar-card">
                        <strong>Variables disponibles</strong>
                        <div class="admin-variable-list">
                            <?php foreach ($mailTemplateVariables as $token): ?>
                                <button type="button" class="btn-light admin-token-btn" data-token="<?php echo e($token); ?>"><?php echo e($token); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <section class="admin-template-sidebar-card">
                        <strong>Bloques rápidos</strong>
                        <div class="admin-variable-list">
                            <button type="button" class="btn-light admin-block-btn" data-block="hero">Hero</button>
                            <button type="button" class="btn-light admin-block-btn" data-block="card">Tarjeta</button>
                            <button type="button" class="btn-light admin-block-btn" data-block="cta">Botón CTA</button>
                            <button type="button" class="btn-light admin-block-btn" data-block="divider">Separador</button>
                            <button type="button" class="btn-light admin-block-btn" data-block="events">Eventos</button>
                        </div>
                    </section>
                </aside>

                <div class="admin-template-main">
                    <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.mail.templates.save" class="admin-template-form" id="mailTemplateForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="mailTemplateId" value="0">
                        <input type="file" id="mailTemplateImageUpload" accept="image/*" class="hidden">

                        <div class="settings-grid">
                            <label><span>Clave</span><input type="text" name="template_key" id="mailTemplateKey" placeholder="welcome_default"></label>
                            <label><span>Nombre</span><input type="text" name="name" id="mailTemplateName" placeholder="Nombre interno"></label>
                            <label><span>Categoría</span><select name="category" id="mailTemplateCategory"><option value="welcome">Bienvenida</option><option value="campaign">Campaña / noticias</option></select></label>
                            <label class="admin-checkline"><input type="checkbox" name="enabled" id="mailTemplateEnabled" checked><span>Habilitada</span></label>
                        </div>

                        <label><span>Asunto</span><input type="text" name="subject_template" id="mailTemplateSubject" placeholder="Asunto con variables"></label>

                        <div class="admin-template-tabs" id="mailTemplateTabs">
                            <button type="button" class="admin-template-tab is-active" data-tab="visual">Visual</button>
                            <button type="button" class="admin-template-tab" data-tab="code">Código</button>
                            <button type="button" class="admin-template-tab" data-tab="preview">Vista previa</button>
                            <button type="button" class="admin-template-tab" data-tab="ai">IA y prueba</button>
                        </div>

                        <section class="admin-template-panel-body is-active" data-panel="visual">
                            <div class="admin-editor-toolbar">
                                <button type="button" class="btn-light admin-editor-cmd" data-cmd="bold"><strong>B</strong></button>
                                <button type="button" class="btn-light admin-editor-cmd" data-cmd="italic"><em>I</em></button>
                                <button type="button" class="btn-light admin-editor-cmd" data-cmd="underline"><u>U</u></button>
                                <button type="button" class="btn-light admin-editor-block" data-block-tag="h1">H1</button>
                                <button type="button" class="btn-light admin-editor-block" data-block-tag="h2">H2</button>
                                <button type="button" class="btn-light admin-editor-block" data-block-tag="p">Párrafo</button>
                                <button type="button" class="btn-light admin-editor-cmd" data-cmd="insertUnorderedList">Lista</button>
                                <button type="button" class="btn-light admin-editor-cmd" data-cmd="insertOrderedList">1.2.3</button>
                                <button type="button" class="btn-light" id="mailTemplateInsertLink">Enlace</button>
                                <button type="button" class="btn-light" id="mailTemplateInsertImageUrl">Imagen URL</button>
                                <button type="button" class="btn-light" id="mailTemplateInsertImageFile">Subir imagen</button>
                                <button type="button" class="btn-light" id="mailTemplateClearFormat">Limpiar</button>
                            </div>
                            <div class="admin-template-visual-wrap">
                                <div id="mailTemplateVisual" class="admin-template-visual" contenteditable="true"></div>
                            </div>
                        </section>

                        <section class="admin-template-panel-body" data-panel="code">
                            <div class="admin-template-code-grid">
                                <label><span>CSS</span><textarea name="css_template" id="mailTemplateCss" rows="12" placeholder="CSS para el correo"></textarea></label>
                                <label><span>HTML fuente</span><textarea name="html_template" id="mailTemplateHtml" rows="18" placeholder="HTML del correo"></textarea></label>
                                <label class="admin-template-full"><span>Texto plano</span><textarea name="text_template" id="mailTemplateText" rows="10" placeholder="Versión texto"></textarea></label>
                            </div>
                        </section>

                        <section class="admin-template-panel-body" data-panel="preview">
                            <div class="admin-template-preview-wrap">
                                <strong>Vista previa</strong>
                                <iframe id="mailTemplatePreview" class="admin-template-preview" title="Vista previa de plantilla"></iframe>
                            </div>
                        </section>

                        <section class="admin-template-panel-body" data-panel="ai">
                            <div class="admin-template-ai-grid">
                                <div class="settings-grid">
                                    <label><span>Objetivo</span><input type="text" id="mailAiGoal" placeholder="Qué debe lograr este correo"></label>
                                    <label><span>Audiencia</span><input type="text" id="mailAiAudience" placeholder="A quién va dirigido"></label>
                                    <label><span>Tono</span><input type="text" id="mailAiTone" placeholder="Pastoral, cercano, institucional..."></label>
                                    <label><span>CTA principal</span><input type="text" id="mailAiCta" placeholder="Entrar a BIBLIASOFT"></label>
                                    <label class="admin-checkline"><input type="checkbox" id="mailAiIncludeEvents"><span>Incluir bloque de eventos</span></label>
                                </div>
                                <label><span>Instrucción adicional para IA</span><textarea id="mailAiPrompt" rows="5" placeholder="Ejemplo: usar tono familiar, resaltar discipulado, incluir invitación a evento presencial..."></textarea></label>
                                <div class="settings-grid">
                                    <label><span>Correo de prueba</span><input type="email" id="mailTemplateTestEmail" value="<?php echo e((string) $userEmail); ?>" placeholder="correo@dominio.com"></label>
                                    <label><span>Nombre de prueba</span><input type="text" id="mailTemplateTestName" value="Juan Pérez"></label>
                                    <label><span>Ministerio de prueba</span><input type="text" id="mailTemplateTestMinistry" value="Equipo pastoral"></label>
                                </div>
                                <div class="toolbar admin-template-ai-actions">
                                    <button type="button" class="btn-light" id="mailTemplateGenerateAi">Crear con IA</button>
                                    <button type="button" class="btn-light" id="mailTemplateSendTest">Enviar prueba</button>
                                </div>
                                <div id="mailTemplateStatus" class="admin-template-status muted">Desde aquí puedes generar un borrador completo con IA o enviar una prueba del diseño actual.</div>
                            </div>
                        </section>

                        <div class="toolbar admin-template-footer">
                            <button type="button" class="btn-light" id="mailTemplateReset">Nueva plantilla</button>
                            <button type="button" class="btn-light" id="mailTemplateOpenPreview">Abrir vista previa</button>
                            <button type="submit" class="btn-primary">Guardar plantilla</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <div class="admin-grid admin-mail-grid">
        <section class="card admin-list-panel">
            <div class="admin-section-head">
                <div><strong>Listas de envío</strong><small class="muted">Define grupos por usuarios activos, por ministerio o por correos manuales.</small></div>
            </div>
            <div class="admin-template-list">
                <?php foreach ($mailingListsRows as $list): ?>
                    <button type="button" class="btn-light admin-list-load" data-list='<?php echo e(app_json_safe($list)); ?>'><?php echo e((string) ($list['name'] ?? 'Lista')); ?></button>
                <?php endforeach; ?>
            </div>
            <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.mail.lists.save" class="admin-template-form">
                <?php echo csrf_field(); ?><input type="hidden" name="id" id="mailListId" value="0">
                <div class="settings-grid">
                    <label><span>Nombre</span><input type="text" name="name" id="mailListName" placeholder="Intercesores, líderes, etc."></label>
                    <label><span>Tipo de lista</span><select name="list_type" id="mailListType"><option value="all_active">Todos los activos</option><option value="ministry">Por ministerio</option><option value="manual">Manual por correos</option></select></label>
                    <label class="admin-checkline"><input type="checkbox" name="active_only" id="mailListActiveOnly" checked><span>Sólo usuarios activos</span></label>
                </div>
                <label><span>Descripción</span><textarea name="description" id="mailListDescription" rows="4"></textarea></label>
                <label><span>Filtro por ministerio</span><input type="text" name="ministry_filter" id="mailListMinistry" placeholder="Alabanza, jóvenes, intercesión..."></label>
                <label><span>Correos manuales</span><textarea name="manual_emails" id="mailListEmails" rows="6" placeholder="uno@dominio.com&#10;otro@dominio.com"></textarea></label>
                <div class="toolbar"><button type="button" class="btn-light" id="mailListReset">Nueva lista</button><button type="submit" class="btn-primary">Guardar lista</button></div>
            </form>
        </section>

        <section class="card admin-campaign-panel">
            <div class="admin-section-head">
                <div><strong>Campañas y noticias</strong><small class="muted">Crea boletines, elige plantilla y lista, guarda borradores y envía.</small></div>
            </div>
            <div class="admin-template-list">
                <?php foreach ($campaignRows as $campaign): ?>
                    <button type="button" class="btn-light admin-campaign-load" data-campaign='<?php echo e(app_json_safe($campaign)); ?>'><?php echo e((string) ($campaign['name'] ?? 'Campaña')); ?></button>
                <?php endforeach; ?>
            </div>
            <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.mail.campaigns.save" class="admin-template-form">
                <?php echo csrf_field(); ?><input type="hidden" name="campaign_id" id="campaignId" value="0">
                <div class="settings-grid">
                    <label><span>Nombre de campaña</span><input type="text" name="campaign_name" id="campaignName" placeholder="Boletín semanal"></label>
                    <label><span>Plantilla</span><select name="template_id" id="campaignTemplateId"><option value="">Selecciona plantilla</option><?php foreach ($templatesRows as $template): ?><?php if ((string) ($template['category'] ?? '') !== 'campaign') { continue; } ?><option value="<?php echo (int) ($template['id'] ?? 0); ?>"><?php echo e((string) ($template['name'] ?? 'Plantilla')); ?></option><?php endforeach; ?></select></label>
                    <label><span>Lista de envío</span><select name="list_id" id="campaignListId"><option value="">Selecciona lista</option><?php foreach ($mailingListsRows as $list): ?><option value="<?php echo (int) ($list['id'] ?? 0); ?>"><?php echo e((string) ($list['name'] ?? 'Lista')); ?></option><?php endforeach; ?></select></label>
                </div>
                <label><span>Asunto opcional</span><input type="text" name="subject_override" id="campaignSubject" placeholder="Si lo dejas vacío usa el asunto de la plantilla"></label>
                <label><span>Contenido HTML</span><textarea name="content_html" id="campaignHtml" rows="10" placeholder="<p>Contenido principal del boletín...</p>"></textarea></label>
                <label><span>Contenido texto plano</span><textarea name="content_text" id="campaignText" rows="6" placeholder="Versión texto del boletín"></textarea></label>
                <div class="toolbar"><button type="button" class="btn-light" id="campaignReset">Nueva campaña</button><button type="submit" class="btn-primary">Guardar borrador</button><button type="submit" class="btn-danger" formaction="?route=<?php echo e($adminActionRouteBase); ?>.mail.campaigns.send">Enviar ahora</button></div>
            </form>
            <div class="admin-events-list">
                <?php foreach ($campaignLogsRows as $row): ?>
                    <article class="admin-event-card">
                        <div class="admin-event-head"><strong><?php echo e((string) ($row['email'] ?? '')); ?></strong><span class="admin-outcome-pill"><?php echo e((string) ($row['outcome'] ?? '')); ?></span></div>
                        <small class="muted"><?php echo e((string) ($row['sent_at'] ?? '')); ?></small>
                        <?php if (!empty($row['error_message'])): ?><small class="muted"><?php echo e((string) $row['error_message']); ?></small><?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</section>

<dialog id="adminUserDialog" class="admin-dialog">
    <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.users.update" class="admin-dialog-body">
        <?php echo csrf_field(); ?><input type="hidden" name="id" id="adminEditId">
        <div class="admin-dialog-head"><strong>Editar usuario</strong><button type="button" class="btn-light js-dialog-close">Cerrar</button></div>
        <div class="settings-grid">
            <label><span>Nombre completo</span><input type="text" name="full_name" id="adminEditFullName" required></label>
            <label><span>Correo</span><input type="email" name="email" id="adminEditEmail" required></label>
            <label><span>Ministerio</span><input type="text" name="ministry" id="adminEditMinistry"></label>
            <label><span>Nueva contraseña</span><input type="password" name="password" minlength="6" placeholder="Opcional"></label>
        </div>
        <div class="toolbar admin-dialog-actions"><button type="submit" class="btn-primary">Guardar cambios</button></div>
    </form>
</dialog>

<dialog id="adminConfirmDialog" class="admin-dialog">
    <form method="post" id="adminConfirmForm" class="admin-dialog-body">
        <?php echo csrf_field(); ?><input type="hidden" name="id" id="adminConfirmId"><input type="hidden" name="active" id="adminConfirmActive">
        <div class="admin-dialog-head"><strong id="adminConfirmTitle">Confirmar acción</strong><button type="button" class="btn-light js-dialog-close">Cerrar</button></div>
        <p id="adminConfirmText" class="muted"></p>
        <div class="toolbar admin-dialog-actions"><button type="submit" id="adminConfirmSubmit" class="btn-danger">Confirmar</button></div>
    </form>
</dialog>

<script>
(function () {
    var editDialog = document.getElementById('adminUserDialog');
    var confirmDialog = document.getElementById('adminConfirmDialog');
    var editId = document.getElementById('adminEditId');
    var editEmail = document.getElementById('adminEditEmail');
    var editFullName = document.getElementById('adminEditFullName');
    var editMinistry = document.getElementById('adminEditMinistry');
    var confirmForm = document.getElementById('adminConfirmForm');
    var confirmId = document.getElementById('adminConfirmId');
    var confirmActive = document.getElementById('adminConfirmActive');
    var confirmTitle = document.getElementById('adminConfirmTitle');
    var confirmText = document.getElementById('adminConfirmText');
    var confirmSubmit = document.getElementById('adminConfirmSubmit');
    var templateForm = {id: document.getElementById('mailTemplateId'), key: document.getElementById('mailTemplateKey'), name: document.getElementById('mailTemplateName'), category: document.getElementById('mailTemplateCategory'), enabled: document.getElementById('mailTemplateEnabled'), subject: document.getElementById('mailTemplateSubject'), css: document.getElementById('mailTemplateCss'), html: document.getElementById('mailTemplateHtml'), text: document.getElementById('mailTemplateText')};
    var templatePreview = document.getElementById('mailTemplatePreview');
    var listForm = {id: document.getElementById('mailListId'), name: document.getElementById('mailListName'), description: document.getElementById('mailListDescription'), type: document.getElementById('mailListType'), ministry: document.getElementById('mailListMinistry'), emails: document.getElementById('mailListEmails'), activeOnly: document.getElementById('mailListActiveOnly')};
    var campaignForm = {id: document.getElementById('campaignId'), name: document.getElementById('campaignName'), templateId: document.getElementById('campaignTemplateId'), listId: document.getElementById('campaignListId'), subject: document.getElementById('campaignSubject'), html: document.getElementById('campaignHtml'), text: document.getElementById('campaignText')};
    function showDialog(dialog) { if (dialog && typeof dialog.showModal === 'function') { dialog.showModal(); } }
    document.querySelectorAll('.js-admin-edit').forEach(function (btn) { btn.addEventListener('click', function () { editId.value = this.getAttribute('data-id') || ''; editEmail.value = this.getAttribute('data-email') || ''; editFullName.value = this.getAttribute('data-full-name') || ''; editMinistry.value = this.getAttribute('data-ministry') || ''; showDialog(editDialog); }); });
    document.querySelectorAll('.js-admin-toggle').forEach(function (btn) { btn.addEventListener('click', function () { var active = String(this.getAttribute('data-active') || '1') === '1'; var name = this.getAttribute('data-name') || 'usuario'; var email = this.getAttribute('data-email') || ''; confirmForm.setAttribute('action', '?route=<?php echo e($adminActionRouteBase); ?>.users.toggle'); confirmId.value = this.getAttribute('data-id') || ''; confirmActive.value = active ? '0' : '1'; confirmTitle.textContent = active ? 'Desactivar usuario' : 'Activar usuario'; confirmText.textContent = (active ? 'Se desactivará ' : 'Se activará ') + name + (email ? ' (' + email + ')' : '') + '.'; confirmSubmit.className = active ? 'btn-danger' : 'btn-primary'; confirmSubmit.textContent = active ? 'Desactivar' : 'Activar'; showDialog(confirmDialog); }); });
    document.querySelectorAll('.js-admin-delete').forEach(function (btn) { btn.addEventListener('click', function () { var name = this.getAttribute('data-name') || 'usuario'; var email = this.getAttribute('data-email') || ''; confirmForm.setAttribute('action', '?route=<?php echo e($adminActionRouteBase); ?>.users.delete'); confirmId.value = this.getAttribute('data-id') || ''; confirmActive.value = ''; confirmTitle.textContent = 'Eliminar usuario'; confirmText.textContent = 'Se eliminará ' + name + (email ? ' (' + email + ')' : '') + '. Esta acción no se puede deshacer.'; confirmSubmit.className = 'btn-danger'; confirmSubmit.textContent = 'Eliminar'; showDialog(confirmDialog); }); });
    document.querySelectorAll('.js-dialog-close').forEach(function (btn) { btn.addEventListener('click', function () { if (editDialog.open) { editDialog.close(); } if (confirmDialog.open) { confirmDialog.close(); } }); });
    function refreshTemplatePreview() { if (!templatePreview) { return; } var subject = templateForm.subject.value || 'Vista previa'; var css = templateForm.css.value || ''; var html = templateForm.html.value || ''; var sample = {'{{full_name}}':'Juan Pérez','{{email}}':'juan@example.com','{{ministry}}':'Alabanza','{{ministry_line}}':'Ministerio: Alabanza','{{campaign_name}}':'Boletín semanal','{{content_html}}':'<p>Este es un bloque de prueba para la campaña.</p>','{{content_text}}':'Este es un bloque de prueba para la campaña.','{{app_short}}':'BIBLIASOFT','{{app_name}}':'Biblia para todos','{{church_name}}':'Fundación La Iglesia en la Calle','{{website_url}}':'https://www.laiglesiaenlacalle.co','{{access_url}}':'https://biblia.laiglesiaenlacalle.co'}; Object.keys(sample).forEach(function (token) { html = html.split(token).join(sample[token]); }); var doc = templatePreview.contentDocument || templatePreview.contentWindow.document; doc.open(); doc.write('<!doctype html><html><head><meta charset="utf-8"><title>' + subject + '</title><style>' + css + '</style></head><body>' + html + '</body></html>'); doc.close(); }
    function resetTemplateForm() { templateForm.id.value = '0'; templateForm.key.value = ''; templateForm.name.value = ''; templateForm.category.value = 'campaign'; templateForm.enabled.checked = true; templateForm.subject.value = ''; templateForm.css.value = ''; templateForm.html.value = ''; templateForm.text.value = ''; refreshTemplatePreview(); }
    document.querySelectorAll('.admin-template-load').forEach(function (btn) { btn.addEventListener('click', function () { var row = {}; try { row = JSON.parse(this.getAttribute('data-template') || '{}'); } catch (err) {} templateForm.id.value = row.id || 0; templateForm.key.value = row.template_key || ''; templateForm.name.value = row.name || ''; templateForm.category.value = row.category || 'campaign'; templateForm.enabled.checked = Number(row.enabled || 0) === 1; templateForm.subject.value = row.subject_template || ''; templateForm.css.value = row.css_template || ''; templateForm.html.value = row.html_template || ''; templateForm.text.value = row.text_template || ''; refreshTemplatePreview(); }); });
    document.getElementById('mailTemplateReset')?.addEventListener('click', resetTemplateForm);
    [templateForm.subject, templateForm.css, templateForm.html, templateForm.text].forEach(function (field) { if (field) { field.addEventListener('input', refreshTemplatePreview); } });
    document.querySelectorAll('.admin-token-btn').forEach(function (btn) { btn.addEventListener('click', function () { var token = this.getAttribute('data-token') || ''; var target = templateForm.html; if (document.activeElement && /^(INPUT|TEXTAREA)$/.test(document.activeElement.tagName)) { target = document.activeElement; } var start = target.selectionStart || 0; var end = target.selectionEnd || 0; var value = target.value || ''; target.value = value.slice(0, start) + token + value.slice(end); target.focus(); target.selectionStart = target.selectionEnd = start + token.length; refreshTemplatePreview(); }); });
    function resetListForm() { listForm.id.value = '0'; listForm.name.value = ''; listForm.description.value = ''; listForm.type.value = 'all_active'; listForm.ministry.value = ''; listForm.emails.value = ''; listForm.activeOnly.checked = true; }
    document.querySelectorAll('.admin-list-load').forEach(function (btn) { btn.addEventListener('click', function () { var row = {}; try { row = JSON.parse(this.getAttribute('data-list') || '{}'); } catch (err) {} listForm.id.value = row.id || 0; listForm.name.value = row.name || ''; listForm.description.value = row.description || ''; listForm.type.value = row.list_type || 'all_active'; listForm.ministry.value = row.ministry_filter || ''; listForm.emails.value = row.manual_emails || ''; listForm.activeOnly.checked = Number(row.active_only || 0) === 1; }); });
    document.getElementById('mailListReset')?.addEventListener('click', resetListForm);
    function resetCampaignForm() { campaignForm.id.value = '0'; campaignForm.name.value = ''; campaignForm.templateId.value = ''; campaignForm.listId.value = ''; campaignForm.subject.value = ''; campaignForm.html.value = ''; campaignForm.text.value = ''; }
    document.querySelectorAll('.admin-campaign-load').forEach(function (btn) { btn.addEventListener('click', function () { var row = {}; try { row = JSON.parse(this.getAttribute('data-campaign') || '{}'); } catch (err) {} campaignForm.id.value = row.id || 0; campaignForm.name.value = row.name || ''; campaignForm.templateId.value = row.template_id || ''; campaignForm.listId.value = row.list_id || ''; campaignForm.subject.value = row.subject_override || ''; campaignForm.html.value = row.content_html || ''; campaignForm.text.value = row.content_text || ''; }); });
    document.getElementById('campaignReset')?.addEventListener('click', resetCampaignForm);
    refreshTemplatePreview();
})();
</script>
<script>
(function () {
    var csrfToken = <?php echo json_encode((string) $csrfToken); ?>;
    var adminActionBase = <?php echo json_encode((string) $adminActionRouteBase); ?>;
    var templateForm = {
        form: document.getElementById('mailTemplateForm'),
        id: document.getElementById('mailTemplateId'),
        key: document.getElementById('mailTemplateKey'),
        name: document.getElementById('mailTemplateName'),
        category: document.getElementById('mailTemplateCategory'),
        enabled: document.getElementById('mailTemplateEnabled'),
        subject: document.getElementById('mailTemplateSubject'),
        css: document.getElementById('mailTemplateCss'),
        html: document.getElementById('mailTemplateHtml'),
        text: document.getElementById('mailTemplateText'),
        visual: document.getElementById('mailTemplateVisual'),
        preview: document.getElementById('mailTemplatePreview'),
        tabs: document.querySelectorAll('.admin-template-tab'),
        panels: document.querySelectorAll('.admin-template-panel-body'),
        status: document.getElementById('mailTemplateStatus'),
        imageUpload: document.getElementById('mailTemplateImageUpload'),
        aiGoal: document.getElementById('mailAiGoal'),
        aiAudience: document.getElementById('mailAiAudience'),
        aiTone: document.getElementById('mailAiTone'),
        aiCta: document.getElementById('mailAiCta'),
        aiPrompt: document.getElementById('mailAiPrompt'),
        aiIncludeEvents: document.getElementById('mailAiIncludeEvents'),
        testEmail: document.getElementById('mailTemplateTestEmail'),
        testName: document.getElementById('mailTemplateTestName'),
        testMinistry: document.getElementById('mailTemplateTestMinistry'),
        reset: document.getElementById('mailTemplateReset'),
        openPreview: document.getElementById('mailTemplateOpenPreview'),
        generateAi: document.getElementById('mailTemplateGenerateAi'),
        sendTest: document.getElementById('mailTemplateSendTest'),
        insertLink: document.getElementById('mailTemplateInsertLink'),
        insertImageUrl: document.getElementById('mailTemplateInsertImageUrl'),
        insertImageFile: document.getElementById('mailTemplateInsertImageFile'),
        clearFormat: document.getElementById('mailTemplateClearFormat')
    };
    var sample = {
        '{{full_name}}': 'Juan Pérez',
        '{{email}}': 'juan@example.com',
        '{{ministry}}': 'Alabanza',
        '{{ministry_line}}': 'Ministerio: Alabanza',
        '{{campaign_name}}': 'Boletín semanal',
        '{{content_html}}': '<p>Este es un bloque de prueba para el boletín.</p>',
        '{{content_text}}': 'Este es un bloque de prueba para el boletín.',
        '{{app_short}}': 'BIBLIASOFT',
        '{{app_name}}': 'Biblia para todos',
        '{{church_name}}': 'Fundación La Iglesia en la Calle',
        '{{website_url}}': 'https://www.laiglesiaenlacalle.co',
        '{{access_url}}': 'https://biblia.laiglesiaenlacalle.co'
    };

    if (!templateForm.form || !templateForm.visual || !templateForm.html) {
        return;
    }

    function setStatus(message, tone) {
        if (!templateForm.status) {
            return;
        }
        templateForm.status.className = 'admin-template-status';
        if (tone) {
            templateForm.status.classList.add('is-' + tone);
        } else {
            templateForm.status.classList.add('muted');
        }
        templateForm.status.textContent = message || '';
    }

    function activateTab(name) {
        Array.prototype.forEach.call(templateForm.tabs || [], function (tab) {
            tab.classList.toggle('is-active', tab.getAttribute('data-tab') === name);
        });
        Array.prototype.forEach.call(templateForm.panels || [], function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-panel') === name);
        });
        if (name === 'preview') {
            refreshPreview();
        }
    }

    function syncVisualFromSource() {
        templateForm.visual.innerHTML = templateForm.html.value || '<p>Empieza aquí tu plantilla HTML.</p>';
    }

    function syncSourceFromVisual() {
        templateForm.html.value = templateForm.visual.innerHTML || '';
    }

    function replaceTokens(raw) {
        var result = String(raw || '');
        Object.keys(sample).forEach(function (token) {
            result = result.split(token).join(sample[token]);
        });
        return result;
    }

    function refreshPreview() {
        if (!templateForm.preview) {
            return;
        }
        syncSourceFromVisual();
        var doc = templateForm.preview.contentDocument || templateForm.preview.contentWindow.document;
        doc.open();
        doc.write('<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>' + (templateForm.subject.value || 'Vista previa') + '</title><style>' + (templateForm.css.value || '') + '</style></head><body>' + replaceTokens(templateForm.html.value || '') + '</body></html>');
        doc.close();
    }

    function insertTextAtCursor(input, text) {
        var value = input.value || '';
        var start = input.selectionStart || 0;
        var end = input.selectionEnd || 0;
        input.value = value.slice(0, start) + text + value.slice(end);
        input.focus();
        input.selectionStart = input.selectionEnd = start + text.length;
    }

    function insertHtml(html) {
        templateForm.visual.focus();
        document.execCommand('insertHTML', false, html);
        syncSourceFromVisual();
        refreshPreview();
    }

    function adminPost(route, payload) {
        return fetch('?route=' + encodeURIComponent(route), {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' },
            body: new URLSearchParams(payload).toString()
        }).then(function (res) { return res.json(); });
    }

    function collectPayload() {
        syncSourceFromVisual();
        return {
            id: templateForm.id.value || '0',
            template_key: templateForm.key.value || '',
            name: templateForm.name.value || '',
            category: templateForm.category.value || 'campaign',
            enabled: templateForm.enabled.checked ? '1' : '',
            subject_template: templateForm.subject.value || '',
            css_template: templateForm.css.value || '',
            html_template: templateForm.html.value || '',
            text_template: templateForm.text.value || ''
        };
    }

    function resetTemplate() {
        templateForm.id.value = '0';
        templateForm.key.value = '';
        templateForm.name.value = '';
        templateForm.category.value = 'campaign';
        templateForm.enabled.checked = true;
        templateForm.subject.value = '';
        templateForm.css.value = '';
        templateForm.html.value = '<div class="mail-wrap"><div class="mail-hero"><div class="mail-chip">Noticias y recursos</div><h1>{{campaign_name}}</h1><p>{{app_name}} · {{church_name}}</p></div><div class="mail-body"><p>Hola <strong>{{full_name}}</strong>,</p>{{content_html}}<p><a href="{{access_url}}" class="mail-cta">Entrar a {{app_short}}</a></p></div><div class="mail-footer">{{church_name}} · <a href="{{website_url}}">{{website_url}}</a></div></div>';
        templateForm.text.value = 'Hola {{full_name}},\n\n{{content_text}}\n\n{{church_name}}\n{{website_url}}\n{{access_url}}';
        templateForm.aiGoal.value = '';
        templateForm.aiAudience.value = '';
        templateForm.aiTone.value = '';
        templateForm.aiCta.value = '';
        templateForm.aiPrompt.value = '';
        templateForm.aiIncludeEvents.checked = false;
        syncVisualFromSource();
        refreshPreview();
        setStatus('Editor profesional listo. Puedes diseñar, generar con IA o enviar una prueba.', '');
    }

    function loadTemplate(row) {
        templateForm.id.value = row.id || 0;
        templateForm.key.value = row.template_key || '';
        templateForm.name.value = row.name || '';
        templateForm.category.value = row.category || 'campaign';
        templateForm.enabled.checked = Number(row.enabled || 0) === 1;
        templateForm.subject.value = row.subject_template || '';
        templateForm.css.value = row.css_template || '';
        templateForm.html.value = row.html_template || '';
        templateForm.text.value = row.text_template || '';
        syncVisualFromSource();
        refreshPreview();
        activateTab('visual');
        setStatus('Plantilla cargada en el editor.', 'success');
    }

    function generateWithAi() {
        setStatus('Generando borrador con IA...', 'loading');
        adminPost(adminActionBase + '.mail.templates.generate', {
            _csrf: csrfToken,
            category: templateForm.category.value || 'campaign',
            name: templateForm.name.value || '',
            goal: templateForm.aiGoal.value || '',
            audience: templateForm.aiAudience.value || '',
            tone: templateForm.aiTone.value || '',
            cta: templateForm.aiCta.value || '',
            extra_prompt: templateForm.aiPrompt.value || '',
            include_events: templateForm.aiIncludeEvents.checked ? '1' : ''
        }).then(function (res) {
            if (!res || res.error) {
                throw new Error((res && res.error) ? res.error : 'No se pudo generar la plantilla.');
            }
            loadTemplate(res.template || {});
            if (!templateForm.key.value && res.template && res.template.template_key) {
                templateForm.key.value = res.template.template_key;
            }
            setStatus('Borrador generado. Revisa visual, código y vista previa antes de guardar.', 'success');
        }).catch(function (err) {
            setStatus((err && err.message) ? err.message : 'No se pudo generar la plantilla.', 'error');
        });
    }

    function sendTest() {
        var payload = collectPayload();
        payload._csrf = csrfToken;
        payload.test_email = templateForm.testEmail.value || '';
        payload.test_name = templateForm.testName.value || '';
        payload.test_ministry = templateForm.testMinistry.value || '';
        setStatus('Enviando correo de prueba...', 'loading');
        adminPost(adminActionBase + '.mail.templates.test', payload).then(function (res) {
            if (!res || res.error) {
                throw new Error((res && res.error) ? res.error : 'No se pudo enviar la prueba.');
            }
            setStatus(res.message || 'Correo de prueba enviado.', 'success');
        }).catch(function (err) {
            setStatus((err && err.message) ? err.message : 'No se pudo enviar la prueba.', 'error');
        });
    }

    document.querySelectorAll('.admin-template-load').forEach(function (btn) {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var row = {};
            try {
                row = JSON.parse(this.getAttribute('data-template') || '{}');
            } catch (err) {
                row = {};
            }
            loadTemplate(row);
        }, true);
    });

    document.querySelectorAll('.admin-token-btn').forEach(function (btn) {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
            var token = this.getAttribute('data-token') || '';
            var active = document.activeElement;
            if (active && /^(INPUT|TEXTAREA)$/i.test(active.tagName)) {
                insertTextAtCursor(active, token);
                refreshPreview();
                return;
            }
            insertHtml(token);
        }, true);
    });

    document.querySelectorAll('.admin-block-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var block = this.getAttribute('data-block') || 'card';
            var snippets = {
                hero: '<section class="mail-card"><h2>{{campaign_name}}</h2><p>Resumen principal del mensaje, llamado pastoral y dirección clara para el lector.</p></section>',
                card: '<div class="mail-card"><h3>Título del bloque</h3><p>Contenido destacado con enfoque claro y aplicable.</p></div>',
                cta: '<p><a href="{{access_url}}" class="mail-cta">Ir ahora a {{app_short}}</a></p>',
                divider: '<hr style="border:none;border-top:1px solid #d8e5ee;margin:24px 0;">',
                events: '<div class="mail-card"><h3>Eventos y comunidad</h3><p>Próximamente compartiremos encuentros online y presenciales en tu ciudad.</p></div>'
            };
            insertHtml(snippets[block] || snippets.card);
        });
    });

    document.querySelectorAll('.admin-template-tab').forEach(function (btn) {
        btn.addEventListener('click', function () {
            activateTab(this.getAttribute('data-tab') || 'visual');
        });
    });

    document.querySelectorAll('.admin-editor-cmd').forEach(function (btn) {
        btn.addEventListener('click', function () {
            templateForm.visual.focus();
            document.execCommand(this.getAttribute('data-cmd') || '', false, null);
            syncSourceFromVisual();
            refreshPreview();
        });
    });

    document.querySelectorAll('.admin-editor-block').forEach(function (btn) {
        btn.addEventListener('click', function () {
            templateForm.visual.focus();
            document.execCommand('formatBlock', false, this.getAttribute('data-block-tag') || 'p');
            syncSourceFromVisual();
            refreshPreview();
        });
    });

    templateForm.insertLink?.addEventListener('click', function () {
        var url = window.prompt('URL del enlace', 'https://');
        if (!url) {
            return;
        }
        var text = window.prompt('Texto del enlace', 'Abrir recurso');
        insertHtml('<a href="' + String(url).replace(/"/g, '&quot;') + '">' + (text || url) + '</a>');
    });

    templateForm.insertImageUrl?.addEventListener('click', function () {
        var url = window.prompt('URL de la imagen', 'https://');
        if (!url) {
            return;
        }
        var alt = window.prompt('Texto alternativo', 'Imagen del correo');
        insertHtml('<p><img src="' + String(url).replace(/"/g, '&quot;') + '" alt="' + String(alt || '').replace(/"/g, '&quot;') + '" style="max-width:100%;border-radius:16px;display:block;"></p>');
    });

    templateForm.insertImageFile?.addEventListener('click', function () {
        templateForm.imageUpload?.click();
    });

    templateForm.imageUpload?.addEventListener('change', function () {
        var file = this.files && this.files[0] ? this.files[0] : null;
        if (!file) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (event) {
            var src = event.target && event.target.result ? String(event.target.result) : '';
            if (src) {
                insertHtml('<p><img src="' + src + '" alt="Imagen del correo" style="max-width:100%;border-radius:16px;display:block;"></p>');
            }
        };
        reader.readAsDataURL(file);
        templateForm.imageUpload.value = '';
    });

    templateForm.clearFormat?.addEventListener('click', function () {
        templateForm.visual.focus();
        document.execCommand('removeFormat', false, null);
        syncSourceFromVisual();
        refreshPreview();
    });

    templateForm.visual.addEventListener('input', function () {
        syncSourceFromVisual();
        refreshPreview();
    });

    [templateForm.subject, templateForm.css, templateForm.html, templateForm.text, templateForm.category, templateForm.name].forEach(function (field) {
        field?.addEventListener('input', function () {
            if (field === templateForm.html) {
                syncVisualFromSource();
            }
            refreshPreview();
        });
        field?.addEventListener('change', function () {
            if (field === templateForm.html) {
                syncVisualFromSource();
            }
            refreshPreview();
        });
    });

    templateForm.form.addEventListener('submit', function () {
        syncSourceFromVisual();
    });

    templateForm.reset?.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        resetTemplate();
    }, true);
    templateForm.openPreview?.addEventListener('click', function () { activateTab('preview'); });
    templateForm.generateAi?.addEventListener('click', generateWithAi);
    templateForm.sendTest?.addEventListener('click', sendTest);

    resetTemplate();
    activateTab('visual');
})();
</script>
