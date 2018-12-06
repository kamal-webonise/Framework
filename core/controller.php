<?php
class Controller extends Application {
    protected $controller, $action;
    public $view;

    public function __construct($controller, $action) {
        // calling parent class
        parent::__construct();

        $this->controller = $controller;
        $this->action = $action;
        $this->view = new View();
    }
}