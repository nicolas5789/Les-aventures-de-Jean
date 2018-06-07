<?php
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

//conditions pour création de profil
$pseudo = $_POST["pseudo"];
$req_checkpseudo = $bdd->query("SELECT pseudo FROM membres WHERE pseudo = '$pseudo'"); //recherche la présence d'un pseudo dans la bdd
$comptage_pseudo= $req_checkpseudo->fetchAll(); 
$result_pseudo = count($comptage_pseudo); // affiche le nb de correspondance

$email = $_POST["email"];
$req_email = $bdd->query("SELECT email FROM membres WHERE email = '$email'"); //recherche la présence d'un email dans la bdd
$comptage_email= $req_email->fetchAll(); 
$result_email = count($comptage_email); // affiche le nb de correspondance

$pass = $_POST["pass"];
$pass_check = $_POST["pass_check"];
// A CORRIGER : VOIR POUR HASH PASSWORD

$req_addMembre = $bdd->prepare("INSERT INTO membres (pseudo, pass, email) VALUES (?, ?, ?)");//prépa req ajout membre

if($result_pseudo == 0 && $result_email == 0)
{
	if($pass == $pass_check)
	{
		$req_addMembre->execute(array($_POST["pseudo"], $_POST["pass"], $_POST["email"]));
		header("Location: connexion.php");
	} else
	{
		echo "Mot de passe et confirmation non identique"; //CREER RETOUR D'INFO SUR FORMULAIRE
	}
} else
{
	echo "Pseudo ou Email déjà utilisé"; //CREER RETOUR D'INFO SUR FORMULAIRE
}
