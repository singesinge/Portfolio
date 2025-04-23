<?php
include('../connexion.php');
if(isset($_POST['submit'])){
    extract($_POST);
    
    $requete = $db->prepare("INSERT INTO comptes VALUES (0, :login, :password, :mail, 0)");
    $requete->execute(array(
        'login' => $login,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'mail' => $mail
    ));

    header('Location: ../HTML/Login.php');
}

?>