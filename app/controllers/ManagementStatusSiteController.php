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

    public function control()
    {

        if (isset($_POST['accept']) && Application::getApp()->getRequest()->getQueryParameter() == 'doctor') {
            $id = $_POST['accept'];
            Application::getApp()->getDatabase()->table('doctor')->update(["confirmation_status"=>1])->where('id',val2:  $id)->exec();
            return $this->show();
        }
        if (isset($_POST['accept']) && array_keys($_POST)[1] == 'doctor' && isset($_POST['doctor'])) {
            $id = $_POST['id'];
            Application::getApp()->getDatabase()->table('doctor')->update(["confirmation_status"=>1])->where('id',val2:  $id)->exec();
            return $this->show();
        }

        if (Application::getApp()->getRequest()->getQueryParameter() == 'doctor'){
            return $this->show();
        }
        if (Application::getApp()->getRequest()->getQueryParameter() == 'manager'){
            $params = Application::getApp()->getDatabase()->table('manager')->where('confirmation_status', val2: '0')->select()->fetchAll();
            $params = [$params, "job" => 'manager'];
            return $this->render('managementStatus', $params);
        }
        return $this->show();
    }



}