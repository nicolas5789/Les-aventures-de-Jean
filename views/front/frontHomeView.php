<?php $title = "Accueil"; ?>
<?php $title_bloc = "Mon Aventure"; ?>
<?php $description_bloc = "Venez explorer l'aventure d'une vie ligne après ligne."; ?>
<?php $lien = "<a class='btn btn-primary btn-lg' href='index.php?action=blog' role='button'>Découvrir &raquo;</a>"; ?>
<?php $adminStyle ="public"; ?>

<?php ob_start(); ?>


<div id="presentation">
	<p>
		Soyez les bienvenus sur mon Blog, je suis Jean Forteroche, écrivain-globetrotter, à travers mes différents romans j'essaie de transmettre mon amour de cette planète bleue. Une petite sphère perdue au milieu de l'univers, qui réserve à chacun de ses habitants une quantité infinie d'aventures et de surprises. Ne reste plus qu'à se laisser tenter.  
	</p>
	<div id="aventurier">
		<img id="img_aventurier" src="public/images/aventurier.jpg">
	</div>
	<p>
		Une aventure ne s'écrit pas, elle se vit. Et pourtant c'est à travers ce nouveau roman "Billet simple pour l'Alaska" que je vous propose de découvrir une aventure hors du commun, une aventure qui me mena jusqu'au bout du monde.
		A travers les différents billets vous allez pouvoir me suivre pas à pas. N'hésitez pas à laisser vos commentaires, à m'interroger. Ce blog se veut avant tout être un espace de convivialité et d'échanges. <br>
		Aujourd'hui l'Alaska, demain qui sait...
	</p>
</div>



<?php $content = ob_get_clean(); ?> 

<?php require("views/template.php"); ?>