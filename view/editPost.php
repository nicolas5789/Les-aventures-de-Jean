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
			<label for="auteur"> Auteur du billet </label> <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($post["auteur"]) ?>" required /> <!--PROBLEME TOUT SUR LA MEME LIGNE -->
			<label for="contenu"> Contenu du billet </label> <input type="text" name="contenu" id="contenu" value="<?php echo htmlspecialchars($post["contenu"]) ?>" required /> <!--PROBLEME TOUT SUR LA MEME LIGNE -->
			<button type="submit"> Modifier </button>
		</form>
	</div>

	<a href="index.php?action=admin">Retour</a>

</body>
</html>