<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>


    <h1>Ajouter un nouveau Genre</h1>
    <form action="index.php?action=AjoutGenre" method="post">
        <label for="Libelle_Film_Categorie"> Genre : </label>
        <input type="text" id="Libelle_Film_Categorie" name="Libelle_Film_Categorie" required placeholder="Taper le Genre"><br>
        <br>
        <input type="submit" value="Ajouter un nouveau Genre">
    </form> 



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'AjoutGenre') {
   
    $libelleFilmCategorie = filter_input(INPUT_POST, 'Libelle_Film_Categorie', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($libelleFilmCategorie === false || $libelleFilmCategorie === null) {
        echo "Le genre spécifié est invalide ou manquant.";
    } else {
        echo "Ce genre à bien été Ajouter : " . $libelleFilmCategorie;
    }
}


$titre = "Formulaires Ajout des Genres";
$titre_secondaire = "Ajout des Genres";
$contenu = ob_get_clean();
require "view/template.php";
?>
