<?php
$devotionalPayload = [
    'today' => $today,
    'history' => $history,
    'backgrounds' => $backgrounds,
];
?>
<section id="devotionalPage" class="devotional-page" data-devotional="<?php echo e(app_json_safe($devotionalPayload)); ?>">
    <header class="panel">
        <h1>Devocionales</h1>
        <p class="muted">Contenido diario para profundizar en la Palabra, fortalecer la fe y aterrizar decisiones prácticas para hoy.</p>
        <div class="toolbar">
            <button class="btn-primary" id="generateDevotional" type="button">Generar otro</button>
            <button class="btn-light" id="shareDevotionalText" type="button">Compartir texto</button>
            <button class="btn-light" id="shareDevotionalImage" type="button">Crear imagen</button>
        </div>
    </header>

    <article class="panel devotional-current" id="devotionalCurrent"></article>
    <section class="panel">
        <h2>Historial</h2>
        <div id="devotionalHistory" class="stack"></div>
    </section>
</section>
<script src="<?php echo e(app_asset('assets/devotional.js')); ?>"></script>

