<?php
require_once '../models/UserModel.php';
require_once '../models/DataBase.php';

class UserController{
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
            }else{               
            }
        } else {
            
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['Email'];
            $password = $_POST['Password'];

            // Appel à la méthode getUser pour tenter de se connecter
            $userModel = new UserModel($this->db);
            $userModel->getUser($email, $password);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location:./View/login.php');
        exit;
    }

    //age du User
    public function getAge(){
        $dateNaissance = $_SESSION['DateNaissance'];
        $age = date('Y') - date('Y', strtotime($dateNaissance));
        return $age;
        var_dump($age);
    }
}
?>
