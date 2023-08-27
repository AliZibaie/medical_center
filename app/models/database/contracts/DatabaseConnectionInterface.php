<?php
namespace app\app\models\database\contracts;
use PDO;

interface DatabaseConnectionInterface {
    public static function getInstance();
    public function getConnection() : PDO;
}