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
            <div class="content-inside">
                <div class="boutonadd-container">
                    <a href="auteur_04.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Commentaire</th>
                    <th>Editer</th>
                    <th>Supprimer</th>
                </tr>
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
                            </td>
                            <td>
                                <a href="auteur_03.php?id=<?= $id ?>">
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