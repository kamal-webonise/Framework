<?php
class Database {
    private static $instance = null;
    private $pdo, $query, $error = false, $result, $count = 0, $lastInsertId = null;
    
    // connection fields
    private $databaseServer, $host, $databaseName, $user, $password;
    
    /*
    Database connection having a Singleton Design Pattern.
    Note: get all the fields from a config file once it is created 
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
            self::$instance = new Database($dbConfigArray);
        }

        // set connection to global object
        return self::$instance;
    }
}