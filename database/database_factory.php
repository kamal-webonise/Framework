<?php
class DatabaseFactory {

    public static function getDatabaseInstance($dbConfigName) {
        global $db;
        switch($dbConfigName) {
            case 'mysql' :
                return Mysql::getInstance($db);
            case 'pgsql' :
                return Pssql::getInstance($db);
            default :
                die('Provide database server name in database_config.php');
        }
    }
}