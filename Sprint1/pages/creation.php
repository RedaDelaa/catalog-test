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
        <h2>Créer un nouveau compte</h2>
        <form action="Accueil.php" method="get" >
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Mot de passe:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Entrez le mot de passe " name="pwd" required>
          </div>
          <div class="form-group">
            <label for="pwd">Confirmer le mot de passe:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Confirmer le mot de passe " name="pwd" required>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="remember"> Se souvenir</label>
          </div>
          <button type="submit" class="btn btn-lg btn-success" >Créer un compte</button>
          <a href="Accueil.php"><button class="btn btn-lg btn-danger" >Retour</button></a>
        </form>
      </div>
    </div>
</body>
</html>