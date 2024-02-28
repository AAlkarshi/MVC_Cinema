<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail des Genres</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Détail des Films selon leurs genres</h1>

    <ul>
        <?php foreach ($GenreParID as $genre): ?>
            <li>
                <a href="index.php?action=detailGenre&id=<?= $genre['ID_Categorie'] ?>">
                    <?= $genre["Titre_Film"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
