<?php
require_once '../../includes/connexion.php';
$id = $_REQUEST['id'];

if (isset($_REQUEST['del'])) {
    $id = $_REQUEST['id'];
    $sql = 'DELETE FROM ouvrage WHERE numero_ouvrage = :id';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id', $id);
    $temp->execute();
    header('Location: ouvrages_01.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <fieldset>
                <h2>Êtes-vous sûr de vouloir supprimer cet auteur ?</h2>
                <a href="ouvrages_03.php?id=<?=$id?>&del=1">Oui</a>
                <a href="ouvrages_01.php">Non</a>
            </fieldset>
    </main>
</body>
</html>