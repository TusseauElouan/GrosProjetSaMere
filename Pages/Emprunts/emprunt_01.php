<?php
require_once '../../includes/connexion.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Projet - Biblio</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    </head>

    <body>
        <header>
            <?php
            include("../../includes/navbar.php");
            ?>
        </header>
        <main>
            <div>
                <table border="1px">
                <tr><th>Numéro ouvrage</th><th>Date emprunt</th><th>Numéro usager</th><th>commentaire</th><th>Modifs</th></tr>
                <?php
                    $sql = 'SELECT * FROM emprunt';
                    $temp = $pdo->query($sql);
                    while ($emprunt = $temp->fetch()) {
                        $numero_emprunt = $emprunt['numero_emprunt'];
                        $numero_ouvrage = $emprunt['numero_ouvrage'];
                        $date_emprunt = $emprunt['date_emprunt'];
                        $numero_usager = $emprunt['numero_usager']; 
                        $commentaire = $emprunt['commentaire']; 
                ?>
                        <tr>
                        <td><?= $numero_ouvrage ?></td>
                        <td><?= $date_emprunt ?></td>
                        <td><?= $numero_usager ?></td>
                        <td><?= $commentaire ?></td>
                        <td>
                            <a href="emprunt_02.php?id=<?= $numero_emprunt ?>&numero_ouvrage=<?= $numero_ouvrage ?>&date_emprunt=<?= $date_emprunt ?>&numero_usager=<?= $numero_usager ?>&commentaire=<?= $commentaire ?>">
                                <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                            </a>
                            <a href="emprunt_03.php?id=<?= $numero_emprunt ?>">
                                <img src="../../Medias/supprimerform.png" class="boutonsform" alt="">
                            </a>
                        </td>
                        </tr>
                <?php
                    }
                ?>
                </table>
                <br />
                <a href="emprunt_04.php">
                    <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                    Add
                </a>
            </div>


        </main>
        <footer>
            <?php
            // include("includes/footer.php");
            ?>
        </footer>
    </body>
</html>