<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();


$GenreParID = $pdo->query("SELECT * FROM Categorie");

echo "<p> Il y a " . $GenreParID->rowCount() . " Genres </p>";


echo "<ul>";
foreach ($GenreParID->fetchAll() as $genre) {
    echo "<li>
    		<a href='index.php?action=detailGenre&id=" . 
    			$genre['ID_Categorie']."'>".
    			$genre['Libelle_Film_Categorie'] .
    		"</a>
    	</li>";
}
echo "</ul>";


$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres de Films";
$contenu = ob_get_clean();
require "view/template.php";




?>
