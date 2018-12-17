<?php
class MiddlewareFile extends MiddlewareCore{
    
    private $sessionFactory;

    public function __construct(){
        $this->sessionFactory=SessionFactory::getType();
    }
    
    public function secureHandle()
    {
        if(!$this->updateSession()){
			throw new Exception("Unauthenticated User. Logging Out !");
        }
        return true;
    }

    public function updateSession(){
		$isAuthorised=$this->authenticateUser();
		if(!$isAuthorised){
			$this->sessionFactory->deleteSession();
			throw new Exception("Unauthenticated User. Logging Out !");
        }
		$this->sessionFactory->updateSession();
		return true;
    }
    
	public function authenticateUser(){
		$userSession=explode(",",$this->sessionFactory->getSession());
		if(empty($userSession) || $userSession[0]==""){
            echo "Unauthenticated User";
			throw new Exception("Session data not found !");
        }
        return true;
	}
}
?>