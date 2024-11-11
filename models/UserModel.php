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
            echo "Enregistrement réussi !";
            return true;
        } else {
            $error = $stmt->errorInfo();
            echo "Erreur lors de l'enregistrement : " . $error[2];
            return false;
        }
    }
}

?>
