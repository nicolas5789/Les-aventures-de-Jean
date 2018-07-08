<?php $title = "Billet simple pour l'Alaska"; ?>
<?php $title_bloc = "Billet simple pour l'Alaska"; ?>
<?php $description_bloc = "Lorsque votre boussole affiche plein nord et que votre coeur vous dit de continuer"; ?>
<?php $lien = ""; ?>

<?php ob_start(); ?>
	<?php
	while($data = $posts->fetch())
	{
	?>
	<p> 
		<h3> <?php echo htmlspecialchars($data["titre"]); ?> </h3>
		<span> Le <?php echo $data["date_creation"]; ?> </span>
	</p> 	 
	<div class="contenu_billet"> 
		<?php echo (substr($data["contenu"], 0, 400))."..."; ?>
	</div>
	<p>
		<a class="btn btn-secondary" href="index.php?action=post&amp;id=<?= $data['id'] ?>" role="button">Découvrir la suite &raquo;</a>
	</p>
	<hr>
	<?php
	}
	$posts->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>
