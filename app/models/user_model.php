<?php

class UserModel extends Model
{
	private $pdo;

	public function __construct() {
		parent::__construct('users');
		$this->pdo = DatabaseFactory::getDatabaseInstance();
	}
	
	public function setUser(){
		$postedArray = ['username' => '', 'email' => '', 'password' => '', 'confirm' => ''];
		$this->pdo->insert();
	}

}
?>
