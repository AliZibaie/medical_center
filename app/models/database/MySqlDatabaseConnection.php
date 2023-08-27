<?php
class MySqlDatabaseConnection implements DatabaseConnectionInterface {

    private static $obj;
    private  $pdo;
    private final function __construct()
    {
      $this->pdo = new PDO("mysql:host=localhost;dbname=mydb", 'root', "");
    }
    public function getConnection():PDO
    {
        return $this->pdo;
    }
    public static function getInstance()
    {
        if (!isset(self::$obj)) {
            self::$obj = new self;
        }
        return self::$obj;
    }

}