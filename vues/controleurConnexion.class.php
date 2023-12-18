<?php
	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");
	class Connexion extends Controleur  {

		public function __construct() {
			parent::__construct();

		}
		public function getTabProduits(){
			return $this->tabProduits;
		}
		public function executerAction()
		{	
			return "connecter";
		}
	}	
	
?>