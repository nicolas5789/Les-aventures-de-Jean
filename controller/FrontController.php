<?php
require("Autoloader.php");
Autoloader::register();

abstract class FrontController
{

	public static function home() 
	{
		require("views/front/frontHomeView.php");
	}

	public static function listPosts()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts(); 

		require("views/front/frontBlogView.php"); 
	}

	public static function post($id) 
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		
		$post = $postManager->getPost($id); 
		$comments = $commentManager->getComments($id); 
		
		require("views/front/frontPostView.php");
	}

	public static function newComments($id_billet, $auteur, $contenu)
	{
		$commentManager = new CommentManager();

		$sendComment = $commentManager->setComment($id_billet, $auteur, $contenu);

		header("Location: index.php?action=post&id=".$id_billet);
	}

	public static function newSignal()
	{
		$commentManager = new CommentManager();

		$signal = $commentManager->setSignal($_GET["id"]);

		$postId = $_GET["postId"];

		header("Location: index.php?action=post&id=".$postId);
	}

}


