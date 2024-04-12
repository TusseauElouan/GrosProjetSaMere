<?php
require_once '../../includes/connexion.php';

$sql = 'SELECT emprunt_vue.emprunt_numero_emprunt AS numero_emprunt, emprunt_vue.nom_usager, emprunt_vue.prenom_usager, emprunt_vue.titre_ouvrage, auteur.nom_auteur,auteur.prenom_auteur,
emprunt_vue.date_emprunt, COALESCE (retour.numero_retour,-1) AS numero_retour, retour.commentaire, retour.date_retour
FROM emprunt_vue
LEFT JOIN retour ON retour.numero_emprunt = emprunt_vue.emprunt_numero_emprunt
LEFT JOIN auteur ON emprunt_vue.numero_auteur = auteur.numero_auteur';
$temp = $pdo->query($sql);
$temp->execute();
$emprunt = $temp;

//requete affichage liste
$sql = 'SELECT retour_vue.numero_retour,retour_vue.titre_ouvrage,auteur.nom_auteur,auteur.prenom_auteur,retour_vue.date_retour, retour_vue.commentaire
FROM retour_vue, auteur
WHERE retour_vue.numero_auteur = auteur.numero_auteur';
$temp = $pdo->prepare($sql);
$temp->execute();
$retour = $temp;

//Requete de delete
if (isset($_REQUEST['type'])) {
    $numero_retour = htmlentities($_REQUEST['numero_retour']);
    $sql = 'DELETE FROM retour WHERE numero_retour = :numero_retour';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_retour', $numero_retour);
    $temp->execute();

    header('Location: retour_01.php');
}

if(isset($_REQUEST['ajout'])){
    $numero_emprunt = $_REQUEST['id'];
    $commentaire = $_REQUEST['commentaire'];
    $sql = "INSERT INTO retour (numero_emprunt, date_retour, commentaire) values(:numero_emprunt,NOW(),:commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_emprunt', $numero_emprunt);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->execute();
    header('Location: retour_01.php');
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
                        <th>Retourné</th>
                        <th>Editer</th>
                        <th>Annuler</th>
                    </tr>


                    <?php
                    foreach ($emprunt as $e) {
                        ?>
                        <tr>
                            <td>
                                <?= $e['titre_ouvrage']; ?>
                            </td>
                            <td>
                                <?= $e['nom_auteur']; ?>
                            </td>
                            <td>
                                <?= $e['prenom_auteur']; ?>
                            </td>
                            <td>
                                <?= $e['date_emprunt']; ?>
                            </td>                           
                            <td>
                                <?= $e['commentaire']; ?>
                            </td>
                            <td>
                                <?php 
                                if($e['numero_retour'] == -1){?>
                                    <a style="text-decoration:none;" href='retour_01.php?id=<?= $e['numero_emprunt']?>&commentaire=<?=$e['commentaire']?>&ajout=ajout'>➕</a>
                                    <?php
                                }else{
                                    echo "✅";
                                } ?>
                            </td>
                            <td>
                                <a href='retour_02.php?id=<?= $e['numero_retour']?>'>
                                <img src="../../Medias/editform.png" class="boutonsform" alt="edit" title="edit"></a>
                            </td>
                            <td>
                                <a onclick="return confirm('Voulez-vous vraiment supprimer ce retour?')" href='retour_01.php?type=supp&numero_retour=<?=$e['numero_retour']?>'>
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