<?php
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
            if (password_verify($password, $user['MotDePasse'])) {
                // Le mot de passe est correct
                $_SESSION['UserID'] = $user['UserID'];
                $_SESSION['Email'] = $user['Email'];
                $_SESSION['NomUtilisateur'] = $user['NomUtilisateur'];
                $_SESSION['Nom'] = $user['Nom'];
                $_SESSION['Prenom'] = $user['Prenom'];
                $_SESSION['DateNaissance'] = $user['DateNaissance'];
                $_SESSION['Discription'] = $user['Discription'];
                $_SESSION['Likes'] = $user['Likes'];
                $_SESSION['VueProfil'] = $user['VueProfil'];
                $_SESSION['DateInscription'] = $user['DateInscription'];
                $_SESSION['is_admin'] = $user['is_admin'];
                header('location: ../View/home.php');
                exit;
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
    
}

?>
