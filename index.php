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
        $page = "views/front/home.php";
        break;
    case 'majors':
        $page = "views/front/majors.php";
        break;
    case 'doctors':
        $page = "views/front/doctors.php";
        break;
    case 'contact':
        $page = "views/front/contact.php";
        break;


    case 'register':
        require_once __DIR__ . "/views/front/layout/header.php";
        require_once __DIR__ . "/views/front/layout/navbar.php";
        $authController->register();
        require_once __DIR__ . "/views/front/layout/footer.php";
        exit;

    case 'login':
        require_once __DIR__ . "/views/front/layout/header.php";
        require_once __DIR__ . "/views/front/layout/navbar.php";
        $authController->login();
        require_once __DIR__ . "/views/front/layout/footer.php";
        exit;

    case 'logout':
        $authController->logout();
        break;

    case 'history':
        $page = "views/front/history.php";
        break;
    default:
        $page = "views/front/errors/404.php";
        break;
}

require_once __DIR__ . "/views/front/layout/header.php";
require_once __DIR__ . "/views/front/layout/navbar.php";

if ($page) {
    require_once __DIR__ . "/" . $page;
}

require_once __DIR__ . "/views/front/layout/footer.php";
