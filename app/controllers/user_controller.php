<?php

class UserController extends Controller{
	public $model, $view;
	public $databaseConnection;

	function __construct( $tile )
	{
		$this->model = new $tile;
		parent::__construct("user", "home"); // Note: Remove this line after actual controller is implemented
		$this->databaseConnection = DatabaseFactory::getDatabaseInstance();
		$this->loadModel('UserModel'); // initialize the model class
		$this->view = new View();

	}

	public function register() {
		$this->view->render('register/register');
	}
}
?>
