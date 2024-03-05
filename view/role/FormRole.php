<h1>Ajouter un nouvel Rôle</h1>
<form action="index.php?action=AjoutRole" method="post">
    <label for="RoleJouer_Acteur"> Rôle : </label>
    <input type="text" id="RoleJouer_Acteur" name="RoleJouer_Acteur" required placeholder="Taper le Rôle"><br>
    <br>
    <input type="submit" value="Ajouter un nouveau Rôle">
</form>


<?php
$titre = "Formulaires Ajout des Rôles";
$titre_secondaire = "Ajout des Rôles";
$contenu = ob_get_clean();
require "view/template.php";
?>
