<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>

<div class="container">
    <h1>Détail des Films selon leurs genres</h1>

    
        <?php foreach ($filmographieRole as $role): ?>
        
        <?= $role["Prenom_Acteur"]." ".$role["Nom_Acteur"] . " à joué le role de ".
        $role["RoleJouer_Acteur"] ?> 
               
        <?php endforeach; ?>

</div>

<?php
$titre = "Detail du Role";
$titre_secondaire = "Detail du Role";
$contenu = ob_get_clean();
require "view/template.php";
?>



