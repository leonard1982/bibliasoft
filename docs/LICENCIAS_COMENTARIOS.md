# LICENCIAS DE COMENTARIOS

## Regla base
- La aplicación separa software y contenido.
- No se deben habilitar fuentes de comentarios sin verificar su licencia.

## Configuración técnica
- Archivo: `config/sources.php`
- Fuentes disponibles en esta versión:
  - `cmti`: comentarios internos de `01RVR1960x.cmti` (licencia no verificada, desactivada por defecto).
  - `generated`: comentario contextual original generado por la app (activada por defecto).

## Política por defecto
- Solo se muestran fuentes libres/compatibles.
- Cuando no hay fuente compatible, se presenta comentario con etiqueta: `Fuente: Generado`.

## Nota operativa
- Si se habilita una fuente externa, el responsable de despliegue debe documentar:
  - tipo de licencia,
  - alcance de uso/distribución,
  - fecha de verificación.
