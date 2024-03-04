<?php
ob_start();
require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>

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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nomRealisateur = filter_input(INPUT_POST, 'Nom_Realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenomRealisateur = filter_input(INPUT_POST, 'Prenom_Realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sexeRealisateur = filter_input(INPUT_POST, 'Sexe_Realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateNaissanceRealisateur = filter_input(INPUT_POST, 'DateNaissance_Realisateur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$nomRealisateur || !$prenomRealisateur || !$sexeRealisateur || !$dateNaissanceRealisateur) {
        echo "Un ou plusieurs champs sont invalides.";
    } else {
        echo "Ce Réalisateur à été rajouté.";
    }
}

$titre = "Formulaires Ajout des Réalisateurs";
$titre_secondaire = "Ajout des Réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
