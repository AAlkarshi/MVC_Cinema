<?php

namespace Controller;
use Model\Connect;

class RealisateurController {
    
    
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




}



?>