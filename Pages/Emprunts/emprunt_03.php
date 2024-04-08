<?php
require_once '../../includes/connexion.php';
$id = $_REQUEST['id'];

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['id'];
    $sql = 'DELETE FROM auteur WHERE numero_auteur = :id';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id', $id);
    $temp->execute();
    header('Location: auteur_01.php');
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Projet - Biblio</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    </head>

    <body>
        <header>
            <?php
            include("../../includes/navbar.php");
            ?>
        </header>
        <main>
            <fieldset>
                <h2>Êtes-vous sûr de vouloir supprimer cet auteur ?</h2>
                <a href="auteur_03.php?id=<?=$id?>&del=1">Oui</a>
                <a href="auteur_01.php">Non</a>
            </fieldset>
        </main>
        <footer>
            <?php
            // include("includes/footer.php");
            ?>
        </footer>
    </body>
</html>