<?php
require_once '../../includes/connexion.php';
if (isset($_REQUEST['type'])) {
    $id = $_REQUEST['numero_usager'];
    $sql = 'DELETE FROM usager WHERE numero_usager = :id';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id', $id);
    $temp->execute();
    header('Location: usagers_01.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Formulaire Usagers</title>
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
            <div class="content-inside">
                <div class="boutonadd-container">
                    <a href="usagers_03.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Ville</th>
                        <th>Numero bibliotheque</th>
                        <th>commentaire</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
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
                            $sql_bibliotheque = 'SELECT * FROM bibliotheque WHERE numero_bibliotheque = ' . $bibliotheque;
                            $nom_bibliotheque = $pdo->query($sql_bibliotheque)->fetch()['ville_bibliotheque'];
                        ?>
                        <td><?= $nom ?></td>
                        <td><?= $prenom ?></td>
                        <td><?= $ville ?></td>
                        <td><?= $nom_bibliotheque ?></td>
                        <td><?= $commentaire ?></td>
                        <td>
                            <a href='usagers_02.php?id=<?= $id?>'>
                            <img src="../../Medias/editform.png" class="boutonsform" alt="edit" title="edit"></a>
                        </td>
                        <td>
                            <a onclick="return confirm('Voulez-vous vraiment supprimer ce transfert?')" href='usagers_01.php?type=supp&numero_usager=<?=$id?>'>
                            <img src="../../Medias/supprimerform.png" class="boutonsform" alt="supprimer" title="supprimer"></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>