<?php
session_start();

//appel des controleurs
require("controller/FrontController.php"); 
require("controller/AdminController.php");

if(isset($_GET["action"])) {
	$_action = $_GET["action"];
}
if(isset($_GET["id"])) {
	$_id = $_GET["id"];
}

if (isset($_action)) {	
	switch ($_action) {
		case "home" :
		{
			FrontController::home();
			break;
		}

		case "blog" :
		{
			FrontController::listPosts();
			break;
		}

		case "post" :
		{
			if (isset($_id) && $_id > 0) {
				FrontController::post($_GET["id"]);
			} else {
			echo "Erreur : aucun id de billet transmis";
			}
			break;
		}

		case "addComment" :
		{
			FrontController::newComments($_id, $_POST["auteur"], $_POST["contenu"]);
			break;
		}

		case "signal" :
		{
			if(isset($_id)&& $_id > 0)
			{
				if (isset($_GET["postId"]) && $_GET["postId"] > 0) {
					FrontController::newSignal();
				} else {
					echo "Aucun id de billet transmis";
				}
			}	
			break;
		}

		case "admin" :
		{
			AdminController::admin();
			break;
		}

		case "moderate" :
		{
			AdminController::moderate();
			break;		
		}

		case "addPost" :
		{
			if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") {
				AdminController::newPost($_POST["titre"], $_POST["contenu"]);
			} else {
				header("Location: index.php");
			}	
			break;
		}

		case "formAccess" :
		{
			AdminController::connectForm();
			break;
		}

		case "checkId" :
		{
			if(isset($_POST["pseudo"]) && isset($_POST["pass"])) { 
				AdminController::access($_POST["pseudo"], $_POST["pass"]);
			} else {
				AdminController::connectForm();
			}	
			break;
		}

		case "editPost" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") {
					AdminController::editPost();
				} else {
					header("Location: index.php");
				}
			} else {
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
					AdminController::changePost();
				} else {
					header("Location: index.php");
				}
			} else {
				echo "Aucun Id de billet transmis";
			}
			break;
		}

		case "deletePost" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") {
					AdminController::deletePost();
				} else {
					header("Location: index.php");
				}
			} else {
				echo "Aucun Id de billet transmis";
			}	
			break;
		}

		case "editCom" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") {
					AdminController::editCom();
				} else {
					header("Location: index.php");
				}
			} else {
				echo "Aucun Id de commentaire transmis";
			}
			break;
		}

		case "changeCom" :
		{
			if (isset($_id) && $_id > 0) 
			{
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
				{
					AdminController::changeCom();
				} else {
					header("Location: index.php");
				}
			} else {
				echo "Aucun Id de commentaire transmis";
			}
			break;	
		}

		case "deleteCom" :
		{
			if (isset($_id) && $_id > 0) {
				if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") {
					AdminController::deleteCom();
				} else {
					header("Location: index.php");
				}
			} else {
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
			FrontController::home();
			break;	
		}
	}
} else {
	FrontController::home();
}