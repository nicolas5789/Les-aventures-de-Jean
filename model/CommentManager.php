<?php
require_once("model/Database.php");

class CommentManager extends Database
{
	//ajout des commentaires (CREATE)
	public function setComment($postId, $auteur, $contenu)
	{
		$postIdSafe = htmlspecialchars($postId); //sécurisation des données envoyées
		$auteurSafe = htmlspecialchars($auteur);
		$contenuSafe = htmlspecialchars($contenu);

		$bdd = $this->bddConnect();
		$addComment = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, date_creation, contenu) VALUES(?, ?, NOW(), ?)");
		$sendComment = $addComment->execute(array($postIdSafe, $auteurSafe, $contenuSafe));

		//return $sendComment; 
	}

	//obtention des commentaires (READ)
	public function getComments($postId)
	{
		$comments = [];

		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT id, id_billet, auteur, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, nb_signalement, contenu FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
		$req->execute(array($postId));

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comment($data);
		}

		return $comments;
	}

	//obtention d'un commentaire
	public function getComment($commentId)
	{
		$bdd = $this->bddConnect();
		$req = $bdd->prepare("SELECT * FROM commentaires WHERE id = ?");
		$req->execute(array($commentId));
		$comment = $req->fetch(PDO::FETCH_ASSOC);

		return new Comment($comment);

	}

	//modification d'un commentaire (UPDATE)
	public function changeComment($contenu, $auteur, $commentId)
	{
		$bdd = $this->bddConnect();
		$req = $bdd->prepare("UPDATE commentaires SET contenu = ?, auteur = ?,  nb_signalement = 0 WHERE id = ? ");
		$req->execute(array($contenu, $auteur, $commentId));
	}

	//suppression d'un commentaire selon son id (DELETE)
	public function deleteCom($commentId)
	{
		$bdd = $this->bddConnect();
		$req_deleteCom = $bdd->prepare("DELETE FROM commentaires WHERE id = ?");
		$req_deleteCom->execute(array($commentId));

		//return $req_deleteCom;
	}


	// SIGNALEMENTS //

	//signalement d'un commentaire
	public function setSignal($id)
	{
		$bdd = $this->bddConnect();
		$addSignal = $bdd->query("UPDATE commentaires SET nb_signalement = nb_signalement+1 WHERE id = $id");
	}

	//obtention des commentaires signalés
	public function getReportedCom()
	{
		$reportedComments = [];

		$bdd = $this->bddConnect();
		$req = $bdd->query("SELECT id, id_billet, auteur, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, nb_signalement, contenu FROM commentaires WHERE nb_signalement > 0 ORDER BY nb_signalement DESC");
		$req->execute(array());

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$reportedComments[] = new Comment($data);
		}

		return $reportedComments;
	}

}