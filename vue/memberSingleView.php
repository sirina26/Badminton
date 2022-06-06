<?php 
//commencer l'enregistrement
ob_start(); ?> 

<div class="container">

<div class="list-group">
    <!-- Matricule -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fas fa-id-card-alt"></i>
        <div>
            <h6 class="mb-0"><?= $member_info['matriculeAdh']; ?></h6>
            <p class="mb-0 opacity-75">Matricule</p>
        </div>
    </div>
    <!-- Nom Prenom -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fas fa-user"></i>
        <div>
            <h6 class="mb-0"><?= $member_info['nomAdh']; ?> <?= $member_info['prenomAdh']; ?></h6>
            <p class="mb-0 opacity-75">Nom Prénom</p>
        </div>
    </div>
    <!-- Adresse, CP, Ville -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fas fa-map-marker-alt"></i>
        <div>
            <h6 class="mb-0"><?= $member_info['adresseAdh']; ?>, <?= $member_info['cpAdh']; ?>, <?= $member_info['villeAdh']; ?></h6>
            <p class="mb-0 opacity-75">Adresse</p>
        </div>
    </div>
    <!-- Niveau -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fas fa-level-up-alt"></i>
        <div>
            <h6 class="mb-0"><?= $member_info['niveauAdh']; ?></h6>
            <p class="mb-0 opacity-75">Niveau</p>
        </div>
    </div>
    <!-- Type -->
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
        <i class="fas fa-user-tie"></i>
        <div>
            <h6 class="mb-0"><?= $member_info['libelleType']; ?></h6>
            <p class="mb-0 opacity-75">Type</p>
        </div>
    </div>
</div>
</div>

<?php $content = ob_get_clean(); 

require('layout/template.php');
?>
