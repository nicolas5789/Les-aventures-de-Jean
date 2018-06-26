<?php

class CheckId extends Manager
{
	//vérification du mot de passe
	public function getPassword($pseudo) 
	{

		$bdd = $this->bddConnect();
		$req_password = $bdd->query("SELECT pass FROM membres WHERE pseudo='$pseudo'"); 
		$passwordBdd = $req_password->fetch();

		$passwordBddPseudo = $passwordBdd["pass"];

		return $passwordBddPseudo;
	}

}