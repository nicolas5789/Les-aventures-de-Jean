<?php
require("model/Autoloader.php");
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
		$targetPost = new Post(['id'=>$id]);
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		
		$post = $postManager->getPost($targetPost); 
		$comments = $commentManager->getComments($targetPost); 
		
		require("views/front/frontPostView.php");
	}

	public static function newComments($id_billet, $auteur, $contenu)
	{
		$comment = new Comment(['id_billet'=>$id_billet, 'auteur'=>$auteur, 'contenu'=>$contenu]);
		$commentManager = new CommentManager();

		$sendComment = $commentManager->setComment($comment);
		header("Location: index.php?action=post&id=".$comment->id_billet());
	}

	public static function newSignal()
	{
		$comment = new Comment(['id'=>$_GET["id"]]);
		$commentManager = new CommentManager();

		$signal = $commentManager->setSignal($comment);

		$postId = $_GET["postId"];
		header("Location: index.php?action=post&id=".$postId);
	}

}


