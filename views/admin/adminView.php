<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok"):
else:
	header("Location: index.php");
endif;
?>

<?php $title = "Espace administrateur"; ?>
<?php $title_bloc = "Espace d'administration"; ?>
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
					<?php foreach ($posts as $post): ?>
						<div class="billet">
							<div class="enteteBillet">
								<p> <strong> <?= htmlspecialchars($post->titre()); ?> </strong>, publié le <?= htmlspecialchars($post->date_creation()); ?> </p>
							</div>
							<div class="contenuBillet">
								<p> 
									<?= $post->contenu(); ?>
									<br/>
									<a class="badge badge-success" href="index.php?action=post&amp;id=<?= htmlspecialchars($post->id()); ?>">Voir le billet avec ses commentaires</a> 
									<a class="badge badge-warning" href="index.php?action=editPost&amp;id=<?= htmlspecialchars($post->id()); ?>">Modifier le billet</a>
									<a class="badge badge-danger" href="index.php?action=deletePost&amp;id=<?= htmlspecialchars($post->id()); ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce billet ?');">Supprimer le billet</a>
								</p>
							</div>
						</div>
						<hr>
					<?php endforeach; ?>
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

