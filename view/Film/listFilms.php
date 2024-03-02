<!-- PAGE PRINCIPALE -->

<?php ob_start(); ?>


<p> Il y a <?= $requete->rowCount() ?> films </p>

<table>
	<thead>
		<tr>
			<th>TITRE</th>
			<th>ANNEE SORTIE</th>
		</tr>
	</thead>

	<tbody>
		<?php
			foreach ($requete->fetchAll() as $film) {  ?>
			<tr>
			
				<td> <a href="index.php?action=detailFilm&id=<?= $film['ID_Films'] ?>"> <?= $film["Titre_Film"] ?></a></td>

					<td> <?= $film["AnneeSortieFilmOrdre"] ?> </td>
				</tr>
			<?php } ?>



			
	</tbody>
	
</table>


<?php

$titre = "Listes des films";
$titre_secondaire = "Listes des films";
$contenu = ob_get_clean();
require "view/template.php";








