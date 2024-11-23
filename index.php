<?php
session_start();
// Routeur
require_once 'controllers/UserController.php';
require_once 'models/DataBase.php';
require_once 'models/UserModel.php';
require_once 'View/templates/header.php';



if (isset($_POST['Envoi'])) {

    $action = $_POST['Envoi'];
    var_dump($action);
    
    switch ($action) {
        case 'register':
            echo "register";
            $controller = new UserController();
            $controller->register();
            break;
        case 'login':
            echo "login";
            $controller = new UserController();
            $controller->login();
            break;
        case 'home':
            include 'View/home.php';
            break;
        default:
            include 'View/home.php';
            echo"Erreur : default switch";
            break;
    }
} else {
    
}
?>