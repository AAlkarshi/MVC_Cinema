<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du Réalisateur</title>
</head>
<body>
    <div>
        <h1>Informations du Réalisateur</h1>
        <p>Nom: <?= $infosRealisateur['Nom_Realisateur'] ?></p>
        <p>Prénom: <?= $infosRealisateur['Prenom_Realisateur'] ?></p>
        <p>Date de Naissance :<?= $infosRealisateur['DateNaissance_RealisateurFormate'] ?></p>
    </div>
    <div>
        <h2>Filmographie</h2>
        <ul>
         
            <?php foreach ($filmographieRealisateur as $film): ?>
                 <li> 
                 <a href="index.php?action=detailFilm&id=<?= $film['ID_Films'] ?>"> <?= $film["Titre_Film"] ?></a>
                    
                    (<?= $film['AnneeSortieFilmTrie'] ?>)
                </li>
                

                
                
               
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
