<?php

class AdminController 
{

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

		$sendPost = $postManager->changePost($_POST["titre"], $_POST["contenu"], $_GET["id"]);

		header("Location: index.php?action=admin");
	}

	function editPost() //obtient billet dans zone de modification
	{
		$postManger = new PostManager();

		$post = $postManger->getPost($_GET["id"]);

		require("views/admin/adminEditPostView.php"); 
	}

	function newPost($titre, $contenu) //permet d'ajouter un billet
	{
		$postManager = new PostManager();

		$sendPost = $postManager->setPost($titre, $contenu);

		header("Location: index.php?action=admin");
	}

	function admin()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$posts = $postManager->getPosts(); //permet d'obtenir les billets(posts)
		$reportedComments = $commentManager->getReportedCom(); //permet d'obtenir les com signalés

		require("views/admin/adminView.php");
	}	

	function connectForm()
	{
		require("views/admin/adminConnexionView.php");
	}

	function access($pseudo, $pass)
	{
		$getPass = new GetPass();

		$passwordBddPseudo = $getPass->getPassword($pseudo);

		if(password_verify($pass, $passwordBddPseudo))
		{
			$_SESSION["access"] = "ok";
			header("Location: index.php?action=admin");
		} else
		{
			$_SESSION["erreur"] = "Pseudo ou mot de passe incorrect";
			header("Location: index.php?action=checkId"); //renvoi vers index mais sans paramètre 
		}
		
	}
}


