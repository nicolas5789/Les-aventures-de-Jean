<?php
require_once("model/Database.php");

class CommentManager extends Database
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
		$comments = $bdd->prepare("SELECT id, id_billet, auteur, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, nb_signalement, contenu FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
		$comments->execute(array($postId));

		return $comments;
	}

	//ajout des commentaires
	public function setComment($postId, $auteur, $contenu)
	{
		$postIdSafe = htmlspecialchars($postId); //sécurisation des données envoyées
		$auteurSafe = htmlspecialchars($auteur);
		$contenuSafe = htmlspecialchars($contenu);

		$bdd = $this->bddConnect();
		$addComment = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, date_creation, contenu) VALUES(?, ?, NOW(), ?)");
		$sendComment = $addComment->execute(array($postIdSafe, $auteurSafe, $contenuSafe));

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
		$getReported = $bdd->query("SELECT id, id_billet, auteur, DATE_FORMAT(date_creation, '%d-%m-%Y à %Hh%i') AS date_creation, nb_signalement, contenu FROM commentaires WHERE nb_signalement > 0 ORDER BY nb_signalement DESC");
		$getReported->execute(array());

		return $getReported;
	}

}