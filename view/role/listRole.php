<?php


echo "<p> Il y a " . count($listRole) . " Roles </p>"; 
echo "<ul>";
foreach ($listRole as $role) {
    echo "<li>
    		<a href='index.php?action=detailRole&id=" . 
			    $role['ID_Role'] . "'>" . 
			    $role['RoleJouer_Acteur'] . 
   	 		"</a>
   	 	</li>";
}
echo "</ul>";

$titre = "Listes des Rôles";
$titre_secondaire = "Liste des Acteurs ayant joué ce rôle";
$contenu = ob_get_clean();
require "view/template.php";
?>
