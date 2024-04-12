<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/css_bibliotheque.css">
    <title>Accueil</title>
</head>

<body>

    <nav>
        <a href="index.php">Menu principal</a>
        <a href="Pages/Bibliotheques/bibliotheque_01.php">Bibliothèques</a>
        <a href="Pages/Auteurs/auteur_01.php">Auteurs</a>
        <a href="Pages/Ouvrages/ouvrages_01.php">Ouvrages</a>
        <a href="Pages/Usagers/usagers_01.php">Usagers</a>
        <a href="Pages/Emprunts/emprunt_01.php">Emprunts</a>
        <a href="Pages/Retours/retour_01.php">Retours</a>
        <a href="Pages/Transferts/transfert_01.php">Transferts</a>
        <a href="../Historique/historique_01.php">Historique des ouvrages</a>
    </nav>

    <?php 
    include 'includes/heure.php';

    include 'includes/titre-page.php';
    ?>

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
