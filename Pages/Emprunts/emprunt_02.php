<?php
require_once '../../includes/connexion.php';
if (isset($_REQUEST['numero_emprunt'],$_REQUEST['numero_ouvrage'],$_REQUEST['date_emprunt'],$_REQUEST['numero_usager'],$_REQUEST['commentaire'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $numero_ouvrage = $_REQUEST['numero_ouvrage'];
    $date_emprunt = $_REQUEST['date_emprunt'];
    $numero_usager = $_REQUEST['numero_usager'];
    $commentaire = $_REQUEST['commentaire'];
}
// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
<<<<<<< HEAD
if (isset($_REQUEST['num_ouvrage'],$_REQUEST['d_emprunt'],$_REQUEST['num_usager'],$_REQUEST['commentaire_emprunt'])) {
    $num_ouvrage = $_REQUEST['num_ouvrage'];
    $d_emprunt = $_REQUEST['d_emprunt'];
    $num_usager = $_REQUEST['num_usager'];
    $commentaire_emprunt = $_REQUEST['commentaire_emprunt'];
=======
if (isset($_REQUEST['nom_auteur'], $_REQUEST['prenom_auteur'], $_REQUEST['commentaire_auteur'])) {
    $nom_auteur = $_REQUEST['nom_auteur'];
    $prenom_auteur = $_REQUEST['prenom_auteur'];
    $commentaire_auteur = $_REQUEST['commentaire_auteur'];
>>>>>>> e7f1bb0a9d46411ddd1dea48c190a46b5694f938

    $sql = "INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager, commentaire) values(:num_ouvrage,:d_emprunt,:num_usager,:commentaire_emprunt)";
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':num_ouvrage', $num_ouvrage);
    $temp->bindParam(':d_emprunt', $d_emprunt);
    $temp->bindParam(':num_usager', $num_usager);
    $temp->bindParam(':commentaire_emprunt', $commentaire_emprunt);
    $temp->execute();

    header('Location: emprunt_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">

<<<<<<< HEAD
    <body>
<<<<<<< HEAD
        <header>
            <?php
            include("../../includes/navbar.php");
            ?>
        </header>
=======
        <?php
        include "../../includes/navbar.php";
        include '../../includes/heure.php';
        include '../../includes/titre-page.php';
        ?>
>>>>>>> 1e6464cb57ea45bdfc4a4f58ce823516700ea885
        <main>
=======
<head>
    <title>Projet - Biblio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <main>
        <div class="content">
>>>>>>> e7f1bb0a9d46411ddd1dea48c190a46b5694f938
            <div>
                <form action="emprunt_02.php">
                    <h2>Modifier un emprunt : </h2>

<<<<<<< HEAD
                    <input type="hidden" name="num_emprunt" value="<?=$numero_emprunt?>"/> 

                    <label for="num_ouvrage">Nom :</label>
                    <input type="text" name="num_ouvrage" value="<?=$numero_ouvrage?>" required/>

                    <label for="d_emprunt">Prénom :</label>
                    <input type="text" name="d_emprunt" value="<?=$date_emprunt?>" required/>
=======
                    <label for="nom_auteur">Nom :</label>
                    <input type="text" name="nom_auteur" required />

                    <label for="prenom_auteur">Prénom :</label>
                    <input type="text" name="prenom_auteur" required />

                    <label for="commentaire_auteur">Commentaire :</label>
                    <input type="text" name="commentaire_auteur" required />
>>>>>>> e7f1bb0a9d46411ddd1dea48c190a46b5694f938

                    <label for="num_usager">Commentaire :</label>
                    <input type="text" name="num_usager" value="<?=$numero_usager?>" required/>

                    <label for="commentaire_emprunt">Commentaire :</label>
                    <input type="text" name="commentaire_emprunt" value="<?=$commentaire?>" required/>
                    <input type="submit" value="Ajouter" />
                </form>
            </div>

        </div>
    </main>
</body>

</html>