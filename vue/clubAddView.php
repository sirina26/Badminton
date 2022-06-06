
<?php 
//commencer l'enregistrement
ob_start(); ?> 

    <div class="container">
        <div class="ajoutherAdhForm">
        <?php if(isset($_GET["error"])) if($_GET["error"] == 1) : ?>
            <div class="alert alert-danger" role="alert">
               Impossible d'ajouter le club
            </div>
        <?php endif; ?>
            <form method="post" action="index.php?p=ajouter-club">
                <div class="label_container">
                    <p>
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control" type="text" name="nom" required for="nom">
                    </p>
                    <p>
                        <label class="form-label" for="adr">Adresse</label>
                        <input class="form-control" type="text" name="adr" id="adr" required>
                    </p>
                    <p>
                        <label class="form-label" for="cp">Code postal</label> <input class="form-control" type="text" name="cp" id="cp" required>
                    </p>
                    <p>
                        <label class="form-label" for="num">Num</label> <input class="form-control" type="tel" name="num" id="num" required>
                    </p>
                    <p>
                        <label class="form-label" for="email">Email</label> <input class="form-control" type="email" name="email" id="email" required>
                    </p>                
                </div>
                <input name="ajout" class="sub" type="submit" value="Ajouter">
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>