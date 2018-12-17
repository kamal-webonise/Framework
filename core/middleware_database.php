<?php
class MiddlewareDatabase extends MiddlewareCore{

    private $sessionFactory,$sessionFile;

    public function __construct(){
        $this->sessionFactory=SessionFactory::getType();
        $this->sessionFile=new SessionFile;
    }

    public function secureHandle()
    {
        if(!$this->updateSession()){
			throw new Exception("Unauthenticated User. Logging Out !");
        }
        return true;
    }
    
    public function authenticateUser(){
            $userSession=explode(",",$this->sessionFile->getSession());
            if(empty($userSession) || $userSession[0]==""){
                echo "Unauthenticated User";
                throw new Exception("Session data not found !");
            }
            $userDbSession=$this->sessionFactory->getSession($userSession[1],$userSession[0]);
            if(count($userDbSession)<1){
                throw new Exception("DB session data not found !");
            }
            if($this->sessionFactory->updateSession($userDbSession[0]->id,$userDbSession[0]->uuid,date('Y-m-d H:i:s',time() + (60 * 30)),$userDbSession[0]->user_id)){
                throw new Exception("Unable to update session data !");	
            }
            $sessionArray = array(
                "id" =>$userDbSession[0]->id,
                "uuid" => $userDbSession[0]->uuid,
                "expires_at" => date('Y-m-d H:i:s',time() + (60 * 30)),
                "user_id" => $userDbSession[0]->user_id
            );
            return $sessionArray;
        }
    
    public function updateSession(){
		$DbSessionData=$this->authenticateUser();
		if(count($DbSessionData)<1){
			$this->sessionFile->deleteSession();
			throw new Exception("Unauthenticated User. Logging Out !");
        }
        $DbSessionValues=array_values($DbSessionData);
		$expireTime=strtotime($DbSessionValues[2]);
		if (time()-$expireTime>=1800){
			$this->sessionFactory->deleteSession(array_search("id",array_keys($DbSessionData)));
			throw new Exception("Unauthenticated User. Logging Out !");
		}
		$this->sessionFile->updateSession();
		return true;
    }
}