<?php
require_once '../../includes/connexion.php';

if (isset($_REQUEST['supprimer'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $sql = 'DELETE FROM emprunt WHERE numero_emprunt = :numero_emprunt';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_emprunt', $numero_emprunt);
    $temp->execute();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Formulaire Emprunts</title>
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
                    <a href="emprunt_03.php" class="bouton-ajouter">
                        <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                        Ajouter
                    </a>
                </div>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr><th>Nom ouvrage</th><th>Date emprunt</th><th>Nom usager</th><th>Commentaire</th><th>Editer</th><th>Supprimer</th></tr>
                    <?php
                        $sql = 'SELECT emprunt.numero_emprunt, emprunt.numero_ouvrage, emprunt.numero_usager, emprunt.date_emprunt, usager.nom_usager, usager.prenom_usager, emprunt.commentaire, ouvrage.titre_ouvrage FROM emprunt INNER JOIN usager ON emprunt.numero_usager = usager.numero_usager JOIN ouvrage ON emprunt.numero_ouvrage = ouvrage.numero_ouvrage';
                        $temp = $pdo->query($sql);
                        while ($emprunt = $temp->fetch()) {
                            $numero_emprunt = $emprunt['numero_emprunt'];
                            $numero_ouvrage = $emprunt['numero_ouvrage'];
                            $date_emprunt = $emprunt['date_emprunt'];
                            $numero_usager = $emprunt['numero_usager']; 
                            $prenom_usager = $emprunt['prenom_usager'];
                            $nom_usager = $emprunt['nom_usager'];
                            $titre_ouvrage = $emprunt['titre_ouvrage'];
                            $commentaire = $emprunt['commentaire']; 

                    ?>
                            <tr>
                            <td><?= $titre_ouvrage ?></td>
                            <td><?= $date_emprunt ?></td>
                            <td><?= $prenom_usager.' '.$nom_usager ?></td>
                            <td><?= $commentaire ?></td>
                            <td>
                                <a href="emprunt_02.php?numero_emprunt=<?= $numero_emprunt ?>&numero_ouvrage=<?= $numero_ouvrage ?>&date_emprunt=<?= $date_emprunt ?>&numero_usager=<?= $numero_usager ?>&commentaire=<?= $commentaire ?>">
                                    <img src="../../Medias/editform.png" class="boutonsform" alt="image de modification">
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Voulez-vous vraiment supprimer cet emprunt?')" href='emprunt_01.php?supprimer=1&numero_emprunt=<?=$numero_emprunt?>'>
                                <img src="../../Medias/supprimerform.png" class="boutonsform" alt="supprimer" title="supprimer"></a>
                            </td>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </main>
    </body>
</html>

