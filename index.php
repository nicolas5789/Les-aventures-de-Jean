<?php
session_start();


require("controller/FrontController.php"); //appel des controleurs
require("controller/AdminController.php");
require("controller/LoginController.php");

if(isset($_GET["action"]))
{
	$_action = $_GET["action"];
}
if(isset($_GET["id"]))
{
	$_id = $_GET["id"];
}

if (isset($_action)) 
{	
	switch ($_action)
	{
		case "post" :
			if (isset($_id) && $_id > 0) 
		{
			post();
		} else 
		{
			echo "Erreur : aucun id de billet transmis";
		}	
			break;

		case "addComment" :
		{
			newComments($_id, $_POST["auteur"], $_POST["contenu"]);
			break;
		}

		case "admin" :
		{
			admin(); 	
			break;
		}

		case "addPost" :
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				newPost($_POST["auteur"], $_POST["contenu"]);
			} else 
			{
				header("Location: index.php");
			}	
			break;
		}

		case "signal" :
		{
			if(isset($_id)&& $_id > 0)
			{
				if (isset($_GET["postId"]) && $_GET["postId"] > 0)
				{
					newSignal();
				} else 
				{
					echo "Aucun id de billet transmis";
				}
			}	
			break;
		}

		case "formAccess" :
		{
			header("Location: views/admin/adminConnexion.php");
			break;
		}

		case "checkId" :
		{
			if(isset($_POST["pseudo"]) && isset($_POST["pass"]))
			{ 
				access($_POST["pseudo"], $_POST["pass"]);
			} else 
			{
				header("Location: views/admin/adminConnexion.php");
			}	
			break;
		}

		case "editPost" :
		{
			if (isset($_id) && $_id > 0) 
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
			break;
		}

		case "changePost" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
				{
					changePost();
				} else
				{
					header("Location: index.php");
				}
			} else 
			{
				echo "Aucun Id de billet transmis";
			}
			break;
		}

		case "deletePost" :
		{
			if (isset($_id) && $_id > 0) 
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
			break;
		}

		case "deleteCom" :
		{
			if (isset($_id) && $_id > 0) 
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
			break;
		}

		case "disconnect" :
		{
			session_destroy();
			header("Location: index.php");
			break;
		}

		default :
		{
			listPosts();
			break;	
		}
	}
} else
{
	listPosts();
}