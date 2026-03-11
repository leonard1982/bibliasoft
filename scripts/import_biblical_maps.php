<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Este script se ejecuta solo por CLI.\n");
    exit(1);
}

$basePath = dirname(__DIR__);
$defaultOutput = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'modules'
    . DIRECTORY_SEPARATOR . 'packages' . DIRECTORY_SEPARATOR . 'mapas_importados.json';
$defaultCatalog = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'modules'
    . DIRECTORY_SEPARATOR . 'catalog.json';

$opts = getopt('', [
    'input:',
    'output::',
    'format::',
    'key::',
    'name::',
    'version::',
    'catalog::',
    'register',
]);

$inputPath = isset($opts['input']) ? trim((string) $opts['input']) : '';
$outputPath = isset($opts['output']) ? trim((string) $opts['output']) : $defaultOutput;
$format = isset($opts['format']) ? strtolower(trim((string) $opts['format'])) : '';
$moduleKey = isset($opts['key']) ? trim((string) $opts['key']) : 'mapas_importados';
$moduleName = isset($opts['name']) ? trim((string) $opts['name']) : 'Mapas Biblicos Importados';
$version = isset($opts['version']) ? trim((string) $opts['version']) : '1.0.0';
$catalogPath = isset($opts['catalog']) ? trim((string) $opts['catalog']) : $defaultCatalog;
$registerInCatalog = array_key_exists('register', $opts);

if ($inputPath === '') {
    fwrite(STDERR, "Uso: php scripts/import_biblical_maps.php --input=archivo.csv|json [--output=...] [--register]\n");
    exit(1);
}

if (!is_file($inputPath)) {
    fwrite(STDERR, "No se encontro archivo de entrada: {$inputPath}\n");
    exit(1);
}

$format = normalizeFormat($format, $inputPath);
if ($format !== 'csv' && $format !== 'json') {
    fwrite(STDERR, "Formato no soportado. Usa CSV o JSON.\n");
    exit(1);
}

$entries = $format === 'csv'
    ? loadEntriesFromCsv($inputPath)
    : loadEntriesFromJson($inputPath);

if (empty($entries)) {
    fwrite(STDERR, "No se encontraron entradas validas para importar.\n");
    exit(1);
}

$moduleKey = sanitizeModuleKey($moduleKey);
if ($moduleKey === '') {
    fwrite(STDERR, "La clave del modulo no es valida.\n");
    exit(1);
}

$normalizedEntries = [];
foreach ($entries as $entry) {
    $normalized = normalizeMapEntry($entry);
    if ($normalized === null) {
        continue;
    }
    $normalizedEntries[] = $normalized;
}

if (empty($normalizedEntries)) {
    fwrite(STDERR, "Ninguna entrada sobrevivio a la normalizacion.\n");
    exit(1);
}

$payload = [
    'module' => [
        'key' => $moduleKey,
        'type' => 'map',
        'name' => $moduleName,
        'version' => $version !== '' ? $version : '1.0.0',
    ],
    'entries' => $normalizedEntries,
];

$outputDir = dirname($outputPath);
if (!is_dir($outputDir) && !mkdir($outputDir, 0777, true) && !is_dir($outputDir)) {
    fwrite(STDERR, "No se pudo crear directorio destino: {$outputDir}\n");
    exit(1);
}

$json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
if (!is_string($json) || $json === '') {
    fwrite(STDERR, "No se pudo serializar JSON de salida.\n");
    exit(1);
}

file_put_contents($outputPath, $json);

if ($registerInCatalog) {
    registerCatalogEntry(
        $catalogPath,
        [
            'key' => $moduleKey,
            'type' => 'map',
            'name' => $moduleName,
            'description' => 'Modulo de mapas importado desde fuente externa.',
            'version' => $version !== '' ? $version : '1.0.0',
            'package' => basename($outputPath),
        ]
    );
}

echo "OK: {$outputPath}\n";
echo "Entradas: " . count($normalizedEntries) . "\n";
if ($registerInCatalog) {
    echo "Catalogo actualizado: {$catalogPath}\n";
}

function normalizeFormat(string $format, string $inputPath): string
{
    if ($format !== '') {
        return $format;
    }
    $ext = strtolower((string) pathinfo($inputPath, PATHINFO_EXTENSION));
    return $ext;
}

function loadEntriesFromJson(string $inputPath): array
{
    $raw = file_get_contents($inputPath);
    if (!is_string($raw) || trim($raw) === '') {
        return [];
    }

    $decoded = json_decode($raw, true);
    if (!is_array($decoded)) {
        return [];
    }

    if (isset($decoded['entries']) && is_array($decoded['entries'])) {
        return $decoded['entries'];
    }

    return array_is_list($decoded) ? $decoded : [];
}

function loadEntriesFromCsv(string $inputPath): array
{
    $handle = fopen($inputPath, 'rb');
    if ($handle === false) {
        return [];
    }

    $rows = [];
    $headers = [];
    $line = 0;
    while (($data = fgetcsv($handle)) !== false) {
        $line++;
        if ($line === 1) {
            foreach ($data as $column) {
                $headers[] = trim((string) $column);
            }
            continue;
        }
        if (empty($headers)) {
            break;
        }
        $row = [];
        foreach ($headers as $index => $header) {
            if ($header === '') {
                continue;
            }
            $row[$header] = isset($data[$index]) ? trim((string) $data[$index]) : '';
        }
        if (!empty(array_filter($row, static function ($value): bool {
            return trim((string) $value) !== '';
        }))) {
            $rows[] = $row;
        }
    }

    fclose($handle);
    return $rows;
}

function normalizeMapEntry(array $entry): ?array
{
    $title = trim((string) ($entry['title'] ?? ''));
    if ($title === '') {
        return null;
    }

    $summary = trim((string) ($entry['summary'] ?? ($entry['description'] ?? '')));
    $places = normalizeListField($entry['places'] ?? []);
    $references = normalizeListField($entry['references'] ?? []);
    $tags = normalizeListField($entry['tags'] ?? []);
    $coverage = normalizeCoverageField($entry['coverage'] ?? [], $references);

    $normalized = [
        'title' => $title,
        'summary' => $summary,
        'places' => $places,
        'references' => $references,
        'tags' => $tags,
        'period' => trim((string) ($entry['period'] ?? '')),
        'source_name' => trim((string) ($entry['source_name'] ?? '')),
        'source_url' => trim((string) ($entry['source_url'] ?? '')),
        'map_url' => trim((string) ($entry['map_url'] ?? '')),
        'image_url' => trim((string) ($entry['image_url'] ?? '')),
        'license' => trim((string) ($entry['license'] ?? '')),
        'coverage' => $coverage,
    ];

    foreach ($normalized as $key => $value) {
        if (is_string($value) && $value === '') {
            unset($normalized[$key]);
        }
        if (is_array($value) && empty($value)) {
            unset($normalized[$key]);
        }
    }

    return $normalized;
}

function normalizeListField($value): array
{
    if (is_array($value)) {
        $parts = $value;
    } else {
        $raw = trim((string) $value);
        if ($raw === '') {
            return [];
        }
        $parts = preg_split('/\s*(?:\||;)\s*/u', $raw);
        if (!is_array($parts)) {
            return [];
        }
    }

    $items = [];
    $seen = [];
    foreach ($parts as $part) {
        $item = trim((string) $part);
        if ($item === '') {
            continue;
        }
        $key = mb_strtolower($item, 'UTF-8');
        if (isset($seen[$key])) {
            continue;
        }
        $seen[$key] = true;
        $items[] = $item;
        if (count($items) >= 20) {
            break;
        }
    }

    return $items;
}

function normalizeCoverageField($value, array $references = []): array
{
    $rows = [];
    if (is_array($value)) {
        foreach ($value as $item) {
            if (is_array($item)) {
                $row = normalizeCoverageArray($item);
                if ($row !== null) {
                    $rows[] = $row;
                }
                continue;
            }
            $row = parseCoverageToken((string) $item);
            if ($row !== null) {
                $rows[] = $row;
            }
        }
    } else {
        $raw = trim((string) $value);
        if ($raw !== '') {
            $tokens = preg_split('/\s*(?:\||;)\s*/u', $raw);
            if (is_array($tokens)) {
                foreach ($tokens as $token) {
                    $row = parseCoverageToken((string) $token);
                    if ($row !== null) {
                        $rows[] = $row;
                    }
                }
            }
        }
    }

    if (empty($rows) && !empty($references)) {
        foreach ($references as $reference) {
            $row = parseCoverageToken((string) $reference);
            if ($row !== null) {
                $rows[] = $row;
            }
        }
    }

    return dedupeCoverage($rows);
}

function normalizeCoverageArray(array $row): ?array
{
    $book = (int) ($row['book'] ?? 0);
    $chapter = (int) ($row['chapter'] ?? 0);
    $verseStart = max(1, (int) ($row['verse_start'] ?? 1));
    $verseEnd = max(1, (int) ($row['verse_end'] ?? $verseStart));
    if ($book < 1 || $chapter < 1) {
        return null;
    }
    if ($verseStart > $verseEnd) {
        $tmp = $verseStart;
        $verseStart = $verseEnd;
        $verseEnd = $tmp;
    }
    return [
        'book' => $book,
        'chapter' => $chapter,
        'verse_start' => $verseStart,
        'verse_end' => $verseEnd,
    ];
}

function parseCoverageToken(string $token): ?array
{
    $raw = trim($token);
    if ($raw === '') {
        return null;
    }

    if (preg_match('/^(\d+)\|(\d+)\|(\d+)\|(\d+)$/', $raw, $m)) {
        return normalizeCoverageArray([
            'book' => (int) $m[1],
            'chapter' => (int) $m[2],
            'verse_start' => (int) $m[3],
            'verse_end' => (int) $m[4],
        ]);
    }

    if (preg_match('/^(.+?)\s+(\d+):(\d+)(?:-(\d+))?$/u', $raw, $m)) {
        $book = resolveBookId((string) $m[1]);
        if ($book < 1) {
            return null;
        }
        return normalizeCoverageArray([
            'book' => $book,
            'chapter' => (int) $m[2],
            'verse_start' => (int) $m[3],
            'verse_end' => isset($m[4]) && $m[4] !== '' ? (int) $m[4] : (int) $m[3],
        ]);
    }

    return null;
}

function dedupeCoverage(array $rows): array
{
    $seen = [];
    $result = [];
    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }
        $key = implode(':', [
            (int) ($row['book'] ?? 0),
            (int) ($row['chapter'] ?? 0),
            (int) ($row['verse_start'] ?? 0),
            (int) ($row['verse_end'] ?? 0),
        ]);
        if ($key === '0:0:0:0' || isset($seen[$key])) {
            continue;
        }
        $seen[$key] = true;
        $result[] = $row;
    }
    return $result;
}

function sanitizeModuleKey(string $value): string
{
    $raw = trim($value);
    if ($raw === '') {
        return '';
    }
    $raw = strtolower($raw);
    $raw = preg_replace('/[^a-z0-9_\-]/', '_', $raw);
    $raw = preg_replace('/_+/', '_', (string) $raw);
    return trim((string) $raw, '_');
}

function registerCatalogEntry(string $catalogPath, array $entry): void
{
    $rows = [];
    if (is_file($catalogPath)) {
        $raw = file_get_contents($catalogPath);
        if (is_string($raw) && trim($raw) !== '') {
            $decoded = json_decode($raw, true);
            if (is_array($decoded)) {
                $rows = isset($decoded['modules']) && is_array($decoded['modules'])
                    ? $decoded['modules']
                    : (array_is_list($decoded) ? $decoded : []);
            }
        }
    }

    $updated = false;
    foreach ($rows as $index => $row) {
        if (!is_array($row)) {
            continue;
        }
        if (trim((string) ($row['key'] ?? '')) === (string) ($entry['key'] ?? '')) {
            $rows[$index] = array_merge($row, $entry);
            $updated = true;
            break;
        }
    }
    if (!$updated) {
        $rows[] = $entry;
    }

    $json = json_encode(array_values($rows), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    if (!is_string($json) || $json === '') {
        throw new RuntimeException('No se pudo serializar el catalogo.');
    }
    file_put_contents($catalogPath, $json);
}

function resolveBookId(string $bookLabel): int
{
    $map = bookAliasMap();
    $normalized = normalizeBookLabel($bookLabel);
    return isset($map[$normalized]) ? (int) $map[$normalized] : 0;
}

function normalizeBookLabel(string $value): string
{
    $text = trim($value);
    if ($text === '') {
        return '';
    }
    $text = mb_strtolower($text, 'UTF-8');
    $text = strtr($text, [
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'ü' => 'u',
        'ñ' => 'n',
    ]);
    $text = preg_replace('/[^a-z0-9\s]/u', ' ', $text);
    $text = preg_replace('/\s+/u', ' ', (string) $text);
    return trim((string) $text);
}

function bookAliasMap(): array
{
    static $map = null;
    if (is_array($map)) {
        return $map;
    }

    $books = [
        1 => ['genesis', 'gen'],
        2 => ['exodo', 'exo'],
        3 => ['levitico', 'lev'],
        4 => ['numeros', 'num'],
        5 => ['deuteronomio', 'deu'],
        6 => ['josue', 'jos'],
        7 => ['jueces', 'jue'],
        8 => ['rut'],
        9 => ['1 samuel', '1samuel', 'i samuel', '1 sa'],
        10 => ['2 samuel', '2samuel', 'ii samuel', '2 sa'],
        11 => ['1 reyes', '1reyes', 'i reyes', '1 ki'],
        12 => ['2 reyes', '2reyes', 'ii reyes', '2 ki'],
        13 => ['1 cronicas', '1cronicas', 'i cronicas', '1 cr'],
        14 => ['2 cronicas', '2cronicas', 'ii cronicas', '2 cr'],
        15 => ['esdras', 'esd'],
        16 => ['nehemias', 'neh'],
        17 => ['ester', 'est'],
        18 => ['job'],
        19 => ['salmos', 'salmo', 'psalms', 'sal'],
        20 => ['proverbios', 'prov'],
        21 => ['eclesiastes', 'ecl'],
        22 => ['cantares', 'cantar de los cantares', 'cnt'],
        23 => ['isaias', 'isa'],
        24 => ['jeremias', 'jer'],
        25 => ['lamentaciones', 'lam'],
        26 => ['ezequiel', 'ezq', 'eze'],
        27 => ['daniel', 'dan'],
        28 => ['oseas', 'os'],
        29 => ['joel', 'jl'],
        30 => ['amos', 'am'],
        31 => ['abdias', 'abd'],
        32 => ['jonas', 'jon'],
        33 => ['miqueas', 'miq', 'mic'],
        34 => ['nahum', 'nah'],
        35 => ['habacuc', 'hab'],
        36 => ['sofonias', 'sof'],
        37 => ['hageo', 'hag'],
        38 => ['zacarias', 'zac'],
        39 => ['malaquias', 'mal'],
        40 => ['mateo', 'mat'],
        41 => ['marcos', 'mrk', 'mar'],
        42 => ['lucas', 'luk', 'luc'],
        43 => ['juan', 'jhn', 'jn'],
        44 => ['hechos', 'acts', 'act'],
        45 => ['romanos', 'rom'],
        46 => ['1 corintios', '1corintios', 'i corintios', '1 co'],
        47 => ['2 corintios', '2corintios', 'ii corintios', '2 co'],
        48 => ['galatas', 'gal'],
        49 => ['efesios', 'efe', 'eph'],
        50 => ['filipenses', 'fil', 'php'],
        51 => ['colosenses', 'col'],
        52 => ['1 tesalonicenses', '1tesalonicenses', 'i tesalonicenses', '1 ts'],
        53 => ['2 tesalonicenses', '2tesalonicenses', 'ii tesalonicenses', '2 ts'],
        54 => ['1 timoteo', '1timoteo', 'i timoteo', '1 ti'],
        55 => ['2 timoteo', '2timoteo', 'ii timoteo', '2 ti'],
        56 => ['tito', 'tit'],
        57 => ['filemon', 'flm'],
        58 => ['hebreos', 'heb'],
        59 => ['santiago', 'stg', 'jas'],
        60 => ['1 pedro', '1pedro', 'i pedro', '1 pe'],
        61 => ['2 pedro', '2pedro', 'ii pedro', '2 pe'],
        62 => ['1 juan', '1juan', 'i juan', '1 jn'],
        63 => ['2 juan', '2juan', 'ii juan', '2 jn'],
        64 => ['3 juan', '3juan', 'iii juan', '3 jn'],
        65 => ['judas', 'jud'],
        66 => ['apocalipsis', 'apo', 'rev'],
    ];

    $map = [];
    foreach ($books as $id => $aliases) {
        foreach ($aliases as $alias) {
            $map[normalizeBookLabel($alias)] = $id;
        }
    }
    return $map;
}
