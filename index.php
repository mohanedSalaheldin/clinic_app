<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

use App\Database;

$db = Database::getInstance($config);

$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        $page = "views/Auth/login.php";
        break;

    default:
        $page = "views/errors/404.php";
        break;
}

require_once __DIR__ . "/views/layout/header.php";
require_once __DIR__ . "/views/layout/navbar.php";

require_once __DIR__ . "/" . $page;

require_once __DIR__ . "/views/layout/footer.php";
