<!DOCTYPE html>
<html lang="fr">
<body>
<link rel="stylesheet" href="../css/nav_footer.css">
    <!-- Barre de navigation Bootstrap -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo de la barre de navigation -->
            <a class="navbar-brand" href="../vue/login.php">
                <img src="../image/logo.png" alt="Image du logo" class="footer-logo">
                Valres
            </a>
            <!-- Bouton de bascule pour les menus déroulants en version mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu de navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Éléments du menu -->
                    <?php
                    // Démarrez la session et incluez les fichiers nécessaires
                    session_start();
                    include('../model/connexion.inc.php');
                    include('../model/script_login.php');
                    echo '<ul class="navbar-nav ml-auto">';
                    if (isset($_SESSION['utilisateur'])) {
                                               
                        // Affichage des liens en fonction du type d'utilisateur
                        if ($_SESSION['type_utilisateur'] == 'Admin') {
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/salles.php">Nos salles</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/structure.inc.php">Les réservations</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/form_user_perm.php">Panel</a></li>';
                        } elseif ($_SESSION['type_utilisateur'] == 'Responsable') {
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/creer_reservation.php">Créer une réservation</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/supprimer_reservation.php">Supprimer une réservation</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/structure.inc.php">Les réservations</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/salles.php">Voir les salles</a></li>';
                        } elseif ($_SESSION['type_utilisateur'] == 'Secretariat') {
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/valider_reservation.php">Valider une réservation</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/creer_reservation.php">Créer une réservation</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/supprimer_reservation.php">Supprimer une réservation</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/generer_xml.php">Générer un fichier XML</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="../vue/structure.inc.php">Les réservations</a></li>';
                        }
                        
                        echo '<li class="nav-item"><a class="nav-link" href="../vue/deconnexion.php">Déconnexion ('.$_SESSION['utilisateur'].','.$_SESSION['type_utilisateur'].')</a></li>';
                    } else {
                        // Si l'utilisateur n'est pas connecté, affichez le lien de connexion
                        echo '<li class="nav-item"><a class="nav-link" href="../vue/login.php">Connexion</a></li>';
                    }
                    echo '</ul>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Scripts JavaScript nécessaires pour Bootstrap (jQuery, Popper.js, Bootstrap.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
