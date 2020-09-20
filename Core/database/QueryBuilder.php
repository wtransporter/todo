<?php

namespace App\Core\Database;

Use PDO;

class QueryBuilder
{
    protected $pdo;
    protected $stmt;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function save($table, $data)
    {
        $fields = $this->sqlFields($data);

        $this->stmt = $this->pdo->prepare("INSERT INTO {$table} SET {$fields}");

        $this->bindFields($this->stmt, $data);

        $this->execute();
    }

    public function update($table, $data, $id)
    {
        $fields = $this->sqlFields($data);

        $this->stmt = $this->pdo->prepare("UPDATE `{$table}` SET {$fields} WHERE `id` = :id");

        $this->stmt->bindParam(':id', $id);

        $this->bindFields($this->stmt, $data);

        $this->execute();
    }

    public function delete($table, $id)
    {
        $this->stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");

        $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $this->execute();
    }

    public function getAll($table)
    {
        $this->stmt = $this->pdo->prepare("SELECT * FROM {$table}");

        $this->stmt->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function execute()
    {
        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function bindFields($stmt, $data)
    {
        foreach ($data as $key => $value) {
            $key = ':'.$key;
            $this->stmt->bindValue($key, $value);
        }
    }

    public function sqlFields(array $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key},";
        }
        return trim($fields, ',');
    }

}