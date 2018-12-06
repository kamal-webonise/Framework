<?php

class Application {

    public function __construct() {
        $this->setErrorReporting();
        $this->unregisterGlobalVariables();
    }

    private function setErrorReporting() {
        if(DEBUG) {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            
        }
        else {
            error_reporting(0);
            ini_set('display_errors', 0);
            ini_set('log_errors', 1);
            ini_set('error_log', ROOTPATH . ' tmp/logs/errors.log ' );
        }
    }

    private function unregisterGlobalVariables() {
        if(ini_get('register_globals')) {
            $globalsArray = ['_SESSION', '_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach($globalsArray as $globalsArrayElement) {
                foreach($GLOBALS[$globalsArrayElement] as $key => $value) {
                    if($GLOBALS[$key] === $value) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
    
}