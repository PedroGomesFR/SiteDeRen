<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Enregistrement</title>
    </head>
    <body>

        <div class="container-wrapper">
            <div class="container">
                <img src="./img/logo.png" alt="logo">
                <form action="../index.php?action=register" method="post">
                    <div class="form-title">
                        <h1>inspription</h1>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Email" placeholder="Email" class="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="Password" placeholder="Mot de passe" class="mdp" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Prenom" placeholder="Prenom" class="Prenom">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Nom" placeholder="Nom" class="Nom">
                    </div>
                    <div class="form-group">
                        <input type="date" name="age" placeholder="Age" class="Age" required>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Connexion" class="boutton">
                    </div>
                    <div class="form-submit">
                        <a href="login.php">deja un compte?</a>
                    </div>
                </form>
            </div>
        </div>
    </html>