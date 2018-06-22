<?php
require_once("model/manager.php");

class PostManager extends Manager
{
	//obtention des billets
	public function getPosts() 
	{ 
		$bdd = $this->bddConnect();
		$posts = $bdd->query("SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5");

		return $posts;
	}

	//modification d'un billet selon son id
	public function changePost($auteur, $contenu, $postId)
	{
		
		$bdd = $this->bddConnect();
		$editPost = $bdd->prepare("UPDATE billets SET auteur = ?, contenu = ? WHERE id = ?");
		$sendPost = $editPost->execute(array($auteur, $contenu, $postId));

		return $sendPost;
	}

	//suppression d'un billet selon son id
	public function deletePost($postId)
	{
		$bdd = $this->bddConnect();
		$req_deletePost = $bdd->prepare("DELETE FROM billets WHERE id= ?");
		$req_deletePost->execute(array($postId));

		return $req_deletePost;
	}

	//obtention d'un billet selon son id
	public function getPost($postId)
	{

		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT * FROM billets WHERE id= ?");
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	//ajout d'un billet 
	public function setPost($auteur, $contenu)
	{
		$bdd = $this->bddConnect();
		$addPost = $bdd->prepare("INSERT INTO billets(auteur, date_creation, contenu) VALUES(?, NOW(), ?)");
		$sendPost = $addPost->execute(array($auteur, $contenu));

		return $sendPost; 
	}
}