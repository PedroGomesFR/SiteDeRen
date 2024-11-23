<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>RP</title>
    </head>
    <body>
        <div class="container-wrapper">
            <div class="container">
                <img src="./img/logo.png" alt="logo">

                <form action="../index.php" method="post">
                    <input type="hidden" name="action" value="login">
                    <div class="form-title">
                        <h1>Connexion</h1>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Email" placeholder="Email" class="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="Password" placeholder="Mot de passe" class="mdp">
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Connexion" name="Connexion" class="boutton">
                    </div>
                    <div class="form-submit">
                        <a href="register.php">Pas de compte?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>