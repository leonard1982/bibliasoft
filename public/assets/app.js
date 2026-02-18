(function () {
    applyGlobalPrefsFromStorage();

    var root = document.getElementById('readerApp');
    if (!root) {
        return;
    }

    var state = {
        initial: JSON.parse(root.getAttribute('data-initial') || '{}'),
        currentBook: 1,
        currentChapter: 1,
        books: [],
        chapters: [],
        verses: [],
        selectedVerses: [],
        lastSelectedVerse: null,
        pendingVerse: null,
        selectionPayload: null,
        settings: {
            showHelp: true,
            layoutMode: 'columns',
            fontSize: 'md',
            spacing: 'normal',
            theme: 'light',
            fontScale: 100,
            showDaily: true,
            autoDevotional: false
        }
    };

    var els = {
        title: document.getElementById('readingTitle'),
        booksList: document.getElementById('booksList'),
        chaptersList: document.getElementById('chaptersList'),
        versesContainer: document.getElementById('versesContainer'),
        bookFilter: document.getElementById('bookFilter'),
        helpPane: document.getElementById('helpPane'),
        booksPane: document.getElementById('booksPane'),
        chaptersPane: document.getElementById('chaptersPane'),
        openNavigator: document.getElementById('openNavigator'),
        openQuickSearch: document.getElementById('openQuickSearch'),
        toggleHelp: document.getElementById('toggleHelp'),
        overlay: document.getElementById('mobileOverlay'),
        notice: document.getElementById('readingNotice'),
        settingsModal: document.getElementById('settingsModal'),
        searchModal: document.getElementById('searchModal'),
        readerShell: root.querySelector('.reader-shell'),
        openSettings: document.getElementById('openSettings'),
        closeSettings: document.getElementById('closeSettings'),
        closeSearch: document.getElementById('closeSearch'),
        copySelection: document.getElementById('copySelection'),
        copyParagraph: document.getElementById('copyParagraph'),
        shareSelection: document.getElementById('shareSelection'),
        quickSearchForm: document.getElementById('quickSearchForm'),
        quickSearchResults: document.getElementById('quickSearchResults'),
        contextPanel: document.getElementById('contextPanel'),
        commentsPanel: document.getElementById('commentsPanel'),
        notesPanel: document.getElementById('notesPanel'),
        linksPanel: document.getElementById('linksPanel'),
        toolsPanel: document.getElementById('toolsPanel')
    };

    function init() {
        state.books = state.initial.books || [];
        state.currentBook = parseInt(state.initial.book || 1, 10);
        state.currentChapter = parseInt(state.initial.chapter || 1, 10);
        state.chapters = state.initial.chapters || [];
        state.verses = state.initial.verses || [];

        if (state.initial.user_prefs) {
            state.settings.fontScale = Number(state.initial.user_prefs.font_scale || 100);
            state.settings.showDaily = Number(state.initial.user_prefs.show_daily || 0) === 1;
            state.settings.autoDevotional = Number(state.initial.user_prefs.auto_devotional || 0) === 1;
            if (state.initial.user_prefs.theme === 'dark') {
                state.settings.theme = 'dark';
            }
        }

        loadSettings();
        maybeRedirectToDailyAtStartup();
        applySettings();
        renderBooks(state.books);
        renderChapters();
        renderVerses();
        wireEvents();
        activateTab('contexto');
        bindSelectionActions();
        renderEmptyPanels();
        bindConnectivity();
        registerPwa();
    }

    function wireEvents() {
        els.bookFilter.addEventListener('input', function () {
            var q = this.value.trim().toLowerCase();
            if (!q) {
                renderBooks(state.books);
                return;
            }
            renderBooks(state.books.filter(function (b) {
                return (b.name || '').toLowerCase().indexOf(q) !== -1;
            }));
        });

        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.addEventListener('click', function () {
                activateTab(this.getAttribute('data-tab'));
            });
        });

        els.toggleHelp.addEventListener('click', function () {
            if (window.matchMedia('(max-width: 980px)').matches) {
                openHelpDrawer();
                return;
            }
            state.settings.showHelp = !state.settings.showHelp;
            saveSettings();
            applySettings();
        });

        if (els.openNavigator) {
            els.openNavigator.addEventListener('click', function () {
                els.booksPane.classList.add('is-open');
                els.chaptersPane.classList.add('is-open');
                els.overlay.classList.remove('hidden');
            });
        }

        els.overlay.addEventListener('click', closeDrawers);

        if (els.openSettings) {
            els.openSettings.addEventListener('click', openSettings);
        }
        if (els.closeSettings) {
            els.closeSettings.addEventListener('click', closeSettings);
        }
        if (els.openQuickSearch) {
            els.openQuickSearch.addEventListener('click', openSearch);
        }
        if (els.closeSearch) {
            els.closeSearch.addEventListener('click', closeSearch);
        }
        if (els.quickSearchForm) {
            els.quickSearchForm.addEventListener('submit', function (event) {
                event.preventDefault();
                runQuickSearch();
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.ctrlKey && event.key.toLowerCase() === 'k') {
                event.preventDefault();
                openSearch();
            }
            if (event.ctrlKey && (event.key === '=' || event.key === '+')) {
                event.preventDefault();
                changeFontScale(5);
            }
            if (event.ctrlKey && (event.key === '-' || event.key === '_')) {
                event.preventDefault();
                changeFontScale(-5);
            }
            if (event.key === 'Escape') {
                closeSearch();
            }
        });

        bindSettingsInputs();
    }

    function renderBooks(rows) {
        var html = rows.map(function (book) {
            var active = Number(book.id) === Number(state.currentBook) ? 'is-active' : '';
            return '<button class="book-item ' + active + '" data-book="' + book.id + '"><span>' + escapeHtml(book.name) + '</span></button>';
        }).join('');
        els.booksList.innerHTML = html;

        els.booksList.querySelectorAll('.book-item').forEach(function (node) {
            node.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book'));
                if (!book || book === state.currentBook) {
                    return;
                }
                fetchChapters(book);
            });
        });
    }

    function renderChapters() {
        var html = state.chapters.map(function (chapter) {
            var active = Number(chapter) === Number(state.currentChapter) ? 'is-active' : '';
            return '<button class="chapter-item ' + active + '" data-chapter="' + chapter + '">' + chapter + '</button>';
        }).join('');
        els.chaptersList.innerHTML = html;

        els.chaptersList.querySelectorAll('.chapter-item').forEach(function (node) {
            node.addEventListener('click', function () {
                var chapter = Number(this.getAttribute('data-chapter'));
                if (!chapter || chapter === state.currentChapter) {
                    return;
                }
                fetchChapter(state.currentBook, chapter);
            });
        });
    }

    function renderVerses() {
        var html = state.verses.map(function (verse) {
            return '' +
                '<div class="verse" data-verse="' + Number(verse.verse) + '">' +
                '<span class="verse-num">' + Number(verse.verse) + '</span>' +
                '<span class="verse-text">' + (verse.scripture_html || '') + '</span>' +
                '</div>';
        }).join('');

        els.versesContainer.innerHTML = html || '<p class="muted">No se pudo cargar el capítulo.</p>';
        state.selectedVerses = [];
        state.lastSelectedVerse = null;
        state.selectionPayload = null;
        updateSelectionUI();
        renderEmptyPanels();

        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            node.addEventListener('click', function (event) {
                var verse = Number(this.getAttribute('data-verse'));
                if (!verse) {
                    return;
                }
                if (event.shiftKey && state.lastSelectedVerse !== null) {
                    selectRange(state.lastSelectedVerse, verse);
                } else {
                    toggleVerse(verse);
                    state.lastSelectedVerse = verse;
                }
                if (window.matchMedia('(max-width: 980px)').matches) {
                    activateTab('contexto');
                    openHelpDrawer();
                }
            });
        });
    }

    function toggleVerse(verse) {
        var idx = state.selectedVerses.indexOf(verse);
        if (idx >= 0) {
            state.selectedVerses.splice(idx, 1);
        } else {
            state.selectedVerses.push(verse);
            state.selectedVerses.sort(function (a, b) { return a - b; });
        }
        updateSelectionUI();
        onSelectionChange();
    }

    function selectRange(fromVerse, toVerse) {
        var min = Math.min(fromVerse, toVerse);
        var max = Math.max(fromVerse, toVerse);
        var map = {};
        state.selectedVerses.forEach(function (value) { map[value] = true; });
        for (var v = min; v <= max; v++) {
            map[v] = true;
        }
        state.selectedVerses = Object.keys(map).map(function (k) {
            return Number(k);
        }).sort(function (a, b) {
            return a - b;
        });
        updateSelectionUI();
        onSelectionChange();
    }

    function updateSelectionUI() {
        var selectedMap = {};
        state.selectedVerses.forEach(function (v) { selectedMap[v] = true; });
        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            var verse = Number(node.getAttribute('data-verse'));
            node.classList.toggle('is-selected', Boolean(selectedMap[verse]));
        });
    }

    function onSelectionChange() {
        if (!state.selectedVerses.length) {
            state.selectionPayload = null;
            renderEmptyPanels();
            return;
        }
        loadSelectionData();
    }

    function loadSelectionData() {
        var range = selectedRange();
        fetch('?route=api.selection&book=' + state.currentBook + '&chapter=' + state.currentChapter +
            '&verse_start=' + range.start + '&verse_end=' + range.end)
            .then(asJson)
            .then(function (data) {
                if (data.error) {
                    notify(data.error);
                    return;
                }
                state.selectionPayload = data;
                renderPanels();
            })
            .catch(function () {
                notify('No se pudo cargar la ayuda del pasaje.');
            });
    }

    function renderPanels() {
        if (!state.selectionPayload) {
            renderEmptyPanels();
            return;
        }

        renderContextPanel(state.selectionPayload);
        renderCommentsPanel(state.selectionPayload.commentary || {});
        renderNotesPanel(state.selectionPayload);
        renderLinksPanel(state.selectionPayload);
        renderToolsPanel(state.selectionPayload);
    }

    function renderEmptyPanels() {
        els.contextPanel.innerHTML = '<p class="muted">Selecciona versículos para ver contexto del pasaje.</p>';
        els.commentsPanel.innerHTML = '<p class="muted">Selecciona versículos para cargar comentarios.</p>';
        els.notesPanel.innerHTML = '<p class="muted">Selecciona versículos para gestionar tus notas.</p>';
        els.linksPanel.innerHTML = '<p class="muted">Selecciona versículos para crear vínculos.</p>';
        els.toolsPanel.innerHTML = '<p class="muted">Herramientas disponibles al seleccionar un pasaje.</p>';
    }

    function renderContextPanel(payload) {
        var c = payload.context || {};
        els.contextPanel.innerHTML = '' +
            '<div class="card"><strong>Pasaje</strong><p>' + escapeHtml(payload.reference.label || '') + '</p></div>' +
            '<div class="card"><strong>Resumen del pasaje</strong><p>' + escapeHtml(c.summary || '') + '</p></div>' +
            '<div class="card"><strong>Contexto histórico</strong><p>' + escapeHtml(c.historical || '') + '</p></div>' +
            '<div class="card"><strong>Contexto literario</strong><p>' + escapeHtml(c.literary || '') + '</p></div>';
    }

    function renderCommentsPanel(commentary) {
        var cards = [];
        (commentary.book || []).forEach(function (row) {
            cards.push('<div class="card"><strong>Comentario de libro</strong>' +
                renderSourceTag(row) +
                '<div>' + (row.html || '') + '</div></div>');
        });
        (commentary.chapter || []).forEach(function (row) {
            cards.push('<div class="card"><strong>Comentario de capítulo</strong>' +
                renderSourceTag(row) +
                '<div>' + (row.html || '') + '</div></div>');
        });
        (commentary.verse || []).forEach(function (row) {
            cards.push(
                '<div class="card"><strong>Rango ' +
                row.chapter_begin + ':' + row.verse_begin + ' - ' + row.chapter_end + ':' + row.verse_end +
                '</strong>' + renderSourceTag(row) + '<div>' + (row.html || '') + '</div></div>'
            );
        });
        if (!cards.length) {
            cards.push('<p class="muted">Sin comentarios para esta selección.</p>');
        }
        els.commentsPanel.innerHTML = cards.join('');
    }

    function renderSourceTag(row) {
        if (!row || !row.source_label) {
            return '';
        }
        return '<small class="muted">Fuente: ' + escapeHtml(row.source_label) + '</small>';
    }

    function renderNotesPanel(payload) {
        var range = payload.reference || {};
        var notes = payload.notes || [];
        var list = notes.map(function (note) {
            return '' +
                '<div class="card">' +
                '<strong>' + rangeLabel(note.verse_start, note.verse_end) + '</strong>' +
                '<p>' + escapeHtml(note.content || '') + '</p>' +
                (note.tags ? '<small class="muted">Etiquetas: ' + escapeHtml(note.tags) + '</small>' : '') +
                '<div class="toolbar">' +
                '<button class="btn-light js-note-edit" data-note-id="' + note.id + '" data-note-content="' + escapeHtml(note.content || '') + '" data-note-tags="' + escapeHtml(note.tags || '') + '">Editar</button>' +
                '<button class="btn-light js-note-delete" data-note-id="' + note.id + '">Eliminar</button>' +
                '</div>' +
                '</div>';
        }).join('');

        els.notesPanel.innerHTML = '' +
            '<form id="noteForm" class="stack">' +
            '<textarea id="noteContent" rows="3" placeholder="Escribe tu nota del pasaje"></textarea>' +
            '<input id="noteTags" type="text" placeholder="Etiquetas separadas por coma">' +
            '<button class="btn-primary" type="submit">Guardar nota</button>' +
            '</form>' +
            (list || '<p class="muted">No hay notas en este pasaje.</p>');

        var noteForm = document.getElementById('noteForm');
        noteForm.addEventListener('submit', function (event) {
            event.preventDefault();
            createNote();
        });

        els.notesPanel.querySelectorAll('.js-note-delete').forEach(function (btn) {
            btn.addEventListener('click', function () {
                deleteNote(this.getAttribute('data-note-id'));
            });
        });

        els.notesPanel.querySelectorAll('.js-note-edit').forEach(function (btn) {
            btn.addEventListener('click', function () {
                editNote(
                    this.getAttribute('data-note-id'),
                    decodeHtml(this.getAttribute('data-note-content')),
                    decodeHtml(this.getAttribute('data-note-tags'))
                );
            });
        });
    }

    function renderLinksPanel(payload) {
        var range = selectedRange();
        var links = payload.links || [];
        var items = links.map(function (link) {
            return '' +
                '<div class="card">' +
                '<strong>' + toReference(link.to_book, link.to_chapter, link.to_verse_start, link.to_verse_end) + '</strong>' +
                (link.note ? '<p>' + escapeHtml(link.note) + '</p>' : '') +
                '<div class="toolbar">' +
                '<button class="btn-light js-link-open" data-book="' + link.to_book + '" data-chapter="' + link.to_chapter + '">Abrir</button>' +
                '<button class="btn-light js-link-delete" data-id="' + link.id + '">Eliminar</button>' +
                '</div></div>';
        }).join('');

        els.linksPanel.innerHTML = '' +
            '<form id="linkForm" class="stack">' +
            '<div class="toolbar">' +
            '<input id="linkBook" type="number" min="1" max="66" placeholder="Libro destino">' +
            '<input id="linkChapter" type="number" min="1" placeholder="Capítulo destino">' +
            '<input id="linkVerseStart" type="number" min="1" placeholder="Vers. inicio">' +
            '<input id="linkVerseEnd" type="number" min="1" placeholder="Vers. fin">' +
            '</div>' +
            '<input id="linkNote" type="text" placeholder="Nota del vínculo (opcional)">' +
            '<button class="btn-primary" type="submit">Guardar vínculo</button>' +
            '</form>' +
            '<div class="card"><small class="muted">Origen: ' + escapeHtml(toReference(state.currentBook, state.currentChapter, range.start, range.end)) + '</small></div>' +
            (items || '<p class="muted">No hay vínculos para este pasaje.</p>');

        var form = document.getElementById('linkForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            createLink();
        });

        els.linksPanel.querySelectorAll('.js-link-open').forEach(function (btn) {
            btn.addEventListener('click', function () {
                fetchChapter(Number(this.getAttribute('data-book')), Number(this.getAttribute('data-chapter')));
            });
        });

        els.linksPanel.querySelectorAll('.js-link-delete').forEach(function (btn) {
            btn.addEventListener('click', function () {
                deleteLink(Number(this.getAttribute('data-id')));
            });
        });
    }

    function renderToolsPanel(payload) {
        var historyRows = payload.history || [];
        var offline = !navigator.onLine;
        var historyHtml = historyRows.map(function (row) {
            return '<button class="btn-light js-open-history" data-book="' + row.book + '" data-chapter="' + row.chapter + '">' +
                toReference(row.book, row.chapter, null, null) +
                '</button>';
        }).join('');

        var backgrounds = state.initial.backgrounds || [];
        var bgOptions = backgrounds.map(function (item) {
            return '<option value="' + escapeHtml(item) + '">' + escapeHtml(item.split('/').pop()) + '</option>';
        }).join('');
        var imageCardMode = state.settings.theme === 'dark' ? 'dark' : 'light';

        els.toolsPanel.innerHTML = '' +
            '<div class="stack">' +
            '<div class="card">' +
            '<strong>Accesibilidad</strong>' +
            '<div class="font-ctrls">' +
            '<button class="btn-light js-font-up" type="button">A+</button>' +
            '<button class="btn-light js-font-down" type="button">A-</button>' +
            '<button class="btn-light js-font-reset" type="button">Restablecer</button>' +
            '<small class="muted">Escala: ' + state.settings.fontScale + '%</small>' +
            '</div>' +
            '</div>' +
            '<button class="btn-light js-favorite">Marcar favorito</button>' +
            '<button class="btn-primary js-generate" data-mode="explicacion" ' + (offline ? 'disabled' : '') + '>Generar explicación</button>' +
            '<button class="btn-light js-generate" data-mode="palabras_clave" ' + (offline ? 'disabled' : '') + '>Palabras clave</button>' +
            '<button class="btn-light js-generate" data-mode="bosquejo" ' + (offline ? 'disabled' : '') + '>Bosquejo</button>' +
            '<button class="btn-light js-generate" data-mode="aplicacion_practica" ' + (offline ? 'disabled' : '') + '>Aplicación práctica</button>' +
            '<div class="card">' +
            '<strong>Crear imagen del versículo</strong>' +
            '<select id="imageBackgroundSelect">' + (bgOptions || '<option value="assets/backgrounds/bg-01.svg">bg-01.svg</option>') + '</select>' +
            '<select id="imageCardMode">' +
            '<option value="dark"' + (imageCardMode === 'dark' ? ' selected' : '') + '>Modo oscuro</option>' +
            '<option value="light"' + (imageCardMode === 'light' ? ' selected' : '') + '>Modo claro</option>' +
            '</select>' +
            '<div class="toolbar">' +
            '<button class="btn-light js-image-create" type="button">Crear imagen del versículo</button>' +
            '<button class="btn-light js-image-download" type="button">Descargar PNG</button>' +
            '<button class="btn-light js-image-share" type="button">Compartir</button>' +
            '<button class="btn-light js-image-copy" type="button">Copiar imagen</button>' +
            '</div>' +
            '<img id="imageCardPreview" class="image-card-preview hidden" alt="Vista previa de versículo">' +
            '</div>' +
            '<div id="toolsOutput" class="card"><p class="muted">Selecciona una acción para generar contenido del pasaje.</p></div>' +
            '<div class="card"><strong>Historial reciente</strong><div class="stack">' + (historyHtml || '<span class="muted">Sin historial.</span>') + '</div></div>' +
            '</div>';

        els.toolsPanel.querySelectorAll('.js-open-history').forEach(function (btn) {
            btn.addEventListener('click', function () {
                fetchChapter(Number(this.getAttribute('data-book')), Number(this.getAttribute('data-chapter')));
            });
        });

        var favoriteBtn = els.toolsPanel.querySelector('.js-favorite');
        if (favoriteBtn) {
            favoriteBtn.addEventListener('click', function () {
                var range = selectedRange();
                postForm('api.favorite.toggle', {
                    book: state.currentBook,
                    chapter: state.currentChapter,
                    verse: range.start
                }).then(function (res) {
                    if (res.error) {
                        notify(res.error);
                        return;
                    }
                    notify(res.active ? 'Versículo marcado como favorito.' : 'Favorito eliminado.');
                });
            });
        }

        var fontUp = els.toolsPanel.querySelector('.js-font-up');
        var fontDown = els.toolsPanel.querySelector('.js-font-down');
        var fontReset = els.toolsPanel.querySelector('.js-font-reset');
        if (fontUp) {
            fontUp.addEventListener('click', function () {
                changeFontScale(5);
                renderToolsPanel(payload);
            });
        }
        if (fontDown) {
            fontDown.addEventListener('click', function () {
                changeFontScale(-5);
                renderToolsPanel(payload);
            });
        }
        if (fontReset) {
            fontReset.addEventListener('click', function () {
                state.settings.fontScale = 100;
                applySettings();
                saveSettings();
                notify('Tamaño restablecido.');
                renderToolsPanel(payload);
            });
        }

        els.toolsPanel.querySelectorAll('.js-generate').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var output = document.getElementById('toolsOutput');
                if (!navigator.onLine) {
                    output.innerHTML = '<p class="muted">No disponible sin conexión.</p>';
                    return;
                }
                var mode = this.getAttribute('data-mode');
                output.innerHTML = '<p class="muted">Generando...</p>';
                callGenerate(mode);
            });
        });

        bindImageCardActions();
    }

    function callGenerate(mode) {
        if (!state.selectionPayload) {
            notify('Selecciona un pasaje.');
            return;
        }

        var ref = state.selectionPayload.reference || {};
        var verses = state.selectionPayload.verses || [];

        fetch('api/generate.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                book: ref.book,
                chapter: ref.chapter,
                verse_start: ref.verse_start,
                verse_end: ref.verse_end,
                mode: mode,
                verses: verses
            })
        }).then(asJson).then(function (res) {
            var output = document.getElementById('toolsOutput');
            if (res.error) {
                output.innerHTML = '<p class="muted">' + escapeHtml(res.error) + '</p>';
                return;
            }
            if (!res.result) {
                output.innerHTML = '<p class="muted">No fue posible generar contenido.</p>';
                return;
            }
            output.innerHTML = '<p>' + escapeHtml(res.result.content || '') + '</p>' +
                '<small class="muted">' + (res.result.cached ? 'Resultado en caché' : 'Resultado actualizado') + '</small>';
        }).catch(function () {
            var output = document.getElementById('toolsOutput');
            output.innerHTML = '<p class="muted">No disponible sin conexión.</p>';
        });
    }

    function createNote() {
        var range = selectedRange();
        var content = (document.getElementById('noteContent').value || '').trim();
        var tags = (document.getElementById('noteTags').value || '').trim();
        if (!content) {
            notify('Escribe una nota.');
            return;
        }
        postForm('api.note.create', {
            book: state.currentBook,
            chapter: state.currentChapter,
            verse_start: range.start,
            verse_end: range.end,
            content: content,
            tags: tags
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Nota guardada.');
            loadSelectionData();
        });
    }

    function editNote(id, currentContent, currentTags) {
        var content = window.prompt('Editar nota', currentContent || '');
        if (!content || !content.trim()) {
            return;
        }
        var tags = window.prompt('Etiquetas', currentTags || '');
        postForm('api.note.update', {
            id: id,
            content: content.trim(),
            tags: (tags || '').trim()
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Nota actualizada.');
            loadSelectionData();
        });
    }

    function deleteNote(id) {
        postForm('api.note.delete', { id: id }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Nota eliminada.');
            loadSelectionData();
        });
    }

    function createLink() {
        var range = selectedRange();
        var toBook = Number(document.getElementById('linkBook').value || 0);
        var toChapter = Number(document.getElementById('linkChapter').value || 0);
        var toVerseStart = Number(document.getElementById('linkVerseStart').value || 0);
        var toVerseEnd = Number(document.getElementById('linkVerseEnd').value || toVerseStart);
        var note = (document.getElementById('linkNote').value || '').trim();

        if (!toBook || !toChapter || !toVerseStart) {
            notify('Completa referencia destino.');
            return;
        }

        postForm('api.link.create', {
            from_book: state.currentBook,
            from_chapter: state.currentChapter,
            from_verse_start: range.start,
            from_verse_end: range.end,
            to_book: toBook,
            to_chapter: toChapter,
            to_verse_start: toVerseStart,
            to_verse_end: toVerseEnd,
            note: note
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Vínculo guardado.');
            loadSelectionData();
        });
    }

    function deleteLink(id) {
        postForm('api.link.delete', { id: id }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Vínculo eliminado.');
            loadSelectionData();
        });
    }

    function selectedRows() {
        var map = {};
        state.selectedVerses.forEach(function (value) {
            map[value] = true;
        });
        return state.verses.filter(function (row) {
            return Boolean(map[Number(row.verse)]);
        });
    }

    function selectedRange() {
        var rows = selectedRows();
        if (!rows.length) {
            return { start: 1, end: 1 };
        }
        return {
            start: Number(rows[0].verse),
            end: Number(rows[rows.length - 1].verse)
        };
    }

    function buildSelectionReferences() {
        var rows = selectedRows();
        return rows.map(function (row) {
            return buildReference(row.book, row.chapter, row.verse) + ' - ' + cleanText(row.scripture_text || row.scripture_html || '');
        });
    }

    function fetchChapters(book) {
        fetch('?route=api.chapters&book=' + book)
            .then(asJson)
            .then(function (data) {
                if (data.error) {
                    notify(data.error);
                    return;
                }
                state.currentBook = Number(data.book);
                state.chapters = data.chapters || [];
                state.currentChapter = Number(state.chapters[0] || 1);
                renderBooks(state.books);
                renderChapters();
                fetchChapter(state.currentBook, state.currentChapter);
                closeDrawers();
            })
            .catch(function () {
                notify('No se pudo cargar el libro.');
            });
    }

    function fetchChapter(book, chapter) {
        fetch('?route=api.chapter&book=' + book + '&chapter=' + chapter)
            .then(asJson)
            .then(function (data) {
                if (data.error) {
                    notify(data.error);
                    return;
                }
                state.currentBook = Number(data.book);
                state.currentChapter = Number(data.chapter);
                state.chapters = data.chapters || [];
                state.verses = data.verses || [];
                renderBooks(state.books);
                renderChapters();
                renderVerses();
                if (state.pendingVerse) {
                    toggleVerse(state.pendingVerse);
                    state.lastSelectedVerse = state.pendingVerse;
                    state.pendingVerse = null;
                }
                els.title.textContent = data.book_name + ' ' + data.chapter;
                history.replaceState(null, '', '?route=reader&book=' + state.currentBook + '&chapter=' + state.currentChapter);
                closeDrawers();
            })
            .catch(function () {
                notify('No se pudo cargar el capítulo.');
            });
    }

    function bindSelectionActions() {
        els.copySelection.addEventListener('click', function () {
            var references = buildSelectionReferences();
            if (!references.length) {
                notify('Selecciona al menos un versículo.');
                return;
            }
            copyText(references.join('\n')).then(function () {
                notify('Selección copiada.');
            }).catch(function () {
                notify('No se pudo copiar.');
            });
        });

        els.copyParagraph.addEventListener('click', function () {
            var rows = selectedRows();
            if (!rows.length) {
                notify('Selecciona al menos un versículo.');
                return;
            }
            var paragraph = rows.map(function (row) {
                return cleanText(row.scripture_text || row.scripture_html || '');
            }).join(' ');
            var start = rows[0].verse;
            var end = rows[rows.length - 1].verse;
            var reference = buildReference(state.currentBook, state.currentChapter, start) + (start !== end ? '-' + end : '');
            copyText(paragraph + '\n\n' + reference).then(function () {
                notify('Párrafo copiado.');
            }).catch(function () {
                notify('No se pudo copiar.');
            });
        });

        els.shareSelection.addEventListener('click', function () {
            var references = buildSelectionReferences();
            if (!references.length) {
                notify('Selecciona al menos un versículo.');
                return;
            }
            var text = references.join('\n') + '\n\nBiblia para todos';
            if (navigator.share) {
                navigator.share({ title: 'Biblia para todos', text: text }).catch(function () {});
                return;
            }
            copyText(text).then(function () {
                notify('Compartir no disponible. Texto copiado.');
            }).catch(function () {
                notify('No se pudo copiar.');
            });
        });
    }

    function activateTab(tabName) {
        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.classList.toggle('is-active', tab.getAttribute('data-tab') === tabName);
        });
        document.querySelectorAll('.tab-panel').forEach(function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-panel') === tabName);
        });
    }

    function openSettings() {
        els.overlay.classList.remove('hidden');
        els.settingsModal.classList.remove('hidden');
    }

    function closeSettings() {
        els.overlay.classList.add('hidden');
        els.settingsModal.classList.add('hidden');
        closeDrawers();
    }

    function openSearch() {
        els.overlay.classList.remove('hidden');
        els.searchModal.classList.remove('hidden');
        var q = document.getElementById('qText');
        if (q) {
            q.focus();
        }
    }

    function closeSearch() {
        if (!els.searchModal || els.searchModal.classList.contains('hidden')) {
            return;
        }
        els.searchModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden')) {
            els.overlay.classList.add('hidden');
        }
    }

    function runQuickSearch() {
        var q = (document.getElementById('qText').value || '').trim();
        if (!q) {
            notify('Escribe un texto de búsqueda.');
            return;
        }
        var params = new URLSearchParams({
            route: 'api.search',
            q: q,
            mode: document.getElementById('qMode').value || 'any',
            book: document.getElementById('qBook').value || '0',
            chapter_from: document.getElementById('qChapterFrom').value || '0',
            chapter_to: document.getElementById('qChapterTo').value || '0',
            limit: '80'
        });

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                renderSearchResults(res.rows || [], res.engine || '');
            })
            .catch(function () {
                notify('No se pudo ejecutar la búsqueda.');
            });
    }

    function renderSearchResults(rows, engine) {
        if (!rows.length) {
            els.quickSearchResults.innerHTML = '<p class="muted">Sin resultados.</p>';
            return;
        }
        var html = '<p class="muted">Motor: ' + escapeHtml(engine || '-') + ' · Resultados: ' + rows.length + '</p>';
        html += rows.map(function (row) {
            return '' +
                '<div class="search-result">' +
                '<strong>' + escapeHtml(row.reference || '') + '</strong>' +
                (row.title ? '<small class="muted">' + escapeHtml(row.title) + '</small>' : '') +
                '<div>' + (row.scripture_html || '') + '</div>' +
                '<div class="toolbar"><button class="btn-light js-open-result" data-book="' + row.book + '" data-chapter="' + row.chapter + '" data-verse="' + row.verse + '">Abrir</button></div>' +
                '</div>';
        }).join('');

        els.quickSearchResults.innerHTML = html;
        els.quickSearchResults.querySelectorAll('.js-open-result').forEach(function (btn) {
            btn.addEventListener('click', function () {
                state.pendingVerse = Number(this.getAttribute('data-verse'));
                closeSearch();
                fetchChapter(Number(this.getAttribute('data-book')), Number(this.getAttribute('data-chapter')));
            });
        });
    }

    function bindSettingsInputs() {
        bindSetting('optShowHelp', 'showHelp', 'checkbox');
        bindSetting('optLayoutMode', 'layoutMode');
        bindSetting('optShowDaily', 'showDaily', 'checkbox');
        bindSetting('optAutoDevotional', 'autoDevotional', 'checkbox');
        bindSetting('optFontSize', 'fontSize');
        bindSetting('optSpacing', 'spacing');
        bindSetting('optTheme', 'theme');
    }

    function bindSetting(id, key, type) {
        var input = document.getElementById(id);
        if (!input) {
            return;
        }
        if (type === 'checkbox') {
            input.checked = Boolean(state.settings[key]);
        } else {
            input.value = state.settings[key];
        }

        input.addEventListener('change', function () {
            state.settings[key] = type === 'checkbox' ? this.checked : this.value;
            if (key === 'showDaily') {
                localStorage.setItem('show_daily_start', state.settings.showDaily ? '1' : '0');
            }
            saveSettings();
            applySettings();
        });
    }

    function applySettings() {
        document.body.classList.toggle('mode-focus', state.settings.layoutMode === 'focus');
        document.body.classList.remove('font-sm', 'font-md', 'font-lg');
        document.body.classList.add('font-' + state.settings.fontSize);
        document.body.classList.remove('spacing-compact', 'spacing-normal');
        document.body.classList.add('spacing-' + state.settings.spacing);
        document.body.classList.toggle('theme-dark', state.settings.theme === 'dark');
        if (state.settings.fontScale < 85) {
            state.settings.fontScale = 85;
        } else if (state.settings.fontScale > 150) {
            state.settings.fontScale = 150;
        }
        document.documentElement.style.setProperty('--reader-font-scale', String(state.settings.fontScale) + '%');
        if (state.settings.showHelp) {
            els.helpPane.classList.remove('hidden');
        } else {
            els.helpPane.classList.add('hidden');
        }
        if (els.readerShell) {
            els.readerShell.classList.toggle('help-hidden', !state.settings.showHelp);
        }
    }

    function loadSettings() {
        try {
            var raw = localStorage.getItem('biblia_settings');
            if (!raw) {
                var showDaily = localStorage.getItem('show_daily_start');
                if (showDaily !== null) {
                    state.settings.showDaily = showDaily === '1';
                }
                return;
            }
            state.settings = Object.assign({}, state.settings, JSON.parse(raw) || {});
            var storedDaily = localStorage.getItem('show_daily_start');
            if (storedDaily !== null) {
                state.settings.showDaily = storedDaily === '1';
            }
        } catch (err) {
            // ignore
        }
    }

    function saveSettings() {
        localStorage.setItem('biblia_settings', JSON.stringify(state.settings));
        localStorage.setItem('show_daily_start', state.settings.showDaily ? '1' : '0');
        syncUserPrefs();
    }

    function openHelpDrawer() {
        els.helpPane.classList.remove('hidden');
        els.helpPane.classList.add('is-open');
        els.overlay.classList.remove('hidden');
    }

    function closeDrawers() {
        els.helpPane.classList.remove('is-open');
        els.booksPane.classList.remove('is-open');
        els.chaptersPane.classList.remove('is-open');
        if (!state.settings.showHelp) {
            els.helpPane.classList.add('hidden');
        }
        if (els.searchModal && !els.searchModal.classList.contains('hidden')) {
            els.searchModal.classList.add('hidden');
        }
        if (els.settingsModal.classList.contains('hidden')) {
            els.overlay.classList.add('hidden');
        }
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

    function bindImageCardActions() {
        var createBtn = els.toolsPanel.querySelector('.js-image-create');
        var downloadBtn = els.toolsPanel.querySelector('.js-image-download');
        var shareBtn = els.toolsPanel.querySelector('.js-image-share');
        var copyBtn = els.toolsPanel.querySelector('.js-image-copy');
        var preview = document.getElementById('imageCardPreview');

        if (!createBtn || !preview) {
            return;
        }

        createBtn.addEventListener('click', function () {
            createVerseImageCard().then(function (result) {
                preview.src = result.dataUrl;
                preview.dataset.blobUrl = result.blobUrl;
                preview.classList.remove('hidden');
                notify('Imagen creada.');
            }).catch(function () {
                notify('No se pudo crear la imagen.');
            });
        });

        if (downloadBtn) {
            downloadBtn.addEventListener('click', function () {
                ensureImageReady(preview).then(function (blob) {
                    downloadBlob(blob, buildImageFilename());
                });
            });
        }

        if (shareBtn) {
            shareBtn.addEventListener('click', function () {
                ensureImageReady(preview).then(function (blob) {
                    shareImageBlob(blob, buildImageFilename(), buildShareSummary());
                }).catch(function () {
                    notify('No se pudo compartir la imagen.');
                });
            });
        }

        if (copyBtn) {
            copyBtn.addEventListener('click', function () {
                ensureImageReady(preview).then(function (blob) {
                    if (navigator.clipboard && window.ClipboardItem) {
                        var item = new ClipboardItem({ 'image/png': blob });
                        return navigator.clipboard.write([item]).then(function () {
                            notify('Imagen copiada al portapapeles.');
                        });
                    }
                    downloadBlob(blob, buildImageFilename());
                    notify('Portapapeles no disponible. Imagen descargada.');
                }).catch(function () {
                    notify('No se pudo copiar la imagen.');
                });
            });
        }
    }

    function ensureImageReady(preview) {
        if (preview && preview.dataset.blobUrl) {
            return fetch(preview.dataset.blobUrl).then(function (res) { return res.blob(); });
        }
        return createVerseImageCard().then(function (result) {
            if (preview) {
                preview.src = result.dataUrl;
                preview.dataset.blobUrl = result.blobUrl;
                preview.classList.remove('hidden');
            }
            return result.blob;
        });
    }

    function createVerseImageCard() {
        var selected = selectedRows();
        if (!selected.length) {
            return Promise.reject(new Error('Sin selección'));
        }
        var range = selectedRange();
        var reference = toReference(state.currentBook, state.currentChapter, range.start, range.end);
        var text = selected.map(function (row) {
            return cleanText(row.scripture_text || row.scripture_html || '');
        }).join(' ');
        var bgSelect = document.getElementById('imageBackgroundSelect');
        var background = bgSelect ? bgSelect.value : 'assets/backgrounds/bg-01.svg';
        var modeSelect = document.getElementById('imageCardMode');
        var cardMode = modeSelect ? modeSelect.value : (state.settings.theme === 'dark' ? 'dark' : 'light');
        var overlayColor = cardMode === 'light' ? 'rgba(255,255,255,.48)' : 'rgba(0,0,0,.40)';
        var textColor = cardMode === 'light' ? '#102334' : '#ffffff';

        var canvas = document.createElement('canvas');
        canvas.width = 1080;
        canvas.height = 1080;
        var ctx = canvas.getContext('2d');

        return new Promise(function (resolve, reject) {
            var img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = function () {
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                ctx.fillStyle = overlayColor;
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.fillStyle = textColor;
                ctx.font = 'bold 54px Segoe UI, Arial, sans-serif';
                drawWrappedText(ctx, '"' + text + '"', 90, 250, 900, 72);
                ctx.font = 'bold 38px Segoe UI, Arial, sans-serif';
                ctx.fillText(reference, 90, 900);
                ctx.font = '30px Segoe UI, Arial, sans-serif';
                ctx.fillText('Biblia para todos', 90, 950);

                canvas.toBlob(function (blob) {
                    if (!blob) {
                        reject(new Error('blob'));
                        return;
                    }
                    var blobUrl = URL.createObjectURL(blob);
                    resolve({
                        blob: blob,
                        blobUrl: blobUrl,
                        dataUrl: canvas.toDataURL('image/png')
                    });
                }, 'image/png');
            };
            img.onerror = function () {
                reject(new Error('image'));
            };
            img.src = background;
        });
    }

    function drawWrappedText(ctx, text, x, y, maxWidth, lineHeight) {
        var words = String(text || '').split(/\s+/);
        var line = '';
        var currentY = y;
        for (var i = 0; i < words.length; i++) {
            var testLine = line + words[i] + ' ';
            var width = ctx.measureText(testLine).width;
            if (width > maxWidth && i > 0) {
                ctx.fillText(line, x, currentY);
                line = words[i] + ' ';
                currentY += lineHeight;
            } else {
                line = testLine;
            }
        }
        if (line) {
            ctx.fillText(line, x, currentY);
        }
    }

    function buildImageFilename() {
        var range = selectedRange();
        return 'versiculo-' + state.currentBook + '-' + state.currentChapter + '-' + range.start + '-' + range.end + '.png';
    }

    function buildShareSummary() {
        var rows = selectedRows();
        if (!rows.length) {
            return 'Biblia para todos';
        }
        var range = selectedRange();
        var text = rows.map(function (row) {
            return cleanText(row.scripture_text || row.scripture_html || '');
        }).join(' ');
        return text + '\n\n' + toReference(state.currentBook, state.currentChapter, range.start, range.end) + '\nBiblia para todos';
    }

    function shareImageBlob(blob, filename, fallbackText) {
        var file = new File([blob], filename, { type: 'image/png' });
        if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
            return navigator.share({
                title: 'Biblia para todos',
                text: fallbackText,
                files: [file]
            }).catch(function () {});
        }
        downloadBlob(blob, filename);
        return Promise.resolve();
    }

    function downloadBlob(blob, filename) {
        var url = URL.createObjectURL(blob);
        var link = document.createElement('a');
        link.href = url;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }

    function changeFontScale(delta) {
        state.settings.fontScale = Number(state.settings.fontScale || 100) + Number(delta || 0);
        if (state.settings.fontScale < 85) {
            state.settings.fontScale = 85;
        }
        if (state.settings.fontScale > 150) {
            state.settings.fontScale = 150;
        }
        applySettings();
        saveSettings();
        notify('Tamaño ' + state.settings.fontScale + '%');
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
                area.focus();
                area.select();
                document.execCommand('copy');
                document.body.removeChild(area);
                resolve();
            } catch (err) {
                reject(err);
            }
        });
    }

    function asJson(res) {
        return res.json();
    }

    function cleanText(value) {
        var div = document.createElement('div');
        div.innerHTML = value;
        return (div.textContent || div.innerText || '').replace(/\s+/g, ' ').trim();
    }

    function buildReference(book, chapter, verse) {
        var bookRow = state.books.find(function (item) { return Number(item.id) === Number(book); });
        var bookName = bookRow ? bookRow.name : ('Libro ' + book);
        return bookName + ' ' + chapter + ':' + verse;
    }

    function toReference(book, chapter, verseStart, verseEnd) {
        var bookRow = state.books.find(function (item) { return Number(item.id) === Number(book); });
        var bookName = bookRow ? bookRow.name : ('Libro ' + book);
        if (!verseStart) {
            return bookName + ' ' + chapter;
        }
        if (!verseEnd || Number(verseStart) === Number(verseEnd)) {
            return bookName + ' ' + chapter + ':' + verseStart;
        }
        return bookName + ' ' + chapter + ':' + verseStart + '-' + verseEnd;
    }

    function rangeLabel(start, end) {
        if (Number(start) === Number(end)) {
            return 'Versículo ' + start;
        }
        return 'Versículos ' + start + '-' + end;
    }

    function decodeHtml(value) {
        var txt = document.createElement('textarea');
        txt.innerHTML = value || '';
        return txt.value;
    }

    function maybeRedirectToDailyAtStartup() {
        var params = new URLSearchParams(window.location.search);
        if (params.get('skip_daily') === '1') {
            return;
        }
        var today = new Date().toISOString().slice(0, 10);
        var seen = sessionStorage.getItem('daily_seen_today');
        if (seen === today) {
            return;
        }
        if (!state.settings.showDaily) {
            return;
        }
        if (localStorage.getItem('daily_hidden_date') === today) {
            return;
        }
        sessionStorage.setItem('daily_seen_today', today);
        window.location.replace('?route=home_daily');
    }

    function syncUserPrefs() {
        postForm('api.prefs.save', {
            font_scale: state.settings.fontScale,
            show_daily: state.settings.showDaily ? 1 : 0,
            auto_devotional: state.settings.autoDevotional ? 1 : 0,
            theme: state.settings.theme
        }).catch(function () {
            // ignore
        });
    }

    function bindConnectivity() {
        window.addEventListener('online', function () {
            notify('Conexión restablecida.');
            if (state.selectionPayload) {
                renderToolsPanel(state.selectionPayload);
            }
        });
        window.addEventListener('offline', function () {
            notify('Disponible offline.');
            if (state.selectionPayload) {
                renderToolsPanel(state.selectionPayload);
            }
        });
    }

    function registerPwa() {
        if (!('serviceWorker' in navigator)) {
            return;
        }
        navigator.serviceWorker.register('sw.js').then(function () {
            notify('Disponible offline.');
        }).catch(function () {
            // ignore
        });
    }

    function notify(message) {
        els.notice.textContent = message;
        els.notice.classList.remove('hidden');
        clearTimeout(notify.timer);
        notify.timer = setTimeout(function () {
            els.notice.classList.add('hidden');
        }, 2200);
    }

    function applyGlobalPrefsFromStorage() {
        var settings = {};
        try {
            settings = JSON.parse(localStorage.getItem('biblia_settings') || '{}') || {};
        } catch (err) {
            settings = {};
        }

        var scale = Number(settings.fontScale || 100);
        if (scale < 85) {
            scale = 85;
        } else if (scale > 150) {
            scale = 150;
        }
        document.documentElement.style.setProperty('--reader-font-scale', String(scale) + '%');

        if (settings.theme === 'dark') {
            document.body.classList.add('theme-dark');
        } else {
            document.body.classList.remove('theme-dark');
        }
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
