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
        <aside class="panel study-projects-panel">
            <div class="study-section-head">
                <h2><img src="assets/icons/layers.svg" alt="" class="ico"> Proyectos</h2>
                <small class="muted">Crea y selecciona un tema de estudio.</small>
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

        <section class="panel study-detail-panel">
            <div id="studyProjectEmpty" class="card">
                <p class="muted">Selecciona o crea un proyecto para empezar.</p>
            </div>

            <div id="studyProjectContent" class="hidden">
                <div class="study-section-head">
                    <h2 id="studyProjectTitle">Proyecto</h2>
                    <div class="toolbar study-project-actions">
                        <button class="btn-light study-project-action-btn" id="studyProjectsToggle" type="button" aria-expanded="true" aria-label="Ocultar proyectos" title="Ocultar proyectos">
                            <img src="assets/icons/columns.svg" alt="" class="ico">
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
                    <strong>Agregar pasaje al proyecto</strong>
                    <div class="study-entry-grid">
                        <label>Libro
                            <select id="studyEntryBook">
                                <?php foreach ($studyPayload['books'] as $book): ?>
                                    <option value="<?php echo (int) ($book['id'] ?? 0); ?>"><?php echo e($book['name'] ?? ''); ?></option>
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

<div id="studyToast" class="study-toast hidden" role="status" aria-live="polite"></div>
<script src="<?php echo e(app_asset('assets/study_center.js')); ?>"></script>
