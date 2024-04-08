<?php
require '../../includes/connexion.php';



if (isset($_REQUEST["titre"], $_REQUEST["langue"], $_REQUEST["numero_bibliotheque"], $_REQUEST["numero_auteur"], $_REQUEST["commentaire"])) {
    $titre = htmlentities($_REQUEST["titre"]);
    $langue = htmlentities($_REQUEST["langue"]);
    $bibliotheque = htmlentities($_REQUEST["numero_bibliotheque"]);
    $auteur = htmlentities($_REQUEST["numero_auteur"]);
    $commentaire = htmlentities($_REQUEST["commentaire"]);
    $sql = "INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ( :titre , :langue, :bibliotheque, :auteur, :commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':titre', $titre);
    $temp->bindParam(':langue', $langue);
    $temp->bindParam(':bibliotheque', $bibliotheque);
    $temp->bindParam(':auteur', $auteur);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->execute();

        header('Location: ouvrages_01.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>


<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <div class="content">
        <form action="ouvrages_04.php" method="post">
            <label for="titre">Titre</label>
            <input type="text" name='titre' id="titre">
            <label for="langue">langue</label>
            <input type="text" name="langue" id="langue">
            <label for="numero_bibliotheque">numero bibliotheque</label>
            <input type="text" name="numero_bibliotheque" id="numero_bibliotheque">
            <label for="numero_auteur">numero auteur</label>
            <input type="text" name="numero_auteur" id="numero_auteur">
            <label for="commentaire">commentaire</label>
            <input type="text" name="commentaire" id="commentaire">
            <input type="submit">
        </form>
    </div>
</body>

</html>