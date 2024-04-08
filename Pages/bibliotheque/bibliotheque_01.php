<?php
require_once "pdo.php";
$sql = 'SELECT * FROM bibliotheque';
$temp = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire bibliothèque</title>
</head>
<body>
    <?
    include "includes/navbar.php"
    ?>
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
                echo "
                    <tr>
                        <th scope='row'>".$resultats['ville']."</th>
                        <td>".$resultats3['commentaire']."</td>
                        <td><a href=''><img src='images/crayon.jpg' alt='edit' title='edit'></a></td>
                        <td><a href=''><img src='images/poubelle.jpg' alt='delete' title='delete'></a></td>
                    </tr>";
            }
            echo "
            </tbody>
            </table>";
            ?>
    </table>
</body>
</html>