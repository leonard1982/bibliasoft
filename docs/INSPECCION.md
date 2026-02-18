# INSPECCION DEL REPO

Fecha: 2026-02-18  
Ruta base: `C:\facilweb\htdocs\BIBLIASOFT`

## Estructura encontrada (antes del MVP)
- `01RVR1960.bbli` (~8.35 MB)
- `01RVR1960x.bbli` (~9.38 MB)
- `01RVR1960x.cmti` (~3.09 MB)
- `strong.lexx` (~4.11 MB)
- `spurgeon.devx` (~0.73 MB)

## Validación SQLite por archivo

### `01RVR1960.bbli`
- Tablas: `Bible`, `Details`
- Conteos:
  - `Bible`: 31102
  - `Details`: 1
- `PRAGMA table_info(Bible)`:
  - `Book INT`
  - `Chapter INT`
  - `Verse INT`
  - `Scripture TEXT`
- `PRAGMA table_info(Details)`:
  - `Title NVARCHAR(100)`
  - `Abbreviation NVARCHAR(50)`
  - `Information TEXT`
  - `Version INT`
  - `OldTestament BOOL`
  - `NewTestament BOOL`
  - `Apocrypha BOOL`
  - `Strongs BOOL`
  - `RightToLeft BOOL`

### `01RVR1960x.bbli`
- Tablas: `Bible`, `Details`
- Conteos:
  - `Bible`: 31102
  - `Details`: 1
- Misma estructura que `01RVR1960.bbli`.
- `Scripture` incluye HTML/títulos/notas embebidas.

### `01RVR1960x.cmti`
- Tablas: `BookCommentary`, `ChapterCommentary`, `VerseCommentary`, `Details`
- Conteos:
  - `BookCommentary`: 0
  - `ChapterCommentary`: 0
  - `VerseCommentary`: 5525
  - `Details`: 1
- `PRAGMA table_info(VerseCommentary)`:
  - `Book INT`
  - `ChapterBegin INT`
  - `VerseBegin INT`
  - `ChapterEnd INT`
  - `VerseEnd INT`
  - `Comments TEXT`

### `strong.lexx`
- Tablas: `Lexicon`, `Details`, `sqliteplus_license`
- Conteos:
  - `Lexicon`: 14197
  - `Details`: 1
  - `sqliteplus_license`: 1
- `PRAGMA table_info(Lexicon)`:
  - `Topic NVARCHAR(100)`
  - `Definition BLOB_TEXT`
- Observación: `Definition` se aprecia como binario/serializado (no texto plano directo).

### `spurgeon.devx`
- Tablas: `Devotional`, `Details`, `sqliteplus_license`
- Conteos:
  - `Devotional`: 366
  - `Details`: 1
  - `sqliteplus_license`: 1
- `PRAGMA table_info(Devotional)`:
  - `Month INT`
  - `Day INT`
  - `Devotion BLOB_TEXT`
- Observación: `Devotion` también aparece como binario/serializado.
