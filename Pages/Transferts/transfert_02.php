<?php
require_once '../../includes/connexion.php';
$sql_biblio = 'SELECT * FROM bibliotheque';

if (isset($_REQUEST['bibli-origine'])) {
    $sql = 'SELECT * FROM ouvrage WHERE numero_bibliotheque = ' . $_REQUEST['bibli-origine'];

    $sql_biblio_retire = 'SELECT * FROM bibliotheque WHERE numero_bibliotheque NOT IN (' . $_REQUEST['bibli-origine'] . ')';
} else {
    $sql_biblio_retire = $sql_biblio;
}

if (isset($_REQUEST['bibli-cible'], $_REQUEST['bibli-origine'], $_REQUEST['titre'])) {
    $sql_insert = 'INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (:bibli-origine, :bibli-cible, :titre, :date_transfert, :commentaire)';
    $data = [
        'bibli-origine' => htmlentities($_REQUEST['bibli-origine']),
        'bibli-cible' => htmlentities($_REQUEST['bibli-cible']),
        'titre' => htmlentities($_REQUEST['titre']),
        'date_transfert' => htmlentities($_REQUEST['date_transfert']),
        'commentaire' => htmlentities($_REQUEST['commentaire'])
    ];
    $resultat4 = $pdo->prepare($sql_insert);
    $resultat4->execute($data);

    $sql_update = 'UPDATE ouvrage SET numero_bibliotheque = :bibli-cible';
    $data2 = [
        'bibli-cible' => htmlentities($_REQUEST['bibli-cible'])
    ];
    $resultat5 = $pdo->prepare($sql_update);
    $resultat5->execute($data2);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    <title>Formulaire d'ajout d'un transfert</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>

<body>
    <?php
    include "../../includes/navbar.php";

    include '../../includes/heure.php';

    include '../../includes/titre-page.php';
    ?>
    <div>
        <div class="content">
            <form action="" method='POST'>
                <input type="hidden" name="bibli-origine" value="<?= $_REQUEST['bibli-origine'] ?>">

                <label for="bibli-origine">Nom de la bibliothèque d'origine</label>
                <select name="bibli-origine" id="bibli-origine" onchange="this.form.submit()">
                    <?php
                    if (!isset($_REQUEST['bibli-origine'])) {
                        echo '<option>Choisissez une option</option>';
                    }
                    ;
                    ?>

                    <?php
                    $result = $pdo->prepare($sql_biblio);
                    $result->execute();

                    while ($resultat = $result->fetch()) {
                        if (isset($_REQUEST['bibli-origine']) && $_REQUEST['bibli-origine'] == $resultat['numero_bibliotheque']) {
                            echo '<option value="' . $resultat['numero_bibliotheque'] . '" selected>Bibliothèque de ' . $resultat['ville_bibliotheque'] . '</option>';
                        } else {
                            echo '<option value="' . $resultat['numero_bibliotheque'] . '">Bibliothèque de ' . $resultat['ville_bibliotheque'] . '</option>';
                        }
                    }
                    ;
                    ?>
                </select>
            </form>
            <form action="" method="post">
                <label for="bibli-cible">Nom de la bibliothèque ciblé</label>
                <select name="bibli-cible" id="bibli-cible">
                    <?php
                    $result = $pdo->prepare($sql_biblio_retire);
                    $result->execute();
                    while ($resultat2 = $result->fetch()) {
                        echo '<option value="' . $resultat2['numero_bibliotheque'] . '">Bibliothèque de ' . $resultat2['ville_bibliotheque'] . '</option>';
                    }
                    ;
                    ?>
                </select>
                <?php
                if (isset($_REQUEST['bibli-origine'])) {
                    ?>
                    <label for="titre">L'ouvrage à transférer</label>
                    <select name="titre" id="titre">
                        <?php
                        if (!isset($_REQUEST['bibli-origine'])) {
                            echo '<option>Choisissez une option</option>';
                        }
                        ;
                        ?>

                        <?php
                        $result = $pdo->prepare($sql_biblio);
                        $result->execute();

                        while ($resultat = $result->fetch()) {
                            if (isset($_REQUEST['bibli-origine']) && $_REQUEST['bibli-origine'] == $resultat['numero_bibliotheque']) {
                                echo '<option value="' . $resultat['numero_bibliotheque'] . '" selected>Bibliothèque de ' . $resultat['ville_bibliotheque'] . '</option>';
                            } else {
                                echo '<option value="' . $resultat['numero_bibliotheque'] . '">Bibliothèque de ' . $resultat['ville_bibliotheque'] . '</option>';
                            }
                        }
                        ;
                        ?>
                    </select>
                </div>
                <div class="content-inside">
                    <label for="bibli-origine">Nom de la bibliothèque ciblé</label>
                    <select class="form-input" name="bibli-cible" id="bibli-cible">
                        <?php
                        $result = $pdo->prepare($sql_biblio_retire);
                        $result->execute();
                        while ($resultat2 = $result->fetch()) {
                            echo '<option value="' . $resultat2['numero_bibliotheque'] . '">Bibliothèque de ' . $resultat2['ville_bibliotheque'] . '</option>';
                        }
                        ;
                        ?>
                    </select>
                    <?php
                    if (isset($_REQUEST['bibli-origine'])) {
                        ?>
                        <label for="titre">L'ouvrage à transférer</label>
                        <select name="titre" id="titre">
                            <?php
                            $result = $pdo->prepare($sql);
                            $result->execute();
                            while ($resultat3 = $result->fetch()) {
                                echo '<option value="' . $resultat3['numero_ouvrage'] . '">' . $resultat3['titre_ouvrage'] . '</option>';
                            }
                            ;
                            ?>
                        </select>
                </div>
                    <?php
                }
                ?>
                <input type="submit" value="Transferer">
            </form>
        </div>
    </div>
</body>

</html>