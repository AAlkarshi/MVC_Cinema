<?php

namespace Model;

abstract class Connect {
	const HOST = "localhost";
	const DB = "cinema";
	const USER = "root";
	const PASS = "";

// Static sont des méthodes qui sont faites pour agir sur une classe et non sur un objet. 
// l'extension MySQLi ne va fonctionner qu'avec les BDD MySQL tandis que PDO va fonctionner avec 12 systèmes de BDD différents.
	public static function seConnecter(){
		try {
    		return new \PDO (
    			"mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", 
    			self::USER, self::PASS);
		} catch (\PDOException $ex) {
    		return $ex->getMessage();
		}
	}
}



?>