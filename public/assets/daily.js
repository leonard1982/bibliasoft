(function () {
    var root = document.getElementById('dailyHome');
    if (!root) {
        return;
    }

    var payload = {};
    try {
        payload = JSON.parse(root.getAttribute('data-daily') || '{}');
    } catch (err) {
        payload = {};
    }

    var daily = payload.daily || {};
    var today = daily.date || new Date().toISOString().slice(0, 10);
    var hideKey = 'daily_hidden_date';
    var showDailyEnabled = localStorage.getItem('show_daily_start') !== '0';

    var urlParams = new URLSearchParams(window.location.search);
    var forceDaily = urlParams.get('force_daily') === '1';

    if ((!showDailyEnabled || localStorage.getItem(hideKey) === today) && !forceDaily) {
        window.location.replace('?route=reader');
        return;
    }

    sessionStorage.setItem('daily_seen_today', today);

    var shareBtn = document.getElementById('shareDailyVerse');
    var hideBtn = document.getElementById('hideDailyToday');

    if (shareBtn) {
        shareBtn.addEventListener('click', function () {
            var text = (daily.text || '') + '\n\n' + (daily.reference || '') + '\nBiblia para todos';
            if (navigator.share) {
                navigator.share({
                    title: 'Versículo del día',
                    text: text
                }).catch(function () {});
                return;
            }
            copyText(text).then(function () {
                alert('Texto copiado para compartir.');
            });
        });
    }

    if (hideBtn) {
        hideBtn.addEventListener('click', function () {
            localStorage.setItem(hideKey, today);
            window.location.href = '?route=reader';
        });
    }

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise(function (resolve, reject) {
            try {
                var el = document.createElement('textarea');
                el.value = text;
                el.style.position = 'fixed';
                el.style.left = '-1000px';
                document.body.appendChild(el);
                el.focus();
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
                resolve();
            } catch (err) {
                reject(err);
            }
        });
    }
})();
