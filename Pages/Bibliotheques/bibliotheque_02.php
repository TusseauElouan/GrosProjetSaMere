<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Ajout d'une bibliothèque</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <div class="content">
        <div class="content-inside">
        <form class="form" action="bibliotheque_01.php" method="post">
        <div class="label-box">
            <label for="ville_bibliotheque">Ville de la Bibliothèque : </label>
            <input class="form-input" type="text" name="ville_bibliotheque" required>
        </div>

        <div class="label-box-textarea">
            <label for="commentaire_bibliotheque">Commentaire : </label><br />
            <textarea class="form-input" name="commentaire_bibliotheque" id="" cols="60" rows="10" required></textarea>
        </div>

        <div>
            <input type="hidden" name="type" value="ajout">
            <input class="submit-btn" type="submit" value="Envoyer">
        </div>
        </form>
    </div>
</body>

</html>