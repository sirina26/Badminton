
<?php 
//commencer l'enregistrement
ob_start(); ?> 

    <div class="container">
        <div class="ajoutherAdhForm">
        <?php if(isset($_GET["error"])) if($_GET["error"] == 1) : ?>
            <div class="alert alert-danger" role="alert">
               Impossible d'ajouter l'adherant
            </div>
        <?php endif; ?>
            <form method="post" action="index.php?p=ajouter-adherant">
                <div class="label_container">                 
                    <p>
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control" type="text" name="nom" required>
                    </p>
                    <p>
                        <label class="form-label" for="prenom">Prénom</label>
                        <input class="form-control" type="text" name="prenom">
                    </p>
                    <p>
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control" type="text" name="adresse">
                    </p>
                    <p>
                        <label class="form-label" for="cp">Code postal</label> <input class="form-control" type="text" name="cp">
                    </p>
                    <p>
                        <label class="form-label" for="ville">Ville</label> <input class="form-control" type="text" name="ville">
                    </p>
                    <div>
                        <label class="form-label" for="type">Type :</label>
                        <select class="form-select" name="type" id="ty">
                            <?php
                                foreach ($memberTypes_tabs as $unType) { 
                                    $libType = $unType['libelleType'];
                                    $idType = $unType['numType'];
                                ?>
                            <option value='<?= $idType ?>'><?= $libType ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="label8">
                        <label class="form-label" for="niveau">Niveau :</label>

                        <select class="form-select" name="niveau">
                            <option value="Expert" selected>Expert</option>
                            <option value="Confirmé"> Confirmé</option>
                            <option value="Débutant"> Débutant</option>
                        </select>
                    </div>
                </div>
                <input name="ajout" class="sub" type="submit" value="Ajouter">
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>