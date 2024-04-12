<?php
require_once '../../includes/connexion.php';

$sql_usager = 'SELECT * FROM usager ;';
$sql_ouvrage = 'SELECT * FROM ouvrage ; ';
$sql_emprunts = 'SELECT * FROM emprunt ;';
$temp_emprunt = $pdo->query($sql_emprunts);
$emprunt = $temp_emprunt->fetch();
// verification de l'existance des valeures dans le liens (si ca existe je prepare les variables pour mon form)
if (isset($_REQUEST['numero_emprunt'],$_REQUEST['numero_ouvrage'],$_REQUEST['date_emprunt'],$_REQUEST['numero_usager'],$_REQUEST['commentaire'])) {
    $numero_emprunt = $_REQUEST['numero_emprunt'];
    $numero_ouvrage = $_REQUEST['numero_ouvrage'];
    $date_emprunt = $_REQUEST['date_emprunt'];
    $numero_usager = $_REQUEST['numero_usager'];
    $commentaire = $_REQUEST['commentaire'];
}
if (isset($_REQUEST['numero_emprunt_ajout'],$_REQUEST['numero_ouvrage_ajout'],$_REQUEST['date_emprunt_ajout'],$_REQUEST['numero_usager_ajout'],$_REQUEST['commentaire_ajout'])) {
    $numero_emprunt_ajout = $_REQUEST['numero_emprunt_ajout'];
    $numero_ouvrage_ajout = $_REQUEST['numero_ouvrage_ajout'];
    $date_emprunt_ajout = $_REQUEST['date_emprunt_ajout'];
    $numero_usager_ajout = $_REQUEST['numero_usager_ajout'];
    $commentaire_ajout = $_REQUEST['commentaire_ajout'];

    $sql = "UPDATE emprunt SET numero_ouvrage = :numero_ouvrage, date_emprunt = :date_emprunt, numero_usager = :numero_usager ,commentaire = :commentaire WHERE numero_emprunt = :numero_emprunt";
    $temp = $pdo->prepare($sql);

    $temp->bindParam(':numero_ouvrage', $numero_ouvrage_ajout);
    $temp->bindParam(':date_emprunt', $date_emprunt_ajout);
    $temp->bindParam(':numero_usager', $numero_usager_ajout);
    $temp->bindParam(':commentaire', $commentaire_ajout);
    $temp->bindParam(':numero_emprunt', $numero_emprunt_ajout);

    $temp->execute();

    header('Location: emprunt_01.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Modification Emprunt</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
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
        <form class="form" action="emprunt_02.php" method="post">
            <h2>Modifier un emprunt : </h2>

            <input type="hidden" name="numero_emprunt_ajout" value="<?=$numero_emprunt?>"/>

            <div class="label-box">
                <label for="numero_ouvrage">Ouvrage :</label>
                <select name="numero_ouvrage">
                    <?php
                    $temp_ouvrage = $pdo->prepare($sql_ouvrage);
                    $temp_ouvrage->execute();
                    while ($ouvrage = $temp_ouvrage->fetch()) {
                        ?>
                        <option value="<?php echo $ouvrage["numero_ouvrage"] ?>" <?php if ($ouvrage["numero_ouvrage"] == $numero_ouvrage) {
                            echo "selected";
                        } ?>><?php echo $ouvrage["titre_ouvrage"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="label-box">
                <label for="date_emprunt">Date emprunt :</label>
                <input class="form-input" type="date" name="date_emprunt_ajout" value="<?=$date_emprunt?>" required/>
            </div>

            <div class="label-box">
                <label for="numero_usager">Usager :</label>
                <select name="numero_usager">
                    <?php
                    $temp_usager = $pdo->prepare($sql_usager);
                    $temp_usager->execute();
                    while ($usager = $temp_usager->fetch()) {
                        ?>
                        <option value="<?php echo $usager["numero_usager"] ?>" <?php if ($usager["numero_usager"] == $numero_usager) {
                            echo "selected";
                        } ?>><?php echo $usager["prenom_usager"] ?> <?php echo $usager["nom_usager"] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="label-box-textarea">
                <label for="commentaire">Commentaire :</label><br />
                <textarea class="form-input" type="text" name="commentaire_ajout" id="" cols="60" rows="10"
                          required><?=$commentaire?></textarea>
            </div>

            <div>
                <input class="submit-btn" type="submit" value="Modifier" />
            </div>
        </form>
    </div>
</div>
</main>
</body>
</html>