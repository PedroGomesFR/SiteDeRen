<?php 
require_once '../models/UserModel.php';
require_once '../controllers/UserController.php';
require_once '../models/User.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userControler = new UserController;
$PhotoDePofile = $userControler->getUserProfileImage();
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

            <!-- <div class="imgPro">
                <div class="shapeImg profileImage"> -->
                 
                <img src="<?php echo $userControler->getUserProfileImage(); ?>" alt="Profile Image" style="max-width: 200px;">

                <!-- </div>
            </div> -->
            <!-- <img src="SiteDeRen/View/uploads/photo_profile/Male_default.png" alt="kjlnkjol"> -->
            <div class="infoProfil">

                <p><?php echo $_SESSION['user']->getPrenom() . " " . $_SESSION['user']->getNom() . ", " . $_SESSION['user']->getAge(); ?></p>

                <p><?php echo $_SESSION['user']->getDiscription(); ?></p>
                
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
