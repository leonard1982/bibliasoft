<?php

namespace App\Controllers;

use App\Services\UserDataRepository;

class CompanionController
{
    private $users;

    public function __construct(UserDataRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $userId = auth_user_id();
        $threads = $this->users->getCompanionThreadsForUser($userId, 40);
        $selectedThreadId = isset($_GET['thread']) ? (int) $_GET['thread'] : 0;
        if ($selectedThreadId < 1 && !empty($threads)) {
            $selectedThreadId = (int) ($threads[0]['id'] ?? 0);
        }
        $selectedThread = $selectedThreadId > 0 ? $this->users->getCompanionThreadByIdForUser($selectedThreadId, $userId) : null;
        $messages = $selectedThread ? $this->users->getCompanionMessages((int) ($selectedThread['id'] ?? 0), 80) : [];

        app_render('companion', [
            'pageTitle' => config('pastoral.companion_name', 'Alfonso'),
            'threads' => $threads,
            'selectedThread' => $selectedThread,
            'messages' => $messages,
            'user' => $this->users->getUserById($userId),
            'companionName' => (string) config('pastoral.companion_name', 'Alfonso'),
        ]);
    }
}
