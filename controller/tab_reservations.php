<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../model/connexion.inc.php"; 

class ReservationModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getAllReservationsWithDetails() {
        // La requête SQL pour récupérer les réservations avec les détails des salles et des catégories
        $sql = "SELECT r.*,s.*,p.libelle as libelle_periode, p.id_periode,c.*,e.*,st.libelle as structure_libelle
        FROM reservation r 
        JOIN salle s ON r.salle_id = s.id 
        JOIN categorie_salle c ON s.categorie = c.id
        JOIN periode p ON p.id_periode=r.id_periode
        JOIN etat e ON e.idEtat = r.idEtat
        JOIN utilisateur u ON u.utilisateur_id=r.utilisateur_id
        JOIN structure st ON st.id = u.structure_id";

        // Préparation et exécution de la requête
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt === false) {
            die("Erreur de préparation de la requête: " . $this->mysqli->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $reservations = [];
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }

        return $reservations;
    }
}

// Instanciation de la classe ReservationModel et récupération des données
$reservationModel = new ReservationModel($mysqli);
$reservations = $reservationModel->getAllReservationsWithDetails();

// Envoi des données au format JSON
header('Content-Type: application/json');
echo json_encode($reservations, JSON_UNESCAPED_UNICODE);
