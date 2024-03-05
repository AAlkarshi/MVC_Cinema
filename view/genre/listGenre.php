<?php



echo "<p> Il y a " . count($ListGenre) . " Genres </p>";

echo "<ul>";
foreach ($ListGenre as $genre) {

    echo "<li><a href='index.php?action=detailGenre&id=" . $genre['ID_Categorie'] . "'>" . $genre['Libelle_Film_Categorie'] . "</a></li>";
}
echo "</ul>";

$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres de Films";
$contenu = ob_get_clean();
require "view/template.php";
?>
