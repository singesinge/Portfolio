<?php
session_start();

// Vérifie que l'utilisateur est bien connecté
if (!isset($_SESSION['user'])) {
    header('Location: ../HTML/Login.php');
    exit;
}

// Connexion à la BDD
include '../connexion.php';
$db = Connexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $oldPassword = $_POST['password'] ?? '';
    $newPassword = $_POST['newpassword'] ?? '';
    $mail = $_SESSION['user']['mail'];

    // Récupère l'utilisateur actuel
    $stmt = $db->prepare("SELECT * FROM comptes WHERE mail = :mail");
    $stmt->execute(['mail' => $mail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifie que l'utilisateur existe et que le mot de passe est correct
    if ($user && password_verify($oldPassword, $user['password'])) {
        // Prépare les nouvelles valeurs
        $newLogin = !empty($login) ? $login : $user['login'];
        $newPasswordHash = !empty($newPassword) ? password_hash($newPassword, PASSWORD_DEFAULT) : $user['password'];

        // Mise à jour
        $update = $db->prepare("UPDATE comptes SET login = :login, password = :password WHERE mail = :mail");
        $update->execute([
            'login' => $newLogin,
            'password' => $newPasswordHash,
            'mail' => $mail
            
        ]);

        // Mise à jour des infos en session
        $_SESSION['user']['login'] = $newLogin;

        
        $_SESSION['success'] = "Modifications enregistrées avec succès.";
        header('Location: ../HTML/EditProfil.php');
        exit;
    } else {
        $_SESSION['error'] = "Mot de passe incorrect.";
        header('Location: ../HTML/EditProfil.php');
        exit;
    }
}
?>
