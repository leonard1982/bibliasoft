<section class="auth-shell">
    <article class="panel auth-card">
        <header class="auth-head">
            <h1 class="auth-title">Bienvenido</h1>
            <p class="muted">Ingresa para guardar favoritos, notas y preferencias de lectura.</p>
        </header>
        <?php if (!empty($error)): ?>
            <p class="error-note"><?php echo e($error); ?></p>
        <?php endif; ?>
        <form method="post" action="?route=login.submit" class="auth-row">
            <label>Usuario
                <input type="text" name="username" required minlength="3" autocomplete="username" placeholder="Tu usuario">
            </label>
            <label>Contraseña
                <input type="password" name="password" required minlength="6" autocomplete="current-password" placeholder="Tu contraseña">
            </label>
            <div class="auth-actions">
                <button type="submit" class="btn-primary">Entrar</button>
                <a href="?route=register" class="btn-light">Crear cuenta</a>
            </div>
        </form>
    </article>
</section>
