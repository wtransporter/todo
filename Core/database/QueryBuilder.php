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

    /**
     * Store data to database table
     * 
     * @param $table Database table name
     * @param array $data Array of data with coresponding fields
     */
    public function save($table, $data)
    {
        $fields = $this->sqlFields($data);

        $this->stmt = $this->pdo->prepare("INSERT INTO {$table} SET {$fields}");

        $this->bindFields($this->stmt, $data);

        $this->execute();
    }

    /**
     * Update record
     * 
     * @param $table Database table name
     * @param array $data Array of data with coresponding fields
     * @param int $id Primary key of the record
     */
    public function update($table, array $data, $id)
    {
        $fields = $this->sqlFields($data);

        $this->stmt = $this->pdo->prepare("UPDATE `{$table}` SET {$fields} WHERE `id` = :id");

        $this->stmt->bindParam(':id', $id);

        $this->bindFields($this->stmt, $data);

        $this->execute();
    }

    /**
     * Removes record from DB
     * 
     * @param $table Database table name
     * @param int $id Primary key of the record
     */
    public function delete($table, $id)
    {
        $this->stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");

        $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $this->execute();
    }

    /**
     * Fetch all records
     * 
     * @param $table Database table name
     */
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

    /**
     * Bind values from given array
     * 
     * @param $stmt Database prepared statement
     * @param array $data Array of data with coresponding fields
     */
    public function bindFields($stmt, array $data)
    {
        foreach ($data as $key => $value) {
            $key = ':'.$key;
            $this->stmt->bindValue($key, $value);
        }
    }

    /**
     * Extract fields from given array
     * 
     * @param array $data
     * 
     * @return string
     */
    public function sqlFields(array $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key},";
        }
        return trim($fields, ',');
    }

}