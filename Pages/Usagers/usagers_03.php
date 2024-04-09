<?php
require '../../includes/connexion.php';



if (isset($_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["ville"], $_REQUEST["biblioteque"], $_REQUEST["commentaire"])) {
    $nom = htmlentities($_REQUEST["nom"]);
    $prenom = htmlentities($_REQUEST["prenom"]);
    $ville = htmlentities($_REQUEST["ville"]);
    $bibliotheque = htmlentities($_REQUEST["biblioteque"]);
    $commentaire = htmlentities($_REQUEST["commentaire"]);
    $sql = "INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ( :nom , :prenom, :ville, :numero_bibliotheque, :commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':nom', $nom);
    $temp->bindParam(':prenom', $prenom);
    $temp->bindParam(':ville', $ville);
    $temp->bindParam(':numero_bibliotheque', $bibliotheque);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->execute();

        header('Location: usagers_01.php');
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
        <form action="usagers_03.php" method="post">
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