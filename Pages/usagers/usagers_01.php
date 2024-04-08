<?php
    require_once '../../includes/connexion.php';
    require_once 'navbar.php';



    if(isset($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["ville"],$_REQUEST["biblioteque"],$_REQUEST["commentaire"])){
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
        $temp->bindParam(':commentaire', $commentaire);
        $temp->execute();

        header('Location: affichageUsager.php');
        exit();
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
    <form action="usagers_01.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name='nom'>
        <label for="prenom">prenom</label>
        <input type="text" name="prenom">
        <label for="ville">Ville</label>
        <input type="text" name="ville">
        <label for="biblioteque">numero bibliotheque</label>
        <input type="text" name="biblioteque">
        <label for="commentaire">commentaire</label>
        <input type="text" name="commentaire" id="commentaire">
        <input type="submit">
    </form>

</body>
</html>