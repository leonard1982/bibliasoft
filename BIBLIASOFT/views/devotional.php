<?php
$devotionalPayload = [
    'today' => $today,
    'history' => $history,
    'backgrounds' => $backgrounds,
];
?>
<section id="devotionalPage" class="devotional-page" data-devotional="<?php echo e(json_encode($devotionalPayload, JSON_UNESCAPED_UNICODE)); ?>">
    <header class="panel">
        <h1>Devocionales</h1>
        <p class="muted">Devocional del día con estructura clara y aplicación práctica.</p>
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
<script src="assets/devotional.js"></script>
