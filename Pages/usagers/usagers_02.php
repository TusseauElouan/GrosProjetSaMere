<?php 
    require '../../includes/connexion.php';
    require '../../includes/navbar.php';
        $id = $_REQUEST["id"];
        $sql2 = "SELECT * FROM usager WHERE numero_usager = :id";
        $temp2 = $pdo->prepare($sql2);
        $temp2->bindParam(':id', $id);
        $temp2->execute();
        $usager = $temp2->fetch();
    
    
    if(isset($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["ville"],$_REQUEST["bibliotheque"],$_REQUEST["commentaire"])){
        $nom = htmlentities($_REQUEST["nom"]);
        $prenom = htmlentities($_REQUEST["prenom"]);
        $ville = htmlentities($_REQUEST["ville"]);
        $bibliotheque = htmlentities($_REQUEST["bibliotheque"]);
        $commentaire = htmlentities($_REQUEST["commentaire"]);
        $id = $_REQUEST["id"];
        $sql = "UPDATE usager SET nom_usager = :nom , prenom_usager = :prenom, ville_usager = :ville, numero_bibliotheque = :bibliotheque, commentaire = :commentaire WHERE numero_usager = :id";
        echo $sql;
        $temp = $pdo->prepare($sql);
        $temp->bindParam(':nom', $nom);
        $temp->bindParam(':prenom', $prenom);
        $temp->bindParam(':ville', $ville);
        $temp->bindParam(':bibliotheque', $bibliotheque);
        $temp->bindParam(':commentaire', $commentaire);
        $temp->bindParam(':id', $id);
        
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
    <title>Modifier un usager</title>
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
        <form class="form" action="usagers_02.php?id=<?php echo $id ?>" method="post">
        <div class="label-box">
            <label for="nom">Nom</label>
            <input class="form-input" type="text" name='nom' id="nom" value="<?php echo $usager["nom_usager"] ?>">
        </div>
        <div class="label-box">
            <label for="prenom">prenom</label>
            <input class="form-input" type="text" name="prenom" id="prenom" value="<?php echo $usager["prenom_usager"] ?>">
        </div>
        <div class="label-box">
            <label for="ville">Ville</label>
            <input class="form-input" type="text" name="ville" id="ville"  value="<?php echo $usager["ville_usager"] ?>">
        </div>
        <div class="label-box">
            <label for="biblioteque">Numero bibliothèque</label>
            <select name="bibliotheque" id="bibliotheque">
                    <?php 
                        $sql_biblio = 'SELECT * FROM bibliotheque ;';
                        $temp_biblio = $pdo->prepare($sql_biblio);
                        $temp_biblio->execute();
                        while ($biblio = $temp_biblio->fetch()) {
                    ?>
                    <option value="<?php echo $biblio ["numero_bibliotheque"] ?>" <?php if ($biblio["numero_bibliotheque"] == $usager["numero_bibliotheque"]) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $biblio ["ville_bibliotheque"] ?></option>
                    <?php } ?>
                </select>
        </div>
        <div class="label-box-textarea">
            <label for="commentaire">Commentaire</label><br />
            <textarea class="form-input" type="text" name="commentaire" id="commentaire" cols="60" rows="10"
                        required><?= $usager["commentaire"] ?></textarea>
        </div>
        <div>
            <input class="submit-btn" type="submit">
        </div>
        </form>
    </div>
</div>
</body>

</html>