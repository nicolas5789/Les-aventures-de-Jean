<?php
//obtention des billets
function getPosts() 
{ 
	$bdd = bddConnect();
	$posts = $bdd->query("SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5");

	return $posts;
}

function getPost($postId)
{

	$bdd = bddConnect();
	$req = $bdd->prepare("SELECT * FROM billets WHERE id= ?");
	$req->execute(array($postId));
	$post = $req->fetch();

	return $post;
}

function getComments($postId)
{
	$bdd = bddConnect();
	$comments = $bdd->prepare("SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
	$comments->execute(array($postId));

	return $comments;
}

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
