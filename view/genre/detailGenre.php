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

    <!-- TITRE DU GENRE-->
    <?php foreach ($GenreParID as $titre): ?>
        <h3> <?= $titre["Libelle_Film_Categorie"] ?> </h3>
            <?php break; ?>
     <?php endforeach; ?>
                

    <ul>
        <?php foreach ($GenreParID as $film): ?>
            <li>
                <!-- LIEN FILM -->
                <a href="index.php?action=detailFilm&id=<?= $film['ID_Films'] ?>">
                    <?= $film["Titre_Film"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
