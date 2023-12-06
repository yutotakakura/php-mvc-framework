<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Request;

class SiteController extends Controller
{
    public function home(): string
    {
        return $this->render('home');
    }

    public function contact(): string
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request): void {
        $body = $request->getBody();
        var_dump($body);
    }
}