<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once '../controllers/UserController.php';
    $userController = new UserController();
    $age = $userController->getAge();
    require_once '../models/UserModel.php';
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
                <div class="shapeImg">

                </div>
            </div>

            <div class="infoProfil">


                <div class="imgPro">
  
</div>
                
                <p><?php echo $_SESSION['Prenom'] ." ". $_SESSION['Nom'] .", ". $age; ?> </p>

                <p><?php echo $_SESSION['Discription'];?></p>
                
            </div>

            <div class="btnProfil">
                <a href="modifierProfil.php">Modifier mon profil</a>
            </div>

            <form action="../index.php" method="post">
            <input type="submit" value="deconnexion" name="deconnexion">
            </form>

        </div>
    </div>
    


    <?php include('templates/footer.php')?>
    
    
</body>
</html>