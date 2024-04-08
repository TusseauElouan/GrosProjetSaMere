<?php
$host = 'localhost';
$db = 'bibliotheque';
$user = 'root';
$pass = '';
$port = 3306;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$pdo = new PDO($dsn, $user, $pass);
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
            // include("includes/header.php");
            ?>
        </header>
        <main>
            <div class="tab-admin">
                <table border="1px">
                <tr><th>Nom</th><th>Prénom</th><th>Commentaire</th><th>Modifs</th></tr>
                <?php
                    $sql = 'SELECT * FROM auteur';
                    $temp = $pdo->query($sql);
                    $auteur = $temp->fetch();
                    $id = $auteur[0];
                    $nom = $auteur[1];
                    $prenom = $auteur[2];
                    $commentaire = $auteur[3];                  
                ?>
                    <tr><td><?=$nom?></td><td><?=$prenom?></td><td><?=$commentaire?></td><td><a href="auteur_02.php?nom=<?=$nom?>&prenom=<?=$prenom?>&commentaire=<?=$commentaire?>"><img src="../../Medias/editform.png" class="boutonsform" alt="image de modification"></a><a href="auteur_03.php?id=<?=$id?>"><img src="../../Medias/supprimerform.png" class="boutonsform" alt=""></a></td></tr>
                <?php
                ?>
                </table>
                <br />
                <a href="auteur_04.php">Add</a>
            </div>


        </main>
        <footer>
            <?php
            // include("includes/footer.php");
            ?>
        </footer>
    </body>
</html>