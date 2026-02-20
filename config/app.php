<?php

return [
    'app' => [
        'name' => 'Biblia para todos',
        'env' => getenv('APP_ENV') ?: 'local',
        'base_path' => dirname(__DIR__),
        'base_url' => getenv('APP_URL') ?: '/',
        'public_url' => getenv('APP_PUBLIC_URL') ?: '',
        'timezone' => getenv('APP_TZ') ?: 'America/Bogota',
    ],
    'paths' => [
        'bible' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_DB') ?: '01RVR1960x.bbli'),
        'bible_plain' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_PLAIN_DB') ?: '01RVR1960.bbli'),
        'bible_compare' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_COMPARE_DB') ?: (getenv('BIBLE_PLAIN_DB') ?: '01RVR1960.bbli')),
        'bible_strong' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_STRONG_DB') ?: 'es_rv1909.bbli'),
        'commentary' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('COMMENTARY_DB') ?: '01RVR1960x.cmti'),
        'lexicon' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('LEXICON_DB') ?: 'strong.lexx'),
        'devotional' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('DEVOTIONAL_DB') ?: 'spurgeon.devx'),
        'app_db' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app.sqlite',
    ],
    'versions' => [
        'primary_label' => getenv('BIBLE_PRIMARY_LABEL') ?: 'RVR60',
        'compare_label' => getenv('BIBLE_COMPARE_LABEL') ?: 'Versión 2',
    ],
    'ai' => [
        'provider' => 'openai',
        'enabled' => getenv('AI_ENABLED') === '1',
        'model' => getenv('OPENAI_MODEL') ?: 'gpt-4.1-mini',
        'api_key' => getenv('OPENAI_API_KEY') ?: '',
    ],
    'mail' => [
        'enabled' => getenv('MAIL_ENABLED') === '1',
        'host' => getenv('MAIL_HOST') ?: '',
        'port' => (int) (getenv('MAIL_PORT') ?: 587),
        'encryption' => getenv('MAIL_ENCRYPTION') ?: 'tls',
        'from_email' => getenv('MAIL_FROM_EMAIL') ?: '',
        'from_name' => getenv('MAIL_FROM_NAME') ?: 'Biblia para todos',
        'username' => getenv('MAIL_USERNAME') ?: '',
        'password' => getenv('MAIL_PASSWORD') ?: '',
    ],
    'search' => [
        'default_limit' => 60,
        'use_fts_preferred' => true,
    ],
];
