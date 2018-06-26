<?php

class CheckId extends Manager
{
	//vérification du mot de passe
	public function controlAccess() // FONCTION EN PRIVATE ? 
	{
		//session_start();
		$pseudo = $_POST["pseudo"];
		$pass = $_POST["pass"];

		$bdd = $this->bddConnect();
		$req_password = $bdd->query("SELECT pass FROM membres WHERE pseudo='$pseudo'"); 
		$passwordBdd = $req_password->fetch();

		$passwordBddPseudo = $passwordBdd["pass"];

		$result = " ";
		if (password_verify($pass, $passwordBddPseudo)) 
		{
			$result = "ok";
			//$_SESSION["access"] = "ok";
		} else {
			$result = "no";
		}
		return $result;	//retourne une valeur en fonction de la validité du mdp
	}

}


/*
class CheckId extends Manager
{
	public function pass($pseudo)
	{
		$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root");
		$req_password = $bdd->query("SELECT pass FROM membres WHERE pseudo='$pseudo'"); 
		$passwordBdd = $req_password->fetch();

		$passwordBddPseudo = $passwordBdd["pass"];

		return $passwordBddPseudo;
	}
}
*/