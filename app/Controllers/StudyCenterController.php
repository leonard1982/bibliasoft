<?php

namespace App\Controllers;

use App\Services\BibleRepository;
use App\Services\UserDataRepository;

class StudyCenterController
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
        app_render('study_center', [
            'pageTitle' => 'Centro de estudio',
            'books' => $this->bibleRepository->getBooks(),
            'projects' => $this->userDataRepository->getStudyProjects(),
        ]);
    }
}

