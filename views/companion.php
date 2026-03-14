<?php
$companionPayload = [
    'threads' => isset($threads) && is_array($threads) ? $threads : [],
    'selectedThread' => isset($selectedThread) && is_array($selectedThread) ? $selectedThread : null,
    'messages' => isset($messages) && is_array($messages) ? $messages : [],
    'user' => isset($user) && is_array($user) ? $user : [],
    'companionName' => isset($companionName) ? (string) $companionName : 'Alfonso',
];
?>
<section id="companionPage" class="companion-page" data-companion="<?php echo e(app_json_safe($companionPayload)); ?>">
    <header class="panel companion-hero">
        <div>
            <span class="sermon-lab-kicker">Acompañamiento bíblico</span>
            <h1><?php echo e((string) ($companionPayload['companionName'] ?? 'Alfonso')); ?></h1>
            <p class="muted">Haz preguntas, pide ayuda para entender un pasaje, conversa sobre una inquietud y, si necesitas oración, también puedes escribirla aquí.</p>
        </div>
        <div class="companion-hero-copy">
            <strong>Cómo te ayuda</strong>
            <ul class="sermon-lab-list">
                <li>Explica temas bíblicos con lenguaje sencillo y pastoral.</li>
                <li>Ayuda a aplicar la Escritura a situaciones reales.</li>
                <li>Si detecta una petición de oración, la deja registrada para seguimiento pastoral.</li>
            </ul>
        </div>
    </header>

    <div id="companionNotice" class="study-center-notice hidden" aria-live="polite"></div>

    <div class="companion-grid">
        <aside class="panel companion-sidebar">
            <div class="study-section-head">
                <div>
                    <h2>Conversaciones</h2>
                    <small class="muted">Tu historial con <?php echo e((string) ($companionPayload['companionName'] ?? 'Alfonso')); ?>.</small>
                </div>
                <button id="companionNewThread" class="btn-primary" type="button">Nueva</button>
            </div>
            <div id="companionThreads" class="companion-thread-list"></div>
        </aside>

        <section class="panel companion-main">
            <div class="study-section-head">
                <div>
                    <h2 id="companionThreadTitle">Conversación</h2>
                    <small id="companionThreadMeta" class="muted">Escribe con confianza. Todo queda registrado para seguimiento interno.</small>
                </div>
            </div>

            <div id="companionMessages" class="companion-messages"></div>

            <div class="card companion-quick-card">
                <strong>Ayudas rápidas</strong>
                <div class="companion-quick-actions">
                    <button class="btn-light js-companion-prompt" type="button" data-prompt="Explícame este tema bíblico de manera sencilla.">Explícamelo fácil</button>
                    <button class="btn-light js-companion-prompt" type="button" data-prompt="Ayúdame a aplicar esto hoy a mi vida y familia.">Aplicarlo hoy</button>
                    <button class="btn-light js-companion-prompt" type="button" data-prompt="Necesito una orientación pastoral sobre esto.">Consejo pastoral</button>
                    <button class="btn-light js-companion-prompt" type="button" data-prompt="Quiero pedir oración por esta situación: ">Pedir oración</button>
                </div>
            </div>

            <form id="companionForm" class="card companion-form">
                <label>
                    <span>Escribe tu mensaje</span>
                    <textarea id="companionMessage" rows="7" placeholder="Ejemplo: no entiendo Juan 15, ayúdame a verlo claro..."></textarea>
                </label>
                <div class="toolbar">
                    <button id="companionSend" class="btn-primary" type="submit">Enviar a <?php echo e((string) ($companionPayload['companionName'] ?? 'Alfonso')); ?></button>
                </div>
            </form>
        </section>
    </div>
</section>

<script src="<?php echo e(app_asset('assets/companion.js')); ?>"></script>
