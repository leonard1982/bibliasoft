<?php

namespace App\Controllers;

use App\Services\BibleRepository;
use App\Services\ImageCardService;
use App\Services\UserDataRepository;

class ReaderController
{
    private $bibleRepository;
    private $imageCardService;
    private $userDataRepository;

    public function __construct(
        BibleRepository $bibleRepository,
        ImageCardService $imageCardService,
        UserDataRepository $userDataRepository
    )
    {
        $this->bibleRepository = $bibleRepository;
        $this->imageCardService = $imageCardService;
        $this->userDataRepository = $userDataRepository;
    }

    public function index()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 1;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 1;
        $verse = isset($_GET['verse']) ? (int) $_GET['verse'] : 0;

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
            'highlightVerse' => $verse,
            'chapters' => $chapters,
            'bookName' => $this->bibleRepository->getBookName($book),
            'verses' => $this->bibleRepository->getChapterVerses($book, $chapter),
            'backgrounds' => $this->imageCardService->getBackgrounds(),
            'userPrefs' => $this->userDataRepository->getUserPrefs(),
        ]);
    }
}
