<?php


require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";


use App\Database;


$db1 = Database::getInstance($config);
$db2 = Database::getInstance($config);

var_dump($db1 === $db2); // true
// var_dump(Database::getInstance($config));
