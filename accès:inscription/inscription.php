<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Blog de Jean</title>
	</head>

<body>
	<div>
		<h1>Le blog de Jean</h1>
	</div>

	<div id="inscription">
		<h2>Inscription</h2>
		<div id="formulaire">
			<form action="inscription_post.php" method="POST">
				<p>
					<label for="pseudo"> Pseudo </label> : <input type="text" name="pseudo" id="pseudo" required> <br/>	
					<label for="pass"> Mot de passe </label> : <input type="password" name="pass" id="pass" required> <br/>
					<label for="pass_check"> Confirmation </label> : <input type="password" name="pass_check" id="pass_check" required> <br/>
					<label for="email"> Email </label> : <input type="text" name="email" id="email" required> <br/>
					<input type="submit" value="Envoyer"/>		
				</p>
			</form>
		</div>
	</div>

</body>
</html>