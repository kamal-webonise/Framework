<?php
        //require_once "../../config/database_config.php";
    require_once "../../database/mysqldatabase.php";

    
    $database=new MysqlDatabase();
    //$result=$database->showAll();
    $fields=[
        'name' => 'Nitin'
    ];
    $database->connect();
    //$result=$database->update("TestTable",1, $fields);
    //$result=$database->insert("TestTable", $fields);
    //$database->delete("TestTable",7);
    $result=$database->query("SELECT * FROM TestTable");
    echo $result;
?>