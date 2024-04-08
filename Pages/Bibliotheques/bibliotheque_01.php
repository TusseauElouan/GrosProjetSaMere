<?php
require_once "./../../includes/connexion.php";
$sql = 'SELECT * FROM bibliotheque';
$temp = $pdo->query($sql);


if (isset($_POST['type'])){
    if($_POST['type']=="modif"){
        $sql="UPDATE bibliotheque SET ville_bibliotheque='".$_POST['ville_bibliotheque']."', commentaire='".$_POST['commentaire']."' WHERE numero_bibliotheque='".$_POST['numero_bibliotheque']."'";
        $pdo->exec($sql);
    }
    if($_POST['type']=="ajout"){
        $sql="INSERT INTO bibliotheque (ville_bibliotheque,commentaire) VALUES ('".$_POST['ville_bibliotheque']."','".$_POST['commentaire']."')";
        $pdo->exec($sql);
    }
}
if(isset($_GET['type'],$_GET['numero_bibliotheque'])){
    if ($_GET['type'] == "supp"){
        $numero_bibliotheque = $_GET['numero_bibliotheque'];
        $sql = 'DELETE FROM bibliotheque WHERE numero_bibliotheque='.$numero_bibliotheque;
        $pdo->exec($sql);
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire bibliothèque</title>
    <link rel="stylesheet" href="CSS/css_bibliotheque.css">
</head>
<body>
    <?php
    include "../../includes/navbar.php"
    ?>
    <a href="bibliotheque_02.php">Ajouter +</a>
    <table>
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
            while ($resultats = $temp -> fetch()){
                ?>
                    <tr>
                        <th scope='row'><?php echo $resultats['ville_bibliotheque']?></th>
                        <td><?php echo $resultats['commentaire']?></td>
                        <td><a href='bibliotheque_03.php?id_bibliotheque=<?php echo $resultats['numero_bibliotheque']?>'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" /></svg></a></td>
                        <td><a href='bibliotheque_01.php?type=supp&numero_bibliotheque=<?=$resultats['numero_bibliotheque']?>'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg></a></td>
                    </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>