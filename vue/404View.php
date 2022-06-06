
<?php 
//commencer l'enregistrement
ob_start(); ?> 
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">404</h1>
		
		
		</div>
		
		<div class="contant_box_404">
		<h3 class="h2">
		Page non trouvé
		</h3>
		
		<p>La page que vous recherchez n'existe pas!</p>
		
		<a href="index.php?p=gestion-adherant" class="link_404">Aller à l'accueil</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); 

require('layout/template-nomenu.php');
?>
