<?php
require_once("model/manager.php");

class CommentManager extends Manager
{
	//suppression d'un commentaire selon son id
	public function deleteCom($commentId)
	{
		$bdd = $this->bddConnect();
		$req_deleteCom = $bdd->prepare("DELETE FROM commentaires WHERE id = ?");
		$req_deleteCom->execute(array($commentId));

		return $req_deleteCom;
	}

	//obtention des commentaires
	public function getComments($postId)
	{
		$bdd = $this->bddConnect();
		$comments = $bdd->prepare("SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
		$comments->execute(array($postId));

		return $comments;
	}

	//ajout des commentaires
	public function setComment($postId, $auteur, $contenu)
	{
		$bdd = $this->bddConnect();
		$addComment = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, date_creation, contenu) VALUES(?, ?, NOW(), ?)");
		$sendComment = $addComment->execute(array($postId, $auteur, $contenu));

		return $sendComment; 
	}

	//signalement d'un commentaire
	public function setSignal($id)
	{
		$bdd = $this->bddConnect();
		$addSignal = $bdd->query("UPDATE commentaires SET nb_signalement = nb_signalement+1 WHERE id = $id");
	}

	//obtention des commentaires signalés
	public function getReportedCom()
	{
		$bdd = $this->bddConnect();
		$getReported = $bdd->query("SELECT * FROM commentaires WHERE nb_signalement > 0");
		$getReported->execute(array());

		return $getReported;
	}

}