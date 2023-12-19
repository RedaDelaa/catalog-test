<header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['utilisateurConnecte']) || $_SESSION['IsAdmin'] != 1) {
                    header("Location: index.php?action=connecter");
                    exit();
                }
                ?>
                <?php if (isset($_SESSION['utilisateurConnecte']) && $_SESSION['utilisateurConnecte']): ?>
            <div id="infoUtilisateur">
                    <p id="info">Bienvenue, <?php echo htmlspecialchars($_SESSION['emailUtilisateur']); ?></p>
                    <a id="adminlink" href="admin/">Section Admin</a>
            </div>
                <?php endif; ?>
                <a class="navbar-brand" href="?action=voirAccueil"><img  src="images/logoo.png" onclick="gererAnimation(500);" alt="Logo" height="100px" class="logo"  /></a>
                <h1 class="display-4 fw-bolder">OLD EGG</h1>
                <p class="lead fw-normal text-white-50 mb-0">Meilleure qualité pour le meilleure prix</p>
            </div>
        </div>
</header>