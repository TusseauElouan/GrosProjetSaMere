<?php
require_once 'Database.php';

$sql = 'SELECT Retour.numero_retour,Auteur.nom_auteur,Auteur.prenom_auteur,Retour.date_retour 
FROM Emprunt,Retour,Ouvrage 
WHERE Retour.numero_emprunt = Emprunt.numero_emprunt AND Emprunt.numero_ouvrage = Ouvrage.numero_ouvrage 
AND Ouvrage.numero_auteur';
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
    <input type="hidden" name="nom" value="' . $r['nom'] . '">
    <input type="submit" class="add-btn delete-btn" value="➕">
</form>
<a href="index.php">retour sur à l'index</a>