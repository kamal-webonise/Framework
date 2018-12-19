<?php

class DatabaseFactory {
    public static function getDatabaseInstance() {
        
        global $db;
        $dbConfigName = $db['dbserver'];
        $dbConfigName = self::getDatabaseName($db['dbserver']);

        if(!empty($dbConfigName)) {
            return $dbConfigName::getInstance($db);
        }
        ErrorLog::Exception("Provide database server name in database_config.php");
        throw new Exception('Provide database server name in database_config.php');
    }

    public static function getDatabaseName($name) {
        return ucfirst($name);
    }
}
