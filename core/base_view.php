<?php
class BaseView{

    protected $body, $siteTitle = SITE_TITLE, $layout = DEFAULT_LAYOUT;
    private $dataArray;

    public function __construct() {
    }

    public function render($viewName, $dataArray = []) {
        // dataArray is accessible data array on view file
        if(is_array($dataArray)) {
            $this->dataArray = $dataArray;
        }
        else {
            ErrorLog::Exception('Pass an array instead');
            throw new Exception('Pass an array instead');
        }

        if(file_exists(ROOTPATH . '/app/views/' . $viewName . '.php')){
            // starting the buffer to get all the view contents
            ob_start();
            include(ROOTPATH . '/app/views/' . $viewName . '.php');
            $this->body = ob_get_clean();

            include(ROOTPATH . '/app/views/layouts/' .$this->layout. '.php');
        }
        else{
            ErrorLog::Exception('The View \"'.$viewName.'\" does not exist.');
            throw new Exception('The View \"'.$viewName.'\" does not exist.');
        }
    }

    public function content() {
        return $this->body;
    }

    public function siteTitle() {
        return $this->siteTitle;
    }

    public function setSiteTitle($title) { 
        $this->siteTitle = $title;
    }

    public function setLayout($path){
        $this->layout = $path;
    }
}
