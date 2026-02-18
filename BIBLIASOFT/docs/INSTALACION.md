# INSTALACION LOCAL

## Requisitos
- PHP 7.3+
- Extensión `pdo_sqlite`
- Servidor web local (Apache en XAMPP/WAMP o `php -S`)

## Estructura esperada
Ubicar el proyecto en:
`C:\facilweb\htdocs\BIBLIASOFT`

Y verificar que existan los SQLite de contenido en la raíz:
- `01RVR1960.bbli`
- `01RVR1960x.bbli`
- `01RVR1960x.cmti`
- `strong.lexx`
- `spurgeon.devx`

## Pasos
1. Inicializar BD de la app:
```bash
php scripts/init_app_db.php
```

2. (Opcional recomendado) Crear índice de búsqueda:
```bash
php scripts/index_fts.php
```

3. Levantar servidor:
```bash
php -S localhost:8080 -t public
```

4. Abrir en navegador:
`http://localhost:8080`

Rutas principales:
- `?route=home_daily` (Versículo del día)
- `?route=reader` (Lector principal)
- `?route=devotional` (Devocionales)

## Configuración de entorno
Variables opcionales:
- `APP_ENV=local|production`
- `APP_TZ=America/Bogota`
- `OPENAI_API_KEY=...`
- `OPENAI_MODEL=gpt-4.1-mini`
- `AI_ENABLED=1`

### Archivo .env
1. Copiar plantilla:
```bash
copy .env.example .env
```
2. Editar `.env` y completar `OPENAI_API_KEY` si usarás “Generar…”.

## Notas
- El MVP no modifica las bases SQLite originales.
- Apuntes, enlaces y cache IA se guardan en `storage/app.sqlite`.
- Endpoint de generación:
  - `POST /api/generate.php`
- Nuevas tablas de app:
  - `daily_cache`
  - `devotionals`
  - `user_prefs`
