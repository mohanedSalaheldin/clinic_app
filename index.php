<?php
session_start();
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

use App\Database;
use App\Controllers\AuthController; 

$db = Database::getInstance($config);


$authController = new AuthController($db);

$route = $_GET['route'] ?? 'home';


$page = "";

switch ($route) {
    case 'home':
        $page = "views/home.php";
        break;
    case 'majors':
        $page = "views/majors.php";
        break;
    case 'doctors':
        $page = "views/doctors.php";
        break;
    case 'contact':
        $page = "views/contact.php";
        break;


    case 'register':
        require_once __DIR__ . "/views/layout/header.php";
        require_once __DIR__ . "/views/layout/navbar.php";
        $authController->register();
        require_once __DIR__ . "/views/layout/footer.php";
        exit;

    case 'login':
        require_once __DIR__ . "/views/layout/header.php";
        require_once __DIR__ . "/views/layout/navbar.php";
        $authController->login();
        require_once __DIR__ . "/views/layout/footer.php";
        exit;

    case 'logout':
        $authController->logout();
        break;

    case 'history':
        $page = "views/history.php";
        break;
    default:
        $page = "views/errors/404.php";
        break;
}

require_once __DIR__ . "/views/layout/header.php";
require_once __DIR__ . "/views/layout/navbar.php";

if ($page) {
    require_once __DIR__ . "/" . $page;
}

require_once __DIR__ . "/views/layout/footer.php";
