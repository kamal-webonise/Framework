<?php
session_start();

// Note: put every require functions in autoload
require_once('./config/database_config.php');
require_once('./database/database_connection.php');
$database = Database::getInstance($db);

require_once('./core/router.php');

$router = new Router();
$router->run();
// echo "helo";

  
?>
