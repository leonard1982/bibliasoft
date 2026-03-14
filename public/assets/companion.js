(function () {
    var root = document.getElementById('companionPage');
    if (!root) {
        return;
    }

    var payload = {};
    try {
        payload = JSON.parse(root.getAttribute('data-companion') || '{}');
    } catch (err) {
        payload = {};
    }

    var state = {
        threads: Array.isArray(payload.threads) ? payload.threads : [],
        selectedThread: payload.selectedThread && typeof payload.selectedThread === 'object' ? payload.selectedThread : null,
        messages: Array.isArray(payload.messages) ? payload.messages : [],
        companionName: String(payload.companionName || 'Alfonso'),
        sending: false
    };

    var els = {
        notice: document.getElementById('companionNotice'),
        threads: document.getElementById('companionThreads'),
        threadTitle: document.getElementById('companionThreadTitle'),
        threadMeta: document.getElementById('companionThreadMeta'),
        messages: document.getElementById('companionMessages'),
        form: document.getElementById('companionForm'),
        message: document.getElementById('companionMessage'),
        send: document.getElementById('companionSend'),
        newThread: document.getElementById('companionNewThread'),
        quickButtons: Array.prototype.slice.call(document.querySelectorAll('.js-companion-prompt'))
    };

    renderThreads();
    renderMessages();
    bindEvents();

    function bindEvents() {
        if (els.form) {
            els.form.addEventListener('submit', function (event) {
                event.preventDefault();
                sendMessage();
            });
        }
        if (els.newThread) {
            els.newThread.addEventListener('click', createThread);
        }
        els.quickButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                if (!els.message) {
                    return;
                }
                var value = button.getAttribute('data-prompt') || '';
                els.message.value = value;
                els.message.focus();
            });
        });
    }

    function createThread() {
        showLoading('Abriendo conversación', 'Estamos preparando una nueva conversación...');
        postForm('api.companion.thread.create', {})
            .then(function (res) {
                if (res.error) {
                    throw new Error(res.error);
                }
                if (res.thread) {
                    state.selectedThread = res.thread;
                    state.messages = [];
                    upsertThread(res.thread);
                    renderThreads();
                    renderMessages();
                    showNotice('Nueva conversación lista.', 'success');
                }
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudo crear la conversación.', 'error');
            })
            .finally(function () {
                hideLoading();
            });
    }

    function sendMessage() {
        if (state.sending) {
            return;
        }
        var message = els.message ? String(els.message.value || '').trim() : '';
        if (!message) {
            showNotice('Escribe tu mensaje antes de enviarlo.', 'error');
            return;
        }

        state.sending = true;
        if (els.send) {
            els.send.disabled = true;
        }
        showLoading('Consultando a ' + state.companionName, 'Estamos generando la respuesta. Espera por favor...');

        postForm('api.companion.send', {
            thread_id: state.selectedThread ? Number(state.selectedThread.id || 0) : 0,
            message: message
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            if (res.thread) {
                state.selectedThread = res.thread;
                upsertThread(res.thread);
            }
            state.messages = Array.isArray(res.messages) ? res.messages : [];
            renderThreads();
            renderMessages();
            if (els.message) {
                els.message.value = '';
            }
            if (res.prayer_request && res.prayer_request.id) {
                showNotice('Tu petición de oración quedó registrada para seguimiento pastoral.', 'success');
            } else {
                showNotice(state.companionName + ' ya respondió.', 'success');
            }
        }).catch(function (err) {
            showNotice(err && err.message ? err.message : 'No se pudo procesar el mensaje.', 'error');
        }).finally(function () {
            state.sending = false;
            if (els.send) {
                els.send.disabled = false;
            }
            hideLoading();
        });
    }

    function renderThreads() {
        if (!els.threads) {
            return;
        }
        if (!state.threads.length) {
            els.threads.innerHTML = '<div class="companion-empty muted">Todavía no tienes conversaciones. Crea una nueva para empezar.</div>';
            return;
        }

        els.threads.innerHTML = state.threads.map(function (thread) {
            var active = state.selectedThread && Number(state.selectedThread.id || 0) === Number(thread.id || 0);
            var badge = Number(thread.prayer_flag || 0) === 1 ? '<span class="companion-thread-badge">Oración</span>' : '';
            return '' +
                '<button class="companion-thread-item' + (active ? ' is-active' : '') + '" type="button" data-thread-id="' + Number(thread.id || 0) + '">' +
                    '<strong>' + escapeHtml(String(thread.title || 'Conversación')) + '</strong>' +
                    badge +
                    '<small>' + escapeHtml(String(thread.summary || thread.last_message_at || 'Sin actividad')) + '</small>' +
                '</button>';
        }).join('');

        Array.prototype.slice.call(els.threads.querySelectorAll('[data-thread-id]')).forEach(function (button) {
            button.addEventListener('click', function () {
                loadThread(Number(button.getAttribute('data-thread-id') || 0));
            });
        });
    }

    function loadThread(threadId) {
        if (threadId < 1) {
            return;
        }
        showLoading('Cargando conversación', 'Estamos trayendo el historial...');
        fetch('?route=api.companion.messages&thread_id=' + encodeURIComponent(threadId))
            .then(asJson)
            .then(function (res) {
                if (res.error) {
                    throw new Error(res.error);
                }
                state.selectedThread = res.thread || null;
                state.messages = Array.isArray(res.messages) ? res.messages : [];
                renderThreads();
                renderMessages();
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudo cargar la conversación.', 'error');
            })
            .finally(function () {
                hideLoading();
            });
    }

    function renderMessages() {
        if (els.threadTitle) {
            els.threadTitle.textContent = state.selectedThread ? String(state.selectedThread.title || 'Conversación') : 'Conversación';
        }
        if (els.threadMeta) {
            els.threadMeta.textContent = state.selectedThread
                ? ('Última actividad: ' + String(state.selectedThread.last_message_at || 'hoy'))
                : ('Escribe con confianza. Todo queda registrado para seguimiento interno.');
        }
        if (!els.messages) {
            return;
        }

        if (!state.messages.length) {
            els.messages.innerHTML = '<div class="companion-empty muted">Empieza la conversación. Puedes preguntar por un pasaje, pedir una explicación o solicitar oración.</div>';
            return;
        }

        els.messages.innerHTML = state.messages.map(function (row) {
            var sender = String(row.sender || 'user');
            var label = sender === 'assistant' ? state.companionName : 'Tú';
            return '' +
                '<article class="companion-bubble companion-bubble-' + escapeHtml(sender) + '">' +
                    '<strong>' + escapeHtml(label) + '</strong>' +
                    '<div class="companion-bubble-body">' + formatMessage(String(row.message_text || '')) + '</div>' +
                    '<small>' + escapeHtml(String(row.created_at || '')) + '</small>' +
                '</article>';
        }).join('');

        els.messages.scrollTop = els.messages.scrollHeight;
    }

    function upsertThread(thread) {
        var next = Array.isArray(state.threads) ? state.threads.slice() : [];
        var found = false;
        next = next.map(function (row) {
            if (Number(row.id || 0) !== Number(thread.id || 0)) {
                return row;
            }
            found = true;
            return thread;
        });
        if (!found) {
            next.unshift(thread);
        }
        state.threads = next.sort(function (a, b) {
            return String(b.last_message_at || '').localeCompare(String(a.last_message_at || ''));
        });
    }

    function showNotice(text, type) {
        if (!els.notice) {
            return;
        }
        els.notice.textContent = text;
        els.notice.classList.remove('hidden', 'is-success', 'is-error', 'is-info');
        els.notice.classList.add(type === 'error' ? 'is-error' : (type === 'success' ? 'is-success' : 'is-info'));
    }

    function postForm(route, data) {
        return fetch('?route=' + encodeURIComponent(route), {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' },
            body: new URLSearchParams(data).toString()
        }).then(asJson);
    }

    function showLoading(title, text) {
        if (window.BIBLIASOFT_UI && typeof window.BIBLIASOFT_UI.showLoading === 'function') {
            window.BIBLIASOFT_UI.showLoading(title, text);
        }
    }

    function hideLoading() {
        if (window.BIBLIASOFT_UI && typeof window.BIBLIASOFT_UI.hideLoading === 'function') {
            window.BIBLIASOFT_UI.hideLoading();
        }
    }

    function asJson(res) {
        return res.json();
    }

    function formatMessage(text) {
        var safe = escapeHtml(String(text || '').replace(/\r\n?/g, '\n'));
        var paragraphs = safe.split(/\n{2,}/);
        return paragraphs.map(function (paragraph) {
            return '<p>' + paragraph.replace(/\n/g, '<br>') + '</p>';
        }).join('');
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
