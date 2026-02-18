<section class="panel">
    <h1>Búsqueda bíblica</h1>
    <form method="get" class="search-form">
        <input type="hidden" name="route" value="search">
        <input type="text" name="q" value="<?php echo e($filters['query']); ?>" placeholder="Texto libre o frase exacta">

        <select name="mode">
            <option value="any" <?php echo $filters['mode'] === 'any' ? 'selected' : ''; ?>>Cualquier palabra</option>
            <option value="all" <?php echo $filters['mode'] === 'all' ? 'selected' : ''; ?>>Todas las palabras</option>
            <option value="exact" <?php echo $filters['mode'] === 'exact' ? 'selected' : ''; ?>>Frase exacta</option>
        </select>

        <select name="book">
            <option value="0">Todos los libros</option>
            <?php foreach ($books as $bookRow): ?>
                <option value="<?php echo (int) $bookRow['id']; ?>" <?php echo (int) $filters['book'] === (int) $bookRow['id'] ? 'selected' : ''; ?>>
                    <?php echo e($bookRow['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="chapter_from" min="1" placeholder="Cap. desde" value="<?php echo (int) $filters['chapter_from']; ?>">
        <input type="number" name="chapter_to" min="1" placeholder="Cap. hasta" value="<?php echo (int) $filters['chapter_to']; ?>">
        <button type="submit" class="btn-primary">Buscar</button>
    </form>
</section>

<?php if ($filters['query'] !== ''): ?>
    <section class="panel">
        <p class="muted">Motor: <strong><?php echo e((string) $result['engine']); ?></strong></p>
        <p>Resultados: <?php echo count($result['rows']); ?></p>
    </section>

    <section class="verses-list">
        <?php foreach ($result['rows'] as $row): ?>
            <article class="verse-card">
                <a class="verse-link" href="?route=chapter&amp;book=<?php echo (int) $row['book']; ?>&amp;chapter=<?php echo (int) $row['chapter']; ?>">
                    <?php echo e($bibleRepository->buildReferenceLabel($row['book'], $row['chapter'], $row['verse'])); ?>
                </a>
                <div class="verse-text"><?php echo $row['scripture_html']; ?></div>
            </article>
        <?php endforeach; ?>
    </section>
<?php endif; ?>
