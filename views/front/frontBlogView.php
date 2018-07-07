<?php $title = "Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
	<?php
	while($data = $posts->fetch())
	{
	?>
	<p> 
		<h3> <?php echo htmlspecialchars($data["titre"]); ?> </h3>
		<span> Le <?php echo $data["date_creation"]; ?> </span>
	</p> 	 
	<p id="contenu_billet"> 
		<?php echo htmlspecialchars(substr($data["contenu"], 0, 400))."..."; ?>
	</p>
	<p>
		<a class="btn btn-secondary" href="index.php?action=post&amp;id=<?= $data['id'] ?>" role="button">Découvrir la suite &raquo;</a>
	</p>
	<hr>
	<?php
	}
	$posts->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>

<?php 
require("template.php"); 

//require("..template.php"); NE FONCTIONNE PAS 

?>
