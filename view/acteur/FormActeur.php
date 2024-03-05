<div>
    <form action="index.php?action=AjoutActeur" method="post">
        <label for="Nom_Acteur">Nom de l'Acteur :</label>
        <input type="text" id="Nom_Acteur" name="Nom_Acteur" required placeholder="Tapez le Nom de l'Acteur"><br>
<br>
        <label for="Prenom_Acteur">Prénom de l'Acteur:</label>
        <input type="text" id="Prenom_Acteur" name="Prenom_Acteur" required placeholder="Tapez le Prénom de l'Acteur"><br>
<br>
        <label for="Sexe_Acteur">Genre de l'Acteur:</label>
        <input type="text" id="Sexe_Acteur" name="Sexe_Acteur" required placeholder="Tapez le Sexe de l'Acteur"><br>
<br>
        <label for="DateNaissance_Acteur">Date de Naissance :</label>
        <input type="date" id="DateNaissance_Acteur" name="DateNaissance_Acteur" required><br>
<br>
        <input type="submit" value="Ajouter l'Acteur">
    </form>
</div>

<?php
$titre = "Formulaires Ajout des Acteurs";
$titre_secondaire = "Ajout des Acteurs et Actrices";
$contenu = ob_get_clean();
require "view/template.php";
?>