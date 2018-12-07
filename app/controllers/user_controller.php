<?php

class UserController extends Controller{
	private $model;

	function __construct( $tile )
	{
		$this->model = new $tile;
		parent::__construct("user", "home"); // Note: Remove this line after actual controller is implemented
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		echo "Login Method";
	}
	
	public function showUsers($obj){
		print_r($this->model->getUsers($obj));
		print_r($obj);
	}

	public function home($name) {
		print_r($name);
		$this->view->render('home/index');
	}
}
?>
