<?php
declare(strict_types=1);

namespace app\core;

class Application
{
    public static string $ROOT_DIR;

    public Router $router;

    public Request $request;

    private Responce $responce;
    
    public static Application $app;

    /**
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->responce = new Responce();
        $this->router = new Router($this->request, $this->responce);
    }

    /**
     * Handle incoming request
     * 
     * @return void
     */
    public function run(): void
    {
        echo $this->router->resolve();       
    }
}