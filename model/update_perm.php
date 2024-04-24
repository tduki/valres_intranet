<?php
include 'connexion.inc.php'; // Inclure le script de connexion

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['nouveau_libelle_perm'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nouveauLibellePerm = $_POST['nouveau_libelle_perm'];

    // Première requête pour obtenir l'id_perm actuel de l'utilisateur
    $sql = "SELECT U.id_perm FROM utilisateur as U WHERE nom = ? AND prenom = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die('Erreur de préparation de la requête : ' . $mysqli->error);
    }
    $stmt->bind_param('ss', $nom, $prenom);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Obtenir l'id_perm pour le nouveau_libelle_perm
        $sqlGetNewPermId = "SELECT id_perm FROM permissions WHERE libelle_perm = ?";
        $stmtGetNewPermId = $mysqli->prepare($sqlGetNewPermId);
        if (!$stmtGetNewPermId) {
            die('Erreur de préparation de la requête : ' . $mysqli->error);
        }
        $stmtGetNewPermId->bind_param('s', $nouveauLibellePerm);
        $stmtGetNewPermId->execute();
        $resultNewPermId = $stmtGetNewPermId->get_result();
        $newPerm = $resultNewPermId->fetch_assoc();

        if ($newPerm) {
            $newIdPerm = $newPerm['id_perm'];

            // Mise à jour de l'id_perm de l'utilisateur avec le nouvel id_perm
            $sqlUpdateUserPerm = "UPDATE utilisateur SET id_perm = ? WHERE nom = ? AND prenom = ?";
            $stmtUpdateUserPerm = $mysqli->prepare($sqlUpdateUserPerm);
            if (!$stmtUpdateUserPerm) {
                die('Erreur de préparation de la requête : ' . $mysqli->error);
            }
            $stmtUpdateUserPerm->bind_param('iss', $newIdPerm, $nom, $prenom);
            if ($stmtUpdateUserPerm->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Erreur lors de la mise à jour de l utilisateur.']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Permission non trouvée.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Utilisateur non trouvé.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Requête invalide.']);
}
?>
