<?php 
/**
 * Connect to database
 */
function dbConnect(){
    
    $host="localhost";  //Server
    $base="badminton2"; //Database
    $user="root";       //User
    $pass="";       //Password
    
    try{
        $db = new PDO('mysql:host='. $host . ';dbname=' . $base . ';charset=utf8', $user, $pass);
        return $db;

    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

/**
 * Get all members from database
 */
function getAllMembers(){
    $members_tabs = array();

    $bdd = dbConnect();
    $req = "SELECT * FROM adherent ORDER BY nomAdh";
    $res = $bdd->query($req);

    $members_tabs = $res->fetchAll();

    return $members_tabs;
}

/**
 * Get count of all members
 */
function getCountMembers(){
    return count(getAllMembers());
}

/**
 * Get info of specific member
 * @param $idmemeber String
 * @return $member_info Array
 */
function getMemberInfo($idmember){
    $member_info = array();

    $bdd = dbConnect();
    $req = "SELECT * FROM adherent LEFT JOIN type ON adherent.numType = type.numType WHERE matriculeAdh = '$idmember'";
    $res = $bdd->query($req);
    $member_info = $res->fetch();

    return $member_info;
}

function postMember($nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType){

    $bdd = dbConnect();

    $req = 'INSERT INTO adherent VALUES(?, ?, ?, ?, ?, ?, ?, ? )';
    $res = $bdd->prepare($req);
    $added = $res->execute(array($matAdh, $nomAdh, $prenomAdh,$adresseAdh,$villeAdh,$cpAdh,$niveauAdh,$numType ));

    return $added;
}

function postMemberType($libType, $montant){

    $bdd = dbConnect();

    $req = 'INSERT INTO type VALUES(?, ?, ?)';
    $res = $bdd->prepare($req);
    $added = $res->execute(array(Null, $libType, $montant ));

    return $added;
}

function getTypesMember(){
    $memberTypes_tabs = array();

    $bdd = dbConnect();
    $req = "SELECT * FROM type ORDER BY libelleType";
    $res = $bdd->query($req);

    $memberTypes_tabs = $res->fetchAll();

    return $memberTypes_tabs;
}

function upMember($matAdh, $nomAdh, $prenomAdh, $adresseAdh, $villeAdh, $cpAdh, $niveauAdh, $numType){

    $bdd = dbConnect();

    $req = 'UPDATE adherent SET nomAdh = ?, prenomAdh = ?, adresseAdh = ?,villeAdh = ?, cpAdh = ?, niveauAdh = ?, numType = ? WHERE matriculeAdh = ?';

    $res = $bdd->prepare($req);
    $update = $res->execute(array($nomAdh, $prenomAdh,$adresseAdh,$villeAdh,$cpAdh,$niveauAdh,$numType, $matAdh));

    return $update;
}

function delMember($idMember){
    $bdd = dbConnect();
    $req = 'DELETE FROM adherent WHERE matriculeAdh = ?';

    $res = $bdd->prepare($req);
    $delete = $res->execute(array($idMember));

    return $delete;
}

function getUser($id, $pass){
    
    $bdd = dbConnect();
    $req = "SELECT * FROM user WHERE usernameUser = ? AND passUser = ?";

    $res = $bdd->prepare($req);
    $res->execute(array($id, $pass));

    if($res->rowCount() > 0){
        $user_info = $res->fetch();
        return $user_info;
    }
    return false;

}

function search($nom){
    $bdd = dbConnect();

    $req = "SELECT * FROM adherent WHERE nomAdh LIKE ?";
    $res = $bdd->prepare($req);

    $res->execute(array("%$nom%"));

    if($res->rowCount() > 0){
        $members_search = $res->fetchAll();
        return $members_search;
    }
    return false;
}
function postClub($nom, $adresse, $cp, $num, $email){

    $bdd = dbConnect();

    $req = 'INSERT INTO club (name, adresse, num, cp, email) VALUES (?, ?, ?, ?, ?)';
    $res = $bdd->prepare($req);

    $added = $res->execute(array($nom, $adresse, $cp, $num, $email));
    return $added;
}

/**
 * Get all members from database
 */
function getAllClub(){
    $club_tabs = array();

    $bdd = dbConnect();
    $req = "SELECT * FROM club ORDER BY name";
    $res = $bdd->query($req);

    $club_tabs = $res->fetchAll();

    return $club_tabs;
}

/**
 * Get count of all members
 */
function getCountClub(){
    return count(getAllClub());
}

function getClubInfo($idclub){
    $club_info = array();

    $bdd = dbConnect();
    $req = "SELECT * FROM club WHERE id = '$idclub'";
    $res = $bdd->query($req);
    $club_info = $res->fetch();

    return $club_info;
}

?>