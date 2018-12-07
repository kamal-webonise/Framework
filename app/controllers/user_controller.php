<?php

class UserController extends BaseController {
	private $model;

	function __construct( $tile )
	{
		$this->model = new $tile;
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		echo "Login Method";
	}
	
	public function showUsers($modelName) {
		echo "hey";
		// $obj = new $modelName;
		$this->model->getUsers();
	}
}
?>
