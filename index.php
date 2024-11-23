<?php
session_start();
// Routeur
require_once 'controllers/UserController.php';
require_once 'models/DataBase.php';
require_once 'models/UserModel.php';
require_once 'View/templates/header.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['login'])){
            $action = $_POST['login'];
        }else{
            $action = $_POST['register'];
        }

    
    switch ($action) {
        case 'register':
            echo "register";
            $controller = new UserController();
            $controller->register();
            break;
        case 'Connexion':
            echo "login";
            $controller = new UserController();
            $controller->login();
            break;
        case 'home':
            include 'View/home.php';
            break;
        default:
            echo"Erreur : default switch";
            include 'View/home.php';
            break;
    }
}
?>