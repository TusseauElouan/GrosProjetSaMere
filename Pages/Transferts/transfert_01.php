<?php

require_once '../../includes/connexion.php';

//requete affichage liste
$sql = 'SELECT transfert_vue.numero_transfert,ouvrage.titre_ouvrage, transfert_vue.ville_bibliotheque_origine, transfert_vue.ville_bibliotheque_cible, transfert_vue.date_transfert
FROM transfert_vue,ouvrage
WHERE Ouvrage.numero_ouvrage = Transfert_vue.numero_ouvrage';
$temp = $pdo->prepare($sql);
$temp->execute();

//Requete de delete
if (isset($_REQUEST['id_transfert'])) {
    $id_transfert = htmlentities($_REQUEST['id_transfert']);
    $sql = 'DELETE FROM transfert WHERE numero_transfert = :id_transfert';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id_transfert', $id_transfert);
    $temp->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des transferts</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>
<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <main>
        <div class="content">
            <div class="content-inside">
                <div class="boutonadd-container">
                    <a href="emprunt_04.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Titre ouvrage</th>
                        <th>Ville origine</th>
                        <th>Ville cible</th>
                        <th>Date transfert</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                <?php
                foreach ($temp as $t) {
                    ?>
                    <tr>
                        <td>
                            <?= $t['titre_ouvrage']; ?>
                        </td>
                        <td>
                            <?= $t['ville_bibliotheque_origine']; ?>
                        </td>
                        <td>
                            <?= $t['ville_bibliotheque_cible']; ?>
                        </td>
                        <td>
                            <?= $t['date_transfert']; ?>
                        </td>
                        <td>
                            <form action="transfert_01.php" method="post">
                                <input type="hidden" name="id_transfert" value="<?= $t['numero_transfert'] ?>">
                                <input type="submit" value="🗑️">
                            </form>
                        </td>
                        <td>
                            <form action="transfert_02.php?id=<?= $t['numero_transfert'] ?>" method="post">
                                <input type="hidden" name="id_transfert" value="<?= $t['numero_transfert'] ?>">
                                <input type="submit">
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>