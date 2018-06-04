<?php

require("model.php"); //appel de model

function listPosts()
{
	$posts = getPosts(); //défini la var $post en faisant appel à une fonction

	require("blog.php"); //lance la page contenant les billets
}

function post()
{
	$post = getPost($_GET["id"]);
	$comments = getComments($_GET["id"]);
	
	require("postView.php");
}

//essayer de faire une fonction pour gestion accès
/*
function access()
{
	//definir une fonction dans model
}
*/