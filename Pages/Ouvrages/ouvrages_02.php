<?php
require '../../includes/connexion.php';

        $id = $_REQUEST["id"];
        $sql2 = "SELECT * FROM ouvrage WHERE numero_ouvrage = :id";
        $temp2 = $pdo->prepare($sql2);
        $temp2->bindParam(':id', $id);
        $temp2->execute();
        $ouvrage = $temp2->fetch();

if (isset($_REQUEST["titre"], $_REQUEST["langue"], $_REQUEST["numero_bibliotheque"], $_REQUEST["numero_auteur"], $_REQUEST["commentaire"])) {
        $titre = htmlentities($_REQUEST["titre"]);
        $langue = htmlentities($_REQUEST["langue"]);
        $bibliotheque = htmlentities($_REQUEST["numero_bibliotheque"]);
        $auteur = htmlentities($_REQUEST["numero_auteur"]);
        $commentaire = htmlentities($_REQUEST["commentaire"]);
        $id = $_REQUEST["id"];
        $sql = "UPDATE ouvrage SET titre_ouvrage = :titre , langue = :langue, numero_bibliotheque = :biblioteque, numero_auteur = :auteur, commentaire = :commentaire WHERE numero_ouvrage = :id";
        $temp = $pdo->prepare($sql);
        $temp->bindParam(':titre', $titre);
        $temp->bindParam(':langue', $langue);
        $temp->bindParam(':biblioteque', $bibliotheque);
        $temp->bindParam(':auteur', $auteur);
        $temp->bindParam(':commentaire', $commentaire);
        $temp->bindParam(':id', $id);
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
        <form action="ouvrages_02.php?id=<?php echo $id ?>" method="post">
            <label for="titre">Titre</label>
            <input type="text" name='titre' id="titre" value="<?php echo $ouvrage['titre_ouvrage']?>">
            <label for="langue">langue</label>
            <input type="text" name="langue" id="langue" value="<?php echo $ouvrage['langue']?>">
            <label for="numero_bibliotheque">numero bibliotheque</label>
            <input type="text" name="numero_bibliotheque" id="numero_bibliotheque" value="<?php echo $ouvrage['numero_bibliotheque']?>">
            <label for="numero_auteur">numero auteur</label>
            <input type="text" name="numero_auteur" id="numero_auteur" value="<?php echo $ouvrage['numero_auteur']?>">
            <label for="commentaire">commentaire</label>
            <input type="text" name="commentaire" id="commentaire" value="<?php echo $ouvrage['commentaire']?>">
            <input type="submit">
        </form>
    </div>
</body>

</html>