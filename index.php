<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();

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
            $ctrlCinema->AjoutFilm($id);
        break;
        case "AjoutFilm":
            $ctrlCinema->AjoutFilm();
        break;

        //FORMULAIRE ACTEUR
         case "FormActeur":
            $ctrlCinema->AjoutActeur($id);
        break;
        case "AjoutActeur":
            $ctrlCinema->AjoutActeur();
        break;

        //FORMULAIRE REALISATEUR
         case "FormRealisateur":
            $ctrlCinema->AjoutRealisateur($id);
        break;
        case "AjoutRealisateur":
            $ctrlCinema->AjoutRealisateur();
        break;


        //FORMULAIRE REALISATEUR
         case "FormRole":
            $ctrlCinema->AjoutRole($id);
        break;
        case "AjoutRole":
            $ctrlCinema->AjoutRole();
        break;

        //FORMULAIRE GENRE
         case "FormGenre":
            $ctrlCinema->AjoutGenre($id);
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






