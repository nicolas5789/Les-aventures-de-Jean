<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Espace administrateur</h1>

	<div id="addPost">
		<h3>Ajouter un billet</h3>
		<form action="index.php?action=addPost" method="post">
			<label for="auteur"> Auteur du billet </label> <input type="text" name="auteur" id="auteur" required />
			<label for="contenu"> Contenu du billet </label><input type="text" name="contenu" id="contenu" required />
			<button type="submit"> Créer </button>
		</form>
	</div>

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
					<a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier le billet</a>
				</p>
			</div>
		</div>
		<?php
		}
		$posts->closeCursor();
		?>
	</div>

	<div id="signalements">
		<h3>Signalements</h3>
		<?php
		while($reportedCom = $reportedComments->fetch())
		{
		?>
		<div id="commentaires_signalés">
			<p>
				Le commentaire écrit par 
				<?php echo htmlspecialchars($reportedCom["auteur"]); ?>
				le 
				<?php echo htmlspecialchars($reportedCom["date_creation"]); ?>
				a été signalé
				<?php echo htmlspecialchars($reportedCom["nb_signalement"]); ?>
				fois.
			 </p>
			 <p>
			 	Commentaire :
			 	<?php echo htmlspecialchars($reportedCom["contenu"]); ?>
			 </p>
			
		</div>
		<?php
		}
		$reportedComments->closeCursor();
		?>

	</div>


	<div id="disconnect">
		<a href="index.php">Déconnexion</a>
	</div>

</body>
</html>