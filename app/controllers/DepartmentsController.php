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

    public function control()
    {
        if (Application::getApp()->getRequest()->isPost()){
            if (isset($_POST['departmentDoctors'])){
                $department_id = (int) $_POST['departmentDoctors'];
                $query = "SELECT * FROM doctor do RIGHT JOIN department de ON de.id = do.department_id  WHERE de.id =  '$department_id'";
                $this->getDB()->setSql($query);
                $params = $this->getDB()->fetchAll();
                return RelatedDoctorsController::show($params);
            }
        }
        $this->show();
    }

}