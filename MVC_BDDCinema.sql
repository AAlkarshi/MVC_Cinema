-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteurs
CREATE TABLE IF NOT EXISTS `acteurs` (
  `ID_Acteur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Acteur` varchar(50) NOT NULL,
  `Prenom_Acteur` varchar(50) NOT NULL,
  `Sexe_Acteur` varchar(5) NOT NULL,
  `DateNaissance_Acteur` date NOT NULL,
  PRIMARY KEY (`ID_Acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteurs : ~16 rows (environ)
/*!40000 ALTER TABLE `acteurs` DISABLE KEYS */;
INSERT INTO `acteurs` (`ID_Acteur`, `Nom_Acteur`, `Prenom_Acteur`, `Sexe_Acteur`, `DateNaissance_Acteur`) VALUES
	(1, 'Hanks', 'Tom', 'Homme', '1956-07-09'),
	(2, 'Bale', 'Christian', 'Homme', '1974-01-30'),
	(3, 'De Niro', 'Robert', 'Homme', '1943-08-17'),
	(4, 'DICaprio', 'Leonardo', 'Homme', '1974-11-11'),
	(5, 'Cage', 'Nicolas', 'Homme', '1964-01-07'),
	(6, 'Portman', 'Natalie', 'Femme', '1981-06-09'),
	(7, 'Watson', 'Emma', 'Femme', '1990-04-15'),
	(8, 'Roberts', 'Julia', 'Femme', '1967-10-28'),
	(9, 'De Armas', 'Ana', 'Femme', '1988-04-30'),
	(10, 'Jolie', 'Angelina', 'Femme', '1975-06-04'),
	(11, 'Sinise', 'Gary', 'Homme', '1955-03-17'),
	(12, 'Washington', 'Denzel', 'Homme', '1954-12-28'),
	(13, 'Freeman', 'Morgan', 'Homme', '1937-06-01'),
	(14, 'Murphy', 'Cillian', 'Hommz', '1976-05-25'),
	(15, 'Washington', 'John David', 'Homme', '1984-07-28'),
	(16, 'Cooper', 'Bradley', 'Homme', '1975-01-05');
/*!40000 ALTER TABLE `acteurs` ENABLE KEYS */;

-- Listage de la structure de la table cinema. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_Film_Categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.categorie : ~5 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`ID_Categorie`, `Libelle_Film_Categorie`) VALUES
	(1, 'Action'),
	(2, 'Science-Fiction'),
	(3, 'Aventure'),
	(4, 'Policier'),
	(5, 'Biopic');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table cinema. films
CREATE TABLE IF NOT EXISTS `films` (
  `ID_Films` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_Film` varchar(50) NOT NULL,
  `AnneeSortieFilm` int(11) NOT NULL,
  `DureeFilm` int(11) NOT NULL,
  `Resume_Film` varchar(255) NOT NULL,
  `Note_Film` int(11) NOT NULL,
  `Affiche_Film` varchar(255) NOT NULL,
  `ID_Realisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID_Films`),
  KEY `ID_Realisateur` (`ID_Realisateur`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`ID_Realisateur`) REFERENCES `realisateur` (`ID_Realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.films : ~19 rows (environ)
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` (`ID_Films`, `Titre_Film`, `AnneeSortieFilm`, `DureeFilm`, `Resume_Film`, `Note_Film`, `Affiche_Film`, `ID_Realisateur`) VALUES
	(1, 'ForrestGump', 1994, 142, 'Sur un banc à Savannah en Géorgie, Forrest Gump attend le bus. Il raconte sa vie à ses compagnons. \r\nSes capacités intellectuelles ne le destinaient pas à de grandes choses.\r\nAlors qu il raconte tous les grands événements de l Histoire de son pays.\r\n', 5, 'Assis sur un banc de l arrêt de bus. \r\nIl porte des chaussures de course blanches avec des chaussettes rouges visibles, \r\nun pantalon kaki, une chemise bleue et une casquette rouge,il tient une valise à côté de lui sur le banc.', 1),
	(2, 'BatmanDarkKnight', 2008, 152, 'Batman est déterminé à éradiquer le crime qui sème la terreur en ville. \r\nEpaulé par Jim Gordon et par le procureur de Gotham,Harvey Dent. \r\nLa collaboration des 3 hommes est efficace et porte ses fruits jusquà ce quun criminel vienne. \r\n', 4, 'L\'affiche de The Dark Knight montre la silhouette de Batman \r\ndevant un bâtiment en flammes formant le symbole de la chauve-souris\r\n,avec le titre en bas.', 2),
	(3, 'LesAffranchis', 1990, 146, 'Les Affranchis raconte l\'ascension et la chute d\'Henry Hill dans la mafia,\r\nexplorant la loyauté,le crime et les conséquences,dans un monde de violence et de corruption.', 4, 'L\'affiche de Les Affranchis montre Liotta, \r\nDe Niro et Pesci avec le titre au-dessus, évoquant le monde mafieux.', 3),
	(4, 'LordOfWar', 2005, 122, 'Lord of War suit Yuri Orlov, un immigré ukrainien devenu trafiquant d\'armes, \r\nexplorant les impacts de ses actes sur sa famille et le monde, \r\nà travers des thèmes de corruption, violence et morale.', 5, 'L\'affiche de Lord of War montre Nicolas Cage avec un fond composé de balles et cartouches\r\n, évoquant le thème du trafic d armes abordé dans le film.', 5),
	(5, 'TheRevenant', 2016, 156, 'Durant une expédition dans une Amérique sauvage, le trappeur Hugh Glass est attaqué par un ours et laissé pour mort par sa propre équipe. \r\nIl endure une souffrance inimaginable ainsi que la trahison de John Fitzgerald. \r\nIl doit tout faire pour survivre.', 4, 'Hugh Glass, regardant intensément vers l\'avant avec une expression déterminée et endurante, sur un fond hivernal et sauvage qui évoque les défis extrêmes auxquels il doit faire face dans le film.', 4),
	(6, 'Leon', 1994, 110, '\r\nLeon est un tueur à gages solitaire qui forme un lien avec Mathilda,\r\nune jeune fille dont la famille a été tuée par un policier corrompu.\r\nLeon prend Mathilda sous son aile pour l aider à chercher vengeance.', 5, 'L\'affiche de Leon montre les 2 acteurs côte à côte,\r\nevoquant la relation entre un tueur à gages et sa jeune protégée, \r\ndans un décor urbain sombre,\r\nsoulignant le thème du thriller et de la protection.', 6),
	(7, 'HarryPotteretlaCoupedeFeu', 2005, 157, 'Harry Potter et la Coupe de Feu,\r\nHarry est sélectionné pour le Tournoi des Trois Sorciers à Poudlard.\r\nIl affronte des défis mortels,\r\ntandis que le retour de Voldemort menace le monde des sorciers.', 5, 'Harry Potter et la Coupe de Feu montre Harry entouré d\'éléments du Tournoi des 3 Sorciers.', 7),
	(8, 'OceanEleven', 2001, 116, 'Danny Ocean et son équipe planifient un audacieux cambriolage de 3 casinos à Las Vegas en une seule nuit.', 3, '\r\nL affiche de Ocean s Eleven présente généralement le casting principal dans un style sophistiqué et élégant,\r\nreflétant le thème du cambriolage chic et de l esprit d équipe du film', 8),
	(9, 'WarDogs', 2016, 114, 'War Dogs suit l histoire vraie de 2 amis qui deviennent des marchands d armes pour le gouvernement américain,\r\nmais leur incompétence et leur cupidité les entraînent dans des situations de plus en plus dangereuses.', 5, '\r\nL affiche montre les 2 personnages principaux avec des éléments évoquant le commerce d armes et un ton à la fois sombre et comique,\r\nreflétant l ambiguïté morale et l humour noir du film.', 9),
	(10, 'BoneCollector', 1999, 118, 'The Bone Collector suit un quadriplégique expert en médecine légale et son assistante \r\nalors qu ils tentent de résoudre une série de meurtres laissés par un tueur en série a New York,\r\nen utilisant leur intelligence et des indices.', 5, '\r\nL affiche montre  Denzel Washington et Angelina Jolie en avant-plan,\r\navec des éléments visuels sombres et mystérieux qui évoquent le thriller policier \r\net la chasse à un tueur en série.', 10),
	(11, 'Lucy', 2014, 90, 'Lucy est l\'histoire d\'une femme qui gagne des pouvoirs surhumains après l exposition à une drogue,\r\nmenant à une quête de vengeance et de découverte sur les capacités du cerveau humain.', 3, 'L affiche de Lucy montre avec un regard intense, évoquant mystère et futurisme.\r\nDes motifs rappelant le cerveau et la SF suggèrent ses pouvoirs surhumains', 6),
	(12, 'Oppenheimer', 2023, 180, 'Oppenheimer ,le physicien américain surnommé le père de la bombe atomique. \r\nLe film explore sa contribution au Projet Manhattan, \r\nle développement de la bombe nucléaire pendant la 2eme Guerre mondiale, \r\net ses répercussions personnelles et historiques.', 4, 'L\'affiche Oppenheimer pourrait présenter un portrait dramatique de l\'acteur principal en tant qu Oppenheimer,\r\navec des éléments évoquant la 2eme Guerre mondiale et la physique nucléaire,\r\nsous un titre proéminent.', 2),
	(13, 'Tenet', 2020, 150, 'Tenet suit un agent secret qui manipule le flux du temps pour prévenir une 3ème Guerre mondiale..', 4, 'L affiche de Tenet met en avant le protagoniste avec des éléments visuels \r\névoquant le temps inversé, dans des tons sombres et mystérieux,\r\naccentués par le titre proéminent.,\r\nsous un titre proéminent.', 2),
	(14, 'LeLoupDeWallStreet', 2013, 179, 'L\'ascension et la chute d\'un courtier ambitieux,\r\nmarquées par la corruption dans le monde financier des années 90', 5, 'Leonardo DiCaprio entouré de luxe, évoquant richesse et excès.', 3),
	(15, 'VeryBadTrip', 2009, 140, '4 amis à Vegas pour un enterrement de vie de garçon se réveillent sans souvenir de la nuit précédente,\r\ncherchant à retrouver le marié disparu', 5, 'Quatre hommes devant les lumières de Vegas, expression de confusion et désarroi.', 9),
	(18, 'Flight', 2012, 138, 'Un pilote sauve son vol d\'un désastre,\r\nmais son héroïsme est remis en question à cause de son addiction.', 3, 'Denzel Washington en uniforme de pilote,avion en arrière-plan,ton sérieux et dramatique.', 1),
	(19, 'LeTerminal', 2004, 128, 'Un homme se retrouve bloqué dans un aéroport new-yorkais\r\nquand son pays est effacé de la carte, le rendant apatride.', 4, 'Tom Hanks devant un tableau d\'affichage des vols,\r\névoquant une ambiance d attente et d isolement dans un aéroport.', 5),
	(20, 'Joker', 2019, 122, 'Joker,ennemi emblématique de Batman.Joaquin Phoenix incarne Arthur Fleck,\r\nun comédien raté qui se transforme en un criminel anarchiste à Gotham City \r\naprès avoir été rejeté et maltraité par la société.', 4, 'Joaquin Phoenix en Joker,\r\nmaquillage complet, \r\navec un sourire forcé et une ambiance sombre et inquiétante,\r\nreflétant la descente du personnage dans la folie..', 9),
	(21, 'SeulAuMonde', 2000, 143, 'un employé de FedEx qui survit à un crash d\'avion et se retrouve échoué sur une île déserte. Le film explore sa lutte pour survivre et maintenir sa santé mentale, avec pour seul compagnon un ballon de volley nommé Wilson.', 5, 'L\'affiche du film montre Tom Hanks regardant l\'océan depuis l\'île, soulignant son isolement. Les couleurs captent la beauté naturelle de l\'environnement et l\'immensité de l\'océan, reflétant le thème de la survie en solitaire.', 1);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;

-- Listage de la structure de la table cinema. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `ID_Films` int(11) NOT NULL,
  `ID_Acteur` int(11) NOT NULL,
  `ID_Role` int(11) NOT NULL,
  PRIMARY KEY (`ID_Films`,`ID_Acteur`,`ID_Role`),
  KEY `ID_Acteur` (`ID_Acteur`),
  KEY `ID_Role` (`ID_Role`),
  CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`ID_Films`) REFERENCES `films` (`ID_Films`),
  CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`ID_Acteur`) REFERENCES `acteurs` (`ID_Acteur`),
  CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.jouer : ~20 rows (environ)
/*!40000 ALTER TABLE `jouer` DISABLE KEYS */;
INSERT INTO `jouer` (`ID_Films`, `ID_Acteur`, `ID_Role`) VALUES
	(1, 1, 3),
	(19, 1, 12),
	(21, 1, 13),
	(2, 2, 5),
	(3, 3, 2),
	(20, 3, 15),
	(5, 4, 4),
	(14, 4, 17),
	(4, 5, 1),
	(6, 6, 6),
	(7, 7, 7),
	(8, 8, 8),
	(9, 9, 9),
	(10, 10, 10),
	(1, 11, 11),
	(18, 12, 18),
	(11, 13, 19),
	(12, 14, 14),
	(13, 15, 16),
	(15, 16, 20);
/*!40000 ALTER TABLE `jouer` ENABLE KEYS */;

-- Listage de la structure de la table cinema. posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `ID_Films` int(11) NOT NULL,
  `ID_Categorie` int(11) NOT NULL,
  PRIMARY KEY (`ID_Films`,`ID_Categorie`),
  KEY `ID_Categorie` (`ID_Categorie`),
  CONSTRAINT `posseder_ibfk_1` FOREIGN KEY (`ID_Films`) REFERENCES `films` (`ID_Films`),
  CONSTRAINT `posseder_ibfk_2` FOREIGN KEY (`ID_Categorie`) REFERENCES `categorie` (`ID_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.posseder : ~19 rows (environ)
/*!40000 ALTER TABLE `posseder` DISABLE KEYS */;
INSERT INTO `posseder` (`ID_Films`, `ID_Categorie`) VALUES
	(3, 1),
	(6, 1),
	(8, 1),
	(18, 1),
	(20, 1),
	(21, 1),
	(2, 2),
	(7, 2),
	(11, 2),
	(13, 2),
	(1, 3),
	(15, 3),
	(19, 3),
	(10, 4),
	(4, 5),
	(5, 5),
	(9, 5),
	(12, 5),
	(14, 5);
/*!40000 ALTER TABLE `posseder` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `ID_Realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Realisateur` varchar(50) NOT NULL,
  `Prenom_Realisateur` varchar(50) NOT NULL,
  `Sexe_Realisateur` varchar(5) NOT NULL,
  `DateNaissance_Realisateur` date NOT NULL,
  PRIMARY KEY (`ID_Realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~13 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`ID_Realisateur`, `Nom_Realisateur`, `Prenom_Realisateur`, `Sexe_Realisateur`, `DateNaissance_Realisateur`) VALUES
	(1, 'Zemeckis', 'Robert', 'Homme', '1952-05-14'),
	(2, 'Nolan', 'Christopher', 'Homme', '1970-07-30'),
	(3, 'Scorsese', 'Martin', 'Homme', '1942-11-17'),
	(4, 'González Iñárritu', 'Alejandro', 'Homme', '1963-10-15'),
	(5, 'Niccol', 'Andrew', 'Homme', '1964-06-10'),
	(6, 'Besson', 'Luc', 'Homme', '1959-03-18'),
	(7, 'Newell', 'Mike', 'Homme', '1942-03-28'),
	(8, 'Soderbergh', 'Steven', 'Homme', '1963-01-14'),
	(9, 'Phillips', 'Todd', 'Homme', '1970-12-20'),
	(10, 'Noyce', 'Phillip', 'Homme', '1950-04-29'),
	(11, 'Hanks', 'Tom', 'Homme', '1956-07-09'),
	(12, 'De Niro', 'Robert', 'Homme', '1943-08-17'),
	(13, 'Cage', 'Nicolas', 'Homme', '1964-01-07');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `ID_Role` int(11) NOT NULL AUTO_INCREMENT,
  `RoleJouer_Acteur` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~20 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`ID_Role`, `RoleJouer_Acteur`) VALUES
	(1, 'Nicolas Cage à jouer le role de Yuri Orlov, Vendeur d arme International'),
	(2, 'De Niro à jouer le role de Jimmy Conway'),
	(3, 'Tom Hanks à jouer le role de Forrest Gump'),
	(4, 'Di Caprio à jouer le role de Hugh Glass'),
	(5, 'Christian Bale à jouer le role de Batman'),
	(6, 'Natalie Portman à jouer le role de Mathilda'),
	(7, 'Emma Watson à jouer le role de Hermione'),
	(8, 'Julia Roberts à jouer le role de Tess Ocean '),
	(9, 'Ana De Armas à jouer le role de Iz'),
	(10, 'Angelina Jolie à jouer le role de Amelia Donaghy '),
	(11, 'Gary Sinise à jouer le role de Lieutenant Dan'),
	(12, 'Tom Hanks à jouer le role de Viktor Navorski'),
	(13, 'Tom Hanks à jouer le role de Chuck Noland'),
	(14, 'Cillian Murphy à jouer le role de Robert Oppenheimer'),
	(15, 'Robert De Niro à jouer le Role de Murray Franklin'),
	(16, 'John David Washington à jouer le rôle de Tenet'),
	(17, 'Di Caprio à jouer le Role de Jordan Belfort'),
	(18, 'Denzel washington à jouer le role de Whip Whitaker'),
	(19, 'Morgan Freeman à jouer le role du Professeur Norman'),
	(20, 'Bradley Cooper à jouer le Role de Phil');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
