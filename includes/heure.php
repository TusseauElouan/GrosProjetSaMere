<script>
        // Fonction pour afficher la date et l'heure actuelles en continu
        function afficherDateHeure() {
            var maintenant = new Date();
            var jour = maintenant.getDate().toString().padStart(2, '0');
            var mois = (maintenant.getMonth() + 1).toString().padStart(2, '0'); // Mois de 0 à 11, donc +1
            var annee = maintenant.getFullYear();
            var heures = maintenant.getHours().toString().padStart(2, '0');
            var minutes = maintenant.getMinutes().toString().padStart(2, '0');

            var dateAffichee = jour + '/' + mois + '/' + annee;
            var heureAffichee = heures + ':' + minutes;

            document.getElementById('date-heure').textContent = dateAffichee + ' ' + heureAffichee;
        }

        // Mettre à jour la date et l'heure toutes les secondes
        setInterval(afficherDateHeure, 1000);
    </script>

<div onload="afficherHeure()" class="affichage-heure">
    <p id="date-heure"></p>
</div>