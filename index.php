<?php
session_start();

// Note: put every require functions in autoload
require_once('./config/database_config.php');
require_once('./database/database_connection.php');
$database = Database::getInstance($db);

if(isset($_SERVER['PATH_INFO'])) {
	$path= $_SERVER['PATH_INFO'];
	$path_split = explode('/', ltrim($path));
}
else {
	$path_split = '/';
}

// $controller_path

if($path_split === '/') {
	require_once __DIR__.'/app/models/user_model.php';
	require_once __DIR__.'/app/controllers/user_controller.php';

	$req_model = new UserModel;
	$req_controller = new UserController($req_model);

	print $req_controller->index();
}
else {

	$req_controller = $path_split[1];
	$req_model = $path_split[1];
	$req_controller_exists = __DIR__.'/app/controllers/'.$req_controller.'_controller.php';
	$model_path = __DIR__.'/app/models/'.$req_model.'_model.php';

	$req_method = isset($path_split[2])? $path_split[2] : '';
	$req_param = array_slice($path_split, 3);


	if (file_exists($req_controller_exists))
	{
		var_dump($req_model);
		require_once $model_path;
		require_once $req_controller_exists;
		
		$model = ucfirst($req_model).'Model';
		$controller = ucfirst($req_controller).'Controller';
		
		$ModelObj = new $model;
		$ControllerObj = new $controller($model);
		
		$method = $req_method;
		if ($req_method != '') {
			print $ControllerObj->$method($req_param);
		}
		else {
			print $ControllerObj->index();
		}
	}
	else
	{
	header('HTTP/1.1 404 Not Found');
	die('404 - The file - '.' - not found');
	}
}	
	
?>
