<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class ManagementStatusSiteController extends SiteController
{
    public function accept() : void
    {
        $newDoctor = $_POST["accept"];
        Application::getApp()->getDatabase()->update(["confirmation_status"=>1])->table('doctor');
    }
}