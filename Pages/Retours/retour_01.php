<?php
require_once 'Database.php';

$sql = 'SELECT Retour.numero_retour,Auteur.nom_auteur,Auteur.prenom_auteur,Retour.date_retour 
FROM Emprunt,Retour,Ouvrage 
WHERE Retour.numero_emprunt = Emprunt.numero_emprunt AND Emprunt.numero_ouvrage = Ouvrage.numero_ouvrage 
AND Ouvrage.numero_auteur';
$temp = $pdo->prepare($sql);
$temp->execute();

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
            <form action="#" method="post">
                <input type="hidden" name="" value="">
                <input type="submit" value="🗑️">
            </form>
        </td>
        <td>
            <form action="modifier_ListeRetour.php?id=" method="post">
                <input type="hidden" name="nom" value="">
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
<a href="index.php">retour sur le site</a>