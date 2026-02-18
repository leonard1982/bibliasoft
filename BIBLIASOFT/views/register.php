<section class="panel auth-card">
    <h1>Registro de usuario</h1>
    <p class="muted">Crea tu cuenta para guardar notas y vínculos personales.</p>
    <?php if (!empty($error)): ?>
        <p class="error-note"><?php echo e($error); ?></p>
    <?php endif; ?>
    <form method="post" action="?route=register.submit" class="stack">
        <label>Usuario
            <input type="text" name="username" required minlength="3" autocomplete="username">
        </label>
        <label>Contraseña
            <input type="password" name="password" required minlength="6" autocomplete="new-password">
        </label>
        <label>Confirmar contraseña
            <input type="password" name="password_confirm" required minlength="6" autocomplete="new-password">
        </label>
        <button type="submit" class="btn-primary">Crear cuenta</button>
        <a href="?route=login" class="btn-light">Ya tengo cuenta</a>
    </form>
</section>
