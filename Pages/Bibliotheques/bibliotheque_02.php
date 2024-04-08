<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include './../../includes/navbar.php';
    ?>


    <form action="bibliotheque_01.php" method="post">
        <label for="ville_bibliotheque">Ville de la Bibliothèque : </label>
        <input type="text" name="ville_bibliotheque" required>

        <label for="commentaire_bibliotheque">Commentaire : </label>
        <textarea name="commentaire_bibliotheque" id="" cols="60" rows="10" required></textarea>
        
        <input type="hidden" name="type" value="ajout">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>