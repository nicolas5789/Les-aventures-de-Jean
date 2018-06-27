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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Blog de Jean</title>
</head>
<body>

	<h1>Espace administrateur</h1>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="addPost">
						<h3>Ajouter un billet</h3>
						<form action="index.php?action=addPost" method="post">
							<label for="auteur"> Auteur du billet <input type="text" name="auteur" id="auteur" required /> </label> <br>
							<label class="labelNewPost"> <textarea class="labelNewPost" name="contenu" required placeholder="Tapez le contenu de votre billet ici"></textarea> </label> <br>
							</table>
							<button class="btn btn-primary" type="submit"> Créer un nouveau billet </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="affichages_billets">
						<h3>Billets en ligne</h3>
						<?php
						while($data = $posts->fetch())
						{
						?>
						<div class="billets">
							<div class="enteteBillet">
								<?php echo htmlspecialchars($data["auteur"]); ?>
								<p> a écrit le <?php echo $data["date_creation"]; ?> </p>
							</div>
							<div class="contenuBillet">
								<p> 
									<?php echo htmlspecialchars($data["contenu"]); ?>
									<br/>
									<a class="badge badge-success" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir le billet avec ses commentaires</a> <!--Si clic sur com: envoi du numéro de l'id du billet vers post.php --> 
									<a class="badge badge-warning" href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier le billet</a>

									<a class="badge badge-danger" href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce billet ?');">Supprimer le billet</a>
								</p>
							</div>
						</div>
						<?php
						}
						$posts->closeCursor();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="signalements">
						<h3>Signalements</h3>
						<?php
						while($reportedCom = $reportedComments->fetch())
						{
						?>
						<div class="reportedCom">
							<p>
								Le commentaire écrit par 
								<?php echo htmlspecialchars($reportedCom["auteur"]); ?>
								le 
								<?php echo htmlspecialchars($reportedCom["date_creation"]); ?>
								a été signalé
								<?php echo htmlspecialchars($reportedCom["nb_signalement"]); ?>
								fois.
							 </p>
							 <span>
							 	Commentaire :
							 	<?php echo htmlspecialchars($reportedCom["contenu"]); ?>
							 </span>
							 <div class="deleteCom">
								<a class="badge badge-danger" href="index.php?action=deleteCom&amp;id=<?= $reportedCom["id"] ?> " onclick="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer le commentaire</a>
							</div>
						</div>
						<?php
						}
						$reportedComments->closeCursor();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="disconnect">
		<a class="badge badge-dark" href="index.php?action=disconnect">Déconnexion</a>
	</div>

</body>
</html>