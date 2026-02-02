<?php



// require_once __DIR__ . "/vendor/autoload.php";
// require_once __DIR__ . "/config.php";

// use App\Database;
// use App\Controllers\AuthController; 

// $db = Database::getInstance($config);


// $authController = new AuthController($db);

// $route = $_GET['route'] ?? 'home';


// $page = "";

// switch ($route) {
//     case 'home':
//         $page = "views/front/home.php";
//         break;
   
//     default:
//         $page = "views/front/errors/404.php";
//         break;
// }

require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/layout/sidebar.php";
echo "THIS IS BODY";
require_once __DIR__ . "/layout/footer.php";