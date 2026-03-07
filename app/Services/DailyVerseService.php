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
        $picked = $this->pickVerseByDate($date);
        if (!$picked) {
            throw new \RuntimeException('No se pudo generar el versículo del día.');
        }

        $cached = $this->userDataRepository->getDailyCache($date);

        if ($cached) {
            $cacheMatchesDatePick = (int) $cached['book'] === (int) $picked['book']
                && (int) $cached['chapter'] === (int) $picked['chapter']
                && (int) $cached['verse'] === (int) $picked['verse'];
            if ($cacheMatchesDatePick) {
                $verse = $this->bibleRepository->getVerse($cached['book'], $cached['chapter'], $cached['verse']);
                if ($verse) {
                    return $this->formatPayload($date, $cached['book'], $cached['chapter'], $cached['verse'], $verse, $cached['image_path']);
                }
            }
        }

        $verse = $this->bibleRepository->getVerse($picked['book'], $picked['chapter'], $picked['verse']);
        if (!$verse) {
            throw new \RuntimeException('Versículo del día no encontrado.');
        }

        $background = $this->imageCardService->pickBackground($date . ':' . $picked['book'] . ':' . $picked['chapter'] . ':' . $picked['verse']);
        $this->userDataRepository->saveDailyCache($date, $picked['book'], $picked['chapter'], $picked['verse'], $background);

        return $this->formatPayload($date, $picked['book'], $picked['chapter'], $picked['verse'], $verse, $background);
    }

    public function getMotivationVerse($date = null)
    {
        $date = $date ?: date('Y-m-d');
        $catalog = $this->motivationCatalog();
        if (empty($catalog)) {
            return $this->getDailyVerse($date);
        }

        $total = count($catalog);
        $offset = $this->stableOffsetForDate('motivation:' . $date, $total);

        for ($i = 0; $i < $total; $i++) {
            $entry = $catalog[($offset + $i) % $total];
            $book = (int) ($entry['book'] ?? 0);
            $chapter = (int) ($entry['chapter'] ?? 0);
            $verse = (int) ($entry['verse'] ?? 0);
            if ($book < 1 || $chapter < 1 || $verse < 1) {
                continue;
            }

            $row = $this->bibleRepository->getVerse($book, $chapter, $verse);
            if (!$row) {
                continue;
            }

            $background = $this->imageCardService->pickMotivationBackground($date . ':' . $book . ':' . $chapter . ':' . $verse);
            $payload = $this->formatPayload($date, $book, $chapter, $verse, $row, $background);
            $payload['kind'] = 'motivation';
            return $payload;
        }

        return $this->getDailyVerse($date);
    }

    private function pickVerseByDate($date)
    {
        $count = $this->getVerseCount();
        if ($count < 1) {
            return null;
        }

        $offset = $this->stableOffsetForDate($date, $count);

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

    private function stableOffsetForDate($date, $count)
    {
        $count = (int) $count;
        if ($count < 2) {
            return 0;
        }

        // Reduce hash to [0, count) without large integer casts/overflow.
        $hash = md5((string) $date);
        $offset = 0;
        $len = strlen($hash);
        for ($i = 0; $i < $len; $i++) {
            $digit = hexdec($hash[$i]);
            $offset = (($offset * 16) + $digit) % $count;
        }
        return $offset;
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

    private function motivationCatalog()
    {
        return [
            ['book' => 6, 'chapter' => 1, 'verse' => 9],
            ['book' => 19, 'chapter' => 27, 'verse' => 1],
            ['book' => 19, 'chapter' => 46, 'verse' => 1],
            ['book' => 19, 'chapter' => 55, 'verse' => 22],
            ['book' => 19, 'chapter' => 121, 'verse' => 1],
            ['book' => 20, 'chapter' => 3, 'verse' => 5],
            ['book' => 20, 'chapter' => 16, 'verse' => 3],
            ['book' => 23, 'chapter' => 40, 'verse' => 31],
            ['book' => 23, 'chapter' => 41, 'verse' => 10],
            ['book' => 24, 'chapter' => 29, 'verse' => 11],
            ['book' => 40, 'chapter' => 11, 'verse' => 28],
            ['book' => 40, 'chapter' => 19, 'verse' => 26],
            ['book' => 43, 'chapter' => 16, 'verse' => 33],
            ['book' => 45, 'chapter' => 8, 'verse' => 28],
            ['book' => 45, 'chapter' => 15, 'verse' => 13],
            ['book' => 46, 'chapter' => 10, 'verse' => 13],
            ['book' => 47, 'chapter' => 12, 'verse' => 9],
            ['book' => 48, 'chapter' => 6, 'verse' => 9],
            ['book' => 50, 'chapter' => 4, 'verse' => 13],
            ['book' => 55, 'chapter' => 1, 'verse' => 7],
        ];
    }
}
