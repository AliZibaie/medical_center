<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class ManageDepartmentController extends SiteController
{
    public function show(): string
    {

        $params = Application::getApp()->getDatabase()->table('department')->select()->fetchAll();
        return $this->render('manageDepartments', $params);
    }

    public function control()
    {
        if (Application::getApp()->getRequest()->isPost()) {
            if (isset($_POST['addDepartment'])){
                $name = $_POST['addDepartment'];
                $this->getDB()->table('department')->insert([' department_name	'=>$name])->exec();
            }
            if (isset($_POST['departmentAction'])){
                $id = (int)  $_POST['departmentAction'];
                if (isset($_POST['deleteDepartment'])){
                    Application::getApp()->getDatabase()->table('doctor')->update([' department_id '=>null])->where(' department_id ','\''.$id.'\'')->exec();
                     Application::getApp()->getDatabase()->table(' department ')->where(' id ', val2: $id)->delete();

                }
            }
            if (isset($_POST['editDepartment'])){;
                $id = (int)  $_POST['editDepartment'] - 10;
                $newName =  $_POST["editted-name"];
                Application::getApp()->getDatabase()->table('department')->update([' department_name '=> $newName])->where(' id ','\''.$id.'\'')->exec();
            }
        }
        return $this->show();
    }
}