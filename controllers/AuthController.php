<?php
require_once 'BaseController.php';
require_once 'models/Database.php';
require_once 'models/UserModel.php';

class AuthController extends BaseController {
//     private $db;

//     public function __construct() {
//         // Initialise la connexion à la base de données
//         $database = new Database();
//         $this->db = $database->getConnection();
//     }

//     public function register() {
//         // Vérifie si le formulaire a été soumis en méthode POST
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Récupère les données du formulaire
//             $email = $_POST['Email'];
//             $password = $_POST['Password'];
//             $prenom = $_POST['Prenom'];
//             $nom = $_POST['Nom'];
//             $age = $_POST['age'];

//             // Crée une instance du modèle UserModel en lui passant la connexion à la base de données
//             $userModel = new UserModel($this->db);

//             // Appelle la méthode registerUser() du modèle UserModel pour enregistrer l'utilisateur
//             if ($userModel->registerUser($email, $password, $prenom, $nom, $age)) {
//                 // Redirection vers une page de succès
//                 header('Location: success.php');
//                 exit;
//             } else {
//                 // Récupération des messages d'erreur depuis le modèle
//                 $errorMessages = $userModel->errorMessages;
//                 // Renvoi des messages d'erreur à la vue
//                 $this->render('register.php', ['errorMessages' => $errorMessages]);
//             }
//         } else {
//             // Si le formulaire n'a pas été soumis, affiche simplement la page d'inscription
//             $this->render('register.php');
//         }
//     }
}
?>