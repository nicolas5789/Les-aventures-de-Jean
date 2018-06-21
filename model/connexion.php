<?php

class CheckId
{
	//vérification du mot de passe
	public function controlAccess()
	{
		$pseudo = $_POST["pseudo"];
		$pass = $_POST["pass"];

		$bdd = $this->bddConnect();
		$req_password = $bdd->query("SELECT pass FROM membres WHERE pseudo='$pseudo'"); 
		$passwordBdd = $req_password->fetch();

		$passwordBddPseudo = $passwordBdd["pass"];

		$result = "access denied";
		if (password_verify($pass, $passwordBddPseudo)) 
		{
			$result = "access granted";
		} else {
			$result = "access denied";
		}
		return $result;
	}

	private function bddConnect()
	{
		try
		{
			$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root");
			return $bdd;
		}
		//affichage si erreur
		catch(Exception $e)
		{
			die("Erreur : " . $e->getMessages());
		}
	}
}