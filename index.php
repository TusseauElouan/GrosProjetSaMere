<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/css_bibliotheque.css">
    <title>Accueil</title>

    <script>
        // Fonction pour afficher la date et l'heure actuelles en continu
        function afficherDateHeure() {
            var maintenant = new Date();
            var jour = maintenant.getDate().toString().padStart(2, '0');
            var mois = (maintenant.getMonth() + 1).toString().padStart(2, '0'); // Mois de 0 à 11, donc +1
            var annee = maintenant.getFullYear();
            var heures = maintenant.getHours().toString().padStart(2, '0');
            var minutes = maintenant.getMinutes().toString().padStart(2, '0');

            var dateAffichee = jour + '/' + mois + '/' + annee;
            var heureAffichee = heures + ':' + minutes;

            document.getElementById('date-heure').textContent = dateAffichee + ' ' + heureAffichee;
        }

        // Mettre à jour la date et l'heure toutes les secondes
        setInterval(afficherDateHeure, 1000);
    </script>

</head>

<body onload="afficherHeure()">

    <?php include 'includes/navbar.php' ?>

    <div class="affichage-heure">
        <p id="date-heure"></p>
    </div>

    <div class="affichage-titre">
        <h1>Accueil</h1>
    </div>

    <div class="content">
        <p>Bienvenue !</p>
    </div>

    <div class="noms">
        <p>
            Foucher Theo,
            Chevalier Bastien,
            Chevalier Clement,
            Maillard Felis,
            Maillard Lucas,
            Parizet Martin,
            Mars Rayan,
            Merlet Arya,
            Delechamp Gabriel,
            Le Gallic Gwilherm,
            Bertheau Elmo,
            Bertrand Killian,
            Tusseau Elouan,
            Camus Theo
        </p>
    </div>
</body>

</html>