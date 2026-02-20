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
    var planCalendarMonth = monthStartIsoFromDate(today);
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
        var openHref = firstChapter
            ? ('?route=reader&book=' + Number(firstChapter.book) + '&chapter=' + Number(firstChapter.chapter) + '&skip_daily=1')
            : '?route=reader&skip_daily=1';
        var completedDays = Number(plan.completed_days || 0);
        var totalDays = Number(plan.total_days || 0);
        var progress = Number(plan.progress_percent || 0);
        var todayDoneCount = Number(plan.today_completed_count || 0);
        var todayTotalCount = Number(plan.today_total_count || Number(assignment.count || 0));
        var done = plan.today_done === true;
        var weekly = (plan.weekly && typeof plan.weekly === 'object') ? plan.weekly : {};
        var weeklyGoal = clampGoalDays(weekly.goal_days || state.weekly_goal_days || 5);
        var weeklyCompletedDays = Number(weekly.completed_days || 0);
        var weeklyProgress = Math.max(0, Math.min(100, Number(weekly.progress_percent || 0)));
        var weeklyGoalMet = weekly.goal_met === true;
        var currentStreak = Number(plan.current_streak || state.current_streak || state.streak_current || 0);
        var longestStreak = Number(plan.longest_streak || state.longest_streak || currentStreak || 0);
        var weeklyDaysHtml = buildWeeklyDaysHtml(weekly.days || []);
        var monthCalendar = buildPlanMonthCalendar(plan, String(state.today || today), planCalendarMonth);
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
            '<small class="muted">Capítulos de hoy: ' + todayDoneCount + '/' + todayTotalCount + '</small>' +
            '</div>' +
            '<div class="reading-plan-progress">' +
            '<div class="reading-plan-progress-bar" style="width:' + Math.max(0, Math.min(100, progress)) + '%"></div>' +
            '</div>' +
            '<small class="muted">Completado: ' + completedDays + '/' + totalDays + ' días (' + progress + '%)</small>' +
            '<div class="card reading-plan-weekly">' +
            '<div class="reading-plan-weekly-head">' +
            '<strong>Racha actual: ' + currentStreak + ' día(s)</strong>' +
            '<small class="muted">Meta semanal: ' + weeklyCompletedDays + '/' + weeklyGoal + ' día(s)</small>' +
            '</div>' +
            '<div class="reading-plan-progress"><div class="reading-plan-progress-bar" style="width:' + weeklyProgress + '%"></div></div>' +
            '<div class="reading-plan-weekly-days">' + weeklyDaysHtml + '</div>' +
            '<small class="muted">' + (weeklyGoalMet ? 'Meta semanal cumplida.' : 'Sigue avanzando para completar tu meta semanal.') + '</small>' +
            '</div>' +
            '<div class="card reading-plan-calendar">' +
            '<div class="reading-plan-calendar-top">' +
            '<strong>Calendario mensual</strong>' +
            '<div class="toolbar">' +
            '<button class="btn-light js-plan-calendar-nav" type="button" data-shift="-1" aria-label="Mes anterior">Anterior</button>' +
            '<small class="muted">' + escapeHtml(monthCalendar.month_label) + '</small>' +
            '<button class="btn-light js-plan-calendar-nav" type="button" data-shift="1" aria-label="Mes siguiente">Siguiente</button>' +
            '</div>' +
            '</div>' +
            '<small class="muted">Mes: ' + monthCalendar.completed_count + ' completados · ' + monthCalendar.pending_count + ' pendientes · Racha máxima: ' + longestStreak + ' día(s)</small>' +
            '<div class="reading-plan-calendar-head">' +
            '<span>Lun</span><span>Mar</span><span>Mie</span><span>Jue</span><span>Vie</span><span>Sab</span><span>Dom</span>' +
            '</div>' +
            '<div class="reading-plan-calendar-grid">' + monthCalendar.cells_html + '</div>' +
            '</div>' +
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

        planCard.querySelectorAll('.js-plan-calendar-nav').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var shift = Number(this.getAttribute('data-shift') || '0');
                if (!shift) {
                    return;
                }
                planCalendarMonth = shiftMonthIso(planCalendarMonth, shift);
                renderPlan(planState);
            });
        });
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
            planCalendarMonth = monthStartIsoFromDate(String(planState.today || today));
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

    function clampGoalDays(value) {
        var goal = Number(value || 5);
        if (!Number.isFinite(goal)) {
            goal = 5;
        }
        goal = Math.round(goal);
        if (goal < 1) {
            return 1;
        }
        if (goal > 7) {
            return 7;
        }
        return goal;
    }

    function buildWeeklyDaysHtml(days) {
        var labels = ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'];
        var rows = Array.isArray(days) ? days.slice(0, 7) : [];
        if (!rows.length) {
            rows = labels.map(function (label) {
                return {
                    label: label,
                    has_assignment: false,
                    completed: false,
                    is_today: false
                };
            });
        }

        return rows.map(function (row, index) {
            var label = String(row.label || labels[index] || '');
            var completed = row.completed === true;
            var hasAssignment = row.has_assignment === true;
            var isToday = row.is_today === true;
            var classes = 'reading-plan-weekly-day';
            if (completed) {
                classes += ' is-completed';
            }
            if (!hasAssignment) {
                classes += ' is-idle';
            }
            if (isToday) {
                classes += ' is-today';
            }

            return '' +
                '<div class="' + classes + '">' +
                '<span class="reading-plan-weekly-day-label">' + escapeHtml(label) + '</span>' +
                '<span class="reading-plan-weekly-day-dot"></span>' +
                '</div>';
        }).join('');
    }

    function buildPlanMonthCalendar(plan, todayIso, monthIso) {
        var totalDays = Number((plan && plan.total_days) || 0);
        var startDate = String((plan && plan.start_date) || '');
        var completedDayIndexes = Array.isArray(plan && plan.completed_day_indexes) ? plan.completed_day_indexes : [];
        var completedSet = {};
        completedDayIndexes.forEach(function (value) {
            var day = Number(value || 0);
            if (day > 0) {
                completedSet[day] = true;
            }
        });

        var normalizedMonthIso = monthStartIsoFromDate(monthIso || todayIso);
        var parts = parseYmdToParts(normalizedMonthIso);
        if (!parts) {
            return {
                month_iso: normalizedMonthIso,
                month_label: '',
                completed_count: 0,
                pending_count: 0,
                cells_html: ''
            };
        }

        var daysInMonth = new Date(parts.year, parts.month, 0).getDate();
        var firstWeekday = (new Date(parts.year, parts.month - 1, 1).getDay() + 6) % 7;
        var todayLocal = String(todayIso || today);
        var cells = '';
        var completedCount = 0;
        var pendingCount = 0;

        for (var lead = 0; lead < firstWeekday; lead++) {
            cells += '<div class="reading-plan-calendar-cell is-empty"></div>';
        }

        for (var day = 1; day <= daysInMonth; day++) {
            var dateIso = isoFromParts(parts.year, parts.month, day);
            var dayIndex = dayIndexFromDates(startDate, dateIso);
            var hasAssignment = dayIndex >= 1 && dayIndex <= totalDays;
            var isCompleted = hasAssignment && completedSet[dayIndex] === true;
            var isPastOrToday = dateIso <= todayLocal;
            var isPending = hasAssignment && !isCompleted && isPastOrToday;
            var isFutureAssigned = hasAssignment && !isPastOrToday;
            var isToday = dateIso === todayLocal;

            if (isCompleted) {
                completedCount++;
            }
            if (isPending) {
                pendingCount++;
            }

            cells += buildPlanCalendarCellHtml(day, hasAssignment, isCompleted, isPending, isFutureAssigned, isToday);
        }

        var totalCells = firstWeekday + daysInMonth;
        var trailing = (7 - (totalCells % 7)) % 7;
        for (var tail = 0; tail < trailing; tail++) {
            cells += '<div class="reading-plan-calendar-cell is-empty"></div>';
        }

        return {
            month_iso: normalizedMonthIso,
            month_label: monthTitleFromParts(parts.year, parts.month),
            completed_count: completedCount,
            pending_count: pendingCount,
            cells_html: cells
        };
    }

    function buildPlanCalendarCellHtml(day, hasAssignment, isCompleted, isPending, isFutureAssigned, isToday) {
        var classes = 'reading-plan-calendar-cell';
        var status = 'Sin asignacion';

        if (!hasAssignment) {
            classes += ' is-idle';
        } else {
            classes += ' is-assigned';
            status = 'Asignado';
            if (isCompleted) {
                classes += ' is-completed';
                status = 'Completado';
            } else if (isPending) {
                classes += ' is-pending';
                status = 'Pendiente';
            } else if (isFutureAssigned) {
                classes += ' is-future';
                status = 'Programado';
            }
        }
        if (isToday) {
            classes += ' is-today';
        }

        return '' +
            '<div class="' + classes + '" title="' + escapeHtml(status) + '">' +
            '<span class="reading-plan-calendar-day">' + Number(day) + '</span>' +
            '<span class="reading-plan-calendar-dot"></span>' +
            '</div>';
    }

    function monthStartIsoFromDate(dateIso) {
        var parts = parseYmdToParts(dateIso);
        if (!parts) {
            parts = parseYmdToParts(today);
        }
        if (!parts) {
            return '1970-01-01';
        }
        return isoFromParts(parts.year, parts.month, 1);
    }

    function shiftMonthIso(monthIso, shift) {
        var parts = parseYmdToParts(monthIso);
        if (!parts) {
            parts = parseYmdToParts(today);
        }
        if (!parts) {
            return '1970-01-01';
        }
        var shifted = new Date(parts.year, (parts.month - 1) + Number(shift || 0), 1);
        return isoFromParts(shifted.getFullYear(), shifted.getMonth() + 1, 1);
    }

    function monthTitleFromParts(year, month) {
        var names = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        var label = names[Math.max(0, Math.min(11, Number(month || 1) - 1))] || '';
        return label + ' ' + Number(year || 0);
    }

    function dayIndexFromDates(startIso, targetIso) {
        var start = parseYmdToParts(startIso);
        var target = parseYmdToParts(targetIso);
        if (!start || !target) {
            return 0;
        }
        var startUtc = Date.UTC(start.year, start.month - 1, start.day);
        var targetUtc = Date.UTC(target.year, target.month - 1, target.day);
        var diff = Math.floor((targetUtc - startUtc) / 86400000);
        return diff + 1;
    }

    function parseYmdToParts(value) {
        var raw = String(value || '').trim();
        var match = raw.match(/^(\d{4})-(\d{2})-(\d{2})$/);
        if (!match) {
            return null;
        }
        var year = Number(match[1]);
        var month = Number(match[2]);
        var day = Number(match[3]);
        if (year < 1 || month < 1 || month > 12 || day < 1 || day > 31) {
            return null;
        }
        return {
            year: year,
            month: month,
            day: day
        };
    }

    function isoFromParts(year, month, day) {
        var y = Number(year || 0);
        var m = Number(month || 1);
        var d = Number(day || 1);
        return String(y).padStart(4, '0') + '-' + String(m).padStart(2, '0') + '-' + String(d).padStart(2, '0');
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
