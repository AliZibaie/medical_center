<?php
class MySqlDatabase implements DatabaseInterface {

private $connection;
private $sql;

public function __construct(MySqlDatabaseConnection $connection) {
$this->connection = $connection->getConnection();
return $this->connection;
}

//public function table(string $table) : DatabaseInterface {
//$this->query = 'SELECT * FROM ' . $table;
//return $this;
//}
//
//public function select(array $cols=['*']) : DatabaseInterface {
//
//return $this;
//}
//
//public function insert(array $fields) : DatabaseInterface {
//$this->query = 'INSERT INTO ' . $table . ' (' . implode(', ', array_keys($fields)) . ') VALUES (' . implode(', ', array_values($fields)) . ')';
//return $this;
//}
//
//public function update(array $fields) : DatabaseInterface {
//$this->query = 'UPDATE ' . $table . ' SET ' . implode(', ', array_map(function ($k, $v) {
//return $k . ' = ' . $v;
//}, array_keys($fields), array_values($fields)));
//return $this;
//}
//
//public function where(string $val1, string $val2, string $operation = '=') : DatabaseInterface {
//$this->query .= ' ' . $operation . ' ' . $val2;
//return $this;
//}

//public function fetch() {
//$stmt = $this->connection->prepare($this->query);
//$stmt->execute();
//return $stmt->fetchAll();
//}
//
//public function fetchAll() {
//$stmt = $this->connection->prepare($this->query);
//$stmt->execute();
//return $stmt->fetchAll(PDO::FETCH_ASSOC);
//}
//
//public function exec() : bool {
//$stmt = $this->connection->prepare($this->query);
//return $stmt->execute();
//}
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
