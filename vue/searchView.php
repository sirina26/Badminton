
<?php 
//commencer l'enregistrement
$nbrMembers = getCountMembers();

ob_start(); ?> 

<div class="container">
    <div>
    <?php if(isset($_GET["error"])) if($_GET["error"] == 'error-delete') : ?>
        <div class="alert alert-danger" role="alert">
            Impossible de supprimer l'utilisateur
        </div>
    <?php endif; ?>
    <?php if(isset($_GET["success"])) if($_GET["success"] == 'ajout') : ?>
        <div class="alert alert-success" role="success">
           L'adhérent a bien été ajouté
        </div>
    <?php endif; ?>
    <?php if(isset($_GET["success"])) if($_GET["success"] == 'modif') : ?>
        <div class="alert alert-success" role="success">
           L'adhérent a bien été modifié
        </div>
    <?php endif; ?>
    <?php if(isset($_GET["success"])) if($_GET["success"] == 'del') : ?>
        <div class="alert alert-success" role="success">
           L'adhérent a bien été suprimé
        </div>
    <?php endif; ?>
    <?php if(isset($_GET["success"])) if($_GET["success"] == 'ajouttype') : ?>
        <div class="alert alert-success" role="success">
           Le type d'adhérent a bien été ajouté
        </div>
    <?php endif; ?>
    <a href="index.php?p=form-ajout-adherant" class="btn btn-primary">Ajouter un adhérent</a>
    <a href="index.php?p=form-ajout-type-adherant" class="btn btn-secondary">Ajouter un type d'adhérent</a>
        <?php if($member_search) :  ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Actions</th>
                        <th scope="col">Nom de l'adhérent</th>
                        <th scope="col">Prénom de l'adhérent</th>
                        <th scope="col">Niveau de l'adhérent</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                /**
                 * Itération sur les résultats de la requête SQL
                 */
                foreach ($member_search as $member) {

                    $nom = $member['nomAdh'];
                    $prenom = $member['prenomAdh'];
                    $niveau = $member['niveauAdh'];
                    $matricule = $member['matriculeAdh'];

                ?>
                
                    <tr>
                        <td>
                            <div class='action'>
                                <a class="btn btn-primary" href='index.php?p=details-adherant&id=<?= $matricule ?>' role="button">Détails</a>
                                <a class="btn btn-warning" href='index.php?p=form-modifier-adherant&id=<?= $matricule ?>' role="button">Modifier</a>
                                <a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet adhérent?');" href='index.php?p=supprimer-adherant&id=<?= $matricule ?>' role="button">Supprimer</a>
                            </div>
                        </td>
                        <td><?= $nom ?></td>
                        <td><?= $prenom ?></td>
                        <td><?= $niveau ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php else :  ?>
            <p>Aucun adherant trouvé</p>
        <?php endif;  ?>
        <!-- Exercice : Selon le MVC, Organisez le code pour recuperer le nombre d'adherant -->
        <p> Le club compte <?= $nbrMembers ?> adhérents</p>
    </div>
</div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>

