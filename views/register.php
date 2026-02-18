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
            <h1 class="auth-title">Crear cuenta</h1>
            <p class="muted">Configura tu acceso para guardar notas, vínculos y favoritos.</p>
        </header>
        <?php if (!empty($error)): ?>
            <p class="error-note"><?php echo e($error); ?></p>
        <?php endif; ?>
        <form method="post" action="?route=register.submit" class="auth-row">
            <label>Usuario
                <input type="text" name="username" required minlength="3" autocomplete="username" placeholder="Elige un usuario">
            </label>
            <label>Contraseña
                <input type="password" name="password" required minlength="6" autocomplete="new-password" placeholder="Mínimo 6 caracteres">
            </label>
            <label>Confirmar contraseña
                <input type="password" name="password_confirm" required minlength="6" autocomplete="new-password" placeholder="Repite la contraseña">
            </label>
            <div class="auth-actions">
                <button type="submit" class="btn-primary">Crear cuenta</button>
                <a href="?route=login" class="btn-light">Ya tengo cuenta</a>
            </div>
        </form>
    </article>
</section>
