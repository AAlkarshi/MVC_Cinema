<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();
?>
    
<div class="container">
    <h1 style="display: flex; justify-content: center; width: 100%; flex-direction: row;">Détail du film</h1>
   
    <img class="IMGDetailFilm" src="<?= 'public/img/'.urlencode(trim($reqDetailFilm['Affiche_Film'])); ?>" style="display: block; margin-left: auto; margin-right: auto;">


    <h2 class="DetailCentre"><?= $reqDetailFilm['Titre_Film']; ?></h2>
    <p class="DetailCentre">Année de sortie: <?= $reqDetailFilm['AnneeSortieFilm']; ?></p>
    <p class="DetailCentre">Durée: <?= $reqDetailFilm['DureeFilm']; ?> minutes</p>
    <p class="DetailCentre">Note: <?= $reqDetailFilm['Note_Film']; ?></p>

    <!--  CATEGORIE -->
    <p class="DetailCentre">Catégorie : </p>  
        <?php foreach ($filmographieFilm as $categorie): ?>
            <p class="DetailCentre"> <?= $categorie['Libelle_Film_Categorie']; ?> </p> 
            
            <?php if ($filmographieFilm >= 1) {
                break;
            }
            ?>

        <?php endforeach; ?>
         
    <!--  RESUME -->
    <p class="DetailCentre"><?= $reqDetailFilm['Resume_Film']; ?></p>














    <!--  ACTEURS -->
    <h3 class="DetailCentre">Acteurs:</h3>
    <?php foreach ($filmographieFilm as $acteur): ?>
        <p class="DetailCentre">   <?= $acteur['Nom_Acteur'] ?>  <?= ($acteur['Prenom_Acteur']) ?> (<?=($acteur['RoleJouer_Acteur'])?>)  </p>
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

<?php
$titre = "Detail du Film";
$titre_secondaire = "Detail du Film";
$contenu = ob_get_clean();
require "view/template.php";
?>