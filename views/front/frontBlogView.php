<?php $title = "Billet simple pour l'Alaska"; ?>
<?php $title_bloc = "Billet simple pour l'Alaska"; ?>
<?php $description_bloc = "Lorsque votre boussole affiche plein nord et que votre coeur vous dit de continuer"; ?>
<?php $lien = ""; ?>

<?php ob_start(); ?>
	<?php

	//var_dump($posts);

	while($post = $posts->fetch())
	{

	//var_dump($post);

	echo $post->id() . "<br>";
	echo $post->titre() . "<br>";
	echo $post->date_creation() . "<br>";
	echo $post->contenu();
	}



	/*
	while($data = $posts->fetch())
	{
	?>
	<div class="billets_blog">
		<p> 
			<h3> <?php echo htmlspecialchars($data["titre"]); ?> </h3>
			<span> Le <?php echo $data["date_creation"]; ?> </span>
		</p> 	 
		<div class="contenu_billet"> 
			<?php echo (substr($data["contenu"], 0, 700))."..."; ?>
		</div>
		<div class="liens_billets">
			<a class="btn btn-secondary" href="index.php?action=post&amp;id=<?= $data['id'] ?>" role="button">Découvrir la suite &raquo;</a>
		</div>
		<hr>
	</div>
	<?php
	}
	$posts->closeCursor();

	*/
	?>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>
