<section class="panel chapter-header">
    <div>
        <h1><?php echo e($bookName); ?> <?php echo (int) $chapter; ?></h1>
        <p class="muted">Haz click en un versículo para abrir panel lateral.</p>
    </div>
    <div class="chapter-nav">
        <?php if ($prevChapter): ?>
            <a class="btn-light" href="?route=chapter&amp;book=<?php echo (int) $prevChapter['book']; ?>&amp;chapter=<?php echo (int) $prevChapter['chapter']; ?>">
                ← <?php echo e($prevChapter['label']); ?>
            </a>
        <?php endif; ?>
        <?php if ($nextChapter): ?>
            <a class="btn-light" href="?route=chapter&amp;book=<?php echo (int) $nextChapter['book']; ?>&amp;chapter=<?php echo (int) $nextChapter['chapter']; ?>">
                <?php echo e($nextChapter['label']); ?> →
            </a>
        <?php endif; ?>
    </div>
</section>

<section class="verses-list">
    <?php foreach ($verses as $row): ?>
        <article
            class="verse-card js-verse"
            data-book="<?php echo (int) $row['book']; ?>"
            data-chapter="<?php echo (int) $row['chapter']; ?>"
            data-verse="<?php echo (int) $row['verse']; ?>"
            tabindex="0">
            <span class="verse-number"><?php echo (int) $row['verse']; ?></span>
            <div class="verse-text"><?php echo $row['scripture_html']; ?></div>
        </article>
    <?php endforeach; ?>
</section>

<aside id="verseDrawer" class="drawer" aria-hidden="true">
    <div class="drawer-backdrop js-close-drawer"></div>
    <div class="drawer-panel">
        <header class="drawer-header">
            <h2 id="drawerTitle">Versículo</h2>
            <button type="button" class="icon-btn js-close-drawer">Cerrar</button>
        </header>

        <section class="drawer-section">
            <h3>Texto</h3>
            <div id="drawerVerseText"></div>
        </section>

        <section class="drawer-section">
            <h3>Comentarios / Notas</h3>
            <div id="drawerCommentary" class="stack"></div>
        </section>

        <section class="drawer-section">
            <h3>Mis apuntes</h3>
            <form id="noteForm" class="stack">
                <textarea id="noteContent" rows="3" placeholder="Escribe un apunte..."></textarea>
                <button type="submit" class="btn-primary">Guardar apunte</button>
            </form>
            <div id="notesList" class="stack compact"></div>
        </section>

        <section class="drawer-section">
            <h3>Vincular versículos</h3>
            <form id="linkForm" class="link-grid">
                <input type="number" id="linkBook" min="1" max="66" placeholder="Libro">
                <input type="number" id="linkChapter" min="1" placeholder="Capítulo">
                <input type="number" id="linkVerse" min="1" placeholder="Versículo">
                <input type="text" id="linkNote" placeholder="Nota opcional">
                <button type="submit" class="btn-primary">Vincular</button>
            </form>
            <div id="linksList" class="stack compact"></div>
        </section>

        <section class="drawer-section">
            <div class="section-inline">
                <h3>Explicación por versículo</h3>
                <button id="refreshAi" class="btn-light" type="button">Actualizar</button>
            </div>
            <div id="aiCards" class="stack"></div>
        </section>
    </div>
</aside>
