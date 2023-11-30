<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/', function() {
    return 'Hello World';
});

$app->router->get('/contact', function() {
    return 'Contact';
});

$app->run();