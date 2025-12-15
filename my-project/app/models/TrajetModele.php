<?php 
namespace app\models;
use Flight;

class TrajetModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getTrajets() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_trajets");
        return $stmt->fetchAll();
    }
    public function getTrajetsById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_trajets WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
    public function getListeParJour($date = null) {

    $sql = "
        SELECT 
    DATE(t.date_heure_debut) AS jour,
    CONCAT(c.nom, ' ', c.prenom) AS chauffeur,
    v.marque,
    v.modele,
    SUM(t.distance_km) AS km_total,
    SUM(t.montant_recette) AS total_recette,
    SUM(t.montant_carburant) AS total_carburant
FROM tb_trajets t
JOIN tb_vehicules v ON v.id = t.vehicule_id
JOIN tb_chauffeurs c ON c.id = t.chauffeur_id
GROUP BY 
    jour,
    chauffeur,
    v.marque,
    v.modele
ORDER BY jour;

    ";

    if ($date !== null) {
        $sql .= " WHERE DATE(t.date_heure_debut) = ?";
    }

    $sql .= "
        GROUP BY 
            jour, v.immatriculation, c.nom, c.prenom
        ORDER BY jour DESC
    ";

    if ($date !== null) {
        $stmt = $this->db->runQuery($sql, [$date]);
    } else {
        $stmt = $this->db->runQuery($sql);
    }

    return $stmt->fetchAll();
}

    
}
?>