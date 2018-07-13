<?php
require("autoloader.php");

class FrontController
{

	public static function home() //preciser la porter de toute les fonctions
	{
		require("views/front/frontHomeView.php");
	}

	function listPosts()
	{
		$postManager = new PostManager();

		//$posts = $postManager->getPosts(); //permet d'obtenir les billets avec leurs info(posts)

		$posts = $postManager->getPosts(); 

		require("views/front/frontBlogView.php"); //lance la page affichant les billets
	}

	function post($id) //affiche un post avec ses com
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		
		$post = $postManager->getPost($id); //obtient un post précis
		
		$comments = $commentManager->getComments($id); // obtient les com d'un post selon son id
		
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


