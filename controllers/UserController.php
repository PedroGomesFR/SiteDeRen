<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/DataBase.php';

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
            $userArray = $userModel->getUser($email, $password);

            if ($userArray) {
                $dateNaissance = new DateTime($userArray['DateNaissance']);
                $dateInscription = new DateTime($userArray['DateInscription']);
                $userDescription = $userArray['Discription'] ?? "";

                $_SESSION['user'] = new User(
                    $userArray['UserID'],
                    $userArray['Email'],
                    $userArray['Nom'],
                    $userArray['Prenom'],
                    $dateNaissance,
                    $dateInscription,
                    $userArray['is_admin'],
                    $userArray['Photoprofile'],
                    $userDescription
                );
                header('Location: ../View/home.php');
                exit;
            } else {
                // Handle login failure
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../View/home.php');
        exit;
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageName = $_FILES['image']['name'];
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
                $id = $_SESSION['user']->getId();

                $update = new UserModel($this->db);
                $photoDeProfile = $update->updateUser($imageData, $id);
                if ($photoDeProfile) {
                    echo "Image insérée!";
                } else {
                    echo "Erreur lors de l'insertion!";
                }
            } else {
                $this->errorMessages[] = "Aucun fichier téléchargé ou erreur inconnue.";
            }
        }
    }


    public function getUserProfileImage() {
        $PhotoProfile = $_SESSION['user']->getPhotoProfile();
        $imagePath = $PhotoProfile ? $PhotoProfile : 'SiteDeRen/View/uploads/photo_profile/Male_default.png';
        echo "Image Path: " . $imagePath; // For debugging
        return $imagePath;
    }
    
    
    
    //file_get_contents('SiteDeRen/View/uploads/photo_profile/Male_default.png')

    // public function getUserProfileImage() {
    //     $PhotoProfile = $_SESSION['user']->getPhotoProfile();
    //     // Check if there's a custom image, otherwise use a default
    //     return $PhotoProfile ? $PhotoProfile : 'SiteDeRen/View/uploads/photo_profile/Male_default.png';
    // }
    
}

echo "UserControler.php inclus!"
?>
