<?php
include('connexion.inc.php');

$erreur = ""; // Initialisez la variable d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $login = $_POST['username'];
    $mdp = $_POST['password'];
    // Vérifier les identifiants de connexion dans la base de données
    $query = "SELECT u.*, p.libelle_perm FROM utilisateur u INNER JOIN permissions p ON u.id_perm = p.id_perm WHERE mail = '$login' AND mdp = '$mdp'";
    $stmt = $mysqli->query($query);

    if ($stmt) {
        // Vérifier si l'utilisateur existe
        if ($stmt->num_rows === 1) {
            $row = $stmt->fetch_assoc();
            $_SESSION['utilisateur'] = $row['nom'];  
            $_SESSION['type_utilisateur'] = $row['libelle_perm'];
            // Redirection vers la page form_user_perm.php
            header('Location: ../vue/login.php'); 
            exit;
        } else {
            $erreur = "Identifiants incorrects. Veuillez réessayer !"; // erreur si les identifiants sont faux
        }
    } else {
        $erreur = "Erreur lors de l'exécution de la requête : " . $mysqli->error; // erreur si la requete est faux
    }
}
?>
