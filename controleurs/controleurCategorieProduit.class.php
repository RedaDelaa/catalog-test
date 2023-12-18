<?php
  	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");
    class CategorieProduit extends Controleur{
		private $tabProduits;
		private $action;
		public function __construct($action) {
			parent::__construct();
			$this->tabProduits=array();
			$this->action=$action;
		}
		public function getTabProduits(){
			return $this->tabProduits;
		}
        public function executerAction()
        {   $action=$this->action;
				if($action=="categorieProduit1"){
					$this->tabProduits=ProduitDAO::chercherAvecFiltre("where categorie = 'Carte Graphique'");	
				}elseif($action=="categorieProduit2"){
					$this->tabProduits=ProduitDAO::chercherAvecFiltre("where categorie = 'CPU'");	
				}elseif($action=="categorieProduit3"){
					$this->tabProduits=ProduitDAO::chercherAvecFiltre("where categorie = 'Carte mère'");	
				}elseif($action=="categorieProduit4"){
					$this->tabProduits=ProduitDAO::chercherAvecFiltre("where categorie = 'Power supply'");	
				}elseif($action=="categorieProduit5"){
					$this->tabProduits=ProduitDAO::chercherAvecFiltre("where categorie = 'Écran'");	
			}
            return "uneCategorie";
        }

   }

?>