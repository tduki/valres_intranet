<?php

function getUsersWithPermissions() {
    include 'connexion.inc.php';

    try {
        $mysqli = new mysqli($host, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Ajout de la colonne 'id' dans la requête SQL
        $sql = "SELECT utilisateur_id, utilisateur.nom, utilisateur.prenom, permissions.libelle_perm 
                FROM utilisateur 
                LEFT JOIN permissions ON utilisateur.id_perm = permissions.id_perm";

        $stmt = $mysqli->prepare($sql);
        $stmt = $mysqli->prepare($sql);
if ($stmt === false) {
    die("Erreur de préparation de la requête: " . $mysqli->error);
}

        $stmt->execute();
        $result = $stmt->get_result();

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>
