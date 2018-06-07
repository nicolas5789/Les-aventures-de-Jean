<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Blog de Jean</title>
</head>


<body>
	<div>
		<h1>Le blog de Jean</h1>
	</div>

	<div id="connexion">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form action="connexion_post.php" method="POST">
				<p>
					<label for="pseudo"> Pseudo </label> : <input type="text" name="pseudo" id="pseudo" required> <br/>	
					<label for="pass"> Mot de passe </label> : <input type="password" name="pass" id="pass" required> <br/>
					<input type="submit" value="Envoyer"/>		
				</p>
			</form>
		</div>
		<div id="renvoi_inscription">
			<a id="bouton inscription" href="inscription.php">Pas encore inscrit</a>
		</div>
	</div>

	
	
</body>
</html>