<?php

namespace App\Services;

class ModuleCatalogService
{
    private $userDataRepository;
    private $sanitizer;
    private $catalogPath;
    private $packagesDir;
    private $storageBaseDir;
    private $catalogCache;
    private $modulePayloadCache;

    public function __construct(
        UserDataRepository $userDataRepository,
        HtmlSanitizer $sanitizer,
        $catalogPath = '',
        $packagesDir = '',
        $storageBaseDir = ''
    ) {
        $basePath = (string) config('app.base_path', dirname(__DIR__, 2));
        $this->userDataRepository = $userDataRepository;
        $this->sanitizer = $sanitizer;
        $this->catalogPath = trim((string) $catalogPath) !== ''
            ? trim((string) $catalogPath)
            : $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'catalog.json';
        $this->packagesDir = trim((string) $packagesDir) !== ''
            ? trim((string) $packagesDir)
            : $basePath . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'packages';
        $this->storageBaseDir = trim((string) $storageBaseDir) !== ''
            ? trim((string) $storageBaseDir)
            : $basePath . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'modules';
        $this->catalogCache = null;
        $this->modulePayloadCache = [];
    }

    public function listModules()
    {
        $catalog = $this->loadCatalog();
        $installedRows = $this->userDataRepository->listContentModules();
        $installedMap = [];
        foreach ($installedRows as $row) {
            $key = trim((string) ($row['module_key'] ?? ''));
            if ($key !== '') {
                $installedMap[$key] = $row;
            }
        }

        $rows = [];
        foreach ($catalog as $entry) {
            $key = trim((string) ($entry['key'] ?? ''));
            if ($key === '') {
                continue;
            }
            $rows[] = $this->buildListRow($entry, isset($installedMap[$key]) ? $installedMap[$key] : null);
        }

        usort($rows, static function (array $a, array $b): int {
            $typeCmp = strcmp((string) ($a['type'] ?? ''), (string) ($b['type'] ?? ''));
            if ($typeCmp !== 0) {
                return $typeCmp;
            }
            return strcasecmp((string) ($a['name'] ?? ''), (string) ($b['name'] ?? ''));
        });

        return $rows;
    }

    public function installModule($moduleKey)
    {
        $entry = $this->findCatalogEntry($moduleKey);
        if (!$entry) {
            throw new \InvalidArgumentException('Módulo no disponible en el catálogo.');
        }

        $packageFile = basename((string) ($entry['package'] ?? ''));
        if ($packageFile === '') {
            throw new \RuntimeException('El módulo no tiene paquete descargable.');
        }
        $packagePath = $this->packagesDir . DIRECTORY_SEPARATOR . $packageFile;
        if (!is_file($packagePath)) {
            throw new \RuntimeException('No se encontró el paquete del módulo.');
        }

        $payload = $this->decodeJsonFile($packagePath);
        if (!is_array($payload)) {
            throw new \RuntimeException('Paquete de módulo inválido.');
        }

        $moduleMeta = isset($payload['module']) && is_array($payload['module']) ? $payload['module'] : [];
        $key = $this->sanitizeModuleKey((string) ($moduleMeta['key'] ?? ($entry['key'] ?? '')));
        if ($key === '') {
            throw new \RuntimeException('El paquete no define una clave válida.');
        }

        $type = $this->normalizeType((string) ($moduleMeta['type'] ?? ($entry['type'] ?? '')));
        if ($type === '') {
            throw new \RuntimeException('Tipo de módulo inválido.');
        }

        $name = trim((string) ($moduleMeta['name'] ?? ($entry['name'] ?? 'Módulo')));
        $version = trim((string) ($moduleMeta['version'] ?? ($entry['version'] ?? '')));

        $targetDir = $this->storageBaseDir . DIRECTORY_SEPARATOR . $type;
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $targetPath = $targetDir . DIRECTORY_SEPARATOR . $key . '.json';
        $json = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        if (!is_string($json) || $json === '') {
            throw new \RuntimeException('No se pudo serializar el paquete.');
        }
        file_put_contents($targetPath, $json);

        $saved = $this->userDataRepository->saveContentModule(
            $key,
            $type,
            $name,
            $version,
            $targetPath,
            1
        );
        $this->modulePayloadCache[$targetPath] = $payload;

        return $this->buildListRow($entry, $saved);
    }

    public function setModuleEnabled($moduleKey, $enabled)
    {
        $moduleKey = $this->sanitizeModuleKey((string) $moduleKey);
        if ($moduleKey === '') {
            throw new \InvalidArgumentException('Clave de módulo inválida.');
        }

        $updated = $this->userDataRepository->setContentModuleEnabled($moduleKey, $enabled ? 1 : 0);
        if (!$updated) {
            throw new \RuntimeException('No se encontró el módulo instalado.');
        }

        $catalogEntry = $this->findCatalogEntry($moduleKey);
        $saved = $this->userDataRepository->getContentModuleByKey($moduleKey);
        return $this->buildListRow($catalogEntry ?: ['key' => $moduleKey], $saved);
    }

    public function getCommentaryForRange($book, $chapter, $verseStart, $verseEnd)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verseStart = (int) $verseStart;
        $verseEnd = (int) $verseEnd;
        if ($book < 1 || $chapter < 1 || $verseStart < 1 || $verseEnd < 1) {
            return ['book' => [], 'chapter' => [], 'verse' => []];
        }

        $minVerse = min($verseStart, $verseEnd);
        $maxVerse = max($verseStart, $verseEnd);
        $sources = $this->getContentSourcesByType('commentary');
        if (empty($sources)) {
            return ['book' => [], 'chapter' => [], 'verse' => []];
        }

        $bookRows = [];
        $chapterRows = [];
        $verseRows = [];

        foreach ($sources as $source) {
            $moduleName = trim((string) ($source['name'] ?? 'Recurso'));
            $sourceLabel = !empty($source['built_in']) ? 'Integrado: ' . $moduleName : 'Módulo: ' . $moduleName;
            $payload = isset($source['payload']) && is_array($source['payload']) ? $source['payload'] : [];
            $entries = isset($payload['entries']) && is_array($payload['entries']) ? $payload['entries'] : [];

            foreach ($entries as $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                $scope = strtolower(trim((string) ($entry['scope'] ?? 'verse')));
                $entryBook = (int) ($entry['book'] ?? 0);
                if ($entryBook !== $book) {
                    continue;
                }

                $title = trim((string) ($entry['title'] ?? ''));
                $html = $this->sanitizeCommentHtml((string) ($entry['html'] ?? ''));
                if ($html === '') {
                    continue;
                }

                if ($scope === 'book') {
                    $bookRows[] = [
                        'html' => $html,
                        'source' => 'module',
                        'source_label' => $sourceLabel,
                        'title' => $title,
                    ];
                    continue;
                }

                if ($scope === 'chapter') {
                    $entryChapter = (int) ($entry['chapter'] ?? 0);
                    if ($entryChapter !== $chapter) {
                        continue;
                    }
                    $chapterRows[] = [
                        'html' => $html,
                        'source' => 'module',
                        'source_label' => $sourceLabel,
                        'title' => $title,
                    ];
                    continue;
                }

                $chapterBegin = (int) ($entry['chapter_begin'] ?? ($entry['chapter'] ?? 0));
                $chapterEnd = (int) ($entry['chapter_end'] ?? ($entry['chapter'] ?? 0));
                $verseBegin = (int) ($entry['verse_begin'] ?? ($entry['verse'] ?? 0));
                $verseEndEntry = (int) ($entry['verse_end'] ?? ($entry['verse'] ?? 0));
                if ($chapterBegin < 1) {
                    $chapterBegin = $chapter;
                }
                if ($chapterEnd < 1) {
                    $chapterEnd = $chapterBegin;
                }
                if ($verseBegin < 1) {
                    $verseBegin = 1;
                }
                if ($verseEndEntry < 1) {
                    $verseEndEntry = $verseBegin;
                }
                if ($chapterBegin > $chapterEnd) {
                    $tmp = $chapterBegin;
                    $chapterBegin = $chapterEnd;
                    $chapterEnd = $tmp;
                }
                if ($verseBegin > $verseEndEntry) {
                    $tmp = $verseBegin;
                    $verseBegin = $verseEndEntry;
                    $verseEndEntry = $tmp;
                }
                if ($chapter < $chapterBegin || $chapter > $chapterEnd) {
                    continue;
                }
                if ($chapterBegin === $chapterEnd && ($verseEndEntry < $minVerse || $verseBegin > $maxVerse)) {
                    continue;
                }

                $verseRows[] = [
                    'chapter_begin' => $chapterBegin,
                    'verse_begin' => $verseBegin,
                    'chapter_end' => $chapterEnd,
                    'verse_end' => $verseEndEntry,
                    'html' => $html,
                    'source' => 'module',
                    'source_label' => $sourceLabel,
                    'title' => $title,
                ];
            }
        }

        return [
            'book' => $bookRows,
            'chapter' => $chapterRows,
            'verse' => $verseRows,
        ];
    }

    public function lookupDictionary($query, $limit = 10)
    {
        $needle = $this->normalizeToken($query);
        $limit = max(1, min(40, (int) $limit));
        if ($needle === '') {
            return [];
        }

        $sources = $this->getContentSourcesByType('dictionary');
        if (empty($sources)) {
            return [];
        }

        $matches = [];
        foreach ($sources as $source) {
            $moduleName = trim((string) ($source['name'] ?? 'Diccionario'));
            $payload = isset($source['payload']) && is_array($source['payload']) ? $source['payload'] : [];
            $entries = isset($payload['entries']) && is_array($payload['entries']) ? $payload['entries'] : [];
            foreach ($entries as $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                $term = trim((string) ($entry['term'] ?? ''));
                if ($term === '') {
                    continue;
                }
                $termNorm = $this->normalizeToken($term);
                if ($termNorm === '') {
                    continue;
                }
                $aliases = isset($entry['aliases']) && is_array($entry['aliases']) ? $entry['aliases'] : [];
                $definition = trim((string) ($entry['definition'] ?? ''));
                $usage = trim((string) ($entry['usage'] ?? ''));
                $references = isset($entry['references']) && is_array($entry['references']) ? $entry['references'] : [];
                $wordType = trim((string) ($entry['word_type'] ?? ($entry['part_of_speech'] ?? ($entry['pos'] ?? ''))));
                $wordTypeNote = trim((string) ($entry['word_type_note'] ?? ($entry['grammar_note'] ?? '')));

                $score = 0;
                if ($termNorm === $needle) {
                    $score = 120;
                } elseif (strpos($termNorm, $needle) !== false || strpos($needle, $termNorm) !== false) {
                    $score = 80;
                }
                foreach ($aliases as $alias) {
                    $aliasNorm = $this->normalizeToken((string) $alias);
                    if ($aliasNorm === '') {
                        continue;
                    }
                    if ($aliasNorm === $needle) {
                        $score = max($score, 110);
                        continue;
                    }
                    if (strpos($aliasNorm, $needle) !== false || strpos($needle, $aliasNorm) !== false) {
                        $score = max($score, 70);
                    }
                }
                if ($score === 0) {
                    $definitionNorm = $this->normalizeToken($definition . ' ' . $usage);
                    if ($definitionNorm !== '' && strpos($definitionNorm, $needle) !== false) {
                        $score = 40;
                    }
                }
                if ($score < 1) {
                    continue;
                }

                $matches[] = [
                    'term' => $term,
                    'aliases' => array_values(array_filter(array_map('trim', $aliases))),
                    'definition' => $definition,
                    'usage' => $usage,
                    'references' => array_values(array_filter(array_map('trim', $references))),
                    'word_type' => $wordType,
                    'word_type_note' => $wordTypeNote,
                    'module_key' => (string) ($source['module_key'] ?? ''),
                    'module_name' => $moduleName,
                    'score' => $score,
                ];
            }
        }

        usort($matches, static function (array $a, array $b): int {
            $scoreA = (int) ($a['score'] ?? 0);
            $scoreB = (int) ($b['score'] ?? 0);
            if ($scoreA === $scoreB) {
                return strcasecmp((string) ($a['term'] ?? ''), (string) ($b['term'] ?? ''));
            }
            return $scoreB <=> $scoreA;
        });

        return array_slice($matches, 0, $limit);
    }

    public function lookupMaps($query = '', $book = 0, $chapter = 0, $verseStart = 0, $verseEnd = 0, $limit = 10)
    {
        $needle = $this->normalizeToken($query);
        $book = (int) $book;
        $chapter = (int) $chapter;
        $verseStart = max(1, (int) $verseStart);
        $verseEnd = max(1, (int) $verseEnd);
        if ($verseStart > $verseEnd) {
            $tmp = $verseStart;
            $verseStart = $verseEnd;
            $verseEnd = $tmp;
        }
        $limit = max(1, min(30, (int) $limit));
        $hasReference = $book > 0 && $chapter > 0;
        if ($needle === '' && !$hasReference) {
            return [];
        }

        $sources = $this->getContentSourcesByType('map');
        if (empty($sources)) {
            return [];
        }

        $matches = [];
        foreach ($sources as $source) {
            $moduleName = trim((string) ($source['name'] ?? 'Mapas'));
            $payload = isset($source['payload']) && is_array($source['payload']) ? $source['payload'] : [];
            $entries = isset($payload['entries']) && is_array($payload['entries']) ? $payload['entries'] : [];
            foreach ($entries as $entry) {
                if (!is_array($entry)) {
                    continue;
                }

                $title = trim((string) ($entry['title'] ?? ''));
                $summary = trim((string) ($entry['summary'] ?? ''));
                $places = $this->normalizeStringList(isset($entry['places']) ? $entry['places'] : []);
                $references = $this->normalizeStringList(isset($entry['references']) ? $entry['references'] : []);
                $tags = $this->normalizeStringList(isset($entry['tags']) ? $entry['tags'] : []);
                $coverage = $this->normalizeMapCoverage(isset($entry['coverage']) ? $entry['coverage'] : []);

                $score = 0;
                if ($needle !== '') {
                    $score += $this->scoreMapQueryMatch($needle, $title, $summary, $places, $references, $tags);
                }
                if ($hasReference) {
                    $score += $this->scoreMapCoverageMatch($coverage, $book, $chapter, $verseStart, $verseEnd);
                }
                if ($score < 1) {
                    continue;
                }

                $matches[] = [
                    'title' => $title !== '' ? $title : 'Mapa bíblico',
                    'summary' => $summary,
                    'places' => $places,
                    'references' => $references,
                    'tags' => $tags,
                    'period' => trim((string) ($entry['period'] ?? '')),
                    'source_name' => trim((string) ($entry['source_name'] ?? $moduleName)),
                    'source_url' => trim((string) ($entry['source_url'] ?? '')),
                    'map_url' => trim((string) ($entry['map_url'] ?? '')),
                    'image_url' => trim((string) ($entry['image_url'] ?? '')),
                    'license' => trim((string) ($entry['license'] ?? '')),
                    'module_key' => (string) ($source['module_key'] ?? ''),
                    'module_name' => $moduleName,
                    'score' => $score,
                ];
            }
        }

        usort($matches, static function (array $a, array $b): int {
            $scoreA = (int) ($a['score'] ?? 0);
            $scoreB = (int) ($b['score'] ?? 0);
            if ($scoreA === $scoreB) {
                return strcasecmp((string) ($a['title'] ?? ''), (string) ($b['title'] ?? ''));
            }
            return $scoreB <=> $scoreA;
        });

        $matches = array_slice($matches, 0, $limit);
        foreach ($matches as &$row) {
            unset($row['score']);
        }
        unset($row);

        return $matches;
    }

    private function getContentSourcesByType($type)
    {
        $type = $this->normalizeType((string) $type);
        if ($type === '') {
            return [];
        }

        $sources = [];
        $seen = [];

        if (is_dir($this->packagesDir)) {
            $paths = glob($this->packagesDir . DIRECTORY_SEPARATOR . '*.json');
            if (is_array($paths)) {
                sort($paths, SORT_NATURAL | SORT_FLAG_CASE);
                foreach ($paths as $path) {
                    $payload = $this->loadInstalledPayload((string) $path);
                    if (!is_array($payload) || empty($payload)) {
                        continue;
                    }
                    $moduleMeta = isset($payload['module']) && is_array($payload['module']) ? $payload['module'] : [];
                    $moduleType = $this->normalizeType((string) ($moduleMeta['type'] ?? ''));
                    if ($moduleType !== $type) {
                        continue;
                    }
                    $moduleKey = $this->sanitizeModuleKey((string) ($moduleMeta['key'] ?? pathinfo((string) $path, PATHINFO_FILENAME)));
                    if ($moduleKey === '' || isset($seen[$moduleKey])) {
                        continue;
                    }
                    $seen[$moduleKey] = true;
                    $sources[] = [
                        'module_key' => $moduleKey,
                        'type' => $moduleType,
                        'name' => trim((string) ($moduleMeta['name'] ?? $moduleKey)),
                        'file_path' => (string) $path,
                        'payload' => $payload,
                        'built_in' => true,
                    ];
                }
            }
        }

        $installed = $this->userDataRepository->getEnabledContentModulesByType($type);
        foreach ($installed as $module) {
            $moduleKey = $this->sanitizeModuleKey((string) ($module['module_key'] ?? ''));
            if ($moduleKey === '' || isset($seen[$moduleKey])) {
                continue;
            }
            $filePath = trim((string) ($module['file_path'] ?? ''));
            $payload = $this->loadInstalledPayload($filePath);
            if (!is_array($payload) || empty($payload)) {
                continue;
            }
            $seen[$moduleKey] = true;
            $sources[] = [
                'module_key' => $moduleKey,
                'type' => $type,
                'name' => trim((string) ($module['name'] ?? $moduleKey)),
                'file_path' => $filePath,
                'payload' => $payload,
                'built_in' => false,
            ];
        }

        return $sources;
    }

    private function loadCatalog()
    {
        if (is_array($this->catalogCache)) {
            return $this->catalogCache;
        }

        $rows = $this->decodeJsonFile($this->catalogPath);
        if (!is_array($rows)) {
            $this->catalogCache = [];
            return $this->catalogCache;
        }

        if (isset($rows['modules']) && is_array($rows['modules'])) {
            $rows = $rows['modules'];
        }

        $catalog = [];
        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }
            $key = $this->sanitizeModuleKey((string) ($row['key'] ?? ''));
            $type = $this->normalizeType((string) ($row['type'] ?? ''));
            if ($key === '' || $type === '') {
                continue;
            }
            $catalog[] = [
                'key' => $key,
                'type' => $type,
                'name' => trim((string) ($row['name'] ?? $key)),
                'description' => trim((string) ($row['description'] ?? '')),
                'version' => trim((string) ($row['version'] ?? '')),
                'package' => basename((string) ($row['package'] ?? '')),
            ];
        }

        $this->catalogCache = $catalog;
        return $catalog;
    }

    private function findCatalogEntry($moduleKey)
    {
        $moduleKey = $this->sanitizeModuleKey((string) $moduleKey);
        if ($moduleKey === '') {
            return null;
        }
        foreach ($this->loadCatalog() as $entry) {
            if ((string) ($entry['key'] ?? '') === $moduleKey) {
                return $entry;
            }
        }
        return null;
    }

    private function buildListRow(array $catalogEntry, $installedRow)
    {
        $installed = is_array($installedRow);
        $filePath = $installed ? trim((string) ($installedRow['file_path'] ?? '')) : '';
        $fileExists = $filePath !== '' && is_file($filePath);
        $installed = $installed && $fileExists;

        return [
            'key' => (string) ($catalogEntry['key'] ?? ($installedRow['module_key'] ?? '')),
            'type' => (string) ($catalogEntry['type'] ?? ($installedRow['type'] ?? 'commentary')),
            'name' => (string) ($catalogEntry['name'] ?? ($installedRow['name'] ?? 'Módulo')),
            'description' => (string) ($catalogEntry['description'] ?? ''),
            'version' => (string) ($catalogEntry['version'] ?? ($installedRow['version'] ?? '')),
            'installed' => $installed,
            'enabled' => $installed ? ((int) ($installedRow['enabled'] ?? 0) === 1) : false,
            'installed_at' => $installed ? (string) ($installedRow['installed_at'] ?? '') : '',
            'updated_at' => $installed ? (string) ($installedRow['updated_at'] ?? '') : '',
        ];
    }

    private function loadInstalledPayload($filePath)
    {
        $filePath = trim((string) $filePath);
        if ($filePath === '' || !is_file($filePath)) {
            return [];
        }
        if (isset($this->modulePayloadCache[$filePath])) {
            return $this->modulePayloadCache[$filePath];
        }
        $payload = $this->decodeJsonFile($filePath);
        if (!is_array($payload)) {
            $payload = [];
        }
        $this->modulePayloadCache[$filePath] = $payload;
        return $payload;
    }

    private function sanitizeCommentHtml($html)
    {
        $sanitized = $this->sanitizer->sanitize((string) $html);
        $sanitized = trim((string) $sanitized);
        if ($sanitized === '') {
            return '';
        }
        return $sanitized;
    }

    private function decodeJsonFile($path)
    {
        $path = trim((string) $path);
        if ($path === '' || !is_file($path)) {
            return null;
        }
        $raw = file_get_contents($path);
        if (!is_string($raw) || trim($raw) === '') {
            return null;
        }
        $decoded = json_decode($raw, true);
        if (!is_array($decoded)) {
            return null;
        }
        return $decoded;
    }

    private function sanitizeModuleKey($value)
    {
        $raw = trim((string) $value);
        if ($raw === '') {
            return '';
        }
        $raw = strtolower($raw);
        $raw = preg_replace('/[^a-z0-9_\-]/', '_', $raw);
        $raw = preg_replace('/_+/', '_', (string) $raw);
        return trim((string) $raw, '_');
    }

    private function normalizeType($type)
    {
        $value = strtolower(trim((string) $type));
        if ($value === 'maps') {
            $value = 'map';
        }
        if ($value === 'commentary' || $value === 'dictionary' || $value === 'map') {
            return $value;
        }
        return '';
    }

    private function normalizeStringList($value)
    {
        if (!is_array($value)) {
            return [];
        }

        $items = [];
        foreach ($value as $item) {
            $text = trim((string) $item);
            if ($text === '') {
                continue;
            }
            $items[] = $text;
            if (count($items) >= 12) {
                break;
            }
        }

        return $items;
    }

    private function normalizeMapCoverage($value)
    {
        if (!is_array($value)) {
            return [];
        }

        $rows = [];
        foreach ($value as $item) {
            if (!is_array($item)) {
                continue;
            }
            $book = (int) ($item['book'] ?? 0);
            $chapter = (int) ($item['chapter'] ?? 0);
            $verseStart = max(1, (int) ($item['verse_start'] ?? 1));
            $verseEnd = max(1, (int) ($item['verse_end'] ?? $verseStart));
            if ($book < 1 || $chapter < 1) {
                continue;
            }
            if ($verseStart > $verseEnd) {
                $tmp = $verseStart;
                $verseStart = $verseEnd;
                $verseEnd = $tmp;
            }
            $rows[] = [
                'book' => $book,
                'chapter' => $chapter,
                'verse_start' => $verseStart,
                'verse_end' => $verseEnd,
            ];
        }

        return $rows;
    }

    private function scoreMapQueryMatch($needle, $title, $summary, array $places, array $references, array $tags)
    {
        if ($needle === '') {
            return 0;
        }

        $score = 0;
        $titleNorm = $this->normalizeToken($title);
        if ($titleNorm !== '') {
            if ($titleNorm === $needle) {
                $score = max($score, 120);
            } elseif (strpos($titleNorm, $needle) !== false || strpos($needle, $titleNorm) !== false) {
                $score = max($score, 90);
            }
        }

        foreach ([$places, $tags] as $pool) {
            foreach ($pool as $item) {
                $norm = $this->normalizeToken((string) $item);
                if ($norm === '') {
                    continue;
                }
                if ($norm === $needle) {
                    $score = max($score, 110);
                    continue;
                }
                if (strpos($norm, $needle) !== false || strpos($needle, $norm) !== false) {
                    $score = max($score, 75);
                }
            }
        }

        foreach ($references as $reference) {
            $norm = $this->normalizeToken((string) $reference);
            if ($norm !== '' && strpos($norm, $needle) !== false) {
                $score = max($score, 55);
            }
        }

        $summaryNorm = $this->normalizeToken($summary);
        if ($summaryNorm !== '' && strpos($summaryNorm, $needle) !== false) {
            $score = max($score, 40);
        }

        return $score;
    }

    private function scoreMapCoverageMatch(array $coverage, $book, $chapter, $verseStart, $verseEnd)
    {
        $score = 0;
        foreach ($coverage as $row) {
            $entryBook = (int) ($row['book'] ?? 0);
            $entryChapter = (int) ($row['chapter'] ?? 0);
            $entryStart = (int) ($row['verse_start'] ?? 1);
            $entryEnd = (int) ($row['verse_end'] ?? $entryStart);
            if ($entryBook !== (int) $book) {
                continue;
            }
            if ($entryChapter !== (int) $chapter) {
                continue;
            }
            if ($entryStart <= (int) $verseEnd && $entryEnd >= (int) $verseStart) {
                $score = max($score, 130);
                continue;
            }
            $score = max($score, 65);
        }
        return $score;
    }

    private function normalizeToken($value)
    {
        $text = trim((string) $value);
        if ($text === '') {
            return '';
        }
        if (function_exists('mb_strtolower')) {
            $text = mb_strtolower($text, 'UTF-8');
        } else {
            $text = strtolower($text);
        }
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
}
