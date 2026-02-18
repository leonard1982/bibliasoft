<?php

namespace App\Services;

class SearchService
{
    private $bibleRepository;
    private $userDataRepository;
    private $sanitizer;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        HtmlSanitizer $sanitizer
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->sanitizer = $sanitizer;
    }

    public function search(array $filters, $limit = 60)
    {
        $results = [];
        $used = 'source_like';

        if ($this->userDataRepository->hasFtsIndex()) {
            $raw = $this->userDataRepository->searchFts($filters, $limit);
            foreach ($raw as $row) {
                $clean = $this->sanitizer->sanitize($row['scripture']);
                $results[] = [
                    'book' => (int) $row['book'],
                    'chapter' => (int) $row['chapter'],
                    'verse' => (int) $row['verse'],
                    'title' => isset($row['title']) ? trim((string) $row['title']) : '',
                    'scripture_html' => $clean,
                    'scripture_text' => $this->sanitizer->text($clean),
                ];
            }
            $used = 'fts_index';
        } else {
            $results = $this->bibleRepository->searchSource($filters, $limit);
        }

        return [
            'engine' => $used,
            'rows' => $results,
        ];
    }
}
