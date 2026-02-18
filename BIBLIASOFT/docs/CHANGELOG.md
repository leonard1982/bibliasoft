# CHANGELOG

## 2026-02-18
- Inspección completa del repositorio base `C:\facilweb\htdocs\BIBLIASOFT`.
- Validación de estructura SQLite en:
  - `01RVR1960.bbli`
  - `01RVR1960x.bbli`
  - `01RVR1960x.cmti`
  - `strong.lexx`
  - `spurgeon.devx`
- Creación de MVP inicial PHP 7.3:
  - Front controller y routing básico en `public/index.php`.
  - Servicios para lectura bíblica, comentarios por rangos, sanitización HTML, búsqueda y módulo IA (stubs).
  - CRUD de apuntes y vínculos por versículo.
  - Vistas responsive tipo app lector.
- Creación de BD de aplicación independiente en `storage/app.sqlite` (esquema en `app/Database/schema.sql`).
- Script de indexado de búsqueda en `scripts/index_fts.php` (FTS5 + fallback).
- Documentación técnica inicial:
  - `docs/ARQUITECTURA.md`
  - `docs/ROADMAP.md`
  - `docs/LICENCIA_Y_DISTRIBUCION.md`
  - `docs/INSTALACION.md`
