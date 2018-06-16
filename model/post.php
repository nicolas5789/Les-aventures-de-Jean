<?php

class PostManager
{
	//obtention des billets
	public function getPosts() 
	{ 
		$bdd = $this->bddConnect();
		$posts = $bdd->query("SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5");

		return $posts;
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

	private function bddConnect()
	{
		try
		{
			$bdd = new PDO("mysql:host=localhost;dbname=blog_jean;charset=utf8", "root", "root");
			return $bdd;
		}
		//affichage si erreur
		catch(Exception $e)
		{
			die("Erreur : " . $e->getMessages());
		}
	}

}