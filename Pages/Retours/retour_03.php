<?php
require_once '../../includes/connexion.php';

$sql = "SELECT emprunt_numero_emprunt, nom_usager, prenom_usager, titre_ouvrage, date_emprunt 
FROM emprunt_vue 
WHERE NOT EXISTS (SELECT * FROM retour_vue WHERE retour_vue.numero_emprunt = emprunt_vue.emprunt_numero_emprunt)
ORDER BY date_emprunt DESC";
$temp = $pdo->prepare($sql);
$temp->execute();
$selectEmprunt = $temp ;

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['ajouter'])) {
    $numero_emprunt = $_REQUEST['numero_ouvrage'];
    $date_retour = $_REQUEST['date_retour'];
    $commentaire = $_REQUEST['commentaire'];

    $sql = "INSERT INTO retour (numero_emprunt, date_retour, commentaire) values(:numero_emprunt,:date_retour,:commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_emprunt', $numero_emprunt);
    $temp->bindParam(':date_retour', $date_retour);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->execute();

    header('Location: retour_01.php');
    exit();
    
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
                    <form class="form" action="retour_03.php">
                        <h2>Ajouter un retour : </h2>
                        <div class="label-box">
                            <label for="titre_ouvrage">Liste des emprunts en cours :</label>
                            <select class="form-input" type="text" name="numero_emprunt" >
                                <?php 
                                foreach($selectEmprunt as $t){ 
                                    echo '<option value="'.$t['numero_emprunt'].'">'.$t['titre_ouvrage'].' | '.$t['nom_usager'].' '.$t['prenom_usager'].' | '.$t['date_emprunt'].'</option>';
                                }?>
                        </div>
                        <div class="label-box">
                            <label for="date_retour">Date de retour :</label><br />
                            <input type="date" class="form-input" type="text" name="date_retour" id=""
                            required></input>
                        </div>                    
                        <div class="label-box-textarea">
                            <label for="commentaire_retour">Commentaire :</label><br />
                            <textarea class="form-input" type="text" name="commentaire_auteur" id="" cols="60" rows="10"></textarea>
                        </div>
                        <div>
                            <input class="submit-btn" type="submit" name="ajouter" value="Ajouter" />
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>