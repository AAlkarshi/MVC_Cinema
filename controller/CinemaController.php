<?php

namespace Controller;
use Model\Connect;


class CinemaController {
	// Affiche ID FILM , TITRE ET DATE DE SORTIE
	public function listFilms() {
		//CONNEXIONA LA BDD
		$pdo = Connect::seConnecter();
		$requete =$pdo->query("SELECT ID_Films, Titre_Film, AnneeSortieFilm from films");
		require "view/film/listFilms.php";
	}






//DETAIL ACTEUR
public function detailActeur($id) {
    $pdo = Connect::seConnecter();
    $requeteFilmographie = $pdo->prepare("
        SELECT Titre_Film, RoleJouer_Acteur , Nom_Acteur, Prenom_Acteur , DateNaissance_Acteur
        FROM jouer 
        INNER JOIN films ON jouer.ID_Films = films.ID_Films 
        INNER JOIN role ON jouer.ID_Role = role.ID_Role 
        INNER JOIN acteurs ON jouer.ID_Acteur = acteurs.ID_Acteur 
        WHERE jouer.ID_Acteur = :id");
    $requeteFilmographie->execute(['id' => $id]);
    $filmographie = $requeteFilmographie->fetchAll(); 
    require "view/acteur/detailActeur.php";
}


//DETAIL LISTE ACTEURS
public function listActeurs() {
    $pdo = Connect::seConnecter();
    $requete = $pdo->query("SELECT ID_Acteur,Nom_Acteur,Prenom_Acteur FROM acteurs");
    $acteurs = $requete->fetchAll();
    require "view/acteur/listActeurs.php";
}






// DETAIL FILM   JUSTE

	public function detailFilm($id) {
    $pdo = Connect::seConnecter();
    $requeteFilm = $pdo->prepare("SELECT * FROM films WHERE films.ID_Films = :id"); 
    $requeteFilm->execute(['id' => $id]); 
    $reqDetailFilm = $requeteFilm->fetch();

    $reqDetailFilmo = $pdo->prepare(
		"SELECT films.ID_Films, films.Titre_Film, 
        films.AnneeSortieFilm, films.DureeFilm,films.Note_Film, films.Resume_Film,
        realisateur.Nom_Realisateur, realisateur.Prenom_Realisateur, 
        acteurs.Nom_Acteur , acteurs.Prenom_Acteur,
        role.RoleJouer_Acteur,
        categorie.Libelle_Film_Categorie
        FROM films
        INNER JOIN jouer ON films.ID_Films = jouer.ID_Films
        INNER JOIN role ON jouer.ID_Role = role.ID_Role
        INNER JOIN acteurs ON jouer.ID_Acteur = acteurs.ID_Acteur
        INNER JOIN realisateur ON films.ID_Realisateur = realisateur.ID_Realisateur
        LEFT JOIN posseder ON films.ID_Films = posseder.ID_Films
        LEFT JOIN categorie ON posseder.ID_Categorie = categorie.ID_Categorie
        WHERE films.ID_Films = :id");
    $reqDetailFilmo->execute(['id' => $id]);
    $filmographieFilm = $reqDetailFilmo->fetchAll();
    require "view/film/detailFilm.php";
}






// DETAIL REALISATEUR
public function detailRealisateur($id) {
    $pdo = Connect::seConnecter();
    $requeteInfosRealisateur = $pdo->prepare("SELECT * FROM realisateur WHERE ID_Realisateur = :id");
    $requeteInfosRealisateur->execute(['id' => $id]);
    $infosRealisateur = $requeteInfosRealisateur->fetch(); 

    
    $requeteFilmographie = $pdo->prepare("
        SELECT films.Titre_Film, films.AnneeSortieFilm 
        FROM films 
        WHERE films.ID_Realisateur = :id");
    $requeteFilmographie->execute(['id' => $id]);
    $filmographieRealisateur = $requeteFilmographie->fetchAll();
    require "view/realisateur/detailRealisateur.php";
}



//DETAIL LISTE REALISATEUR
public function listRealisateur() {
    $pdo = Connect::seConnecter();
    $requeteListRealisateur = $pdo->query("SELECT Nom_Realisateur,Prenom_Realisateur FROM realisateur");
    $realisateurList = $requeteListRealisateur->fetchAll(); 
    require "view/realisateur/listRealisateur.php";
}





// DETAIL GENRE
public function detailGenre($id) {
    $pdo = Connect::seConnecter();
    $requeteGenre = $pdo->prepare("SELECT Libelle_Film_Categorie FROM categorie WHERE ID_Categorie = :id");
    $requeteGenre->execute(['id' => $id]);
    $Genre = $requeteGenre->fetch(); 

    $requeteGenreParID = $pdo->prepare("
        SELECT Libelle_Film_Categorie , Titre_Film , categorie.ID_Categorie
		FROM posseder 
		INNER JOIN categorie ON posseder.ID_Categorie = categorie.ID_Categorie
		INNER JOIN films ON posseder.ID_Films = films.ID_Films
		WHERE posseder.ID_Categorie = :id");
    $requeteGenreParID->execute(['id' => $id]);
    $GenreParID = $requeteGenreParID->fetchAll();
    require "view/genre/detailGenre.php";
}




//LISTE GENRE
public function listGenre() {
    $pdo = Connect::seConnecter();
    $requeteListGenre = $pdo->query("SELECT Libelle_Film_Categorie FROM categorie");
    $ListGenre = $requeteListGenre->fetchAll(); 
    require "view/genre/listGenre.php";
}








// DETAIL ROLE
	public function detailRole($id) {
    $pdo = Connect::seConnecter();
    $reqRole = $pdo->prepare(
    	"SELECT RoleJouer_Acteur FROM role WHERE ID_Role = :id");
    $reqRole->execute(['id' => $id]);
    $Role = $reqRole->fetch(); 
   
    $reqListesGenres = $pdo->prepare(
    	"SELECT Titre_Film , Nom_Acteur , Prenom_Acteur , RoleJouer_Acteur
		FROM jouer
		INNER JOIN films ON jouer.ID_Films = films.ID_Films
		INNER JOIN role ON jouer.ID_Role = role.ID_Role
		INNER JOIN acteurs ON jouer.ID_Acteur = acteurs.ID_Acteur
		WHERE role.ID_Role = :id");
    $reqListesGenres->execute(['id' => $id]);
    $filmographieRole = $reqListesGenres->fetchAll(); 
    require "view/role/detailRole.php";
}





//LISTE GENRE
public function listRole() {
	    $pdo = Connect::seConnecter();
	    $requeteListRole = $pdo->prepare("SELECT RoleJouer_Acteur FROM Role");
	    $listRole = $requeteListRole->fetchAll(); 
	    require "view/role/listRole.php";
}



}


?>