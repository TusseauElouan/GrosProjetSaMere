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
        <?php
            require_once '../../includes/navbar.php';
            require_once '../../includes/heure.php';
            require_once '../../includes/titre-page.php';
            ?>
        <main>
            <div class="content">
                <div>
                    <a href="ouvrages_04.php">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                    <table border="1px">
                    <tr><th>titre</th><th>langue</th><th>bibliotheque</th><th>auteur</th><th>commentaire</th><th>actions</th></tr>
                    <?php
                        $sql = 'SELECT * FROM ouvrage';
                        $temp = $pdo->query($sql);
                        while ($ouvrage = $temp->fetch()) {
                            $id = $ouvrage["numero_ouvrage"];
                            $titre = $ouvrage['titre_ouvrage'];
                            $langue = $ouvrage['langue'];
                            $bibliotheque = $ouvrage['numero_bibliotheque'];
                            $auteur = $ouvrage['numero_auteur'];
                            $commentaire = $ouvrage['commentaire'];
                    ?>
                            <tr>
                            <td><?= $titre ?></td>
                            <td><?= $langue ?></td>
                            <td><?= $bibliotheque ?></td>
                            <td><?= $auteur ?></td>
                            <td><?= $commentaire ?></td>
                            <td>
                                <a href="ouvrages_02.php?id=<?php echo $id?>">
                                    <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                                </a>
                                <a href="ouvrages_03.php?id=<?php echo $id?>">
                                    <img src="../../Medias/supprimerform.png" class="boutonsform" alt="">
                                </a>
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
