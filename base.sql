CREATE DATABASE IF NOT EXISTS taxi_be;
USE taxi_be;


-- Table véhicules
CREATE TABLE tb_vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50),
    modele VARCHAR(50),
    versement_minimum DECIMAL(10,2) DEFAULT 50.00
);

-- Table chauffeurs
CREATE TABLE tb_chauffeurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL
);

-- Table trajets
CREATE TABLE tb_trajets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT,
    chauffeur_id INT,
    point_depart VARCHAR(100),
    point_arrivee VARCHAR(100),
    date_heure_debut DATETIME,
    date_heure_fin DATETIME,
    distance_km DECIMAL(10,2),
    montant_recette DECIMAL(10,2),
    montant_carburant DECIMAL(10,2),
    taux_utilise DECIMAL(5,2),      -- 0.08 ou 0.25
    salaire_chauffeur DECIMAL(10,2),
    FOREIGN KEY (vehicule_id) REFERENCES tb_vehicules(id),
    FOREIGN KEY (chauffeur_id) REFERENCES tb_chauffeurs(id)
);

-- Table pannes
CREATE TABLE tb_pannes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT,
    date_debut_panne DATE NOT NULL,
    date_fin_panne DATE,
    description TEXT,
    FOREIGN KEY (vehicule_id) REFERENCES tb_vehicules(id)
);

-- Table paramètres salaire (pourcentage modifiable)
CREATE TABLE tb_parametres_salaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    taux_bas DECIMAL(5,2) DEFAULT 0.08,
    taux_haut DECIMAL(5,2) DEFAULT 0.25,
    date_debut DATE DEFAULT CURRENT_DATE
);
