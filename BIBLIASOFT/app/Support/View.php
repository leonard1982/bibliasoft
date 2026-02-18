<?php

namespace App\Support;

class View
{
    public static function render($template, array $data = [])
    {
        $viewPath = dirname(__DIR__, 2) . '/views/' . $template . '.php';
        if (!is_file($viewPath)) {
            throw new \RuntimeException('Vista no encontrada: ' . $template);
        }

        extract($data, EXTR_SKIP);

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        $layoutPath = dirname(__DIR__, 2) . '/views/layout.php';
        include $layoutPath;
    }
}
