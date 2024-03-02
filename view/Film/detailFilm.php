<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<div class="container">
    <h1 style="display: flex; justify-content: center; width: 100%; flex-direction: row;">Détail du film</h1>
   
    <img class="IMGDetailFilm" src="<?= 'public/img/'.urlencode($reqDetailFilm['Titre_Film']).'.jpg'; ?>" style="display: block; margin-left: auto; margin-right: auto;">

    <h2 class="DetailCentre"><?= $reqDetailFilm['Titre_Film']; ?></h2>
    <p class="DetailCentre">Année de sortie: <?= $reqDetailFilm['AnneeSortieFilm']; ?></p>
    <p class="DetailCentre">Durée: <?= $reqDetailFilm['DureeFilm']; ?> minutes</p>
    <p class="DetailCentre">Note: <?= $reqDetailFilm['Note_Film']; ?></p>

    <!--  CATEGORIE -->
    <p class="DetailCentre">Catégorie: </p>  
    <?php foreach ($filmographieFilm as $acteur): ?>
        <p class="DetailCentre"><?= $acteur['Libelle_Film_Categorie']; ?></p> 
    <?php endforeach; ?>
        
    <!--  RESUME -->
    <p class="DetailCentre"><?= $reqDetailFilm['Resume_Film']; ?></p>

    <!--  ACTEURS -->
    <h3 class="DetailCentre">Acteurs:</h3>
    <?php foreach ($filmographieFilm as $acteur): ?>
        <p class="DetailCentre"><?= $acteur['RoleJouer_Acteur']; ?></p>
    <?php endforeach; ?>

    <!-- REALISATEUR -->
    <?php
    $aAfficheRealisateur = false;
    foreach ($filmographieFilm as $Real):
        if (!$aAfficheRealisateur): ?>
            <h3 class="DetailCentre">Réalisateur: </h3>
            <p class="DetailCentre">
                <?= $Real['Nom_Realisateur'] . " " . $Real['Prenom_Realisateur']; ?>
            </p>
            <?php
            $aAfficheRealisateur = true;
        endif;
    endforeach;
    ?>
</div>
</body>
</html>
