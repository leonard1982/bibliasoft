(function () {
    var root = document.getElementById('devotionalPage');
    if (!root) {
        return;
    }

    var data = {};
    try {
        data = JSON.parse(root.getAttribute('data-devotional') || '{}');
    } catch (err) {
        data = {};
    }

    var current = data.today || null;
    var history = data.history || [];
    var backgrounds = data.backgrounds || [];

    var currentBox = document.getElementById('devotionalCurrent');
    var historyBox = document.getElementById('devotionalHistory');
    var btnGenerate = document.getElementById('generateDevotional');
    var btnShareText = document.getElementById('shareDevotionalText');
    var btnShareImage = document.getElementById('shareDevotionalImage');

    renderCurrent(current);
    renderHistory(history);

    if (btnGenerate) {
        btnGenerate.addEventListener('click', function () {
            generateNew();
        });
    }
    if (btnShareText) {
        btnShareText.addEventListener('click', function () {
            if (!current) {
                return;
            }
            shareText(current.share_text || buildShareText(current));
        });
    }
    if (btnShareImage) {
        btnShareImage.addEventListener('click', function () {
            if (!current) {
                return;
            }
            generateImageCard(current).then(function (blob) {
                return shareImageBlob(blob, 'devocional.png', buildShareText(current));
            }).catch(function () {
                alert('No se pudo crear la imagen.');
            });
        });
    }

    function generateNew() {
        fetch('?route=api.devotional.generate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            body: ''
        }).then(asJson).then(function (res) {
            if (res.error || !res.devotional) {
                alert(res.error || 'No se pudo generar el devocional.');
                return;
            }
            current = res.devotional;
            history.unshift(res.devotional);
            renderCurrent(current);
            renderHistory(history);
        }).catch(function () {
            alert('No se pudo generar el devocional.');
        });
    }

    function renderCurrent(row) {
        if (!row) {
            currentBox.innerHTML = '<p class="muted">Sin devocional disponible.</p>';
            return;
        }
        var s = row.sections || {};
        var word = s.palabra_clave || {};
        var background = row.background || backgrounds[0] || 'assets/backgrounds/bg-01.svg';
        currentBox.innerHTML = '' +
            '<div class="devotional-hero" style="background-image: linear-gradient(rgba(11,22,34,.42), rgba(11,22,34,.68)), url(\'' + escapeAttr(background) + '\')">' +
            '<span class="daily-tag">Devocional del día</span>' +
            '<h2>' + escapeHtml(row.reference || '') + '</h2>' +
            '<p class="devotional-verse">"' + escapeHtml(s.versiculo_base || '') + '"</p>' +
            '</div>' +
            '<div class="devotional-sections">' +
            '<article class="card devotional-block"><h3>Contexto textual</h3><p>' + escapeHtml(s.contexto_textual || '') + '</p></article>' +
            '<article class="card devotional-block"><h3>Contexto histórico</h3><p>' + escapeHtml(s.contexto_historico || '') + '</p></article>' +
            '<article class="card devotional-block"><h3>Contexto literario</h3><p>' + escapeHtml(s.contexto_literario || '') + '</p></article>' +
            '<article class="card devotional-block"><h3>Anécdota: ' + escapeHtml(s.anecdota_titulo || 'Aplicación en la vida real') + '</h3><p>' + escapeHtml(s.anecdota || '') + '</p></article>' +
            '<article class="card devotional-block">' +
            '<h3>Palabra clave</h3>' +
            '<p><strong>' + escapeHtml(word.palabra || '') + '</strong> · ' + escapeHtml(word.transliteracion || '') + '</p>' +
            '<p>' + escapeHtml(word.significado || '') + '</p>' +
            '<p>' + escapeHtml(word.aplicacion || '') + '</p>' +
            '</article>' +
            '<article class="card devotional-block"><h3>Tip del 1%</h3><p>' + escapeHtml(s.tip_1_por_ciento || '') + '</p></article>' +
            '<article class="card devotional-block"><h3>Oración sugerida</h3><p>' + escapeHtml(s.oracion_sugerida || '') + '</p></article>' +
            '<article class="card devotional-block"><h3>Desafío semanal</h3><p>' + escapeHtml(s.desafio_semana || '') + '</p></article>' +
            '</div>';
    }

    function renderHistory(rows) {
        if (!rows.length) {
            historyBox.innerHTML = '<p class="muted">Aún no hay devocionales guardados.</p>';
            return;
        }
        historyBox.innerHTML = rows.slice(0, 20).map(function (row, idx) {
            var summary = row.sections && row.sections.tip_1_por_ciento ? row.sections.tip_1_por_ciento : '';
            return '<article class="card devotional-history-card" data-idx="' + idx + '">' +
                '<strong>' + escapeHtml(row.date || '') + '</strong>' +
                '<p>' + escapeHtml(row.reference || '') + '</p>' +
                '<small class="muted">' + escapeHtml(summary) + '</small>' +
                '<div class="toolbar"><button class="btn-light js-open-devotional" type="button">Ver más</button></div>' +
                '</article>';
        }).join('');

        historyBox.querySelectorAll('.js-open-devotional').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var card = btn.closest('.devotional-history-card');
                if (!card) {
                    return;
                }
                var idx = Number(card.getAttribute('data-idx'));
                if (!history[idx]) {
                    return;
                }
                current = history[idx];
                renderCurrent(current);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    }

    function buildShareText(row) {
        var s = row.sections || {};
        return (s.versiculo_base || '') + '\n\n' + (row.reference || '') + '\nBiblia para todos';
    }

    function shareText(text) {
        if (navigator.share) {
            navigator.share({ title: 'Devocional', text: text }).catch(function () {});
            return;
        }
        copyText(text).then(function () {
            alert('Texto copiado para compartir.');
        });
    }

    function generateImageCard(row) {
        var reference = row.reference || '';
        var text = (row.sections && row.sections.versiculo_base) ? row.sections.versiculo_base : '';
        var bg = row.background || backgrounds[0] || 'assets/backgrounds/bg-01.svg';
        var canvas = document.createElement('canvas');
        canvas.width = 1080;
        canvas.height = 1080;
        var ctx = canvas.getContext('2d');

        return new Promise(function (resolve, reject) {
            var img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = function () {
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                ctx.fillStyle = 'rgba(0,0,0,.42)';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.fillStyle = '#ffffff';
                ctx.font = 'bold 54px Segoe UI, Arial, sans-serif';
                drawWrappedText(ctx, '"' + text + '"', 90, 250, 900, 72);

                ctx.font = 'bold 40px Segoe UI, Arial, sans-serif';
                ctx.fillText(reference, 90, 880);
                ctx.font = '30px Segoe UI, Arial, sans-serif';
                ctx.fillText('Biblia para todos', 90, 940);

                canvas.toBlob(function (blob) {
                    if (!blob) {
                        reject(new Error('blob'));
                        return;
                    }
                    resolve(blob);
                }, 'image/png');
            };
            img.onerror = function () {
                reject(new Error('image'));
            };
            img.src = bg;
        });
    }

    function shareImageBlob(blob, filename, fallbackText) {
        var file = new File([blob], filename, { type: 'image/png' });
        if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
            return navigator.share({
                title: 'Devocional',
                text: fallbackText,
                files: [file]
            });
        }
        downloadBlob(blob, filename);
        return Promise.resolve();
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

    function copyText(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            return navigator.clipboard.writeText(text);
        }
        return Promise.resolve();
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

    function escapeAttr(value) {
        return String(value || '').replace(/'/g, '&#039;').replace(/"/g, '&quot;');
    }
})();
