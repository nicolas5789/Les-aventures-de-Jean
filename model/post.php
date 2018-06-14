<?php

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

//ajout d'un billet 
function setPost($auteur, $contenu)
{
	$bdd = bddConnect();
	$addPost = $bdd->prepare("INSERT INTO billets(auteur, date_creation, contenu) VALUES(?, NOW(), ?)");
	$sendPost = $addPost->execute(array($auteur, $contenu));

	return $sendPost; 
}