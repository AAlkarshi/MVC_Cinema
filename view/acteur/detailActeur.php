<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail des Acteurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Détail de l'Acteur</h1>
    
        <div>
            <h2>Informations de l'Acteur</h2>
            <p>Nom : <?= $filmographie[0]['Nom_Acteur'] ?></p>
            <p>Prénom : <?= $filmographie[0]['Prenom_Acteur'] ?></p>
            
            <p>Date de Naissance : 
                <?= $filmographie[0]['DateNaissance_Acteur'] ?>        
            </p>


            <h2>Filmographie</h2>
            <ul>
                <?php foreach ($filmographie as $film): ?>
                    <li><?= $film['Titre_Film'] ?> 
                        <?= $film['RoleJouer_Acteur'] ?>                         </li>
                <?php endforeach; ?>
            </ul>
        </div>
   
</div>

</body>
</html>
