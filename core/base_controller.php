<?php

class BaseController {
  
  private $model;

  function __construct($modelName) {
    $this->model = $modelName;
  }

  public function all() {
    $baseModelObj = new BaseModel;
    $baseModelObj->all($this->model);
  }

  public function firstRecord() {
    echo "First Record";
  }

  public function lastRecord() {
    echo "Last Record";
  }

  public function find() {
    echo "find";
  }
}
?>
