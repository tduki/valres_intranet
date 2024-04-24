<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pop_up.css">
    <title>Gestion Utilisateurs</title>
</head>
<body>
    <?php include '../includes/nav.php'; ?>
    <?php include '../controller/liste_perm_user.php'; ?>

    <?php
    function renderUserTable($users) {
        if (!isset($users) || empty($users)) {
            echo '<div class="alert alert-warning" role="alert">Aucun utilisateur à afficher.</div>';
        } else {
            echo '<div class="container mt-4">';
            echo '<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#nouvelUtilisateurModal"> Ajouter un nouvel utilisateur </button>';
            echo '<table class="table">';
            echo '<thead><tr><th>Nom Prénom</th><th>Permission</th><th>Actions</th></tr></thead>';
            echo '<tr><th><input type="text" id="name" name="name" required minlength="2" maxlength="4" size="6" /></th><th><select id="nouveauPermissionSelectpop" class="form-control">
            <!-- Les options seront ajoutées par AJAX -->
        </select></th></tr>';
            echo '<tbody>';
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['nom']} {$user['prenom']}</td>";
                echo "<td>{$user['libelle_perm']}</td>";
                echo '<td>';
                echo "<button class=\"btn btn-primary btn-sm\" onclick=\"openPopup('{$user['nom']}', '{$user['prenom']}')\">Modifier</button> ";
                echo "<button class=\"btn btn-danger btn-sm\" onclick=\"ouvrirConfirmationSuppression('{$user['nom']}', '{$user['prenom']}', '{$user['utilisateur_id']}')\">Supprimer</button>";
                echo '</td>';
                echo "</tr>";
            }
            echo '</tbody></table><div id="noResultsMessage" class="alert alert-warning" style="display: none;">Aucune lignes trouvées.</div>
            </div>';
        }
    }
    include '../includes/footer.html'; 
    include '../model/modal.php';
    ?>
    
    <!-- jQuery (version 3.6.0) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js (version 2.10.2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <!-- Bootstrap JS (version 4.5.2) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>

</body>
</html>
