<?php
require_once '../../includes/connexion.php';

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['numero_emprunt'],$_REQUEST['numero_ouvrage'],$_REQUEST['date_emprunt'],$_REQUEST['numero_usager'],$_REQUEST['commentaire'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $numero_ouvrage = $_REQUEST['numero_ouvrage'];
    $date_emprunt = $_REQUEST['date_emprunt'];
    $numero_usager = $_REQUEST['numero_usager'];
    $commentaire = $_REQUEST['commentaire'];

    $sql = "INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager ,commentaire) values(:numero_ouvrage,:date_emprunt,:numero_usager,:commentaire)";
    $temp = $pdo->prepare($sql);

    $temp->execute();

    header('Location: auteur_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Ajout emprunt</title>
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
            <form class="form" action="emprunt_01.php">
                <h2>Ajouter un emprunt : </h2><br /><br/>

                <input type="hidden" name="numero_emprunt"/>

                <div class="label-box">
                    <label for="numero_ouvrage">Numero Ouvrage :</label>
                    <input class="form-input" type="number" name="numero_ouvrage" required/>
                </div>
                
                <div class="label-box">
                    <label for="date_emprunt">Date Ouvrage :</label>
                    <input class="form-input" type="date" name="date_emprunt" required/>
                </div>

                <div class="label-box">
                    <label for="numero_usager">Numero Usager :</label>
                    <input class="form-input" type="number" name="numero_usager" required/>
                </div>

                <div class="label-box-textarea">
                    <label for="commentaire">Commentaire :</label><br />
                    <textarea class="form-input" type="text" name="commentaire" id="" cols="60" rows="10"
                        required></textarea>
                </div>
                <div>
                    <input class="submit-btn" type="submit" value="Ajouter" />
                </div>
                </form>
            </div>
        </div>
        </main>
    </body>
</html>