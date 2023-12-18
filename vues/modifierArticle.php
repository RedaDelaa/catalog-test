<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Css/style2.css" />
</head>
<body>
    <div class="formBack">
        <div class="container ">
            <h2>Modification d'article</h2> 
            <form action="Accueil.php" method="get" >
                <div class="form-group">
                    <label for="article">Nom</label>
                    <input type="nom" class="form-control" id="produit" placeholder="Entrez le nouveau nom de l'article" name="Entrez le nom" required>
                </div>
                <div class="form-group">
                    <label for="article">Prix</label>
                    <input type="prix" class="form-control" id="produit" placeholder="Entrez le nouveau prix de l'article" name="Entrez le prix" required>
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="code" class="form-control" id="produit" placeholder="Entrez le nouveau code de l'article" name="Entrez le code" required>
                </div>
                <div class="form-group">
                    <label for="article">Quantité</label>
                    <input type="quantite" class="form-control" id="produit" placeholder="Entrez le nouveau nombre d'article" name="Entrez le nombre d'article" required>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Mettre en solde?</label>
                  </div>
                  <div>
                    <label class="btn btn-primary" for="my-file-selector">
                    <input id="my-file-selector" type="image" style="display:none;">
                    Téléverser une nouvelle image
                    </div>
            </label>
            <div>
                <button type="submit" class="btn btn-lg btn-success" >Soumettre></button>
            </div>
            </form>
        </div>
    </div>      
</body>
</html>