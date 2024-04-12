<?php
require_once '../../includes/connexion.php';

// verification de l'existance des valeures dans le liens (si ca existe je prepare les variables pour mon form)
if (isset($_REQUEST['numero_emprunt'],$_REQUEST['numero_ouvrage'],$_REQUEST['date_emprunt'],$_REQUEST['numero_usager'],$_REQUEST['commentaire'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $numero_ouvrage = $_REQUEST['numero_ouvrage'];
    $date_emprunt = $_REQUEST['date_emprunt'];
    $numero_usager = $_REQUEST['numero_usager'];
    $commentaire = $_REQUEST['commentaire'];
}
if (isset($_REQUEST['numero_emprunt_ajout'],$_REQUEST['numero_ouvrage_ajout'],$_REQUEST['date_emprunt_ajout'],$_REQUEST['numero_usager_ajout'],$_REQUEST['commentaire_ajout'])) {
    $numero_emprunt_ajout = $_REQUEST['numero_emprunt_ajout'];
    $numero_ouvrage_ajout = $_REQUEST['numero_ouvrage_ajout'];
    $date_emprunt_ajout = $_REQUEST['date_emprunt_ajout'];
    $numero_usager_ajout = $_REQUEST['numero_usager_ajout'];
    $commentaire_ajout = $_REQUEST['commentaire_ajout'];

    $sql = "UPDATE emprunt SET numero_ouvrage_ajout = :numero_ouvrage_ajout, date_emprunt_ajout = :date_emprunt_ajout, numero_usager_ajout = :numero_usager_ajout ,commentaire_ajout = :commentaire_ajout WHERE numero_emprunt_ajout = :numero_emprunt_ajout";
    $temp = $pdo->prepare($sql);

    $temp->bindParam(':numero_ouvrage_ajout', $numero_ouvrage_ajout);
    $temp->bindParam(':date_emprunt_ajout', $date_emprunt_ajout);
    $temp->bindParam(':numero_usager_ajout', $numero_usager_ajout);
    $temp->bindParam(':commentaire_ajout', $commentaire_ajout);
    $temp->bindParam(':numero_emprunt_ajout', $numero_emprunt_ajout);

    $temp->execute();

    header('Location: auteur_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Modification Emprunt</title>
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
                <form class="form" action="emprunt_02.php">
                    <h2>Modifier un emprunt : </h2>

                    <input type="hidden" name="numero_emprunt_ajout" value="<?=$numero_emprunt?>"/>

                    <div class="label-box">
                        <label for="numero_ouvrage">Numero Ouvrage :</label>
                        <input class="form-input" type="number" name="numero_ouvrage_ajout" value="<?=$numero_ouvrage?>" required/>
                    </div>

                    <div class="label-box">
                        <label for="date_emprunt">Date Ouvrage :</label>
                        <input class="form-input" type="date" name="date_emprunt" value="<?=$date_emprunt?>" required/>
                    </div>

                    <div class="label-box">
                        <label for="numero_usager">Numero Usager :</label>
                        <input class="form-input" type="number" name="numero_usager_ajout" value="<?=$numero_usager?>" required/>
                    </div>

                    <div class="label-box-textarea">
                        <label for="commentaire">Commentaire :</label><br />
                        <textarea class="form-input" type="text" name="commentaire_ajout" id="" cols="60" rows="10"
                            required><?=$commentaire?></textarea>
                    </div>

                    <div>
                        <input class="submit-btn" type="submit" value="Modifier" />
                    </div>
                </form>
            </div>
        </div>
        </main>
    </body>
</html>