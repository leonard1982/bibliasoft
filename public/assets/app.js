(function () {
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
        settings: {
            showHelp: true,
            layoutMode: 'columns',
            fontSize: 'md',
            spacing: 'normal',
            theme: 'light'
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
        toggleHelp: document.getElementById('toggleHelp'),
        overlay: document.getElementById('mobileOverlay'),
        notice: document.getElementById('readingNotice'),
        settingsModal: document.getElementById('settingsModal'),
        openSettings: document.getElementById('openSettings'),
        closeSettings: document.getElementById('closeSettings'),
        copySelection: document.getElementById('copySelection'),
        copyParagraph: document.getElementById('copyParagraph'),
        shareSelection: document.getElementById('shareSelection')
    };

    function init() {
        state.books = state.initial.books || [];
        state.currentBook = parseInt(state.initial.book || 1, 10);
        state.currentChapter = parseInt(state.initial.chapter || 1, 10);
        state.chapters = state.initial.chapters || [];
        state.verses = state.initial.verses || [];

        loadSettings();
        applySettings();
        renderBooks(state.books);
        renderChapters();
        renderVerses();
        wireEvents();
        activateTab('contexto');
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
        updateSelectionUI();
        updateContextPanel();

        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            node.addEventListener('click', function () {
                var verse = Number(this.getAttribute('data-verse'));
                if (!verse) {
                    return;
                }
                toggleVerse(verse);
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
        updateContextPanel();
    }

    function updateSelectionUI() {
        var selectedMap = {};
        state.selectedVerses.forEach(function (v) { selectedMap[v] = true; });
        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            var verse = Number(node.getAttribute('data-verse'));
            node.classList.toggle('is-selected', Boolean(selectedMap[verse]));
        });
    }

    function updateContextPanel() {
        var contextPanel = document.getElementById('contextPanel');
        var commentsPanel = document.getElementById('commentsPanel');
        var notesPanel = document.getElementById('notesPanel');
        var linksPanel = document.getElementById('linksPanel');
        var toolsPanel = document.getElementById('toolsPanel');

        if (!state.selectedVerses.length) {
            contextPanel.innerHTML = '<p class="muted">Selecciona versículos para ver contexto y herramientas.</p>';
            commentsPanel.innerHTML = '<p class="muted">Selecciona versículos para cargar comentarios.</p>';
            notesPanel.innerHTML = '<p class="muted">Selecciona versículos para gestionar tus notas.</p>';
            linksPanel.innerHTML = '<p class="muted">Selecciona versículos para crear vínculos.</p>';
            toolsPanel.innerHTML = '<div class="card"><p class="muted">Herramientas disponibles al seleccionar un pasaje.</p></div>';
            return;
        }

        var first = state.selectedVerses[0];
        var last = state.selectedVerses[state.selectedVerses.length - 1];
        var rangeLabel = buildReference(state.currentBook, state.currentChapter, first) +
            (first !== last ? ' - ' + buildReference(state.currentBook, state.currentChapter, last) : '');

        contextPanel.innerHTML =
            '<div class="card"><strong>Pasaje seleccionado</strong><p>' + escapeHtml(rangeLabel) + '</p></div>' +
            '<div class="card"><strong>Resumen del pasaje</strong><p class="muted">Disponible al abrir la pestaña Herramientas.</p></div>' +
            '<div class="card"><strong>Contexto histórico</strong><p class="muted">Disponible al abrir la pestaña Herramientas.</p></div>' +
            '<div class="card"><strong>Contexto literario</strong><p class="muted">Disponible al abrir la pestaña Herramientas.</p></div>';
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
                els.title.textContent = data.book_name + ' ' + data.chapter;
                history.replaceState(null, '', '?route=reader&book=' + state.currentBook + '&chapter=' + state.currentChapter);
                closeDrawers();
            })
            .catch(function () {
                notify('No se pudo cargar el capítulo.');
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

    function bindSettingsInputs() {
        bindSetting('optShowHelp', 'showHelp', 'checkbox');
        bindSetting('optLayoutMode', 'layoutMode');
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

        if (state.settings.showHelp) {
            els.helpPane.classList.remove('hidden');
        } else {
            els.helpPane.classList.add('hidden');
        }
    }

    function loadSettings() {
        try {
            var raw = localStorage.getItem('biblia_settings');
            if (!raw) {
                return;
            }
            var parsed = JSON.parse(raw);
            state.settings = Object.assign({}, state.settings, parsed || {});
        } catch (err) {
            // ignore
        }
    }

    function saveSettings() {
        localStorage.setItem('biblia_settings', JSON.stringify(state.settings));
    }

    function openHelpDrawer() {
        els.helpPane.classList.add('is-open');
        els.overlay.classList.remove('hidden');
    }

    function closeDrawers() {
        els.helpPane.classList.remove('is-open');
        els.booksPane.classList.remove('is-open');
        els.chaptersPane.classList.remove('is-open');
        if (els.settingsModal.classList.contains('hidden')) {
            els.overlay.classList.add('hidden');
        }
    }

    function buildReference(book, chapter, verse) {
        var bookRow = state.books.find(function (item) { return Number(item.id) === Number(book); });
        var bookName = bookRow ? bookRow.name : ('Libro ' + book);
        return bookName + ' ' + chapter + ':' + verse;
    }

    function notify(message) {
        els.notice.textContent = message;
        els.notice.classList.remove('hidden');
        setTimeout(function () {
            els.notice.classList.add('hidden');
        }, 2000);
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

    init();
})();
