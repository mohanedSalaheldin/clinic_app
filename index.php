<?php
session_start();

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";
use App\models\Errors;


use App\Database;
use App\Controllers\AuthController;

$db = Database::getInstance($config);
$authController = new AuthController($db);

$route = $_GET['route'] ?? 'home';
$page  = null;

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

    case 'history':
        $page = "views/front/history.php";
        break;

    case 'admin':
        $page = "views/admin/home.php";
        break;

    case 'admin/create-major':
        $page = "views/admin/major/create.php";
        break;

    case 'login':
      $result = $authController->login();
    $page   = $result['view'];
break;
    case 'register':
         $result = $authController->register();
    $page   = $result['view'];
break;

    case 'logout':
        $authController->logout();
        exit;

    default:
        $page = "views/front/home.php"; // أو اعمل 404 حقيقي
        break;
}

$isAdmin = strpos($route, 'admin') === 0;

if ($isAdmin) {
    require_once "views/admin/layout/header.php";
    require_once "views/admin/layout/sidebar.php";
    Errors::GetMessage();

} else {
    require_once "views/front/layout/header.php";
    require_once "views/front/layout/navbar.php";
    Errors::GetMessage();

}

if ($page && file_exists($page)) {
    require_once $page;
} else {
    echo "Page not found";
}

if ($isAdmin) {
    require_once "views/admin/layout/footer.php";
} else {
    require_once "views/front/layout/footer.php";
}
