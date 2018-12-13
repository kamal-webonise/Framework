<?php
class EmpController extends BaseController {
	private $model;
	private $view;
	function __construct($modelName)
	{
		//$this->model = new $modelName;
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
		$this->view->render('signup');
		
  	}
	public function login()
	{
		echo "Login emp";
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