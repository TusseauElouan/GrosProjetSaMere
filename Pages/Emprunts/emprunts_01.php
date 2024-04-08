<?php
require_once '../../includes/connexion.php';

//requete affichage liste
$sql = 'SELECT emprunt_vue.titre_ouvrage,auteur.nom_auteur,auteur.prenom_auteur,emprunt_vue.date_emprunt
FROM emprunt_vue, auteur
WHERE emprunt_vue.numero_auteur = auteur.numero_auteur';
$temp = $pdo->prepare($sql);
$temp->execute();

//Requete de delete
if(isset($_REQUEST['id_emprunt'])){
    $id_emprunt = htmlentities($_REQUEST['id_emprunt']);
    $sql ='DELETE FROM emprunt WHERE numero_emprunt = :id_emprunt';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id_emprunt',$id_emprunt);
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
            <th>Titre ouvrage</th>
            <th>Nom auteur</th>
            <th>Prénom auteurt</th>
            <th>Date du emprunt</th>
        </tr>

    <?php
    foreach ($temp as $t) {
    ?>
        <tr>
            <td><?= $t['titre_ouvrage']; ?></td>
            <td><?= $t['nom_auteur']; ?></td>
            <td><?= $t['prenom_auteur']; ?></td>
            <td><?= $t['date_emprunt']; ?></td>
            <td>
                <form action="emprunt_01.php" method="post">
                    <input type="hidden" name="id_emprunt" value="<?=$t['numero_emprunt']?>">
                    <input type="submit" value="🗑️">
                </form>
            </td>
            <td>
                <form action="emprunt_02.php?id=<?=$t['numero_emprunt']?>" method="post">
                    <input type="hidden" name="id_emprunt" value="<?=$t['numero_emprunt']?>">
                    <input type="submit" value="✏️">
                </form>
            </td>
        </tr>
    </table>
    <?php
    }
    ?>
    <form action="add_Listeemprunt.php" method="post">
        <input type="hidden" name="nom" value="">
        <input type="submit" class="" value="➕">
    </form>
    <a href="../../index.php">retour sur à l'index</a>
</body>
</html>
