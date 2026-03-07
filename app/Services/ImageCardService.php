<?php

namespace App\Services;

class ImageCardService
{
    private $backgrounds;
    private $motivationBackgrounds;

    public function __construct()
    {
        $this->backgrounds = [
            'assets/backgrounds/bg-01.svg',
            'assets/backgrounds/bg-02.svg',
            'assets/backgrounds/bg-03.svg',
            'assets/backgrounds/bg-04.svg',
            'assets/backgrounds/bg-05.svg',
            'assets/backgrounds/verse-01.svg',
            'assets/backgrounds/verse-02.svg',
            'assets/backgrounds/verse-03.svg',
            'assets/backgrounds/verse-04.svg',
            'assets/backgrounds/verse-05.svg',
            'assets/backgrounds/verse-06.svg',
        ];

        $this->motivationBackgrounds = [
            'assets/backgrounds/verse-01.svg',
            'assets/backgrounds/verse-02.svg',
            'assets/backgrounds/verse-03.svg',
            'assets/backgrounds/verse-04.svg',
            'assets/backgrounds/verse-05.svg',
            'assets/backgrounds/verse-06.svg',
        ];
    }

    public function getBackgrounds()
    {
        return array_values(array_unique(array_merge($this->backgrounds, $this->motivationBackgrounds)));
    }

    public function pickBackground($seed)
    {
        return $this->pickFromList($this->backgrounds, $seed);
    }

    public function pickMotivationBackground($seed)
    {
        return $this->pickFromList($this->motivationBackgrounds, $seed);
    }

    public function shareText($verseText, $reference)
    {
        $text = trim((string) $verseText);
        $ref = trim((string) $reference);
        return $text . "\n\n" . $ref . "\nBiblia para todos";
    }

    private function pickFromList(array $list, $seed)
    {
        if (empty($list)) {
            return '';
        }

        $hash = md5((string) $seed);
        $num = hexdec(substr($hash, 0, 6));
        $index = $num % count($list);
        return $list[$index];
    }
}
