<?php

include_once('configs/configBD.interface.php');
class UtilisateurClientDao {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getClientParEmail($email) {
        $query = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function enregistrerClient($nom, $prenom, $email, $motDePasse, $admin = false) {
        $query = $this->db->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, admin) VALUES (:nom, :prenom, :email, :motDePasse, :admin)");
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':email', $email);
        $query->bindParam(':motDePasse', $motDePasse);
        $query->bindParam(':admin', $admin, PDO::PARAM_BOOL);

        return $query->execute();
    }
    public function authentifierClient($email, $motDePasse) {
        $client = $this->getClientParEmail($email);

        if ($client && password_verify($motDePasse, $client['mot_de_passe'])) {
            // Authentification réussie
            $this->creerCookieAuthentification($email);
            return true;
        }

        // Authentification échouée
        return false;
    }

    public function deconnecterClient() {
        // Déconnexion en supprimant le cookie d'authentification
        setcookie('auth', '', time() - 3600, '/');
    }

    private function creerCookieAuthentification($email) {
        // Créer un cookie d'authentification avec une durée de vie de 7 jours
        setcookie('auth', $email, time() + 7 * 24 * 3600, '/');
    }

    public function estClientConnecte() {
        // Vérifier si le cookie d'authentification existe
        return isset($_COOKIE['auth']);
    }

    public function getClientConnecte() {
        // Récupérer les informations du client connecté en utilisant le cookie d'authentification
        if ($this->estClientConnecte()) {
            $email = $_COOKIE['auth'];
            return $this->getClientParEmail($email);
        }

        return null;
    }
}












?>