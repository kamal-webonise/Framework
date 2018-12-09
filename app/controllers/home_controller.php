<?php

class HomeController extends Controller {
    public $model, $view;

	function __construct()
	{
		//$this->model = new $tile;
		parent::__construct("home", "firsthome"); // Note: Remove this line after actual controller is implemented
		$this->view = new View();
    }
    
    function firsthome($name) {
        $this->view->render('home/index');
    }

    function about($name) {
        $this->view->render('home/about');
    }

    function contact($name) {

    }
}