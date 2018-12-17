<?php
    class SessionFile extends SessionCore{
   
        public function createSession($uuid=0,$expiresAt=0,$userID=0){
            $secretKey = 'gsfhs154aergz2#';
            if ( !session_id() ) {
                session_start();
            }
            $sessionId = session_id();
            $_SESSION['user_session']=sha1($sessionId.$secretKey).",".$userID;
            ini_set('session.gc_maxlifetime', SESSION_DEFAULT_TIMEOUT);
            return sha1($sessionId.$secretKey);
        }

        public function getSession($userID=0, $uuid=0) {
            if (!isset($_SESSION['user_session'])){
                return;
            }
            return $_SESSION['user_session'];
        }
        public function updateSession($id=0,$uuid=0,$expiresAt=0,$userID=0) {
            if (!isset($_SESSION['user_session'])){
                throw new Exception("Session Not Found !");
            }else{
                ini_set('session.gc_maxlifetime', SESSION_DEFAULT_TIMEOUT);             
            }
        }
        public function deleteSession($id=0){
            session_unset();
            session_destroy();
        }
        public function deleteUserSession($userId=0) {}
}
?>