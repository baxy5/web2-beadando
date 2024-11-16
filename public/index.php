<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../config/database.php';
require_once '../app/controllers/UserController.php';
require_once '../app/controllers/MessageController.php';
require_once '../app/controllers/ContactController.php';
require_once '../app/controllers/AdminController.php';



$database = new Database();
$db = $database->connect();

$userController = new UserController($db);
$messageController = new MessageController($db);
$contactController = new ContactController($db);
$adminController = new AdminController($db);

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require_once '../app/views/main.php';
        break;
    case '/register':
        $userController->register();
        break;
    case '/login':
        $userController->login();
        break;
    case '/logout':
        $userController->logout();
        break;
    case '/message-wall':
        $messageController->messageWall();
        break;
    case '/contact':
        $contactController->contact();
        break;
    case '/admin/messages':
        if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) {
            $contactController->adminMessages(); 
        } else {
            http_response_code(403);
            echo "403 Forbidden: Nincs jogosultságod.";
        }
        break;
    case '/admin/dashboard':
        if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) {
            require_once '../app/views/admin_dashboard.php';
        } else {
            http_response_code(403);
            echo "403 Forbidden: Nincs jogosultságod.";
        }
        break;
    case '/admin/export/csv':
        if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) {
            $adminController->exportToExcel();
        } else {
            http_response_code(403);
            echo "403 Forbidden: Nincs jogosultságod.";
        }
        break;
    case '/admin/export/pdf':
        if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1) {
            $adminController->exportToPDF();
        } else {
            http_response_code(403);
            echo "403 Forbidden: Nincs jogosultságod.";
        }
        break;   
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
