<?php

namespace App\Controllers;

use App\Services\DailyVerseService;
use App\Services\ImageCardService;
use App\Services\ReadingPlanService;
use App\Services\UserDataRepository;

class HomeDailyController
{
    private $dailyVerseService;
    private $imageCardService;
    private $userDataRepository;
    private $readingPlanService;

    public function __construct(
        DailyVerseService $dailyVerseService,
        ImageCardService $imageCardService,
        UserDataRepository $userDataRepository,
        ReadingPlanService $readingPlanService
    ) {
        $this->dailyVerseService = $dailyVerseService;
        $this->imageCardService = $imageCardService;
        $this->userDataRepository = $userDataRepository;
        $this->readingPlanService = $readingPlanService;
    }

    public function index()
    {
        $daily = $this->dailyVerseService->getDailyVerse();
        $motivation = $this->dailyVerseService->getMotivationVerse($daily['date'] ?? null);
        $prefs = $this->userDataRepository->getUserPrefs();
        $plan = $this->readingPlanService->status($daily['date'] ?? null);

        app_render('home_daily', [
            'pageTitle' => 'Versículo del día',
            'daily' => $daily,
            'motivation' => $motivation,
            'backgrounds' => $this->imageCardService->getBackgrounds(),
            'prefs' => $prefs,
            'plan' => $plan,
        ]);
    }
}
