<?php

require_once 'Database.php';

$sql = 'SELECT Ouvrage.nom Bibliotheque.ville_bibliotheque FROM Transfert,Ouvrage,Bibliotheque WHERE Ouvrage.numero_ouvrage = Transfert.numero_ouvrage';
$temp = $pdo->prepare($sql);
$temp->execute();

?>
<table>
    <tr>
        <td>Titre ouvrage</td>
        <td>Ville origine</td>
        <td>Ville cible</td>
        <td>Date transfert</td>
    </tr>


<?php
foreach ($temp as $t) {
?>
    <tr>
        <td><?= $t['titre_ouvrage']; ?></td>
        <td><?= $t['ville_bibliotheque']; ?></td>
        <td><?= $t['ville_bibliotheque']; ?></td>
        <td><?= $t['date_transfert']; ?></td>
        <td>
            <form action="page_admin.php" method="post">
                <input type="hidden" name="" value="">
                <input type="submit" value="🗑️">
            </form>
        </td>
        <td>
            <form action="modifier_adminActualite.php?id=" method="post">
                <input type="hidden" name="nom" value="">
                <input type="submit" value="✏️">
            </form>
        </td>
    </tr>
</table>
<?php
}
?>
<form action="add_adminActualite.php" method="post">
    <input type="hidden" name="nom" value="' . $r['nom'] . '">
    <input type="submit" class="add-btn delete-btn" value="➕">
</form>
<a href="index.php">retour sur le site</a>
