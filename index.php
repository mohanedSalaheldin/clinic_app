<?php


require_once __DIR__ . "vendor/autoload.php";
require_once __DIR__ . "config.php";


use App\Database;

var_dump(Database::getInstance($config));