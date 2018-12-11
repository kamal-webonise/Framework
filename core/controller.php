<?php
class Controller extends Application {
    protected $controller, $action;
    public $view;

    public function __construct($model, $controller, $action) {
        // calling parent class
        parent::__construct();
        $model->$action();
/*
        $this->controller = $controller;
        $this->action = $action;
        $this->view = new View();*/
    }

    protected function loadModel($model) {
        if(class_exists($model)) {
            $this->$model = new $model($model);
        }
    }
}
 