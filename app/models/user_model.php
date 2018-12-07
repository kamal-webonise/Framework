<?php

class UserModel
{
	private $pdo;

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
}
?>
