<?php



//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information from chosenTeam.php
//          : The users will train a team
//*********************************************************

// Include the database and call class
include_once ("DBAccess.php");
include_once ("admiCheck.php");



//Gets the IDs of the team
$idTeam = $_GET['id'];
//Gets the team
$pseudo = $_SESSION['pseudo'];

$db = new DBAccess();

//Gets the userID
$idUser= $db -> getUserID($pseudo);
//The user will train a team
$db -> trainATeam($idTeam,$idUser);

echo '<body onLoad="alert(\'Vous entraîner maintenant cette équipe !\')">';
echo '<meta http-equiv="Refresh" content="0;URL=addUser.php">';