<?php
require_once '../../includes/connexion.php';

$sql_usager = 'SELECT * FROM usager ;';
$sql_ouvrage = 'SELECT * FROM ouvrage ; ';

// verification de l'existance des valeures du form (si ca existe je prepare les variables pour la modif dans la BDD)
if (isset($_REQUEST['numero_emprunt'],$_REQUEST['numero_ouvrage'],$_REQUEST['date_emprunt'],$_REQUEST['numero_usager'],$_REQUEST['commentaire'])) {
    echo "zizi";
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $numero_ouvrage = $_REQUEST['numero_ouvrage'];
    $date_emprunt = $_REQUEST['date_emprunt'];
    $numero_usager = $_REQUEST['numero_usager'];
    $commentaire = $_REQUEST['commentaire'];

    $sql = "INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager ,commentaire) values(:numero_ouvrage,:date_emprunt,:numero_usager,:commentaire)";
    $temp = $pdo->prepare($sql);

    $temp->bindParam('numero_ouvrage', ':numero_ouvrage');
    $temp->bindParam('date_emprunt', ':date_emprunt');
    $temp->bindParam('numero_usager', ':numero_usager');
    $temp->bindParam('commentaire', ':commentaire');

    $temp->execute();

    header('Location: emprunt_03.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout emprunt</title>
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
                <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Ajouter un emprunt :</h2><br /><br />

                    <div class="label-box">
                        <label for="numero_ouvrage">Ouvrage :</label>
                        <select name="numero_ouvrage">
                            <?php
                            $temp_ouvrage = $pdo->prepare($sql_ouvrage);
                            $temp_ouvrage->execute();
                            while ($ouvrage = $temp_ouvrage->fetch()) {
                            ?>
                                <option value="<?php echo $ouvrage["numero_ouvrage"] ?>"><?php echo $ouvrage["titre_ouvrage"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="label-box">
                        <label for="date_emprunt">Date emprunt :</label>
                        <input class="form-input" type="date" name="date_emprunt" required />
                    </div>

                    <div class="label-box">
                        <label for="numero_usager">Usager :</label>
                        <select name="numero_usager">
                            <?php
                            $temp_usager = $pdo->prepare($sql_usager);
                            $temp_usager->execute();
                            while ($usager = $temp_usager->fetch()) {
                            ?>
                                <option value="<?php echo $usager["numero_usager"] ?>"><?php echo $usager["prenom_usager"] ?> <?php echo $usager["nom_usager"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="label-box-textarea">
                        <label for="commentaire">Commentaire :</label><br/>
                        <textarea class="form-input" type="text" name="commentaire" id="" cols="60" rows="10" required></textarea>
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