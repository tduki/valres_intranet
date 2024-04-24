<?php
// Paramètres de connexion à la base de données
$host = 'localhost';  // Votre serveur de base de données (ex: localhost)
$username = 'adminer';  // Votre nom d'utilisateur de base de données
$password = 'Ninisino24#';  // Votre mot de passe de base de données
$dbname = 'mdll2';  // Le nom de votre base de données

try {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die('Erreur de connexion: ' . $mysqli->connect_error);
    }

    $sql = "SELECT id_perm, libelle_perm FROM permissions";
    $result = $mysqli->query($sql);

    $permissions = [];
    while ($row = $result->fetch_assoc()) {
        $permissions[] = $row;
    }

    echo json_encode($permissions);
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>
