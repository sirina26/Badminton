
<?php 
//commencer l'enregistrement
ob_start(); ?> 

<div class="container">
        <div class="ajoutherAdhForm">
        <?php if(isset($_GET["error"])) if($_GET["error"] == 1) : ?> 
                <div class="alert alert-danger" role="alert">
                Impossible d'ajouter le type d'adherant
                </div>
            <?php endif; ?>   
            <form method="post" action="index.php?p=ajouter-type-adherant">
                <div class="label_container">                  
                    <p>
                        <label class="form-label" for="libType">Type</label>
                        <input class="form-control" type="text" name="libType" required>
                    </p>
                    <p>
                        <label class="form-label" for="montant">Montant de la licence</label>
                        <input class="form-control" type="text" name="montant" required>
                    </p>
                </div>
                <input name="ajout" class="sub" type="submit" value="Ajouter">
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>

