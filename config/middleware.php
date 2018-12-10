<?php
class MiddleWare{
    
    public function generateToken(){
        $secretKey = 'gsfhs154aergz2#';
        if ( !session_id() ) {
            session_start();
        }
        $sessionId = session_id();
     
        return sha1( $formName.$sessionId.$secretKey );
    }
    public function checkToken( $token, $formName )
    {
        return $token === generateToken( $formName );
    }
}
?>
