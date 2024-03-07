<form action="index.php?action=UpdateFilm&id=<?= $id ?>" method="post">
    <label for="Titre_Film">Modification du Titre du Film :</label>
    <input type="text" id="Titre_Film" name="Titre_Film" required placeholder="Taper le Nom du Film"><br>
<br>
    <label for="AnneeSortieFilm">Date de sortie (année uniquement):</label>
    <input type="int" id="AnneeSortieFilm" name="AnneeSortieFilm" required placeholder="Annee uniquement" ><br>
<br>
    <label for="DureeFilm">Durée du film (en minutes):</label>
    <input type="int" id="DureeFilm" name="DureeFilm" required placeholder="En Minutes"><br>
<br>
    <label for="Resume_Film">Résumé :</label>
    <input type="text" id="Resume_Film" name="Resume_Film" required placeholder="Ajouter un résumé"></input><br>
<br>
    <label for="Note_Film">Note du Film (sur 5) : </label>
    <input type="int" id="Note_Film" name="Note_Film" required placeholder="Note du film sur 5" min="0" max="5"> <br>
<br>
    <label for="Affiche_Film">Description de l'affiche du film :</label>
    <input type="text" id="Affiche_Film" name="Affiche_Film" required placeholder="Ajouter une description"><br>
<br>
    <label for="ID_Realisateur">Réalisateur:</label>
    <input type="int" id="ID_Realisateur" name="ID_Realisateur" required><br>
<br>
    <input type="submit" value="Modifier ce film">
</form>

<?php
$titre = "Modifications des Films";
$titre_secondaire = "Mise à jour des Films";
$contenu = ob_get_clean();
require "view/template.php";
