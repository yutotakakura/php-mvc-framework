<?php
declare(strict_types=1);

namespace app\core;

use Closure;

class Router
{
    private array $routes = [];

    private Request $request;

    private Responce $responce;

    /**
     * @param Request $request
     * @param Responce $responce
     */
    public function __construct(Request $request, Responce $responce)
    {
        $this->request = $request;
        $this->responce = $responce;
    }

    /**
     * Register GET request to routes
     *
     * @param string $path
     * @param string|array $callback
     * @return void
     */
    public function get(string $path, string|array $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * [WIP] Register POST request to routes
     *
     * @param string $path
     * @param Closure $callback
     * @return void
     */
    public function post(string $path, Closure $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Resolves and handles the current request based on registered routes.
     *
     * @return void
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->responce->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $controller = new $callback[0];
            $callback[0] = $controller;
        }
        
        return call_user_func($callback);
    }

    /**
     * Resolve view contents
     *
     * @param string $view
     * @return string
     */
    public function renderView(string $view): string
    {
        $latoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $latoutContent);
    }
    
    /**
     * Resolve common layout view
     *
     * @return string
     */
    private function layoutContent(): string
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }
    
    /**
     * Resolve view of each request
     *
     * @param string $view
     * @return string
     */
    private function renderOnlyView(string $view): string
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/{$view}.php";
        return ob_get_clean();
    }
}