<?php

require("model.php"); //appel de model

function check_access() //fonction pour page de connexion
{
	
	require("connexion.php"); //affiche le page de connexion et récupère le formulaire
	$mdp = access(); //obtient le mot de passe lié au pseudo
	require("connexion_post.php"); //envoi vers blog si mdp et pseudo ok
	
}

function listPosts()
{
	$posts = getPosts(); //permet d'obtenir les billets(posts)

	require("blog.php"); //lance la page affichant les billets
}

function post()
{
	$post = getPost($_GET["id"]); //obtient un post précis
	$comments = getComments($_GET["id"]); // obtient les com d'un post selon son id
	
	require("postView.php"); //affiche un post avec ses comments
}




