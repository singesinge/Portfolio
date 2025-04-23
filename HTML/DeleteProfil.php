<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=League+Spartan:wght@900&display=swap" rel="stylesheet">
</head>
<body>
<form action="../traitement/traitementDelete.php" method="post" class="form-delete">
    <h1>Supprimer votre compte</h1>
    <p>Cette action est irréversible et supprimera toutes vos données.</p>
    <p>Êtes-vous sûr de vouloir continuer ?</p>
    <input type="hidden" name="action" value="delete_profile">
    <input type="submit" value="Supprimer" class="btn btn-red">
    <input type="button" value="Annuler" class="btn btn-yellow" onclick="window.location.href='Profil.php'">
</form>

</body>
</html>