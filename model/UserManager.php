<?php

//class GetPass extends Database
class UserManager extends Database

{
	public function getUser($userToCheck)
	{
		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT id, pseudo, email, pass FROM membres WHERE pseudo= ?");
		$req->execute(array($userToCheck->pseudo()));
		$userOnFile = $req->fetch(PDO::FETCH_ASSOC);

		if($userOnFile !== false) {
			return new User($userOnFile);
		}
	}
}