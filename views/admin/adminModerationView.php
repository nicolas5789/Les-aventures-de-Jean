<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<?php $title = "Espace de modération"; ?>
<?php $title_bloc = "Modération des commentaires"; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="admin"; ?>

<?php ob_start(); ?>

<div id="admin_boutons">
	<div>
		<a href="index.php?action=admin" class="btn btn-primary">Gestion des billets</a>
	</div>
	<div>
		<a href="index.php?action=moderate" class="btn btn-primary">Gestion des signalements</a>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="signalements">
					<h3>Signalements</h3>
					<?php
					foreach($reportedComments as $reportedCom)
					{
					?>
					<div class="reportedCom">
						<p>
							Le commentaire écrit par 
							<?= htmlspecialchars($reportedCom->auteur()); ?>
							le 
							<?= htmlspecialchars($reportedCom->date_creation()); ?>
							a été signalé
							<?= htmlspecialchars($reportedCom->nb_signalement()); ?>
							fois.
						 </p>
						 <span>
						 	Commentaire :
						 	<?= htmlspecialchars($reportedCom->contenu()); ?>
						 </span>
						 <div class="deleteCom">
						 	<a class="badge badge-warning" href="index.php?action=editCom&amp;id=<?= htmlspecialchars($reportedCom->id()); ?>">Modérer le commentaire</a>
							<a class="badge badge-danger" href="index.php?action=deleteCom&amp;id=<?= htmlspecialchars($reportedCom->id()); ?> " onclick="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer le commentaire</a>
						</div>
					</div>
					<hr>
					<?php
					}
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