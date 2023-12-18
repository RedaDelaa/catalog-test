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
	
    // Méthode pour afficher le produit sous forme de carte HTML
    public function afficherProduit()
    {
        ob_start(); // Démarre la temporisation de la sortie

        ?>
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Sale badge-->
                <?php if ($this->isEnRabais()) : ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                <?php endif; ?>
                <!-- Product image-->
                <img class="card-img-top" src="<?= $this->getUrlPhoto(); ?>" alt="<?= $this->getDescription(); ?>" />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder"><?= $this->getDescription(); ?></h5>
                        <!-- Product price-->
                        <?php if ($this->isEnRabais()) : ?>
                            <span class="text-muted text-decoration-line-through"><?= '$' . number_format($this->getPrix() + 100, 2); ?></span>
                        <?php endif; ?>
                        <?= '$' . number_format($this->getPrix(), 2); ?>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ajouter au panier</a></div>
                </div>
            </div>
        </div>
        <?php

        return ob_get_clean(); // Récupère le contenu du tampon de sortie et l'efface
    }


	public function afficherProduitPanier()
    {
        ob_start(); // Démarre la temporisation de la sortie

        ?>
        <div class="col mb-5">
            <div class="card h-100">
                <!-- Sale badge-->
                <?php if ($this->isEnRabais()) : ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                <?php endif; ?>
                <!-- Product image-->
                <img class="card-img-top" src="<?= $this->getUrlPhoto(); ?>" alt="<?= $this->getDescription(); ?>" />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder"><?= $this->getDescription(); ?></h5>
                        <!-- Product price-->
                        <?php if ($this->isEnRabais()) : ?>
                            <span class="text-muted text-decoration-line-through"><?= '$' . number_format($this->getPrix() + 100, 2); ?></span>
                        <?php endif; ?>
                        <?= '$' . number_format($this->getPrix(), 2); ?>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ajouter au panier</a></div>
                </div>
            </div>
        </div>
        <?php

        return ob_get_clean(); // Récupère le contenu du tampon de sortie et l'efface
    }


}
?>






