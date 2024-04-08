<?php
require_once '../../includes/connexion.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Formulaire Auteurs</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    </head>

    <body>
            <?php
                require_once '../../includes/navbar.php';
                require_once '../../includes/heure.php';
                require_once '../../includes/titre-page.php';
            ?>
        <main>
        <div class="content">
            <div>
                <table border="1px">
                <tr>
                    <th>Numéro ouvrage</th>
                    <th>Date</th>
                    <th>Commentaire</th>
                    <th>Modifs</th>
                </tr>
                <?php
                    $sql = 'SELECT * FROM emprunt';
                    $temp = $pdo->query($sql);
                    while ($emprunt = $temp->fetch()) {
                        $id = $emprunt['numero_emprunt'];
                        $num_ouvr = $emprunt['numero_ouvrage'];
                        $date_emprunt = $emprunt['date_emprunt'];
                        $commentaire = $emprunt['commentaire']; 
                ?>
                        <tr>
                            <td><?= $num_ouvr ?></td>
                            <td><?= $date_emprunt ?></td>
                            <td><?= $commentaire ?></td>
                            <td>
                                <a href="auteur_02.php?id=<?= $id ?>&num_ouvr=<?= $num_ouvr ?>&date_emprunt=<?= $date_emprunt ?>&commentaire=<?= $commentaire ?>">
                                    <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                                </a>
                                <a href="auteur_03.php?id=<?= $id ?>">
                                    <img src="../../Medias/supprimerform.png" class="boutonsform" alt="">
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
                </table>
                <br />
                <a href="auteur_04.php">
                    <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                    Add
                </a>
            </div>

        </div>
        </main>
    </body>
</html>