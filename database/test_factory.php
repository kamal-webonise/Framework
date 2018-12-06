<?php
require_once('../config/database_config.php');
require_once('./database_factory.php');
$object = DatabaseFactory::getDatabaseInstance($db['dbserver']);
$result = $object->query("select * from users");
print_r($result);