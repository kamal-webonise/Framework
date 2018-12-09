<?php

class UserController extends Controller{
	public $model, $view;
	public $databaseConnection;

	function __construct( $tile )
	{
		$this->model = new $tile;
		parent::__construct("user", "home"); // Note: Remove this line after actual controller is implemented
		$this->view = new View();
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		$this->view->render('register/login');
	}
	
	public function showUsers($obj){
		print_r($this->model->getUsers($obj));
		print_r($obj);
	}

	public function getResult() {
		global $db;
		$this->databaseConnection = DatabaseFactory::getDatabaseInstance($db['dbserver']);

		$result = $this->databaseConnection->query("select * from users");
		print_r($result->getColumns("users"));

	}

	public function home($name) { // $name in case of getting parameters from url
		print_r($name); 
		$this->view->render('/home/index');
	}
}
?>
