<?php

class Utilisateur {
    private $admin = false;
    private $nom;
    private $prenom;
    private $email;
    private $motDePasse;

    // Constructeur
    public function __construct($nom, $prenom, $email, $motDePasse, $admin = false) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->admin = $admin;
    }

    // Mutateurs
	public function setNom($nom) {$this->nom = $nom;}
	public function setPrenom($prenom) {$this->prenom = $prenom;}
	public function setEmail($email) {$this->email = $email;}
	public function setMotDePasse($motDePasse) {$this->motDePasse = $motDePasse;}

    // Accesseurs
    public function isAdmin() {return $this->admin;}
    public function getNom() {return $this->nom;}
	public function getPrenom() {return $this->prenom;}
	public function getEmail() {return $this->email;}
	public function getMotDePasse() {return $this->motDePasse;}

	// Méthode de vérification du mot de passe
    public function verifierMotDePasse($motDePasseAVerifier) {
        return password_verify($motDePasseAVerifier, $this->motDePasse);
    }
	
    // Méthode __toString()
    public function __toString() {
        return "Utilisateur [Nom: {$this->nom}, Prénom: {$this->prenom}, Email: {$this->email}]";
    }
}
?>







