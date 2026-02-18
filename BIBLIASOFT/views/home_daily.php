<?php
$dailyPayload = [
    'daily' => $daily,
    'backgrounds' => $backgrounds,
    'prefs' => $prefs,
];
?>
<section id="dailyHome" class="daily-home" data-daily="<?php echo e(json_encode($dailyPayload, JSON_UNESCAPED_UNICODE)); ?>">
    <article class="panel landing-hero">
        <div class="landing-copy">
            <span class="landing-kicker">Biblia para todos · BibliaSoft</span>
            <h1>Más claridad bíblica, menos distracción, más transformación diaria.</h1>
            <p class="muted">Organiza tu lectura, profundiza en cada pasaje y lleva a la práctica la Palabra con una experiencia simple, moderna y totalmente gratuita.</p>
            <div class="toolbar landing-cta">
                <a class="btn-primary" href="?route=reader">
                    <img src="assets/icons/book.svg" alt="" class="ico"> Empezar ahora
                </a>
                <a class="btn-light" href="?route=devotional">
                    <img src="assets/icons/text.svg" alt="" class="ico"> Ver devocionales
                </a>
                <a class="btn-light" href="?route=anecdotes">
                    <img src="assets/icons/help.svg" alt="" class="ico"> Explorar anécdotas
                </a>
            </div>
        </div>
        <div class="landing-proof">
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/book.svg" alt="" class="proof-ico">
                    <strong>Lectura guiada</strong>
                </div>
                <p>Encuentra libro, capítulo y versículos en segundos sin perder el enfoque.</p>
            </article>
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/list.svg" alt="" class="proof-ico">
                    <strong>Estudio estructurado</strong>
                </div>
                <p>Contexto, comentarios, notas y vínculos en un flujo claro para estudiar mejor.</p>
            </article>
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/share.svg" alt="" class="proof-ico">
                    <strong>Aplicación diaria</strong>
                </div>
                <p>Devocionales y herramientas prácticas para pasar del texto a la acción.</p>
            </article>
        </div>
    </article>

    <article class="panel landing-highlights">
        <div class="highlight-card">
            <img src="assets/backgrounds/bg-01.svg" alt="" class="highlight-bg">
            <div class="highlight-overlay">
                <span class="chip-light"><img src="assets/icons/copy.svg" alt="" class="ico"> Más claridad</span>
                <p>Lectura limpia y foco en el pasaje para estudiar sin ruido.</p>
            </div>
        </div>
        <div class="highlight-card">
            <img src="assets/backgrounds/bg-03.svg" alt="" class="highlight-bg">
            <div class="highlight-overlay">
                <span class="chip-light"><img src="assets/icons/list.svg" alt="" class="ico"> Más orden</span>
                <p>Notas, vínculos y recursos organizados para preparar clases y predicaciones.</p>
            </div>
        </div>
        <div class="highlight-card">
            <img src="assets/backgrounds/bg-05.svg" alt="" class="highlight-bg">
            <div class="highlight-overlay">
                <span class="chip-light"><img src="assets/icons/share.svg" alt="" class="ico"> Más alcance</span>
                <p>Comparte contenido bíblico con formato útil para redes y grupos.</p>
            </div>
        </div>
    </article>

    <article id="dailyVerseCard" class="daily-hero" style="background-image: linear-gradient(rgba(8,18,28,.45), rgba(8,18,28,.6)), url('<?php echo e($daily['background']); ?>');">
        <div class="daily-tag">Versículo del día</div>
        <h2><?php echo e($daily['reference']); ?></h2>
        <p class="daily-verse-text"><?php echo e($daily['text']); ?></p>
        <div class="toolbar">
            <a class="btn-primary" href="?route=reader&amp;book=<?php echo (int) $daily['book']; ?>&amp;chapter=<?php echo (int) $daily['chapter']; ?>&amp;verse=<?php echo (int) $daily['verse']; ?>">
                <img src="assets/icons/book.svg" alt="" class="ico"> Leer contexto
            </a>
            <button class="btn-light" id="shareDailyVerse" type="button">
                <img src="assets/icons/share.svg" alt="" class="ico"> Compartir
            </button>
            <a class="btn-light" href="?route=reader">
                <img src="assets/icons/menu.svg" alt="" class="ico"> Ir a lectura
            </a>
            <button class="btn-light" id="hideDailyToday" type="button">
                <img src="assets/icons/eye.svg" alt="" class="ico"> No mostrar más hoy
            </button>
        </div>
    </article>

    <article class="panel marketing-grid">
        <section class="marketing-block">
            <h3><img src="assets/icons/settings.svg" alt="" class="ico"> Lo que puedes lograr</h3>
            <ul>
                <li>Ganar más tiempo al estudiar con navegación rápida y lectura limpia.</li>
                <li>Preparar estudios bíblicos más ordenados con notas por versículo y por rango.</li>
                <li>Profundizar con contexto histórico, literario y herramientas de apoyo.</li>
                <li>Compartir mensajes claros con imágenes, texto listo y recursos de enseñanza.</li>
            </ul>
        </section>
        <section class="marketing-block">
            <h3><img src="assets/icons/help.svg" alt="" class="ico"> Características que te impulsan</h3>
            <ul>
                <li>Lector profesional: libros, capítulos y panel de ayuda en una sola vista.</li>
                <li>Búsqueda avanzada por frase, palabras, libro y rango de capítulos.</li>
                <li>Devocionales con estructura completa para crecer cada día.</li>
                <li>Anécdotas para predicar y enseñar con emoción y aplicación práctica.</li>
            </ul>
        </section>
        <section class="marketing-block">
            <h3><img src="assets/icons/camera.svg" alt="" class="ico"> Beneficios reales para la iglesia y la familia</h3>
            <ul>
                <li>Más constancia espiritual con un sistema simple de lectura diaria.</li>
                <li>Mejor retención de la enseñanza al conectar texto, contexto y aplicación.</li>
                <li>Mayor impacto al compartir la Palabra de forma visual y comprensible.</li>
                <li>Una herramienta gratuita y lista para usar en celular y computador.</li>
            </ul>
        </section>
    </article>
</section>
<script src="assets/daily.js"></script>
