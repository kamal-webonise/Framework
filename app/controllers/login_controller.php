<!-- <?php

class LoginController extends BaseController {
	private $model;

	function __construct( $tile )
	{
		$this->model = new $tile;
	}

	public function index()
	{
		echo "Index Method";
	}

	public function login()
	{
		$this->model->getUserByEmail("chirag");
	}
	
	public function showUsers($modelName) {
		echo "hey";
		// $obj = new $modelName;
		$this->model->getUsers();
	}
}
?> -->
