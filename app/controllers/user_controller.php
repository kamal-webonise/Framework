<?php

class UserController {
	private $model;

	function __construct( $tile )
	{
		$this->model = new $tile;
	}

	public function index()
	{
		header('Location: assets/html/registration.php');
	}

	public function login()
	{
	echo "Login Method";
	}
	
	public function showUsers($obj){
		print_r($this->model->getUsers());
		// print_r($obj);
	}
	
}

?>
