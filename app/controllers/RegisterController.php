<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\Request;
use app\app\core\SiteController;
use app\app\helper\Session;

class RegisterController extends SiteController
{
    public function __construct()
    {
        $this->setLayout('auth');
    }
    public function show()
    {
        if (Application::getApp()->getRequest()->isPost()){
            if ($_POST['role'] == 'doctor'){
                $params = $this->getDB()->table('doctor')->select()->fetchAll();
                if ($this->check($params)){
                    return  $this->render('login');
                }
            }
            if ($_POST['role'] == 'manager'){
                $params = $this->getDB()->table('manager')->select()->fetchAll();
                if ($this->check($params)){
                    return  $this->render('login');
                }
            }
            if ($_POST['role'] == 'sick'){
                $params = $this->getDB()->table('patient')->select()->fetchAll();
                if ($this->check($params)){
                    return  $this->render('login');
                }
            }
//            if ($_POST['role'] == 'sick'){
//
//                $params = $this->getDB()->table('patient')->select()->fetchAll();
//                foreach ($params as $param){
//                    if ($_POST['username'] == $param->full_name && $_POST['passwrod']== $param->passwrod ){
//                        Session::setSession(new Session($_POST['username'], $_POST['role']));
//                        return $this->render('home', $params);
//                    }
//                }
//                $this->setLayout('auth');
//                return $this->render('signup');
//
//            }
            return $this->render('signup');
        }
        $this->setLayout('auth');
        return $this->render('signup');
    }

    /**
     * @param $params
     * @return bool
     */
    public function check($params): bool
    {
        foreach ($params as $param) {
            if ($_POST['username'] == $param->full_name) {
                return false;
            }
        }
        return true;
    }
}