<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<?php $title = "Espace administrateur"; ?>
<?php $title_bloc = "Espace d'administration"; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>

<?php ob_start(); ?>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="addPost">
						<h3>Ajouter un billet</h3>
						<form action="index.php?action=addPost" method="post">
							<label for="titre"> <input class="form-control" type="text" name="titre" id="titre" placeholder="Titre" required /> </label> <br>
							<label id="labelNewPost" for="contenu"> <textarea id="textareaNewPost" class="tiny" class="form-control" name="contenu" required placeholder="Tapez le contenu de votre billet ici"></textarea> </label> <br>
							</table>
							<button class="btn btn-primary" type="submit" onclick="return confirm('Etes-vous sûr de vouloir mettre ce billet en ligne ?');"> Créer un nouveau billet </button>
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
						<div class="billet">
							<div class="enteteBillet">
								<p> <strong> <?php echo htmlspecialchars($data["titre"]) ?> </strong>, publié le <?php echo htmlspecialchars($data["date_creation"]); ?> </p>
							</div>
							<div class="contenuBillet">
								<p> 
									<?php echo ($data["contenu"]); ?>
									<br/>
									<a class="badge badge-success" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir le billet avec ses commentaires</a> 
									<a class="badge badge-warning" href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Modifier le billet</a>

									<a class="badge badge-danger" href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce billet ?');">Supprimer le billet</a>
								</p>
							</div>
						</div>
						<hr>
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
						<hr>
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
<?php $content = ob_get_clean(); ?>
<?php require("views/template.php"); ?>

