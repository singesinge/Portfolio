<header class="header">
    <a href="../Index.php" class="logo">thomas.</a>
    <ul class="links">
        <li><a href="../HTML/Projects.php">Projets</a></li>
        <li><a href="../HTML/Contact.php">Contact</a></li>
        <?php
        session_start();
            $login = $_SESSION['user']['login'] ?? '';
            $mail = $_SESSION['user']['mail'] ?? '';
            $id = $_SESSION['user']['id'] ?? '';
            $role = $_SESSION['user']['role'] ?? '';

            if (isset($_SESSION['user'])) {
                echo '<li><a href="../HTML/Profil.php">Profil</a></li>';
                echo '<li><a href="../traitement/traitementLogout.php">Déconnexion</a></li>';
            } else {
                echo '<li><a href="../HTML/Login.php">Connexion</a></li>';
            }
        ?>
    </ul>
</header>
