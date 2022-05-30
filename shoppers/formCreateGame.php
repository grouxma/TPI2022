<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the user's information from the registration form on register.php
//*********************************************************

// Session start and login = false
session_start();
// Default value is false
$loginMessage = false;

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();



// Check if values are not empty
if (isset($_POST) && (!empty($_POST['team'])) && (!empty($_POST['day'])) && (!empty($_POST['startTime'])) && (!empty($_POST['endTime'])) && (!empty($_POST['field']))) {
    //Converts value and creates the variables for the tests
    $team = $_POST['team'];

    $day = $_POST['day'];

    $startTime = $_POST['startTime'];

    $endTime = $_POST['endTime'];
    $field = $_POST['field'];

    $pseudo = $_SESSION['pseudo'];


    //gets the field ID
    $idField=$db->getFieldId($field);
    //gets the field ID
    $idVisitorTeam=$db->getTeamID($team);
    //gets the field ID
    $idLocalTeam = $db->getTeamFromUser($pseudo);
    $db->createGame($day,$startTime,$endTime,$idLocalTeam,$idVisitorTeam,$idField);

    //Creates the game
    //Informs the the user the game is created
    echo '<body onLoad="alert(\'Le match a été ajouté.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=register.php">';
}
else
{
    //Informs the information is not completed
    echo '<body onLoad="alert(\'Des informations sont manquantes\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=register.php">';
}