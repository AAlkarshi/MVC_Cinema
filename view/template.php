<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

	<title> <?= $titre ?> </title>
</head>
<body>
	<div id="wrapper" class="uk-container uk_container-expand">
		<main>
		<div id="contenu">
			<!-- SECTION NAVIGATION -->
					<nav>
						<a href="#">CinéStreaming</a>
						<a href="index.php">Films</a>
						<a href="index.php?action=listActeurs">Acteurs</a>
						<a href="index.php?action=listRealisateur">Réalisateurs</a>
						<a href="index.php?action=listGenre">Genres</a>
						<a href="index.php?action=listRole">Rôles</a>
						<a href="index.php?action=AjoutFilm">Ajout Films</a>
						<a href="index.php?action=UpdateFilm">MAJ Films</a>
						<a href="index.php?action=FormActeur">Ajout Acteurs</a>
						<a href="index.php?action=FormRealisateur">Ajout Realisateurs</a>
						<a href="index.php?action=FormGenre">Ajout Genre</a>
						<a href="index.php?action=FormRole">Ajout Role</a>
					</nav>
			<h1 class="uk-heading-divider"> PDO Cinema </h1>
			<h2 class="uk-heading-bullet"> <?= $titre_secondaire ?> </h2>
			<?= $contenu ?>
		</div>	
		</main>
	</div>
</body>
</html>