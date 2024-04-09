<?php
require_once "./../../includes/connexion.php";
$sql = 'SELECT * FROM bibliotheque';
$temp = $pdo->query($sql);


if (isset($_POST['type'])){
    if($_POST['type']=="modif"){
        if (isset($_POST['ville_bibliotheque'],$_POST['commentaire_bibliotheque'],$_POST['id_bibliotheque'])){
            $numero_bibliotheque = $_POST['id_bibliotheque'];
            $ville_bibliotheque = $_POST['ville_bibliotheque'];
            $commentaire_bibliotheque = $_POST['commentaire_bibliotheque'];
            $sql="UPDATE bibliotheque SET ville_bibliotheque='".$ville_bibliotheque."', commentaire='".$commentaire_bibliotheque."' WHERE numero_bibliotheque='".$numero_bibliotheque."'";
            $pdo->exec($sql);
        }
    }
    if($_POST['type']=="ajout"){
        $sql="INSERT INTO bibliotheque (ville_bibliotheque,commentaire) VALUES ('".$_POST['ville_bibliotheque']."','".$_POST['commentaire_bibliotheque']."')";
        $pdo->exec($sql);
    }
    header("Location: bibliotheque_01.php");
}
if (isset($_REQUEST['type'])) {
    $id = $_REQUEST['numero_bibliotheque'];
    $sql = 'DELETE FROM bibliotheque WHERE numero_bibliotheque = :id';
    $temp = $pdo->prepare($sql);
    $temp->bindParam(':id', $id);
    $temp->execute();
    header('Location: bibliotheque_01.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire bibliothèque</title>
    <link rel="stylesheet" href="../../CSS/css_bibliotheque.css">
</head>

<body>
    <?php
    include "../../includes/navbar.php";
    include '../../includes/heure.php';
    include '../../includes/titre-page.php';
    ?>
    <div class="content">
        <div class="content-inside">
            <div class="boutonadd-container">
                <a href="bibliotheque_02.php" class="bouton-ajouter">
                    <img src="../../Medias/ajouterform.png" class="boutonsform" alt="">
                    Ajouter
                </a>
            </div>
            <table class="tableau-liste" border="1" cellpadding="5px 7px">
                <thead>
                    <tr>
                        <th scope='col'>Ville</th>
                        <th scope='col'>Commentaire</th>
                        <th scope='col'>Editer</th>
                        <th scope='col'>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($resultats = $temp->fetch()) {
                    ?>
                        <tr>
                            <th scope='row'><?= $resultats['ville_bibliotheque']?></th>
                            <td><?php echo $resultats['commentaire']?></td>
                            <td>
                                <a href='bibliotheque_03.php?id_bibliotheque=<?= $resultats['numero_bibliotheque']?>'>
                                <img src="../../Medias/editform.png" class="boutonsform" alt="edit" title="edit"></a>
                            </td>
                            <td>
                                <a onclick="return confirm('Voulez-vous vraiment supprimer cette bibliothèque?')" href='bibliotheque_01.php?type=supp&numero_bibliotheque=<?=$resultats['numero_bibliotheque']?>'>
                                <img src="../../Medias/supprimerform.png" class="boutonsform" alt="supprimer" title="supprimer"></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>