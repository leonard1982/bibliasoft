<section class="panel auth-card">
    <h1>Panel de administración</h1>
    <p class="muted">Usuario: <?php echo e($username); ?></p>
    <div class="card">
        <strong>Resumen</strong>
        <p>Total de usuarios registrados: <?php echo (int) $usersCount; ?></p>
        <p>Total de anécdotas guardadas: <?php echo (int) $anecdotesCount; ?></p>
    </div>
    <div class="toolbar">
        <a class="btn-light" href="?route=reader">Ir al lector</a>
        <a class="btn-light" href="?route=logout">Cerrar sesión</a>
    </div>
</section>
