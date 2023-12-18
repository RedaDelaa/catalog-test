<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="Css/style3.css" rel="stylesheet" />
    <link href="Css/styles.css" rel="stylesheet" />
    
    <?php if (!isset($controleur)) header("Location: ..\index.php");                 
    $Produits =$controleur->getTabProduits();
    ?>
</head>
<body>
    <div class="card">
    <div class="row">
        <div class="col-md-8 card">
                <div class="title">
                    <div class="row">
                        <div class="col"><h2 class="text-center"><b>Panier</b></h2></div>

                    </div>
                </div>    
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="images/Carte graphique 2.png" alt="Carte graphique 2" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">MSI RTX GPU</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$500.00</span>
                                $325.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="col text-center ">
                            <div class="number-box">
                              <a href="#" class="minus">-</a>
                              <a href="#" class="number border">1</a>
                              <a href="#" class="plus">+</a>
                            </div>
                          </div>

                    </div>
                </div>

           
               <!-- Retour accueil-->
                <div class="back-to-shop text-bg-dark text-center text-light" style="font-size: large;" ><a href="?action=voirAccueil">&leftarrow;</a><span class=" text-muted" ><span style=" color: white;">Retour au magasin</span></span></div>
            </div>
            <div class="col-md-4 summary">
                <div><h5 class="text-center"><b>Sommaire de la commande</b></h5></div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">1 item</div>
                    <div class="col text-right"> 325.00 $</div>
                </div>
                <form>
                    <p>Livraison</p>
                    <select><option class="text-muted">Standard-Delivery</option></select>
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">PRIX TOTAL</div>
                    <div class="col text-right"> 325.00 $</div>
                </div>
                <a href="paiement.php"><button class="btn text-bg-dark">CHECKOUT</button></a>
            </div>
        </div>
        
    </div>
</body>
</html>