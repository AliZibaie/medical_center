<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;
use app\app\helper\Session;

class LoginController extends SiteController
{
    public function show()
    {
        if (Application::getApp()->getRequest()->isPost()){
            if ($_POST['role'] == 'doctor'){

                $params = $this->getDB()->table('doctor')->select()->fetchAll();
                return $this->extracted($params);

            }
            if ($_POST['role'] == 'manager'){

                $params = $this->getDB()->table('manager')->select()->fetchAll();
                return $this->extracted($params);

            }
            if ($_POST['role'] == 'sick'){

                $params = $this->getDB()->table('patient')->select()->fetchAll();
                foreach ($params as $param){
                    if ($_POST['username'] == $param->full_name && $_POST['passwrod']== $param->passwrod ){
                        Session::setSession(new Session($_POST['username'], $_POST['role']));
                        return $this->render('home', $params);
                    }
                }
                $this->setLayout('auth');
                return $this->render('signup');

            }
            return $this->render('/');
        }

        $this->setLayout('auth');
        return $this->render('login');
    }

    /**
     * @param $params
     * @return string
     */
    public function extracted($params): string
    {
        foreach ($params as $param) {
            if ($_POST['username'] == $param->full_name) {
                foreach ($params as $param2) {
                    if ($param->confirmation_status == '0') {
                        $this->setLayout('auth');
                        return $this->render('alertStatus');
                    }
                }
                Session::setSession(new Session($_POST['username'], $_POST['role']));
                return $this->render('home', $params);
            }
        }
        $this->setLayout('auth');
        return $this->render('signup');
    }

    public function logout()
    {
        Session::destroy();
        header('Refresh:0');
        $this->show();
    }
}