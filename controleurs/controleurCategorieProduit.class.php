<?php
  	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");
    class CategorieProduit extends Controleur{
		private $tabProduits;
		public function __construct() {
			parent::__construct();
			$this->tabProduits=array();
		}
		public function getTabProduits(){
			return $this->tabProduits;
		}
        public function executerAction()
        {   
            $this->tabProduits=ProduitDAO::chercherTous();	
            return "uneCategorie";
        }

   }

?>