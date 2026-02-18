<?php

namespace App\Controllers;

use App\Services\DevotionalService;
use App\Services\ImageCardService;

class DevotionalController
{
    private $devotionalService;
    private $imageCardService;

    public function __construct(DevotionalService $devotionalService, ImageCardService $imageCardService)
    {
        $this->devotionalService = $devotionalService;
        $this->imageCardService = $imageCardService;
    }

    public function index()
    {
        $today = $this->devotionalService->getToday();
        $history = $this->devotionalService->history(30);

        app_render('devotional', [
            'pageTitle' => 'Devocionales',
            'today' => $today,
            'history' => $history,
            'backgrounds' => $this->imageCardService->getBackgrounds(),
        ]);
    }
}
