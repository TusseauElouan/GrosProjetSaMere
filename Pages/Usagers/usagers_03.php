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
    <title>Ajouter un Usager</title>
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
            <form class="form" action="usagers_03.php" method="post">
            <div class="label-box">
                <label for="nom">Nom</label>
                <input class="form-input" type="text" name='nom' id="nom">
            </div>
            <div class="label-box">
                <label for="prenom">prenom</label>
                <input class="form-input" type="text" name="prenom" id="prenom">
            </div>
            <div class="label-box">
                <label for="ville">Ville</label>
                <input class="form-input" type="text" name="ville" id="ville">
            </div>
            <div class="label-box">
                <label for="biblioteque">numero bibliotheque</label>
                <input class="form-input" type="text" name="biblioteque" id="biblioteque">
            </div>
            <div class="label-box-textarea">
                <label for="commentaire">commentaire</label><br />
                <textarea class="form-input" type="text" name="commentaire" id="commentaire" cols="60" rows="10"
                        required></textarea>
            </div>
            <div>
                <input class="submit-btn" type="submit">
            </div>
            </form>
        </div>
    </div>
</body>

</html>