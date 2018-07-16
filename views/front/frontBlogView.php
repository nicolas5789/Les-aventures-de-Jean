<?php $title = "Billet simple pour l'Alaska"; ?>
<?php $title_bloc = "Billet simple pour l'Alaska"; ?>
<?php $description_bloc = "Lorsque votre boussole affiche plein nord et que votre coeur vous dit de continuer"; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="public"; ?>

<?php ob_start(); ?>
	<?php
	foreach ($posts as $post) 
	{
	?>
	<div class="billets_blog">
		<p> 
			<h3> <?= htmlspecialchars($post->titre()); ?> </h3>
			<span> Le <?= htmlspecialchars($post->date_creation()); ?> </span>
		</p> 	 
		<div class="contenu_billet"> 
			<?=

			(substr($post->contenu(), 0, 700))."...";  //VOIR OBTENIR EXTRAIT DIRECTEMENT DANS LE MODEL 
			//$post->contenu();

			?>
		</div>
		<div class="liens_billets">
			<a class="btn btn-secondary" href="index.php?action=post&amp;id=<?= htmlspecialchars($post->id()); ?>" role="button">Découvrir la suite &raquo;</a>
		</div>
		<hr>
	</div>
	<?php
	}	
	?>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>
