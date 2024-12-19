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

        }elseif (isset($_POST['register'])){
            $action = $_POST['register'];

        }elseif (isset($_POST['updateProfile'])){
            $action = $_POST['updateProfile'];
        }else{
            $action = $_POST['deconnexion'];
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
        case 'updateProfile':
            echo "updateProfile";
            $controller = new UserController();
            $controller->updateProfile();
            break;
        case 'deconnexion':
            $controller = new UserController();
            $controller->logout();
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