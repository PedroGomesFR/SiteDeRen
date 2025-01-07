<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../models/UserModel.php';
require_once '../controllers/UserController.php';
require_once '../models/User.php';
$userController = new UserController();
$age = $userController->getAge();
$imageData = $userController->getUserProfileImage();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SiteDeRen/View/style.css">
    <title>Profil</title>
</head>
<body>
    <?php include("templates/header.php") ?>
    <div class="profileWrapper">
        <div class="profileHead">

            <div class="imgPro">
                <div class="shapeImg profileImage">
                    <!-- Affichage de l'image de profil -->
                    <img src="<?php echo $imageData; ?>" alt="Photo de profil" class="profileImage">
                    
                    

                </div>
            </div>
            <img src="SiteDeRen/View/uploads/photo_profile/Male_default.png" alt="kjlnkjol">
            <div class="infoProfil">

                <p><?php echo $_SESSION['user']->getPrenom() . " " . $_SESSION['user']->getNom() . ", " . $age; ?></p>

                <p><?php echo $_SESSION['Discription']; ?></p>
                
            </div>

            <div class="btnProfil">
                <a href="modifierProfil.php">Modifier mon profil</a>
            </div>

            <form action="../index.php" method="post">
                <input type="submit" value="deconnexion" name="deconnexion">
            </form>

        </div>
    </div>
    
    <?php include('templates/footer.php') ?>
    
</body>
</html>
