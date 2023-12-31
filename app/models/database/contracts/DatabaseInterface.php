<?php
namespace app\app\models\database\contracts;
interface DatabaseInterface {
    public function __construct(MySqlDatabaseConnection $connection);
    public function table(string $table) : DatabaseInterface;
    public function select(array $cols = ['*']) : DatabaseInterface;
    public function insert(array $fields) : DatabaseInterface;
    public function update(array $fields) : DatabaseInterface;


    public function where(string $val1, string $val2, string $operation = '='): DatabaseInterface;
    public function fetch();
    public function fetchAll();
    public function exec() : bool;
}

