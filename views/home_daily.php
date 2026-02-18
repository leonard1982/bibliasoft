<?php
$dailyPayload = [
    'daily' => $daily,
    'backgrounds' => $backgrounds,
    'prefs' => $prefs,
];
?>
<section id="dailyHome" class="daily-home" data-daily="<?php echo e(json_encode($dailyPayload, JSON_UNESCAPED_UNICODE)); ?>">
    <article class="daily-hero" style="background-image: linear-gradient(rgba(8,18,28,.45), rgba(8,18,28,.6)), url('<?php echo e($daily['background']); ?>');">
        <div class="daily-tag">Versículo del día</div>
        <h1><?php echo e($daily['reference']); ?></h1>
        <p class="daily-verse-text"><?php echo e($daily['text']); ?></p>
        <div class="toolbar">
            <a class="btn-primary" href="?route=reader&amp;book=<?php echo (int) $daily['book']; ?>&amp;chapter=<?php echo (int) $daily['chapter']; ?>&amp;verse=<?php echo (int) $daily['verse']; ?>">Leer contexto</a>
            <button class="btn-light" id="shareDailyVerse" type="button">Compartir</button>
            <a class="btn-light" href="?route=reader">Ir a lectura</a>
            <button class="btn-light" id="hideDailyToday" type="button">No mostrar más hoy</button>
        </div>
    </article>
</section>
<script src="assets/daily.js"></script>
