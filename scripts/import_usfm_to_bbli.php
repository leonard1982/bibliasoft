<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Este script se ejecuta solo por CLI.\n");
    exit(1);
}

$opts = getopt('', ['source:', 'output:', 'title::', 'abbr::']);
$sourceDir = isset($opts['source']) ? trim((string) $opts['source']) : '';
$outputFile = isset($opts['output']) ? trim((string) $opts['output']) : '';
$title = isset($opts['title']) ? trim((string) $opts['title']) : '';
$abbr = isset($opts['abbr']) ? trim((string) $opts['abbr']) : '';

if ($sourceDir === '' || $outputFile === '') {
    fwrite(STDERR, "Uso: php scripts/import_usfm_to_bbli.php --source=DIR --output=FILE [--title=TITULO] [--abbr=ABR]\n");
    exit(1);
}

if (!is_dir($sourceDir)) {
    fwrite(STDERR, "No existe el directorio source: {$sourceDir}\n");
    exit(1);
}

$sourceDir = realpath($sourceDir) ?: $sourceDir;
$outputDir = dirname($outputFile);
if (!is_dir($outputDir)) {
    if (!mkdir($outputDir, 0777, true) && !is_dir($outputDir)) {
        fwrite(STDERR, "No se pudo crear directorio destino: {$outputDir}\n");
        exit(1);
    }
}

$bookMap = [
    'GEN' => 1,  'EXO' => 2,  'LEV' => 3,  'NUM' => 4,  'DEU' => 5,
    'JOS' => 6,  'JDG' => 7,  'RUT' => 8,  '1SA' => 9,  '2SA' => 10,
    '1KI' => 11, '2KI' => 12, '1CH' => 13, '2CH' => 14, 'EZR' => 15,
    'NEH' => 16, 'EST' => 17, 'JOB' => 18, 'PSA' => 19, 'PRO' => 20,
    'ECC' => 21, 'SNG' => 22, 'ISA' => 23, 'JER' => 24, 'LAM' => 25,
    'EZK' => 26, 'DAN' => 27, 'HOS' => 28, 'JOL' => 29, 'AMO' => 30,
    'OBA' => 31, 'JON' => 32, 'MIC' => 33, 'NAM' => 34, 'HAB' => 35,
    'ZEP' => 36, 'HAG' => 37, 'ZEC' => 38, 'MAL' => 39, 'MAT' => 40,
    'MRK' => 41, 'LUK' => 42, 'JHN' => 43, 'ACT' => 44, 'ROM' => 45,
    '1CO' => 46, '2CO' => 47, 'GAL' => 48, 'EPH' => 49, 'PHP' => 50,
    'COL' => 51, '1TH' => 52, '2TH' => 53, '1TI' => 54, '2TI' => 55,
    'TIT' => 56, 'PHM' => 57, 'HEB' => 58, 'JAS' => 59, '1PE' => 60,
    '2PE' => 61, '1JN' => 62, '2JN' => 63, '3JN' => 64, 'JUD' => 65,
    'REV' => 66,
];

$files = glob($sourceDir . DIRECTORY_SEPARATOR . '*.usfm');
if (empty($files)) {
    $files = glob($sourceDir . DIRECTORY_SEPARATOR . '*.USFM');
}
if (empty($files)) {
    fwrite(STDERR, "No se encontraron archivos USFM en: {$sourceDir}\n");
    exit(1);
}
sort($files, SORT_NATURAL | SORT_FLAG_CASE);

$rows = [];
$seenBooks = [];
$hasStrongTags = false;
foreach ($files as $file) {
    $parsed = parseUsfmFile($file, $bookMap);
    if ($parsed['book'] < 1 || empty($parsed['rows'])) {
        continue;
    }
    $seenBooks[$parsed['book']] = true;
    foreach ($parsed['rows'] as $row) {
        if (!$hasStrongTags && strpos((string) ($row['Scripture'] ?? ''), 'data-strong=') !== false) {
            $hasStrongTags = true;
        }
        $rows[] = $row;
    }
}

if (empty($rows)) {
    fwrite(STDERR, "No se pudieron extraer versículos válidos.\n");
    exit(1);
}

usort($rows, static function (array $a, array $b): int {
    if ($a['Book'] !== $b['Book']) {
        return $a['Book'] <=> $b['Book'];
    }
    if ($a['Chapter'] !== $b['Chapter']) {
        return $a['Chapter'] <=> $b['Chapter'];
    }
    return $a['Verse'] <=> $b['Verse'];
});

$title = $title !== '' ? $title : pathinfo($outputFile, PATHINFO_FILENAME);
if ($abbr === '') {
    if (function_exists('mb_substr')) {
        $abbr = mb_substr($title, 0, 24, 'UTF-8');
    } else {
        $abbr = substr($title, 0, 24);
    }
}

if (is_file($outputFile)) {
    unlink($outputFile);
}

$pdo = new PDO('sqlite:' . $outputFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('PRAGMA journal_mode = WAL;');
$pdo->exec('PRAGMA synchronous = NORMAL;');

$pdo->exec(
    'CREATE TABLE Bible (
        Book INT,
        Chapter INT,
        Verse INT,
        Scripture TEXT
    )'
);

$pdo->exec(
    'CREATE TABLE Details (
        Title NVARCHAR(100),
        Abbreviation NVARCHAR(50),
        Information TEXT,
        Version INT,
        OldTestament BOOL,
        NewTestament BOOL,
        Apocrypha BOOL,
        Strongs BOOL,
        RightToLeft BOOL
    )'
);

$insertVerse = $pdo->prepare(
    'INSERT INTO Bible (Book, Chapter, Verse, Scripture) VALUES (:book, :chapter, :verse, :scripture)'
);

$pdo->beginTransaction();
foreach ($rows as $row) {
    $insertVerse->execute([
        ':book' => (int) $row['Book'],
        ':chapter' => (int) $row['Chapter'],
        ':verse' => (int) $row['Verse'],
        ':scripture' => (string) $row['Scripture'],
    ]);
}
$pdo->commit();

$info = sprintf(
    'Importado desde USFM (%s) el %s. Libros detectados: %d. Versículos: %d.',
    basename($sourceDir),
    date('Y-m-d H:i:s'),
    count($seenBooks),
    count($rows)
);

$insertDetails = $pdo->prepare(
    'INSERT INTO Details (
        Title, Abbreviation, Information, Version,
        OldTestament, NewTestament, Apocrypha, Strongs, RightToLeft
    ) VALUES (
        :title, :abbr, :information, :version,
        :ot, :nt, :apocrypha, :strongs, :rtl
    )'
);

$insertDetails->execute([
    ':title' => $title,
    ':abbr' => $abbr,
    ':information' => $info,
    ':version' => 1,
    ':ot' => 1,
    ':nt' => 1,
    ':apocrypha' => 0,
    ':strongs' => $hasStrongTags ? 1 : 0,
    ':rtl' => 0,
]);

$pdo->exec('CREATE INDEX idx_bible_ref ON Bible (Book, Chapter, Verse)');

echo "OK: {$outputFile}\n";
echo "Versiculos: " . count($rows) . "\n";
echo "Libros: " . count($seenBooks) . "\n";

function parseUsfmFile(string $file, array $bookMap): array
{
    $raw = file_get_contents($file);
    if ($raw === false) {
        return ['book' => 0, 'rows' => []];
    }
    $raw = str_replace(["\r\n", "\r"], "\n", $raw);
    $lines = explode("\n", $raw);

    $bookId = '';
    $bookNum = 0;
    $chapter = 0;
    $verse = 0;
    $rows = [];

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }

        if (preg_match('/^\\\\id\s+([A-Za-z0-9]{3})\b/u', $line, $m)) {
            $bookId = strtoupper($m[1]);
            $bookNum = isset($bookMap[$bookId]) ? (int) $bookMap[$bookId] : 0;
            continue;
        }

        if ($bookNum < 1) {
            continue;
        }

        if (preg_match('/^\\\\c\s+(\d+)/u', $line, $m)) {
            $chapter = (int) $m[1];
            $verse = 0;
            continue;
        }

        if (preg_match('/^\\\\v\s+(\d+)(?:\s+|$)(.*)$/u', $line, $m)) {
            $verse = (int) $m[1];
            if ($chapter < 1 || $verse < 1) {
                continue;
            }
            $text = normalizeUsfmText($m[2]);
            if ($text === '') {
                continue;
            }
            $key = $bookNum . ':' . $chapter . ':' . $verse;
            $rows[$key] = [
                'Book' => $bookNum,
                'Chapter' => $chapter,
                'Verse' => $verse,
                'Scripture' => $text,
            ];
            continue;
        }

        if ($chapter < 1 || $verse < 1) {
            continue;
        }

        if ($line[0] === '\\') {
            if (!preg_match('/^\\\\([+A-Za-z0-9]+)/u', $line, $m)) {
                continue;
            }
            $marker = strtolower($m[1]);
            if (in_array($marker, ignoredParagraphMarkers(), true)) {
                continue;
            }
            $line = preg_replace('/^\\\\[+A-Za-z0-9]+\s*/u', '', $line);
        }

        $continuation = normalizeUsfmText($line);
        if ($continuation === '') {
            continue;
        }

        $key = $bookNum . ':' . $chapter . ':' . $verse;
        if (!isset($rows[$key])) {
            $rows[$key] = [
                'Book' => $bookNum,
                'Chapter' => $chapter,
                'Verse' => $verse,
                'Scripture' => $continuation,
            ];
        } else {
            $rows[$key]['Scripture'] = trim($rows[$key]['Scripture'] . ' ' . $continuation);
        }
    }

    return [
        'book' => $bookNum,
        'rows' => array_values($rows),
    ];
}

function normalizeUsfmText(string $text): string
{
    $text = ' ' . $text . ' ';
    $text = preg_replace('/\\\\f\b.*?\\\\f\*/us', ' ', $text);
    $text = preg_replace('/\\\\x\b.*?\\\\x\*/us', ' ', $text);
    $text = preg_replace_callback('/\\\\w\s+(.+?)(?:\|([^\\\\]*?))?\\\\w\*/u', static function (array $m): string {
        $word = normalizeUsfmWord((string) ($m[1] ?? ''));
        if ($word === '') {
            return ' ';
        }

        $codes = extractStrongCodes((string) ($m[2] ?? ''));
        if (empty($codes)) {
            return ' ' . $word . ' ';
        }

        return ' <span class="strong-word" data-strong="' . implode(',', $codes) . '">' . $word . '</span> ';
    }, $text);

    $inlinePairs = [
        'add', 'bd', 'bdit', 'it', 'em', 'nd', 'sc', 'sup', 'wj', 'no', 'qt', 'rq', 'tl',
    ];
    foreach ($inlinePairs as $marker) {
        $text = preg_replace('/\\\\' . $marker . '\s+(.*?)\\\\' . $marker . '\*/u', ' $1 ', $text);
        $text = preg_replace('/\\\\\+' . $marker . '\s+(.*?)\\\\\+' . $marker . '\*/u', ' $1 ', $text);
    }

    $text = preg_replace('/\\\\[+A-Za-z0-9\-]+(?:\s+\|[^\\\\]*)?/u', ' ', $text);
    $text = preg_replace('/\s+/u', ' ', $text);
    $text = preg_replace('/\s+([,.;:!?])/u', '$1', $text);
    $text = preg_replace('/([¿¡])\s+/u', '$1', $text);
    $text = trim($text);
    $text = trim($text, "\"'` ");
    return $text;
}

function normalizeUsfmWord(string $word): string
{
    $word = trim($word);
    if ($word === '') {
        return '';
    }

    $word = preg_replace('/\\\\[+A-Za-z0-9\-]+/u', ' ', $word);
    $word = preg_replace('/\s+/u', ' ', (string) $word);
    return trim((string) $word);
}

function extractStrongCodes(string $attrs): array
{
    $attrs = trim($attrs);
    if ($attrs === '') {
        return [];
    }

    $value = '';
    if (preg_match('/\bstrong\s*=\s*"([^"]+)"/ui', $attrs, $m)) {
        $value = (string) $m[1];
    } elseif (preg_match("/\bstrong\s*=\s*'([^']+)'/ui", $attrs, $m)) {
        $value = (string) $m[1];
    } elseif (preg_match('/\bstrong\s*=\s*([^\s|]+)/ui', $attrs, $m)) {
        $value = (string) $m[1];
    }

    $value = strtoupper(trim($value));
    if ($value === '') {
        return [];
    }

    $tokens = preg_split('/[\s,;]+/', $value);
    $codes = [];
    foreach ($tokens as $token) {
        if (!preg_match('/^([GH])0*([0-9]{1,5})$/', (string) $token, $m)) {
            continue;
        }
        $number = (int) $m[2];
        if ($number < 1) {
            continue;
        }
        $code = $m[1] . $number;
        $codes[$code] = true;
    }

    return array_keys($codes);
}

function ignoredParagraphMarkers(): array
{
    return [
        'p', 'm', 'mi', 'pi', 'pi1', 'pi2', 'pi3', 'pc', 'pr', 'pm', 'pmc', 'pmr',
        'b', 'nb', 'c', 'v', 'id', 'ide', 'h', 'toc1', 'toc2', 'toc3',
        'mt', 'mt1', 'mt2', 'mt3', 'mte', 'ms', 'ms1', 'ms2', 'ms3',
        's', 's1', 's2', 's3', 's4', 'sr', 'r', 'd', 'sp', 'cl', 'cd',
        'is', 'is1', 'is2', 'ip', 'ipi', 'im', 'imi', 'iot', 'io', 'io1', 'io2', 'io3',
        'ili', 'ili1', 'ili2', 'ili3', 'rem', 'periph',
    ];
}
