<?php

namespace App\Controllers;

use App\Services\AnecdoteService;

class AnecdoteController
{
    private $service;

    public function __construct(AnecdoteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->service->bootstrapSeed();

        $topic = isset($_GET['topic']) ? trim((string) $_GET['topic']) : '';
        $q = isset($_GET['q']) ? trim((string) $_GET['q']) : '';

        $payload = $this->service->list([
            'topic' => $topic,
            'q' => $q,
        ], 80, auth_user_id());

        app_render('anecdotes', [
            'pageTitle' => 'Anécdotas',
            'filters' => [
                'topic' => $topic,
                'q' => $q,
            ],
            'rows' => $payload['rows'],
            'topics' => $payload['topics'],
            'isLogged' => auth_user_id() > 0,
        ]);
    }
}

