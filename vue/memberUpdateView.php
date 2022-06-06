
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
            <form method="post" action="index.php?p=modifier-adherant">
                <div class="label_container">
                    <p>
                        <label class="form-label" for="nom">Matricule</label>
                        <input class="form-control" type="text" name="matricule" value="<?= $member_info['matriculeAdh'] ?>" readonly >
                    </p>
                    <p>
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control" type="text" name="nom" value="<?= $member_info['nomAdh'] ?>" required>
                    </p>
                    <p>
                        <label class="form-label" for="prenom">Prénom</label>
                        <input class="form-control" type="text" value="<?= $member_info['prenomAdh'] ?>" name="prenom">
                    </p>
                    <p>
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control" type="text" name="adresse" value="<?= $member_info['adresseAdh'] ?>">
                    </p>
                    <p>
                        <label class="form-label" for="cp">Code postal</label> <input class="form-control" type="text" name="cp"  value="<?= $member_info['cpAdh'] ?>">
                    </p>
                    <p>
                        <label class="form-label" for="ville">Ville</label> <input class="form-control" type="text" name="ville"  value="<?= $member_info['villeAdh'] ?>">
                    </p>
                    <div>
                        <label class="form-label" for="type">Type :</label>
                        <select class="form-select" name="type" id="ty">
                            <?php
                                foreach ($memberTypes_tabs as $unType) { 
                                    $libType = $unType['libelleType'];
                                    $idType = $unType['numType'];
                                ?>
                            <option value='<?= $idType ?>' <?= $selected = ($member_info['numType'] == $idType) ? 'selected' : ''; ?> ><?= $libType ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="label8">
                        <label class="form-label" for="niveau">Niveau :</label>

                        <select class="form-select" name="niveau">
                            <option value="Expert" <?= $selected = ($member_info['niveauAdh'] == 'Expert') ? 'selected' : ''; ?>>Expert</option>
                            <option value="Confirmé" <?= $selected = ($member_info['niveauAdh'] == 'Confirmé') ? 'selected' : ''; ?>> Confirmé</option>
                            <option value="Débutant" <?= $selected = ($member_info['niveauAdh'] == 'Débutant') ? 'selected' : ''; ?>> Débutant</option>
                        </select>
                    </div>
                </div>
                <input name="modif" class="sub" type="submit" value="Modifier">
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); 

require ('layout/template.php');
?>