<?php
include_once('configs/configBD.interface.php');
include_once('modele/Utilisateur.class.php');

class ClientDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getClientParEmail($email) {
        try {
            $query = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $query->bindParam(':email', $email);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération du client par email: " . $e->getMessage());
            throw new Exception("Erreur de base de données lors de la récupération du client.");
        }
    }

    public function enregistrerClient($nom, $prenom, $email, $motDePasse, $admin = false) {
        try {
            $query = $this->db->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, admin) VALUES (:nom, :prenom, :email, :motDePasse, :admin)");
            $query->bindParam(':nom', $nom);
            $query->bindParam(':prenom', $prenom);
            $query->bindParam(':email', $email);
            $query->bindParam(':motDePasse', $motDePasse);
            $query->bindParam(':admin', $admin, PDO::PARAM_BOOL);

            return $query->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'enregistrement du client: " . $e->getMessage());
            throw new Exception("Erreur de base de données lors de l'enregistrement du client.");
        }
    }

    public function authentifierClient($email, $motDePasse) {
        try {
            $client = $this->getClientParEmail($email);

            if ($client && password_verify($motDePasse, $client['mot_de_passe'])) {
                // Authentification réussie
                $this->creerCookieAuthentification($email);
                return true;
            }

            // Authentification échouée
            return false;
        } catch (Exception $e) {
            error_log("Erreur lors de l'authentification du client: " . $e->getMessage());
            throw new Exception("Erreur lors de l'authentification du client.");
        }
    }

    public function deconnecterClient() {
        try {
            // Déconnexion en supprimant le cookie d'authentification
            setcookie('auth', '', time() - 3600, '/');
            // Supprimer la session
            session_destroy();
        } catch (Exception $e) {
            error_log("Erreur lors de la déconnexion du client: " . $e->getMessage());
            throw new Exception("Erreur lors de la déconnexion du client.");
        }
    }

    private function creerCookieAuthentification($email) {
        try {
            // Créer un cookie d'authentification avec une durée de vie de 7 jours
            setcookie('auth', $email, time() + 7 * 24 * 3600, '/');
        } catch (Exception $e) {
            error_log("Erreur lors de la création du cookie d'authentification: " . $e->getMessage());
            throw new Exception("Erreur lors de la création du cookie d'authentification.");
        }
    }

    public function estClientConnecte() {
        try {
            // Vérifier si le cookie d'authentification existe
            return isset($_COOKIE['auth']) || isset($_SESSION['auth']);
        } catch (Exception $e) {
            error_log("Erreur lors de la vérification de la connexion du client: " . $e->getMessage());
            throw new Exception("Erreur lors de la vérification de la connexion du client.");
        }
    }

    public function getClientConnecte() {
        try {
            // Récupérer les informations du client connecté en utilisant le cookie d'authentification
            if ($this->estClientConnecte()) {
                $email = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : $_SESSION['auth'];
                return $this->getClientParEmail($email);
            }

            return null;
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération du client connecté: " . $e->getMessage());
            throw new Exception("Erreur lors de la récupération du client connecté.");
        }
    }
}
?>








