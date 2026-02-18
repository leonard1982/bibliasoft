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
    var dailyCard = document.getElementById('dailyVerseCard');

    sessionStorage.setItem('daily_seen_today', today);

    if ((!showDailyEnabled || localStorage.getItem(hideKey) === today) && dailyCard) {
        dailyCard.classList.add('hidden');
    }

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
            if (dailyCard) {
                dailyCard.classList.add('hidden');
            }
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
