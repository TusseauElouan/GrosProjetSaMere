<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('includes/navbar.php');

    $id_bibliotheque=$_GET["id_bibliotheque"];

    $sql = "SELECT * FROM bibliotheque WHERE numero_bibliotheque='".$id_bibliotheque."'";
    $temp = $pdo->query($sql); 
    $resultat = $temp->fetch();
    ?>

    <form action="bibliotheque_01.php" method="post">
        <label for="ville_bibliotheque">Ville de la Bibliothèque : </label>
        <input type="text" name="ville_bibliotheque" required value="<?=$resultat['ville_bibliotheque']?>">

        <label for="commentaire_bibliotheque">Commentaire : </label>
        <textarea name="commentaire_bibliotheque" id="" cols="60" rows="10" required value="<?=$resultat['commentaire']?>"></textarea>

        <input type="hidden" name="type" value="modif">
        <input type="hidden" name="id_bibliotheque" value="<?=$id_bibliotheque?>">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>