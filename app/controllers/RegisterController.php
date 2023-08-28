<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\Request;
use app\app\core\SiteController;

class RegisterController extends SiteController
{
    public function __construct()
    {
        $this->setLayout('auth');
    }


    public function show()
    {
        if (Application::getApp()->getRequest()->isPost()){
            return $this->render('login');
        }

        $this->setLayout('auth');
        return $this->render('signup');
    }

}