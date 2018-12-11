<?php

class UserController extends BaseController {

	function __construct()
	{
		parent::__construct();
  }
    
  public function insertUser() {

		$postArray = array(
			"username" => $_POST['username'],
			"email" => $_POST['email'],
			"password" => $_POST['password']
		);
		$this->view->postedData($postArray);
		print_r($this->view->dataArray);
		$this->databaseConnection->insert('users', $postArray);
  }

  public function getUser() {
      $this->view->postedData($this->databaseConnection->query('select * from users')->results());
      $this->view->render('home/about');
  }
}
