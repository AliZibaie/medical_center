<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class DepartmentsController extends  SiteController
{
    public function show(): string
    {
        $params = Application::getApp()->getDatabase()->table(' department ')->select()->fetchAll();

        return $this->render('departments', $params);
    }
}