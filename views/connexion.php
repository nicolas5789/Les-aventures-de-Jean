<?php
session_start();

if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{
	header("Location: ../index.php?action=admin");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Blog de Jean</h1>
	<div id="connexion_form" align="center">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form method="POST" action="../index.php?action=checkId">
				<table>
					<tr>
						<td><label for="pseudo"> Pseudo </label></td>
						<td><input type="text" name="pseudo" id="pseudo" required></td>
					</tr>
					<tr>
						<td>
							<label for="pass"> Mot de passe </label>	
						</td>
						<td>
							<input type="password" name="pass" id="pass" required>
						</td>
					</tr>		
				</table>
				<input type="submit" value="Je m'identifie" name="formConnexion" />
			</form>

			<p>
				<?php if(isset($_SESSION["erreur"])) 
				{
					echo $_SESSION["erreur"];
				}
				?>	
			</p>
			<a href="../index.php">Retourner au blog</a>
		</div>
	</div>

</body>
</html>