<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<?php $title = "Modération de commentaire"; ?>
<?php $title_bloc = "Espace modération"; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="admin"; ?>

<?php ob_start(); ?>
	<h3>Modifier un billet</h3>
	<form action="index.php?action=changeCom&amp;id=<?= htmlspecialchars($comment->id()); ?>" method="post">
		<label for="auteur"> Auteur <input type="text" name="auteur" id="auteur" class="form-control" value="<?= htmlspecialchars($comment->auteur()); ?>" required /> </label> <br>
		<label id="labelEditCom"> <textarea id="textareaEditCom" class="form-control" name="contenu"> <?= htmlspecialchars($comment->contenu()); ?> </textarea> </label> <br>
		<button class="btn btn-warning" type="submit" onclick="return confirm('Etes-vous sûr de vouloir valider ce commentaire ?');"> Valider le commentaire </button>
		<a  class="btn btn-success" href="index.php?action=moderate">Annuler</a>
		<a class="btn btn-danger" href="index.php?action=deleteCom&amp;id=<?= htmlspecialchars($comment->id()); ?> " onclick="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer le commentaire</a>
	</form>
<?php $content = ob_get_clean(); ?>
<?php require("views/template.php"); ?>