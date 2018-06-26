<?php
session_start();
/*
if(isset($_POST["formConnexion"]))
{
	
	$pseudo = $_POST["pseudo"];
	$pass = $_POST["pass"];

	$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root");
	$req_password = $bdd->query("SELECT pass FROM membres WHERE pseudo='$pseudo'"); 
	$passwordBdd = $req_password->fetch();

	$passwordBddPseudo = $passwordBdd["pass"];

	if (password_verify($_POST["pass"], $passwordBddPseudo))
	{
		$_SESSION["access"] = "ok"; 
		//header("Location: ../index.php?action=admin");
		echo "pass verify ok";
	} else 
	{
		$erreur = "Mot de passe ou pseudo incorrect";
	}
} 

if (isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{
	echo "isset session ok";
	//header("Location: ../index.php?action=admin");
}	
*/


if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{
	header("Location: ../index.php?action=admin");
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>
	<div id="connexion_form">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form method="POST" action="../index.php?action=checkId">
				<p>
					<label for="pseudo"> Pseudo </label> : <input type="text" name="pseudo" id="pseudo" required> <br/>	
					<label for="pass"> Mot de passe </label> : <input type="password" name="pass" id="pass" required> <br/>
					<input type="submit" value="Envoyer" name="formConnexion" />	
				</p>
				<p>
					<?php if(isset($_SESSION["erreur"])) 
					{
						echo $_SESSION["erreur"];
					}
					?>	
				</p>
			</form>
		</div>
	</div>

</body>
</html>