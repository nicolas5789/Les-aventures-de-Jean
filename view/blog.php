<?php
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="affichages_billets">
					<?php
					while($data = $posts->fetch())
					{
					?>
					<div class="billets">
						<div class="enteteBillet">
							<p> Le <?php echo $data["date_creation"]; ?>, <?php echo htmlspecialchars($data["auteur"]); ?> a voulu vous partager ce billet :</p> <!-- Voir pour affichage de la date et heure en format français -->	 
						</div>
						<div class="contenuBillet">
							<p> 
								<?php echo htmlspecialchars(substr($data["contenu"], 0, 400)); ?>
								<a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="badge badge-light">...Découvrir la suite</a>
							</p>
						</div>
					</div>
					<?php
					}
					$posts->closeCursor();
					?>
					<a href="index.php?action=formAccess" class="badge badge-dark">Espace administrateur</a>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>