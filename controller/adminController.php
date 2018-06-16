<?php

function newPost($auteur, $contenu) //permet d'ajouter un billet
{
	$postManager = new PostManager();

	$sendPost = $postManger->setPost($auteur, $contenu);

	header("Location: index.php?action=admin");
}

function admin()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$posts = $postManager->getPosts(); //permet d'obtenir les billets(posts)
	$reportedComments = $commentManager->getReportedCom(); //permet d'obtenir les com signalés

	require("view/admin.php");
}