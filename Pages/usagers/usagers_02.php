<?php 
    require '../../includes/connexion.php';
    require '../../includes/navbar.php';
    
$sql = "SELECT * FROM usager"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>