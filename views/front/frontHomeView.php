<?php $title = "Accueil"; ?>

<?php ob_start(); ?>

<h1>TEXTE PAGE ACCUEIL</h1>


<?php $content = ob_get_clean(); ?> 


<?php require("template.php"); ?>