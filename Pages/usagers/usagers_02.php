<?php
require '../../includes/connexion.php';

$sql = "SELECT * FROM usager"

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_bibliotheque.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <div class="content">
        <form action="usagers_01.php" method="post">
            <label for="nom">Nom</label>
            <input type="text" name='nom' id="nom">
            <label for="prenom">prenom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville">
            <label for="biblioteque">numero bibliotheque</label>
            <input type="text" name="biblioteque" id="biblioteque">
            <label for="commentaire">commentaire</label>
            <input type="text" name="commentaire" id="commentaire">
            <input type="submit">
        </form>
    </div>
</body>

</html>