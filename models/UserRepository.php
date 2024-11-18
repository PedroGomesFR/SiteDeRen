<?php 

class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}