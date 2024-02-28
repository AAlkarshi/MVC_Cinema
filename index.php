<!DOCTYPE html>
<html>
<head>
    <title>CinéStreaming</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> <?= $titre ?>  </title>
</head>
<body>


<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


?>

<!-- SECTION NAVIGATION -->
<nav>
    <a href="#">CinéStreaming</a>
    <a href="index.php">Films</a>
    <a href="index.php?action=listActeurs">Acteurs</a>
    <a href="index.php?action=listRealisateur">Réalisateurs</a>
    <a href="index.php?action=listGenre">Genres</a>
    <a href="index.php?action=listRole">Rôles</a>
    <input type="search" id="site-search" name="q" 
        aria-label="Rechercher sur le site" style="margin-right: 20px; height: 30px; border-radius: 5px">
</nav>


<!-- SECTION PRINCIPALE -->
<section id="BLOCGRIS">
    <h2> LES MEILLEURS FILMS </h2>
</section>

<?php


use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});


$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case "listFilms":
            $ctrlCinema->listFilms();
            break;
        case "detailFilm":
            $ctrlCinema->detailFilm($id);
            break;
        case "listActeurs":
            $ctrlCinema->listActeurs($id);
            break;
        case "detailActeur":
            $ctrlCinema->detailActeur($id);
            break;
        case "detailRealisateur":
            $ctrlCinema->detailRealisateur($id);
            break;
        case "listRealisateur":
            $ctrlCinema->listRealisateur($id);
            break;
        case "detailGenre":
            $ctrlCinema->detailGenre($id);
            break;
        case "listGenre":
            $ctrlCinema->listGenre($id);
            break;
        case "listRole":
            $ctrlCinema->listRole($id);
            break;
        case "detailRole":
            $ctrlCinema->detailRole($id);
            break;
        default:
            echo "Action inconnue.";
            break;
    }
} else {
    $ctrlCinema->listFilms();
}




?>








</body>
</html>













