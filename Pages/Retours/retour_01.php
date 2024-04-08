<?php
require_once '../../includes/connexion.php';

//requete affichage liste
$sql = 'SELECT retour_vue.titre_ouvrage,auteur.nom_auteur,auteur.prenom_auteur,retour_vue.date_retour
FROM retour_vue, auteur
WHERE retour_vue.numero_auteur = auteur.numero_auteur';
$temp = $pdo->prepare($sql);
$temp->execute();

//Requete de delete
if(isset($_REQUEST['id_retour'])){
    $id_retour = htmlentities($_REQUEST['id_retour']);
    $sql ='DELETE FROM retour WHERE numero_retour = :id_retour';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id_retour',$id_retour);
    $temp->execute();
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
    <table>
        <tr>
            <td>Titre ouvrage</td>
            <td>Nom auteur</td>
            <td>Prénom auteurt</td>
            <td>Date du retour</td>
        </tr>


    <?php
    foreach ($temp as $t) {
    ?>
        <tr>
            <td><?= $t['titre_ouvrage']; ?></td>
            <td><?= $t['nom_auteur']; ?></td>
            <td><?= $t['prenom_auteur']; ?></td>
            <td><?= $t['date_retour']; ?></td>
            <td>
                <form action="retour_01.php" method="post">
                    <input type="hidden" name="id_retour" value="<?=$t['numero_retour']?>">
                    <input type="submit" value="🗑️">
                </form>
            </td>
            <td>
                <form action="retour_02.php?id=<?=$t['numero_retour']?>" method="post">
                    <input type="hidden" name="id_retour" value="<?=$t['numero_retour']?>">
                    <input type="submit" value="✏️">
                </form>
            </td>
        </tr>
    </table>
    <?php
    }
    ?>
    <form action="add_ListeRetour.php" method="post">
        <input type="hidden" name="nom" value="">
        <input type="submit" class="" value="➕">
    </form>
    <a href="../../index.php">retour sur à l'index</a>
</body>
</html>