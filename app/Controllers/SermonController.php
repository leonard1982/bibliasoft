<?php

namespace App\Controllers;

use App\Services\BibleRepository;
use App\Services\UserDataRepository;

class SermonController
{
    private $bibleRepository;
    private $userDataRepository;

    public function __construct(BibleRepository $bibleRepository, UserDataRepository $userDataRepository)
    {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
    }

    public function index()
    {
        $books = $this->bibleRepository->getBooks();
        $defaultBook = !empty($books) ? (int) ($books[0]['id'] ?? 1) : 1;
        $book = isset($_GET['book']) ? max(1, (int) $_GET['book']) : $defaultBook;
        $chapter = isset($_GET['chapter']) ? max(1, (int) $_GET['chapter']) : 1;
        $verseStart = isset($_GET['verse_start']) ? max(1, (int) $_GET['verse_start']) : (isset($_GET['verse']) ? max(1, (int) $_GET['verse']) : 1);
        $verseEnd = isset($_GET['verse_end']) ? max(1, (int) $_GET['verse_end']) : $verseStart;

        app_render('sermons', [
            'pageTitle' => 'Sermones y mensajes',
            'books' => $books,
            'projects' => $this->userDataRepository->getStudyProjects(),
            'initial' => [
                'book' => $book,
                'chapter' => $chapter,
                'verse_start' => $verseStart,
                'verse_end' => $verseEnd,
                'prompt' => isset($_GET['prompt']) ? trim((string) $_GET['prompt']) : '',
                'message_type' => isset($_GET['message_type']) ? trim((string) $_GET['message_type']) : 'sermon',
                'audience' => isset($_GET['audience']) ? trim((string) $_GET['audience']) : '',
                'tone' => isset($_GET['tone']) ? trim((string) $_GET['tone']) : '',
            ],
        ]);
    }
}
