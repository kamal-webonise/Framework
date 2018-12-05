<?php
        require_once "../../config/database_config.php";
    require_once "../../database/database_connection.php";

    
    $database=Database::getInstance($db);
    //$result=$database->showAll();
    $fields=[
        'name' => 'Nitin'
    ];
    //$result=$database->update("TestTable",1, $fields);
    //$result=$database->insert("TestTable", $fields);
    $database->delete("TestTable",7);
?>