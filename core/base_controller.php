<?php

class BaseController {
  
  public function all($modelName) {
    $baseModelObj = new BaseModel;
    $baseModelObj->all($modelName);
  }

  public function firstRecord($modelName) {
    echo "First Record";
  }

  public function lastRecord($modelName) {
    echo "Last Record";
  }

  public function find($modelName) {
    echo "find";
  }
}

?>