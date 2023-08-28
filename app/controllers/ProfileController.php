<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class ProfileController extends SiteController
{

    public function show()
    {
        if (Application::getApp()->getRequest()->isPost()){
            /*
            $path = $_FILES['profile']['tmp_name'];
            $name = rand(1000,100000).$_FILES['profile']['name'];
          $username = $_SESSION['name'];
            $role = $_SESSION['role'];

        if (!is_dir("data/$username")){
            mkdir("data/$username");
        }
        move_uploaded_file($path, "data/$username");

            $params = Application::getApp()->getDatabase()->table('doctor')->select()->where('full_name', $username)->fetchAll();
            */
            $day = [];
            $saturday = $_POST['saturday'];
            $sunday = $_POST['sunday'];
            $monday = $_POST['monday'];
            $tuesday = $_POST['tuesday'];
            $wednesday = $_POST['wednesday'];
            $thursday = $_POST['thursday'];
            $friday = $_POST['friday'];
            $experience= $_POST['experience'];
            $bio= $_POST['bio'];
            $day = [$saturday,$sunday,$monday,$tuesday,$wednesday,$thursday, $friday ];
            $day =  array_filter($day);
            $day = implode(',', $day);
            $username = $_SESSION['name'];
            $role = $_SESSION['role'];
            Application::getApp()->getDatabase()->table($role)->update(['educational_info'=>$bio])->where(' full_name ','\''.$username.'\'')->exec();
            Application::getApp()->getDatabase()->table($role)->update(['work_day'=>$day])->where(' full_name ','\''.$username.'\'')->exec();
            Application::getApp()->getDatabase()->table($role)->update(['experience'=>$experience])->where(' full_name ','\''.$username.'\'')->exec();
            if (isset($_POST['name'])){
                Application::getApp()->getDatabase()->table($role)->update(['full_name'=>$_POST['name']])->where(' full_name ','\''.$username.'\'')->exec();
            }
        }


        $this->setLayout('auth');
        return $this->render('profile');
    }

}