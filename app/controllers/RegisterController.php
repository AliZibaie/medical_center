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
            $body = Application::getApp()->getRequest()->getBody();


            $dataToValidate = ['username' => $body['username'] , 'password' => $body['password'],  'role' => $body['role']  ];

            $rules = [
                'username' => ['required', 'min:5','max:10'],
                'password' => 'required|min:10',
                'role' => 'required'
            ];

            $messages = [
                'required' => 'The :attribute field is required.',
                'min' => 'the min length for :attribute is :min',
                'max' => 'the min length for :attribute is :max,'
            ];

            $validator = getValidator($dataToValidate, $rules, $messages);


            if ($validator->fails()) {
                $errors = $validator->errors();
                $showMessages = [];
                foreach ($errors->all() as $message) {
                    $showMessages[]=   "<p class='text-red-500 italic'>$message</p>";
                }
            }

            if ($_POST['role'] == 'doctor' && !$errors){
                $params = $this->getDB()->table('doctor')->select()->fetchAll();
                $newUser = ['full_name'=>$_POST['username'],'password'=>$_POST['password'] ];
                if ($this->check($params)){
                    $this->getDB()->table('doctor')->insert($newUser)->exec();
                    return  $this->render('login');
                }
            }
            if ($_POST['role'] == 'manager' && !$errors){
                $params = $this->getDB()->table('manager')->select()->fetchAll();
                $newUser = ['full_name'=>$_POST['username'],'password'=>$_POST['password'] ];
                if ($this->check($params)){
                    $this->getDB()->table('manager')->insert($newUser)->exec();
                    return  $this->render('login');
                }
            }
            if ($_POST['role'] == 'sick' && !$errors){
                $params = $this->getDB()->table('patient')->select()->fetchAll();
                $newUser = ['full_name'=>$_POST['username'],'password'=>$_POST['password'] ];
                if ($this->check($params)){
                    $this->getDB()->table('patient')->insert($newUser)->exec();
                    return  $this->render('login');
                }
            }
            return $this->render('signup', $showMessages);
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