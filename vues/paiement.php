<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Css/style2.css" />
</head>
<body>
  <div class="formBack">
  <div class="container ">
    <h2>Page de paiement</h2>
    <form action="Accueil.php" method="post" >
      <div class="form-group">
        <label for="nom_carte">Nom sur la carte :</label>
        <input type="text"  class="form-control" id="nom_carte" placeholder="Entrez le nom sur la carte" name="nom_carte" required><br>
      </div>
      <div class="form-group">
        <label for="numero_carte">Numéro de carte :</label>
      <input type="text" class="form-control" id="numero_carte" placeholder="Entrez le numéro de la carte" name="numero_carte" required><br>
      </div>
      <div class="form-group">
        <label for="date_expiration">Date d'expiration :</label>
      <input type="text" class="form-control" id="date_expiration" name="date_expiration" placeholder="MM/AA" required><br>
      </div>
      <div class="form-group">
        <label for="cvv">CVV :</label>
        <input type="text" class="form-control" id="cvv" placeholder="CVV" name="cvv" required><br>
      </div>
      <button type="submit" class="btn btn-lg btn-success" value="Payer" style="align-items: center;">Payer</button>

    </form>

  </div>
</div>
  
</body>
</html>
