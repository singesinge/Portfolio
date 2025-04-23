<?php 
include '../connexion.php';
$db = Connexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet</title>
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=League+Spartan:wght@900&display=swap"
        rel="stylesheet">
</head>
<body>
    <?php include '../elements/header.php' ?>
    <?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 1; 
$stmt = $db->prepare("SELECT * FROM projets WHERE id = ?");
$stmt->execute([$id]);
$projet = $stmt->fetch();
?>
    <h1><?= htmlspecialchars($projet['descPro1']) ?></h1>

    <div class="project-intro">
        <div class="project-text">
            <h2>Détails du projet :</h2>
            <p><?= nl2br(htmlspecialchars($projet['descPro2'])) ?></p>
        </div>
        <div class="project-image">
            <img src="<?= $projet['img1'] ?>" alt="Image principale">
    </div>
</div>

<div class="project-carousel">
    <img src="<?= $projet['img2'] ?>" alt="Carousel Image 1">
    <img src="<?= $projet['img3'] ?>" alt="Carousel Image 2">
    <img src="<?= $projet['img4'] ?>" alt="Carousel Image 3">
</div>

<div class="project-details">
    <p>Contenu additionnel ici si tu veux</p>
</div>

<div class="project-final-image">
    <img src="<?= $projet['img5'] ?>" alt="Image finale">
</div>
</body>
</html>