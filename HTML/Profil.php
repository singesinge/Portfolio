<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=League+Spartan:wght@900&display=swap" rel="stylesheet">
</head>
<body>

<?php
    include '../elements/header.php';
?>

<div class="profil-wrapper">
    <div class="profil">
        <h1>Profil</h1>
        <div class="profil-content">
            <p>Login : <?php echo $_SESSION['user']['login']; ?></p>
            <p>Email : <?php echo $_SESSION['user']['mail']; ?></p>
            <p>Role : <?php if ($_SESSION['user']['role'] == null) {
                echo 'Utilisateur';
            }elseif($_SESSION['user']['role'] == null) {
                echo 'CACA';
            }else {
                echo 'Administrateur';
            } ?></p>
            
            
            </p>
        </div>
    </div>

    <div class="profil-actions">
        <h2>Actions</h2>
        <a href="EditProfil.php" class="btn btn-yellow">Modifier le profil</a>
        <a href="../traitement/traitementLogout.php" class="btn btn-red">Déconnexion</a>
        <form action="../HTML/DeleteProfil.php" method="POST">
            <input type="hidden" name="action" value="delete_profile">
            <input type="submit" class="btn btn-red" value="Supprimer le compte">
        </form>
    </div>
</div>

</body>
</html>
