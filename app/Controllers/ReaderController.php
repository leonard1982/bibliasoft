<?php

namespace App\Controllers;

use App\Services\BibleRepository;

class ReaderController
{
    private $bibleRepository;

    public function __construct(BibleRepository $bibleRepository)
    {
        $this->bibleRepository = $bibleRepository;
    }

    public function index()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 1;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 1;

        if ($book < 1 || $book > 66) {
            $book = 1;
        }

        $chapters = $this->bibleRepository->getChapters($book);
        if (empty($chapters)) {
            $chapter = 1;
            $chapters = [1];
        } elseif (!in_array($chapter, $chapters, true)) {
            $chapter = 1;
        }

        app_render('reader', [
            'pageTitle' => $this->bibleRepository->getBookName($book) . ' ' . $chapter,
            'books' => $this->bibleRepository->getBooks(),
            'book' => $book,
            'chapter' => $chapter,
            'chapters' => $chapters,
            'bookName' => $this->bibleRepository->getBookName($book),
            'verses' => $this->bibleRepository->getChapterVerses($book, $chapter),
        ]);
    }
}
