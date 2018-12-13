<?php 

 require_once "../../database/mysqldatabase.php";

 class TestTable_model { 

	private $id; 
	private $name; 
	private $mysqldatabase; 

	public function __construct(){
		$this->mysqldatabase = new MysqlDatabase(); 
	}

 	public function  setId($id){  
		$this->id = $id; 
 	}
 
 	public function  setName($name){  
		$this->name = $name; 
 	}
 
 	public function  getId(){  
		 return $this->id; 
 	}
 
 	public function  getName(){  
		 return $this->name; 
 	}
 
}