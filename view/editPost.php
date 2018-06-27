<?php
session_start();

if(isset($_SESSION["access"]) && $_SESSION["access"] == "ok")
{

} else
{
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Blog de Jean</title>
</head>
<body>
	<h1>Edition d'un billet</h1>


	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="editPost">
						<h3>Modifier un billet</h3>
						<form action="index.php?action=changePost&amp;id=<?= $post["id"]?>" method="post">
							<label for="auteur"> Auteur du billet <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($post["auteur"]) ?>" required /> </label> <br>
							<label class="labelEditPost"> <textarea class="labelEditPost" name="contenu"> <?php echo htmlspecialchars($post["contenu"]) ?> </textarea> </label> <br>
							<button class="btn btn-warning" type="submit" onclick="return confirm('Etes-vous sûr de vouloir modifier ce billet ?');"> Modifier le billet </button>
							<a  class="btn btn-success" href="index.php?action=admin">Annuler</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>