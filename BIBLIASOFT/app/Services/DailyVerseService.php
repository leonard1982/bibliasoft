<?php

namespace App\Services;

use App\Database\ConnectionFactory;

class DailyVerseService
{
    private $bibleDbPath;
    private $bibleRepository;
    private $userDataRepository;
    private $sanitizer;
    private $imageCardService;
    private $verseCount;

    public function __construct(
        $bibleDbPath,
        BibleRepository $bibleRepository,
        UserDataRepository $userDataRepository,
        HtmlSanitizer $sanitizer,
        ImageCardService $imageCardService
    ) {
        $this->bibleDbPath = $bibleDbPath;
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->sanitizer = $sanitizer;
        $this->imageCardService = $imageCardService;
        $this->verseCount = null;
    }

    public function getDailyVerse($date = null)
    {
        $date = $date ?: date('Y-m-d');
        $cached = $this->userDataRepository->getDailyCache($date);

        if ($cached) {
            $verse = $this->bibleRepository->getVerse($cached['book'], $cached['chapter'], $cached['verse']);
            if ($verse) {
                return $this->formatPayload($date, $cached['book'], $cached['chapter'], $cached['verse'], $verse, $cached['image_path']);
            }
        }

        $picked = $this->pickVerseByDate($date);
        if (!$picked) {
            throw new \RuntimeException('No se pudo generar el versículo del día.');
        }

        $verse = $this->bibleRepository->getVerse($picked['book'], $picked['chapter'], $picked['verse']);
        if (!$verse) {
            throw new \RuntimeException('Versículo del día no encontrado.');
        }

        $background = $this->imageCardService->pickBackground($date . ':' . $picked['book'] . ':' . $picked['chapter'] . ':' . $picked['verse']);
        $this->userDataRepository->saveDailyCache($date, $picked['book'], $picked['chapter'], $picked['verse'], $background);

        return $this->formatPayload($date, $picked['book'], $picked['chapter'], $picked['verse'], $verse, $background);
    }

    private function pickVerseByDate($date)
    {
        $count = $this->getVerseCount();
        if ($count < 1) {
            return null;
        }

        $hash = md5((string) $date);
        $num = hexdec(substr($hash, 0, 10));
        $offset = $num % $count;

        $pdo = ConnectionFactory::sqlite($this->bibleDbPath);
        $stmt = $pdo->prepare(
            'SELECT Book, Chapter, Verse
             FROM Bible
             ORDER BY Book, Chapter, Verse
             LIMIT 1 OFFSET :offset'
        );
        $stmt->bindValue(':offset', (int) $offset, \PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return [
            'book' => (int) $row['Book'],
            'chapter' => (int) $row['Chapter'],
            'verse' => (int) $row['Verse'],
        ];
    }

    private function getVerseCount()
    {
        if ($this->verseCount !== null) {
            return $this->verseCount;
        }

        $pdo = ConnectionFactory::sqlite($this->bibleDbPath);
        $count = (int) $pdo->query('SELECT COUNT(*) FROM Bible')->fetchColumn();
        $this->verseCount = $count;
        return $count;
    }

    private function formatPayload($date, $book, $chapter, $verse, array $verseRow, $background)
    {
        $reference = $this->bibleRepository->buildReferenceLabel($book, $chapter, $verse);
        return [
            'date' => $date,
            'book' => (int) $book,
            'chapter' => (int) $chapter,
            'verse' => (int) $verse,
            'reference' => $reference,
            'book_name' => $this->bibleRepository->getBookName($book),
            'text' => $verseRow['scripture_text'],
            'html' => $verseRow['scripture_html'],
            'background' => $background ?: $this->imageCardService->pickBackground($date),
            'share_text' => $this->imageCardService->shareText($verseRow['scripture_text'], $reference),
        ];
    }
}
