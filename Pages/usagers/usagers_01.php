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
            <div>
        <a href="usagers_04.php">Ajoutez</a>
        <table border="1px">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Ville</th>
                <th>Numero bibliotheque</th>
                <th>commentaire</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php 
                $sql = 'SELECT * FROM usager';
                $temp = $pdo->query($sql);
                while ($usager = $temp->fetch()){
                    $id = htmlentities($usager["numero_usager"]);
                    $nom = htmlentities($usager["nom_usager"]);
                    $prenom = htmlentities($usager["prenom_usager"]);
                    $ville = htmlentities($usager["ville_usager"]);
                    $bibliotheque = htmlentities($usager["numero_bibliotheque"]);
                    $commentaire = htmlentities($usager["commentaire"]);
                ?>
                <td><?= $nom ?></td>
                <td><?= $prenom ?></td>
                <td><?= $ville ?></td>
                <td><?= $bibliotheque ?></td>
                <td><?= $commentaire ?></td>
                <td> 
                    <a href="usagers_02.php?id=<?= $id ?>">
                        <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                    </a>
                    <a href="usagers_03.php?id=<?= $id ?>">
                        <img src="../../Medias/supprimerform.png" class="boutonsform" alt="image de suppresion">
                    </a>
                </td>
            </tr>
            <?php } ?>
        </table>
        </div>
        </div>
    </main>
</body>

</html>