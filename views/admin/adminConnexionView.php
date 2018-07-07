<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{
	header("Location: index.php?action=admin");
}
?>

<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
	<div id="connexion_form" align="center">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form method="POST" action="index.php?action=checkId">
				<table>
					<tr>
						<td><label for="pseudo"> Pseudo </label></td>
						<td><input type="text" name="pseudo" id="pseudo" class="form-control" required></td>
					</tr>
					<tr>
						<td>
							<label for="pass"> Mot de passe </label>	
						</td>
						<td>
							<input type="password" name="pass" id="pass" class="form-control" required>
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
		</div>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require("adminTemplate.php"); ?>