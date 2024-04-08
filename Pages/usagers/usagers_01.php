<?php
    require_once '../../includes/connexion.php';



    if(isset($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["ville"],$_REQUEST["biblioteque"],$_REQUEST["commentaire"])){
        $nom = $_REQUEST["nom"];
        $prenom = $_REQUEST["prenom"];
        $ville = $_REQUEST["ville"];
        $commentaire = $_REQUEST["commentaire"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="affichageUsager.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name='nom'>
        <label for="prenom">prenom</label>
        <input type="text" name="prenom">
        <label for="ville">Ville</label>
        <input type="text" name="ville">
        <label for="biblioteque"></label>
        <input type="text" name="biblioteque">
        <label for="commentaire">commentaire</label>
        <input type="text" name="commentaire" id="commentaire">
        <input type="submit">
    </form>

</body>
</html>