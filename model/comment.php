<?php

//obtention des commentaires
function getComments($postId)
{
	$bdd = bddConnect();
	$comments = $bdd->prepare("SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
	$comments->execute(array($postId));

	return $comments;
}
//ajout des commentaires
function setComment($postId, $auteur, $contenu)
{
	$bdd = bddConnect();
	$addComment = $bdd->prepare("INSERT INTO commentaires(id_billet, auteur, date_creation, contenu) VALUES(?, ?, NOW(), ?)");
	$sendComment = $addComment->execute(array($postId, $auteur, $contenu));

	return $sendComment; 
}