<section class="auth-shell">
    <article class="auth-card auth-card-pro">
        <header class="auth-switch" role="tablist" aria-label="Acceso">
            <a class="auth-switch-item" href="<?php echo e(app_route_url('login', !empty($next) ? ['next' => $next] : [])); ?>" role="tab" aria-selected="false" title="Iniciar sesión">
                <img src="assets/icons/login.svg" alt="" class="auth-switch-ico"> Iniciar sesión
            </a>
            <a class="auth-switch-item is-active" href="<?php echo e(app_route_url('register', !empty($next) ? ['next' => $next] : [])); ?>" role="tab" aria-selected="true" title="Crear cuenta">
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
            <?php echo csrf_field(); ?>
            <?php if (!empty($next)): ?>
                <input type="hidden" name="next" value="<?php echo e($next); ?>">
            <?php endif; ?>
            <div class="auth-honeypot" aria-hidden="true">
                <label for="contact_website">Si eres humano deja este campo vacío</label>
                <input type="text" id="contact_website" name="contact_website" value="" autocomplete="new-password" tabindex="-1">
            </div>
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

            <?php if (!empty($recaptchaEnabled) && !empty($recaptchaSiteKey)): ?>
                <div class="auth-recaptcha-wrap" data-provider="<?php echo e($recaptchaProvider ?? 'legacy'); ?>" data-mode="<?php echo e($recaptchaMode ?? 'checkbox'); ?>">
                    <?php if (($recaptchaMode ?? 'checkbox') === 'score' && ($recaptchaProvider ?? 'legacy') === 'cloud'): ?>
                        <input type="hidden" name="g-recaptcha-response" value="" data-recaptcha-token>
                        <p class="auth-legal-note">Validaremos el registro con Google reCAPTCHA antes de enviar el formulario.</p>
                    <?php else: ?>
                        <div
                            class="g-recaptcha"
                            data-sitekey="<?php echo e($recaptchaSiteKey); ?>"
                            data-action="<?php echo e($recaptchaAction ?? 'register'); ?>"
                        ></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="auth-actions">
                <button type="submit" class="btn-primary auth-submit">Crear cuenta</button>
                <a href="<?php echo e(app_route_url('login', !empty($next) ? ['next' => $next] : [])); ?>" class="btn-light auth-back-login">Ya tengo cuenta</a>
            </div>
        </form>
    </article>
</section>
<?php if (!empty($recaptchaEnabled) && !empty($recaptchaSiteKey) && !empty($recaptchaScriptUrl)): ?>
    <script src="<?php echo e($recaptchaScriptUrl); ?>" async defer></script>
    <?php if (($recaptchaMode ?? 'checkbox') === 'score' && ($recaptchaProvider ?? 'legacy') === 'cloud'): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var form = document.querySelector('.auth-form-pro');
                var tokenInput = document.querySelector('[data-recaptcha-token]');
                if (!form || !tokenInput) {
                    return;
                }

                form.addEventListener('submit', function (event) {
                    if (tokenInput.value) {
                        return;
                    }

                    if (!window.grecaptcha || !grecaptcha.enterprise) {
                        return;
                    }

                    event.preventDefault();
                    grecaptcha.enterprise.ready(function () {
                        grecaptcha.enterprise.execute('<?php echo e($recaptchaSiteKey); ?>', {
                            action: '<?php echo e($recaptchaAction ?? 'register'); ?>'
                        }).then(function (token) {
                            tokenInput.value = token || '';
                            form.submit();
                        });
                    });
                });
            });
        </script>
    <?php endif; ?>
<?php endif; ?>
