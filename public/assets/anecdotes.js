(function () {
    function notify(message, type) {
        if (window.appNotify && typeof window.appNotify === 'function') {
            window.appNotify(message, type || 'info');
            return;
        }
        if (typeof alert === 'function') {
            alert(message);
        }
    }

    var root = document.getElementById('anecdotesPage');
    if (!root) {
        return;
    }

    var initial = {};
    try {
        initial = JSON.parse(root.getAttribute('data-initial') || '{}');
    } catch (err) {
        initial = {};
    }

    var state = {
        rows: initial.rows || [],
        topics: initial.topics || [],
        isLogged: Boolean(initial.is_logged),
        filters: initial.filters || { q: '', topic: '' }
    };

    var els = {
        list: document.getElementById('anecdotesList'),
        q: document.getElementById('anecdoteSearch'),
        topic: document.getElementById('anecdoteTopic'),
        filter: document.getElementById('anecdoteFilterBtn'),
        generate: document.getElementById('anecdoteGenerateBtn')
    };

    if (els.q) {
        els.q.value = state.filters.q || '';
    }
    if (els.topic) {
        els.topic.value = state.filters.topic || '';
    }

    render();
    bind();

    function bind() {
        if (els.filter) {
            els.filter.addEventListener('click', function () {
                loadList();
            });
        }
        if (els.generate) {
            els.generate.addEventListener('click', function () {
                generateAnecdote();
            });
        }
    }

    function loadList() {
        var params = new URLSearchParams({
            route: 'api.anecdotes.list',
            q: (els.q ? els.q.value : '').trim(),
            topic: (els.topic ? els.topic.value : '').trim(),
            limit: '80'
        });
        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                state.rows = res.rows || [];
                render();
            })
            .catch(function () {
                notify('No se pudo cargar la lista.', 'error');
            });
    }

    function generateAnecdote() {
        var topic = (els.topic ? els.topic.value : '').trim() || 'Fe';
        fetch('?route=api.anecdotes.generate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            body: new URLSearchParams({ topic: topic }).toString()
        }).then(asJson).then(function (res) {
            if (res.error || !res.row) {
                notify(res.error || 'No se pudo generar anécdota.', 'error');
                return;
            }
            state.rows.unshift(res.row);
            render();
            notify('Anécdota generada correctamente.', 'success');
        }).catch(function () {
            notify('No se pudo generar anécdota.', 'error');
        });
    }

    function render() {
        if (!els.list) {
            return;
        }
        if (!state.rows.length) {
            els.list.innerHTML = '<p class="muted">Sin anécdotas para este filtro.</p>';
            return;
        }

        els.list.innerHTML = state.rows.map(function (row) {
            var sourceLabel = row.source === 'generated' ? 'Generado' : 'Original';
            var contentText = normalizeNarrative(row.content || '');
            var content = formatParagraphs(escapeHtml(contentText));
            return '' +
                '<article class="card anecdote-card topic-' + slugify(row.topic || '') + '" data-id="' + Number(row.id) + '">' +
                '<div class="anecdote-meta">' +
                '<span class="chip">' + escapeHtml(row.topic || 'General') + '</span>' +
                '<small class="muted">Fuente: ' + sourceLabel + '</small>' +
                '</div>' +
                '<h3>' + escapeHtml(row.title || '') + '</h3>' +
                '<div class="anecdote-content">' + content + '</div>' +
                '<p class="anecdote-highlight"><strong>Idea central:</strong> ' + escapeHtml(row.idea_central || '') + '</p>' +
                '<p class="anecdote-action"><strong>Aplicación:</strong> ' + escapeHtml(row.application || '') + '</p>' +
                '<div class="toolbar anecdote-actions">' +
                '<button class="icon-tool js-copy" type="button" title="Copiar anécdota" aria-label="Copiar anécdota"><img src="assets/icons/copy.svg" alt="" class="ico"></button>' +
                '<button class="icon-tool js-save ' + (row.favorite ? 'is-active' : '') + '" type="button" title="' + (row.favorite ? 'Quitar guardado' : 'Guardar anécdota') + '" aria-label="' + (row.favorite ? 'Quitar guardado' : 'Guardar anécdota') + '"><img src="assets/icons/bookmark.svg" alt="" class="ico"></button>' +
                '<button class="icon-tool js-share" type="button" title="Compartir anécdota" aria-label="Compartir anécdota"><img src="assets/icons/share.svg" alt="" class="ico"></button>' +
                '</div>' +
                '</article>';
        }).join('');

        els.list.querySelectorAll('.anecdote-card').forEach(function (card) {
            var id = Number(card.getAttribute('data-id'));
            var row = findRow(id);
            if (!row) {
                return;
            }

            var copyBtn = card.querySelector('.js-copy');
            var saveBtn = card.querySelector('.js-save');
            var shareBtn = card.querySelector('.js-share');

            if (copyBtn) {
                copyBtn.addEventListener('click', function () {
                    copyText(buildText(row)).then(function () {
                        notify('Anécdota copiada.', 'success');
                    });
                });
            }
            if (saveBtn) {
                saveBtn.addEventListener('click', function () {
                    if (!state.isLogged) {
                        notify('Inicia sesión para guardar anécdotas.', 'error');
                        return;
                    }
                    toggleFavorite(row.id);
                });
            }
            if (shareBtn) {
                shareBtn.addEventListener('click', function () {
                    var text = buildText(row);
                    if (navigator.share) {
                        navigator.share({ title: row.title || 'Anécdota', text: text }).catch(function () {});
                        return;
                    }
                    copyText(text).then(function () {
                        notify('Texto copiado para compartir.', 'success');
                    });
                });
            }
        });
    }

    function toggleFavorite(id) {
        fetch('?route=api.anecdotes.favorite', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            body: new URLSearchParams({ anecdote_id: String(id) }).toString()
        }).then(asJson).then(function (res) {
            if (res.error) {
                notify(res.error, 'error');
                return;
            }
            var row = findRow(id);
            if (!row) {
                return;
            }
            row.favorite = Boolean(res.active);
            render();
            notify(row.favorite ? 'Anécdota guardada.' : 'Anécdota removida de guardados.', 'success');
        }).catch(function () {
            notify('No se pudo guardar.', 'error');
        });
    }

    function findRow(id) {
        return state.rows.find(function (row) {
            return Number(row.id) === Number(id);
        });
    }

    function buildText(row) {
        var normalized = normalizeNarrative(row.content || '');
        return (row.title || '') + '\n\n' +
            normalized + '\n\n' +
            'Idea central: ' + (row.idea_central || '') + '\n' +
            'Aplicación: ' + (row.application || '') + '\n' +
            'Biblia para todos';
    }

    function formatParagraphs(text) {
        var parts = String(text || '').split(/\n\s*\n/);
        return parts.map(function (part) {
            return '<p>' + String(part || '').replace(/\n/g, '<br>') + '</p>';
        }).join('');
    }

    function normalizeNarrative(value) {
        return String(value || '')
            .replace(/\\r\\n/g, '\n')
            .replace(/\\n/g, '\n')
            .replace(/\r\n/g, '\n')
            .replace(/\n{3,}/g, '\n\n')
            .trim();
    }

    function slugify(value) {
        var text = String(value || 'general').toLowerCase();
        if (text.normalize) {
            text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        }
        return text.replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
    }

    function asJson(res) {
        return res.json();
    }

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }
        return Promise.resolve();
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
