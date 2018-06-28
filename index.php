<?php
session_start();
//index.php fait office de routeur

require("controller/controller.php"); //appel des controleurs
require("controller/adminController.php");
require("controller/loginController.php");

if (isset($_GET["action"])) // si dans l'url index une action est précisée
{
	if ($_GET["action"] == "post") //affichage d'un billet précis
	{ 
		if (isset($_GET["id"]) && $_GET["id"] > 0) 
		{
			post();
		} else {
			echo "Erreur : aucun id de billet transmis";
		}
	} 

	elseif ($_GET["action"] == "addComment") //ajoute un commentaire
	{ 
		newComments($_GET["id"], $_POST["auteur"], $_POST["contenu"]);
	} 

	elseif ($_GET["action"] == "admin") //affiche la page admin avec billets et signalements 
	{ 
		admin(); 
	} 

	elseif ($_GET["action"] == "addPost") //ajoute un billet
	{ 
		if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
		{
			newPost($_POST["auteur"], $_POST["contenu"]);
		} else 
		{
			header("Location: index.php");
		}
	} 

	elseif ($_GET["action"] == "signal") //ajoute un signalement
	{ 
		if(isset($_GET["id"])&& $_GET["id"] > 0)
		{
			if (isset($_GET["postId"]) && $_GET["postId"] > 0)
			{
				newSignal();
			}
			else 
			{
				echo "Aucun id de billet transmis";
			}
		}
	} 

	elseif ($_GET["action"] == "formAccess") //ouvre la page de connexion
	{ 
		header("Location: view/connexion.php");
	} 

	elseif ($_GET["action"] == "checkId") //controle id et mdp pour accès
	{
		if(isset($_POST["pseudo"]) && isset($_POST["pass"]))
		{ 
			access($_POST["pseudo"], $_POST["pass"]);
		} else 
		{
			header("Location: view/connexion.php");
		}
	} 

	elseif ($_GET["action"] == "editPost") //ouvre la page pour éditer un billet
	{ 
		if (isset($_GET["id"]) && $_GET["id"] > 0) 
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				editPost();
			} else 
			{
				header("Location: index.php");
			}
		} else 
		{
			echo "Aucun Id de billet transmis";
		}
	} 

	elseif ($_GET["action"] == "changePost") //envoi le billet modifié à la bdd
	{ 
		if (isset($_GET["id"]) && $_GET["id"] > 0) 
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				changePost();
			} else
			{
				header("Location: index.php");
			}
		} else {
			echo "Aucun Id de billet transmis";
		}
	} 

	elseif ($_GET["action"] == "deletePost") //supprime un billet de la bdd
	{ 
		if (isset($_GET["id"]) && $_GET["id"] > 0) 
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				deletePost();
			} else
			{
				header("Location: index.php");
			}
		} else 
		{
			echo "Aucun Id de billet transmis";
		}
	} 

	elseif ($_GET["action"] == "deleteCom") //supprime un commentaire de la bdd
	{
		if (isset($_GET["id"]) && $_GET["id"] > 0) 
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				deleteCom();
			} else 
			{
				header("Location: index.php");
			}
		} else 
		{
			echo "Aucun Id de commentaire transmis";
		}
	}

	elseif ($_GET["action"] == "disconnect") //renvoi vers la page d'accueil et ferme session
	{
		session_destroy();
		header("Location: index.php");
	}

} else 
{
	listPosts(); //affiche la page d'accueil simple avec les billets
}