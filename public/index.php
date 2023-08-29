<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";

use app\app\controllers\DoctorController;
use app\app\controllers\DoctorsListController;
use app\app\controllers\LoginController;
use app\app\controllers\ManagementStatusSiteController;
use app\app\controllers\managersListController;
use app\app\controllers\ProfileController;
USE app\app\core\Application;

use  app\app\controllers\RegisterController;



$app = new Application(dirname(__DIR__));

//$app->getRouter()->get('/','home');


$app->getRouter()->get('/home','home');
$app->getRouter()->get('/','home');
$app->getRouter()->get('/departments','departments');


$app->getRouter()->get('/managerPanel','managerPanel');

$app->getRouter()->get('/managementStatus','managementStatus');
$app->getRouter()->get('/profile',[ProfileController::class, 'show']);
$app->getRouter()->post('/managementStatus',[ManagementStatusSiteController::class, 'control']);
$app->getRouter()->get('/managementStatus',[ManagementStatusSiteController::class, 'show']);
$app->getRouter()->get('/signup',[RegisterController::class,'show']);
$app->getRouter()->post('/signup',[RegisterController::class,'show']);
$app->getRouter()->get('/login',[LoginController::class,'show']);
$app->getRouter()->post('/login',[LoginController::class,'show']);
$app->getRouter()->post('/home',[LoginController::class,'logout']);
$app->getRouter()->post('/departments',[LoginController::class,'logout']);
$app->getRouter()->post('/profile',[ProfileController::class,'show']);
$app->getRouter()->get('/doctorList',[DoctorController::class,'show']);
$app->getRouter()->get('/doctors',[DoctorsListController::class,'show']);
$app->getRouter()->get('/managers',[ManagersListController::class,'show']);
//$app->getRouter()->post('/alertStatus',[LoginController::class,'show']);
//$app->getRouter()->get('/signup','signup');


//$app->getRouter()->get('/managementStatus',[ManagementStatusSiteController::class, 'list']);


$app->run();
