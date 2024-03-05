<?php


echo "<p> Il y a " . count($realisateurList) . " Realisateur(s) </p>";

echo "<ul>";
foreach ($realisateurList as $realisateur) {
    echo "<li><a href='index.php?action=detailRealisateur&id=" . 
    $realisateur['ID_Realisateur'] . "'>" . 
    $realisateur['Nom_Realisateur'] . " " . 
    $realisateur['Prenom_Realisateur'] . 
    "</a></li>";
}
echo "</ul>";

$titre = "Liste des Realisateurs";
$titre_secondaire = "Liste des Realisateur ";
$contenu = ob_get_clean();
require "view/template.php";
?>
