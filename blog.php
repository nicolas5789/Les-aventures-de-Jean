<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>

	<div id="affichages_billets">
		<?php
		while($data = $posts->fetch())
		{
		?>
		<div id="billets">
			<div id="enteteBillet">
				<?php echo htmlspecialchars($data["auteur"]); ?>
				<p> a écrit le <?php echo $data["date_creation"]; ?> </p>
			</div>
			<div id="contenuBillet">
				<p> 
					<?php echo htmlspecialchars($data["contenu"]); ?>
					<br/>
					<a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a> <!--Si clic sur com: envoi du numéro de l'id du billet vers post.php --> 
				</p>
			</div>
		</div>
		<?php
		}
		$posts->closeCursor();
		?>
	</div>

</body>
</html>