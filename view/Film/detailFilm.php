<div class="container">
    <h1 style="display: flex; justify-content: center; width: 100%; flex-direction: row;">Détail du film</h1>
   
    <img class="IMGDetailFilm" src="<?= 'public/img/'.urlencode(trim($reqDetailFilm['Affiche_Film'])); ?>" style="display: block; margin-left: auto; margin-right: auto;">


    <h2 class="DetailCentre"> <?= $reqDetailFilm['Titre_Film']; ?></h2>
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

        <p class="DetailCentre"> <?= $reqDetailFilm['Nom_Realisateur']; ?></p>

         
    <!--  RESUME -->
    <p class="DetailCentre"><?= $reqDetailFilm['Resume_Film']; ?></p>


    

    
<!--  ACTEURS BOUCLE CORRECT-->
    <h3 class="DetailCentre">Acteurs:</h3>
        <?php  foreach ($filmographieFilm as $acteur): ?>
            <p class="DetailCentre">   <?= $acteur['Nom_Acteur'] ?>  <?= ($acteur['Prenom_Acteur']) ?> (<?=($acteur['RoleJouer_Acteur'])?>)  </p>
        <?php endforeach; ?> 
    
        
    


<!--  ACTEURS BOUCLE CORRECT-->
<h3 class="DetailCentre">Réalisateur:</h3>
        <p class="DetailCentre">   
            <p class="DetailCentre"> 
                <?= $reqDetailFilm['Nom_Realisateur'] ?> <?= $reqDetailFilm['Prenom_Realisateur']; ?>
            </p>
        </p>

    
    

<!--  BTN SUPPRESSION FILM -->
<h3>Bouton Suppression Film :</h3>
<form action="index.php" method="GET">
    <input type="hidden" name="action" value="DeleteFilm">
    <input type="hidden" name="id" value="<?= $reqDetailFilm['ID_Films'] ?>">
    <button type="submit">Supprimer ce Film</button>
</form>

       


<h3>Bouton Modifier ce Film :</h3>  
    <!-- REDIRECTION -->
<a href="index.php?action=UpdateFilm&id=<?= $reqDetailFilm['ID_Films'] ?>" class="btn">Modifier ce Film</a>

    
    










</div>








<?php
$titre = "Detail du Film";
$titre_secondaire = "Detail du Film";
$contenu = ob_get_clean();
require "view/template.php";
?>