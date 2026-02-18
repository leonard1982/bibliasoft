<?php

namespace App\Services;

class ImageCardService
{
    private $backgrounds;

    public function __construct()
    {
        $this->backgrounds = [
            'assets/backgrounds/bg-01.svg',
            'assets/backgrounds/bg-02.svg',
            'assets/backgrounds/bg-03.svg',
            'assets/backgrounds/bg-04.svg',
            'assets/backgrounds/bg-05.svg',
        ];
    }

    public function getBackgrounds()
    {
        return $this->backgrounds;
    }

    public function pickBackground($seed)
    {
        $list = $this->backgrounds;
        if (empty($list)) {
            return '';
        }

        $hash = md5((string) $seed);
        $num = hexdec(substr($hash, 0, 6));
        $index = $num % count($list);
        return $list[$index];
    }

    public function shareText($verseText, $reference)
    {
        $text = trim((string) $verseText);
        $ref = trim((string) $reference);
        return $text . "\n\n" . $ref . "\nBiblia para todos";
    }
}
