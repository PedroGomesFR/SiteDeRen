<?php
// Inclusion des contrôleurs et modèles nécessaires
require_once 'controllers/BaseController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'models/Database.php';
require_once 'models/UserModel.php';

// Vérifie l'action dans l'URL
$action = isset($_POST['action']) ? $_POST['action'] : 'home';

// Routeur basique
switch ($action) {
    case 'register':
        $controller = new UserController();
        $controller->register();
        echo"connectée";
        break;
    case 'login':
        echo"connectée";
         $controller = new UserController();
        $controller->login();
         break;
    case 'home':
        include 'View/home.php'; // Affiche la page d'accueil si besoin
        break;
    default:
        echo "Erreur 404 : Page non trouvée";
        break;
}
?>
