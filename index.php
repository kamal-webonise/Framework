<?php
session_start();

// Project root path constant
define('ROOTPATH', dirname(__FILE__));

// Autoload methods
require_once(ROOTPATH . '/core/bootstrap.php');

/*$dbobject = DatabaseFactory::getDatabaseInstance($db['dbserver']);

$res = $dbobject->query("select * from users");
print_r($res);
*/

$router = new Router();
$router->run();