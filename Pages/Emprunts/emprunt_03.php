<?php
require_once '../../includes/connexion.php';
$numero_emprunt = $_REQUEST['numero_emprunt'];

if (isset($_REQUEST['del'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $sql = 'DELETE FROM auteur WHERE numero_auteur = :numero_emprunt';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_emprunt', $numero_emprunt);
    $temp->execute();
    header('Location: emprunt_01.php');
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Suppression emprunt</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    </head>

    <body>
        <main>
            <fieldset>
                <h2>Êtes-vous sûr de vouloir supprimer cet emprunt ?</h2>
                <a href="emprunt_03.php?numero_emprunt=<?=$numero_emprunt?>&del=1">Oui</a>
                <a href="emprunt_01.php">Non</a>
            </fieldset>
        </main>
    </body>
</html>