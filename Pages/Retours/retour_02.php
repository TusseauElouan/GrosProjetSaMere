<?php
require_once '../../includes/connexion.php';

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['ajouter'])) {
    $titre_ouvrage = $_REQUEST['titre_ouvrage'];
    $nom_auteur = $_REQUEST['nom_auteur'];
    $prenom_auteur = $_REQUEST['prenom_auteur'];
    $date_retour = $_REQUEST['date_retour'];
    $commentaire = $_REQUEST['commentaire'];

    $sql="SELECT emprunt_vue.emprunt_numero_emprunt AS numero_emprunt
    FROM emprunt_vue,auteur 
    WHERE emprunt_vue.titre_ouvrage = :titre_ouvrage 
    AND emprunt_vue.numero_auteur = auteur.numero_auteur
    AND auteur.nom_auteur = :nom_auteur 
    AND auteur.prenom_auteur = :prenom_auteur";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':titre_ouvrage', $titre_ouvrage);
    $temp->bindParam(':nom_auteur', $nom_auteur);
    $temp->bindParam(':prenom_auteur', $prenom_auteur);
    $temp->execute();
    $resultat = $temp->fetchAll();
    echo $resultat[0]['numero_emprunt'];

    $sql = "INSERT INTO retour (numero_emprunt, date_retour, commentaire) values(:numero_emprunt,:date_retour,:commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':numero_emprunt', $resultat[0]['numero_emprunt']);
    $temp->bindParam(':date_retour', $date_retour);
    $temp->bindParam(':commentaire', $commentaire);
    $temp->execute();

    header('Location: retour_01.php');
    exit();
}

$sql = "SELECT numero_emprunt, nom_usager, prenom_usager, titre_ouvrage, date_emprunt FROM emprunt_vue ORDER BY date_emprunt DESC";
$temp = $pdo->prepare($sql);
$temp->execute();
$selectEmprunt = $temp ;
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
                            <select class="form-input" type="text" name="titre_ouvrage" >
                                <?php 
                                foreach($selectEmprunt as $t){ 
                                    echo '<option value="'.$t['numero_emprunt'].'">'.$t['nom_usager'].' '.$t['prenom_usager'].''.$t['titre_ouvrage'].''.$t['date_emprunt'].'</option>';
                                }?>
                        </div>
                        <div class="label-box">
                            <label for="date_retour">Date de retour :</label><br />
                            <input type="date" class="form-input" type="text" name="date_retour" id=""
                            required></input>
                        </div>                    
                        <div class="label-box-textarea">
                            <label for="commentaire_retour">Commentaire :</label><br />
                            <textarea class="form-input" type="text" name="commentaire_auteur" id="" cols="60" rows="10"
                            required></textarea>
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