<?php 

 require_once "../../database/mysqldatabase.php";

 class TestTable{ 

	private $id; 
	private $name;
	private $mysqldatabase; 

	private function __construct(){
		$this->mysqldatabase = new MysqlDatabase(); 
	}

 	private function  setId($id){  
		$this->id = $id; 
	}
	
 	private function  setName($name){  
		$this->name = $name; 
 	}
 
	public function insert(){ 
		$this->mysqldatabase->insert("TestTable",[$id => $this->id,$name => $this->name]);
	}

	public function update(){ 
		$this->mysqldatabase->update("TestTable",$this->id,[$name => $this->name]);
	}

	public function delete(){ 
		$this->mysqldatabase->delete("TestTable",$this->id)
	}

}