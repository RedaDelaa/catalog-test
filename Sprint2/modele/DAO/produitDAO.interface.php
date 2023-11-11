<?php
/* Aziz Rayene Delaa */
include_once('connexionBD.class.php');
interface DAO
{
	
	static public function chercher($cles);
	
	static public function chercherTous();
	
	static public function chercherAvecFiltre($filtre);
	
	static public function inserer($unObjet);
	
	static public function modifier($unObjet);
	
	static public function supprimer($unObjet);

	static public function checherParPrixDesc($prixMin, $prixMax, $partieDesc);

	static public function ajusterStock($unCode, $quantiteAAjuster);

	static public function chercherToutesCategories();

	static public function chercherProduitsEnRabais();
}
?>