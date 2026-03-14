<?php

namespace App\Database;

class SchemaManager
{
    public static function ensure(array $config)
    {
        $appDbPath = $config['paths']['app_db'];
        $storageDir = dirname($appDbPath);

        if (!is_dir($storageDir)) {
            mkdir($storageDir, 0777, true);
        }

        if (!is_file($appDbPath)) {
            touch($appDbPath);
        }

        $schemaSqlPath = __DIR__ . '/schema.sql';
        if (!is_file($schemaSqlPath)) {
            throw new \RuntimeException('No se encontró schema.sql de la app.');
        }

        $sql = file_get_contents($schemaSqlPath);
        $pdo = ConnectionFactory::sqlite($appDbPath);
        $pdo->exec($sql);
        self::migrate($pdo);
    }

    private static function migrate(\PDO $pdo)
    {
        self::migrateNotes($pdo);
        self::migrateLinks($pdo);
        self::migrateAiCache($pdo);
        self::migrateUsers($pdo);
        self::migrateSecurityEvents($pdo);
        self::migrateSystemBackups($pdo);
        self::migrateMailing($pdo);
        self::migrateCompanion($pdo);
        self::migrateDailyCache($pdo);
        self::migrateDevotionals($pdo);
        self::migrateUserPrefs($pdo);
        self::migrateFavorites($pdo);
        self::migrateContentModules($pdo);
        self::migrateStudyCenter($pdo);
        self::migrateHistory($pdo);
        self::migrateHighlights($pdo);
        self::migrateReadingPlans($pdo);
        self::migrateStudyStats($pdo);
        self::migrateAnecdotes($pdo);
        self::migrateAnecdoteFavorites($pdo);
    }

    private static function migrateFavorites(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'favorite_folders')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS favorite_folders (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL UNIQUE,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $folderColumns = self::columns($pdo, 'favorite_folders');
            if (!isset($folderColumns['created_at'])) {
                $pdo->exec("ALTER TABLE favorite_folders ADD COLUMN created_at TEXT");
            }
            if (!isset($folderColumns['updated_at'])) {
                $pdo->exec("ALTER TABLE favorite_folders ADD COLUMN updated_at TEXT");
            }
        }
        $pdo->exec("UPDATE favorite_folders SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");

        $seedDefaultFolder = $pdo->prepare(
            'INSERT OR IGNORE INTO favorite_folders (id, name, created_at, updated_at)
             VALUES (:id, :name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $seedDefaultFolder->execute([
            ':id' => 1,
            ':name' => 'General',
        ]);

        $seedFolderByName = $pdo->prepare(
            'INSERT OR IGNORE INTO favorite_folders (name, created_at, updated_at)
             VALUES (:name, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        foreach (['Fe', 'Familia', 'Predicacion', 'Oracion', 'Promesas'] as $folderName) {
            $seedFolderByName->execute([':name' => $folderName]);
        }

        if (!self::tableExists($pdo, 'favorites')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS favorites (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                folder_id INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse)
            )');
        } else {
            $favoriteColumns = self::columns($pdo, 'favorites');
            if (!isset($favoriteColumns['folder_id'])) {
                $pdo->exec('ALTER TABLE favorites ADD COLUMN folder_id INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($favoriteColumns['created_at'])) {
                $pdo->exec("ALTER TABLE favorites ADD COLUMN created_at TEXT");
            }
        }

        $pdo->exec('UPDATE favorites SET folder_id = COALESCE(NULLIF(folder_id, 0), 1)');
        $pdo->exec("UPDATE favorites SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_favorites_folder ON favorites (folder_id, book, chapter, verse)');
    }

    private static function migrateNotes(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'notes')) {
            return;
        }

        $columns = self::columns($pdo, 'notes');
        if (!isset($columns['verse_start'])) {
            $pdo->exec('ALTER TABLE notes ADD COLUMN verse_start INTEGER');
        }
        if (!isset($columns['verse_end'])) {
            $pdo->exec('ALTER TABLE notes ADD COLUMN verse_end INTEGER');
        }
        if (!isset($columns['tags'])) {
            $pdo->exec("ALTER TABLE notes ADD COLUMN tags TEXT DEFAULT ''");
        }
        if (isset($columns['verse'])) {
            $pdo->exec('UPDATE notes SET verse_start = COALESCE(verse_start, verse), verse_end = COALESCE(verse_end, verse)');
        }
        $pdo->exec('UPDATE notes SET verse_start = COALESCE(verse_start, 1), verse_end = COALESCE(verse_end, verse_start), tags = COALESCE(tags, \'\')');
    }

    private static function migrateLinks(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'links')) {
            return;
        }

        $columns = self::columns($pdo, 'links');
        if (!isset($columns['from_verse_start'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN from_verse_start INTEGER');
        }
        if (!isset($columns['from_verse_end'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN from_verse_end INTEGER');
        }
        if (!isset($columns['to_verse_start'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN to_verse_start INTEGER');
        }
        if (!isset($columns['to_verse_end'])) {
            $pdo->exec('ALTER TABLE links ADD COLUMN to_verse_end INTEGER');
        }

        if (isset($columns['from_verse'])) {
            $pdo->exec('UPDATE links SET from_verse_start = COALESCE(from_verse_start, from_verse), from_verse_end = COALESCE(from_verse_end, from_verse)');
        }
        if (isset($columns['to_verse'])) {
            $pdo->exec('UPDATE links SET to_verse_start = COALESCE(to_verse_start, to_verse), to_verse_end = COALESCE(to_verse_end, to_verse)');
        }

        $pdo->exec('UPDATE links SET from_verse_start = COALESCE(from_verse_start, 1), from_verse_end = COALESCE(from_verse_end, from_verse_start), to_verse_start = COALESCE(to_verse_start, 1), to_verse_end = COALESCE(to_verse_end, to_verse_start)');
    }

    private static function migrateAiCache(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'ai_cache')) {
            return;
        }

        $columns = self::columns($pdo, 'ai_cache');
        if (!isset($columns['verse_start']) && isset($columns['verse'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN verse_start INTEGER');
            $pdo->exec('UPDATE ai_cache SET verse_start = verse WHERE verse_start IS NULL');
        }
        if (!isset($columns['verse_end']) && isset($columns['verse'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN verse_end INTEGER');
            $pdo->exec('UPDATE ai_cache SET verse_end = verse WHERE verse_end IS NULL');
        }
        if (!isset($columns['mode'])) {
            $pdo->exec("ALTER TABLE ai_cache ADD COLUMN mode TEXT DEFAULT 'resumen'");
        }
        if (!isset($columns['prompt_hash'])) {
            $pdo->exec("ALTER TABLE ai_cache ADD COLUMN prompt_hash TEXT DEFAULT ''");
        }
        if (!isset($columns['response'])) {
            $pdo->exec('ALTER TABLE ai_cache ADD COLUMN response TEXT');
        }

        $pdo->exec('UPDATE ai_cache SET verse_start = COALESCE(verse_start, verse, 1), verse_end = COALESCE(verse_end, verse_start, 1)');
        $pdo->exec("UPDATE ai_cache SET mode = COALESCE(mode, 'resumen'), prompt_hash = COALESCE(prompt_hash, '')");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_ai_cache_legacy_unique ON ai_cache(book, chapter, verse, context_hash)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_ai_cache_generation ON ai_cache(book, chapter, verse_start, verse_end, mode)');
    }

    private static function migrateUsers(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'users')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT NOT NULL UNIQUE,
                email TEXT UNIQUE,
                full_name TEXT NOT NULL DEFAULT \'\',
                ministry TEXT NOT NULL DEFAULT \'\',
                data_consent INTEGER NOT NULL DEFAULT 0,
                data_consent_at TEXT,
                active INTEGER NOT NULL DEFAULT 1,
                password_hash TEXT NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                last_login_at TEXT
            )');
            $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_users_email ON users(email)');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_users_active ON users(active, created_at)');
            return;
        }

        $columns = self::columns($pdo, 'users');
        if (!isset($columns['email'])) {
            $pdo->exec('ALTER TABLE users ADD COLUMN email TEXT');
        }
        if (!isset($columns['full_name'])) {
            $pdo->exec("ALTER TABLE users ADD COLUMN full_name TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['ministry'])) {
            $pdo->exec("ALTER TABLE users ADD COLUMN ministry TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['data_consent'])) {
            $pdo->exec('ALTER TABLE users ADD COLUMN data_consent INTEGER NOT NULL DEFAULT 0');
        }
        if (!isset($columns['data_consent_at'])) {
            $pdo->exec('ALTER TABLE users ADD COLUMN data_consent_at TEXT');
        }
        if (!isset($columns['active'])) {
            $pdo->exec('ALTER TABLE users ADD COLUMN active INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE users ADD COLUMN updated_at TEXT");
        }
        if (!isset($columns['last_login_at'])) {
            $pdo->exec('ALTER TABLE users ADD COLUMN last_login_at TEXT');
        }

        $pdo->exec("UPDATE users SET full_name = CASE WHEN TRIM(COALESCE(full_name, '')) = '' THEN username ELSE full_name END");
        $pdo->exec("UPDATE users SET ministry = COALESCE(ministry, '')");
        $pdo->exec('UPDATE users SET data_consent = CASE WHEN data_consent = 1 THEN 1 ELSE 0 END');
        $pdo->exec('UPDATE users SET active = CASE WHEN active = 0 THEN 0 ELSE 1 END');
        $pdo->exec('UPDATE users SET updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)');
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_users_email ON users(email)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_users_active ON users(active, created_at)');
    }

    private static function migrateDailyCache(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'daily_cache')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS daily_cache (
                date TEXT PRIMARY KEY,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                image_path TEXT DEFAULT \'\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            return;
        }

        $columns = self::columns($pdo, 'daily_cache');
        if (!isset($columns['image_path'])) {
            $pdo->exec("ALTER TABLE daily_cache ADD COLUMN image_path TEXT DEFAULT ''");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE daily_cache ADD COLUMN created_at TEXT");
        }
        $pdo->exec("UPDATE daily_cache SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
    }

    private static function migrateSecurityEvents(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'security_events')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS security_events (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                event_type TEXT NOT NULL,
                route TEXT NOT NULL DEFAULT \'\',
                request_method TEXT NOT NULL DEFAULT \'GET\',
                outcome TEXT NOT NULL DEFAULT \'\',
                ip_address TEXT NOT NULL DEFAULT \'\',
                email TEXT NOT NULL DEFAULT \'\',
                user_id INTEGER NOT NULL DEFAULT 0,
                referrer TEXT NOT NULL DEFAULT \'\',
                user_agent TEXT NOT NULL DEFAULT \'\',
                meta_json TEXT NOT NULL DEFAULT \'{}\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'security_events');
            if (!isset($columns['route'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN route TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['request_method'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN request_method TEXT NOT NULL DEFAULT 'GET'");
            }
            if (!isset($columns['outcome'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN outcome TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['ip_address'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN ip_address TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['email'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN email TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['user_id'])) {
                $pdo->exec('ALTER TABLE security_events ADD COLUMN user_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['referrer'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN referrer TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['user_agent'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN user_agent TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['meta_json'])) {
                $pdo->exec("ALTER TABLE security_events ADD COLUMN meta_json TEXT NOT NULL DEFAULT '{}'");
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE security_events ADD COLUMN created_at TEXT');
            }
        }

        $pdo->exec("UPDATE security_events SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), route = COALESCE(route, ''), request_method = COALESCE(request_method, 'GET'), outcome = COALESCE(outcome, ''), ip_address = COALESCE(ip_address, ''), email = COALESCE(email, ''), user_id = COALESCE(user_id, 0), referrer = COALESCE(referrer, ''), user_agent = COALESCE(user_agent, ''), meta_json = COALESCE(meta_json, '{}')");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_security_events_type_time ON security_events (event_type, created_at DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_security_events_route_time ON security_events (route, created_at DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_security_events_ip_time ON security_events (ip_address, created_at DESC)');
    }

    private static function migrateSystemBackups(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'system_backups')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS system_backups (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                backup_date TEXT NOT NULL,
                file_name TEXT NOT NULL,
                file_path TEXT NOT NULL,
                size_bytes INTEGER NOT NULL DEFAULT 0,
                checksum TEXT NOT NULL DEFAULT \'\',
                trigger_type TEXT NOT NULL DEFAULT \'login\',
                triggered_by_user_id INTEGER NOT NULL DEFAULT 0,
                triggered_by_email TEXT NOT NULL DEFAULT \'\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'system_backups');
            if (!isset($columns['backup_date'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN backup_date TEXT");
            }
            if (!isset($columns['file_name'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN file_name TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['file_path'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN file_path TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['size_bytes'])) {
                $pdo->exec('ALTER TABLE system_backups ADD COLUMN size_bytes INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['checksum'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN checksum TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['trigger_type'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN trigger_type TEXT NOT NULL DEFAULT 'login'");
            }
            if (!isset($columns['triggered_by_user_id'])) {
                $pdo->exec('ALTER TABLE system_backups ADD COLUMN triggered_by_user_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['triggered_by_email'])) {
                $pdo->exec("ALTER TABLE system_backups ADD COLUMN triggered_by_email TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE system_backups ADD COLUMN created_at TEXT');
            }
        }

        $pdo->exec("UPDATE system_backups
            SET backup_date = COALESCE(NULLIF(backup_date, ''), substr(COALESCE(created_at, CURRENT_TIMESTAMP), 1, 10)),
                file_name = COALESCE(file_name, ''),
                file_path = COALESCE(file_path, ''),
                size_bytes = COALESCE(size_bytes, 0),
                checksum = COALESCE(checksum, ''),
                trigger_type = COALESCE(trigger_type, 'login'),
                triggered_by_user_id = COALESCE(triggered_by_user_id, 0),
                triggered_by_email = COALESCE(triggered_by_email, ''),
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_system_backups_day_file ON system_backups (backup_date, file_name)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_system_backups_created_at ON system_backups (created_at DESC)');
    }

    private static function migrateMailing(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'mail_templates')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS mail_templates (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                template_key TEXT NOT NULL UNIQUE,
                name TEXT NOT NULL,
                category TEXT NOT NULL DEFAULT \'campaign\',
                subject_template TEXT NOT NULL DEFAULT \'\',
                css_template TEXT NOT NULL DEFAULT \'\',
                html_template TEXT NOT NULL DEFAULT \'\',
                text_template TEXT NOT NULL DEFAULT \'\',
                enabled INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'mail_templates');
            if (!isset($columns['template_key'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN template_key TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['name'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN name TEXT NOT NULL DEFAULT 'Plantilla'");
            }
            if (!isset($columns['category'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN category TEXT NOT NULL DEFAULT 'campaign'");
            }
            if (!isset($columns['subject_template'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN subject_template TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['css_template'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN css_template TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['html_template'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN html_template TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['text_template'])) {
                $pdo->exec("ALTER TABLE mail_templates ADD COLUMN text_template TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['enabled'])) {
                $pdo->exec('ALTER TABLE mail_templates ADD COLUMN enabled INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE mail_templates ADD COLUMN created_at TEXT');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec('ALTER TABLE mail_templates ADD COLUMN updated_at TEXT');
            }
        }
        $pdo->exec("UPDATE mail_templates
            SET template_key = COALESCE(template_key, ''),
                name = COALESCE(name, 'Plantilla'),
                category = COALESCE(category, 'campaign'),
                subject_template = COALESCE(subject_template, ''),
                css_template = COALESCE(css_template, ''),
                html_template = COALESCE(html_template, ''),
                text_template = COALESCE(text_template, ''),
                enabled = CASE WHEN enabled = 0 THEN 0 ELSE 1 END,
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP),
                updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_mail_templates_key ON mail_templates (template_key)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_mail_templates_category ON mail_templates (category, updated_at DESC)');

        if (!self::tableExists($pdo, 'mailing_lists')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS mailing_lists (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL UNIQUE,
                description TEXT NOT NULL DEFAULT \'\',
                list_type TEXT NOT NULL DEFAULT \'all_active\',
                ministry_filter TEXT NOT NULL DEFAULT \'\',
                manual_emails TEXT NOT NULL DEFAULT \'\',
                active_only INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'mailing_lists');
            if (!isset($columns['name'])) {
                $pdo->exec("ALTER TABLE mailing_lists ADD COLUMN name TEXT NOT NULL DEFAULT 'Lista'");
            }
            if (!isset($columns['description'])) {
                $pdo->exec("ALTER TABLE mailing_lists ADD COLUMN description TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['list_type'])) {
                $pdo->exec("ALTER TABLE mailing_lists ADD COLUMN list_type TEXT NOT NULL DEFAULT 'all_active'");
            }
            if (!isset($columns['ministry_filter'])) {
                $pdo->exec("ALTER TABLE mailing_lists ADD COLUMN ministry_filter TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['manual_emails'])) {
                $pdo->exec("ALTER TABLE mailing_lists ADD COLUMN manual_emails TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['active_only'])) {
                $pdo->exec('ALTER TABLE mailing_lists ADD COLUMN active_only INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE mailing_lists ADD COLUMN created_at TEXT');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec('ALTER TABLE mailing_lists ADD COLUMN updated_at TEXT');
            }
        }
        $pdo->exec("UPDATE mailing_lists
            SET description = COALESCE(description, ''),
                list_type = COALESCE(list_type, 'all_active'),
                ministry_filter = COALESCE(ministry_filter, ''),
                manual_emails = COALESCE(manual_emails, ''),
                active_only = CASE WHEN active_only = 0 THEN 0 ELSE 1 END,
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP),
                updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_mailing_lists_name ON mailing_lists (name)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_mailing_lists_type ON mailing_lists (list_type, updated_at DESC)');

        if (!self::tableExists($pdo, 'mail_campaigns')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS mail_campaigns (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                template_id INTEGER NOT NULL DEFAULT 0,
                list_id INTEGER NOT NULL DEFAULT 0,
                subject_override TEXT NOT NULL DEFAULT \'\',
                content_html TEXT NOT NULL DEFAULT \'\',
                content_text TEXT NOT NULL DEFAULT \'\',
                status TEXT NOT NULL DEFAULT \'draft\',
                last_sent_at TEXT,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'mail_campaigns');
            if (!isset($columns['name'])) {
                $pdo->exec("ALTER TABLE mail_campaigns ADD COLUMN name TEXT NOT NULL DEFAULT 'Campaña'");
            }
            if (!isset($columns['template_id'])) {
                $pdo->exec('ALTER TABLE mail_campaigns ADD COLUMN template_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['list_id'])) {
                $pdo->exec('ALTER TABLE mail_campaigns ADD COLUMN list_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['subject_override'])) {
                $pdo->exec("ALTER TABLE mail_campaigns ADD COLUMN subject_override TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['content_html'])) {
                $pdo->exec("ALTER TABLE mail_campaigns ADD COLUMN content_html TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['content_text'])) {
                $pdo->exec("ALTER TABLE mail_campaigns ADD COLUMN content_text TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['status'])) {
                $pdo->exec("ALTER TABLE mail_campaigns ADD COLUMN status TEXT NOT NULL DEFAULT 'draft'");
            }
            if (!isset($columns['last_sent_at'])) {
                $pdo->exec('ALTER TABLE mail_campaigns ADD COLUMN last_sent_at TEXT');
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE mail_campaigns ADD COLUMN created_at TEXT');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec('ALTER TABLE mail_campaigns ADD COLUMN updated_at TEXT');
            }
        }
        $pdo->exec("UPDATE mail_campaigns
            SET subject_override = COALESCE(subject_override, ''),
                content_html = COALESCE(content_html, ''),
                content_text = COALESCE(content_text, ''),
                status = COALESCE(status, 'draft'),
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP),
                updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_mail_campaigns_status ON mail_campaigns (status, updated_at DESC)');

        if (!self::tableExists($pdo, 'mail_campaign_logs')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS mail_campaign_logs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                campaign_id INTEGER NOT NULL,
                user_id INTEGER NOT NULL DEFAULT 0,
                email TEXT NOT NULL,
                outcome TEXT NOT NULL DEFAULT \'\',
                error_message TEXT NOT NULL DEFAULT \'\',
                sent_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'mail_campaign_logs');
            if (!isset($columns['campaign_id'])) {
                $pdo->exec('ALTER TABLE mail_campaign_logs ADD COLUMN campaign_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['user_id'])) {
                $pdo->exec('ALTER TABLE mail_campaign_logs ADD COLUMN user_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['email'])) {
                $pdo->exec("ALTER TABLE mail_campaign_logs ADD COLUMN email TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['outcome'])) {
                $pdo->exec("ALTER TABLE mail_campaign_logs ADD COLUMN outcome TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['error_message'])) {
                $pdo->exec("ALTER TABLE mail_campaign_logs ADD COLUMN error_message TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['sent_at'])) {
                $pdo->exec('ALTER TABLE mail_campaign_logs ADD COLUMN sent_at TEXT');
            }
        }
        $pdo->exec("UPDATE mail_campaign_logs
            SET email = COALESCE(email, ''),
                outcome = COALESCE(outcome, ''),
                error_message = COALESCE(error_message, ''),
                sent_at = COALESCE(sent_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_mail_campaign_logs_campaign ON mail_campaign_logs (campaign_id, sent_at DESC)');

        self::seedDefaultMailData($pdo);
    }

    private static function seedDefaultMailData(\PDO $pdo)
    {
        $welcomeSubject = 'Bienvenido a {{app_short}}';
        $welcomeCss = "body{margin:0;padding:0;background:#eef4f8;font-family:Verdana,Segoe UI,Arial,sans-serif;color:#163447}.wrap{max-width:720px;margin:0 auto;background:#fff;border-radius:26px;overflow:hidden;box-shadow:0 20px 50px rgba(12,38,55,.14)}.hero{padding:34px 38px 28px;background:linear-gradient(135deg,#0f2431 0%,#18405a 55%,#1f6a94 100%)}.tag{display:inline-block;padding:8px 14px;border:1px solid rgba(220,240,252,.35);border-radius:999px;color:#dcedf8;font-size:12px;letter-spacing:.12em;text-transform:uppercase}.hero h1{margin:20px 0 10px;font-size:34px;line-height:1.08;color:#fff;font-family:Georgia,Times New Roman,serif}.hero p{margin:0;color:#d8ebf7;font-size:17px;line-height:1.6}.body{padding:34px 38px 18px}.body p{color:#4d6577;font-size:15px;line-height:1.7}.body .hello{margin:0 0 16px;font-size:18px;line-height:1.6;color:#163447}.box{border:1px solid #d6e5ef;border-radius:18px;background:linear-gradient(180deg,#f7fbfe,#eef5fa);padding:20px 22px;margin:10px 0 24px}.meta{font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:#507089;margin-bottom:10px}.cta{display:inline-block;padding:14px 22px;border-radius:14px;background:#195e86;color:#fff;text-decoration:none;font-size:15px;font-weight:bold}.footer{padding:22px 38px 28px;background:#f4f8fb;border-top:1px solid #dde8f0}.footer p{margin:0 0 8px;font-size:13px;color:#3f6177;font-weight:bold}.footer small{font-size:12px;line-height:1.6;color:#6b8394}.muted{color:#4d6577}";
        $welcomeHtml = "<div class=\"wrap\"><div class=\"hero\"><div class=\"tag\">Plataforma de estudio bíblico</div><h1>Bienvenido a {{app_short}}</h1><p>Tu cuenta ya quedó activa en {{app_name}}. Nos alegra servirte en tu crecimiento bíblico, devocional y ministerial.</p></div><div class=\"body\"><p class=\"hello\">Hola <strong>{{full_name}}</strong>,</p><p>Gracias por registrarte en <strong>{{app_short}}</strong>. Desde ahora puedes estudiar la Palabra con lectura guiada, herramientas de apoyo, notas, favoritos, planes y recursos para tu servicio.</p><p>{{ministry_line}}</p><div class=\"box\"><div class=\"meta\">Siguiente paso</div><div>Ingresa a tu cuenta y comienza por tu lectura diaria, un plan de estudio o la preparación de tus enseñanzas.</div></div><p><a class=\"cta\" href=\"{{access_url}}\">Entrar a {{app_short}}</a></p><p>Este correo fue enviado por <strong>{{church_name}}</strong>.</p><p>Visítanos en <a href=\"{{website_url}}\">{{website_url}}</a></p></div><div class=\"footer\"><p>{{app_short}} · {{church_name}}</p><small>FUNDACIÓN LA IGLESIA EN LA CALLE · <a href=\"{{website_url}}\">www.laiglesiaenlacalle.co</a></small></div></div>";
        $welcomeText = "Bienvenido a {{app_short}}\n\nHola {{full_name}},\n\nTu cuenta ya quedó activa en {{app_name}}.\nMinisterio: {{ministry}}\nIngresa aquí: {{access_url}}\n\n{{church_name}}\n{{website_url}}";
        $campaignSubject = '{{campaign_name}} | {{app_short}}';
        $campaignCss = "body{margin:0;padding:0;background:#eef4f8;font-family:Verdana,Segoe UI,Arial,sans-serif;color:#163447}.wrap{max-width:760px;margin:0 auto;background:#fff;border-radius:22px;overflow:hidden;box-shadow:0 20px 50px rgba(12,38,55,.14)}.hero{padding:28px 34px;background:linear-gradient(135deg,#133247 0%,#1d5c7d 55%,#2b86b1 100%);color:#fff}.hero h1{margin:0 0 8px;font-size:30px;line-height:1.12;font-family:Georgia,Times New Roman,serif}.hero p{margin:0;color:#d9eef8;font-size:16px;line-height:1.6}.body{padding:30px 34px}.body p,.body li{color:#425b6d;font-size:15px;line-height:1.7}.footer{padding:20px 34px;background:#f4f8fb;border-top:1px solid #dde8f0;color:#6b8394;font-size:12px;line-height:1.6}.chip{display:inline-block;padding:6px 12px;border:1px solid #b9d6ea;border-radius:999px;color:#1d5c7d;font-size:12px;letter-spacing:.08em;text-transform:uppercase;margin-bottom:14px}";
        $campaignHtml = "<div class=\"wrap\"><div class=\"hero\"><div class=\"chip\">Noticias y actualizaciones</div><h1>{{campaign_name}}</h1><p>{{app_name}} · {{church_name}}</p></div><div class=\"body\"><p>Hola <strong>{{full_name}}</strong>,</p>{{content_html}}<p>Puedes seguir creciendo y estudiando en <a href=\"{{access_url}}\">{{access_url}}</a>.</p></div><div class=\"footer\">Correo enviado por {{church_name}} · <a href=\"{{website_url}}\">{{website_url}}</a></div></div>";
        $campaignText = "{{campaign_name}}\n\nHola {{full_name}},\n\n{{content_text}}\n\n{{church_name}}\n{{website_url}}\n{{access_url}}";

        $stmt = $pdo->prepare(
            'INSERT OR IGNORE INTO mail_templates
             (template_key, name, category, subject_template, css_template, html_template, text_template, enabled, created_at, updated_at)
             VALUES
             (:template_key, :name, :category, :subject_template, :css_template, :html_template, :text_template, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $stmt->execute([
            ':template_key' => 'welcome_default',
            ':name' => 'Bienvenida principal',
            ':category' => 'welcome',
            ':subject_template' => $welcomeSubject,
            ':css_template' => $welcomeCss,
            ':html_template' => $welcomeHtml,
            ':text_template' => $welcomeText,
        ]);
        $stmt->execute([
            ':template_key' => 'news_default',
            ':name' => 'Noticias general',
            ':category' => 'campaign',
            ':subject_template' => $campaignSubject,
            ':css_template' => $campaignCss,
            ':html_template' => $campaignHtml,
            ':text_template' => $campaignText,
        ]);

        $listStmt = $pdo->prepare(
            'INSERT OR IGNORE INTO mailing_lists
             (name, description, list_type, ministry_filter, manual_emails, active_only, created_at, updated_at)
             VALUES
             (:name, :description, :list_type, :ministry_filter, :manual_emails, :active_only, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)'
        );
        $listStmt->execute([
            ':name' => 'Todos los activos',
            ':description' => 'Todos los usuarios activos del sistema.',
            ':list_type' => 'all_active',
            ':ministry_filter' => '',
            ':manual_emails' => '',
            ':active_only' => 1,
        ]);
    }

    private static function migrateCompanion(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'companion_threads')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS companion_threads (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL DEFAULT 0,
                user_email TEXT NOT NULL DEFAULT \'\',
                user_name TEXT NOT NULL DEFAULT \'\',
                title TEXT NOT NULL DEFAULT \'Nueva conversación\',
                status TEXT NOT NULL DEFAULT \'open\',
                summary TEXT NOT NULL DEFAULT \'\',
                prayer_flag INTEGER NOT NULL DEFAULT 0,
                last_message_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'companion_threads');
            if (!isset($columns['user_id'])) {
                $pdo->exec('ALTER TABLE companion_threads ADD COLUMN user_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['user_email'])) {
                $pdo->exec("ALTER TABLE companion_threads ADD COLUMN user_email TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['user_name'])) {
                $pdo->exec("ALTER TABLE companion_threads ADD COLUMN user_name TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['title'])) {
                $pdo->exec("ALTER TABLE companion_threads ADD COLUMN title TEXT NOT NULL DEFAULT 'Nueva conversación'");
            }
            if (!isset($columns['status'])) {
                $pdo->exec("ALTER TABLE companion_threads ADD COLUMN status TEXT NOT NULL DEFAULT 'open'");
            }
            if (!isset($columns['summary'])) {
                $pdo->exec("ALTER TABLE companion_threads ADD COLUMN summary TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['prayer_flag'])) {
                $pdo->exec('ALTER TABLE companion_threads ADD COLUMN prayer_flag INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['last_message_at'])) {
                $pdo->exec('ALTER TABLE companion_threads ADD COLUMN last_message_at TEXT');
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE companion_threads ADD COLUMN created_at TEXT');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec('ALTER TABLE companion_threads ADD COLUMN updated_at TEXT');
            }
        }
        $pdo->exec("UPDATE companion_threads
            SET user_email = COALESCE(user_email, ''),
                user_name = COALESCE(user_name, ''),
                title = COALESCE(NULLIF(title, ''), 'Nueva conversación'),
                status = COALESCE(NULLIF(status, ''), 'open'),
                summary = COALESCE(summary, ''),
                prayer_flag = CASE WHEN prayer_flag = 1 THEN 1 ELSE 0 END,
                last_message_at = COALESCE(last_message_at, CURRENT_TIMESTAMP),
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP),
                updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_companion_threads_user ON companion_threads (user_id, last_message_at DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_companion_threads_status ON companion_threads (status, prayer_flag, last_message_at DESC)');

        if (!self::tableExists($pdo, 'companion_messages')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS companion_messages (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                thread_id INTEGER NOT NULL,
                sender TEXT NOT NULL DEFAULT \'user\',
                message_text TEXT NOT NULL,
                detected_intent TEXT NOT NULL DEFAULT \'\',
                meta_json TEXT NOT NULL DEFAULT \'{}\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'companion_messages');
            if (!isset($columns['thread_id'])) {
                $pdo->exec('ALTER TABLE companion_messages ADD COLUMN thread_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['sender'])) {
                $pdo->exec("ALTER TABLE companion_messages ADD COLUMN sender TEXT NOT NULL DEFAULT 'user'");
            }
            if (!isset($columns['message_text'])) {
                $pdo->exec("ALTER TABLE companion_messages ADD COLUMN message_text TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['detected_intent'])) {
                $pdo->exec("ALTER TABLE companion_messages ADD COLUMN detected_intent TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['meta_json'])) {
                $pdo->exec("ALTER TABLE companion_messages ADD COLUMN meta_json TEXT NOT NULL DEFAULT '{}'");
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE companion_messages ADD COLUMN created_at TEXT');
            }
        }
        $pdo->exec("UPDATE companion_messages
            SET sender = COALESCE(NULLIF(sender, ''), 'user'),
                message_text = COALESCE(message_text, ''),
                detected_intent = COALESCE(detected_intent, ''),
                meta_json = COALESCE(meta_json, '{}'),
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_companion_messages_thread ON companion_messages (thread_id, id ASC)');

        if (!self::tableExists($pdo, 'prayer_requests')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS prayer_requests (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                thread_id INTEGER NOT NULL DEFAULT 0,
                user_id INTEGER NOT NULL DEFAULT 0,
                email TEXT NOT NULL DEFAULT \'\',
                full_name TEXT NOT NULL DEFAULT \'\',
                ministry TEXT NOT NULL DEFAULT \'\',
                request_text TEXT NOT NULL,
                status TEXT NOT NULL DEFAULT \'new\',
                admin_note TEXT NOT NULL DEFAULT \'\',
                notified_to TEXT NOT NULL DEFAULT \'\',
                notified_at TEXT,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'prayer_requests');
            if (!isset($columns['thread_id'])) {
                $pdo->exec('ALTER TABLE prayer_requests ADD COLUMN thread_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['user_id'])) {
                $pdo->exec('ALTER TABLE prayer_requests ADD COLUMN user_id INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['email'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN email TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['full_name'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN full_name TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['ministry'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN ministry TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['request_text'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN request_text TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['status'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN status TEXT NOT NULL DEFAULT 'new'");
            }
            if (!isset($columns['admin_note'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN admin_note TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['notified_to'])) {
                $pdo->exec("ALTER TABLE prayer_requests ADD COLUMN notified_to TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['notified_at'])) {
                $pdo->exec('ALTER TABLE prayer_requests ADD COLUMN notified_at TEXT');
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec('ALTER TABLE prayer_requests ADD COLUMN created_at TEXT');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec('ALTER TABLE prayer_requests ADD COLUMN updated_at TEXT');
            }
        }
        $pdo->exec("UPDATE prayer_requests
            SET email = COALESCE(email, ''),
                full_name = COALESCE(full_name, ''),
                ministry = COALESCE(ministry, ''),
                request_text = COALESCE(request_text, ''),
                status = COALESCE(NULLIF(status, ''), 'new'),
                admin_note = COALESCE(admin_note, ''),
                notified_to = COALESCE(notified_to, ''),
                created_at = COALESCE(created_at, CURRENT_TIMESTAMP),
                updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_prayer_requests_status ON prayer_requests (status, updated_at DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_prayer_requests_thread ON prayer_requests (thread_id, created_at DESC)');
    }

    private static function migrateDevotionals(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'devotionals')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS devotionals (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                content_json TEXT NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_devotionals_date ON devotionals(date)');
            return;
        }

        $columns = self::columns($pdo, 'devotionals');
        if (!isset($columns['content_json']) && isset($columns['content'])) {
            $pdo->exec('ALTER TABLE devotionals ADD COLUMN content_json TEXT');
            $pdo->exec('UPDATE devotionals SET content_json = content WHERE content_json IS NULL');
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE devotionals ADD COLUMN created_at TEXT");
        }
        $pdo->exec("UPDATE devotionals SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_devotionals_date ON devotionals(date)');
    }

    private static function migrateUserPrefs(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'user_prefs')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS user_prefs (
                id INTEGER PRIMARY KEY CHECK (id = 1),
                font_scale INTEGER NOT NULL DEFAULT 100,
                show_daily INTEGER NOT NULL DEFAULT 1,
                auto_devotional INTEGER NOT NULL DEFAULT 0,
                weekly_goal_days INTEGER NOT NULL DEFAULT 5,
                theme TEXT NOT NULL DEFAULT \'light\',
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        }

        $columns = self::columns($pdo, 'user_prefs');
        if (!isset($columns['font_scale'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN font_scale INTEGER NOT NULL DEFAULT 100');
        }
        if (!isset($columns['show_daily'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN show_daily INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($columns['auto_devotional'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN auto_devotional INTEGER NOT NULL DEFAULT 0');
        }
        if (!isset($columns['weekly_goal_days'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN weekly_goal_days INTEGER NOT NULL DEFAULT 5');
        }
        if (!isset($columns['reminder_enabled'])) {
            $pdo->exec('ALTER TABLE user_prefs ADD COLUMN reminder_enabled INTEGER NOT NULL DEFAULT 0');
        }
        if (!isset($columns['reminder_time'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN reminder_time TEXT NOT NULL DEFAULT '07:00'");
        }
        if (!isset($columns['theme'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN theme TEXT NOT NULL DEFAULT 'light'");
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE user_prefs ADD COLUMN updated_at TEXT");
        }

        $pdo->exec("UPDATE user_prefs SET updated_at = COALESCE(updated_at, CURRENT_TIMESTAMP)");
        $pdo->exec("INSERT OR IGNORE INTO user_prefs (id, font_scale, show_daily, auto_devotional, weekly_goal_days, reminder_enabled, reminder_time, theme, updated_at) VALUES (1, 100, 1, 0, 5, 0, '07:00', 'light', CURRENT_TIMESTAMP)");
    }

    private static function migrateHighlights(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'highlights')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS highlights (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse INTEGER NOT NULL,
                color TEXT NOT NULL DEFAULT \'yellow\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse)
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_highlights_ref ON highlights(book, chapter, verse)');
            return;
        }

        $columns = self::columns($pdo, 'highlights');
        if (!isset($columns['color'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN color TEXT NOT NULL DEFAULT 'yellow'");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN created_at TEXT");
        }
        if (!isset($columns['updated_at'])) {
            $pdo->exec("ALTER TABLE highlights ADD COLUMN updated_at TEXT");
        }
        $pdo->exec("UPDATE highlights SET color = COALESCE(NULLIF(color, ''), 'yellow')");
        $pdo->exec("UPDATE highlights SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_highlights_ref ON highlights(book, chapter, verse)');
    }

    private static function migrateHistory(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'history')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS history (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                visited_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $historyColumns = self::columns($pdo, 'history');
            if (!isset($historyColumns['visited_at'])) {
                $pdo->exec("ALTER TABLE history ADD COLUMN visited_at TEXT");
            }
        }
        $pdo->exec("UPDATE history SET visited_at = COALESCE(visited_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_history_recent ON history (id DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_history_ref ON history (book, chapter, visited_at)');

        if (!self::tableExists($pdo, 'passage_history')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS passage_history (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse_start INTEGER NOT NULL,
                verse_end INTEGER NOT NULL,
                hits INTEGER NOT NULL DEFAULT 1,
                last_viewed TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(book, chapter, verse_start, verse_end)
            )');
        } else {
            $passageColumns = self::columns($pdo, 'passage_history');
            if (!isset($passageColumns['hits'])) {
                $pdo->exec('ALTER TABLE passage_history ADD COLUMN hits INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($passageColumns['last_viewed'])) {
                $pdo->exec("ALTER TABLE passage_history ADD COLUMN last_viewed TEXT");
            }
        }
        $pdo->exec('UPDATE passage_history SET hits = CASE WHEN hits < 1 THEN 1 ELSE hits END');
        $pdo->exec("UPDATE passage_history SET last_viewed = COALESCE(last_viewed, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_passage_history_hits ON passage_history (hits DESC, last_viewed DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_passage_history_recent ON passage_history (last_viewed DESC)');
    }

    private static function migrateContentModules(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'content_modules')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS content_modules (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                module_key TEXT NOT NULL UNIQUE,
                type TEXT NOT NULL,
                name TEXT NOT NULL,
                version TEXT NOT NULL DEFAULT \'\',
                file_path TEXT NOT NULL,
                enabled INTEGER NOT NULL DEFAULT 1,
                installed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'content_modules');
            if (!isset($columns['module_key'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN module_key TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['type'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN type TEXT NOT NULL DEFAULT 'commentary'");
            }
            if (!isset($columns['name'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN name TEXT NOT NULL DEFAULT 'Modulo'");
            }
            if (!isset($columns['version'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN version TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['file_path'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN file_path TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['enabled'])) {
                $pdo->exec('ALTER TABLE content_modules ADD COLUMN enabled INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($columns['installed_at'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN installed_at TEXT");
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec("ALTER TABLE content_modules ADD COLUMN updated_at TEXT");
            }
        }

        $pdo->exec('UPDATE content_modules SET enabled = CASE WHEN enabled = 0 THEN 0 ELSE 1 END');
        $pdo->exec("UPDATE content_modules SET installed_at = COALESCE(installed_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, installed_at, CURRENT_TIMESTAMP)");
        $pdo->exec("UPDATE content_modules
            SET type = CASE
                WHEN LOWER(type) = 'dictionary' THEN 'dictionary'
                WHEN LOWER(type) IN ('map', 'maps') THEN 'map'
                ELSE 'commentary'
            END");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_content_modules_key ON content_modules (module_key)');
        $pdo->exec('DROP INDEX IF EXISTS idx_content_modules_type');
    }

    private static function migrateStudyCenter(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'study_projects')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS study_projects (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                description TEXT NOT NULL DEFAULT \'\',
                color TEXT NOT NULL DEFAULT \'#1d6a8f\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'study_projects');
            if (!isset($columns['description'])) {
                $pdo->exec("ALTER TABLE study_projects ADD COLUMN description TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($columns['color'])) {
                $pdo->exec("ALTER TABLE study_projects ADD COLUMN color TEXT NOT NULL DEFAULT '#1d6a8f'");
            }
            if (!isset($columns['created_at'])) {
                $pdo->exec("ALTER TABLE study_projects ADD COLUMN created_at TEXT");
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec("ALTER TABLE study_projects ADD COLUMN updated_at TEXT");
            }
        }
        $pdo->exec("UPDATE study_projects SET color = CASE WHEN color IS NULL OR TRIM(color) = '' THEN '#1d6a8f' ELSE color END");
        $pdo->exec("UPDATE study_projects SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE UNIQUE INDEX IF NOT EXISTS idx_study_projects_name ON study_projects(name)');

        if (!self::tableExists($pdo, 'study_project_entries')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS study_project_entries (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                project_id INTEGER NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                verse_start INTEGER NOT NULL,
                verse_end INTEGER NOT NULL,
                note TEXT NOT NULL DEFAULT \'\',
                strong_code TEXT NOT NULL DEFAULT \'\',
                strong_term TEXT NOT NULL DEFAULT \'\',
                commentary_excerpt TEXT NOT NULL DEFAULT \'\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $entryColumns = self::columns($pdo, 'study_project_entries');
            if (!isset($entryColumns['strong_code'])) {
                $pdo->exec("ALTER TABLE study_project_entries ADD COLUMN strong_code TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($entryColumns['strong_term'])) {
                $pdo->exec("ALTER TABLE study_project_entries ADD COLUMN strong_term TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($entryColumns['commentary_excerpt'])) {
                $pdo->exec("ALTER TABLE study_project_entries ADD COLUMN commentary_excerpt TEXT NOT NULL DEFAULT ''");
            }
            if (!isset($entryColumns['created_at'])) {
                $pdo->exec("ALTER TABLE study_project_entries ADD COLUMN created_at TEXT");
            }
            if (!isset($entryColumns['updated_at'])) {
                $pdo->exec("ALTER TABLE study_project_entries ADD COLUMN updated_at TEXT");
            }
        }

        $pdo->exec("UPDATE study_project_entries SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_study_entries_project ON study_project_entries(project_id, updated_at DESC, id DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_study_entries_ref ON study_project_entries(book, chapter, verse_start, verse_end)');
    }

    private static function migrateReadingPlans(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'reading_plans')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plans (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                total_days INTEGER NOT NULL,
                start_date TEXT NOT NULL,
                active INTEGER NOT NULL DEFAULT 1,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        }

        $planColumns = self::columns($pdo, 'reading_plans');
        if (!isset($planColumns['name'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN name TEXT NOT NULL DEFAULT 'Plan de lectura'");
        }
        if (!isset($planColumns['total_days'])) {
            $pdo->exec('ALTER TABLE reading_plans ADD COLUMN total_days INTEGER NOT NULL DEFAULT 90');
        }
        if (!isset($planColumns['start_date'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN start_date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($planColumns['active'])) {
            $pdo->exec('ALTER TABLE reading_plans ADD COLUMN active INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($planColumns['created_at'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN created_at TEXT");
        }
        if (!isset($planColumns['updated_at'])) {
            $pdo->exec("ALTER TABLE reading_plans ADD COLUMN updated_at TEXT");
        }
        $pdo->exec("UPDATE reading_plans SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP), updated_at = COALESCE(updated_at, created_at, CURRENT_TIMESTAMP)");

        if (!self::tableExists($pdo, 'reading_plan_progress')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plan_progress (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                plan_id INTEGER NOT NULL,
                day_index INTEGER NOT NULL,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(plan_id, day_index)
            )');
        }

        $progressColumns = self::columns($pdo, 'reading_plan_progress');
        if (!isset($progressColumns['date'])) {
            $pdo->exec("ALTER TABLE reading_plan_progress ADD COLUMN date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($progressColumns['book'])) {
            $pdo->exec('ALTER TABLE reading_plan_progress ADD COLUMN book INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($progressColumns['chapter'])) {
            $pdo->exec('ALTER TABLE reading_plan_progress ADD COLUMN chapter INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($progressColumns['completed_at'])) {
            $pdo->exec("ALTER TABLE reading_plan_progress ADD COLUMN completed_at TEXT");
        }
        $pdo->exec("UPDATE reading_plan_progress SET completed_at = COALESCE(completed_at, CURRENT_TIMESTAMP)");

        if (!self::tableExists($pdo, 'reading_plan_chapter_progress')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_plan_chapter_progress (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                plan_id INTEGER NOT NULL,
                day_index INTEGER NOT NULL,
                date TEXT NOT NULL,
                book INTEGER NOT NULL,
                chapter INTEGER NOT NULL,
                completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(plan_id, day_index, book, chapter)
            )');
        }

        $chapterProgressColumns = self::columns($pdo, 'reading_plan_chapter_progress');
        if (!isset($chapterProgressColumns['date'])) {
            $pdo->exec("ALTER TABLE reading_plan_chapter_progress ADD COLUMN date TEXT NOT NULL DEFAULT '1970-01-01'");
        }
        if (!isset($chapterProgressColumns['book'])) {
            $pdo->exec('ALTER TABLE reading_plan_chapter_progress ADD COLUMN book INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($chapterProgressColumns['chapter'])) {
            $pdo->exec('ALTER TABLE reading_plan_chapter_progress ADD COLUMN chapter INTEGER NOT NULL DEFAULT 1');
        }
        if (!isset($chapterProgressColumns['completed_at'])) {
            $pdo->exec("ALTER TABLE reading_plan_chapter_progress ADD COLUMN completed_at TEXT");
        }
        $pdo->exec("UPDATE reading_plan_chapter_progress SET completed_at = COALESCE(completed_at, CURRENT_TIMESTAMP)");

        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_plans_active ON reading_plans(active, updated_at)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_progress_plan ON reading_plan_progress(plan_id, day_index)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_chapter_progress_plan_day ON reading_plan_chapter_progress(plan_id, day_index)');
    }

    private static function migrateStudyStats(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'reading_sessions')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS reading_sessions (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                date TEXT NOT NULL UNIQUE,
                seconds INTEGER NOT NULL DEFAULT 0,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
        } else {
            $columns = self::columns($pdo, 'reading_sessions');
            if (!isset($columns['seconds'])) {
                $pdo->exec('ALTER TABLE reading_sessions ADD COLUMN seconds INTEGER NOT NULL DEFAULT 0');
            }
            if (!isset($columns['updated_at'])) {
                $pdo->exec("ALTER TABLE reading_sessions ADD COLUMN updated_at TEXT");
            }
        }
        $pdo->exec('UPDATE reading_sessions SET seconds = CASE WHEN seconds < 0 THEN 0 ELSE seconds END');
        $pdo->exec("UPDATE reading_sessions SET updated_at = COALESCE(updated_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_reading_sessions_date ON reading_sessions(date DESC)');

        if (!self::tableExists($pdo, 'theme_study_log')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS theme_study_log (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                theme_key TEXT NOT NULL,
                date TEXT NOT NULL,
                hits INTEGER NOT NULL DEFAULT 1,
                last_studied TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(theme_key, date)
            )');
        } else {
            $columns = self::columns($pdo, 'theme_study_log');
            if (!isset($columns['hits'])) {
                $pdo->exec('ALTER TABLE theme_study_log ADD COLUMN hits INTEGER NOT NULL DEFAULT 1');
            }
            if (!isset($columns['last_studied'])) {
                $pdo->exec("ALTER TABLE theme_study_log ADD COLUMN last_studied TEXT");
            }
        }
        $pdo->exec('UPDATE theme_study_log SET hits = CASE WHEN hits < 1 THEN 1 ELSE hits END');
        $pdo->exec("UPDATE theme_study_log SET last_studied = COALESCE(last_studied, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_theme_study_hits ON theme_study_log(hits DESC, last_studied DESC)');
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_theme_study_date ON theme_study_log(date DESC)');
    }

    private static function migrateAnecdotes(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'anecdotes')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS anecdotes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                topic TEXT NOT NULL,
                title TEXT NOT NULL,
                content TEXT NOT NULL,
                idea_central TEXT NOT NULL DEFAULT \'\',
                application TEXT NOT NULL DEFAULT \'\',
                source TEXT NOT NULL DEFAULT \'seed\',
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )');
            $pdo->exec('CREATE INDEX IF NOT EXISTS idx_anecdotes_topic ON anecdotes(topic)');
            return;
        }

        $columns = self::columns($pdo, 'anecdotes');
        if (!isset($columns['idea_central'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN idea_central TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['application'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN application TEXT NOT NULL DEFAULT ''");
        }
        if (!isset($columns['source'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN source TEXT NOT NULL DEFAULT 'seed'");
        }
        if (!isset($columns['created_at'])) {
            $pdo->exec("ALTER TABLE anecdotes ADD COLUMN created_at TEXT");
        }
        $pdo->exec("UPDATE anecdotes SET created_at = COALESCE(created_at, CURRENT_TIMESTAMP)");
        $pdo->exec('CREATE INDEX IF NOT EXISTS idx_anecdotes_topic ON anecdotes(topic)');
    }

    private static function migrateAnecdoteFavorites(\PDO $pdo)
    {
        if (!self::tableExists($pdo, 'anecdote_favorites')) {
            $pdo->exec('CREATE TABLE IF NOT EXISTS anecdote_favorites (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                anecdote_id INTEGER NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(user_id, anecdote_id)
            )');
        }
    }

    private static function tableExists(\PDO $pdo, $table)
    {
        $stmt = $pdo->prepare("SELECT name FROM sqlite_master WHERE type='table' AND name=:table LIMIT 1");
        $stmt->execute([':table' => $table]);
        return (bool) $stmt->fetchColumn();
    }

    private static function columns(\PDO $pdo, $table)
    {
        $rows = $pdo->query("PRAGMA table_info('" . str_replace("'", "''", $table) . "')")->fetchAll(\PDO::FETCH_ASSOC);
        $map = [];
        foreach ($rows as $row) {
            $map[$row['name']] = true;
        }
        return $map;
    }
}
