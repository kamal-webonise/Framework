<?php
    require_once "../../database/mysqldatabase.php";
    class UserModel{
        private $id;
        private $name;
        private $mysqldatabase;
        public function __construct(){
            $this->mysqldatabase=new MysqlDatabase();
        }
        
        public function setId($id){
            $this->id=$id;
        }
        public function setName($name){
            $this->name=$name;
        }
        public function insert(){
            $this->mysqldatabase->insert("TestTable",["Name" => $this->name]);
        }
        public function update(){
            $this->mysqldatabase->update("TestTable",$this->id,["Name" => $this->name]);
        }
        public function delete(){
            $this->mysqldatabase->delete("TestTable",$this->id);
        }
    }
?>