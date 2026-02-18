<section class="auth-shell">
    <article class="auth-card auth-card-pro">
        <header class="auth-switch" role="tablist" aria-label="Acceso">
            <a class="auth-switch-item" href="?route=login" role="tab" aria-selected="false" title="Iniciar sesión">
                <img src="assets/icons/login.svg" alt="" class="auth-switch-ico"> Iniciar sesión
            </a>
            <a class="auth-switch-item is-active" href="?route=register" role="tab" aria-selected="true" title="Crear cuenta">
                <img src="assets/icons/register.svg" alt="" class="auth-switch-ico"> Registro
            </a>
        </header>

        <div class="auth-avatar-wrap">
            <div class="auth-avatar" aria-hidden="true">
                <img src="assets/icons/book.svg" alt="" class="auth-avatar-icon">
            </div>
            <strong class="auth-brand-name">BIBLIASOFT</strong>
            <small class="auth-brand-slogan">Biblia para todos</small>
        </div>

        <?php if (!empty($error)): ?>
            <p class="error-note"><?php echo e($error); ?></p>
        <?php endif; ?>

        <form method="post" action="?route=register.submit" class="auth-row auth-form-pro">
            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/user.svg" alt="" class="auth-field-ico">
                </span>
                <input type="text" name="username" required minlength="3" autocomplete="username" placeholder="Elige un usuario">
            </label>

            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/lock.svg" alt="" class="auth-field-ico">
                </span>
                <input type="password" name="password" required minlength="6" autocomplete="new-password" placeholder="Contraseña (mínimo 6 caracteres)">
            </label>

            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/lock.svg" alt="" class="auth-field-ico">
                </span>
                <input type="password" name="password_confirm" required minlength="6" autocomplete="new-password" placeholder="Confirmar contraseña">
            </label>

            <div class="auth-actions">
                <button type="submit" class="btn-primary auth-submit">Crear cuenta</button>
                <a href="?route=login" class="btn-light auth-back-login">Ya tengo cuenta</a>
            </div>
        </form>
    </article>
</section>
