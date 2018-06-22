<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>
	<p><a href="index.php">Retour aux billets</a></p>

	<div id = "billet"> 
		<h2>Billet</h2>
		<p>le <?php echo $post["date_creation"] . " " . $post["auteur"] ?> a écrit </p>
		<p> <?php echo htmlspecialchars($post["contenu"]) ?></p>
	</div>

	<div id="addComment">
		<h3>Ajouter un commentaire</h3>
		<form action= "index.php?action=addComment&amp;id=<?= $post["id"]?>" " method="post">
			<label for="auteur"> Pseudo </label> <input type="text" name="auteur" id="auteur" required />
			<label for="contenu"> Commentaire </label><input type="text" name="contenu" id="contenu" required />
			<button type="submit"> Envoyer </button>
		</form>
	</div>


	<div id= "commentaires">
		<h2>Commentaires</h2>
		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<div id="commentaire"></div>
				<p><?php echo htmlspecialchars($comment["auteur"]) ?></p>
				<p> le <?php echo $comment["date_creation"] ?> </p>
				<p><?php echo htmlspecialchars($comment["contenu"]) ?></p>
				<a href="index.php?action=signal&amp;id=<?= $comment["id"]?>">Signaler le commentaire</a> <!--VOIR POUR RESTER SUR LA MEME PAGE AU CLIC-->
			</div>
		<?php
		}
		$comments->closeCursor();
		?>
	</div>
</body>
</html>