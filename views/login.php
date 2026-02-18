<section class="auth-shell">
    <article class="panel auth-card">
        <header class="auth-head">
            <div class="auth-brand">
                <img src="assets/icons/book.svg" alt="" class="auth-brand-icon">
                <div>
                    <strong class="auth-brand-name">BIBLIASOFT</strong>
                    <small class="auth-brand-slogan">Biblia para todos</small>
                </div>
            </div>
            <h1 class="auth-title">Bienvenido</h1>
            <p class="muted">Ingresa para guardar favoritos, notas y preferencias de lectura.</p>
        </header>
        <?php if (!empty($error)): ?>
            <p class="error-note"><?php echo e($error); ?></p>
        <?php endif; ?>
        <form method="post" action="?route=login.submit" class="auth-row" id="loginForm">
            <label>Usuario
                <input type="text" name="username" id="loginUsername" required minlength="3" autocomplete="username" placeholder="Tu usuario">
            </label>
            <label>Contraseña
                <input type="password" name="password" required minlength="6" autocomplete="current-password" placeholder="Tu contraseña">
            </label>
            <label class="auth-check">
                <input type="checkbox" id="rememberUser"> Recordar usuario
            </label>
            <div class="auth-actions">
                <button type="submit" class="btn-primary">Entrar</button>
                <a href="?route=register" class="btn-light">Crear cuenta</a>
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
})();
</script>
