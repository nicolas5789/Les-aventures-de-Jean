<?php
if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok"):
	header("Location: index.php?action=admin");
endif;
?>

<?php $title = "Connexion"; ?>
<?php $title_bloc = "Page de connexion"; ?>
<?php $description_bloc = ""; ?>
<?php $lien = ""; ?>
<?php $adminStyle ="admin"; ?>

<?php ob_start(); ?>
	<div id="connexion_form" align="center">
		<h2>Connexion</h2>
		<div id="formulaire_connexion">
			<form method="POST" action="index.php?action=checkId">
				<table>
					<tr>
						<td><input type="text" name="pseudo" id="pseudo" class="form-control" required placeholder="Votre pseudo"></td>
					</tr>
					<tr>
						<td>
							<input type="password" name="pass" id="pass" class="form-control" required placeholder="Mot de passe">
						</td>
					</tr>		
				</table>
				<input id="bouton_connexion" type="submit" value="Je m'identifie" name="formConnexion" />
			</form>
			<p>
				<?php if(isset($_SESSION["erreur"])): 
					echo $_SESSION["erreur"];
				endif;
				?>	
			</p>
		</div>
	</div>
<?php $content = ob_get_clean(); ?>
<?php require("views/template.php"); ?>