<?php

class MiddlewareFactory{
    
    public static function getType(){
        $middlewareType='Middleware'.ucwords(strtolower(SESSION_TYPE));
        return new $middlewareType;
    }
}