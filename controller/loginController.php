<?php

function access($pseudo, $pass)
{
	$checkId = new CheckId();

	$passwordBddPseudo = $checkId->getPassword($pseudo);

	if(password_verify($pass, $passwordBddPseudo))
	{
		session_start();
		$_SESSION["access"] = "ok";
		header("Location: index.php?action=admin");
	} else
	{
		session_start();
		$_SESSION["erreur"] = "Pseudo ou mot de passe incorrect";
		header("Location: index.php?action=checkId"); //renvoi vers index mais sans paramètre 
	}
	
}