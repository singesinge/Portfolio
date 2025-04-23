<form class="form-edit" action="../traitement/traitementEdit.php" method="post">

        <label for="login">Nom d'utilisateur :</label>
        <input type="text" name="login" id="login" value="<?php echo htmlspecialchars($login); ?>">

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <label for="newpassword">Nouveau mot de passe :</label>
        <input type="password" name="newpassword" id="newpassword">

        <label for="mail">Mail :</label>
        <input type="email" name="mail" id="mail" value="<?php echo htmlspecialchars($mail); ?>" readonly>

        <input type="submit" class="btn btn-yellow" value="Modifier le profil">
        
        <?php if (!empty($_SESSION['success'])): ?>
            <p class="success-message" id="successMessage"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error-message" id="errorMessage"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>
        <a href="Profil.php">Retour</a>
    </form>