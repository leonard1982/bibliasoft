<?php
$sermonPayload = [
    'books' => isset($books) && is_array($books) ? $books : [],
    'projects' => isset($projects) && is_array($projects) ? $projects : [],
    'initial' => isset($initial) && is_array($initial) ? $initial : [],
];
?>
<section id="sermonLabPage" class="sermon-lab-page" data-sermon="<?php echo e(app_json_safe($sermonPayload)); ?>">
    <header class="panel sermon-lab-hero">
        <div>
            <span class="sermon-lab-kicker">Preparaci&oacute;n ministerial</span>
            <h1>Sermones y mensajes</h1>
            <p class="muted">Relaciona un pasaje b&iacute;blico con tu encargo pastoral, genera un mensaje editable y gu&aacute;rdalo de inmediato en el Centro de estudio con su referencia ya vinculada.</p>
        </div>
        <div class="sermon-lab-hero-copy">
            <strong>Qu&eacute; puedes hacer aqu&iacute;</strong>
            <ul class="sermon-lab-list">
                <li>Preparar sermones expositivos, mensajes pastorales o ense&ntilde;anzas breves.</li>
                <li>Dar instrucciones concretas a la IA seg&uacute;n el contexto de tu iglesia o ciudad.</li>
                <li>Guardar el resultado como entrada de proyecto con la referencia exacta del pasaje.</li>
            </ul>
        </div>
    </header>

    <div id="sermonLabNotice" class="study-center-notice hidden" aria-live="polite"></div>

    <div class="sermon-lab-grid">
        <aside class="panel sermon-lab-sidebar">
            <form id="sermonGenerateForm" class="card sermon-lab-form">
                <strong>Generar mensaje</strong>
                <div class="study-entry-grid">
                    <label>Libro
                        <select id="sermonBook">
                            <?php foreach ($sermonPayload['books'] as $book): ?>
                                <option value="<?php echo (int) ($book['id'] ?? 0); ?>"><?php echo e((string) ($book['name'] ?? '')); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>Cap&iacute;tulo
                        <input id="sermonChapter" type="number" min="1" value="<?php echo (int) (($sermonPayload['initial']['chapter'] ?? 1)); ?>" required>
                    </label>
                    <label>Verso inicio
                        <input id="sermonVerseStart" type="number" min="1" value="<?php echo (int) (($sermonPayload['initial']['verse_start'] ?? 1)); ?>" required>
                    </label>
                    <label>Verso fin
                        <input id="sermonVerseEnd" type="number" min="1" value="<?php echo (int) (($sermonPayload['initial']['verse_end'] ?? 1)); ?>" required>
                    </label>
                </div>

                <label>Tipo de pieza
                    <select id="sermonMessageType">
                        <option value="sermon">Serm&oacute;n expositivo</option>
                        <option value="mensaje">Mensaje pastoral</option>
                        <option value="evangelistico">Mensaje evangel&iacute;stico</option>
                        <option value="ensenanza">Ense&ntilde;anza breve</option>
                        <option value="bosquejo">Bosquejo para predicar</option>
                    </select>
                </label>

                <section class="sermon-help-card" aria-labelledby="sermonTypeHelpTitle">
                    <div class="sermon-help-head">
                        <div>
                            <strong id="sermonTypeHelpTitle">Gu&iacute;a para este tipo de pieza</strong>
                            <p id="sermonTypeHelpText" class="muted">Expone el pasaje verso a verso, resaltando idea central, estructura y aplicaciones fieles al texto.</p>
                        </div>
                    </div>
                    <div class="sermon-help-pills">
                        <button class="btn-light sermon-help-pill js-sermon-help-fill" type="button" data-message-type="sermon" data-audience="Congregaci&oacute;n general" data-tone="B&iacute;blico, claro y pastoral" data-prompt="Desarrolla el pasaje de forma expositiva, mostrando la idea central, el flujo del texto y tres aplicaciones concretas para la iglesia local.">Expositivo</button>
                        <button class="btn-light sermon-help-pill js-sermon-help-fill" type="button" data-message-type="mensaje" data-audience="Iglesia local en tiempo de cuidado pastoral" data-tone="Cercano, pastoral y esperanzador" data-prompt="Enfoca el mensaje en consolar, corregir y fortalecer a la iglesia con aplicaciones concretas para la vida diaria.">Pastoral</button>
                        <button class="btn-light sermon-help-pill js-sermon-help-fill" type="button" data-message-type="evangelistico" data-audience="Personas nuevas, invitados y no creyentes" data-tone="Claro, compasivo y directo al evangelio" data-prompt="Presenta el evangelio con claridad desde este pasaje, llama al arrepentimiento y a la fe en Cristo, y termina con una invitaci&oacute;n concreta.">Evangel&iacute;stico</button>
                        <button class="btn-light sermon-help-pill js-sermon-help-fill" type="button" data-audience="J&oacute;venes y adolescentes" data-tone="Cercano, directo y aplicable" data-prompt="Conecta el pasaje con retos reales de los j&oacute;venes y deja ejemplos concretos de obediencia esta semana.">Para j&oacute;venes</button>
                        <button class="btn-light sermon-help-pill js-sermon-help-fill" type="button" data-audience="Grupo hogar o c&eacute;lula" data-tone="Conversacional, pastoral y participativo" data-prompt="Prepara un mensaje pensado para grupo peque&ntilde;o, con preguntas, aplicaci&oacute;n en comunidad y llamado a la oraci&oacute;n.">Grupo hogar</button>
                    </div>
                    <div class="sermon-help-tip">
                        <strong>C&oacute;mo llenar el formulario</strong>
                        <ul class="sermon-lab-list">
                            <li><strong>Audiencia:</strong> escribe para qui&eacute;n predicas o ense&ntilde;as.</li>
                            <li><strong>Tono:</strong> describe el estilo deseado, por ejemplo pastoral, confrontador o evangel&iacute;stico.</li>
                            <li><strong>Instrucci&oacute;n pastoral:</strong> especifica qu&eacute; quieres lograr con el mensaje.</li>
                        </ul>
                    </div>
                </section>

                <label>Audiencia
                    <input id="sermonAudience" type="text" value="<?php echo e((string) ($sermonPayload['initial']['audience'] ?? '')); ?>" placeholder="Iglesia local, j&oacute;venes, liderazgo, grupo hogar...">
                </label>

                <label>Tono
                    <input id="sermonTone" type="text" value="<?php echo e((string) ($sermonPayload['initial']['tone'] ?? '')); ?>" placeholder="Pastoral, cercano, confrontador, evangel&iacute;stico...">
                </label>

                <label>Instrucci&oacute;n pastoral / prompt
                    <textarea id="sermonPrompt" rows="8" placeholder="Ejemplo: enfoca el mensaje en restauraci&oacute;n familiar, incluye llamado a reconciliaci&oacute;n y 3 aplicaciones concretas para una iglesia urbana."><?php echo e((string) ($sermonPayload['initial']['prompt'] ?? '')); ?></textarea>
                </label>

                <div class="sermon-reference-chip">
                    <strong>Referencia base</strong>
                    <span id="sermonReferencePreview">Selecciona el pasaje</span>
                </div>

                <div class="toolbar">
                    <button id="sermonGenerateSubmit" class="btn-primary" type="submit">Generar con IA</button>
                </div>
            </form>

            <article class="card sermon-study-card">
                <strong>Guardar al Centro de estudio</strong>
                <label>Proyecto existente
                    <select id="sermonProjectSelect">
                        <option value="">Cargando proyectos...</option>
                    </select>
                </label>
                <label>Crear proyecto r&aacute;pido
                    <input id="sermonQuickProject" type="text" maxlength="80" placeholder="Serie sobre Juan, Escuela b&iacute;blica...">
                </label>
                <div class="toolbar">
                    <button id="sermonCreateProject" class="btn-light" type="button">Crear proyecto</button>
                    <a class="btn-light" href="?route=study_center">Abrir Centro de estudio</a>
                </div>
                <button id="sermonSaveProject" class="btn-primary" type="button">Guardar mensaje en proyecto</button>
            </article>
        </aside>

        <section class="panel sermon-lab-main">
            <div class="study-section-head">
                <div>
                    <h2>Resultado editable</h2>
                    <small class="muted">Ajusta el texto antes de copiarlo o guardarlo.</small>
                </div>
                <div class="toolbar">
                    <button id="sermonCopyResult" class="btn-light" type="button">Copiar</button>
                </div>
            </div>

            <div class="card sermon-result-card">
                <label>T&iacute;tulo del mensaje
                    <input id="sermonResultTitle" type="text" placeholder="La IA sugerir&aacute; un t&iacute;tulo conectado al pasaje">
                </label>
                <label>Desarrollo del mensaje
                    <textarea id="sermonResultBody" rows="22" placeholder="Aqu&iacute; aparecer&aacute; el serm&oacute;n o mensaje generado."></textarea>
                </label>
                <div class="sermon-result-meta">
                    <strong id="sermonResultMeta">A&uacute;n no se ha generado contenido.</strong>
                </div>
            </div>
        </section>
    </div>
</section>

<div id="sermonToast" class="study-toast hidden" role="status" aria-live="polite"></div>

<script src="<?php echo e(app_asset('assets/sermons.js')); ?>"></script>
