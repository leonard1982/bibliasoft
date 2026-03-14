<section class="panel admin-console">
    <div class="admin-head">
        <div>
            <h1>Superadministración</h1>
            <p class="muted">Acceso interno para gestionar usuarios, revisar logs y operar la plataforma.</p>
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
            <strong>Anécdotas</strong>
            <p><?php echo (int) $anecdotesCount; ?></p>
            <small class="muted">Contenido cargado en la plataforma</small>
        </article>
    </div>

    <div class="admin-grid">
        <section class="card admin-users-panel">
            <div class="admin-section-head">
                <div>
                    <strong>Usuarios registrados</strong>
                    <small class="muted">Puedes editar, desactivar o borrar cuentas desde aquí.</small>
                </div>
            </div>

            <?php if (empty($users)): ?>
                <p class="muted">No hay usuarios registrados.</p>
            <?php else: ?>
                <div class="admin-user-list">
                    <?php foreach ($users as $user): ?>
                        <?php
                        $userId = (int) ($user['id'] ?? 0);
                        $isActive = (int) ($user['active'] ?? 1) === 1;
                        $isSelf = $userId === auth_user_id();
                        ?>
                        <article class="admin-user-card <?php echo $isActive ? '' : 'is-inactive'; ?>">
                            <div class="admin-user-summary">
                                <div>
                                    <strong><?php echo e((string) ($user['full_name'] ?? $user['username'] ?? 'Usuario')); ?></strong>
                                    <p class="muted"><?php echo e((string) ($user['email'] ?? '')); ?></p>
                                </div>
                                <span class="admin-status <?php echo $isActive ? 'is-active' : 'is-inactive'; ?>">
                                    <?php echo $isActive ? 'Activo' : 'Inactivo'; ?>
                                </span>
                            </div>

                            <div class="admin-user-meta">
                                <span><strong>ID:</strong> <?php echo $userId; ?></span>
                                <span><strong>Ministerio:</strong> <?php echo e((string) ($user['ministry'] ?? '')); ?></span>
                                <span><strong>Consentimiento:</strong> <?php echo !empty($user['data_consent']) ? 'Sí' : 'No'; ?></span>
                                <span><strong>Registro:</strong> <?php echo e((string) ($user['created_at'] ?? '')); ?></span>
                                <span><strong>Último acceso:</strong> <?php echo e((string) ($user['last_login_at'] ?? 'Nunca')); ?></span>
                            </div>

                            <form method="post" action="?route=admin.users.update" class="settings-grid admin-user-form">
                                <input type="hidden" name="id" value="<?php echo $userId; ?>">
                                <label>
                                    <span>Nombre completo</span>
                                    <input type="text" name="full_name" required value="<?php echo e((string) ($user['full_name'] ?? '')); ?>">
                                </label>
                                <label>
                                    <span>Correo</span>
                                    <input type="email" name="email" required value="<?php echo e((string) ($user['email'] ?? '')); ?>">
                                </label>
                                <label>
                                    <span>Ministerio</span>
                                    <input type="text" name="ministry" value="<?php echo e((string) ($user['ministry'] ?? '')); ?>">
                                </label>
                                <label>
                                    <span>Nueva contraseña</span>
                                    <input type="password" name="password" minlength="6" placeholder="Opcional">
                                </label>
                                <div class="toolbar admin-user-toolbar">
                                    <button type="submit" class="btn-primary">Guardar cambios</button>
                                </div>
                            </form>

                            <div class="toolbar admin-user-actions">
                                <form method="post" action="?route=admin.users.toggle">
                                    <input type="hidden" name="id" value="<?php echo $userId; ?>">
                                    <input type="hidden" name="active" value="<?php echo $isActive ? '0' : '1'; ?>">
                                    <button type="submit" class="btn-light" <?php echo $isSelf ? 'disabled' : ''; ?>>
                                        <?php echo $isActive ? 'Desactivar' : 'Activar'; ?>
                                    </button>
                                </form>
                                <form method="post" action="?route=admin.users.delete" onsubmit="return confirm('Se borrará este usuario. ¿Deseas continuar?');">
                                    <input type="hidden" name="id" value="<?php echo $userId; ?>">
                                    <button type="submit" class="btn-danger" <?php echo $isSelf ? 'disabled' : ''; ?>>Borrar</button>
                                </form>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <aside class="card admin-logs-panel">
            <div class="admin-section-head">
                <div>
                    <strong>Logs internos</strong>
                    <small class="muted">Visor de archivos dentro de <code>storage/logs</code>.</small>
                </div>
            </div>

            <form method="get" class="settings-grid admin-log-form">
                <input type="hidden" name="route" value="<?php echo e($adminRoute); ?>">
                <label>
                    <span>Archivo de log</span>
                    <select name="log">
                        <?php if (empty($logs)): ?>
                            <option value="">Sin logs</option>
                        <?php else: ?>
                            <?php foreach ($logs as $log): ?>
                                <option value="<?php echo e((string) ($log['name'] ?? '')); ?>" <?php echo ((string) ($log['name'] ?? '') === (string) $selectedLog) ? 'selected' : ''; ?>>
                                    <?php echo e((string) ($log['name'] ?? '')); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </label>
                <div class="toolbar">
                    <button type="submit" class="btn-light">Ver log</button>
                </div>
            </form>

            <?php if (!empty($logs)): ?>
                <div class="admin-log-meta">
                    <?php foreach ($logs as $log): ?>
                        <?php if ((string) ($log['name'] ?? '') === (string) $selectedLog): ?>
                            <span><strong>Archivo:</strong> <?php echo e((string) ($log['name'] ?? '')); ?></span>
                            <span><strong>Tamaño:</strong> <?php echo number_format(((int) ($log['size'] ?? 0)) / 1024, 1); ?> KB</span>
                            <span><strong>Actualizado:</strong> <?php echo e((string) ($log['modified_at'] ?? '')); ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <pre class="admin-log-view"><?php echo e((string) $logContent); ?></pre>
        </aside>
    </div>
</section>
