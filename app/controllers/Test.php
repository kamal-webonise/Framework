<?php
    require_once "../../database/database_factory.php";

    $mysql=DatabaseFactory::getDatabaseInstance();
   // print_r($mysql);
    $res=$mysql->query("SELECT * FROM users");
    print_r($res);
    //echo "Hello";
?>