# ROADMAP

## Fase 1 (MVP actual)
- Lector bíblico responsive por libro/capítulo/versículo.
- Drawer de versículo con:
  - texto sanitizado
  - comentarios por rangos desde `VerseCommentary`
  - apuntes (CRUD)
  - vínculos manuales entre versículos (CRUD)
  - tarjetas IA en modo stub + caché local
- Búsqueda simple/avanzada con fallback SQL `LIKE`.
- Script de indexado para habilitar motor FTS5 en BD propia.

## Fase 2
- Integración real OpenAI API en `AIService`.
- Enriquecimiento léxico desde `strong.lexx` (si se resuelve formato `BLOB_TEXT`).
- Mejoras UX:
  - historial de lectura
  - favoritos
  - saltos rápidos por referencia (`Jn 3:16`)
- API JSON versionada para cliente móvil.

## Fase 3
- Multiusuario (`users`) con autenticación y sincronización básica.
- Exportación/importación de apuntes y vínculos.
- Motor de recomendaciones de estudio por tema.
- Cobertura de pruebas automáticas (unitarias + integración).
