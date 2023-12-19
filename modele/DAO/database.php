<?php
// database.php
include_once('DAO/configs/configBD.interface.php');

try {
    $db = new PDO(
        "mysql:host=" . ConfigBD::BD_HOTE . ";dbname=" . ConfigBD::BD_NOM,
        ConfigBD::BD_UTILISATEUR,
        ConfigBD::BD_MOT_PASSE
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    exit();
}
