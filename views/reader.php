<?php
$initial = [
    'book' => (int) $book,
    'chapter' => (int) $chapter,
    'book_name' => (string) $bookName,
    'books' => $books,
    'chapters' => $chapters,
    'verses' => $verses,
];
?>
<div id="readerApp"
     data-initial="<?php echo e(json_encode($initial, JSON_UNESCAPED_UNICODE)); ?>">
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
                <div>
                    <h1 id="readingTitle"><?php echo e($bookName); ?> <?php echo (int) $chapter; ?></h1>
                    <p class="muted"><?php echo e(config('branding.slogan')); ?></p>
                </div>
                <div class="toolbar">
                    <button id="openNavigator" class="btn-light mobile-only" type="button"><img src="assets/icons/menu.svg" alt="" class="ico"> Navegar</button>
                    <button id="openQuickSearch" class="btn-light" type="button"><img src="assets/icons/list.svg" alt="" class="ico"> Buscar</button>
                    <button id="copySelection" class="btn-light" type="button"><img src="assets/icons/copy.svg" alt="" class="ico"> Copiar selección</button>
                    <button id="copyParagraph" class="btn-light" type="button"><img src="assets/icons/text.svg" alt="" class="ico"> Copiar como párrafo</button>
                    <button id="shareSelection" class="btn-light" type="button"><img src="assets/icons/share.svg" alt="" class="ico"> Compartir</button>
                    <button id="toggleHelp" class="btn-light"><img src="assets/icons/help.svg" alt="" class="ico"> Ayuda</button>
                </div>
            </header>
            <div id="readingNotice" class="notice hidden"></div>
            <article id="versesContainer" class="verses-area"></article>
        </main>

        <aside class="pane pane-help" id="helpPane">
            <header class="pane-head">
                <h2><img src="assets/icons/help.svg" alt="" class="ico"> Ayuda</h2>
                <div class="tabs">
                    <button class="tab is-active" data-tab="contexto">Contexto</button>
                    <button class="tab" data-tab="comentarios">Comentarios</button>
                    <button class="tab" data-tab="notas">Mis notas</button>
                    <button class="tab" data-tab="vincular">Vincular</button>
                    <button class="tab" data-tab="herramientas">Herramientas</button>
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
            <label>Modo de vista
                <select id="optLayoutMode">
                    <option value="columns">Modo A: 3 columnas</option>
                    <option value="focus">Modo B: Pantalla completa</option>
                </select>
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
        </div>
    </div>

    <div id="searchModal" class="settings hidden" role="dialog" aria-modal="true">
        <header>
            <h3><img src="assets/icons/list.svg" alt="" class="ico"> Búsqueda avanzada</h3>
            <button class="btn-light" id="closeSearch">Cerrar</button>
        </header>
        <form id="quickSearchForm" class="settings-grid">
            <input id="qText" type="text" placeholder="Texto libre o frase">
            <select id="qMode">
                <option value="any">Cualquier palabra</option>
                <option value="all">Todas las palabras</option>
                <option value="exact">Frase exacta</option>
            </select>
            <div class="toolbar">
                <input id="qBook" type="number" min="0" max="66" placeholder="Libro (0=todos)">
                <input id="qChapterFrom" type="number" min="1" placeholder="Capítulo desde">
                <input id="qChapterTo" type="number" min="1" placeholder="Capítulo hasta">
            </div>
            <button class="btn-primary" type="submit">Buscar</button>
        </form>
        <div id="quickSearchResults" class="stack"></div>
    </div>
</div>
