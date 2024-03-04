<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>

<h1>Ajouter un nouvel Rôle</h1>
<form action="index.php?action=AjoutRole" method="post">
    <label for="RoleJouer_Acteur"> Rôle : </label>
    <input type="text" id="RoleJouer_Acteur" name="RoleJouer_Acteur" required placeholder="Taper le Rôle"><br>
    <br>
    <input type="submit" value="Ajouter un nouveau Rôle">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roleJouerActeur = filter_input(INPUT_POST, 'RoleJouer_Acteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
if (!$roleJouerActeur) {
	echo "Le rôle spécifié est invalide ou manquant.";
} else {
	echo "Le Rôle à bien été rajouté : " . $roleJouerActeur;
        
    }
}

$titre = "Formulaires Ajout des Rôles";
$titre_secondaire = "Ajout des Rôles";
$contenu = ob_get_clean();
require "view/template.php";
?>
