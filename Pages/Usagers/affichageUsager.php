<?php
require_once '../../includes/connexion.php';
require_once '../../includes/navbar.php';

$sql = 'SELECT * FROM usager';
$temp = $pdo->query($sql);
while ($usager = $temp->fetch()) {
    $id = htmlentities($usager["id"]);
    $nom = htmlentities($usager["nom_usager"]);
    $prenom = htmlentities($usager["prenom_usager"]);
    $ville = htmlentities($usager["ville_usager"]);
    $bibliotheque = htmlentities($usager["numero_bibliotheque"]);
    $commentaire = htmlentities($usager["commentaire"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_bibliotheque.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <main>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Ville</th>
                <th>Numero bibliotheque</th>
                <th>commentaire</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    <?= $nom ?>
                </td>
                <td>
                    <?= $prenom ?>
                </td>
                <td>
                    <?= $ville ?>
                </td>
                <td>
                    <?= $bibliotheque ?>
                </td>
                <td>
                    <?= $commentaire ?>
                </td>
                <td>
                    <a href="usager_02.php?id=<?= $id ?>">
                        <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                    </a>
                    <a href="usager_03.php?id=<?= $id ?>">
                        <img src="../../Medias/supprimerform.png" class="boutonsform" alt="image de suppresion">
                    </a>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>