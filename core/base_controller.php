<?php

class BaseController {

  public function __construct() {}

  public function index() {
    $this->modelName = new $this->model();
    $result = $this->modelName->index();
  }

  public function insert() {
    $this->modelName = new $this->model();
    $result = $this->modelName->insert();
  }

  public function update() {
    $this->modelName = new $this->model();
    $result = $this->modelName->update();
  }

  public function delete() {
    $this->modelName = new $this->model();
    $result = $this->modelName->delete();
  }
}

?>
