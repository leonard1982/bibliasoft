<section class="panel auth-card">
    <h1>Ingresar</h1>
    <p class="muted">Accede para guardar preferencias y favoritos personales.</p>
    <?php if (!empty($error)): ?>
        <p class="error-note"><?php echo e($error); ?></p>
    <?php endif; ?>
    <form method="post" action="?route=login.submit" class="stack">
        <label>Usuario
            <input type="text" name="username" required minlength="3" autocomplete="username">
        </label>
        <label>Contraseña
            <input type="password" name="password" required minlength="6" autocomplete="current-password">
        </label>
        <button type="submit" class="btn-primary">Entrar</button>
        <a href="?route=register" class="btn-light">Crear cuenta</a>
    </form>
</section>
