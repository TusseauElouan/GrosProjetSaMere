<?php
require_once '../../includes/connexion.php';

//requete affichage liste
$sql = 'SELECT retour_vue.numero_retour,retour_vue.titre_ouvrage,auteur.nom_auteur,auteur.prenom_auteur,retour_vue.date_retour
FROM retour_vue, auteur
WHERE retour_vue.numero_auteur = auteur.numero_auteur';
$temp = $pdo->prepare($sql);
$temp->execute();

//Requete de delete
if (isset($_REQUEST['type'])) {
    $numero_retour = htmlentities($_REQUEST['numero_retour']);
    $sql = 'DELETE FROM retour WHERE numero_retour = :numero_retour';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_retour', $numero_retour);
    $temp->execute();

    header('Location: retour_01.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Formulaire Retours</title>
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
                    <a href="retour_03.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Titre ouvrage</th>
                        <th>Nom auteur</th>
                        <th>Prénom auteur</th>
                        <th>Date du retour</th>
                        <th>commentaire</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>


                    <?php
                    foreach ($temp as $t) {
                        ?>
                        <tr>
                            <td>
                                <?= $t['titre_ouvrage']; ?>
                            </td>
                            <td>
                                <?= $t['nom_auteur']; ?>
                            </td>
                            <td>
                                <?= $t['prenom_auteur']; ?>
                            </td>
                            <td>
                                <?= $t['date_retour']; ?>
                            </td>                           
                            <td>
                                <?= $t['commentaire']; ?>
                            </td>
                            <td>
                                <a href='retour_02.php?id=<?= $t['numero_retour']?>'>
                                <img src="../../Medias/editform.png" class="boutonsform" alt="edit" title="edit"></a>
                            </td>
                            <td>
                                <a onclick="return confirm('Voulez-vous vraiment supprimer ce retour?')" href='retour_01.php?type=supp&numero_retour=<?=$t['numero_retour']?>'>
                                <img src="../../Medias/supprimerform.png" class="boutonsform" alt="supprimer" title="supprimer"></a>
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