<?php

function login($id, $pass){
    $user = getUser($id, $pass);
    
    if($user){
        $_SESSION['identifiant'] = $user['usernameUser'];
        header('Location: index.php?p=gestion-adherant');
    }else{
        $error = "Cet utilisateur n'existe pas";
        header('Location: index.php?p=gestion-adherant&error='.$error);
    }
}

function displayLogin(){
    $title = "Connexion";
    $currentPage = "";
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }
    require('vue/loginView.php');
}

function logout(){
    session_destroy();
    header('Location: index.php?p=gestion-adherant');
}

function displayInscription(){
    
    $title = "Inscription";
    $currentPage = "Inscription";
    if(isset($_GET['error'])){
        $error = $_GET['error'];
    }
    require('vue/inscriptionView.php');
}
function inscription($id, $pass){
    $user = isExist($id);
    $addedUser = postUser($id, $pass);
    
    if($user){
        //echo '<script type="javascript">alert("Cet utilisateur existe")</script>';
        $error = "Cet utilisateur existe déjà!";
        header('Location: index.php?p=form-inscription&error='.$error);
        

    }elseif($addedUser == false){
        $error = "Le compte n'est pas était crér";
        header('Location: index.php?p=form-inscription&error='.$error);

    }else{
        $error = "Le compte est crér";
        header('Location: index.php?p=gestion-adherant&success=ajout');
    }
}
?>