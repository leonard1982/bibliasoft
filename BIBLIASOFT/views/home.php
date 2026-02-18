<section class="panel">
    <h1>Selecciona un libro</h1>
    <p class="muted">MVP lector bíblico con comentarios, apuntes, enlaces y herramientas de explicación por versículo.</p>
</section>

<section class="book-grid">
    <?php foreach ($books as $book): ?>
        <a class="book-card" href="?route=book&amp;book=<?php echo (int) $book['id']; ?>">
            <span class="book-number"><?php echo (int) $book['id']; ?></span>
            <span class="book-name"><?php echo e($book['name']); ?></span>
        </a>
    <?php endforeach; ?>
</section>
