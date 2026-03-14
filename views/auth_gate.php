<?php
$gate = isset($gate) && is_array($gate) ? $gate : feature_access_payload('advanced_tools');
$featureItems = isset($gate['feature_items']) && is_array($gate['feature_items']) ? $gate['feature_items'] : [];
$benefits = isset($gate['benefits']) && is_array($gate['benefits']) ? $gate['benefits'] : [];
?>
<section class="auth-gate-shell">
    <article class="panel auth-gate-hero">
        <div class="auth-gate-copy">
            <span class="auth-gate-kicker"><?php echo e($gate['badge'] ?? 'Acceso gratuito'); ?></span>
            <h1><?php echo e($gate['title'] ?? 'Accede para continuar'); ?></h1>
            <p class="muted auth-gate-lead"><?php echo e($gate['lead'] ?? 'Crea tu cuenta gratis o inicia sesión para continuar.'); ?></p>

            <div class="toolbar auth-gate-actions">
                <a class="btn-primary" href="<?php echo e($gate['register_url'] ?? app_route_url('register')); ?>">
                    <?php echo e($gate['primary_cta'] ?? 'Crear cuenta gratis'); ?>
                </a>
                <a class="btn-light" href="<?php echo e($gate['login_url'] ?? app_route_url('login')); ?>">
                    <?php echo e($gate['secondary_cta'] ?? 'Iniciar sesión'); ?>
                </a>
                <a class="btn-light" href="<?php echo e($gate['reader_url'] ?? app_route_url('reader', ['skip_daily' => 1])); ?>">
                    Seguir leyendo la Biblia
                </a>
            </div>
        </div>

        <div class="auth-gate-proof">
            <article class="auth-gate-card">
                <strong>Lo que desbloqueas gratis</strong>
                <ul class="auth-gate-list">
                    <?php foreach ($featureItems as $item): ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
            <article class="auth-gate-card auth-gate-card-accent">
                <strong>Por qué te pedimos registro</strong>
                <ul class="auth-gate-list">
                    <?php foreach ($benefits as $item): ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; ?>
                </ul>
                <small class="muted">Somos <?php echo e($gate['church_name'] ?? 'Fundación La Iglesia en la Calle'); ?> · <a href="<?php echo e($gate['website_url'] ?? 'https://www.laiglesiaenlacalle.co'); ?>" target="_blank" rel="noopener noreferrer"><?php echo e($gate['website_url'] ?? 'https://www.laiglesiaenlacalle.co'); ?></a></small>
            </article>
        </div>
    </article>
</section>
