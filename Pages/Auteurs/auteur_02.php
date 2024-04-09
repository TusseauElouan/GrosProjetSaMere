<?php
require_once '../../includes/connexion.php';

// verification de l'existance des valeures dans le liens (si ca existe je prepare les variables pour mon form)
if (isset($_REQUEST['id'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['commentaire'])) {
    $id = $_REQUEST['id'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $commentaire = $_REQUEST['commentaire'];
}

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['id_auteur'],$_REQUEST['nom_auteur'],$_REQUEST['prenom_auteur'],$_REQUEST['commentaire_auteur'])) {
    $id_auteur = $_REQUEST['id_auteur'];
    $nom_auteur = $_REQUEST['nom_auteur'];
    $prenom_auteur = $_REQUEST['prenom_auteur'];
    $commentaire_auteur = $_REQUEST['commentaire_auteur'];

    $sql = "UPDATE auteur SET nom_auteur = :nom_auteur, prenom_auteur = :prenom_auteur, commentaire = :commentaire WHERE numero_auteur = :numero_auteur";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':nom_auteur', $nom_auteur);
    $temp->bindParam(':prenom_auteur', $prenom_auteur);
    $temp->bindParam(':commentaire', $commentaire_auteur);
    $temp->bindParam(':numero_auteur', $id_auteur);
    $temp->execute();

    header('Location: auteur_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Modification Auteurs</title>
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
                <form class="form" action="auteur_02.php">
                    <h2>Modifier un auteur : </h2>

                    <input type="hidden" name="id_auteur" value="<?=$id?>"/>

                    <div class="label-box">
                        <label for="nom_auteur">Nom :</label>
                        <input class="form-input" type="text" name="nom_auteur" value="<?=$nom?>" required/>
                    </div>

                    <div class="label-box">
                        <label for="prenom_auteur">Prénom :</label>
                        <input class="form-input" type="text" name="prenom_auteur" value="<?=$prenom?>" required/>
                    </div>

                    <div class="label-box-textarea">
                        <label for="commentaire_auteur">Commentaire :</label><br />
                        <textarea class="form-input" type="text" name="commentaire_auteur" id="" cols="60" rows="10"
                        required><?= $commentaire ?></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Modifier" />
                    </div>
                </form>
            </div>
        </div>
        </main>
    </body>
</html>