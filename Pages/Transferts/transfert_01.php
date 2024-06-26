<?php
require_once '../../includes/connexion.php';

//requete affichage liste
$sql = 'SELECT transfert_vue.numero_bibliotheque_origine_transfert, ouvrage.numero_ouvrage, transfert_vue.numero_transfert,ouvrage.titre_ouvrage, transfert_vue.ville_bibliotheque_origine, transfert_vue.ville_bibliotheque_cible, transfert_vue.date_transfert
FROM transfert_vue,ouvrage
WHERE ouvrage.numero_ouvrage = transfert_vue.numero_ouvrage';
$temp = $pdo->prepare($sql);
$temp->execute();

//Requete de delete
if (isset($_REQUEST['id_transfert'])) {
    $id_transfert = htmlentities($_REQUEST['id_transfert']);


    $sql_research = 'SELECT * FROM transfert WHERE numero_transfert = :id_transfert';
    $result_research = $pdo->prepare($sql_research);
    $data = [
        'id_transfert' => $id_transfert
    ];
    $result_research->execute($data);
    
    $sql = 'DELETE FROM transfert WHERE numero_transfert = :id_transfert';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id_transfert', $id_transfert);
    $result->execute();


    $sql_update = 'UPDATE ouvrage SET numero_bibliotheque = :bibliorigine WHERE numero_ouvrage = :id_ouvrage';
    $result_update = $pdo->prepare($sql_update);
    while ($resultat_research = $result_research->fetch()) {
        var_dump($resultat_research);
        $data2 = [
            'bibliorigine' => $resultat_research['numero_bibliotheque_origine'],
            'id_ouvrage' => $resultat_research['numero_ouvrage']
        ];
        $result_update->execute($data2);
    }
    
    header('Location: transfert_01.php');
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Liste des transferts</title>
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
                    <a href="transfert_02.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Titre ouvrage</th>
                        <th>Ville origine</th>
                        <th>Ville cible</th>
                        <th>Date transfert</th>
                        <th>Supprimer</th>
                    </tr>
                <?php
                while ($t= $temp->fetch()) {
                    $id = $t['numero_transfert'];
                    $titre = $t['titre_ouvrage'];
                    $origine = $t['ville_bibliotheque_origine'];
                    $cible = $t['ville_bibliotheque_cible'];
                    $date = $t['date_transfert'];
                    ?>
                    <tr>
                        <td><?= $titre; ?></td>
                        <td><?= $origine; ?></td>
                        <td><?= $cible; ?></td>
                        <td><?= $date; ?></td>
                        <td>
                            <a onclick="return confirm('Voulez-vous vraiment supprimer ce transfert?')" href='transfert_01.php?type=supp&id_transfert=<?=$id?>'>
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