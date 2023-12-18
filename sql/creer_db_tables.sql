-- Création de la base de données
CREATE DATABASE IF NOT EXISTS E_Boutique DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE E_Boutique;

-- Table "utilisateur"
CREATE TABLE IF NOT EXISTS utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    admin BOOLEAN DEFAULT FALSE
);

-- Table "produit"
CREATE TABLE IF NOT EXISTS produit (
    code VARCHAR(10) PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    marque VARCHAR(50),
    url_photo VARCHAR(255),
    prix DECIMAL(10, 2) NOT NULL,
    quantite INT NOT NULL,
    categorie VARCHAR(50),
    en_rabais BOOLEAN DEFAULT FALSE
);

-- Table "commande"
CREATE TABLE IF NOT EXISTS commande (
    numero INT AUTO_INCREMENT PRIMARY KEY,
    completed BOOLEAN DEFAULT FALSE,
    total DECIMAL(10, 2) NOT NULL,
    email_client VARCHAR(100) NOT NULL,
    FOREIGN KEY (email_client) REFERENCES utilisateur(email)
);

-- Table "produit_vendu"
CREATE TABLE IF NOT EXISTS produit_vendu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_numero INT,
    produit_code VARCHAR(10),
    quantite INT NOT NULL,
    FOREIGN KEY (commande_numero) REFERENCES commande(numero),
    FOREIGN KEY (produit_code) REFERENCES produit(code)
);




INSERT INTO produit (code, description, marque, categorie, url_photo, prix, quantite, en_rabais)
VALUES 
  ('1', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 1.png', 325.00, 10, 1),
  ('2', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 2.png', 250.00, 10, 1),
  ('3', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 3.png', 300.00, 10, 1),
  ('4', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 1.png', 325.00, 10, 1);
