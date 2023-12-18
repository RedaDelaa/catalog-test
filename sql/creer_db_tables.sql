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

INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, admin)
VALUES ('Aziz', 'Aziz', 'Aziz@gmail.com', 'Aziz123456', FALSE),
VALUES ('Admin', 'Admin', 'Admin@gmail.com', 'Admin123456', TRUE);


INSERT INTO produit (code, description, marque, categorie, url_photo, prix, quantite, en_rabais)
VALUES 
    ('1', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 1.png', 325.00, 10, TRUE),
    ('2', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 2.png', 250.00, 10, FALSE),
    ('3', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 3.png', 300.00, 10, FALSE),
    ('4', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 4.png', 325.00, 10, FALSE),
    ('5', 'Gygabyte RTX GPU', 'Gygabyte', 'Carte Graphique', 'images/Carte graphique 5.png', 325.00, 10, TRUE),
    ('6', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 6.png', 250.00, 10, FALSE),
    ('7', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 7.png', 300.00, 10, TRUE),
    ('8', 'MSI RTX GPU', 'MSI', 'Carte Graphique', 'images/Carte graphique 8.png', 325.00, 10, TRUE),
    ('9', 'Gygabyte RTX GPU', 'Gygabyte', 'Carte Graphique', 'images/Carte graphique 9.png', 250.00, 10, FALSE),
    ('10', 'Gygabyte RTX GPU', 'Gygabyte', 'Carte Graphique', 'images/Carte graphique 10.png', 300.00, 10, FALSE),
    ('11', 'Intel i5', 'Intel', 'CPU', 'images/cpu 1.png', 325.00, 10, TRUE),
    ('12', 'Ryzen 5', 'AMD', 'CPU', 'images/cpu 2.png', 250.00, 10, FALSE),
    ('13', 'Intel i3', 'Intel', 'CPU', 'images/cpu 3.png', 300.00, 10, FALSE),
    ('14', 'Intel i7', 'Intel', 'CPU', 'images/cpu 4.png', 325.00, 10, TRUE),
    ('15', 'Ryzen 9', 'AMD', 'CPU', 'images/cpu 5.png', 250.00, 10, FALSE),
    ('16', 'Ryzen 7', 'AMD', 'CPU', 'images/cpu 6.png', 300.00, 10, FALSE),
    ('17', 'Intel i9', 'Intel', 'CPU', 'images/cpu 7.png', 325.00, 10, TRUE),
    ('18', 'Ryzen 7', 'AMD', 'CPU', 'images/cpu 8.png', 250.00, 10, FALSE),
    ('19', 'Ryzen 9', 'AMD', 'CPU', 'images/cpu 9.png', 300.00, 10, FALSE),
    ('20', 'Ryzen 5', 'AMD', 'CPU', 'images/cpu 10.png', 325.00, 10, FALSE),
    ('21', 'Power supply 600w', 'AMD', 'Power supply', 'images/ps 1.png', 250.00, 10, TRUE),
    ('22', 'Power supply 650w', 'AMD', 'Power supply', 'images/ps 2.png', 300.00, 10, TRUE),
    ('23', 'Power supply 850w', 'AMD', 'Power supply', 'images/ps 3.png', 325.00, 10, FALSE),
    ('24', 'Power supply 750w', 'AMD', 'Power supply', 'images/ps 4.png', 250.00, 10, FALSE),
    ('25', 'Power supply 1000w', 'AMD', 'Power supply', 'images/ps 5.png', 300.00, 10, FALSE),
    ('26', 'Carte mère Asus', 'Asus', 'Carte mère', 'images/cm 1.png', 325.00, 10, TRUE),
    ('27', 'Carte mère MSI', 'MSI', 'Carte mère', 'images/cm 2.png', 250.00, 10, FALSE),
    ('28', 'Carte mère Gygabyte', 'Gygabyte', 'Carte mère', 'images/cm 3.png', 300.00, 10, FALSE),
    ('29', 'Carte mère MSI', 'MSI', 'Carte mère', 'images/cm 4.png', 325.00, 10, FALSE),
    ('30', 'Carte mère Gygabyte', 'Gygabyte', 'Carte mère', 'images/cm 5.png', 250.00, 10, TRUE),
    ('31', 'Odyssey screen 1', 'Samsung', 'Écran', 'images/screen 1.png', 250.00, 10, FALSE),
    ('32', 'Tuf screen', 'TUF', 'Écran', 'images/screen 2.png', 250.00, 10, FALSE),
    ('33', 'Odyssey screen 3', 'Samsung', 'Écran', 'images/screen 3.png', 250.00, 10, TRUE),
    ('34', 'Odyssey screen 2', 'Samsung', 'Écran', 'images/screen 4.png', 550.00, 10, FALSE),
    ('35', 'Odyssey screen 9', 'Samsung', 'Écran', 'images/screen 5.png', 1250.00, 10, FALSE);
