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
                <input type="text" name="full_name" required minlength="3" autocomplete="name" placeholder="Nombre completo">
            </label>

            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/user.svg" alt="" class="auth-field-ico">
                </span>
                <input type="email" name="email" required autocomplete="email" placeholder="Correo electrónico">
            </label>

            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/settings.svg" alt="" class="auth-field-ico">
                </span>
                <input type="text" name="ministry" autocomplete="organization" placeholder="Ministerio o área de servicio (opcional)">
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

            <label class="auth-check auth-check-legal">
                <input type="checkbox" name="data_consent" value="1" required>
                <span>Autorizo el tratamiento de mis datos personales para crear y administrar mi cuenta en BIBLIASOFT.</span>
            </label>
            <p class="auth-legal-note">El ministerio es opcional. El correo será el identificador principal de acceso.</p>

            <div class="auth-actions">
                <button type="submit" class="btn-primary auth-submit">Crear cuenta</button>
                <a href="?route=login" class="btn-light auth-back-login">Ya tengo cuenta</a>
            </div>
        </form>
    </article>
</section>
