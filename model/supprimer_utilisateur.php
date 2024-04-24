<?php
// Connexion à la base de données
$host = 'localhost'; // ou votre adresse de serveur
$dbname = 'mdll2';
$user = 'adminer';
$password = 'Ninisino24#';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérification et récupération de l'ID de l'utilisateur
if (isset($_POST['utilisateur_id'])) {
    $idUtilisateur = $_POST['utilisateur_id'];

    try {
        // Requête de suppression
        $stmt = $pdo->prepare("DELETE FROM utilisateur WHERE utilisateur_id = :utilisateur_id");
        $stmt->bindParam(':utilisateur_id', $idUtilisateur, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Aucun utilisateur trouvé avec cet ID.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID utilisateur non fourni.']);
}
?>
