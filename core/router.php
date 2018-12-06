<?php

class Router {
  const DEFAULT_CONTROLLER = "IndexController";
  const DEFAULT_ACTION     = "index";

  private $controller = self::DEFAULT_CONTROLLER;
  private $action = self::DEFAULT_ACTION;
  private $params = array();
  private $pathArray = array();

  private function parseUri() {

    if(isset($_SERVER['PATH_INFO'])) {
      $path= $_SERVER['PATH_INFO'];
      $pathSplit = explode('/', ltrim($path));
    }
    else {
      $pathSplit = '/';
    }
    $this->pathArray = $pathSplit;
  }

  private function setAction() {
    $this->action = isset($this->pathArray[2])? $this->pathArray[2] : '';
  }

  private function setParams() {
    $this->params = array_slice($this->pathArray, 3);
  }

  private function setController() {

    $reqController = $this->pathArray[1];
    $reqModel = $this->pathArray[1];
    $controllerPath = ROOTPATH . '/app/controllers/'.$reqController.'_controller.php';
    $modelPath = ROOTPATH . '/app/models/'.$reqModel.'_model.php';

    if (file_exists($controllerPath))
    {
      include_once $controllerPath;
      $model = ucfirst($reqModel).'Model';
      $this->controller = ucfirst($reqController).'Controller';

      $method = $this->action;
      
      if (file_exists($modelPath)) {
        include_once $modelPath;
        $ModelObj = new $model;
        $controllerObj = new $this->controller($model);
      }
      else {
        $controllerObj = new $this->controller();
      }

      if ($method != '') {
        if (method_exists($controllerObj, $method))
          $controllerObj->$method($this->params);
        else
          die('No Method Found');
      }
      else {
        // include_once '/var/www/html/Framework/app/controllers/index_controller.php';
        // $method = self::DEFAULT_ACTION;
        // $this->controller = self::DEFAULT_CONTROLLER;
        // $controllerObj = new $this->controller();
        // $controllerObj->$method();
        echo "We will set a default path";
      }
    }
    else {
      header('HTTP/1.1 404 Not Found');
      die('404 - The file - '.' - not found');
    }
  }

  public function run() {
    $this->parseUri();
    $this->setAction();
    $this->setParams();
    $this->setController();
  }
}
?>
