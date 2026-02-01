<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

use App\Database;

$db = Database::getInstance($config);

$route = $_GET['route'] ?? 'home'; 

switch ($route) {
    case 'home':
        $page = "views/home.php";
        break;
    case 'login':
        $page = "views/login.php";
        break;
    case 'register':
        $page = "views/register.php";
        break;
    case 'majors':
        $page = "views/majors.php";
        break;
    case 'contact':
        $page = "views/contact.php";
        break;
    case 'history':
        $page = "views/history.php";
        break;
    case 'doctors':
        $page = "views/doctors.php"; 
        break;
    default:
        $page = "views/errors/404.php";
        break;
}

require_once __DIR__ . "/views/layout/header.php";
require_once __DIR__ . "/views/layout/navbar.php";

require_once __DIR__ . "/" . $page;

require_once __DIR__ . "/views/layout/footer.php";