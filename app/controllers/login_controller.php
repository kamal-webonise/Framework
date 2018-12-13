<?php

class LoginController extends BaseController {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		$userModel= new UserModel;
		$users=$userModel->getUserByEmail($_POST['email']);
		if(count($users)<1){
			throw new Exception("Email id not found !");
		}
		$userPassword=$userModel->getPasswordByEmail($users[0]->email);
		if(count($userPassword)<1){
			throw new Exception("Password not found !");
		}
		if($_POST['password']==$userPassword[0]->password) {
			$session=new Session;
			$uuid=$session->createSession($users[0]->id);
			$sessionModel=new SessionModel;
			$isInserted=$sessionModel->insertSession($uuid,date('Y-m-d H:i:s',time() + (60 * 30)),$users[0]->id);
			if(!$isInserted){
				throw new Exception("Unable to insert session data !");	
			}
			$this->view->postedData($users);
			$this->view->render('dashboard');

		}else{
			throw new Exception("Email id or password is incorrect !");
		}
	}
	public function renderLogin(){
		header('Location:/Framework/app/views/login.html');
	}
	public function showUsers() {
		$userId = $_Session['id'];
		echo $userId;
	}
}
?>
