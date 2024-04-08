<?php

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
                $sql = 'SELECT * FROM bibliothèque';
            ?>
        </select>
    </form>
</body>
</html>