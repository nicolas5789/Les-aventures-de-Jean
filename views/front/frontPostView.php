<?php $title = "Billet"; ?>
<?php $title_bloc = $post["titre"]; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>

<?php ob_start(); ?>
	<div id = "billet"> 
		<p>
			<h3> <?php echo $post["titre"] ?> </h3>
			<span> Le <?php echo $post["date_creation"] ?> </span>
		</p>
		<p> <?php echo ($post["contenu"]) ?></p>
	</div>

	<div class="form-group" id="addComment">
		<h3>Ajouter un commentaire</h3>
		<form action= "index.php?action=addComment&amp;id=<?= $post["id"]?>" " method="post">
			<label for="auteur"> <input type="text" name="auteur" id="auteur" placeholder="Entrez votre pseudo" class="form-control" required /> </label> <br>
			<label id="labelNewCom"> <textarea id="textareaNewCom" name="contenu" class="form-control" required placeholder="Tapez votre commentaire ici"></textarea> </label> <br>
			<button class="btn btn-primary" type="submit"> Envoyer </button>
		</form>
	</div>

	<div id= "commentaires">
		<h3>Commentaires</h3>
		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<div class="commentaire">
				<p>
					<span> <strong><?php echo htmlspecialchars($comment["auteur"]) ?> </strong></span> <span class="timeCom"> Le <?php echo $comment["date_creation"] ?> </span> <br>
					<?php echo htmlspecialchars($comment["contenu"]) ?> <br>
					<a class="badge badge-warning" href="index.php?action=signal&amp;id=<?= $comment["id"]?>&amp;postId=<?php echo htmlspecialchars($post["id"]) ?>" onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?');" >Signaler le commentaire</a> 
				</p>
				<hr>
			</div>
		<?php
		}
		$comments->closeCursor();
		?>
	</div>

<?php $content = ob_get_clean(); ?>
<?php require("views/template.php"); ?>

