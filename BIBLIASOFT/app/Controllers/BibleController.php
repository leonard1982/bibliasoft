<?php

namespace App\Controllers;

use App\Services\BibleRepository;
use App\Services\SearchService;

class BibleController
{
    private $bibleRepository;
    private $searchService;

    public function __construct(BibleRepository $bibleRepository, SearchService $searchService)
    {
        $this->bibleRepository = $bibleRepository;
        $this->searchService = $searchService;
    }

    public function book()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 1;
        if ($book < 1 || $book > 66) {
            $book = 1;
        }

        app_render('book', [
            'pageTitle' => $this->bibleRepository->getBookName($book),
            'book' => $book,
            'bookName' => $this->bibleRepository->getBookName($book),
            'chapters' => $this->bibleRepository->getChapters($book),
        ]);
    }

    public function chapter()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 1;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 1;
        if ($book < 1 || $book > 66) {
            $book = 1;
        }
        if ($chapter < 1) {
            $chapter = 1;
        }

        $verses = $this->bibleRepository->getChapterVerses($book, $chapter);
        if (empty($verses)) {
            app_redirect('?route=book&book=' . $book);
        }

        app_render('chapter', [
            'pageTitle' => $this->bibleRepository->getBookName($book) . ' ' . $chapter,
            'book' => $book,
            'chapter' => $chapter,
            'bookName' => $this->bibleRepository->getBookName($book),
            'verses' => $verses,
            'prevChapter' => $this->bibleRepository->getAdjacentChapter($book, $chapter, 'prev'),
            'nextChapter' => $this->bibleRepository->getAdjacentChapter($book, $chapter, 'next'),
        ]);
    }

    public function search()
    {
        $filters = [
            'query' => isset($_GET['q']) ? trim($_GET['q']) : '',
            'book' => isset($_GET['book']) ? (int) $_GET['book'] : 0,
            'chapter_from' => isset($_GET['chapter_from']) ? (int) $_GET['chapter_from'] : 0,
            'chapter_to' => isset($_GET['chapter_to']) ? (int) $_GET['chapter_to'] : 0,
            'mode' => isset($_GET['mode']) ? $_GET['mode'] : 'any',
        ];
        if (!in_array($filters['mode'], ['any', 'all', 'exact'], true)) {
            $filters['mode'] = 'any';
        }

        $result = [
            'engine' => null,
            'rows' => [],
        ];
        if ($filters['query'] !== '') {
            $result = $this->searchService->search($filters, (int) config('search.default_limit', 60));
        }

        app_render('search', [
            'pageTitle' => 'Búsqueda',
            'filters' => $filters,
            'result' => $result,
            'books' => $this->bibleRepository->getBooks(),
            'bibleRepository' => $this->bibleRepository,
        ]);
    }
}
