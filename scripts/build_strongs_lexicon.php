<?php

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Este script se ejecuta solo por CLI.\n");
    exit(1);
}

$basePath = dirname(__DIR__);
$defaultOutput = $basePath . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'strong.sqlite';
$defaultHebrew = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'strong' . DIRECTORY_SEPARATOR . 'sources'
    . DIRECTORY_SEPARATOR . 'openscriptures-strongs' . DIRECTORY_SEPARATOR . 'hebrew' . DIRECTORY_SEPARATOR . 'strongs-hebrew-dictionary.js';
$defaultGreek = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'strong' . DIRECTORY_SEPARATOR . 'sources'
    . DIRECTORY_SEPARATOR . 'openscriptures-strongs' . DIRECTORY_SEPARATOR . 'greek' . DIRECTORY_SEPARATOR . 'strongs-greek-dictionary.js';
$defaultSpanish = $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'strong' . DIRECTORY_SEPARATOR . 'sources'
    . DIRECTORY_SEPARATOR . 'spanish' . DIRECTORY_SEPARATOR . 'Diccionario-Strong-en-Espanol.bok.mybible';

$opts = getopt('', ['output::', 'hebrew::', 'greek::', 'spanish::']);
$output = isset($opts['output']) ? trim((string) $opts['output']) : $defaultOutput;
$hebrewFile = isset($opts['hebrew']) ? trim((string) $opts['hebrew']) : $defaultHebrew;
$greekFile = isset($opts['greek']) ? trim((string) $opts['greek']) : $defaultGreek;
$spanishFile = isset($opts['spanish']) ? trim((string) $opts['spanish']) : $defaultSpanish;

if ($output === '') {
    $output = $defaultOutput;
}

if (!is_file($hebrewFile)) {
    fwrite(STDERR, "No se encontró el archivo hebreo: {$hebrewFile}\n");
    exit(1);
}
if (!is_file($greekFile)) {
    fwrite(STDERR, "No se encontró el archivo griego: {$greekFile}\n");
    exit(1);
}
$spanishAvailable = is_file($spanishFile);

$outputDir = dirname($output);
if (!is_dir($outputDir)) {
    if (!mkdir($outputDir, 0777, true) && !is_dir($outputDir)) {
        fwrite(STDERR, "No se pudo crear directorio destino: {$outputDir}\n");
        exit(1);
    }
}

$hebrew = loadDictionaryFromJs($hebrewFile);
$greek = loadDictionaryFromJs($greekFile);
$spanishRows = $spanishAvailable ? loadSpanishMyBibleRows($spanishFile) : [];

if (is_file($output)) {
    unlink($output);
}

$pdo = new PDO('sqlite:' . $output);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec('PRAGMA journal_mode = WAL;');
$pdo->exec('PRAGMA synchronous = NORMAL;');

$pdo->exec(
    'CREATE TABLE strong_entries (
        code TEXT PRIMARY KEY,
        lang TEXT NOT NULL,
        number INTEGER NOT NULL,
        lemma TEXT,
        translit TEXT,
        pron TEXT,
        derivation TEXT,
        strongs_def TEXT,
        kjv_def TEXT,
        source TEXT
    )'
);

$pdo->exec(
    'CREATE TABLE details (
        source TEXT,
        generated_at TEXT,
        hebrew_entries INTEGER,
        greek_entries INTEGER,
        total_entries INTEGER
    )'
);

$insert = $pdo->prepare(
    'INSERT INTO strong_entries (
        code, lang, number, lemma, translit, pron, derivation, strongs_def, kjv_def, source
    ) VALUES (
        :code, :lang, :number, :lemma, :translit, :pron, :derivation, :strongs_def, :kjv_def, :source
    )'
);

$total = 0;
$spanishCount = 0;
$importedCodes = [];
if (!empty($spanishRows)) {
    $spanishCount = importSpanishRows($insert, $spanishRows, $importedCodes, 'mybible-strong-es');
    $total += $spanishCount;
}
$hebrewCount = importEntries($insert, $hebrew, 'openscriptures-hebrew', $importedCodes);
$total += $hebrewCount;
$greekCount = importEntries($insert, $greek, 'openscriptures-greek', $importedCodes);
$total += $greekCount;

$pdo->exec('CREATE INDEX idx_strong_lang_number ON strong_entries (lang, number)');

$meta = $pdo->prepare(
    'INSERT INTO details (source, generated_at, hebrew_entries, greek_entries, total_entries)
     VALUES (:source, :generated_at, :hebrew_entries, :greek_entries, :total_entries)'
);
$meta->execute([
    ':source' => $spanishAvailable
        ? 'Strong ES MyBible + fallback Open Scriptures (Hebrew + Greek)'
        : 'Open Scriptures JSON dictionaries (Hebrew + Greek)',
    ':generated_at' => date('Y-m-d H:i:s'),
    ':hebrew_entries' => $hebrewCount,
    ':greek_entries' => $greekCount,
    ':total_entries' => $total,
]);

echo "OK: {$output}\n";
echo "Espanol: {$spanishCount}\n";
echo "Hebreo: {$hebrewCount}\n";
echo "Griego: {$greekCount}\n";
echo "Total: {$total}\n";

function loadDictionaryFromJs(string $path): array
{
    $raw = file_get_contents($path);
    if ($raw === false || $raw === '') {
        return [];
    }

    if (!preg_match('/=\s*(\{.*\})\s*;\s*module\.exports/s', $raw, $m)) {
        throw new RuntimeException('No se pudo extraer JSON desde: ' . $path);
    }

    $decoded = json_decode($m[1], true);
    if (!is_array($decoded)) {
        throw new RuntimeException('JSON inválido en: ' . $path);
    }
    return $decoded;
}

function importEntries(PDOStatement $insert, array $dictionary, string $source, array &$importedCodes): int
{
    $count = 0;
    foreach ($dictionary as $rawCode => $row) {
        if (!is_array($row)) {
            continue;
        }
        $code = normalizeStrongCode((string) $rawCode);
        if ($code === '') {
            continue;
        }
        if (isset($importedCodes[$code])) {
            continue;
        }

        $lang = substr($code, 0, 1);
        $number = (int) substr($code, 1);
        $translit = (string) ($row['translit'] ?? ($row['xlit'] ?? ''));

        $insert->execute([
            ':code' => $code,
            ':lang' => $lang,
            ':number' => $number,
            ':lemma' => cleanText((string) ($row['lemma'] ?? '')),
            ':translit' => cleanText($translit),
            ':pron' => cleanText((string) ($row['pron'] ?? '')),
            ':derivation' => cleanText((string) ($row['derivation'] ?? '')),
            ':strongs_def' => cleanText((string) ($row['strongs_def'] ?? '')),
            ':kjv_def' => cleanText((string) ($row['kjv_def'] ?? '')),
            ':source' => $source,
        ]);
        $importedCodes[$code] = true;
        $count++;
    }

    return $count;
}

function loadSpanishMyBibleRows(string $path): array
{
    $pdo = new PDO('sqlite:' . $path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT id, title, content FROM journal ORDER BY rowid');
    return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
}

function importSpanishRows(PDOStatement $insert, array $rows, array &$importedCodes, string $source): int
{
    $count = 0;
    foreach ($rows as $row) {
        $code = normalizeStrongCode((string) ($row['id'] ?? ''));
        if ($code === '' || isset($importedCodes[$code])) {
            continue;
        }

        $plain = cleanText(strip_tags((string) ($row['content'] ?? '')));
        $plain = normalizeSpanishArtifacts($plain);
        if ($plain === '') {
            continue;
        }

        $parsed = parseSpanishStrongContent($plain);
        $lang = substr($code, 0, 1);
        $number = (int) substr($code, 1);

        $insert->execute([
            ':code' => $code,
            ':lang' => $lang,
            ':number' => $number,
            ':lemma' => $parsed['lemma'],
            ':translit' => $parsed['translit'],
            ':pron' => '',
            ':derivation' => '',
            ':strongs_def' => $plain,
            ':kjv_def' => '',
            ':source' => $source,
        ]);
        $importedCodes[$code] = true;
        $count++;
    }

    return $count;
}

function parseSpanishStrongContent(string $plain): array
{
    $lemma = '';
    $translit = '';

    if (preg_match('/^\s*([^\s;]+)\s+([^;]{1,80});/u', $plain, $m)) {
        $lemma = cleanText((string) $m[1]);
        $translit = cleanText((string) $m[2]);
    }

    return [
        'lemma' => $lemma,
        'translit' => $translit,
    ];
}

function normalizeStrongCode(string $value): string
{
    $raw = strtoupper(trim($value));
    if (!preg_match('/^([GH])\s*0*([0-9]{1,5})$/', $raw, $m)) {
        return '';
    }

    $number = (int) $m[2];
    if ($number < 1) {
        return '';
    }

    return $m[1] . $number;
}

function cleanText(string $value): string
{
    $text = trim($value);
    if ($text === '') {
        return '';
    }
    if (!mb_check_encoding($text, 'UTF-8')) {
        $latin = @iconv('Windows-1252', 'UTF-8//IGNORE', $text);
        if (is_string($latin) && $latin !== '') {
            $text = $latin;
        } else {
            $latin = @iconv('ISO-8859-1', 'UTF-8//IGNORE', $text);
            if (is_string($latin) && $latin !== '') {
                $text = $latin;
            }
        }
    }
    $collapsed = preg_replace('/\s+/u', ' ', $text);
    if ($collapsed === null) {
        $collapsed = preg_replace('/\s+/', ' ', $text);
    }
    return trim((string) $collapsed);
}

function normalizeSpanishArtifacts(string $value): string
{
    if ($value === '' || strpos($value, '�') === false) {
        return $value;
    }

    $map = [
        'conclusi�n' => 'conclusión',
        'part�cula' => 'partícula',
        'part�culas' => 'partículas',
        'm�s' => 'más',
        'quiz�' => 'quizá',
        'conexi�n' => 'conexión',
        'v�ase' => 'véase',
        'tambi�n' => 'también',
        'as�' => 'así',
        'esp�ritu' => 'espíritu',
        'uni�n' => 'unión',
        'af�n' => 'afín',
        't�rmino' => 'término',
        't�rminos' => 'términos',
        'jud�o' => 'judío',
        'pa�s' => 'país',
        'prop�sito' => 'propósito',
        'car�cter' => 'carácter',
        '�ltima' => 'última',
        'd�a' => 'día',
        'composici�n' => 'composición',
        'cong�nere' => 'congénere',
        'cog�nere' => 'cogénere',
        'encl�tica' => 'enclítica',
        'c�rculo' => 'círculo',
        'extensi�n' => 'extensión',
        'negaci�n' => 'negación',
        'respiraci�n' => 'respiración',
        'opini�n' => 'opinión',
        'a�o' => 'año',
        'todav�a' => 'todavía',
        'all�' => 'allá',
        'ma�ana' => 'mañana',
        'petici�n' => 'petición',
        'or�culo' => 'oráculo',
        's�' => 'sí',
        'despu�s' => 'después',
        'satan�s' => 'satanás',
        'a�n' => 'aún',
        'alg�n' => 'algún',
        'ap�stol' => 'apóstol',
        'deber�a' => 'debería',
        'podr�a' => 'podría',
        'distinci�n' => 'distinción',
        'acompa�ada' => 'acompañada',
        'm�sica' => 'música',
        'sal�n' => 'salón',
        'vac�a' => 'vacía',
        'ocasi�n' => 'ocasión',
        'demon�acamente' => 'demoníacamente',
        'da�ino' => 'dañino',
        'separaci�n' => 'separación',
        'p�rdida' => 'pérdida',
        'tard�a' => 'tardía',
        'r�pidamente' => 'rápidamente',
        'encontr�ndose' => 'encontrándose',
        'corrosi�n' => 'corrosión',
        'da�o' => 'daño',
        'tentaci�n' => 'tentación',
        'prisi�n' => 'prisión',
        'posici�n' => 'posición',
        'aseveraci�n' => 'aseveración',
        'reducci�n' => 'reducción',
        'emoci�n' => 'emoción',
        'sim�n' => 'simón',
        'sic�moro' => 'sicómoro',
        'indisposici�n' => 'indisposición',
        'sin�nimos' => 'sinónimos',
        'dem�s' => 'demás',
        'pu�o' => 'puño',
        'privaci�n' => 'privación',
        'condici�n' => 'condición',
        'santurroner�a' => 'santurronería',
        'pac�fico' => 'pacífico',
        'trav�s' => 'través',
        'raz�n' => 'razón',
        'per�odo' => 'período',
        'mesi�nico' => 'mesiánico',
        '�ngel' => 'ángel',
        'se�or' => 'señor',
        'qu�' => 'qué',
        'di�s' => 'dios',
        'd�s' => 'dios',
        'an�s' => 'anás',
        '-sa�l' => '-saúl',
        'sa�l' => 'saúl',
        '-jerusal�n' => '-jerusalén',
    ];
    $text = (string) $value;
    foreach ($map as $from => $to) {
        $text = replaceWithCaseVariants($text, $from, $to);
    }

    $patterns = [
        '/ci�n/u' => 'ción',
        '/si�n/u' => 'sión',
        '/i�n/u' => 'ión',
        '/aci�n/u' => 'ación',
    ];
    foreach ($patterns as $pattern => $replacement) {
        $result = preg_replace($pattern, $replacement, $text);
        if ($result !== null) {
            $text = $result;
        }
    }

    return $text;
}

function replaceWithCaseVariants(string $text, string $from, string $to): string
{
    $text = str_replace($from, $to, $text);

    $fromUc = mbUcfirst($from);
    $toUc = mbUcfirst($to);
    if ($fromUc !== $from) {
        $text = str_replace($fromUc, $toUc, $text);
    }

    $fromUpper = mb_strtoupper($from, 'UTF-8');
    $toUpper = mb_strtoupper($to, 'UTF-8');
    if ($fromUpper !== $from && $fromUpper !== $fromUc) {
        $text = str_replace($fromUpper, $toUpper, $text);
    }

    return $text;
}

function mbUcfirst(string $text): string
{
    if ($text === '') {
        return '';
    }
    $first = mb_substr($text, 0, 1, 'UTF-8');
    $rest = mb_substr($text, 1, null, 'UTF-8');
    return mb_strtoupper($first, 'UTF-8') . $rest;
}
