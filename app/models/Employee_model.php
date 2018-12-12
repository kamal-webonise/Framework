<?php 

 require_once "../../database/mysqldatabase.php";

 class Employee_model { 

	private $ID; 
	private $FirstName; 
	private $LastName; 
	private $Email_ID; 
	private $Mobile_No; 
	private $Address; 
	private $mysqldatabase; 

	public function __construct(){
		$this->mysqldatabase = new MysqlDatabase(); 
	}

 	public function  setID($ID){  
		$this->ID = $ID; 
 	}
 
 	public function  setFirstName($FirstName){  
		$this->FirstName = $FirstName; 
 	}
 
 	public function  setLastName($LastName){  
		$this->LastName = $LastName; 
 	}
 
 	public function  setEmail_ID($Email_ID){  
		$this->Email_ID = $Email_ID; 
 	}
 
 	public function  setMobile_No($Mobile_No){  
		$this->Mobile_No = $Mobile_No; 
 	}
 
 	public function  setAddress($Address){  
		$this->Address = $Address; 
 	}
 
 	public function  getID(){  
		 return $this->ID; 
 	}
 
 	public function  getFirstName(){  
		 return $this->FirstName; 
 	}
 
 	public function  getLastName(){  
		 return $this->LastName; 
 	}
 
 	public function  getEmail_ID(){  
		 return $this->Email_ID; 
 	}
 
 	public function  getMobile_No(){  
		 return $this->Mobile_No; 
 	}
 
 	public function  getAddress(){  
		 return $this->Address; 
 	}
 
	public function fetch(){ 
		return $this->mysqldatabase->query("SELECT * FROM Employee");
	}

	public function insert(){ 
		$this->mysqldatabase->insert("Employee",["ID" => $this->ID,"FirstName" => $this->FirstName,"LastName" => $this->LastName,"Email_ID" => $this->Email_ID,"Mobile_No" => $this->Mobile_No,"Address" => $this->Address]);
	}

	public function update(){ 
		$this->mysqldatabase->update("Employee",$this->ID,["FirstName" => $this->FirstName,"LastName" => $this->LastName,"Email_ID" => $this->Email_ID,"Mobile_No" => $this->Mobile_No,"Address" => $this->Address]);
	}

	public function delete(){ 
		$this->mysqldatabase->delete("Employee",$this->ID);
	}

}