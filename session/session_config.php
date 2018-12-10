<!-- <?php
    class Session{

    public function createSession(){
        $secretKey = 'gsfhs154aergz2#';
        if ( !session_id() ) {
            session_start();
        }
        $sessionId = session_id();
        setcookie("user_session",$sessionId.$secretKey, time() + (60 * 30), "/");

        return sha1($sessionId.$secretKey);
    }

    public function getSession(){
        if (!isset($_COOKIE['user_session'])){
            throw new Exception("Session Not Found !");
        }
        return $_COOKIE['user_session'];
    }
    public function updateSession(){
        if (!isset($_COOKIE['user_session'])){
            throw new Exception("Session Not Found !");
        }else{
            $value = $_COOKIE['user_session'];
            setcookie("user_session",$value, time() + (60 * 30), "/");        
        }
    }
    public function deleteSession(){
        unset($COOKIE['user_session']);
        setcookie('user_session', null, -1, '/');
    }
}
?> -->