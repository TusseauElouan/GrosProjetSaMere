<?php
require_once '../../includes/connexion.php';

?>
<!doctype html>
<html lang="fr">
<head>
    <title>Historique Ouvrages</title>
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
                <h2>Historique des emprunts</h2>
                <table  class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date d'emprunt</th>
                        <th>Titre de l'ouvrage</th>
                    </tr>
                    <?php
                        $sql_emprunts = "SELECT e.date_emprunt, u.nom_usager, u.prenom_usager, o.titre_ouvrage
                                        FROM emprunt e
                                        JOIN usager u ON e.numero_usager = u.numero_usager
                                        JOIN ouvrage o ON e.numero_ouvrage = o.numero_ouvrage";
                        $result_emprunts = $pdo->query($sql_emprunts);
                        while($row = $result_emprunts->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr><td>".$row['nom_usager']."</td><td>".$row['prenom_usager']."</td><td>".$row['date_emprunt']."</td><td>".$row['titre_ouvrage']."</td></tr>";
                        }
                    ?>
                </table><br /><br />
                
                <h2>Historique des retours</h2>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Titre</th>
                        <th>Date de retour</th>
                        <th>Date d'emprunt</th>
                    </tr>
                    <?php
                        $sql_retours = "SELECT r.date_retour, u.nom_usager, u.prenom_usager,o.titre_ouvrage, e.date_emprunt
                                        FROM retour r
                                        JOIN emprunt e ON r.numero_emprunt = e.numero_emprunt
                                        JOIN usager u ON e.numero_usager = u.numero_usager
                                        JOIN ouvrage o ON r.numero_retour = o.numero_ouvrage";
                        $result_retours = $pdo->query($sql_retours);
                        while($row = $result_retours->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr><td>".$row['nom_usager']."</td><td>".$row['prenom_usager']."</td><td>".$row['titre_ouvrage']."</td><td>".$row['date_retour']."</td><td>".$row['date_emprunt']."</td></tr>";
                        }
                    ?>
                </table><br /><br />
                
                <h2>Historique des transferts</h2>
                <table class="tableau-liste" border="1" cellpadding="5px 7px">
                    <tr>
                        <th>Date de transfert</th>
                        <th>Bibliothèque d'origine</th>
                        <th>Bibliothèque cible</th>
                    </tr>
                    <?php
                        $sql_transferts = "SELECT t.date_transfert, b1.ville_bibliotheque AS origine, b2.ville_bibliotheque AS cible
                                            FROM transfert t
                                            JOIN bibliotheque b1 ON t.numero_bibliotheque_origine = b1.numero_bibliotheque
                                            JOIN bibliotheque b2 ON t.numero_bibliotheque_cible = b2.numero_bibliotheque";
                        $result_transferts = $pdo->query($sql_transferts);
                        while($row = $result_transferts->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr><td>".$row['date_transfert']."</td><td>".$row['origine']."</td><td>".$row['cible']."</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>