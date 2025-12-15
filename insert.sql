-- Véhicules
INSERT INTO tb_vehicules (marque, modele, versement_minimum)
VALUES 
('Toyota', 'Hiace', 50.00),
('Hyundai', 'H1', 45.00),
('Mercedes', 'Sprinter', 60.00);
-- Chauffeurs
INSERT INTO tb_chauffeurs (nom, prenom)
VALUES
('Rakoto', 'Noah'),
('Rabe', 'Lala'),
('Andri', 'Tiana');

-- Paramètres salaire
INSERT INTO tb_parametres_salaire (taux_bas, taux_haut)
VALUES
(0.08, 0.25);

-- Pannes
INSERT INTO tb_pannes (vehicule_id, date_debut_panne, date_fin_panne, description)
VALUES
(1, '2025-12-05', '2025-12-07', 'Problème moteur'),
(2, '2025-12-10', NULL, 'Panne en cours');

-- Trajets
INSERT INTO tb_trajets (vehicule_id, chauffeur_id, point_depart, point_arrivee, date_heure_debut, date_heure_fin, distance_km, montant_recette, montant_carburant, taux_utilise, salaire_chauffeur)
VALUES
(1, 1, 'Andoharanofotsy', 'Ambohibao', '2025-12-08 08:00:00', '2025-12-08 09:00:00', 12.5, 50.00, 10.00, 0.25, 12.50),
(2, 2, 'Analakely', 'Soarano', '2025-12-08 09:30:00', '2025-12-08 10:15:00', 8.0, 40.00, 8.00, 0.08, 3.20),
(3, 3, 'Ivandry', 'Ankorondrano', '2025-12-08 10:30:00', '2025-12-08 11:00:00', 5.0, 60.00, 12.00, 0.25, 15.00);
