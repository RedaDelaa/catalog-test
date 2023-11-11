<!-- /*********************************************************** *
Cours 420-G16-RO
Projet de session 
E-boutique
AZIZ RAYENE DELAA
MAXIME DECOSTE
************************************************************* */-->
<!DOCTYPE html>
<html lang="en">
<?php
	include_once("../../Sprint2/modele/Class/produit.class.php");
	include_once('../../Sprint2/modele/DAO/ProduitDAO.class.php');


    // Création d'une instance de Produit
    $Produits = produitDAO::chercherTous();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Egg</title>
    <link rel="stylesheet" href="../Css/style2.css" />
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="../Css/styles.css" rel="stylesheet" />
</head>
<body >
    <!-- Nom Boutique-->
	<header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <a class="navbar-brand" href="Accueil.php"><img src="../images/logoo.png" alt="Logo" height="100px" class="logo"/></a>
                <h1 class="display-4 fw-bolder">OLD EGG</h1>
                <p class="lead fw-normal text-white-50 mb-0">Meilleure qualité pour le meilleure prix</p>
            </div>
        </div>
    </header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container px-4 px-lg-5">
            <!-- logo-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <!-- menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="Accueil.php">Accueil</a></li>
                    <li class="nav-item" ><a class="nav-link" href="connecter.php">Se connecter</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégorie</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="uneCategorie.php">GPU</a></li>
                            <li><a class="dropdown-item" href="uneCategorie.php">CPU</a></li>
                            <li><a class="dropdown-item" href="uneCategorie.php">Cartes mères</a></li>
                            <li><a class="dropdown-item" href="uneCategorie.php">Power suplies</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="Panier.php" class="d-flex">
                    <button class="btn btn-outline-dark" type="link">
                        <i class="bi-cart-fill me-1"></i>
                        <a href="Panier.php"><img src="../images/cart.png" alt="Logo" height="80px" class="cart"/></a>
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Caroussel -->
    <div class="container">
        <h2 class="text-center text-black display-4 fw-bolder">BEST SELLERS</h2>  
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="../images/Carte graphique 1.png" alt="Carte Graphique 1" style="width:60%;">
            </div>

            <div class="item">
                <img src="../images/Carte graphique 2.png" alt="Carte Graphique 2" style="width:60%;">
            </div>

            <div class="item">
                <img src="../images/Carte graphique 3.png" alt="Carte Graphique 3" style="width:60%;">
            </div>
          </div>
      
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
<!-- Nos Produit-->
<section class="py-5">
    <h2 class="text-center text-black display-4 fw-bolder">Recommendations</h2>  
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php 
        foreach ($Produits as $unProduit) {
            echo $unProduit->afficherProduit();
        }
        ?>
        </div>
    </div>
</section>
    <!--Membres du projet-->
	<footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Fait par </br> Aziz Rayene Delaa</br> Maxime Decoste</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
