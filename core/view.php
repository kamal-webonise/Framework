<?php

class View{
    protected $_head,$_body,$_siteTitle,$_outputBuffer,$_layout=DEFAULT_LAYOUT;

    public function __construct()
    {

    }

    public function render($viewName)
    {
        $viewArr = explode('/',$viewName);
        $viewString = implode(DS,$viewArr);
        if(file_exists(Root . DS . 'app' . DS . $viewString . '.php')){
            include(Root . DS . 'app' . DS . $viewString . '.php');
            include(Root . DS . 'app' . DS . 'Views' . DS . 'layouts'. DS .$this->_layout. '.php');
        } 
        else{
            die('The View \"'.$viewName.'\" does not exist.');
        }
    }

    public function content($type)
    {
        if($type=='head'){
            return $this->head; 
        }
        else
        if($type=='body'){
            return $this->body;
        }
        return false;
    }

    public function start($type){
        $this->outputBuffer=$type;
        ob_start();
    }
    public function end($type){
        if($this->outputBuffer == 'head'){
            $this->head=ob_get_clean();
        }
        elseif($this->outputBuffer == 'body'){
            $this->body=ob_get_clean();
        }
        else{
            die('You Must First the Start Method');
        }
    }
    public function siteTitle(){
        return $this->_siteTitle;
    }
    public function setSiteTitle($title){
        $this->siteTitle=$title;
    }
    public function setLayout($path){
        $this->_layout=$path;
    }
}