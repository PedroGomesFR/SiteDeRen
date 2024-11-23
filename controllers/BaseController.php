<?php

class BaseController {
    protected $userModel;

    public function __construct() {
        $this->initializeModels();
    }

    // Initialise les modèles couramment utilisés
    protected function initializeModels() {
        require_once 'UserModel.php';
        $database = new Database();
        $dbConnection = $database->getConnection();
        $this->userModel = new UserModel($dbConnection);
    }

    // Vérifie si l'utilisateur est connecté
    protected function checkAuthentication() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
    }

    // Méthode utilitaire pour rediriger vers une autre page
    protected function redirect($url) {
        header("Location: $url");
        exit();
    }

    // Méthode pour afficher une vue
    protected function render($view, $data = [])
    {
        // Extraire les données du tableau associatif pour les rendre accessibles dans la vue
        extract($data);

        // Inclure le fichier de vue spécifié
        require_once 'views/' . $view;
    }
}
?>
