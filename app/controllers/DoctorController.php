<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class DoctorController extends  SiteController
{
    public function getDoctors()
    {
        return  $this->getDB()->table('doctor')->where(' confirmation_status ','\''.'1'.'\'')->select()->fetchAll();
    }

    public function show()
    {

        $this->setLayout('main');
        return $this->render('doctorList',$this->getDoctors());
    }

    public function control()
    {
        if (Application::getApp()->getRequest()->isPost()){

            $search = $_POST['search'];
            $filter = $_POST['filter'];
            if ($filter == 'desc'){
                if (isset($search)){
                    $query = "SELECT * FROM `doctor` WHERE full_name LIKE '%$search%'  AND confirmation_status = 1 ORDER BY full_name DESC ";
                }else{
                    $query = "SELECT * FROM `doctor` WHERE confirmation_status = 1 ORDER BY full_name DESC ";
                }

                $this->getDB()->setSql($query);
                $info = $this->getDB()->fetchAll();
                return $this->render('doctorList',$info);
            }
            if ($filter == 'asc'){
                if (isset($search)){
                    $query = "SELECT * FROM doctor WHERE full_name LIKE '%$search%' AND confirmation_status = 1 ORDER BY  full_name ASC ";

            }else{
                $query = "SELECT * FROM `doctor` WHERE confirmation_status = 1 ORDER BY full_name DESC ";
            }

                $this->getDB()->setSql($query);
                $info = $this->getDB()->fetchAll();

                 return $this->render('doctorList',$info);

            }
            if (isset($search)){
                $query = "SELECT * FROM doctor WHERE full_name LIKE '%$search%' AND  confirmation_status = 1 ";
                $this->getDB()->setSql($query);
                $info = $this->getDB()->fetchAll();
                return $this->render('doctorList',$info);
            }
            if (isset($_POST['doctors-profile'])){
                $id = ($_POST['doctors-profile']);
                $query = "SELECT * FROM doctor WHERE  confirmation_status = 1 AND id = $id";
                $this->getDB()->setSql($query);
                $info = $this->getDB()->fetchAll();
                return $this->render('doctorList',$info);
            }
            $query = "SELECT * FROM doctor WHERE  confirmation_status = 1 ";
            $this->getDB()->setSql($query);
            $info = $this->getDB()->fetchAll();
            return $this->render('doctorList',$info);
        }
    }
}