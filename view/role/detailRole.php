<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail des Genres</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Détail des Films selon leurs genres</h1>

    
        <?php foreach ($filmographieRole as $role): ?>
        
        <?= $role["Prenom_Acteur"]." ".$role["Nom_Acteur"] . " à joué le role de ".
        $role["RoleJouer_Acteur"] ?> 
               
                    
            
        <?php endforeach; ?>

</div>

</body>
</html>






