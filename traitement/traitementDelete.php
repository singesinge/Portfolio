<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../HTML/Login.php');
    exit;
}

// Connexion à la BDD
include '../connexion.php';
$db = Connexion();

// Vérifie que la connexion à la base de données a réussi
if (!$db) {
    die("Erreur de connexion à la base de données");
}

if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    die("Utilisateur non connecté ou ID manquant.");
}

// Vérifie que l'utilisateur a bien cliqué sur le bouton de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_profile') {
    // Récupère l'utilisateur actuel
    $id = $_SESSION['user']['id'];

    // Vérifie que l'ID de l'utilisateur est valide
    if (empty($id)) {
        die("ID utilisateur manquant.");
    }

    // Supprime l'utilisateur de la BDD en fonction de l'id
    $delete = $db->prepare("DELETE FROM comptes WHERE id = :id");
    if (!$delete) {
        die("Erreur de préparation de la requête");
    }

    if ($delete->execute(['id' => $id])) {
        // Détruit la session
        session_destroy();
        header('Location: ../HTML/Login.php');
        exit;
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    // Si la requête n'est pas une suppression, redirige vers le profil
    header('Location: ../HTML/Profil.php');
    exit;
}
?>
