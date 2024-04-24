<?php
// model/getLibellesPerm.php
function getLibellesPerm() {
   
    // Paramètres de connexion à la base de données
$host = 'localhost';  // Votre serveur de base de données (ex: localhost)
$username = 'adminer';  // Votre nom d'utilisateur de base de données
$password = 'Ninisino24#';  // Votre mot de passe de base de données
$dbname = 'mdll2';  // Le nom de votre base de données


// Création de la connexion
$mysqli = new mysqli($host, $username, $password, $dbname);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT libelle_perm FROM permissions";
    $result = $conn->query($sql);

    $libelles_perm = [];
    if ($result->num_rows > 0) {
        // Récupération des données
        while($row = $result->fetch_assoc()) {
            $libelles_perm[] = $row['libelle_perm'];
        }
    }
    $conn->close();
    return $libelles_perm;
}
?>
