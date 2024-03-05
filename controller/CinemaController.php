<?php

namespace Controller;
use Model\Connect;

class CinemaController {
	// Affiche ID FILM , TITRE ET DATE DE SORTIE
	public function listFilms() {
		//CONNEXIONA LA BDD
		$pdo = Connect::seConnecter();
		$requete =$pdo->query("SELECT ID_Films, Titre_Film, AnneeSortieFilm AS AnneeSortieFilmOrdre
        FROM films
        ORDER BY AnneeSortieFilmOrdre DESC");
		require "view/film/listFilms.php";
	}


//DETAIL ACTEUR
public function detailActeur($id) {
    $pdo = Connect::seConnecter();
    $requeteFilmographie = $pdo->prepare("
    SELECT films.ID_Films, Titre_Film, RoleJouer_Acteur , Nom_Acteur, Prenom_Acteur , 
    DATE_FORMAT(DateNaissance_Acteur,'%d-%m-%Y') AS DateNaissance_ActeurFormate
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
    $requeteInfosRealisateur = $pdo->prepare("
    SELECT Nom_Realisateur, Prenom_Realisateur, DATE_FORMAT
    (DateNaissance_Realisateur,'%d-%m-%Y') AS DateNaissance_RealisateurFormate 
    FROM Realisateur 
    WHERE Realisateur.ID_Realisateur = :id"
);
    $requeteInfosRealisateur->execute(['id' => $id]);
    $infosRealisateur = $requeteInfosRealisateur->fetch(); 

    
    $requeteFilmographie = $pdo->prepare("
        SELECT films.ID_Films ,films.Titre_Film, films.AnneeSortieFilm  AS AnneeSortieFilmTrie
        FROM films 
        WHERE films.ID_Realisateur = :id
        ORDER BY AnneeSortieFilmTrie DESC"
    );
    $requeteFilmographie->execute(['id' => $id]);
    $filmographieRealisateur = $requeteFilmographie->fetchAll();
    require "view/realisateur/detailRealisateur.php";
}


//DETAIL LISTE REALISATEUR
public function listRealisateur() {
    $pdo = Connect::seConnecter();
    $requeteListRealisateur = $pdo->query("SELECT ID_Realisateur, Nom_Realisateur, Prenom_Realisateur FROM realisateur");
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
        SELECT Libelle_Film_Categorie , Titre_Film , films.ID_Films , categorie.ID_Categorie
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
    $requeteListGenre = $pdo->query("SELECT ID_Categorie, Libelle_Film_Categorie FROM categorie");
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
    	"SELECT Titre_Film , Nom_Acteur , Prenom_Acteur , RoleJouer_Acteur ,acteurs.ID_Acteur
		FROM jouer
		INNER JOIN films ON jouer.ID_Films = films.ID_Films
		INNER JOIN role ON jouer.ID_Role = role.ID_Role
		INNER JOIN acteurs ON jouer.ID_Acteur = acteurs.ID_Acteur
		WHERE role.ID_Role = :id");
    $reqListesGenres->execute(['id' => $id]);
    $filmographieRole = $reqListesGenres->fetchAll(); 
    require "view/role/detailRole.php";
}


//LISTE ROLE
public function listRole() {
    $pdo = Connect::seConnecter();
    $requeteListRole = $pdo->prepare("SELECT ID_Role, RoleJouer_Acteur FROM Role");
    $requeteListRole->execute(); 
    $listRole = $requeteListRole->fetchAll(); 
    require "view/role/listRole.php";
}


//AJOUT FILM
public function AjoutFilm() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();

         $TitreFilm = filter_input(INPUT_POST, 'Titre_Film') ?? ''; 
        $AnneeSortieFilm = filter_input(INPUT_POST, 'AnneeSortieFilm') ?? '';
        $DureeFilm = filter_input(INPUT_POST, 'DureeFilm') ?? '';
        $ResumeFilm = filter_input(INPUT_POST, 'Resume_Film') ?? ''; 
        $NoteFilm = filter_input(INPUT_POST, 'Note_Film') ?? ''; 
        $AfficheFilm = filter_input(INPUT_POST, 'Affiche_Film') ?? ''; 
        $ID_Realisateur = filter_input(INPUT_POST, 'ID_Realisateur') ?? '';

        $reqAjoutFilm = $pdo->prepare("INSERT INTO films 
            (Titre_Film, AnneeSortieFilm, DureeFilm, Resume_Film, 
            Note_Film, Affiche_Film, ID_Realisateur)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

        $reqAjoutFilm->execute([
            $TitreFilm, $AnneeSortieFilm,$DureeFilm,$ResumeFilm, 
            $NoteFilm, $AfficheFilm, $ID_Realisateur
        ]);
        echo "Film ajouté avec succès !";
    } 
    require "view/film/FormFilm.php";
}


//AJOUT ACTEUR
public function AjoutActeur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();

        $NomActeur = filter_input(INPUT_POST, 'Nom_Acteur') ?? ''; 
        $PrenomActeur = filter_input(INPUT_POST, 'Prenom_Acteur') ?? '';
        $SexeActeur = filter_input(INPUT_POST, 'Sexe_Acteur') ?? '';
        $DateNaissanceActeur = filter_input(INPUT_POST,'DateNaissance_Acteur') ?? '';

        $reqAjoutActeur = $pdo->prepare("INSERT INTO acteurs 
            (Nom_Acteur, Prenom_Acteur, Sexe_Acteur, DateNaissance_Acteur)
        VALUES (?, ?, ?, ?)");

        $reqAjoutActeur->execute([$NomActeur, $PrenomActeur,$SexeActeur,$DateNaissanceActeur]);
        echo "Acteur ajouté avec succès !";
    } 
    require "view/acteur/FormActeur.php"; 
}



//AJOUT REALISATEUR
public function AjoutRealisateur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NomRealisateur = filter_input(INPUT_POST, 'Nom_Realisateur') ?? ''; 
        $PrenomRealisateur = filter_input(INPUT_POST, 'Prenom_Realisateur') ?? '';
        $SexeRealisateur = filter_input(INPUT_POST, 'Sexe_Realisateur') ?? '';
        $DateNaissanceRealisateur = filter_input(INPUT_POST, 'DateNaissance_Realisateur') ?? ''; 
       

        $reqAjoutRealisateur = $pdo->prepare("INSERT INTO Realisateur 
            (Nom_Realisateur, Prenom_Realisateur, Sexe_Realisateur, DateNaissance_Realisateur)
        VALUES (?, ?, ?, ?)");

        $reqAjoutRealisateur->execute([$NomRealisateur, $PrenomRealisateur,$SexeRealisateur,
            $DateNaissanceRealisateur]);
        echo "Realisateur ajouté avec succès !";
    }
    require "view/realisateur/FormRealisateur.php"; 
}


//AJOUT ROLE
public function AjoutRole() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NouveauRole = filter_input(INPUT_POST, 'RoleJouer_Acteur') ?? '';
       
        $reqAjoutRole = $pdo->prepare("INSERT INTO role(RoleJouer_Acteur)VALUES (?)");
        $reqAjoutRole->execute([$NouveauRole]);
        echo "Role ajouté avec succès !";
    } 
    require "view/role/FormRole.php"; 
}


//AJOUT GENRE
public function AjoutGenre() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NouveauGenre = filter_input(INPUT_POST, 'Libelle_Film_Categorie') ?? '';   
       
        $reqAjoutGenre = $pdo->prepare(
            "INSERT INTO categorie(Libelle_Film_Categorie)VALUES (?)");
        $reqAjoutGenre->execute([$NouveauGenre]);
        echo "Genre ajouté avec succès !";
    } 
    require "view/genre/FormGenre.php"; 
}





















}





?>