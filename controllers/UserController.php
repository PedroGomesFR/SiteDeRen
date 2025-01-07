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
            $userModel->getUser($email, $password);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../View/home.php');
        exit;
    }

    //age du User
    public function getAge(){
        $dateNaissance = $_SESSION['DateNaissance'];
        $age = date('Y') - date('Y', strtotime($dateNaissance));
        return $age;
        var_dump($age);
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['image'];
    
                // Vérifiez les extensions autorisées
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $allowedExtensions)) {
                    $this->errorMessages[] = "Extension non autorisée.";
                    return;
                }
    
                // Définissez le chemin de sauvegarde
                $uploadDir = "SiteDeRen/View/uploads/photo_profile/";
                $fileName = uniqid() . '.' . $fileExtension;
                $filePath = $uploadDir . $fileName;

                // Déplacez le fichier dans le dossier cible
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    // Mettez à jour l'image de profil dans la base de données
                    $updateUser = new UserModel($this->db);
                    $relativePath = 'SiteDeRen/View/uploads/photo_profile/' . $fileName;
                    $updateUser->updateUser($relativePath);
                } else {
                    $this->errorMessages[] = "Erreur lors du téléchargement.";
                }
            } else {
                $this->errorMessages[] = "Aucun fichier téléchargé ou erreur inconnue.";
            }
        }
    }
    
    public function getUserProfileImage() {
        $userId = $_SESSION['UserID'];
        $userModel = new UserModel($this->db);
        $imageData = $userModel->getUserProfileImage($userId);
        // Retournez l'image de profil ou une image par défaut
        return $imageData['Photoprofile'] ?? 'SiteDeRen/View/uploads/photo_profile/Male_default.png';
    
    }
}
?>
