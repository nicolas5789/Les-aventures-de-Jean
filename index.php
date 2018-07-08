<?php
session_start();

//appel des controleurs
require("controller/FrontController.php"); 
require("controller/AdminController.php");

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
		case "home" :
		{
			$frontController = new FrontController(); 
			$frontController->home();
			break;
		}
		case "blog" :
		{
			$frontController = new FrontController(); 
			$frontController->listPosts();
			break;
		}
		case "post" :
			if (isset($_id) && $_id > 0) 
		{
			$frontController = new FrontController(); 
			$frontController->post();
		} else 
		{
			echo "Erreur : aucun id de billet transmis";
		}	
			break;

		case "addComment" :
		{
			$frontController = new FrontController(); 
			$frontController->newComments($_id, $_POST["auteur"], $_POST["contenu"]);
			break;
		}

		case "admin" :
		{
			$adminController = new AdminController();
			$adminController->admin();
			break;
		}

		case "addPost" :
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
			{
				$adminController = new AdminController();
				$adminController->newPost($_POST["titre"], $_POST["contenu"]);
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
					$frontController = new FrontController(); 
					$frontController->newSignal();
				} else 
				{
					echo "Aucun id de billet transmis";
				}
			}	
			break;
		}

		case "formAccess" :
		{

			$adminController = new AdminController();
			$adminController->connectForm();
			break;
		}

		case "checkId" :
		{
			if(isset($_POST["pseudo"]) && isset($_POST["pass"]))
			{ 
				
				$adminController = new AdminController();
				$adminController->access($_POST["pseudo"], $_POST["pass"]);
			} else 
			{
				$adminController = new AdminController();
				$adminController->connectForm();
			}	
			break;
		}

		case "editPost" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
				{
					$adminController = new AdminController();
					$adminController->editPost();
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
					$adminController = new AdminController();
					$adminController->changePost();
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
					$adminController = new AdminController();
					$adminController->deletePost();
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
					$adminController = new AdminController();
					$adminController->deleteCom();
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
			$frontController = new FrontController(); 
			$frontController->home();
			break;	
		}
	}
} else
{
	$frontController = new FrontController(); 
	$frontController->home();
}