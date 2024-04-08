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
                <table border="1px">
                <tr><th>Nom</th><th>Prénom</th><th>Commentaire</th><th>titre</th></tr>
                <?php
                    $sql = 'SELECT 
                    ouvrage.titre_ouvrage AS Titre_Ouvrage,
                    auteur.nom_auteur AS Nom_Auteur,
                    auteur.prenom_auteur AS Prenom_Auteur,
                    emprunt.date_emprunt AS Date_Emprunt
                FROM 
                    emprunt
                JOIN ouvrage ON emprunt.numero_ouvrage = ouvrage.numero_ouvrage
                JOIN auteur ON ouvrage.numero_auteur = auteur.numero_auteur';
                    $temp = $pdo->query($sql);
                    while ($ouvrage = $temp->fetch()) {
                        $titre = $ouvrage['Titre_Ouvrage'];
                        $nom = $ouvrage['Nom_Auteur'];
                        $prenom = $ouvrage['Prenom_Auteur'];
                        $date_emprunt = $ouvrage['Date_Emprunt']; 
                ?>
                        <tr>
                        <td><?= $titre ?></td>
                        <td><?= $nom ?></td>
                        <td><?= $prenom ?></td>
                        <td><?= $date_emprunt ?></td>
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


        </main>
    </body>
</html>
