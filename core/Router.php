<?php
declare(strict_types=1);

namespace app\core;

use Closure;

class Router
{
    protected array $routes = [];
    
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $path, Closure $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        echo $callback ? call_user_func($callback) : 'Not Found';
    }
}