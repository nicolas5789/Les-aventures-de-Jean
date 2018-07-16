<?php

class Database 
{
	//connexion à la bdd
	protected function bddConnect()
	{
		try
		{
			$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root"); //LOCAL
			//$bdd = new PDO("mysql:host=localhost;dbname=sailqbhx_blogdejeansql;charset=utf8", "sailqbhx_nico", "concorde2018"); //EN LIGNE
			return $bdd;
		}
		//affichage si erreur
		catch(Exception $e)
		{
			die("Erreur : " . $e->getMessages());
		}
	}
}