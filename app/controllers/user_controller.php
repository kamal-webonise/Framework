<?php

class UserController extends BaseController {
	private $model;

	function __construct($modelName)
	{
		$this->model = new $modelName;
		parent::__construct($modelName);
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		echo "Login Method";
	}
	
	public function showUsers() {
		$this->model->getUsers();
	}
}
?>
