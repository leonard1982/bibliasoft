<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Este script se ejecuta solo por CLI.\n");
    exit(1);
}

$basePath = dirname(__DIR__);
$defaultStrongDb = $basePath . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'strong.sqlite';
$defaultOutput = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'packages'
    . DIRECTORY_SEPARATOR . 'diccionario_biblico_strong_es.json';

$opts = getopt('', ['strong-db::', 'output::', 'limit::']);
$strongDbPath = isset($opts['strong-db']) ? trim((string) $opts['strong-db']) : $defaultStrongDb;
$outputPath = isset($opts['output']) ? trim((string) $opts['output']) : $defaultOutput;
$entryLimit = isset($opts['limit']) ? (int) $opts['limit'] : 12000;
$entryLimit = max(2000, min(50000, $entryLimit));

if (!is_file($strongDbPath)) {
    fwrite(STDERR, "No se encontro base Strong: {$strongDbPath}\n");
    exit(1);
}

$outputDir = dirname($outputPath);
if (!is_dir($outputDir) && !mkdir($outputDir, 0777, true) && !is_dir($outputDir)) {
    fwrite(STDERR, "No se pudo crear directorio destino: {$outputDir}\n");
    exit(1);
}

$pdo = new PDO('sqlite:' . $strongDbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code, lemma, translit, strongs_def
        FROM strong_entries
        WHERE strongs_def IS NOT NULL AND TRIM(strongs_def) <> ""
        ORDER BY code';
$stmt = $pdo->query($sql);
$rows = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
if (empty($rows)) {
    fwrite(STDERR, "No se encontraron filas en strong_entries.\n");
    exit(1);
}

$stop = buildStopWords();
$dictionary = [];

foreach ($rows as $row) {
    if (!is_array($row)) {
        continue;
    }
    $code = strtoupper(trim((string) ($row['code'] ?? '')));
    $lemma = trim((string) ($row['lemma'] ?? ''));
    $translit = trim((string) ($row['translit'] ?? ''));
    $def = normalizeText((string) ($row['strongs_def'] ?? ''));
    if ($code === '' || $def === '') {
        continue;
    }

    $shortDef = buildShortDefinition($def);
    if ($shortDef === '') {
        continue;
    }

    $terms = extractUsageTerms($def);
    if (empty($terms)) {
        continue;
    }

    foreach ($terms as $term) {
        $variants = buildTermVariants($term);
        foreach ($variants as $variant) {
            $key = normalizeKey($variant);
            if ($key === '' || isset($stop[$key])) {
                continue;
            }
            $firstToken = trim((string) preg_replace('/\s.*$/u', '', $key));
            if ($firstToken !== '' && isset($stop[$firstToken])) {
                continue;
            }
            if (!preg_match('/[a-z]/', $key)) {
                continue;
            }
            if (mb_strlen($key, 'UTF-8') < 3 || mb_strlen($key, 'UTF-8') > 40) {
                continue;
            }

            if (!isset($dictionary[$key])) {
                $aliases = [];
                pushUnique($aliases, mb_strtolower($term, 'UTF-8'));
                pushUnique($aliases, $variant);
                if ($lemma !== '') {
                    pushUnique($aliases, $lemma);
                }
                if ($translit !== '') {
                    pushUnique($aliases, $translit);
                }
                pushUnique($aliases, $code);

                $usageTerms = array_slice($terms, 0, 6);
                $entryUsage = 'Del lexico Strong ' . $code . '. Traducciones frecuentes: ' . implode(', ', $usageTerms) . '.';

                $quality = scoreDefinitionQuality($shortDef);
                $dictionary[$key] = [
                    'term' => mb_strtolower($variant, 'UTF-8'),
                    'aliases' => $aliases,
                    'definition' => $shortDef,
                    'usage' => $entryUsage,
                    'references' => [],
                    'score' => scoreTerm($variant, $terms) + $quality,
                ];
            } else {
                pushUnique($dictionary[$key]['aliases'], $variant);
                if ($lemma !== '') {
                    pushUnique($dictionary[$key]['aliases'], $lemma);
                }
                if ($translit !== '') {
                    pushUnique($dictionary[$key]['aliases'], $translit);
                }
                pushUnique($dictionary[$key]['aliases'], $code);
                $newScore = scoreTerm($variant, $terms) + scoreDefinitionQuality($shortDef);
                if ($newScore > (int) ($dictionary[$key]['score'] ?? 0)) {
                    $dictionary[$key]['term'] = mb_strtolower($variant, 'UTF-8');
                    $dictionary[$key]['definition'] = $shortDef;
                    $dictionary[$key]['usage'] = 'Del lexico Strong ' . $code . '. Traducciones frecuentes: ' . implode(', ', array_slice($terms, 0, 6)) . '.';
                    $dictionary[$key]['score'] = $newScore;
                }
            }
        }
    }
}

$entries = array_values($dictionary);
usort($entries, static function (array $a, array $b): int {
    $scoreA = (int) ($a['score'] ?? 0);
    $scoreB = (int) ($b['score'] ?? 0);
    if ($scoreA === $scoreB) {
        return strcasecmp((string) ($a['term'] ?? ''), (string) ($b['term'] ?? ''));
    }
    return $scoreB <=> $scoreA;
});

$entries = array_slice($entries, 0, $entryLimit);
foreach ($entries as &$entry) {
    unset($entry['score']);
    if (isset($entry['aliases']) && is_array($entry['aliases'])) {
        $entry['aliases'] = array_values($entry['aliases']);
    }
}
unset($entry);

$payload = [
    'module' => [
        'key' => 'diccionario_biblico_strong_es',
        'type' => 'dictionary',
        'name' => 'Diccionario Biblico Strong (ES)',
        'version' => '1.0.1',
    ],
    'entries' => $entries,
];

$json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
if (!is_string($json) || $json === '') {
    fwrite(STDERR, "No se pudo serializar JSON de salida.\n");
    exit(1);
}
file_put_contents($outputPath, $json);

echo "OK: {$outputPath}\n";
echo "Entradas: " . count($entries) . "\n";

function buildShortDefinition(string $definition): string
{
    $text = trim($definition);
    if ($text === '') {
        return '';
    }

    $text = preg_replace('/\s+/u', ' ', $text);
    $text = is_string($text) ? $text : '';
    if ($text === '') {
        return '';
    }

    $parts = array_map('trim', explode(';', $text));
    if (!empty($parts)) {
        $chosen = '';
        foreach ($parts as $idx => $part) {
            $part = trim((string) $part);
            if ($part === '') {
                continue;
            }
            if ($idx === 0 && preg_match('/^[[:^ascii:]]+[ ]+[a-záéíóúüñ]+$/iu', $part)) {
                continue;
            }
            $norm = normalizeKey($part);
            if ($norm === '') {
                continue;
            }
            if (preg_match('/^(de g|de h|raiz|raíz|comp|comparar|derivado|derivado de)/i', $norm)) {
                continue;
            }
            $chosen = $part;
            break;
        }
        if ($chosen !== '') {
            $text = $chosen;
        }
    }

    $markers = [' :-', ':-', '. Comp.', '. Véase', '. Vea', ' Comp.'];
    foreach ($markers as $marker) {
        $pos = mb_stripos($text, $marker, 0, 'UTF-8');
        if ($pos !== false) {
            $text = trim((string) mb_substr($text, 0, (int) $pos, 'UTF-8'));
        }
    }

    $text = trim($text, " \t\n\r\0\x0B:;.");
    if ($text === '') {
        return '';
    }
    if (mb_strlen($text, 'UTF-8') > 240) {
        $text = trim((string) mb_substr($text, 0, 240, 'UTF-8')) . '...';
    }
    return $text;
}

function extractUsageTerms(string $definition): array
{
    $text = trim($definition);
    if ($text === '') {
        return [];
    }

    $tail = '';
    $pos = mb_stripos($text, ':-', 0, 'UTF-8');
    if ($pos !== false) {
        $tail = trim((string) mb_substr($text, (int) $pos + 2, null, 'UTF-8'));
    } else {
        $parts = explode(';', $text);
        if (!empty($parts)) {
            $tail = trim((string) end($parts));
        }
    }
    if ($tail === '') {
        return [];
    }

    $cutMarkers = ['. Comp.', '. Véase', '. Vea', ' Comp.'];
    foreach ($cutMarkers as $marker) {
        $markerPos = mb_stripos($tail, $marker, 0, 'UTF-8');
        if ($markerPos !== false) {
            $tail = trim((string) mb_substr($tail, 0, (int) $markerPos, 'UTF-8'));
        }
    }

    $tail = preg_replace('/\([^)]*\)/u', '', $tail);
    $tail = is_string($tail) ? $tail : '';
    if ($tail === '') {
        return [];
    }

    $terms = [];
    $parts = preg_split('/[,;\/|]+/u', $tail);
    if (!is_array($parts)) {
        return [];
    }
    foreach ($parts as $piece) {
        $piece = mb_strtolower(trim((string) $piece), 'UTF-8');
        $piece = trim($piece, " \t\n\r\0\x0B.-:+");
        $piece = preg_replace('/\s+/u', ' ', $piece);
        $piece = is_string($piece) ? $piece : '';
        if ($piece === '') {
            continue;
        }
        if (mb_strlen($piece, 'UTF-8') < 3 || mb_strlen($piece, 'UTF-8') > 50) {
            continue;
        }
        pushUnique($terms, $piece);
        if (count($terms) >= 10) {
            break;
        }
    }
    return $terms;
}

function buildTermVariants(string $term): array
{
    $term = mb_strtolower(trim($term), 'UTF-8');
    return $term === '' ? [] : [$term];
}

function scoreTerm(string $variant, array $usageTerms): int
{
    $score = 0;
    $len = mb_strlen($variant, 'UTF-8');
    if ($len >= 4 && $len <= 14) {
        $score += 20;
    } elseif ($len >= 3) {
        $score += 8;
    }
    if (strpos($variant, ' ') === false) {
        $score += 10;
    }
    if (!empty($usageTerms) && mb_strtolower($variant, 'UTF-8') === mb_strtolower((string) $usageTerms[0], 'UTF-8')) {
        $score += 15;
    }
    return $score;
}

function scoreDefinitionQuality(string $definition): int
{
    $text = trim($definition);
    if ($text === '') {
        return -20;
    }
    $score = 0;
    $len = mb_strlen($text, 'UTF-8');
    if ($len >= 20 && $len <= 220) {
        $score += 12;
    } elseif ($len >= 10) {
        $score += 6;
    }

    $norm = normalizeKey($text);
    if ($norm !== '' && preg_match('/^(de g|de h|raiz|raíz|comp|comparar|derivado|derivada)/i', $norm)) {
        $score -= 18;
    }
    if (preg_match('/\b(fe|confianza|gracia|justicia|espiritu|promesa|salvacion|perdon|amor|reino|santidad|evangelio|fiel|misericordia)\b/i', $norm)) {
        $score += 10;
    }
    if (strpos($text, 'i.e.') !== false || strpos($text, 'es decir') !== false) {
        $score += 3;
    }
    return $score;
}

function normalizeKey(string $value): string
{
    $text = mb_strtolower(trim($value), 'UTF-8');
    $text = strtr($text, [
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'ü' => 'u',
        'ñ' => 'n',
    ]);
    $text = preg_replace('/[^a-z0-9 ]/u', '', $text);
    $text = is_string($text) ? $text : '';
    $text = preg_replace('/\s+/u', ' ', $text);
    $text = is_string($text) ? $text : '';
    return trim($text);
}

function normalizeText(string $value): string
{
    $text = trim($value);
    if ($text === '') {
        return '';
    }
    $text = preg_replace('/\s+/u', ' ', $text);
    return is_string($text) ? trim($text) : '';
}

function pushUnique(array &$target, string $value): void
{
    $value = trim($value);
    if ($value === '' || in_array($value, $target, true)) {
        return;
    }
    $target[] = $value;
}

function buildStopWords(): array
{
    $words = [
        'de', 'la', 'el', 'los', 'las', 'y', 'o', 'u', 'a', 'al', 'del', 'en', 'por', 'para', 'con', 'sin',
        'que', 'como', 'mas', 'pero', 'si', 'no', 'se', 'su', 'sus', 'un', 'una', 'unos', 'unas',
        'x', 'xx', 'etc', 'especialmente', 'figurativamente', 'literalmente', 'propiamente',
    ];
    $map = [];
    foreach ($words as $word) {
        $key = normalizeKey($word);
        if ($key !== '') {
            $map[$key] = true;
        }
    }
    return $map;
}
