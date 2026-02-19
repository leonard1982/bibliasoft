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
    var planState = payload.plan || {};
    var hideKey = 'daily_hidden_date';
    var showDailyEnabled = localStorage.getItem('show_daily_start') !== '0';
    var dailyCard = document.getElementById('dailyVerseCard');
    var planCard = document.getElementById('readingPlanCard');

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

    renderPlan(planState);

    function renderPlan(state) {
        if (!planCard) {
            return;
        }
        var catalog = Array.isArray(state.catalog) ? state.catalog : [];
        if (!state.active) {
            var options = catalog.map(function (item) {
                return '<option value="' + Number(item.days || 0) + '">' + escapeHtml(item.name || (item.days + ' días')) + '</option>';
            }).join('');
            planCard.innerHTML = '' +
                '<div class="reading-plan-controls">' +
                '<label for="planDays" class="muted">Selecciona un plan:</label>' +
                '<select id="planDays">' + options + '</select>' +
                '<button class="btn-primary" id="startPlanBtn" type="button">Iniciar plan</button>' +
                '</div>' +
                '<p class="muted">Aún no tienes un plan activo. Inicia uno para llevar progreso diario.</p>';
            var startBtn = document.getElementById('startPlanBtn');
            if (startBtn) {
                startBtn.addEventListener('click', function () {
                    var days = Number((document.getElementById('planDays').value || '0'));
                    startPlan(days);
                });
            }
            return;
        }

        var plan = state.plan || {};
        var assignment = plan.today_assignment || {};
        var startLabel = assignment.start_label || '';
        var endLabel = assignment.end_label || '';
        var rangeLabel = startLabel && endLabel && startLabel !== endLabel ? (startLabel + ' - ' + endLabel) : (startLabel || endLabel || 'Sin lectura asignada');
        var firstChapter = Array.isArray(assignment.chapters) && assignment.chapters.length ? assignment.chapters[0] : null;
        var openHref = firstChapter ? ('?route=reader&book=' + Number(firstChapter.book) + '&chapter=' + Number(firstChapter.chapter)) : '?route=reader';
        var completedDays = Number(plan.completed_days || 0);
        var totalDays = Number(plan.total_days || 0);
        var progress = Number(plan.progress_percent || 0);
        var done = plan.today_done === true;
        var toggleLabel = done ? 'Marcar como pendiente' : 'Marcar como leído hoy';
        var toggleClass = done ? 'btn-light' : 'btn-primary';

        planCard.innerHTML = '' +
            '<div class="reading-plan-controls">' +
            '<label for="planDays" class="muted">Plan actual:</label>' +
            '<select id="planDays">' + catalog.map(function (item) {
                var days = Number(item.days || 0);
                var selected = days === totalDays ? ' selected' : '';
                return '<option value="' + days + '"' + selected + '>' + escapeHtml(item.name || (days + ' días')) + '</option>';
            }).join('') + '</select>' +
            '<button class="btn-light" id="restartPlanBtn" type="button">Reiniciar plan</button>' +
            '</div>' +
            '<div class="card">' +
            '<strong>Día ' + Number(plan.today_index || 1) + ' de ' + totalDays + '</strong>' +
            '<p>' + escapeHtml(rangeLabel) + '</p>' +
            '<small class="muted">Capítulos asignados hoy: ' + Number(assignment.count || 0) + '</small>' +
            '</div>' +
            '<div class="reading-plan-progress">' +
            '<div class="reading-plan-progress-bar" style="width:' + Math.max(0, Math.min(100, progress)) + '%"></div>' +
            '</div>' +
            '<small class="muted">Completado: ' + completedDays + '/' + totalDays + ' días (' + progress + '%)</small>' +
            '<div class="toolbar">' +
            '<button class="' + toggleClass + '" id="togglePlanDayBtn" type="button">' + toggleLabel + '</button>' +
            '<a class="btn-light" href="' + openHref + '"><img src="assets/icons/book.svg" alt="" class="ico"> Abrir lectura de hoy</a>' +
            '</div>';

        var restartBtn = document.getElementById('restartPlanBtn');
        if (restartBtn) {
            restartBtn.addEventListener('click', function () {
                var days = Number((document.getElementById('planDays').value || '0'));
                startPlan(days);
            });
        }

        var toggleBtn = document.getElementById('togglePlanDayBtn');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                setTodayCompletion(!done);
            });
        }
    }

    function startPlan(days) {
        if (!days) {
            alert('Selecciona un plan.');
            return;
        }
        postForm('api.plan.start', {
            days: days,
            date: today
        }).then(function (res) {
            if (res.error) {
                alert(res.error);
                return;
            }
            planState = res.plan || {};
            renderPlan(planState);
        }).catch(function () {
            alert('No se pudo iniciar el plan.');
        });
    }

    function setTodayCompletion(completed) {
        postForm('api.plan.today', {
            completed: completed ? 1 : 0,
            date: today
        }).then(function (res) {
            if (res.error) {
                alert(res.error);
                return;
            }
            planState = res.plan || {};
            renderPlan(planState);
        }).catch(function () {
            alert('No se pudo actualizar el progreso.');
        });
    }

    function postForm(route, data) {
        return fetch('?route=' + encodeURIComponent(route), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            body: new URLSearchParams(data).toString()
        }).then(asJson);
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

    function asJson(res) {
        return res.json();
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
})();
