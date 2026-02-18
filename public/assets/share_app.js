(function () {
    var root = document.getElementById('shareAppPage');
    if (!root) {
        return;
    }

    var configuredUrl = (root.getAttribute('data-url') || '').trim();
    var appUrl = configuredUrl || window.location.origin + window.location.pathname;
    var qrBox = document.getElementById('appQrCode');
    var urlLabel = document.getElementById('shareAppUrl');
    var copyBtn = document.getElementById('copyAppLink');
    var shareBtn = document.getElementById('shareAppLink');

    if (urlLabel) {
        urlLabel.textContent = appUrl;
    }

    if (qrBox && typeof QRCode !== 'undefined') {
        qrBox.innerHTML = '';
        new QRCode(qrBox, {
            text: appUrl,
            width: 230,
            height: 230,
            colorDark: '#0f2735',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.M
        });
    }

    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            copyText(appUrl).then(function () {
                alert('Enlace copiado.');
            });
        });
    }

    if (shareBtn) {
        shareBtn.addEventListener('click', function () {
            if (navigator.share) {
                navigator.share({
                    title: 'Biblia para todos',
                    text: 'Abre Biblia para todos en tu celular',
                    url: appUrl
                }).catch(function () {});
                return;
            }
            copyText(appUrl).then(function () {
                alert('Compartir no disponible. Enlace copiado.');
            });
        });
    }

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise(function (resolve, reject) {
            try {
                var area = document.createElement('textarea');
                area.value = text;
                area.style.position = 'fixed';
                area.style.left = '-1000px';
                document.body.appendChild(area);
                area.select();
                document.execCommand('copy');
                document.body.removeChild(area);
                resolve();
            } catch (err) {
                reject(err);
            }
        });
    }
})();
