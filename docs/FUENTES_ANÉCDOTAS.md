# FUENTES DE ANÉCDOTAS

## Banco local inicial
- Archivo: `data/anecdotas_seed.json`
- Contenido: anécdotas originales de uso interno de la app (sin copiar extractos de obras con copyright).
- Estado: activo por defecto, sin dependencia de internet.

## Generación bajo demanda
- Ruta API: `?route=api.anecdotes.generate`
- Fuente registrada en BD: `source = generated`
- Requisito opcional para enriquecer contenido remoto: token configurado en `.env`.

## Política legal
- No usar material protegido sin permiso.
- Si se integra una fuente externa de dominio público/licencia abierta, registrar aquí:
  - nombre de la fuente,
  - URL,
  - licencia,
  - fecha de verificación.
