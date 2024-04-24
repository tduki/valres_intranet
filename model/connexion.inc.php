<?php
// Paramètres de connexion à la base de données
$host = 'localhost';  // Votre serveur de base de données (ex: localhost)
$username = 'adminer';  // Votre nom d'utilisateur de base de données
$password = 'Ninisino24#';  // Votre mot de passe de base de données
$dbname = 'mdll2';  // Le nom de votre base de données


// Création de la connexion
$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

?>