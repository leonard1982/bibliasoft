<?php
$initial = [
    'book' => (int) $book,
    'chapter' => (int) $chapter,
    'book_name' => (string) $bookName,
    'books' => $books,
    'chapters' => $chapters,
    'verses' => $verses,
    'highlights' => $highlights,
    'backgrounds' => $backgrounds,
    'highlight_verse' => (int) $highlightVerse,
    'user_prefs' => $userPrefs,
    'open_search' => (int) $openSearch,
    'versions' => $versions,
    'auth' => [
        'is_logged' => auth_user_id() > 0,
        'username' => auth_username(),
    ],
    'branding' => [
        'app_name' => (string) config('branding.app_name', 'Biblia para todos'),
        'church_name' => (string) config('branding.church_name', ''),
        'logo_public' => (string) config('branding.logo_public', 'assets/branding/logo_bibliasoft.png'),
    ],
];
?>
<div id="readerApp"
     data-initial="<?php echo e(app_json_safe($initial)); ?>">
    <section class="reader-shell">
        <aside class="pane pane-books" id="booksPane">
            <div class="pane-head">
                <h2><img src="assets/icons/book.svg" alt="" class="ico"> Libros</h2>
                <input id="bookFilter" type="search" placeholder="Buscar libro...">
            </div>
            <div id="booksList" class="list-scroll"></div>
        </aside>

        <aside class="pane pane-chapters" id="chaptersPane">
            <div class="pane-head mini">
                <h2><img src="assets/icons/list.svg" alt="" class="ico"> Capítulos</h2>
            </div>
            <div id="chaptersList" class="list-scroll"></div>
        </aside>

        <main class="pane pane-reading">
            <header class="reading-head">
                <div class="reading-meta">
                    <h1 id="readingTitle"><?php echo e($bookName); ?> <?php echo (int) $chapter; ?></h1>
                    <p class="muted"><?php echo e(config('branding.slogan')); ?></p>
                </div>
                <div class="toolbar reading-tools">
                    <button id="openNavigator" class="btn-light mobile-only" type="button" title="Navegar" aria-label="Navegar"><img src="assets/icons/menu.svg" alt="" class="ico"><span class="btn-label">Navegar</span></button>
                    <button id="openQuickSearch" class="btn-light hide-in-preach" type="button" title="Buscar" aria-label="Buscar"><img src="assets/icons/search.svg" alt="" class="ico"><span class="btn-label">Buscar</span></button>
                    <button id="openReadingPlan" class="btn-light hide-in-preach" type="button" title="Plan de lectura" aria-label="Plan de lectura"><img src="assets/icons/calendar.svg" alt="" class="ico"><span class="btn-label">Plan</span></button>
                    <button id="toggleParallel" class="btn-light hide-in-preach" type="button" title="Comparar versiones" aria-label="Comparar versiones"><img src="assets/icons/columns.svg" alt="" class="ico"><span class="btn-label">Comparar</span></button>
                    <button id="openVersions" class="btn-light hide-in-preach" type="button" title="Versiones" aria-label="Versiones"><img src="assets/icons/layers.svg" alt="" class="ico"><span class="btn-label">Versiones</span></button>
                    <button id="openModules" class="btn-light hide-in-preach" type="button" title="Módulos" aria-label="Módulos"><img src="assets/icons/bookmark.svg" alt="" class="ico"><span class="btn-label">Módulos</span></button>
                    <button id="openInterlinear" class="btn-light hide-in-preach" type="button" title="Interlineal" aria-label="Interlineal"><img src="assets/icons/interlinear.svg" alt="" class="ico"><span class="btn-label">Interlineal</span></button>
                    <button id="openAudio" class="btn-light hide-in-preach btn-icon-quick" data-tip="Audio Biblia" type="button" title="Audio Biblia" aria-label="Audio Biblia"><img src="assets/icons/audio.svg" alt="" class="ico"></button>
                    <button id="copySelection" class="btn-light hide-in-preach btn-icon-quick" data-tip="Copiar selección" type="button" title="Copiar selección" aria-label="Copiar selección"><img src="assets/icons/copy.svg" alt="" class="ico"></button>
                    <button id="copyParagraph" class="btn-light hide-in-preach btn-icon-quick" data-tip="Copiar párrafo" type="button" title="Copiar como párrafo" aria-label="Copiar como párrafo"><img src="assets/icons/text.svg" alt="" class="ico"></button>
                    <button id="shareSelection" class="btn-light hide-in-preach btn-icon-quick" data-tip="Compartir" type="button" title="Compartir" aria-label="Compartir"><img src="assets/icons/share.svg" alt="" class="ico"></button>
                    <button id="shareWhatsApp" class="btn-light hide-in-preach btn-icon-quick btn-share-quick btn-share-wa" data-tip="Compartir a WhatsApp" type="button" title="Compartir a WhatsApp" aria-label="Compartir a WhatsApp"><img src="assets/icons/whatsapp.svg" alt="" class="ico"></button>
                    <button id="shareFacebook" class="btn-light hide-in-preach btn-icon-quick btn-share-quick btn-share-fb" data-tip="Compartir a Facebook" type="button" title="Compartir a Facebook" aria-label="Compartir a Facebook"><img src="assets/icons/facebook.svg" alt="" class="ico"></button>
                    <button id="toggleHelp" class="btn-light hide-in-preach btn-icon-quick" data-tip="Ayuda" type="button" title="Ayuda" aria-label="Ayuda"><img src="assets/icons/help.svg" alt="" class="ico"></button>
                    <button id="openGuideTour" class="btn-light hide-in-preach btn-icon-quick" data-tip="Tour guiado" type="button" title="Tour guiado" aria-label="Tour guiado"><img src="assets/icons/list.svg" alt="" class="ico"></button>
                    <button id="togglePreachMode" class="btn-light" type="button" title="Modo predicación" aria-label="Modo predicación"><img src="assets/icons/eye.svg" alt="" class="ico"><span class="btn-label">Predicación</span></button>
                </div>
            </header>
            <div id="readingNotice" class="notice hidden"></div>
            <article id="versesContainer" class="verses-area"></article>
            <div id="preachControls" class="preach-controls hidden">
                <div class="preach-nav-group">
                    <button id="preachPrevChapter" class="btn-light" type="button">Capítulo anterior</button>
                    <button id="preachNextChapter" class="btn-light" type="button">Capítulo siguiente</button>
                    <input id="preachVerseJump" type="number" min="1" placeholder="Versículo">
                    <button id="preachGoVerse" class="btn-primary" type="button">Ir</button>
                </div>
                <div class="preach-timer-group">
                    <strong id="preachTimerDisplay" class="preach-timer-display">00:00</strong>
                    <button id="preachTimerToggle" class="btn-light" type="button">Iniciar</button>
                    <button id="preachTimerReset" class="btn-light" type="button">Reiniciar</button>
                </div>
                <div class="preach-markers-group">
                    <button id="preachSetMarker1" class="btn-light" type="button">Fijar M1</button>
                    <button id="preachGoMarker1" class="btn-light" type="button" disabled>Ir M1</button>
                    <button id="preachSetMarker2" class="btn-light" type="button">Fijar M2</button>
                    <button id="preachGoMarker2" class="btn-light" type="button" disabled>Ir M2</button>
                    <button id="preachSetMarker3" class="btn-light" type="button">Fijar M3</button>
                    <button id="preachGoMarker3" class="btn-light" type="button" disabled>Ir M3</button>
                </div>
            </div>
        </main>

        <aside class="pane pane-help" id="helpPane">
            <header class="pane-head">
                <h2><img src="assets/icons/help.svg" alt="" class="ico"> Ayuda</h2>
                <div class="tabs">
                    <button class="tab is-active" data-tab="contexto" title="Contexto"><img src="assets/icons/help.svg" alt="" class="ico tab-ico"><span>Contexto</span></button>
                    <button class="tab" data-tab="comentarios" title="Comentarios"><img src="assets/icons/text.svg" alt="" class="ico tab-ico"><span>Comentarios</span></button>
                    <button class="tab" data-tab="notas" title="Mis notas"><img src="assets/icons/copy.svg" alt="" class="ico tab-ico"><span>Mis notas</span></button>
                    <button class="tab" data-tab="vincular" title="Vincular"><img src="assets/icons/share.svg" alt="" class="ico tab-ico"><span>Vincular</span></button>
                    <button class="tab" data-tab="herramientas" title="Herramientas"><img src="assets/icons/settings.svg" alt="" class="ico tab-ico"><span>Herramientas</span></button>
                    <button class="tab" data-tab="guia" title="Guía"><img src="assets/icons/list.svg" alt="" class="ico tab-ico"><span>Guía</span></button>
                </div>
            </header>

            <section class="tab-panel is-active" data-panel="contexto">
                <div id="contextPanel" class="stack">
                    <p class="muted">Selecciona uno o más versículos para ver contexto.</p>
                </div>
            </section>

            <section class="tab-panel" data-panel="comentarios">
                <div id="commentsPanel" class="stack"></div>
            </section>

            <section class="tab-panel" data-panel="notas">
                <div id="notesPanel" class="stack"></div>
            </section>

            <section class="tab-panel" data-panel="vincular">
                <div id="linksPanel" class="stack"></div>
            </section>

            <section class="tab-panel" data-panel="herramientas">
                <div id="toolsPanel" class="stack"></div>
            </section>

            <section class="tab-panel" data-panel="guia">
                <div id="guidePanel" class="stack">
                    <p class="muted">Cargando guía de uso...</p>
                </div>
            </section>
        </aside>
    </section>

    <div id="mobileOverlay" class="overlay hidden"></div>
    <div id="settingsModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/settings.svg" alt="" class="ico"> Configuración</h3>
            <button class="btn-light" id="closeSettings">Cerrar</button>
        </header>
        <div class="settings-grid">
            <label><input type="checkbox" id="optShowHelp" checked> Mostrar panel de ayuda</label>
            <label><input type="checkbox" id="optAutoTour" checked> Mostrar tour guiado al iniciar</label>
            <label>Modo de vista
                <select id="optLayoutMode">
                    <option value="columns">Modo A: 3 columnas</option>
                    <option value="focus">Modo B: Pantalla completa</option>
                </select>
            </label>
            <label><input type="checkbox" id="optShowDaily" checked> Mostrar Versículo del día al iniciar</label>
            <label><input type="checkbox" id="optAutoDevotional"> Activar devocionales automáticos</label>
            <label>Meta semanal (días completos)
                <select id="optWeeklyGoalDays">
                    <option value="1">1 día</option>
                    <option value="2">2 días</option>
                    <option value="3">3 días</option>
                    <option value="4">4 días</option>
                    <option value="5">5 días</option>
                    <option value="6">6 días</option>
                    <option value="7">7 días</option>
                </select>
            </label>
            <label><input type="checkbox" id="optReminderEnabled"> Activar recordatorio diario</label>
            <label>Hora del recordatorio
                <input type="time" id="optReminderTime" step="60" value="07:00">
            </label>
            <label>Tamaño de letra
                <select id="optFontSize">
                    <option value="sm">Pequeña</option>
                    <option value="md">Media</option>
                    <option value="lg">Grande</option>
                </select>
            </label>
            <label>Espaciado de versículos
                <select id="optSpacing">
                    <option value="compact">Compacto</option>
                    <option value="normal">Normal</option>
                </select>
            </label>
            <label>Tema
                <select id="optTheme">
                    <option value="light">Claro</option>
                    <option value="dark">Oscuro</option>
                </select>
            </label>
            <small class="muted">Configurar token: pega tu token en el archivo `.env` (no en la interfaz).</small>
            <small class="muted">Para habilitar funciones avanzadas, configure su token en `.env`.</small>
        </div>
    </div>

    <div id="searchModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/list.svg" alt="" class="ico"> Búsqueda avanzada</h3>
            <button class="btn-light" id="closeSearch">Cerrar</button>
        </header>
        <form id="quickSearchForm" class="settings-grid">
            <input id="qText" type="text" placeholder="Texto libre o frase">
            <label>Tema (concordancia)
                <div id="qThemeCombo" class="theme-combo">
                    <button id="qThemeToggle" class="theme-combo-toggle" type="button" aria-haspopup="listbox" aria-expanded="false">
                        <span id="qThemeLabel">Todos los temas</span>
                    </button>
                    <div id="qThemePanel" class="theme-combo-panel hidden">
                        <input id="qThemeSearch" type="search" placeholder="Buscar tema...">
                        <div id="qThemeOptions" class="theme-combo-options" role="listbox"></div>
                    </div>
                </div>
                <select id="qTheme" class="theme-select-hidden">
                    <option value="">Todos los temas</option>
                    <option value="gracia">Gracia</option>
                    <option value="fe">Fe</option>
                    <option value="perdon">Perdón</option>
                    <option value="esperanza">Esperanza</option>
                    <option value="amor">Amor</option>
                    <option value="oracion">Oración</option>
                    <option value="salvacion">Salvación</option>
                    <option value="sabiduria">Sabiduría</option>
                    <option value="paz">Paz</option>
                    <option value="gozo">Gozo</option>
                    <option value="santidad">Santidad</option>
                    <option value="obediencia">Obediencia</option>
                    <option value="justicia">Justicia</option>
                    <option value="misericordia">Misericordia</option>
                    <option value="humildad">Humildad</option>
                    <option value="fortaleza">Fortaleza</option>
                    <option value="sanidad">Sanidad</option>
                    <option value="familia">Familia</option>
                    <option value="matrimonio">Matrimonio</option>
                    <option value="juventud">Juventud</option>
                    <option value="disciplina">Disciplina</option>
                    <option value="servicio">Servicio</option>
                    <option value="gratitud">Gratitud</option>
                    <option value="generosidad">Generosidad</option>
                    <option value="verdad">Verdad</option>
                    <option value="pureza">Pureza</option>
                    <option value="evangelismo">Evangelismo</option>
                    <option value="discipulado">Discipulado</option>
                    <option value="liderazgo">Liderazgo</option>
                    <option value="consuelo">Consuelo</option>
                </select>
            </label>
            <select id="qMode">
                <option value="any">Cualquier palabra</option>
                <option value="all">Todas las palabras</option>
                <option value="exact">Frase exacta</option>
            </select>
            <select id="qBook">
                <option value="">Todos los libros</option>
                <?php foreach ($books as $bookRow): ?>
                    <option value="<?php echo (int) $bookRow['id']; ?>"><?php echo e($bookRow['name']); ?></option>
                <?php endforeach; ?>
            </select>
            <div class="toolbar">
                <input id="qChapterFrom" type="number" min="1" placeholder="Capítulo desde (opcional)">
                <input id="qChapterTo" type="number" min="1" placeholder="Capítulo hasta (opcional)">
            </div>
            <button class="btn-light" id="runThemeSearch" type="button">Buscar por tema</button>
            <button class="btn-primary" type="submit">Buscar</button>
        </form>
        <div id="quickSearchResults" class="stack"></div>
    </div>

    <div id="planModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/list.svg" alt="" class="ico"> Plan de lectura</h3>
            <button class="btn-light" id="closePlan">Cerrar</button>
        </header>
        <div id="readerPlanCard" class="stack">
            <p class="muted">Cargando plan de lectura...</p>
        </div>
    </div>

    <div id="versionsModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/book.svg" alt="" class="ico"> Versiones de Biblia</h3>
            <button class="btn-light" id="closeVersions">Cerrar</button>
        </header>
        <div class="settings-grid">
            <label>Versión principal
                <select id="versionPrimarySelect"></select>
            </label>
            <label>Versión para comparar
                <select id="versionCompareSelect"></select>
            </label>
            <button class="btn-primary" type="button" id="saveVersions">Guardar versiones</button>
            <small class="muted">Al guardar, el lector recarga la vista con la nueva versión seleccionada.</small>
        </div>
    </div>

    <div id="modulesModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/bookmark.svg" alt="" class="ico"> Módulos descargables</h3>
            <button class="btn-light" id="closeModules">Cerrar</button>
        </header>
        <div class="modules-grid">
            <div id="modulesList" class="stack">
                <div class="card modules-help-card">
                    <strong>Cómo usar módulos</strong>
                    <small class="muted">1) Pulsa <b>Descargar</b>. 2) Pulsa <b>Activar</b>. 3) Cierra el modal y abre un pasaje para ver comentarios/diccionario.</small>
                </div>
                <p class="muted">Cargando módulos...</p>
            </div>
            <div class="card modules-dict-card">
                <strong>Diccionario adicional</strong>
                <small class="muted">Busca términos en los diccionarios que tengas activos.</small>
                <div class="toolbar">
                    <input id="modulesDictQuery" type="search" placeholder="Ejemplo: gracia, fe, redencion">
                    <button id="modulesDictSearch" class="btn-primary" type="button">Buscar</button>
                </div>
                <div id="modulesDictResults" class="stack">
                    <p class="muted">Sin resultados todavía.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="interlinearModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/interlinear.svg" alt="" class="ico"> Interlineal</h3>
            <button class="btn-light" id="closeInterlinear">Cerrar</button>
        </header>
        <div id="interlinearModalBody" class="stack">
            <p class="muted">Selecciona uno o más versículos y abre Interlineal.</p>
        </div>
    </div>

    <div id="guideModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/list.svg" alt="" class="ico"> Tour guiado</h3>
            <button class="btn-light" id="closeGuide">Cerrar</button>
        </header>
        <div class="settings-grid">
            <small id="guideTourStepLabel" class="muted">Paso 1 de 1</small>
            <article class="card">
                <strong id="guideTourTitle">Bienvenido a BIBLIASOFT</strong>
                <p id="guideTourText" class="muted">Aquí verás una guía rápida para usar el lector con claridad.</p>
                <small id="guideTourHint" class="muted">Tip: puedes volver a abrir este tour desde el botón "Tour guiado".</small>
            </article>
            <div class="toolbar">
                <button class="btn-light" id="guidePrevStep" type="button">Anterior</button>
                <button class="btn-light" id="guideGoTarget" type="button">Ir al elemento</button>
                <button class="btn-primary" id="guideNextStep" type="button">Siguiente</button>
            </div>
            <label><input type="checkbox" id="guideHideOnStart"> No mostrar automáticamente al iniciar</label>
            <small class="muted">Puedes volverlo a abrir desde el botón de Tour o desde la pestaña Guía.</small>
        </div>
    </div>

    <div id="strongModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/help.svg" alt="" class="ico"> Strong</h3>
            <button class="btn-light" id="closeStrong">Cerrar</button>
        </header>
        <div id="strongModalBody" class="stack">
            <p class="muted">Toca una palabra con código Strong para ver su definición.</p>
        </div>
    </div>

    <div id="audioModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/audio.svg" alt="" class="ico"> Audio Biblia</h3>
            <button class="btn-light" id="closeAudio">Cerrar</button>
        </header>
        <div class="settings-grid">
            <label>Fuente de lectura
                <select id="audioSource">
                    <option value="chapter">Capítulo actual</option>
                    <option value="selection">Selección actual</option>
                </select>
            </label>
            <label>Voz disponible
                <select id="audioVoice"></select>
            </label>
            <label>Velocidad
                <input id="audioRate" type="range" min="0.7" max="1.6" step="0.1" value="1">
                <small id="audioRateLabel" class="muted">1.0x</small>
            </label>
            <div id="audioTargetInfo" class="card">
                <small class="muted">Aquí aparecerá el pasaje a leer.</small>
            </div>
            <div class="toolbar audio-controls">
                <button class="btn-primary" id="audioPlay" type="button">Leer</button>
                <button class="btn-light" id="audioPauseResume" type="button">Pausar</button>
                <button class="btn-light" id="audioStop" type="button">Detener</button>
            </div>
            <small id="audioStatus" class="muted">Listo para reproducir.</small>
        </div>
    </div>
</div>

