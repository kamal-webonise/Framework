<?php

class UserModel
{
	private $pdo;

	public function getUsers(){
		$users = [
		["name" => "Williams Isaac", "Phone Number" => "090982xxxxxx"],
		["name" => "Oji Mike", "Phone Number"=> "080982xxxxxx"]
		];
		
		global $db;
		$pdo = DatabaseFactory::getDatabaseInstance($db['dbserver']);
		$users = $pdo->query("select * from users");
		
		return json_encode($users);
	}
}
?>
