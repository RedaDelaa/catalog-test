<?php
global $db;
include_once("modele/DAO/clientDAO.class.php");
include_once("modele/DAO/database.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$messageErreur = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $clientDAO = new ClientDAO($db);
    $donneesUtilisateur = $clientDAO->getClientParEmail($_POST['email']);

    if ($donneesUtilisateur != null) {
        $unUtilisateur = new Utilisateur(
            $donneesUtilisateur['nom'],
            $donneesUtilisateur['prenom'],
            $donneesUtilisateur['email'],
            $donneesUtilisateur['mot_de_passe'],
            $donneesUtilisateur['admin']
        );
       // var_dump($unUtilisateur); // Affiche les informations de l'utilisateur

        if ($unUtilisateur->verifierMotPasse($_POST['password'])) {

            // Après une vérification réussie du mot de passe
            $_SESSION['utilisateurConnecte'] = true;
            $_SESSION['emailUtilisateur'] = $unUtilisateur->getEmail();
            $_SESSION['IsAdmin'] =  $donneesUtilisateur['admin'];
          //  var_dump($_SESSION);
            header("Location: vues/uneCategorie.php");
            exit();
        } else {
            $messageErreur = "Mot de passe incorrect.";
        }
    } else {
        $messageErreur = "Utilisateur non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Css/style2.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <style>
      .error {
        color: red;
      }
      input.error {
        border: 1px solid red;
      }
    </style>
</head>
<body>
  <div class="formBack">
  <div class="container ">
    <h2>Se connecter</h2>
      <?php if ($messageErreur): ?>
          <p class="error"><?php echo $messageErreur; ?></p>
      <?php endif; ?>
    <form id="signupForm" action="?action=connecter" method="post" >
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
      </div>
      <div class="form-group">
        <label for="pwd">Mot de passe:</label>
        <div class="input-group">
        <input class="form-control" type="password" name="password" id="password" placeholder="Entrez votre mot de passe" required>
        </div>
      <div class="checkbox">
        <label><input type="checkbox" name="remember"> Se souvenir</label>
      </div>
      <a href="?action=creer">Creer un compte <br><br></a>
      <button type="submit" class="btn btn-lg btn-success" >Connexion></button>
    </form>
  </div>
</div>
<script src="js/validation.js"></script>
</body>
</html>