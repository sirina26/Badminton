<?php 
function listMembers(){
    
    $members_tab = getAllMembers();
    $title = "Gestion des adhérents";
    $currentPage = "Gestion";
    $nbrMembers = getCountMembers();

    require('vue/membersView.php');
}

function memberSingle(){

    $idmember = $_GET['id'];
    $member_info = getMemberInfo($idmember);
    $title = "Adhérent n° $idmember";
    $currentPage = "Gestion";

    require('vue/memberSingleView.php');  
}

function addMember($nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType){

    $added = postMember($nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType);

    if($added ==false){
        header("Location: index.php?p=form-ajout-adherant&error=1");
    }else{
        header("Location: index.php?p=gestion-adherant&success=ajout");
    }
}

function displayAddMemberForm(){
    $memberTypes_tabs = getTypesMember();
    $title = "Ajouter un Adhérent";
    $currentPage = "ajout";

    require('vue/memberAddView.php');
}

function addMemberType($libType, $montant){

    $added = postMemberType($libType, $montant);
    
    if($added ==false){
        header("Location: index.php?p=form-ajout-type-adherant&error=1");
    }else{
        header("Location: index.php?p=gestion-adherant&success=ajouttype");
    }
}

function displayAddMemberTypeForm(){
    $title = "Ajouter un type d'adhérent";
    $currentPage = "ajouttype";
    require('vue/memberTypeAddView.php');
}

function  displayUpdateMemberForm(){
    $idMember = $_GET['id'];
    $memberTypes_tabs = getTypesMember();
    $member_info = getMemberInfo($idMember);
    $title = "Modifier l'adhérent n° " . $idMember;

    require('vue/memberUpdateView.php');
}

function updateMember($matAdh, $nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType){

    $update = upMember($matAdh, $nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType);

    if($update == false){
        header("Location: index.php?p=form-modifier-adherant&error=1");
        exit();
    }else{
        header("Location: index.php?p=gestion-adherant&success=modif");
    }
}

function deleteMember($idMember){
    
    $deleted = delMember($idMember);

    if($deleted == false){
        header("Location: index.php?p=gestion-adherant&error=error-delete");
    }else{
        header("Location: index.php?p=gestion-adherant&success=del");
    }
}
function display404page(){
    $title = "";
    require('vue/404View.php');
}

function searchMember($nom){
    $member_search = search($nom);
    $title = "Recherche Adherant : $nom";
    require('vue/searchView.php');
}