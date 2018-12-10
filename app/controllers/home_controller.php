<?php

class HomeController extends Controller {
    public $model, $view;
    private $databaseConnection;

	function __construct()
	{
		//$this->model = new $tile;
		parent::__construct("home", "firsthome"); // Note: Remove this line after actual controller is implemented
        $this->view = new View();
        $this->databaseConnection = DatabaseFactory::getDatabaseInstance();
    }
    
    public function insertUser() {

		$postArray = array(
			"username" => $_POST['username'],
			"email" => $_POST['email'],
			"password" => $_POST['password']
		);
		$this->view->postedData($postArray);
		print_r($this->view->dataArray);
		$this->databaseConnection->insert('users', $postArray);
    }

    public function getUser() {
        $this->view->postedData($this->databaseConnection->query('select * from users')->results());
        $this->view->render('home/home');
    }
}
