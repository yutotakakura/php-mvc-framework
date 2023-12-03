<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class Controller
{
    /**
     * Call renderView function of Router with parameters
     *
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }
}