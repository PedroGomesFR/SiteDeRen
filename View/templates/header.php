<?php 
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__, 2)); // Adjust based on the relative position of the file
}

require_once BASE_PATH . '/models/User.php'; // Ensure the User class is included
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
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
                    // Debugging statements
                    // var_dump(User::isConnected()); // Check if user is connected

                    if (User::isConnected()) { ?>
                        <div class="lien6">
                            <a href="Profil.php">Mon Profile</a>
                        </div>
                        <?php
                        if (User::isAdmin()) { ?>
                            <div class="lien6">
                                <a href="admin.php">Admin</a>
                            </div>
                        <?php
                        } else {
                            // Additional else block if needed
                        }
                    } else { ?>
                        <a href="/SiteDeRen/View/login.php">Se Connecter</a>
                    <?php } ?>
                    <a href="">Annonce</a>
                    <a href="">Recherche</a>
                    <a href="">Likes</a>
                </div>
            </div>
        </header>
    </body>
</html>