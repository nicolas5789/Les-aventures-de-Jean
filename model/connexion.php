<?php

class CheckId extends Manager
{
	//vérification du mot de passe
	public function controlAccess() // FONCTION EN PRIVATE ? 
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
		return $result;	//retourne une valeur en fonction de la validité du mdp
	}

}