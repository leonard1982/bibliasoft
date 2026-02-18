<?php

return [
    'app' => [
        'name' => 'Biblia Web MVP',
        'env' => getenv('APP_ENV') ?: 'local',
        'base_path' => dirname(__DIR__),
        'base_url' => getenv('APP_URL') ?: '/',
        'timezone' => getenv('APP_TZ') ?: 'America/Bogota',
    ],
    'paths' => [
        'bible' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_DB') ?: '01RVR1960x.bbli'),
        'bible_plain' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('BIBLE_PLAIN_DB') ?: '01RVR1960.bbli'),
        'commentary' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('COMMENTARY_DB') ?: '01RVR1960x.cmti'),
        'lexicon' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('LEXICON_DB') ?: 'strong.lexx'),
        'devotional' => dirname(__DIR__) . DIRECTORY_SEPARATOR . (getenv('DEVOTIONAL_DB') ?: 'spurgeon.devx'),
        'app_db' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'app.sqlite',
    ],
    'ai' => [
        'provider' => 'openai',
        'enabled' => getenv('AI_ENABLED') === '1',
        'model' => getenv('OPENAI_MODEL') ?: 'gpt-4.1-mini',
        'api_key' => getenv('OPENAI_API_KEY') ?: '',
    ],
    'search' => [
        'default_limit' => 60,
        'use_fts_preferred' => true,
    ],
];
