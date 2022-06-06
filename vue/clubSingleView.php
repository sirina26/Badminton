<?php 
//commencer l'enregistrement
ob_start(); ?> 

<div class="container">

<div class="list-group">
    <!-- Matricule -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
    <i class="fa fas fa-signature"></i>
        <div>
            <h6 class="mb-0"><?= $club_info['name']; ?></h6>
            <p class="mb-0 opacity-75">Nom du club</p>
        </div>
    </div>
    <!-- Nom Prenom -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fa fal fa-map-marked-alt"></i>
        <div>
            <h6 class="mb-0"><?= $club_info['adresse']; ?></h6>
            <p class="mb-0 opacity-75">Adresse</p>
        </div>
    </div>
    <!-- Adresse, CP, Ville -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fa fal fa-mobile"></i>
        <div>
            <h6 class="mb-0"><?= $club_info['num']; ?></h6>
            <p class="mb-0 opacity-75">Num tel</p>
        </div>
    </div>
    <!-- Niveau -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fa far fa-at"></i>
        <div>
            <h6 class="mb-0"><?= $club_info['email']; ?></h6>
            <p class="mb-0 opacity-75">E-mail</p>
        </div>
    </div>
</div>
</div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>
