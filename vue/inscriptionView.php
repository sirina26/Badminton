<?php 
//commencer l'enregistrement
ob_start(); ?> 
<div class="signin-page">
    <main class="form-signin">
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="index.php?p=inscription">
            <h1>Club de Badminton</h1>
            <h1 class="h3 mb-3 fw-normal">Inscription</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="identifiant" placeholder="identifiant" name="identifiant" required>
                <label for="identifiant">Identifiant</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="pass" placeholder="Mot de passe" name="pass" required>
                <label for="pass">Mot de passe</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="connect" type="submit">Inscription</button>
        </form>
    </main>
</div>
<?php $content = ob_get_clean(); 

require('layout/template-nomenu.php');
?>