<?php

namespace App\Controllers;

use App\Services\AIService;
use App\Services\BibleRepository;
use App\Services\UserDataRepository;

class ApiController
{
    private $bibleRepository;
    private $userDataRepository;
    private $aiService;

    public function __construct(
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        AIService $aiService
    ) {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->aiService = $aiService;
    }

    public function verse()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        $verse = isset($_GET['verse']) ? (int) $_GET['verse'] : 0;

        $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
        if (!$verseRow) {
            app_json(['error' => 'Versículo no encontrado'], 404);
        }

        $context = [
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'verse' => $verse,
            'verse_text' => $verseRow['scripture_text'],
            'pericope' => $this->bibleRepository->getPericopeHint($book, $chapter, $verse),
        ];

        app_json([
            'reference' => [
                'book' => $book,
                'chapter' => $chapter,
                'verse' => $verse,
                'label' => $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse),
            ],
            'verse' => [
                'html' => $verseRow['scripture_html'],
                'text' => $verseRow['scripture_text'],
            ],
            'context' => $context,
            'commentary' => $this->bibleRepository->getCommentariesForVerse($book, $chapter, $verse),
            'notes' => $this->userDataRepository->getNotes($book, $chapter, $verse),
            'links' => $this->userDataRepository->getLinks($book, $chapter, $verse),
            'ai' => $this->aiService->cardsForVerse($book, $chapter, $verse, $context, false),
        ]);
    }

    public function chapter()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        $chapter = isset($_GET['chapter']) ? (int) $_GET['chapter'] : 0;
        if ($book < 1 || $chapter < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }

        $verses = $this->bibleRepository->getChapterVerses($book, $chapter);
        if (empty($verses)) {
            app_json(['error' => 'Capítulo no encontrado'], 404);
        }

        app_json([
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'chapters' => $this->bibleRepository->getChapters($book),
            'verses' => $verses,
        ]);
    }

    public function chapters()
    {
        $book = isset($_GET['book']) ? (int) $_GET['book'] : 0;
        if ($book < 1) {
            app_json(['error' => 'Parámetro inválido'], 422);
        }

        app_json([
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapters' => $this->bibleRepository->getChapters($book),
        ]);
    }

    public function noteCreate()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;
        $content = isset($input['content']) ? trim($input['content']) : '';
        if ($book < 1 || $chapter < 1 || $verse < 1 || $content === '') {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $id = $this->userDataRepository->createNote($book, $chapter, $verse, $content);
        app_json(['ok' => true, 'id' => $id], 201);
    }

    public function noteUpdate()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        $content = isset($input['content']) ? trim($input['content']) : '';
        if ($id < 1 || $content === '') {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->updateNote($id, $content);
        app_json(['ok' => $ok]);
    }

    public function noteDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->deleteNote($id);
        app_json(['ok' => $ok]);
    }

    public function linkCreate()
    {
        $input = $this->requestData();
        $required = ['from_book', 'from_chapter', 'from_verse', 'to_book', 'to_chapter', 'to_verse'];
        foreach ($required as $field) {
            if (empty($input[$field])) {
                app_json(['error' => 'Parámetros inválidos'], 422);
            }
        }

        $id = $this->userDataRepository->createLink(
            (int) $input['from_book'],
            (int) $input['from_chapter'],
            (int) $input['from_verse'],
            (int) $input['to_book'],
            (int) $input['to_chapter'],
            (int) $input['to_verse'],
            isset($input['note']) ? $input['note'] : ''
        );
        app_json(['ok' => true, 'id' => $id], 201);
    }

    public function linkDelete()
    {
        $input = $this->requestData();
        $id = isset($input['id']) ? (int) $input['id'] : 0;
        if ($id < 1) {
            app_json(['error' => 'Parámetros inválidos'], 422);
        }
        $ok = $this->userDataRepository->deleteLink($id);
        app_json(['ok' => $ok]);
    }

    public function aiRefresh()
    {
        $input = $this->requestData();
        $book = isset($input['book']) ? (int) $input['book'] : 0;
        $chapter = isset($input['chapter']) ? (int) $input['chapter'] : 0;
        $verse = isset($input['verse']) ? (int) $input['verse'] : 0;

        $verseRow = $this->bibleRepository->getVerse($book, $chapter, $verse);
        if (!$verseRow) {
            app_json(['error' => 'Versículo no encontrado'], 404);
        }

        $context = [
            'book' => $book,
            'book_name' => $this->bibleRepository->getBookName($book),
            'chapter' => $chapter,
            'verse' => $verse,
            'verse_text' => $verseRow['scripture_text'],
            'pericope' => $this->bibleRepository->getPericopeHint($book, $chapter, $verse),
        ];

        $ai = $this->aiService->cardsForVerse($book, $chapter, $verse, $context, true);
        app_json(['ok' => true, 'ai' => $ai]);
    }

    private function requestData()
    {
        if (!empty($_POST)) {
            return $_POST;
        }

        $raw = file_get_contents('php://input');
        if ($raw === '') {
            return [];
        }

        $json = json_decode($raw, true);
        if (is_array($json)) {
            return $json;
        }

        parse_str($raw, $form);
        return is_array($form) ? $form : [];
    }
}
