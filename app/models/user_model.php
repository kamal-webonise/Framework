<?php

class UserModel
{
	private $pdo;
    private $dbConnection;

	public function __construct() {
        global $db;
        $this->dbConnection = DatabaseFactory::getDatabaseInstance($db['dbserver']);
	}   
	
	public function getUsers() {
		
		$user = [
		["name" => "Williams Isaac", "Phone Number" => "090982xxxxxx"],
		["name" => "Oji Mike", "Phone Number"=> "080982xxxxxx"]
		];
		print_r($user);
		global $db;
		$pdo = DatabaseFactory::getDatabaseInstance($db['dbserver']);
		$users = $pdo->query("select * from users");
		
		print_r(json_encode($users));
	}

	public function getUserByEmail($email){
		$sql="SELECT * from users where email='{$email}'";
		$result=$this->dbConnection->query($sql);
		
		return $result->results();		
	}

	public function getPasswordByEmail($email){
		$sql="SELECT password from users where email='{$email}'";
		$result=$this->dbConnection->query($sql);
		
		return $result->results();		
	}
}
?>
