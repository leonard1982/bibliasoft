<?php

namespace App\Controllers;

use App\Services\DailyVerseService;
use App\Services\ImageCardService;
use App\Services\UserDataRepository;

class HomeDailyController
{
    private $dailyVerseService;
    private $imageCardService;
    private $userDataRepository;

    public function __construct(
        DailyVerseService $dailyVerseService,
        ImageCardService $imageCardService,
        UserDataRepository $userDataRepository
    ) {
        $this->dailyVerseService = $dailyVerseService;
        $this->imageCardService = $imageCardService;
        $this->userDataRepository = $userDataRepository;
    }

    public function index()
    {
        $daily = $this->dailyVerseService->getDailyVerse();
        $prefs = $this->userDataRepository->getUserPrefs();

        app_render('home_daily', [
            'pageTitle' => 'Versículo del día',
            'daily' => $daily,
            'backgrounds' => $this->imageCardService->getBackgrounds(),
            'prefs' => $prefs,
        ]);
    }
}
