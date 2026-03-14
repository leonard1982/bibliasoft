(function () {
    var root = document.getElementById('sermonLabPage');
    if (!root) {
        return;
    }

    var payload = {};
    try {
        payload = JSON.parse(root.getAttribute('data-sermon') || '{}');
    } catch (err) {
        payload = {};
    }

    var state = {
        books: Array.isArray(payload.books) ? payload.books : [],
        projects: Array.isArray(payload.projects) ? payload.projects : [],
        initial: payload.initial && typeof payload.initial === 'object' ? payload.initial : {},
        generated: null,
        toastTimer: 0
    };

    var els = {
        notice: document.getElementById('sermonLabNotice'),
        form: document.getElementById('sermonGenerateForm'),
        book: document.getElementById('sermonBook'),
        chapter: document.getElementById('sermonChapter'),
        verseStart: document.getElementById('sermonVerseStart'),
        verseEnd: document.getElementById('sermonVerseEnd'),
        messageType: document.getElementById('sermonMessageType'),
        typeHelpText: document.getElementById('sermonTypeHelpText'),
        audience: document.getElementById('sermonAudience'),
        tone: document.getElementById('sermonTone'),
        prompt: document.getElementById('sermonPrompt'),
        submit: document.getElementById('sermonGenerateSubmit'),
        referencePreview: document.getElementById('sermonReferencePreview'),
        projectSelect: document.getElementById('sermonProjectSelect'),
        quickProject: document.getElementById('sermonQuickProject'),
        createProject: document.getElementById('sermonCreateProject'),
        saveProject: document.getElementById('sermonSaveProject'),
        copyResult: document.getElementById('sermonCopyResult'),
        resultTitle: document.getElementById('sermonResultTitle'),
        resultBody: document.getElementById('sermonResultBody'),
        resultMeta: document.getElementById('sermonResultMeta'),
        toast: document.getElementById('sermonToast'),
        helpButtons: Array.prototype.slice.call(document.querySelectorAll('.js-sermon-help-fill'))
    };

    var messageTypeHelp = {
        sermon: 'Expone el pasaje verso a verso, resaltando idea central, estructura y aplicaciones fieles al texto.',
        mensaje: 'Prioriza el cuidado de la iglesia, la exhortacion, el consuelo y la aplicacion pastoral del pasaje.',
        evangelistico: 'Presenta a Cristo con claridad para invitados o personas nuevas, llamando al arrepentimiento y a la fe.',
        ensenanza: 'Resume el texto de forma didactica, clara y util para clases, discipulado o grupos pequenos.',
        bosquejo: 'Entrega una estructura breve para predicar con puntos, transiciones y direccion practica.'
    };

    hydrateInitial();
    renderProjects();
    bindEvents();
    refreshReferencePreview();
    refreshTypeHelp();
    refreshProjects();

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

    function hydrateInitial() {
        if (els.book && state.initial.book) {
            els.book.value = String(state.initial.book);
        }
        if (els.messageType && state.initial.message_type) {
            els.messageType.value = String(state.initial.message_type);
        }
    }

    function bindEvents() {
        if (els.form) {
            els.form.addEventListener('submit', function (event) {
                event.preventDefault();
                generateMessage();
            });
        }
        [els.book, els.chapter, els.verseStart, els.verseEnd].forEach(function (field) {
            if (field) {
                field.addEventListener('input', refreshReferencePreview);
                field.addEventListener('change', refreshReferencePreview);
            }
        });
        if (els.messageType) {
            els.messageType.addEventListener('change', refreshTypeHelp);
        }
        els.helpButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                applyHelpFill(button);
            });
        });
        if (els.createProject) {
            els.createProject.addEventListener('click', createQuickProject);
        }
        if (els.saveProject) {
            els.saveProject.addEventListener('click', saveToProject);
        }
        if (els.copyResult) {
            els.copyResult.addEventListener('click', copyResult);
        }
    }

    function bookLabel(bookId) {
        var row = state.books.find(function (item) {
            return Number(item.id || 0) === Number(bookId || 0);
        });
        return row ? String(row.name || 'Libro') : 'Libro';
    }

    function currentReference() {
        var book = Number((els.book && els.book.value) || 0);
        var chapter = Number((els.chapter && els.chapter.value) || 0);
        var verseStart = Number((els.verseStart && els.verseStart.value) || 0);
        var verseEnd = Number((els.verseEnd && els.verseEnd.value) || verseStart);
        if (verseEnd < verseStart) {
            verseEnd = verseStart;
            if (els.verseEnd) {
                els.verseEnd.value = String(verseEnd);
            }
        }
        return {
            book: book,
            chapter: chapter,
            verseStart: verseStart,
            verseEnd: verseEnd,
            label: bookLabel(book) + ' ' + chapter + ':' + verseStart + (verseEnd !== verseStart ? '-' + verseEnd : '')
        };
    }

    function refreshReferencePreview() {
        var ref = currentReference();
        if (els.referencePreview) {
            els.referencePreview.textContent = ref.book && ref.chapter && ref.verseStart ? ref.label : 'Selecciona el pasaje';
        }
    }

    function refreshTypeHelp() {
        if (!els.typeHelpText || !els.messageType) {
            return;
        }
        var type = String(els.messageType.value || 'sermon');
        els.typeHelpText.textContent = messageTypeHelp[type] || messageTypeHelp.sermon;
    }

    function applyHelpFill(button) {
        if (!button) {
            return;
        }

        var messageType = button.getAttribute('data-message-type') || '';
        var audience = button.getAttribute('data-audience') || '';
        var tone = button.getAttribute('data-tone') || '';
        var prompt = button.getAttribute('data-prompt') || '';

        if (messageType && els.messageType) {
            els.messageType.value = messageType;
            refreshTypeHelp();
        }
        if (audience && els.audience && String(els.audience.value || '').trim() === '') {
            els.audience.value = audience;
        } else if (audience && els.audience) {
            els.audience.value = audience;
        }
        if (tone && els.tone && String(els.tone.value || '').trim() === '') {
            els.tone.value = tone;
        } else if (tone && els.tone) {
            els.tone.value = tone;
        }
        if (prompt && els.prompt) {
            els.prompt.value = prompt;
            els.prompt.focus();
        }
    }

    function renderProjects() {
        if (!els.projectSelect) {
            return;
        }
        var options = ['<option value="">Selecciona un proyecto</option>'];
        state.projects.forEach(function (project) {
            options.push('<option value="' + Number(project.id || 0) + '">' + escapeHtml(String(project.name || 'Proyecto')) + '</option>');
        });
        els.projectSelect.innerHTML = options.join('');
    }

    function refreshProjects() {
        fetch('?route=api.study.projects.list')
            .then(asJson)
            .then(function (res) {
                if (res.error) {
                    throw new Error(res.error);
                }
                state.projects = Array.isArray(res.projects) ? res.projects : [];
                renderProjects();
            })
            .catch(function (err) {
                showNotice(err && err.message ? err.message : 'No se pudieron cargar los proyectos.', 'error');
            });
    }

    function generateMessage() {
        var ref = currentReference();
        if (ref.book < 1 || ref.chapter < 1 || ref.verseStart < 1 || ref.verseEnd < 1) {
            showNotice('Completa una referencia biblica valida.', 'error');
            return;
        }

        if (els.submit) {
            els.submit.disabled = true;
        }
        showLoading('Generando con IA', 'Estamos preparando tu mensaje. Espera por favor...');
        if (els.resultMeta) {
            els.resultMeta.textContent = 'Generando mensaje para ' + ref.label + '...';
        }

        postForm('api.sermons.generate', {
            book: ref.book,
            chapter: ref.chapter,
            verse_start: ref.verseStart,
            verse_end: ref.verseEnd,
            message_type: (els.messageType && els.messageType.value) || 'sermon',
            audience: (els.audience && els.audience.value) || '',
            tone: (els.tone && els.tone.value) || '',
            prompt: (els.prompt && els.prompt.value) || ''
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            state.generated = {
                reference: res.reference || {},
                message: res.message || {}
            };
            if (els.resultTitle) {
                els.resultTitle.value = String((res.message && res.message.title) || '');
            }
            if (els.resultBody) {
                els.resultBody.value = String((res.message && res.message.content) || '');
            }
            if (els.resultMeta) {
                var source = String((res.message && res.message.source) || 'stub');
                els.resultMeta.textContent = 'Generado para ' + String((res.reference && res.reference.label) || ref.label) + ' · fuente: ' + source + '.';
            }
            showNotice('Mensaje generado. Puedes ajustarlo antes de guardarlo.', 'success');
        }).catch(function (err) {
            showNotice(err && err.message ? err.message : 'No se pudo generar el mensaje.', 'error');
        }).finally(function () {
            if (els.submit) {
                els.submit.disabled = false;
            }
            hideLoading();
        });
    }

    function createQuickProject() {
        var name = els.quickProject ? String(els.quickProject.value || '').trim() : '';
        if (!name) {
            showNotice('Escribe un nombre para el proyecto rapido.', 'error');
            return;
        }
        postForm('api.study.projects.create', {
            name: name,
            description: 'Proyecto creado desde Sermones y mensajes.',
            color: '#1d6a8f'
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            state.projects = Array.isArray(state.projects) ? state.projects.slice() : [];
            if (res.project) {
                state.projects.unshift(res.project);
                renderProjects();
                if (els.projectSelect) {
                    els.projectSelect.value = String(res.project.id || '');
                }
            } else {
                refreshProjects();
            }
            if (els.quickProject) {
                els.quickProject.value = '';
            }
            showNotice('Proyecto creado y listo para guardar el mensaje.', 'success');
        }).catch(function (err) {
            showNotice(err && err.message ? err.message : 'No se pudo crear el proyecto.', 'error');
        });
    }

    function saveToProject() {
        var ref = currentReference();
        var projectId = Number((els.projectSelect && els.projectSelect.value) || 0);
        var title = els.resultTitle ? String(els.resultTitle.value || '').trim() : '';
        var body = els.resultBody ? String(els.resultBody.value || '').trim() : '';
        if (projectId < 1) {
            showNotice('Selecciona o crea un proyecto antes de guardar.', 'error');
            return;
        }
        if (title === '' && body === '') {
            showNotice('Primero genera o redacta un mensaje para guardarlo.', 'error');
            return;
        }

        var note = [
            'Titulo: ' + (title || 'Mensaje sin titulo'),
            'Tipo: ' + optionLabel(els.messageType),
            'Referencia base: ' + ref.label,
            (els.prompt && String(els.prompt.value || '').trim() !== '') ? ('Instruccion pastoral: ' + String(els.prompt.value || '').trim()) : '',
            '',
            'Desarrollo del mensaje:',
            body
        ].filter(Boolean).join('\n');

        postForm('api.study.entries.create', {
            project_id: projectId,
            book: ref.book,
            chapter: ref.chapter,
            verse_start: ref.verseStart,
            verse_end: ref.verseEnd,
            note: note,
            commentary_excerpt: 'Generado desde Sermones y mensajes'
        }).then(function (res) {
            if (res.error) {
                throw new Error(res.error);
            }
            showNotice('Mensaje guardado en el proyecto seleccionado.', 'success');
        }).catch(function (err) {
            showNotice(err && err.message ? err.message : 'No se pudo guardar en el Centro de estudio.', 'error');
        });
    }

    function copyResult() {
        var title = els.resultTitle ? String(els.resultTitle.value || '').trim() : '';
        var body = els.resultBody ? String(els.resultBody.value || '').trim() : '';
        if (title === '' && body === '') {
            showNotice('No hay contenido generado para copiar.', 'error');
            return;
        }
        var text = [title, '', body].join('\n').trim();
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function () {
                showNotice('Mensaje copiado al portapapeles.', 'success');
            }).catch(function () {
                fallbackCopy(text);
            });
            return;
        }
        fallbackCopy(text);
    }

    function fallbackCopy(text) {
        if (!els.resultBody) {
            return;
        }
        els.resultBody.focus();
        els.resultBody.select();
        try {
            document.execCommand('copy');
            showNotice('Mensaje copiado al portapapeles.', 'success');
        } catch (err) {
            showNotice('No se pudo copiar automaticamente. Copia manualmente el texto.', 'error');
        }
    }

    function optionLabel(select) {
        if (!select || !select.options) {
            return 'Mensaje';
        }
        var option = select.options[select.selectedIndex];
        return option ? String(option.text || 'Mensaje') : 'Mensaje';
    }

    function postForm(route, data) {
        return fetch('?route=' + encodeURIComponent(route), {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' },
            body: new URLSearchParams(data).toString()
        }).then(asJson);
    }

    function asJson(res) {
        return res.json();
    }

    function showNotice(text, type) {
        var message = String(text || '').trim();
        if (!message) {
            return;
        }

        if (!els.notice) {
            if (els.toast) {
                els.toast.textContent = message;
            }
        } else {
            els.notice.textContent = message;
            els.notice.classList.remove('hidden', 'is-success', 'is-error', 'is-info');
            els.notice.classList.add(type === 'error' ? 'is-error' : (type === 'success' ? 'is-success' : 'is-info'));
            if (type === 'success') {
                els.notice.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }

        if (els.toast) {
            els.toast.textContent = message;
            els.toast.classList.remove('hidden', 'is-success', 'is-error', 'is-info');
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

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
})();
