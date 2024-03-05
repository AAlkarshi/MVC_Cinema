<div>
            <h2>Informations de l'Acteur</h2>

            <p>Nom : <?= $filmographie[0]['Nom_Acteur'] ?></p>
            <p>Prénom : <?= $filmographie[0]['Prenom_Acteur'] ?></p>
            <p>Date de Naissance :
                <?= $filmographie[0]['DateNaissance_ActeurFormate']  ?>        
            </p>


            <h2>Filmographie</h2>
            <ul>
                <?php foreach ($filmographie as $film): ?>
                    <li>
                       <a href="index.php?action=detailFilm&id=<?= $film['ID_Films'] ?>"> <?= $film["Titre_Film"] ?></a>
                        <?= $film['RoleJouer_Acteur'] ?> 
                    </li>
                <?php endforeach; ?>
            </ul>
</div>
   

<?php
$titre = "Detail de l' Acteur";
$titre_secondaire = "Detail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";
?>