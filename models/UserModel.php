<?php
require_once 'User.php';

class UserModel {
    
    private $db;
    public $errorMessages = [];
    
    public function __construct($db) {
        
        $this->db = $db;
    }

    // Méthode pour enregistrer un utilisateur dans la base de données
    public function registerUser($email, $hashedPassword, $prenom, $nom, $age) {
        $sql = "INSERT INTO utilisateur (Email, Pwd, Prenom, Nom, DateNaissance) VALUES (:Email, :Pwd, :Prenom, :Nom, :DateNaissance)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':Email', $email);
        $stmt->bindParam(':Pwd', $hashedPassword); 
        $stmt->bindParam(':Prenom', $prenom);
        $stmt->bindParam(':Nom', $nom);
        $stmt->bindParam(':DateNaissance', $age);
    
        if ($stmt->execute()) {
            return true;
        } else {
            $error = $stmt->errorInfo();
            return false;
        }
    }

    public function getUser($email, $password) {
        $sql = "SELECT * FROM utilisateur WHERE Email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch();
        if ($user) {
            if (password_verify($password, $user['Pwd'])) {
                

                // Le mot de passe est correct
                // session_start();
                // $_SESSION['user'] = new User(
                //     $user['UserID'],
                //     $user['Email'],
                //     $user['Nom'],
                //     $user['Prenom'],
                //     $dateNaissance,
                //     $dateInscription,
                //     $user['is_admin'],
                //     $user['Photoprofile'],
                //     $userDescription
                // );
                return $user;
                // header('Location: ./View/home.php');
                // exit;
            } else {
                // Redirection avec message d'erreur pour le mot de passe incorrect
                header('Location: ./View/login.php?error=Mot de passe incorrect');
                exit();
            }
        } else {
            // Redirection avec message d'erreur pour l'email incorrect
            header('Location: ./View/login.php?error=Email incorrect');
            exit();
        }
    }

    public function updateUser($photoProfile, $id) {
        $sql = "UPDATE utilisateur SET Photoprofile = :photoProfile WHERE UserID = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':photoProfile', $photoProfile);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo 'Insertion reussie';
            return true;
        } else {
            $error = $stmt->errorInfo();
            return false;
        }
    }
    
    public function getUserProfileImage($userId) {
        $sql = "SELECT Photoprofile FROM utilisateur WHERE UserID = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retourne l'image ou null si non définie
        return $result;
    }
}

?>
