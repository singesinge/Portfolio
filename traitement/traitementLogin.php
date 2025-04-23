<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../connexion.php');
    $db = Connexion();

    extract($_POST);

    $requete = $db->prepare("SELECT * FROM comptes WHERE login = :login");
    $requete->execute(['login' => $login]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'login' => $user['login'],
            'mail' => $user['mail'],
            'role' => $user['role']
        ];
        header('Location: ../HTML/Profil.php');
        exit();
    } else {
        $_SESSION['error'] = "Mot de passe incorrect ou utilisateur inconnu.";
        header('Location: ../HTML/Login.php');
        exit();
    }
}
?>
