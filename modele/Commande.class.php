<?php

class Commande {
    private $numero;
    private $completed;
    private $total;
    private $listeProduits;
    private $emailClient;

    // Constructeur
    public function __construct($numero, $completed = false, $total = 0, $emailClient) {
        $this->numero = $numero;
        $this->completed = $completed;
        $this->total = $total;
        $this->listeProduits = array(); // Initialise la liste des produits
        $this->emailClient = $emailClient;
    }

    // Mutateurs
    public function setNumero($numero) {$this->numero = $numero;}
    public function setCompleted($completed) {$this->completed = $completed;}
    public function setTotal($total) {$this->total = $total;}
    public function setEmailClient($emailClient) {$this->emailClient = $emailClient;}
    // Accesseurs
    public function getNumero() {return $this->numero;}
    public function ajouterProduit(Produit $produit) {
        $this->listeProduits[] = $produit;
        $this->total += $produit->getPrix();
    }

    // Méthode __toString()
    public function __toString() {
        $message = "Commande #{$this->numero}\n";
        $message .= "Client: {$this->emailClient}\n";
        $message .= "Total: {$this->total}$\n";
        $message .= "Produits:\n";
        foreach ($this->listeProduits as $produit) {
            $message .= $produit->__toString() . "\n";
        }

        return $message;
    }
}

?>







