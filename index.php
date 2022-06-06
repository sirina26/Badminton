<?php 
session_start();
require('modele/modele.php');
require('controller/loginController.php');
require('controller/memberController.php');
require('controller/clubController.php');

if(isset($_GET['p'])){
    if($_GET['p'] == 'connexion'){
        if(!empty($_POST['identifiant'])
        && !empty($_POST['pass'])){
            login($_POST['identifiant'], $_POST['pass']);
        }else{
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }
    if($_GET['p'] == 'form-login'){
        displayLogin();
    }
    if($_GET['p'] == 'inscription'){
        if(!empty($_POST['identifiant'])
        && !empty($_POST['pass'])){
            login($_POST['identifiant'], $_POST['pass']);
        }else{
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }
    if(isset($_SESSION['identifiant'])){
        //Route 1 : Gestion des adhérents : index.php?p=gestion-adherant
        if($_GET['p'] == 'gestion-adherant'){
            listMembers();
        }elseif($_GET['p'] == 'details-adherant'){
            if(!empty($_GET['id'])){
                memberSingle();
            }else{
                echo "Aucun adhérent séléctioné";
            }
        }elseif($_GET['p'] == 'ajouter-adherant'){
            if(!empty($_POST['nom'])
            && !empty($_POST['prenom']) 
            && !empty($_POST['adresse']) 
            && !empty($_POST['ville']) 
            && !empty($_POST['cp'])
            && !empty($_POST['niveau']) 
            && !empty($_POST['type'])){
                addMember($_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['niveau'], $_POST['type']);
            }else{
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }elseif($_GET['p'] == 'form-ajout-adherant'){
            displayAddMemberForm();
        }elseif($_GET['p'] == 'form-ajout-type-adherant'){
            displayAddMemberTypeForm();
        }elseif($_GET['p'] == 'ajouter-type-adherant'){
            if(!empty($_POST['libType'])
            && !empty($_POST['montant']))
            {
                addMemberType($_POST['libType'], $_POST['montant']);
            }else{
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }elseif($_GET['p'] == 'form-modifier-adherant'){
            if(!empty($_GET['id'])){
                displayUpdateMemberForm();
            }else{
                echo "Aucun adhérent séléctioné";
            }
        }elseif($_GET['p'] == 'modifier-adherant'){
            if(!empty($_POST['matricule'])
            && !empty($_POST['nom'])
            && !empty($_POST['prenom']) 
            && !empty($_POST['adresse']) 
            && !empty($_POST['ville']) 
            && !empty($_POST['cp'])
            && !empty($_POST['niveau']) 
            && !empty($_POST['type'])){
                updateMember($_POST['matricule'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['cp'], $_POST['niveau'], $_POST['type']);
            }else{
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }elseif($_GET['p'] == 'supprimer-adherant'){
            if(!empty($_GET['id'])){
                deleteMember($_GET['id']);
            }else{
                echo "Aucun adhérent séléctioné";
            }
        }elseif($_GET['p'] == 'deconnexion'){
            logout();
        }elseif($_GET['p'] == 'rechercher-adherant'){
            if(isset($_GET['search'])){
                searchMember($_GET['search']);
            }
        }elseif($_GET['p'] == 'form-ajout-club'){
            displayAddClubForm();
        }elseif($_GET['p'] == 'ajouter-club'){
            if(!empty($_POST['nom'])
            && !empty($_POST['adr'])
            && !empty($_POST['cp']) 
            && !empty($_POST['num']) 
            && !empty($_POST['email'])){
                addClub($_POST['nom'], $_POST['adr'], $_POST['cp'], $_POST['num'], $_POST['email']);
            }else{
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }elseif($_GET['p'] == 'gestion-club'){
            listClub();
        }elseif($_GET['p'] == 'details-club'){
            if(!empty($_GET['id'])){
                clubSingle();
            }else{
                echo "Aucun club séléctioné";
            }
        }else{
            display404page();
        }
    }else{
        displayLogin();
    }
}else{
    displayLogin();
}