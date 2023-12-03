<?php
declare(strict_types=1);

namespace app\controllers;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function contact()
    {
        return $this->render('contact');
    }
}