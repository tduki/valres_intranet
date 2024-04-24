<?php

include '../model/connexion.inc.php';   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $structure_id = intval($_POST['structure_id']);
    $structure_nom = $_POST['structure_nom'];
    $adresse = $_POST['adr'];
    $email = $_POST['mail'];
    $id_perm = intval($_POST['id_perm']);
    $mdp = $_POST['mdp'];

    $sql = "INSERT INTO utilisateur (nom, prenom,structure_id, structure_nom,structure_adresse, mail, id_perm, mdp) VALUES (?,?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssisssis", $nom, $prenom, $structure_id, $structure_nom, $adresse, $email, $id_perm, $mdp);
    if ($stmt->execute()) {
        // Requête réussie
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Aucune ligne affectée']);
        }
    } else {
        // Erreur lors de l'exécution
        echo json_encode(['success' => false, 'message' => "Erreur d'exécution : " . $stmt->error]);
    }
    $stmt->close();
    $mysqli->close();
    
}
?>
