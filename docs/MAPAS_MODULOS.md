# MODULOS DE MAPAS BIBLICOS

## Objetivo
Convertir bancos externos de mapas biblicos en paquetes locales tipo `map` para instalarlos desde el modal de modulos.

## Script CLI
Archivo:
- `php scripts/import_biblical_maps.php`

Entrada soportada:
- `CSV` con cabecera.
- `JSON` como arreglo de entradas o como objeto con clave `entries`.

Salida:
- Un paquete JSON compatible con `resources/modules/packages/*.json`.

## Comando minimo
```bash
php scripts/import_biblical_maps.php --input=resources/modules/templates/mapas_biblicos_template.csv
```

Salida por defecto:
- `resources/modules/packages/mapas_importados.json`

## Registrar en catalogo automaticamente
```bash
php scripts/import_biblical_maps.php ^
  --input=resources/modules/templates/mapas_biblicos_template.csv ^
  --output=resources/modules/packages/mapas_fuente_externa.json ^
  --key=mapas_fuente_externa ^
  --name="Mapas Fuente Externa" ^
  --version=1.0.0 ^
  --register
```

Eso hace dos cosas:
- genera el paquete en `resources/modules/packages/`
- agrega o actualiza la entrada en `resources/modules/catalog.json`

## Formato CSV esperado
Plantilla:
- `resources/modules/templates/mapas_biblicos_template.csv`

Columnas:
- `title`
- `summary`
- `places`
- `references`
- `tags`
- `period`
- `source_name`
- `source_url`
- `map_url`
- `image_url`
- `license`
- `coverage`

Reglas:
- `places`, `references`, `tags` y `coverage` aceptan separador `|` o `;`
- `coverage` puede usar referencias como `Genesis 12:1-9`
- `coverage` tambien puede usar formato numerico `libro|capitulo|verso_inicio|verso_fin`

## Formato JSON esperado
Ejemplo:
```json
{
  "entries": [
    {
      "title": "Ministerio de Jesus en Galilea",
      "summary": "Mapa para seguir el ministerio publico de Jesus.",
      "places": ["Nazaret", "Capernaum", "Jerusalen"],
      "references": ["Mateo 4:12-25", "Juan 11:55-57"],
      "tags": ["jesus", "galilea"],
      "period": "Evangelios",
      "source_name": "Fuente original",
      "license": "CC BY-SA",
      "coverage": [
        { "book": 40, "chapter": 4, "verse_start": 12, "verse_end": 25 },
        { "book": 43, "chapter": 11, "verse_start": 55, "verse_end": 57 }
      ]
    }
  ]
}
```

## Flujo recomendado para bancos externos
1. Descargar la fuente original en CSV, JSON o tabla exportable.
2. Limpiar nombres de lugares, referencias y licencia.
3. Convertirlo con `import_biblical_maps.php`.
4. Ejecutar con `--register`.
5. Abrir BIBLIASOFT, entrar a `Modulos descargables`, instalar y activar el nuevo modulo.

## Licencias
Antes de redistribuir imagenes o enlaces de mapas:
- verificar licencia por archivo o por coleccion
- guardar `source_name`, `source_url` y `license`
- si la fuente no permite redistribucion, usar el modulo solo como indice con enlaces externos

## Nota tecnica
El buscador de mapas cruza:
- texto de consulta
- lugares
- etiquetas
- referencias
- cobertura por pasaje actual

Eso permite dos modos:
- buscar por termino como `jerusalen`, `exodo`, `pablo`
- buscar por `Pasaje actual` desde el lector
