<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();

$listRole = $pdo->query("SELECT * FROM role");

echo "<p> Il y a " . $listRole->rowCount() . " Roles </p>";

echo "<ul>";
foreach ($listRole->fetchAll() as $role) {
    echo "<li>
    		<a href='index.php?action=detailRole&id=" . 
    			$role['ID_Role']."'>".
    			$role['RoleJouer_Acteur'] .
    		"</a>
    	</li>";
}
echo "</ul>";


$titre = "Nom du Role";
$titre_secondaire = "Liste des Acteurs ayant jouer ce role";
$contenu = ob_get_clean();
require "view/template.php";

?>








