<?php

namespace Controller;
use Model\Connect;


class CinemaController {

	// Affiche ID FILM , TITRE ET DATE DE SORTIE
	public function listFilms() {
		//CONNEXIONA LA BDD
		$pdo = Connect::seConnecter();

		//REQUETE LISTE LES FILMS
		$requete =$pdo->query("SELECT ID_Films, Titre_Film, AnneeSortieFilm from films ");
		
		require "view/listFilms.php";
	}

	
	public function detActeur($id) {
	$pdo = Connect::seConnecter();
	$requete = $pdo->prepare("SELECT * FROM acteurs WHERE ID_Acteur = :id");
	$requete->execute(["id" => $id]);
	require "view/acteur/detailActeur.php";
}


	public function detailFilm($id) {
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
    	SELECT films.ID_Films, films.Titre_Film, 
        films.AnneeSortieFilm, films.DureeFilm,films.Note_Film, films.Resume_Film,
        realisateur.Nom_Realisateur, realisateur.Prenom_Realisateur, 
        categorie.Libelle_Film_Categorie
        FROM films
        INNER JOIN realisateur ON films.ID_Realisateur = realisateur.ID_Realisateur
        LEFT JOIN posseder ON films.ID_Films = posseder.ID_Films
        LEFT JOIN categorie ON posseder.ID_Categorie = categorie.ID_Categorie
        WHERE films.ID_Films = :id"); 
    $requete->execute(['id' => $id]); 

    require "view/Film/detailFilm.php";
}


}

?>