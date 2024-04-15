<?php
require_once '../../includes/connexion.php';

if(isset($_REQUEST['set'])){
    $numero = htmlentities($_REQUEST['numero']);
    $titre_ouvrage = htmlentities($_REQUEST['titre_ouvrage']);
    $nom = htmlentities($_REQUEST['nom']);
    $prenom = htmlentities($_REQUEST['prenom']);
    $date = htmlentities($_REQUEST['date']);
    $commentaire = htmlentities($_REQUEST['commentaire']);
}

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['ajouter'])) {
    $numero_retour = $_REQUEST['numero'];
    $date_retour = $_REQUEST['date_retour'];
    $commentaire = $_REQUEST['commentaire_retour'];

    $sql = "UPDATE retour SET date_retour = :date_retour , commentaire = :commentaire WHERE numero_retour = :numero_retour";
    $temp = $pdo->prepare($sql);
    echo $sql;
    $temp->bindParam(':date_retour', $date_retour);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->bindParam(':numero_retour', $numero_retour);
    $temp->execute();

    header('Location: retour_01.php');
    
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Ajout Retours</title>
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
                    <form class="form" action="retour_02.php">
                        <h2>Modifier un retour : </h2>
                        <input type="text" hidden name="numero" id="" value="<?=$numero?>"/>
                        <div class="label-box">
                            <label for="titre_ouvrage">Modifier le retour suivant :</label>
                            <input class="form-input" type="text" disabled
                            value="<?=$titre_ouvrage.' | '.$nom.' '.$prenom.' | '.$date?>"/>
                        </div>
                        <div class="label-box">
                            <label for="date_retour">Date de retour :</label><br/>
                            <input type="date" class="form-input" type="text" name="date_retour" id="" value="<?=$date?>"
                            required></input>
                        </div>             
                        <div class="label-box-textarea">
                            <label for="commentaire_retour">Commentaire :</label><br />
                            <textarea class="form-input" type="text" name="commentaire_retour" id="" cols="60" rows="10"><?=$commentaire?></textarea>
                        </div>
                        <div>
                            <input class="submit-btn" type="submit" name="ajouter" value="ajouter" />
                            <a href="retour_01.php">retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>