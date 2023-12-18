<?php

include_once('configs/configBD.interface.php');
include_once('modele/commande.class.php');

class CommandeDAO
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCommandeParNumero($numero)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM commande WHERE numero = :numero");
            $query->bindParam(':numero', $numero, PDO::PARAM_INT);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de la commande par numéro: " . $e->getMessage());
            return false;
        }
    }

    public function enregistrerCommande($completee, $total, $emailClient)
    {
        try {
            $query = $this->db->prepare("INSERT INTO commande (completee, total, email_client) VALUES (:completee, :total, :emailClient)");
            $query->bindParam(':completee', $completee, PDO::PARAM_BOOL);
            $query->bindParam(':total', $total, PDO::PARAM_STR);
            $query->bindParam(':emailClient', $emailClient, PDO::PARAM_STR);

            return $query->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'enregistrement de la commande: " . $e->getMessage());
            return false;
        }
    }
    public function getCommandesParUtilisateur($emailClient)
    {
    try {
        $query = $this->db->prepare("SELECT * FROM commande WHERE email_client = :emailClient");
        $query->bindParam(':emailClient', $emailClient, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
             error_log("Erreur lors de la récupération des commandes par utilisateur: " . $e->getMessage());
            return false;
            }
    }
    public function marquerCommandeCompletee($numero)
    {
        try {
            $query = $this->db->prepare("UPDATE commande SET completee = true WHERE numero = :numero");
            $query->bindParam(':numero', $numero, PDO::PARAM_INT);

            return $query->execute();
                } catch (PDOException $e) {
                    error_log("Erreur lors du marquage de la commande comme complétée: " . $e->getMessage());
                    return false;
                }
    }
    public function getCommandesNonCompletees()
    {
        try {
            $query = $this->db->query("SELECT * FROM commande WHERE completee = false");
            return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des commandes non complétées: " . $e->getMessage());
             return false;
            }
    }
    public function getTotalCommande($numero)
    {
        try {
        $query = $this->db->prepare("SELECT total FROM commande WHERE numero = :numero");
        $query->bindParam(':numero', $numero, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchColumn();
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération du total de la commande: " . $e->getMessage());
            return false;
        }
    }
    private function supprimerProduitsVendus($numero)
    {
        try {
            $query = $this->db->prepare("DELETE FROM produit_vendu WHERE commande_numero = :numero");
            $query->bindParam(':numero', $numero, PDO::PARAM_INT);

            return $query->execute();
            } catch (PDOException $e) {
                error_log("Erreur lors de la suppression des produits vendus associés à la commande: " . $e->getMessage());
                return false;
            }
    }
    public function supprimerCommande($numero)
    {
        try {
        // Supprimer les produits vendus associés à la commande
        $this->supprimerProduitsVendus($numero);

        // Supprimer la commande
        $query = $this->db->prepare("DELETE FROM commande WHERE numero = :numero");
        $query->bindParam(':numero', $numero, PDO::PARAM_INT);

        return $query->execute();
            } catch (PDOException $e) {
                error_log("Erreur lors de la suppression de la commande: " . $e->getMessage());
                return false;
            }
}


    

}