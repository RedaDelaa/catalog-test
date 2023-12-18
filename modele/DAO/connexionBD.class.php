<?php
/* Aziz Rayene Delaa
*/

include_once('configs/configBD.interface.php');
class ConnexionBD
{
	// la connexion à la BD
	private static $instance = null;
	// Constructeur de ConnexionDB
	private function __construct(){}
	
	public static function getInstance() {  // méthode statique pour accéder au singleton
		// Verifier si l’instance de PDO n’exsite pas
		if (self::$instance == null) 
		{
			// Crée l'instance de PDO
			$configuration = "mysql:host=" . ConfigBD::BD_HOTE . ";dbname=" . ConfigBD::BD_NOM;
			$utilisateur = ConfigBD::BD_UTILISATEUR;
			$motPasse = ConfigBD::BD_MOT_PASSE;
			self::$instance = new PDO($configuration, $utilisateur, $motPasse);
			self::$instance->exec("SET character_set_results = 'utf8'");
			self::$instance->exec("SET character_set_client = 'utf8'");
			self::$instance->exec("SET character_set_connection = 'utf8'");
		}
		// Retourner l'instance
		return self::$instance;
	}

	// Fermer la connexion
	public static function close(){self::$instance = null;}
}
