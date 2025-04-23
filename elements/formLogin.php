<form class="form-login" action="../traitement/traitementLogin.php" method="post">


    <label for="login">Nom d'utilisateur</label>
    <input type="text" name="login" id="login" required>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>

    <?php if (isset($_SESSION['error'])): ?>
        <p class="error-message" id="errorMessage"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <input type="submit" class="btn btn-yellow" value="Connexion">
    

    <p>Pas encore inscrit ? <a href="/HTML/Signin.php">Inscrivez-vous</a></p>
</form>
