<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/pop_up.css">
    <title>Liste des Réservations</title>
</head>
  
<body>
<?php include '../includes/nav.php'; ?>

    <div class="container">
        <h1 class="text-center my-4">Confirmer les Réservations</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th style="background-color:#011c39">Période</th>
                    <th style="background-color:#011c39">Salle</th>
                    <th style="background-color:#011c39">Date</th>
                    <th style="background-color:#011c39">Structure</th>
                    <th style="background-color:#011c39">Etat</th>

                </tr>
            </thead>
            <tbody id="data-table">
                <!-- Les données de réservation seront chargées ici avec AJAX -->
            </tbody>
        </table>
    </div>

   <?php include '../includes/footer.html'; ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function() {
    $.getJSON('../controller/tab_reservations.php', function(reservations) {
        var html = '';
        $.each(reservations, function(index, reservation) {
            html += '<tr>';
            html += '<td>' + reservation.libelle_periode + '</td>';
            html += '<td>' + reservation.salle_nom + '</td>';
            html += '<td>' + reservation.date + '</td>';
            html += '<td>' + reservation.structure_libelle + '</td>';
            html += '<td>'; // Ouvrez la balise <td> ici
            html += reservation.libelle;
            html += '<select class="form-control" onchange="updateReservationState(this, ' + reservation.id + ')">';
            html += '<option value="Valide">Valide</option>';  
            html += '<option value="Provisoire">Provisoire</option>';  
            html += '<option value="Annule">Annule</option>';
            html += '</select>';
            html += '</td>'; 
            html += '</tr>';
        });
        $('#data-table').html(html);
    });
});

</script>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
