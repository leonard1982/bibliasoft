# LICENCIAS DE COMENTARIOS

## Regla base
- La aplicación separa software y contenido.
- No se deben habilitar fuentes de comentarios sin verificar su licencia.

## Configuración técnica
- Archivo: `config/sources.php`
- Fuentes disponibles en esta versión:
  - `cmti`: notas y referencias integradas desde `01RVR1960x.cmti` (habilitada en esta instalación).
  - `generated`: comentario expositivo integrado generado por la app (activada por defecto).

## Política por defecto
- La aplicación muestra fuentes integradas del sistema.
- El selector de comentarios prioriza el comentario expositivo integrado cuando está disponible.

## Nota operativa
- Si se habilita una fuente externa, el responsable de despliegue debe documentar:
  - tipo de licencia,
  - alcance de uso/distribución,
  - fecha de verificación.
