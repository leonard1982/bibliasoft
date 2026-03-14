CREATE TABLE IF NOT EXISTS notes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse_start INTEGER NOT NULL,
    verse_end INTEGER NOT NULL,
    content TEXT NOT NULL,
    tags TEXT DEFAULT '',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_notes_ref ON notes (book, chapter, verse_start, verse_end);

CREATE TABLE IF NOT EXISTS links (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    from_book INTEGER NOT NULL,
    from_chapter INTEGER NOT NULL,
    from_verse_start INTEGER NOT NULL,
    from_verse_end INTEGER NOT NULL,
    to_book INTEGER NOT NULL,
    to_chapter INTEGER NOT NULL,
    to_verse_start INTEGER NOT NULL,
    to_verse_end INTEGER NOT NULL,
    note TEXT,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_links_from ON links (from_book, from_chapter, from_verse_start, from_verse_end);
CREATE INDEX IF NOT EXISTS idx_links_to ON links (to_book, to_chapter, to_verse_start, to_verse_end);

CREATE TABLE IF NOT EXISTS ai_cache (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER,
    verse_start INTEGER,
    verse_end INTEGER,
    context_hash TEXT DEFAULT '',
    cards_json TEXT DEFAULT '',
    model TEXT DEFAULT '',
    mode TEXT DEFAULT 'resumen',
    prompt_hash TEXT DEFAULT '',
    response TEXT,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(book, chapter, verse, context_hash)
);

CREATE INDEX IF NOT EXISTS idx_ai_cache_ref ON ai_cache (book, chapter, verse_start, verse_end, mode);

CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    email TEXT UNIQUE,
    full_name TEXT NOT NULL DEFAULT '',
    ministry TEXT NOT NULL DEFAULT '',
    data_consent INTEGER NOT NULL DEFAULT 0,
    data_consent_at TEXT,
    active INTEGER NOT NULL DEFAULT 1,
    password_hash TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_login_at TEXT
);

CREATE INDEX IF NOT EXISTS idx_users_active ON users (active, created_at);

CREATE TABLE IF NOT EXISTS cloud_sync_backups (
    user_id INTEGER PRIMARY KEY,
    payload_json TEXT NOT NULL,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS favorite_folders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS favorites (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    folder_id INTEGER NOT NULL DEFAULT 1,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(book, chapter, verse)
);

CREATE TABLE IF NOT EXISTS highlights (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    color TEXT NOT NULL DEFAULT 'yellow',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(book, chapter, verse)
);

CREATE INDEX IF NOT EXISTS idx_highlights_ref ON highlights (book, chapter, verse);

CREATE TABLE IF NOT EXISTS history (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    visited_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_history_recent ON history (id DESC);
CREATE INDEX IF NOT EXISTS idx_history_ref ON history (book, chapter, visited_at);

CREATE TABLE IF NOT EXISTS passage_history (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse_start INTEGER NOT NULL,
    verse_end INTEGER NOT NULL,
    hits INTEGER NOT NULL DEFAULT 1,
    last_viewed TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(book, chapter, verse_start, verse_end)
);

CREATE INDEX IF NOT EXISTS idx_passage_history_hits ON passage_history (hits DESC, last_viewed DESC);
CREATE INDEX IF NOT EXISTS idx_passage_history_recent ON passage_history (last_viewed DESC);

CREATE TABLE IF NOT EXISTS daily_cache (
    date TEXT PRIMARY KEY,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    image_path TEXT DEFAULT '',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS devotionals (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT NOT NULL,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    content_json TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_devotionals_date ON devotionals (date);

CREATE TABLE IF NOT EXISTS user_prefs (
    id INTEGER PRIMARY KEY CHECK (id = 1),
    font_scale INTEGER NOT NULL DEFAULT 100,
    show_daily INTEGER NOT NULL DEFAULT 1,
    auto_devotional INTEGER NOT NULL DEFAULT 0,
    weekly_goal_days INTEGER NOT NULL DEFAULT 5,
    reminder_enabled INTEGER NOT NULL DEFAULT 0,
    reminder_time TEXT NOT NULL DEFAULT '07:00',
    theme TEXT NOT NULL DEFAULT 'light',
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reading_plans (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    total_days INTEGER NOT NULL,
    start_date TEXT NOT NULL,
    active INTEGER NOT NULL DEFAULT 1,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_reading_plans_active ON reading_plans (active, updated_at);

CREATE TABLE IF NOT EXISTS reading_plan_progress (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    plan_id INTEGER NOT NULL,
    day_index INTEGER NOT NULL,
    date TEXT NOT NULL,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(plan_id, day_index)
);

CREATE INDEX IF NOT EXISTS idx_reading_progress_plan ON reading_plan_progress (plan_id, day_index);

CREATE TABLE IF NOT EXISTS reading_plan_chapter_progress (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    plan_id INTEGER NOT NULL,
    day_index INTEGER NOT NULL,
    date TEXT NOT NULL,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    completed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(plan_id, day_index, book, chapter)
);

CREATE INDEX IF NOT EXISTS idx_reading_chapter_progress_plan_day ON reading_plan_chapter_progress (plan_id, day_index);

CREATE TABLE IF NOT EXISTS content_modules (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    module_key TEXT NOT NULL UNIQUE,
    type TEXT NOT NULL,
    name TEXT NOT NULL,
    version TEXT NOT NULL DEFAULT '',
    file_path TEXT NOT NULL,
    enabled INTEGER NOT NULL DEFAULT 1,
    installed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS study_projects (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL DEFAULT '',
    color TEXT NOT NULL DEFAULT '#1d6a8f',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE UNIQUE INDEX IF NOT EXISTS idx_study_projects_name ON study_projects (name);

CREATE TABLE IF NOT EXISTS study_project_entries (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    project_id INTEGER NOT NULL,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse_start INTEGER NOT NULL,
    verse_end INTEGER NOT NULL,
    note TEXT NOT NULL DEFAULT '',
    strong_code TEXT NOT NULL DEFAULT '',
    strong_term TEXT NOT NULL DEFAULT '',
    commentary_excerpt TEXT NOT NULL DEFAULT '',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_study_entries_project ON study_project_entries (project_id, updated_at DESC, id DESC);
CREATE INDEX IF NOT EXISTS idx_study_entries_ref ON study_project_entries (book, chapter, verse_start, verse_end);

CREATE TABLE IF NOT EXISTS reading_sessions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT NOT NULL UNIQUE,
    seconds INTEGER NOT NULL DEFAULT 0,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_reading_sessions_date ON reading_sessions (date DESC);

CREATE TABLE IF NOT EXISTS theme_study_log (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    theme_key TEXT NOT NULL,
    date TEXT NOT NULL,
    hits INTEGER NOT NULL DEFAULT 1,
    last_studied TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(theme_key, date)
);

CREATE INDEX IF NOT EXISTS idx_theme_study_hits ON theme_study_log (hits DESC, last_studied DESC);
CREATE INDEX IF NOT EXISTS idx_theme_study_date ON theme_study_log (date DESC);

CREATE TABLE IF NOT EXISTS anecdotes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    topic TEXT NOT NULL,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    idea_central TEXT NOT NULL DEFAULT '',
    application TEXT NOT NULL DEFAULT '',
    source TEXT NOT NULL DEFAULT 'seed',
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_anecdotes_topic ON anecdotes (topic);

CREATE TABLE IF NOT EXISTS anecdote_favorites (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    anecdote_id INTEGER NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(user_id, anecdote_id)
);
