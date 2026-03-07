(function () {
    var SETTINGS_KEY = 'biblia_settings';
    var LAST_TRIGGER_KEY = 'reminder_last_trigger_date';
    var DAILY_ROUTE = '?route=home_daily';

    function init() {
        checkReminder();
        setInterval(checkReminder, 30000);

        window.addEventListener('focus', checkReminder);
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                checkReminder();
            }
        });
        window.addEventListener('storage', function (event) {
            if (event.key === SETTINGS_KEY) {
                checkReminder();
            }
        });
    }

    function checkReminder() {
        var settings = readSettings();
        if (!settings.reminderEnabled) {
            return;
        }

        var now = new Date();
        var todayKey = formatLocalDate(now);
        if (localStorage.getItem(LAST_TRIGGER_KEY) === todayKey) {
            return;
        }

        if (!isReminderTimeReached(now, settings.reminderTime)) {
            return;
        }

        localStorage.setItem(LAST_TRIGGER_KEY, todayKey);
        fetchReminderInsight(settings.reminderTime).then(function (insight) {
            fireReminder(insight);
        }).catch(function () {
            fireReminder({
                title: 'Recordatorio diario',
                body: 'Es tiempo de tu lectura biblica (' + settings.reminderTime + ').',
                route: DAILY_ROUTE
            });
        });
    }

    function readSettings() {
        var parsed = {};
        try {
            parsed = JSON.parse(localStorage.getItem(SETTINGS_KEY) || '{}') || {};
        } catch (err) {
            parsed = {};
        }

        return {
            reminderEnabled: parsed.reminderEnabled === true || Number(parsed.reminderEnabled) === 1,
            reminderTime: normalizeTime(parsed.reminderTime || '07:00')
        };
    }

    function fetchReminderInsight(reminderTime) {
        var params = new URLSearchParams({
            route: 'api.reminder.insight',
            time: normalizeTime(reminderTime)
        });
        return fetch('?' + params.toString()).then(function (res) {
            return res.json();
        }).then(function (payload) {
            if (!payload || payload.error) {
                throw new Error('insight');
            }
            return {
                title: String(payload.title || 'Recordatorio diario'),
                body: String(payload.body || 'Es tiempo de tu lectura biblica.'),
                route: String(payload.route || DAILY_ROUTE)
            };
        });
    }

    function fireReminder(insight) {
        var data = insight || {};
        var title = String(data.title || 'Recordatorio diario');
        var body = String(data.body || 'Es tiempo de tu lectura biblica.');
        var route = String(data.route || DAILY_ROUTE);

        if ('Notification' in window && Notification.permission === 'granted') {
            try {
                var note = new Notification(title, {
                    body: body,
                    icon: 'assets/icons/book.svg'
                });
                note.onclick = function () {
                    window.focus();
                    window.location.href = route;
                };
            } catch (err) {
                // ignore
            }
        }

        showToast(title, body, route);
    }

    function showToast(title, message, route) {
        var oldToast = document.querySelector('.reminder-toast');
        if (oldToast && oldToast.parentNode) {
            oldToast.parentNode.removeChild(oldToast);
        }

        var toast = document.createElement('button');
        toast.type = 'button';
        toast.className = 'reminder-toast';
        toast.innerHTML = '<strong>' + escapeHtml(title) + '</strong><span>' + escapeHtml(message) + '</span>';
        toast.addEventListener('click', function () {
            window.location.href = String(route || DAILY_ROUTE);
        });

        document.body.appendChild(toast);
        window.setTimeout(function () {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 7000);
    }

    function isReminderTimeReached(now, reminderTime) {
        var minutesNow = now.getHours() * 60 + now.getMinutes();
        var parts = normalizeTime(reminderTime).split(':');
        var reminderMinutes = Number(parts[0]) * 60 + Number(parts[1]);
        return minutesNow >= reminderMinutes;
    }

    function formatLocalDate(date) {
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDate();
        return year + '-' + pad2(month) + '-' + pad2(day);
    }

    function normalizeTime(value) {
        var raw = String(value || '').trim();
        if (!/^\d{2}:\d{2}$/.test(raw)) {
            return '07:00';
        }
        var parts = raw.split(':');
        var hour = Number(parts[0]);
        var minute = Number(parts[1]);
        if (hour < 0 || hour > 23 || minute < 0 || minute > 59) {
            return '07:00';
        }
        return pad2(hour) + ':' + pad2(minute);
    }

    function pad2(value) {
        return value < 10 ? '0' + value : String(value);
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    init();
})();
