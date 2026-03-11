# DESPLIEGUE EN UBUNTU SERVER 24 + NGINX

## Suposiciones
- Ubuntu Server 24.04
- `nginx` ya instalado
- despliegue en un dominio propio, con el proyecto fuera de `public/`
- PHP por `php-fpm`

## 1. Instalar PHP y extensiones necesarias
Ubuntu 24 normalmente usa PHP 8.3.

```bash
sudo apt update
sudo apt install -y \
  php8.3-fpm \
  php8.3-cli \
  php8.3-sqlite3 \
  php8.3-mbstring \
  php8.3-xml \
  php8.3-curl
```

Notas:
- `php8.3-sqlite3` cubre `pdo_sqlite`
- `php8.3-curl` es necesaria si usarás OpenAI
- `php8.3-xml` es útil porque el proyecto usa `DOMDocument`

## 2. Copiar el proyecto al servidor
Ejemplo de ruta:

```bash
sudo mkdir -p /var/www/bibliasoft
sudo chown -R $USER:$USER /var/www/bibliasoft
```

Copia el contenido del proyecto a:
- `/var/www/bibliasoft`

Archivos de contenido que deben existir en la raiz del proyecto:
- `01RVR1960.bbli`
- `01RVR1960x.bbli`
- `01RVR1960x.cmti`
- `strong.lexx`
- `spurgeon.devx`

Si usarás versiones adicionales, también copia los `.bbli` extra que ya tienes.

## 3. Crear `.env` y `.env.local`
Desde la raiz del proyecto:

```bash
cp .env.example .env
cp .env.example .env.local
nano .env.local
```

Base recomendada:

```env
APP_ENV=production
APP_TZ=America/Bogota
APP_PUBLIC_URL=https://tu-dominio.com/
AI_ENABLED=0
OPENAI_MODEL=gpt-4.1-mini
OPENAI_API_KEY=

MAIL_ENABLED=0
MAIL_HOST=
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_FROM_EMAIL=
MAIL_FROM_NAME="Biblia para todos"
MAIL_USERNAME=
MAIL_PASSWORD=
```

Deja `.env` como base del proyecto y guarda tus secretos reales en `.env.local`.

Si usarás IA:
- cambia `AI_ENABLED=1`
- llena `OPENAI_API_KEY`

Si usarás correo SMTP:
- completa `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD` y remitente

## 4. Preparar permisos
El proyecto escribe en:
- `storage/`
- `storage/profiles/`
- `storage/modules/`
- cachés y SQLite internos

Asigna propiedad al usuario web:

```bash
sudo chown -R www-data:www-data /var/www/bibliasoft/storage
sudo find /var/www/bibliasoft/storage -type d -exec chmod 775 {} \;
sudo find /var/www/bibliasoft/storage -type f -exec chmod 664 {} \;
```

El resto del proyecto puede quedar legible:

```bash
sudo find /var/www/bibliasoft -type d -exec chmod 755 {} \;
sudo find /var/www/bibliasoft -type f -exec chmod 644 {} \;
sudo chmod -R 775 /var/www/bibliasoft/storage
```

## 5. Inicializar la base de datos interna
Desde la raiz del proyecto:

```bash
php scripts/init_app_db.php
php scripts/index_fts.php
```

Si ya ajustaste permisos a `www-data`, puede convenirte ejecutar:

```bash
sudo -u www-data php /var/www/bibliasoft/scripts/init_app_db.php
sudo -u www-data php /var/www/bibliasoft/scripts/index_fts.php
```

## 6. Configurar Nginx
Crear archivo:

```bash
sudo nano /etc/nginx/sites-available/bibliasoft
```

Contenido base:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name tu-dominio.com www.tu-dominio.com;

    root /var/www/bibliasoft/public;
    index index.php index.html;

    access_log /var/log/nginx/bibliasoft_access.log;
    error_log /var/log/nginx/bibliasoft_error.log;

    client_max_body_size 20M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Activar sitio:

```bash
sudo ln -s /etc/nginx/sites-available/bibliasoft /etc/nginx/sites-enabled/bibliasoft
sudo nginx -t
sudo systemctl reload nginx
sudo systemctl enable php8.3-fpm --now
```

Si sigue activo el sitio por defecto:

```bash
sudo rm -f /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx
```

## 7. HTTPS con Let's Encrypt
Si ya apunta el dominio al servidor:

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d tu-dominio.com -d www.tu-dominio.com
```

## 8. Verificaciones utiles
Comprobar PHP:

```bash
php -v
php -m | grep -E "sqlite|mbstring|xml|curl"
```

Comprobar sintaxis del proyecto:

```bash
php -l public/index.php
php -l app/bootstrap.php
```

Comprobar servicios:

```bash
sudo systemctl status nginx
sudo systemctl status php8.3-fpm
```

Logs:

```bash
sudo tail -f /var/log/nginx/bibliasoft_error.log
sudo tail -f /var/log/nginx/bibliasoft_access.log
```

## 9. Actualizar una nueva version
Si subes cambios nuevos:

```bash
cd /var/www/bibliasoft
php scripts/init_app_db.php
php scripts/index_fts.php
sudo systemctl reload nginx
sudo systemctl reload php8.3-fpm
```

## 10. Problemas comunes
### Pantalla en blanco o 500
- revisar `/var/log/nginx/bibliasoft_error.log`
- revisar permisos de `storage/`
- confirmar que existan los `.bbli`, `.cmti`, `.lexx`, `.devx`

### No guarda notas o historial
- `storage/` no pertenece a `www-data`
- `storage/app.sqlite` o `storage/profiles/` sin permisos de escritura

### No funciona IA
- falta `php8.3-curl`
- `AI_ENABLED=0`
- `OPENAI_API_KEY` vacio
- salida HTTPS bloqueada por firewall

### No cargan comentarios o versiones
- falta alguno de los SQLite de contenido en la raiz del proyecto
- nombres de archivo distintos a los configurados en `config/app.php`

## Estructura recomendada en servidor
```text
/var/www/bibliasoft
  app/
  config/
  docs/
  public/
  resources/
  scripts/
  storage/
  views/
  .env
  01RVR1960.bbli
  01RVR1960x.bbli
  01RVR1960x.cmti
  strong.lexx
  spurgeon.devx
```
