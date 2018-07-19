<?php

abstract class AdminController 
{

	public static function deleteCom() //suppression d'un commentaire
	{
		$comment = new Comment(['id'=>$_GET["id"]]);
		$commentManager = new CommentManager();

		$req_deleteCom = $commentManager->deleteCom($comment);

		header("Location: index.php?action=admin");
	}

	public static function editCom() //edition d'un commentaire
	{
		$comment = new Comment(['id'=>$_GET["id"]]);
		$commentManager = new CommentManager();

		$comment = $commentManager->getComment($comment);

		require("views/admin/adminEditCommentView.php");
	}

	public static function changeCom() //modification d'un commentaire
	{
		$comment = new Comment(['contenu'=>$_POST["contenu"], 'auteur'=>$_POST["auteur"], 'id'=>$_GET["id"]]);
		$commentManager = new CommentManager();

		$sendCom = $commentManager->changeComment($comment);

		header("Location: index.php?action=moderate");
	}

	public static function deletePost() // supprime un billet slon son id de la bdd
	{
		$post = new Post(['id'=>$_GET["id"]]);
		$postManager = new PostManager();

		$req_deletePost = $postManager->deletePost($post);

		header("Location: index.php?action=admin");
	}

	public static function changePost() //envoi le billet modifié à la bdd
	{
		$post = new Post(['titre'=>$_POST["titre"], 'contenu'=>$_POST["contenu"], 'id'=>$_GET["id"]]);
		$postManager = new PostManager();

		$sendPost = $postManager->changePost($post);

		header("Location: index.php?action=admin");
	}

	public static function editPost() //obtient billet dans zone de modification
	{
		$targetPost = new Post(['id'=>$_GET["id"]]);
		$postManager = new PostManager();

		$post = $postManager->getPost($targetPost);

		require("views/admin/adminEditPostView.php"); 
	}

	public static function newPost($titre, $contenu) //permet d'ajouter un billet
	{
		$post = new Post(['titre'=>$titre, 'contenu'=>$contenu]); 
		$postManager = new PostManager();

		$sendPost = $postManager->setPost($post); 

		header("Location: index.php?action=admin");
	}

	public static function admin() //ouvre la page de gestion des billets
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts(); //permet d'obtenir les billets(posts)
		
		require("views/admin/adminView.php");
	}	

	public static function moderate() //ouvre la page de modération des commentaires
	{
		$commentManager = new CommentManager();

		$reportedComments = $commentManager->getReportedCom();

		require("views/admin/adminModerationView.php");
	}

	public static function connectForm() //donne accès au formulaire de connexion
	{
		require("views/admin/adminConnexionView.php");
	}

	public static function access($pseudo, $pass) //vérifie pseudo et password
	{
		$userToCheck = new User(['pseudo'=>$pseudo, 'pass'=>$pass]);
		$userManager = new UserManager();

		$userOnFile = $userManager->getUser($userToCheck);
		$passToCheck = $userToCheck->pass(); //password tapé

		if(isset($userOnFile)) {
			$passOnFile = $userOnFile->pass(); //password dans la bdd

			if(password_verify($passToCheck, $passOnFile)) {
				$_SESSION["access"] = "ok";
				header("Location: index.php?action=admin");
			} else {
				$_SESSION["erreur"] = "Pseudo ou mot de passe incorrect";
				header("Location: index.php?action=checkId"); 
			}	
		} else {
			$_SESSION["erreur"] = "Pseudo ou mot de passe incorrect";
			header("Location: index.php?action=checkId"); 
		}	
	}
}


