<?php
class UserController extends BaseController {
	private $model;
	private $view;
	function __construct($modelName)
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
      	
  	}
  	public function getUser() {
      $this->view->postedData($this->databaseConnection->query('select * from users')->results());
      $this->view->render('home/about');
  	}
  	function signup() {
		$this->view->render('signup');	
	}
	function register(){
		$arr = ["name" => $_POST['name'],
				"email" =>$_POST['email'],
				"password" => $_POST['password']
				];
		
		$this->view->postedData($arr);
		$res=$this->modelName->insert($this->view->getpostedData());
		if($res==1){
			echo "Record Inserted Successfully";
		}
		else{
			echo "Record Cannot be Inserted";
		}
		//print_r($this->view->getpostedData());
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