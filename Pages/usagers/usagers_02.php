<?php 
    require '../../includes/connexion.php';
    require '../../includes/navbar.php';
    if (isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
        $sql2 = "SELECT * FROM usager WHERE numero_usager = :id";
        $temp2 = $pdo->prepare($sql2);
        $temp2->bindParam(':id', $id);
        $temp2->execute();
        $usager = $temp2->fetch();
    }
    
    if(isset($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["ville"],$_REQUEST["biblioteque"],$_REQUEST["commentaire"])){
        $nom = htmlentities($_REQUEST["nom"]);
        $prenom = htmlentities($_REQUEST["prenom"]);
        $ville = htmlentities($_REQUEST["ville"]);
        $bibliotheque = htmlentities($_REQUEST["biblioteque"]);
        $commentaire = htmlentities($_REQUEST["commentaire"]);
        $sql = "UPDATE usager SET nom_usager = :nom , prenom_usager = :prenom, ville_usager = :ville, numero_bibliotheque = :biblioteque, commentaire = :commentaire WHERE numero_usager = :id";
        $temp = $pdo->prepare($sql);
        $temp->bindParam(':nom', $nom);
        $temp->bindParam(':prenom', $prenom);
        $temp->bindParam(':ville', $ville);
        $temp->bindParam(':biblioteque', $bibliotheque);
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
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>

<body>
<?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
?>
<form action="usagers_02.php" method="post">
    <label for="nom">Nom</label>
    <input type="text" name='nom' id="nom" value="<?php echo $usager["nom_usager"] ?>">
    <label for="prenom">prenom</label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $usager["prenom_usager"] ?>">
    <label for="ville">Ville</label>
    <input type="text" name="ville" id="ville"  value="<?php echo $usager["ville_usager"] ?>">
    <label for="biblioteque">Numero bibliothèque</label>
    <input type="text" name="biblioteque" id="biblioteque"  value="<?php echo $usager["numero_bibliotheque"] ?>">
    <label for="commentaire">Commentaire</label>
    <input type="text" name="commentaire" id="commentaire"  value="<?php echo $usager["commentaire"] ?>">
    <input type="submit">
</form>
</body>

</html>