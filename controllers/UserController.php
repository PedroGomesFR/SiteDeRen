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

    // Exemple d'action pour afficher le profil d'un utilisateur
    // public function profile() {
    //     $userModel = new UserRepository($this->db);

    //     // Obtenir l'ID de l'utilisateur de la session ou d'une autre source
    //     $userId = $_SESSION['user_id'] ?? null;
        
    //     if ($userId) {
    //         $user = $userModel->getUserById($userId);
    //         if ($user) {
    //             // Inclure la vue du profil en passant les données utilisateur
    //             include 'views/profile.php';
    //         } else {
    //             echo "Utilisateur introuvable.";
    //         }
    //     } else {
    //         echo "Veuillez vous connecter pour accéder à cette page.";
    //     }
    // }
}
?>
