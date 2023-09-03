<?php

namespace app\app\ORM\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Doctor
{
    private static $capsule;
    public static function boot(): void
    {
        $config = [
            'connections' => [
                'mysql' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' => 'medical_center',
                    'username' => 'root',
                    'password' => ''
                ]
            ]
        ];

        $capsule = new Capsule;
        $capsule->addConnection($config['connections']['mysql']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        self::$capsule = $capsule;
    }
    public static function showStatus1()
    {
        self::boot();
        return self::$capsule->table('doctor')->select()->where('confirmation_status', 1)->get();
    }
    public static function showStatus0()
    {
        self::boot();
        return self::$capsule->table('doctor')->select()->where('confirmation_status', 0)->get();
    }
    public static function showVisit()
    {
        self::boot();
        return self::$capsule->table('doctor')->select()->where('confirmation_status', 1)->get();
    }
    public static function showWeek()
    {
        self::boot();
        return self::$capsule->table('doctor')->select()->where('confirmation_status', 0)->get();
    }
}