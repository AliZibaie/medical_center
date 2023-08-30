<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class ProfileController extends SiteController
{




    public function getDoctorInfo() : array
    {
        return  $this->getDB()->table('doctor')->select()->where(' full_name ','\''.$_SESSION['name'].'\'')->fetchAll();
    }
    public function getDepartmentInfo()
    {
        return  $this->getDB()->table('department')->select()->fetchAll();
    }

    public function getDoctorDepartment()
    {

    }

    public function getProfiles($id)
    {
        return  $this->getDB()->table('doctors_profile')->where(' doctor_id ', $id)->select()->fetchAll();
    }

    public function show()
    {
        if (Application::getApp()->getRequest()->isPost()){
            $saturday = $_POST['saturday'];
            $sunday = $_POST['sunday'];
            $monday = $_POST['monday'];
            $tuesday = $_POST['tuesday'];
            $wednesday = $_POST['wednesday'];
            $thursday = $_POST['thursday'];
            $friday = $_POST['friday'];
            $username = $_SESSION['name'];
            $role = $_SESSION['role'];
            $experience= $_POST['experience'];
            $bio= $_POST['bio'];

            $day = [$saturday,$sunday,$monday,$tuesday,$wednesday,$thursday, $friday ];
            $day =  array_filter($day);
            $day = implode(',', $day);
            Application::getApp()->getDatabase()->table($role)->update(['educational_info'=>$bio])->where(' full_name ','\''.$username.'\'')->exec();
            if (!empty($day)){
                Application::getApp()->getDatabase()->table($role)->update(['work_day'=>$day])->where(' full_name ','\''.$username.'\'')->exec();
            }
            Application::getApp()->getDatabase()->table($role)->update(['experience'=>$experience])->where(' full_name ','\''.$username.'\'')->exec();
            if (isset($_POST['name'])){
                Application::getApp()->getDatabase()->table($role)->update(['full_name'=>$_POST['name']])->where(' full_name ','\''.$username.'\'')->exec();
                $_SESSION['name'] = $_POST['name'];
            }
            if (isset($_FILES['profile']) && $role == 'doctor'){
                $params = $this->getDB()->table('doctor')->select()->fetchAll();
                $profileSrc= $_FILES['profile'];
                $profileName = rand(1000000,100000000).$profileSrc['name'];
                $pathinfo = pathinfo($profileName);
     
                $tmpName = $profileSrc['tmp_name'];
                $profileSrc = "./data/$username/$profileName";
                if (!is_dir("./data/$username/")){
                    mkdir("./data/$username/");
                }
                $id = $this->getDB()->table('doctor')->select(['id'])->where(' full_name ','\''.$username.'\'')->fetchAll();
                if ($pathinfo['extension'] == 'jpg'){
                    Application::getApp()->getDatabase()->table('doctors_profile')->insert([' doctor_id '=>$id[0]->id, ' source_path '=>$profileSrc])->exec();
                    move_uploaded_file($tmpName, $profileSrc);
                }
                if (isset($_POST['department'])){
                    $department_name =  $_POST['department'];
                    $inner = $this->getDB()->innerJoin($department_name)->fetchAll();
                    $id = $inner[0]->id;
                        Application::getApp()->getDatabase()->table($role)->update([' department_id '=>$id])->where(' full_name ','\''.$username.'\'')->exec();

                }
//                Application::getApp()->getDatabase()->table('doctors_profile')->insert([' source_path '=>$profileSrc])->exec();
//                Application::getApp()->getDatabase()->table('doctors_profile')->update([' doctor_id '=>$id])->where(' doctor_id ','\''.$id[0]->id.'\'')->exec();
//                Application::getApp()->getDatabase()->table('doctors_profile')->update(['source_path'=>$profileSrc])->where(' doctor_id ','\''.$id[0]->id.'\'')->exec();
            }
        }
        $id = $this->getDB()->table('doctor')->select(['id'])->where(' full_name ','\''.$_SESSION['name'].'\'')->fetchAll();
        $id = $id[0]->id;
        $educational_info = $this->getDoctorInfo()[0]->educational_info;
        $department_id = $this->getDoctorInfo()[0]->department_id;
        $experience = $this->getDoctorInfo()[0]->experience;
        $work_day = $this->getDoctorInfo()[0]->work_day;
        $work_day  = explode(',', $work_day);
        $params = [ $this->getDepartmentInfo(), "edu"=>$educational_info, 'department'=>$department_id,'experience'=>$experience,'days'=>$work_day, 'profiles'=>$this->getProfiles($id)];

        $this->setLayout('auth');
        return $this->render('profile',$params);
    }

    public static function iconNeed() : bool
    {
        $rows = (new ProfileController)->getDoctorInfo()[0];
        if (empty($rows->educational_info) || empty($rows->department_id) || empty($rows->experience) || empty($rows->work_day) ){
            return true;
        }
        return false;
    }

    /**
     * @return ProfileController
     */



}