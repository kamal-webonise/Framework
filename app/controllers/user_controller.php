<?php

<<<<<<< HEAD
class UserController extends Controller{
	public $model, $view;
	public $databaseConnection;
=======
class UserController extends BaseController {
	private $model;
>>>>>>> 114ac31b70d8af30e3f4db15cec6b3b7cd76ce85

	function __construct($modelName)
	{
<<<<<<< HEAD
		$this->model = new $tile;
		parent::__construct("user", "home"); // Note: Remove this line after actual controller is implemented
		$this->databaseConnection = DatabaseFactory::getDatabaseInstance();
		$this->loadModel('UserModel'); // initialize the model class
		$this->view = new View();

	}

	public function register() {
		$this->view->render('register/register');
=======
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
>>>>>>> 114ac31b70d8af30e3f4db15cec6b3b7cd76ce85
	}
}
?>
