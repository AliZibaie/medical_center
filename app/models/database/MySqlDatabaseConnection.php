<?php
namespace app\app\models\database;
USE PDO;
USE app\app\models\database\contracts\DatabaseConnectionInterface;
class MySqlDatabaseConnection implements \app\app\models\database\contracts\DatabaseConnectionInterface
{

    private static $obj;
    private PDO $pdo;
    private array $config;
    private function __construct()
    {
        $this->config = include(__DIR__ . '/../../config/database.php');
        $this->pdo = $this->connect();
    }

    public function connect()
    {
        $driver = $this->config['driver'];
        $dbname = $this->config['dbname'];
        $host = $this->config['host'];
        $username = $this->config['username'];
        $password = $this->config['password'];

        $dsn = "$driver:host=$host;dbname=$dbname";

        $pdo = new PDO($dsn, $username, $password);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
    public function getConnection(): PDO
    {
        if (isset($this->pdo)){
            return $this->pdo;
        }
        return $this->connect();
    }
    public static function getInstance()
    {
        if (!isset(self::$obj)) {
            self::$obj = new self;
        }
        return self::$obj;
    }

}