<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Inclusion des fichiers Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


    <!-- Inclusion du fichier de style pour la page de connexion -->
    <link rel="stylesheet" href="../css/login.css">

    <!-- Inclusion de la barre de navigation -->
    <?php include('../includes/nav.php'); ?>
    
    <!-- Inclusion des fichiers de connexion à la base de données et de gestion de la session -->
    <?php include('../model/connexion.inc.php'); ?>
    <?php include('../model/script_login.php'); ?>

    <div class="container mt-5">
        <h2>Connexion</h2>
        <!-- Affichage des erreurs -->
        <?php if (isset($erreur) && !empty($erreur)) { ?>
            <div class="alert alert-danger">
                <?php echo $erreur; ?>
            </div>
        <?php } ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Mail :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

    <!-- Inclusion du pied de page -->
    <?php include('../includes/footer.html'); ?>

    <script>
    // JavaScript pour afficher la popup d'erreur
    function afficherErreur(message) {
        document.getElementById('erreurMessage').textContent = message;
        $('#erreurModal').modal('show');
    }
    </script>
</body>
</html>
