<?php

namespace App\Controllers;

class ShareController
{
    public function app()
    {
        app_render('share_app', [
            'pageTitle' => 'Compartir App',
            'publicUrl' => (string) config('app.public_url', ''),
        ]);
    }
}

