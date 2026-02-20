<?php

namespace App\Services;

use App\Database\ConnectionFactory;
use PDO;

class StrongLexiconService
{
    private $configuredPath;
    private $fallbackPath;
    private $resolvedPath;
    private $pdo;

    public function __construct($configuredPath, $fallbackPath = null)
    {
        $this->configuredPath = trim((string) $configuredPath);
        $this->fallbackPath = trim((string) $fallbackPath);
        $this->resolvedPath = null;
        $this->pdo = null;
    }

    public function available()
    {
        return $this->lexicon() instanceof PDO;
    }

    public function lookupMany(array $codes)
    {
        $normalized = [];
        foreach ($codes as $code) {
            $clean = $this->normalizeCode((string) $code);
            if ($clean !== '') {
                $normalized[$clean] = true;
            }
        }
        $keys = array_keys($normalized);
        if (empty($keys)) {
            return [];
        }

        $pdo = $this->lexicon();
        if (!$pdo instanceof PDO) {
            return [];
        }

        $placeholders = [];
        $params = [];
        foreach ($keys as $idx => $code) {
            $key = ':c' . $idx;
            $placeholders[] = $key;
            $params[$key] = $code;
        }

        $sql = 'SELECT code, lang, number, lemma, translit, pron, derivation, strongs_def, kjv_def, source
                FROM strong_entries
                WHERE code IN (' . implode(', ', $placeholders) . ')';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $rowsByCode = [];
        foreach ($stmt->fetchAll() as $row) {
            $code = strtoupper(trim((string) ($row['code'] ?? '')));
            if ($code === '') {
                continue;
            }
            $rowsByCode[$code] = [
                'code' => $code,
                'lang' => strtoupper(trim((string) ($row['lang'] ?? ''))),
                'number' => (int) ($row['number'] ?? 0),
                'lemma' => $this->normalizeText((string) ($row['lemma'] ?? '')),
                'translit' => $this->normalizeText((string) ($row['translit'] ?? '')),
                'pron' => $this->normalizeText((string) ($row['pron'] ?? '')),
                'derivation' => $this->normalizeText((string) ($row['derivation'] ?? '')),
                'strongs_def' => $this->normalizeText((string) ($row['strongs_def'] ?? ''), true),
                'kjv_def' => $this->normalizeText((string) ($row['kjv_def'] ?? ''), true),
                'source' => trim((string) ($row['source'] ?? '')),
            ];
        }

        $ordered = [];
        foreach ($keys as $code) {
            if (isset($rowsByCode[$code])) {
                $ordered[] = $rowsByCode[$code];
            }
        }
        return $ordered;
    }

    public function normalizeCode($value)
    {
        $raw = strtoupper(trim((string) $value));
        if ($raw === '') {
            return '';
        }

        if (!preg_match('/^([GH])\s*0*([0-9]{1,5})$/', $raw, $m)) {
            return '';
        }

        $num = (int) $m[2];
        if ($num < 1) {
            return '';
        }

        return $m[1] . $num;
    }

    private function normalizeText($value, $repairSpanish = false)
    {
        $text = trim((string) $value);
        if ($text === '') {
            return '';
        }

        if ($repairSpanish && strpos($text, '�') !== false) {
            $text = $this->repairSpanishArtifacts($text);
        }

        $collapsed = preg_replace('/\s+/u', ' ', $text);
        if ($collapsed === null) {
            $collapsed = preg_replace('/\s+/', ' ', $text);
        }
        return trim((string) $collapsed);
    }

    private function repairSpanishArtifacts($value)
    {
        $text = (string) $value;
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
        foreach ($map as $from => $to) {
            $text = $this->replaceWithCaseVariants($text, $from, $to);
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

    private function replaceWithCaseVariants($text, $from, $to)
    {
        $text = str_replace($from, $to, (string) $text);

        $fromUc = $this->mbUcfirst($from);
        $toUc = $this->mbUcfirst($to);
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

    private function mbUcfirst($text)
    {
        $text = (string) $text;
        if ($text === '') {
            return '';
        }
        $first = mb_substr($text, 0, 1, 'UTF-8');
        $rest = mb_substr($text, 1, null, 'UTF-8');
        return mb_strtoupper($first, 'UTF-8') . $rest;
    }

    private function lexicon()
    {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }

        $paths = [];
        if ($this->configuredPath !== '') {
            $paths[] = $this->configuredPath;
        }
        if ($this->fallbackPath !== '') {
            $paths[] = $this->fallbackPath;
        }

        $seen = [];
        foreach ($paths as $path) {
            if ($path === '' || isset($seen[$path])) {
                continue;
            }
            $seen[$path] = true;
            if (!is_file($path)) {
                continue;
            }
            try {
                $pdo = ConnectionFactory::sqlite($path);
                $probe = $pdo->query("SELECT name FROM sqlite_master WHERE type = 'table' AND name = 'strong_entries' LIMIT 1");
                $ok = $probe ? $probe->fetch() : false;
                if ($ok) {
                    $this->pdo = $pdo;
                    $this->resolvedPath = $path;
                    return $this->pdo;
                }
            } catch (\Throwable $e) {
                continue;
            }
        }

        return null;
    }
}
