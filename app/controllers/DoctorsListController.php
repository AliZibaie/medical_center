<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;
use app\app\ORM\models\Doctor;

class DoctorsListController extends  SiteController
{

    public function show(): string
    {
        $params = Doctor::showStatus0();
        $params = [$params, "job" => 'doctor'];
        unset($_POST);
        return $this->render('managementStatus', $params);
    }

    public function control()
    {
        if (Application::getApp()->getRequest()->isPost()){
            $id = (int) $_POST['accept'];
            Application::getApp()->getDatabase()->table(' doctor ')->update([' confirmation_status  '=> 1])->where(' id ','\''.$id.'\'')->exec();
            return $this->show();
        }
    }
}