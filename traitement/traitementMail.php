<?php
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validation des données (simple exemple)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Tous les champs doivent être remplis.";
        exit;
    }

    // Email destinataire
    $to = "thomasbout662@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Contenu de l'email
    $email_message = "<h1>Message de contact de $name</h1>";
    $email_message .= "<p><strong>Sujet:</strong> $subject</p>";
    $email_message .= "<p><strong>Email:</strong> $email</p>";
    $email_message .= "<p><strong>Message:</strong><br>$message</p>";

    // Envoi de l'email
    if (mail($to, $subject, $body)) {
        // Redirection avec message de succès
        header("Location: ../HTML/Contact.php?status=success&message=Votre message a été envoyé avec succès.");
    } else {
        // Redirection avec message d'erreur
        header("Location: ../HTML/Contact.php?status=error&message=Une erreur est survenue lors de l'envoi.");
    }
    exit;
} else {
    echo "Erreur: Aucune donnée envoyée.";
}
?>
