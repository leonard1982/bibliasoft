(function () {
    applyGlobalPrefsFromStorage();
    document.querySelectorAll('[data-tip][title]').forEach(function (node) {
        node.removeAttribute('title');
    });

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
        highlightFilterColor: 'all',
        selectedBackground: '',
        activeTab: 'contexto',
        needsChapterRefresh: false,
        readingPlan: null,
        planDate: '',
        planCalendarMonth: '',
        favoriteFolderId: 0,
        favoriteFolders: [],
        favoriteItems: [],
        favoriteCurrent: null,
        favoriteLoaded: false,
        favoriteLoading: false,
        favoriteError: '',
        favoriteSnapshotToken: '',
        favoriteVerseCache: {},
        favoriteTooltipKey: '',
        studyProjects: [],
        studyProjectsLoadedAt: 0,
        studyProjectsPromise: null,
        studyDraftEntry: null,
        parallelLoading: false,
        parallelAvailable: false,
        parallelSameSource: false,
        parallelPrimaryLabel: 'RVR60',
        parallelCompareLabel: 'Versión 2',
        parallelMessage: '',
        parallelVerseMap: {},
        parallelColumns: [],
        versionsCatalog: [],
        versionPrimaryFile: '',
        versionCompareFile: '',
        versionCompareFiles: [],
        commentarySourceKey: '',
        strongCache: {},
        generatedByMode: {},
        latestDevotionalExport: null,
        cloudSyncStatus: null,
        statsPanel: null,
        statsLoading: false,
        statsLoaded: false,
        statsError: '',
        readingTracker: {
            lastTickMs: 0,
            unsentSeconds: 0,
            sending: false,
            intervalId: null
        },
        auth: {
            isLogged: false,
            username: '',
            gate: null
        },
        branding: {
            appName: 'Biblia para todos',
            churchName: '',
            logoPath: 'assets/branding/logo_bibliasoft.png'
        },
        audio: {
            supported: isAudioTtsSupported(),
            source: 'chapter',
            rate: 1,
            voiceUri: '',
            voices: [],
            speaking: false,
            paused: false,
            queue: [],
            queueIndex: 0,
            currentReference: ''
        },
        preach: {
            timerRunning: false,
            timerStartedAt: 0,
            timerElapsedMs: 0,
            timerTickId: null,
            markersByChapter: {}
        },
        preachBackup: null,
        settings: {
            showHelp: true,
            autoTourOnStart: true,
            layoutMode: 'columns',
            fontSize: 'md',
            spacing: 'normal',
            theme: 'light',
            fontScale: 100,
            showDaily: true,
            autoDevotional: false,
            weeklyGoalDays: 5,
            reminderEnabled: false,
            reminderTime: '07:00',
            preachMode: false,
            parallelMode: false,
            readerNavVisible: true
        },
        guide: {
            activeStep: 0,
            focusSelector: '',
            stepAnimTimer: 0
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
        toggleReaderSidebar: document.getElementById('toggleReaderSidebar'),
        openQuickSearch: document.getElementById('openQuickSearch'),
        openReadingPlan: document.getElementById('openReadingPlan'),
        openVersions: document.getElementById('openVersions'),
        openModules: document.getElementById('openModules'),
        openInterlinear: document.getElementById('openInterlinear'),
        openAudio: document.getElementById('openAudio'),
        openGuideTour: document.getElementById('openGuideTour'),
        toggleParallel: document.getElementById('toggleParallel'),
        toggleHelp: document.getElementById('toggleHelp'),
        togglePreachMode: document.getElementById('togglePreachMode'),
        overlay: document.getElementById('mobileOverlay'),
        readerAuthGateModal: document.getElementById('readerAuthGateModal'),
        readerAuthGateBody: document.getElementById('readerAuthGateBody'),
        closeReaderAuthGate: document.getElementById('closeReaderAuthGate'),
        guideSpotlight: document.getElementById('guideSpotlight'),
        notice: document.getElementById('readingNotice'),
        preachControls: document.getElementById('preachControls'),
        preachPrevChapter: document.getElementById('preachPrevChapter'),
        preachNextChapter: document.getElementById('preachNextChapter'),
        preachVerseJump: document.getElementById('preachVerseJump'),
        preachGoVerse: document.getElementById('preachGoVerse'),
        preachTimerDisplay: document.getElementById('preachTimerDisplay'),
        preachTimerToggle: document.getElementById('preachTimerToggle'),
        preachTimerReset: document.getElementById('preachTimerReset'),
        preachSetMarker1: document.getElementById('preachSetMarker1'),
        preachGoMarker1: document.getElementById('preachGoMarker1'),
        preachSetMarker2: document.getElementById('preachSetMarker2'),
        preachGoMarker2: document.getElementById('preachGoMarker2'),
        preachSetMarker3: document.getElementById('preachSetMarker3'),
        preachGoMarker3: document.getElementById('preachGoMarker3'),
        readerPlanCard: document.getElementById('readerPlanCard'),
        settingsModal: document.getElementById('settingsModal'),
        searchModal: document.getElementById('searchModal'),
        planModal: document.getElementById('planModal'),
        versionsModal: document.getElementById('versionsModal'),
        modulesModal: document.getElementById('modulesModal'),
        interlinearModal: document.getElementById('interlinearModal'),
        guideModal: document.getElementById('guideModal'),
        strongModal: document.getElementById('strongModal'),
        audioModal: document.getElementById('audioModal'),
        readerShell: root.querySelector('.reader-shell'),
        openSettingsTopbar: document.getElementById('openSettings'),
        openSettingsInline: document.getElementById('openSettingsInline'),
        closeSettings: document.getElementById('closeSettings'),
        closeSearch: document.getElementById('closeSearch'),
        closePlan: document.getElementById('closePlan'),
        closeVersions: document.getElementById('closeVersions'),
        closeModules: document.getElementById('closeModules'),
        closeInterlinear: document.getElementById('closeInterlinear'),
        closeStrong: document.getElementById('closeStrong'),
        closeAudio: document.getElementById('closeAudio'),
        closeProjectSave: document.getElementById('closeProjectSave'),
        versionPrimarySelect: document.getElementById('versionPrimarySelect'),
        versionCompareSelect: document.getElementById('versionCompareSelect'),
        versionCompareMulti: document.getElementById('versionCompareMulti'),
        saveVersions: document.getElementById('saveVersions'),
        copySelection: document.getElementById('copySelection'),
        copyParagraph: document.getElementById('copyParagraph'),
        readerFontDown: document.getElementById('readerFontDown'),
        readerFontUp: document.getElementById('readerFontUp'),
        saveSelectionProject: document.getElementById('saveSelectionProject'),
        shareSelection: document.getElementById('shareSelection'),
        shareWhatsApp: document.getElementById('shareWhatsApp'),
        shareFacebook: document.getElementById('shareFacebook'),
        modulesList: document.getElementById('modulesList'),
        modulesDictQuery: document.getElementById('modulesDictQuery'),
        modulesDictSearch: document.getElementById('modulesDictSearch'),
        modulesDictResults: document.getElementById('modulesDictResults'),
        modulesMapsQuery: document.getElementById('modulesMapsQuery'),
        modulesMapsSearch: document.getElementById('modulesMapsSearch'),
        modulesMapsCurrent: document.getElementById('modulesMapsCurrent'),
        modulesMapsResults: document.getElementById('modulesMapsResults'),
        quickSearchForm: document.getElementById('quickSearchForm'),
        qTheme: document.getElementById('qTheme'),
        qThemeSearch: document.getElementById('qThemeSearch'),
        qThemeToggle: document.getElementById('qThemeToggle'),
        qThemePanel: document.getElementById('qThemePanel'),
        qThemeOptions: document.getElementById('qThemeOptions'),
        qThemeLabel: document.getElementById('qThemeLabel'),
        runThemeSearch: document.getElementById('runThemeSearch'),
        quickSearchResults: document.getElementById('quickSearchResults'),
        contextPanel: document.getElementById('contextPanel'),
        commentsPanel: document.getElementById('commentsPanel'),
        notesPanel: document.getElementById('notesPanel'),
        linksPanel: document.getElementById('linksPanel'),
        toolsPanel: document.getElementById('toolsPanel'),
        guidePanel: document.getElementById('guidePanel'),
        interlinearModalBody: document.getElementById('interlinearModalBody'),
        closeGuide: document.getElementById('closeGuide'),
        guideTourStepLabel: document.getElementById('guideTourStepLabel'),
        guideStepBadge: document.getElementById('guideStepBadge'),
        guideTourTitle: document.getElementById('guideTourTitle'),
        guideTourText: document.getElementById('guideTourText'),
        guideTourHint: document.getElementById('guideTourHint'),
        guidePrevStep: document.getElementById('guidePrevStep'),
        guideNextStep: document.getElementById('guideNextStep'),
        guideGoTarget: document.getElementById('guideGoTarget'),
        guideHideOnStart: document.getElementById('guideHideOnStart'),
        strongModalBody: document.getElementById('strongModalBody'),
        projectSaveModal: document.getElementById('projectSaveModal'),
        projectSaveReference: document.getElementById('projectSaveReference'),
        projectSaveSource: document.getElementById('projectSaveSource'),
        projectSaveProject: document.getElementById('projectSaveProject'),
        projectSaveNote: document.getElementById('projectSaveNote'),
        projectSaveSubmit: document.getElementById('projectSaveSubmit'),
        audioSource: document.getElementById('audioSource'),
        audioVoice: document.getElementById('audioVoice'),
        audioRate: document.getElementById('audioRate'),
        audioRateLabel: document.getElementById('audioRateLabel'),
        audioTargetInfo: document.getElementById('audioTargetInfo'),
        audioPlay: document.getElementById('audioPlay'),
        audioPauseResume: document.getElementById('audioPauseResume'),
        audioStop: document.getElementById('audioStop'),
        audioStatus: document.getElementById('audioStatus')
    };

    var STRONG_MORPH_GLOSSARY = [
        { pattern: /\bdual\s+de\s+sing(?:ular)?\.?\b/i, label: 'dual de sing', meaning: 'Forma dual derivada de singular: enfatiza dos elementos vinculados.' },
        { pattern: /\bplu?r\.?\s+de\s+sing(?:ular)?\.?\b/i, label: 'plur de sing', meaning: 'Forma plural derivada de un término base singular.' },
        { pattern: /\bfem\.?\s+de\s+masc\b/i, label: 'fem de masc', meaning: 'Forma femenina construida desde una base masculina.' },
        { pattern: /\bsing(?:ular)?\.?\b/i, label: 'sing', meaning: 'Número singular: una sola entidad.' },
        { pattern: /\bpl(?:u?r(?:al)?)?\.?\b/i, label: 'pl', meaning: 'Número plural: más de una entidad.' },
        { pattern: /\bmasc(?:ulino)?\.?\b/i, label: 'masc', meaning: 'Género masculino gramatical.' },
        { pattern: /\bfem(?:enino)?\.?\b/i, label: 'fem', meaning: 'Género femenino gramatical.' },
        { pattern: /\bneut(?:ro)?\.?\b/i, label: 'neut', meaning: 'Género neutro gramatical (especialmente en griego).' },
        { pattern: /\bpart(?:icipio)?\.?\s+act(?:ivo)?\.?\b/i, label: 'part act', meaning: 'Participio activo: acción en desarrollo realizada por el sujeto.' },
        { pattern: /\bpart(?:icipio)?\.?\s+pas(?:ivo)?\.?\b/i, label: 'part pas', meaning: 'Participio pasivo: acción recibida por el sujeto.' },
        { pattern: /\bpart(?:icipio)?\.?\b/i, label: 'part', meaning: 'Participio: forma verbal con función adjetival o nominal.' },
        { pattern: /\bimperf(?:ecto)?\.?\b/i, label: 'imperf', meaning: 'Imperfecto: acción en progreso, repetida o no concluida.' },
        { pattern: /\bperf(?:ecto)?\.?\b/i, label: 'perf', meaning: 'Perfecto: acción completada con resultado vigente.' },
        { pattern: /\bplup(?:erfecto)?\.?\b/i, label: 'plup', meaning: 'Pluscuamperfecto: acción completada antes de otra acción pasada.' },
        { pattern: /\bpres(?:ente)?\.?\b/i, label: 'pres', meaning: 'Presente: acción actual o habitual según contexto.' },
        { pattern: /\bfut(?:uro)?\.?\b/i, label: 'fut', meaning: 'Futuro: acción proyectada hacia adelante.' },
        { pattern: /\baor(?:isto)?\.?\b/i, label: 'aor', meaning: 'Aoristo: acción vista globalmente o como evento puntual.' },
        { pattern: /\bact(?:ivo)?\.?\b/i, label: 'act', meaning: 'Voz activa: el sujeto ejecuta la acción.' },
        { pattern: /\bmid(?:io)?\.?\b/i, label: 'mid', meaning: 'Voz media: el sujeto participa en la acción en su propio interés.' },
        { pattern: /\bpas(?:ivo)?\.?\b/i, label: 'pas', meaning: 'Voz pasiva: el sujeto recibe la acción.' },
        { pattern: /\bind(?:icativo)?\.?\b/i, label: 'ind', meaning: 'Modo indicativo: afirma hechos o realidades.' },
        { pattern: /\bsubj(?:untivo)?\.?\b/i, label: 'subj', meaning: 'Modo subjuntivo: posibilidad, propósito o contingencia.' },
        { pattern: /\bopt(?:ativo)?\.?\b/i, label: 'opt', meaning: 'Modo optativo: deseo, posibilidad remota (griego clásico/koiné temprano).' },
        { pattern: /\bimp(?:erativo)?\.?\b/i, label: 'imp', meaning: 'Modo imperativo: mandato, exhortación o ruego.' },
        { pattern: /\binf(?:initivo)?\.?\b/i, label: 'inf', meaning: 'Infinitivo: forma verbal no personal.' },
        { pattern: /\bcstr|construct\b/i, label: 'construct', meaning: 'Estado constructo (hebreo): relación posesiva o genitiva con el término siguiente.' },
        { pattern: /\babs|absolute\b/i, label: 'absolute', meaning: 'Estado absoluto: forma independiente del sustantivo hebreo.' },
        { pattern: /\bjuss(?:ive)?\.?\b/i, label: 'juss', meaning: 'Jusivo (hebreo): deseo, mandato suave o posibilidad para tercera persona.' },
        { pattern: /\bcohort(?:ative)?\.?\b/i, label: 'cohort', meaning: 'Cohortativo (hebreo): intención o voluntad en primera persona.' },
        { pattern: /\bqal\b/i, label: 'qal', meaning: 'Hebreo binyan Qal: voz simple/activa básica.' },
        { pattern: /\bniphal\b/i, label: 'niphal', meaning: 'Hebreo binyan Niphal: pasivo/reflexivo de Qal.' },
        { pattern: /\bpiel\b/i, label: 'piel', meaning: 'Hebreo binyan Piel: acción intensiva o factitiva activa.' },
        { pattern: /\bpual\b/i, label: 'pual', meaning: 'Hebreo binyan Pual: pasivo de Piel.' },
        { pattern: /\bhiphil\b/i, label: 'hiphil', meaning: 'Hebreo binyan Hiphil: causativo activo (hacer que algo ocurra).' },
        { pattern: /\bhophal\b/i, label: 'hophal', meaning: 'Hebreo binyan Hophal: pasivo de Hiphil.' },
        { pattern: /\bhithpael\b/i, label: 'hithpael', meaning: 'Hebreo binyan Hithpael: reflexivo/intensivo.' },
        { pattern: /\bgen(?:itivo)?\.?\b/i, label: 'gen', meaning: 'Genitivo: posesión, origen, relación o cualidad.' },
        { pattern: /\bdat(?:ivo)?\.?\b/i, label: 'dat', meaning: 'Dativo: destinatario, beneficiario, medio o esfera.' },
        { pattern: /\bnom(?:inativo)?\.?\b/i, label: 'nom', meaning: 'Nominativo: normalmente marca el sujeto.' },
        { pattern: /\bacc(?:usativo)?\.?\b/i, label: 'acc', meaning: 'Acusativo: objeto directo, extensión o dirección.' },
        { pattern: /\bvoc(?:ativo)?\.?\b/i, label: 'voc', meaning: 'Vocativo: llamado directo.' },
        { pattern: /\bprep(?:osici[oó]n)?\.?\b/i, label: 'prep', meaning: 'Preposición: expresa relación entre términos.' },
        { pattern: /\bconj(?:unci[oó]n)?\.?\b/i, label: 'conj', meaning: 'Conjunción: enlaza palabras, frases o cláusulas.' },
        { pattern: /\binterj(?:ecci[oó]n)?\.?\b/i, label: 'interj', meaning: 'Interjección: expresión breve de emoción o énfasis.' },
        { pattern: /\badv(?:erbio)?\.?\b/i, label: 'adv', meaning: 'Adverbio: modifica verbo, adjetivo u otra expresión.' },
        { pattern: /\bpron(?:ombre)?\.?\b/i, label: 'pron', meaning: 'Pronombre: sustituye un sustantivo.' },
        { pattern: /\b1(?:st|a)?\s*pers|\b2(?:nd|a)?\s*pers|\b3(?:rd|a)?\s*pers/i, label: 'persona verbal', meaning: 'Persona gramatical: 1a (yo/nosotros), 2a (tú/ustedes), 3a (él/ellos).' }
    ];
    var GUIDE_TOUR_STEPS = [
        {
            title: 'Navega por libros y capítulos',
            text: 'En estas columnas eliges libro y capítulo. Es el punto de partida para cualquier estudio.',
            hint: 'Primero el libro, luego el capítulo, después selecciona versículos.',
            selector: '#booksPane',
            desktop_targets: ['#booksPane .pane-head', '#booksList .book-item.is-active', '#booksList .book-item', '#booksPane'],
            mobile_targets: ['#openNavigator']
        },
        {
            title: 'Selecciona versículos del pasaje',
            text: 'Haz clic en un versículo para abrir ayuda contextual. Puedes seleccionar varios para estudiar un rango.',
            hint: 'Usa selección múltiple para construir contexto y notas por bloque.',
            selector: '#versesContainer',
            desktop_targets: ['#versesContainer .verse.is-selected', '#versesContainer .verse', '#versesContainer'],
            mobile_targets: ['#versesContainer .verse.is-selected', '#versesContainer .verse', '#versesContainer']
        },
        {
            title: 'Panel de Ayuda por pestañas',
            text: 'Aquí tienes contexto, comentarios, notas, vínculos, herramientas y la nueva guía de aprendizaje.',
            hint: 'Este panel concentra el trabajo exegético y pastoral.',
            selector: '#helpPane',
            desktop_targets: ['#helpPane .tabs', '#helpPane .pane-head', '#helpPane'],
            mobile_targets: ['#toggleHelp'],
            tab: 'contexto'
        },
        {
            title: 'Strong y diccionario',
            text: 'Toca una palabra marcada con Strong para abrir el significado en español, la definición del diccionario bíblico y guardarla en un proyecto.',
            hint: 'Mantén el estudio corto y enfocado en el término clave del pasaje.',
            selector: '#versesContainer',
            desktop_targets: ['#versesContainer [data-strong]', '#versesContainer .verse', '#versesContainer'],
            mobile_targets: ['#versesContainer [data-strong]', '#versesContainer .verse', '#versesContainer']
        },
        {
            title: 'Generación y aplicación práctica',
            text: 'En Herramientas puedes generar explicación, palabras clave, bosquejo y aplicación.',
            hint: 'No te quedes en la teoría: termina con una decisión concreta.',
            selector: '#toolsPanel',
            desktop_targets: ['#helpPane .tab[data-tab="herramientas"]', '#toolsPanel', '#toggleHelp'],
            mobile_targets: ['#toggleHelp'],
            tab: 'herramientas'
        }
    ];

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

        if (state.initial.versions && typeof state.initial.versions === 'object') {
            var currentVersions = state.initial.versions.current || {};
            var versionRows = Array.isArray(state.initial.versions.versions) ? state.initial.versions.versions : [];
            state.versionsCatalog = versionRows.slice();
            state.versionPrimaryFile = String(currentVersions.primary_file || '');
            state.versionCompareFile = String(currentVersions.compare_file || '');
            state.versionCompareFiles = Array.isArray(currentVersions.compare_files)
                ? currentVersions.compare_files.map(function (file) { return String(file || '').trim(); }).filter(Boolean)
                : [];
            if (!state.versionCompareFiles.length && state.versionCompareFile) {
                state.versionCompareFiles = [state.versionCompareFile];
            }
        }

        if (state.initial.auth && typeof state.initial.auth === 'object') {
            state.auth.isLogged = state.initial.auth.is_logged === true || Number(state.initial.auth.is_logged || 0) === 1;
            state.auth.username = String(state.initial.auth.username || '');
            state.auth.gate = state.initial.auth.gate && typeof state.initial.auth.gate === 'object'
                ? state.initial.auth.gate
                : null;
        }
        if (state.initial.branding && typeof state.initial.branding === 'object') {
            state.branding.appName = String(state.initial.branding.app_name || state.branding.appName || 'Biblia para todos');
            state.branding.churchName = String(state.initial.branding.church_name || '');
            state.branding.logoPath = String(state.initial.branding.logo_public || state.branding.logoPath || 'assets/branding/logo_bibliasoft.png');
        }
        if (!state.auth.isLogged) {
            state.settings.parallelMode = false;
            state.settings.preachMode = false;
        }

        loadAudioPrefs();
        loadPreachPrefs();
        refreshSpeechVoices(false);
        if (state.audio.supported && typeof window.speechSynthesis.onvoiceschanged !== 'undefined') {
            window.speechSynthesis.onvoiceschanged = function () {
                refreshSpeechVoices(true);
            };
        }

        restoreReaderState();
        loadSettings();
        maybeRedirectToDailyAtStartup();
        applySettings();
        renderBooks(state.books);
        renderChapters();
        renderVerses();
        updatePreachControlsFromChapter();
        wireEvents();
        activateTab(state.activeTab || 'contexto');
        bindSelectionActions();
        renderEmptyPanels();
        renderGuidePanel();
        bindConnectivity();
        registerPwa();
        maybeOpenSearchAtStartup();
        renderVersionSelectors();
        fetchReadingPlanStatus();
        initReadingTelemetry();

        if (state.needsChapterRefresh) {
            fetchChapter(state.currentBook, state.currentChapter);
            maybeAutoStartGuideTour();
            return;
        }
        if (state.settings.parallelMode) {
            resetParallelChapterState();
            loadParallelChapterData(true, true);
        }
        applyPendingSelection();
        maybeAutoStartGuideTour();
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
                var tabName = this.getAttribute('data-tab');
                if (!state.auth.isLogged && (tabName === 'notas' || tabName === 'vincular' || tabName === 'herramientas')) {
                    activateTab(tabName);
                    openReaderAuthGate(tabName === 'herramientas' ? 'advanced_tools' : 'study_center');
                    return;
                }
                activateTab(tabName);
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

        if (els.toggleReaderSidebar) {
            els.toggleReaderSidebar.addEventListener('click', function () {
                if (window.matchMedia('(max-width: 980px)').matches) {
                    var isOpen = els.booksPane.classList.contains('is-open') || els.chaptersPane.classList.contains('is-open');
                    if (isOpen) {
                        closeDrawers();
                    } else {
                        els.booksPane.classList.add('is-open');
                        els.chaptersPane.classList.add('is-open');
                        els.overlay.classList.remove('hidden');
                    }
                    return;
                }
                state.settings.readerNavVisible = state.settings.readerNavVisible === false ? true : false;
                saveSettings();
                applySettings();
            });
        }

        els.overlay.addEventListener('click', closeDrawers);

        if (els.closeReaderAuthGate) {
            els.closeReaderAuthGate.addEventListener('click', closeReaderAuthGate);
        }

        [els.openSettingsTopbar, els.openSettingsInline].forEach(function (button) {
            if (!button) {
                return;
            }
            button.addEventListener('click', openSettings);
        });
        if (els.closeSettings) {
            els.closeSettings.addEventListener('click', closeSettings);
        }
        if (els.openQuickSearch) {
            els.openQuickSearch.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openSearch();
            });
        }
        if (els.openReadingPlan) {
            els.openReadingPlan.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openPlan();
            });
        }
        if (els.openVersions) {
            els.openVersions.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openVersions();
            });
        }
        if (els.openModules) {
            els.openModules.addEventListener('click', openModules);
        }
        if (els.openInterlinear) {
            els.openInterlinear.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openInterlinear();
            });
        }
        if (els.openAudio) {
            els.openAudio.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openAudio();
            });
        }
        if (els.openGuideTour) {
            els.openGuideTour.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                openGuideModal(true);
            });
        }
        if (els.toggleParallel) {
            els.toggleParallel.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                toggleParallelMode();
            });
        }
        if (els.togglePreachMode) {
            els.togglePreachMode.addEventListener('click', function () {
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
                setPreachMode(!state.settings.preachMode);
            });
        }
        if (els.preachPrevChapter) {
            els.preachPrevChapter.addEventListener('click', function () {
                goToAdjacentChapter(-1);
            });
        }
        if (els.preachNextChapter) {
            els.preachNextChapter.addEventListener('click', function () {
                goToAdjacentChapter(1);
            });
        }
        if (els.preachGoVerse) {
            els.preachGoVerse.addEventListener('click', function () {
                jumpToVerseFromPreachInput();
            });
        }
        if (els.preachVerseJump) {
            els.preachVerseJump.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    jumpToVerseFromPreachInput();
                }
            });
        }
        if (els.preachTimerToggle) {
            els.preachTimerToggle.addEventListener('click', function () {
                togglePreachTimer();
            });
        }
        if (els.preachTimerReset) {
            els.preachTimerReset.addEventListener('click', function () {
                resetPreachTimer();
            });
        }
        if (els.preachSetMarker1) {
            els.preachSetMarker1.addEventListener('click', function () { setPreachMarker(1); });
        }
        if (els.preachSetMarker2) {
            els.preachSetMarker2.addEventListener('click', function () { setPreachMarker(2); });
        }
        if (els.preachSetMarker3) {
            els.preachSetMarker3.addEventListener('click', function () { setPreachMarker(3); });
        }
        if (els.preachGoMarker1) {
            els.preachGoMarker1.addEventListener('click', function () { goToPreachMarker(1); });
        }
        if (els.preachGoMarker2) {
            els.preachGoMarker2.addEventListener('click', function () { goToPreachMarker(2); });
        }
        if (els.preachGoMarker3) {
            els.preachGoMarker3.addEventListener('click', function () { goToPreachMarker(3); });
        }
        if (els.closeSearch) {
            els.closeSearch.addEventListener('click', closeSearch);
        }
        if (els.closePlan) {
            els.closePlan.addEventListener('click', closePlan);
        }
        if (els.closeVersions) {
            els.closeVersions.addEventListener('click', closeVersions);
        }
        if (els.closeModules) {
            els.closeModules.addEventListener('click', closeModules);
        }
        if (els.closeInterlinear) {
            els.closeInterlinear.addEventListener('click', closeInterlinear);
        }
        if (els.closeStrong) {
            els.closeStrong.addEventListener('click', closeStrong);
        }
        if (els.closeAudio) {
            els.closeAudio.addEventListener('click', closeAudio);
        }
        if (els.closeProjectSave) {
            els.closeProjectSave.addEventListener('click', closeProjectSaveModal);
        }
        if (els.projectSaveSubmit) {
            els.projectSaveSubmit.addEventListener('click', submitProjectSaveModal);
        }
        if (els.closeGuide) {
            els.closeGuide.addEventListener('click', closeGuideModal);
        }
        bindGuideTourControls();
        if (els.saveVersions) {
            els.saveVersions.addEventListener('click', saveVersionSelection);
        }
        if (els.versionPrimarySelect) {
            els.versionPrimarySelect.addEventListener('change', function () {
                state.versionPrimaryFile = String(this.value || '').trim();
                if (state.versionCompareFile === state.versionPrimaryFile) {
                    state.versionCompareFile = '';
                }
                state.versionCompareFiles = (state.versionCompareFiles || []).filter(function (file) {
                    return String(file || '').trim() !== state.versionPrimaryFile;
                });
                renderVersionSelectors();
            });
        }
        if (els.versionCompareSelect) {
            els.versionCompareSelect.addEventListener('change', function () {
                state.versionCompareFile = String(this.value || '').trim();
                var keep = [];
                (state.versionCompareFiles || []).forEach(function (file) {
                    var value = String(file || '').trim();
                    if (!value || value === state.versionPrimaryFile || value === state.versionCompareFile) {
                        return;
                    }
                    keep.push(value);
                });
                state.versionCompareFiles = state.versionCompareFile ? [state.versionCompareFile].concat(keep.slice(0, 2)) : keep.slice(0, 2);
                renderVersionSelectors();
            });
        }
        if (els.quickSearchForm) {
            els.quickSearchForm.addEventListener('submit', function (event) {
                event.preventDefault();
                runQuickSearch();
            });
        }
        if (els.runThemeSearch) {
            els.runThemeSearch.addEventListener('click', function () {
                runThemeSearch('');
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.ctrlKey && event.key.toLowerCase() === 'k') {
                event.preventDefault();
                if (!ensureAdvancedAccess('advanced_tools')) {
                    return;
                }
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
                closeVersions();
                closeModules();
                closeInterlinear();
                closeStrong();
                closeAudio();
                closeProjectSaveModal();
                closeGuideModal();
                closeReaderAuthGate();
            }
            if (state.settings.preachMode && !event.ctrlKey && !event.altKey && !event.metaKey) {
                var target = event.target || null;
                var tag = target && target.tagName ? String(target.tagName).toLowerCase() : '';
                if (tag !== 'input' && tag !== 'textarea' && !(target && target.isContentEditable)) {
                    if (event.key === 'ArrowLeft') {
                        event.preventDefault();
                        goToAdjacentChapter(-1);
                    } else if (event.key === 'ArrowRight') {
                        event.preventDefault();
                        goToAdjacentChapter(1);
                    } else if (event.key === 'm' || event.key === 'M') {
                        event.preventDefault();
                        setPreachMarker(1);
                    } else if (event.key === '1') {
                        event.preventDefault();
                        goToPreachMarker(1);
                    } else if (event.key === '2') {
                        event.preventDefault();
                        goToPreachMarker(2);
                    } else if (event.key === '3') {
                        event.preventDefault();
                        goToPreachMarker(3);
                    }
                }
            }
        });

        bindSettingsInputs();
        bindAudioControls();
        bindThemeSelectSearch();
        window.addEventListener('bs-theme-changed', function (event) {
            var nextTheme = event && event.detail && event.detail.theme === 'dark' ? 'dark' : 'light';
            if (state.settings.theme === nextTheme) {
                return;
            }
            state.settings.theme = nextTheme;
            var themeInput = document.getElementById('optTheme');
            if (themeInput) {
                themeInput.value = nextTheme;
            }
            applySettings();
            saveSettings();
        });
    }

    function renderBooks(rows, options) {
        var opts = options && typeof options === 'object' ? options : {};
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

        keepActiveBookVisible(opts.smooth === true);
    }

    function keepActiveBookVisible(smooth) {
        if (!els.booksList) {
            return;
        }
        var active = els.booksList.querySelector('.book-item.is-active');
        if (!active) {
            return;
        }

        var listRect = els.booksList.getBoundingClientRect();
        var itemRect = active.getBoundingClientRect();
        var fullyVisible = itemRect.top >= listRect.top && itemRect.bottom <= listRect.bottom;
        if (fullyVisible) {
            return;
        }

        var prefersReduced = false;
        if (window.matchMedia) {
            prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        }
        active.scrollIntoView({
            behavior: smooth && !prefersReduced ? 'smooth' : 'auto',
            block: 'center',
            inline: 'nearest'
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

    function renderVerses(preserveSelection) {
        var keepSelection = preserveSelection === true;
        var keptSelected = keepSelection ? (state.selectedVerses || []).slice() : [];
        var verseExists = {};
        state.verses.forEach(function (row) {
            verseExists[Number(row.verse || 0)] = true;
        });

        var parallelEnabled = state.settings.parallelMode === true;
        var compareColumns = parallelEnabled ? getParallelColumnsForRender() : [];
        var parallelHead = parallelEnabled ? buildParallelHeadHtml(compareColumns) : '';
        var html = state.verses.map(function (verse) {
            var verseNumber = Number(verse.verse || 0);
            if (!parallelEnabled) {
                return '' +
                    '<div class="verse" data-verse="' + verseNumber + '">' +
                    '<span class="verse-num">' + verseNumber + '</span>' +
                    '<span class="verse-text">' + (verse.scripture_html || '') + '</span>' +
                    '</div>';
            }

            var totalCols = 1 + compareColumns.length;
            var compareHtml = compareColumns.map(function (column) {
                return '' +
                    '<div class="verse-parallel-col">' +
                    '<small class="parallel-label">' + escapeHtml(String(column.label || 'Versión')) + '</small>' +
                    '<div class="verse-text">' + getParallelCompareVerseHtml(column, verseNumber) + '</div>' +
                    '</div>';
            }).join('');
            return '' +
                '<div class="verse verse-parallel" data-verse="' + verseNumber + '">' +
                '<span class="verse-num">' + verseNumber + '</span>' +
                '<div class="verse-parallel-cols" style="--parallel-cols:' + totalCols + ';">' +
                '<div class="verse-parallel-col verse-parallel-primary">' +
                '<small class="parallel-label">' + escapeHtml(state.parallelPrimaryLabel || 'RVR60') + '</small>' +
                '<div class="verse-text">' + (verse.scripture_html || '') + '</div>' +
                '</div>' +
                compareHtml +
                '</div>' +
                '</div>';
        }).join('');

        els.versesContainer.innerHTML = (parallelHead + html) || '<p class="muted">No se pudo cargar el capítulo.</p>';
        applyStrongFallbackMarkup();
        if (keepSelection) {
            var filtered = keptSelected.filter(function (value) {
                return Boolean(verseExists[Number(value || 0)]);
            });
            state.selectedVerses = filtered.sort(function (a, b) { return a - b; });
            state.lastSelectedVerse = state.selectedVerses.length ? state.selectedVerses[state.selectedVerses.length - 1] : null;
        } else {
            state.selectedVerses = [];
            state.lastSelectedVerse = null;
            state.selectionPayload = null;
            renderEmptyPanels();
        }
        updateSelectionUI();
        updateHighlightUI();
        if (keepSelection && state.selectionPayload) {
            renderPanels();
        }

        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            node.addEventListener('click', function (event) {
                var target = event.target || null;
                var strongToken = target && target.closest ? target.closest('[data-strong]') : null;
                if (strongToken && this.contains(strongToken)) {
                    event.preventDefault();
                    event.stopPropagation();
                    openStrongLookup(String(strongToken.getAttribute('data-strong') || ''), {
                        book: Number(state.currentBook || 0),
                        chapter: Number(state.currentChapter || 0),
                        verse: Number(this.getAttribute('data-verse') || 0),
                        word: String(strongToken.textContent || '').trim()
                    });
                    return;
                }

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

    function getParallelColumnsForRender() {
        var columns = Array.isArray(state.parallelColumns) ? state.parallelColumns : [];
        if (columns.length) {
            return columns;
        }
        var fallbackMap = state.parallelVerseMap || {};
        var hasFallback = false;
        Object.keys(fallbackMap).forEach(function (key) {
            if (fallbackMap[key] && fallbackMap[key].scripture_html) {
                hasFallback = true;
            }
        });
        if (!hasFallback) {
            return [];
        }
        return [{
            file: String(state.versionCompareFile || ''),
            label: String(state.parallelCompareLabel || 'Versión 2'),
            available: true,
            same_source: state.parallelSameSource === true,
            message: String(state.parallelMessage || ''),
            verseMap: fallbackMap
        }];
    }

    function buildParallelHeadHtml(compareColumns) {
        var columns = Array.isArray(compareColumns) ? compareColumns : [];
        var compareLabels = columns.map(function (col) {
            return String(col.label || '').trim();
        }).filter(Boolean);
        var title = escapeHtml(state.parallelPrimaryLabel || 'RVR60');
        if (compareLabels.length) {
            title += ' vs ' + escapeHtml(compareLabels.join(' · '));
        } else {
            title += ' vs ' + escapeHtml(state.parallelCompareLabel || 'Versión 2');
        }

        var status = '';
        if (state.parallelLoading) {
            status = '<span class="muted">Cargando comparación...</span>';
        } else if (!state.parallelAvailable) {
            status = '<span class="muted">' + escapeHtml(state.parallelMessage || 'No disponible para este capítulo.') + '</span>';
        } else if (state.parallelSameSource) {
            status = '<span class="muted">' + escapeHtml(state.parallelMessage || 'Comparando con la misma versión.') + '</span>';
        } else if (state.parallelMessage) {
            status = '<span class="muted">' + escapeHtml(state.parallelMessage) + '</span>';
        }

        return '' +
            '<div class="parallel-head">' +
            '<strong>' + title + '</strong>' +
            status +
            '</div>';
    }

    function getParallelCompareVerseHtml(column, verseNumber) {
        var verseMap = column && column.verseMap ? column.verseMap : {};
        var row = verseMap[String(Number(verseNumber || 0))] || null;
        if (row && row.scripture_html) {
            return row.scripture_html;
        }
        return '<span class="muted">Sin versículo equivalente.</span>';
    }

    function applyStrongFallbackMarkup() {
        if (!els.versesContainer) {
            return;
        }

        state.verses.forEach(function (row) {
            var verse = Number(row && row.verse ? row.verse : 0);
            if (verse < 1) {
                return;
            }
            var alignment = Array.isArray(row.strong_alignment) ? row.strong_alignment : [];
            if (!alignment.length) {
                return;
            }

            var verseNode = els.versesContainer.querySelector('.verse[data-verse="' + verse + '"]');
            if (!verseNode) {
                return;
            }

            var primaryText = verseNode.querySelector('.verse-parallel-primary .verse-text') || verseNode.querySelector('.verse-text');
            if (!primaryText) {
                return;
            }
            if (primaryText.querySelector('[data-strong]')) {
                return;
            }

            wrapTextNodesWithStrongAlignment(primaryText, alignment);
        });
    }

    function wrapTextNodesWithStrongAlignment(container, alignment) {
        if (!container || !Array.isArray(alignment) || !alignment.length) {
            return;
        }

        var textNodes = [];
        var walker = document.createTreeWalker(container, NodeFilter.SHOW_TEXT, null);
        var node;
        while ((node = walker.nextNode())) {
            if (!node || !node.parentNode) {
                continue;
            }
            var parent = node.parentNode;
            if (!(parent instanceof HTMLElement)) {
                continue;
            }
            if (parent.closest('[data-strong]')) {
                continue;
            }
            var tag = (parent.tagName || '').toLowerCase();
            if (tag === 'sup' || tag === 'sub') {
                continue;
            }
            if (!/[A-Za-zÀ-ÖØ-öø-ÿ0-9]/.test(node.nodeValue || '')) {
                continue;
            }
            textNodes.push(node);
        }

        var indexRef = { index: 0 };
        textNodes.forEach(function (textNode) {
            replaceTextNodeWithStrongSpans(textNode, alignment, indexRef);
        });
    }

    function replaceTextNodeWithStrongSpans(textNode, alignment, indexRef) {
        var text = String(textNode.nodeValue || '');
        if (!text) {
            return;
        }

        var regex = /([\p{L}\p{N}]+(?:['’][\p{L}\p{N}]+)*)/gu;
        var frag = document.createDocumentFragment();
        var lastPos = 0;
        var matched = false;
        var m;

        while ((m = regex.exec(text)) !== null) {
            matched = true;
            var word = m[1];
            var start = m.index;
            if (start > lastPos) {
                frag.appendChild(document.createTextNode(text.slice(lastPos, start)));
            }

            var code = '';
            if (indexRef.index < alignment.length) {
                code = String(alignment[indexRef.index] || '').trim();
            }
            indexRef.index += 1;

            if (code) {
                var span = document.createElement('span');
                span.className = 'strong-word';
                span.setAttribute('data-strong', code);
                span.textContent = word;
                frag.appendChild(span);
            } else {
                frag.appendChild(document.createTextNode(word));
            }
            lastPos = start + word.length;
        }

        if (!matched) {
            return;
        }
        if (lastPos < text.length) {
            frag.appendChild(document.createTextNode(text.slice(lastPos)));
        }
        textNode.parentNode.replaceChild(frag, textNode);
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

    function selectSingleVerse(verse, smooth) {
        var target = Number(verse || 0);
        if (target < 1) {
            return;
        }
        var exists = false;
        for (var i = 0; i < state.verses.length; i++) {
            if (Number(state.verses[i].verse || 0) === target) {
                exists = true;
                break;
            }
        }
        if (!exists) {
            return;
        }

        state.selectedVerses = [target];
        state.lastSelectedVerse = target;
        updateSelectionUI();
        scrollToVerse(target, Boolean(smooth));
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
        if (els.audioModal && !els.audioModal.classList.contains('hidden')) {
            renderAudioControls();
        }
    }

    function scrollToVerse(verse, smooth) {
        var target = Number(verse || 0);
        if (!els.versesContainer || target < 1) {
            return;
        }
        var node = els.versesContainer.querySelector('.verse[data-verse="' + target + '"]');
        if (!node) {
            return;
        }

        var prefersReduced = false;
        if (window.matchMedia) {
            prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        }
        var behavior = (smooth && !prefersReduced) ? 'smooth' : 'auto';
        node.scrollIntoView({
            behavior: behavior,
            block: 'center',
            inline: 'nearest'
        });

        node.classList.remove('verse-focus-target');
        void node.offsetWidth;
        node.classList.add('verse-focus-target');
        clearTimeout(scrollToVerse._timer);
        scrollToVerse._timer = setTimeout(function () {
            node.classList.remove('verse-focus-target');
        }, 1400);
    }

    function updateHighlightUI() {
        var palette = highlightPaletteColors();
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
        applyHighlightFilterUI();
        updateHighlightFilterInfoUI();
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

    function highlightPaletteColors() {
        return ['yellow', 'green', 'blue', 'pink', 'orange'];
    }

    function normalizeHighlightFilterColor(value) {
        var color = String(value || '').trim().toLowerCase();
        if (color === '' || color === 'all') {
            return 'all';
        }
        return highlightPaletteColors().indexOf(color) >= 0 ? color : 'all';
    }

    function highlightColorLabel(color) {
        var labels = {
            yellow: 'Amarillo',
            green: 'Verde',
            blue: 'Azul',
            pink: 'Rosa',
            orange: 'Naranja'
        };
        return labels[color] || '';
    }

    function countHighlightsByColor(map) {
        var counts = {
            all: 0,
            yellow: 0,
            green: 0,
            blue: 0,
            pink: 0,
            orange: 0
        };
        var normalized = normalizeHighlights(map || {});
        Object.keys(normalized).forEach(function (verseKey) {
            var color = normalized[verseKey];
            if (counts[color] === undefined) {
                return;
            }
            counts[color]++;
            counts.all++;
        });
        return counts;
    }

    function buildHighlightFilterInfoText(selectedColor, counts) {
        var selected = normalizeHighlightFilterColor(selectedColor);
        if (selected === 'all') {
            return 'Subrayados en este capítulo: ' + Number(counts.all || 0) + '.';
        }
        var label = highlightColorLabel(selected) || selected;
        var count = Number(counts[selected] || 0);
        if (count < 1) {
            return 'No hay versículos subrayados en ' + label + ' en este capítulo.';
        }
        return 'Mostrando ' + count + ' versículo(s) subrayado(s) en ' + label + '.';
    }

    function applyHighlightFilterUI() {
        if (!els.versesContainer) {
            return;
        }
        var selected = normalizeHighlightFilterColor(state.highlightFilterColor);
        els.versesContainer.querySelectorAll('.verse').forEach(function (node) {
            node.classList.remove('is-highlight-filtered-out', 'is-highlight-filter-hit');
            if (selected === 'all') {
                return;
            }
            var color = String(node.getAttribute('data-highlight') || '').trim().toLowerCase();
            var matches = color === selected;
            node.classList.toggle('is-highlight-filtered-out', !matches);
            node.classList.toggle('is-highlight-filter-hit', matches);
        });
    }

    function updateHighlightFilterInfoUI() {
        var infoNode = els.toolsPanel ? els.toolsPanel.querySelector('.js-highlight-filter-info') : null;
        if (!infoNode) {
            return;
        }
        var counts = countHighlightsByColor(state.highlights || {});
        infoNode.textContent = buildHighlightFilterInfoText(state.highlightFilterColor, counts);
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
        renderGuidePanel();
    }

    function renderEmptyPanels() {
        els.contextPanel.innerHTML = '<p class="muted">Selecciona versículos para ver contexto del pasaje.</p>';
        els.commentsPanel.innerHTML = '<p class="muted">Selecciona versículos para cargar comentarios.</p>';
        els.notesPanel.innerHTML = '<p class="muted">Selecciona versículos para gestionar tus notas.</p>';
        els.linksPanel.innerHTML = '<p class="muted">Selecciona versículos para crear vínculos.</p>';
        els.toolsPanel.innerHTML = '' +
            '<div class="stack">' +
            '<p class="muted">Herramientas disponibles al seleccionar un pasaje.</p>' +
            buildHighlightFilterCardHtml(false) +
            '</div>';
        bindHighlightFilterControls();
        renderGuidePanel();
    }

    function renderGuidePanel() {
        if (!els.guidePanel) {
            return;
        }

        els.guidePanel.innerHTML = '' +
            '<article class="card guide-card">' +
            '<strong>Tutorial rápido de uso</strong>' +
            '<ul class="guide-list">' +
            '<li>1) Elige libro y capítulo.</li>' +
            '<li>2) Selecciona uno o más versículos.</li>' +
            '<li>3) Revisa Contexto y Comentarios.</li>' +
            '<li>4) Registra Notas, Cuaderno y Vínculos.</li>' +
            '<li>5) Aplica en Herramientas (explicación, bosquejo, aplicación).</li>' +
            '</ul>' +
            '<div class="toolbar">' +
            '<button class="btn-primary js-open-guide-modal" type="button">Abrir tour guiado</button>' +
            '</div>' +
            '</article>' +
            '<article class="card guide-card">' +
            '<strong>Cómo usar Strong y diccionario bíblico</strong>' +
            '<ul class="guide-list">' +
            '<li>1) Toca una palabra con código Strong.</li>' +
            '<li>2) Lee el significado Strong en español.</li>' +
            '<li>3) Contrasta con la definición del diccionario bíblico integrado.</li>' +
            '<li>4) Guarda el hallazgo en un proyecto del Centro de estudio.</li>' +
            '<li>5) Resume la aplicación al pasaje actual.</li>' +
            '</ul>' +
            '</article>' +
            '<article class="card guide-card">' +
            '<strong>Ruta de aprendizaje recomendada (8 semanas)</strong>' +
            '<div class="learning-path-grid">' +
            '<div><small class="muted">Semanas 1-2</small><p>Lectura diaria, observación literal y palabras clave.</p></div>' +
            '<div><small class="muted">Semanas 3-4</small><p>Contexto del capítulo/libro, notas y vínculos cruzados.</p></div>' +
            '<div><small class="muted">Semanas 5-6</small><p>Strong + diccionario integrado para términos teológicos.</p></div>' +
            '<div><small class="muted">Semanas 7-8</small><p>Bosquejo, aplicación pastoral y material para enseñar.</p></div>' +
            '</div>' +
            '</article>';

        els.guidePanel.querySelectorAll('.js-open-guide-modal').forEach(function (btn) {
            btn.addEventListener('click', function () {
                openGuideModal(true);
            });
        });
    }

    function buildHighlightFilterCardHtml(includePaintTools) {
        var selected = normalizeHighlightFilterColor(state.highlightFilterColor);
        var counts = countHighlightsByColor(state.highlights || {});
        var options = '<option value="all">Todos (' + Number(counts.all || 0) + ')</option>' +
            highlightPaletteColors().map(function (color) {
                var label = highlightColorLabel(color) || color;
                return '<option value="' + color + '"' + (selected === color ? ' selected' : '') + '>' +
                    label + ' (' + Number(counts[color] || 0) + ')' +
                    '</option>';
            }).join('');

        var html = '' +
            '<div class="card">' +
            '<strong>Filtro de subrayado</strong>' +
            '<small class="muted">Filtra los versículos del capítulo por color.</small>' +
            '<div class="highlight-filter-row">' +
            '<select class="js-highlight-filter">' + options + '</select>' +
            '<button class="btn-light js-highlight-filter-clear" type="button">Mostrar todo</button>' +
            '</div>' +
            '<small class="muted js-highlight-filter-info">' + escapeHtml(buildHighlightFilterInfoText(selected, counts)) + '</small>';

        if (includePaintTools) {
            html += '' +
                '<hr class="highlight-divider">' +
                '<small class="muted">Aplica color al rango seleccionado.</small>' +
                '<div class="highlight-palette">' +
                '<button class="highlight-dot hl-yellow js-highlight-set" type="button" data-color="yellow" title="Subrayar amarillo" aria-label="Subrayar amarillo"></button>' +
                '<button class="highlight-dot hl-green js-highlight-set" type="button" data-color="green" title="Subrayar verde" aria-label="Subrayar verde"></button>' +
                '<button class="highlight-dot hl-blue js-highlight-set" type="button" data-color="blue" title="Subrayar azul" aria-label="Subrayar azul"></button>' +
                '<button class="highlight-dot hl-pink js-highlight-set" type="button" data-color="pink" title="Subrayar rosa" aria-label="Subrayar rosa"></button>' +
                '<button class="highlight-dot hl-orange js-highlight-set" type="button" data-color="orange" title="Subrayar naranja" aria-label="Subrayar naranja"></button>' +
                '<button class="btn-light js-highlight-clear" type="button">Quitar</button>' +
                '</div>';
        }

        html += '</div>';
        return html;
    }

    function renderContextPanel(payload) {
        var c = payload.context || {};
        var meta = c.study_meta && typeof c.study_meta === 'object' ? c.study_meta : {};
        var sciences = Array.isArray(c.biblical_sciences) ? c.biblical_sciences : [];
        var customsNotes = Array.isArray(c.customs_notes) ? c.customs_notes : [];
        var canonicalLinks = Array.isArray(c.canonical_links) ? c.canonical_links : [];
        var crossReferences = Array.isArray(payload.cross_references) ? payload.cross_references : [];
        var mainIdea = String(c.main_idea || '').trim();
        var referenceLabel = String((payload.reference && payload.reference.label) || '');
        var historical = cleanText(c.historical || '');
        var literary = cleanText(c.literary || '');
        var canonical = cleanText(c.canonical || '');
        var chapterFunction = String(meta.chapter_function || '').trim();
        var bookTheme = String(meta.book_theme || '').trim();
        var historyMatcher = /(fecha|siglo|periodo|reinado|reino|imperio|romano|roma|exilio|postexil|templo|cronolog|dominio|gobierno|provincia|histori)/i;
        var archaeologyMatcher = /(arqueo|excava|inscrip|hallazgo|estela|tablilla|manuscrito|ruina|sitio|osario|sinagoga|templo|calzada|camino|puerto|ciudad|imperio|roma)/i;

        var quickPills = [];
        if (meta.corpus) {
            quickPills.push('<span class="context-pill">' + escapeHtml(meta.corpus) + '</span>');
        }
        if (meta.genre) {
            quickPills.push('<span class="context-pill">' + escapeHtml(meta.genre) + '</span>');
        }
        if (meta.range_label) {
            quickPills.push('<span class="context-pill">Rango: ' + escapeHtml(meta.range_label) + '</span>');
        }
        if (Number(meta.word_count || 0) > 0) {
            quickPills.push('<span class="context-pill">' + Number(meta.word_count || 0) + ' palabras aprox.</span>');
        }

        var introNotes = [];
        if (bookTheme) {
            introNotes.push('<li><strong>Tema del libro:</strong> ' + escapeHtml(bookTheme) + '</li>');
        }
        if (chapterFunction) {
            introNotes.push('<li><strong>Función del pasaje:</strong> ' + escapeHtml(chapterFunction) + '</li>');
        }
        if (literary) {
            introNotes.push('<li><strong>Lectura de la unidad:</strong> ' + escapeHtml(literary) + '</li>');
        }
        if (canonical) {
            introNotes.push('<li><strong>Ubicación en la historia bíblica:</strong> ' + escapeHtml(canonical) + '</li>');
        }
        var introHtml = '' +
            '<div class="card context-hero-card">' +
            '<strong>Introducción del pasaje y del libro</strong>' +
            '<p>' + escapeHtml(referenceLabel || String(c.title || '')) + '</p>' +
            '<div class="context-pill-wrap">' + (quickPills.join('') || '<span class="muted">Sin metadatos disponibles.</span>') + '</div>' +
            '<p class="context-main-idea">' + escapeHtml(mainIdea || c.simple_version || 'Sin introducción disponible.') + '</p>' +
            (introNotes.length ? '<ul class="context-list">' + introNotes.join('') + '</ul>' : '<p class="muted">Sin notas introductorias adicionales.</p>') +
            '</div>';

        var historyRows = sciences.filter(function (row) {
            var haystack = [
                String((row && row.area) || ''),
                String((row && row.note) || ''),
                String((row && row.detail) || ''),
                Array.isArray(row && row.examples) ? row.examples.join(' ') : ''
            ].join(' ');
            return historyMatcher.test(haystack);
        });
        var historicalHtml = '<div class="card"><strong>Fechas y marco histórico</strong>' +
            '<p>' + escapeHtml(historical || 'Sin marco histórico disponible para este pasaje.') + '</p>';
        if (historyRows.length) {
            historicalHtml += '<ul class="context-list">' + historyRows.map(function (row) {
                var detail = row && row.detail ? String(row.detail) : '';
                var examples = row && Array.isArray(row.examples) ? row.examples.filter(Boolean).slice(0, 4) : [];
                return '<li class="context-word-item">' +
                    '<strong>' + escapeHtml(String((row && row.area) || 'Dato histórico')) + '</strong>' +
                    '<small>' + escapeHtml(String((row && row.note) || '')) + '</small>' +
                    (detail ? '<small class="muted">' + escapeHtml(detail) + '</small>' : '') +
                    (examples.length ? '<small class="muted"><strong>Apoyos:</strong> ' + escapeHtml(examples.join(' | ')) + '</small>' : '') +
                    '</li>';
            }).join('') + '</ul>';
        }
        historicalHtml += '</div>';

        var archaeologyRows = sciences.filter(function (row) {
            var haystack = [
                String((row && row.area) || ''),
                String((row && row.note) || ''),
                String((row && row.detail) || ''),
                Array.isArray(row && row.examples) ? row.examples.join(' ') : ''
            ].join(' ');
            return archaeologyMatcher.test(haystack);
        });
        var archaeologyHtml = archaeologyRows.length ? '<ul class="context-list">' + archaeologyRows.map(function (row) {
            var area = row && row.area ? String(row.area) : '';
            var note = row && row.note ? String(row.note) : '';
            var detail = row && row.detail ? String(row.detail) : '';
            var examples = row && Array.isArray(row.examples) ? row.examples.filter(Boolean).slice(0, 4) : [];
            var detailHtml = detail ? ('<small class="muted"><strong>Detalle:</strong> ' + escapeHtml(detail) + '</small>') : '';
            var examplesHtml = examples.length ? ('<small class="muted"><strong>Ejemplos:</strong> ' + escapeHtml(examples.join(' | ')) + '</small>') : '';
            return '<li><strong>' + escapeHtml(area) + ':</strong> ' + escapeHtml(note) + detailHtml + examplesHtml + '</li>';
        }).join('') + '</ul>' : '<p class="muted">No hay datos arqueológicos o históricos verificables destacados para esta selección.</p>';
        var customsHtml = customsNotes.length ? '<ul class="context-list">' + customsNotes.map(function (line) {
            return '<li>' + escapeHtml(line) + '</li>';
        }).join('') + '</ul>' : '<p class="muted">Sin notas de usos y costumbres detectadas.</p>';
        var canonicalLinksHtml = canonicalLinks.length ? '<div class="context-word-item"><strong>Conexiones del mismo tema</strong><small>' + escapeHtml(canonicalLinks.join(' | ')) + '</small></div>' : '';
        var crossRefHtml = crossReferences.length
            ? '<ul class="context-list">' + crossReferences.map(function (row) {
                var terms = Array.isArray(row.match_terms) ? row.match_terms.filter(Boolean) : [];
                var reason = terms.length ? ('Coincidencia: ' + terms.join(', ')) : '';
                var label = String(row.reference || '');
                var excerpt = String(row.text || '');
                return '' +
                    '<li class="context-word-item">' +
                    '<strong>' + escapeHtml(label) + '</strong>' +
                    (excerpt ? '<small>' + escapeHtml(excerpt) + '</small>' : '') +
                    (reason ? '<small class="muted">' + escapeHtml(reason) + '</small>' : '') +
                    '<div class="toolbar">' +
                    '<button class="btn-light js-open-cross-ref" type="button" data-book="' + Number(row.book || 0) + '" data-chapter="' + Number(row.chapter || 0) + '" data-verse="' + Number(row.verse || 0) + '">Abrir referencia</button>' +
                    '</div>' +
                    '</li>';
            }).join('') + '</ul>'
            : '<p class="muted">Sin referencias automáticas para este pasaje.</p>';

        els.contextPanel.innerHTML = '' +
            introHtml +
            historicalHtml +
            '<div class="card"><strong>Pruebas arqueológicas y datos históricos</strong>' + archaeologyHtml + '</div>' +
            '<div class="card"><strong>Costumbres y usos bíblicos</strong>' + customsHtml + '</div>' +
            '<div class="card"><strong>Referencias cruzadas del mismo tema</strong>' + canonicalLinksHtml + crossRefHtml + '</div>';

        els.contextPanel.querySelectorAll('.js-open-cross-ref').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var targetBook = Number(this.getAttribute('data-book') || 0);
                var targetChapter = Number(this.getAttribute('data-chapter') || 0);
                var targetVerse = Number(this.getAttribute('data-verse') || 0);
                if (targetBook < 1 || targetChapter < 1 || targetVerse < 1) {
                    return;
                }
                state.pendingVerse = targetVerse;
                fetchChapter(targetBook, targetChapter);
            });
        });
    }

    function renderCommentsPanel(commentary) {
        if (!els.commentsPanel) {
            return;
        }

        var rows = collectCommentaryRows(commentary);
        if (!rows.length) {
            els.commentsPanel.innerHTML = '<p class="muted">Sin comentarios para esta selección.</p>';
            return;
        }

        var grouped = groupCommentaryRowsBySource(rows);
        var sourceKeys = Object.keys(grouped);
        var selectedKey = normalizeCommentarySourceKey(state.commentarySourceKey || '');
        if (!selectedKey || !grouped[selectedKey]) {
            selectedKey = pickPreferredCommentarySourceKey(grouped);
            state.commentarySourceKey = selectedKey;
        }

        var sourceRows = grouped[selectedKey] || [];
        var selectorHtml = '';
        if (sourceKeys.length > 1) {
            selectorHtml = '' +
                '<label class="commentary-source-picker">Comentario' +
                '<select id="commentarySourceSelect">' +
                sourceKeys.map(function (key) {
                    var meta = grouped[key] && grouped[key][0] ? grouped[key][0] : null;
                    var label = meta ? String(meta.source_label || 'Comentario') : 'Comentario';
                    var count = Array.isArray(grouped[key]) ? grouped[key].length : 0;
                    return '<option value="' + escapeHtml(key) + '"' + (key === selectedKey ? ' selected' : '') + '>' +
                        escapeHtml(label + ' (' + count + ')') +
                        '</option>';
                }).join('') +
                '</select>' +
                '</label>';
        }

        var cards = sourceRows.map(function (row) {
            var title = escapeHtml(row.title || commentaryRangeTitle(row));
            var excerpt = trimCommentaryExcerpt(cleanText(row.html || ''), 1400);
            return '' +
                '<article class="card commentary-card">' +
                '<strong>' + title + '</strong>' +
                renderSourceTag(row) +
                '<div>' + (row.html || '') + '</div>' +
                '<div class="toolbar module-actions">' +
                '<button class="btn-light js-save-commentary-project" type="button" ' +
                'data-book="' + Number(state.currentBook || 0) + '" ' +
                'data-chapter="' + Number(state.currentChapter || 0) + '" ' +
                'data-verse-start="' + Number(commentaryRowVerseStart(row) || 0) + '" ' +
                'data-verse-end="' + Number(commentaryRowVerseEnd(row) || 0) + '" ' +
                'data-reference="' + escapeHtml(toReference(Number(state.currentBook || 0), Number(state.currentChapter || 0), Number(commentaryRowVerseStart(row) || 0), Number(commentaryRowVerseEnd(row) || 0))) + '" ' +
                'data-source="' + escapeHtml(String(row.source_label || 'Comentario bíblico')) + '" ' +
                'data-note="' + escapeHtml((row.title ? row.title + '\n\n' : '') + excerpt) + '" ' +
                'data-commentary-excerpt="' + escapeHtml(excerpt) + '"' +
                '>Agregar a proyecto</button>' +
                '</div>' +
                '</article>';
        });

        els.commentsPanel.innerHTML = selectorHtml + cards.join('');

        var sourceSelect = document.getElementById('commentarySourceSelect');
        if (sourceSelect) {
            sourceSelect.addEventListener('change', function () {
                state.commentarySourceKey = normalizeCommentarySourceKey(String(this.value || ''));
                renderCommentsPanel(commentary);
            });
        }

        els.commentsPanel.querySelectorAll('.js-save-commentary-project').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verseStart = Number(this.getAttribute('data-verse-start') || 0);
                var verseEnd = Number(this.getAttribute('data-verse-end') || verseStart || 0);
                if (book < 1 || chapter < 1 || verseStart < 1 || verseEnd < 1) {
                    notify('No se pudo resolver la referencia del comentario.');
                    return;
                }
                openProjectSaveModal({
                    book: book,
                    chapter: chapter,
                    verseStart: verseStart,
                    verseEnd: verseEnd,
                    reference: String(this.getAttribute('data-reference') || ''),
                    source: String(this.getAttribute('data-source') || 'Comentario bíblico'),
                    note: String(this.getAttribute('data-note') || ''),
                    commentaryExcerpt: String(this.getAttribute('data-commentary-excerpt') || '')
                });
            });
        });
    }

    function renderSourceTag(row) {
        if (!row || !row.source_label) {
            return '';
        }
        return '<small class="muted">Fuente: ' + escapeHtml(row.source_label) + '</small>';
    }

    function collectCommentaryRows(commentary) {
        var rows = [];
        (commentary.book || []).forEach(function (row) {
            rows.push(Object.assign({ commentary_scope: 'book' }, row || {}));
        });
        (commentary.chapter || []).forEach(function (row) {
            rows.push(Object.assign({ commentary_scope: 'chapter' }, row || {}));
        });
        (commentary.verse || []).forEach(function (row) {
            rows.push(Object.assign({ commentary_scope: 'verse' }, row || {}));
        });
        return rows;
    }

    function groupCommentaryRowsBySource(rows) {
        var map = {};
        (Array.isArray(rows) ? rows : []).forEach(function (row) {
            var key = normalizeCommentarySourceKey(String((row && row.source_label) || 'Comentario'));
            if (!map[key]) {
                map[key] = [];
            }
            map[key].push(row);
        });
        return map;
    }

    function normalizeCommentarySourceKey(value) {
        return String(value || '').trim().toLowerCase();
    }

    function pickPreferredCommentarySourceKey(grouped) {
        var keys = Object.keys(grouped || {});
        if (!keys.length) {
            return '';
        }
        var preferredModule = keys.find(function (key) {
            var rows = Array.isArray(grouped[key]) ? grouped[key] : [];
            return rows.some(function (row) {
                var label = String((row && row.source_label) || '').trim().toLowerCase();
                return label.indexOf('expositivo enriquecido') !== -1;
            });
        });
        if (preferredModule) {
            return preferredModule;
        }
        var preferred = keys.find(function (key) {
            var rows = Array.isArray(grouped[key]) ? grouped[key] : [];
            return rows.some(function (row) {
                return String((row && row.source) || '').trim().toLowerCase() === 'generated';
            });
        });
        return preferred || keys[0];
    }

    function commentaryRangeTitle(row) {
        var scope = String((row && row.commentary_scope) || '').trim().toLowerCase();
        if (scope === 'book') {
            return 'Comentario de libro';
        }
        if (scope === 'chapter') {
            return 'Comentario de capítulo';
        }
        return 'Pasaje ' +
            Number(row && row.chapter_begin || state.currentChapter || 0) + ':' + Number(row && row.verse_begin || 0) +
            ' - ' +
            Number(row && row.chapter_end || state.currentChapter || 0) + ':' + Number(row && row.verse_end || 0);
    }

    function commentaryRowVerseStart(row) {
        var scope = String((row && row.commentary_scope) || '').trim().toLowerCase();
        if (scope === 'book' || scope === 'chapter') {
            var range = selectedRange();
            return Number(range.start || 0);
        }
        return Number((row && row.verse_begin) || 0);
    }

    function commentaryRowVerseEnd(row) {
        var scope = String((row && row.commentary_scope) || '').trim().toLowerCase();
        if (scope === 'book' || scope === 'chapter') {
            var range = selectedRange();
            return Number(range.end || 0);
        }
        return Number((row && row.verse_end) || (row && row.verse_begin) || 0);
    }

    function trimCommentaryExcerpt(value, maxLen) {
        var text = String(value || '').trim();
        var limit = Math.max(120, Number(maxLen || 1200));
        if (!text || text.length <= limit) {
            return text;
        }
        return text.slice(0, limit - 1).trim() + '…';
    }

    function renderNotesPanel(payload) {
        if (!state.auth.isLogged) {
            els.notesPanel.innerHTML = buildAccessPromptCardHtml('study_center', true);
            return;
        }
        var range = payload.reference || {};
        var notes = Array.isArray(payload.notes) ? payload.notes : [];
        var selected = selectedRange();
        var fallbackReference = toReference(state.currentBook, state.currentChapter, selected.start, selected.end);
        var referenceLabel = String(range.label || fallbackReference);
        var notebookSeed = pickStudyNotebookSeed(notes);
        var notebookDraft = notebookSeed ? parseStudyNotebookContent(String(notebookSeed.content || '')) : {};
        var notebookId = notebookSeed ? Number(notebookSeed.id || 0) : 0;
        var list = notes.map(function (note) {
            var notebookTag = isStudyNotebookNote(note)
                ? '<span class="study-notebook-note-tag">Cuaderno</span>'
                : '';
            return '' +
                '<div class="card">' +
                '<div class="note-range-head"><strong>' + rangeLabel(note.verse_start, note.verse_end) + '</strong>' + notebookTag + '</div>' +
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
            '<article class="card study-notebook-card">' +
            '<div class="study-notebook-head">' +
            '<strong>Cuaderno de estudio del pasaje</strong>' +
            '<small class="muted">Método guiado: Observación, Interpretación, Aplicación, Oración y Acción.</small>' +
            '</div>' +
            '<form id="studyNotebookForm" class="stack">' +
            '<input id="studyNotebookNoteId" type="hidden" value="' + (notebookId > 0 ? String(notebookId) : '') + '">' +
            '<input id="studyNotebookReference" type="hidden" value="' + escapeHtml(referenceLabel) + '">' +
            '<div class="study-notebook-grid">' +
            '<label class="study-notebook-full">Observación<textarea id="studyNotebookObservation" rows="3" placeholder="¿Qué dice exactamente el texto? Repite palabras clave, estructura y detalles." >' + escapeHtml(String(notebookDraft.observation || '')) + '</textarea></label>' +
            '<label class="study-notebook-full">Interpretación<textarea id="studyNotebookInterpretation" rows="3" placeholder="¿Qué significa en su contexto histórico, literario y teológico?" >' + escapeHtml(String(notebookDraft.interpretation || '')) + '</textarea></label>' +
            '<label class="study-notebook-full">Aplicación<textarea id="studyNotebookApplication" rows="3" placeholder="¿Cómo se aplica hoy a tu vida, familia o ministerio?" >' + escapeHtml(String(notebookDraft.application || '')) + '</textarea></label>' +
            '<label class="study-notebook-full">Oración<textarea id="studyNotebookPrayer" rows="2" placeholder="Redacta una oración basada en el pasaje." >' + escapeHtml(String(notebookDraft.prayer || '')) + '</textarea></label>' +
            '<label class="study-notebook-full">Acción concreta<textarea id="studyNotebookAction" rows="2" placeholder="Define un paso específico para esta semana." >' + escapeHtml(String(notebookDraft.action || '')) + '</textarea></label>' +
            '</div>' +
            '<div class="toolbar study-notebook-actions">' +
            '<button class="btn-primary" type="submit">Guardar cuaderno</button>' +
            '<button class="btn-light" id="studyNotebookToFreeNote" type="button">Pasar a nota libre</button>' +
            '<button class="btn-light" id="studyNotebookClear" type="button">Limpiar</button>' +
            '</div>' +
            '<small class="muted">Se guarda como nota etiquetada: <strong>cuaderno,oiao</strong>.</small>' +
            '</form>' +
            '</article>' +
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

        var notebookForm = document.getElementById('studyNotebookForm');
        if (notebookForm) {
            notebookForm.addEventListener('submit', function (event) {
                event.preventDefault();
                saveStudyNotebook();
            });
        }
        var notebookToFreeNote = document.getElementById('studyNotebookToFreeNote');
        if (notebookToFreeNote) {
            notebookToFreeNote.addEventListener('click', function () {
                applyNotebookTemplateToFreeNote();
            });
        }
        var notebookClear = document.getElementById('studyNotebookClear');
        if (notebookClear) {
            notebookClear.addEventListener('click', function () {
                clearStudyNotebookForm();
            });
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
        if (!state.auth.isLogged) {
            els.linksPanel.innerHTML = buildAccessPromptCardHtml('study_center', true);
            return;
        }
        var range = selectedRange();
        var links = payload.links || [];
        var currentBook = Number(state.currentBook || 1);
        var currentChapter = Number(state.currentChapter || 1);
        var books = Array.isArray(state.books) ? state.books : [];
        var bookOptions = books.map(function (book) {
            var id = Number(book.id || 0);
            if (id < 1) {
                return '';
            }
            var selected = id === currentBook ? ' selected' : '';
            return '<option value="' + id + '"' + selected + '>' + escapeHtml(book.name || ('Libro ' + id)) + '</option>';
        }).join('');
        if (!bookOptions) {
            bookOptions = '<option value="' + currentBook + '">Libro ' + currentBook + '</option>';
        }

        var items = links.map(function (link) {
            var targetRef = toReference(link.to_book, link.to_chapter, link.to_verse_start, link.to_verse_end);
            var note = (link.note || '').trim();
            return '' +
                '<article class="card link-item">' +
                '<div class="link-item-head">' +
                '<strong class="link-item-ref">' + escapeHtml(targetRef) + '</strong>' +
                '</div>' +
                (note ? '<p class="link-item-note">' + escapeHtml(note) + '</p>' : '') +
                '<div class="toolbar link-item-actions">' +
                '<button class="btn-light js-link-open" data-book="' + link.to_book + '" data-chapter="' + link.to_chapter + '" data-verse="' + link.to_verse_start + '">Abrir</button>' +
                '<button class="btn-light js-link-delete" data-id="' + link.id + '">Eliminar</button>' +
                '</div></article>';
        }).join('');

        els.linksPanel.innerHTML = '' +
            '<article class="card link-builder-card">' +
            '<div class="link-builder-head">' +
            '<strong>Crear vínculo</strong>' +
            '<small class="muted">Origen: ' + escapeHtml(toReference(currentBook, currentChapter, range.start, range.end)) + '</small>' +
            '</div>' +
            '<form id="linkForm" class="stack">' +
            '<div class="link-grid">' +
            '<label>Libro destino<select id="linkBookSelect">' + bookOptions + '</select></label>' +
            '<label>Capítulo destino<select id="linkChapterSelect"><option value="' + currentChapter + '">' + currentChapter + '</option></select></label>' +
            '<label>Versículo desde<input id="linkVerseStart" type="number" min="1" value="' + range.start + '" placeholder="Vers. inicio"></label>' +
            '<label>Versículo hasta<input id="linkVerseEnd" type="number" min="1" value="' + range.end + '" placeholder="Vers. fin"></label>' +
            '</div>' +
            '<div class="toolbar link-quick-toolbar">' +
            '<button class="btn-light" id="linkUseSelection" type="button">Usar selección actual</button>' +
            '<button class="btn-light" id="linkPreviewTarget" type="button">Abrir destino</button>' +
            '</div>' +
            '<input id="linkNote" type="text" placeholder="Nota del vínculo (opcional)">' +
            '<button class="btn-primary" type="submit">Guardar vínculo</button>' +
            '</form></article>' +
            '<div class="stack link-list">' +
            '<small class="muted">' + (links.length ? ('Vínculos guardados: ' + links.length) : 'No hay vínculos para este pasaje.') + '</small>' +
            (items || '') +
            '</div>';

        var form = document.getElementById('linkForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            createLink();
        });
        var linkBookSelect = document.getElementById('linkBookSelect');
        var linkChapterSelect = document.getElementById('linkChapterSelect');
        var useSelectionBtn = document.getElementById('linkUseSelection');
        var previewBtn = document.getElementById('linkPreviewTarget');
        if (linkBookSelect) {
            linkBookSelect.addEventListener('change', function () {
                populateLinkChapterOptions(Number(this.value || 0), 1);
            });
        }
        populateLinkChapterOptions(currentBook, currentChapter);
        if (useSelectionBtn) {
            useSelectionBtn.addEventListener('click', function () {
                var selected = selectedRange();
                var startInput = document.getElementById('linkVerseStart');
                var endInput = document.getElementById('linkVerseEnd');
                if (startInput) {
                    startInput.value = String(selected.start);
                }
                if (endInput) {
                    endInput.value = String(selected.end);
                }
                notify('Rango actual cargado como destino.');
            });
        }
        if (previewBtn) {
            previewBtn.addEventListener('click', function () {
                var toBook = linkBookSelect ? Number(linkBookSelect.value || 0) : 0;
                var toChapter = linkChapterSelect ? Number(linkChapterSelect.value || 0) : 0;
                var toVerseStart = Number((document.getElementById('linkVerseStart') || {}).value || 0);
                if (toBook < 1 || toChapter < 1 || toVerseStart < 1) {
                    notify('Completa destino para abrir la vista previa.');
                    return;
                }
                openLinkedPassage(toBook, toChapter, toVerseStart);
            });
        }

        els.linksPanel.querySelectorAll('.js-link-open').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var toBook = Number(this.getAttribute('data-book') || 0);
                var toChapter = Number(this.getAttribute('data-chapter') || 0);
                var toVerse = Number(this.getAttribute('data-verse') || 0);
                openLinkedPassage(toBook, toChapter, toVerse);
            });
        });

        els.linksPanel.querySelectorAll('.js-link-delete').forEach(function (btn) {
            btn.addEventListener('click', function () {
                deleteLink(Number(this.getAttribute('data-id')));
            });
        });
    }

    function populateLinkChapterOptions(book, selectedChapter) {
        var select = document.getElementById('linkChapterSelect');
        var targetBook = Number(book || 0);
        if (!select || targetBook < 1) {
            return Promise.resolve();
        }

        select.disabled = true;
        select.innerHTML = '<option value="">Cargando...</option>';
        return fetch('?route=api.chapters&book=' + targetBook)
            .then(asJson)
            .then(function (data) {
                var chapters = Array.isArray(data.chapters) ? data.chapters : [];
                if (!chapters.length) {
                    chapters = [1];
                }
                var selected = Number(selectedChapter || 0);
                var hasSelected = chapters.some(function (chapter) {
                    return Number(chapter || 0) === selected;
                });
                if (!hasSelected) {
                    selected = Number(chapters[0] || 1);
                }
                select.innerHTML = chapters.map(function (chapter) {
                    var value = Number(chapter || 0);
                    var isSelected = value === selected ? ' selected' : '';
                    return '<option value="' + value + '"' + isSelected + '>' + value + '</option>';
                }).join('');
                select.value = String(selected);
                select.disabled = false;
            })
            .catch(function () {
                select.innerHTML = '<option value="1">1</option>';
                select.value = '1';
                select.disabled = false;
                notify('No se pudo cargar capítulos del libro destino.');
            });
    }

    function openLinkedPassage(book, chapter, verse) {
        var targetBook = Number(book || 0);
        var targetChapter = Number(chapter || 0);
        var targetVerse = Number(verse || 0);
        if (targetBook < 1 || targetChapter < 1) {
            return;
        }

        if (targetBook === Number(state.currentBook || 0) && targetChapter === Number(state.currentChapter || 0)) {
            if (targetVerse > 0) {
                selectSingleVerse(targetVerse, true);
            }
            return;
        }

        state.pendingVerse = targetVerse > 0 ? targetVerse : null;
        fetchChapter(targetBook, targetChapter);
    }

    function renderToolsPanel(payload) {
        if (!state.auth.isLogged) {
            els.toolsPanel.innerHTML = buildAccessPromptCardHtml('advanced_tools', false);
            return;
        }
        var historyRows = payload.history || [];
        var smartHistory = payload.smart_history || {};
        var smartHistoryCard = buildSmartHistoryCardHtml(smartHistory, historyRows);
        var offline = !navigator.onLine;
        var defaultChurch = state.branding.churchName || '';
        var syncStatusText = buildCloudSyncStatusText();
        var statsCard = buildStatsPanelCardHtml();
        hideFavoriteTooltip();

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
            '<div class="card guide-quick-card">' +
            '<strong>Tutorial y ruta de aprendizaje</strong>' +
            '<small class="muted">Abre la guía completa o inicia el tour paso a paso.</small>' +
            '<div class="toolbar">' +
            '<button class="btn-primary js-open-guide-modal" type="button">Ver guía</button>' +
            '<button class="btn-light js-open-guide-tour" type="button">Iniciar tour</button>' +
            '</div>' +
            '</div>' +
            buildFavoriteManagerCardHtml() +
            buildHighlightFilterCardHtml(true) +
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
            '<div class="card export-sync-card">' +
            '<strong>Exportar y sincronizar</strong>' +
            '<div class="export-tools-grid">' +
            '<label>Contenido a exportar' +
            '<select id="exportSourceType">' +
            '<option value="notes">Notas del pasaje</option>' +
            '<option value="outline">Bosquejo generado</option>' +
            '<option value="devotional">Devocional más reciente</option>' +
            '</select>' +
            '</label>' +
            '<label>Iglesia o ministerio' +
            '<input id="exportChurchName" type="text" placeholder="Nombre de tu iglesia" value="' + escapeHtml(defaultChurch) + '">' +
            '</label>' +
            '</div>' +
            '<div class="tool-icon-row export-action-row">' +
            '<button class="icon-tool js-export-image" type="button" title="Exportar imagen PNG" aria-label="Exportar imagen PNG"><img src="assets/icons/camera.svg" alt="" class="ico"></button>' +
            '<button class="icon-tool js-export-pdf" type="button" title="Exportar PDF" aria-label="Exportar PDF"><img src="assets/icons/download.svg" alt="" class="ico"></button>' +
            '</div>' +
            '<small class="muted">Exporta con marca de ' + escapeHtml(state.branding.appName || 'Biblia para todos') + '.</small>' +
            '<div class="sync-cloud-wrap">' +
            '<small id="cloudSyncStatus" class="muted">' + escapeHtml(syncStatusText) + '</small>' +
            (state.auth.isLogged ? (
                '<div class="toolbar sync-cloud-actions">' +
                '<button class="btn-light js-sync-push" type="button">Respaldar en nube</button>' +
                '<button class="btn-light js-sync-pull" type="button">Restaurar respaldo</button>' +
                '</div>'
            ) : (
                '<small class="muted">Inicia sesión para respaldo en nube por cuenta.</small>'
            )) +
            '</div>' +
            '</div>' +
            statsCard +
            smartHistoryCard +
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

        els.toolsPanel.querySelectorAll('.js-open-history-passage').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verseStart = Number(this.getAttribute('data-verse-start') || 0);
                var verseEnd = Number(this.getAttribute('data-verse-end') || verseStart);
                if (book < 1 || chapter < 1 || verseStart < 1 || verseEnd < 1) {
                    return;
                }

                var min = Math.min(verseStart, verseEnd);
                var max = Math.max(verseStart, verseEnd);
                var pending = [];
                var cap = max - min > 80 ? min + 80 : max;
                for (var verse = min; verse <= cap; verse++) {
                    pending.push(verse);
                }
                state.pendingSelectionVerses = pending;
                state.pendingVerse = min;
                fetchChapter(book, chapter);
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

        bindFavoriteControls();

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

        bindHighlightFilterControls();

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

        els.toolsPanel.querySelectorAll('.js-open-guide-modal').forEach(function (btn) {
            btn.addEventListener('click', function () {
                openGuideModal(false);
            });
        });
        els.toolsPanel.querySelectorAll('.js-open-guide-tour').forEach(function (btn) {
            btn.addEventListener('click', function () {
                openGuideModal(true);
            });
        });

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
        bindExportAndSyncControls();
        var statsRefresh = els.toolsPanel.querySelector('.js-stats-refresh');
        if (statsRefresh) {
            statsRefresh.addEventListener('click', function () {
                fetchStatsPanel(true, true);
            });
        }
        refreshFavoriteSnapshot(false);
        fetchStatsPanel(false, true);
        if (state.auth.isLogged) {
            refreshCloudSyncStatus();
        }
    }

    function buildSmartHistoryCardHtml(smartHistory, fallbackHistoryRows) {
        var recentRows = Array.isArray(smartHistory.recent_chapters) && smartHistory.recent_chapters.length
            ? smartHistory.recent_chapters
            : (Array.isArray(fallbackHistoryRows) ? fallbackHistoryRows : []);
        var topChapterRows = Array.isArray(smartHistory.top_chapters) ? smartHistory.top_chapters : [];
        var topPassageRows = Array.isArray(smartHistory.top_passages) ? smartHistory.top_passages : [];

        var recentHtml = recentRows.map(function (row) {
            var visits = Number(row.visits || 0);
            return '<button class="btn-light js-open-history history-smart-btn" data-book="' + Number(row.book || 0) + '" data-chapter="' + Number(row.chapter || 0) + '">' +
                '<span>' + escapeHtml(toReference(row.book, row.chapter, null, null)) + '</span>' +
                (visits > 0 ? '<small class="muted">(' + visits + ')</small>' : '') +
                '</button>';
        }).join('');

        var topChapterHtml = topChapterRows.map(function (row) {
            return '<button class="btn-light js-open-history history-smart-btn" data-book="' + Number(row.book || 0) + '" data-chapter="' + Number(row.chapter || 0) + '">' +
                '<span>' + escapeHtml(toReference(row.book, row.chapter, null, null)) + '</span>' +
                '<small class="history-smart-badge">' + Number(row.visits || 0) + ' lecturas</small>' +
                '</button>';
        }).join('');

        var topPassageHtml = topPassageRows.map(function (row) {
            return '<button class="btn-light js-open-history-passage history-smart-btn" data-book="' + Number(row.book || 0) + '" data-chapter="' + Number(row.chapter || 0) + '" data-verse-start="' + Number(row.verse_start || 0) + '" data-verse-end="' + Number(row.verse_end || 0) + '">' +
                '<span>' + escapeHtml(toReference(row.book, row.chapter, row.verse_start, row.verse_end)) + '</span>' +
                '<small class="history-smart-badge">' + Number(row.hits || 0) + ' lecturas</small>' +
                '</button>';
        }).join('');

        return '' +
            '<div class="card">' +
            '<strong>Historial inteligente</strong>' +
            '<div class="history-smart-grid">' +
            '<div class="history-smart-col">' +
            '<small class="muted">Últimos capítulos</small>' +
            '<div class="stack">' + (recentHtml || '<span class="muted">Sin historial.</span>') + '</div>' +
            '</div>' +
            '<div class="history-smart-col">' +
            '<small class="muted">Capítulos más leídos</small>' +
            '<div class="stack">' + (topChapterHtml || '<span class="muted">Sin datos todavía.</span>') + '</div>' +
            '</div>' +
            '<div class="history-smart-col">' +
            '<small class="muted">Pasajes más leídos</small>' +
            '<div class="stack">' + (topPassageHtml || '<span class="muted">Selecciona pasajes para entrenar este historial.</span>') + '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
    }

    function buildStatsPanelCardHtml() {
        var loading = state.statsLoading === true;
        var hasStats = !!(state.statsPanel && typeof state.statsPanel === 'object');
        var stats = hasStats ? state.statsPanel : {};
        var reading = stats.reading && typeof stats.reading === 'object' ? stats.reading : {};
        var chapters = stats.chapters && typeof stats.chapters === 'object' ? stats.chapters : {};
        var trendRows = Array.isArray(stats.week_daily) ? stats.week_daily : [];
        var themesRows = Array.isArray(stats.themes_top) ? stats.themes_top : [];

        var todayMinutes = Number(reading.today_minutes || 0);
        var weekMinutes = Number(reading.week_minutes || 0);
        var streak = Number(reading.streak_days || 0);
        var longest = Number(reading.longest_streak_days || 0);
        var chaptersWeek = Number(chapters.week_distinct || 0);
        var visitsWeek = Number(chapters.week_visits || 0);

        var body = '';
        if (!hasStats) {
            if (loading) {
                body = '<p class="muted">Cargando estadísticas...</p>';
            } else if (state.statsError) {
                body = '<p class="muted">' + escapeHtml(state.statsError) + '</p>';
            } else {
                body = '<p class="muted">Aún no hay estadísticas suficientes.</p>';
            }
        } else {
            var themesHtml = themesRows.map(function (row) {
                var key = String(row.theme_key || '').trim();
                var label = key ? formatThemeLabel(key) : 'Tema';
                var hits = Number(row.hits || 0);
                return '<span class="stats-theme-chip">' + escapeHtml(label) + ' (' + hits + ')</span>';
            }).join('');
            if (!themesHtml) {
                themesHtml = '<small class="muted">Busca temas para alimentar esta sección.</small>';
            }

            body = '' +
                '<div class="stats-kpis">' +
                '<div class="stats-kpi"><small class="muted">Lectura hoy</small><strong>' + formatMinutesCompact(todayMinutes) + '</strong></div>' +
                '<div class="stats-kpi"><small class="muted">Lectura semanal</small><strong>' + formatMinutesCompact(weekMinutes) + '</strong></div>' +
                '<div class="stats-kpi"><small class="muted">Racha actual</small><strong>' + streak + ' día(s)</strong></div>' +
                '<div class="stats-kpi"><small class="muted">Racha máxima</small><strong>' + longest + ' día(s)</strong></div>' +
                '<div class="stats-kpi"><small class="muted">Capítulos/semana</small><strong>' + chaptersWeek + '</strong></div>' +
                '<div class="stats-kpi"><small class="muted">Visitas/semana</small><strong>' + visitsWeek + '</strong></div>' +
                '</div>' +
                '<div class="stats-trend">' +
                '<small class="muted">Tendencia (últimos ' + Number(stats.range_days || 7) + ' días)</small>' +
                buildStatsTrendHtml(trendRows) +
                '</div>' +
                '<div class="stats-themes">' +
                '<small class="muted">Temas más estudiados</small>' +
                '<div class="stats-theme-list">' + themesHtml + '</div>' +
                '</div>';
        }

        return '' +
            '<div class="card stats-card">' +
            '<div class="stats-card-head">' +
            '<strong>Panel de estadísticas</strong>' +
            '<button class="btn-light js-stats-refresh" type="button"' + (loading ? ' disabled' : '') + '>Actualizar</button>' +
            '</div>' +
            body +
            '</div>';
    }

    function buildStatsTrendHtml(rows) {
        var list = Array.isArray(rows) ? rows : [];
        if (!list.length) {
            return '<p class="muted">Sin datos aún.</p>';
        }

        var maxSeconds = 0;
        list.forEach(function (row) {
            var sec = Number(row.seconds || 0);
            if (sec > maxSeconds) {
                maxSeconds = sec;
            }
        });

        return '<div class="stats-trend-bars">' + list.map(function (row) {
            var seconds = Number(row.seconds || 0);
            var label = String(row.label || '');
            var minutes = Number(row.minutes || Math.floor(seconds / 60));
            var width = 0;
            if (maxSeconds > 0) {
                width = Math.max(8, Math.round((seconds / maxSeconds) * 100));
            }
            return '' +
                '<div class="stats-trend-row">' +
                '<span>' + escapeHtml(label) + '</span>' +
                '<div class="stats-trend-track"><i style="width:' + width + '%"></i></div>' +
                '<small>' + formatMinutesCompact(minutes) + '</small>' +
                '</div>';
        }).join('') + '</div>';
    }

    function formatMinutesCompact(totalMinutes) {
        var minutes = Math.max(0, Number(totalMinutes || 0));
        if (minutes < 60) {
            return Math.round(minutes) + ' min';
        }
        var h = Math.floor(minutes / 60);
        var m = Math.round(minutes % 60);
        if (m < 1) {
            return h + ' h';
        }
        return h + ' h ' + m + ' min';
    }

    function formatThemeLabel(key) {
        var value = String(key || '').trim();
        if (!value) {
            return 'Tema';
        }
        value = value.replace(/[_\-]+/g, ' ');
        value = value.replace(/\s+/g, ' ').trim();
        return value.charAt(0).toUpperCase() + value.slice(1);
    }

    function fetchStatsPanel(force, rerenderTools) {
        if (state.statsLoading && !force) {
            return;
        }
        if (state.statsLoaded && !force) {
            return;
        }

        state.statsLoading = true;
        if (!force) {
            state.statsError = '';
        }
        var shouldRerender = rerenderTools !== false;

        fetch('?route=api.stats.panel&days=7&top_themes=8')
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo cargar estadísticas.');
                }
                state.statsPanel = res.stats || null;
                state.statsLoading = false;
                state.statsLoaded = true;
                state.statsError = '';
                if (shouldRerender && state.selectionPayload) {
                    renderToolsPanel(state.selectionPayload);
                }
            })
            .catch(function () {
                state.statsLoading = false;
                state.statsLoaded = true;
                state.statsError = 'No se pudo cargar estadísticas.';
                if (shouldRerender && state.selectionPayload) {
                    renderToolsPanel(state.selectionPayload);
                }
            });
    }

    function buildFavoriteManagerCardHtml() {
        var folders = Array.isArray(state.favoriteFolders) ? state.favoriteFolders : [];
        var items = Array.isArray(state.favoriteItems) ? state.favoriteItems : [];
        var verse = getFavoriteTargetVerse();
        var hasSelection = verse > 0;
        var current = state.favoriteCurrent || null;
        var isCurrentFavorite = current &&
            Number(current.book || 0) === Number(state.currentBook) &&
            Number(current.chapter || 0) === Number(state.currentChapter) &&
            Number(current.verse || 0) === Number(verse);
        var activeFolderId = Number(state.favoriteFolderId || 0);

        var folderOptions = folders.map(function (folder) {
            var id = Number(folder.id || 0);
            var selected = id === activeFolderId ? ' selected' : '';
            var count = Number(folder.total || 0);
            var label = (folder.name || ('Carpeta ' + id)) + ' (' + count + ')';
            return '<option value="' + id + '"' + selected + '>' + escapeHtml(label) + '</option>';
        }).join('');
        if (!folderOptions) {
            folderOptions = '<option value="0">Sin carpetas</option>';
        }

        var selectedRef = hasSelection ? toReference(state.currentBook, state.currentChapter, verse, verse) : 'Selecciona un versículo';
        var status = '';
        if (state.favoriteLoading) {
            status = '<small class="muted">Cargando favoritos...</small>';
        } else if (state.favoriteError) {
            status = '<small class="muted">' + escapeHtml(state.favoriteError) + '</small>';
        } else if (isCurrentFavorite) {
            status = '<small class="muted">Actual: guardado en carpeta.</small>';
        } else if (hasSelection) {
            status = '<small class="muted">Actual: no está en favoritos.</small>';
        } else {
            status = '<small class="muted">Selecciona un versículo para guardarlo.</small>';
        }

        var listHtml = items.map(function (item) {
            var ref = toReference(item.book, item.chapter, item.verse, item.verse);
            var createdAt = String(item.created_at || '').trim();
            if (createdAt.length > 16) {
                createdAt = createdAt.slice(0, 16);
            }
            createdAt = createdAt.replace('T', ' ');
            return '' +
                '<div class="favorite-item js-fav-tooltip" data-book="' + Number(item.book || 0) + '" data-chapter="' + Number(item.chapter || 0) + '" data-verse="' + Number(item.verse || 0) + '">' +
                '<div class="favorite-item-main">' +
                '<strong class="favorite-item-ref">' + escapeHtml(ref) + '</strong>' +
                (createdAt ? '<small class="muted">' + escapeHtml(createdAt) + '</small>' : '') +
                '</div>' +
                '<div class="toolbar favorite-item-actions">' +
                '<button class="btn-light js-fav-open" type="button" data-book="' + Number(item.book || 0) + '" data-chapter="' + Number(item.chapter || 0) + '" data-verse="' + Number(item.verse || 0) + '">Abrir</button>' +
                '<button class="btn-light js-fav-remove-item" type="button" data-book="' + Number(item.book || 0) + '" data-chapter="' + Number(item.chapter || 0) + '" data-verse="' + Number(item.verse || 0) + '">Quitar</button>' +
                '</div>' +
                '</div>';
        }).join('');
        if (!listHtml) {
            listHtml = '<p class="muted">Esta carpeta todavía no tiene favoritos.</p>';
        }

        return '' +
            '<div class="card favorite-manager">' +
            '<strong>Favoritos</strong>' +
            '<small class="muted">Referencia: ' + escapeHtml(selectedRef) + '</small>' +
            status +
            '<div class="favorite-manager-row">' +
            '<select class="js-fav-folder">' + folderOptions + '</select>' +
            '<button class="btn-light js-fav-refresh" type="button">Actualizar</button>' +
            '</div>' +
            '<div class="favorite-manager-row">' +
            '<input class="js-fav-folder-name" type="text" maxlength="50" placeholder="Nueva carpeta">' +
            '<button class="btn-light js-fav-folder-create" type="button">Crear</button>' +
            '</div>' +
            '<div class="favorite-manager-row">' +
            '<button class="btn-primary js-fav-save" type="button">Guardar actual</button>' +
            '<button class="btn-light js-fav-remove" type="button">Quitar actual</button>' +
            '</div>' +
            '<div class="favorite-list">' + listHtml + '</div>' +
            '</div>';
    }

    function bindFavoriteControls() {
        if (!els.toolsPanel) {
            return;
        }

        var folderSelect = els.toolsPanel.querySelector('.js-fav-folder');
        if (folderSelect) {
            folderSelect.addEventListener('change', function () {
                state.favoriteFolderId = Number(this.value || 0);
                state.favoriteLoaded = false;
                refreshFavoriteSnapshot(true);
            });
        }

        var refreshBtn = els.toolsPanel.querySelector('.js-fav-refresh');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function () {
                refreshFavoriteSnapshot(true);
            });
        }

        var createInput = els.toolsPanel.querySelector('.js-fav-folder-name');
        var createBtn = els.toolsPanel.querySelector('.js-fav-folder-create');
        if (createInput) {
            createInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    if (createBtn) {
                        createBtn.click();
                    }
                }
            });
        }
        if (createBtn) {
            createBtn.addEventListener('click', function () {
                var name = createInput ? (createInput.value || '').trim() : '';
                if (!name) {
                    notify('Escribe el nombre de la carpeta.');
                    return;
                }
                postForm('api.favorite.folder.create', { name: name }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo crear la carpeta.');
                        return;
                    }
                    var folder = res.folder || {};
                    var created = folder.created === true || Number(folder.created || 0) === 1;
                    state.favoriteFolderId = Number(folder.id || state.favoriteFolderId || 0);
                    state.favoriteLoaded = false;
                    if (createInput) {
                        createInput.value = '';
                    }
                    refreshFavoriteSnapshot(true);
                    notify(created ? 'Carpeta creada.' : 'Carpeta ya existente.');
                }).catch(function () {
                    notify('No se pudo crear la carpeta.');
                });
            });
        }

        var saveBtn = els.toolsPanel.querySelector('.js-fav-save');
        if (saveBtn) {
            saveBtn.addEventListener('click', function () {
                var verse = getFavoriteTargetVerse();
                if (verse < 1) {
                    notify('Selecciona un versículo.');
                    return;
                }
                var wasFavorite = state.favoriteCurrent &&
                    Number(state.favoriteCurrent.book || 0) === Number(state.currentBook) &&
                    Number(state.favoriteCurrent.chapter || 0) === Number(state.currentChapter) &&
                    Number(state.favoriteCurrent.verse || 0) === Number(verse);
                var previousFolderId = wasFavorite ? Number(state.favoriteCurrent.folder_id || 0) : 0;

                postForm('api.favorite.save', {
                    book: state.currentBook,
                    chapter: state.currentChapter,
                    verse: verse,
                    folder_id: Number(state.favoriteFolderId || 0)
                }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo guardar favorito.');
                        return;
                    }
                    var favorite = res.favorite || {};
                    var nextFolderId = Number(favorite.folder_id || state.favoriteFolderId || 0);
                    if (nextFolderId > 0) {
                        state.favoriteFolderId = nextFolderId;
                    }
                    state.favoriteLoaded = false;
                    refreshFavoriteSnapshot(true);

                    if (!wasFavorite) {
                        notify('Favorito guardado.');
                        return;
                    }
                    if (previousFolderId !== nextFolderId) {
                        notify('Favorito movido de carpeta.');
                        return;
                    }
                    notify('Ese versículo ya estaba en la carpeta.');
                }).catch(function () {
                    notify('No se pudo guardar favorito.');
                });
            });
        }

        var removeBtn = els.toolsPanel.querySelector('.js-fav-remove');
        if (removeBtn) {
            removeBtn.addEventListener('click', function () {
                var verse = getFavoriteTargetVerse();
                if (verse < 1) {
                    notify('Selecciona un versículo.');
                    return;
                }
                postForm('api.favorite.remove', {
                    book: state.currentBook,
                    chapter: state.currentChapter,
                    verse: verse
                }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo quitar favorito.');
                        return;
                    }
                    state.favoriteLoaded = false;
                    refreshFavoriteSnapshot(true);
                    notify(res.ok ? 'Favorito eliminado.' : 'No estaba en favoritos.');
                }).catch(function () {
                    notify('No se pudo quitar favorito.');
                });
            });
        }

        els.toolsPanel.querySelectorAll('.js-fav-open').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verse = Number(this.getAttribute('data-verse') || 0);
                if (book < 1 || chapter < 1) {
                    return;
                }
                if (verse > 0) {
                    state.pendingVerse = verse;
                }
                fetchChapter(book, chapter);
            });
        });

        els.toolsPanel.querySelectorAll('.js-fav-remove-item').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verse = Number(this.getAttribute('data-verse') || 0);
                if (book < 1 || chapter < 1 || verse < 1) {
                    return;
                }
                postForm('api.favorite.remove', {
                    book: book,
                    chapter: chapter,
                    verse: verse
                }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo quitar favorito.');
                        return;
                    }
                    state.favoriteLoaded = false;
                    refreshFavoriteSnapshot(true);
                    notify(res.ok ? 'Favorito eliminado.' : 'No estaba en favoritos.');
                }).catch(function () {
                    notify('No se pudo quitar favorito.');
                });
            });
        });

        els.toolsPanel.querySelectorAll('.js-fav-tooltip').forEach(function (item) {
            item.addEventListener('mouseenter', function () {
                showFavoriteTooltipForItem(item);
            });
            item.addEventListener('focusin', function () {
                showFavoriteTooltipForItem(item);
            });
            item.addEventListener('mouseleave', function () {
                hideFavoriteTooltip();
            });
            item.addEventListener('focusout', function () {
                hideFavoriteTooltip();
            });
        });
    }

    function refreshFavoriteSnapshot(force) {
        if (!state.selectionPayload) {
            return;
        }

        var token = favoriteSnapshotTokenForCurrentContext();
        if (!force) {
            if (state.favoriteLoading && state.favoriteSnapshotToken === token) {
                return;
            }
            if (state.favoriteLoaded && state.favoriteSnapshotToken === token) {
                return;
            }
        }

        state.favoriteSnapshotToken = token;
        state.favoriteLoading = true;
        state.favoriteError = '';
        var requestToken = token;

        var params = new URLSearchParams({
            route: 'api.favorite.snapshot',
            book: String(Number(state.currentBook || 0)),
            chapter: String(Number(state.currentChapter || 0)),
            limit: '300'
        });
        var verse = getFavoriteTargetVerse();
        if (verse > 0) {
            params.set('verse', String(verse));
        }
        if (Number(state.favoriteFolderId || 0) > 0) {
            params.set('folder_id', String(Number(state.favoriteFolderId || 0)));
        }

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                if (state.favoriteSnapshotToken !== requestToken) {
                    return;
                }
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'Error');
                }

                state.favoriteFolders = Array.isArray(res.folders) ? res.folders : [];
                state.favoriteItems = Array.isArray(res.favorites) ? res.favorites : [];
                state.favoriteCurrent = res.current || null;
                state.favoriteFolderId = Number(res.selected_folder_id || state.favoriteFolderId || 0);
                state.favoriteLoading = false;
                state.favoriteLoaded = true;
                state.favoriteError = '';
                state.favoriteSnapshotToken = favoriteSnapshotTokenForCurrentContext();

                if (state.selectionPayload) {
                    renderToolsPanel(state.selectionPayload);
                }
            })
            .catch(function () {
                if (state.favoriteSnapshotToken !== requestToken) {
                    return;
                }
                state.favoriteLoading = false;
                state.favoriteLoaded = true;
                state.favoriteError = 'No se pudo cargar favoritos.';
                state.favoriteSnapshotToken = favoriteSnapshotTokenForCurrentContext();

                if (state.selectionPayload) {
                    renderToolsPanel(state.selectionPayload);
                }
            });
    }

    function favoriteSnapshotTokenForCurrentContext() {
        return [
            Number(state.currentBook || 0),
            Number(state.currentChapter || 0),
            Number(getFavoriteTargetVerse() || 0),
            Number(state.favoriteFolderId || 0)
        ].join(':');
    }

    function getFavoriteTargetVerse() {
        if (Array.isArray(state.selectedVerses) && state.selectedVerses.length > 0) {
            return Number(selectedRange().start || 0);
        }

        var ref = state.selectionPayload && state.selectionPayload.reference ? state.selectionPayload.reference : null;
        var verse = ref ? Number(ref.verse_start || ref.verse || 0) : 0;
        return verse > 0 ? verse : 0;
    }

    function saveFavoriteByReference(book, chapter, verse, notifyMessage) {
        var b = Number(book || 0);
        var c = Number(chapter || 0);
        var v = Number(verse || 0);
        if (b < 1 || c < 1 || v < 1) {
            notify('Referencia inválida.');
            return Promise.resolve(false);
        }

        return postForm('api.favorite.save', {
            book: b,
            chapter: c,
            verse: v,
            folder_id: Number(state.favoriteFolderId || 0)
        }).then(function (res) {
            if (!res || res.error) {
                notify((res && res.error) ? res.error : 'No se pudo guardar favorito.');
                return false;
            }

            var favorite = res.favorite || {};
            var nextFolderId = Number(favorite.folder_id || state.favoriteFolderId || 0);
            if (nextFolderId > 0) {
                state.favoriteFolderId = nextFolderId;
            }
            state.favoriteLoaded = false;

            if (state.selectionPayload) {
                refreshFavoriteSnapshot(true);
            }

            notify(notifyMessage || 'Guardado en favoritos.');
            return true;
        }).catch(function () {
            notify('No se pudo guardar favorito.');
            return false;
        });
    }

    function showFavoriteTooltipForItem(item) {
        if (!item) {
            return;
        }

        var book = Number(item.getAttribute('data-book') || 0);
        var chapter = Number(item.getAttribute('data-chapter') || 0);
        var verse = Number(item.getAttribute('data-verse') || 0);
        if (book < 1 || chapter < 1 || verse < 1) {
            return;
        }

        var key = book + ':' + chapter + ':' + verse;
        state.favoriteTooltipKey = key;

        if (state.favoriteVerseCache[key]) {
            renderFavoriteTooltip(item, state.favoriteVerseCache[key]);
            return;
        }

        renderFavoriteTooltip(item, 'Cargando versículo...');
        fetch('?route=api.verse&book=' + book + '&chapter=' + chapter + '&verse=' + verse)
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error('error');
                }
                var row = res.verse || {};
                var text = cleanText(row.text || row.html || '');
                if (!text) {
                    text = 'Sin texto disponible.';
                }
                state.favoriteVerseCache[key] = text;
                if (state.favoriteTooltipKey === key) {
                    renderFavoriteTooltip(item, text);
                }
            })
            .catch(function () {
                state.favoriteVerseCache[key] = 'No se pudo cargar el versículo.';
                if (state.favoriteTooltipKey === key) {
                    renderFavoriteTooltip(item, state.favoriteVerseCache[key]);
                }
            });
    }

    function renderFavoriteTooltip(anchor, text) {
        var tip = document.getElementById('favoriteTooltip');
        if (!tip) {
            tip = document.createElement('div');
            tip.id = 'favoriteTooltip';
            tip.className = 'favorite-tooltip hidden';
            document.body.appendChild(tip);
        }

        tip.textContent = text || '';
        tip.classList.remove('hidden');

        var rect = anchor.getBoundingClientRect();
        var maxWidth = Math.min(420, Math.max(240, window.innerWidth - 24));
        tip.style.maxWidth = String(maxWidth) + 'px';
        tip.style.left = '8px';
        tip.style.top = '8px';

        var tipRect = tip.getBoundingClientRect();
        var left = Math.max(8, Math.min(rect.left, window.innerWidth - tipRect.width - 8));
        var top = rect.top - tipRect.height - 10;
        if (top < 8) {
            top = rect.bottom + 10;
        }
        if (top + tipRect.height > window.innerHeight - 8) {
            top = Math.max(8, window.innerHeight - tipRect.height - 8);
        }

        tip.style.left = Math.round(left) + 'px';
        tip.style.top = Math.round(top) + 'px';
    }

    function hideFavoriteTooltip() {
        state.favoriteTooltipKey = '';
        var tip = document.getElementById('favoriteTooltip');
        if (!tip) {
            return;
        }
        tip.classList.add('hidden');
    }

    function bindHighlightFilterControls() {
        if (!els.toolsPanel) {
            return;
        }

        var filterSelect = els.toolsPanel.querySelector('.js-highlight-filter');
        if (filterSelect) {
            filterSelect.value = normalizeHighlightFilterColor(state.highlightFilterColor);
            filterSelect.addEventListener('change', function () {
                state.highlightFilterColor = normalizeHighlightFilterColor(this.value);
                applyHighlightFilterUI();
                updateHighlightFilterInfoUI();
            });
        }

        var showAllBtn = els.toolsPanel.querySelector('.js-highlight-filter-clear');
        if (showAllBtn) {
            showAllBtn.addEventListener('click', function () {
                state.highlightFilterColor = 'all';
                if (filterSelect) {
                    filterSelect.value = 'all';
                }
                applyHighlightFilterUI();
                updateHighlightFilterInfoUI();
            });
        }
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
            var generatedText = String(res.result.content || '').trim();
            state.generatedByMode[mode] = {
                mode: mode,
                label: generationModeLabel(mode),
                content: generatedText,
                reference: (state.selectionPayload && state.selectionPayload.reference && state.selectionPayload.reference.label) ? state.selectionPayload.reference.label : '',
                generated_at: res.result.generated_at || ''
            };
            output.innerHTML = '<strong>' + escapeHtml(generationModeLabel(mode)) + '</strong>' +
                '<p>' + escapeHtml(generatedText) + '</p>' +
                '<small class="muted">' + (res.result.cached ? 'Resultado en caché' : 'Resultado actualizado') + '</small>';
        }).catch(function () {
            var output = document.getElementById('toolsOutput');
            output.innerHTML = '<p class="muted">No disponible sin conexión.</p>';
        });
    }

    function generationModeLabel(mode) {
        var key = String(mode || '').trim();
        if (key === 'explicacion') {
            return 'Explicación';
        }
        if (key === 'palabras_clave') {
            return 'Palabras clave';
        }
        if (key === 'bosquejo') {
            return 'Bosquejo';
        }
        if (key === 'aplicacion_practica') {
            return 'Aplicación práctica';
        }
        return 'Contenido generado';
    }

    function bindExportAndSyncControls() {
        if (!els.toolsPanel) {
            return;
        }

        var sourceSelect = document.getElementById('exportSourceType');
        var imageBtn = els.toolsPanel.querySelector('.js-export-image');
        var pdfBtn = els.toolsPanel.querySelector('.js-export-pdf');
        var syncPushBtn = els.toolsPanel.querySelector('.js-sync-push');
        var syncPullBtn = els.toolsPanel.querySelector('.js-sync-pull');

        if (imageBtn && sourceSelect) {
            imageBtn.addEventListener('click', function () {
                var sourceType = String(sourceSelect.value || 'notes');
                var churchNameInput = document.getElementById('exportChurchName');
                var churchName = String((churchNameInput && churchNameInput.value) || state.branding.churchName || '').trim();
                resolveExportSource(sourceType).then(function (source) {
                    return createBrandedExportImage(source, churchName);
                }).then(function (result) {
                    downloadBlob(result.blob, buildExportImageFilename(sourceType));
                    notify('Imagen exportada.');
                }).catch(function (err) {
                    var message = err && err.message ? err.message : 'No se pudo exportar imagen.';
                    notify(message);
                });
            });
        }

        if (pdfBtn && sourceSelect) {
            pdfBtn.addEventListener('click', function () {
                var sourceType = String(sourceSelect.value || 'notes');
                var churchNameInput = document.getElementById('exportChurchName');
                var churchName = String((churchNameInput && churchNameInput.value) || state.branding.churchName || '').trim();
                resolveExportSource(sourceType).then(function (source) {
                    return downloadExportPdf(source, churchName, sourceType);
                }).then(function () {
                    notify('PDF exportado.');
                }).catch(function (err) {
                    var message = err && err.message ? err.message : 'No se pudo exportar PDF.';
                    notify(message);
                });
            });
        }

        if (syncPushBtn) {
            syncPushBtn.addEventListener('click', function () {
                postForm('api.sync.push', {}).then(function (res) {
                    if (res.error) {
                        notify(res.error);
                        return;
                    }
                    state.cloudSyncStatus = res.sync || state.cloudSyncStatus;
                    updateCloudSyncStatusUi();
                    notify('Respaldo en nube actualizado.');
                }).catch(function () {
                    notify('No se pudo respaldar en nube.');
                });
            });
        }

        if (syncPullBtn) {
            syncPullBtn.addEventListener('click', function () {
                if (!window.confirm('Se restaurará el último respaldo en nube y se reemplazarán tus datos actuales.')) {
                    return;
                }
                postForm('api.sync.pull', {}).then(function (res) {
                    if (res.error) {
                        notify(res.error);
                        return;
                    }
                    state.cloudSyncStatus = res.sync || state.cloudSyncStatus;
                    updateCloudSyncStatusUi();
                    state.favoriteLoaded = false;
                    state.statsLoaded = false;
                    state.statsPanel = null;
                    state.statsError = '';
                    notify('Respaldo restaurado desde nube.');
                    fetchChapter(state.currentBook, state.currentChapter);
                    fetchReadingPlanStatus();
                }).catch(function () {
                    notify('No se pudo restaurar el respaldo en nube.');
                });
            });
        }
    }

    function buildCloudSyncStatusText() {
        if (!state.auth.isLogged) {
            return 'Sincronización en nube disponible al iniciar sesión.';
        }
        if (!state.cloudSyncStatus) {
            return 'Consultando estado de respaldo en nube...';
        }

        if (!state.cloudSyncStatus.has_backup) {
            return 'Aún no tienes respaldo en nube. Pulsa "Respaldar en nube".';
        }

        var updatedAt = String(state.cloudSyncStatus.updated_at || '').trim();
        var parts = [];
        if (updatedAt !== '') {
            parts.push('Último respaldo: ' + updatedAt);
        }
        var counts = state.cloudSyncStatus.counts || {};
        var notes = Number(counts.notes || 0);
        var favorites = Number(counts.favorites || 0);
        var plans = Number(counts.reading_plans || 0);
        parts.push('Notas ' + notes);
        parts.push('Favoritos ' + favorites);
        parts.push('Planes ' + plans);
        return parts.join(' · ');
    }

    function refreshCloudSyncStatus() {
        if (!state.auth.isLogged) {
            return;
        }
        fetch('?route=api.sync.status').then(asJson).then(function (res) {
            if (!res || res.error) {
                return;
            }
            state.cloudSyncStatus = res.sync || null;
            updateCloudSyncStatusUi();
        }).catch(function () {
            // ignore
        });
    }

    function updateCloudSyncStatusUi() {
        var node = document.getElementById('cloudSyncStatus');
        if (!node) {
            return;
        }
        node.textContent = buildCloudSyncStatusText();
    }

    function resolveExportSource(sourceType) {
        var key = String(sourceType || '').trim();
        if (key === 'outline') {
            return Promise.resolve(buildOutlineExportSource());
        }
        if (key === 'devotional') {
            return buildLatestDevotionalExportSource();
        }
        return Promise.resolve(buildNotesExportSource());
    }

    function buildNotesExportSource() {
        if (!state.selectionPayload) {
            throw new Error('Selecciona un pasaje para exportar notas.');
        }
        var notes = Array.isArray(state.selectionPayload.notes) ? state.selectionPayload.notes : [];

        var blocks = [];
        if (notes.length) {
            notes.forEach(function (note, index) {
                var verseStart = Number(note.verse_start || note.verse || 0);
                var verseEnd = Number(note.verse_end || verseStart || 0);
                var ref = toReference(
                    Number(note.book || state.currentBook),
                    Number(note.chapter || state.currentChapter),
                    verseStart,
                    verseEnd
                );
                var content = cleanText(note.content || '');
                var tags = String(note.tags || '').trim();
                var block = (index + 1) + '. ' + ref + '\n' + content;
                if (tags !== '') {
                    block += '\nEtiquetas: ' + tags;
                }
                blocks.push(block.trim());
            });
        } else {
            var selected = selectedRows();
            var passageText = selected.map(function (row) {
                return cleanText(row.scripture_text || row.scripture_html || '');
            }).join(' ');
            blocks.push('No hay notas guardadas en este pasaje.');
            if (passageText) {
                blocks.push('Texto del pasaje:\n' + passageText);
            }
        }

        var reference = (state.selectionPayload.reference && state.selectionPayload.reference.label)
            ? state.selectionPayload.reference.label
            : toReference(state.currentBook, state.currentChapter, null, null);

        return {
            source_type: 'notas',
            title: 'Notas del pasaje',
            reference: reference,
            content: blocks.join('\n\n')
        };
    }

    function buildOutlineExportSource() {
        var entry = state.generatedByMode.bosquejo || null;
        if (!entry || !entry.content) {
            throw new Error('Primero genera un bosquejo del pasaje.');
        }
        return {
            source_type: 'bosquejo',
            title: 'Bosquejo bíblico',
            reference: entry.reference || '',
            content: String(entry.content || '').trim()
        };
    }

    function buildLatestDevotionalExportSource() {
        return fetchLatestDevotionalExport().then(function (row) {
            if (!row) {
                throw new Error('No hay devocionales disponibles para exportar.');
            }
            return {
                source_type: 'devocional',
                title: 'Devocional diario',
                reference: String(row.reference || ''),
                content: devotionalToPlainText(row)
            };
        });
    }

    function fetchLatestDevotionalExport() {
        if (state.latestDevotionalExport) {
            return Promise.resolve(state.latestDevotionalExport);
        }
        return fetch('?route=api.devotional.history&limit=1').then(asJson).then(function (res) {
            if (!res || res.error) {
                return null;
            }
            var rows = Array.isArray(res.rows) ? res.rows : [];
            state.latestDevotionalExport = rows.length ? rows[0] : null;
            return state.latestDevotionalExport;
        });
    }

    function devotionalToPlainText(row) {
        var sections = (row && row.sections && typeof row.sections === 'object') ? row.sections : {};
        var lines = [];
        lines.push('Versículo base: ' + String(sections.versiculo_base || ''));
        lines.push('');
        lines.push('Contexto textual: ' + String(sections.contexto_textual || ''));
        lines.push('');
        lines.push('Contexto histórico: ' + String(sections.contexto_historico || ''));
        lines.push('');
        lines.push('Contexto literario: ' + String(sections.contexto_literario || ''));
        lines.push('');
        lines.push('Aplicación: ' + String(sections.tip_1_por_ciento || ''));
        lines.push('');
        lines.push('Oración sugerida: ' + String(sections.oracion_sugerida || ''));
        return lines.join('\n').trim();
    }

    function createBrandedExportImage(source, churchName) {
        var background = state.selectedBackground || 'assets/backgrounds/bg-01.svg';
        var logoPath = state.branding.logoPath || 'assets/branding/logo_bibliasoft.png';
        var appName = state.branding.appName || 'Biblia para todos';
        var church = String(churchName || state.branding.churchName || '').trim();
        var content = String((source && source.content) || '').trim();
        var title = String((source && source.title) || 'Documento bíblico').trim();
        var reference = String((source && source.reference) || '').trim();

        var canvas = document.createElement('canvas');
        canvas.width = 1200;
        canvas.height = 1600;
        var ctx = canvas.getContext('2d');

        return Promise.all([loadImageOptional(background), loadImageOptional(logoPath)]).then(function (items) {
            var bg = items[0];
            var logo = items[1];

            if (bg) {
                ctx.drawImage(bg, 0, 0, canvas.width, canvas.height);
            } else {
                ctx.fillStyle = '#193349';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
            }
            ctx.fillStyle = 'rgba(9, 18, 29, 0.62)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            if (logo) {
                var maxW = 160;
                var maxH = 160;
                var ratio = Math.min(maxW / Math.max(1, logo.width), maxH / Math.max(1, logo.height));
                var w = Math.max(1, Math.round(logo.width * ratio));
                var h = Math.max(1, Math.round(logo.height * ratio));
                ctx.drawImage(logo, canvas.width - w - 56, 42, w, h);
            }

            ctx.fillStyle = '#ffffff';
            ctx.font = '700 46px Segoe UI, Arial, sans-serif';
            ctx.fillText(appName, 56, 92);
            if (church !== '') {
                ctx.font = '400 30px Segoe UI, Arial, sans-serif';
                ctx.fillText(church, 56, 132);
            }

            ctx.font = '700 52px Segoe UI, Arial, sans-serif';
            var cursorY = drawWrappedTextBlock(ctx, title, 56, 260, 1088, 62, 4);
            if (reference !== '') {
                ctx.font = '600 34px Segoe UI, Arial, sans-serif';
                cursorY = drawWrappedTextBlock(ctx, reference, 56, cursorY + 12, 1088, 42, 3);
            }

            ctx.font = '400 32px Segoe UI, Arial, sans-serif';
            drawWrappedTextBlock(ctx, content, 56, cursorY + 24, 1088, 44, 22);

            ctx.font = '400 26px Segoe UI, Arial, sans-serif';
            ctx.fillText('Generado: ' + localDateYmd(new Date()), 56, canvas.height - 52);

            return new Promise(function (resolve, reject) {
                canvas.toBlob(function (blob) {
                    if (!blob) {
                        reject(new Error('No se pudo crear la imagen.'));
                        return;
                    }
                    resolve({
                        blob: blob,
                        dataUrl: canvas.toDataURL('image/png')
                    });
                }, 'image/png');
            });
        });
    }

    function drawWrappedTextBlock(ctx, text, x, y, maxWidth, lineHeight, maxLines) {
        var words = String(text || '').split(/\s+/);
        var line = '';
        var currentY = Number(y || 0);
        var printed = 0;
        var cap = Math.max(1, Number(maxLines || 20));

        for (var i = 0; i < words.length; i++) {
            var word = words[i];
            if (!word) {
                continue;
            }
            var candidate = line ? (line + ' ' + word) : word;
            if (ctx.measureText(candidate).width <= maxWidth) {
                line = candidate;
                continue;
            }

            if (line) {
                ctx.fillText(line, x, currentY);
                printed++;
                if (printed >= cap) {
                    return currentY;
                }
                currentY += lineHeight;
                line = word;
            } else {
                ctx.fillText(word, x, currentY);
                printed++;
                if (printed >= cap) {
                    return currentY;
                }
                currentY += lineHeight;
                line = '';
            }
        }

        if (line && printed < cap) {
            ctx.fillText(line, x, currentY);
        }
        return currentY;
    }

    function loadImageOptional(src) {
        var path = String(src || '').trim();
        if (!path) {
            return Promise.resolve(null);
        }
        return new Promise(function (resolve) {
            var img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = function () {
                resolve(img);
            };
            img.onerror = function () {
                resolve(null);
            };
            img.src = path;
        });
    }

    function buildExportImageFilename(sourceType) {
        var key = String(sourceType || 'documento').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-+|-+$)/g, '');
        if (!key) {
            key = 'documento';
        }
        return key + '-' + localDateYmd(new Date()) + '.png';
    }

    function buildExportPdfFilename(sourceType) {
        var key = String(sourceType || 'documento').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-+|-+$)/g, '');
        if (!key) {
            key = 'documento';
        }
        return key + '-' + localDateYmd(new Date()) + '.pdf';
    }

    function downloadExportPdf(source, churchName, sourceType) {
        var fields = {
            source_type: String((source && source.source_type) || sourceType || 'documento'),
            title: String((source && source.title) || 'Documento bíblico'),
            reference: String((source && source.reference) || ''),
            content: String((source && source.content) || ''),
            church_name: String(churchName || state.branding.churchName || '')
        };

        if (!fields.title.trim() || !fields.content.trim()) {
            return Promise.reject(new Error('No hay contenido suficiente para exportar PDF.'));
        }

        try {
            submitHiddenPostForm('?route=api.export.download', fields);
            return Promise.resolve();
        } catch (err) {
            return Promise.reject(new Error('No se pudo iniciar la descarga del PDF.'));
        }
    }

    function submitHiddenPostForm(actionUrl, fields) {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = String(actionUrl || '');
        form.style.display = 'none';

        var entries = fields && typeof fields === 'object' ? fields : {};
        Object.keys(entries).forEach(function (key) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = String(entries[key] == null ? '' : entries[key]);
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }

    function isStudyNotebookNote(note) {
        var row = note || {};
        var tags = String(row.tags || '').toLowerCase();
        var content = String(row.content || '');
        if (tags.indexOf('cuaderno') !== -1 || tags.indexOf('oiao') !== -1) {
            return true;
        }
        if (content.indexOf('[CUADERNO BIBLIASOFT]') !== -1) {
            return true;
        }
        return /observaci[oó]n\s*:/i.test(content) && /interpretaci[oó]n\s*:/i.test(content);
    }

    function pickStudyNotebookSeed(notes) {
        var rows = Array.isArray(notes) ? notes : [];
        for (var i = 0; i < rows.length; i += 1) {
            if (isStudyNotebookNote(rows[i])) {
                return rows[i];
            }
        }
        return null;
    }

    function parseStudyNotebookContent(content) {
        var text = String(content || '').replace(/\r/g, '');
        var fields = {
            observation: '',
            interpretation: '',
            application: '',
            prayer: '',
            action: ''
        };
        var marker = text.indexOf('[CUADERNO BIBLIASOFT]');
        if (marker >= 0) {
            text = text.slice(marker);
        }
        var lines = text.split('\n');
        var activeKey = '';
        lines.forEach(function (rawLine) {
            var line = String(rawLine || '');
            var trimmed = line.trim();
            if (!trimmed) {
                return;
            }
            if (/^pasaje\s*:/i.test(trimmed) || /^\[cuaderno bibliasoft\]/i.test(trimmed)) {
                return;
            }
            var headingMatch = trimmed.match(/^(observaci[oó]n|interpretaci[oó]n|aplicaci[oó]n|oraci[oó]n|acci[oó]n(?:\s+concreta)?)\s*:\s*(.*)$/i);
            if (headingMatch) {
                var heading = String(headingMatch[1] || '').toLowerCase();
                if (heading.indexOf('observ') === 0) {
                    activeKey = 'observation';
                } else if (heading.indexOf('interpret') === 0) {
                    activeKey = 'interpretation';
                } else if (heading.indexOf('aplica') === 0) {
                    activeKey = 'application';
                } else if (heading.indexOf('orac') === 0) {
                    activeKey = 'prayer';
                } else if (heading.indexOf('acci') === 0) {
                    activeKey = 'action';
                } else {
                    activeKey = '';
                }
                var sameLineValue = trimNotebookSection(String(headingMatch[2] || ''));
                if (activeKey && sameLineValue !== '') {
                    fields[activeKey] = sameLineValue;
                }
                return;
            }
            if (!activeKey) {
                return;
            }
            if (fields[activeKey] !== '') {
                fields[activeKey] += '\n';
            }
            fields[activeKey] += line;
        });

        fields.observation = trimNotebookSection(fields.observation);
        fields.interpretation = trimNotebookSection(fields.interpretation);
        fields.application = trimNotebookSection(fields.application);
        fields.prayer = trimNotebookSection(fields.prayer);
        fields.action = trimNotebookSection(fields.action);
        return fields;
    }

    function trimNotebookSection(value) {
        return String(value || '').replace(/\s+$/g, '').replace(/^\s+/g, '');
    }

    function buildStudyNotebookContent(referenceLabel, draft) {
        var data = draft || {};
        var observation = trimNotebookSection(data.observation || '');
        var interpretation = trimNotebookSection(data.interpretation || '');
        var application = trimNotebookSection(data.application || '');
        var prayer = trimNotebookSection(data.prayer || '');
        var action = trimNotebookSection(data.action || '');
        var safeReference = trimNotebookSection(referenceLabel || '') || toReference(
            Number(state.currentBook || 1),
            Number(state.currentChapter || 1),
            Number(selectedRange().start || 1),
            Number(selectedRange().end || 1)
        );

        return [
            '[CUADERNO BIBLIASOFT]',
            'Pasaje: ' + safeReference,
            '',
            'Observación:',
            observation || '-',
            '',
            'Interpretación:',
            interpretation || '-',
            '',
            'Aplicación:',
            application || '-',
            '',
            'Oración:',
            prayer || '-',
            '',
            'Acción concreta:',
            action || '-'
        ].join('\n');
    }

    function collectStudyNotebookDraft() {
        var read = function (id) {
            var node = document.getElementById(id);
            return trimNotebookSection(node ? node.value : '');
        };
        return {
            noteId: Number((document.getElementById('studyNotebookNoteId') || {}).value || 0),
            reference: trimNotebookSection((document.getElementById('studyNotebookReference') || {}).value || ''),
            observation: read('studyNotebookObservation'),
            interpretation: read('studyNotebookInterpretation'),
            application: read('studyNotebookApplication'),
            prayer: read('studyNotebookPrayer'),
            action: read('studyNotebookAction')
        };
    }

    function clearStudyNotebookForm() {
        ['studyNotebookObservation', 'studyNotebookInterpretation', 'studyNotebookApplication', 'studyNotebookPrayer', 'studyNotebookAction'].forEach(function (id) {
            var node = document.getElementById(id);
            if (node) {
                node.value = '';
            }
        });
    }

    function mergeTagCsv(existing, additions) {
        var tokens = {};
        var list = [];
        [String(existing || ''), String(additions || '')].forEach(function (chunk) {
            chunk.split(',').forEach(function (raw) {
                var token = trimNotebookSection(raw).toLowerCase();
                if (!token || tokens[token]) {
                    return;
                }
                tokens[token] = true;
                list.push(token);
            });
        });
        return list.join(',');
    }

    function applyNotebookTemplateToFreeNote() {
        var noteField = document.getElementById('noteContent');
        if (!noteField) {
            return;
        }
        var draft = collectStudyNotebookDraft();
        noteField.value = buildStudyNotebookContent(draft.reference, draft);
        var tagsField = document.getElementById('noteTags');
        if (tagsField) {
            tagsField.value = mergeTagCsv(tagsField.value, 'cuaderno,oiao');
        }
        noteField.focus();
        noteField.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        notify('Plantilla enviada a nota libre.');
    }

    function saveStudyNotebook() {
        var draft = collectStudyNotebookDraft();
        if (!draft.observation && !draft.interpretation && !draft.application && !draft.prayer && !draft.action) {
            notify('Completa al menos un campo del cuaderno.');
            return;
        }
        var range = selectedRange();
        var content = buildStudyNotebookContent(draft.reference, draft);
        var tags = 'cuaderno,oiao';
        var request = null;
        if (draft.noteId > 0) {
            request = postForm('api.note.update', {
                id: draft.noteId,
                content: content,
                tags: tags
            });
        } else {
            request = postForm('api.note.create', {
                book: state.currentBook,
                chapter: state.currentChapter,
                verse_start: range.start,
                verse_end: range.end,
                content: content,
                tags: tags
            });
        }
        request.then(function (res) {
            if (res && res.error) {
                notify(res.error);
                return;
            }
            notify('Cuaderno guardado.');
            loadSelectionData();
        }).catch(function () {
            notify('No se pudo guardar el cuaderno.');
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
        var toBook = Number(((document.getElementById('linkBookSelect') || document.getElementById('linkBook')) || {}).value || 0);
        var toChapter = Number(((document.getElementById('linkChapterSelect') || document.getElementById('linkChapter')) || {}).value || 0);
        var toVerseStart = Number(document.getElementById('linkVerseStart').value || 0);
        var toVerseEnd = Number(document.getElementById('linkVerseEnd').value || toVerseStart);
        var note = (document.getElementById('linkNote').value || '').trim();

        if (!toBook || !toChapter || !toVerseStart) {
            notify('Completa referencia destino.');
            return;
        }
        if (toVerseEnd < toVerseStart) {
            var tmp = toVerseStart;
            toVerseStart = toVerseEnd;
            toVerseEnd = tmp;
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
        scrollToVerse(restored[0], true);
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

    function buildPrettySharePayload() {
        var rows = selectedRows();
        if (!rows.length) {
            return { error: 'Selecciona al menos un versículo.' };
        }

        var range = selectedRange();
        var reference = toReference(state.currentBook, state.currentChapter, range.start, range.end);
        var paragraph = rows.map(function (row) {
            return cleanText(row.scripture_text || row.scripture_html || '');
        }).join(' ');
        paragraph = paragraph.replace(/\s+/g, ' ').trim();

        var maxLen = 520;
        var preview = paragraph;
        if (preview.length > maxLen) {
            preview = preview.slice(0, maxLen).trim() + '...';
        }

        var appName = String((state.branding && state.branding.appName) ? state.branding.appName : 'Biblia para todos');
        var text = '*' + reference + '*\n\n"' + preview + '"\n\n' + appName;
        return {
            reference: reference,
            preview: preview,
            text: text,
            url: buildSharePassageUrl(range.start)
        };
    }

    function buildSharePassageUrl(verse) {
        var book = Number(state.currentBook || 0);
        var chapter = Number(state.currentChapter || 0);
        var verseNum = Number(verse || 0);
        var base = window.location.origin + window.location.pathname;
        var params = new URLSearchParams({
            route: 'reader',
            book: String(book > 0 ? book : 1),
            chapter: String(chapter > 0 ? chapter : 1)
        });
        if (verseNum > 0) {
            params.set('verse', String(verseNum));
        }
        return base + '?' + params.toString();
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
                closeDrawers({ keepGuide: true });
            })
            .catch(function () {
                notify('No se pudo cargar el libro.');
            });
    }

    function fetchChapter(book, chapter) {
        stopAudioPlayback(true);
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
                resetParallelChapterState();
                renderBooks(state.books);
                renderChapters();
                renderVerses();
                updatePreachControlsFromChapter();
                renderAudioControls();
                if (state.settings.parallelMode) {
                    loadParallelChapterData(true, true);
                }
                if (state.pendingSelectionVerses && state.pendingSelectionVerses.length) {
                    applyPendingSelection();
                } else if (state.pendingVerse) {
                    var pending = Number(state.pendingVerse || 0);
                    selectSingleVerse(pending, true);
                    state.pendingVerse = null;
                }
                els.title.textContent = data.book_name + ' ' + data.chapter;
                history.replaceState(null, '', '?route=reader&book=' + state.currentBook + '&chapter=' + state.currentChapter);
                persistReaderState();
                if (!refreshReadingPlanIfDateChanged()) {
                    maybeAutoCompleteCurrentPlanChapter();
                    renderReadingPlanCard();
                }
                state.readingTracker.lastTickMs = Date.now();
                closeDrawers({ keepGuide: true });
            })
            .catch(function () {
                notify('No se pudo cargar el capítulo.');
            });
    }

    function initReadingTelemetry() {
        if (state.readingTracker.intervalId) {
            return;
        }

        state.readingTracker.lastTickMs = Date.now();
        state.readingTracker.intervalId = window.setInterval(function () {
            readingTelemetryTick();
            flushReadingTelemetry(false);
        }, 15000);

        document.addEventListener('visibilitychange', function () {
            readingTelemetryTick();
            if (document.hidden) {
                flushReadingTelemetry(true);
            } else {
                state.readingTracker.lastTickMs = Date.now();
            }
        });

        window.addEventListener('focus', function () {
            state.readingTracker.lastTickMs = Date.now();
        });

        window.addEventListener('blur', function () {
            readingTelemetryTick();
            flushReadingTelemetry(true);
        });

        window.addEventListener('pagehide', function () {
            readingTelemetryTick();
            flushReadingTelemetry(true);
        });
    }

    function readingTelemetryTick() {
        var now = Date.now();
        var lastTick = Number(state.readingTracker.lastTickMs || 0);
        if (lastTick < 1) {
            state.readingTracker.lastTickMs = now;
            return;
        }

        var elapsedSeconds = Math.floor((now - lastTick) / 1000);
        state.readingTracker.lastTickMs = now;
        if (elapsedSeconds < 1) {
            return;
        }
        if (!isReadingTelemetryActive()) {
            return;
        }
        queueReadingSeconds(elapsedSeconds);
    }

    function isReadingTelemetryActive() {
        if (document.hidden) {
            return false;
        }
        if (Number(state.currentBook || 0) < 1 || Number(state.currentChapter || 0) < 1) {
            return false;
        }
        if (!Array.isArray(state.verses) || state.verses.length < 1) {
            return false;
        }
        return true;
    }

    function queueReadingSeconds(seconds) {
        var safeSeconds = Number(seconds || 0);
        if (!Number.isFinite(safeSeconds) || safeSeconds < 1) {
            return;
        }
        safeSeconds = Math.max(1, Math.min(90, Math.round(safeSeconds)));
        state.readingTracker.unsentSeconds = Math.min(12 * 3600, Number(state.readingTracker.unsentSeconds || 0) + safeSeconds);
    }

    function flushReadingTelemetry(force) {
        var minimum = force ? 1 : 20;
        var pending = Number(state.readingTracker.unsentSeconds || 0);
        if (pending < minimum) {
            return Promise.resolve(false);
        }
        if (state.readingTracker.sending) {
            return Promise.resolve(false);
        }
        if (!navigator.onLine) {
            return Promise.resolve(false);
        }

        state.readingTracker.unsentSeconds = 0;
        state.readingTracker.sending = true;

        return postForm('api.stats.track', {
            seconds: pending,
            date: localDateYmd(new Date()),
            book: Number(state.currentBook || 0),
            chapter: Number(state.currentChapter || 0)
        }).then(function (res) {
            state.readingTracker.sending = false;
            if (!res || res.error) {
                throw new Error('track');
            }
            if (state.statsLoaded) {
                fetchStatsPanel(true, false);
            }
            return true;
        }).catch(function () {
            state.readingTracker.sending = false;
            state.readingTracker.unsentSeconds = Math.min(12 * 3600, Number(state.readingTracker.unsentSeconds || 0) + pending);
            return false;
        });
    }

    function toggleParallelMode() {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        state.settings.parallelMode = !state.settings.parallelMode;
        if (!state.settings.parallelMode) {
            state.parallelLoading = false;
            state.parallelMessage = '';
            state.parallelAvailable = false;
            state.parallelVerseMap = {};
            state.parallelColumns = [];
            if (els.toggleParallel) {
                els.toggleParallel.classList.remove('is-active');
            }
            renderVerses(true);
            saveSettings();
            applySettings();
            notify('Comparación desactivada.');
            return;
        }

        if (els.toggleParallel) {
            els.toggleParallel.classList.add('is-active');
        }
        resetParallelChapterState();
        renderVerses(true);
        loadParallelChapterData(true, false);
        saveSettings();
        applySettings();
    }

    function resetParallelChapterState() {
        state.parallelLoading = false;
        state.parallelAvailable = false;
        state.parallelSameSource = false;
        state.parallelMessage = '';
        state.parallelVerseMap = {};
        state.parallelColumns = [];
    }

    function loadParallelChapterData(force, silent) {
        if (!state.settings.parallelMode) {
            return;
        }
        if (state.parallelLoading && !force) {
            return;
        }

        state.parallelLoading = true;
        state.parallelMessage = '';
        renderVerses(true);

        var compareFiles = Array.isArray(state.versionCompareFiles) ? state.versionCompareFiles.slice() : [];
        compareFiles = compareFiles.map(function (file) {
            return String(file || '').trim();
        }).filter(Boolean);
        if (!compareFiles.length && state.versionCompareFile) {
            compareFiles = [String(state.versionCompareFile)];
        }
        var parallelUrl = '?route=api.chapter.parallel&book=' + encodeURIComponent(state.currentBook) +
            '&chapter=' + encodeURIComponent(state.currentChapter);
        if (compareFiles.length) {
            parallelUrl += '&compare_files=' + encodeURIComponent(compareFiles.join(','));
        }

        fetch(parallelUrl)
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'Error');
                }

                var payload = res.parallel || {};
                state.parallelLoading = false;
                var comparisons = Array.isArray(payload.comparisons) ? payload.comparisons : [];
                state.parallelColumns = [];
                state.parallelAvailable = false;
                state.parallelSameSource = false;
                state.parallelPrimaryLabel = String(payload.primary_label || state.parallelPrimaryLabel || 'RVR60');
                state.parallelCompareLabel = '';
                state.parallelMessage = String(payload.message || '');
                state.parallelVerseMap = {};
                if (!comparisons.length) {
                    var legacyRows = Array.isArray(payload.compare_verses) ? payload.compare_verses : [];
                    if (legacyRows.length) {
                        var legacyMap = {};
                        legacyRows.forEach(function (row) {
                            var verse = Number(row.verse || 0);
                            if (verse < 1) {
                                return;
                            }
                            legacyMap[String(verse)] = row;
                            state.parallelVerseMap[String(verse)] = row;
                        });
                        state.parallelColumns.push({
                            file: String(payload.compare_file || state.versionCompareFile || ''),
                            label: String(payload.compare_label || state.parallelCompareLabel || 'Versión 2'),
                            available: payload.available === true,
                            same_source: payload.same_source === true,
                            message: String(payload.message || ''),
                            verseMap: legacyMap
                        });
                    }
                    state.parallelAvailable = payload.available === true;
                    state.parallelSameSource = payload.same_source === true;
                    state.parallelCompareLabel = String(payload.compare_label || state.parallelCompareLabel || 'Versión 2');
                } else {
                    comparisons.forEach(function (comparison) {
                        var rows = Array.isArray(comparison.verses) ? comparison.verses : [];
                        var verseMap = {};
                        rows.forEach(function (row) {
                            var verse = Number(row.verse || 0);
                            if (verse < 1) {
                                return;
                            }
                            verseMap[String(verse)] = row;
                        });
                        var column = {
                            file: String(comparison.file || ''),
                            label: String(comparison.label || 'Versión'),
                            available: comparison.available === true,
                            same_source: comparison.same_source === true,
                            message: String(comparison.message || ''),
                            verseMap: verseMap
                        };
                        state.parallelColumns.push(column);
                        if (column.available) {
                            state.parallelAvailable = true;
                        }
                        if (column.same_source) {
                            state.parallelSameSource = true;
                        }
                    });
                    if (!state.parallelCompareLabel && state.parallelColumns.length) {
                        state.parallelCompareLabel = String(state.parallelColumns[0].label || 'Versión 2');
                    }
                    if (!state.parallelAvailable && !state.parallelMessage) {
                        state.parallelMessage = 'No hay versiones paralelas disponibles para este capítulo.';
                    }
                }

                if (els.toggleParallel) {
                    els.toggleParallel.classList.toggle('is-active', state.settings.parallelMode === true);
                }

                renderVerses(true);
                if (!silent) {
                    if (state.parallelAvailable) {
                        var availableColumns = state.parallelColumns.filter(function (col) { return col.available === true; });
                        if (state.parallelSameSource && availableColumns.length === 1) {
                            notify('Comparación activa, pero apunta a la misma versión.');
                        } else {
                            notify('Comparación de versiones activada (' + Math.max(2, 1 + availableColumns.length) + ' columnas).');
                        }
                    } else {
                        notify(state.parallelMessage || 'No hay versión paralela para este capítulo.');
                    }
                }
            })
            .catch(function () {
                state.parallelLoading = false;
                state.parallelAvailable = false;
                state.parallelSameSource = false;
                state.parallelMessage = 'No se pudo cargar la versión paralela.';
                state.parallelVerseMap = {};
                state.parallelColumns = [];
                renderVerses(true);
                if (!silent) {
                    notify(state.parallelMessage);
                }
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
        if (!ensureAdvancedAccess('advanced_tools')) {
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

        if (els.readerFontUp) {
            els.readerFontUp.addEventListener('click', function () {
                changeFontScale(5);
            });
        }

        if (els.readerFontDown) {
            els.readerFontDown.addEventListener('click', function () {
                changeFontScale(-5);
            });
        }

        if (els.saveSelectionProject) {
            els.saveSelectionProject.addEventListener('click', function () {
                if (!ensureAdvancedAccess('study_center')) {
                    return;
                }
                var rows = selectedRows();
                if (!rows.length) {
                    notify('Selecciona al menos un versículo para guardarlo en proyecto.');
                    return;
                }
                var range = selectedRange();
                var reference = toReference(state.currentBook, state.currentChapter, range.start, range.end);
                var noteSeed = rows.map(function (row) {
                    return cleanText(row.scripture_text || row.scripture_html || '');
                }).join(' ').slice(0, 380);
                openProjectSaveModal({
                    book: state.currentBook,
                    chapter: state.currentChapter,
                    verseStart: range.start,
                    verseEnd: range.end,
                    reference: reference,
                    source: 'Selección actual del lector',
                    note: noteSeed
                });
            });
        }

        els.shareSelection.addEventListener('click', function () {
            var payload = buildPrettySharePayload();
            if (payload.error) {
                notify(payload.error);
                return;
            }
            if (navigator.share) {
                navigator.share({
                    title: payload.reference,
                    text: payload.text,
                    url: payload.url
                }).catch(function () {});
                return;
            }
            copyText(payload.text + '\n' + payload.url).then(function () {
                notify('Compartir no disponible. Texto copiado.');
            }).catch(function () {
                notify('No se pudo copiar.');
            });
        });

        if (els.shareWhatsApp) {
            els.shareWhatsApp.addEventListener('click', function () {
                var payload = buildPrettySharePayload();
                if (payload.error) {
                    notify(payload.error);
                    return;
                }
                var waText = payload.text + '\n' + payload.url;
                window.open('https://wa.me/?text=' + encodeURIComponent(waText), '_blank', 'noopener');
            });
        }

        if (els.shareFacebook) {
            els.shareFacebook.addEventListener('click', function () {
                var payload = buildPrettySharePayload();
                if (payload.error) {
                    notify(payload.error);
                    return;
                }
                var quote = payload.reference + ' - ' + payload.preview;
                var fbUrl = 'https://www.facebook.com/sharer/sharer.php?u=' +
                    encodeURIComponent(payload.url) + '&quote=' + encodeURIComponent(quote);
                window.open(fbUrl, '_blank', 'noopener');
            });
        }
    }

    function bindAudioControls() {
        if (!els.audioSource || !els.audioVoice || !els.audioRate || !els.audioPlay || !els.audioPauseResume || !els.audioStop) {
            return;
        }

        els.audioSource.addEventListener('change', function () {
            state.audio.source = String(this.value || 'chapter');
            saveAudioPrefs();
            renderAudioControls();
        });

        els.audioVoice.addEventListener('change', function () {
            state.audio.voiceUri = String(this.value || '');
            saveAudioPrefs();
        });

        els.audioRate.addEventListener('input', function () {
            var next = Number(this.value || 1);
            if (!Number.isFinite(next)) {
                next = 1;
            }
            state.audio.rate = Math.max(0.7, Math.min(1.6, next));
            saveAudioPrefs();
            renderAudioControls();
        });

        els.audioPlay.addEventListener('click', function () {
            startAudioPlayback();
        });

        els.audioPauseResume.addEventListener('click', function () {
            toggleAudioPauseResume();
        });

        els.audioStop.addEventListener('click', function () {
            stopAudioPlayback(false);
        });

        window.addEventListener('beforeunload', function () {
            stopAudioPlayback(true);
            savePreachPrefs();
        });

        renderAudioControls();
    }

    function isAudioTtsSupported() {
        if (typeof window === 'undefined') {
            return false;
        }
        var hasSynth = typeof window.speechSynthesis !== 'undefined';
        var hasCtor = typeof window.SpeechSynthesisUtterance !== 'undefined' || typeof SpeechSynthesisUtterance !== 'undefined';
        return hasSynth && hasCtor;
    }

    function loadAudioPrefs() {
        try {
            var raw = localStorage.getItem('biblia_audio_prefs');
            if (!raw) {
                return;
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return;
            }
            state.audio.source = parsed.source === 'selection' ? 'selection' : 'chapter';
            var rate = Number(parsed.rate || 1);
            state.audio.rate = Number.isFinite(rate) ? Math.max(0.7, Math.min(1.6, rate)) : 1;
            state.audio.voiceUri = String(parsed.voice_uri || '');
        } catch (err) {
            // ignore
        }
    }

    function saveAudioPrefs() {
        localStorage.setItem('biblia_audio_prefs', JSON.stringify({
            source: state.audio.source,
            rate: state.audio.rate,
            voice_uri: state.audio.voiceUri
        }));
    }

    function isSpanishVoice(voice) {
        if (!voice) {
            return false;
        }
        var lang = String(voice.lang || '').trim().toLowerCase();
        if (/^es([-_]|$)/i.test(lang)) {
            return true;
        }
        var name = String(voice.name || '').trim().toLowerCase();
        return /espa[nñ]ol|spanish|castilian|castellano/.test(name);
    }

    function isLikelyNaturalVoice(voice) {
        if (!voice) {
            return false;
        }
        var name = String(voice.name || '').trim().toLowerCase();
        var uri = String(voice.voiceURI || '').trim().toLowerCase();
        var haystack = name + ' ' + uri;
        var positive = /(natural|neural|wavenet|premium|enhanced|online|cloud|studio|siri|google|apple)/.test(haystack);
        var negative = /(desktop|legacy|espeak|festival|mbrola|pico|sam)/.test(haystack);
        return positive && !negative;
    }

    function compareVoicePriority(a, b) {
        var aNatural = isLikelyNaturalVoice(a) ? 1 : 0;
        var bNatural = isLikelyNaturalVoice(b) ? 1 : 0;
        if (aNatural !== bNatural) {
            return bNatural - aNatural;
        }
        var aLocal = a && a.localService === true ? 1 : 0;
        var bLocal = b && b.localService === true ? 1 : 0;
        if (aLocal !== bLocal) {
            return bLocal - aLocal;
        }
        var aName = String((a && a.name) || '').toLowerCase();
        var bName = String((b && b.name) || '').toLowerCase();
        if (aName < bName) {
            return -1;
        }
        if (aName > bName) {
            return 1;
        }
        return 0;
    }

    function refreshSpeechVoices(updateUi) {
        state.audio.supported = isAudioTtsSupported();
        if (!state.audio.supported) {
            state.audio.voices = [];
            return;
        }
        var allVoices = window.speechSynthesis.getVoices() || [];
        var spanishVoices = allVoices.filter(function (voice) {
            return isSpanishVoice(voice);
        });
        var preferred = spanishVoices.filter(function (voice) {
            return isLikelyNaturalVoice(voice);
        });

        var byUri = {};
        preferred.forEach(function (voice) {
            var key = String(voice.voiceURI || voice.name || '');
            if (!key || byUri[key]) {
                return;
            }
            byUri[key] = voice;
        });
        state.audio.voices = Object.keys(byUri).map(function (key) {
            return byUri[key];
        }).sort(compareVoicePriority);

        if (state.audio.voiceUri && !state.audio.voices.some(function (voice) {
            return String(voice.voiceURI || '') === state.audio.voiceUri;
        })) {
            state.audio.voiceUri = '';
        }

        if (updateUi) {
            renderAudioControls();
        }
    }

    function renderAudioControls() {
        if (!els.audioSource || !els.audioVoice || !els.audioRate || !els.audioRateLabel || !els.audioTargetInfo || !els.audioPauseResume || !els.audioPlay || !els.audioStop) {
            return;
        }

        state.audio.supported = isAudioTtsSupported();
        if (!state.audio.supported) {
            els.audioSource.disabled = true;
            els.audioVoice.innerHTML = '<option value="">TTS no disponible en este navegador</option>';
            els.audioVoice.disabled = true;
            els.audioRate.disabled = true;
            els.audioPlay.disabled = true;
            els.audioPauseResume.disabled = true;
            els.audioStop.disabled = true;
            setAudioStatus('Este navegador no soporta lectura por voz.');
            return;
        }

        refreshSpeechVoices(false);

        els.audioSource.disabled = false;
        els.audioSource.value = state.audio.source === 'selection' ? 'selection' : 'chapter';
        els.audioRate.disabled = false;
        els.audioRate.value = String(state.audio.rate.toFixed(1));
        els.audioRateLabel.textContent = state.audio.rate.toFixed(1) + 'x';

        var voices = Array.isArray(state.audio.voices) ? state.audio.voices : [];
        if (!voices.length) {
            els.audioVoice.innerHTML = '<option value="">Sin voces españolas naturales disponibles</option>';
            els.audioVoice.disabled = true;
        } else {
            els.audioVoice.disabled = false;
            els.audioVoice.innerHTML = voices.map(function (voice) {
                var uri = escapeHtml(String(voice.voiceURI || ''));
                var label = escapeHtml(String(voice.name || 'Voz')) + ' (' + escapeHtml(String(voice.lang || '')) + ')';
                var selected = state.audio.voiceUri && state.audio.voiceUri === String(voice.voiceURI || '') ? ' selected' : '';
                return '<option value="' + uri + '"' + selected + '>' + label + '</option>';
            }).join('');
            if (!state.audio.voiceUri && voices[0] && voices[0].voiceURI) {
                els.audioVoice.value = String(voices[0].voiceURI);
            }
        }

        if (!state.audio.voiceUri) {
            state.audio.voiceUri = String(els.audioVoice.value || '');
        }

        var payload = getAudioReadingPayload(state.audio.source);
        if (payload.error) {
            els.audioTargetInfo.innerHTML = '<small class="muted">' + escapeHtml(payload.error) + '</small>';
        } else {
            els.audioTargetInfo.innerHTML = '' +
                '<strong>' + escapeHtml(payload.reference) + '</strong>' +
                '<small class="muted">Versículos incluidos: ' + Number(payload.count || 0) + '</small>';
        }

        var playing = state.audio.speaking === true;
        var paused = state.audio.paused === true;
        els.audioPauseResume.textContent = paused ? 'Reanudar' : 'Pausar';
        els.audioPauseResume.disabled = !playing;
        els.audioStop.disabled = !playing;
        els.audioPlay.textContent = playing ? 'Reiniciar' : 'Leer';
        els.audioPlay.disabled = Boolean(payload.error) || voices.length < 1;
    }

    function setAudioStatus(message) {
        if (!els.audioStatus) {
            return;
        }
        els.audioStatus.textContent = String(message || '');
    }

    function getAudioReadingPayload(source) {
        var mode = source === 'selection' ? 'selection' : 'chapter';
        var rows = mode === 'selection' ? selectedRows() : (Array.isArray(state.verses) ? state.verses.slice() : []);
        if (!rows.length) {
            return {
                error: mode === 'selection'
                    ? 'Selecciona uno o más versículos para usar audio por selección.'
                    : 'No hay versículos cargados en este capítulo.'
            };
        }

        var start = Number(rows[0].verse || 0);
        var end = Number(rows[rows.length - 1].verse || 0);
        var text = rows.map(function (row) {
            var verseNum = Number(row.verse || 0);
            var verseText = cleanText(row.scripture_text || row.scripture_html || '');
            return verseNum + '. ' + verseText;
        }).join(' ');

        return {
            source: mode,
            count: rows.length,
            reference: toReference(state.currentBook, state.currentChapter, start, end),
            text: text
        };
    }

    function buildSpeechQueue(text) {
        var normalized = String(text || '').replace(/\s+/g, ' ').trim();
        if (!normalized) {
            return [];
        }

        var words = normalized.split(' ');
        var chunks = [];
        var current = '';
        var maxLen = 220;

        words.forEach(function (word) {
            var candidate = current ? (current + ' ' + word) : word;
            if (candidate.length > maxLen && current) {
                chunks.push(current);
                current = word;
                return;
            }
            current = candidate;
        });

        if (current) {
            chunks.push(current);
        }
        return chunks;
    }

    function findVoiceByUri(uri) {
        var key = String(uri || '');
        if (!key || !Array.isArray(state.audio.voices)) {
            return null;
        }
        for (var i = 0; i < state.audio.voices.length; i++) {
            var voice = state.audio.voices[i];
            if (String(voice.voiceURI || '') === key) {
                return voice;
            }
        }
        return null;
    }

    function startAudioPlayback() {
        state.audio.supported = isAudioTtsSupported();
        if (!state.audio.supported) {
            notify('Audio no disponible en este navegador.');
            return;
        }
        if (!Array.isArray(state.audio.voices) || state.audio.voices.length < 1) {
            notify('No hay voces españolas naturales disponibles para lectura.');
            setAudioStatus('No hay voces españolas naturales disponibles para lectura.');
            renderAudioControls();
            return;
        }

        var payload = getAudioReadingPayload(state.audio.source);
        if (payload.error) {
            notify(payload.error);
            setAudioStatus(payload.error);
            renderAudioControls();
            return;
        }

        stopAudioPlayback(true);
        state.audio.currentReference = payload.reference;
        state.audio.queue = buildSpeechQueue(payload.text);
        state.audio.queueIndex = 0;
        state.audio.speaking = state.audio.queue.length > 0;
        state.audio.paused = false;

        if (!state.audio.queue.length) {
            notify('No hay texto para leer.');
            setAudioStatus('No hay texto para leer.');
            renderAudioControls();
            return;
        }

        setAudioStatus('Leyendo ' + payload.reference + '...');
        speakAudioNextChunk();
        renderAudioControls();
    }

    function speakAudioNextChunk() {
        state.audio.supported = isAudioTtsSupported();
        if (!state.audio.speaking || !state.audio.supported) {
            return;
        }
        if (state.audio.queueIndex >= state.audio.queue.length) {
            state.audio.speaking = false;
            state.audio.paused = false;
            state.audio.queue = [];
            state.audio.queueIndex = 0;
            setAudioStatus('Lectura finalizada.');
            renderAudioControls();
            return;
        }

        var chunk = String(state.audio.queue[state.audio.queueIndex] || '').trim();
        if (!chunk) {
            state.audio.queueIndex += 1;
            speakAudioNextChunk();
            return;
        }

        var utterance = new SpeechSynthesisUtterance(chunk);
        var voice = findVoiceByUri(state.audio.voiceUri);
        if (voice) {
            utterance.voice = voice;
            utterance.lang = String(voice.lang || 'es-ES');
        } else {
            utterance.lang = 'es-ES';
        }
        utterance.rate = state.audio.rate;

        utterance.onend = function () {
            if (!state.audio.speaking) {
                return;
            }
            state.audio.queueIndex += 1;
            speakAudioNextChunk();
        };

        utterance.onstart = function () {
            setAudioStatus('Reproduciendo ' + (state.audio.currentReference || 'pasaje') + '...');
        };

        utterance.onerror = function () {
            state.audio.speaking = false;
            state.audio.paused = false;
            state.audio.queue = [];
            state.audio.queueIndex = 0;
            setAudioStatus('No se pudo reproducir el audio.');
            renderAudioControls();
        };

        try {
            window.speechSynthesis.speak(utterance);
        } catch (err) {
            state.audio.speaking = false;
            state.audio.paused = false;
            state.audio.queue = [];
            state.audio.queueIndex = 0;
            setAudioStatus('El navegador bloqueó la reproducción de audio.');
            notify('No se pudo iniciar el audio.');
            renderAudioControls();
        }
    }

    function toggleAudioPauseResume() {
        state.audio.supported = isAudioTtsSupported();
        if (!state.audio.supported) {
            return;
        }
        var synth = window.speechSynthesis;
        if (!state.audio.speaking && !synth.speaking) {
            notify('No hay audio en reproducción.');
            return;
        }

        if (synth.paused || state.audio.paused) {
            synth.resume();
            state.audio.paused = false;
            setAudioStatus('Reproduciendo...');
        } else {
            synth.pause();
            state.audio.paused = true;
            setAudioStatus('Audio en pausa.');
        }
        renderAudioControls();
    }

    function stopAudioPlayback(silent) {
        state.audio.supported = isAudioTtsSupported();
        if (state.audio.supported) {
            window.speechSynthesis.cancel();
        }

        var wasActive = state.audio.speaking || state.audio.paused;
        state.audio.speaking = false;
        state.audio.paused = false;
        state.audio.queue = [];
        state.audio.queueIndex = 0;
        state.audio.currentReference = '';

        if (!silent && wasActive) {
            notify('Audio detenido.');
        }
        setAudioStatus('Listo para reproducir.');
        renderAudioControls();
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

    function bindGuideTourControls() {
        if (els.guidePrevStep) {
            els.guidePrevStep.addEventListener('click', function () {
                setGuideTourStep(Number(state.guide.activeStep || 0) - 1, true);
            });
        }
        if (els.guideNextStep) {
            els.guideNextStep.addEventListener('click', function () {
                var current = Number(state.guide.activeStep || 0);
                if (current >= GUIDE_TOUR_STEPS.length - 1) {
                    closeGuideModal();
                    notify('Tour finalizado. Puedes abrirlo de nuevo cuando quieras.');
                    return;
                }
                setGuideTourStep(current + 1, true);
            });
        }
        if (els.guideGoTarget) {
            els.guideGoTarget.addEventListener('click', function () {
                var step = GUIDE_TOUR_STEPS[Number(state.guide.activeStep || 0)] || null;
                if (!step) {
                    return;
                }
                if (step.tab) {
                    activateTab(String(step.tab));
                }
                var resolved = resolveGuideTarget(step);
                var target = resolved.element;
                if (!target) {
                    notify('No se encontró el elemento de este paso.');
                    return;
                }
                target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                if (step.selector === '#openModules') {
                    openModules();
                }
                if (step.selector === '#helpPane') {
                    openHelpDrawer();
                }
            });
        }
        if (els.guideHideOnStart) {
            els.guideHideOnStart.addEventListener('change', function () {
                state.settings.autoTourOnStart = !this.checked;
                saveSettings();
            });
        }

        if (!bindGuideTourControls.bound) {
            bindGuideTourControls.bound = true;
            window.addEventListener('resize', refreshGuideSpotlightPosition);
            window.addEventListener('scroll', refreshGuideSpotlightPosition, true);
        }
    }

    function openGuideModal(startFromFirstStep) {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        if (!els.guideModal) {
            return;
        }
        if (els.overlay) {
            els.overlay.classList.remove('hidden');
            els.overlay.classList.add('is-guide-mode');
        }
        document.body.classList.add('guide-tour-active');
        els.guideModal.classList.remove('hidden');
        if (els.guideHideOnStart) {
            els.guideHideOnStart.checked = !state.settings.autoTourOnStart;
        }
        if (startFromFirstStep === true) {
            setGuideTourStep(0, true);
            return;
        }
        setGuideTourStep(Number(state.guide.activeStep || 0), false);
    }

    function closeGuideModal() {
        if (!els.guideModal || els.guideModal.classList.contains('hidden')) {
            return;
        }
        clearGuideFocus();
        els.guideModal.classList.add('hidden');
        if (els.overlay) {
            els.overlay.classList.remove('is-guide-mode');
        }
        document.body.classList.remove('guide-tour-active');
        document.body.classList.remove('guide-step-pulse');
        if (state.guide.stepAnimTimer) {
            window.clearTimeout(state.guide.stepAnimTimer);
            state.guide.stepAnimTimer = 0;
        }
        if (els.guideModal) {
            els.guideModal.classList.remove('guide-step-enter');
        }
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function clearGuideFocus() {
        document.querySelectorAll('.tour-focus').forEach(function (node) {
            node.classList.remove('tour-focus');
        });
        if (els.guideSpotlight) {
            els.guideSpotlight.classList.add('hidden');
        }
        state.guide.focusSelector = '';
    }

    function formatGuideStepNumber(value) {
        var safe = Number(value || 0);
        if (!Number.isFinite(safe) || safe < 0) {
            safe = 0;
        }
        return safe < 10 ? ('0' + safe) : String(safe);
    }

    function pulseGuideStepTransition() {
        if (!els.guideModal) {
            return;
        }
        els.guideModal.classList.remove('guide-step-enter');
        void els.guideModal.offsetWidth;
        els.guideModal.classList.add('guide-step-enter');

        document.body.classList.remove('guide-step-pulse');
        void document.body.offsetWidth;
        document.body.classList.add('guide-step-pulse');

        if (state.guide.stepAnimTimer) {
            window.clearTimeout(state.guide.stepAnimTimer);
        }
        state.guide.stepAnimTimer = window.setTimeout(function () {
            if (els.guideModal) {
                els.guideModal.classList.remove('guide-step-enter');
            }
            document.body.classList.remove('guide-step-pulse');
            state.guide.stepAnimTimer = 0;
        }, 360);
    }

    function setGuideTourStep(index, autoScroll) {
        if (!els.guideTourTitle || !els.guideTourText || !els.guideTourHint || !els.guideTourStepLabel) {
            return;
        }
        if (!GUIDE_TOUR_STEPS.length) {
            return;
        }

        var safe = Number(index || 0);
        if (!Number.isFinite(safe)) {
            safe = 0;
        }
        if (safe < 0) {
            safe = 0;
        }
        if (safe > GUIDE_TOUR_STEPS.length - 1) {
            safe = GUIDE_TOUR_STEPS.length - 1;
        }
        state.guide.activeStep = safe;

        var step = GUIDE_TOUR_STEPS[safe];
        if (step && step.tab) {
            activateTab(String(step.tab));
        }
        els.guideTourTitle.textContent = String(step.title || 'Paso');
        els.guideTourText.textContent = String(step.text || '');
        els.guideTourHint.textContent = String(step.hint || '');
        els.guideTourStepLabel.textContent = 'Paso ' + (safe + 1) + ' de ' + GUIDE_TOUR_STEPS.length;
        if (els.guideStepBadge) {
            var currentStepText = formatGuideStepNumber(safe + 1);
            var totalStepText = formatGuideStepNumber(GUIDE_TOUR_STEPS.length);
            els.guideStepBadge.textContent = currentStepText + '/' + totalStepText;
        }
        if (els.guideModal) {
            var progress = Math.max(0, Math.min(100, Math.round(((safe + 1) / GUIDE_TOUR_STEPS.length) * 100)));
            els.guideModal.style.setProperty('--guide-progress', String(progress) + '%');
        }
        pulseGuideStepTransition();

        if (els.guidePrevStep) {
            els.guidePrevStep.disabled = safe === 0;
        }
        if (els.guideNextStep) {
            els.guideNextStep.textContent = safe >= GUIDE_TOUR_STEPS.length - 1 ? 'Finalizar' : 'Siguiente';
        }

        clearGuideFocus();
        if (step && (step.selector === '#helpPane' || step.tab) && window.matchMedia('(max-width: 980px)').matches) {
            openHelpDrawer();
        }
        var resolved = resolveGuideTarget(step);
        var target = resolved.element;
        if (target) {
            state.guide.focusSelector = resolved.selector || '';
            target.classList.add('tour-focus');
            if (autoScroll) {
                target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                window.setTimeout(function () {
                    refreshGuideSpotlightPosition();
                }, 260);
            } else {
                refreshGuideSpotlightPosition();
            }
        } else {
            centerGuideModal();
        }
        if (els.guideGoTarget) {
            els.guideGoTarget.disabled = !target;
        }
    }

    function isGuideCompactViewport() {
        return window.matchMedia('(max-width: 980px)').matches;
    }

    function isGuideTargetVisible(target) {
        if (!target || !target.isConnected) {
            return false;
        }
        if (target.classList && target.classList.contains('hidden')) {
            return false;
        }
        var style = window.getComputedStyle(target);
        if (!style || style.display === 'none' || style.visibility === 'hidden') {
            return false;
        }
        if (Number(style.opacity || 1) <= 0.01) {
            return false;
        }
        var rect = target.getBoundingClientRect();
        return rect.width >= 8 && rect.height >= 8;
    }

    function listGuideTargetSelectors(step) {
        if (!step || typeof step !== 'object') {
            return [];
        }

        var compact = isGuideCompactViewport();
        var selectors = [];
        var rawList = compact
            ? (Array.isArray(step.mobile_targets) && step.mobile_targets.length ? step.mobile_targets : [step.mobile_selector, step.selector])
            : (Array.isArray(step.desktop_targets) && step.desktop_targets.length ? step.desktop_targets : [step.selector]);

        rawList.forEach(function (item) {
            var selector = String(item || '').trim();
            if (selector !== '' && selectors.indexOf(selector) === -1) {
                selectors.push(selector);
            }
        });

        var primary = String(step.selector || '').trim();
        if (primary !== '' && selectors.indexOf(primary) === -1) {
            selectors.push(primary);
        }
        return selectors;
    }

    function resolveGuideTarget(step) {
        var selectors = listGuideTargetSelectors(step);
        var fallback = null;

        for (var i = 0; i < selectors.length; i += 1) {
            var selector = selectors[i];
            var nodes = document.querySelectorAll(selector);
            if (!nodes || !nodes.length) {
                continue;
            }
            for (var j = 0; j < nodes.length; j += 1) {
                var node = nodes[j];
                if (!fallback) {
                    fallback = { selector: selector, element: node };
                }
                if (isGuideTargetVisible(node)) {
                    return { selector: selector, element: node };
                }
            }
        }

        return fallback || { selector: '', element: null };
    }

    function refreshGuideSpotlightPosition() {
        if (!els.guideModal || els.guideModal.classList.contains('hidden')) {
            return;
        }
        var step = GUIDE_TOUR_STEPS[Number(state.guide.activeStep || 0)] || null;
        var resolved = resolveGuideTarget(step);
        var target = resolved.element;
        if (!target) {
            centerGuideModal();
            if (els.guideSpotlight) {
                els.guideSpotlight.classList.add('hidden');
            }
            return;
        }
        state.guide.focusSelector = resolved.selector || '';
        applyGuideSpotlightForTarget(target);
    }

    function applyGuideSpotlightForTarget(target) {
        if (!target || !els.guideModal) {
            return;
        }

        var rect = target.getBoundingClientRect();
        var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
        var viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
        if (viewportWidth < 1 || viewportHeight < 1) {
            centerGuideModal();
            return;
        }
        if (rect.width < 6 || rect.height < 6) {
            centerGuideModal();
            if (els.guideSpotlight) {
                els.guideSpotlight.classList.add('hidden');
            }
            return;
        }

        var margin = 8;
        var visibleLeft = Math.max(margin, rect.left);
        var visibleTop = Math.max(margin, rect.top);
        var visibleRight = Math.min(viewportWidth - margin, rect.right);
        var visibleBottom = Math.min(viewportHeight - margin, rect.bottom);
        var visibleWidth = visibleRight - visibleLeft;
        var visibleHeight = visibleBottom - visibleTop;
        if (visibleWidth < 8 || visibleHeight < 8) {
            centerGuideModal();
            if (els.guideSpotlight) {
                els.guideSpotlight.classList.add('hidden');
            }
            return;
        }

        var pad = 8;
        var x = Math.max(margin, visibleLeft - pad);
        var y = Math.max(margin, visibleTop - pad);
        var w = Math.max(26, visibleWidth + (pad * 2));
        var h = Math.max(26, visibleHeight + (pad * 2));

        if (x + w > viewportWidth - margin) {
            w = Math.max(26, (viewportWidth - margin) - x);
        }
        if (y + h > viewportHeight - margin) {
            h = Math.max(26, (viewportHeight - margin) - y);
        }

        if (els.guideSpotlight) {
            els.guideSpotlight.style.setProperty('--spot-x', String(Math.round(x)) + 'px');
            els.guideSpotlight.style.setProperty('--spot-y', String(Math.round(y)) + 'px');
            els.guideSpotlight.style.setProperty('--spot-w', String(Math.round(w)) + 'px');
            els.guideSpotlight.style.setProperty('--spot-h', String(Math.round(h)) + 'px');
            els.guideSpotlight.classList.remove('hidden');
        }

        positionGuideModalByRect({
            left: x,
            top: y,
            width: w,
            height: h
        }, viewportWidth, viewportHeight);
    }

    function centerGuideModal() {
        if (!els.guideModal) {
            return;
        }
        els.guideModal.classList.remove('guide-pos-above', 'guide-pos-below');
        els.guideModal.style.setProperty('--guide-modal-left', '50%');
        els.guideModal.style.setProperty('--guide-modal-top', '50%');
        els.guideModal.style.setProperty('--guide-modal-tx', '-50%');
        els.guideModal.style.setProperty('--guide-modal-ty', '-50%');
        els.guideModal.style.setProperty('--guide-anchor-x', '50%');
    }

    function positionGuideModalByRect(rect, viewportWidth, viewportHeight) {
        if (!els.guideModal || !rect) {
            return;
        }

        var margin = 12;
        var width = Math.min(460, Math.max(280, viewportWidth - (margin * 2)));
        var measured = els.guideModal.getBoundingClientRect();
        var modalHeight = Math.max(240, Math.round(measured.height || 320));
        if (modalHeight > viewportHeight - (margin * 2)) {
            modalHeight = viewportHeight - (margin * 2);
        }

        var left = rect.left + (rect.width / 2) - (width / 2);
        if (left < margin) {
            left = margin;
        }
        if (left > viewportWidth - width - margin) {
            left = viewportWidth - width - margin;
        }

        var preferBelow = rect.top + rect.height + 18;
        var preferAbove = rect.top - modalHeight - 18;
        var top = preferBelow;
        var placeAbove = false;
        if (preferBelow + modalHeight > viewportHeight - margin && preferAbove >= margin) {
            top = preferAbove;
            placeAbove = true;
        } else if (preferBelow + modalHeight > viewportHeight - margin) {
            top = Math.max(margin, viewportHeight - modalHeight - margin);
        }
        if (top < margin) {
            top = margin;
        }

        var anchorX = rect.left + (rect.width / 2) - left;
        if (anchorX < 26) {
            anchorX = 26;
        }
        if (anchorX > width - 26) {
            anchorX = width - 26;
        }

        els.guideModal.style.setProperty('--guide-modal-left', String(Math.round(left)) + 'px');
        els.guideModal.style.setProperty('--guide-modal-top', String(Math.round(top)) + 'px');
        els.guideModal.style.setProperty('--guide-modal-tx', '0px');
        els.guideModal.style.setProperty('--guide-modal-ty', '0px');
        els.guideModal.style.setProperty('--guide-anchor-x', String(Math.round(anchorX)) + 'px');
        els.guideModal.classList.toggle('guide-pos-above', placeAbove);
        els.guideModal.classList.toggle('guide-pos-below', !placeAbove);
    }

    function maybeAutoStartGuideTour() {
        if (!state.auth.isLogged) {
            return;
        }
        var params = new URLSearchParams(window.location.search || '');
        var forceTour = params.get('tour') === '1';
        if (forceTour) {
            openGuideModal(true);
            return;
        }
        if (!state.settings.autoTourOnStart) {
            return;
        }
        if (els.searchModal && !els.searchModal.classList.contains('hidden')) {
            return;
        }
        openGuideModal(true);
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
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        els.overlay.classList.remove('hidden');
        els.searchModal.classList.remove('hidden');
        var q = document.getElementById('qText');
        if (q) {
            q.focus();
        }
    }

    function openPlan() {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
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

    function openVersions() {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        if (!els.versionsModal) {
            return;
        }
        renderVersionSelectors();
        els.overlay.classList.remove('hidden');
        els.versionsModal.classList.remove('hidden');
    }

    function openModules() {
        if (!els.modulesModal || !els.modulesList) {
            return;
        }
        els.overlay.classList.remove('hidden');
        els.modulesModal.classList.remove('hidden');
        refreshModulesCatalog();
    }

    function closeModules() {
        if (!els.modulesModal || els.modulesModal.classList.contains('hidden')) {
            return;
        }
        els.modulesModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function refreshModulesCatalog() {
        if (!els.modulesList) {
            return;
        }
        els.modulesList.innerHTML = '<p class="muted">Cargando módulos...</p>';
        fetch('?route=api.modules.list')
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo cargar módulos.');
                }
                renderModulesCatalog(Array.isArray(res.modules) ? res.modules : []);
            })
            .catch(function (err) {
                var msg = (err && err.message) ? err.message : 'No se pudo cargar módulos.';
                if (els.modulesList) {
                    els.modulesList.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
                }
            });
    }

    function renderModulesCatalog(modules) {
        if (!els.modulesList) {
            return;
        }
        var rows = Array.isArray(modules) ? modules : [];
        if (!rows.length) {
            els.modulesList.innerHTML = '<p class="muted">No hay módulos en catálogo.</p>';
            return;
        }

        els.modulesList.innerHTML = rows.map(function (module) {
            var key = String(module.key || '');
            var installed = module.installed === true;
            var enabled = module.enabled === true;
            var type = formatModuleTypeLabel(String(module.type || ''));
            var version = String(module.version || '').trim();
            var status = installed ? (enabled ? 'Instalado y activo' : 'Instalado e inactivo') : 'No instalado';
            var installLabel = installed ? 'Reinstalar' : 'Descargar';
            var toggleLabel = enabled ? 'Desactivar' : 'Activar';

            return '' +
                '<article class="card module-card">' +
                '<div class="module-card-head">' +
                '<strong>' + escapeHtml(module.name || key || 'Modulo') + '</strong>' +
                '<span class="module-type-chip">' + escapeHtml(type) + '</span>' +
                '</div>' +
                (module.description ? '<p>' + escapeHtml(module.description) + '</p>' : '') +
                '<small class="muted">Estado: ' + escapeHtml(status) + (version ? ' · v' + escapeHtml(version) : '') + '</small>' +
                '<div class="toolbar module-actions">' +
                '<button class="btn-primary js-module-install" type="button" data-key="' + escapeHtml(key) + '">' + escapeHtml(installLabel) + '</button>' +
                '<button class="btn-light js-module-toggle" type="button" data-key="' + escapeHtml(key) + '" data-enabled="' + (enabled ? '1' : '0') + '"' + (installed ? '' : ' disabled') + '>' + escapeHtml(toggleLabel) + '</button>' +
                '</div>' +
                '</article>';
        }).join('');

        els.modulesList.querySelectorAll('.js-module-install').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var key = String(this.getAttribute('data-key') || '').trim();
                if (!key) {
                    return;
                }
                this.disabled = true;
                postForm('api.modules.install', { key: key }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo descargar el módulo.');
                        return;
                    }
                    notify('Módulo instalado.');
                    renderModulesCatalog(Array.isArray(res.modules) ? res.modules : []);
                    fetchChapter(state.currentBook, state.currentChapter);
                }).catch(function () {
                    notify('No se pudo descargar el módulo.');
                }).finally(function () {
                    btn.disabled = false;
                });
            });
        });

        els.modulesList.querySelectorAll('.js-module-toggle').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var key = String(this.getAttribute('data-key') || '').trim();
                var currentEnabled = Number(this.getAttribute('data-enabled') || 0) === 1;
                if (!key) {
                    return;
                }
                this.disabled = true;
                postForm('api.modules.toggle', {
                    key: key,
                    enabled: currentEnabled ? 0 : 1
                }).then(function (res) {
                    if (!res || res.error) {
                        notify((res && res.error) ? res.error : 'No se pudo actualizar el módulo.');
                        return;
                    }
                    notify(currentEnabled ? 'Módulo desactivado.' : 'Módulo activado.');
                    renderModulesCatalog(Array.isArray(res.modules) ? res.modules : []);
                    fetchChapter(state.currentBook, state.currentChapter);
                }).catch(function () {
                    notify('No se pudo actualizar el módulo.');
                }).finally(function () {
                    btn.disabled = false;
                });
            });
        });

        if (els.modulesDictSearch && !els.modulesDictSearch.dataset.bound) {
            els.modulesDictSearch.dataset.bound = '1';
            els.modulesDictSearch.addEventListener('click', runModuleDictionaryLookup);
        }
        if (els.modulesDictQuery && !els.modulesDictQuery.dataset.bound) {
            els.modulesDictQuery.dataset.bound = '1';
            els.modulesDictQuery.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    runModuleDictionaryLookup();
                }
            });
        }
        if (els.modulesMapsSearch && !els.modulesMapsSearch.dataset.bound) {
            els.modulesMapsSearch.dataset.bound = '1';
            els.modulesMapsSearch.addEventListener('click', function () {
                runModuleMapsLookup(false);
            });
        }
        if (els.modulesMapsCurrent && !els.modulesMapsCurrent.dataset.bound) {
            els.modulesMapsCurrent.dataset.bound = '1';
            els.modulesMapsCurrent.addEventListener('click', function () {
                runModuleMapsLookup(true);
            });
        }
        if (els.modulesMapsQuery && !els.modulesMapsQuery.dataset.bound) {
            els.modulesMapsQuery.dataset.bound = '1';
            els.modulesMapsQuery.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    runModuleMapsLookup(false);
                }
            });
        }
    }

    function runModuleDictionaryLookup() {
        if (!els.modulesDictQuery || !els.modulesDictResults) {
            return;
        }
        var query = String(els.modulesDictQuery.value || '').trim();
        if (!query) {
            notify('Escribe una palabra para buscar en diccionario.');
            return;
        }

        els.modulesDictResults.innerHTML = '<p class="muted">Buscando...</p>';
        fetch('?route=api.dictionary.lookup&q=' + encodeURIComponent(query) + '&limit=12')
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo consultar el diccionario.');
                }
                renderModuleDictionaryResults(Array.isArray(res.rows) ? res.rows : []);
            })
            .catch(function (err) {
                var msg = (err && err.message) ? err.message : 'No se pudo consultar el diccionario.';
                els.modulesDictResults.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
            });
    }

    function renderModuleDictionaryResults(rows) {
        if (!els.modulesDictResults) {
            return;
        }
        var list = Array.isArray(rows) ? rows : [];
        if (!list.length) {
            els.modulesDictResults.innerHTML = '' +
                '<article class="card module-dict-item module-dict-guide">' +
                '<strong>Cómo usar el diccionario bíblico</strong>' +
                '<small class="muted">1) Busca un término clave del pasaje.</small>' +
                '<small class="muted">2) Lee definición + uso + referencias.</small>' +
                '<small class="muted">3) Resume una aplicación en una frase práctica.</small>' +
                '</article>' +
                '<p class="muted">Sin resultados en diccionarios activos.</p>';
            return;
        }

        var guideCard = '' +
            '<article class="card module-dict-item module-dict-guide">' +
            '<strong>Cómo leer estos resultados</strong>' +
            '<small class="muted">Prioriza el significado que mejor encaja con el contexto inmediato del pasaje.</small>' +
            '<small class="muted">No te quedes en la palabra aislada: verifica las referencias y vuelve al texto bíblico.</small>' +
            '</article>';

        var resultCards = list.map(function (row) {
            var refs = Array.isArray(row.references) ? row.references : [];
            var usageHint = String(row.usage || '').trim();
            if (!usageHint) {
                usageHint = 'Aplica esta definición al argumento del capítulo y anota una implicación práctica.';
            }
            return '' +
                '<article class="card module-dict-item">' +
                '<strong>' + escapeHtml(row.term || '') + '</strong>' +
                (row.definition ? '<p>' + escapeHtml(row.definition) + '</p>' : '') +
                '<small class="muted">Uso en estudio: ' + escapeHtml(usageHint) + '</small>' +
                (refs.length ? '<small class="muted">Referencias: ' + escapeHtml(refs.join(', ')) + '</small>' : '') +
                '<small class="muted">Fuente: ' + escapeHtml(row.module_name || 'Diccionario') + '</small>' +
                '</article>';
        }).join('');

        els.modulesDictResults.innerHTML = guideCard + resultCards;
    }

    function runModuleMapsLookup(useCurrentPassageOnly) {
        if (!els.modulesMapsResults) {
            return;
        }

        var query = els.modulesMapsQuery ? String(els.modulesMapsQuery.value || '').trim() : '';
        if (!query && !useCurrentPassageOnly) {
            notify('Escribe un lugar o usa "Pasaje actual".');
            return;
        }

        var range = selectedRange();
        var params = new URLSearchParams({
            route: 'api.maps.lookup',
            q: query,
            book: String(state.currentBook || 0),
            chapter: String(state.currentChapter || 0),
            verse_start: String(range.start || 1),
            verse_end: String(range.end || 1),
            limit: '8'
        });

        els.modulesMapsResults.innerHTML = '<p class="muted">Buscando mapas...</p>';
        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudieron consultar los mapas.');
                }
                renderModuleMapResults(Array.isArray(res.rows) ? res.rows : []);
            })
            .catch(function (err) {
                var msg = (err && err.message) ? err.message : 'No se pudieron consultar los mapas.';
                els.modulesMapsResults.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
            });
    }

    function renderModuleMapResults(rows) {
        if (!els.modulesMapsResults) {
            return;
        }
        var list = Array.isArray(rows) ? rows : [];
        if (!list.length) {
            els.modulesMapsResults.innerHTML = '' +
                '<article class="card module-dict-item module-dict-guide">' +
                '<strong>Cómo aprovechar mapas bíblicos</strong>' +
                '<small class="muted">1) Ubica el pasaje en su espacio real.</small>' +
                '<small class="muted">2) Observa rutas, distancias y regiones vecinas.</small>' +
                '<small class="muted">3) Relaciona geografía con argumento, conflicto y misión.</small>' +
                '</article>' +
                '<p class="muted">Sin resultados en módulos de mapas activos.</p>';
            return;
        }

        els.modulesMapsResults.innerHTML = list.map(function (row) {
            var refs = Array.isArray(row.references) ? row.references : [];
            var places = Array.isArray(row.places) ? row.places : [];
            var links = [];
            if (row.map_url) {
                links.push('<a class="btn-light" href="' + escapeHtml(row.map_url) + '" target="_blank" rel="noopener noreferrer">Abrir mapa</a>');
            }
            if (row.source_url) {
                links.push('<a class="btn-light" href="' + escapeHtml(row.source_url) + '" target="_blank" rel="noopener noreferrer">Fuente</a>');
            }
            return '' +
                '<article class="card module-dict-item">' +
                '<strong>' + escapeHtml(row.title || 'Mapa bíblico') + '</strong>' +
                (row.summary ? '<p>' + escapeHtml(row.summary) + '</p>' : '') +
                (row.period ? '<small class="muted">Periodo: ' + escapeHtml(row.period) + '</small>' : '') +
                (places.length ? '<small class="muted">Lugares: ' + escapeHtml(places.join(', ')) + '</small>' : '') +
                (refs.length ? '<small class="muted">Referencias: ' + escapeHtml(refs.join(', ')) + '</small>' : '') +
                '<small class="muted">Fuente: ' + escapeHtml(row.source_name || row.module_name || 'Mapas') + (row.license ? ' · ' + escapeHtml(row.license) : '') + '</small>' +
                (links.length ? '<div class="toolbar module-actions">' + links.join('') + '</div>' : '') +
                '</article>';
        }).join('');
    }

    function formatModuleTypeLabel(type) {
        var key = String(type || '').trim().toLowerCase();
        if (key === 'dictionary') {
            return 'Diccionario';
        }
        if (key === 'map') {
            return 'Mapa';
        }
        return 'Comentario';
    }

    function openInterlinear() {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        if (!els.interlinearModal || !els.interlinearModalBody) {
            return;
        }
        if (!state.selectedVerses || !state.selectedVerses.length) {
            notify('Selecciona uno o más versículos para abrir el interlineal.');
            return;
        }

        var range = selectedRange();
        var params = new URLSearchParams({
            route: 'api.interlinear',
            book: String(state.currentBook),
            chapter: String(state.currentChapter),
            verse_start: String(range.start),
            verse_end: String(range.end)
        });

        els.interlinearModalBody.innerHTML = '<p class="muted">Cargando interlineal...</p>';
        els.overlay.classList.remove('hidden');
        els.interlinearModal.classList.remove('hidden');

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo cargar interlineal.');
                }
                renderInterlinearRows(Array.isArray(res.rows) ? res.rows : []);
            })
            .catch(function (err) {
                var msg = (err && err.message) ? err.message : 'No se pudo cargar interlineal.';
                els.interlinearModalBody.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
            });
    }

    function openAudio() {
        if (!ensureAdvancedAccess('advanced_tools')) {
            return;
        }
        if (!els.audioModal) {
            return;
        }
        refreshSpeechVoices(false);
        renderAudioControls();
        els.overlay.classList.remove('hidden');
        els.audioModal.classList.remove('hidden');
    }

    function openProjectSaveModal(entry) {
        if (!ensureAdvancedAccess('study_center')) {
            return;
        }
        if (!els.projectSaveModal || !els.projectSaveProject || !els.projectSaveSubmit) {
            return;
        }
        var payload = entry && typeof entry === 'object' ? entry : {};
        var book = Number(payload.book || 0);
        var chapter = Number(payload.chapter || 0);
        var verseStart = Number(payload.verseStart || 0);
        var verseEnd = Number(payload.verseEnd || verseStart || 0);
        if (book < 1 || chapter < 1 || verseStart < 1 || verseEnd < 1) {
            notify('Referencia inválida para guardar en proyecto.');
            return;
        }

        state.studyDraftEntry = {
            book: book,
            chapter: chapter,
            verseStart: Math.min(verseStart, verseEnd),
            verseEnd: Math.max(verseStart, verseEnd),
            reference: String(payload.reference || toReference(book, chapter, verseStart, verseEnd)).trim(),
            source: String(payload.source || 'Pasaje actual').trim(),
            note: String(payload.note || '').trim(),
            strongCode: String(payload.strongCode || '').trim(),
            strongTerm: String(payload.strongTerm || '').trim(),
            commentaryExcerpt: String(payload.commentaryExcerpt || '').trim()
        };

        if (els.projectSaveReference) {
            els.projectSaveReference.textContent = state.studyDraftEntry.reference || 'Referencia';
        }
        if (els.projectSaveSource) {
            els.projectSaveSource.textContent = state.studyDraftEntry.source || 'Pasaje del lector';
        }
        if (els.projectSaveNote) {
            els.projectSaveNote.value = state.studyDraftEntry.note;
        }
        els.projectSaveSubmit.disabled = true;
        els.projectSaveProject.disabled = true;
        els.projectSaveProject.innerHTML = '<option value="">Cargando proyectos...</option>';

        els.overlay.classList.remove('hidden');
        els.projectSaveModal.classList.remove('hidden');

        loadStudyProjects(false).then(function (projects) {
            renderProjectSaveProjectOptions(projects);
        }).catch(function (err) {
            var msg = (err && err.message) ? err.message : 'No se pudo cargar los proyectos.';
            els.projectSaveProject.innerHTML = '<option value="">' + escapeHtml(msg) + '</option>';
            els.projectSaveProject.disabled = true;
            els.projectSaveSubmit.disabled = true;
        });
    }

    function renderProjectSaveProjectOptions(projects) {
        if (!els.projectSaveProject || !els.projectSaveSubmit) {
            return;
        }
        var list = Array.isArray(projects) ? projects : [];
        if (!list.length) {
            els.projectSaveProject.innerHTML = '<option value="">No hay proyectos creados</option>';
            els.projectSaveProject.disabled = true;
            els.projectSaveSubmit.disabled = true;
            if (els.projectSaveSource) {
                els.projectSaveSource.textContent = 'No hay proyectos. Crea uno desde "Abrir proyectos".';
            }
            return;
        }

        els.projectSaveProject.innerHTML = list.map(function (project) {
            var id = Number(project.id || 0);
            var count = Number(project.entries_count || 0);
            var label = String(project.name || ('Proyecto ' + id));
            var suffix = count > 0 ? (' (' + count + ')') : '';
            return '<option value="' + id + '">' + escapeHtml(label + suffix) + '</option>';
        }).join('');
        els.projectSaveProject.disabled = false;
        els.projectSaveSubmit.disabled = false;
    }

    function loadStudyProjects(forceRefresh) {
        var force = forceRefresh === true;
        var now = Date.now();
        var staleMs = 60 * 1000;
        if (!force && state.studyProjectsPromise) {
            return state.studyProjectsPromise;
        }
        if (!force && state.studyProjectsLoadedAt > 0 && (now - state.studyProjectsLoadedAt) < staleMs) {
            return Promise.resolve(Array.isArray(state.studyProjects) ? state.studyProjects.slice() : []);
        }

        state.studyProjectsPromise = fetch('?route=api.study.projects.list')
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo cargar los proyectos.');
                }
                state.studyProjects = Array.isArray(res.projects) ? res.projects : [];
                state.studyProjectsLoadedAt = Date.now();
                return state.studyProjects.slice();
            })
            .finally(function () {
                state.studyProjectsPromise = null;
            });

        return state.studyProjectsPromise;
    }

    function submitProjectSaveModal() {
        if (!els.projectSaveProject || !els.projectSaveSubmit || !state.studyDraftEntry) {
            return;
        }
        var projectId = Number(els.projectSaveProject.value || 0);
        if (projectId < 1) {
            notify('Selecciona un proyecto.');
            return;
        }

        var note = els.projectSaveNote ? String(els.projectSaveNote.value || '').trim() : '';
        var draft = state.studyDraftEntry;
        els.projectSaveSubmit.disabled = true;

        postForm('api.study.entries.create', {
            project_id: projectId,
            book: draft.book,
            chapter: draft.chapter,
            verse_start: draft.verseStart,
            verse_end: draft.verseEnd,
            note: note,
            strong_code: String(draft.strongCode || ''),
            strong_term: String(draft.strongTerm || ''),
            commentary_excerpt: String(draft.commentaryExcerpt || '')
        }).then(function (res) {
            if (!res || res.error) {
                throw new Error((res && res.error) ? res.error : 'No se pudo guardar en el proyecto.');
            }
            var selected = (state.studyProjects || []).find(function (project) {
                return Number(project.id || 0) === projectId;
            });
            if (selected) {
                selected.entries_count = Number(selected.entries_count || 0) + 1;
            }
            notify('Pasaje guardado en proyecto' + (selected ? ': ' + String(selected.name || '') : '.') );
            closeProjectSaveModal();
        }).catch(function (err) {
            notify((err && err.message) ? err.message : 'No se pudo guardar en el proyecto.');
        }).finally(function () {
            if (els.projectSaveSubmit) {
                els.projectSaveSubmit.disabled = false;
            }
        });
    }

    function closeProjectSaveModal() {
        if (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden')) {
            return;
        }
        els.projectSaveModal.classList.add('hidden');
        state.studyDraftEntry = null;
        if (els.projectSaveNote) {
            els.projectSaveNote.value = '';
        }
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closeSearch() {
        if (!els.searchModal || els.searchModal.classList.contains('hidden')) {
            return;
        }
        els.searchModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closePlan() {
        if (!els.planModal || els.planModal.classList.contains('hidden')) {
            return;
        }
        els.planModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closeVersions() {
        if (!els.versionsModal || els.versionsModal.classList.contains('hidden')) {
            return;
        }
        els.versionsModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closeInterlinear() {
        if (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) {
            return;
        }
        els.interlinearModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function renderInterlinearRows(rows) {
        if (!els.interlinearModalBody) {
            return;
        }
        if (!rows.length) {
            els.interlinearModalBody.innerHTML = '<p class="muted">No hay datos interlineales para este rango.</p>';
            return;
        }

        var html = rows.map(function (row) {
            var tokens = Array.isArray(row.tokens) ? row.tokens : [];
            var tokenHtml = tokens.map(function (token) {
                var word = escapeHtml(token.word || '');
                var code = escapeHtml(token.code || '');
                var entries = Array.isArray(token.entries) ? token.entries : [];
                var entry = entries.length ? entries[0] : null;
                var lemma = entry ? escapeHtml(entry.lemma || '') : '';
                var translit = entry ? escapeHtml(entry.translit || '') : '';
                var def = entry ? escapeHtml((entry.strongs_def || entry.kjv_def || '')) : '';
                return '' +
                    '<div class="interlinear-token">' +
                    '<strong>' + word + '</strong>' +
                    '<small>' + code + '</small>' +
                    (lemma || translit ? '<small class="muted">' + [lemma, translit].filter(Boolean).join(' · ') + '</small>' : '') +
                    (def ? '<p>' + def + '</p>' : '<p class="muted">Sin definición disponible.</p>') +
                    '</div>';
            }).join('');

            return '' +
                '<article class="card interlinear-card">' +
                '<strong>' + escapeHtml(row.reference || '') + '</strong>' +
                (tokenHtml ? '<div class="interlinear-grid">' + tokenHtml + '</div>' : '<p class="muted">Sin tokens con Strong para este versículo.</p>') +
                '</article>';
        }).join('');

        els.interlinearModalBody.innerHTML = html;
    }

    function closeStrong() {
        if (!els.strongModal || els.strongModal.classList.contains('hidden')) {
            return;
        }
        els.strongModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function closeAudio() {
        if (!els.audioModal || els.audioModal.classList.contains('hidden')) {
            return;
        }
        els.audioModal.classList.add('hidden');
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden'))) {
            els.overlay.classList.add('hidden');
        }
    }

    function openStrongLookup(rawCodes, options) {
        var codes = parseStrongCodes(rawCodes);
        if (!codes.length) {
            notify('Este término no tiene código Strong válido.');
            return;
        }
        if (!els.strongModal || !els.strongModalBody) {
            return;
        }

        var loadingHtml = '<p class="muted">Cargando definición Strong...</p>';
        els.strongModalBody.innerHTML = loadingHtml;
        els.overlay.classList.remove('hidden');
        els.strongModal.classList.remove('hidden');

        var params = new URLSearchParams({
            route: 'api.strong.lookup',
            codes: codes.join(',')
        });
        if (options && Number(options.book || 0) > 0) {
            params.set('book', String(Number(options.book)));
        }
        if (options && Number(options.chapter || 0) > 0) {
            params.set('chapter', String(Number(options.chapter)));
        }
        if (options && Number(options.verse || 0) > 0) {
            params.set('verse', String(Number(options.verse)));
        }
        if (options && String(options.word || '').trim() !== '') {
            params.set('word', String(options.word).trim().slice(0, 80));
        }

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo cargar Strong.');
                }
                var entries = Array.isArray(res.entries) ? res.entries : [];
                var dictionaryRows = Array.isArray(res.dictionary_rows) ? res.dictionary_rows : [];
                entries.forEach(function (entry) {
                    var code = String(entry && entry.code ? entry.code : '').toUpperCase();
                    if (!code) {
                        return;
                    }
                    state.strongCache[code] = entry;
                });

                var merged = [];
                var seen = {};
                codes.forEach(function (code) {
                    var key = String(code || '').toUpperCase();
                    if (!key || seen[key]) {
                        return;
                    }
                    seen[key] = true;
                    if (state.strongCache[key]) {
                        merged.push(state.strongCache[key]);
                    }
                });
                renderStrongEntries(merged, codes, dictionaryRows, options || {});
            })
            .catch(function (err) {
                var fallback = [];
                codes.forEach(function (code) {
                    var key = String(code || '').toUpperCase();
                    if (state.strongCache[key]) {
                        fallback.push(state.strongCache[key]);
                    }
                });
                if (fallback.length) {
                    renderStrongEntries(fallback, codes, [], options || {});
                    return;
                }
                var msg = (err && err.message) ? err.message : 'No se pudo cargar Strong.';
                els.strongModalBody.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
            });
    }

    function parseStrongCodes(rawCodes) {
        var raw = String(rawCodes || '').toUpperCase().trim();
        if (!raw) {
            return [];
        }
        var tokens = raw.split(/[\s,;]+/);
        var map = {};
        tokens.forEach(function (token) {
            var match = String(token || '').match(/^([GH])0*([0-9]{1,5})$/);
            if (!match) {
                return;
            }
            var number = Number(match[2]);
            if (!number || number < 1) {
                return;
            }
            var code = match[1] + String(number);
            map[code] = true;
        });
        return Object.keys(map);
    }

    function renderStrongEntries(entries, requestedCodes, dictionaryRows, options) {
        if (!els.strongModalBody) {
            return;
        }

        var list = Array.isArray(entries) ? entries : [];
        var dictionaryList = Array.isArray(dictionaryRows) ? dictionaryRows : [];
        var lookupOptions = options && typeof options === 'object' ? options : {};
        if (!list.length) {
            if (dictionaryList.length) {
                var onlyDictionaryHtml = '' +
                    '<article class="card strong-entry-card">' +
                    '<strong>Diccionario bíblico</strong>' +
                    '<ul class="context-list">' + dictionaryList.map(function (row) {
                        var refs = Array.isArray(row.references) ? row.references : [];
                        return '<li><strong>' + escapeHtml(row.term || '') + ':</strong> ' +
                            escapeHtml(row.definition || '') +
                            (row.usage ? ' <span class="muted">(' + escapeHtml(row.usage) + ')</span>' : '') +
                            (refs.length ? '<br><small class="muted">Refs: ' + escapeHtml(refs.join(', ')) + '</small>' : '') +
                            '<br><small class="muted">Fuente: ' + escapeHtml(row.module_name || 'Diccionario') + '</small></li>';
                    }).join('') + '</ul>' +
                    '</article>';
                els.strongModalBody.innerHTML = '<div class="strong-entry-list">' + onlyDictionaryHtml + '</div>';
                return;
            }
            var requested = Array.isArray(requestedCodes) ? requestedCodes.join(', ') : '';
            els.strongModalBody.innerHTML = '' +
                '<p class="muted">No se encontró definición para ' + escapeHtml(requested) + '.</p>' +
                '<p class="muted">Revisa que la versión tenga códigos Strong y que el índice esté generado.</p>';
            return;
        }

        var html = list.map(function (entry) {
            var code = escapeHtml(entry.code || '');
            var lemma = escapeHtml(entry.lemma || '');
            var translit = escapeHtml(entry.translit || '');
            var pron = escapeHtml(entry.pron || '');
            var primaryDef = escapeHtml(entry.strongs_def || entry.short_def || '');
            var relatedDictionary = filterDictionaryRowsForStrong(entry, dictionaryList);
            var projectPayload = buildStrongProjectDraft(entry, relatedDictionary, lookupOptions);

            var meta = [lemma, translit, pron].filter(function (part) {
                return String(part || '').trim() !== '';
            }).join(' · ');
            var dictionaryHtml = relatedDictionary.length
                ? '<ul class="context-list">' + relatedDictionary.map(function (row) {
                    var refs = Array.isArray(row.references) ? row.references : [];
                    return '<li><strong>' + escapeHtml(row.term || '') + ':</strong> ' +
                        escapeHtml(row.definition || '') +
                        (row.usage ? ' <span class="muted">(' + escapeHtml(row.usage) + ')</span>' : '') +
                        (refs.length ? '<br><small class="muted">Refs: ' + escapeHtml(refs.join(', ')) + '</small>' : '') +
                        '<br><small class="muted">Fuente: ' + escapeHtml(row.module_name || 'Diccionario') + '</small></li>';
                }).join('') + '</ul>'
                : '<p class="muted">Sin definición adicional en el diccionario bíblico integrado.</p>';

            return '' +
                '<article class="card strong-entry-card">' +
                '<strong class="strong-entry-code">' + code + '</strong>' +
                (meta ? '<p class="muted strong-entry-meta">' + meta + '</p>' : '') +
                (primaryDef ? '<p><strong>Strong en español:</strong> ' + primaryDef + '</p>' : '<p class="muted">Sin definición Strong disponible.</p>') +
                '<div class="strong-sub-block"><strong>Diccionario bíblico</strong>' + dictionaryHtml + '</div>' +
                '<div class="toolbar module-actions">' +
                '<button class="btn-primary js-save-strong-project" type="button" ' +
                'data-book="' + Number(projectPayload.book || 0) + '" ' +
                'data-chapter="' + Number(projectPayload.chapter || 0) + '" ' +
                'data-verse-start="' + Number(projectPayload.verseStart || 0) + '" ' +
                'data-verse-end="' + Number(projectPayload.verseEnd || 0) + '" ' +
                'data-reference="' + escapeHtml(projectPayload.reference || '') + '" ' +
                'data-source="' + escapeHtml(projectPayload.source || '') + '" ' +
                'data-note="' + escapeHtml(projectPayload.note || '') + '" ' +
                'data-strong-code="' + escapeHtml(projectPayload.strongCode || '') + '" ' +
                'data-strong-term="' + escapeHtml(projectPayload.strongTerm || '') + '" ' +
                'data-commentary-excerpt="' + escapeHtml(projectPayload.commentaryExcerpt || '') + '"' +
                (Number(projectPayload.book || 0) > 0 ? '' : ' disabled') +
                '>Agregar a proyecto</button>' +
                '</div>' +
                '</article>';
        }).join('');

        els.strongModalBody.innerHTML = '<div class="strong-entry-list">' + html + '</div>';
        els.strongModalBody.querySelectorAll('.js-save-strong-project').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verseStart = Number(this.getAttribute('data-verse-start') || 0);
                var verseEnd = Number(this.getAttribute('data-verse-end') || verseStart || 0);
                if (book < 1 || chapter < 1 || verseStart < 1 || verseEnd < 1) {
                    notify('No se pudo resolver la referencia para guardar el término.');
                    return;
                }
                openProjectSaveModal({
                    book: book,
                    chapter: chapter,
                    verseStart: verseStart,
                    verseEnd: verseEnd,
                    reference: String(this.getAttribute('data-reference') || ''),
                    source: String(this.getAttribute('data-source') || 'Strong'),
                    note: String(this.getAttribute('data-note') || ''),
                    strongCode: String(this.getAttribute('data-strong-code') || ''),
                    strongTerm: String(this.getAttribute('data-strong-term') || ''),
                    commentaryExcerpt: String(this.getAttribute('data-commentary-excerpt') || '')
                });
            });
        });
    }

    function filterDictionaryRowsForStrong(entry, rows) {
        var list = Array.isArray(rows) ? rows : [];
        if (!entry || !list.length) {
            return [];
        }
        var code = String((entry && entry.code) || '').toUpperCase().trim();
        var lemma = String((entry && entry.lemma) || '').trim().toLowerCase();
        var translit = String((entry && entry.translit) || '').trim().toLowerCase();
        var matches = list.filter(function (row) {
            var aliases = Array.isArray(row && row.aliases) ? row.aliases : [];
            for (var i = 0; i < aliases.length; i++) {
                var alias = String(aliases[i] || '').trim();
                var aliasUpper = alias.toUpperCase();
                var aliasLower = alias.toLowerCase();
                if ((code && aliasUpper === code) || (lemma && aliasLower === lemma) || (translit && aliasLower === translit)) {
                    return true;
                }
            }
            var termLower = String((row && row.term) || '').trim().toLowerCase();
            return (lemma && termLower === lemma) || (translit && termLower === translit);
        });
        if (matches.length) {
            return matches.slice(0, 2);
        }
        return list.slice(0, 2);
    }

    function buildStrongProjectDraft(entry, dictionaryRows, options) {
        var lookupOptions = options && typeof options === 'object' ? options : {};
        var book = Number(lookupOptions.book || state.currentBook || 0);
        var chapter = Number(lookupOptions.chapter || state.currentChapter || 0);
        var verse = Number(lookupOptions.verse || 0);
        var verseStart = verse > 0 ? verse : Number((selectedRange() || {}).start || 0);
        var verseEnd = verse > 0 ? verse : Number((selectedRange() || {}).end || verseStart || 0);
        var code = String((entry && entry.code) || '').trim();
        var word = String(lookupOptions.word || entry.lemma || entry.translit || code).trim();
        var strongDef = String((entry && (entry.strongs_def || entry.short_def)) || '').trim();
        var dict = Array.isArray(dictionaryRows) && dictionaryRows[0] ? dictionaryRows[0] : null;
        var dictLine = dict && dict.definition ? String(dict.definition).trim() : '';
        var noteParts = [];
        if (code || word) {
            noteParts.push('Strong ' + (code || '') + (word ? ' · ' + word : ''));
        }
        if (strongDef) {
            noteParts.push('Significado: ' + strongDef);
        }
        if (dictLine) {
            noteParts.push('Diccionario bíblico: ' + dictLine);
        }
        return {
            book: book,
            chapter: chapter,
            verseStart: verseStart,
            verseEnd: verseEnd > 0 ? verseEnd : verseStart,
            reference: book > 0 && chapter > 0 && verseStart > 0 ? toReference(book, chapter, verseStart, verseEnd > 0 ? verseEnd : verseStart) : '',
            source: 'Strong y diccionario integrado',
            note: noteParts.join('\n\n'),
            strongCode: code,
            strongTerm: word,
            commentaryExcerpt: dictLine
        };
    }

    function buildStrongReferenceGuideHtml(entries) {
        var matches = [];
        var seen = {};
        var list = Array.isArray(entries) ? entries : [];
        list.forEach(function (entry) {
            var probes = [
                String((entry && entry.short_def) || ''),
                String((entry && entry.strongs_def) || ''),
                String((entry && entry.kjv_def) || ''),
                String((entry && entry.derivation) || '')
            ];
            probes.forEach(function (text) {
                STRONG_MORPH_GLOSSARY.forEach(function (item) {
                    if (!item || !item.pattern || !item.label || !item.meaning) {
                        return;
                    }
                    if (!item.pattern.test(text)) {
                        return;
                    }
                    if (seen[item.label]) {
                        return;
                    }
                    seen[item.label] = true;
                    matches.push({
                        label: item.label,
                        meaning: item.meaning
                    });
                });
            });
        });

        var baseLabels = {
            sing: true,
            pl: true,
            masc: true,
            fem: true,
            pres: true,
            imperf: true,
            aor: true,
            perf: true,
            act: true,
            pas: true,
            qal: true,
            hiphil: true
        };
        var baseGlossary = [];
        STRONG_MORPH_GLOSSARY.forEach(function (item) {
            if (!item || !item.label || !item.meaning) {
                return;
            }
            if (!baseLabels[item.label]) {
                return;
            }
            baseGlossary.push({
                label: item.label,
                meaning: item.meaning
            });
        });

        if (!matches.length) {
            matches = baseGlossary.slice(0, 8);
        }
        var detectedHtml = matches.length
            ? (
                '<div class="strong-morph-section">' +
                '<small class="muted"><strong>Detectado en esta entrada:</strong> abreviaturas y formas encontradas en la definición.</small>' +
                '<div class="strong-glossary-grid">' +
                matches.slice(0, 10).map(function (item) {
                    return '<div class="strong-glossary-item"><strong>' + escapeHtml(item.label) + '</strong><small class="muted">' + escapeHtml(item.meaning) + '</small></div>';
                }).join('') +
                '</div>' +
                '</div>'
            )
            : '';
        var baseHtml = baseGlossary.length
            ? (
                '<div class="strong-morph-section">' +
                '<small class="muted"><strong>Glosario base:</strong> guía rápida para leer abreviaturas frecuentes.</small>' +
                '<div class="strong-glossary-grid">' +
                baseGlossary.slice(0, 12).map(function (item) {
                    return '<div class="strong-glossary-item"><strong>' + escapeHtml(item.label) + '</strong><small class="muted">' + escapeHtml(item.meaning) + '</small></div>';
                }).join('') +
                '</div>' +
                '</div>'
            )
            : '';

        return '' +
            '<article class="card strong-entry-card strong-guide-card">' +
            '<strong>Cómo leer Strong y diccionario</strong>' +
            '<ol class="guide-list guide-list-numbered">' +
            '<li>Lee primero la definición corta y el primer contexto bíblico.</li>' +
            '<li>Identifica el matiz gramatical (abreviaturas) y compáralo con el pasaje.</li>' +
            '<li>Contrasta con diccionario adicional y resume una aplicación en una frase.</li>' +
            '</ol>' +
            detectedHtml +
            baseHtml +
            '</article>';
    }

    function renderVersionSelectors() {
        if (!els.versionPrimarySelect || !els.versionCompareSelect) {
            return;
        }
        var rows = Array.isArray(state.versionsCatalog) ? state.versionsCatalog : [];
        if (!rows.length) {
            els.versionPrimarySelect.innerHTML = '<option value="">Sin versiones</option>';
            els.versionCompareSelect.innerHTML = '<option value="">Sin versiones</option>';
            if (els.versionCompareMulti) {
                els.versionCompareMulti.innerHTML = '<option value="">Sin versiones</option>';
            }
            if (els.saveVersions) {
                els.saveVersions.disabled = true;
            }
            return;
        }

        var primary = String(state.versionPrimaryFile || rows[0].file || '');
        var compare = String(state.versionCompareFile || primary);
        var compareFiles = Array.isArray(state.versionCompareFiles) ? state.versionCompareFiles.slice() : [];
        var map = {};
        rows.forEach(function (row) {
            map[String(row.file || '')] = true;
        });
        if (!map[primary]) {
            primary = String(rows[0].file || '');
        }
        if (!map[compare]) {
            compare = primary;
        }
        compareFiles = compareFiles.map(function (file) {
            return String(file || '').trim();
        }).filter(function (file) {
            return !!map[file] && file !== primary;
        });
        if (!compareFiles.length && compare && compare !== primary && map[compare]) {
            compareFiles = [compare];
        }
        if (!compareFiles.length) {
            for (var i = 0; i < rows.length; i += 1) {
                var candidate = String(rows[i].file || '');
                if (candidate && candidate !== primary) {
                    compareFiles.push(candidate);
                    break;
                }
            }
        }
        compare = String(compareFiles[0] || compare);
        if (!compare || compare === primary || !map[compare]) {
            compare = primary;
        }

        var extras = compareFiles.filter(function (file) {
            return file && file !== primary && file !== compare;
        }).slice(0, 2);
        compareFiles = [];
        if (compare && compare !== primary) {
            compareFiles.push(compare);
        }
        extras.forEach(function (file) {
            if (compareFiles.indexOf(file) === -1) {
                compareFiles.push(file);
            }
        });

        state.versionPrimaryFile = primary;
        state.versionCompareFile = compare;
        state.versionCompareFiles = compareFiles.slice();

        var options = rows.map(function (row) {
            var file = String(row.file || '');
            var label = String(row.label || file || 'Versión');
            var abbr = String(row.abbreviation || '').trim();
            var text = abbr ? (label + ' (' + abbr + ')') : label;
            return '<option value="' + escapeHtml(file) + '">' + escapeHtml(text) + '</option>';
        }).join('');

        els.versionPrimarySelect.innerHTML = options;
        els.versionCompareSelect.innerHTML = options;
        if (els.versionCompareMulti) {
            els.versionCompareMulti.innerHTML = rows.map(function (row) {
                var file = String(row.file || '');
                if (!file || file === primary || file === compare) {
                    return '';
                }
                var label = String(row.label || file || 'Versión');
                var abbr = String(row.abbreviation || '').trim();
                var text = abbr ? (label + ' (' + abbr + ')') : label;
                var selected = extras.indexOf(file) !== -1 ? ' selected' : '';
                return '<option value="' + escapeHtml(file) + '"' + selected + '>' + escapeHtml(text) + '</option>';
            }).join('');
        }
        els.versionPrimarySelect.value = primary;
        els.versionCompareSelect.value = compare;
        if (els.saveVersions) {
            els.saveVersions.disabled = false;
        }
    }

    function saveVersionSelection() {
        if (!els.versionPrimarySelect || !els.versionCompareSelect || !els.saveVersions) {
            return;
        }

        var primary = String(els.versionPrimarySelect.value || '').trim();
        var compare = String(els.versionCompareSelect.value || '').trim();
        var extras = [];
        if (els.versionCompareMulti && els.versionCompareMulti.options) {
            for (var i = 0; i < els.versionCompareMulti.options.length; i += 1) {
                var opt = els.versionCompareMulti.options[i];
                if (!opt || !opt.selected) {
                    continue;
                }
                var extraFile = String(opt.value || '').trim();
                if (!extraFile || extraFile === primary || extraFile === compare) {
                    continue;
                }
                if (extras.indexOf(extraFile) === -1) {
                    extras.push(extraFile);
                }
                if (extras.length >= 2) {
                    break;
                }
            }
        }
        if (!primary) {
            notify('Selecciona una versión principal.');
            return;
        }
        if (!compare) {
            compare = primary;
            els.versionCompareSelect.value = compare;
        }

        var compareFiles = [];
        if (compare && compare !== primary) {
            compareFiles.push(compare);
        }
        extras.forEach(function (file) {
            if (file && file !== primary && compareFiles.indexOf(file) === -1) {
                compareFiles.push(file);
            }
        });
        if (!compareFiles.length) {
            compareFiles.push(compare);
        }

        var button = els.saveVersions;
        button.disabled = true;
        var originalText = button.textContent;
        button.textContent = 'Guardando...';

        postForm('api.versions.set', {
            primary_file: primary,
            compare_file: compare,
            compare_files: compareFiles.join(',')
        }).then(function (res) {
            if (!res || !res.ok) {
                throw new Error((res && res.error) || 'No se pudo guardar la versión.');
            }
            state.versionPrimaryFile = primary;
            state.versionCompareFile = compare;
            state.versionCompareFiles = compareFiles.slice(0, 3);
            notify('Versiones actualizadas.');

            var verse = Number((state.selectedVerses && state.selectedVerses.length ? state.selectedVerses[0] : state.pendingVerse) || 0);
            var url = '?route=reader&book=' + encodeURIComponent(state.currentBook) + '&chapter=' + encodeURIComponent(state.currentChapter);
            if (verse > 0) {
                url += '&verse=' + encodeURIComponent(verse);
            }
            window.location.assign(url);
        }).catch(function (err) {
            notify((err && err.message) ? err.message : 'No se pudo guardar la versión.');
        }).finally(function () {
            button.disabled = false;
            button.textContent = originalText;
        });
    }

    function readSearchRangeFilters() {
        var book = (document.getElementById('qBook').value || '').trim();
        var chapterFrom = (document.getElementById('qChapterFrom').value || '').trim();
        var chapterTo = (document.getElementById('qChapterTo').value || '').trim();
        var scope = (document.getElementById('qScope').value || 'all').trim().toLowerCase();
        if (scope !== 'ot' && scope !== 'nt') {
            scope = 'all';
        }
        if (chapterFrom && chapterTo && Number(chapterFrom) > Number(chapterTo)) {
            return {
                error: 'El capítulo inicial no puede ser mayor al capítulo final.'
            };
        }
        return {
            book: book,
            chapterFrom: chapterFrom,
            chapterTo: chapterTo,
            scope: scope
        };
    }

    function normalizeThemeFilterText(value) {
        var text = String(value || '').toLowerCase().trim();
        if (!text) {
            return '';
        }
        var map = {
            'á': 'a',
            'é': 'e',
            'í': 'i',
            'ó': 'o',
            'ú': 'u',
            'ü': 'u',
            'ñ': 'n'
        };
        return text.replace(/[áéíóúüñ]/g, function (ch) {
            return map[ch] || ch;
        }).replace(/\s+/g, ' ').trim();
    }

    function bindThemeSelectSearch() {
        if (!els.qTheme || !els.qThemeSearch || !els.qThemeToggle || !els.qThemePanel || !els.qThemeOptions || !els.qThemeLabel) {
            return;
        }

        var options = Array.prototype.slice.call(els.qTheme.querySelectorAll('option')).map(function (option) {
            return {
                value: String(option.value || ''),
                label: String(option.textContent || '')
            };
        });
        var currentTheme = String(els.qTheme.value || '');

        function setThemeValue(value) {
            currentTheme = String(value || '');
            els.qTheme.value = currentTheme;
            var picked = options.find(function (opt) { return opt.value === currentTheme; }) || options[0];
            els.qThemeLabel.textContent = picked ? picked.label : 'Todos los temas';
        }

        function openThemePanel() {
            els.qThemePanel.classList.remove('hidden');
            els.qThemeToggle.setAttribute('aria-expanded', 'true');
            renderThemeOptions();
            setTimeout(function () {
                if (els.qThemeSearch) {
                    els.qThemeSearch.focus();
                    els.qThemeSearch.select();
                }
            }, 0);
        }

        function closeThemePanel(clearSearch) {
            els.qThemePanel.classList.add('hidden');
            els.qThemeToggle.setAttribute('aria-expanded', 'false');
            if (clearSearch && els.qThemeSearch) {
                els.qThemeSearch.value = '';
                renderThemeOptions();
            }
        }

        function renderThemeOptions() {
            var query = normalizeThemeFilterText(els.qThemeSearch.value || '');
            var filtered = options.filter(function (opt, idx) {
                if (idx === 0) {
                    return true;
                }
                if (!query) {
                    return true;
                }
                return normalizeThemeFilterText(opt.label).indexOf(query) !== -1;
            });
            if (!filtered.length) {
                filtered = [options[0]];
            }

            els.qThemeOptions.innerHTML = filtered.map(function (opt) {
                var active = opt.value === currentTheme ? ' is-active' : '';
                return '<button type="button" class="theme-combo-option' + active + '" data-theme-value="' + escapeHtml(opt.value) + '">' +
                    escapeHtml(opt.label) +
                    '</button>';
            }).join('');

            els.qThemeOptions.querySelectorAll('.theme-combo-option').forEach(function (btn) {
                btn.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    setThemeValue(String(this.getAttribute('data-theme-value') || ''));
                    closeThemePanel(true);
                });
            });
        }

        setThemeValue(currentTheme);

        els.qThemeToggle.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            var isOpen = !els.qThemePanel.classList.contains('hidden');
            if (isOpen) {
                closeThemePanel(true);
            } else {
                openThemePanel();
            }
        });
        els.qThemeSearch.addEventListener('input', renderThemeOptions);
        els.qThemeSearch.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                event.preventDefault();
                closeThemePanel(true);
            }
        });

        document.addEventListener('click', function (event) {
            var target = event.target || null;
            var combo = document.getElementById('qThemeCombo');
            if (!combo || !target) {
                return;
            }
            if (!combo.contains(target)) {
                closeThemePanel(true);
            }
        });

        renderThemeOptions();
    }

    function runThemeSearch(themeOverride) {
        var selected = String(themeOverride || (els.qTheme ? els.qTheme.value : '') || '').trim();
        if (!selected) {
            var fallbackQ = (document.getElementById('qText').value || '').trim();
            if (fallbackQ) {
                runQuickSearch();
                return;
            }
            notify('Selecciona un tema para la concordancia.');
            return;
        }
        if (els.qTheme) {
            els.qTheme.value = selected;
            if (els.qThemeLabel) {
                var selectedLabel = selected;
                Array.prototype.slice.call(els.qTheme.querySelectorAll('option')).some(function (option) {
                    if (String(option.value || '') !== selected) {
                        return false;
                    }
                    selectedLabel = String(option.textContent || selected);
                    return true;
                });
                els.qThemeLabel.textContent = selectedLabel || 'Todos los temas';
            }
        }

        var range = readSearchRangeFilters();
        if (range.error) {
            notify(range.error);
            return;
        }

        var params = new URLSearchParams({
            route: 'api.search.theme',
            theme: selected,
            limit: '80'
        });
        if (range.book) {
            params.set('book', range.book);
        }
        if (range.scope && range.scope !== 'all') {
            params.set('testament', range.scope);
        }
        if (range.chapterFrom) {
            params.set('chapter_from', range.chapterFrom);
        }
        if (range.chapterTo) {
            params.set('chapter_to', range.chapterTo);
        }

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                if (!res || res.error) {
                    throw new Error((res && res.error) ? res.error : 'No se pudo ejecutar la concordancia temática.');
                }
                renderSearchResults(res.rows || [], res.engine || '', res.meta || {});
                fetchStatsPanel(true, false);
            })
            .catch(function (err) {
                var msg = (err && err.message) ? err.message : 'No se pudo ejecutar la concordancia temática.';
                notify(msg);
                if (els.quickSearchResults) {
                    els.quickSearchResults.innerHTML = '<p class="muted">' + escapeHtml(msg) + '</p>';
                }
            });
    }

    function runQuickSearch() {
        var q = (document.getElementById('qText').value || '').trim();
        var selectedTheme = String(els.qTheme && els.qTheme.value ? els.qTheme.value : '').trim();
        if (!q && selectedTheme) {
            runThemeSearch(selectedTheme);
            return;
        }
        if (!q) {
            notify('Escribe un texto de búsqueda.');
            return;
        }

        var range = readSearchRangeFilters();
        if (range.error) {
            notify(range.error);
            return;
        }

        var params = new URLSearchParams({
            route: 'api.search',
            q: q,
            mode: document.getElementById('qMode').value || 'any',
            limit: '80'
        });
        if (range.book) {
            params.set('book', range.book);
        }
        if (range.scope && range.scope !== 'all') {
            params.set('testament', range.scope);
        }
        if (range.chapterFrom) {
            params.set('chapter_from', range.chapterFrom);
        }
        if (range.chapterTo) {
            params.set('chapter_to', range.chapterTo);
        }

        fetch('?' + params.toString())
            .then(asJson)
            .then(function (res) {
                renderSearchResults(res.rows || [], res.engine || '', {});
            })
            .catch(function () {
                notify('No se pudo ejecutar la búsqueda.');
            });
    }

    function renderSearchResults(rows, engine, meta) {
        var payload = meta && typeof meta === 'object' ? meta : {};
        if (!rows.length) {
            els.quickSearchResults.innerHTML = '<p class="muted">Sin resultados.</p>';
            return;
        }
        var header = '';
        if (payload.theme_label) {
            header = '<p class="muted">Tema: ' + escapeHtml(payload.theme_label) + (payload.theme_query ? ' · Consulta: ' + escapeHtml(payload.theme_query) : '') + '</p>';
        }
        var html = header + '<p class="muted">Motor: ' + escapeHtml(engine || '-') + ' · Resultados: ' + rows.length + '</p>';
        html += rows.map(function (row) {
            return '' +
                '<div class="search-result" data-book="' + row.book + '" data-chapter="' + row.chapter + '" data-verse="' + row.verse + '">' +
                '<strong>' + escapeHtml(row.reference || '') + '</strong>' +
                (row.title ? '<small class="muted">' + escapeHtml(row.title) + '</small>' : '') +
                '<div>' + (row.scripture_html || '') + '</div>' +
                '<div class="toolbar">' +
                '<button class="btn-light js-open-result" data-book="' + row.book + '" data-chapter="' + row.chapter + '" data-verse="' + row.verse + '">Abrir</button>' +
                '<button class="btn-light js-save-result-project" data-book="' + row.book + '" data-chapter="' + row.chapter + '" data-verse="' + row.verse + '">Proyecto</button>' +
                '<button class="btn-light js-save-result-fav" data-book="' + row.book + '" data-chapter="' + row.chapter + '" data-verse="' + row.verse + '">Favorito</button>' +
                '</div>' +
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

        els.quickSearchResults.querySelectorAll('.js-save-result-fav').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verse = Number(this.getAttribute('data-verse') || 0);
                if (book < 1 || chapter < 1 || verse < 1) {
                    return;
                }

                var self = this;
                self.disabled = true;
                saveFavoriteByReference(book, chapter, verse, 'Resultado agregado a favoritos.').finally(function () {
                    self.disabled = false;
                });
            });
        });

        els.quickSearchResults.querySelectorAll('.js-save-result-project').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var book = Number(this.getAttribute('data-book') || 0);
                var chapter = Number(this.getAttribute('data-chapter') || 0);
                var verse = Number(this.getAttribute('data-verse') || 0);
                if (book < 1 || chapter < 1 || verse < 1) {
                    return;
                }

                var container = this.closest('.search-result');
                var textNode = container ? container.querySelector('div') : null;
                var noteSeed = textNode ? cleanText(textNode.innerHTML || '') : '';
                openProjectSaveModal({
                    book: book,
                    chapter: chapter,
                    verseStart: verse,
                    verseEnd: verse,
                    reference: buildReference(book, chapter, verse),
                    source: 'Resultado de búsqueda',
                    note: noteSeed.slice(0, 380)
                });
            });
        });

        els.quickSearchResults.querySelectorAll('[data-strong]').forEach(function (node) {
            node.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                var container = this.closest('.search-result');
                openStrongLookup(String(this.getAttribute('data-strong') || ''), {
                    book: Number(container && container.getAttribute('data-book') ? container.getAttribute('data-book') : 0),
                    chapter: Number(container && container.getAttribute('data-chapter') ? container.getAttribute('data-chapter') : 0),
                    verse: Number(container && container.getAttribute('data-verse') ? container.getAttribute('data-verse') : 0),
                    word: String(this.textContent || '').trim()
                });
            });
        });
    }

    function bindSettingsInputs() {
        bindSetting('optShowHelp', 'showHelp', 'checkbox');
        bindSetting('optAutoTour', 'autoTourOnStart', 'checkbox');
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
            if (key === 'autoTourOnStart' && els.guideHideOnStart) {
                els.guideHideOnStart.checked = !state.settings.autoTourOnStart;
            }
            if (state.settings.preachMode && (key === 'layoutMode' || key === 'showHelp' || key === 'fontSize' || key === 'spacing')) {
                state.settings.preachMode = false;
                state.preachBackup = null;
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
        document.body.classList.toggle('mode-preach', state.settings.preachMode === true);
        document.body.classList.toggle('mode-parallel', state.settings.parallelMode === true);
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
            els.readerShell.classList.toggle('nav-hidden', state.settings.readerNavVisible === false);
        }
        if (els.toggleReaderSidebar) {
            var navVisible = state.settings.readerNavVisible !== false;
            els.toggleReaderSidebar.classList.toggle('is-active', navVisible);
            els.toggleReaderSidebar.setAttribute('title', navVisible ? 'Ocultar navegación' : 'Mostrar navegación');
            els.toggleReaderSidebar.setAttribute('aria-label', navVisible ? 'Ocultar navegación' : 'Mostrar navegación');
            var navLabel = els.toggleReaderSidebar.querySelector('.btn-label');
            if (navLabel) {
                navLabel.textContent = navVisible ? 'Navegación' : 'Mostrar';
            }
        }
        var reminderTimeInput = document.getElementById('optReminderTime');
        if (reminderTimeInput) {
            reminderTimeInput.disabled = !state.settings.reminderEnabled;
        }
        if (els.toggleParallel) {
            els.toggleParallel.classList.toggle('is-active', state.settings.parallelMode === true);
        }
        syncPreachUi();
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
            state.settings.autoTourOnStart = state.settings.autoTourOnStart !== false && Number(state.settings.autoTourOnStart) !== 0;
            state.settings.preachMode = state.settings.preachMode === true || Number(state.settings.preachMode) === 1;
            state.settings.parallelMode = state.settings.parallelMode === true || Number(state.settings.parallelMode) === 1;
            state.settings.readerNavVisible = state.settings.readerNavVisible !== false && Number(state.settings.readerNavVisible) !== 0;
        } catch (err) {
            // ignore
        }
    }

    function saveSettings() {
        localStorage.setItem('biblia_settings', JSON.stringify(state.settings));
        localStorage.setItem('show_daily_start', state.settings.showDaily ? '1' : '0');
        syncUserPrefs();
    }

    function loadPreachPrefs() {
        try {
            var raw = localStorage.getItem('biblia_preach_prefs');
            if (!raw) {
                return;
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return;
            }

            var elapsed = Number(parsed.timer_elapsed_ms || 0);
            if (Number.isFinite(elapsed) && elapsed >= 0) {
                state.preach.timerElapsedMs = Math.round(elapsed);
            }

            var cleaned = {};
            var markers = parsed.markers_by_chapter;
            if (markers && typeof markers === 'object') {
                Object.keys(markers).forEach(function (chapterKey) {
                    var row = markers[chapterKey];
                    if (!row || typeof row !== 'object') {
                        return;
                    }
                    var nextRow = {};
                    for (var slot = 1; slot <= 3; slot++) {
                        var verse = Number(row[String(slot)] || row[slot] || 0);
                        if (!Number.isFinite(verse) || verse < 1) {
                            continue;
                        }
                        nextRow[String(slot)] = Math.round(verse);
                    }
                    if (Object.keys(nextRow).length) {
                        cleaned[chapterKey] = nextRow;
                    }
                });
            }
            state.preach.markersByChapter = cleaned;
        } catch (err) {
            // ignore
        }
    }

    function savePreachPrefs() {
        var elapsed = getPreachTimerElapsedMs();
        localStorage.setItem('biblia_preach_prefs', JSON.stringify({
            timer_elapsed_ms: elapsed,
            markers_by_chapter: state.preach.markersByChapter || {}
        }));
    }

    function getPreachTimerElapsedMs() {
        var elapsed = Number(state.preach.timerElapsedMs || 0);
        if (!Number.isFinite(elapsed) || elapsed < 0) {
            elapsed = 0;
        }
        if (state.preach.timerRunning && Number(state.preach.timerStartedAt || 0) > 0) {
            elapsed += Math.max(0, Date.now() - Number(state.preach.timerStartedAt));
        }
        return Math.max(0, Math.round(elapsed));
    }

    function togglePreachTimer() {
        if (state.preach.timerRunning) {
            pausePreachTimer(false);
            return;
        }
        state.preach.timerRunning = true;
        state.preach.timerStartedAt = Date.now();
        if (state.preach.timerTickId) {
            clearInterval(state.preach.timerTickId);
            state.preach.timerTickId = null;
        }
        state.preach.timerTickId = setInterval(function () {
            renderPreachTimer();
        }, 1000);
        renderPreachTimer();
        savePreachPrefs();
        notify('Temporizador iniciado.');
    }

    function pausePreachTimer(silent) {
        if (!state.preach.timerRunning) {
            renderPreachTimer();
            return;
        }
        state.preach.timerElapsedMs = getPreachTimerElapsedMs();
        state.preach.timerRunning = false;
        state.preach.timerStartedAt = 0;
        if (state.preach.timerTickId) {
            clearInterval(state.preach.timerTickId);
            state.preach.timerTickId = null;
        }
        renderPreachTimer();
        savePreachPrefs();
        if (!silent) {
            notify('Temporizador en pausa.');
        }
    }

    function resetPreachTimer() {
        pausePreachTimer(true);
        state.preach.timerElapsedMs = 0;
        renderPreachTimer();
        savePreachPrefs();
        notify('Temporizador reiniciado.');
    }

    function renderPreachTimer() {
        if (!els.preachTimerDisplay) {
            return;
        }
        els.preachTimerDisplay.textContent = formatPreachTimer(getPreachTimerElapsedMs());
        if (els.preachTimerToggle) {
            els.preachTimerToggle.textContent = state.preach.timerRunning ? 'Pausar' : 'Iniciar';
            els.preachTimerToggle.setAttribute('aria-label', state.preach.timerRunning ? 'Pausar temporizador' : 'Iniciar temporizador');
        }
    }

    function formatPreachTimer(ms) {
        var totalSeconds = Math.max(0, Math.floor(Number(ms || 0) / 1000));
        var hours = Math.floor(totalSeconds / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        var mm = String(minutes).padStart(2, '0');
        var ss = String(seconds).padStart(2, '0');
        if (hours > 0) {
            return String(hours) + ':' + mm + ':' + ss;
        }
        return mm + ':' + ss;
    }

    function preachChapterKey() {
        return String(state.currentBook) + ':' + String(state.currentChapter);
    }

    function getPreachMarkersForCurrentChapter(createIfMissing) {
        var key = preachChapterKey();
        var existing = state.preach.markersByChapter[key];
        if (!existing || typeof existing !== 'object') {
            if (!createIfMissing) {
                return {};
            }
            state.preach.markersByChapter[key] = {};
            return state.preach.markersByChapter[key];
        }
        return existing;
    }

    function chapterHasVerse(verse) {
        var target = Number(verse || 0);
        if (target < 1) {
            return false;
        }
        for (var i = 0; i < state.verses.length; i++) {
            if (Number(state.verses[i].verse || 0) === target) {
                return true;
            }
        }
        return false;
    }

    function getVisibleCenterVerse() {
        if (!els.versesContainer) {
            return 0;
        }
        var rows = els.versesContainer.querySelectorAll('.verse[data-verse]');
        if (!rows.length) {
            return 0;
        }

        var containerRect = els.versesContainer.getBoundingClientRect();
        var centerY = containerRect.top + (containerRect.height / 2);
        var nearestVerse = 0;
        var nearestDistance = Infinity;

        rows.forEach(function (row) {
            var verse = Number(row.getAttribute('data-verse') || 0);
            if (verse < 1) {
                return;
            }
            var rect = row.getBoundingClientRect();
            var visible = rect.bottom > containerRect.top && rect.top < containerRect.bottom;
            if (!visible) {
                return;
            }
            var rowCenter = rect.top + (rect.height / 2);
            var distance = Math.abs(rowCenter - centerY);
            if (distance < nearestDistance) {
                nearestDistance = distance;
                nearestVerse = verse;
            }
        });

        return nearestVerse;
    }

    function getCurrentPreachMarkerVerse() {
        var centered = Number(getVisibleCenterVerse() || 0);
        if (chapterHasVerse(centered)) {
            return centered;
        }

        var selected = Number((state.selectedVerses && state.selectedVerses.length ? state.selectedVerses[0] : 0) || 0);
        if (chapterHasVerse(selected)) {
            return selected;
        }

        var last = Number(state.lastSelectedVerse || 0);
        if (chapterHasVerse(last)) {
            return last;
        }

        var typed = Number((els.preachVerseJump && els.preachVerseJump.value) ? els.preachVerseJump.value : 0);
        if (chapterHasVerse(typed)) {
            return typed;
        }

        if (centered > 0) {
            return centered;
        }

        if (state.verses.length) {
            return Number(state.verses[0].verse || 1);
        }
        return 0;
    }

    function setPreachMarker(slot) {
        var markerSlot = Number(slot || 0);
        if (markerSlot < 1 || markerSlot > 3) {
            return;
        }
        var verse = getCurrentPreachMarkerVerse();
        if (verse < 1) {
            notify('No se pudo detectar un versículo para el marcador.');
            return;
        }
        var markers = getPreachMarkersForCurrentChapter(true);
        markers[String(markerSlot)] = verse;
        savePreachPrefs();
        renderPreachMarkers();
        if (els.preachVerseJump) {
            els.preachVerseJump.value = String(verse);
        }
        notify('Marcador M' + markerSlot + ' guardado en versículo ' + verse + '.');
    }

    function goToPreachMarker(slot) {
        var markerSlot = Number(slot || 0);
        if (markerSlot < 1 || markerSlot > 3) {
            return;
        }
        var markers = getPreachMarkersForCurrentChapter(false);
        var verse = Number(markers[String(markerSlot)] || 0);
        if (verse < 1) {
            notify('El marcador M' + markerSlot + ' no está definido en este capítulo.');
            return;
        }
        if (!chapterHasVerse(verse)) {
            notify('El versículo del marcador no existe en este capítulo.');
            return;
        }
        if (els.preachVerseJump) {
            els.preachVerseJump.value = String(verse);
        }
        selectSingleVerse(verse, true);
    }

    function renderPreachMarkers() {
        var markers = getPreachMarkersForCurrentChapter(false);
        var slots = [
            { n: 1, set: els.preachSetMarker1, go: els.preachGoMarker1 },
            { n: 2, set: els.preachSetMarker2, go: els.preachGoMarker2 },
            { n: 3, set: els.preachSetMarker3, go: els.preachGoMarker3 }
        ];

        slots.forEach(function (slot) {
            var verse = Number(markers[String(slot.n)] || 0);
            if (slot.set) {
                slot.set.textContent = verse > 0 ? ('Fijar M' + slot.n + ' (v' + verse + ')') : ('Fijar M' + slot.n);
            }
            if (slot.go) {
                slot.go.disabled = verse < 1 || !chapterHasVerse(verse);
                slot.go.textContent = verse > 0 ? ('Ir M' + slot.n + ' (v' + verse + ')') : ('Ir M' + slot.n);
            }
        });
    }

    function setPreachMode(enabled) {
        var next = Boolean(enabled);
        var current = state.settings.preachMode === true;
        if (next === current) {
            syncPreachUi();
            return;
        }

        if (next) {
            state.preachBackup = {
                layoutMode: state.settings.layoutMode,
                showHelp: state.settings.showHelp,
                fontSize: state.settings.fontSize,
                spacing: state.settings.spacing,
                fontScale: Number(state.settings.fontScale || 100)
            };
            state.settings.preachMode = true;
            state.settings.layoutMode = 'focus';
            state.settings.showHelp = false;
            state.settings.fontSize = 'lg';
            state.settings.spacing = 'normal';
            if (Number(state.settings.fontScale || 100) < 120) {
                state.settings.fontScale = 120;
            }
            closeDrawers();
            activateTab('contexto');
            notify('Modo predicación activado.');
        } else {
            pausePreachTimer(true);
            var backup = state.preachBackup || {};
            state.settings.preachMode = false;
            state.settings.layoutMode = backup.layoutMode || 'columns';
            state.settings.showHelp = typeof backup.showHelp === 'boolean' ? backup.showHelp : true;
            state.settings.fontSize = backup.fontSize || 'md';
            state.settings.spacing = backup.spacing || 'normal';
            if (Number.isFinite(Number(backup.fontScale))) {
                state.settings.fontScale = Number(backup.fontScale);
            }
            state.preachBackup = null;
            notify('Modo predicación desactivado.');
        }

        saveSettings();
        applySettings();
    }

    function syncPreachUi() {
        var active = state.settings.preachMode === true;
        if (els.preachControls) {
            els.preachControls.classList.toggle('hidden', !active);
        }
        if (els.togglePreachMode) {
            els.togglePreachMode.classList.toggle('is-active', active);
            els.togglePreachMode.setAttribute('title', active ? 'Salir de modo predicación' : 'Modo predicación');
            els.togglePreachMode.setAttribute('aria-label', active ? 'Salir de modo predicación' : 'Modo predicación');
            var label = els.togglePreachMode.querySelector('.btn-label');
            if (label) {
                label.textContent = active ? 'Salir' : 'Predicación';
            }
        }
        updatePreachControlsFromChapter();
    }

    function updatePreachControlsFromChapter() {
        var idx = chapterIndexOf(state.currentChapter);
        var hasPrev = idx > 0;
        var hasNext = idx >= 0 && idx < state.chapters.length - 1;
        if (els.preachPrevChapter) {
            els.preachPrevChapter.disabled = !hasPrev;
        }
        if (els.preachNextChapter) {
            els.preachNextChapter.disabled = !hasNext;
        }
        if (els.preachVerseJump) {
            var maxVerse = Number((state.verses[state.verses.length - 1] || {}).verse || 0);
            if (maxVerse > 0) {
                els.preachVerseJump.max = String(maxVerse);
                els.preachVerseJump.placeholder = 'Versículo (1-' + maxVerse + ')';
            } else {
                els.preachVerseJump.removeAttribute('max');
                els.preachVerseJump.placeholder = 'Versículo';
            }
        }
        renderPreachTimer();
        renderPreachMarkers();
    }

    function chapterIndexOf(chapter) {
        var target = Number(chapter || 0);
        for (var i = 0; i < state.chapters.length; i++) {
            if (Number(state.chapters[i] || 0) === target) {
                return i;
            }
        }
        return -1;
    }

    function goToAdjacentChapter(step) {
        var delta = Number(step || 0);
        if (!delta) {
            return;
        }
        var idx = chapterIndexOf(state.currentChapter);
        if (idx < 0) {
            return;
        }
        var nextIdx = idx + (delta < 0 ? -1 : 1);
        if (nextIdx < 0 || nextIdx >= state.chapters.length) {
            notify(delta < 0 ? 'No hay capítulo anterior.' : 'No hay capítulo siguiente.');
            return;
        }
        fetchChapter(state.currentBook, Number(state.chapters[nextIdx]));
    }

    function jumpToVerseFromPreachInput() {
        if (!els.preachVerseJump) {
            return;
        }
        var target = Number(els.preachVerseJump.value || 0);
        var maxVerse = Number((state.verses[state.verses.length - 1] || {}).verse || 0);
        if (target < 1 || (maxVerse > 0 && target > maxVerse)) {
            notify('Versículo fuera de rango.');
            return;
        }
        selectSingleVerse(target, true);
    }

    function openHelpDrawer() {
        els.helpPane.classList.remove('hidden');
        els.helpPane.classList.add('is-open');
        els.overlay.classList.remove('hidden');
    }

    function closeDrawers(options) {
        var keepGuide = Boolean(options && options.keepGuide === true);
        hideFavoriteTooltip();
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
        if (els.versionsModal && !els.versionsModal.classList.contains('hidden')) {
            els.versionsModal.classList.add('hidden');
        }
        if (els.interlinearModal && !els.interlinearModal.classList.contains('hidden')) {
            els.interlinearModal.classList.add('hidden');
        }
        if (els.strongModal && !els.strongModal.classList.contains('hidden')) {
            els.strongModal.classList.add('hidden');
        }
        if (els.audioModal && !els.audioModal.classList.contains('hidden')) {
            els.audioModal.classList.add('hidden');
        }
        if (els.modulesModal && !els.modulesModal.classList.contains('hidden')) {
            els.modulesModal.classList.add('hidden');
        }
        if (els.projectSaveModal && !els.projectSaveModal.classList.contains('hidden')) {
            els.projectSaveModal.classList.add('hidden');
            state.studyDraftEntry = null;
            if (els.projectSaveNote) {
                els.projectSaveNote.value = '';
            }
        }
        if (els.readerAuthGateModal && !els.readerAuthGateModal.classList.contains('hidden')) {
            els.readerAuthGateModal.classList.add('hidden');
            if (els.readerAuthGateBody) {
                els.readerAuthGateBody.innerHTML = '';
            }
        }
        if (!keepGuide && els.guideModal && !els.guideModal.classList.contains('hidden')) {
            els.guideModal.classList.add('hidden');
            clearGuideFocus();
            if (els.overlay) {
                els.overlay.classList.remove('is-guide-mode');
            }
            document.body.classList.remove('guide-tour-active');
            document.body.classList.remove('guide-step-pulse');
            if (state.guide.stepAnimTimer) {
                window.clearTimeout(state.guide.stepAnimTimer);
                state.guide.stepAnimTimer = 0;
            }
            els.guideModal.classList.remove('guide-step-enter');
        }
        if (els.settingsModal.classList.contains('hidden') &&
            els.searchModal.classList.contains('hidden') &&
            (!els.planModal || els.planModal.classList.contains('hidden')) &&
            (!els.interlinearModal || els.interlinearModal.classList.contains('hidden')) &&
            (!els.versionsModal || els.versionsModal.classList.contains('hidden')) &&
            (!els.strongModal || els.strongModal.classList.contains('hidden')) &&
            (!els.audioModal || els.audioModal.classList.contains('hidden')) &&
            (keepGuide || !els.guideModal || els.guideModal.classList.contains('hidden')) &&
            (!els.modulesModal || els.modulesModal.classList.contains('hidden')) &&
            (!els.projectSaveModal || els.projectSaveModal.classList.contains('hidden')) &&
            (!els.readerAuthGateModal || els.readerAuthGateModal.classList.contains('hidden'))) {
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
        return res.json().then(function (payload) {
            if (res.status === 401 && payload && payload.login_gate) {
                openReaderAuthGate(String((payload.login_gate && payload.login_gate.key) || 'advanced_tools'), payload.login_gate);
                var authError = new Error(String(payload.error || 'Inicia sesión para continuar.'));
                authError.code = 'login_required';
                authError.payload = payload;
                throw authError;
            }
            return payload;
        });
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

    function stripDefinitionPrefix(value) {
        return String(value || '').replace(/^\s*definici[oó]n\s*:\s*/i, '').trim();
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
        if (params.get('book') || params.get('chapter') || params.get('verse')) {
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
            if (!state.auth.isLogged) {
                return;
            }
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
            flushReadingTelemetry(true);
            fetchStatsPanel(true, false);
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
        var swUrl = (window.__BIBLIASOFT_SW_URL && String(window.__BIBLIASOFT_SW_URL)) || 'sw.js';
        navigator.serviceWorker.register(swUrl).then(function () {
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

    function currentReaderNextUrl() {
        var next = window.location.search || '';
        if (!next) {
            next = '?route=reader';
        }
        if (next.indexOf('?') !== 0) {
            next = '?' + next;
        }
        return next;
    }

    function buildAuthGatePayload(featureKey, payload) {
        var base = state.auth.gate && typeof state.auth.gate === 'object'
            ? JSON.parse(JSON.stringify(state.auth.gate))
            : {};
        var nextUrl = currentReaderNextUrl();
        var map = {
            advanced_tools: {
                badge: 'Acceso gratuito con registro',
                title: 'Activa tus herramientas avanzadas de lectura',
                lead: 'La lectura bíblica sigue abierta para todos. Para usar tus ayudas personales, crea tu cuenta gratis o inicia sesión.',
                feature_items: [
                    'Notas, vínculos, subrayados y respaldo por cuenta.',
                    'Centro de estudio con proyectos y materiales guardados.',
                    'Devocionales, anécdotas y funciones avanzadas.',
                    'Avisos de nuevos recursos y eventos en tu ciudad.'
                ]
            },
            study_center: {
                badge: 'Centro de estudio',
                title: 'Guarda este material en tu centro de estudio',
                lead: 'Con una cuenta gratuita podrás organizar proyectos, comentarios, notas y recursos por pasaje.',
                feature_items: [
                    'Proyectos por tema, serie o predicación.',
                    'Guardado de comentarios, Strong y notas.',
                    'Material listo para retomar en otra sesión.'
                ]
            },
            devotional: {
                badge: 'Devocionales',
                title: 'Activa devocionales y recursos personalizados',
                lead: 'Al registrarte gratis tendrás historial, nuevos recursos y seguimiento personal de lectura.',
                feature_items: [
                    'Historial devocional por cuenta.',
                    'Recursos nuevos y avisos ministeriales.',
                    'Seguimiento personal gratuito.'
                ]
            },
            anecdotes: {
                badge: 'Anécdotas',
                title: 'Abre anécdotas y apoyos para enseñar',
                lead: 'Con tu cuenta gratuita podrás guardar favoritos y seguir enriqueciendo tu enseñanza bíblica.',
                feature_items: [
                    'Anécdotas listas para predicar y enseñar.',
                    'Favoritos y seguimiento por cuenta.',
                    'Avisos de recursos y eventos.'
                ]
            }
        };
        var feature = map[featureKey] || map.advanced_tools;
        var registerUrl = '?route=register&next=' + encodeURIComponent(nextUrl);
        var loginUrl = '?route=login&next=' + encodeURIComponent(nextUrl);

        base.key = featureKey || 'advanced_tools';
        base.badge = String((payload && payload.badge) || base.badge || feature.badge || 'Acceso gratuito');
        base.title = String((payload && payload.title) || base.title || feature.title || 'Accede para continuar');
        base.lead = String((payload && payload.lead) || base.lead || feature.lead || '');
        base.feature_items = Array.isArray(payload && payload.feature_items) ? payload.feature_items : (Array.isArray(base.feature_items) && base.feature_items.length ? base.feature_items : feature.feature_items);
        base.benefits = Array.isArray(payload && payload.benefits) ? payload.benefits : (Array.isArray(base.benefits) ? base.benefits : []);
        base.login_url = loginUrl;
        base.register_url = registerUrl;
        base.reader_url = '?route=reader&skip_daily=1';
        base.next = nextUrl;
        return base;
    }

    function buildAccessPromptCardHtml(featureKey, compact) {
        var gate = buildAuthGatePayload(featureKey);
        var featureItems = Array.isArray(gate.feature_items) ? gate.feature_items : [];
        var summary = compact ? featureItems.slice(0, 3) : featureItems;
        return '' +
            '<article class="card access-gate-card' + (compact ? ' is-compact' : '') + '">' +
            '<span class="access-gate-kicker">' + escapeHtml(gate.badge || 'Acceso gratuito') + '</span>' +
            '<strong>' + escapeHtml(gate.title || 'Accede para continuar') + '</strong>' +
            (gate.lead ? '<p>' + escapeHtml(gate.lead) + '</p>' : '') +
            (summary.length ? '<ul class="access-gate-list">' + summary.map(function (item) {
                return '<li>' + escapeHtml(String(item || '')) + '</li>';
            }).join('') + '</ul>' : '') +
            '<div class="toolbar access-gate-actions">' +
            '<a class="btn-primary" href="' + escapeHtml(gate.register_url || '?route=register') + '">Crear cuenta gratis</a>' +
            '<a class="btn-light" href="' + escapeHtml(gate.login_url || '?route=login') + '">Iniciar sesión</a>' +
            '</div>' +
            '</article>';
    }

    function openReaderAuthGate(featureKey, payload) {
        if (!els.readerAuthGateModal || !els.readerAuthGateBody) {
            window.location.href = '?route=register&next=' + encodeURIComponent(currentReaderNextUrl());
            return;
        }

        var gate = buildAuthGatePayload(featureKey, payload);
        var benefits = Array.isArray(gate.benefits) ? gate.benefits.slice(0, 3) : [];
        els.readerAuthGateBody.innerHTML = '' +
            '<div class="access-gate-modal-copy">' +
            '<span class="access-gate-kicker">' + escapeHtml(gate.badge || 'Acceso gratuito') + '</span>' +
            '<h4>' + escapeHtml(gate.title || 'Accede para continuar') + '</h4>' +
            '<p>' + escapeHtml(gate.lead || '') + '</p>' +
            (Array.isArray(gate.feature_items) && gate.feature_items.length ? '<ul class="access-gate-list">' + gate.feature_items.map(function (item) {
                return '<li>' + escapeHtml(String(item || '')) + '</li>';
            }).join('') + '</ul>' : '') +
            (benefits.length ? '<div class="access-gate-benefits">' + benefits.map(function (item) {
                return '<small>' + escapeHtml(String(item || '')) + '</small>';
            }).join('') + '</div>' : '') +
            '<div class="toolbar access-gate-actions">' +
            '<a class="btn-primary" href="' + escapeHtml(gate.register_url || '?route=register') + '">Crear cuenta gratis</a>' +
            '<a class="btn-light" href="' + escapeHtml(gate.login_url || '?route=login') + '">Iniciar sesión</a>' +
            '</div>' +
            '</div>';

        els.overlay.classList.remove('hidden');
        els.readerAuthGateModal.classList.remove('hidden');
    }

    function closeReaderAuthGate() {
        if (!els.readerAuthGateModal || els.readerAuthGateModal.classList.contains('hidden')) {
            return;
        }
        els.readerAuthGateModal.classList.add('hidden');
        if (els.readerAuthGateBody) {
            els.readerAuthGateBody.innerHTML = '';
        }
        closeDrawers();
    }

    function ensureAdvancedAccess(featureKey) {
        if (state.auth.isLogged) {
            return true;
        }
        openReaderAuthGate(featureKey || 'advanced_tools');
        return false;
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


