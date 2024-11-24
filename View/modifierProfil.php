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
    <title>Profil</title>
</head>
<body>

<?php include('templates/header.php')?>

    <div class="profileWrapper">
            <div class="profileHead">

                <form action="../index.php" method="post" enctype="multipart/form-data">
                    <div class="imgPro">
                        <div class="shapeImg">
                        </div>
                    </div>

                    <div class="infoProfil">
                        
                        <textarea id="discription" name="discription" maxlength="500">
                            <?php echo $_SESSION['Discription'];?>
                        </textarea>

                        <input type="file" name="image" accept="image/*" required>
                        <input type="submit" value="updateProfile" name="updateProfile"  id="updateProfile">
                        
                    </div>
                </form>
                
            </div>
    </div>

    modifier votre Photo

<?php include('templates/footer.php')?>
    
</body>
</html>