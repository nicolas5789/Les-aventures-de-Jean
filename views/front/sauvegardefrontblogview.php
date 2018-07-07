<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Blog de Jean</title>
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="#">Menu</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Page d'accueil<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Le Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Les publications</a>
				</li>
			</ul>
		</div>
	</nav>

	<main role="main">
		<div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Billet simple pour l'Alaska</h1>
				<p>Texte pour la page du blog de Jean, retrouvez jean à travers ses aventures billet après billet en route vers l'Alaska</p>
				<p>
					<a class="btn btn-primary btn-lg" href="#" role="button">Découvrir &raquo;</a>
				</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
					while($data = $posts->fetch())
					{
					?>
					<h2> Le <?php echo $data["date_creation"]; ?>, <?php echo htmlspecialchars($data["auteur"]); ?> a voulu vous partager ce billet :</h2> 	 
					<p> 
						<?php echo htmlspecialchars(substr($data["contenu"], 0, 400)); ?>
						<a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="badge badge-light">...Découvrir la suite</a>
					</p>
					<p>
						<a class="btn btn-secondary" href="#" role="button">View details &raquo;</a>
					</p>
					
					<?php
					}
					$posts->closeCursor();
					?>
					<a href="index.php?action=formAccess" class="badge badge-dark">Espace administrateur</a>
				</div>
			</div>
		</div>	
	</main>

	<footer class="container">
		<p>Projet 4 Développeur web junior OpenClassromm</p>
	</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>