<?php
session_start()
// Routeur
require_once 'controllers/BaseController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'models/DataBase.php';
require_once 'models/UserModel.php';

echo 'Welcome';

if (isset($_POST['action'])) {

    $action = $_POST['action'];

    switch ($action) {
        case 'register':
            echo "register";
            $controller = new UserController();
            $controller->register();
            break;
        case 'login':
            $controller = new UserController();
            $controller->login();
            break;
        case 'home':
            echo "home";
            include 'View/home.php';
            break;
        default:
            echo "erreur";
            echo "Erreur 404 : Page non trouvée";
            break;
    }
} else {
    echo "dehors";
}
?>