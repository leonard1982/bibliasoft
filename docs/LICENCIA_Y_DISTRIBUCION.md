# LICENCIA Y DISTRIBUCION

## Separación software / contenido
Este repositorio implementa un software lector y herramientas de estudio.
El software es separable del contenido bíblico y recursos incluidos como bases SQLite.

- Código de la app: arquitectura, UI, controladores, servicios, scripts.
- Contenido: textos bíblicos, comentarios, léxicos y devocionales distribuidos en `*.bbli`, `*.cmti`, `*.lexx`, `*.devx`.

La aplicación debe poder ejecutarse reemplazando esas bases por otras fuentes compatibles (dominio público o con permiso explícito).

## Nota legal sobre RVR1960
La versión RVR1960 puede tener restricciones de copyright/licencia según jurisdicción y forma de distribución.
Antes de redistribuir texto, comentarios o derivados:
- verificar titularidad de derechos
- revisar términos de uso aplicables
- obtener permisos cuando corresponda

## Restricción operativa obligatoria del proyecto
- No eliminar ni alterar los SQLite originales.
- No aplicar optimizaciones directas sobre esas bases.
- Toda optimización (índices, cache, FTS, material derivado) debe vivir en una BD separada de la app (`storage/app.sqlite` u otra propia).

## Distribución recomendada del MVP
- Distribuir código fuente de la app sin contenido con derechos dudosos.
- Proveer mecanismo de configuración para apuntar a:
  - traducciones de dominio público, o
  - contenidos licenciados por el usuario final.
- Incluir aviso legal visible en documentación y panel de administración futuro.
