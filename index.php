<?php
require("controller.php");

if(isset($_GET["action"]))
{
	if(isset($_GET["id"]) && $_GET["id"] > 0) 
	{
		post();
	} else 
	{
		echo "Erreur: aucun identifiant de billet transmis";
	}
} else
{
	listPosts();
}