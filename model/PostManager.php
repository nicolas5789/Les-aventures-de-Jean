<?php
require_once("model/Database.php");

class PostManager extends Database
{
	//ajout d'un billet (CREATE)
	public function setPost($post)
	{
		$titreSafe = htmlspecialchars($post->titre());
		
		$bdd = $this->bddConnect();
		$addPost = $bdd->prepare("INSERT INTO billets(titre, date_creation, contenu) VALUES(?, NOW(), ?)");
		$sendPost = $addPost->execute(array($titreSafe, $post->contenu()));
	}

	//obtention d'un billet selon son id (READ)
	public function getPost($targetPost)
	{
		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT id, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, contenu, titre FROM billets WHERE id= ?");
		$req->execute(array($targetPost->id()));
		$post = $req->fetch(PDO::FETCH_ASSOC);

		return new Post($post);
	}

	//obtention de tous les billets 
	public function getPosts() 
	{ 
		$posts = [];

		$bdd = $this->bddConnect();
		$req = $bdd->query("SELECT id, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, contenu, titre FROM billets ORDER BY date_creation DESC");

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$posts[] = new Post($data);
		}

		return $posts;
	}
	
	//modification d'un billet selon son id (UPDATE)
	public function changePost($post)
	{
		$titreSafe = htmlspecialchars($post->titre());
		$postIdSafe = htmlspecialchars($post->id());

		$bdd = $this->bddConnect();
		$editPost = $bdd->prepare("UPDATE billets SET titre = ?, contenu = ? WHERE id = ?");
		$sendPost = $editPost->execute(array($titreSafe, $post->contenu(), $postIdSafe));
	}

	//suppression d'un billet selon son id (DELETE)
	public function deletePost($post)
	{
		$bdd = $this->bddConnect();
		$req_deletePost = $bdd->prepare("DELETE FROM billets WHERE id= ?");
		$req_deletePost->execute(array($post->id()));
	}
}