<?php $title = "Billet"; ?>
<?php $title_bloc = htmlspecialchars($post->titre()); ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="public"; ?>

<?php ob_start(); ?>
	<div id = "billet"> 
		<p>
			<h3> <?= htmlspecialchars($post->titre());	?> </h3>
			<span> Le <?= htmlspecialchars($post->date_creation()); ?> </span>
		</p>
		<p> <?= $post->contenu(); ?></p>
	</div>

	<div class="form-group" id="addComment">
		<h3>Ajouter un commentaire</h3>
		<form action= "index.php?action=addComment&amp;id=<?= htmlspecialchars($post->id()); ?>" " method="post">
			<label for="auteur"> <input type="text" name="auteur" id="auteur" placeholder="Entrez votre pseudo" class="form-control" required /> </label> <br>
			<label id="labelNewCom"> <textarea id="textareaNewCom" name="contenu" class="form-control" required placeholder="Tapez votre commentaire ici"></textarea> </label> <br>
			<button class="btn btn-primary" type="submit"> Envoyer </button>
		</form>
	</div>

	<div id= "commentaires">
		<h3>Commentaires</h3>
		<?php
		foreach ($comments as $comment)
		{
		?>
			<div class="commentaire">
				<p>
					<span> <strong><?= htmlspecialchars($comment->auteur()); ?> </strong></span> <span class="timeCom"> Le <?= htmlspecialchars($comment->date_creation()); ?> </span> <br>
					<?= htmlspecialchars($comment->contenu()); ?> <br>
					<a class="badge badge-warning" href="index.php?action=signal&amp;id=<?= htmlspecialchars($comment->id()); ?>&amp;postId=<?= htmlspecialchars($post->id()); ?>" onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?');" >Signaler le commentaire</a> 
					<?php if(isset($_SESSION["access"])) { ?>
					<a class="badge badge-danger" href="index.php?action=editCom&amp;id=<?= htmlspecialchars($comment->id()); ?>&amp;postId=<?= htmlspecialchars($post->id()); ?>">Modérer le commentaire</a>
					<?php } ?>
				</p>
				<hr>
			</div>
		<?php
		}
		?>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>


