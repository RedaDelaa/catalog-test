<?php
	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");

	class Panier extends  Controleur {
		private $tabProduits;
		public function __construct() {
			parent::__construct();
			$this->tabProduits=array();
		}
		public function getTabProduits(){
			return $this->tabProduits;
		}
		public function executerAction() {
			$unProduit = ProduitDAO::chercher(2);      
			if($unProduit!=null){
				array_push($this->tabProduits,$unProduit);
			}
			return "Panier";
	}	
}
?>