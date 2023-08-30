<?php

namespace app\app\controllers;

use app\app\core\Application;
use app\app\core\SiteController;

class RelatedDoctorsController extends  SiteController
{
    public static function show($params): string
    {

        return (new RelatedDoctorsController)->render('relatedDoctors', $params);
    }

}