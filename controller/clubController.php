<?php 
function listClub(){
    //modele
    $club_tab = getAllClub();
    $title = "Gestion des clubs";
    $nbrclub = getCountClub();

    //vue
    require('vue/clubView.php');
}

function clubSingle(){

    $idclub = $_GET['id'];
    $club_info = getClubInfo($idclub);
    $title = "Club n° $idclub";

    require('vue/clubSingleView.php');  
}

function addClub($nom, $adresse, $num, $cp, $email){

    $added = postClub($nom, $adresse, $num, $cp, $email);

    if($added == false){
        header("Location: index.php?p=form-ajout-club&error=1");
    }else{
        header("Location: index.php?p=gestion-club&success=ajout");
    }
}

function displayAddClubForm(){
    $title = "Ajouter un club";

    require('vue/clubAddView.php');
}
