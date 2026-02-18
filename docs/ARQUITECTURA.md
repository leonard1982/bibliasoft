# ARQUITECTURA

## Objetivo
Separar completamente:
- Contenido bíblico de terceros (`*.bbli`, `*.cmti`, `*.lexx`, `*.devx`) en modo solo lectura.
- Datos propios de la app (`storage/app.sqlite`) para notas, enlaces, caché IA e índices.

## Estructura de carpetas
- `public/`: front controller y assets (`index.php`, `assets/`).
- `public/api/generate.php`: endpoint de generación por pasaje (POST JSON).
- `public/sw.js` + `public/manifest.json`: PWA/offline.
- `public/assets/daily.js`: comportamiento de portada diaria.
- `public/assets/devotional.js`: interacción del módulo Devocionales.
- `public/assets/share_app.js`: pantalla de compartir app por QR.
- `public/assets/anecdotes.js`: interacción del módulo Anécdotas.
- `public/assets/vendor/qrcode.min.js`: librería local para QR.
- `app/Controllers/`: controladores web/API.
- `app/Services/`: lógica de dominio (Biblia, búsqueda, IA, sanitización, datos usuario).
- `app/Database/`: conexión y esquema SQL de app.
- `views/`: plantillas PHP.
- `config/`: configuración global.
- `scripts/`: utilidades CLI (inicialización DB e indexado FTS).
- `docs/`: bitácora, roadmap, instalación, licencia/distribución.
- `data/anecdotas_seed.json`: banco inicial de anécdotas originales.

## Flujo principal
1. `public/index.php` enruta por query `route`.
2. `BibleRepository` consulta `01RVR1960x.bbli` y `01RVR1960x.cmti`.
3. `HtmlSanitizer` limpia HTML antes de render.
4. Drawer de versículo consume `route=api.verse`:
   - versículo
   - comentarios por rango (`ChapterBegin/VerseBegin` a `ChapterEnd/VerseEnd`)
   - apuntes y enlaces locales
   - tarjetas IA (stub/caché)
5. CRUD de apuntes/enlaces persiste en `storage/app.sqlite`.

Rutas de UI nuevas:
- `?route=share_app`: compartir app con QR y guía de instalación.
- `?route=anecdotes`: anécdotas por tema con búsqueda, guardar y compartir.

## Búsqueda
- Sin índice: `BibleRepository::searchSource()` con `LIKE`.
- Con índice: `SearchService` usa tabla `fts_index` en BD propia.
- Script: `php scripts/index_fts.php`
  - intenta FTS5
  - si no está disponible, cae a tabla normal indexada.

## Módulo IA
- Servicio: `app/Services/AIService.php`.
- Entrada contextual:
  - libro/capítulo/versículo
  - texto del versículo
  - perícopa detectada
- Salida: 3-5 tarjetas.
- Estado actual: `stub-first` con caché (`ai_cache`).
- Integración OpenAI:
  - llave por variable `OPENAI_API_KEY`
  - modelo configurable por `OPENAI_MODEL`
  - punto de integración preparado en `generateWithOpenAI()`.

## Generación por pasaje (sin exponer token)
- Servicio: `app/Services/GenerationService.php`.
- Endpoint: `POST /api/generate.php`.
- Entrada:
  - libro, capítulo, rango de versículos, modo (`explicacion`, `palabras_clave`, etc.)
- Cache:
  - `ai_cache(book, chapter, verse_start, verse_end, mode, prompt_hash, response, created_at)`
- Seguridad:
  - token solo en `.env` / variables de entorno.
  - no hardcode en frontend ni en repositorio.

## Esquema de BD de app
- `notes`: apuntes por versículo (CRUD).
- `links`: vínculos manuales entre versículos (CRUD).
- `ai_cache`: respuestas IA cacheadas con `context_hash` y `model`.
- `users`: reservada para fase multiusuario.
- `fts_index`: opcional, generado por script.
- `daily_cache`: versículo del día cacheado por fecha.
- `devotionals`: historial de devocionales generados.
- `user_prefs`: preferencias persistidas (escala fuente, show_daily, tema, etc.).
- `anecdotes`: banco local y contenido generado bajo demanda.
- `anecdote_favorites`: favoritos de anécdotas por usuario.

## Comentarios y licencias
- Fuentes de comentarios configuradas en `config/sources.php`.
- Política por defecto:
  - `cmti` desactivado (licencia no verificada).
  - fallback contextual `Fuente: Generado`.
