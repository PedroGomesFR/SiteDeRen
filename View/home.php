<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/SiteDeRen/View/style.css">
        <title>Rencontre Plus</title>
        <!-- couleur rose : #E44A62 couleur noir/gris : #343434 -->
    </head>
    <body>
        <header>
            <?php include('templates/header.php')?>
        </header>


-----   <?php var_dump($_SESSION); ?>
  

        <footer>
            <?php include('templates/footer.php')?>
        </footer>

    </body>
</html>