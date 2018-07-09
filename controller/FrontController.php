<?php


//METHODE EN STATIC


//appel des model
//require("model/Post.php");
require("model/PostManager.php");
//require("model/comment.php");
require("model/CommentManager.php");
require("model/GetPass.php");
//REMPLACER PAR AUTOLOAD

class FrontController
{

	function home()
	{
		require("views/front/frontHomeView.php");
	}

	function listPosts()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts(); //permet d'obtenir les billets avec leurs info(posts)
		
		require("views/front/frontBlogView.php"); //lance la page affichant les billets
	}

	function post() //affiche un post avec ses com
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post = $postManager->getPost($_GET["id"]); //obtient un post précis
		$comments = $commentManager->getComments($_GET["id"]); // obtient les com d'un post selon son id
		
		require("views/front/frontPostView.php"); //affiche un post avec ses comments
	}

	function newComments($id_billet, $auteur, $contenu)
	{
		$commentManager = new CommentManager();

		$sendComment = $commentManager->setComment($id_billet, $auteur, $contenu);

		header("Location: index.php?action=post&id=".$id_billet);
	}

	function newSignal()
	{
		$commentManager = new CommentManager();

		$signal = $commentManager->setSignal($_GET["id"]);

		$postId = $_GET["postId"];

		header("Location: index.php?action=post&id=".$postId);
	}

}


