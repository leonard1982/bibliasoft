<?php
$payload = [
    'rows' => $rows,
    'topics' => $topics,
    'filters' => $filters,
    'is_logged' => $isLogged,
];
?>
<section id="anecdotesPage" class="anecdotes-page" data-initial="<?php echo e(json_encode($payload, JSON_UNESCAPED_UNICODE)); ?>">
    <header class="panel">
        <h1>Anécdotas</h1>
        <p class="muted">Banco original para predicación y enseñanza. Evita uso de contenido con copyright no autorizado.</p>
        <div class="toolbar">
            <input type="search" id="anecdoteSearch" placeholder="Buscar anécdotas">
            <select id="anecdoteTopic">
                <option value="">Todos los temas</option>
                <?php foreach ($topics as $topicRow): ?>
                    <option value="<?php echo e($topicRow['topic']); ?>"><?php echo e($topicRow['topic']); ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn-primary" type="button" id="anecdoteFilterBtn">Filtrar</button>
            <button class="btn-light" type="button" id="anecdoteGenerateBtn">Generar anécdota</button>
        </div>
    </header>

    <section id="anecdotesList" class="anecdotes-list"></section>
</section>
<script src="assets/anecdotes.js"></script>
