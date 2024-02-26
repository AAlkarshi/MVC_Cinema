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

if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
    }
}



if (isset($_GET['action'])) {
    $ctrlCinema = new CinemaController();
    
    switch ($_GET['action']) {
        case 'listFilms':
            $ctrlCinema->listFilms();
            break;
        case 'listActeurs':
            $ctrlCinema->listActeurs();
            break;
    }
} else {
    $ctrlCinema = new CinemaController();
    $ctrlCinema->listFilms(); 
}




?>








</body>
</html>













