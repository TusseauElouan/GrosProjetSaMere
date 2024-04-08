<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Document</title>
</head>
<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <main>
        <div class="tab-admin">
            <table border="1px">
            <tr><th>Titre</th><th>Nom auteur</th><th>Prénom auteur</th><th>date emprunt</th></tr>
            <?php
                $sql = 'SELECT ouvrage.titre_ouvrage,auteur.nom_auteur,auteur.prenom_auteur emprunt.date_emprunt FROM ouvrage, auteur, emprunt WHERE ouvrage.numero_ouvrage = emprunt.numero_ouvrage
                AND auteur.numero_auteur = ouvrage.numero_auteur ORDER BY ouvrage.titre_ouvrage ASC, auteur.nom_auteur ASC, emprunt.date_emprunt ASC;';
                $temp = $pdo->query($sql);
                while($ouvrage = $temp->fetch()){
                    echo $ouvrage
            ?>
                <!-- <tr><td>#</td><td>#</td><td>#</td><td><a href="modif.php?nom=#&prenom=#&comm=#">Modifier</a><a href="suppr.php?id=#">Remove</a></td></tr> -->
            <?php
                }
            ?>
            </table>
            <br />
            <a href="ajout.php">Add</a>
        </div>
    </main>
</body>
</html>