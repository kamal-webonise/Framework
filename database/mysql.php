<?php

class Mysql implements DatabaseInterface {

    private static $instance = null;
    private $pdo, $query, $error = false, $result, $count = 0, $lastInsertId = null;
    
    // connection fields
    private $databaseServer, $host, $databaseName, $user, $password;
    
    /*
        Database connection having a Singleton Design Pattern.
    */
    private function __construct($dbConfigArray) {
        
        // connection fields
        $this->databaseServer = $dbConfigArray['dbserver'];
        $this->host = $dbConfigArray['hostname'];
        $this->databaseName = $dbConfigArray['database'];
        $this->user = $dbConfigArray['username'];
        $this->password = $dbConfigArray['password'];

        try {
            $this->pdo = new PDO($this->databaseServer.':host='.$this->host.';dbname='.$this->databaseName,$this->user,$this->password);
        }
        catch (PDOException $pdoException){
            die($pdoException->getMessage());
        }
    }
    
    public static function getInstance($dbConfigArray) {

        if(!isset(self::$instance)) {
            self::$instance = new Mysql($dbConfigArray);
        }

        return self::$instance;
    }
    
    // Method to get records and also to query insert, update and delete
    public function query($sql, $params = []) {
        $this->error = false;
        if($this->query = $this->pdo->prepare($sql)) {
            $paramCount = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->query->bindValue($paramCount, $param);
                    $paramCount++;
                }
            }

            if($this->query->execute()) {
                $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->count = $this->query->rowCount();
                $this->lastInsertId = $this->pdo->lastInsertId();
            }
            else {
                $this->error = true;
            }
        }
        return $this;
    }

    public function insert($table, $fields = []) {
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach($fields as $field =>$value) {
            $fieldString .= '`' . $field . '`,'; 
            $valueString .= '?,';
            $values[] = $value;
        }

        // Remove extra ',' seperators
        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');

        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES({$valueString})";
        if($this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $id, $fields = []) {
        $fieldString = '';
        $values = [];

        foreach($fields as $field => $value) {
            $fieldString .= ' ' . $field . ' = ?,';
            $values[] = $value;
        }
        // Remove any extra white spaces 
        $fieldString = trim($fieldString);
        // Remove ending ','
        $fieldString = rtrim($fieldString, ',');

        $sql = "UPDATE {$table} SET {$fieldString} WHERE id = {$id}";
        if($this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        if($this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function results() {
        return $this->result;
    }

    public function first() {
        return (!empty($this->result)) ? $this->result[0] : [];
    }

    public function count() {
        return $this->count;
    }

    public function lastInsertId() {
        return $this->lastInsertId;
    }

    public function getColumns($table) {
        return $this->query("SHOW COLUMNS FROM {$table}")->results();
    }

    public function error() {
        return $this->error;
    }
}