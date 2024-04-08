<?php
require_once '../../includes/connexion.php';

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['nom_auteur'],$_REQUEST['prenom_auteur'],$_REQUEST['commentaire_auteur'])) {
    $nom_auteur = $_REQUEST['nom_auteur'];
    $prenom_auteur = $_REQUEST['prenom_auteur'];
    $commentaire_auteur = $_REQUEST['commentaire_auteur'];

    $sql = "INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) values(:nom_auteur,:prenom_auteur,:commentaire)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':nom_auteur', $nom_auteur);
    $temp->bindParam(':prenom_auteur', $prenom_auteur);
    $temp->bindParam(':commentaire', $commentaire_auteur);
    $temp->execute();

    header('Location: auteur_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Projet - Biblio</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
    </head>

    <body>
        <header>
            <?php
                require_once '../../includes/navbar.php';
            ?>
        </header>
        <main>
            <div>
                <form action="auteur_04.php">
                    <h2>Ajouter un auteur : </h2>

                    <label for="nom_auteur">Nom :</label>
                    <input type="text" name="nom_auteur" required/>

                    <label for="prenom_auteur">Prénom :</label>
                    <input type="text" name="prenom_auteur" required/>

                    <label for="commentaire_auteur">Commentaire :</label>
                    <input type="text" name="commentaire_auteur" required/>

                    <input type="submit" value="Ajouter" />
                </form>
            </div>


        </main>
        <footer>
            <?php
            // include("includes/footer.php");
            ?>
        </footer>
    </body>
</html>