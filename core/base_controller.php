<?php

class BaseController {

  public $modelName = '', $view;

  public function __construct() {
    $this->setModelName();
    $this->sessionFactory=SessionFactory::getType();
		$this->sessionFile=new SessionFile;
    $this->modelName = new $this->modelName();
    $this->view = new BaseView();
  }

  public function redirect($path) {
    header("Location:".$path);
  }

  public function index() {
    print_r($this->modelName->index());
  }
  
  private function setModelName() {
    $this->modelName = str_replace('Controller', 'Model' , get_class($this));
  }
}

?>
