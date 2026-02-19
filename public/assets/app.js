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
        pendingSelectionVerses: [],
        selectionPayload: null,
        highlights: {},
        selectedBackground: '',
        activeTab: 'contexto',
        needsChapterRefresh: false,
        readingPlan: null,
        planDate: '',
        planCalendarMonth: '',
        settings: {
            showHelp: true,
            layoutMode: 'columns',
            fontSize: 'md',
            spacing: 'normal',
            theme: 'light',
            fontScale: 100,
            showDaily: true,
            autoDevotional: false,
            weeklyGoalDays: 5,
            reminderEnabled: false,
            reminderTime: '07:00'
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
        openReadingPlan: document.getElementById('openReadingPlan'),
        toggleHelp: document.getElementById('toggleHelp'),
        overlay: document.getElementById('mobileOverlay'),
        notice: document.getElementById('readingNotice'),
        readerPlanCard: document.getElementById('readerPlanCard'),
        settingsModal: document.getElementById('settingsModal'),
        searchModal: document.getElementById('searchModal'),
        planModal: document.getElementById('planModal'),
        readerShell: root.querySelector('.reader-shell'),
        openSettings: document.getElementById('openSettings'),
        closeSettings: document.getElementById('closeSettings'),
        closeSearch: document.getElementById('closeSearch'),
        closePlan: document.getElementById('closePlan'),
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
        state.highlights = normalizeHighlights(state.initial.highlights || {});
        if (Number(state.initial.highlight_verse || 0) > 0) {
            state.pendingVerse = Number(state.initial.highlight_verse);
        }
        if (state.initial.backgrounds && state.initial.backgrounds.length) {
            state.selectedBackground = state.initial.backgrounds[0];
        }

        if (state.initial.user_prefs) {
            state.settings.fontScale = Number(state.initial.user_prefs.font_scale || 100);
            state.settings.showDaily = Number(state.initial.user_prefs.show_daily || 0) === 1;
            state.settings.autoDevotional = Number(state.initial.user_prefs.auto_devotional || 0) === 1;
            state.settings.weeklyGoalDays = clampGoalDays(state.initial.user_prefs.weekly_goal_days || 5);
            state.settings.reminderEnabled = Number(state.initial.user_prefs.reminder_enabled || 0) === 1;
            state.settings.reminderTime = normalizeReminderTime(state.initial.user_prefs.reminder_time || '07:00');
            if (state.initial.user_prefs.theme === 'dark') {
                state.settings.theme = 'dark';
            }
        }

        restoreReaderState();
        loadSettings();
        maybeRedirectToDailyAtStartup();
        applySettings();
        renderBooks(state.books);
        renderChapters();
        renderVerses();
        wireEvents();
        activateTab(state.activeTab || 'contexto');
        bindSelectionActions();
        renderEmptyPanels();
        bindConnectivity();
        registerPwa();
        maybeOpenSearchAtStartup();
        fetchReadingPlanStatus();

        if (state.needsChapterRefresh) {
            fetchChapter(state.currentBook, state.currentChapter);
            return;
        }
        applyPendingSelection();
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
        if (els.openReadingPlan) {
            els.openReadingPlan.addEventListener('click', openPlan);
        }
        if (els.closeSearch) {
            els.closeSearch.addEventListener('click', closeSearch);
        }
        if (els.closePlan) {
            els.closePlan.addEventListener('click', closePlan);
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
                closePlan();
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
        updateHighlightUI();
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
                handleMobileVerseTap();
            });
        });
    }

    function handleMobileVerseTap() {
        if (!window.matchMedia('(max-width: 980px)').matches) {
            return;
        }
        activateTab('contexto');
        openHelpDrawer();
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

    function updateHighlightUI() {
        var palette = ['yellow', 'green', 'blue', 'pink', 'orange'];
        var map = normalizeHighlights(state.highlights || {});
        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            var verse = Number(node.getAttribute('data-verse'));
            palette.forEach(function (color) {
                node.classList.remove('hl-' + color);
            });
            node.removeAttribute('data-highlight');
            var color = map[verse] || '';
            if (!color || palette.indexOf(color) === -1) {
                return;
            }
            node.classList.add('hl-' + color);
            node.setAttribute('data-highlight', color);
        });
    }

    function normalizeHighlights(value) {
        var out = {};
        if (!value || typeof value !== 'object') {
            return out;
        }
        Object.keys(value).forEach(function (key) {
            var verse = Number(key);
            var color = String(value[key] || '').trim().toLowerCase();
            if (!verse || !color) {
                return;
            }
            out[verse] = color;
        });
        return out;
    }

    function onSelectionChange() {
        if (!state.selectedVerses.length) {
            state.selectionPayload = null;
            renderEmptyPanels();
            persistReaderState();
            return;
        }
        persistReaderState();
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
        var keywords = Array.isArray(c.keywords) ? c.keywords : [];
        var keywordInsights = Array.isArray(c.keyword_insights) ? c.keyword_insights : [];
        var questions = Array.isArray(c.questions) ? c.questions : [];
        var studyTips = Array.isArray(c.study_tips) ? c.study_tips : [];
        var keywordHtml = keywords.length ? keywords.map(function (word) {
            return '<span class="chip">' + escapeHtml(word) + '</span>';
        }).join('') : '<span class="muted">Sin términos destacados.</span>';
        var keywordInsightHtml = keywordInsights.length ? '<ul class="context-list">' + keywordInsights.map(function (item) {
            return '<li><strong>' + escapeHtml(item.term || '') + ':</strong> ' +
                escapeHtml(item.meaning || '') +
                (item.study_use ? ' <span class="muted">(' + escapeHtml(item.study_use) + ')</span>' : '') +
                '</li>';
        }).join('') + '</ul>' : '<p class="muted">Sin desarrollo de términos para este pasaje.</p>';

        var questionsHtml = questions.length ? '<ul class="context-list">' + questions.map(function (q) {
            return '<li>' + escapeHtml(q) + '</li>';
        }).join('') + '</ul>' : '<p class="muted">Sin preguntas sugeridas.</p>';

        var tipsHtml = studyTips.length ? '<ul class="context-list">' + studyTips.map(function (tip) {
            return '<li>' + escapeHtml(tip) + '</li>';
        }).join('') + '</ul>' : '<p class="muted">Sin recomendaciones adicionales.</p>';

        els.contextPanel.innerHTML = '' +
            '<div class="card"><strong>Pasaje</strong><p>' + escapeHtml(payload.reference.label || '') + '</p></div>' +
            '<div class="card"><strong>Versión sencilla</strong><p>' + escapeHtml(c.simple_version || '') + '</p></div>' +
            '<div class="card"><strong>Contexto histórico</strong><p>' + escapeHtml(c.historical || '') + '</p></div>' +
            '<div class="card"><strong>Contexto literario</strong><p>' + escapeHtml(c.literary || '') + '</p></div>' +
            '<div class="card"><strong>Contexto canónico</strong><p>' + escapeHtml(c.canonical || '') + '</p></div>' +
            '<div class="card"><strong>Términos clave</strong><div class="context-chip-wrap">' + keywordHtml + '</div></div>' +
            '<div class="card"><strong>Significado de palabras clave</strong>' + keywordInsightHtml + '</div>' +
            '<div class="card"><strong>Preguntas de estudio</strong>' + questionsHtml + '</div>' +
            '<div class="card"><strong>Pistas de observación</strong>' + tipsHtml + '</div>';
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
            '<div id="noteEditBox" class="card note-editor hidden">' +
            '<div class="note-editor-head">' +
            '<strong>Editar nota</strong>' +
            '<small class="muted">Actualiza el contenido y las etiquetas.</small>' +
            '</div>' +
            '<form id="noteEditForm" class="stack">' +
            '<input id="noteEditId" type="hidden">' +
            '<textarea id="noteEditContent" rows="4" placeholder="Edita tu nota del pasaje"></textarea>' +
            '<input id="noteEditTags" type="text" placeholder="Etiquetas separadas por coma">' +
            '<div class="toolbar note-editor-actions">' +
            '<button class="btn-primary" type="submit">Guardar cambios</button>' +
            '<button class="btn-light" id="noteEditCancel" type="button">Cancelar</button>' +
            '</div>' +
            '</form>' +
            '</div>' +
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

        var noteEditForm = document.getElementById('noteEditForm');
        if (noteEditForm) {
            noteEditForm.addEventListener('submit', function (event) {
                event.preventDefault();
                submitEditedNote();
            });
        }

        var noteEditCancel = document.getElementById('noteEditCancel');
        if (noteEditCancel) {
            noteEditCancel.addEventListener('click', closeNoteEditor);
        }

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
        var selectedBg = state.selectedBackground || backgrounds[0] || 'assets/backgrounds/bg-01.svg';
        state.selectedBackground = selectedBg;
        var bgThumbs = backgrounds.map(function (item) {
            var active = item === selectedBg ? ' is-active' : '';
            return '<button class="bg-thumb js-bg-thumb' + active + '" type="button" data-bg="' + escapeHtml(item) + '" title="Elegir fondo">' +
                '<img src="' + escapeHtml(item) + '" alt="Fondo">' +
                '</button>';
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
            '<div class="card">' +
            '<strong>Subrayado</strong>' +
            '<small class="muted">Aplica color al rango seleccionado.</small>' +
            '<div class="highlight-palette">' +
            '<button class="highlight-dot hl-yellow js-highlight-set" type="button" data-color="yellow" title="Subrayar amarillo" aria-label="Subrayar amarillo"></button>' +
            '<button class="highlight-dot hl-green js-highlight-set" type="button" data-color="green" title="Subrayar verde" aria-label="Subrayar verde"></button>' +
            '<button class="highlight-dot hl-blue js-highlight-set" type="button" data-color="blue" title="Subrayar azul" aria-label="Subrayar azul"></button>' +
            '<button class="highlight-dot hl-pink js-highlight-set" type="button" data-color="pink" title="Subrayar rosa" aria-label="Subrayar rosa"></button>' +
            '<button class="highlight-dot hl-orange js-highlight-set" type="button" data-color="orange" title="Subrayar naranja" aria-label="Subrayar naranja"></button>' +
            '<button class="btn-light js-highlight-clear" type="button">Quitar</button>' +
            '</div>' +
            '</div>' +
            '<div class="card">' +
            '<strong>Generar contenido</strong>' +
            '<div class="tool-icon-row">' +
            '<button class="icon-tool js-generate" data-mode="explicacion" title="Generar explicación" aria-label="Generar explicación" ' + (offline ? 'disabled' : '') + '><img src="assets/icons/help.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-generate" data-mode="palabras_clave" title="Palabras clave" aria-label="Palabras clave" ' + (offline ? 'disabled' : '') + '><img src="assets/icons/text.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-generate" data-mode="bosquejo" title="Bosquejo" aria-label="Bosquejo" ' + (offline ? 'disabled' : '') + '><img src="assets/icons/list.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-generate" data-mode="aplicacion_practica" title="Aplicación práctica" aria-label="Aplicación práctica" ' + (offline ? 'disabled' : '') + '><img src="assets/icons/share.svg" alt="" class="ico"></button>' +
            '</div>' +
            '<div id="toolsOutput" class="card tool-output"><p class="muted">Selecciona un ícono para generar contenido del pasaje.</p></div>' +
            '</div>' +
            '<div class="card"><strong>Historial reciente</strong><div class="stack">' + (historyHtml || '<span class="muted">Sin historial.</span>') + '</div></div>' +
            '<details class="card image-tool-box">' +
            '<summary>Crear imagen del versículo</summary>' +
            '<div class="image-bg-carousel">' + (bgThumbs || '<button class="bg-thumb is-active" type="button"><img src="assets/backgrounds/bg-01.svg" alt="Fondo"></button>') + '</div>' +
            '<div class="image-bg-active-wrap"><img id="imageBgActive" class="image-bg-active" src="' + escapeHtml(selectedBg) + '" alt="Fondo seleccionado"></div>' +
            '<select id="imageCardMode">' +
            '<option value="dark"' + (imageCardMode === 'dark' ? ' selected' : '') + '>Modo oscuro</option>' +
            '<option value="light"' + (imageCardMode === 'light' ? ' selected' : '') + '>Modo claro</option>' +
            '</select>' +
            '<div class="tool-icon-row image-action-row">' +
            '<button class="icon-tool js-image-create" type="button" title="Crear imagen" aria-label="Crear imagen"><img src="assets/icons/camera.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-image-download" type="button" title="Descargar PNG" aria-label="Descargar PNG"><img src="assets/icons/download.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-image-share" type="button" title="Compartir imagen" aria-label="Compartir imagen"><img src="assets/icons/share.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-image-copy" type="button" title="Copiar imagen" aria-label="Copiar imagen"><img src="assets/icons/copy.svg" alt="" class="ico"></button>' +
            '</div>' +
            '<img id="imageCardPreview" class="image-card-preview hidden" alt="Vista previa de versículo">' +
            '</details>' +
            '</div>';

        els.toolsPanel.querySelectorAll('.js-open-history').forEach(function (btn) {
            btn.addEventListener('click', function () {
                fetchChapter(Number(this.getAttribute('data-book')), Number(this.getAttribute('data-chapter')));
            });
        });

        var activeBgPreview = document.getElementById('imageBgActive');
        els.toolsPanel.querySelectorAll('.js-bg-thumb').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var bg = this.getAttribute('data-bg');
                if (!bg) {
                    return;
                }
                state.selectedBackground = bg;
                els.toolsPanel.querySelectorAll('.js-bg-thumb').forEach(function (item) {
                    item.classList.toggle('is-active', item === btn);
                });
                if (activeBgPreview) {
                    activeBgPreview.src = bg;
                }
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

        els.toolsPanel.querySelectorAll('.js-highlight-set').forEach(function (btn) {
            btn.addEventListener('click', function () {
                applyHighlight(this.getAttribute('data-color'));
            });
        });

        var clearHighlightBtn = els.toolsPanel.querySelector('.js-highlight-clear');
        if (clearHighlightBtn) {
            clearHighlightBtn.addEventListener('click', function () {
                applyHighlight('');
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
        var box = document.getElementById('noteEditBox');
        var idInput = document.getElementById('noteEditId');
        var contentInput = document.getElementById('noteEditContent');
        var tagsInput = document.getElementById('noteEditTags');
        if (!box || !idInput || !contentInput || !tagsInput) {
            return;
        }

        idInput.value = String(id || '');
        contentInput.value = currentContent || '';
        tagsInput.value = currentTags || '';
        box.classList.remove('hidden');
        contentInput.focus();
        box.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function closeNoteEditor() {
        var box = document.getElementById('noteEditBox');
        var idInput = document.getElementById('noteEditId');
        var contentInput = document.getElementById('noteEditContent');
        var tagsInput = document.getElementById('noteEditTags');
        if (idInput) {
            idInput.value = '';
        }
        if (contentInput) {
            contentInput.value = '';
        }
        if (tagsInput) {
            tagsInput.value = '';
        }
        if (box) {
            box.classList.add('hidden');
        }
    }

    function submitEditedNote() {
        var id = Number((document.getElementById('noteEditId') || {}).value || 0);
        var content = ((document.getElementById('noteEditContent') || {}).value || '').trim();
        var tags = ((document.getElementById('noteEditTags') || {}).value || '').trim();

        if (!id || !content) {
            notify('Completa la nota antes de guardar.');
            return;
        }

        postForm('api.note.update', {
            id: id,
            content: content,
            tags: tags
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            notify('Nota actualizada.');
            closeNoteEditor();
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

    function restoreReaderState() {
        var params = new URLSearchParams(window.location.search);
        var hasExplicitLocation = params.has('book') || params.has('chapter') || params.has('verse');
        if (hasExplicitLocation) {
            state.activeTab = 'contexto';
            return;
        }

        var saved = readStoredReaderState();
        if (!saved) {
            return;
        }

        state.activeTab = saved.active_tab || 'contexto';
        state.pendingSelectionVerses = Array.isArray(saved.selected_verses) ? saved.selected_verses : [];

        var savedBook = Number(saved.book || 0);
        var savedChapter = Number(saved.chapter || 0);
        if (savedBook < 1 || savedChapter < 1) {
            return;
        }

        if (savedBook === Number(state.currentBook) && savedChapter === Number(state.currentChapter)) {
            return;
        }

        state.currentBook = savedBook;
        state.currentChapter = savedChapter;
        state.chapters = [];
        state.verses = [];
        state.needsChapterRefresh = true;
    }

    function applyPendingSelection() {
        var pending = Array.isArray(state.pendingSelectionVerses) ? state.pendingSelectionVerses.slice() : [];
        if (!pending.length && Number(state.pendingVerse || 0) > 0) {
            pending.push(Number(state.pendingVerse));
            state.pendingVerse = null;
        }
        state.pendingSelectionVerses = [];
        if (!pending.length) {
            return;
        }

        var verseMap = {};
        state.verses.forEach(function (row) {
            verseMap[Number(row.verse)] = true;
        });

        var unique = {};
        var restored = [];
        pending.forEach(function (verse) {
            var num = Number(verse);
            if (!verseMap[num] || unique[num]) {
                return;
            }
            unique[num] = true;
            restored.push(num);
        });

        if (!restored.length) {
            return;
        }

        restored.sort(function (a, b) { return a - b; });
        state.selectedVerses = restored;
        state.lastSelectedVerse = restored[restored.length - 1];
        updateSelectionUI();
        onSelectionChange();
    }

    function persistReaderState() {
        var payload = {
            book: Number(state.currentBook || 1),
            chapter: Number(state.currentChapter || 1),
            selected_verses: state.selectedVerses.slice(),
            active_tab: state.activeTab || 'contexto',
            updated_at: Date.now()
        };
        try {
            localStorage.setItem('biblia_reader_state', JSON.stringify(payload));
        } catch (err) {
            // ignore storage errors
        }
    }

    function readStoredReaderState() {
        try {
            var raw = localStorage.getItem('biblia_reader_state');
            if (!raw) {
                return null;
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return null;
            }
            return parsed;
        } catch (err) {
            return null;
        }
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
                state.highlights = normalizeHighlights(data.highlights || {});
                renderBooks(state.books);
                renderChapters();
                renderVerses();
                if (state.pendingSelectionVerses && state.pendingSelectionVerses.length) {
                    applyPendingSelection();
                } else if (state.pendingVerse) {
                    toggleVerse(state.pendingVerse);
                    state.lastSelectedVerse = state.pendingVerse;
                    state.pendingVerse = null;
                }
                els.title.textContent = data.book_name + ' ' + data.chapter;
                history.replaceState(null, '', '?route=reader&book=' + state.currentBook + '&chapter=' + state.currentChapter);
                persistReaderState();
                if (!refreshReadingPlanIfDateChanged()) {
                    maybeAutoCompleteCurrentPlanChapter();
                    renderReadingPlanCard();
                }
                closeDrawers();
            })
            .catch(function () {
                notify('No se pudo cargar el capítulo.');
            });
    }

    function fetchReadingPlanStatus() {
        if (!els.readerPlanCard) {
            return;
        }
        state.planDate = localDateYmd(new Date());
        els.readerPlanCard.innerHTML = '<p class="muted">Cargando plan de lectura...</p>';

        fetch('?route=api.plan.status&date=' + encodeURIComponent(state.planDate))
            .then(asJson)
            .then(function (res) {
                if (res.error) {
                    els.readerPlanCard.innerHTML = '<p class="muted">No se pudo cargar el plan de lectura.</p>';
                    return;
                }
                state.readingPlan = res.plan || {};
                if (!state.planCalendarMonth) {
                    state.planCalendarMonth = monthStartIsoFromDate(state.readingPlan.today || state.planDate);
                }
                renderReadingPlanCard();
                maybeAutoCompleteCurrentPlanChapter();
            })
            .catch(function () {
                els.readerPlanCard.innerHTML = '<p class="muted">No se pudo cargar el plan de lectura.</p>';
            });
    }

    function refreshReadingPlanIfDateChanged() {
        if (!state.planDate) {
            return false;
        }
        var today = localDateYmd(new Date());
        if (state.planDate !== today) {
            fetchReadingPlanStatus();
            return true;
        }
        return false;
    }

    function renderReadingPlanCard() {
        if (!els.readerPlanCard) {
            return;
        }
        if (!state.readingPlan || typeof state.readingPlan !== 'object') {
            els.readerPlanCard.innerHTML = '<p class="muted">Sin plan de lectura activo.</p>';
            return;
        }

        var rootPlan = state.readingPlan;
        var catalog = Array.isArray(rootPlan.catalog) ? rootPlan.catalog : [];

        if (!rootPlan.active) {
            var options = catalog.map(function (item) {
                var days = Number(item.days || 0);
                return '<option value="' + days + '">' + escapeHtml(item.name || (days + ' días')) + '</option>';
            }).join('');
            var inactiveGoal = clampGoalDays(rootPlan.weekly_goal_days || state.settings.weeklyGoalDays || 5);
            els.readerPlanCard.innerHTML = '' +
                '<div class="reading-plan-head">' +
                '<h3><img src="assets/icons/list.svg" alt="" class="ico"> Plan de lectura</h3>' +
                '<small class="muted">Aún no hay un plan activo.</small>' +
                '</div>' +
                '<div class="reading-plan-controls">' +
                '<select id="readerPlanDays">' + options + '</select>' +
                '<button class="btn-primary" id="readerPlanStartBtn" type="button">Iniciar plan</button>' +
                '</div>' +
                '<small class="muted">Meta semanal actual: ' + inactiveGoal + ' día(s) completos.</small>';

            var startBtn = document.getElementById('readerPlanStartBtn');
            if (startBtn) {
                startBtn.addEventListener('click', function () {
                    var days = Number((document.getElementById('readerPlanDays').value || '0'));
                    startReadingPlanFromReader(days);
                });
            }
            return;
        }

        var plan = rootPlan.plan || {};
        var assignment = plan.today_assignment || {};
        var chapters = Array.isArray(assignment.chapters) ? assignment.chapters : [];
        var startLabel = String(assignment.start_label || '');
        var endLabel = String(assignment.end_label || '');
        var rangeLabel = startLabel && endLabel && startLabel !== endLabel
            ? (startLabel + ' - ' + endLabel)
            : (startLabel || endLabel || '');
        if (!rangeLabel && chapters.length) {
            var firstLabel = chapterLabelFromRow(chapters[0]);
            var lastLabel = chapterLabelFromRow(chapters[chapters.length - 1]);
            rangeLabel = firstLabel && lastLabel && firstLabel !== lastLabel ? (firstLabel + ' - ' + lastLabel) : (firstLabel || lastLabel);
        }
        if (!rangeLabel) {
            rangeLabel = 'Sin lectura asignada';
        }

        var firstChapter = chapters.length ? chapters[0] : null;
        var totalDays = Number(plan.total_days || 0);
        var completedDays = Number(plan.completed_days || 0);
        var progress = Number(plan.progress_percent || 0);
        var todayCompletedCount = Number(plan.today_completed_count || 0);
        var todayTotalCount = Number(plan.today_total_count || Number(assignment.count || 0));
        var done = plan.today_done === true;
        var weekly = (plan.weekly && typeof plan.weekly === 'object') ? plan.weekly : {};
        var weeklyGoal = clampGoalDays(weekly.goal_days || rootPlan.weekly_goal_days || state.settings.weeklyGoalDays || 5);
        var weeklyCompletedDays = Number(weekly.completed_days || 0);
        var weeklyProgress = Number(weekly.progress_percent || 0);
        var weeklyGoalMet = weekly.goal_met === true;
        var currentStreak = Number(plan.current_streak || rootPlan.current_streak || rootPlan.streak_current || 0);
        var longestStreak = Number(plan.longest_streak || rootPlan.longest_streak || currentStreak || 0);
        var pendingOldest = (plan.pending_oldest && typeof plan.pending_oldest === 'object') ? plan.pending_oldest : null;
        var pendingRangeLabel = pendingOldest
            ? buildAssignmentRangeLabel(String(pendingOldest.start_label || ''), String(pendingOldest.end_label || ''))
            : '';
        var pendingBook = pendingOldest && pendingOldest.first_chapter ? Number(pendingOldest.first_chapter.book || 0) : 0;
        var pendingChapter = pendingOldest && pendingOldest.first_chapter ? Number(pendingOldest.first_chapter.chapter || 0) : 0;
        var weeklyDaysHtml = buildWeeklyDaysHtml(weekly.days || []);
        var todayIso = String(rootPlan.today || localDateYmd(new Date()));
        if (!state.planCalendarMonth) {
            state.planCalendarMonth = monthStartIsoFromDate(todayIso);
        }
        var monthCalendar = buildPlanMonthCalendar(plan, todayIso, state.planCalendarMonth);
        var isCurrentAssignment = isCurrentChapterAssigned(chapters);
        var toggleLabel = done ? 'Marcar como pendiente' : 'Marcar hoy como leído';
        var toggleClass = done ? 'btn-light' : 'btn-primary';
        var progressSafe = Math.max(0, Math.min(100, progress));
        var weeklyProgressSafe = Math.max(0, Math.min(100, weeklyProgress));
        var chapterRowsHtml = chapters.map(function (row) {
            var book = Number(row.book || 0);
            var chapter = Number(row.chapter || 0);
            var completed = row.completed === true || Number(row.completed) === 1;
            var label = String(row.label || chapterLabelFromRow(row));
            var isCurrent = book === Number(state.currentBook) && chapter === Number(state.currentChapter);
            return '' +
                '<div class="reading-plan-chapter-row' + (isCurrent ? ' is-current' : '') + '">' +
                '<button class="btn-light js-plan-open-chapter" type="button" data-book="' + book + '" data-chapter="' + chapter + '">' +
                escapeHtml(label) +
                '</button>' +
                '<button class="btn-light js-plan-toggle-chapter' + (completed ? ' is-done' : '') + '" type="button" data-book="' + book + '" data-chapter="' + chapter + '" data-completed="' + (completed ? '1' : '0') + '">' +
                (completed ? 'Leído' : 'Marcar') +
                '</button>' +
                '</div>';
        }).join('');
        if (!chapterRowsHtml) {
            chapterRowsHtml = '<p class="muted">Sin capítulos asignados hoy.</p>';
        }
        var pendingHtml = '';
        if (pendingOldest && pendingBook > 0 && pendingChapter > 0) {
            pendingHtml = '' +
                '<div class="card reading-plan-pending">' +
                '<strong>Día pendiente por recuperar</strong>' +
                '<p>' + escapeHtml(pendingRangeLabel || 'Lectura pendiente') + '</p>' +
                '<small class="muted">Día ' + Number(pendingOldest.day_index || 0) + ' · ' + escapeHtml(String(pendingOldest.date || '')) + ' · Progreso: ' + Number(pendingOldest.completed_count || 0) + '/' + Number(pendingOldest.total_count || 0) + '</small>' +
                '<div class="toolbar">' +
                '<button class="btn-primary" id="readerPlanRecoverBtn" type="button" data-book="' + pendingBook + '" data-chapter="' + pendingChapter + '">' +
                '<img src="assets/icons/book.svg" alt="" class="ico"> Recuperar día pendiente' +
                '</button>' +
                '</div>' +
                '</div>';
        }

        els.readerPlanCard.innerHTML = '' +
            '<div class="reading-plan-head">' +
            '<h3><img src="assets/icons/list.svg" alt="" class="ico"> Plan de lectura</h3>' +
            '<small class="muted">' + (isCurrentAssignment ? 'Esta lectura corresponde al plan de hoy.' : 'Puedes abrir la lectura asignada de hoy.') + '</small>' +
            '</div>' +
            '<div class="reading-plan-controls">' +
            '<label for="readerPlanDays" class="muted">Plan actual:</label>' +
            '<select id="readerPlanDays">' + catalog.map(function (item) {
                var days = Number(item.days || 0);
                var selected = days === totalDays ? ' selected' : '';
                return '<option value="' + days + '"' + selected + '>' + escapeHtml(item.name || (days + ' días')) + '</option>';
            }).join('') + '</select>' +
            '<button class="btn-light" id="readerPlanRestartBtn" type="button">Reiniciar</button>' +
            '</div>' +
            '<div class="card">' +
            '<strong>Día ' + Number(plan.today_index || 1) + ' de ' + totalDays + '</strong>' +
            '<p>' + escapeHtml(rangeLabel) + '</p>' +
            '<small class="muted">Capítulos del día: ' + todayCompletedCount + '/' + todayTotalCount + ' · Progreso global: ' + completedDays + '/' + totalDays + ' (' + progressSafe + '%)</small>' +
            '</div>' +
            '<div class="reading-plan-progress"><div class="reading-plan-progress-bar" style="width:' + progressSafe + '%"></div></div>' +
            '<div class="card reading-plan-weekly">' +
            '<div class="reading-plan-weekly-head">' +
            '<strong>Racha actual: ' + currentStreak + ' día(s)</strong>' +
            '<small class="muted">Meta semanal: ' + weeklyCompletedDays + '/' + weeklyGoal + ' día(s)</small>' +
            '</div>' +
            '<div class="reading-plan-progress"><div class="reading-plan-progress-bar" style="width:' + weeklyProgressSafe + '%"></div></div>' +
            '<div class="reading-plan-weekly-days">' + weeklyDaysHtml + '</div>' +
            '<small class="muted">' + (weeklyGoalMet ? 'Meta semanal cumplida.' : 'Sigue avanzando para cumplir la meta semanal.') + '</small>' +
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
            pendingHtml +
            '<div class="reading-plan-chapter-list">' + chapterRowsHtml + '</div>' +
            '<div class="toolbar">' +
            '<button class="' + toggleClass + '" id="readerPlanToggleBtn" type="button">' + toggleLabel + '</button>' +
            '<button class="btn-light" id="readerPlanOpenBtn" type="button" ' + (firstChapter ? '' : 'disabled') + '><img src="assets/icons/book.svg" alt="" class="ico"> Abrir lectura de hoy</button>' +
            '</div>';

        var restartBtn = document.getElementById('readerPlanRestartBtn');
        if (restartBtn) {
            restartBtn.addEventListener('click', function () {
                var days = Number((document.getElementById('readerPlanDays').value || '0'));
                startReadingPlanFromReader(days);
            });
        }

        var toggleBtn = document.getElementById('readerPlanToggleBtn');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                toggleReadingPlanTodayFromReader(!done);
            });
        }

        els.readerPlanCard.querySelectorAll('.js-plan-calendar-nav').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var shift = Number(this.getAttribute('data-shift') || '0');
                if (!shift) {
                    return;
                }
                state.planCalendarMonth = shiftMonthIso(state.planCalendarMonth, shift);
                renderReadingPlanCard();
            });
        });

        var recoverBtn = document.getElementById('readerPlanRecoverBtn');
        if (recoverBtn) {
            recoverBtn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || '0');
                var chapter = Number(this.getAttribute('data-chapter') || '0');
                if (!book || !chapter) {
                    return;
                }
                closePlan();
                fetchChapter(book, chapter);
            });
        }

        els.readerPlanCard.querySelectorAll('.js-plan-open-chapter').forEach(function (btn) {
            btn.addEventListener('click', function () {
                closePlan();
                fetchChapter(Number(this.getAttribute('data-book') || '0'), Number(this.getAttribute('data-chapter') || '0'));
            });
        });

        els.readerPlanCard.querySelectorAll('.js-plan-toggle-chapter').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || '0');
                var chapter = Number(this.getAttribute('data-chapter') || '0');
                var isDone = Number(this.getAttribute('data-completed') || '0') === 1;
                setPlanChapterCompletion(book, chapter, !isDone, false);
            });
        });

        var openBtn = document.getElementById('readerPlanOpenBtn');
        if (openBtn && firstChapter) {
            openBtn.addEventListener('click', function () {
                closePlan();
                fetchChapter(Number(firstChapter.book || 0), Number(firstChapter.chapter || 0));
            });
        }
    }

    function startReadingPlanFromReader(days) {
        if (!days) {
            notify('Selecciona un plan.');
            return;
        }
        postForm('api.plan.start', {
            days: days,
            date: localDateYmd(new Date())
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            state.planDate = localDateYmd(new Date());
            state.planCalendarMonth = monthStartIsoFromDate(state.planDate);
            state.readingPlan = res.plan || {};
            renderReadingPlanCard();
            notify('Plan de lectura actualizado.');
        }).catch(function () {
            notify('No se pudo iniciar el plan.');
        });
    }

    function setPlanChapterCompletion(book, chapter, completed, silent) {
        if (!book || !chapter) {
            return;
        }
        postForm('api.plan.chapter', {
            book: book,
            chapter: chapter,
            completed: completed ? 1 : 0,
            date: localDateYmd(new Date())
        }).then(function (res) {
            if (res.error) {
                if (!silent) {
                    notify(res.error);
                }
                return;
            }
            state.planDate = localDateYmd(new Date());
            state.readingPlan = res.plan || {};
            renderReadingPlanCard();
            if (!silent) {
                notify(completed ? 'Capítulo marcado como leído.' : 'Capítulo marcado como pendiente.');
            }
        }).catch(function () {
            if (!silent) {
                notify('No se pudo actualizar el capítulo del plan.');
            }
        });
    }

    function maybeAutoCompleteCurrentPlanChapter() {
        if (!state.readingPlan || !state.readingPlan.active) {
            return;
        }
        var plan = state.readingPlan.plan || {};
        var assignment = plan.today_assignment || {};
        var chapters = Array.isArray(assignment.chapters) ? assignment.chapters : [];
        if (!chapters.length) {
            return;
        }
        var currentKey = chapterKey(state.currentBook, state.currentChapter);
        var target = null;
        for (var i = 0; i < chapters.length; i++) {
            var row = chapters[i] || {};
            if (chapterKey(Number(row.book || 0), Number(row.chapter || 0)) === currentKey) {
                target = row;
                break;
            }
        }
        if (!target) {
            return;
        }
        if (target.completed === true || Number(target.completed || 0) === 1) {
            return;
        }
        setPlanChapterCompletion(state.currentBook, state.currentChapter, true, true);
    }

    function toggleReadingPlanTodayFromReader(completed) {
        postForm('api.plan.today', {
            completed: completed ? 1 : 0,
            date: localDateYmd(new Date())
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            state.planDate = localDateYmd(new Date());
            state.readingPlan = res.plan || {};
            renderReadingPlanCard();
            notify(completed ? 'Día marcado como leído.' : 'Día marcado como pendiente.');
        }).catch(function () {
            notify('No se pudo actualizar el progreso del plan.');
        });
    }

    function isCurrentChapterAssigned(chapters) {
        if (!Array.isArray(chapters) || !chapters.length) {
            return false;
        }
        for (var i = 0; i < chapters.length; i++) {
            if (Number(chapters[i].book || 0) === Number(state.currentBook) &&
                Number(chapters[i].chapter || 0) === Number(state.currentChapter)) {
                return true;
            }
        }
        return false;
    }

    function chapterLabelFromRow(row) {
        var bookId = Number((row && row.book) || 0);
        var chapter = Number((row && row.chapter) || 0);
        if (!bookId || !chapter) {
            return '';
        }
        var bookRow = state.books.find(function (item) {
            return Number(item.id) === bookId;
        });
        var name = bookRow ? String(bookRow.name || '') : ('Libro ' + bookId);
        return name + ' ' + chapter;
    }

    function chapterKey(book, chapter) {
        return String(Number(book || 0)) + ':' + String(Number(chapter || 0));
    }

    function buildAssignmentRangeLabel(startLabel, endLabel) {
        var start = String(startLabel || '').trim();
        var end = String(endLabel || '').trim();
        if (start && end && start !== end) {
            return start + ' - ' + end;
        }
        return start || end || '';
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
        var today = String(todayIso || localDateYmd(new Date()));
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
            var isPastOrToday = dateIso <= today;
            var isPending = hasAssignment && !isCompleted && isPastOrToday;
            var isFutureAssigned = hasAssignment && !isPastOrToday;
            var isToday = dateIso === today;

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
            var now = parseYmdToParts(localDateYmd(new Date()));
            if (!now) {
                return '1970-01-01';
            }
            return isoFromParts(now.year, now.month, 1);
        }
        return isoFromParts(parts.year, parts.month, 1);
    }

    function shiftMonthIso(monthIso, shift) {
        var parts = parseYmdToParts(monthIso);
        if (!parts) {
            parts = parseYmdToParts(localDateYmd(new Date()));
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

    function applyHighlight(color) {
        if (!state.selectedVerses.length) {
            notify('Selecciona al menos un versículo.');
            return;
        }
        var range = selectedRange();
        postForm('api.highlight.set', {
            book: state.currentBook,
            chapter: state.currentChapter,
            verse_start: range.start,
            verse_end: range.end,
            color: color || ''
        }).then(function (res) {
            if (res.error) {
                notify(res.error);
                return;
            }
            state.highlights = normalizeHighlights(res.highlights || {});
            updateHighlightUI();
            notify(color ? 'Subrayado aplicado.' : 'Subrayado eliminado.');
        }).catch(function () {
            notify('No se pudo guardar el subrayado.');
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
        state.activeTab = tabName || 'contexto';
        document.querySelectorAll('.tab').forEach(function (tab) {
            tab.classList.toggle('is-active', tab.getAttribute('data-tab') === state.activeTab);
        });
        document.querySelectorAll('.tab-panel').forEach(function (panel) {
            panel.classList.toggle('is-active', panel.getAttribute('data-panel') === state.activeTab);
        });
        persistReaderState();
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

    function openPlan() {
        els.overlay.classList.remove('hidden');
        if (els.planModal) {
            els.planModal.classList.remove('hidden');
        }
        if (refreshReadingPlanIfDateChanged()) {
            return;
        }
        if (!state.readingPlan || typeof state.readingPlan !== 'object' || !state.planDate) {
            fetchReadingPlanStatus();
            return;
        }
        renderReadingPlanCard();
    }

    function closeSearch() {
        if (!els.searchModal || els.searchModal.classList.contains('hidden')) {
            return;
        }
        els.searchModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') && (!els.planModal || els.planModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closePlan() {
        if (!els.planModal || els.planModal.classList.contains('hidden')) {
            return;
        }
        els.planModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') && els.searchModal.classList.contains('hidden')) {
            els.overlay.classList.add('hidden');
        }
    }

    function runQuickSearch() {
        var q = (document.getElementById('qText').value || '').trim();
        if (!q) {
            notify('Escribe un texto de búsqueda.');
            return;
        }
        var book = (document.getElementById('qBook').value || '').trim();
        var chapterFrom = (document.getElementById('qChapterFrom').value || '').trim();
        var chapterTo = (document.getElementById('qChapterTo').value || '').trim();
        if (chapterFrom && chapterTo && Number(chapterFrom) > Number(chapterTo)) {
            notify('El capítulo inicial no puede ser mayor al capítulo final.');
            return;
        }

        var params = new URLSearchParams({
            route: 'api.search',
            q: q,
            mode: document.getElementById('qMode').value || 'any',
            limit: '80'
        });
        if (book) {
            params.set('book', book);
        }
        if (chapterFrom) {
            params.set('chapter_from', chapterFrom);
        }
        if (chapterTo) {
            params.set('chapter_to', chapterTo);
        }

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
        bindSetting('optWeeklyGoalDays', 'weeklyGoalDays');
        bindSetting('optReminderEnabled', 'reminderEnabled', 'checkbox');
        bindSetting('optReminderTime', 'reminderTime');
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
            if (key === 'weeklyGoalDays') {
                state.settings.weeklyGoalDays = clampGoalDays(state.settings.weeklyGoalDays);
                input.value = String(state.settings.weeklyGoalDays);
            }
            if (key === 'reminderEnabled' && state.settings.reminderEnabled) {
                requestReminderPermission();
            }
            if (key === 'reminderTime') {
                state.settings.reminderTime = normalizeReminderTime(state.settings.reminderTime);
                input.value = state.settings.reminderTime;
            }
            if (key === 'showDaily') {
                localStorage.setItem('show_daily_start', state.settings.showDaily ? '1' : '0');
            }
            saveSettings();
            applySettings();
            if (key === 'weeklyGoalDays') {
                fetchReadingPlanStatus();
            }
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
        var reminderTimeInput = document.getElementById('optReminderTime');
        if (reminderTimeInput) {
            reminderTimeInput.disabled = !state.settings.reminderEnabled;
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
            state.settings.weeklyGoalDays = clampGoalDays(state.settings.weeklyGoalDays);
            state.settings.reminderEnabled = state.settings.reminderEnabled === true || Number(state.settings.reminderEnabled) === 1;
            state.settings.reminderTime = normalizeReminderTime(state.settings.reminderTime || '07:00');
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
        if (els.planModal && !els.planModal.classList.contains('hidden')) {
            els.planModal.classList.add('hidden');
        }
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden'))) {
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
        var background = state.selectedBackground || 'assets/backgrounds/bg-01.svg';
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

    function localDateYmd(date) {
        var value = date instanceof Date ? date : new Date();
        var year = value.getFullYear();
        var month = value.getMonth() + 1;
        var day = value.getDate();
        return year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
    }

    function maybeRedirectToDailyAtStartup() {
        var params = new URLSearchParams(window.location.search);
        if (params.get('skip_daily') === '1') {
            return;
        }
        if (Number(state.initial.open_search || 0) === 1) {
            return;
        }
        if (params.get('open_search') === '1') {
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

    function maybeOpenSearchAtStartup() {
        var shouldOpen = Number(state.initial.open_search || 0) === 1;
        var params = new URLSearchParams(window.location.search);
        if (params.get('open_search') === '1') {
            shouldOpen = true;
            params.delete('open_search');
            var cleanUrl = '?' + params.toString();
            history.replaceState(null, '', cleanUrl === '?' ? '?route=reader' : cleanUrl);
        }
        if (shouldOpen) {
            openSearch();
        }
    }

    function syncUserPrefs() {
        postForm('api.prefs.save', {
            font_scale: state.settings.fontScale,
            show_daily: state.settings.showDaily ? 1 : 0,
            auto_devotional: state.settings.autoDevotional ? 1 : 0,
            weekly_goal_days: clampGoalDays(state.settings.weeklyGoalDays),
            reminder_enabled: state.settings.reminderEnabled ? 1 : 0,
            reminder_time: normalizeReminderTime(state.settings.reminderTime || '07:00'),
            theme: state.settings.theme
        }).then(function (res) {
            if (!res || !res.prefs) {
                return;
            }
            state.settings.weeklyGoalDays = clampGoalDays(res.prefs.weekly_goal_days || state.settings.weeklyGoalDays);
            var weeklyGoalInput = document.getElementById('optWeeklyGoalDays');
            if (weeklyGoalInput) {
                weeklyGoalInput.value = String(state.settings.weeklyGoalDays);
            }
        }).catch(function () {
            // ignore
        });
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

    function normalizeReminderTime(value) {
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
        return (hour < 10 ? '0' : '') + hour + ':' + (minute < 10 ? '0' : '') + minute;
    }

    function requestReminderPermission() {
        if (!('Notification' in window)) {
            return;
        }
        if (Notification.permission !== 'default') {
            return;
        }
        Notification.requestPermission().catch(function () {
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
