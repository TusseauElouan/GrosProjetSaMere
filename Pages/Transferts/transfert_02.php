<?php
require_once '../../includes/connexion.php';
$sql_biblio = 'SELECT * FROM bibliothèque';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
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
                $resultat_ouvrage = $result->fetchAll(PDO::FETCH_ASSOC);
                for ($i = 0; $i<count($resultat_ouvrage); $i++){
                    echo '<option value="'.$result['numero_ouvrage'].'">'.$result['titre'].'</option>';
                };
            ?>
        </select>
    </form>
</body>
</html>