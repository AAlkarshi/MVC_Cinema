<?php
ob_start();

require_once 'model/Connect.php'; 
use Model\Connect;

$pdo = Connect::seConnecter();

use Controller\CinemaController;
use Controller\ActeurController;
use Controller\RealisateurController;

spl_autoload_register(function ($class_name) {
    include $class_name.'.php';
});

$ctrlCinema = new CinemaController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();

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
            $ctrlActeur->listActeurs($id);
            break;
        case "detailActeur":
            $ctrlActeur->detailActeur($id);
            break;
        case "detailRealisateur":
            $ctrlRealisateur->detailRealisateur($id);
            break;
        case "listRealisateur":
            $ctrlRealisateur->listRealisateur($id);
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
            $ctrlActeur->AjoutActeur($id);
        break;
        case "AjoutActeur":
            $ctrlActeur->AjoutActeur();
        break;

        //FORMULAIRE REALISATEUR
         case "FormRealisateur":
            $ctrlRealisateur->AjoutRealisateur($id);
        break;
        case "AjoutRealisateur":
            $ctrlRealisateur->AjoutRealisateur();
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
            $ctrlActeur->FormActeur($id);
        break;
        case "FormRealisateur":
            $ctrlRealisateur->FormRealisateur($id);
        break;
        
        case "FormGenre":
            $ctrlCinema->FormGenre($id);
        break;
        case "FormRole":
            $ctrlCinema->FormRole($id);
        break;

        //Suppression d'un film
        case "DeleteFilm":
            $ctrlCinema->DeleteFilm($id);
            echo "Ce film à bien été Supprimé ! ";
        break;

        //Mise à jour d'un film
        case "UpdateFilm":
            $ctrlCinema->UpdateFilm($id);
            echo "Ce film à bien été modifié ! ";
        break;
        
        default:
            echo "Action inconnue.";
        break;
    }
} else {
    $ctrlCinema->listFilms();
}




?>







             