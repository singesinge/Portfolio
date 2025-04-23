<?php

    // Vérifier si un message de succès ou d'erreur est passé dans l'URL
    if (isset($_GET['status']) && isset($_GET['message'])) {
        $status = $_GET['status'];
        $message = htmlspecialchars($_GET['message']); // Sécuriser le message
        $class = $status === 'success' ? 'success-message' : 'error-message';
        echo "<div class='$class'>$message</div>";
    }
?>
<div class="contact-form-container">
        <h1>Contactez-moi</h1>
        
        <form action="../traitement/traitementMail.php" method="POST">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Sujet :</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-yellow" name="submit">Envoyer</button>
        </form>
    </div>