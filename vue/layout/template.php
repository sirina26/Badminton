<!DOCTYPE html>
<html>

<head>
    <!-- Titre -->
    <title><?= $title ?></title>
    <!-- Encodage des caracteres -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- meta responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css custom -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fontawesome pour les icones -->
    <script src="https://kit.fontawesome.com/cd1eb87d27.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-between py-3 mb-4 border-bottom">

        <h1><?= $title; ?></h1>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.php?p=gestion-adherant" class="nav-link" aria-current="page">Accueil</a></li>
            <li class="nav-item"><a href="index.php?p=gestion-adherant" class="nav-link" aria-current="page">Gestion des adhérents</a></li>
            <li class="nav-item"><a href="index.php?p=gestion-club" class="nav-link" >Gestion des clubs</a></li>
            <?php if(isset($_SESSION['identifiant'])) : ?>
                <li class="nav-item"><a href="index.php?p=deconnexion" class="nav-link ">Deconnexion</a></li>
            <?php else :  ?>
                <li class="nav-item"><a href="login.php" class="nav-link">Connexion</a></li>
            <?php endif;  ?>
        </ul>
    </header>
</div>

<?= $content ?>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>