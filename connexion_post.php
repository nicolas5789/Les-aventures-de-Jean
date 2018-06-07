<?php
/*
//connexion à la bdd CREER DIRECTEMENT EN FONCTION
try
{
	$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root");
}
//affichage si erreur
catch(Exception $e)
{
	die("Erreur : " . $e->getMessages());
}
*/

$pseudo = $_POST["pseudo"];
$pass = $_POST["pass"];
/*
$req_mdp = $bdd->query("SELECT pass AS passControl FROM membres WHERE pseudo = '$pseudo'"); //recupère le mdp du profil
$mdp = $req_mdp->fetch();
//echo $mdp["passControl"];
*/
//vérification mdp
if ($mdp["passControl"] == $pass) // TROUVER POUR RENVOI INFO VERS CONNEXION.PHP
{
	header("Location: blog.php");
} else
{
	echo "Pseudo ou mot de passe incorrect";
}
