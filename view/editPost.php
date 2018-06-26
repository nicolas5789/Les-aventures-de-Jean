<?php
session_start();

if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Edition d'un billet</h1>

	<div id="editPost">
		<h3>Modifier un billet</h3>
		<form action="index.php?action=changePost&amp;id=<?= $post["id"]?>" method="post">
			<label for="auteur"> Auteur du billet </label> <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($post["auteur"]) ?>" required /> 
			<textarea name="contenu"> <?php echo htmlspecialchars($post["contenu"]) ?> </textarea>

			<button type="submit"> Modifier </button>
		</form>
	</div>

	<a href="index.php?action=admin">Retour</a>

</body>
</html>