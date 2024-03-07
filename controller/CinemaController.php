<?php

namespace Controller;
use Model\Connect;

class CinemaController {
	// Affiche ID FILM , TITRE ET DATE DE SORTIE
	public function listFilms() {
		//CONNEXION A LA BDD
		$pdo = Connect::seConnecter();
		$requete =$pdo->query("SELECT ID_Films, Titre_Film, AnneeSortieFilm AS AnneeSortieFilmOrdre
        FROM films
        ORDER BY AnneeSortieFilmOrdre DESC");
		require "view/film/listFilms.php";
	}







    //SUPPRESSION D'UN FILM
public function DeleteFilm($id) {
    $pdo = Connect::seConnecter();
    $requetedeletefilm = $pdo->prepare("DELETE FROM films WHERE ID_films = :id");
    $requetedeletefilm->execute(['id' => $id]);
    header('Location: index.php?action=listFilms');
    exit();
}



    //MISE A JOUR D'UN FILM
public function UpdateFilm($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $titreFilm = $_POST['Titre_Film'];
        $anneeSortieFilm = $_POST['AnneeSortieFilm'];
        $dureeFilm = $_POST['DureeFilm'];
        $resumeFilm = $_POST['Resume_Film'];
        $noteFilm = $_POST['Note_Film'];
        $afficheFilm = $_POST['Affiche_Film'];
        $idRealisateur = $_POST['ID_Realisateur'];

        
        $pdo = Connect::seConnecter();

        $requeteUpdateFilm = $pdo->prepare("UPDATE films SET 
            Titre_Film = :Titre_Film,
            AnneeSortieFilm = :AnneeSortieFilm,
            DureeFilm = :DureeFilm,
            Resume_Film = :Resume_Film,
            Note_Film = :Note_Film,
            Affiche_Film = :Affiche_Film,
            ID_Realisateur = :ID_Realisateur
            WHERE ID_Films = :id");

        // Exécution requête
        $requeteUpdateFilm->execute([
            'Titre_Film' => $titreFilm,
            'AnneeSortieFilm' => $anneeSortieFilm,
            'DureeFilm' => $dureeFilm,
            'Resume_Film' => $resumeFilm,
            'Note_Film' => $noteFilm,
            'Affiche_Film' => $afficheFilm,
            'ID_Realisateur' => $idRealisateur,
            'id' => $id
        ]);
        echo "Le film a bien été mis à jour.";;
    } else {
        require "view/film/UpdateFilm.php";
    }
}

    













// DETAIL FILM 
//Recupere TT les INFOS FILMS et REALISATEUR 
	public function detailFilm($id) {
    $pdo = Connect::seConnecter();
    $requeteFilm = $pdo->prepare("SELECT films.ID_Films, films.Titre_Film, 
    films.AnneeSortieFilm, films.DureeFilm,films.Note_Film, films.Resume_Film, films.Affiche_Film,
    realisateur.Nom_Realisateur, realisateur.Prenom_Realisateur
    FROM films
    INNER JOIN realisateur ON films.ID_Realisateur = realisateur.ID_Realisateur
    WHERE films.ID_Films = :id"); 
    $requeteFilm->execute(['id' => $id]);

    //fetch mettre en tableau que la première réponse à la requête
    $reqDetailFilm = $requeteFilm->fetch();

   
    $castingFilm = $pdo->prepare(
		"SELECT acteurs.Nom_Acteur , acteurs.Prenom_Acteur,
        role.RoleJouer_Acteur,
        categorie.Libelle_Film_Categorie
        FROM films
        INNER JOIN jouer ON films.ID_Films = jouer.ID_Films
        INNER JOIN role ON jouer.ID_Role = role.ID_Role
        INNER JOIN acteurs ON jouer.ID_Acteur = acteurs.ID_Acteur

        /* LEFT JOIN liste tt les éléments de la table de gauche */
        LEFT JOIN posseder ON films.ID_Films = posseder.ID_Films
        LEFT JOIN categorie ON posseder.ID_Categorie = categorie.ID_Categorie
        WHERE films.ID_Films = :id");

    $castingFilm->execute(['id' => $id]);
    // fetchAll  met la totalité des réponses

    $filmographieFilm = $castingFilm->fetchAll();
    require "view/film/detailFilm.php";
    //require va charger un fichier php. Si fichier n'existe pas une erreur sera affiché
    //include charge un fichier php. Si il existe pas,aucune erreur ne sera levée
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




    //MISE A JOUR D'UN FILM
    public function UpdateGenre($id) {
		$pdo = Connect::seConnecter();
		$requeteupdateGenre =$pdo->prepare("UPDATE categorie SET 
        ID_Categorie = '?',
        Libelle_Film_Categorie = '?'
        WHERE ID_Categorie = :id");
        //var_dump($requeteupdateGenre);
           $requeteupdateGenre->execute(['id' => $id]);
           
           $reqUpdate = $requetedeletefilm->fetch();
		require "view/film/UpdateFilm.php";
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



// TOUT LES AJOUTS

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