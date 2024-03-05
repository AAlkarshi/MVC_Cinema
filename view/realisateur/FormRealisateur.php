<form action="index.php?action=AjoutRealisateur" method="post">
    <label for="Nom_Realisateur">Nom du Réalisateur : </label>
    <input type="text" id="Nom_Realisateur" name="Nom_Realisateur" required placeholder="Taper le nom du Réalisateur"><br>
<br>
    <label for="Prenom_Realisateur">Prénom du Réalisateur:</label>
    <input type="text" id="Prenom_Realisateur" name="Prenom_Realisateur" required placeholder="Taper le Prénom du Réalisateur"><br>
<br>
    <label for="Sexe_Realisateur">Genre du Réalisateur:</label>
     <input type="text" id="Sexe_Realisateur" name="Sexe_Realisateur" required placeholder="Taper le Sexe du Realisateur"><br>
<br>
    <label for="DateNaissance_Realisateur">Date de Naissance :</label>
    <input type="date" id="DateNaissance_Realisateur" name="DateNaissance_Realisateur" required><br>
<br>
    <input type="submit" value="Ajouter Réalisateur">
</form>

<?php
$titre = "Formulaires Ajout des Réalisateurs";
$titre_secondaire = "Ajout des Réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
