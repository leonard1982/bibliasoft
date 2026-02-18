<?php

namespace App\Controllers;

use App\Services\BibleRepository;

class HomeController
{
    private $bibleRepository;

    public function __construct(BibleRepository $bibleRepository)
    {
        $this->bibleRepository = $bibleRepository;
    }

    public function index()
    {
        app_redirect('?route=reader');
    }
}
