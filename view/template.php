<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title> <?= $titre ?> </title>
</head>
<body>

	<div id="wrapper" class="uk-container uk_container-expand">
		<main>
			<div id="contenu">
				<h1 class="uk-heading-divider"> PDO Cinema </h1>
				<h2 class="uk-heading-bullet"> <?= $titre_secondaire ?> </h2>

				<?= $contenu ?>
				
			</div>
		</main>

	</div>

</body>
</html>