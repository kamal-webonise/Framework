<?php

class SessionFactory{
    
    public static function getType(){
        $sessionType='Session'.ucwords(strtolower(SESSION_TYPE));
        return new $sessionType;
    }
}