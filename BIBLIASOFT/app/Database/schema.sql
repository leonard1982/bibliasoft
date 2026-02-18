CREATE TABLE IF NOT EXISTS notes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    content TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_notes_ref ON notes (book, chapter, verse);

CREATE TABLE IF NOT EXISTS links (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    from_book INTEGER NOT NULL,
    from_chapter INTEGER NOT NULL,
    from_verse INTEGER NOT NULL,
    to_book INTEGER NOT NULL,
    to_chapter INTEGER NOT NULL,
    to_verse INTEGER NOT NULL,
    note TEXT,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE INDEX IF NOT EXISTS idx_links_from ON links (from_book, from_chapter, from_verse);
CREATE INDEX IF NOT EXISTS idx_links_to ON links (to_book, to_chapter, to_verse);

CREATE TABLE IF NOT EXISTS ai_cache (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    book INTEGER NOT NULL,
    chapter INTEGER NOT NULL,
    verse INTEGER NOT NULL,
    context_hash TEXT NOT NULL,
    cards_json TEXT NOT NULL,
    model TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(book, chapter, verse, context_hash)
);

CREATE INDEX IF NOT EXISTS idx_ai_cache_ref ON ai_cache (book, chapter, verse);

CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password_hash TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
);
