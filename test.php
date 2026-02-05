

<?php
session_start();
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

use App\Database;
use App\Controllers\AuthController;

use App\Controllers\MajorController; 


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
         case 'admin':
        $page = "views/admin/home.php";
        break;

         case 'admin/create-major':
        $page = "views/admin/major/create.php";
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
        $page = "";
        break;
}



$route = $_GET['routeadmin'] ?? '';
$page = "";


switch ($route) {
    case 'admin/home':
        $page = "views/admin/home.php";
        break;

    case 'admin/create-major':
        $page = "views/admin/major/create.php";
        break;
    case 'admin/store-major':
        $page = "app/Controllers/MajorController";
        break;

          default:
        $page = "";
        break;

}



if($route){
require_once __DIR__ . "/views/front/layout/header.php";
require_once __DIR__ . "/views/front/layout/navbar.php";

if ($page) {
    require_once __DIR__ . "/" . $page;
}

require_once __DIR__ . "/views/front/layout/footer.php";


}
elseif($route){

    require_once __DIR__ . "/views/admin/layout/header.php";
    require_once __DIR__ . "/views/admin/layout/sidebar.php";
    if ($page) {
        
    require_once __DIR__ . "/" . $page;
}

require_once __DIR__ . "/views/admin/layout/footer.php";

}





































// session_start();
// require_once __DIR__ . "/vendor/autoload.php";
// require_once __DIR__ . "/config.php";

// use App\Database;
// use App\Controllers\AuthController;

// use App\Controllers\MajorController; 


// $db = Database::getInstance($config);




// $authController = new AuthController($db);

// $route = $_GET['route'] ?? 'home';


// $page = "";

// switch ($route) {
//     case 'home':
//         $page = "views/front/home.php";
//         break;
//     case 'majors':
//         $page = "views/front/majors.php";
//         break;
//     case 'doctors':
//         $page = "views/front/doctors.php";
//         break;
//     case 'contact':
//         $page = "views/front/contact.php";
//         break;
//          case 'admin':
//         $page = "views/admin/home.php";
//         break;

//          case 'admin/create-major':
//         $page = "views/admin/major/create.php";
//         break;

        
//         //  case 'admin/store-major':
//         // $page = "app/Controllers/MajorController";
//         // break;

//     //     case 'admin/store-major':
//     // $majorController = new MajorController($db);
//     // $majorController->store();
//     // exit;


//     case 'register':
//         require_once __DIR__ . "/views/front/layout/header.php";
//         require_once __DIR__ . "/views/front/layout/navbar.php";
//         $authController->register();
//         require_once __DIR__ . "/views/front/layout/footer.php";
//         exit;

//     case 'login':
//         require_once __DIR__ . "/views/front/layout/header.php";
//         require_once __DIR__ . "/views/front/layout/navbar.php";
//         $authController->login();
//         require_once __DIR__ . "/views/front/layout/footer.php";
//         exit;

//     case 'logout':
//         $authController->logout();
//         break;

//     case 'history':
//         $page = "views/front/history.php";
//         break;
//     default:
//         $page = "";
//         break;
// }


// if($route == "admin" || "admin/create-major"){
//     require_once __DIR__ . "/views/admin/layout/header.php";
//     require_once __DIR__ . "/views/admin/layout/sidebar.php";
//     if ($page) {
//     require_once __DIR__ . "/" . $page;
// }

// require_once __DIR__ . "/views/admin/layout/footer.php";



// }
// else{
// require_once __DIR__ . "/views/front/layout/header.php";
// require_once __DIR__ . "/views/front/layout/navbar.php";

// if ($page) {
//     require_once __DIR__ . "/" . $page;
// }

// require_once __DIR__ . "/views/front/layout/footer.php";
// }

