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

    public function getAllSalles() {
        // La requête SQL pour récupérer les réservations avec les détails des salles et des catégories
        $sql = "SELECT s.id, s.salle_nom, c.libelle FROM salle s,categorie_salle c WHERE s.categorie = c.id ORDER by id asc";

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
$reservations = $reservationModel->getAllSalles();

// Envoi des données au format JSON
header('Content-Type: application/json');
echo json_encode($reservations);
