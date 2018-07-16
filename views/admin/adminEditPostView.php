<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<?php $title = "Modification de billet"; ?>
<?php $title_bloc = "Espace modifications"; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="admin"; ?>

<?php ob_start(); ?>
	<h3>Modifier un billet</h3>
	<form action="index.php?action=changePost&amp;id=<?= htmlspecialchars($post->id()); ?>" method="post">
		<label for="titre"> Titre du billet <input type="text" name="titre" id="titre" value="<?= htmlspecialchars($post->titre()); ?>" required /> </label> <br>
		<label class="labelEditPost"> <textarea class="tiny" id="textareaEditPost" name="contenu"> <?= $post->contenu(); ?> </textarea> </label> <br>
		<button class="btn btn-warning" type="submit" onclick="return confirm('Etes-vous sûr de vouloir modifier ce billet ?');"> Modifier le billet </button>
		<a  class="btn btn-success" href="index.php?action=admin">Annuler</a>
	</form>
<?php $content = ob_get_clean(); ?>
<?php require("views/template.php"); ?>
