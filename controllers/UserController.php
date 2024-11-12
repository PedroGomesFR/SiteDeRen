<?php
require_once 'BaseController.php';
require_once 'models/UserModel.php';
require_once 'models/UserRepository.php';
require_once './models/DataBase.php';

class UserController extends BaseController {
    private $db;
    public $errorMessages = [];

    public function __construct() {
        // Initialise la connexion à la base de données
        $database = new DataBase();
        $this->db = $database->getConnection();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            $prenom = $_POST['Prenom'];
            $nom = $_POST['Nom'];
            $dateNaissance = $_POST['age'];

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $userModel = new UserModel($this->db);
            if ($userModel->registerUser($email, $hashedPassword, $prenom, $nom, $dateNaissance)) {
                // Redirection vers une page de succès
                header('Location: ./View/login.php');
                exit;
            } else {
                // Récupération des messages d'erreur depuis le modèle
                $errorMessages = $userModel->errorMessages;
                // Renvoi des messages d'erreur à la vue
                $this->render('register.php', ['errorMessages' => $errorMessages]);
            }
        } else {
            $this->render('register.php');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['Email'];
            $password = $_POST['Password'];
        }
   
    }
}
?>
