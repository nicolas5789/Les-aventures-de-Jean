<?php
require("controller.php"); //appel du controleur

if(isset($_GET["action"])) // si dans l'url index une action est présente alors affichage d'un post précis avec ses com
{
	if(isset($_GET["id"]) && $_GET["id"] > 0) 
	{
		post(); //lance post() si un id est dans l'url
	} else 
	{
		echo "Erreur: aucun identifiant de billet transmis";
	}
} else
{
	listPosts(); // si accès direct à index sans url spécial affichage de tous les posts
}