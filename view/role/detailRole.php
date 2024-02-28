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

    <ul>
        <?php foreach ($filmographieRole as $role): ?>
            <li>
               
                	<?= $role["RoleJouer_Acteur"] ?> 
               
                    <?= $role["Titre_Film"] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>






