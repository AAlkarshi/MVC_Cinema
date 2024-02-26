<!-- PAGE PRINCIPALE -->

<?php ob_start(); ?>



<table>
	<thead>
		<tr>
			<th>Détail du film  <?= $film["Titre_Film"] ?> </th>
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($requete->fetchAll() as $film) {  ?>
				<tr>
					 <?= $film["Nom_Acteur"] ?> 
					<?= $film["Prenom_Acteur"] ?> 
					
				</tr>
			<?php } ?>



			
	</tbody>
	
</table>


<?php

$titre = "Listes des films";
$titre_secondaire = "Listes des films";
$contenu = ob_get_clean();
require "view/template.php";








