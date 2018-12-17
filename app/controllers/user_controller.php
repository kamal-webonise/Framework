<?php

class UserController extends BaseController {

	function __construct()
	{
		parent::__construct();
	}

    
  	public function insertUser() {
      	$this->view->postedData($postArray);
      	$this->view->render('user');
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
		$this->view->render('login');
	}
	
	public function showUsers() {
		$middleware=new Middleware;
		if($middleware->secureHandle()){
			$this->modelName->getUsers();
		}else{
			echo "Unauthorised";
		}
	}
	public function deleteAccount() {
		$userSession = explode(",",$this->sessionFile->getSession());
		$userId = $userSession[1];
		if(SESSION_TYPE=="DATABASE"){
			$this->sessionFactory->deleteUserSession($userId);
		}
		$this->modelName->deleteUser($userId);
		$this->sessionFile->deleteSession();
		header("Location:/Framework/user/signup");		
	}
	
	function register(){
		$arr = ["name" => $_POST['name'],
				"email" =>$_POST['email'],
				"password" => $_POST['password']
				];
		
		$this->view->postedData($arr);
		$res=$this->modelName->insert($this->view->getpostedData());
		if($res==1){
			$this->view->render("login");
		}
		else{
			echo "Record Cannot be Inserted";
		}
	} 

	public function check()
	{
		$userSession=explode(",",$this->sessionFile->getSession());
		if(!(empty($userSession) || $userSession[0]=="")){
			$users=$this->modelName->getUserByEmail($_SESSION['email']);
			header("Location:/Framework/user/dashboard");
			return;
		}
		if(!session_id())
		{
			session_start();
		}
		$_SESSION['email']=$_POST['email'];
		$users=$this->modelName->getUserByEmail($_POST['email']);
		$_SESSION['name']=$users[0]->name;
		if(count($users)<1){
			throw new Exception("Email id not found !");
		}
		$userPassword=$this->modelName->getPasswordByEmail($users[0]->email);
		if(count($userPassword)<1){
			throw new Exception("Password not found !");
		}
		if($_POST['password']==$userPassword[0]->password) {
			$uuid=$this->sessionFile->createSession(0,0,$users[0]->id);

			if(SESSION_TYPE=="DATABASE"){
				$isInserted=$this->sessionFactory->createSession($uuid,date('Y-m-d H:i:s',time() + (60 * 30)),$users[0]->id);
				if(!$isInserted){
					throw new Exception("Unable to insert session data !");	
				}
				
			}
			header("Location:/Framework/user/dashboard");
		}else{
			
			die("Email id or password is incorrect !");
		}
	} 

	public function logout(){
		$userSession=explode(",",$this->sessionFile->getSession());		
		if(empty($userSession) || $userSession[0]==""){
			throw new Exception("Session data not found !");
		}
		if(SESSION_TYPE=="DATABASE"){

			$userDbSession=$this->sessionFactory->getSession($userSession[1],$userSession[0]);
			if(count($userDbSession)<1){
				throw new Exception("DB session data not found !");
			}
			$this->sessionFactory->deleteUserSession($userSession[1]);
		}
		$this->sessionFile->deleteSession();
		header("Location:/Framework/user/login");
	}

	function dashboard() {
		$middlewareObjType=MiddlewareFactory::getType();
		if($middlewareObjType->secureHandle()){
			$this->view->render('dashboard');
		}
	}
}
