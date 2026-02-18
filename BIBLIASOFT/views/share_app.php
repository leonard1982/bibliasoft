<?php
$shareUrl = trim((string) $publicUrl);
?>
<section id="shareAppPage" class="share-app" data-url="<?php echo e($shareUrl); ?>">
    <article class="panel share-card">
        <h1>Compartir App</h1>
        <p class="muted">Escanea para abrir/instalar Biblia para todos.</p>
        <div class="share-grid">
            <div id="appQrCode" class="qr-box" aria-label="QR de la aplicación"></div>
            <div class="stack">
                <p class="muted"><strong>Enlace:</strong> <span id="shareAppUrl"></span></p>
                <div class="toolbar">
                    <button class="btn-light" type="button" id="copyAppLink">Copiar enlace</button>
                    <button class="btn-primary" type="button" id="shareAppLink">Compartir</button>
                </div>
                <div class="card">
                    <strong>Instalación rápida (PWA)</strong>
                    <p class="muted">Android: menú ⋮ y selecciona “Agregar a pantalla principal”.</p>
                    <p class="muted">iPhone: botón Compartir y luego “Añadir a pantalla de inicio”.</p>
                </div>
            </div>
        </div>
    </article>
</section>
<script src="assets/vendor/qrcode.min.js"></script>
<script src="assets/share_app.js"></script>
