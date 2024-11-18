<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">

        <title>Document</title>
    </head>
    <body>

        <header>
            <div class="header-container">
                <h1>Rencontre plus</h1>

                <div class="liens">

                    <?php 
        session_start(); 
        if (isset($_SESSION['UserID'])) {
    ?>
                    <div class="lien6">
                        <a href="#">Mon Profile</a>
                    </div>

                    <?php
        if (isset($_SESSION['is_admin'])) {
    ?>
                    <div class="lien6">
                        <a href="admin.php">Admin</a>
                    </div>

                <?php
        }else{

            }
    ?>

                <?php
        } else {
        
    ?>
                    <a href="/SiteDeRen/View/login.php">Se Connecter</a>
                    <?php
    }
    ?>

                    <a href="">Annonce</a>
                    <a href="">Recherche</a>
                    <a href="">Likes</a>
                </div>
            </div>
        </header>
    </body>
</html>