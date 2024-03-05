<h1>Ajouter un nouveau Genre</h1>
    <form action="index.php?action=AjoutGenre" method="post">
        <label for="Libelle_Film_Categorie"> Genre : </label>
        <input type="text" id="Libelle_Film_Categorie" name="Libelle_Film_Categorie" required placeholder="Taper le Genre"><br>
        <br>
        <input type="submit" value="Ajouter un nouveau Genre">
    </form> 



<?php
$titre = "Formulaires Ajout des Genres";
$titre_secondaire = "Ajout des Genres";
$contenu = ob_get_clean();
require "view/template.php";
?>
