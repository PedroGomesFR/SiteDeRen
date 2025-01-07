<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class User {
    private int $id;
    private string $email;
    private string $prenom;
    private string $nom;
    private DateTime $dateNaissance;
    private string $discription;
    private DateTime $dateInscription;
    private bool $is_admin;
    private string $photoProfile;

    public function __construct(int $id, string $email, string $nom, string $prenom, DateTime $dateNaissance, DateTime $dateInscription, bool $is_admin, string $photoProfile, string $discription = "") {
        $this->id = $id;
        $this->email = $email;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->dateNaissance = $dateNaissance;
        $this->discription = $discription;
        $this->dateInscription = $dateInscription;
        $this->is_admin = $is_admin;
        $this->photoProfile = $photoProfile;
        $this->isConnected();

    }

    // Getter methods
    public function getId(): int {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getDateNaissance(): DateTime {
        return $this->dateNaissance;
    }

    public function getDiscription(): string {
        return $this->discription;
    }

    public function getDateInscription(): DateTime {
        return $this->dateInscription;
    }

    public function getAdmin(): bool {
        return $this->is_admin;
    }

    public function getPhotoProfile(): string {
        return $this->photoProfile;
    }

    // Setter methods
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function setDateNaissance(DateTime $dateNaissance): void {
        $this->dateNaissance = $dateNaissance;
    }

    public function setDiscription(string $discription): void {
        $this->discription = $discription;
    }

    public function setDateInscription(DateTime $dateInscription): void {
        $this->dateInscription = $dateInscription;
    }

    public function setIsAdmin(bool $is_admin): void {
        $this->is_admin = $is_admin;
    }

    public function setPhotoProfile(string $photoProfile): void {
        $this->photoProfile = $photoProfile;
    }

    static public function isConnected(): bool {
        return isset($_SESSION['user']) && $_SESSION['user'] instanceof User;
    }

    static public function isAdmin(): bool {
        return isset($_SESSION['user']) && $_SESSION['user'] instanceof User && $_SESSION['user']->getAdmin();
    }
}
?>