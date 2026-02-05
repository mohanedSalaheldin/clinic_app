<?php



 require_once __DIR__ . "/../../vendor/autoload.php";
 require_once __DIR__ . "/../../config.php";

 use App\Database;
use App\Controllers\AuthController; 

$db = Database::getInstance($config);


$authController = new AuthController($db);

 $route = $_GET['route'] ?? 'admin';


$page = "";

switch ($route) {
    case 'admin':
        $page = "/home.php";
        break;
   
    default:
        $page = "views/admin/errors/404.php";
        break;
}

require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/sidebar.php";
if ($page) {
    require_once __DIR__ . "/" . $page;
}

require_once __DIR__ . "/layout/footer.php";













//  require_once __DIR__ . "/../../vendor/autoload.php";
//  require_once __DIR__ . "/../../config.php";

//  use App\Database;
// use App\Controllers\AuthController; 

// $db = Database::getInstance($config);


// $authController = new AuthController($db);

//  $route = $_GET['route'] ?? 'admin';


// $page = "";

// switch ($route) {
//     case 'admin':
//         $page = "/home.php";
//         break;
   
//     default:
//         $page = "views/admin/errors/404.php";
//         break;
// }