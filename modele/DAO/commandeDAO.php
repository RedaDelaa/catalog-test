<?php

include_once('configs/configBD.interface.php');
class CommandeDao {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCommandeParNumero($numero) {
        $query = $this->db->prepare("SELECT * FROM commande WHERE numero = :numero");
        $query->bindParam(':numero', $numero);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function enregistrerCommande($completee, $total, $emailClient) {
        $query = $this->db->prepare("INSERT INTO commande (completee, total, email_client) VALUES (:completee, :total, :emailClient)");
        $query->bindParam(':completee', $completee, PDO::PARAM_BOOL);
        $query->bindParam(':total', $total);
        $query->bindParam(':emailClient', $emailClient);

        return $query->execute();
    }
}
