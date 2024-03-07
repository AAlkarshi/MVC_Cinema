<?php

namespace Controller;
use Model\Connect;

class ActeurController {
    
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


}



?>