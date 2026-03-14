(function () {
    var root = document.getElementById('companionWidget');
    if (!root) {
        return;
    }

    var companionName = String(root.getAttribute('data-companion-name') || 'Alfonso');
    var draftKey = 'bs_companion_widget_draft_v1';
    var hintKey = 'bs_companion_widget_hint_seen_v1';

    var state = {
        open: false,
        maximized: true,
        historyOpen: false,
        loaded: false,
        loadingThreads: false,
        sending: false,
        showTypingIndicator: false,
        typingTimer: 0,
        pendingUserMessage: '',
        threads: [],
        selectedThread: null,
        messages: []
    };

    var els = {
        launcher: document.getElementById('companionLauncher'),
        hint: document.getElementById('companionHint'),
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
    initHint();
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
                if (!els.message) {
                    return;
                }
                els.message.value = String(button.getAttribute('data-prompt') || '');
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
        state.maximized = true;
        syncPanelState();
        dismissHint();
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
            els.maximize.setAttribute('aria-label', isMaximized ? 'Minimizar chat' : 'Maximizar chat');
            els.maximize.setAttribute('title', isMaximized ? 'Minimizar chat' : 'Maximizar chat');
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
                    return loadThread(Number(state.threads[0].id || 0));
                }
                renderMessages();
                return null;
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudieron cargar las conversaciones.', 'error');
            })
            .finally(function () {
                state.loadingThreads = false;
            });
    }

    function loadThread(threadId) {
        if (threadId < 1) {
            return Promise.resolve();
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
            });
    }

    function createThread() {
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
                    syncPanelState();
                    showNotice('Nueva conversación lista.', 'success');
                }
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudo crear la conversación.', 'error');
            });
    }

    function sendMessage() {
        var message = els.message ? String(els.message.value || '').trim() : '';
        if (state.sending) {
            return;
        }
        if (!message) {
            showNotice('Escribe tu mensaje antes de enviarlo.', 'error');
            return;
        }

        state.sending = true;
        state.pendingUserMessage = message;
        state.showTypingIndicator = false;
        clearTypingTimer();

        if (els.send) {
            els.send.disabled = true;
        }
        if (els.message) {
            els.message.value = '';
        }

        clearDraft();
        renderMessages();

        state.typingTimer = window.setTimeout(function () {
            if (!state.sending) {
                return;
            }
            state.showTypingIndicator = true;
            renderMessages();
        }, 2000);

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
            state.pendingUserMessage = '';
            state.showTypingIndicator = false;
            renderThreads();
            renderMessages();
            if (res.prayer_request && res.prayer_request.id) {
                showNotice('Tu petición de oración quedó registrada para seguimiento pastoral.', 'success');
                notify('Tu petición de oración fue recibida.', 'success');
            } else {
                showNotice(companionName + ' ya respondió.', 'success');
            }
        }).catch(function (err) {
            state.pendingUserMessage = '';
            state.showTypingIndicator = false;
            if (els.message) {
                els.message.value = message;
            }
            saveDraft();
            renderMessages();
            showNotice(err && err.message ? err.message : 'No se pudo procesar el mensaje.', 'error');
        }).finally(function () {
            state.sending = false;
            clearTypingTimer();
            if (els.send) {
                els.send.disabled = false;
            }
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
            bindCreateThreadButton();
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
                loadThread(Number(button.getAttribute('data-thread-id') || 0));
            });
        });
    }

    function bindCreateThreadButton() {
        var createButton = els.threads ? els.threads.querySelector('[data-companion-create="1"]') : null;
        if (createButton) {
            createButton.addEventListener('click', createThread);
        }
    }

    function renderMessages() {
        if (els.threadTitle) {
            els.threadTitle.textContent = state.selectedThread ? String(state.selectedThread.title || 'Conversación') : 'Nueva conversación';
        }
        if (els.threadMeta) {
            els.threadMeta.textContent = state.selectedThread
                ? ('Última actividad: ' + String(state.selectedThread.last_message_at || 'hoy'))
                : ('Pregunta sobre un pasaje, pide oración o busca una orientación clara.');
        }
        if (!els.messages) {
            return;
        }

        var rows = Array.isArray(state.messages) ? state.messages.slice() : [];
        if (state.pendingUserMessage) {
            rows.push({
                sender: 'user',
                message_text: state.pendingUserMessage,
                created_at: 'Ahora'
            });
        }
        if (state.showTypingIndicator) {
            rows.push({
                sender: 'assistant',
                message_text: '',
                created_at: 'Escribiendo...',
                typing: true
            });
        }

        if (!rows.length) {
            els.messages.innerHTML = '' +
                '<div class="companion-empty muted">' +
                    '<p>Puedes pedir una explicación sencilla, una aplicación práctica o una oración.</p>' +
                    '<p><strong>' + escapeHtml(companionName) + ':</strong> Estoy aquí para ayudarte desde un enfoque bíblico, pastoral y claro.</p>' +
                '</div>';
            return;
        }

        els.messages.innerHTML = rows.map(function (row) {
            var sender = String(row.sender || 'user');
            var label = sender === 'assistant' ? companionName : 'Tú';
            var body = row.typing
                ? '<div class="companion-typing" aria-label="' + escapeHtml(companionName) + ' está escribiendo"><span></span><span></span><span></span></div>'
                : formatMessage(String(row.message_text || ''));
            return '' +
                '<article class="companion-bubble companion-bubble-' + escapeHtml(sender) + '">' +
                    '<strong>' + escapeHtml(label) + '</strong>' +
                    '<div class="companion-bubble-body companion-bubble-body-' + escapeHtml(sender) + '">' + body + '</div>' +
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

    function clearTypingTimer() {
        if (state.typingTimer) {
            window.clearTimeout(state.typingTimer);
            state.typingTimer = 0;
        }
    }

    function initHint() {
        if (!els.hint) {
            return;
        }
        var seen = false;
        try {
            seen = sessionStorage.getItem(hintKey) === '1';
        } catch (err) {
            seen = false;
        }
        if (seen) {
            els.hint.classList.add('hidden');
            root.classList.remove('is-attention');
            return;
        }
        root.classList.add('is-attention');
        window.setTimeout(dismissHint, 7000);
    }

    function dismissHint() {
        if (els.hint) {
            els.hint.classList.add('hidden');
        }
        root.classList.remove('is-attention');
        try {
            sessionStorage.setItem(hintKey, '1');
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

    function notify(message, type) {
        if (typeof window.appNotify === 'function') {
            window.appNotify(message, type);
        }
    }

    function asJson(res) {
        return res.json();
    }

    function formatMessage(text) {
        var normalized = String(text || '').replace(/\r\n?/g, '\n');
        var lines = normalized.split('\n');
        var html = [];
        var listType = '';
        var paragraph = [];

        function closeParagraph() {
            if (!paragraph.length) {
                return;
            }
            var content = paragraph.map(formatInline).join('<br>');
            html.push('<p>' + content + '</p>');
            paragraph = [];
        }

        function closeList() {
            if (!listType) {
                return;
            }
            html.push(listType === 'ol' ? '</ol>' : '</ul>');
            listType = '';
        }

        lines.forEach(function (rawLine) {
            var line = String(rawLine || '').trim();

            if (line === '') {
                closeParagraph();
                closeList();
                return;
            }

            if (/^#{1,3}\s+/.test(line)) {
                closeParagraph();
                closeList();
                html.push('<h4>' + formatInline(line.replace(/^#{1,3}\s+/, '')) + '</h4>');
                return;
            }

            if (/^\*\*(.+)\*\*$/.test(line)) {
                closeParagraph();
                closeList();
                html.push('<h4>' + formatInline(line.replace(/^\*\*(.+)\*\*$/, '$1')) + '</h4>');
                return;
            }

            if (/^>\s+/.test(line)) {
                closeParagraph();
                closeList();
                html.push('<blockquote>' + formatInline(line.replace(/^>\s+/, '')) + '</blockquote>');
                return;
            }

            if (!/[.!?]$/.test(line) && /:\s*$/.test(line) && line.length < 90) {
                closeParagraph();
                closeList();
                html.push('<h4>' + formatInline(line.replace(/:\s*$/, '')) + '</h4>');
                return;
            }

            if (/^[-*]\s+/.test(line)) {
                closeParagraph();
                if (listType !== 'ul') {
                    closeList();
                    listType = 'ul';
                    html.push('<ul>');
                }
                html.push('<li>' + formatInline(line.replace(/^[-*]\s+/, '')) + '</li>');
                return;
            }

            if (/^\d+\.\s+/.test(line)) {
                closeParagraph();
                if (listType !== 'ol') {
                    closeList();
                    listType = 'ol';
                    html.push('<ol>');
                }
                html.push('<li>' + formatInline(line.replace(/^\d+\.\s+/, '')) + '</li>');
                return;
            }

            closeList();
            paragraph.push(line);
        });

        closeParagraph();
        closeList();

        return html.join('');
    }

    function formatInline(text) {
        var safe = escapeHtml(String(text || ''));
        safe = safe.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
        safe = safe.replace(/==(.+?)==/g, '<mark>$1</mark>');
        return safe;
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
