<?php
namespace app\app\models\database\contracts;
interface DatabaseConnectionInterface {
    public static function getInstance();
    public function getConnection() : PDO;
}