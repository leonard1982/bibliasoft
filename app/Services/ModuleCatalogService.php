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
        $modules = $this->userDataRepository->getEnabledContentModulesByType('commentary');
        if (empty($modules)) {
            return ['book' => [], 'chapter' => [], 'verse' => []];
        }

        $bookRows = [];
        $chapterRows = [];
        $verseRows = [];

        foreach ($modules as $module) {
            $moduleName = trim((string) ($module['name'] ?? 'Módulo'));
            $sourceLabel = 'Módulo: ' . $moduleName;
            $payload = $this->loadInstalledPayload((string) ($module['file_path'] ?? ''));
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

        $modules = $this->userDataRepository->getEnabledContentModulesByType('dictionary');
        if (empty($modules)) {
            return [];
        }

        $matches = [];
        foreach ($modules as $module) {
            $moduleName = trim((string) ($module['name'] ?? 'Diccionario'));
            $payload = $this->loadInstalledPayload((string) ($module['file_path'] ?? ''));
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
                    'module_key' => (string) ($module['module_key'] ?? ''),
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
        if ($value === 'commentary' || $value === 'dictionary') {
            return $value;
        }
        return '';
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
