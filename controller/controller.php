<?php

//appel des model
require("model/dbAccess.php");
require("model/post.php");
require("model/comment.php");

function listPosts()
{
	$posts = getPosts(); //permet d'obtenir les billets(posts)

	require("view/blog.php"); //lance la page affichant les billets
}

function post()
{
	$post = getPost($_GET["id"]); //obtient un post précis
	$comments = getComments($_GET["id"]); // obtient les com d'un post selon son id
	
	require("view/postView.php"); //affiche un post avec ses comments
}

function newPost($auteur, $contenu)
{
	$sendPost = setPost($auteur, $contenu);

	header("Location: index.php?action=admin");
}

function newComments($id_billet, $auteur, $contenu)
{
	$sendComment = setComment($id_billet, $auteur, $contenu);

	header("Location: index.php?action=post&id=".$id_billet);
}

function admin()
{
	$posts = getPosts(); //permet d'obtenir les billets(posts)

	$reportedComments = getReportedCom(); //permet d'obtenir les com signalés

	require("view/admin.php");
}

function newSignal()
{
	$signal = setSignal($_GET["id"]);

	header("Location: index.php");

}

