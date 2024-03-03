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






//FORMULAIRE FILM
public function FormFilm() {
    $pdo = Connect::seConnecter();
    echo '
    <h1>Ajouter un nouveau film</h1>
    <form action="index.php?action=AjoutFilm" method="post">
        <label for="Titre_Film">Titre:</label>
        <input type="text" id="Titre_Film" name="Titre_Film" required placeholder="Taper le Nom du Film"><br>

        <label for="AnneeSortieFilm">Date de sortie:</label>
        <input type="int" id="AnneeSortieFilm" name="AnneeSortieFilm" required placeholder="Annee uniquement"><br>

        <label for="DureeFilm">Duree du film:</label>
        <input type="int" id="DureeFilm" name="DureeFilm" required placeholder="En Minutes"> <br>

        <label for="Resume_Film">Resume :</label>
        <input type="text" id="Resume_Film" name="Resume_Film" required placeholder="Ajouter un résumé"><br>

        <label for="Note_Film">Note du Film :</label>
        <input type="int" id="Note_Film" name="Note_Film" required placeholder="Note du film sur 5"><br>

        <label for="Affiche_Film">Description de affiche du film :</label>
        <input type="text" id="Affiche_Film" name="Affiche_Film" required placeholder="Ajouter une description"><br>

        <label for="ID_Realisateur">Realisateur:</label>
        <input type="int" id="ID_Realisateur" name="ID_Realisateur" required><br>

        <input type="submit" value="Ajouter le film">
    </form> ';
}

//AJOUT FILM
public function AjoutFilm() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $TitreFilm = $_POST['Titre_Film'] ?? ''; 
        $AnneeSortieFilm = $_POST['AnneeSortieFilm'] ?? '';
        $DureeFilm = $_POST['DureeFilm'] ?? '';
        $ResumeFilm = $_POST['Resume_Film'] ?? ''; 
        $NoteFilm = $_POST['Note_Film'] ?? ''; 
        $AfficheFilm = $_POST['Affiche_Film'] ?? ''; 
        $ID_Realisateur = $_POST['ID_Realisateur'] ?? '';

        $reqAjoutFilm = $pdo->prepare("INSERT INTO films 
            (Titre_Film, AnneeSortieFilm, DureeFilm, Resume_Film, Note_Film, Affiche_Film, ID_Realisateur)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

        $reqAjoutFilm->execute([
            $TitreFilm, $AnneeSortieFilm,$DureeFilm,$ResumeFilm, $NoteFilm, $AfficheFilm, $ID_Realisateur
        ]);
        
        echo "Film ajouté avec succès !";
    } else {
        echo "Non Ajouté ! Erreur dans l'ajout du film !";
    }
}



//FORMULAIRE ACTEUR
public function FormActeur() {
    $pdo = Connect::seConnecter();
    echo '
    <h1>Ajouter un nouvel Acteur</h1>
    <form action="index.php?action=AjoutActeur" method="post">
        <label for="Nom_Acteur">Nom de Acteur : </label>
        <input type="text" id="Nom_Acteur" name="Nom_Acteur" required placeholder="Taper le Nom de Acteur"><br>

        <label for="Prenom_Acteur">Prenom de Acteur:</label>
        <input type="text" id="Prenom_Acteur" name="Prenom_Acteur" required placeholder="Taper le Prenom de Acteur"><br>

        <label for="Sexe_Acteur">Genre de Acteur:</label>
        <input type="text" id="Sexe_Acteur" name="Sexe_Acteur" required placeholder="Taper le Sexe de Acteur"><br>

        <label for="DateNaissance_Acteur">Date de Naissance :</label>
        <input type="date" id="DateNaissance_Acteur" name="DateNaissance_Acteur" required><br>

        <input type="submit" value="Ajouter Acteur">
    </form> ';
}

//AJOUT ACTEUR
public function AjoutActeur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NomActeur = $_POST['Nom_Acteur'] ?? ''; 
        $PrenomActeur = $_POST['Prenom_Acteur'] ?? '';
        $SexeActeur = $_POST['Sexe_Acteur'] ?? '';
        $DateNaissanceActeur = $_POST['DateNaissance_Acteur'] ?? ''; 
       

        $reqAjoutActeur = $pdo->prepare("INSERT INTO acteurs 
            (Nom_Acteur, Prenom_Acteur, Sexe_Acteur, DateNaissance_Acteur)
        VALUES (?, ?, ?, ?)");

        $reqAjoutActeur->execute([$NomActeur, $PrenomActeur,$SexeActeur,$DateNaissanceActeur]);
        echo "Acteur ajouté avec succès !";
    } else {
        echo "Acteur NON AJOUTER ! Erreur dans l'ajout de l'acteur !";
    }
}



//FORMULAIRE REALISATEUR
public function FormRealisateur() {
    $pdo = Connect::seConnecter();
    echo '
    <h1>Ajouter un nouvel Realisateur</h1>
    <form action="index.php?action=AjoutRealisateur" method="post">
        <label for="Nom_Realisateur">Nom du Réalisateur : </label>
        <input type="text" id="Nom_Realisateur" name="Nom_Realisateur" required placeholder="Taper le nom du Réalisateur"><br>

        <label for="Prenom_Realisateur">Prenom du Réalisateur:</label>
        <input type="text" id="Prenom_Realisateur" name="Prenom_Realisateur" required placeholder="Taper le Prenom du Réalisateur"><br>

        <label for="Sexe_Realisateur">Genre du Realisateur:</label>
        <input type="text" id="Sexe_Realisateur" name="Sexe_Realisateur" required placeholder="Taper le Sexe du Realisateur"><br>

        <label for="DateNaissance_Realisateur">Date de Naissance :</label>
        <input type="date" id="DateNaissance_Realisateur" name="DateNaissance_Realisateur" required><br>

        <input type="submit" value="Ajouter Realisateur">
    </form> ';
}

//AJOUT ACTEUR
public function AjoutRealisateur() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NomRealisateur = $_POST['Nom_Realisateur'] ?? ''; 
        $PrenomRealisateur = $_POST['Prenom_Realisateur'] ?? '';
        $SexeRealisateur = $_POST['Sexe_Realisateur'] ?? '';
        $DateNaissanceRealisateur = $_POST['DateNaissance_Realisateur'] ?? ''; 
       

        $reqAjoutRealisateur = $pdo->prepare("INSERT INTO Realisateur 
            (Nom_Realisateur, Prenom_Realisateur, Sexe_Realisateur, DateNaissance_Realisateur)
        VALUES (?, ?, ?, ?)");

        $reqAjoutRealisateur->execute([$NomRealisateur, $PrenomRealisateur,$SexeRealisateur,
            $DateNaissanceRealisateur]);
        echo "Realisateur ajouté avec succès !";
    } else {
        echo "Realisateur NON AJOUTER ! Erreur dans l'ajout du Realisateur !";
    }
}







//FORMULAIRE ROLE
public function FormRole() {
    $pdo = Connect::seConnecter();
    echo '
    <h1>Ajouter un nouvel Role</h1>
    <form action="index.php?action=AjoutRole" method="post">
        <label for="RoleJouer_Acteur"> Role : </label>
        <input type="text" id="RoleJouer_Acteur" name="RoleJouer_Acteur" required placeholder="Taper le Role"><br>
        <input type="submit" value="Ajouter un nouveau Role">
    </form> ';
}

//AJOUT ACTEUR
public function AjoutRole() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NouveauRole = $_POST['RoleJouer_Acteur'] ?? '';  
       
        $reqAjoutRole = $pdo->prepare("INSERT INTO role(RoleJouer_Acteur)VALUES (?)");
        $reqAjoutRole->execute([$NouveauRole]);
        echo "Role ajouté avec succès !";
    } else {
        echo "Role NON AJOUTER ! Erreur dans l'ajout d'un Role !";
    }
}










//FORMULAIRE GENRE
public function FormGenre() {
    $pdo = Connect::seConnecter();
    echo '
    <h1>Ajouter un nouveau Genre</h1>
    <form action="index.php?action=AjoutGenre" method="post">
        <label for="Libelle_Film_Categorie"> Genre : </label>
        <input type="text" id="Libelle_Film_Categorie" name="Libelle_Film_Categorie" required placeholder="Taper le Genre"><br>
        <input type="submit" value="Ajouter un nouveau Genre">
    </form> ';
}

//AJOUT GENRE
public function AjoutGenre() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = Connect::seConnecter();
        $NouveauGenre = $_POST['Libelle_Film_Categorie'] ?? '';  
       
        $reqAjoutGenre = $pdo->prepare(
            "INSERT INTO categorie(Libelle_Film_Categorie)VALUES (?)");
        $reqAjoutGenre->execute([$NouveauGenre]);
        echo "Genre ajouté avec succès !";
    } else {
        echo "Genre NON AJOUTER ! Erreur dans l'ajout d'un Genre !";
    }
}
























}


?>