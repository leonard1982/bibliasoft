(function () {
    var root = document.getElementById('companionWidget');
    if (!root) {
        return;
    }

    var companionName = String(root.getAttribute('data-companion-name') || 'Alfonso');
    var draftKey = 'bs_companion_widget_draft_v1';
    var state = {
        open: false,
        maximized: false,
        historyOpen: false,
        loaded: false,
        loadingThreads: false,
        sending: false,
        threads: [],
        selectedThread: null,
        messages: []
    };

    var els = {
        launcher: document.getElementById('companionLauncher'),
        backdrop: document.getElementById('companionBackdrop'),
        panel: document.getElementById('companionPanel'),
        close: document.getElementById('companionPanelClose'),
        maximize: document.getElementById('companionPanelMaximize'),
        historyToggle: document.getElementById('companionPanelHistoryToggle'),
        history: document.getElementById('companionPanelHistory'),
        newThread: document.getElementById('companionPanelNew'),
        notice: document.getElementById('companionPanelNotice'),
        threads: document.getElementById('companionPanelThreads'),
        threadTitle: document.getElementById('companionPanelThreadTitle'),
        threadMeta: document.getElementById('companionPanelThreadMeta'),
        messages: document.getElementById('companionPanelMessages'),
        form: document.getElementById('companionPanelForm'),
        message: document.getElementById('companionPanelMessage'),
        send: document.getElementById('companionPanelSend'),
        quickButtons: Array.prototype.slice.call(document.querySelectorAll('.js-companion-widget-prompt'))
    };

    bindEvents();
    restoreDraft();
    renderThreads();
    renderMessages();
    syncPanelState();

    function bindEvents() {
        if (els.launcher) {
            els.launcher.addEventListener('click', function () {
                if (state.open) {
                    closePanel();
                    return;
                }
                openPanel();
            });
        }

        if (els.backdrop) {
            els.backdrop.addEventListener('click', closePanel);
        }

        if (els.close) {
            els.close.addEventListener('click', closePanel);
        }

        if (els.maximize) {
            els.maximize.addEventListener('click', toggleMaximize);
        }

        if (els.historyToggle) {
            els.historyToggle.addEventListener('click', toggleHistory);
        }

        if (els.newThread) {
            els.newThread.addEventListener('click', createThread);
        }

        if (els.form) {
            els.form.addEventListener('submit', function (event) {
                event.preventDefault();
                sendMessage();
            });
        }

        if (els.message) {
            els.message.addEventListener('input', saveDraft);
        }

        els.quickButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var prompt = button.getAttribute('data-prompt') || '';
                if (!els.message) {
                    return;
                }
                els.message.value = prompt;
                saveDraft();
                openPanel();
                els.message.focus();
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && state.open) {
                closePanel();
            }
        });
    }

    function openPanel() {
        state.open = true;
        syncPanelState();
        if (!state.loaded) {
            loadThreads();
        }
        if (els.message) {
            window.setTimeout(function () {
                els.message.focus();
            }, 80);
        }
    }

    function closePanel() {
        state.open = false;
        syncPanelState();
        saveDraft();
    }

    function toggleMaximize() {
        state.maximized = !state.maximized;
        syncPanelState();
    }

    function toggleHistory() {
        state.historyOpen = !state.historyOpen;
        syncPanelState();
        if (state.historyOpen && !state.loaded) {
            loadThreads();
        }
    }

    function syncPanelState() {
        var isOpen = !!state.open;
        var isMaximized = !!state.maximized;
        var historyOpen = !!state.historyOpen;

        setHidden(els.panel, !isOpen);
        setHidden(els.backdrop, !isOpen);
        setHidden(els.history, !isOpen || !historyOpen);

        if (els.panel) {
            els.panel.classList.toggle('is-maximized', isMaximized);
            els.panel.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
        }

        if (els.launcher) {
            els.launcher.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }

        if (els.maximize) {
            els.maximize.setAttribute('aria-label', isMaximized ? 'Restaurar chat' : 'Maximizar chat');
            els.maximize.setAttribute('title', isMaximized ? 'Restaurar chat' : 'Maximizar chat');
        }

        if (els.historyToggle) {
            els.historyToggle.setAttribute('aria-pressed', historyOpen ? 'true' : 'false');
            els.historyToggle.setAttribute('title', historyOpen ? 'Ocultar conversaciones' : 'Ver conversaciones');
        }
    }

    function setHidden(node, hidden) {
        if (!node) {
            return;
        }
        node.classList.toggle('hidden', hidden);
        if (hidden) {
            node.setAttribute('hidden', 'hidden');
        } else {
            node.removeAttribute('hidden');
        }
    }

    function loadThreads() {
        if (state.loadingThreads) {
            return;
        }
        state.loadingThreads = true;
        showLoading('Abriendo chat', 'Estamos cargando tus conversaciones...');

        fetch('?route=api.companion.threads')
            .then(asJson)
            .then(function (res) {
                if (res.error) {
                    throw new Error(res.error);
                }
                state.threads = Array.isArray(res.threads) ? res.threads : [];
                state.loaded = true;
                renderThreads();
                if (!state.selectedThread && state.threads.length) {
                    return loadThread(Number(state.threads[0].id || 0), true);
                }
                renderMessages();
                return null;
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudieron cargar las conversaciones.', 'error');
            })
            .finally(function () {
                state.loadingThreads = false;
                hideLoading();
            });
    }

    function loadThread(threadId, silent) {
        if (threadId < 1) {
            return Promise.resolve();
        }
        if (!silent) {
            showLoading('Cargando conversación', 'Estamos trayendo el historial...');
        }
        return fetch('?route=api.companion.messages&thread_id=' + encodeURIComponent(threadId))
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
                if (!silent) {
                    hideLoading();
                }
            });
    }

    function createThread() {
        showLoading('Nueva conversación', 'Estamos preparando un espacio nuevo...');
        postForm('api.companion.thread.create', {})
            .then(function (res) {
                if (res.error) {
                    throw new Error(res.error);
                }
                if (res.thread) {
                    state.selectedThread = res.thread;
                    state.messages = [];
                    upsertThread(res.thread);
                    state.historyOpen = false;
                    state.loaded = true;
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
        showLoading('Consultando a ' + companionName, 'Estamos generando la respuesta. Espera por favor...');

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
            clearDraft();
            if (els.message) {
                els.message.value = '';
            }
            if (res.prayer_request && res.prayer_request.id) {
                showNotice('Tu petición de oración quedó registrada para seguimiento pastoral.', 'success');
                notify('Tu petición de oración fue recibida.', 'success');
            } else {
                showNotice(companionName + ' ya respondió.', 'success');
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
            els.threads.innerHTML = '' +
                '<div class="companion-empty muted">' +
                    '<p>No tienes conversaciones todavía.</p>' +
                    '<button class="btn-primary" type="button" data-companion-create="1">Empezar ahora</button>' +
                '</div>';
            var createButton = els.threads.querySelector('[data-companion-create="1"]');
            if (createButton) {
                createButton.addEventListener('click', createThread);
            }
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
                state.historyOpen = false;
                syncPanelState();
                loadThread(Number(button.getAttribute('data-thread-id') || 0), false);
            });
        });
    }

    function renderMessages() {
        if (els.threadTitle) {
            els.threadTitle.textContent = state.selectedThread ? String(state.selectedThread.title || 'Conversación') : 'Nueva conversación';
        }
        if (els.threadMeta) {
            els.threadMeta.textContent = state.selectedThread
                ? ('Última actividad: ' + String(state.selectedThread.last_message_at || 'hoy'))
                : ('Pregunta sobre un pasaje, busca consejo bíblico o pide oración.');
        }
        if (!els.messages) {
            return;
        }

        if (!state.messages.length) {
            els.messages.innerHTML = '' +
                '<div class="companion-empty muted">' +
                    '<p>Puedes pedir una explicación sencilla, una aplicación práctica o una oración.</p>' +
                    '<p><strong>' + escapeHtml(companionName) + ':</strong> Estoy aquí para ayudarte desde un enfoque bíblico, pastoral y claro.</p>' +
                '</div>';
            return;
        }

        els.messages.innerHTML = state.messages.map(function (row) {
            var sender = String(row.sender || 'user');
            var label = sender === 'assistant' ? companionName : 'Tú';
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

    function saveDraft() {
        if (!els.message) {
            return;
        }
        try {
            sessionStorage.setItem(draftKey, String(els.message.value || ''));
        } catch (err) {
            // ignore
        }
    }

    function restoreDraft() {
        if (!els.message) {
            return;
        }
        try {
            var draft = sessionStorage.getItem(draftKey) || '';
            if (draft !== '') {
                els.message.value = draft;
            }
        } catch (err) {
            // ignore
        }
    }

    function clearDraft() {
        try {
            sessionStorage.removeItem(draftKey);
        } catch (err) {
            // ignore
        }
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

    function notify(message, type) {
        if (typeof window.appNotify === 'function') {
            window.appNotify(message, type);
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
