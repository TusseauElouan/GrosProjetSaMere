<?php
require '../../includes/connexion.php';

$sql_biblio = 'SELECT ville_bibliotheque, numero_bibliotheque FROM bibliotheque;';
$sql_auteur = 'SELECT numero_auteur, nom_auteur, prenom_auteur FROM auteur ;';


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
    <title>Ajouter un ouvrage</title>
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
            <form class="form" action="ouvrages_04.php" method="post">
            <div class="label-box">
                <label for="titre">Titre</label>
                <input class="form-input" type="text" name='titre' id="titre">
            </div>
            <div class="label-box">
                <label for="langue">langue</label>
                <input class="form-input" type="text" name="langue" id="langue">
            </div>
            <div class="label-box">
                <label for="numero_bibliotheque">bibliotheque</label>
                <select name="numero_bibliotheque" id="numero_bibliotheque">
                    <?php 
                        $temp_biblio = $pdo->prepare($sql_biblio);
                        $temp_biblio->execute();
                        while ($biblio = $temp_biblio->fetch()) {
                    ?>
                    <option value="<?php echo $biblio ["numero_bibliotheque"] ?>"><?php echo $biblio ["ville_bibliotheque"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="label-box">
                <label for="numero_auteur">auteur</label>
                <select name="numero_auteur" id="numero_auteur">
                    <?php 
                        $temp_auteur = $pdo->prepare($sql_auteur);
                        $temp_auteur->execute();
                        while ($auteur = $temp_auteur->fetch()){
                    ?>
                    <option value="<?php echo $auteur["numero_auteur"]?>"><?php echo $auteur["prenom_auteur"]?> <?php echo $auteur["nom_auteur"]?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="label-box-textarea">
                <label for="commentaire">commentaire</label>
                <textarea class="form-input" type="text" name="commentaire" id="commentaire" cols="60" rows="10" required></textarea>
            </div>
            <div>
                <input class="submit-btn" type="submit">
            </div>
            </form>
        </div>
    </div>
</body>

</html>