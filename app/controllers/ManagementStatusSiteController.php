<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class ManagementStatusSiteController extends SiteController
{

    public function show(): string
    {

            $params = Application::getApp()->getDatabase()->table('doctor')->where('confirmation_status', val2: '0')->select()->fetchAll();
            $params = [$params, "job" => 'doctor'];
            unset($_POST);
            return $this->render('managementStatus', $params);
    }
}