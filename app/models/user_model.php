<?php

class UserModel extends BaseModel
{

	public function __construct() {
        parent::__construct();
        // $this->databaseConnection = DatabaseFactory::getDatabaseInstance();
	}   

	function getUsers() {
		$users = $this->databaseConnection->query("select * from users")->results();
		
		print_r($users);
	}

	function getUserByEmail($email) {
		$sql="SELECT * from users where email='{$email}'";
		$result=$this->databaseConnection->query("SELECT * from users where email='{$email}'");
		return($result->results());
	}

	function getPasswordByEmail($email){
		$sql="SELECT password from users where email='{$email}'";
		$result=$this->databaseConnection->query($sql);
		
		return $result->results();		
	}

	function deleteUser($userId) {
		$result = $this->delete($userId);
	}

	function find() {
		$arr = [
			"conditions" => "email = ?",
			"bind" => ['vinay dubey'],
			/*"order" => "name",
			"limit" => "1"*/
		];
		return $this->databaseConnection->find('users', $arr);
	}
}
?>
