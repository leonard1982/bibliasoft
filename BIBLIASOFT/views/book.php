<section class="panel">
    <h1><?php echo e($bookName); ?></h1>
    <p class="muted">Navega por capítulos.</p>
</section>

<?php if (empty($chapters)): ?>
    <section class="panel">
        <p>No hay capítulos disponibles para este libro.</p>
    </section>
<?php else: ?>
    <section class="chapter-grid">
        <?php foreach ($chapters as $chapterNumber): ?>
            <a class="chapter-card"
               href="?route=chapter&amp;book=<?php echo (int) $book; ?>&amp;chapter=<?php echo (int) $chapterNumber; ?>">
                Cap. <?php echo (int) $chapterNumber; ?>
            </a>
        <?php endforeach; ?>
    </section>
<?php endif; ?>
