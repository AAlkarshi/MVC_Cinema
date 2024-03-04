<?php
ob_start();
require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>

<form action="index.php?action=AjoutFilm" method="post">
    <label for="Titre_Film">Titre:</label>
    <input type="text" id="Titre_Film" name="Titre_Film" required placeholder="Taper le Nom du Film"><br>

    <label for="AnneeSortieFilm">Date de sortie (année uniquement):</label>
    <input type="int" id="AnneeSortieFilm" name="AnneeSortieFilm" required placeholder="Annee uniquement" ><br>

    <label for="DureeFilm">Durée du film (en minutes):</label>
    <input type="int" id="DureeFilm" name="DureeFilm" required placeholder="En Minutes"><br>

    <label for="Resume_Film">Résumé :</label>
    <input type="text" id="Resume_Film" name="Resume_Film" required placeholder="Ajouter un résumé"></input><br>

    <label for="Note_Film">Note du Film (sur 5):</label>
    <input type="int" id="Note_Film" name="Note_Film" required placeholder="Note du film sur 5" min="0" max="5"> <br>

    <label for="Affiche_Film">Description de l'affiche du film :</label>
    <input type="text" id="Affiche_Film" name="Affiche_Film" required placeholder="Ajouter une description"><br>

    <label for="ID_Realisateur">Réalisateur:</label>
    <input type="Int" id="ID_Realisateur" name="ID_Realisateur" required><br>
<br>
    <input type="submit" value="Ajouter le film">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titreFilm = filter_input(INPUT_POST, 'Titre_Film', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $anneeSortieFilm = filter_input(INPUT_POST, 'AnneeSortieFilm', FILTER_VALIDATE_INT);
    $dureeFilm = filter_input(INPUT_POST, 'DureeFilm', FILTER_VALIDATE_INT);
    $resumeFilm = filter_input(INPUT_POST, 'Resume_Film', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $noteFilm = filter_input(INPUT_POST, 'Note_Film', FILTER_VALIDATE_FLOAT);
    $afficheFilm = filter_input(INPUT_POST, 'Affiche_Film', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idRealisateur = filter_input(INPUT_POST, 'ID_Realisateur', FILTER_VALIDATE_INT);

if ($anneeSortieFilm === false || $dureeFilm === false || $noteFilm === false || $idRealisateur === false) {
        echo "Un ou plusieurs champs ont été mal remplis.";
    } else {
        echo "Film ajouté avec succès.";
    }
}

$titre = "Formulaires Ajout des Films";
$titre_secondaire = "Ajout des Films";
$contenu = ob_get_clean();
require "view/template.php";
