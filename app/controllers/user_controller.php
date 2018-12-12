<?php

class UserController extends BaseController {
	private $view, $postGlobalArray;
	function __construct()
	{
		parent::__construct();
		$this->view = new BaseView();
  	}
    
  	public function insertUser() {

		$postArray = array(
			"email" => 'asdf',
			"password" => 'asdf'
		);
		
		print_r($postArray);
      	$result = $this->modelName->insertUser($postArray);
        print_r($result);
      	$this->view->postedData($postArray);
      	// $this->view->render('user');

      	//var_dump($result);

		// $this->view->postedData($postArray);
		// print_r($this->view->dataArray);
		// $this->databaseConnection->insert('users', $postArray);
  	}

  	public function getUser() {
      $this->view->postedData($this->databaseConnection->query('select * from users')->results());
      $this->view->render('home/about');
  	}

  	function signup() {
  		header( 'Location: /Framework/app/views/signup.html');
  	}

	public function login()
	{
		echo "Login Method";
	}
	
	public function showUsers() {
		$middleware=new Middleware;
		if($middleware->secureHandle()){
			$this->model->getUsers();
		}else{
			echo "Unauthorised";
		}
	}
}
