<?php

class Produit {
	// Attributs
	private $code;
	private $description;
	private $marque;
	private $urlPhoto;
	private $prix;
	private $quantite;
	private $categorie;
	private $enRabais;

	// Constructeur
	public function __construct($code,$desc,$marque,$categorie,$url,$prix,$quantite=0,$enRabais=FALSE){
		$this->code=$code;
		$this->description=$desc;
		$this->marque=$marque;
		$this->urlPhoto=$url;
		$this->prix=$prix;
		$this->quantite=$quantite;
		$this->categorie=$categorie;
		$this->enRabais=$enRabais;
	}
	
	// Accesseurs
	public function getCode() {return $this->code;}
	public function getDescription() {return $this->description;}
	public function getMarque() {return $this->marque;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getPrix() {return $this->prix;}
	public function getQuantite() {return $this->quantite;}
	public function getCategorie() {return $this->categorie;}

	// Mutateurs
	public function setDescription($desc) {$this->description=$desc;}
	public function setUrlPhoto($url) {$this->photo=$url;}
	public function setPrix($prix) {$this->prix=$prix;}
	public function setCategorie($cate) {$this->categorie=$cate;}

	//Autres
	public function ajouterAuStock($quantiteAjoutee) {$this->quantite+=$quantiteAjoutee;}
	public function enleverDuStock($quantiteEnlevee) {$this->quantite-=$quantiteEnlevee;}
	public function changer_prix_pct($pourcentage) {$changement=$pourcentage/100.0*$this->prix;
		                                            $this->prix+=$changement;}
	public function isEnRabais() {return $this->enRabais;}
	public function estDisponible(){return ($this->quantite>0);}
	public function mettreEnRabais(){$this->enRabais=TRUE;}

	
	// Affichage //temporaire
	public function __toString(){
		$message="[#".$this->code."] ".$this->description." - ".$this->marque;
		$message.=" @".round($this->prix,2)."$ (".$this->quantite." en stock)";
		return $message;
	}
}
?>






