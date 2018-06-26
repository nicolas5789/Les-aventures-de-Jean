<?php

//plusieurs autres model déjà appelé dans controller.php
require("model/connexion.php");

function deleteCom()
{
	$commentManager = new CommentManager();

	$req_deleteCom = $commentManager->deleteCom($_GET["id"]);

	header("Location: index.php?action=admin");
}

function deletePost() // supprime un billet slon son id de la bdd
{
	$postManager = new PostManager();

	$req_deletePost = $postManager->deletePost($_GET["id"]);

	header("Location: index.php?action=admin");
}

function changePost() //envoi le billet modifié à la bdd
{
	$postManager = new PostManager();

	$sendPost = $postManager->changePost($_POST["auteur"], $_POST["contenu"], $_GET["id"]);

	header("Location: index.php?action=admin");
}

function editPost() //obtient billet dans zone de modification
{
	$postManger = new PostManager();

	$post = $postManger->getPost($_GET["id"]);

	require("view/editPost.php"); 
}

function newPost($auteur, $contenu) //permet d'ajouter un billet
{
	$postManager = new PostManager();

	$sendPost = $postManager->setPost($auteur, $contenu);

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
/*
function pass($pseudo)
{
	
	$checkId = new CheckId();
	$passwordBddPseudo = $checkId->pass($pseudo);

	require("view/connexion.php");
}
*/
/*
function access()
{
	$checkId = new CheckId();

	$passwordBddPseudo = $checkId->controlAccess();

	$result = $checkId->controlAccess();

	require("view/connexion.php");
	
	if ($result == "access granted") 
	{
		header("Location: index.php?action=admin");
	} else 
	{
		header("Location: index.php?action=formAccess"); //VOIR COMMENT AJOUTER MESSAGE MDP INCORRECT
	}
	
}
*/