<?php
	include_once("controleurs/controleurAccueilDefaut.class.php");
    include_once("controleurs/controleurPanier.class.php");
    include_once("controleurs/controleurCategorieProduit.class.php");
	include_once("controleurs/controleurConnexion.class.php");
	include_once("controleurs/controleurCreation.class.php");
	class Manufacture {
		public static function creerControleur($action) {
			$controleur=null;
			if($action=="categorieProduit1"){
            $controleur = new CategorieProduit($action);
			}elseif($action=="categorieProduit2"){
              $controleur = new CategorieProduit($action);
			}elseif($action=="categorieProduit3"){
				$controleur = new CategorieProduit($action);
			}elseif($action=="categorieProduit4"){
				$controleur = new CategorieProduit($action);
			}elseif($action=="categorieProduit5"){
				$controleur = new CategorieProduit($action);
			}elseif($action=="Panier"){
				$controleur = new Panier();
			}elseif($action=="connecter"){
			$controleur = new Connexion();
		  }
		  elseif($action=="creer"){
			$controleur = new Creation();
		  }
			else{
				$controleur = new AccueilDefaut();
			}
			return $controleur;
		}
	}
	
?>