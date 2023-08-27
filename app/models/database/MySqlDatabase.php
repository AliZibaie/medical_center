<?php

use app\app\models\database\contracts\DatabaseInterface;
use app\app\models\database\MySqlDatabaseConnection;


class MySqlDatabase implements DatabaseInterface {

private MySqlDatabaseConnection $instance;
private PDO $connection;
private $sql;

public function __construct(MySqlDatabaseConnection|\app\app\models\database\contracts\MySqlDatabaseConnection $instance) {
$this->instance = $instance;
$this->connection = $instance->getConnection();
return $this->connection;
}

    public function table(string $table) : DatabaseInterface
    {
        $this->sql = ' ' . $table;
        return $this;
    }

    public function select(array $cols = ['*']) : DatabaseInterface
    {
        $this->sql = ' SELECT ' . implode(', ', $cols) .'FROM '. $this->sql;
        return $this;
    }

    public function insert(array $fields) : DatabaseInterface
    {
        $this->sql = ' INSERT INTO ' . $this->sql . ' (' . implode(', ', array_keys($fields)) . ') VALUES (\'' . implode('\', \'', array_values($fields)) . '\')';
        return $this;
    }

    public function update(array $fields) : DatabaseInterface
    {

        $this->sql = ' UPDATE' . $this->sql . ' SET  ' . implode(', ', array_keys($fields)) . ' = \'' . implode('\', \'', array_values($fields)) . '\'';
        return $this;


//        $this->sql = ' UPDATE ' . $this->sql . ' SET ' . implode(', ', array_map(function ($key, $value) {
//                return $key . ' = ' . $value;
//            }, $fields));
//        return $this;
    }

    public function where(string $val1, string $val2, string $operation = '=') : DatabaseInterface
    {
        $this->sql .= ' WHERE ' . $val1 . ' ' . $operation . ' ' . $val2;
        return $this;
    }

    public function fetch()
    {
        $stmt = $this->connection->prepare($this->sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function fetchAll()
    {
        $stmt = $this->connection->prepare($this->sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function exec() : bool
    {
        return $this->connection->prepare($this->sql)->execute();
    }

    public function delete() : bool
    {
        $this->sql .= ' DELETE FROM ' . $this->table;
        return $this->exec();
    }

    public function count() : int
    {
        $this->sql .= ' COUNT(*) AS total';
        $row = $this->fetch();
        return $row['total'];
    }



}
