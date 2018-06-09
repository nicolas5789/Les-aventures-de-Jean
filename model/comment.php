<?php

//obtention des commentaires
function getComments($postId)
{
	$bdd = bddConnect();
	$comments = $bdd->prepare("SELECT * FROM commentaires WHERE id_billet = ? ORDER BY date_creation DESC");
	$comments->execute(array($postId));

	return $comments;
}