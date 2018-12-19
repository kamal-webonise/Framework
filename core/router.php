<?php

class Router {

  private $controller;
  private $action;
  private $params = array();
  private $pathArray = array();

  private function parseUri() {

    if(isset($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
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
    if(sizeof($this->pathArray) > 2)
      return $this->params = array_slice($this->pathArray, 3);
  }

  private function setController() {

    if( $this->pathArray === '/') {
      header("Location:/Framework/user/signup");
    }
    else {
      $reqController = $this->pathArray[1];
      $controllerPath = ROOTPATH . '/app/controllers/'.$reqController.'_controller.php';

      if (file_exists($controllerPath))
      {
        $this->controller = ucfirst($reqController).'Controller';
        $method = $this->action;
        
        $controllerObj = new $this->controller();

        if ($method != '') {
          if (method_exists($controllerObj, $method)) {
            if( sizeof($this->params) )
              $controllerObj->$method($this->params);
            else
              $controllerObj->$method();
          }
          else {
            $error = 'No such Method Found or 404 error';
            ErrorLog::Exception($error);
            die($error);
          }
        }
        else {
          echo "No method metioned. We will set a default path";
        }
      }
      else {
        $error = 'No Such Controller found. 404 - The file not found';
        ErrorLog::Exception($error);
        header('HTTP/1.1 404 Not Found');
        die($error);
      }
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
