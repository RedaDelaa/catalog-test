<?php

/* Aziz Rayene Delaa */

include_once("produitDAO.interface.php");
include_once("modele/produit.class.php");
class ProduitDAO implements DAO
{
    public static function chercher($cles)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $unProduit = null;
        $requete = $connexion->prepare("SELECT * FROM produit WHERE code=?");
        $requete->execute(array($cles));

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $unProduit = new Produit(
                $enr['code'],
                $enr['description'],
                $enr['marque'],
                $enr['categorie'],  // Ajout de la catégorie
                $enr['url_photo'],
                $enr['prix'],
                $enr['quantite'],
                $enr['en_rabais']
            );
        }

        $requete->closeCursor();
        ConnexionBD::close();
        return $unProduit;
    }

    static public function chercherTous()
    {
        return self::chercherAvecFiltre("");
    }

    static public function chercherAvecFiltre($filtre)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $tableau = [];
        $requete = $connexion->prepare("SELECT * FROM produit " . $filtre);
        $requete->execute();

        foreach ($requete as $enr) {
            $unProduit = new Produit(
                $enr['code'],
                $enr['description'],
                $enr['marque'],
                $enr['categorie'],  // Ajout de la catégorie
                $enr['url_photo'],
                $enr['prix'],
                $enr['quantite'],
                $enr['en_rabais']
            );
            array_push($tableau, $unProduit);
        }

        $requete->closeCursor();
        ConnexionBD::close();
        return $tableau;
    }

    static function inserer($unProduit)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("INSERT INTO produit (code, description, marque, categorie, url_photo, prix, quantite, en_rabais) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $tableauInfos = [
            $unProduit->getCode(),
            $unProduit->getDescription(),
            $unProduit->getMarque(),
            $unProduit->getCategorie(),
            $unProduit->getUrlPhoto(),
            $unProduit->getPrix(),
            $unProduit->getQuantite(),
            $unProduit->isEnRabais()
        ];

        return $requete->execute($tableauInfos);
    }

    static public function modifier($unProduit)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("UPDATE produit SET description=?, marque=?, categorie=?, url_photo=?, prix=?, quantite=?, en_rabais=? WHERE code=?");

        $tableauInfos = [
            $unProduit->getDescription(),
            $unProduit->getMarque(),
            $unProduit->getCategorie(),
            $unProduit->getUrlPhoto(),
            $unProduit->getPrix(),
            $unProduit->getQuantite(),
            $unProduit->isEnRabais(),
            $unProduit->getCode()
        ];

        return $requete->execute($tableauInfos);
    }

    static public function supprimer($unProduit)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("DELETE FROM produit WHERE code=?");

        $tableauInfos = [$unProduit->getCode()];

        return $requete->execute($tableauInfos);
    }

    static public function checherParPrixDesc($prixMin, $prixMax, $partieDesc)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $tableau = [];
        $requete = $connexion->prepare("SELECT * FROM produit WHERE prix >= ? AND prix <= ? AND LOWER(description) LIKE ?");
        $requete->execute([$prixMin, $prixMax, '%' . strtolower($partieDesc) . '%']);

        foreach ($requete as $enr) {
            $unProduit = new Produit(
                $enr['code'],
                $enr['description'],
                $enr['marque'],
                $enr['categorie'],
                $enr['url_photo'],
                $enr['prix'],
                $enr['quantite'],
                $enr['en_rabais']
            );
            array_push($tableau, $unProduit);
        }

        $requete->closeCursor();
        ConnexionBD::close();

        return $tableau;
    }

    static public function ajusterStock($unCode, $quantiteAAjuster)
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }

        $requete = $connexion->prepare("SELECT quantite FROM produit WHERE code = ?");
        $requete->execute([$unCode]);

        if ($requete->rowCount() != 0) {
            $enr = $requete->fetch();
            $quantiteActuelle = $enr['quantite'];
            $nouvelleQuantite = $quantiteActuelle + $quantiteAAjuster;

            $requete = $connexion->prepare("UPDATE produit SET quantite = ? WHERE code = ?");
            $requete->execute([$nouvelleQuantite, $unCode]);

            $requete->closeCursor();
            ConnexionBD::close();

            return true;
        } else {
            return false;
        }
    }

		static public function chercherToutesCategories()
		{
			try {
				$connexion = ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD.");
			}
	
			$categories = [];
			$requete = $connexion->prepare("SELECT DISTINCT categorie FROM produit");
			$requete->execute();
	
			foreach ($requete as $enr) {
				$categories[] = $enr['categorie'];
			}
	
			$requete->closeCursor();
			ConnexionBD::close();
	
			return $categories;
		}
	
		static public function chercherProduitsEnRabais()
		{
			try {
				$connexion = ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d’obtenir la connexion à la BD.");
			}
	
			$produitsEnRabais = [];
			$requete = $connexion->prepare("SELECT * FROM produit WHERE en_rabais = true");
			$requete->execute();
	
			foreach ($requete as $enr) {
				$produit = new Produit(
					$enr['code'],
					$enr['description'],
					$enr['marque'],
					$enr['categorie'],
					$enr['url_photo'],
					$enr['prix'],
					$enr['quantite'],
					$enr['en_rabais']
				);
				$produitsEnRabais[] = $produit;
			}
	
			$requete->closeCursor();
			ConnexionBD::close();
	
			return $produitsEnRabais;
		}





}

?>
