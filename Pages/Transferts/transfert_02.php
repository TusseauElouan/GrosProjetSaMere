<?php
require_once '../../includes/connexion.php';
$sql_biblio = 'SELECT * FROM bibliothèque';
$sql = 'SELECT * FROM ouvrage WHERE'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout d'un transfert</title>
</head>
<body>
    <form action="" method='POST'>
        <label for="bibli-origine">Nom de la bibliothèque d'origine</label>
        <select name="bibli-origine" id="bibli-origine">
            <?php
                $result = $pdo->prepare($sql_biblio);
                $result->execute();
                while($result = $result->fetch()){
                    echo '<option value="'.$result['numero_bibliotheque'].'">Bibliothèque de '.$result['ville_bibliotheque'].'</option>';
                };
            ?>
        </select>

        <label for="bibli-origine">Nom de la bibliothèque ciblé</label>
        <select name="bibli-cible" id="bibli-cible">
            <?php
                $result = $pdo->prepare($sql_biblio);
                $result->execute();
                while($result = $result->fetch()){
                    echo '<option value="'.$result['numero_bibliotheque'].'">Bibliothèque de '.$result['ville_bibliotheque'].'</option>';
                };
            ?>
        </select>

        <label for="titre">L'ouvrage à transférer</label>
        <select name="titre" id="titre">
            <?php
                $result = $pdo->prepare($sql);
                $result->execute();
                while($result = $result->fetch()){
                    echo '<option value="'.$result['numero_ouvrage'].'">'.$result['titre'].'</option>';
                };
            ?>
        </select>

    </form>
</body>
</html>