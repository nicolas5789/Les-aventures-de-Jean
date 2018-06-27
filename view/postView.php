<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>

	<?php
	if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok") 
	{
		echo "<a class='badge badge-light' id='retour' href='index.php?action=admin'>Retour à l'administration </a>";
	} else
	{
		echo "<a class='badge badge-light' id='retour' href='index.php'>Retour aux billets </a>";
	}
	?>



	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id = "billet"> 
						<h6>Le <?php echo $post["date_creation"] . " " . $post["auteur"] ?> a écrit </h6>
						<p> <?php echo htmlspecialchars($post["contenu"]) ?></p>
					</div>

					<div id="addComment">
						<h3>Ajouter un commentaire</h3>
						<form action= "index.php?action=addComment&amp;id=<?= $post["id"]?>" " method="post">
							<label for="auteur"> <input type="text" name="auteur" id="auteur" placeholder="Entrez votre pseudo" required /> </label> <br>
							<label class="labelNewCom"> <textarea class="labelNewCom" name="contenu" required placeholder="Tapez votre commentaire ici"></textarea> </label> <br>
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
									Le <?php echo $comment["date_creation"] ?> <?php echo htmlspecialchars($comment["auteur"]) ?> a écrit : <br>
									<?php echo htmlspecialchars($comment["contenu"]) ?> <br>
									<a class="badge badge-warning" href="index.php?action=signal&amp;id=<?= $comment["id"]?>" onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?');" >Signaler le commentaire</a> <!--VOIR POUR RESTER SUR LA MEME PAGE AU CLIC-->
								</p>
							</div>
						<?php
						}
						$comments->closeCursor();
						?>
					</div>

				</div>
			</div>
		</div>
	</div>


</body>
</html>