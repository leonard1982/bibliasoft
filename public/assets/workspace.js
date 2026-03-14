(function () {
    var appShell = document.getElementById('appShell');
    var workspaceShell = document.getElementById('workspaceShell');
    var tabsRoot = document.getElementById('workspaceTabs');
    if (!appShell || !workspaceShell || !tabsRoot) {
        return;
    }

    var STORAGE_COLLAPSED = 'bs_side_menu_collapsed_v1';
    var STORAGE_TABS = 'bs_workspace_tabs_v2';
    var sideMenu = document.getElementById('sideMenu');
    var sideOverlay = document.getElementById('sideMenuOverlay');
    var desktopToggle = document.getElementById('desktopSidebarToggle');
    var mobileToggle = document.getElementById('mobileSidebarToggle');
    var reloadActiveBtn = document.getElementById('workspaceReloadActive');
    var topbarThemeToggle = document.getElementById('topbarThemeToggle');
    var loadingOverlay = document.getElementById('globalLoadingOverlay');
    var loadingTitle = document.getElementById('globalLoadingTitle');
    var loadingText = document.getElementById('globalLoadingText');
    var sideItems = toArray(document.querySelectorAll('.side-menu-item'));
    var baseRoute = String(workspaceShell.getAttribute('data-active-route') || appShell.getAttribute('data-active-route') || 'home_daily');
    var currentHref = toRelativeUrl(window.location.href);
    var SETTINGS_KEY = 'biblia_settings';
    var DRAFT_KEY_PREFIX = 'bs_form_drafts_v1:';

    var state = {
        tabs: [],
        activeId: ''
    };

    init();

    function init() {
        bindSidebarEvents();
        bindTabEvents();
        bindRouteOpeners();
        bindTopActions();
        bindGlobalLoadingLinks();
        exposeGlobalUi();
        restoreSidebarState();
        hydrateTabs();
        renderTabs();
        updateSidebarActive(baseRoute);
        setupDraftPersistence();
        hideLoadingOverlay();
        window.addEventListener('pageshow', hideLoadingOverlay);
        window.addEventListener('beforeunload', persistAllDraftFields);
        window.addEventListener('pagehide', persistAllDraftFields);
    }

    function hydrateTabs() {
        var saved = readTabsState();
        var rows = normalizeTabs((saved && saved.tabs) || []);
        var meta = resolveMenuMeta(baseRoute, currentHref);
        var currentTab = createTabRecord(baseRoute, currentHref, meta.label, meta.icon);
        rows = upsertTab(rows, currentTab);
        if (!rows.length) {
            rows.push(currentTab);
        }
        state.tabs = rows;
        state.activeId = currentTab.id;
        writeTabsState();
    }

    function bindSidebarEvents() {
        if (desktopToggle) {
            desktopToggle.addEventListener('click', function () {
                var collapsed = !document.body.classList.contains('sidebar-collapsed');
                setSidebarCollapsed(collapsed);
            });
        }
        if (mobileToggle) {
            mobileToggle.addEventListener('click', function () {
                document.body.classList.add('side-mobile-open');
                if (sideOverlay) {
                    sideOverlay.classList.remove('hidden');
                }
            });
        }
        if (sideOverlay) {
            sideOverlay.addEventListener('click', closeMobileSidebar);
        }
        window.addEventListener('resize', function () {
            if (window.matchMedia('(min-width: 981px)').matches) {
                closeMobileSidebar();
            }
        });
    }

    function bindTabEvents() {
        tabsRoot.addEventListener('click', function (event) {
            var mainButton = closestByClass(event.target, 'workspace-tab-main');
            if (mainButton) {
                event.preventDefault();
                openTab(String(mainButton.getAttribute('data-tab-id') || ''));
                return;
            }

            var reloadButton = closestByClass(event.target, 'workspace-tab-reload');
            if (reloadButton) {
                event.preventDefault();
                reloadTab(String(reloadButton.getAttribute('data-tab-id') || ''));
                return;
            }

            var closeButton = closestByClass(event.target, 'workspace-tab-close');
            if (closeButton) {
                event.preventDefault();
                closeTab(String(closeButton.getAttribute('data-tab-id') || ''));
            }
        });
    }

    function bindRouteOpeners() {
        sideItems.forEach(function (item) {
            item.addEventListener('click', function (event) {
                handleMenuItemClick(event, item);
            });
        });

        document.addEventListener('click', function (event) {
            var link = closestByClass(event.target, 'side-menu-item');
            if (!link) {
                return;
            }
            handleMenuItemClick(event, link);
        }, true);
    }

    function handleMenuItemClick(event, link) {
        if (!link || event.defaultPrevented) {
            return;
        }
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
            return;
        }
        if (typeof event.button === 'number' && event.button !== 0) {
            return;
        }
        if (String(link.getAttribute('data-direct') || '') === '1') {
            closeMobileSidebar();
            return;
        }
        if (String(link.getAttribute('data-open-tab') || '') !== '1') {
            closeMobileSidebar();
            return;
        }

        event.preventDefault();
        openRouteInTab(link.getAttribute('href') || '', link);
        closeMobileSidebar();
    }

    function bindTopActions() {
        if (reloadActiveBtn) {
            reloadActiveBtn.addEventListener('click', function () {
                showLoadingOverlay('Recargando', 'Estamos actualizando esta vista. Espera por favor.');
                window.location.reload();
            });
        }
        if (topbarThemeToggle) {
            refreshThemeToggleUi();
            topbarThemeToggle.addEventListener('click', function () {
                toggleThemePreference();
            });
            window.addEventListener('storage', function (event) {
                if (event && event.key === SETTINGS_KEY) {
                    refreshThemeToggleUi();
                }
            });
        }
    }

    function bindGlobalLoadingLinks() {
        document.addEventListener('click', function (event) {
            var link = closestTag(event.target, 'a');
            if (!link || event.defaultPrevented) {
                return;
            }
            if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
                return;
            }
            if (typeof event.button === 'number' && event.button !== 0) {
                return;
            }
            if (String(link.getAttribute('target') || '') === '_blank' || link.hasAttribute('download')) {
                return;
            }

            var href = String(link.getAttribute('href') || '').trim();
            if (!href || href.charAt(0) === '#' || String(link.getAttribute('data-no-loader') || '') === '1') {
                return;
            }

            var relativeHref = toRelativeUrl(href);
            if (!relativeHref || relativeHref === currentHref) {
                return;
            }

            if (!isAppRoute(relativeHref)) {
                return;
            }

            persistAllDraftFields();
            showLoadingOverlay('Cargando', 'Espera por favor mientras abrimos la siguiente seccion.');
        }, true);
    }

    function exposeGlobalUi() {
        window.BIBLIASOFT_UI = window.BIBLIASOFT_UI || {};
        window.BIBLIASOFT_UI.showLoading = showLoadingOverlay;
        window.BIBLIASOFT_UI.hideLoading = hideLoadingOverlay;
        window.BIBLIASOFT_UI.clearDrafts = clearDraftsForRoute;
    }

    function openRouteInTab(href, sourceItem) {
        var cleanHref = toRelativeUrl(href);
        if (!cleanHref) {
            return;
        }
        var route = extractRoute(cleanHref) || 'home_daily';
        var label = sourceItem ? String(sourceItem.getAttribute('data-label') || '') : '';
        var icon = sourceItem ? String(sourceItem.getAttribute('data-icon') || '') : '';
        if (!label || !icon) {
            var meta = resolveMenuMeta(route, cleanHref);
            label = meta.label;
            icon = meta.icon;
        }
        var targetTab = createTabRecord(route, cleanHref, label, icon);
        state.tabs = upsertTab(state.tabs, targetTab);
        state.activeId = targetTab.id;
        writeTabsState();
        renderTabs();

        if (isCurrentUrl(cleanHref)) {
            updateSidebarActive(route);
            return;
        }
        persistAllDraftFields();
        showLoadingOverlay('Cargando pestaña', 'Estamos abriendo la vista seleccionada.');
        window.location.href = cleanHref;
    }

    function openTab(tabId) {
        if (!tabId) {
            return;
        }
        var tab = findTabById(tabId);
        if (!tab) {
            return;
        }
        state.activeId = tab.id;
        writeTabsState();
        renderTabs();
        if (isCurrentUrl(tab.href)) {
            updateSidebarActive(tab.route);
            return;
        }
        persistAllDraftFields();
        showLoadingOverlay('Cambiando de pestaña', 'Espera por favor mientras cargamos la vista.');
        window.location.href = tab.href;
    }

    function reloadTab(tabId) {
        var tab = findTabById(tabId);
        if (!tab) {
            return;
        }
        if (isCurrentUrl(tab.href)) {
            persistAllDraftFields();
            showLoadingOverlay('Recargando pestaña', 'Estamos actualizando esta vista.');
            window.location.reload();
            return;
        }
        persistAllDraftFields();
        showLoadingOverlay('Cargando pestaña', 'Estamos cargando la pestaña seleccionada.');
        window.location.href = tab.href;
    }

    function closeTab(tabId) {
        if (!tabId) {
            return;
        }
        var index = -1;
        for (var i = 0; i < state.tabs.length; i += 1) {
            if (String(state.tabs[i].id || '') === tabId) {
                index = i;
                break;
            }
        }
        if (index < 0) {
            return;
        }

        var tab = state.tabs[index];
        var route = String(tab.route || '');
        if (route === 'home_daily') {
            return;
        }

        var closingCurrent = isCurrentUrl(String(tab.href || ''));
        state.tabs.splice(index, 1);
        if (!state.tabs.length) {
            var fallbackMeta = resolveMenuMeta('home_daily', '?route=home_daily');
            state.tabs.push(createTabRecord('home_daily', '?route=home_daily', fallbackMeta.label, fallbackMeta.icon));
        }

        var nextActive = state.tabs[index - 1] || state.tabs[index] || state.tabs[0];
        state.activeId = nextActive ? nextActive.id : '';
        writeTabsState();
        renderTabs();

        if (closingCurrent && nextActive) {
            persistAllDraftFields();
            showLoadingOverlay('Cerrando pestaña', 'Espera por favor mientras cambiamos a la siguiente vista.');
            window.location.href = nextActive.href;
        }
    }

    function setupDraftPersistence() {
        var fields = toArray(document.querySelectorAll('.main-content input, .main-content textarea, .main-content select'));
        if (!fields.length) {
            return;
        }

        var draft = readDraftState();
        fields.forEach(function (field, index) {
            if (!isDraftEligible(field)) {
                return;
            }
            var fieldKey = buildDraftFieldKey(field, index);
            if (!fieldKey) {
                return;
            }
            restoreDraftField(field, draft[fieldKey]);
            var save = function () {
                persistDraftField(fieldKey, field);
            };
            field.addEventListener('input', save);
            field.addEventListener('change', save);
        });
    }

    function showLoadingOverlay(title, text) {
        if (!loadingOverlay) {
            return;
        }
        if (loadingTitle) {
            loadingTitle.textContent = String(title || 'Cargando...');
        }
        if (loadingText) {
            loadingText.textContent = String(text || 'Espera por favor mientras preparamos la siguiente vista.');
        }
        loadingOverlay.classList.remove('hidden');
        loadingOverlay.setAttribute('aria-hidden', 'false');
        document.body.classList.add('app-loading');
    }

    function hideLoadingOverlay() {
        if (!loadingOverlay) {
            return;
        }
        loadingOverlay.classList.add('hidden');
        loadingOverlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('app-loading');
    }

    function readDraftState() {
        try {
            var raw = sessionStorage.getItem(DRAFT_KEY_PREFIX + baseRoute);
            if (!raw) {
                return {};
            }
            var parsed = JSON.parse(raw);
            return parsed && typeof parsed === 'object' ? parsed : {};
        } catch (err) {
            return {};
        }
    }

    function writeDraftState(next) {
        try {
            sessionStorage.setItem(DRAFT_KEY_PREFIX + baseRoute, JSON.stringify(next || {}));
        } catch (err) {
            // ignore
        }
    }

    function clearDraftsForRoute(route) {
        var key = DRAFT_KEY_PREFIX + String(route || baseRoute || '');
        try {
            sessionStorage.removeItem(key);
        } catch (err) {
            // ignore
        }
    }

    function persistDraftField(fieldKey, field) {
        var draft = readDraftState();
        var value = readFieldValue(field);
        if (value === '' || value === null || typeof value === 'undefined') {
            delete draft[fieldKey];
        } else {
            draft[fieldKey] = value;
        }
        writeDraftState(draft);
    }

    function persistAllDraftFields() {
        var fields = toArray(document.querySelectorAll('.main-content input, .main-content textarea, .main-content select'));
        if (!fields.length) {
            return;
        }
        var draft = readDraftState();
        fields.forEach(function (field, index) {
            if (!isDraftEligible(field)) {
                return;
            }
            var fieldKey = buildDraftFieldKey(field, index);
            if (!fieldKey) {
                return;
            }
            var value = readFieldValue(field);
            if (value === '' || value === null || typeof value === 'undefined') {
                delete draft[fieldKey];
            } else {
                draft[fieldKey] = value;
            }
        });
        writeDraftState(draft);
    }

    function restoreDraftField(field, value) {
        if (typeof value === 'undefined' || value === null) {
            return;
        }
        var tag = String(field.tagName || '').toLowerCase();
        var type = String(field.type || '').toLowerCase();
        if (type === 'checkbox') {
            field.checked = value === true || value === '1' || value === 'true';
            return;
        }
        if (type === 'radio') {
            field.checked = String(field.value || '') === String(value || '');
            return;
        }
        if (tag === 'select') {
            if (field.multiple) {
                var selectedMap = {};
                String(value || '').split('|').forEach(function (item) {
                    if (item !== '') {
                        selectedMap[item] = true;
                    }
                });
                toArray(field.options).forEach(function (option) {
                    option.selected = !!selectedMap[String(option.value || '')];
                });
                return;
            }
            field.value = String(value);
            return;
        }
        field.value = String(value);
    }

    function readFieldValue(field) {
        var tag = String(field.tagName || '').toLowerCase();
        var type = String(field.type || '').toLowerCase();
        if (type === 'checkbox') {
            return field.checked ? '1' : '';
        }
        if (type === 'radio') {
            return field.checked ? String(field.value || '') : '';
        }
        if (tag === 'select' && field.multiple) {
            var selected = [];
            toArray(field.options).forEach(function (option) {
                if (option.selected) {
                    selected.push(String(option.value || ''));
                }
            });
            return selected.length ? selected.join('|') : '';
        }
        return String(field.value || '');
    }

    function isDraftEligible(field) {
        if (!field || field.disabled) {
            return false;
        }
        var type = String(field.type || '').toLowerCase();
        if (field.hasAttribute('data-no-draft')) {
            return false;
        }
        if (type === 'hidden' || type === 'password' || type === 'file' || type === 'submit' || type === 'button' || type === 'reset') {
            return false;
        }
        if (type === 'email' && String(field.name || '').toLowerCase().indexOf('g-recaptcha') !== -1) {
            return false;
        }
        if (String(field.name || '').toLowerCase().indexOf('g-recaptcha') !== -1) {
            return false;
        }
        return true;
    }

    function buildDraftFieldKey(field, index) {
        var form = field.form;
        var formId = form && form.id ? String(form.id) : 'page';
        var identity = String(field.id || field.name || ('field-' + index));
        if (!identity) {
            return '';
        }
        return formId + '::' + identity;
    }

    function renderTabs() {
        tabsRoot.innerHTML = '';
        var activeId = resolveActiveId();

        state.tabs.forEach(function (tab) {
            var tabWrap = document.createElement('div');
            tabWrap.className = 'workspace-tab' + (tab.id === activeId ? ' is-active' : '');
            tabWrap.setAttribute('data-tab-id', tab.id);

            var mainButton = document.createElement('button');
            mainButton.type = 'button';
            mainButton.className = 'workspace-tab-main';
            mainButton.setAttribute('data-tab-id', tab.id);
            mainButton.innerHTML = '' +
                '<span class="workspace-tab-icon"><img src="' + escapeHtml(String(tab.icon || 'assets/icons/list.svg')) + '" alt="" class="ico"></span>' +
                '<span class="workspace-tab-label">' + escapeHtml(String(tab.label || 'Pestaña')) + '</span>';
            tabWrap.appendChild(mainButton);

            var reloadButton = document.createElement('button');
            reloadButton.type = 'button';
            reloadButton.className = 'workspace-tab-action workspace-tab-reload';
            reloadButton.setAttribute('data-tab-id', tab.id);
            reloadButton.setAttribute('title', 'Recargar pestaña');
            reloadButton.setAttribute('aria-label', 'Recargar pestaña');
            reloadButton.innerHTML = '<img src="assets/icons/reload.svg" alt="" class="ico">';
            tabWrap.appendChild(reloadButton);

            var closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.className = 'workspace-tab-action workspace-tab-close';
            closeButton.setAttribute('data-tab-id', tab.id);
            closeButton.setAttribute('title', 'Cerrar pestaña');
            closeButton.textContent = 'x';
            if (String(tab.route || '') === 'home_daily') {
                closeButton.classList.add('is-disabled');
            }
            tabWrap.appendChild(closeButton);

            tabsRoot.appendChild(tabWrap);
        });
    }

    function resolveActiveId() {
        var current = findTabByRoute(baseRoute);
        if (current) {
            state.activeId = current.id;
            writeTabsState();
            return current.id;
        }
        return state.activeId || (state.tabs[0] ? state.tabs[0].id : '');
    }

    function restoreSidebarState() {
        var collapsed = false;
        try {
            collapsed = localStorage.getItem(STORAGE_COLLAPSED) === '1';
        } catch (err) {
            collapsed = false;
        }
        setSidebarCollapsed(collapsed);
    }

    function setSidebarCollapsed(collapsed) {
        document.body.classList.toggle('sidebar-collapsed', !!collapsed);
        try {
            localStorage.setItem(STORAGE_COLLAPSED, collapsed ? '1' : '0');
        } catch (err) {
            // ignore
        }
    }

    function closeMobileSidebar() {
        document.body.classList.remove('side-mobile-open');
        if (sideOverlay) {
            sideOverlay.classList.add('hidden');
        }
    }

    function updateSidebarActive(route) {
        var activeRoute = String(route || '');
        sideItems.forEach(function (item) {
            var itemRoute = String(item.getAttribute('data-route') || '');
            item.classList.toggle('is-active', itemRoute !== '' && itemRoute === activeRoute);
        });
    }

    function resolveMenuMeta(route, href) {
        var targetRoute = String(route || '');
        var item = null;
        for (var i = 0; i < sideItems.length; i += 1) {
            var node = sideItems[i];
            if (String(node.getAttribute('data-route') || '') === targetRoute) {
                item = node;
                break;
            }
        }
        if (item) {
            return {
                label: String(item.getAttribute('data-label') || targetRoute || 'Pestaña'),
                icon: String(item.getAttribute('data-icon') || 'assets/icons/list.svg')
            };
        }
        return {
            label: targetRoute || extractRoute(href) || 'Pestaña',
            icon: 'assets/icons/list.svg'
        };
    }

    function createTabRecord(route, href, label, icon) {
        var safeRoute = String(route || 'home_daily') || 'home_daily';
        var safeHref = toRelativeUrl(href);
        if (!safeHref) {
            safeHref = '?route=' + encodeURIComponent(safeRoute);
        }
        return {
            id: buildTabId(safeRoute),
            route: safeRoute,
            href: safeHref,
            label: String(label || safeRoute || 'Pestaña'),
            icon: String(icon || 'assets/icons/list.svg')
        };
    }

    function upsertTab(rows, next) {
        var list = Array.isArray(rows) ? rows.slice() : [];
        var found = false;
        list = list.map(function (row) {
            if (String(row.route || '') !== String(next.route || '')) {
                return row;
            }
            found = true;
            return {
                id: next.id,
                route: next.route,
                href: next.href,
                label: next.label,
                icon: next.icon
            };
        });
        if (!found) {
            list.push(next);
        }
        return normalizeTabs(list);
    }

    function normalizeTabs(rows) {
        var list = Array.isArray(rows) ? rows : [];
        var seen = {};
        var output = [];
        for (var i = 0; i < list.length; i += 1) {
            var row = list[i] || {};
            var route = String(row.route || '').trim();
            if (!route || seen[route] || !isRouteAllowedInTabs(route)) {
                continue;
            }
            seen[route] = true;
            output.push(createTabRecord(route, row.href, row.label, row.icon));
        }
        if (!seen.home_daily) {
            var homeMeta = resolveMenuMeta('home_daily', '?route=home_daily');
            output.unshift(createTabRecord('home_daily', '?route=home_daily', homeMeta.label, homeMeta.icon));
        }
        return output;
    }

    function isRouteAllowedInTabs(route) {
        var target = String(route || '').trim();
        if (!target) {
            return false;
        }
        if (target === 'home_daily') {
            return true;
        }
        for (var i = 0; i < sideItems.length; i += 1) {
            var node = sideItems[i];
            var nodeRoute = String(node.getAttribute('data-route') || '').trim();
            if (nodeRoute !== target) {
                continue;
            }
            if (String(node.getAttribute('data-open-tab') || '') !== '1') {
                return false;
            }
            if (String(node.getAttribute('data-direct') || '') === '1') {
                return false;
            }
            return true;
        }
        return false;
    }

    function readTabsState() {
        try {
            var raw = localStorage.getItem(STORAGE_TABS);
            if (!raw) {
                return { tabs: [] };
            }
            var parsed = JSON.parse(raw);
            if (!parsed || typeof parsed !== 'object') {
                return { tabs: [] };
            }
            return parsed;
        } catch (err) {
            return { tabs: [] };
        }
    }

    function writeTabsState() {
        try {
            localStorage.setItem(STORAGE_TABS, JSON.stringify({
                tabs: state.tabs,
                active_id: state.activeId
            }));
        } catch (err) {
            // ignore
        }
    }

    function findTabById(id) {
        for (var i = 0; i < state.tabs.length; i += 1) {
            if (String(state.tabs[i].id || '') === String(id || '')) {
                return state.tabs[i];
            }
        }
        return null;
    }

    function findTabByRoute(route) {
        var target = String(route || '');
        for (var i = 0; i < state.tabs.length; i += 1) {
            if (String(state.tabs[i].route || '') === target) {
                return state.tabs[i];
            }
        }
        return null;
    }

    function buildTabId(route) {
        var safeRoute = String(route || 'tab').toLowerCase().replace(/[^a-z0-9]+/g, '-');
        return 'tab-' + (safeRoute || 'tab');
    }

    function extractRoute(href) {
        try {
            var url = new URL(String(href || ''), window.location.href);
            return String(url.searchParams.get('route') || '');
        } catch (err) {
            return '';
        }
    }

    function isCurrentUrl(href) {
        return toRelativeUrl(href) === currentHref;
    }

    function toRelativeUrl(href) {
        try {
            var url = new URL(String(href || ''), window.location.href);
            return url.pathname + url.search + (url.hash || '');
        } catch (err) {
            return String(href || '').trim();
        }
    }

    function toArray(list) {
        return Array.prototype.slice.call(list || []);
    }

    function closestTag(target, tagName) {
        var expected = String(tagName || '').toUpperCase();
        var node = target;
        while (node && node !== document.body) {
            if (String(node.tagName || '').toUpperCase() === expected) {
                return node;
            }
            node = node.parentNode;
        }
        return null;
    }

    function closestByClass(target, className) {
        var node = target;
        while (node && node !== document.body) {
            if (node.classList && node.classList.contains(className)) {
                return node;
            }
            node = node.parentNode;
        }
        return null;
    }

    function isAppRoute(href) {
        try {
            var url = new URL(String(href || ''), window.location.href);
            return url.origin === window.location.origin && String(url.searchParams.get('route') || '').trim() !== '';
        } catch (err) {
            return false;
        }
    }

    function readThemePreference() {
        try {
            var parsed = JSON.parse(localStorage.getItem(SETTINGS_KEY) || '{}') || {};
            return parsed.theme === 'dark' ? 'dark' : 'light';
        } catch (err) {
            return document.body.classList.contains('theme-dark') ? 'dark' : 'light';
        }
    }

    function saveThemePreference(theme) {
        var nextTheme = theme === 'dark' ? 'dark' : 'light';
        var settings = {};
        try {
            settings = JSON.parse(localStorage.getItem(SETTINGS_KEY) || '{}') || {};
        } catch (err) {
            settings = {};
        }
        settings.theme = nextTheme;
        try {
            localStorage.setItem(SETTINGS_KEY, JSON.stringify(settings));
        } catch (err) {
            // ignore
        }
    }

    function applyThemePreference(theme, persist) {
        var nextTheme = theme === 'dark' ? 'dark' : 'light';
        document.body.classList.toggle('theme-dark', nextTheme === 'dark');
        if (persist !== false) {
            saveThemePreference(nextTheme);
        }
        refreshThemeToggleUi();
        try {
            window.dispatchEvent(new CustomEvent('bs-theme-changed', { detail: { theme: nextTheme } }));
        } catch (err) {
            // ignore
        }
    }

    function toggleThemePreference() {
        var current = readThemePreference();
        var next = current === 'dark' ? 'light' : 'dark';
        applyThemePreference(next, true);
    }

    function refreshThemeToggleUi() {
        if (!topbarThemeToggle) {
            return;
        }
        var current = document.body.classList.contains('theme-dark') ? 'dark' : readThemePreference();
        var goingTo = current === 'dark' ? 'claro' : 'oscuro';
        topbarThemeToggle.setAttribute('data-tip', 'Cambiar a modo ' + goingTo);
        topbarThemeToggle.setAttribute('aria-label', 'Cambiar a modo ' + goingTo);
        topbarThemeToggle.classList.toggle('is-active', current === 'dark');
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }
})();
