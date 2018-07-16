<?php

abstract class AdminController 
{

	public static function deleteCom()
	{
		$commentManager = new CommentManager();

		$req_deleteCom = $commentManager->deleteCom($_GET["id"]);

		header("Location: index.php?action=admin");
	}

	public static function editCom()
	{
		$commentManager = new CommentManager();

		$comment = $commentManager->getComment($_GET["id"]);

		require("views/admin/adminEditCommentView.php");
	}

	public static function changeCom()
	{
		$commentManager = new CommentManager();

		$sendCom = $commentManager->changeComment($_POST["contenu"], $_POST["auteur"], $_GET["id"]);

		header("Location: index.php?action=moderate");
	}

	public static function deletePost() // supprime un billet slon son id de la bdd
	{
		$postManager = new PostManager();

		$req_deletePost = $postManager->deletePost($_GET["id"]);

		header("Location: index.php?action=admin");
	}

	public static function changePost() //envoi le billet modifié à la bdd
	{
		$postManager = new PostManager();

		$sendPost = $postManager->changePost($_POST["titre"], $_POST["contenu"], $_GET["id"]);

		header("Location: index.php?action=admin");
	}

	public static function editPost() //obtient billet dans zone de modification
	{
		$postManger = new PostManager();

		$post = $postManger->getPost($_GET["id"]);

		require("views/admin/adminEditPostView.php"); 
	}

	public static function newPost($titre, $contenu) //permet d'ajouter un billet
	{
		$postManager = new PostManager();

		$sendPost = $postManager->setPost($titre, $contenu);

		header("Location: index.php?action=admin");
	}

	public static function admin()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts(); //permet d'obtenir les billets(posts)
		$reportedComments = $commentManager->getReportedCom(); //permet d'obtenir les com signalés

		require("views/admin/adminView.php");
	}	

	public static function moderate()
	{
		$commentManager = new CommentManager();

		$reportedComments = $commentManager->getReportedCom();

		require("views/admin/adminModerationView.php");
	}

	public static function connectForm()
	{
		require("views/admin/adminConnexionView.php");
	}

	public static function access($pseudo, $pass)
	{
		$getPass = new GetPass();

		$passwordBddPseudo = $getPass->getPassword($pseudo);

		if(password_verify($pass, $passwordBddPseudo)) {
			$_SESSION["access"] = "ok";
			header("Location: index.php?action=admin");
		} else {
			$_SESSION["erreur"] = "Pseudo ou mot de passe incorrect";
			header("Location: index.php?action=checkId"); //renvoi vers index mais sans paramètre 
		}	
	}
}


