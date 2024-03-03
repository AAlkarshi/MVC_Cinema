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
    <a href="index.php?action=FormFilm">Ajout Films</a>
    <a href="index.php?action=FormActeur">Ajout Acteurs</a>
    <a href="index.php?action=FormRealisateur">Ajout Realisateurs</a>
    <a href="index.php?action=FormGenre">Ajout Genre</a>
    <a href="index.php?action=FormRole">Ajout Role</a>
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

        case "FormFilm":
            $ctrlCinema->FormFilm($id);
        break;
        case "AjoutFilm":
            $ctrlCinema->AjoutFilm();
        break;

        //FORMULAIRE ACTEUR
         case "FormActeur":
            $ctrlCinema->FormActeur($id);
        break;
        case "AjoutActeur":
            $ctrlCinema->AjoutActeur();
        break;

        //FORMULAIRE REALISATEUR
         case "FormRealisateur":
            $ctrlCinema->FormRealisateur($id);
        break;
        case "AjoutRealisateur":
            $ctrlCinema->AjoutRealisateur();
        break;


        //FORMULAIRE REALISATEUR
         case "FormRole":
            $ctrlCinema->FormRole($id);
        break;
        case "AjoutRole":
            $ctrlCinema->AjoutRole();
        break;

        //FORMULAIRE GENRE
         case "FormGenre":
            $ctrlCinema->FormGenre($id);
        break;
        case "AjoutGenre":
            $ctrlCinema->AjoutGenre();
        break;

        
        case "FormActeur":
            $ctrlCinema->FormActeur($id);
        break;
        case "FormRealisateur":
            $ctrlCinema->FormRealisateur($id);
        break;
        case "FormGenre":
            $ctrlCinema->FormGenre($id);
        break;
        case "FormRole":
            $ctrlCinema->FormRole($id);
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













