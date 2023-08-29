<?php

namespace app\app\controllers;

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
}