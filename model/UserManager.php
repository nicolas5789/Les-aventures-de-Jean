<?php

//class GetPass extends Database
class UserManager extends Database

{
	public function getUser($userToCheck)
	{
		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT id, pseudo, email, pass FROM membres WHERE pseudo= ?");
		$req->execute(array($userToCheck->pseudo()));
		$user = $req->fetch(PDO::FETCH_ASSOC);

		if($user !== false) {
			return new User($user);
		}
	}
}