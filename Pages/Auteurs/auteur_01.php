<!doctype html>
<html lang="fr">
    <head>
        <title>Projet - Biblio</title>
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    </head>

    <body>
        <header>
            <?php
            include("includes/header.php");
            ?>
        </header>
        <main>
            <div class="tab-admin">
                <table border="1px">
                <tr><th>Nom</th><th>Prénom</th><th>Commentaire</th><th>Modifs</th></tr>
                <?php
                    $sql = 'SELECT * FROM auteur';
                    $temp = $pdo->query($sql);
                    while($auteur = $temp->fetch()){
                        echo $auteur
                ?>
                    <!-- <tr><td>#</td><td>#</td><td>#</td><td><a href="modif.php?nom=#&prenom=#&comm=#">Modifier</a><a href="suppr.php?id=#">Remove</a></td></tr> -->
                <?php
                    }
                ?>
                </table>
                <br />
                <a href="ajout.php">Add</a>
            </div>


        </main>
        <footer>
            <?php
            include("includes/footer.php");
            ?>
        </footer>
    </body>
</html>