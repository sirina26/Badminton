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
?>