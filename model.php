<?php

//vérification mdp du pseudo
function access()
{
	$bdd = bddConnect();
	//$pseudo = $_POST["pseudo"];
	//$pass = $_POST["pass"];
	$req_mdp = $bdd->query("SELECT pass AS passControl FROM membres WHERE pseudo = '$pseudo'"); //recupère le mdp du profil
	$mdp = $req_mdp->fetch();

	return $mdp;
}




//obtention des billets
function getPosts() 
{ 
	$bdd = bddConnect();
	$posts = $bdd->query("SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5");

	return $posts;
}
//obtention d'un billet selon son id
function getPost($postId)
{

	$bdd = bddConnect();
	$req = $bdd->prepare("SELECT * FROM billets WHERE id= ?");
	$req->execute(array($postId));
	$post = $req->fetch();

	return $post;
}
//obtention des commentaires
function getComments($postId)
{
	$bdd = bddConnect();
	$comments = $bdd->prepare("SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
	$comments->execute(array($postId));

	return $comments;
}
//connexion à la bdd
function bddConnect()
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
