<?php
$dailyPayload = [
    'daily' => $daily,
    'motivation' => isset($motivation) ? $motivation : [],
    'backgrounds' => $backgrounds,
    'prefs' => $prefs,
    'plan' => $plan,
];
$planInfo = isset($plan['plan']) && is_array($plan['plan']) ? $plan['plan'] : [];
$planActive = !empty($plan['active']);
$planProgress = (int) ($planInfo['progress_percent'] ?? 0);
$planTodayDone = (int) ($planInfo['today_completed_count'] ?? 0);
$planTodayTotal = (int) ($planInfo['today_total_count'] ?? 0);
$planCurrentStreak = (int) ($planInfo['current_streak'] ?? 0);
?>
<section id="dailyHome" class="daily-home" data-daily="<?php echo e(app_json_safe($dailyPayload)); ?>">
    <article class="panel landing-hero">
        <div class="landing-copy">
            <span class="landing-kicker">BibliaSoft · Inicio</span>
            <h1>Un centro de lectura bíblica claro, rápido y listo para enseñar.</h1>
            <p class="muted">Diseñado con estructura tipo plataforma profesional: acceso inmediato al pasaje del día, avance de plan de lectura y herramientas para estudiar y compartir con orden.</p>
            <div class="landing-trust">
                <span><img src="assets/icons/eye.svg" alt="" class="ico"> Lectura sin ruido visual</span>
                <span><img src="assets/icons/list.svg" alt="" class="ico"> Flujo de estudio por pasos</span>
                <span><img src="assets/icons/share.svg" alt="" class="ico"> Salida lista para compartir</span>
            </div>
            <div class="landing-metrics">
                <article class="landing-metric">
                    <span class="landing-metric-label">Versículo de hoy</span>
                    <strong><?php echo e($daily['reference']); ?></strong>
                </article>
                <article class="landing-metric">
                    <span class="landing-metric-label">Plan activo</span>
                    <strong><?php echo $planActive ? 'Sí' : 'No'; ?></strong>
                </article>
                <article class="landing-metric">
                    <span class="landing-metric-label">Progreso</span>
                    <strong><?php echo $planActive ? ((int) $planProgress . '%') : '0%'; ?></strong>
                </article>
            </div>
            <div class="toolbar landing-cta">
                <a class="btn-primary" href="?route=reader&amp;skip_daily=1">
                    <img src="assets/icons/book.svg" alt="" class="ico"> Empezar ahora
                </a>
                <a class="btn-light" href="?route=devotional">
                    <img src="assets/icons/text.svg" alt="" class="ico"> Devocionales
                </a>
                <a class="btn-light" href="?route=reader&amp;skip_daily=1&amp;tour=1">
                    <img src="assets/icons/list.svg" alt="" class="ico"> Iniciar tour guiado
                </a>
                <a class="btn-light" href="?route=anecdotes">
                    <img src="assets/icons/help.svg" alt="" class="ico"> Anécdotas
                </a>
                <a class="btn-light" href="#readingPlanCard">
                    <img src="assets/icons/calendar.svg" alt="" class="ico"> Ver plan
                </a>
            </div>
        </div>
        <div class="landing-proof">
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/book.svg" alt="" class="proof-ico">
                    <strong>Ruta de lectura guiada</strong>
                </div>
                <p>Navega por libro, capítulo y versículo en segundos, con foco en el texto y el contexto.</p>
            </article>
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/list.svg" alt="" class="proof-ico">
                    <strong>Estudio estructurado</strong>
                </div>
                <p>Contexto, notas y comentarios en un recorrido práctico para discipular y preparar clases.</p>
            </article>
            <article class="proof-card">
                <div class="proof-head">
                    <img src="assets/icons/calendar.svg" alt="" class="proof-ico">
                    <strong>Disciplina diaria</strong>
                </div>
                <p>Avance de hoy: <?php echo (int) $planTodayDone; ?>/<?php echo (int) $planTodayTotal; ?> capítulos · Racha actual: <?php echo (int) $planCurrentStreak; ?> día(s).</p>
            </article>
            <div class="landing-signature">
                <span>Interfaz pensada para iglesia, familia, grupos pequeños y estudio personal constante.</span>
            </div>
        </div>
    </article>

    <article class="panel landing-signal">
        <div class="signal-item">
            <small>Modelo</small>
            <strong>Lectura guiada en 3 etapas</strong>
        </div>
        <div class="signal-item">
            <small>Ejecución</small>
            <strong>Inicio, estudio y aplicación en una sola ruta</strong>
        </div>
        <div class="signal-item">
            <small>Resultado</small>
            <strong>Más constancia y mejor preparación semanal</strong>
        </div>
    </article>

    <article class="panel landing-strategy">
        <div class="strategy-visual">
            <img src="assets/backgrounds/highlight-02.jpg" alt="Biblia abierta para estudio personal" class="strategy-main-image">
            <div class="strategy-mini-grid">
                <article class="strategy-mini-card">
                    <small>Paso 01</small>
                    <strong>Leer contexto</strong>
                </article>
                <article class="strategy-mini-card">
                    <small>Paso 02</small>
                    <strong>Anotar ideas</strong>
                </article>
                <article class="strategy-mini-card">
                    <small>Paso 03</small>
                    <strong>Aplicar hoy</strong>
                </article>
            </div>
        </div>
        <div class="strategy-copy">
            <span class="strategy-kicker">Inspirado en homepages profesionales</span>
            <h3>Diseño orientado a decisión rápida: saber qué leer, qué estudiar y qué aplicar.</h3>
            <p class="muted">Reordenamos el inicio para que cada bloque responda a una acción clara, con menos ruido visual y una narrativa directa.</p>
            <ul class="strategy-points">
                <li>Una ruta principal visible desde el primer scroll.</li>
                <li>Bloques de valor concretos para lectura personal e iglesia.</li>
                <li>Recursos visuales libres listos para renovación de imágenes.</li>
            </ul>
            <div class="toolbar strategy-links">
                <a class="btn-light" target="_blank" rel="noopener noreferrer" href="https://www.pexels.com/search/open%20bible/">
                    <img src="assets/icons/search.svg" alt="" class="ico"> Pexels
                </a>
                <a class="btn-light" target="_blank" rel="noopener noreferrer" href="https://unsplash.com/s/photos/open-bible">
                    <img src="assets/icons/search.svg" alt="" class="ico"> Unsplash
                </a>
                <a class="btn-light" target="_blank" rel="noopener noreferrer" href="https://commons.wikimedia.org/w/index.php?search=open+bible&title=Special:MediaSearch&type=image">
                    <img src="assets/icons/search.svg" alt="" class="ico"> Wikimedia
                </a>
            </div>
        </div>
    </article>

    <div class="daily-spotlights-head">
        <h3><img src="assets/icons/calendar.svg" alt="" class="ico"> Palabra para hoy</h3>
        <small class="muted">Un pasaje central y un texto de ánimo para iniciar la lectura con enfoque.</small>
    </div>

    <section class="daily-spotlights">
        <article id="dailyVerseCard" class="daily-hero" style="background-image: linear-gradient(rgba(8,18,28,.45), rgba(8,18,28,.6)), url('<?php echo e($daily['background']); ?>');">
            <div class="daily-hero-shell">
                <div class="daily-hero-top">
                    <div class="daily-tag">Versículo del día</div>
                    <span class="daily-chip">Hoy</span>
                </div>
                <div class="daily-hero-content">
                    <h2><?php echo e($daily['reference']); ?></h2>
                    <p class="daily-verse-text"><?php echo e($daily['text']); ?></p>
                </div>
                <div class="daily-hero-footer">
                    <small class="daily-hero-note">Lee el contexto completo y guarda una aplicación práctica para hoy.</small>
                    <div class="toolbar daily-hero-actions">
                        <a class="btn-primary" href="?route=reader&amp;book=<?php echo (int) $daily['book']; ?>&amp;chapter=<?php echo (int) $daily['chapter']; ?>&amp;verse=<?php echo (int) $daily['verse']; ?>&amp;skip_daily=1">
                            <img src="assets/icons/book.svg" alt="" class="ico"> Leer contexto
                        </a>
                        <button class="btn-light" id="shareDailyVerse" type="button">
                            <img src="assets/icons/share.svg" alt="" class="ico"> Compartir
                        </button>
                        <a class="btn-light" href="?route=reader&amp;skip_daily=1">
                            <img src="assets/icons/menu.svg" alt="" class="ico"> Ir a lectura
                        </a>
                        <button class="btn-light" id="hideDailyToday" type="button">
                            <img src="assets/icons/eye.svg" alt="" class="ico"> No mostrar más hoy
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <article id="motivationVerseCard" class="daily-hero motivation-hero" style="background-image: linear-gradient(rgba(10,14,26,.5), rgba(12,18,34,.72)), url('<?php echo e($motivation['background'] ?? $daily['background']); ?>');">
            <div class="daily-hero-shell">
                <div class="daily-hero-top">
                    <div class="daily-tag">Versículo de motivación</div>
                    <span class="daily-chip">Fortaleza</span>
                </div>
                <div class="daily-hero-content">
                    <h2><?php echo e($motivation['reference'] ?? 'Romanos 8:31'); ?></h2>
                    <p class="daily-verse-text"><?php echo e($motivation['text'] ?? 'Si Dios es por nosotros, ¿quién contra nosotros?'); ?></p>
                </div>
                <div class="daily-hero-footer">
                    <small class="daily-hero-note">Memoriza una frase clave y compártela con alguien que necesite ánimo.</small>
                    <div class="toolbar daily-hero-actions">
                        <a class="btn-primary" href="?route=reader&amp;book=<?php echo (int) ($motivation['book'] ?? 45); ?>&amp;chapter=<?php echo (int) ($motivation['chapter'] ?? 8); ?>&amp;verse=<?php echo (int) ($motivation['verse'] ?? 31); ?>&amp;skip_daily=1">
                            <img src="assets/icons/book.svg" alt="" class="ico"> Leer contexto
                        </a>
                        <button class="btn-light" id="shareMotivationVerse" type="button">
                            <img src="assets/icons/share.svg" alt="" class="ico"> Compartir
                        </button>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <article class="panel">
        <div class="reading-plan-head">
            <h3><img src="assets/icons/list.svg" alt="" class="ico"> Plan de lectura</h3>
            <small class="muted">Progreso diario de lectura completa de la Biblia.</small>
        </div>
        <div id="readingPlanCard" class="stack">
            <p class="muted">Cargando plan de lectura...</p>
        </div>
    </article>

    <article class="panel marketing-grid">
        <header class="marketing-intro">
            <span class="marketing-kicker">Plataforma integral</span>
            <h3>Todo el inicio está orientado a transformar lectura suelta en estudio con propósito.</h3>
            <p class="muted">Inspirado en patrones de home profesional: propuesta clara, evidencia de valor y acceso inmediato a acciones clave.</p>
        </header>
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
        <footer class="marketing-footnote">
            <strong>Resultado esperado:</strong>
            <span>más constancia, mejor comprensión del pasaje y preparación ministerial más ágil durante la semana.</span>
        </footer>
    </article>
</section>
<script src="<?php echo e(app_asset('assets/daily.js')); ?>"></script>

