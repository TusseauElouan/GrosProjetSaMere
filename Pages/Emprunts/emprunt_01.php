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
        include "../../includes/navbar.php";
        include '../../includes/heure.php';
        include '../../includes/titre-page.php';
        ?>
        <main>
            <table border="1px">
            <tr><th>Nom</th><th>Prénom</th><th>Commentaire</th><th>Modifs</th></tr>
            <?php
                $sql = 'SELECT * FROM auteur';
                $temp = $pdo->query($sql);
                while ($auteur = $temp->fetch()) {
                    $id = $auteur['numero_auteur'];
                    $nom = $auteur['nom_auteur'];
                    $prenom = $auteur['prenom_auteur'];
                    $commentaire = $auteur['commentaire']; 
            ?>
                    <tr>
                    <td><?= $nom ?></td>
                    <td><?= $prenom ?></td>
                    <td><?= $commentaire ?></td>
                    <td>
                        <a href="auteur_02.php?id=<?= $id ?>&nom=<?= $nom ?>&prenom=<?= $prenom ?>&commentaire=<?= $commentaire ?>">
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
        </main>
    </body>
</html>