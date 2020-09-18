<?php

namespace App\Core\Database;

Use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function save($table, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key},";
        }
        $fields = trim($fields, ',');

        $statement = $this->pdo->prepare("INSERT INTO {$table} SET {$fields}");

        foreach ($data as $key => $value) {
            $statement->bindParam(":{$key}", $value);
        }

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($table)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

}