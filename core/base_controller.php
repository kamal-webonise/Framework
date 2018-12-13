<?php
class BaseController {
  public $modelName = '';  
  public function __construct() {
    $this->getModelName();
    $this->modelName = new $this->modelName();
  }
  public function index() {
    //print_r();
    $this->modelName->showProperty();
  }
  public function lastRecord() {    
  }
  public function firstRecord() {
    
  }
  private function getModelName() {
    $this->modelName = str_replace('Controller', 'Model' , get_class($this));
  }
}
?>