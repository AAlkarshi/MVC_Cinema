<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du film</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1 style="display: flex; justify-content: center; width: 100%;
                flex-direction: row;">Détail du film</h1>
    
    <div>
        <?php
        foreach ($requete->fetchAll() as $film) {
            
            $CheminImage = "public/img/".urlencode($film['Titre_Film']).".jpg";  
            ?>

            <div>
            <div id="EnglobeDetailImage">
                <img class="IMGDetailFilm" src="<?= htmlspecialchars($CheminImage); ?>" alt="<?= htmlspecialchars($film['Titre_Film']); ?>" >

            </div>
            <div>
                    
                <a class="DetailCentre" href="index.php?action=detailFilm&id=<?= htmlspecialchars($film['ID_Films']); ?>">
                    <?= htmlspecialchars($film["Titre_Film"]); ?> 
                </a>
                        
            <h1 class="DetailCentre">
                <?= htmlspecialchars($film["Titre_Film"]); ?>
            </h1>
                        
            <p class="DetailCentre" >
                Année de sortie: <?= htmlspecialchars($film["AnneeSortieFilm"]); ?>
            </p>
                        
            <p class="DetailCentre">
                Durée: <?= htmlspecialchars($film["DureeFilm"]); ?>
            </p>

            <p class="DetailCentre">
                Note: <?= htmlspecialchars($film["Note_Film"]); ?>
            </p>

            <p class="DetailCentre">Catégorie: 
               <?= htmlspecialchars($film["Libelle_Film_Categorie"]); ?>
            </p>
                        
            <p class="DetailCentre">
                Résumé: <?= htmlspecialchars($film["Resume_Film"]); ?></p>


             <p class="DetailCentre">
                Réalisateur: 
                    <?= htmlspecialchars($film["Nom_Realisateur"]) . " " . htmlspecialchars($film["Prenom_Realisateur"]); ?>               
             </p>
             
            </div>
            </div>
            <?php 
        }
        ?>
    </div>
  
    
</div>

</body>
</html>
