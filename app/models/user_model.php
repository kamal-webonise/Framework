<?php

class UserModel extends Model
{
	private $pdo;

<<<<<<< HEAD
	public function __construct() {
		parent::__construct('users');
		$this->pdo = DatabaseFactory::getDatabaseInstance();
=======
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
>>>>>>> 114ac31b70d8af30e3f4db15cec6b3b7cd76ce85
	}
	
	public function setUser(){
		$postedArray = ['username' => '', 'email' => '', 'password' => '', 'confirm' => ''];
		$this->pdo->insert();
	}

}
?>
