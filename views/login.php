<section class="auth-shell">
    <article class="auth-card auth-card-pro">
        <header class="auth-switch" role="tablist" aria-label="Acceso">
            <a class="auth-switch-item is-active" href="?route=login" role="tab" aria-selected="true" title="Iniciar sesión">
                <img src="assets/icons/login.svg" alt="" class="auth-switch-ico"> Iniciar sesión
            </a>
            <a class="auth-switch-item" href="?route=register" role="tab" aria-selected="false" title="Crear cuenta">
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

        <form method="post" action="?route=login.submit" class="auth-row auth-form-pro" id="loginForm">
            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/user.svg" alt="" class="auth-field-ico">
                </span>
                <input type="text" name="username" id="loginUsername" required minlength="3" autocomplete="username" placeholder="Usuario o correo">
            </label>

            <label class="auth-field">
                <span class="auth-field-ico-wrap">
                    <img src="assets/icons/lock.svg" alt="" class="auth-field-ico">
                </span>
                <input type="password" name="password" id="loginPassword" required minlength="6" autocomplete="current-password" placeholder="Contraseña">
                <button type="button" class="auth-pass-toggle" id="toggleLoginPass" title="Mostrar u ocultar contraseña" aria-label="Mostrar u ocultar contraseña">
                    <img src="assets/icons/eye.svg" alt="" class="auth-field-ico">
                </button>
            </label>

            <div class="auth-meta">
                <label class="auth-check">
                    <input type="checkbox" id="rememberUser"> Recordar usuario
                </label>
                <a class="auth-meta-link" href="?route=register">Crear cuenta nueva</a>
            </div>

            <div class="auth-actions">
                <button type="submit" class="btn-primary auth-submit">Entrar</button>
            </div>
        </form>
    </article>
</section>
<script>
(function () {
    var KEY = 'biblia_login_user';
    var form = document.getElementById('loginForm');
    var userInput = document.getElementById('loginUsername');
    var remember = document.getElementById('rememberUser');
    var passwordInput = document.getElementById('loginPassword');
    var toggleBtn = document.getElementById('toggleLoginPass');
    if (!form || !userInput || !remember) {
        return;
    }

    var saved = localStorage.getItem(KEY) || '';
    if (saved) {
        userInput.value = saved;
        remember.checked = true;
    }

    form.addEventListener('submit', function () {
        if (remember.checked) {
            localStorage.setItem(KEY, (userInput.value || '').trim());
            return;
        }
        localStorage.removeItem(KEY);
    });

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function () {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });
    }
})();
</script>
