(function () {
    var root = document.getElementById('studyCenterPage');
    if (!root) {
        return;
    }

    var payload = {};
    try {
        payload = JSON.parse(root.getAttribute('data-study') || '{}');
    } catch (err) {
        payload = {};
    }

    var state = {
        projects: Array.isArray(payload.projects) ? payload.projects : [],
        books: Array.isArray(payload.books) ? payload.books : [],
        selectedProjectId: 0,
        entriesByProject: {},
        modal: {
            mode: '',
            entryId: 0,
            projectId: 0,
            submitHandler: null
        },
        noteWorkspace: {
            entryId: 0,
            projectId: 0,
            reference: '',
            initialNote: '',
            selectedText: '',
            lastRange: null
        },
        toastTimer: 0
    };

    var els = {
        projectsOpenButtons: document.querySelectorAll('.js-study-projects-open'),
        projectsList: document.getElementById('studyProjectsList'),
        projectForm: document.getElementById('studyProjectForm'),
        projectName: document.getElementById('studyProjectName'),
        projectDescription: document.getElementById('studyProjectDescription'),
        projectColor: document.getElementById('studyProjectColor'),
        projectsModal: document.getElementById('studyProjectsModal'),
        projectsModalBackdrop: document.getElementById('studyProjectsModalBackdrop'),
        projectsModalClose: document.getElementById('studyProjectsModalClose'),
        projectEmpty: document.getElementById('studyProjectEmpty'),
        projectContent: document.getElementById('studyProjectContent'),
        projectTitle: document.getElementById('studyProjectTitle'),
        projectDescriptionText: document.getElementById('studyProjectDescriptionText'),
        projectDelete: document.getElementById('studyProjectDelete'),
        projectEdit: document.getElementById('studyProjectEdit'),
        entryForm: document.getElementById('studyEntryForm'),
        entryBook: document.getElementById('studyEntryBook'),
        entryChapter: document.getElementById('studyEntryChapter'),
        entryVerseStart: document.getElementById('studyEntryVerseStart'),
        entryVerseEnd: document.getElementById('studyEntryVerseEnd'),
        entryNote: document.getElementById('studyEntryNote'),
        entriesCount: document.getElementById('studyEntriesCount'),
        entriesList: document.getElementById('studyEntriesList'),
        notice: document.getElementById('studyCenterNotice'),
        modal: document.getElementById('studyModal'),
        modalBackdrop: document.getElementById('studyModalBackdrop'),
        modalClose: document.getElementById('studyModalClose'),
        modalCancel: document.getElementById('studyModalCancel'),
        modalForm: document.getElementById('studyModalForm'),
        modalTitle: document.getElementById('studyModalTitle'),
        modalMessage: document.getElementById('studyModalMessage'),
        modalFields: document.getElementById('studyModalFields'),
        modalConfirm: document.getElementById('studyModalConfirm'),
        noteModal: document.getElementById('studyNoteModal'),
        noteModalBackdrop: document.getElementById('studyNoteModalBackdrop'),
        noteModalClose: document.getElementById('studyNoteModalClose'),
        noteModalSave: document.getElementById('studyNoteModalSave'),
        noteModalReference: document.getElementById('studyNoteModalReference'),
        noteEditor: document.getElementById('studyNoteEditor'),
        noteExplainSelection: document.getElementById('studyNoteExplainSelection'),
        noteClearHighlight: document.getElementById('studyNoteClearHighlight'),
        noteExplainState: document.getElementById('studyNoteExplainState'),
        noteExplainResult: document.getElementById('studyNoteExplainResult'),
        noteColorButtons: document.querySelectorAll('[data-highlight-color]'),
        toast: document.getElementById('studyToast')
    };

    renderProjects();
    if (state.projects.length) {
        selectProject(Number(state.projects[0].id || 0));
    }
    bindEvents();
    refreshProjects(false);

    function bindEvents() {
        if (els.modalForm) {
            els.modalForm.addEventListener('submit', function (event) {
                event.preventDefault();
                submitModal();
            });
        }
        if (els.modalClose) {
            els.modalClose.addEventListener('click', closeModal);
        }
        if (els.modalCancel) {
            els.modalCancel.addEventListener('click', closeModal);
        }
        if (els.modalBackdrop) {
            els.modalBackdrop.addEventListener('click', closeModal);
        }
        if (els.projectsModalBackdrop) {
            els.projectsModalBackdrop.addEventListener('click', closeProjectsModal);
        }
        if (els.projectsModalClose) {
            els.projectsModalClose.addEventListener('click', closeProjectsModal);
        }
        if (els.noteModalBackdrop) {
            els.noteModalBackdrop.addEventListener('click', closeNoteModal);
        }
        if (els.noteModalClose) {
            els.noteModalClose.addEventListener('click', closeNoteModal);
        }
        if (els.noteModalSave) {
            els.noteModalSave.addEventListener('click', saveNoteWorkspace);
        }
        if (els.noteExplainSelection) {
            els.noteExplainSelection.addEventListener('mousedown', preventToolbarFocusLoss);
            els.noteExplainSelection.addEventListener('click', explainSelectedText);
        }
        if (els.noteClearHighlight) {
            els.noteClearHighlight.addEventListener('mousedown', preventToolbarFocusLoss);
            els.noteClearHighlight.addEventListener('click', clearSelectionHighlight);
        }
        Array.prototype.forEach.call(els.noteColorButtons || [], function (button) {
            button.addEventListener('mousedown', preventToolbarFocusLoss);
            button.addEventListener('click', function () {
                applyHighlight(String(button.getAttribute('data-highlight-color') || ''));
            });
        });
        if (els.noteEditor) {
            els.noteEditor.addEventListener('mouseup', rememberEditorSelection);
            els.noteEditor.addEventListener('keyup', rememberEditorSelection);
        }
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && els.modal && !els.modal.classList.contains('hidden')) {
                closeModal();
                return;
            }
            if (event.key === 'Escape' && els.noteModal && !els.noteModal.classList.contains('hidden')) {
                closeNoteModal();
                return;
            }
            if (event.key === 'Escape' && els.projectsModal && !els.projectsModal.classList.contains('hidden')) {
                closeProjectsModal();
            }
        });

        Array.prototype.forEach.call(els.projectsOpenButtons || [], function (btn) {
            btn.addEventListener('click', openProjectsModal);
        });

        if (els.projectForm) {
            els.projectForm.addEventListener('submit', function (event) {
                event.preventDefault();
                createProject();
            });
        }

        if (els.entryForm) {
            els.entryForm.addEventListener('submit', function (event) {
                event.preventDefault();
                createEntry();
            });
        }

        if (els.projectDelete) {
            els.projectDelete.addEventListener('click', function () {
                if (!state.selectedProjectId) {
                    return;
                }
                var active = getSelectedProject();
                if (!active) {
                    return;
                }
                openModal({
                    mode: 'project-delete',
                    title: 'Eliminar proyecto',
                    message: 'Se eliminará "' + String(active.name || 'Proyecto') + '" junto con todos sus pasajes guardados.',
                    confirmText: 'Eliminar',
                    confirmClass: 'btn-danger',
                    submitHandler: function () {
                        return postForm('api.study.projects.delete', { id: state.selectedProjectId }).then(function (res) {
                            if (res.error) {
                                throw new Error(res.error);
                            }
                            state.entriesByProject[state.selectedProjectId] = [];
                            state.selectedProjectId = 0;
                            refreshProjects(true);
                            showNotice('Proyecto eliminado correctamente.', 'success');
                        });
                    }
                });
            });
        }

        if (els.projectEdit) {
            els.projectEdit.addEventListener('click', function () {
                var active = getSelectedProject();
                if (!active) {
                    return;
                }
                openModal({
                    mode: 'project-edit',
                    title: 'Editar proyecto',
                    message: '',
                    confirmText: 'Guardar cambios',
                    fieldsHtml: '' +
                        '<label>Nombre' +
                        '<input type="text" name="name" maxlength="80" required value="' + escapeAttr(active.name || '') + '">' +
                        '</label>' +
                        '<label>Descripción' +
                        '<textarea name="description" rows="4" maxlength="500">' + escapeHtml(active.description || '') + '</textarea>' +
                        '</label>' +
                        '<label>Color' +
                        '<input type="color" name="color" value="' + escapeAttr(active.color || '#1d6a8f') + '">' +
                        '</label>',
                    submitHandler: function (fields) {
                        var name = String(fields.name || '').trim();
                        if (!name) {
                            showNotice('El nombre del proyecto es obligatorio.', 'error');
                            return false;
                        }
                        return postForm('api.study.projects.update', {
                            id: Number(active.id || 0),
                            name: name,
                            description: String(fields.description || '').trim(),
                            color: String(fields.color || active.color || '#1d6a8f')
                        }).then(function (res) {
                            if (res.error) {
                                throw new Error(res.error);
                            }
                            refreshProjects(true);
                            showNotice('Proyecto actualizado correctamente.', 'success');
                        });
                    }
                });
            });
        }
    }

    function refreshProjects(reselectCurrent) {
        fetch('?route=api.study.projects.list').then(asJson).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            state.projects = Array.isArray(res.projects) ? res.projects : [];
            renderProjects();

            if (!state.projects.length) {
                state.selectedProjectId = 0;
                renderProjectDetail();
                return;
            }

            if (reselectCurrent && state.selectedProjectId) {
                var found = state.projects.some(function (project) {
                    return Number(project.id || 0) === Number(state.selectedProjectId || 0);
                });
                if (found) {
                    selectProject(state.selectedProjectId);
                    return;
                }
            }

            selectProject(Number(state.projects[0].id || 0));
        }).catch(showError);
    }

    function renderProjects() {
        if (!els.projectsList) {
            return;
        }
        if (!state.projects.length) {
            els.projectsList.innerHTML = '<p class="muted">Aún no hay proyectos creados.</p>';
            return;
        }

        els.projectsList.innerHTML = state.projects.map(function (project) {
            var id = Number(project.id || 0);
            var active = id === Number(state.selectedProjectId || 0);
            var count = Number(project.entries_count || 0);
            return '' +
                '<button type="button" class="study-project-item' + (active ? ' is-active' : '') + '" data-id="' + id + '">' +
                '<span class="study-project-dot" style="background:' + escapeAttr(project.color || '#1d6a8f') + ';"></span>' +
                '<span class="study-project-text">' +
                '<strong>' + escapeHtml(project.name || 'Proyecto') + '</strong>' +
                '<small class="muted">' + count + ' pasaje(s)</small>' +
                '</span>' +
                '</button>';
        }).join('');

        els.projectsList.querySelectorAll('.study-project-item').forEach(function (btn) {
            btn.addEventListener('click', function () {
                selectProject(Number(this.getAttribute('data-id') || '0'));
                closeProjectsModal();
            });
        });
    }

    function openProjectsModal() {
        if (!els.projectsModal) {
            return;
        }
        els.projectsModal.classList.remove('hidden');
        refreshModalBodyLock();
        if (els.projectName) {
            window.setTimeout(function () {
                els.projectName.focus();
            }, 40);
        }
    }

    function closeProjectsModal() {
        if (!els.projectsModal) {
            return;
        }
        els.projectsModal.classList.add('hidden');
        refreshModalBodyLock();
    }

    function refreshModalBodyLock() {
        var modalOpen = !!(els.modal && !els.modal.classList.contains('hidden'));
        var projectsOpen = !!(els.projectsModal && !els.projectsModal.classList.contains('hidden'));
        var noteOpen = !!(els.noteModal && !els.noteModal.classList.contains('hidden'));
        document.body.classList.toggle('study-modal-open', modalOpen || projectsOpen || noteOpen);
    }

    function renderProjectDetail() {
        var active = getSelectedProject();
        if (!active) {
            if (els.projectEmpty) {
                els.projectEmpty.classList.remove('hidden');
            }
            if (els.projectContent) {
                els.projectContent.classList.add('hidden');
            }
            return;
        }

        if (els.projectEmpty) {
            els.projectEmpty.classList.add('hidden');
        }
        if (els.projectContent) {
            els.projectContent.classList.remove('hidden');
        }
        if (els.projectTitle) {
            els.projectTitle.textContent = active.name || 'Proyecto';
        }
        if (els.projectDescriptionText) {
            els.projectDescriptionText.textContent = active.description || 'Sin descripción.';
        }
    }

    function selectProject(projectId) {
        projectId = Number(projectId || 0);
        if (!projectId) {
            return;
        }
        state.selectedProjectId = projectId;
        renderProjects();
        renderProjectDetail();
        loadEntries(projectId);
    }

    function loadEntries(projectId) {
        projectId = Number(projectId || 0);
        if (!projectId) {
            return;
        }
        if (els.entriesList) {
            els.entriesList.innerHTML = '<p class="muted">Cargando pasajes...</p>';
        }
        fetch('?route=api.study.entries.list&project_id=' + encodeURIComponent(projectId)).then(asJson).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            state.entriesByProject[projectId] = Array.isArray(res.entries) ? res.entries : [];
            renderEntries(projectId);
        }).catch(showError);
    }

    function renderEntries(projectId) {
        projectId = Number(projectId || 0);
        var rows = Array.isArray(state.entriesByProject[projectId]) ? state.entriesByProject[projectId] : [];
        if (els.entriesCount) {
            els.entriesCount.textContent = rows.length + ' pasaje(s) registrados';
        }
        if (!els.entriesList) {
            return;
        }
        if (!rows.length) {
            els.entriesList.innerHTML = '<p class="muted">Sin entradas en este proyecto.</p>';
            return;
        }

        els.entriesList.innerHTML = rows.map(function (row) {
            var book = Number(row.book || 0);
            var chapter = Number(row.chapter || 0);
            var verseStart = Number(row.verse_start || 0);
            var verseEnd = Number(row.verse_end || verseStart);
            var ref = bookLabel(book) + ' ' + chapter + ':' + verseStart + (verseEnd !== verseStart ? '-' + verseEnd : '');
            var readerHref = '?route=reader&book=' + book + '&chapter=' + chapter + '&verse=' + verseStart + '&skip_daily=1';
            var note = String(row.note || '');
            var createdAt = String(row.created_at || '');
            var updatedAt = String(row.updated_at || '');
            var metaLine = createdAt ? ('Creado: ' + createdAt) : '';
            if (updatedAt && createdAt && updatedAt !== createdAt) {
                metaLine += ' · Editado: ' + updatedAt;
            }

            return '' +
                '<article class="study-entry-card" data-id="' + Number(row.id || 0) + '">' +
                '<div class="study-entry-head">' +
                '<strong>' + escapeHtml(ref) + '</strong>' +
                '<small class="muted">' + escapeHtml(metaLine) + '</small>' +
                '</div>' +
                '<div class="study-entry-note">' + (note ? formatStudyNoteHtml(note) : '<span class="muted">Sin nota en esta entrada.</span>') + '</div>' +
                '<div class="toolbar">' +
                '<a class="btn-light" href="' + readerHref + '"><img src="assets/icons/book.svg" alt="" class="ico"> Abrir</a>' +
                '<button type="button" class="btn-light js-study-entry-expand"><img src="assets/icons/eye.svg" alt="" class="ico"> Ampliar</button>' +
                '<button type="button" class="btn-light js-study-entry-edit">Editar nota</button>' +
                '<button type="button" class="btn-light js-study-entry-delete">Eliminar</button>' +
                '</div>' +
                '</article>';
        }).join('');

        els.entriesList.querySelectorAll('.js-study-entry-expand').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var card = btn.closest('.study-entry-card');
                if (!card) {
                    return;
                }
                var id = Number(card.getAttribute('data-id') || '0');
                if (!id) {
                    return;
                }
                var row = rows.find(function (item) {
                    return Number(item.id || 0) === id;
                });
                if (!row) {
                    return;
                }
                openNoteModal(row);
            });
        });

        els.entriesList.querySelectorAll('.js-study-entry-delete').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var card = btn.closest('.study-entry-card');
                if (!card) {
                    return;
                }
                var id = Number(card.getAttribute('data-id') || '0');
                if (!id) {
                    return;
                }
                openModal({
                    mode: 'entry-delete',
                    title: 'Eliminar pasaje guardado',
                    message: 'Esta entrada se eliminará del proyecto seleccionado.',
                    confirmText: 'Eliminar',
                    confirmClass: 'btn-danger',
                    submitHandler: function () {
                        return postForm('api.study.entries.delete', { id: id }).then(function (res) {
                            if (res.error) {
                                throw new Error(res.error);
                            }
                            loadEntries(state.selectedProjectId);
                            refreshProjects(true);
                            showNotice('Pasaje eliminado del proyecto.', 'success');
                        });
                    }
                });
            });
        });

        els.entriesList.querySelectorAll('.js-study-entry-edit').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var card = btn.closest('.study-entry-card');
                if (!card) {
                    return;
                }
                var id = Number(card.getAttribute('data-id') || '0');
                if (!id) {
                    return;
                }
                var row = rows.find(function (item) {
                    return Number(item.id || 0) === id;
                });
                if (!row) {
                    return;
                }
                var ref = bookLabel(Number(row.book || 0)) + ' ' + Number(row.chapter || 0) + ':' + Number(row.verse_start || 0) + (Number(row.verse_end || row.verse_start || 0) !== Number(row.verse_start || 0) ? '-' + Number(row.verse_end || row.verse_start || 0) : '');
                openModal({
                    mode: 'entry-edit',
                    title: 'Editar pasaje guardado',
                    message: '',
                    confirmText: 'Guardar nota',
                    fieldsHtml: '' +
                        '<label>Referencia' +
                        '<input type="text" value="' + escapeAttr(ref) + '" readonly>' +
                        '</label>' +
                        '<label>Nota de estudio' +
                        '<textarea name="note" rows="7" maxlength="5000" placeholder="Redacta una observación clara, aplicación o estructura de enseñanza.">' + escapeHtml(String(row.note || '')) + '</textarea>' +
                        '</label>',
                    submitHandler: function (fields) {
                        return postForm('api.study.entries.update', {
                            id: id,
                            note: String(fields.note || '').trim()
                        }).then(function (res) {
                            if (res.error) {
                                throw new Error(res.error);
                            }
                            loadEntries(state.selectedProjectId);
                            refreshProjects(true);
                            showNotice('Nota actualizada correctamente.', 'success');
                        });
                    }
                });
            });
        });
    }

    function createProject() {
        var name = els.projectName ? String(els.projectName.value || '').trim() : '';
        var description = els.projectDescription ? String(els.projectDescription.value || '').trim() : '';
        var color = els.projectColor ? String(els.projectColor.value || '#1d6a8f').trim() : '#1d6a8f';
        if (!name) {
            showNotice('El nombre del proyecto es obligatorio.', 'error');
            return;
        }

        postForm('api.study.projects.create', {
            name: name,
            description: description,
            color: color
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            if (els.projectName) {
                els.projectName.value = '';
            }
            if (els.projectDescription) {
                els.projectDescription.value = '';
            }
            if (res.project && res.project.id) {
                state.selectedProjectId = Number(res.project.id || 0);
            }
            refreshProjects(true);
            showNotice('Proyecto creado correctamente.', 'success');
        }).catch(showError);
    }

    function createEntry() {
        if (!state.selectedProjectId) {
            showNotice('Selecciona primero un proyecto.', 'error');
            return;
        }

        var book = Number(els.entryBook ? els.entryBook.value : 0);
        var chapter = Number(els.entryChapter ? els.entryChapter.value : 0);
        var verseStart = Number(els.entryVerseStart ? els.entryVerseStart.value : 0);
        var verseEnd = Number(els.entryVerseEnd ? els.entryVerseEnd.value : verseStart);
        var note = els.entryNote ? String(els.entryNote.value || '').trim() : '';

        if (book < 1 || chapter < 1 || verseStart < 1 || verseEnd < 1) {
            showNotice('Completa una referencia válida.', 'error');
            return;
        }

        postForm('api.study.entries.create', {
            project_id: state.selectedProjectId,
            book: book,
            chapter: chapter,
            verse_start: verseStart,
            verse_end: verseEnd,
            note: note
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            if (els.entryNote) {
                els.entryNote.value = '';
            }
            loadEntries(state.selectedProjectId);
            refreshProjects(true);
            showNotice('Pasaje guardado en el proyecto.', 'success');
        }).catch(showError);
    }

    function getSelectedProject() {
        if (!state.selectedProjectId) {
            return null;
        }
        return state.projects.find(function (project) {
            return Number(project.id || 0) === Number(state.selectedProjectId || 0);
        }) || null;
    }

    function bookLabel(bookId) {
        var id = Number(bookId || 0);
        var row = state.books.find(function (item) {
            return Number(item.id || 0) === id;
        });
        return row ? String(row.name || ('Libro ' + id)) : ('Libro ' + id);
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

    function openModal(options) {
        if (!els.modal || !els.modalForm) {
            return;
        }
        var opts = options && typeof options === 'object' ? options : {};
        state.modal.mode = String(opts.mode || '');
        state.modal.submitHandler = typeof opts.submitHandler === 'function' ? opts.submitHandler : null;
        if (els.modalTitle) {
            els.modalTitle.textContent = String(opts.title || 'Editar');
        }
        if (els.modalMessage) {
            var msg = String(opts.message || '').trim();
            els.modalMessage.textContent = msg;
            els.modalMessage.classList.toggle('hidden', msg === '');
        }
        if (els.modalFields) {
            els.modalFields.innerHTML = String(opts.fieldsHtml || '');
        }
        if (els.modalConfirm) {
            els.modalConfirm.textContent = String(opts.confirmText || 'Guardar');
            els.modalConfirm.classList.remove('btn-danger');
            if (String(opts.confirmClass || '') === 'btn-danger') {
                els.modalConfirm.classList.add('btn-danger');
            }
            els.modalConfirm.disabled = false;
        }
        els.modal.classList.remove('hidden');
        refreshModalBodyLock();

        var firstInput = els.modal.querySelector('input:not([readonly]), textarea, select');
        if (firstInput) {
            window.setTimeout(function () {
                firstInput.focus();
            }, 40);
        }
    }

    function closeModal() {
        if (!els.modal) {
            return;
        }
        if (els.modalConfirm) {
            els.modalConfirm.disabled = false;
            els.modalConfirm.classList.remove('btn-danger');
            els.modalConfirm.textContent = 'Guardar';
        }
        if (els.modalFields) {
            els.modalFields.innerHTML = '';
        }
        if (els.modalMessage) {
            els.modalMessage.textContent = '';
            els.modalMessage.classList.add('hidden');
        }
        state.modal.mode = '';
        state.modal.entryId = 0;
        state.modal.projectId = 0;
        state.modal.submitHandler = null;
        els.modal.classList.add('hidden');
        refreshModalBodyLock();
    }

    function openNoteModal(row) {
        if (!els.noteModal || !els.noteEditor) {
            return;
        }

        var reference = buildEntryReference(row);
        var note = String(row && row.note ? row.note : '');
        state.noteWorkspace.entryId = Number(row && row.id ? row.id : 0);
        state.noteWorkspace.projectId = Number(state.selectedProjectId || 0);
        state.noteWorkspace.reference = reference;
        state.noteWorkspace.initialNote = normalizeEditorHtml(noteToEditorHtml(note));
        state.noteWorkspace.selectedText = '';
        state.noteWorkspace.lastRange = null;

        els.noteEditor.innerHTML = state.noteWorkspace.initialNote;
        if (els.noteModalReference) {
            els.noteModalReference.textContent = reference;
        }
        resetExplainPanel();
        els.noteModal.classList.remove('hidden');
        refreshModalBodyLock();

        window.setTimeout(function () {
            els.noteEditor.focus();
        }, 40);
    }

    function closeNoteModal() {
        if (!els.noteModal) {
            return;
        }
        els.noteModal.classList.add('hidden');
        if (els.noteEditor) {
            els.noteEditor.innerHTML = '';
        }
        state.noteWorkspace.entryId = 0;
        state.noteWorkspace.projectId = 0;
        state.noteWorkspace.reference = '';
        state.noteWorkspace.initialNote = '';
        state.noteWorkspace.selectedText = '';
        state.noteWorkspace.lastRange = null;
        resetExplainPanel();
        refreshModalBodyLock();
    }

    function saveNoteWorkspace() {
        if (!state.noteWorkspace.entryId || !els.noteEditor) {
            return;
        }

        var note = normalizeEditorHtml(els.noteEditor.innerHTML);
        if (els.noteModalSave) {
            els.noteModalSave.disabled = true;
        }

        postForm('api.study.entries.update', {
            id: state.noteWorkspace.entryId,
            note: note
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            state.noteWorkspace.initialNote = note;
            loadEntries(state.selectedProjectId);
            refreshProjects(true);
            showNotice('Nota actualizada correctamente.', 'success');
            closeNoteModal();
        }).catch(showError).finally(function () {
            if (els.noteModalSave) {
                els.noteModalSave.disabled = false;
            }
        });
    }

    function applyHighlight(color) {
        if (!els.noteEditor || !color) {
            return;
        }

        var range = getEditorSelectionRange();
        if (!range || range.collapsed) {
            showNotice('Selecciona primero una palabra o frase dentro de la nota.', 'info');
            return;
        }
        restoreEditorSelection(range);

        var selectedText = String(range.toString() || '').trim();
        if (!selectedText) {
            showNotice('Selecciona primero una palabra o frase dentro de la nota.', 'info');
            return;
        }

        var className = 'study-mark study-mark-' + color;
        var html = '<mark class="' + className + '">' + escapeHtml(selectedText) + '</mark>';

        try {
            document.execCommand('insertHTML', false, html);
            state.noteWorkspace.selectedText = selectedText;
            showNotice('Texto resaltado en la nota.', 'success');
        } catch (err) {
            showError(err);
        }
    }

    function clearSelectionHighlight() {
        if (!els.noteEditor) {
            return;
        }
        var range = getEditorSelectionRange();
        if (!range) {
            showNotice('Selecciona primero el texto resaltado que deseas limpiar.', 'info');
            return;
        }
        restoreEditorSelection(range);

        var node = range.startContainer;
        while (node && node !== els.noteEditor) {
            if (node.nodeType === 1 && node.tagName === 'MARK' && /\bstudy-mark\b/.test(node.className || '')) {
                unwrapNode(node);
                showNotice('Resaltado quitado.', 'success');
                return;
            }
            node = node.parentNode;
        }

        showNotice('Selecciona primero un texto resaltado para quitarlo.', 'info');
    }

    function explainSelectedText() {
        if (!els.noteEditor) {
            return;
        }

        var range = getEditorSelectionRange();
        var selectedText = range ? String(range.toString() || '').trim() : '';
        if (!selectedText) {
            showNotice('Selecciona una palabra o frase de la nota antes de consultar.', 'info');
            return;
        }
        restoreEditorSelection(range);

        state.noteWorkspace.selectedText = selectedText;
        if (els.noteExplainState) {
            els.noteExplainState.textContent = 'Consultando una explicación sencilla...';
            els.noteExplainState.classList.remove('hidden');
        }
        if (els.noteExplainResult) {
            els.noteExplainResult.classList.add('hidden');
            els.noteExplainResult.innerHTML = '';
        }
        if (els.noteExplainSelection) {
            els.noteExplainSelection.disabled = true;
        }

        postForm('api.study.notes.explain', {
            entry_id: state.noteWorkspace.entryId,
            reference: state.noteWorkspace.reference,
            selected_text: selectedText,
            note_context: String(els.noteEditor.innerText || '').trim().slice(0, 1800)
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            renderExplainResult(res.analysis || {}, selectedText);
        }).catch(showError).finally(function () {
            if (els.noteExplainSelection) {
                els.noteExplainSelection.disabled = false;
            }
        });
    }

    function renderExplainResult(analysis, selectedText) {
        if (els.noteExplainState) {
            els.noteExplainState.classList.add('hidden');
        }
        if (!els.noteExplainResult) {
            return;
        }

        var term = String(analysis.term || selectedText || '').trim();
        var category = String(analysis.category || 'Expresión bíblica').trim();
        var definition = String(analysis.definition || 'No se pudo obtener una definición más detallada.').trim();
        var use = String(analysis.use || '').trim();
        var pastoral = String(analysis.pastoral_note || '').trim();

        els.noteExplainResult.innerHTML = '' +
            '<div class="study-note-ai-card">' +
                '<strong>' + escapeHtml(term) + '</strong>' +
                '<span class="study-note-ai-badge">' + escapeHtml(category) + '</span>' +
                '<p>' + escapeHtml(definition) + '</p>' +
                (use ? ('<div class="study-note-ai-section"><strong>En este contexto</strong><p>' + escapeHtml(use) + '</p></div>') : '') +
                (pastoral ? ('<div class="study-note-ai-section"><strong>Aplicación sencilla</strong><p>' + escapeHtml(pastoral) + '</p></div>') : '') +
            '</div>';
        els.noteExplainResult.classList.remove('hidden');
    }

    function resetExplainPanel() {
        if (els.noteExplainState) {
            els.noteExplainState.textContent = 'Aún no has consultado ninguna selección.';
            els.noteExplainState.classList.remove('hidden');
        }
        if (els.noteExplainResult) {
            els.noteExplainResult.innerHTML = '';
            els.noteExplainResult.classList.add('hidden');
        }
        if (els.noteExplainSelection) {
            els.noteExplainSelection.disabled = false;
        }
    }

    function collectModalFields() {
        if (!els.modalFields) {
            return {};
        }
        var result = {};
        els.modalFields.querySelectorAll('[name]').forEach(function (field) {
            var name = String(field.getAttribute('name') || '').trim();
            if (!name) {
                return;
            }
            result[name] = String(field.value || '');
        });
        return result;
    }

    function submitModal() {
        if (typeof state.modal.submitHandler !== 'function') {
            closeModal();
            return;
        }
        var fields = collectModalFields();
        if (els.modalConfirm) {
            els.modalConfirm.disabled = true;
        }
        var result;
        try {
            result = state.modal.submitHandler(fields);
        } catch (err) {
            if (els.modalConfirm) {
                els.modalConfirm.disabled = false;
            }
            showError(err);
            return;
        }
        Promise.resolve(result).then(function (close) {
            if (els.modalConfirm) {
                els.modalConfirm.disabled = false;
            }
            if (close !== false) {
                closeModal();
            }
        }).catch(function (err) {
            if (els.modalConfirm) {
                els.modalConfirm.disabled = false;
            }
            showError(err);
        });
    }

    function showNotice(message, type) {
        var text = String(message || '').trim();
        if (!text) {
            return;
        }

        if (els.notice) {
            els.notice.textContent = text;
            els.notice.classList.remove('hidden', 'is-error', 'is-success', 'is-info');
            els.notice.classList.add(type === 'error' ? 'is-error' : (type === 'success' ? 'is-success' : 'is-info'));
        }

        if (els.toast) {
            els.toast.textContent = text;
            els.toast.classList.remove('hidden', 'is-error', 'is-success', 'is-info');
            els.toast.classList.add(type === 'error' ? 'is-error' : (type === 'success' ? 'is-success' : 'is-info'));
        }

        if (state.toastTimer) {
            window.clearTimeout(state.toastTimer);
        }
        state.toastTimer = window.setTimeout(function () {
            if (els.notice) {
                els.notice.classList.add('hidden');
            }
            if (els.toast) {
                els.toast.classList.add('hidden');
            }
            state.toastTimer = 0;
        }, 4200);
    }

    function asJson(res) {
        return res.json();
    }

    function showError(err) {
        var message = err && err.message ? err.message : 'No se pudo completar la acción.';
        showNotice(message, 'error');
    }

    function buildEntryReference(row) {
        var verseStart = Number(row.verse_start || 0);
        var verseEnd = Number(row.verse_end || verseStart);
        return bookLabel(Number(row.book || 0)) + ' ' + Number(row.chapter || 0) + ':' + verseStart + (verseEnd !== verseStart ? '-' + verseEnd : '');
    }

    function formatStudyNoteHtml(note) {
        var text = String(note || '').replace(/\r\n?/g, '\n').trim();
        if (!text) {
            return '<span class="muted">Sin nota en esta entrada.</span>';
        }

        if (/<[a-z][\s\S]*>/i.test(text)) {
            return sanitizeStudyNoteHtml(text);
        }

        return text.split(/\n{2,}/).map(function (block) {
            var lines = block.split('\n').map(function (line) {
                return String(line || '').trim();
            }).filter(Boolean);
            if (!lines.length) {
                return '';
            }

            var first = lines[0];
            var rest = lines.slice(1);
            var heading = /^\d+\.\s+/.test(first)
                ? '<strong class="study-entry-note-title">' + escapeHtml(first) + '</strong>'
                : '<span>' + escapeHtml(first) + '</span>';
            var body = rest.length ? ('<div class="study-entry-note-body">' + rest.map(escapeHtml).join('<br>') + '</div>') : '';
            return '<div class="study-entry-note-block">' + heading + body + '</div>';
        }).join('');
    }

    function noteToEditorHtml(note) {
        var text = String(note || '').trim();
        if (!text) {
            return '<div><br></div>';
        }
        if (/<[a-z][\s\S]*>/i.test(text)) {
            return sanitizeStudyNoteHtml(text);
        }

        return text.replace(/\r\n?/g, '\n').split('\n').map(function (line) {
            var safe = escapeHtml(line);
            return line.trim() === '' ? '<div><br></div>' : '<div>' + safe + '</div>';
        }).join('');
    }

    function sanitizeStudyNoteHtml(html) {
        var parser = new DOMParser();
        var doc = parser.parseFromString('<div>' + String(html || '') + '</div>', 'text/html');
        return sanitizeNodeChildren(doc.body.firstChild || doc.body);
    }

    function sanitizeNodeChildren(rootNode) {
        var html = '';
        Array.prototype.slice.call(rootNode.childNodes || []).forEach(function (node) {
            html += sanitizeNode(node);
        });
        return html;
    }

    function sanitizeNode(node) {
        if (!node) {
            return '';
        }
        if (node.nodeType === 3) {
            return escapeHtml(node.nodeValue || '');
        }
        if (node.nodeType !== 1) {
            return '';
        }

        var tag = String(node.tagName || '').toLowerCase();
        var inner = sanitizeNodeChildren(node);
        if (tag === 'br') {
            return '<br>';
        }
        if (tag === 'strong' || tag === 'em' || tag === 'p' || tag === 'div') {
            return '<' + tag + '>' + inner + '</' + tag + '>';
        }
        if (tag === 'mark') {
            var className = String(node.getAttribute('class') || '');
            var match = className.match(/study-mark-(yellow|blue|green|rose)/);
            var safeClass = match ? ('study-mark ' + match[0]) : 'study-mark study-mark-yellow';
            return '<mark class="' + safeClass + '">' + inner + '</mark>';
        }

        return inner;
    }

    function normalizeEditorHtml(html) {
        var sanitized = sanitizeStudyNoteHtml(String(html || '')).trim();
        var probe = document.createElement('div');
        probe.innerHTML = sanitized;
        var text = String(probe.textContent || probe.innerText || '').replace(/\s+/g, ' ').trim();
        return text === '' ? '' : sanitized;
    }

    function getEditorSelectionRange() {
        if (!els.noteEditor) {
            return null;
        }
        var selection = window.getSelection ? window.getSelection() : null;
        if (selection && selection.rangeCount > 0) {
            var range = selection.getRangeAt(0);
            if (els.noteEditor.contains(range.commonAncestorContainer)) {
                state.noteWorkspace.lastRange = range.cloneRange();
                return range;
            }
        }
        if (!state.noteWorkspace.lastRange) {
            return null;
        }
        return state.noteWorkspace.lastRange.cloneRange();
    }

    function unwrapNode(node) {
        if (!node || !node.parentNode) {
            return;
        }
        while (node.firstChild) {
            node.parentNode.insertBefore(node.firstChild, node);
        }
        node.parentNode.removeChild(node);
    }

    function rememberEditorSelection() {
        getEditorSelectionRange();
    }

    function preventToolbarFocusLoss(event) {
        event.preventDefault();
    }

    function restoreEditorSelection(range) {
        var selection = window.getSelection ? window.getSelection() : null;
        if (!selection || !range) {
            return;
        }
        selection.removeAllRanges();
        selection.addRange(range);
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function escapeAttr(value) {
        return escapeHtml(value);
    }
})();
