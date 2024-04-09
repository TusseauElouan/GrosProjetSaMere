<?php
require_once "./../../includes/connexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Modification d'une bibliothèque</title>
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    $id_bibliotheque = $_GET["id_bibliotheque"];

    $sql = "SELECT * FROM bibliotheque WHERE numero_bibliotheque='" . $id_bibliotheque . "'";
    $temp = $pdo->query($sql);
    $resultat = $temp->fetch();
    ?>
    <div class="content">
        <div class="content-inside">
            <form class="form" action="bibliotheque_01.php" method="post">
                <div class="label-box">
                    <label for="ville_bibliotheque">Ville de la Bibliothèque : </label>
                    <input class="form-input" type="text" name="ville_bibliotheque" required value="<?= $resultat['ville_bibliotheque'] ?>">
                </div>
                <div class="label-box-textarea">
                    <label for="commentaire_bibliotheque">Commentaire : </label><br />
                    <textarea class="form-input" name="commentaire_bibliotheque" id="" cols="60" rows="10"
                        required><?= $resultat['commentaire'] ?></textarea>
                </div>

                <input type="hidden" name="type" value="modif">
                <input type="hidden" name="id_bibliotheque" value="<?= $id_bibliotheque ?>">
                <div>
                    <input class="submit-btn" type="submit" value="Modifier">
                </div>
            </form>
        </div>
    </div>
</body>

</html>