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
		<p>le <?php echo $post["date_creation"] ?></p>
		<p> <?php echo htmlspecialchars($post["contenu"]) ?></p>
	</div>

	<div id= "commentaires">
		<h2>Commentaires</h2>
		<?php
		while ($comment = $comments->fetch())
		{
		?>
			<p><?php echo htmlspecialchars($comment["auteur"]) ?></p>
			<p> le <?php echo $comment["date_creation"] ?> </p>
			<p><?php echo htmlspecialchars($comment["contenu"]) ?></p>
		<?php
		}
		$comments->closeCursor();
		?>
	</div>






</body>
</html>