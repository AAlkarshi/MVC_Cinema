<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();

$requete = $pdo->query("SELECT * FROM acteurs");

echo "<p> Il y a " . $requete->rowCount() . " Acteurs </p>";

echo "<ul>";
foreach ($requete->fetchAll() as $acteur) {
    
    echo "<li><a href='index.php?action=detailActeur&id=" . $acteur['ID_Acteur'] . "'>" . $acteur['Nom_Acteur'] . " " . $acteur['Prenom_Acteur'] . "</a></li>";
}
echo "</ul>";

$titre = "Liste des Acteurs";
$titre_secondaire = "Liste des Acteurs et Actrices";
$contenu = ob_get_clean();
require "view/template.php";
?>
