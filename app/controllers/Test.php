<?php
    /*    //require_once "../../config/database_config.php";
    require_once "../../database/mysqldatabase.php";

    
    $database=new MysqlDatabase();
    //$result=$database->showAll();
    $fields=[
        'name' => 'Dilip'
    ];
    //$database->connect();
    //$result=$database->update("TestTable",1, $fields);
    $result=$database->insert("TestTable", $fields);
    //$database->delete("TestTable",7);
    $result=$database->query("SELECT * FROM TestTable");
    print_r($result);*/
    require_once "../model/Employee_model.php";

    $employee=new Employee_model();
    $employee->setId(10);
    $employee->setFirstName("Vaibhav");
    $employee->setLastName("Tapadiya");
    $employee->setEmail_ID("vaibhavtpd@gmail.com");
    $employee->setMobile_No("8605992114");
    $employee->setAddress("Nashik");

    
    //$employee->insert();
    //$employee->update();
    //$employee->delete();
    //$res=$employee->fetch();
    //$query=get_object_vars(get_object_vars($res)['result'][1])['LastName'];
    //echo $res;
   // print_r($query);
?>