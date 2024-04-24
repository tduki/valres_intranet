<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une réservation</title>
    <!-- Bootstrap CSS (version 4.5.2) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (version 3.6.0) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js (version 2.10.2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <!-- Bootstrap JS (version 4.5.2) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/pop_up.css">
    <link rel="stylesheet" href="../css/xml.css">

</head>
<body>
<?php include '../includes/nav.php'; ?>
 
    <form action="#" method="post" id="form_reservSalle">

        <h3>Supprimer une réservation: <?= date("d/m/Y"); ?></h3>

        <!-- Selectionner la salle -->
		<select name="salle_select">
			<optgroup label="Liste des Salles"></optgroup>
			<option value=''> Liste des salles</option>
		</select><br><br>

        <!-- La date de reservation -->
        <input type="date" name="date_select" required>
        
        <!-- La période -->
        <select name="periode_select" required style="width: 100px; text-align: center;">
			<optgroup label="Les Périodes"></optgroup>
            <option value=''> Liste des Périodes</option>
		</select><br><br>

        <input type="submit" value="Supprimer une réservation" name="genere_reserv" id="red_btn">
    </form><br>

    <!-- Custom JavaScript -->   <?php include '../includes/footer.html'; ?>

    <script src="../js/script.js"></script>
</body>
</html>