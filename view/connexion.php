<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>

	<div id="connexion_form">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form action="../index.php?action=checkId" method="POST">
				<p>
					<label for="pseudo"> Pseudo </label> : <input type="text" name="pseudo" id="pseudo" required> <br/>	
					<label for="pass"> Mot de passe </label> : <input type="password" name="pass" id="pass" required> <br/>
					<input type="submit" value="Envoyer"/>		
				</p>
			</form>
		</div>
	</div>

</body>
</html>