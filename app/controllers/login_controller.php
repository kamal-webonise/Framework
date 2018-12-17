<?php

class LoginController extends BaseController {

	private $sessionFactory,$sessionFile;		

	function __construct()
	{
        $this->sessionFactory=SessionFactory::getType();
		$this->sessionFile=new SessionFile;
		parent::__construct();
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		$userModel= new UserModel;
		$userSession=explode(",",$this->sessionFile->getSession());
		if(!(empty($userSession) || $userSession[0]=="")){
			$users=$userModel->getUserByEmail($_SESSION['email']);
			header("Location:/Framework/user/dashboard");
			return;
		}
		if(!session_id())
		{
			session_start();
		}
		
		$_SESSION['email']=$_POST['email'];
		$users=$userModel->getUserByEmail($_POST['email']);
		$_SESSION['name']=$users[0]->name;
		if(count($users)<1){
			throw new Exception("Email id not found !");
		}
		$userPassword=$userModel->getPasswordByEmail($users[0]->email);
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
	public function renderLogin(){
		$this->view->render("login");
	}
	public function showUsers() {
		$userId = $_Session['id'];
		echo $userId;
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
		$this->view->render("login");
	}
}
?>
