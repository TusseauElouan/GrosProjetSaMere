<?php
require_once '../../includes/connexion.php';
?>
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
        <div class="content">
            <?php
            $sql = 'SELECT ouvrage.titre_ouvrage, auteur.nom_auteur, auteur.prenom_auteur, emprunt.date_emprunt FROM ouvrage, auteur, emprunt WHERE ouvrage.numero_ouvrage = emprunt.numero_ouvrage AND auteur.numero_auteur = ouvrage.numero_auteur ORDER BY ouvrage.titre_ouvrage ASC, auteur.nom_auteur ASC, emprunt.date_emprunt ASC;';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            ?>

            <div class="tab-admin">
                <table border="1px">
                    <tr>
                        <th>Titre</th>
                        <th>Nom auteur</th>
                        <th>Prénom auteur</th>
                        <th>Date emprunt</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['titre_ouvrage']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nom_auteur']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['prenom_auteur']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_emprunt']) . "</td>";
                        // Adding placeholders for action links, you need to replace # with actual values
                        echo "<td><a href='modif.php?nom=#&prenom=#&comm=#'>Modifier</a><a href='suppr.php?id=#'>Remove</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
                <?php
                ?>
                <br />
                <a href="ouvrages_02.php">Add</a>
            </div>
        </div>
    </main>
</body>

</html>