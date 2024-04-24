<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Liste des Salles</title>
</head>
  
<body>
<?php include '../includes/nav.php'; ?>

<div class="container">
        <h1 class="text-center my-4">Liste des Salles</h1>
        <div class="scrollable-table">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="background-color:#011c39; display=none;" >Identifiant de Salle</th>
                    <th style="background-color:#011c39">Nom de la Salle</th>
                    <th style="background-color:#011c39">Catégorie</th>
                </tr>
            </thead>
            <tbody id="reservation-list">
                <!-- Les réservations seront chargées ici -->
            </tbody>
        </table>
    </div>
    </div>

   <?php include '../includes/footer.html'; ?>
   <!-- jQuery (version 3.6.0) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js (version 2.10.2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <!-- Bootstrap JS (version 4.5.2) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
    
    <script>
        $(document).ready(function() {
           
            $.ajax({
                url: '../controller/tab_salles.php',
                type: 'GET',
                dataType: 'json',
                success: function(reservations) {
                    var html = '';
                    $.each(reservations, function(index, reservation) {
                        html += '<tr><td>' + reservation.id + '</td><td>' + reservation.salle_nom + '</td><td>' + reservation.libelle + '</td></tr>';
                    });
                    $('#reservation-list').html(html);
                },
                error: function(xhr, status, error) {
                    console.log("Erreur AJAX : " + xhr.status + " " + error);
                    $('#reservation-list').html('<tr><td colspan="3">Erreur: ' + xhr.status + ' ' + error + '</td></tr>');
                }
            });
        });
    </script>
</body>
</html>
