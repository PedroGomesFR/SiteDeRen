<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
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
            
            <div class="info">
                <p><?php echo $_SESSION['Prenom']; ?></p>
                <p><?php echo $_SESSION['Nom']; ?></p>
            </div>
            
        </div>
    </div>

    

    <?php include('templates/footer.php')?>
    
    
</body>
</html>