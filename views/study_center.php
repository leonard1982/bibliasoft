<?php
$studyPayload = [
    'projects' => isset($projects) && is_array($projects) ? $projects : [],
    'books' => isset($books) && is_array($books) ? $books : [],
];
?>
<section id="studyCenterPage" class="study-center-page" data-study="<?php echo e(app_json_safe($studyPayload)); ?>">
    <header class="panel">
        <h1>Centro de estudio por tema</h1>
        <p class="muted">Organiza proyectos de estudio (fe, familia, liderazgo, etc.), guarda pasajes por rango y desarrolla notas aplicadas en un solo lugar.</p>
    </header>
    <div id="studyCenterNotice" class="study-center-notice hidden" aria-live="polite"></div>

    <div id="studyCenterGrid" class="study-center-grid">
        <section class="panel study-detail-panel">
            <div id="studyProjectEmpty" class="card">
                <p class="muted">Selecciona o crea un proyecto para empezar.</p>
                <div class="toolbar study-empty-actions">
                    <button class="btn-light js-study-projects-open" type="button">
                        <img src="assets/icons/eye.svg" alt="" class="ico"> Ver proyectos
                    </button>
                </div>
            </div>

            <div id="studyProjectContent" class="hidden">
                <div class="study-section-head">
                    <h2 id="studyProjectTitle">Proyecto</h2>
                    <div class="toolbar study-project-actions">
                        <button class="btn-light study-project-action-btn" id="studyEntryFormToggle" type="button" aria-label="Ocultar formulario" title="Ocultar formulario">
                            <img src="assets/icons/text.svg" alt="" class="ico">
                        </button>
                        <button class="btn-light study-project-action-btn js-study-projects-open" type="button" aria-label="Ver proyectos" title="Ver proyectos">
                            <img src="assets/icons/eye.svg" alt="" class="ico">
                        </button>
                        <button class="btn-light study-project-action-btn" id="studyProjectEdit" type="button" aria-label="Editar proyecto" title="Editar proyecto">
                            <img src="assets/icons/settings.svg" alt="" class="ico">
                        </button>
                        <button class="btn-light study-project-action-btn" id="studyProjectDelete" type="button" aria-label="Eliminar proyecto" title="Eliminar proyecto">
                            <img src="assets/icons/trash.svg" alt="" class="ico">
                        </button>
                    </div>
                </div>
                <p id="studyProjectDescriptionText" class="muted"></p>

                <form id="studyEntryForm" class="card study-form">
                    <div class="study-entry-form-head">
                        <strong>Agregar pasaje al proyecto</strong>
                        <small class="muted" id="studyEntryFormStateText">Formulario visible</small>
                    </div>
                    <div id="studyEntryFormBody" class="study-entry-form-body">
                        <div class="study-entry-grid">
                            <label>Libro
                                <select id="studyEntryBook">
                                    <?php foreach ($studyPayload['books'] as $book): ?>
                                        <option value="<?php echo (int) ($book['id'] ?? 0); ?>"><?php echo e((string) ($book['name'] ?? '')); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <label>Capítulo
                                <input id="studyEntryChapter" type="number" min="1" value="1" required>
                            </label>
                            <label>Verso inicio
                                <input id="studyEntryVerseStart" type="number" min="1" value="1" required>
                            </label>
                            <label>Verso fin
                                <input id="studyEntryVerseEnd" type="number" min="1" value="1" required>
                            </label>
                        </div>
                        <label>Nota de estudio
                            <textarea id="studyEntryNote" rows="4" maxlength="5000" placeholder="Observación, aplicación, preguntas o estructura de enseñanza"></textarea>
                        </label>
                        <div class="toolbar">
                            <button class="btn-primary" type="submit">Guardar pasaje</button>
                        </div>
                    </div>
                </form>

                <article class="card">
                    <div class="study-section-head">
                        <h3><img src="assets/icons/bookmark.svg" alt="" class="ico"> Pasajes guardados</h3>
                        <small id="studyEntriesCount" class="muted"></small>
                    </div>
                    <div id="studyEntriesList" class="stack">
                        <p class="muted">Sin entradas en este proyecto.</p>
                    </div>
                </article>
            </div>
        </section>
    </div>
</section>

<div id="studyProjectsModal" class="study-modal hidden" role="dialog" aria-modal="true" aria-labelledby="studyProjectsModalTitle">
    <button type="button" class="study-modal-backdrop" id="studyProjectsModalBackdrop" aria-label="Cerrar"></button>
    <div class="study-modal-card study-projects-modal-card">
        <header class="study-modal-head">
            <h3 id="studyProjectsModalTitle">Proyectos</h3>
            <button type="button" class="btn-light" id="studyProjectsModalClose">Cerrar</button>
        </header>
        <div class="study-modal-body">
            <aside class="study-projects-panel study-projects-modal-panel">
                <div class="study-section-head">
                    <h2><img src="assets/icons/layers.svg" alt="" class="ico"> Proyectos</h2>
                    <small class="muted">Crea, selecciona y gestiona tus temas de estudio.</small>
                </div>
                <div id="studyProjectsList" class="stack">
                    <p class="muted">Cargando proyectos...</p>
                </div>
                <form id="studyProjectForm" class="card study-form">
                    <strong>Nuevo proyecto</strong>
                    <label>Nombre
                        <input id="studyProjectName" type="text" maxlength="80" placeholder="Ej. Fe en tiempos difíciles" required>
                    </label>
                    <label>Descripción
                        <textarea id="studyProjectDescription" rows="3" maxlength="500" placeholder="Objetivo del proyecto y enfoque de estudio"></textarea>
                    </label>
                    <label>Color
                        <input id="studyProjectColor" type="color" value="#1d6a8f">
                    </label>
                    <div class="toolbar">
                        <button class="btn-primary" type="submit">Crear proyecto</button>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</div>

<div id="studyModal" class="study-modal hidden" role="dialog" aria-modal="true" aria-labelledby="studyModalTitle">
    <button type="button" class="study-modal-backdrop" id="studyModalBackdrop" aria-label="Cerrar"></button>
    <div class="study-modal-card">
        <header class="study-modal-head">
            <h3 id="studyModalTitle">Editar</h3>
            <button type="button" class="btn-light" id="studyModalClose">Cerrar</button>
        </header>
        <form id="studyModalForm" class="study-modal-body">
            <p id="studyModalMessage" class="muted hidden"></p>
            <div id="studyModalFields" class="study-modal-fields"></div>
            <div class="toolbar">
                <button type="button" class="btn-light" id="studyModalCancel">Cancelar</button>
                <button type="submit" class="btn-primary" id="studyModalConfirm">Guardar</button>
            </div>
        </form>
    </div>
</div>

<div id="studyNoteModal" class="study-modal study-note-modal hidden" role="dialog" aria-modal="true" aria-labelledby="studyNoteModalTitle">
    <button type="button" class="study-modal-backdrop" id="studyNoteModalBackdrop" aria-label="Cerrar"></button>
    <div class="study-modal-card study-note-modal-card">
        <header class="study-modal-head study-note-modal-head">
            <div>
                <h3 id="studyNoteModalTitle">Nota ampliada</h3>
                <small id="studyNoteModalReference" class="muted">Referencia</small>
            </div>
            <div class="toolbar study-note-modal-head-actions">
                <button type="button" class="btn-light" id="studyNoteModalClose">Cerrar</button>
                <button type="button" class="btn-primary" id="studyNoteModalSave">Guardar nota</button>
            </div>
        </header>
        <div class="study-note-modal-toolbar">
            <strong>Resaltar selección</strong>
            <div class="study-note-toolbar-actions">
                <div class="toolbar study-note-color-actions">
                    <button type="button" class="study-note-color-btn is-yellow" data-highlight-color="yellow" aria-label="Resaltar en amarillo" title="Resaltar en amarillo"></button>
                    <button type="button" class="study-note-color-btn is-blue" data-highlight-color="blue" aria-label="Resaltar en azul" title="Resaltar en azul"></button>
                    <button type="button" class="study-note-color-btn is-green" data-highlight-color="green" aria-label="Resaltar en verde" title="Resaltar en verde"></button>
                    <button type="button" class="study-note-color-btn is-rose" data-highlight-color="rose" aria-label="Resaltar en rosa" title="Resaltar en rosa"></button>
                    <button type="button" class="btn-light" id="studyNoteClearHighlight">Quitar resaltado</button>
                    <button type="button" class="btn-light" id="studyNoteExplainSelection">
                        <img src="assets/icons/help.svg" alt="" class="ico"> Consultar selección
                    </button>
                </div>
                <div class="toolbar study-note-font-actions">
                    <button type="button" class="btn-light study-icon-font-btn" id="studyNoteFontDecrease" aria-label="Hacer texto más pequeño" title="Hacer texto más pequeño"><span class="zoom-icon is-minus" aria-hidden="true"></span></button>
                    <button type="button" class="btn-light study-icon-font-btn" id="studyNoteFontIncrease" aria-label="Hacer texto más grande" title="Hacer texto más grande"><span class="zoom-icon is-plus" aria-hidden="true"></span></button>
                </div>
            </div>
        </div>
        <div class="study-note-modal-body">
            <section class="study-note-editor-card">
                <div id="studyNoteEditor" class="study-note-editor" contenteditable="true" spellcheck="true"></div>
            </section>
            <aside class="study-note-insight-card">
                <div class="study-section-head study-note-insight-head">
                    <div>
                        <h3><img src="assets/icons/text.svg" alt="" class="ico"> Ayuda simple</h3>
                        <small class="muted">Selecciona una palabra o frase y consulta una explicación sencilla.</small>
                    </div>
                    <div class="toolbar study-note-font-actions">
                        <button type="button" class="btn-light study-icon-font-btn" id="studyNoteHelpFontDecrease" aria-label="Hacer ayuda simple más pequeña" title="Hacer ayuda simple más pequeña"><span class="zoom-icon is-minus" aria-hidden="true"></span></button>
                        <button type="button" class="btn-light study-icon-font-btn" id="studyNoteHelpFontIncrease" aria-label="Hacer ayuda simple más grande" title="Hacer ayuda simple más grande"><span class="zoom-icon is-plus" aria-hidden="true"></span></button>
                    </div>
                </div>
                <div id="studyNoteSelectedTokens" class="study-note-selected-tokens hidden"></div>
                <div id="studyNoteExplainState" class="study-note-explain-state muted">Aún no has consultado ninguna selección.</div>
                <div id="studyNoteExplainResult" class="study-note-explain-result hidden"></div>
                <div id="studyNoteExplainHistory" class="study-note-explain-history hidden"></div>
            </aside>
        </div>
    </div>
</div>

<div id="studyToast" class="study-toast hidden" role="status" aria-live="polite"></div>
<script src="<?php echo e(app_asset('assets/study_center.js')); ?>"></script>
