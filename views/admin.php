<?php
$usersRows = isset($usersPage['rows']) && is_array($usersPage['rows']) ? $usersPage['rows'] : [];
$usersCurrentPage = isset($usersPage['page']) ? (int) $usersPage['page'] : 1;
$usersPagesTotal = isset($usersPage['pages']) ? (int) $usersPage['pages'] : 1;
$eventsRows = isset($eventsPage['rows']) && is_array($eventsPage['rows']) ? $eventsPage['rows'] : [];
$eventsCurrentPage = isset($eventsPage['page']) ? (int) $eventsPage['page'] : 1;
$eventsPagesTotal = isset($eventsPage['pages']) ? (int) $eventsPage['pages'] : 1;
$dailyRows = isset($dashboard['daily']) && is_array($dashboard['daily']) ? $dashboard['daily'] : [];
$routeRows = isset($dashboard['routes']) && is_array($dashboard['routes']) ? $dashboard['routes'] : [];
$sourceRows = isset($dashboard['sources']) && is_array($dashboard['sources']) ? $dashboard['sources'] : [];
$dashboardTotals = isset($dashboard['totals']) && is_array($dashboard['totals']) ? $dashboard['totals'] : [];
$maxDaily = 1;
foreach ($dailyRows as $row) {
    $maxDaily = max($maxDaily, (int) ($row['total'] ?? 0));
}
$buildAdminUrl = static function (array $overrides = []) use ($adminRoute, $userFilters, $eventFilters, $selectedLog, $usersCurrentPage, $eventsCurrentPage) {
    $params = [
        'route' => $adminRoute,
        'uq' => (string) ($userFilters['q'] ?? ''),
        'ustatus' => (string) ($userFilters['status'] ?? 'all'),
        'upage' => $usersCurrentPage,
        'eq' => (string) ($eventFilters['q'] ?? ''),
        'etype' => (string) ($eventFilters['event_type'] ?? 'all'),
        'eoutcome' => (string) ($eventFilters['outcome'] ?? 'all'),
        'epage' => $eventsCurrentPage,
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
            <p class="muted">Usuarios, métricas, auditoría, accesos, registros y logs operativos del sistema.</p>
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
            <strong>Eventos 14 días</strong>
            <p><?php echo (int) ($dashboardTotals['total'] ?? 0); ?></p>
            <small class="muted">Login OK: <?php echo (int) ($dashboardTotals['login_success'] ?? 0); ?> · Registro OK: <?php echo (int) ($dashboardTotals['register_success'] ?? 0); ?></small>
        </article>
        <article class="card admin-metric-card">
            <strong>Intentos bloqueados</strong>
            <p><?php echo (int) (($dashboardTotals['login_fail'] ?? 0) + ($dashboardTotals['register_fail'] ?? 0)); ?></p>
            <small class="muted">Login fail: <?php echo (int) ($dashboardTotals['login_fail'] ?? 0); ?> · Registro fail: <?php echo (int) ($dashboardTotals['register_fail'] ?? 0); ?></small>
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
                    <small class="muted">Lista paginada y filtrable. Las acciones abren formularios compactos.</small>
                </div>
            </div>

            <form method="get" class="settings-grid admin-filter-form">
                <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                <input type="hidden" name="eq" value="<?php echo e((string) ($eventFilters['q'] ?? '')); ?>">
                <input type="hidden" name="etype" value="<?php echo e((string) ($eventFilters['event_type'] ?? 'all')); ?>">
                <input type="hidden" name="eoutcome" value="<?php echo e((string) ($eventFilters['outcome'] ?? 'all')); ?>">
                <input type="hidden" name="epage" value="<?php echo $eventsCurrentPage; ?>">
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
                        <tr>
                            <th>Usuario</th>
                            <th>Ministerio</th>
                            <th>Estado</th>
                            <th>Último acceso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersRows as $user): ?>
                            <?php
                            $userId = (int) ($user['id'] ?? 0);
                            $isActive = (int) ($user['active'] ?? 1) === 1;
                            $isSelf = $userId === auth_user_id();
                            ?>
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
                                        <button type="button"
                                            class="btn-light admin-icon-btn js-admin-edit"
                                            data-id="<?php echo $userId; ?>"
                                            data-email="<?php echo e((string) ($user['email'] ?? '')); ?>"
                                            data-full-name="<?php echo e((string) ($user['full_name'] ?? '')); ?>"
                                            data-ministry="<?php echo e((string) ($user['ministry'] ?? '')); ?>"
                                            title="Editar usuario">
                                            <img src="assets/icons/settings.svg" alt="" class="ico">
                                        </button>
                                        <button type="button"
                                            class="btn-light admin-icon-btn js-admin-toggle"
                                            data-id="<?php echo $userId; ?>"
                                            data-name="<?php echo e((string) ($user['full_name'] ?? $user['email'] ?? 'Usuario')); ?>"
                                            data-email="<?php echo e((string) ($user['email'] ?? '')); ?>"
                                            data-active="<?php echo $isActive ? '1' : '0'; ?>"
                                            <?php echo $isSelf ? 'disabled' : ''; ?>
                                            title="<?php echo $isActive ? 'Desactivar usuario' : 'Activar usuario'; ?>">
                                            <img src="assets/icons/lock.svg" alt="" class="ico">
                                        </button>
                                        <button type="button"
                                            class="btn-danger admin-icon-btn js-admin-delete"
                                            data-id="<?php echo $userId; ?>"
                                            data-name="<?php echo e((string) ($user['full_name'] ?? $user['email'] ?? 'Usuario')); ?>"
                                            data-email="<?php echo e((string) ($user['email'] ?? '')); ?>"
                                            <?php echo $isSelf ? 'disabled' : ''; ?>
                                            title="Eliminar usuario">
                                            <img src="assets/icons/trash.svg" alt="" class="ico">
                                        </button>
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
                        <small class="muted">Entradas, intentos de login/registro y acciones administrativas.</small>
                    </div>
                </div>

                <form method="get" class="settings-grid admin-filter-form">
                    <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                    <input type="hidden" name="uq" value="<?php echo e((string) ($userFilters['q'] ?? '')); ?>">
                    <input type="hidden" name="ustatus" value="<?php echo e((string) ($userFilters['status'] ?? 'all')); ?>">
                    <input type="hidden" name="upage" value="<?php echo $usersCurrentPage; ?>">
                    <input type="hidden" name="log" value="<?php echo e((string) $selectedLog); ?>">
                    <label>
                        <span>Buscar</span>
                        <input type="text" name="eq" value="<?php echo e((string) ($eventFilters['q'] ?? '')); ?>" placeholder="Evento, ruta, IP o correo">
                    </label>
                    <label>
                        <span>Evento</span>
                        <select name="etype">
                            <option value="all">Todos</option>
                            <?php foreach (['page.view', 'auth.login', 'auth.register', 'admin.user.update', 'admin.user.toggle', 'admin.user.delete'] as $type): ?>
                                <option value="<?php echo e($type); ?>" <?php echo ((string) ($eventFilters['event_type'] ?? '') === $type) ? 'selected' : ''; ?>><?php echo e($type); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        <span>Resultado</span>
                        <select name="eoutcome">
                            <option value="all">Todos</option>
                            <?php foreach (['view', 'success', 'failed', 'blocked', 'validation_error', 'captcha_failed', 'rate_limited'] as $outcome): ?>
                                <option value="<?php echo e($outcome); ?>" <?php echo ((string) ($eventFilters['outcome'] ?? '') === $outcome) ? 'selected' : ''; ?>><?php echo e($outcome); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <div class="toolbar">
                        <button type="submit" class="btn-primary">Filtrar</button>
                    </div>
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
                            <?php if (!empty($event['referrer'])): ?>
                                <small class="muted">Referrer: <?php echo e((string) $event['referrer']); ?></small>
                            <?php endif; ?>
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
                    <label>
                        <span>Archivo</span>
                        <select name="log">
                            <?php foreach ($logs as $log): ?>
                                <option value="<?php echo e((string) ($log['name'] ?? '')); ?>" <?php echo ((string) ($log['name'] ?? '') === (string) $selectedLog) ? 'selected' : ''; ?>>
                                    <?php echo e((string) ($log['name'] ?? '')); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <div class="toolbar">
                        <button type="submit" class="btn-light">Cargar</button>
                    </div>
                </form>
                <pre class="admin-log-view"><?php echo e((string) $logContent); ?></pre>
            </section>
        </aside>
    </div>
</section>

<dialog id="adminUserDialog" class="admin-dialog">
    <form method="post" action="?route=<?php echo e($adminActionRouteBase); ?>.users.update" class="admin-dialog-body">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="adminEditId">
        <div class="admin-dialog-head">
            <strong>Editar usuario</strong>
            <button type="button" class="btn-light js-dialog-close">Cerrar</button>
        </div>
        <div class="settings-grid">
            <label>
                <span>Nombre completo</span>
                <input type="text" name="full_name" id="adminEditFullName" required>
            </label>
            <label>
                <span>Correo</span>
                <input type="email" name="email" id="adminEditEmail" required>
            </label>
            <label>
                <span>Ministerio</span>
                <input type="text" name="ministry" id="adminEditMinistry">
            </label>
            <label>
                <span>Nueva contraseña</span>
                <input type="password" name="password" minlength="6" placeholder="Opcional">
            </label>
        </div>
        <div class="toolbar admin-dialog-actions">
            <button type="submit" class="btn-primary">Guardar cambios</button>
        </div>
    </form>
</dialog>

<dialog id="adminConfirmDialog" class="admin-dialog">
    <form method="post" id="adminConfirmForm" class="admin-dialog-body">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" id="adminConfirmId">
        <input type="hidden" name="active" id="adminConfirmActive">
        <div class="admin-dialog-head">
            <strong id="adminConfirmTitle">Confirmar acción</strong>
            <button type="button" class="btn-light js-dialog-close">Cerrar</button>
        </div>
        <p id="adminConfirmText" class="muted"></p>
        <div class="toolbar admin-dialog-actions">
            <button type="submit" id="adminConfirmSubmit" class="btn-danger">Confirmar</button>
        </div>
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

    document.querySelectorAll('.js-admin-edit').forEach(function (btn) {
        btn.addEventListener('click', function () {
            editId.value = this.getAttribute('data-id') || '';
            editEmail.value = this.getAttribute('data-email') || '';
            editFullName.value = this.getAttribute('data-full-name') || '';
            editMinistry.value = this.getAttribute('data-ministry') || '';
            editDialog.showModal();
        });
    });

    document.querySelectorAll('.js-admin-toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var active = String(this.getAttribute('data-active') || '1') === '1';
            var name = this.getAttribute('data-name') || 'usuario';
            var email = this.getAttribute('data-email') || '';
            confirmForm.setAttribute('action', '?route=<?php echo e($adminActionRouteBase); ?>.users.toggle');
            confirmId.value = this.getAttribute('data-id') || '';
            confirmActive.value = active ? '0' : '1';
            confirmTitle.textContent = active ? 'Desactivar usuario' : 'Activar usuario';
            confirmText.textContent = (active ? 'Se desactivará ' : 'Se activará ') + name + (email ? ' (' + email + ')' : '') + '.';
            confirmSubmit.className = active ? 'btn-danger' : 'btn-primary';
            confirmSubmit.textContent = active ? 'Desactivar' : 'Activar';
            confirmDialog.showModal();
        });
    });

    document.querySelectorAll('.js-admin-delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var name = this.getAttribute('data-name') || 'usuario';
            var email = this.getAttribute('data-email') || '';
            confirmForm.setAttribute('action', '?route=<?php echo e($adminActionRouteBase); ?>.users.delete');
            confirmId.value = this.getAttribute('data-id') || '';
            confirmActive.value = '';
            confirmTitle.textContent = 'Eliminar usuario';
            confirmText.textContent = 'Se eliminará ' + name + (email ? ' (' + email + ')' : '') + '. Esta acción no se puede deshacer.';
            confirmSubmit.className = 'btn-danger';
            confirmSubmit.textContent = 'Eliminar';
            confirmDialog.showModal();
        });
    });

    document.querySelectorAll('.js-dialog-close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (editDialog.open) {
                editDialog.close();
            }
            if (confirmDialog.open) {
                confirmDialog.close();
            }
        });
    });
})();
</script>
