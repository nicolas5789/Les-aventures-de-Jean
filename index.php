<?php
//index.php fait office de routeur

require("controller/controller.php"); //appel des controleur
require("controller/adminController.php");

if (isset($_GET["action"])) // si dans l'url index une action est présente alors affichage d'un post précis avec ses com
{
	if ($_GET["action"] == "listPosts") { //affiche les billets
		listPosts();
		
	} elseif ($_GET["action"] == "post") { //affiche un billet précis
		if (isset($_GET["id"]) && $_GET["id"] > 0) {
			post();
		} else {
			echo "Erreur : aucun id de billet transmis";
		}

	} elseif ($_GET["action"] == "addComment") { //ajoute un commentaire
		newComments($_GET["id"], $_POST["auteur"], $_POST["contenu"]);

	} elseif ($_GET["action"] == "admin") { //VOIR COMMENT SECURISER
		admin(); 

	} elseif ($_GET["action"] == "addPost"){ //ajoute un billet
		newPost($_POST["auteur"], $_POST["contenu"]);
	
	} elseif ($_GET["action"] == "signal"){ //ajoute un signalement
		if(isset($_GET["id"])){
			newSignal();
		} else {
			echo "Aucun id de billet transmis";
		}
	} elseif ($_GET["action"] == "formAccess") { //ouvre la page de connexion
		header("Location: view/connexion.php");

	} elseif ($_GET["action"] == "checkId") { //controle id et mdp pour accès
		access();
	} elseif ($_GET["action"] == "editPost") {
		if (isset($_GET["id"]) && $_GET["id"] > 0) {
			editPost();
		} else {
			echo "Aucun Id de billet transmis";
		}
	} elseif ($_GET["action"] == "changePost") {
		if (isset($_GET["id"]) && $_GET["id"] > 0) {
			changePost();
		} else {
			echo "Aucun Id de billet transmis";
		}
	}

} else {
	listPosts(); //affiche les billets
}