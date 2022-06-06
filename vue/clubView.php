
<?php 
//commencer l'enregistrement
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
    <a href="index.php?p=form-ajout-club" class="btn btn-primary">Ajouter un club</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Actions</th>
                    <th scope="col">Nom du club</th>
                    <th scope="col">Code postal</th>
                    <th scope="col">Numero de tel</th>
                </tr>
            </thead>
            <tbody>
            <?php
            /**
             * Itération sur les résultats de la requête SQL
             */
            foreach ($club_tab as $club) {

                $nom = $club['name'];
                $codepostal = $club['cp'];
                $num = $club['num'];
                $id = $club['id'];

            ?>
            
                <tr>
                    <td>
                        <div class='action'>
                            <a class="btn btn-primary" href='index.php?p=details-club&id=<?= $id ?>' role="button">Détails</a>
                        </div>
                    </td>
                    <td><?= $nom ?></td>
                    <td><?= $codepostal ?></td>
                    <td><?= $num ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- Exercice : Selon le MVC, Organisez le code pour recuperer le nombre d'adherant -->
        <p> Le club compte <?= $nbrclub ?> clubs</p>
    </div>
</div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>

